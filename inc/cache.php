<?php
/**
*
* This file is part of the Teamspeak-Viewer_EXT for phpBB 3.1.x Forum Software
*
* @copyright (c) 2015 Tecs (http:\\area51.gdrr.info) & TimoMF (http://hard-soft.meyer-franke.com)
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

global $phpbb_root_path, $phpEx,$ts_cache_path, $ts_cache_ext;

class tscache
{
	function write_cache($dataname, $data)
	{
		global $ts_cache_path, $ts_cache_ext;
		file_put_contents($ts_cache_path.'ts_'.md5($dataname).$ts_cache_ext, '<?php exit; ?>'.chr(13).chr(10).serialize($data));
	}

	function read_cache($dataname)
	{
		global $ts_cache_path, $ts_cache_ext;
		$loadcache = str_replace('<?php exit; ?>'.chr(13).chr(10) ,'', file_get_contents($ts_cache_path.'ts_'.md5($dataname).$ts_cache_ext));
		return unserialize($loadcache);
	}
	
	function check_cache($dataname, $timeset)
	{
		global $ts_cache_path,$ts_cache_ext;
		$cache_file = $ts_cache_path.'ts_'.md5($dataname).$ts_cache_ext;
		$filetime = file_exists($cache_file) ? filemtime($cache_file) : 0;
		if(($filetime == 0) || ($filetime < (time() - $timeset)))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}
