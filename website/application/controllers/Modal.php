<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/facebook/facebook.php';

class Modal extends MY_Controller {
    function __construct()
    {
        parent::__construct();
    }
     public function login(){
        $data = array();
          $this->load->helper('unlink');
        unlink_captcha($this->session->userdata('sessionPathCaptchaPostAds'));
        #BEGIN: Create captcha post ads
        $this->load->library('captcha');
        $codeCaptcha = $this->captcha->code(5);
        $this->session->set_userdata('sessionCaptchaPostAds', $codeCaptcha);
        $imageCaptcha = 'assets/captcha/'.md5(microtime()).'posa.jpg';
        $this->session->set_userdata('sessionPathCaptchaPostAds', $imageCaptcha);
        $this->captcha->create($codeCaptcha, $imageCaptcha);
        if(file_exists($imageCaptcha))
        {
            $data['imageCaptchaPostAds'] = $imageCaptcha;
            $data['captcha_check'] = $codeCaptcha;
        }
        $data['tinh'] =  $this->system_model->get_data('province',null,null);
        $data['code_captcha'] = $codeCaptcha;
        $data['formkey'] = $formkey =  rand();
        $this->session->set_userdata('formkey',$formkey);
        $this->load->view('modal/view_login',$data);
    }
// dang kys thanh vien
    public function register(){
        $this->load->helper('unlink');
        unlink_captcha($this->session->userdata('sessionPathCaptchaPostAds'));
        #BEGIN: Create captcha post ads
        $this->load->library('captcha');
        $codeCaptcha = $this->captcha->code(5);
        $this->session->set_userdata('sessionCaptchaPostAds', $codeCaptcha);
        $imageCaptcha = 'assets/captcha/'.md5(microtime()).'posa.jpg';
        $this->session->set_userdata('sessionPathCaptchaPostAds', $imageCaptcha);
        $this->captcha->create($codeCaptcha, $imageCaptcha);
        if(file_exists($imageCaptcha))
        {
            $data['imageCaptchaPostAds'] = $imageCaptcha;
            $data['captcha_check'] = $codeCaptcha;
        }
        $data['tinh'] =  $this->system_model->get_data('province',null,null);
        $data['code_captcha'] = $codeCaptcha;
        $data['formkey'] = $formkey =  rand();
        $this->session->set_userdata('formkey',$formkey);
        $this->load->view('modal/view_register',$data);
    }
 // refesh ma cap cha
    public function capchar_refresh(){
        $this->load->helper('unlink');
        unlink_captcha($this->session->userdata('sessionPathCaptchaPostAds'));
        #BEGIN: Create captcha post ads
        $this->load->library('captcha');
        $codeCaptcha = $this->captcha->code(5);
        $this->session->set_userdata('sessionCaptchaPostAds', $codeCaptcha);
        $imageCaptcha = 'assets/captcha/'.md5(microtime()).'posa.jpg';
        $this->session->set_userdata('sessionPathCaptchaPostAds', $imageCaptcha);
        $this->captcha->create($codeCaptcha, $imageCaptcha);
        if(file_exists($imageCaptcha))
        {
            $data['imageCaptchaPostAds'] = $imageCaptcha;
            $data['captcha_check'] = $codeCaptcha;
        }
        $data['code_captcha'] = $codeCaptcha;
        $this->load->view('modal/capchar_refresh', $data);
    }
  // thay đổi mật khẩu
    public function changePass()
    {
        $this->load->view('modal/view_changepass');
    }
// thong tin tai khoan
    public function userInfo()
    {
        if($this->session->userdata('userid')){
            @$u=$this->system_model->getFirstRowWhere('users',array('id'=>$this->session->userdata('userid')));
            $data['user_item'] = $u;
        }
        $this->load->view('modal/view_userinfo',$data);
    }
// thong tin san pham
    public function product(){
        $data = array();
        $id = $_POST['id'];
        $data['item'] = $this->system_model->getFirstRowWhere('product',array(
            'id' => $id
        ));
        $this->load->view('modal/modal_product',$data);
    }
// quên mật khâu
    function forgotPass()
    {
        $data = array();
        $this->load->view('modal/view_forgot_pass',$data);
    }
// get modal city
     public function get_city(){
        $data = array();
        $data['city'] =  $this->system_model->get_data('province',null,null);
         $this->load->view('modal/modal_city',$data);
    }

    //demo rao vat    
     public function chon_city(){
        $data = array();
        $id_city = $_POST['id_city'];
        $data['cat_id'] = $_POST['cat_id'];
        $data['dis'] = $this->system_model->get_data('district',array(
                'provinceid' => $_POST['id_city'],
            ));
        $this->load->view('modal/modal_district',$data);
    }
     public function get_modcategory(){
        $data = array();
        $data['cat_id'] = $_POST['cat_id'];
        $data['cattegory'] = $this->system_model->get_data('product_category',array('parent_id' => 0));        
        $this->load->view('modal/modal_category',$data);
    }
     public function get_modcategory_parent(){
        $data = array();
        $data['cat_id'] = $_POST['cat_id'];
        $data['cattegory_parent'] = $this->system_model->get_data('product_category',array('parent_id' => $_POST['cat_id']));
        $this->load->view('modal/modal_category_parent',$data);
    }

      public function chon_category(){
        $data = array();
        $data['cat_id'] = $_POST['id_category'];
        $data['category'] = $this->system_model->getFirstRowWhere('product_category',array(
                'id' => $_POST['id_category'],
                'parent_id' => 0,
            ));
        $data['cat_alias'] = @$data['category']->alias;
        echo json_encode($data);
    }
      public function direct_cat(){
        $data = array();
        $data['cat_id'] = $_POST['cat_id'];
        $data['cat_parent'] = $this->system_model->getFirstRowWhere('product_category',array(
                'id' => $_POST['cat_id'],
            ));
        $data['cat_alias'] = @$data['cat_parent']->alias;

        echo json_encode($data);
    }
    // hiên thị các thuoc tinh trong hang
     public function chon_hang(){
        $data = array();
        $data['hang_id'] = $_POST['hang_id'];
        $data['hang'] = $this->system_model->getFirstRowWhere('product_locale',array(
                'lang' => $this->language,
                'id' =>$_POST['hang_id'],
            ),array());
        $data['thuoctinh'] = $this->system_model->get_data('product_size',array('parent_id' => $_POST['hang_id']));     
        $this->load->view('modal/get_thuoctinh',$data);
    }
     public function get_mod_loc2(){
        $data = array();        
        $data['location'] =$_POST['id_dis'];
        $data['cat_loc_curent'] = $this->system_model->getFirstRowWhere('product_category',array(
                'id' => $_POST['cat_id'],
            ));        
        if($data['cat_loc_curent']->parent_id==0){
             $data['cat'] = $this->system_model->get_data('product_category',array(
                'parent_id' => $_POST['cat_id'],
            ));
        }else{
             $data['cat'] = $this->system_model->get_data('product_category',array(
                'parent_id' => $data['cat_loc_curent']->parent_id,
            ));
             // hien thi danh sách hãng thuoc danh muc con
            $data['hang_id'] = $this->system_model->getField('product_to_brand','brand_id',array(
                'id_category' =>$data['cat_loc_curent']->id,
            ),array());
           
           
            if(isset($_POST['hang_id'])){
                 $data['brand_id'] =$_POST['hang_id'];
                // danh sach hãng
                $data['hang_list_loc2'] = $this->system_model->get_hang($data['hang_id']->brand_id);
                 // danh sach thuoc tinh cua hang
                $data['dstt'] = $this->system_model->get_data('product_size',array(
                    'parent_id' => $_POST['hang_id'],
                ),array(),false); 
                // id cua thuoc tinh con
                if(isset($_POST['thuoctinh_id'])){
                    $data['thuoctinh_id'] =$_POST['thuoctinh_id'];         
                }
            }

            if(isset($_POST['array_con'])){  
               $data['mang_thuoctinh'] = explode(",",$_POST['array_con']);   
            }
           
            $data['tt_color'] = $this->system_model->get_cat_color($data['cat_loc_curent']->id);
            foreach ($data['tt_color'] as $key => $cat) {
             $data['tt_color'][$key]->ttp_color = $this->system_model->get_data('product_price',array(
                'parent_id' => $cat->id,
                ),array(),false);
            }

         
        }

        // gia trị đăng bơi
        if(isset($_POST['type'])){          
            $array_type = explode(",",$_POST['type']);
            $data['canhan'] =$array_type[0];
            $data['cuahang'] =$array_type[1];
        }
        // loai tin can mua hay ban 
         if(isset($_POST['buy'])){          
            $array_buy = explode(",",$_POST['buy']);
            $data['canban'] =$array_buy[0];
            $data['canmua'] =$array_buy[1];
        }
        // gia trị sắp xếp
        if(isset($_POST['sort'])){          
            $data['chon_sort'] =$_POST['sort'];
        }

         //var_dump($data['cat']);die;
        $this->load->view('modal/modal_loc',$data);
    }
    public function get_modal_loc_category(){
        $data = array();
        
        $data['cat_loc_parent'] = $this->system_model->get_data('product_category',array(
                'parent_id' => $_POST['id_cat'],
            ));
       // var_dump($_POST['id_cat']);die;
        //var_dump($data['cat_loc_parent']);die;

        $this->load->view('modal/get_modal_loc_category',$data);
    }
}
