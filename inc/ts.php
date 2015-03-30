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

$ts_cache_path=$phpbb_root_path.'/cache/';
$ts_cache_ext='.php';

if (!class_exists('TeamSpeak3'))
{
	include('TeamSpeak3.'.$phpEx);
}

try
{
	include_once('cache.'.$phpEx);
	$TSVC = NEW tscache();
	$timeset = $this->config['ts_cache_delay'];
	$filetime_tsviewer = $TSVC->check_cache('TSVIEWER',$timeset );
	
	if($this->config['ts_count'] == true)
	{
		$filetime_count = $TSVC->check_cache('COUNT',$timeset );
	}
	else
	{
		$filetime_count = false;
	}
	
	if($this->config['ts_banner'] == true)
	{
		$filetime_banner = $TSVC->check_cache('BANNER',$timeset );
	}
	else
	{
		$filetime_banner = false;
	}
	
	if($this->config['ts_uptime'] == true)
	{
		$filetime_uptime = $TSVC->check_cache('UPTIME',$timeset );
	}
	else
	{
		$filetime_uptime = false;
	}
	
	if($this->config['ts_uptime'] == true)
	{
		$filetime_wkm = $TSVC->check_cache('WKM',$timeset );
	}
	else
	{
		$filetime_wkm = false;
	}	
	
	if($filetime_banner == true || $filetime_tsviewer == true || $filetime_count == true || $filetime_uptime == true || $filetime_wkm == true)
	{
		/* connect to server, authenticate and get TeamSpeak3_Node_Server object by URI */
		$ts3 = TeamSpeak3::factory("serverquery://".$this->config['ts_user'].":" . $this->config['ts_qpass']."@".$this->config['ts_host'].":".$this->config['ts_query']."/?server_port=".$this->config['ts_voice']."#no_query_clients");
		/* enable new display mode */
		$ts3->setLoadClientlistFirst(TRUE);
	}
	
	// TS-banner
	if($this->config['ts_banner'] == true)
	{
		$this->template->assign_var('S_IN_BANNER', true);
		if($filetime_banner == true)
		{
			$hostbutton_url = $ts3["virtualserver_hostbutton_url"];
			$img_link = '<img src="' . $ts3["virtualserver_hostbanner_gfx_url"] . '" class="tsbanner" alt="' . $ts3["virtualserver_hostbutton_tooltip"] . '">';
			if ($hostbutton_url != "") $img_link = '<a href="' . $hostbutton_url . '">' . $img_link . '</a>';
			$data=($ts3->isOffline() ? "" : $img_link);
			$this->template->assign_vars(array(
			'BANNER'		=> $data,
			));
			$TSVC->write_cache('BANNER', $data);
		}
		else
		{
			$this->template->assign_vars(array(
				'BANNER'		=> $TSVC->read_cache('BANNER'),
			));
		}
	}
	else
	{
		$this->template->assign_var('S_IN_BANNER', false);
	}
		
	// TS-uptime	
	if($this->config['ts_uptime'] == true)
	{
		$this->template->assign_var('S_IN_UPTIME', true);
		if($filetime_uptime == true)
		{
			$data=($ts3->isOffline() ? "-" : TeamSpeak3_Helper_Convert::seconds($ts3["virtualserver_uptime"], FALSE));
			$this->template->assign_vars(array(
			'UPTIME'		=> $data,
			));
			$TSVC->write_cache('UPTIME', $data);
		}
		else
		{
			$this->template->assign_vars(array(
				'UPTIME'		=> $TSVC->read_cache('UPTIME'),
			));
		}
	}	
	else
	{
		$this->template->assign_var('S_IN_UPTIME', false);
	}
		
	// TS-count	
	if($this->config['ts_count'] == true)
	{
		$this->template->assign_var('S_IN_COUNT', true);
		if($filetime_count == true)
		{
			$data =($ts3->isOffline() ? "- / -" : $ts3->clientCount() . " / " . $ts3["virtualserver_maxclients"]);
			$this->template->assign_vars(array(
				'COUNT'			=> $data,
			));
			$TSVC->write_cache('COUNT', $data);
		}
		else
		{
			$this->template->assign_vars(array(
				'COUNT'			=> $TSVC->read_cache('COUNT'),
			));
		}
	}
	else
	{
		$this->template->assign_var('S_IN_COUNT', false);
	}
	
	// TS WKM
	if($this->config['ts_wknachricht'] == true)
	{
		if($filetime_wkm == true)
		{	
			$wkm = $ts3["virtualserver_welcomemessage"];
			if (!empty($wkm))
			{
				include('tsbbcode.php');
				$this->template->assign_var('S_IN_WKM', true);
				$data=tsbbcode($wkm);
				$this->template->assign_vars(array(
					'WKM'		=> $data,
				));	
				$TSVC->write_cache('WKM', $data);
			}
			else
			{
				$this->template->assign_var('S_IN_WKM', false);
			}
		}
		else
		{
			
			$wkm = $TSVC->read_cache('WKM');
			if (!empty($wkm))
			{
				$this->template->assign_var('S_IN_WKM', true);
				$this->template->assign_vars(array(
					'WKM'		=> $wkm,
				));
			}
			else
			{
				$this->template->assign_var('S_IN_WKM', true);
			}
		}
	
	}	
	else
	{
		$this->template->assign_var('S_IN_WKM', false);
	}
			
	// TS-viewer
	if($filetime_tsviewer == true)
	{
		$this->template->assign_var('S_IN_GROUP', true);
		$data=$ts3->getViewer(new TeamSpeak3_Viewer_Html($ext_path.'inc/images/viewer/', $ext_path.'/inc/images/flags/', "data:image"));
		$this->template->assign_vars(array(
			'TSVIEWER'		=> $data,
		));
		$TSVC->write_cache('TSVIEWER', $data);
	}
	else
	{
		$this->template->assign_var('S_IN_GROUP', true);
		$this->template->assign_vars(array(
			'TSVIEWER'		=> $TSVC->read_cache('TSVIEWER'),
		));
	}

	// TS-login
	if($this->config['ts_clogindaten'] == true)
	{
		$this->template->assign_var('S_IN_CLOGIN', true);
		$this->template->assign_vars(array(
			'SERVER'		=> $this->config['ts_loginip'],
			'PORT'			=> $this->config['ts_voice'],
			'PASSWORT'		=> $this->config['ts_pass'],
		));
	}	
	else
	{
		$this->template->assign_var('S_IN_CLOGIN', false);
	}

	// TS-login_botton
	if($this->config['ts_tsloginbutton'] == true)
	{
		if ($this->user->data['user_id'] != ANONYMOUS )
		{
			$this->template->assign_vars(array(
				'TSLOGINBUTTON'		=>'<a href="ts3server://'.$this->config['ts_loginip'].'?port='.$this->config['ts_voice'].'&amp;nickname='.$this->user->data['username'].'&amp;password='.$this->config['ts_pass'].'" class="button2">'.$this->user->lang['TSLOGIN'].''.$this->user->data['username'].'</a> ',
			));
		}
	}

}
catch(Exception $e)
{
	/* echo error message */
	$this->template->assign_var('S_IN_GROUP', false); 
	$this->template->assign_vars(array(
		'TSINFO'		=> "<p><b>ERROR 0x" . dechex($e->getCode()) . "</b>: " . htmlspecialchars($e->getMessage()) . "</p>",
	));
}
