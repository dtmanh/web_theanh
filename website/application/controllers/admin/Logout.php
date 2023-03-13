<?php
#****************************************#
# * @Author: tshopdn                     #  
# * @Email: lvcuong2@gmail.com           #
# * @Website: http://www.tshopdn.com     #
# * @Copyright: 2008 - 2009              #
#****************************************#
class Logout extends MY_Controller
{
	function __construct()
	{
        parent::__construct();
		#BEGIN: CHECK LOGIN
		if(!$this->check->is_logined($this->session->userdata('sessionUserAdmin'), $this->session->userdata('sessionGroupAdmin')))
		{
			redirect(base_url().'techadmin', 'location');
			die();
		}
		#END CHECK LOGIN
	}
	
	function index()
	{
		//$this->session->sess_destroy();
        $this->session->unset_userdata('sessionUserAdmin');
		redirect(base_url().'techadmin', 'location');
	}
}