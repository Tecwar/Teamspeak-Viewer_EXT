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
$ts_cache_path = $phpbb_root_path.'/cache/';
$ts_cache_ext = '.php';

if (!class_exists('TeamSpeak3'))
{
	include('TeamSpeak3.'.$phpEx);
}

try
{
	$this->template->assign_var('S_IN_GROUP', true);
	$set_of_display = true;
	include_once('cache.'.$phpEx);
	$TSVC = NEW tscache();
	$timeset = $this->config['ts_cache_delay'];
	
	// check cache
	if($this->config['ts_index_client'] == true)
	{
		$filetime_tsviewer = $TSVC->check_cache('TSINDEX',$timeset );
	}
	else
	{
		$filetime_tsviewer = false;
	}
	if($this->config['ts_index_count'] == true)
	{
		$filetime_count = $TSVC->check_cache('COUNTINDEX',$timeset );
	}
	else
	{
		$filetime_count = false;
	}		
	
	// connect to server @no cache or time over
	if(($filetime_tsviewer || $filetime_count ) == true) 
	{
		$this->template->assign_var('S_IN_GROUP', true);
		// connect to server, authenticate and get TeamSpeak3_Node_Server object by URI
		$ts3 = TeamSpeak3::factory("serverquery://".$this->config['ts_user'].":" . $this->config['ts_qpass']."@".$this->config['ts_host'].":".$this->config['ts_query']."/?server_port=".$this->config['ts_voice']."#no_query_clients");
	}

	// TS-count
	if($this->config['ts_index_count'] == true)
	{
		if($filetime_count == true)
		{
			$this->template->assign_var('S_IN_TS_INDEX_COUNT', true);
			$data =($ts3->isOffline() ? "- / -" : $ts3->clientCount() );
			
			$this->template->assign_vars(array(
				'COUNT'			=> $data,
				));
			$TSVC->write_cache('COUNTINDEX', $data);
		}
		else
		{
			$this->template->assign_var('S_IN_TS_INDEX_COUNT', true);
			$this->template->assign_vars(array(
				'COUNT'			=> $TSVC->read_cache('COUNTINDEX'),
			));
		}
	}

	// TS-user
	if($this->config['ts_index_client'] == true)
	{
	if($filetime_tsviewer == true)
		{
			$arr_ClientList = $ts3->clientList();
			$next = false;
			$data = '';
			$this->template->assign_var('S_IN_TS_INDEX_CLIENT', true);
			foreach($arr_ClientList as $ts3_client)
			{
				if ($next) $data = $data . ', ';
				$data = $data . $ts3_client;
				$next = true;
			}
			$this->template->assign_vars(array(
				'TSVIEWER'		=> $data,
				));
			if ($data == '') $this->template->assign_var('S_IN_TS_INDEX_CLIENT_EMPTY', true);
			$TSVC->write_cache('TSINDEX', $data);
		}
		else
		{
			$this->template->assign_var('S_IN_TS_INDEX_CLIENT', true);
			$data = $TSVC->read_cache('TSINDEX');
			$this->template->assign_vars(array(
				'TSVIEWER'		=> $data,
			));
			if ($data == '') $this->template->assign_var('S_IN_TS_INDEX_CLIENT_EMPTY', true);
		}
	}

}
catch(Exception $e)
{
	// error message
	$this->template->assign_var('S_IN_GROUP', true);
	$this->template->assign_var('S_IN_ERROR', true); 
	$this->template->assign_vars(array(
		'ERROR'		=> $this->user->lang('ERROR'),
	));
}
