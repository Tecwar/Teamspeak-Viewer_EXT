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

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(
	'TS'				=> 'Teamspeak-Viewer',
	'NOTS'				=> 'Sorry, you do not have the necessary rights to use the Teamspeak-Viewer',	
	'WKM'				=> 'Welcome message',
	'TSLOGIN' 			=> 'TS-Login as: ',
	'UPTIME'			=> 'Uptime',
	'COUNT'				=> 'Clients Online',
	'SERVER'  			=> 'Server-IP',
	'PORT'  			=> 'Server-Port',
	'PASSWORT'  		=> 'Server-Password',
	'REFRESH'  			=> 'Refresh Teamspeak-Viewer',
	'REFRESH_BUTTON'    => 'Refresh',

	'TSI'				=> 'Teamspeak-Server',
	'ERROR'				=> 'No connection could be made.',
	'NO_ONE_ONLINE'		=> 'No one is currently online',

	'VIEWONLINE_TS'		=> 'View the Teamspeak-Viewer',
));