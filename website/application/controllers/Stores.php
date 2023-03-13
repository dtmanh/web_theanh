<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Stores extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('f_homemodel');
        $this->load->library('pagination');
    }
    public function listStore(){
        $data = array();
        $data['maps'] = $this->f_homemodel->get_data('map_shopping');
        $seo = array(
            'title' => 'Chuỗi cửa hàng'
        );
        $id = $this->input->get('id');
        $map = '';
        if($id !=null){
            $map = $this->f_homemodel->getFirstRowWhere('map_shopping',array(
                'id' => $id
            ));
        }
        $data['map']= $map;
        $this->LoadHeader(null,$seo,true);
        $this->load->view('stores/list',$data);
        $this->LoadFooter();
    }
    public function getMapById(){
        $data = array();
        $id = $this->input->post('id');
        $data['map'] = $this->f_homemodel->getFirstRowWhere('map_shopping',array(
            'id' => $id
        ));
        $this->load->view('stores/view_map',$data);
    }
}