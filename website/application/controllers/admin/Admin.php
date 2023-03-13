<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
       // $this->output->cache(20);
		$this->ci =& get_instance();
        $this->load->model('system_model');
        $this->load->library('filter');
		 if(!$this->check->is_logined($this->session->userdata('sessionUserAdmin'), $this->session->userdata('sessionGroupAdmin')))
        {
            redirect(base_url().'techadmin', 'location');
            die();
        }
         
    }
    public function lang($lang){
        if($lang!=null){
           $this->ci->session->set_userdata('lang',$lang);
		   redirect(base_url('techadmin'));
        }
    }

   public function admin_change_password()
    {
        $this->load->library('hash');
        $user = $this->system_model->getFields('users','id, password, use_salt, lever, active,fullname',array());
        if ($this->input->post('old_pass')) {
            $old_pass = trim($this->input->post('old_pass'));
            $new_pass = $this->input->post('new_pass');
            $re_pass  = $this->input->post('re_pass');
            $id       = $this->session->userdata('sessionUserAdmin');
            $admin    = $this->system_model->getFirstRowWhere('users',$arrayName = array('id' => $id ));

            for ($i = 0; $i < 5; $i++) {
                $old_pass = md5($old_pass);
            }
            if ($old_pass == $admin->password) {
                $mss = '';

                if ($new_pass && $re_pass) {
                    if ($new_pass == $re_pass) {
                        for ($i = 0; $i < 5; $i++) {
                            $new_pass = md5($new_pass);
                        }

                        $arr = array('password' => $new_pass);

                        $this->system_model->update('users',$id, $arr);
                        $this->session->set_flashdata("mess", "Đổi mật khẩu thành công!");
                    } else {
                        $this->session->set_flashdata("mess", "Nhập lại mật khẩu mới không chính xác!");
                    }
                } else {
                    $this->session->set_flashdata("mess", "Vui lòng nhập mật khẩu mới!");
                }

            } else {
                $this->session->set_flashdata("mess", "Nhập sai mật khẩu hiện tại!");
            }
        }
        $data = array();
        $data['headerTitle'] = 'Thay đổi mật khẩu';
        $this->LoadHeaderAdmin($data,$data['headerTitle']);
        $this->load->view('admin/users/admin_change_password', @$data);
        $this->load->view('admin/footer');
    }
    // admin logout
    public  function reset_pass($id){
        $this->auth->check();
        if($id>0){
            $password='123456';
            for($j=0; $j<5; $j++){
                $password=md5($password);
            }
            $this->system_model->Update_where('users',array('id'=>$id),array('password'=>$password));
			$this->session->set_flashdata("mess", "Cập nhật thành công!");
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function site_option($id=null){
        $this->check_acl();
        $config['upload_path'] = './upload/img/logo/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '*';
        $config['max_width'] = '*';
        $config['max_height'] = '*';
        $this->load->library('upload', $config);
        $row=$this->system_model->getField('site_option','id,coppy_right,site_name,site_video,link_instagram,map_iframe,chat,shipping,site_keyword,site_title,site_description,link_sky,link_printer,link_linkedin,hotline1,hotline2,hotline3,address,link_tt,slogan,site_email,site_fanpage,site_promo,link_gg,link_youtube,face_id,timeopen,wm_text,wm_color,wm_size,input_text_1,domain,map_footer,site_logo,site_logo_footer,favicon',array(
            'lang' => $this->language
        ));
        if($this->input->post()){
            $video='';
            if($this->input->post('site_video')){
                $video=explode('=',$this->input->post('site_video'));
            }
            $arr=array(
                'coppy_right'            => $this->input->post('coppy_right'),
                'site_name'           => $this->input->post('site_name'),
                'map_iframe'           => $this->input->post('map_iframe'),
                'link_instagram'        => $this->input->post('link_instagram'),
                'chat'           => $this->input->post('chat'),
                'shipping'            =>$this->input->post('shipping'),
                'site_keyword'        => $this->input->post('site_keyword'),
                'site_title'          => $this->input->post('site_title'),
                'site_description'    => $this->input->post('site_description'),
                'link_sky' => $this->input->post('link_sky'),
                'link_printer'       => $this->input->post('link_printer'),
                'link_linkedin'      => $this->input->post('link_linkedin'),
                'hotline1'            => $this->input->post('hotline1'),
                'hotline2'            => $this->input->post('hotline2'),
                'hotline3'            => $this->input->post('hotline3'),
                'address'             => $this->input->post('address'),
                'link_tt'             => $this->input->post('link_tt'),
                'slogan'             => $this->input->post('slogan'),
                'site_email'             => $this->input->post('site_email'),
                'site_video'             => @$video[1],
                'site_fanpage'         => $this->input->post('site_fanpage'),
                'site_promo'          => $this->input->post('site_promo'),
                'link_gg'          => $this->input->post('link_gg'),
                'link_youtube'          => $this->input->post('link_youtube'),
                'face_id'               => $this->input->post('face_id'),
                'timeopen'              => $this->input->post('timeopen'),
                'lang'                => $this->language,
                'WM_text'               => $this->input->post('wm_text'),
                'WM_color'               => $this->input->post('wm_color'),
                'WM_size'               => $this->input->post('wm_size'),
                'input_text_1'               => $this->input->post('input_text_1'),
                'domain'               => $this->input->post('domain'),
                'map_footer'               => $this->input->post('map_footer'),
            );
            if($row == null)
            {
                $rs=$this->system_model->Add('site_option',$arr);
				$this->session->set_flashdata("mess", "Thêm thành công!");
            }
            else{
                $rs=$this->system_model->Update_where('site_option',array('id'=> $row->id,),$arr);
				$this->session->set_flashdata("mess", "Cập nhật thành công!");
            }


            if ($_FILES['userfile']['size'] >0) {
                if (!$this->upload->do_upload('userfile')) {
					$this->session->set_flashdata("mess", "".$this->upload->display_errors());
                } else {
                    $upload = array('upload_data' => $this->upload->data());
                    unlink($row->site_logo);
                    $logo  = 'upload/img/logo/' . $upload['upload_data']['file_name'];
                   // var_dump( $logo );die;
                    $this->system_model->Update_where('site_option', array('id'=>$row->id), array('site_logo'=>$logo));
                }
            }
			$weblang=array('vi'=>'vietnamese','en'=>'english',);
			// up logo footer
			if ($_FILES['logo_footer']['size'] >0) {
                if (!$this->upload->do_upload('logo_footer')) {
					$this->session->set_flashdata("mess", "".$this->upload->display_errors());
                } else {
                    $upload = array('upload_data' => $this->upload->data());
                    $image  = 'upload/img/logo/' . $upload['upload_data']['file_name'];
                    $this->system_model->Update_where('site_option', array('id'=>$row->id), array('site_logo_footer'=>$image));
                }
            }
			// up logo favicon
			if ($_FILES['userfile2']['size'] >0) {
                if (!$this->upload->do_upload('userfile2')) {
                    $this->session->set_flashdata("mess", "".$this->upload->display_errors());
                } else {
                    $upload = array('upload_data' => $this->upload->data());
                    $image  = 'upload/img/logo/' . $upload['upload_data']['file_name'];
                    $this->system_model->Update_where('site_option', array('id'=>$row->id), array('favicon'=>$image));
                }
            }

            redirect($_SERVER['HTTP_REFERER']);
        }
         $data['config_home'] = $this->system_model->getFirstRowWhere('site_option',array('lang' => 'config','active'=>0));
        $data['config_text'] = $this->system_model->getFirstRowWhere('site_option',array('lang' => 'conf_text','active'=>0));

        $data['row']=$row;
        $data['headerTitle'] = 'Cấu hình hệ thống';
        $this->LoadHeaderAdmin($data);
        $this->load->view('admin/system/site_option', $data);
        $this->load->view('admin/footer');
    }
  
	public function bando_map($id=null){
        $this->check_acl();
        $row=$this->system_model->getFirstRowWhere('site_option',array(
            'lang' => $this->language
        ));
        if($this->input->post()){
            $b="(".$this->input->post('lati').",".$this->input->post('long').")";
            $arr=array(

                'hdfMap'            => $b,
                'map_title'            => $this->input->post('map_title'),
                'map_adrdress'            => $this->input->post('map_adrdress'),
                'map_phone'            => $this->input->post('map_phone'),
                'dia_chi_timkiem'            => $this->input->post('dia_chi_timkiem'),
                //'bando'            => $this->input->post('bando'),
                'lang'                => $this->language,
            );
            $rs=$this->system_model->Update_where('site_option',array('id'=> $row->id,),$arr);
            $_SESSION['mess']='Cập nhật thành công!';
			redirect($_SERVER['HTTP_REFERER']);
        }
        $data['row']=$row;
        $data['headerTitle'] = 'Cấu hình bản đồ web';
        $this->LoadHeaderAdmin($data);
        $this->load->view('admin/system/bando_map', $data);
        $this->load->view('admin/footer');
    }
    public function add_body(){
        $id=$this->input->post('id');
        //var_dump($id);die;
        if($this->input->post()){
            $arr=array(
                'color'            => $this->input->post('color'),
                'size'            => $this->input->post('size'),
                'fontchu'            => $this->input->post('fontchu'),
                'h1size'            => $this->input->post('h1size'),
                'h1fchu'            => $this->input->post('h1fchu'),
                'lang'                => $this->language,
            );
            $rs=$this->system_model->Update_where('site_option',array('id'=> $id,),$arr);
            $_SESSION['mess']='Cập nhật thành công!';
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    
// phân quyền quản trị
     public function permission($id = null)
    {
        $this->check_acl();
        $admin = $this->session->userdata('adminfull');
        $user=$this->system_model->get_data('access',array('user_id'=>$id),array(),true);
        if ($this->input->post()) {
            $controller = $this->input->post('controller');
            $action     = $this->input->post('action');
            $sub_action     = $this->input->post('sub_action');
            $access     = array();
            foreach ($controller as $c2) {
                foreach ($action as $a) {
                    $item = explode(';', $a);
                    if ($item[0] == $c2) {
                        $access[$c2][] = $item[1];
                    }
                }
                foreach ($sub_action as $a2) {
                    $item2 = explode(';', $a2);
                    if ($item2[0] == $c2) {
                        $access[$c2][] = $item2[1];
                    }
                }
            }
            $str_access = json_encode($access);
            $arr        = array('user_id' => $id, 'access' => $str_access);

            if(!empty($user)){
                $this->system_model->Update_where('access',array('user_id'=>$id), $arr);
            }else{
                $this->system_model->Add('access', $arr);
            }
            $this->session->set_flashdata("mess", "Thêm mới thành công!");
            redirect(base_url('admin/users/listuser_admin'));
        }

        $data['u_access'] = (array)json_decode(@$user->access);
       
            if($id ==1){
                $data['resources'] = $this->system_model->get_data('resources',array('parent_id' => 0),array('sort'=>'asc'));
                foreach ($data['resources'] as $key => $cat) {
                    $data['resources'][$key]->cat_sub =  $this->system_model->get_data('resources',array(
                    'parent_id' => $cat->id
                    ),array('sort' => 'asc'));
                    foreach ($data['resources'][$key]->cat_sub as $key2 => $value2) {
                        $data['resources'][$key]->cat_sub[$key2]->catchildren = $this->system_model->getFields('resources','id,name,parent_id,resource',array('parent_id' => $value2->id),array('sort'=>'desc'));
                    }
                }
            }else{
                $data['user'] = $this->system_model->get_data('users',array('id'=>$id),array(),true);
                $data['resources'] = $this->system_model->get_data('resources',array('parent_id' => 0,'active' => 1),array('sort'=>'asc'));
                foreach ($data['resources'] as $key => $cat) {
                    $data['resources'][$key]->cat_sub =  $this->system_model->get_data('resources',array(
                    'parent_id' => $cat->id
                    ),array('sort' => 'asc'));
                    foreach ($data['resources'][$key]->cat_sub as $key2 => $value2) {
                        $data['resources'][$key]->cat_sub[$key2]->catchildren = $this->system_model->getFields('resources','id,name,parent_id,resource',array('parent_id' => $value2->id),array('sort'=>'desc'));
                    }
                }
            }
       $data['id'] = $id;
        $data['headerTitle'] = 'Phân quyền quản trị';

        $this->LoadHeaderAdmin($data);
        $this->load->view('admin/users/permission', $data);
        $this->load->view('admin/footer');
    }
    public function useractive(){
        $u=$this->system_model->get_data('users',array('id'=>$_POST['id']),array(),true);
        if($u->block==1){
            $this->system_model->Update_where('users', array('id' => $_POST['id']), array('block'=>0));

        }else if($u->block==0){
            $this->system_model->Update_where('users', array('id' => $_POST['id']), array('block'=>1));
        }
        echo 1;
    }
    // public function user_delete($id){
    //     $this->check_acl();
    //     $this->system_model->Delete_where('users',array('id'=>$id));
    //     $this->system_model->Delete_where('access',array('user_id'=>$id));
    //     //            $this->creat_mess('success','<i class="fa fa-exclamation-circle"></i> Thao tác thành công!');
    //     redirect($_SERVER['HTTP_REFERER']);
    // }

	public function documentation()
    {
		$data['headerTitle'] = 'Hướng dẫn sử dụng';
        $data['cate_all'] = $this->system_model->get_data('document',array(
            'lang' => $this->language,
            'parent_id' => 0,
            'active' =>1
            ),array('sort' => 'asc'));
		$this->LoadHeaderAdmin($data);
        $this->load->view('admin/documentation/index',$data);
        $this->load->view('admin/footer');
	}
// quan ly module huong dan quan tri
    public function listDoc()
        {
            $data['cate'] = $this->system_model->get_data('document',array(
                'lang' => $this->language
            ),array('sort'=>'desc'));
            $data['headerTitle'] = 'Danh mục hướng dẫn';
            $this->LoadHeaderAdmin($data);
            $this->load->view('admin/documentation/list_cat', $data);
            $this->load->view('admin/footer');
        }

//Add Category document
        public function cat_add_doc($id_edit=null)
        {
            $data['btn_name']='Thêm';
            $data['max_sort']=$max_sort=$this->system_model->SelectMax('document','sort')+1;
            if($id_edit!=null){
                $data['edit']=$this->system_model->get_data('document',array('id'=>$id_edit),array(),true);
                $data['max_sort']=$max_sort=$data['edit']->sort;
                $data['btn_name']='Cập nhật';
            }
            if(isset($_POST['addnews'])) {
                $arr    = array(
                    'name'        => $this->input->post('name'),
                    'description' => $this->input->post('description'),
                    'parent_id'   => $this->input->post('parent'),
                    'lang'        => $this->language,
                    'sort'       => $max_sort,
                    'active'   => $this->input->post('active')
                );
                if (!empty($_POST['edit'])){
                    $id = $this->system_model->Update_where('document', array('id'=>$id_edit), $arr);
                    $this->session->set_flashdata("mess", "Cập nhật thành công!");
                } else {
                    $id = $this->system_model->Add('document', $arr);
                    $this->session->set_flashdata("mess", "Thêm thành công!");
                }
                if ($id_edit != null) {
                    $id = $id_edit;
                } else $id = $id;

                redirect(base_url('techadmin/admin/listDoc'));
            }
            $data['category'] = $this->system_model->get_data('document',array(
                'lang' => $this->language
            ),array('sort'=>'desc'));
            $data['headerTitle'] = "'".$data['btn_name']." danh mục hướng dẫn";
            $this->LoadHeaderAdmin($data);
            $this->load->view('admin/documentation/cat_add', $data);
            $this->load->view('admin/footer');
        }
     public function document_edit($id){
           $this->cat_add_doc($id);
        }

    public function deletedocument($id)
        {
             $this->del_catdoc_once($id);
             $this->session->set_flashdata("mess", "Xóa không thành công ! <br />Còn danh mục con");
            redirect($_SERVER['HTTP_REFERER']);
        }
     public function deletes_categorydoc()
        {
            $ids = $this->input->post('checkone');
            foreach($ids as $id)
            {
                $this->del_catdoc_once($id);
            }
            $this->session->set_flashdata("mess", "Xóa thành công!");
            redirect($_SERVER['HTTP_REFERER']);
        }
        public function del_catdoc_once($id){
          $this->system_model->Delete_where('document',array('id' => $id));
        }

    // setup cấu hình cho sản phâm
    public function setup_product($id=null){ 

        $weblang=array('vi'=>'vietnamese','en'=>'english',);
        // $this->option = $this->system_model->getFirstRowWhere('site_option',array(
        //         'lang' => $this->language
        //     ));
        $id=$this->option->id;
        $data['row'] = $this->system_model->getFirstRowWhere('site_option',array('lang' => $this->language,'id'=>$id));
        $data['thuoctinh'] = (array)json_decode(@$this->option->config_pro_content);
    //        $data['show_button'] = (array)json_decode(@$this->option->config_show_button);
         $data['show_button'] = $this->system_model->get_data('config_checkpro',array('type !='=>'hotline'));
         $data['config_home'] = $this->system_model->getFirstRowWhere('site_option',array('lang' => 'config','active'=>0));
        $data['config_text'] = $this->system_model->getFirstRowWhere('site_option',array('lang' => 'conf_text','active'=>0));
        $data['config_menu'] = $this->system_model->get_data('config_menu');
        $data['config_banner'] = $this->system_model->get_data('config_banner');
        $data['config_language'] = $this->system_model->get_data('site_option',array('name_language !='=>'',),array('id' => 'asc'));
        $data['config_hotline'] = $this->system_model->get_data('config_checkpro',array('type'=>'hotline')); 

        $data['headerTitle'] = 'Cấu hình sản phẩm';
        $this->LoadHeaderAdmin($data);
        $this->load->view('admin/system/setup_product', $data);
        $this->load->view('admin/footer');
    }
    // lay du lieu cau hinh thuoc tinh cho san pham
    public function popupdata_attpro()
    {
        $data = array();
        $data['key'] = $key=$this->input->get('key');
        $data['btn_name']='Thêm mới';
        $data['setup'] = $this->option = $this->system_model->getFirstRowWhere('site_option',array(
                'lang' => $this->language
            ));
        if($key!=null){
            $data['item'] = $arr1[$key] = json_decode($data['setup']->config_pro_content);
            $data['btn_name']='Sửa thuộc tính';
        }
        $this->load->view('admin/modal/view_add_attpro',$data);  
    }
     public function add_attpro()
    {
        $data['btn_name']='Thêm';

         if (isset($_POST['addnews'])) {
            $arr = array(
                'content'        => $this->input->post('content'),
                'name'   => $this->input->post('name'),
                'type'     => $this->input->post('type'),
                'sort'            => $this->input->post('sort'),
            );
           //
            $mang = array($arr);
            $str_arr = json_encode($mang);
            $arr = array('config_pro_content' => $str_arr);
            $data['setup'] = $this->option = $this->system_model->getFirstRowWhere('site_option',array(
                'lang' => $this->language
            ));

            if($data['setup']->config_pro_content !==''){
                $arr1 = json_decode($data['setup']->config_pro_content);
                $x = json_decode($str_arr);
                $themmang = array_push($arr1,$x[0]); 

                $arr = array('config_pro_content' => json_encode($arr1));   
            }else{
                $arr = array('config_pro_content' => $str_arr);                
            }
            if(!empty($arr)){
               $this->system_model->Update_where('site_option',array('lang'=>$this->language), $arr);
            }
            redirect(base_url().'techadmin/admin/setup_product');
        }
    }
     public function edit_thuoctinh($key)
    {
         $data['setup'] = $this->option = $this->system_model->getFirstRowWhere('site_option',array(
                'lang' => $this->language
            ));
        if($key!=null){
           $arr1 = json_decode($data['setup']->config_pro_content);
           $arr1[$key] = array(
                    'content'        => $this->input->post('content'),
                    'name'   => $this->input->post('name'),
                    'type'     => $this->input->post('type'),
                    'sort'            => $this->input->post('sort'),
                );
            $arr = array('config_pro_content' => json_encode($arr1));   
            
            $this->system_model->Update_where('site_option',array('lang'=>$this->language), $arr);
               redirect(base_url().'techadmin/admin/setup_product');
        }
        
    }
     public function xoa_thuoctinh($key)
    {
          $data['setup'] = $this->option = $this->system_model->getFirstRowWhere('site_option',array(
                'lang' => $this->language
            ));

            if($data['setup']->config_pro_content !==''){
            $array2 = array();
               $arr1 = json_decode($data['setup']->config_pro_content);
               
                  unset($arr1[$key]);
                  foreach ($arr1 as $key => $value) {
                      array_push($array2,$value); 
                  }

                $str_arr = json_encode($array2);
                $arr = array('config_pro_content' => $str_arr);   
               $this->system_model->Update_where('site_option',array('lang'=>$this->language), $arr);
               redirect(base_url().'techadmin/admin/setup_product');
            }
    }
//hien thi them nút 
    public function popupdata_butshow()
    {
        $data = array();
        $data['id'] = $id=$this->input->get('id');
        $data['btn_name']='Thêm mới nút';

        if($id!=null){
            $data['item']=$this->system_model->getFirstRowWhere('config_checkpro',array('id'=>$id));
            $data['btn_name']='Sửa';
        }
       
        $this->load->view('admin/modal/view_add_showbut',$data);  
    }
    // them nut hien thi
     public function add_showbut($id_edit=null)
    {
        $data['btn_name']='Thêm';

        if($id_edit!=null){
           $data['item']=$this->system_model->getFirstRowWhere('config_checkpro',array('id'=>$id_edit));
        }
         if (isset($_POST['addnews'])) {
            $this->load->dbforge();
            $arr = array(
                'name'        => $this->input->post('name'),
                'type'     => $this->input->post('type'),
                'field'     => $this->input->post('field'),
                'color'      => $this->input->post('color'),
                'active'    => $this->input->post('active'),
            );
            // them truong vao trong table
            $fields = array(
                $this->input->post('field') => array('type' => 'TEXT')
            );
           
            if (!empty($_POST['edit'])){
                $id = $this->system_model->Update_where('config_checkpro', array('id'=>$id_edit), $arr);
                $this->session->set_flashdata("mess", "Cập nhật thành công!");
            } else {
                 $this->dbforge->add_column($this->input->post('type'), $fields);
                $id = $this->system_model->Add('config_checkpro', $arr);
                $this->session->set_flashdata("mess", "Thêm mới thành công!");
            }
            redirect(base_url().'techadmin/admin/setup_product');
        }
    }
  
// chinh sưa nut
     public function edit_showbut($id)
    {
        $this->add_showbut($id);
    }
// xoa nut button
     public function xoa_showbut($id)
    {  
        $data['item']=$this->system_model->getFirstRowWhere('config_checkpro',array('id'=>$id));
        // xoa truong du lieu trong table
        $this->load->dbforge();
        $this->dbforge->drop_column($data['item']->type, $data['item']->field);

        $this->system_model->Delete_where('config_checkpro',array('id' => $id));
       $this->session->set_flashdata("mess", "Xóa nút thành công!");
        redirect(base_url().'techadmin/admin/setup_product');
   
    }
public function popupdata_banner($id_edit=null)
    {
        $data = array();
        $data['id'] = $id=$this->input->get('id');
        $data['btn_name']='Thêm mới';
       if($id !=null){
        $id_edit = $id;
       }
        if($id_edit!=null){
            $data['item']=$this->system_model->getFirstRowWhere('config_banner',array('id'=>$id));
            $data['btn_name']='Sửa';
        }

         if (isset($_POST['addnews'])) {
            $arr = array(
                'name'        => $this->input->post('name'),
                'type'     => $this->input->post('type'),
                'field'     => $this->input->post('field'),
                'active'    => $this->input->post('active'),
            );
            
            if (!empty($_POST['edit'])){
                $id = $this->system_model->Update_where('config_banner', array('id'=>$id_edit), $arr);
                $this->session->set_flashdata("mess", "Cập nhật thành công!");
            } else {
                $id = $this->system_model->Add('config_banner', $arr);
                $this->session->set_flashdata("mess", "Thêm mới thành công!");
            }
            redirect(base_url().'techadmin/admin/setup_product');
        }
        $this->load->view('admin/modal/view_add_banner',$data);  
    }
// xoa banner config
     public function xoa_config_banner($id)
    {  
        $this->system_model->Delete_where('config_banner',array('id' => $id));
       $this->session->set_flashdata("mess", "Xóa config banner thành công!");
        redirect(base_url().'techadmin/admin/setup_product');
   
    }
    // tao site_map cho website
    public function sitemap()
    { 

        foreach ($this->session->userdata('phanquyen') as $key => $pq) {
            if($pq->resource=='news'){
               $module_news = 1; 
            }elseif($pq->resource=='product'){
                $module_pro = 1; 
            }elseif($pq->resource=='media'){
                $module_media = 1; 
            }elseif($pq->resource=='pages'){
                $module_pages = 1; 
            }elseif($pq->resource=='video'){
                $module_video = 1; 
            }elseif($pq->resource=='raovat'){
                $module_raovat = 1; 
            }
            if($pq->resource=='attribute'){
             foreach ($pq->cat_sub as $key2 => $pq_sub) {
               if($pq_sub->resource=='listBrand'){
                 $module_brand = 1;    
               }elseif($pq_sub->resource=='listLocale'){
                $module_xuatxu = 1; 
                }  
             }
            }
         }

        $seconds = 60*60*60;
        set_time_limit ($seconds);
        $data = $this->system_model->getFields('alias','alias,type');
        $W3C_datetime = 'Y-m-d\Th:i:s';
        $Simple_datetime = 'YYYY-MM-DD';
        $output = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $output .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
        // list route URL 
        // list Alias 
        if(count($data)){
            foreach ($data as  $item) {
                $time = date($W3C_datetime,time('now'));
                switch ($item->type) {
                    case 'pro':
                        if(isset($module_pro)){
                            $freq = 'daily';
                            $priority = 1;
                            $url = site_url('san-pham/'.$item->alias);
                            //$time = date($W3C_datetime,time('now'));
                         }
                        break;
                    case 'new':
                        if(isset($module_news)){
                            $freq = 'daily';
                            $priority = 0.8;
                            $url = site_url('new/'.$item->alias);
                        }
                        break;
                    case 'cate-pro':
                        if(isset($module_pro)){
                            $freq = 'weekly';
                            $priority = 0.8;
                            $url = site_url('danh-muc/'.$item->alias);
                         }
                        break;
                    case 'cate-new':
                        if(isset($module_news)){
                            $freq = 'weekly';
                            $priority = 0.6;
                            $url = site_url('danh-muc-tin/'.$item->alias);
                            }
                        break;
                    case 'page':
                        if(isset($module_pages)){
                            $freq = 'monthly';
                            $priority = 0.4;
                            $url = site_url('page/'.$item->alias);
                        }
                        break;
                    case 'hangsx':
                        if(isset($module_brand)){
                             $freq = 'monthly';
                            $priority = 0.6;
                            $url = site_url('san-xuat/'.$item->alias);
                        }
                        break;
                    case 'm-cat':
                        if(isset($module_media)){
                            $freq = 'monthly';
                            $priority = 0.6;
                            $url = site_url('media/'.$item->alias);
                        }
                        break;
                    case 'media':
                        if(isset($module_media)){
                            $freq = 'monthly';
                            $priority = 0.6;
                            $url = site_url('media-detail/'.$item->alias);
                        }
                        break;
                    case 'video-cat':
                        if(isset($module_video)){
                            $freq = 'monthly';
                            $priority = 0.6;
                            $url = site_url('video/'.$item->alias);
                        }
                        break;
                    case 'video':
                        if(isset($module_video)){
                            $freq = 'monthly';
                            $priority = 0.6;
                            $url = site_url('video-detail/'.$item->alias);
                        }
                        break;
                    case 'cate-ser':
                        if(isset($module_raovat)){
                            $freq = 'monthly';
                            $priority = 0.6;
                            $url = site_url('rao-vat/'.$item->alias);
                        }
                        break;
                    case 'services':
                        if(isset($module_raovat)){
                            $freq = 'monthly';
                            $priority = 0.6;
                            $url = site_url('tin-rao/'.$item->alias);
                        }
                        break;    
                    default:
                        $freq = 'daily';
                        $priority = 1;
                        $url = '';
                        break;
                }
                if(!empty($url)){
                    $output .= '<url>
                      <loc>'.$url.'</loc>
                      <lastmod>'.$time.'  </lastmod>
                      <changefreq>'.$freq.'</changefreq>
                      <priority>'.$priority.'</priority>
                    </url>';
                }
            }
        }
        
        $output .= "\n".'</urlset>'."\n";
        $xml=simplexml_load_string($output) or die("Error: Không Thể Tạo XML SiteMap");
        if($xml->asXML('sitemap.xml')){
            $this->session->set_flashdata("mess", "SiteMap.xml đã tạo thành công !!!");
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            $this->session->set_flashdata("mess_err", "SiteMap.xml Không Tạo Được - Kiểm Tra Phân Quyền Thư Mục !!!");
            redirect($_SERVER['HTTP_REFERER']);
        };
    }
    // câu hinh wiget
    // public function setup_wiget($id=null){ 

    //     $data['config_wiget'] = $this->system_model->get_data('config_wiget');
    //     $data['headerTitle'] = 'Cấu hình wiget';
    //     $this->LoadHeaderAdmin(false,$data['headerTitle']);
    //     $this->load->view('admin/system/setup_wiget', $data);
    //     $this->load->view('admin/footer');
    // }

    public function popupdata_pagination($id_edit=null)
    {
        $data = array();
        $data['id'] = $id=$this->input->get('id');
        $data['btn_name']='Thêm mới';
       if($id !=null){
        $id_edit = $id;
       }
        if($id_edit!=null){
            $data['item']=$this->system_model->getFirstRowWhere('config_pagination',array('id'=>$id));
            $data['btn_name']='Sửa';
        }

         if (isset($_POST['addnews'])) {
            $arr = array(
                'name'        => $this->input->post('name'),
                'name_table'        => $this->input->post('name_table'),
                'type'     => $this->input->post('type'),
                'pagination'     => $this->input->post('pagination'),
                'width'     => $this->input->post('width'),
                'height'     => $this->input->post('height'),
                'active'    => $this->input->post('active'),
                'lang' => $this->language
            );
            
            if (!empty($_POST['edit'])){
                $id = $this->system_model->Update_where('config_pagination', array('id'=>$id_edit), $arr);
                $this->session->set_flashdata("mess", "Cập nhật thành công!");
            } else {
                $id = $this->system_model->Add('config_pagination', $arr);
                $this->session->set_flashdata("mess", "Thêm mới thành công!");
            }
            redirect(base_url().'techadmin/admin/setup_pagination');
        }
        $this->load->view('admin/modal/view_add_pagination',$data);  
    }
// xoa config wiget
     public function xoa_config_pagination($id)
    {  
        $this->system_model->Delete_where('config_pagination',array('id' => $id));
       $this->session->set_flashdata("mess", "Xóa config pagination thành công!");
        redirect(base_url().'techadmin/admin/setup_pagination');
   
    }
// pupop thêm câu hinh ngon ngư
    public function popupdata_site_option($id_edit=null)
    {
        $data = array();
        $config['upload_path'] = './upload/img/logo/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png|GIF|JPG|JPEG|PNG';
        $config['max_size'] = '5000';
        $config['max_width'] = '1500';
        $config['max_height'] = '1200';
        $this->load->library('upload', $config);

        $data['id'] = $id=$this->input->get('id');
        $data['btn_name']='Thêm mới';
       if($id !=null){
        $id_edit = $id;
       }
        if($id_edit!=null){
            $data['item']=$this->system_model->getFirstRowWhere('site_option',array('id'=>$id));
            $data['btn_name']='Sửa';
        }

         if (isset($_POST['addnews'])) {
            $arr = array(
                'name_language'        => $this->input->post('name_language'),
                'lang'        => $this->input->post('lang'),
                'active'    => $this->input->post('active'),
            );
            
            if (!empty($_POST['edit'])){
                $id = $this->system_model->Update_where('site_option', array('id'=>$id_edit), $arr);
                $this->session->set_flashdata("mess", "Cập nhật thành công!");
            } else {
                $id = $this->system_model->Add('site_option', $arr);
                $this->session->set_flashdata("mess", "Thêm mới thành công!");
            }
            if ($id_edit != null) {
                    $id = $id_edit;
                } else $id = $id;

            if ($_FILES['userfile']['size'] >0) {
                if (!$this->upload->do_upload('userfile')) {
                    $this->session->set_flashdata("mess", "".$this->upload->display_errors());
                } else {
                    $upload = array('upload_data' => $this->upload->data());
                    $image  = 'upload/img/logo/' . $upload['upload_data']['file_name'];
                    $this->system_model->Update_where('site_option', array('id'=>$id), array('icon_language'=>$image));
                }
            }
            redirect(base_url().'techadmin/admin/setup_product');
        }
        $this->load->view('admin/modal/view_add_language',$data);  
    }    
     public function info_phpmyadmin()
    {
       $data = array();

        $ip = $_SERVER['SERVER_ADDR'];
        $ip = gethostbyname($_SERVER['SERVER_NAME']);
        if(empty($ip)){
            $ip = $_SERVER['LOCAL_ADDR'];
        }
        $khung_css = read_file('application/config/database.php');      
        $string_begin = '/*'.'begin database old*/';
        $string_end = '/*'.'end database old*/';
        $vitri1 =  strpos($khung_css, $string_begin )+strlen($string_begin);
        $vitri2 = strpos($khung_css, $string_end );
        $chuoi_tim = substr( $khung_css,  $vitri1, ($vitri2-$vitri1));

         $data['phpmyadmin']= $chuoi_tim;
         $data['ip']= $ip;
       
        $this->load->view('admin/system/view_phpmyadmin',$data );
        //$this->load->view('admin/footer');
    }
    // cau hinh thông số phân trang, kich thước ảnh
    public function setup_pagination(){
        $data = array();
        $data['config_pagination'] = $this->system_model->get_data('config_pagination');
        $title = 'Cấu hình các thông số';
        $this->LoadHeaderAdmin(false,$title);
        $this->load->view('admin/system/setup_pagination', $data);
        $this->load->view('admin/footer');
    }
}