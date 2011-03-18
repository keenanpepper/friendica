<?php


function po2php_run($argv, $argc) {

	if ($argc!=2) {
		print "Usage: ".$argv[0]." <file.po>\n\n";
		return;
	}
	
	$pofile = $argv[1];
	$outfile = dirname($pofile)."/strings.php";
	
	if (!file_exists($pofile)){
		print "Unable to find '$pofile'\n";
		return;
	}
	
	print "Out to '$outfile'\n";
	
	$out="<?php\n\n";
	
	$infile = file($pofile);
	$k="";
	$v="";
	$arr = False;
	$ink = False;
	$inv = False;
	foreach ($infile as $l) {
		$len = strlen($l);
		if ($l[0]=="#") $l="";
		if (substr($l,0,15)=='"Plural-Forms: '){
			$match=Array();
			preg_match("|nplurals=([0-9]*); plural=(.*);|", $l, $match);
			$cond = str_replace('n','$n',$match[2]);
			$out .= 'function string_plural_select($n){'."\n";
			$out .= '	return '.$cond.';'."\n";
			$out .= '}'."\n";
		}
		



		if ($k!="" && substr($l,0,7)=="msgstr "){
			if ($ink) { $ink = False; $out .= '$a->strings["'.$k.'"] = '; }
			if ($inv) {	$inv = False; $out .= '"'.$v.'"'; }
			
			$v = substr($l,8,$len-10);
			$inv = True;
			//$out .= $v;
		}
		if ($k!="" && substr($l,0,7)=="msgstr["){
			if ($ink) { $ink = False; $out .= '$a->strings["'.$k.'"] = '; }
			if ($inv) {	$inv = False; $out .= '"'.$v.'"'; }
						
			if (!$arr) {
				$arr=True;
				$out .= "array(\n";
			}
			$match=Array();
			preg_match("|\[([0-9]*)\] (.*)|", $l, $match);
			$out .= "\t". $match[1]." => ". $match[2] .",\n";
		}
	
		if (substr($l,0,6)=="msgid_") { $ink = False; $out .= '$a->strings["'.$k.'"] = '; };


		if ($ink) {
			$k .= trim($l,"\"\r\n"); 
			//$out .= '$a->strings['.$k.'] = ';
		}
		
		if (substr($l,0,6)=="msgid "){
			if ($inv) {	$inv = False; $out .= '"'.$v.'"'; }
			if ($k!="") $out .= $arr?");\n":";\n";
			$arr=False;
			$k = str_replace("msgid ","",$l);
			if ($k != '""' ) {
				$k = trim($k,"\"\r\n");
			} else {
				$k = "";
			}
			$ink = True;
		}
		
		if ($inv && substr($l,0,6)!="msgstr") {
			$v .= trim($l,"\"\r\n"); 
			//$out .= '$a->strings['.$k.'] = ';
		}
	
		
	}
	
	if ($inv) {	$inv = False; $out .= '"'.$v.'"'; }
	if ($k!="") $out .= $arr?");\n":";\n";
	
	file_put_contents($outfile, $out);
	
}

if (array_search(__file__,get_included_files())===0){
  po2php_run($argv,$argc);
}