<?php
/**
*
* This file is part of the Teamspeak-Viewer_EXT for phpBB 3.1.x Forum Software
*
* @copyright (c) 2015 Tecs (http:\\area51.gdrr.info) & TimoMF (http://hard-soft.meyer-franke.com)
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace tecs\ts\migrations;

class initial_module extends \phpbb\db\migration\migration
{
	public function update_data()
	{
		return array(
			// Add configs
			array('config.add', array('ts_loginset', 1)),
			array('config.add', array('ts_groupset', 1)),
			array('config.add', array('ts_host', '127.0.0.1')),
			array('config.add', array('ts_query', '10011')),
			array('config.add', array('ts_voice', '9987')),
			array('config.add', array('ts_user', 'query-user')),
			array('config.add', array('ts_qpass', 'query pw')),
			array('config.add', array('ts_pass', 'client pw')),
			array('config.add', array('ts_loginip', 'Server IP/Domainname')),
			array('config.add', array('ts_version', 'v.1.4.7 beta')),
			array('config.add', array('ts_banner', 1)),
			array('config.add', array('ts_tsloginbutton', 1)),
			array('config.add', array('ts_wknachricht', 1)),
			array('config.add', array('ts_clogindaten', 1)),
			array('config.add', array('ts_uptime', 1)),
			array('config.add', array('ts_count', 1)),
			array('config.add', array('ts_index_client', 1)),
			array('config.add', array('ts_index_count', 1)),
			array('config.add', array('ts_cache_delay', 30)),
			array('config.add', array('ts_link_enable', 1)),


			// Add the ACP module
			array('permission.add', array('u_ts_perm')),
			array('module.add', array(
				'acp',
				'ACP_CAT_DOT_MODS',
				'TS_EXT'
			)),

			array('module.add', array(
				'acp',
				'TS_EXT',
				array(
					'module_basename'	=> '\tecs\ts\acp\ts_module',
					'modes'				=> array('settings'),
				),
			)),
		);
	}
}
