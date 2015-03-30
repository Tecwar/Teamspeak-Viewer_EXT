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

function tsbbcode($tmpText)
{
	$tmpText = htmlspecialchars($tmpText);
	$tmpText = nl2br($tmpText);

	//[b]
	$tmpText = preg_replace('#\[b\](.*)\[/b\]#isU', '<b>$1</b>', $tmpText);
	//[i]
	$tmpText = preg_replace('#\[i\](.*)\[/i\]#isU', '<i>$1</i>', $tmpText);
	//[u]
	$tmpText = preg_replace('#\[u\](.*)\[/u\]#isU', '<span style="text-decoration:underline">$1</span>', $tmpText);
	//[color]
	$tmpText = preg_replace('#\[color=(.*)\](.*)\[\/color\]#isU', '<span style="color:$1;">$2</span>', $tmpText);
	//[size]
	$tmpText = preg_replace('#\[size=([0-9]{1,2})\](.*)\[\/size\]#isU', '<span style="font-size:$1px;">$2</span>', $tmpText);
	//[url]
	$tmpText = preg_replace('#\[url=(.*)\](.*)\[\/url\]#isU', '<a href="$1">$2</a>', $tmpText);
	//[url]
	$tmpText = preg_replace('#\[url\](.*)\[\/url\]#isU', '<a href="$1">$1</a>', $tmpText);
	//[img]
	$tmpText = preg_replace('#\[img\](.*)\[\/img\]#isU', '<img src="$1" alt="Bild" />', $tmpText);
	//[center]
	$tmpText = preg_replace('#\[center\](.*)\[\/center\]#isU', '<div style="text-align:center">$1</div>', $tmpText);
	//[right]
	$tmpText = preg_replace('#\[right\](.*)\[\/right\]#isU', '<div style="text-align:right">$1</div>', $tmpText);
	//[left] 
	$tmpText = preg_replace('#\[left\](.*)\[\/left\]#isU', '<div style="text-align:left">$1</div>', $tmpText);

	//[list]
	while(preg_match('#\[list\](.*)\[\/list\]#is', $tmpText))
	{
		$tmpText = preg_replace_callback('#\[list\](.*)\[\/list\]#isU',
		create_function('$str',"return str_replace(array(\"\\r\",\"\\n\"),'','<ul>'.preg_replace('#\[\*\](.*)\$#isU',
		'<li>\$1</li>',preg_replace('#\[\*\](.*)(\<li\>|\$)#isU','<li>\$1</li>\$2',preg_replace('#\[\*\](.*)(\[\*\]|\$)#isU',
		'<li>\$1</li>\$2',\$str[1]))).'</ul>');"), $tmpText);
		$tmpText = preg_replace('#<ul></li>(.*)</ul>(<li>|</ul>)#isU', '<ul>$1</ul></li>$2', $tmpText); // Validitäts-Korrektur
	}	
	$tmpText = str_replace('<ul>', '<ul style="margin-left: 20px">', $tmpText);

	return $tmpText;
}
