<?php
/**
*
* This file is part of the Teamspeak-Viewer_EXT for phpBB 3.1.x Forum Software
*
* @copyright (c) 2015 Tecs (http:\\area51.gdrr.info) & TimoMF (http://hard-soft.meyer-franke.com)
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace tecs\ts\event;

/**
* @ignore
*/
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
* Event listener
*/
class main_listener implements EventSubscriberInterface
{
	static public function getSubscribedEvents()
	{
		return array(
			'core.user_setup'						=> 'load_language_on_setup',
			'core.page_header'						=> 'add_page_header_link',
			'core.viewonline_overwrite_location'	=> 'add_ts_viewonline',
			'core.index_modify_page_title'			=> 'add_ts_view_index',
		);
	}

	/* @var \phpbb\config\config */
	protected $config;

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
	* @param \phpbb\controller\helper	$helper		Controller helper object
	* @param \phpbb\db\driver\driver_interface $db	Database object
	* @param \phpbb\template			$template	Template object
	* @param string						$php_ext	phpEx
	*/
	public function __construct(\phpbb\config\config $config, \phpbb\controller\helper $helper, \phpbb\db\driver\driver_interface $db, \phpbb\template\template $template, \phpbb\user $user, $php_ext, \phpbb\auth\auth $auth)
	{
		$this->config	= $config;
		$this->helper	= $helper;
		$this->template	= $template;
		$this->user		= $user;
		$this->php_ext	= $php_ext;
		$this->auth		= $auth;
	}

	public function load_language_on_setup($event)
	{	
		$lang_set_ext = $event['lang_set_ext'];
		$lang_set_ext[] = array(
			'ext_name' => 'tecs/ts',
			'lang_set' => 'common',
		);
		$event['lang_set_ext'] = $lang_set_ext;
	}

	public function add_page_header_link($event)
	{
		$this->template->assign_vars(array(
			'U_TS'	=> $this->helper->route('tecs_ts'),
			'TSLINK_ENABLE'	=> $this->config['ts_link_enable'],
		));
	}
	
	public function add_ts_view_index($eventindex)
	{
		if ($this->config['ts_loginset'] == true && $this->user->data['user_id'] == ANONYMOUS )
		{
			$this->template->assign_var('S_IN_GROUP', false); 
		}
		else
		{
			global $phpbb_root_path,$phpEx;	
			if (($this->config['ts_index_count'] == true || $this->config['ts_index_client'] == true) && $this->config['ts_groupset'] == true )
			{
				include_once($phpbb_root_path . 'includes/functions_user.' . $phpEx);
				if ($this->auth->acl_get('u_ts_perm'))
				{
					$this->template->assign_var('S_IN_GROUP', true); 
					require_once($phpbb_root_path .'ext/tecs/ts/inc/ts_index.'.$phpEx);
				}
				else
				{
					$this->template->assign_var('S_IN_GROUP', false); 
				}	
			}	
			else
			{	
				if (($this->config['ts_index_count'] == true || $this->config['ts_index_client'] == true) && $this->config['ts_groupset'] == false )
				{	
					$this->template->assign_var('S_IN_GROUP', true); 
					require_once($phpbb_root_path .'ext/tecs/ts/inc/ts_index.'.$phpEx);
				}
				else
				{
					$this->template->assign_var('S_IN_GROUP', false); 
				}		
			}
		}	
	}
	
	public function add_ts_viewonline($event)
	{
		if ($event['row']['session_page'] === 'app.' . $this->php_ext . '/teamspeak-viewer' ||
			$event['row']['session_page'] === 'app.' . $this->php_ext . '/teamspeak-viewer.php')
		{
				$event['location'] = $this->user->lang('VIEWONLINE_TS');
				$event['location_url'] = $this->helper->route('tecs_ts');
		}
	}
}
