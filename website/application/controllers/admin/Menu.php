<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('system_model');
        if(!$this->check->is_logined($this->session->userdata('sessionUserAdmin'), $this->session->userdata('sessionGroupAdmin')))
        {
            redirect(base_url().'techadmin', 'location');
            die();
        }
    
    }
    protected $module_link = array(
        'news'=>'tin-tuc',
        'products'=>'danh-muc',
        'brand' => 'thuong-hieu',
        'locale' => 'hang-sx',
        'page'=>'page',
        'media' => 'media',
        'video' => 'video',
        'raovat' => 'rao-vat',
    );

    public function menulist()
    {
		$this->check_acl();
        if(!isset($_SESSION['tab_active'])){
            $_SESSION['tab_active']='main';
        } 
		$data['menu_main'] = $this->system_model->getFields('menu','id,position,name,sort,parent_id',array(
            'position'=>'main',
            'lang' => $this->language
        ),array('sort'=>'esc'));
        $data['config_menu'] = $this->system_model->get_data('config_menu',array(
            'active'=>1,
        ),array('id'=>'esc'));

         foreach ($data['config_menu'] as $key => $cat) {
            $data['config_menu'][$key]->menu = $this->system_model->getFields('menu','id,position,name,sort,parent_id',array(
                'position'=>$cat->type,
                'lang' => $this->language
            ),array('sort'=>'esc'));
        }
        $title = "Menu";
        $this->LoadHeaderAdmin(false,$title);
        $this->load->view('admin/menus/menu_list', $data);
        $this->load->view('admin/footer');
    }
    //ajax==========
    public function get_subcat()
    {
        $cat=$this->input->post('name');
        $rs['cat']=$cat;
        $rs['lang']= $this->language;
        echo json_encode($rs);
    }
    public function cate_show($module,$lang,$edit=null){
        $data['edit']=$edit;
        if($module=='0'){
            $data['cate']=array();
        }
        if($module=='products'){
            $data['cate']=$this->system_model->getFields('product_category','id,name,alias',array('lang'=> $this->language),array('id'=>'esc'));
        }
        if($module=='news'){
            $data['cate']=$this->system_model->getFields('news_category','id,name,alias',array('lang'=>$this->language),array('id'=>'esc'));
        }
        if($module=='pages'){
            $data['cate']=$this->system_model->getFields('staticpage','id,name,alias',array('lang'=>$this->language),array('id'=>'esc'));
        }
        if($module=='brand'){
            $data['cate']=$this->system_model->getFields('product_brand','id,name,alias',array('lang'=>$this->language),array('id'=>'esc'));
        }
		if($module=='locale'){
            $data['cate']=$this->system_model->getFields('product_locale','id,name,alias',array('lang'=>$this->language),array('id'=>'esc'));
        }
        if($module=='media'){
            $data['cate']=$this->system_model->getFields('media_category','id,name,alias',array('lang'=>$this->language),array('id'=>'esc'));
        }
		if($module=='video'){
            $data['cate']=$this->system_model->getFields('video_category','id,name,alias',array('lang'=>$this->language),array('id'=>'esc'));
        }
		if($module=='raovat'){
            $data['cate']=$this->system_model->getFields('raovat_category','id,name,alias',array('lang'=>$this->language),array('id'=>'esc'));
        }
        $this->load->view('admin/menus/show_cate_menuadd', $data);
    }
    //save sort menu
    public function Save_menu(){
        if(isset($_POST['name'])){
            $a=str_replace("\\",'',$_POST['name']);
            $arr=json_decode($a);
            $this->sort_menu($arr);
            echo 1;
        }

    }
    function saveList() {
        if(isset($_POST['list'])){
            $arr =$_POST['list'];
            $this->luu($arr);
             echo 1;
        }
    }
    function luu($arr, $parent = 0) {
        if ($arr != null) {
            foreach ($arr as $k2 => $v2) {
                $this->system_model->Update_where('menu', array('id' => $v2['id']), array('sort' => $k2,'parent_id' => $parent));
                unset($arr[$k2]);
                isset($v2['id'])?$id=$v2['id']:$id=0;

                if(isset($v2['children'])){
                    $this->luu($v2['children'],$id);
                }
            }
        }
    }
    public function sort_menu($arr,$parent=0)
    {
        if ($arr != null) {
            foreach ($arr as $k2 => $v2) {
                $this->system_model->Update_where('menu', array('id' => $v2->id), array('sort' => $k2,'parent_id' => $parent));
                unset($arr[$k2]);
                isset($v2->id)?$id=$v2->id:$id=0;

                if(isset($v2->children)){
                    $this->sort_menu($v2->children,$id);
                }
            }
        }
    }
    //Add menu====================================================================================
    public function add(){
        $this->add_edit_menu();
    }
    public function edit($id){
        $this->add_edit_menu($id);
    }
    public function add_edit_menu($id=null)
    {
		$this->check_acl();
        $this->load->helper('model_helper');
        $config['upload_path'] = './upload/img/menus/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|PNG|GIF|JPEG';
        $config['max_size'] = '*';
        $config['max_width'] = '2000';
        $config['max_height'] = '1000';
        $this->load->library('upload', $config);

        if($id!=null){
            $data['edit'] = $this->system_model->get_data('menu',array('id'=>$id),array(),true);
            $data['id_edit'] =$id;
            $data['edit']->alias2 = str_replace(array('.html','/'), '', substr( $data['edit']->url,  strpos($data['edit']->url, '/' )));
            if($data['edit']->url){
                if($data['edit']->module=='news'){
                    $data['cate_edit'] = $this->system_model->getFields('news_category','id,name,alias,parent_id',array(
                        'lang' => $this->language
                    ));
                }
                if($data['edit']->module=='pages'){
                    $data['cate_edit'] = $this->system_model->getFields('staticpage','id,name,alias,parent_id',array(
                        'lang' => $this->language
                    ));
                }
                if($data['edit']->module=='products'){
                    $data['cate_edit'] = $this->system_model->getFields('product_category','id,name,alias,parent_id',array(
                        'lang' => $this->language
                    ));
                }
                if($data['edit']->module=='brand'){
                    $data['cate_edit'] = $this->system_model->getFields('product_brand','id,name,alias,parent_id',array(
                        'lang' => $this->language
                    ));
                }
				if($data['edit']->module=='locale'){
                    $data['cate_edit'] = $this->system_model->getFields('product_locale','id,name,alias,parent_id',array(
                        'lang' => $this->language
                    ));
                }
                if($data['edit']->module=='media'){
                    $data['cate_edit'] = $this->system_model->getFields('media_category','id,name,alias,parent_id',array(
                        'lang' => $this->language
                    ));
                }
				if($data['edit']->module=='video'){
                    $data['cate_edit'] = $this->system_model->getFields('video_category','id,name,alias,parent_id',array(
                        'lang' => $this->language
                    ));
                }
				if($data['edit']->module=='raovat'){
                    $data['cate_edit'] = $this->system_model->getFields('raovat_category','id,name,alias,parent_id',array(
                        'lang' => $this->language
                    ));
                }
            }

        }

        if (isset($_POST['addmenu'])) {
            if($this->input->post('url')){
                $url = $this->input->post('url');
            }else {
                $url = make_alias($this->input->post('title'));
            }
            $arr = array(
                'name'        => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'parent_id'   => $this->input->post('parent'),
                'alias'       => make_alias($this->input->post('title')),
                'url'         => $url,
                'position'    => $this->input->post('position'),
                'target'      => $this->input->post('target'),
                'module'      => $this->input->post('module'),
                'lang'        => $this->language,
                'seturl'      => $this->input->post('seturl'),
                'cat_id'      => $this->input->post('id'),
            );

            if($this->input->post('edit_id')!=0){
                $this->system_model->Update_where('menu',array('id'=>$id),$arr);
                $this->session->set_flashdata("mess", "Cập nhật thành công!");
            }else{
                $id = $this->system_model->Add('menu', $arr);
                $this->session->set_flashdata("mess", "Thêm thành công!");
            }
            if($_FILES['userfile']['name'] != ''){
                if(! $this->upload->do_upload()){
					$this->session->set_flashdata("mess", "".$this->upload->display_errors());
                }else{
                    $upload= array('upload_data' => $this->upload->data());
                    $image = 'upload/img/menus/'.$upload['upload_data']['file_name'];
                    $arr = array('image'=>$image);
                    $this->news_model->Update_where('menu', array('id'=>$id), $arr);
                }
            }
			
			$_SESSION['tab_active']=$data['edit']->position;
			
            redirect(base_url('techadmin/menu/menulist'));
        }

        if($this->input->get('p')){
            $data['menu'] = $this->system_model->getFields('menu','*',array(
                'position'=>$this->input->get('p'),
                'lang'=>  $this->language
            ));
			
        }else $data['menu'] = $this->system_model->getFields('menu','*',array('lang'=>$this->language));
        $data['config_menu'] = $this->system_model->get_data('config_menu',array(
            'active'=>1,
        ),array('id'=>'esc'));

        foreach ($this->session->userdata('phanquyen') as $key => $pq) {
            if($pq->resource=='news'){
               $data['module_news'] = 1; 
            }elseif($pq->resource=='product'){
                $data['module_pro'] = 1; 
            }elseif($pq->resource=='media'){
                $data['module_media'] = 1; 
            }elseif($pq->resource=='raovat'){
                $data['module_raovat'] = 1; 
            }elseif($pq->resource=='video'){
                $data['module_video'] = 1; 
            }elseif($pq->resource=='pages'){
                $data['module_page'] = 1; 
            }
            if($pq->resource=='attribute'){
             foreach ($pq->cat_sub as $key2 => $pq_sub) {
               if($pq_sub->resource=='listBrand'){
                 $data['module_brand'] = 1;    
               }elseif($pq_sub->resource=='listLocale'){
                $data['module_xuatxu'] = 1; 
            }  
             }
            }
         }
         
        $data['position'] = $this->input->get('p');
        $data['module_link']    = $this->module_link;
        $data['langguage'] = $this->language;
        $title = "Menu";
        $this->LoadHeaderAdmin(false,$title);
        $this->load->view('admin/menus/add', $data);
        $this->load->view('admin/footer');
    }

    

    //Delete Menu
    public function delete($id){
        $this->system_model->Delete_where('menu', array('id' => $id));
        $this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function active_tab(){
        if($this->input->post('id')){
            $_SESSION['tab_active']=$this->input->post('id');
        }
    }
    //ajax
    public function select_lang($lang_id,$possition)
    {
        $data['menu'] = $this->system_model->getFields('menu','*',array('lang'=>$lang_id,'position'=>$possition));
        $this->load->view('admin/menus/select_parent_menu', $data);
    }

    public function get_iditem(){
        if($this->input->post('module')){
            $module=$this->input->post('module');
            $alias=$this->input->post('alias');
            $data=array();
            if($module=='products'){
                $item=$this->system_model->getField('product_category','id,name,alias,parent_id', array('alias' => $alias),array(),true);
                if($item){
                    $data['url'] = 'danh-muc/'.$item->alias.'.html';
					$data['id']=$item->id;
                    echo json_encode($data);die();
                }
            }
            if($module=='brand'){
                $item=$this->system_model->getField('product_brand','id,name,alias,parent_id', array('alias' => $alias),array(),true);
                if($item){
					$data['url'] = 'thuong-hieu/'.$item->alias.'.html';
                    $data['id']=$item->id;
                    echo json_encode($data);die();
                }
            }
            if($module=='media'){

                $item=$this->system_model->getField('media_category','id,name,alias,parent_id', array('alias' => $alias),array(),true);
                if($item){
                    $data['url'] = 'media/'.$item->alias.'.html';
					$data['id']=$item->id;
                    echo json_encode($data);die();
                }
            }
			if($module=='video'){

                $item=$this->system_model->getField('video_category','id,name,alias,parent_id', array('alias' => $alias),array(),true);
                if($item){
                    $data['url'] = 'video/'.$item->alias.'.html';
					$data['id']=$item->id;
                    echo json_encode($data);die();
                }
            }
			if($module=='locale'){

                $item=$this->system_model->getField('product_locale','id,name,alias,parent_id', array('alias' => $alias),array(),true);
                if($item){
                    $data['url'] = 'xuat-xu/'.$item->alias.'.html';
					$data['id']=$item->id;
                    echo json_encode($data);die();
                }
            }
			if($module=='raovat'){

                $item=$this->system_model->getField('raovat_category','id,name,alias,parent_id', array('alias' => $alias),array(),true);
				if($item){
                    $data['url'] = 'rao-vat/'.$item->alias.'.html';
					$data['id']=$item->id;
                    echo json_encode($data);die();
                }
            }
            if($module=='news'){
                $item=$this->system_model->getField('news_category','id,name,alias,parent_id', array('alias' => $alias),array(),true);
                if($item){
                    $data['url'] = 'danh-muc-tin/'.$item->alias.'.html';
					$data['id']=$item->id;
                    echo json_encode($data);die();
                }
            }
            if($module=='pages'){
                $item=$this->system_model->getField('staticpage','id,name,alias,parent_id', array('alias' => $alias),array(),true);
                if($item){
                    $data['url'] = 'page/'.$item->alias.'.html';
                    echo json_encode($data);die();
                }
            }

        }
    }

}