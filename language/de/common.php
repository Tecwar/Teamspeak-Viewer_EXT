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
	'NOTS'				=> 'Leider haste Du keine Rechte den Teamspeak-Viewer zu benutzen',
	'WKM'				=> 'Willkommens Nachricht',
	'TSLOGIN' 			=> 'TS-Login als: ',
	'UPTIME'			=> 'Uptime',
	'COUNT'				=> 'Clients Online',
	'SERVER'  			=> 'Server-IP',
	'PORT'  			=> 'Server-Port',
	'PASSWORT'  		=> 'Server-Passwort',
	'REFRESH'  			=> 'Teamspeak-Viewer aktualisieren',
	'REFRESH_BUTTON'    => 'Aktualisieren',

	'TSI'				=> 'Teamspeak-Server',
	'ERROR'				=> 'Es konnte keine Verbindung hergestellt werden',
	'NO_ONE_ONLINE'		=> 'Zurzeit ist Niemand online',

	'VIEWONLINE_TS'		=> 'Betrachtet den Teamspeak-Viewer',
));
