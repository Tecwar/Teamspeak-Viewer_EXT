<?php
/**
*
* This file is part of the Teamspeak-Viewer_EXT for phpBB 3.1.x Forum Software
*
* @copyright (c) 2015 Tecs (http:\\area51.gdrr.info) & TimoMF (http://hard-soft.meyer-franke.com)
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}
if (empty($lang) || !is_array($lang))
{
	$lang = array();
}
// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
$lang = array_merge($lang, array(
	'ACL_U_TS_PERM'			=> 'Is allowed to view the TS3',
	'ACP_SUBMIT_LEG'		=> 'Update changes',
	'TS_PERMISSIONS_LEG'		=> 'Permissions',
	'TS_QUERY_LEG'			=> 'Query access',
	'TS_CLIENT_LEG'			=> 'Client access',
	'TS_SHOW_LEG'			=> 'Show',
	'TS_CACHE_LEG'			=> 'Cache setting',
	'TS_EXT'			=> 'Integrate Teamspeak 3',
	'TS_EXT_EXPLAIN'		=> 'Here you can change and configure the options of the Teamspeak 3.',
	'TS_EXT_MANAGE'			=> 'Administration of Teamspeak 3',
	'TS_LOGINSET'			=> 'Query Login',
	'TS_LOGINSET_EXPLAIN'		=> 'Check if the user is logged in via the forum,</br>if no login can be found the user will be redirected to the login page.',
	'TS_GROUPSET'			=> 'Check for groups',
	'TS_GROUPSET_EXPLAIN'		=> 'ATTENTION: If this function is disabled everybody is allowed to view the Teamspeak-Viewer',
	'TS_HOST'			=> 'Teamspeak Host IP',
	'TS_HOST_EXPLAIN'		=> 'Please enter the IP for the TS3 server.<p>If no IP/Domain has been entered the standard host will be used.<br/>(Standard for localhost is: 127.0.0.1)</p>',
	'TS_QUERY'			=> 'Teamspeak 3 Query-Port',
	'TS_QUERY_EXPLAIN'		=> 'Enter the Query-Port of the Teamspeak 3 Server.<p>(Standard Query-Port: 10011)</p>',
	'TS_VOICE'			=> 'Teamspeak 3 Voice-Port',
	'TS_VOICE_EXPLAIN'		=> 'Enter the Voice-Port of the Teamspeak 3 Server.',
	'TS_USER'			=> 'Teamspeak 3 Query-User',
	'TS_USER_EXPLAIN'		=> 'This refers to the User Query.',
	'TS_QPASS'			=> 'Query-Password',
	'TS_QPASS_EXPLAIN'		=> 'Please enter the password of the Query-User.',
	'TS_PASS'			=> 'Password',
	'TS_PASS_EXPLAIN'		=> 'The password for connection to the Teamspeak 3 Server has to be entered here.</br>(Client-Password)',
	'TS_LOGINIP'			=> 'General TS3-Server IP/DN',
	'TS_LOGINIP_EXPLAIN'		=> 'Please enter the TS3 Server IP/Domain to which a client shall connect.',
	'TS_BANNER'			=> 'Show Teamspeak-Banner',
	'TS_BANNER_EXPLAIN'		=> 'Show the Teamspeak-Banner.',
	'TS_TSLOGINBUTTON'		=> 'Show the Login-Button',
	'TS_TSLOGINBUTTON_EXPLAIN'	=> 'The Login-Button will not be displayed for guests.',
	'TS_WKNACHRICHT'		=> 'Welcome message.',
	'TS_WKNACHRICHT_EXPLAIN'	=> 'Shows the welcome message of the TS-Server.',
	'TS_CLOGINDATEN'		=> 'Show Login data',
	'TS_CLOGINDATEN_EXPLAIN'	=> 'Shows the necessary data to connect to the Teamspeak-Server',
	'TS_UPTIME'			=> 'Shows the Uptime of the Teamspeak-Server',
	'TS_UPTIME_EXPLAIN'		=> 'Shows how long the Teamspeak-Server has been running.',
	'TS_COUNT'			=> 'Shows number of current on-line users.',
	'TS_COUNT_EXPLAIN'		=> 'Shows the counter of slots/max_slots fort the Teamspeak-Server.',
	'TS_INDEX_CLIENT'		=> 'Index Client-Namen anzeigen',
	'TS_INDEX_CLIENT_EXPLAIN'	=> 'In der Foren-&Uuml;bersicht.',
	'TS_INDEX_COUNT'		=> 'Anzahl der die Online sind anzeigen im Index',
	'TS_INDEX_COUNT_EXPLAIN'	=> 'Anzahl der online seienden Clients in der Foren-&Uuml;bersicht anzeigen.',
	'TS_CACHE_DELAY'		=> 'Time between cache images of the Teamspeak-Server ',
	'TS_CACHE_DELAY_EXPLAIN'	=> 'If the value is set to 0 the cache is deactivated.</br><p style="color:red;">If no entry is found in the query_ip_whitelist of the Teamspeak-Server,</br>pay attention not to use values below 30. (Lower values could result in a TIMEEBAN!)</p>',
	'TS_PURGE_CACHE'		=> 'Purge Cache',
	'TS_PURGE_CACHE_EXPLAIN'	=> 'Delete all Teamspeak-files from cache',
	'TS_CACHE_PURGE_SUCCESS'	=> 'Deleted all Teamspeak-files from cache.',
	'RUN_NOW'			=> 'Run Now',
	'TS_LOG'			=> '<strong>Refresh Teamspeak 3 viewer.</strong>',
	'TS_LINK_LEG'       		=> 'TeamSpeak Viewer Nav-LINK',
	'TS_LINK_ENABLE'		=> 'Show link',
	'TS_LINK_ENABLE_EXPLAIN'	=> 'Display the TeamSpeak link in the navbar forum <br/>. For manual installation, for example the portal this link<br/><a href="%1$s">%1$s</a><br/> use.',
));
