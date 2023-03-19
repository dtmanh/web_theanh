<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
    class MY_Controller extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
			$CI =& get_instance();
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $this->load->model('system_model');
			$this->load->model('visitormodel', 'vm');
            $this->load->helper('language');
			$this->load->helper('url');
            //language

            $weblang=array('vi'=>'vietnamese','en'=>'english');

            if($this->session->userdata('lang')&&$this->session->userdata('lang')!=null){
                $lang=$weblang[$this->session->userdata('lang')];

                $this->lang->load($this->session->userdata('lang'), $lang);
            }else{
                $this->session->set_userdata('lang','vi');
                $lang=$weblang[$this->session->userdata('lang')];
                $this->lang->load($this->session->userdata('lang'), $lang);
            }
			$this->language = $this->session->userdata('lang');
			$this->config->set_item('language', $lang);
			$this->lang->load('upload',$lang);
			$this->lang->load('customer',$lang);
			if($this->session->userdata('sessionPathCaptchaPostAds')){
                @unlink($this->session->userdata('sessionPathCaptchaPostAds'));
            }
			if($this->session->userdata('sessionCaptchaPostAds')){
				@unlink($this->session->userdata('sessionCaptchaPostAds'));
			}

            $this->option = $this->system_model->getFirstRowWhere('site_option',array(
                'lang' => $this->language
            ));
			if($this->session->userData('userData')){
				$user = $this->session->userData('userData');
			}
            $count = 0;
           if($this->cart->contents()){
              $count = $this->cart->total_items();
           }
            $this->count_cart= $count;

            // so nguoi online
            $time = date('Y-m-d');
            $homnay = strtotime($time);
            $homqua = strtotime( date('Y-m-d',strtotime('-1 day')));
            $tuantruoc = strtotime( date('Y-m-d',strtotime('-7 day')));
            
            
            $this->update_thongke($homnay);
            $this->today=$this->system_model->getField('thong_ke_online','today',array('access_date'=>$homnay));
            $this->yesterday=$this->system_model->getField('thong_ke_online','today',array('access_date'=>$homqua));
            
            $this->last_week=$this->system_model->get_last_week();
            $this->total_day=$this->system_model->get_total_day();
            $this->total_view=$this->system_model->get_total_view();

            // hien thi da ngon ngu
			$this->config_language = $this->system_model->get_data('site_option',array('name_language !='=>'','active'=>1),array('id' => 'asc'));
             // hien thi hostline ben trai hoac ben phai website
            $this->config_hotline = $this->system_model->getFirstRowWhere('config_checkpro',array('type' => 'hotline','field'=>'hotline','active' => 1));
             // hien thi chat fanpage facebook
            $this->config_chatfanpage = $this->system_model->getFirstRowWhere('config_checkpro',array('type' => 'hotline','field'=>'chat_fanpage','active' => 1));
             $this->config_chiase = $this->system_model->getFirstRowWhere('config_checkpro',array('type' => 'hotline','field'=>'shase','active' => 1));

             $this->config_site = $this->system_model->get_data('site_option',array('name_language !='=>'','color'=>1),array('id' => 'asc'));

        }
        public function LoadHeader($view,$seo=array(),$show_slider=false)
        {
            $data  = array();
          
            $data['count'] = $this->count_cart;        
            
            /*begin slide_header*/$data['search'] = $this->load->widget('search');/*end slide_header*/
            /*begin slide_header*/$data['slide'] = $this->load->widget('slide');/*end slide_header*/
            /*begin load left*/$data["home_left"] = $this->load->widget("home_left");/*end load left*/
            /*begin load menu*/$data["menu_top"] = $this->load->widget("menu_top");/*end load menu*/
            /*begin load menu*/$data["menu_main"] = $this->load->widget("menu_main");/*end load menu*/
            /*begin load menu*/$data["menu_tag"] = $this->load->widget("menu_tag");/*end load menu*/
            $data['seo']=$seo;
           
            if($view == null)
            {
                $this->load->view('common/header', $data);
            }
            else{
                $this->load->view($view,$data);
            }
        }
         public function LoadHeaderSupport($view,$seo=array(),$show_slider=false)
        {
            $data  = array();
          
            $data['count'] = $this->count_cart;
        
                $data['menu_main_root'] = $this->system_model->getFields('menu','seturl,name,url,id,image',array('position'=>'main','parent_id'=>0,'lang' => $this->language),
                   array('sort'=>'')
               );
            foreach ($data['menu_main_root'] as $key => $cat) {
                $data['menu_main_root'][$key]->menu_sub =  $this->system_model->getFields('menu','seturl,name,url,id',array( 'position'=>'main',
                'parent_id ='=>$cat->id,
                'lang' => $this->language),
                    array('sort'=>''));
            }
       
            if($show_slider==true){
                $data['slide'] = $this->load->widget('slide');
            }else{
                $data['slide']='';
            }
            $data['seo']=$seo;
            if($view == null)
            {
                $this->load->view('common/header_support', $data);
            }
            else{
                $this->load->view($view,$data);
            }
        }

        public function LoadFooter($view = null)
        {
            $this->load->helper('webcounter_helper');
            $data = array();
            $data['config_chiase'] = $this->system_model->getFirstRowWhere('config_checkpro',array('type' => 'hotline','field'=>'shase','active' => 1));
            $data['menu_bottom'] = $this->system_model->getFields('menu','url,name,id',array('position'=>'bottom','parent_id'=>0,'lang' => $this->language),
                array('sort'=>''),false,1,0
            );
            foreach ($data['menu_bottom'] as $key => $menu_bottom) {
                $data['menu_bottom'][$key]->sub_menu_1 = $this->system_model->getFields('menu','url,name,id',
                    array('position'=>'bottom',
                        'parent_id'=>$menu_bottom->id,
                        'lang' => $this->language
                    ),
                array('sort'=>''),false,20,0
                );
            }
 

            if($view == null)
            {
                $this->load->view('common/footer', $data);
            }
            else{
                $this->load->view($view,$data);
            }
        }

		public function LoadHeaderAdmin($data=false,$title=null)
        {
          
			$data = array();
			$data['admin'] = $admin = $this->session->userdata('adminfull');
            $access=$this->system_model->get_data('access',array('user_id'=>$this->session->userdata('adminid')),array(),true);
			$data['u_access'] = (array)json_decode(@$access->access);
             if($this->session->userdata('adminid') ==1){
                $data['resources'] = $this->system_model->get_data('resources',array('parent_id' => 0,'active'=>1),array('sort'=>'asc'));
                foreach ($data['resources'] as $key => $cat) {
                    $data['resources'][$key]->cat_sub =  $this->system_model->get_data('resources',array(
                    'parent_id' => $cat->id,
                    'active'=>1
                    ),array('sort' => 'asc'));
                }
            }else{
                $data['resources'] = $this->system_model->get_data('resources',array('parent_id' => 0,'active' => 1),array('sort'=>'asc'));
                foreach ($data['resources'] as $key => $cat) {
                    $data['resources'][$key]->cat_sub =  $this->system_model->get_data('resources',array(
                    'parent_id' => $cat->id,
                    'active'=>1
                    ),array('sort' => 'asc'));
                }
            }
            $this->session->set_userdata('phanquyen',$data['resources']);
            $data['item_email'] = $this->system_model->Count('emails');
            $data['item_contact'] = $this->system_model->Count('contact');
            $data['item_member'] = $this->system_model->Count('users',array('lever'=>1));
            $data['item_order'] = $this->system_model->Count('order',array('status'=>1));
            $data['item_news'] = $this->system_model->Count('news',array('active'=>1));
            $data['item_pro'] = $this->system_model->Count('product',array('active'=>1));
            $data['item_comment'] = $this->system_model->Count('comments_binhluan',array('review'=>1));

            $data['config_language'] = $this->system_model->get_data('site_option',array('active'=>1,),array('id' => 'asc'));

            if(empty($title)){
                $data['headerTitle'] ='Quản trị admin';
            }else{
                $data['headerTitle'] =$title;
            }
			$this->load->view('admin/header', $data);
		}
        public function LoadHeaderPm($data=false,$giaodien=null)
        {
            $data = array();
            $khung_css = read_file('application/config/database.php');      
            $khung_css = read_file('application/config/database.php');      
            $string_begin = '/*'.'begin database old*/';
            $string_end = '/*'.'end database old*/';
            $vitri1 =  strpos($khung_css, $string_begin )+strlen($string_begin);
            $vitri2 = strpos($khung_css, $string_end );
             $chuoi_tim = substr( $khung_css,  $vitri1, ($vitri2-$vitri1));
            $tim1 = "'database' => '";
            $tim2 = "'dbdriver'";
            $vt1 =  strpos($chuoi_tim, $tim1 )+strlen($tim1);
            $vt2 = strpos($chuoi_tim, $tim2);
            $chuoi_tim2 = substr( $chuoi_tim,  $vt1, ($vt2-$vt1));
            $chuoi_tim3 = str_replace("',", "", $chuoi_tim2);
            $data['name_db'] = $name_db =RTRIM($chuoi_tim3);
            $data['total_image']  = count( glob("giaodien/header/*", GLOB_ONLYDIR) );
            $data['arr_db'] = json_decode(read_file('map_upload.json'));
            $data['giaodien'] = $giaodien;           
            $this->load->view('pm/header', $data);
        }
        public function LoadFooterPm($data=false,$giaodien=null)
        {
            $data = array();
            $data['giaodien'] = $giaodien;           
            $this->load->view('admin/footer', $data);
        }
//========== check phan quyen modul ====================================================================
		public function check_acl()
        {
            $this->zend->load('Zend_Acl');
            $module = $this->router->fetch_module();
            $controller = $this->router->fetch_class();
            $action = $this->router->fetch_method();
            $user_id = $this->session->userdata('adminid');
			$level = $this->session->userdata('adminfull')->lever;
            $this->setRoles();
            $this->setResources();
            $role  = 'guest';
            $access_us=$this->system_model->get_data('access',array('user_id'=>$user_id),array(),true);
            @$access=json_decode(@$access_us->access);
            @$access=(array)$access;
            //level=2: admin; level=1: mod; level=1: guest;
            switch ($level) {
                case '3':
                    $role = 'developer';
                    break;
                case '2':
                    $role = 'admin';
                    break;
                case '1':
                    $role = 'mod';
                    break;
            }
            
            $this->setAccess($role,$access);
            if (!$this->Zend_Acl->isAllowed($role,':' . $controller, $action)) {
				$this->session->set_flashdata("mess", "Tài khoản của bạn chưa được cấp quyền sử dụng chức năng này!");
                redirect(base_url('techadmin'));
                die();
            }
        }
		public function setRoles()
        {
            $this->Zend_Acl->addRole(new Zend_Acl_Role('guest'))
                ->addRole(new Zend_Acl_Role('mod'))
                ->addRole(new Zend_Acl_Role('admin'))
                ->addRole(new Zend_Acl_Role('developer'));
        }
		public function setResources()
        {
			$data['resources'] = $this->system_model->get_data('resources',array(
				'parent_id'=>0
			),array('sort'=>'asc'));

			foreach($data['resources'] as $k => $cat){
				$this->Zend_Acl->add(new Zend_Acl_Resource(':'.$cat->resource));
			}
        }
		public function setAccess($role=null,$access=null){
            if($role!=null&&is_array($access)&&!empty($access)){
                foreach($access as $k=>$v){
                    $this->Zend_Acl->allow($role, ':'.$k,$v);
                }
            }
            $this->Zend_Acl->allow('admin', null);
            $this->Zend_Acl->allow('developer', null);
        }
         // kiem tra alias có tồn tại không
        public function Check_alias($alias)
        {
            $item = $this->system_model->getFirstRowWhere('alias',array(
                'alias' => $alias
            ));
            if(empty($item)){
               redirect(base_url('404_override'));
            }
        }
         // cap nhat thong ke truy cap
        public function update_thongke($today=null)
        { 
            $time = date('Y-m-d',time());
            $time_kieuso = strtotime($time);   
            $data['item']=$this->system_model->getFirstRowWhere('thong_ke_online',array('access_date'=>$time_kieuso));
            if (!empty($data['item'])){
                $id = $this->system_model->Update_where('thong_ke_online', array('access_date'=>$time_kieuso), array('access_date' => $time_kieuso,'today'     => $data['item']->today +1));
            } else {
                $id = $this->system_model->Add('thong_ke_online', array('access_date' => $time_kieuso,'today'=> 1));
            }
            
        }
    }
