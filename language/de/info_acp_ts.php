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
	'ACL_U_TS_PERM'			=> 'Darf den Teamspeak 3 sehen',
	'ACP_SUBMIT_LEG'		=> '&Auml;nderungen übernehmen',
	'TS_PERMISSIONS_LEG'		=> 'Berechtigungen',
	'TS_QUERY_LEG'			=> 'Query Zugangsdaten',
	'TS_CLIENT_LEG'			=> 'Client Zugangsdaten',
	'TS_SHOW_LEG'			=> 'Anzeigen',
	'TS_CACHE_LEG'			=> 'Cache Einstellung',
	'TS_EXT'			=> 'Teamspeak 3 einbinden',
	'TS_EXT_EXPLAIN'		=> 'Hier kannst du die Optionen f&uuml;r Teamspeak 3 eintragen.',
	'TS_EXT_MANAGE'			=> 'Teamspeak 3 verwalten',
	'TS_LOGINSET'			=> 'Login abfragen',
	'TS_LOGINSET_EXPLAIN'		=> 'Pr&uuml;ft ob ein Login im Forum vorhanden ist,</br>wenn keine Anmeldung vorhanden ist wird die Login-Seite geladen.',
	'TS_GROUPSET'			=> 'Berechtigungs&uuml;berpr&uuml;fung',
	'TS_GROUPSET_EXPLAIN'		=> 'Achtung: Wenn diese Funktion deaktiviert ist kann jeder den TS-Viewer sehen.',
	'TS_HOST'			=> 'Teamspeak Host IP',
	'TS_HOST_EXPLAIN'		=> 'Hier bitte die IP zum TS3-Server eintragen.<p>Sollte kein Domainname eingetragen werden.<br/>(Standart für localhost ist: 127.0.0.1)</p>',
	'TS_QUERY'			=> 'Teamspeak 3 Query-Port',
	'TS_QUERY_EXPLAIN'		=> 'Query-Port vom Teamspeak 3 Server eintragen.<p>(Standart Query-Port: 10011)</p>',
	'TS_VOICE'			=> 'Teamspeak 3 Voice-Port',
	'TS_VOICE_EXPLAIN'		=> 'Voice-Port vom Teamspeak 3 Server eintragen.',
	'TS_USER'			=> 'Teamspeak 3 Query-User',
	'TS_USER_EXPLAIN'		=> 'Hier ist der Query-User gemeint.',
	'TS_QPASS'			=> 'Query-Passwort',
	'TS_QPASS_EXPLAIN'		=> 'Bitte das Passwort vom Query-User eintragen.',
	'TS_PASS'			=> 'Passwort',
	'TS_PASS_EXPLAIN'		=> 'Hier muss das Passwort eingetragen werden, was ben&ouml;tigt wird um sich mit dem TS3-Server zuverbinden.</br>(Client-Passwort)',
	'TS_LOGINIP'			=> 'Allgemeine TS3-Server IP/DN',
	'TS_LOGINIP_EXPLAIN'		=> 'Bitte die TS3-Server IP/Domainnamen eintragen, womit sich ein Client verbinden soll',
	'TS_BANNER'			=> 'Teamspeak-Banner anzeigen',
	'TS_BANNER_EXPLAIN'		=> 'Den Teamspeak-Banner angezeigt.',
	'TS_TSLOGINBUTTON'		=> 'Login-Button anzeigen',
	'TS_TSLOGINBUTTON_EXPLAIN'	=> 'Der Login-Botton wird nicht f&uuml;r G&auml;ste angezeigt.',
	'TS_WKNACHRICHT'		=> 'TS-Begr&uuml;&szlig;ung anzeigen',
	'TS_WKNACHRICHT_EXPLAIN'	=> 'Zeigt die Willkommensnachricht vom TS-Server an.',
	'TS_CLOGINDATEN'		=> 'Logindaten anzeigen',
	'TS_CLOGINDATEN_EXPLAIN'	=> 'Zeigt die Daten an, um sich mit dem TS-Server zu verbinden.',
	'TS_UPTIME'			=> 'TS-Server-Online-Dauer anzeigen',
	'TS_UPTIME_EXPLAIN'		=> 'Zeigt Laufzeit wie lange der TS-Server online ist.',
	'TS_COUNT'			=> 'Anzahl der die Online sind anzeigen',
	'TS_COUNT_EXPLAIN'		=> 'Anzeige f&uuml;r Counter benutzte Slots /Max.Slots.',
	'TS_INDEX_CLIENT'		=> 'Index Client-Namen anzeigen',
	'TS_INDEX_CLIENT_EXPLAIN'	=> 'In der Foren-&Uuml;bersicht.',
	'TS_INDEX_COUNT'		=> 'Anzahl der die Online sind anzeigen im Index',
	'TS_INDEX_COUNT_EXPLAIN'	=> 'Anzahl der online seienden Clients in der Foren-&Uuml;bersicht anzeigen.',
	'TS_CACHE_DELAY'		=> 'Cache Dauer in Sekunden',
	'TS_CACHE_DELAY_EXPLAIN'	=> 'Der Cache wird deaktiviert wenn 0 eingetragen wird.</br><p style="color:red;">Wenn kein Eintrag in query_ip_whitelist vom Teamspeak-Server vorhanden ist,</br>sollte der Wert 30 NICHT unterschritten werden.(Könnte sonst einen TIMEBANN geben!)</p>',
	'TS_PURGE_CACHE'		=> 'Cache leeren',
	'TS_PURGE_CACHE_EXPLAIN'	=> 'Löscht alle Teamspeak-Dateien aus dem Cache',
	'TS_CACHE_PURGE_SUCCESS'	=> 'Alle Teamspeak-Dateien im Cache wurden gelöscht.',
	'RUN_NOW'			=> 'Ausführen',
	'TS_LOG'			=> '<strong>TeamSpeak 3 Viewer aktualisiert</strong>',
	'TS_LINK_LEG'       		=> 'TeamSpeak Viewer Nav-LINK',
	'TS_LINK_ENABLE'		=> 'Link anzeigen',
	'TS_LINK_ENABLE_EXPLAIN'	=> 'Anzeige des Teamspeak-Link in der Forum-Navbar.<br/>F&uuml;r den manuellen Einbau z.B. ins Portal diesen Link<br/><a href="%1$s">%1$s</a><br/>nutzen.',
));
