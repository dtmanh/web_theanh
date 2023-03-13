<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Store extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('system_model');
        if(!$this->check->is_logined($this->session->userdata('sessionUserAdmin'), $this->session->userdata('sessionGroupAdmin')))
        {
            redirect(base_url().'techadmin', 'location');
            die();
        }
    }
	public function list_shopping(){

        $data['list'] = $this->system_model->getFields('map_shopping','id,title,diachi_shop,phone',array(
            'lang' => $this->language
        ),array('id' => 'desc'));
        
        $title = 'Danh sách cửa hàng';
        $this->LoadHeaderAdmin(false,$title);
        $this->load->view('admin/stores/list', $data);
        $this->load->view('admin/footer');
    }
    public function add()
    {
        $this->add_edit();
    }
    public function edit($id)
    {
        $this->add_edit($id);
    }
	public function add_edit($id=null){
        $data = array();
		$data['btn_name']='Thêm';
        if($id){
            $data['row'] = $row=$this->system_model->get_data('map_shopping',array(
                'id'=>$id,
                'lang' => $this->language
            ),array(),true);
			$data['btn_name']='Cập nhật';
        }

        //$row=$this->Googlemapmodel->getFirstRow('site_option');
        if (isset($_POST['addnews'])) {
            $array = array("(", ")");
             $b="(".$this->input->post('lati').",".$this->input->post('long').")";
            $arr=array(
                'title' => $this->input->post('title'),
                'toa_domap'            => $b,
                'tim_kiem'            => $this->input->post('dia_chi_timkiem'),
                'diachi_shop'            => $this->input->post('diachi_shop'),
                'phone'            => $this->input->post('phone'),
                'lat'            => $this->input->post('lati'),
                'long'            => $this->input->post('long'),
                'toa_dohienthi'            => str_replace($array,'',$this->input->post('hdfMap')),
                'lang' => $this->language
            );

            if($id){
                //update news
                $this->system_model->Update_where('map_shopping', array('id'=>$id),$arr);
				$_SESSION['mess']='Cập nhật thành công!';
            }else{
                //add news
                $rs = $this->system_model->Add('map_shopping', $arr);
				$_SESSION['mess']='Thêm mới thành công!';
            }
            redirect(base_url('techadmin/store/list_shopping'));
        }else{
			$_SESSION['mess_err']='Thêm mới không thành công!';
		}

        
       $this->LoadHeaderAdmin(false);
        $this->load->view('admin/stores/add', $data);
        $this->load->view('admin/footer');
    }
     
	public function deletes(){
        $ids = $this->input->post('checkone');
        foreach($ids as $id)
        {
            $this->delete_once($id);
        }
		$_SESSION['mess']='Xóa thành công!';
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function delete_once($id)
    {
		// xoa ban ghi trong map_shopping
		$this->system_model->Delete_where('map_shopping',array('id' => $id));
    }
	// xoa ban ghi
    public function delete($id){

		$this->system_model->Delete_where('map_shopping',array('id' => $id));
		$_SESSION['mess']='Xóa thành công!';
        redirect($_SERVER['HTTP_REFERER']);
    }

}