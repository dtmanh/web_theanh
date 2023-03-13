<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Order extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        
        $this->load->model('ordermodel');
        $this->load->library('pagination');
        if(!$this->check->is_logined($this->session->userdata('sessionUserAdmin'), $this->session->userdata('sessionGroupAdmin')))
        {
            redirect(base_url().'techadmin', 'location');
            die();
        }
    }
       protected $pagination_config= array(
        'full_tag_open'=>"<ul class='pagination pagination-sm'>",
        'full_tag_close'=>"</ul>",
        'num_tag_open'=>'<li>',
        'num_tag_close'=>'</li>',
        'cur_tag_open'=>"<li class='disabled'><li class='active'><a href='#'>",
        'cur_tag_close'=>"<span class='sr-only'></span></a></li>",
        'next_tag_open'=>"<li>",
        'next_tagl_close'=>"</li>",
        'prev_tag_open'=>"<li>",
        'prev_tagl_close'=>"</li>",
        'first_tag_open'=>"<li>",
        'first_tagl_close'=>"</li>",
        'last_tag_open'=>"<li>",
        'last_tagl_close'=>"</li>",
    );
    public function orders()
    {
		$this->check_acl();
		$data['list'] = $this->ordermodel->getFields('order','fullname,code,phone,email,time,status,id',array(),array('id' => 'desc'));
        
         $title = "Đơn đặt hàng";
            $this->LoadHeaderAdmin(false,$title);
        $this->load->view('admin/order/oder_list', $data);
        $this->load->view('admin/footer');
    }
    public function xoatatca() {
         $check_all = $this->input->post('check_all');
         
          if(count($check_all)){
          foreach($check_all as $key => $id)
          {          
            $this->ordermodel->Delete_where('order',array('id' => $id));

             $this->ordermodel->Delete_where('order_item',array('order_id'=>$id));
          }
          $this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
        }else{
              $this->session->set_flashdata("mess", "chưa chọn email xóa !");
               redirect($_SERVER['HTTP_REFERER']);
        }
    }
// xoa gio hang
	public function deletes()
        {
            //var_dump($this->input->post('checkone'));die;
            $ids = $this->input->post('checkone');

            foreach($ids as $id)
            {
                $this->delete_once($id);
            }
			$this->session->set_flashdata("mess", "Xóa thành công!");
            redirect($_SERVER['HTTP_REFERER']);
        }
	public function delete_once($id){
		$this->check_acl();
		$this->ordermodel->Delete_where('order',array('id' => $id));

		$this->ordermodel->Delete_where('order_item',array('order_id'=>$id));
        }
	public function delete($id){
		if (is_numeric($id)) {
			 $this->delete_once($id);
			$this->session->set_flashdata("mess", "Xóa thành công!");
			redirect($_SERVER['HTTP_REFERER']);
		} else return false;
	}

    public function update_order_status(){
        $id=$this->input->post('item');
        $rs=array();
        $rs['check']=false;
        $rs['status']='';

        $this->ordermodel->Update_where('order', array('id' => $id),array('status'=>$this->input->post('value')));

        $rs['check']=true;
        if($this->input->post('value')==1){
            $rs['status']='Hoàn thành';
            $rs['color']='success';
        }
        if($this->input->post('value')==2){
            $rs['status']='Đã hủy';
            $rs['color']='danger';
        }
        if($this->input->post('value')==0){
            $rs['status']='Chờ duyệt';
            $rs['color']='primary';
        }
        echo  json_encode($rs);
    }
	// popup hien thị don hang
	public function popupdata()
    {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $id   = $_GET['id'];
            $data['detail'] = $item = $this->ordermodel->getFirstRowWhere('order', array('id' => $id));
             $data['province'] = $this->ordermodel->getFirstRowWhere('province',array('id'=>$data['detail']->province));
               $data['district'] = $this->ordermodel->getFirstRowWhere('district',array('id'=>$data['detail']->district));
			$data['id']='id';
			$data['detail_order'] = $this->ordermodel->get_data('order_item',array(
			'order_id' => $id
			),array('id' => 'desc'));
			$this->load->view('admin/modal/view_order',$data);
          //json_encode($rs);
        }
    }

        
// danh sach ma giam gia
    public function listSale()
    {
        $this->check_acl();
        $data['list'] = $this->ordermodel->getFields('code_sale','name,id,code,price',array());
        
         $title = "Danh mục sản phẩm";
            $this->LoadHeaderAdmin(false,$title);
        $this->load->view('admin/products/product_sale/list', $data);
        $this->load->view('admin/footer');
    }
// them ma giam gia
  public function addSale(){
        $this->add_edit_Sale();
    }
      public function editsale($id){
        $this->add_edit_Sale($id);
    }
public function add_edit_Sale($id_edit=null)
    {
        $this->check_acl();
        $data['btn_name']='Thêm';
        if($id_edit!=null){
            $data['edit']=$this->ordermodel->get_data('code_sale',array('id'=>$id_edit),array(),true);
            $data['btn_name']='Cập nhật';
        }
        if (isset($_POST['addnews'])) {
            $arr = array(
                'name' => $this->input->post('name'),
                'code' => $this->input->post('code'),
                'price' => $this->input->post('price'),
            );
            if (!empty($_POST['edit'])){
                $id = $this->ordermodel->Update_where('code_sale', array('id'=>$id_edit), $arr);
                $this->session->set_flashdata("mess", "Cập nhật thành công!");
            } else {
                $id = $this->ordermodel->Add('code_sale', $arr);
                $this->session->set_flashdata("mess", "Thêm mới thành công!");
            }
            redirect(base_url('techadmin/product_sale/listSale'));
        }

        
         $title = "".$data['btn_name']."&nbsp"."mã giảm giá";
            $this->LoadHeaderAdmin(false,$title);
        $this->load->view('admin/products/product_sale/add', $data);
        $this->load->view('admin/footer');
    }
   
    public function deletes_sale(){
        $ids = $this->input->post('checkone');
        foreach($ids as $id)
        {
            $this->del_once_sale($id);
        }
        $this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function del_once_sale($id){
        $this->check_acl();
        $this->ordermodel->Delete_where('code_sale',array('id' => $id));
    }
    public function deletesale($id)
    {
        if (is_numeric($id)&&$id>1) {
            $this->del_once_sale($id);
            $this->session->set_flashdata("mess", "Xóa mã giảm giá thành công!");
            $_SESSION['mess']='Xóa danh mục thành công!';
        }
        redirect($_SERVER['HTTP_REFERER']);
    }
// quan ly phi van chuyen ship
    public function listProvince()
    {
        $this->check_acl();
        $data['list'] = $this->ordermodel->getFields('province','id,name',array(
        ),array('sort' => 'desc'));
        
         $title = "Quản lý phí vận chuyển";
            $this->LoadHeaderAdmin(false,$title);
        $this->load->view('admin/province/list', $data);
        $this->load->view('admin/footer');
    }
    public function taihoso()
    {

$this->load->library('pdf');

$data = array();
        $id=$this->input->post('id');
       $data['detail']=$this->system_model->getFirstRowWhere('order',array('id'=>$id));
        $name = make_alias($data['detail']->code).'.pdf';
        
            $data['detail_order'] = $this->system_model->get_data('order_item',array(
                'order_id' => $id
                ),array('id' => 'desc'));
       //  var_dump($data['item']);
       //  $this->load->view('ungvien/manh',$data);
        $this->load->view('admin/modal/tai_pdf',$data);
    $body = $this->output->get_output();
$html= <<<HTML
$body
HTML;
$this->pdf->loadHtml($html);
// (Optional) Setup the paper size and orientation
$this->pdf->setPaper('A4', 'letter');
// Render the HTML as PDF
$this->pdf->render();
// Output the generated PDF to Browser
//$dompdf->stream();
// Output the generated PDF (1 = download and 0 = preview)
$this->pdf->stream($name,array("Attachment"=>1));
}

    
}