<?php
/**
*
* This file is part of the Teamspeak-Viewer_EXT for phpBB 3.1.x Forum Software
*
* @copyright (c) 2015 Tecs (http:\\area51.gdrr.info) & TimoMF (http://hard-soft.meyer-franke.com)
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace tecs\ts\controller;

/**
* @ignore
*/

class main
{
	/* @var \phpbb\config\config */
	protected $config;

	/* @var \phpbb\config\db_text */
	protected $config_text;

	/* @var \phpbb\controller\helper */
	protected $helper;

	/* @var \phpbb\db\driver\driver_interface */
	protected $db;

	/* @var \phpbb\template\template */
	protected $template;

	/* @var \phpbb\user */
	protected $user;

	/* @var string phpEx */
	protected $php_ext;
	/**
	* Constructor
	*
	* @param \phpbb\config\config		$config
	* @param \phpbb\config\db_text		$config_text
	* @param \phpbb\controller\helper	$helper
	* @param \phpbb\db\driver\driver_interface $db	Database object
	* @param \phpbb\template\template	$template
	* @param \phpbb\user				$user
	* @param string						$php_ext	phpEx
	*/
	public function __construct(\phpbb\config\config $config, \phpbb\config\db_text $config_text, \phpbb\controller\helper $helper, \phpbb\db\driver\driver_interface $db, \phpbb\template\template $template, \phpbb\user $user, $php_ext, \phpbb\auth\auth $auth)
	{
		$this->config		= $config;
		$this->helper		= $helper;
		$this->db			= $db;
		$this->template		= $template;
		$this->user			= $user;
		$this->php_ext		= $php_ext;
		$this->config_text	= $config_text;
		$this->auth			= $auth;
	}

	/**
	* Controller for route ts.php/ts.php and /ts
	*
	* @return Symfony\Component\HttpFoundation\Response A Symfony Response object
	*/
	public function base()
	{
		global $phpbb_root_path, $phpEx;

		// wird benötig um imges sauber zu laden
		global $phpbb_extension_manager, $phpbb_path_helper;
		$ext_path = $phpbb_path_helper->update_web_root_path($phpbb_extension_manager->get_extension_path('tecs/ts', true));

		if ($this->config['ts_loginset'] == true && $this->user->data['user_id'] == ANONYMOUS )
		{
			login_box();
		}

		// gruppen prüfung
		if($this->config['ts_groupset'] == true)
		{
			include_once($phpbb_root_path . 'includes/functions_user.' . $phpEx);

			// Nun erfolgt die eigentliche Prüfung:
			if ($this->auth->acl_get('u_ts_perm'))
			{
				// wenn eine Gruppenzugehörigkeiten gefunden ist
				require_once($phpbb_root_path .'ext/tecs/ts/inc/ts.' . $phpEx);
			}
			else
			{
				// wenn KEINE Gruppenzugehörigkeiten gefunden ist
				$this->template->assign_var('S_IN_GROUP', false); 
				$this->template->assign_vars(array(
				'TSINFO'		=> $this->user->lang('NOTS'),
				));
			}
		}
		else
		{
			// ausgabe wenn die gruppenprüfung aus ist
			require_once($phpbb_root_path .'ext/tecs/ts/inc/ts.' . $phpEx);
		}

		return $this->helper->render('page.html', $this->user->lang('TS'));
	}

	public function redirect()
	{
		redirect($this->helper->route('tecs_ts'));
	}

	
}