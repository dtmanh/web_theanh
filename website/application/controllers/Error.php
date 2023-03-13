<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Error extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    public function index() {
        $seo = array('title'=>'Lỗi không tìm thấy đường link' );
		$this->LoadHeader(null,$seo,false);
        $this->load->view('errors/error_404');
        $this->LoadFooter();
    }
}
