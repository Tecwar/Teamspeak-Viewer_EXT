<?php
/**
*
* This file is part of the Teamspeak-Viewer_EXT for phpBB 3.1.x Forum Software
*
* @copyright (c) 2015 Tecs (http:\\area51.gdrr.info) & TimoMF (http://hard-soft.meyer-franke.com)
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace tecs\ts\acp;

class ts_info
{
	function module()
	{
		return array(
			'filename'	=> '\tecs\ts\acp\ts_module',
			'title'		=> 'TS_EXT',
			'version'	=> 'v.1.4.2',
			'modes'		=> array(
				'settings'	=> array(
					'title' => 'TS_EXT',
					'auth' => 'ext_tecs/ts && acl_a_board',
					'cat' => array('TS_EXT')
				),
			),
		);
	}
}
