<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Attribute extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        if(!$this->check->is_logined($this->session->userdata('sessionUserAdmin'), $this->session->userdata('sessionGroupAdmin')))
        {
            redirect(base_url().'techadmin', 'location');
            die();
        }
        
    }
    public function listBrand()
    {
        $this->check_acl();
        $data['list'] = $this->system_model->getFields('product_brand','id,name,image,sort,men,focus',array(
            'lang' => $this->language
        ),array('sort' => 'asc'));
        $data['show_home'] = $this->system_model->getFirstRowWhere('config_checkpro','type,field,active,color,name',array('type' => 'product_brand','field' => 'home',));
        $data['show_hot'] = $this->system_model->getFirstRowWhere('config_checkpro','type,field,active,color,name',array('type' => 'product_brand','field' => 'hot',));
        $data['show_focus'] = $this->system_model->getFirstRowWhere('config_checkpro','type,field,active,color,name',array('type' => 'product_brand','field' => 'focus',));

        
         $title = "Quản lý nhãn hiệu";
        $this->LoadHeaderAdmin(false,$title);
        $this->load->view('admin/product_brand/list', $data);
        $this->load->view('admin/footer');
    }
     public function addbrand()
    {
        $this->add_edit_brand();
    }
     public function editbrand($id=null)
    {
        $this->add_edit_brand($id);
    }
    public function add_edit_brand($id_edit=null)
    {
        $this->check_acl();
        $config['upload_path'] = './upload/img/brand/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF|SVG|svg';
        $config['max_size'] = '4000';
        $config['max_width'] = '3000';
        $config['max_height'] = '3000';
        $this->load->library('upload', $config);

        $data['btn_name']='Thêm';
        $data['max_sort']=$this->system_model->SelectMax('product_brand','sort')+1;
         if($id_edit!=null){
            $data['edit']=$this->system_model->get_data('product_brand',array('id'=>$id_edit),array(),true);
             $data['cate_selected'] = $this->system_model->getField_array('product_to_brand','id_category',
                array('brand_id'=>$id_edit));
             $data['max_sort'] = $data['edit']->sort;
            $data['btn_name']='Cập nhật';
        }
        if (isset($_POST['addnews'])) {
            $alias = make_alias($this->input->post('name'));
            $arr = array(
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'alias' => $alias,
                'home' => $this->input->post('home'),
                'hot' => $this->input->post('hot'),
                'focus' => $this->input->post('focus'),
                'sort' => $this->input->post('sort'),
                'lang' => $this->language
            );

            if (!empty($_POST['edit'])){
                $id = $this->system_model->Update_where('product_brand', array('id'=>$id_edit), $arr);
                $this->session->set_flashdata("mess", "Cập nhật thành công!");
            } else {
                $id = $this->system_model->Add('product_brand', $arr);
                $this->session->set_flashdata("mess", "Thêm thành công!");
            }

            if ($id_edit != null) {
                $id = $id_edit;
            } else $id = $id;

            $checkAlias = $this->system_model->getFirstRowWhere('alias',array(
                'brand'=> $id
            ));
            if(empty($checkAlias)){
                $this->system_model->Add('alias',array(
                    'alias' => make_alias($this->input->post('alias')),
                    'brand' => $id,
                    'type'  => 'brand'
                ));
            }else{
                $this->system_model->Update_where('alias',array('brand'=>$id),array(
                    'alias' => $this->input->post('alias')
                ));
            }

           if($id){
                if (isset($_POST['category']) && sizeof($_POST['category']) > 0) {
                    $post_cat = $_POST['category'];
                    $this->system_model->Delete_where('product_to_brand', array('brand_id' => $id));
                    for ($i = 0; $i < sizeof($post_cat); $i++) {
                        $ca = array('brand_id' => $id, 'id_category' => $post_cat[$i]);
                        $this->system_model->Add('product_to_brand', $ca);
                    }
                }
            }

            if ($_FILES['userfile']['name'] != '') {
                if (!$this->upload->do_upload()) {
                    $this->session->set_flashdata("mess", "".$this->upload->display_errors());
                } else {
                    $upload = array('upload_data' => $this->upload->data());
                    $image = 'upload/img/brand/' . $upload['upload_data']['file_name'];

                    $this->system_model->Update_where('product_brand',array('id'=>$id),array('image'=>$image));
                }
            }

            redirect(base_url('techadmin/attribute/listBrand'));
        }
      
        $data['cate'] = $this->system_model->get_data('product_brand');
      
          $data['show_home'] = $this->system_model->getFirstRowWhere('config_checkpro','type,field,active,color,name',array('type' => 'product_brand','field' => 'home',));
        $data['show_hot'] = $this->system_model->getFirstRowWhere('config_checkpro','type,field,active,color,name',array('type' => 'product_brand','field' => 'hot',));
        $data['show_focus'] = $this->system_model->getFirstRowWhere('config_checkpro','type,field,active,color,name',array('type' => 'product_brand','field' => 'focus',));


      
       $title = "".$data['btn_name']."&nbsp"."nhãn hiệu sản xuất";
        $this->LoadHeaderAdmin(false,$title);
        $this->load->view('admin/product_brand/add', $data);
        $this->load->view('admin/footer');
    }
   
    // xoa list danh muc
    public function deletes_brand_category(){
        $ids = $this->input->post('checkone');
        foreach($ids as $id)
        {
            $this->delete_brand_once($id);
        }
        $this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function delete_brand_once($id)
    {
        $this->check_acl();
        // xoa ban ghi trong product_brand
        $item = $this->system_model->getFirstRowWhere('product_brand',array(
            'id' => $id
        ));
        // xoa anh trong thu muc
        if(file_exists($item->image)){
            @unlink($item->image);
        }
        $this->system_model->Delete_where('product_brand',array('id' => $id));
        $this->system_model->Delete_Where('product_to_brand', array('brand_id'=>$id));
        $item_alias =$this->system_model->getFirstRowWhere('alias',array('brand'=>$id));
        if(!empty($item_alias)){
            $this->system_model->Delete_where('alias',array('brand' => $id));
        }
    }
    //Delete  danh muc product_brand
    public function deletebrandcategory($id)
    {
        $this->delete_brand_once($id);
        $this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
//=========== locale ==================================================================================================
    public function listLocale()
    {
        $this->check_acl();
        $data['list'] = $this->system_model->getFields('product_locale','id,parent_id,name,sort,image',array(
            'lang' => $this->language
        ),array('sort' => 'asc'));

        foreach ($data['list'] as $key => $cat) {
            $data['list'][$key]->cat_name = $this->system_model->getField('product_brand',
                array('name'),array('id' => $cat->parent_id,));
        }

         foreach ($this->session->userdata('phanquyen') as $key => $cat) {
            if($cat->resource == 'attribute'){
                $data['attribute'] =  $cat;
                foreach ($data['attribute']->cat_sub as $key2 => $cat2) {
                    if($cat2->resource == 'listBrand'){
                        // hiên thị phan quyen thương hiệu
                        $data['show_listBrand'] =  $cat2;
                    }
                    if($cat2->resource == 'listLocale'){
                        // hiên thị phan quyen xuất sứ
                        $data['show_listLocale'] =  $cat2;
                    }

                }
            }
        }

        
         $title = "".$data['show_listLocale']->name;
        $this->LoadHeaderAdmin(false,$title);
        
        $this->load->view('admin/locale/list', $data);
        $this->load->view('admin/footer');
    }
    public function addlocale()
    {
        $this->add_edit_locale();
    }
    public function editlocale($id=null)
    {
        $this->add_edit_locale($id);
    }
    public function add_edit_locale($id_edit=null)
    {
        $this->check_acl();
        $config['upload_path'] = './upload/img/brand/';
        $config['allowed_types'] = 'gif|jpg|png|JPG|PNG|GIF|SVG|svg';
        $config['max_size'] = '4000';
        $config['max_width'] = '3000';
        $config['max_height'] = '3000';
        $this->load->library('upload', $config);

        $data['btn_name']='Thêm';
        $data['max_sort']=$this->system_model->SelectMax('product_locale','sort')+1;
        if($id_edit!=null){
            $data['edit']=$this->system_model->get_data('product_locale',array('id'=>$id_edit),array(),true);
            // $data['cate_selected'] = $this->system_model->getField_array('brand_to_locale','brand_id',
            //    array('locale_id'=>$id_edit));
            $data['btn_name']='Cập nhật';
            $data['max_sort']=$data['edit']->sort;
        }
        if (isset($_POST['addnews'])) {
            $alias = make_alias($this->input->post('name'));
            $arr = array(
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'alias' => $alias,
                'sort' => $this->input->post('sort'),
                'lang' => $this->language
            );

            if (!empty($_POST['edit'])){
                $id = $this->system_model->Update_where('product_locale', array('id'=>$id_edit), $arr);
                $this->session->set_flashdata("mess", "Cập nhật thành công!");
            } else {
                $id = $this->system_model->Add('product_locale', $arr);
                $this->session->set_flashdata("mess", "Thêm thành công!");
            }

            if ($id_edit != null) {
                $id = $id_edit;
            } else $id = $id;

            $checkAlias = $this->system_model->getFirstRowWhere('alias',array(
                'locale'=> $id
            ));
            if(empty($checkAlias)){
                $this->system_model->Add('alias', array(
                    'alias' => $alias,
                    'locale' => $id,
                    'type'  => 'locale'
                ));
            }else{
                $this->system_model->Update_where('alias',array('locale'=>$id),array(
                    'alias' => $this->input->post('alias')
                ));
            }

            // if($id){
            //      if (isset($_POST['category']) && sizeof($_POST['category']) > 0) {
            //          $post_cat = $_POST['category'];
            //          $this->system_model->Delete_where('brand_to_locale', array('locale_id' => $id));
            //          for ($i = 0; $i < sizeof($post_cat); $i++) {
            //              $ca = array('locale_id' => $id, 'brand_id' => $post_cat[$i]);
            //              $this->system_model->Add('brand_to_locale', $ca);
            //          }
            //      }
            //   $a= $this->system_model->Update_where('product_locale', array('id'=>$id), array('parent_id' => end($post_cat)));
            //  }

            if ($_FILES['userfile']['name'] != '') {
                if (!$this->upload->do_upload()) {
                    $this->session->set_flashdata("mess", "".$this->upload->display_errors());
                } else {
                    $upload = array('upload_data' => $this->upload->data());
                    $image = 'upload/img/brand/' . $upload['upload_data']['file_name'];

                    $this->system_model->Update_where('product_locale',array('id'=>$id),array('image'=>$image));
                }
            }

            redirect(base_url('techadmin/attribute/listLocale'));
        }

        $data['procat'] = $this->system_model->get_data('product_brand',array(
            'lang' => $this->language
        ),array('sort'=>''));

         
         $title = "".$data['btn_name']."&nbsp"."";
        $this->LoadHeaderAdmin(false,$title);
        $this->load->view('admin/locale/add', $data);
        $this->load->view('admin/footer');
    }
    

    // xoa list danh muc
    public function deletes_locale_category()
    {
        $ids = $this->input->post('checkone');
        foreach($ids as $id)
        {
            $this->delete_locale_once($id);
        }
         $this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function delete_locale_once($id)
    {
        $this->check_acl();
        // xoa ban ghi trong product_brand
        $item = $this->system_model->getFirstRowWhere('product_locale',array(
            'id' => $id
        ));
        // xoa anh trong thu muc
        if(file_exists($item->image)){
            @unlink($item->image);
        }
        $this->system_model->Delete_where('product_locale',array('id' => $id));
        $item_alias =$this->system_model->getFirstRowWhere('alias',array('locale'=>$id));
        if(!empty($item_alias)) {
            $this->system_model->Delete_where('alias',array('locale' => $id));
        }
    }
    //Delete  danh muc product_brand
    public function deletelocalecategory($id)
    {
        $this->delete_locati_once($id);
        $this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
    
     public function delete_locati_once($id)
    {
        $this->check_acl();
 
        $item = $this->system_model->getField('product_locale','id',array(
            'id' => $id
        ));
 
        if(file_exists($item->image)){
            @unlink($item->image);
        }
        $this->system_model->Delete_where('product_locale',array('id' => $id));
  
        $item_alias =$this->system_model->getField('alias','locale',array('locale'=>$id));
        if(!empty($item_alias)){
            $this->system_model->Delete_where('alias',array('locale' => $id));
        }
    }

   
//====== màu sắc ===============================================================
  public function listColor()
    {
        $this->check_acl();
        $data['list'] = $this->system_model->getFields('product_color','id,name,sort,image,color',array(
            'lang' => $this->language
        ),array('sort' => 'asc'));
         foreach ($this->session->userdata('phanquyen') as $key => $cat) {
            if($cat->resource == 'attribute'){
                $data['attribute'] =  $cat;
                foreach ($data['attribute']->cat_sub as $key2 => $cat2) {
                    if($cat2->resource == 'listColor'){
                        // hiên thị phan quyen màu sắc
                        $data['show_listColor'] =  $cat2;
                    }

                }
            }
        }
         
         $title = "".@$cat2->name;
        $this->LoadHeaderAdmin(false,$title);
        $this->load->view('admin/product_color/list', $data);
        $this->load->view('admin/footer');
    }
    public function addcolor()
    {
        $this->add_edit_color();
    }
    public function editcolor($id=null)
    {
        $this->add_edit_color($id);
    }
    public function add_edit_color($id_edit=null)
    {
        $this->check_acl();
        $config['upload_path'] = './upload/img/brand/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|PNG|JPEG|GIF|SVG|svg';
        $config['max_size'] = '4000';
        $config['max_width'] = '3000';
        $config['max_height'] = '3000';
        $this->load->library('upload', $config);

        $data['btn_name']='Thêm';
        $data['max_sort']=$this->system_model->SelectMax('product_color','sort')+1;
         if($id_edit!=null){
            $data['edit']=$this->system_model->get_data('product_color',array('id'=>$id_edit),array(),true);
            $data['max_sort']=$max_sort=$data['edit']->sort;
            $data['btn_name']='Cập nhật';
            $data['cate_selected'] = $this->system_model->getField_array('color_to_category','id_category',
               array('id_color'=>$id_edit));
        }
       // var_dump($this->input->post('color'));die;
        if (isset($_POST['addnews'])) {
            $alias = make_alias($this->input->post('name'));
            $arr = array(
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'color' => $this->input->post('color'),
                'sort' => $this->input->post('sort'),
                'lang' => $this->language
            );

            if (!empty($_POST['edit'])){
                $id = $this->system_model->Update_where('product_color', array('id'=>$id_edit), $arr);
                $this->session->set_flashdata("mess", "Cập nhật thành công!");
            } else {
                $id = $this->system_model->Add('product_color', $arr);
                $this->session->set_flashdata("mess", "Thêm thành công!");
            }



            if ($id_edit != null) {
                $id = $id_edit;
            } else $id = $id;

            if ($id) {
              if (isset($_POST['category']) && sizeof($_POST['category']) > 0) {
                   $post_cat = $_POST['category'];
                   $this->system_model->Delete_where('color_to_category', array('id_color' => $id));
                   for ($i = 0; $i < sizeof($post_cat); $i++) {
                       $ca = array('id_color' => $id, 'id_category' => $post_cat[$i]);
                       $this->system_model->Add('color_to_category', $ca);
                   }
               }
               $a= $this->system_model->Update_where('product_color', array('id'=>$id), array('parent_id' => end($post_cat)));
            }

            if ($_FILES['userfile']['name'] != '') {
                if (!$this->upload->do_upload()) {
                    $this->session->set_flashdata("mess", "".$this->upload->display_errors());
                } else {
                    $upload = array('upload_data' => $this->upload->data());
                    $image = 'upload/img/brand/' . $upload['upload_data']['file_name'];

                    $this->system_model->Update_where('product_color',array('id'=>$id),array('image'=>$image));
                }
            }

            redirect(base_url('techadmin/attribute/listColor'));
        }

        foreach ($this->session->userdata('phanquyen') as $key => $cat) {
            if($cat->resource == 'attribute'){
                $data['attribute'] =  $cat;
                foreach ($data['attribute']->cat_sub as $key2 => $cat2) {

                    if($cat2->resource == 'listColor'){
                        // hiên thị phan quyen màu sắc
                        $data['show_listColor'] =  $cat2;
                    }

                }
            }
        }

        $data['procat'] = $this->system_model->get_data('product_category',array(
            'lang' => $this->language
        ),array('sort'=>''));


        

         $title = "".$data['btn_name']."&nbsp".$cat2->name;
        $this->LoadHeaderAdmin(false,$title);
        $this->load->view('admin/product_color/add', $data);
        $this->load->view('admin/footer');
    }
    // xoa list danh muc
    public function deletes_color_category()
    {
        $ids = $this->input->post('checkone');
        foreach($ids as $id)
        {
            $this->delete_color_once($id);
        }
        $this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function delete_color_once($id)
    {
        $this->check_acl();
        // xoa ban ghi trong product_color
        $item = $this->system_model->getField('product_color','id',array(
            'id' => $id
        ));
        // xoa anh trong thu muc
        if(file_exists(@$item->image)){
            @unlink($item->image);
        }
        $this->system_model->Delete_where('product_color',array('id' => $id));

    }
    //Delete  danh muc product_color
    public function deletecolorcategory($id)
    {
        $this->delete_color_once($id);
        $this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
//========= khoang gia ======================================================
    public function listprice()
    {
        $this->check_acl();
        $data['list'] = $this->system_model->getFields('product_price','id,sort,name,parent_id,from_price,to_price',array(
            'lang' => $this->language
        ),array('sort' => 'asc'));

        foreach ($data['list'] as $key => $cat) {
            $data['list'][$key]->cat_name = $this->system_model->getField('product_color',
                array('name'),array('id' => $cat->parent_id,));
        }
         $title = "Quản lý khoảng giá";
        $this->LoadHeaderAdmin(false,$title);
        $this->load->view('admin/product_price/list', $data);
        $this->load->view('admin/footer');
    }
    public function addprice()
    {
        $this->add_edit_price();
    }
    public function editprice($id=null)
    {
        $this->add_edit_price($id);
    }
    public function add_edit_price($id_edit=null)
    {
        $this->check_acl();
        $data['btn_name']='Thêm';
        $data['max_sort']=$this->system_model->SelectMax('product_price','sort')+1;
         if($id_edit!=null){
            $data['edit']=$this->system_model->get_data('product_price',array('id'=>$id_edit),array(),true);
            $data['max_sort']=$max_sort=$data['edit']->sort;
            $data['btn_name']='Cập nhật';

            $data['cate_selected'] = $this->system_model->getField_array('color_to_price','color_id',
               array('price_id'=>$id_edit));
        }
        if (isset($_POST['addnews'])) {
            $alias = make_alias($this->input->post('name'));
            $from_price = str_replace(array(';','.',',',' '),'',$this->input->post('from_price'));
            $to_price   = str_replace(array(';','.',',',' '),'',$this->input->post('to_price'));
            $arr = array(
                'name' => $this->input->post('name'),
                'from_price' => $from_price,
                'to_price' => $to_price,
                'sort' => $this->input->post('sort'),
                'lang' => $this->language
            );
            if (!empty($_POST['edit'])){
                $id = $this->system_model->Update_where('product_price', array('id'=>$id_edit), $arr);
                $this->session->set_flashdata("mess", "Cập nhật thành công!");
            } else {
                $id = $this->system_model->Add('product_price', $arr);
                $this->session->set_flashdata("mess", "Thêm thành công!");
            }

            if ($id_edit != null) {
                $id = $id_edit;
            } else $id = $id;

            if($id){
                 if (isset($_POST['category']) && sizeof($_POST['category']) > 0) {
                     $post_cat = $_POST['category'];
                     $this->system_model->Delete_where('color_to_price', array('price_id' => $id));
                     for ($i = 0; $i < sizeof($post_cat); $i++) {
                         $ca = array('price_id' => $id, 'color_id' => $post_cat[$i]);
                         $this->system_model->Add('color_to_price', $ca);
                     }
                 }
              $a= $this->system_model->Update_where('product_price', array('id'=>$id), array('parent_id' => end($post_cat)));
             }

            redirect(base_url('techadmin/attribute/listprice'));
        }

        $data['procat'] = $this->system_model->get_data('product_color',array(
            'lang' => $this->language
        ),array('sort'=>''));

        

         $title = "".$data['btn_name']."";
        $this->LoadHeaderAdmin(false,$title);
        $this->load->view('admin/product_price/add', $data);
        $this->load->view('admin/footer');
    }
    
    // xoa list danh muc
    public function deletes_price_category()
    {
        $ids = $this->input->post('checkone');
        foreach($ids as $id)
        {
            $this->delete_price_once($id);
        }
        $this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function delete_price_once($id)
    {
        $this->check_acl();
        $this->system_model->Delete_where('product_price',array('id' => $id));
    }
    //Delete  danh muc product_price
    public function deletepricecategory($id)
    {
        $this->delete_price_once($id);
        $this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
//========== kich thước ================================================
    public function listsize()
    {
        $this->check_acl();
        $data['list'] = $this->system_model->getFields('product_size','id,name,sort,parent_id',array(
            'lang' => $this->language
        ),array('sort' => 'asc'));

        foreach ($data['list'] as $key => $cat) {
            $data['list'][$key]->cat_name = $this->system_model->getField('product_locale',
                array('name'),array('id' => $cat->parent_id,));
        }

        foreach ($this->session->userdata('phanquyen') as $key => $cat) {
            if($cat->resource == 'attribute'){
                $data['attribute'] =  $cat;
                foreach ($data['attribute']->cat_sub as $key2 => $cat2) {
                    if($cat2->resource == 'listLocale'){
                        // hiên thị phan quyen xuất sứ
                        $data['show_listLocale'] =  $cat2;
                    }
                    if($cat2->resource == 'listsize'){
                        // hiên thị phan quyen kich thuoc
                        $data['show_listOption'] =  $cat2;
                    }
                }
            }
        }
        $title = "".$data['show_listOption']->name."";
        $this->LoadHeaderAdmin(false,$title);
        $this->load->view('admin/product_size/list', $data);
        $this->load->view('admin/footer');
    }
    public function addsize()
    {
        $this->add_edit_size();
    }
    public function editsize($id=null)
    {
        $this->add_edit_size($id);
    }
    public function add_edit_size($id_edit=null)
    {
        $this->check_acl();
        $data['btn_name']='Thêm';
        $data['max_sort']=$this->system_model->SelectMax('product_size','sort')+1;
         if($id_edit!=null){
            $data['edit']=$this->system_model->get_data('product_size',array('id'=>$id_edit),array(),true);
            $data['max_sort']=$max_sort=$data['edit']->sort;
            $data['btn_name']='Cập nhật';
             $data['cate_selected'] = $this->system_model->getField_array('locale_to_size','locale_id',
                array('size_id'=>$id_edit));
        }

        if (isset($_POST['addnews'])) {
            $arr = array(
                'name' => $this->input->post('name'),
                'size' => $this->input->post('size'),
                'sort' => $this->input->post('sort'),
                'parent_id' => 0,
                'lang' => $this->language
            );

            if (!empty($_POST['edit'])){
                $id = $this->system_model->Update_where('product_size', array('id'=>$id_edit), $arr);
                $this->session->set_flashdata("mess", "Cập nhật thành công!");
            } else {
                $id = $this->system_model->Add('product_size', $arr);
                $this->session->set_flashdata("mess", "Thêm thành công!");
            }

            redirect(base_url('techadmin/attribute/listsize'));
        }

         foreach ($this->session->userdata('phanquyen') as $key => $cat) {
            if($cat->resource == 'attribute'){
                $data['attribute'] =  $cat;
                foreach ($data['attribute']->cat_sub as $key2 => $cat2) {
                    if($cat2->resource == 'listBrand'){
                        // hiên thị phan quyen thương hiệu
                        $data['show_listBrand'] =  $cat2;
                        $data['cat_brand'] = $this->system_model->get_data('product_brand',array(
                            'lang' => $this->language
                        ),null);
                    }
                    if($cat2->resource == 'listLocale'){
                        // hiên thị phan quyen xuất sứ
                        $data['show_listLocale'] =  $cat2;
                    }
                }
            }
        }

        $data['procat'] = $this->system_model->get_data('product_locale',array(
            'lang' => $this->language
        ),array('sort'=>''));


       
         $title = "".$data['btn_name']."&nbsp"."kích thước";
        $this->LoadHeaderAdmin(false,$title);
        $this->load->view('admin/product_size/add', $data);
        $this->load->view('admin/footer');
    }
    
    // xoa list danh muc
    public function deletes_size_category(){
        $ids = $this->input->post('checkone');
        foreach($ids as $id)
        {
            $this->delete_size_once($id);
        }
        $this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function delete_size_once($id)
    {
        $this->check_acl();
        // xoa ban ghi trong product_brand
        $item = $this->system_model->getFirstRowWhere('product_size',array(
            'id' => $id
        ));
        // xoa anh trong thu muc
        $this->system_model->Delete_where('product_size',array('id' => $id));
        $this->session->set_flashdata("mess", "Xóa thành công!");
         redirect($_SERVER['HTTP_REFERER']);
       
    }
 
    //Delete  danh muc product_price
    public function deletesizecategory($id)
    {
        $this->delete_size_once($id);
        $this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
}
