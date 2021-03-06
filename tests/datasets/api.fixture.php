<?php
/**
 * @copyright Copyright (C) 2020, Friendica
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 *
 */

return [
	// Empty these tables
	'cache',
	'conversation',
	'pconfig',
	'photo',
	'workerqueue',
	'mail',
	'post-delivery-data',
	// Base test config to avoid notice messages
	'config'  => [
		[
			'cat' => 'system',
			'k'   => 'url',
			'v'   => 'http://localhost',
		],
		[
			'cat' => 'config',
			'k'   => 'hostname',
			'v'   => 'localhost',
		],
		[
			'cat' => 'system',
			'k'   => 'worker_dont_fork',
			'v'   => '1',
		],
	],
	'user'    => [
		[
			'uid'      => 42,
			'username' => 'Test user',
			'nickname' => 'selfcontact',
			'verified' => 1,
			'password' => '$2y$10$DLRNTRmJgKe1cSrFJ5Jb0edCqvXlA9sh/RHdSnfxjbR.04yZRm4Qm',
			'theme'    => 'frio',
		],
	],
	'contact' => [
		[
			'id'      => 42,
			'uid'     => 42,
			'name'    => 'Self contact',
			'nick'    => 'selfcontact',
			'self'    => 1,
			'nurl'    => 'http://localhost/profile/selfcontact',
			'url'     => 'http://localhost/profile/selfcontact',
			'about'   => 'User used in tests',
			'pending' => 0,
			'blocked' => 0,
			'rel'     => 1,
			'network' => 'dfrn',
		],
		// Having the same name and nick allows us to test
		// the fallback to api_get_nick() in api_get_user()
		[
			'id'      => 43,
			'uid'     => 0,
			'name'    => 'othercontact',
			'nick'    => 'othercontact',
			'self'    => 0,
			'nurl'    => 'http://localhost/profile/othercontact',
			'url'     => 'http://localhost/profile/othercontact',
			'pending' => 0,
			'blocked' => 0,
			'rel'     => 0,
			'network' => 'dfrn',
		],
		[
			'id'      => 44,
			'uid'     => 42,
			'name'    => 'Friend contact',
			'nick'    => 'friendcontact',
			'self'    => 0,
			'nurl'    => 'http://localhost/profile/friendcontact',
			'url'     => 'http://localhost/profile/friendcontact',
			'pending' => 0,
			'blocked' => 0,
			'rel'     => 2,
			'network' => 'dfrn',
		],
	],
	'item-uri'    => [
		[
			'id'   => 1,
			'uri'  => '1',
			'guid' => '1',
		],
		[
			'id'   => 2,
			'uri'  => '2',
			'guid' => '2',
		],
		[
			'id'   => 3,
			'uri'  => '3',
			'guid' => '3',
		],
		[
			'id'   => 4,
			'uri'  => '4',
			'guid' => '4',
		],
		[
			'id'   => 5,
			'uri'  => '5',
			'guid' => '5',
		],
		[
			'id'   => 6,
			'uri'  => '6',
			'guid' => '6',
		],
	],
	'item'    => [
		[
			'id'          => 1,
			'uri-id'      => 1,
			'visible'     => 1,
			'contact-id'  => 42,
			'author-id'   => 42,
			'owner-id'    => 42,
			'uid'         => 42,
			'verb'        => 'http://activitystrea.ms/schema/1.0/post',
			'unseen'      => 1,
			'body'        => 'Parent status',
			'parent'      => 1,
			'author-link' => 'http://localhost/profile/selfcontact',
			'wall'        => 1,
			'starred'     => 1,
			'origin'      => 1,
			'allow_cid'   => '',
			'allow_gid'   => '',
			'deny_cid'    => '',
			'deny_gid'    => '',
		],
		[
			'id'          => 2,
			'uri-id'      => 2,
			'visible'     => 1,
			'contact-id'  => 42,
			'author-id'   => 42,
			'owner-id'    => 42,
			'uid'         => 42,
			'verb'        => 'http://activitystrea.ms/schema/1.0/post',
			'unseen'      => 0,
			'body'        => 'Reply',
			'parent'      => 1,
			'author-link' => 'http://localhost/profile/selfcontact',
			'wall'        => 1,
			'starred'     => 0,
			'origin'      => 1,
		],
		[

			'id'          => 3,
			'uri-id'      => 3,
			'visible'     => 1,
			'contact-id'  => 43,
			'author-id'   => 43,
			'owner-id'    => 42,
			'uid'         => 42,
			'verb'        => 'http://activitystrea.ms/schema/1.0/post',
			'unseen'      => 0,
			'body'        => 'Other user status',
			'parent'      => 3,
			'author-link' => 'http://localhost/profile/othercontact',
			'wall'        => 1,
			'starred'     => 0,
			'origin'      => 1,
		],
		[
			'id'          => 4,
			'uri-id'      => 4,
			'visible'     => 1,
			'contact-id'  => 44,
			'author-id'   => 44,
			'owner-id'    => 42,
			'uid'         => 42,
			'verb'        => 'http://activitystrea.ms/schema/1.0/post',
			'unseen'      => 0,
			'body'        => 'Friend user reply',
			'parent'      => 1,
			'author-link' => 'http://localhost/profile/othercontact',
			'wall'        => 1,
			'starred'     => 0,
			'origin'      => 1,
		],
		[

			'id'          => 5,
			'uri-id'      => 5,
			'visible'     => 1,
			'contact-id'  => 42,
			'author-id'   => 42,
			'owner-id'    => 42,
			'uid'         => 42,
			'verb'        => 'http://activitystrea.ms/schema/1.0/post',
			'unseen'      => 0,
			'body'        => '[share]Shared status[/share]',
			'parent'      => 1,
			'author-link' => 'http://localhost/profile/othercontact',
			'wall'        => 1,
			'starred'     => 0,
			'origin'      => 1,
			'allow_cid'   => '',
			'allow_gid'   => '',
			'deny_cid'    => '',
			'deny_gid'    => '',
		],
		[
			'id'          => 6,
			'uri-id'      => 6,
			'visible'     => 1,
			'contact-id'  => 44,
			'author-id'   => 44,
			'owner-id'    => 42,
			'uid'         => 42,
			'verb'        => 'http://activitystrea.ms/schema/1.0/post',
			'unseen'      => 0,
			'body'        => 'Friend user status',
			'parent'      => 6,
			'author-link' => 'http://localhost/profile/othercontact',
			'wall'        => 1,
			'starred'     => 0,
			'origin'      => 1,
		],
	],
	'notify' => [
		[
			'id' => 1,
			'type' => 8,
			'name' => 'Reply to',
			'url' => 'http://localhost/display/1',
			'photo' => 'http://localhost/',
			'date' => '2020-01-01 12:12:02',
			'msg' => 'A test reply from an item',
			'uid' => 42,
			'link' => 'http://localhost/notification/1',
			'iid' => 4,
			'seen' => 0,
			'verb' => '',
			'otype' => 'item',
			'name_cache' => 'Reply to',
			'msg_cache' => 'A test reply from an item',
		],
	],
	'thread'  => [
		[
			'iid'        => 1,
			'visible'    => 1,
			'contact-id' => 42,
			'author-id'  => 42,
			'owner-id'   => 42,
			'uid'        => 42,
			'wall'       => 1,
		],
		[
			'iid'        => 3,
			'visible'    => 1,
			'contact-id' => 43,
			'author-id'  => 43,
			'owner-id'   => 43,
			'uid'        => 0,
			'wall'       => 1,
		],
		[
			'iid'        => 6,
			'visible'    => 1,
			'contact-id' => 44,
			'author-id'  => 44,
			'owner-id'   => 44,
			'uid'        => 0,
			'wall'       => 1,
		],
	],
	'profile' => [
		[
			'id' => 1,
			'uid' => 42,
		],
	],
	'group'   => [
		[
			'id'      => 1,
			'uid'     => 42,
			'visible' => 1,
			'name'    => 'Visible list',
		],
		[
			'id'      => 2,
			'uid'     => 42,
			'visible' => 0,
			'name'    => 'Private list',
		],
	],
	'search'  => [
		[
			'id'   => 1,
			'term' => 'Saved search',
			'uid'  => 42,
		],
	],
];