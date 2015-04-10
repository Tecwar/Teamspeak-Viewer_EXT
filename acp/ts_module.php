<?php
/**
*
* This file is part of the Teamspeak-Viewer_EXT for phpBB 3.1.x Forum Software
*
* @copyright (c) 2015 Tecs (http:\\area51.gdrr.info) & TimoMF (http://hard-soft.meyer-franke.com)
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace tecs\ts\acp;

class ts_module
{
	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\request\request */
	protected $request;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	public $u_action;

	public function main($id, $mode)
	{
		global $user, $template, $request, $config, $phpbb_log, $phpbb_root_path;

		$this->config = $config;
		$this->request = $request;
		$this->template	= $template;
		$this->user = $user;

		$this->tpl_name	= 'ts_settings';
		$this->page_title = $user->lang('TS_EXT_MANAGE');
		$form_key = 'ts';
		$ts_cache_path = $phpbb_root_path.'/cache/';
		add_form_key($form_key);

		if ($this->request->is_set_post('submit'))
		{
			if (!check_form_key($form_key))
			{
				trigger_error($this->user->lang('FORM_INVALID') . adm_back_link($this->u_action), E_USER_WARNING);
			}

			$this->config->set('ts_loginset', $this->request->variable('ts_loginset', 0));
			$this->config->set('ts_groupset', $this->request->variable('ts_groupset', 0));
			$this->config->set('ts_host', $this->request->variable('ts_host', ''));
			$this->config->set('ts_query', $this->request->variable('ts_query', ''));
			$this->config->set('ts_voice', $this->request->variable('ts_voice', ''));
			$this->config->set('ts_user', $this->request->variable('ts_user', ''));
			if ($this->request->variable('ts_qpass', '') !== 'entered_no_changes') 
			{	
				$this->config->set('ts_qpass', $this->request->variable('ts_qpass', ''));
			}
			$this->config->set('ts_pass', $this->request->variable('ts_pass', ''));
			$this->config->set('ts_loginip', $this->request->variable('ts_loginip', ''));
			$this->config->set('ts_banner', $this->request->variable('ts_banner', 0));
			$this->config->set('ts_tsloginbutton', $this->request->variable('ts_tsloginbutton', 0));
			$this->config->set('ts_wknachricht', $this->request->variable('ts_wknachricht', 0));
			$this->config->set('ts_clogindaten', $this->request->variable('ts_clogindaten', 0));
			$this->config->set('ts_uptime', $this->request->variable('ts_uptime', 0));
			$this->config->set('ts_count', $this->request->variable('ts_count', 0));
			$this->config->set('ts_index_client', $this->request->variable('ts_index_client', 0));
			$this->config->set('ts_index_count', $this->request->variable('ts_index_count', 0));
			$this->config->set('ts_cache_delay', $this->request->variable('ts_cache_delay', 0));
			$this->config->set('ts_link_enable', $this->request->variable('ts_link_enable', 0));
			$phpbb_log->add('admin', $this->user->data['user_id'], $this->user->ip, 'TS_LOG');
			trigger_error($user->lang['CONFIG_UPDATED'] . adm_back_link($this->u_action));
		}
		
		if($this->request->is_set_post('action_purge_cache'))
		{
			if (!check_form_key($form_key))
			{
				trigger_error($user->lang('FORM_INVALID') . adm_back_link($this->u_action), E_USER_WARNING);
			}
			$handle = opendir($ts_cache_path);
			while (false !== ($file = readdir($handle))) 
			{
				if(is_file($ts_cache_path . $file) and (substr($file, 0, 3) == 'ts_'))
				{
					unlink($ts_cache_path . $file);
				}
			}
			trigger_error($user->lang('TS_CACHE_PURGE_SUCCESS') . adm_back_link($this->u_action));	
		}

		$this->template->assign_vars(array(
			'ts_loginset'			=> isset($this->config['ts_loginset']) ? $this->config['ts_loginset'] : '',
			'ts_groupset'			=> isset($this->config['ts_groupset']) ? $this->config['ts_groupset'] : '',
			'ts_host'			=> isset($this->config['ts_host']) ? $this->config['ts_host'] : '',
			'ts_query'			=> isset($this->config['ts_query']) ? $this->config['ts_query'] : '',
			'ts_voice'			=> isset($this->config['ts_voice']) ? $this->config['ts_voice'] : '',
			'ts_user'			=> isset($this->config['ts_user']) ? $this->config['ts_user'] : '',
			'ts_qpass'			=> 'entered_no_changes',
			'ts_pass'			=> isset($this->config['ts_pass']) ? $this->config['ts_pass'] : '',
			'ts_loginip'			=> isset($this->config['ts_loginip']) ? $this->config['ts_loginip'] : '',
			'ts_banner'			=> isset($this->config['ts_banner']) ? $this->config['ts_banner'] : '',
			'ts_tsloginbutton'		=> isset($this->config['ts_tsloginbutton']) ? $this->config['ts_tsloginbutton'] : '',
			'ts_wknachricht'		=> isset($this->config['ts_wknachricht']) ? $this->config['ts_wknachricht'] : '',
			'ts_clogindaten'		=> isset($this->config['ts_clogindaten']) ? $this->config['ts_clogindaten'] : '',
			'ts_uptime'			=> isset($this->config['ts_uptime']) ? $this->config['ts_uptime'] : '',
			'ts_count'			=> isset($this->config['ts_count']) ? $this->config['ts_count'] : '',
			'ts_index_client'		=> isset($this->config['ts_index_client']) ? $this->config['ts_index_client'] : '',
			'ts_index_count'		=> isset($this->config['ts_index_count']) ? $this->config['ts_index_count'] : '',
			'ts_cache_delay'		=> isset($this->config['ts_cache_delay']) ? $this->config['ts_cache_delay'] : '',
			'ts_link_enable'		=> isset($this->config['ts_link_enable']) ? $this->config['ts_link_enable'] : '',
			'TS_LINK_ENABLE_EXPLAIN'	=> $user->lang('TS_LINK_ENABLE_EXPLAIN', $this->config['server_protocol'] . $this->user->host . $this->config['script_path'] . '/teamspeak-viewer' ),
			'U_ACTION'			=> $this->u_action,
		));

	}
}
