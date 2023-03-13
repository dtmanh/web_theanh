<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cats extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->check->is_logined($this->session->userdata('sessionUserAdmin'), $this->session->userdata('sessionGroupAdmin'))) {
            redirect(base_url() . 'techadmin', 'location');
            die();
        }
        $this->load->model('ordermodel');
        $this->load->library('pagination');
    }
    /*********************Shipping*******************/
    public function listShipping()
    {
        $data = array();
        $config['base_url'] = base_url('techadmin/list-shipping');
        $config['total_rows'] = $this->f_homemodel->count_All('shipping'); // xác định tổng số record
        $config['per_page'] = 10; // xác định số record ở mỗi trang
        $config['uri_segment'] = 3; // xác định segment chứa page number
        $this->pagination->initialize($config);
        $data['shipping'] = $this->f_homemodel->listAll('shipping',$config['per_page'], $this->uri->segment(3));
        $data['headerTitle']="Danh sách trang tĩnh";
        $this->load->view('admin/header',$data);
        $this->load->view('admin/shipping/shipping_list',$data);
        $this->load->view('admin/footer');
    }
    public function addShipping($id_edit = null)
    {
        $data['headerTitle']="shipping info";

        if($id_edit!=null){
            $data['edit']=$this->f_homemodel->getFirstRowWhere('shipping',array('id'=>$id_edit));
            $data['btn_name']='Cập nhật';
            $data['max_sort'] =$data['edit']->sort;
            //            $data['max_sort']=$data['edit']->sort;
        }
        else{
            $data['max_sort']=$this->f_homemodel->SelectMax('shipping','sort')+1;
        }

        if (isset($_POST['addshipping'])) {

            $name = $this->input->post('name');
            $price = $this->input->post('price');
            $sort = $this->input->post('sort');
            $cate = array(
                'name' => $name,
                'price' => $price,
                'sort'  => $sort
            );

            if(!empty($_POST['edit'])){
                //edit product category

                $id = $this->f_homemodel->Update_where('shipping',array('id'=>$id_edit),$cate);
            }else{
                //add product category
                $id = $this->f_homemodel->Add('shipping', $cate);
            }
            redirect(base_url('techadmin/list-shipping'));
        }
        $this->load->view('admin/header',$data);
        $this->load->view('admin/shipping/shipping_add',$data);
        $this->load->view('admin/footer');
    }
    public function deleteShipping($id)
    {
        $this->f_homemodel->Delete('shipping',$id);
        redirect($_SERVER['HTTP_REFERER']);
    }
    //change sort
    public function change_sort()
    {
        if ($this->input->post('id')) {
            $id=$this->input->post('id');
            $sort=$this->input->post('sort');
            $item        = $this->f_homemodel->get_data('shipping', array('id' => $id),array(),true);
            if($item){
                $this->f_homemodel->Update_where('shipping',array('id'=>$id),array('sort'=>$sort,));
            }
        }
    }
}