<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Product extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('productmodel');
        $this->load->library('pagination');
        $this->_Route();
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
//    ======================================================================================================================
    public function products()
    {
        $this->check_acl();
        if($this->input->get()){
            $where = array(
                'code' => $this->input->get('code')?$this->input->get('code'):'',
                'name' => $this->input->get('name'),
                'cate' => $this->input->get('cate'),
                'view' => $this->input->get('view'),
                'lang' => $this->input->get('lang'),
            );
            $config['page_query_string']    = TRUE;
            $config['enable_query_strings'] = TRUE;
            $config['base_url']             = base_url('techadmin/product/products?code='
                . $this->input->get('code')
                . '&name=' . $this->input->get('name')
                . '&cate=' . $this->input->get('cate')
                . '&view=' . $this->input->get('view')
                . '&lang=' . $this->input->get('lang')
            );
            $config['total_rows']           = $this->productmodel->count_listpro($where);
            $config['per_page']             = 20;
            $config['uri_segment'] = 4;
            $config=array_merge($config,$this->pagination_config);
            $this->pagination->initialize($config);
            $data['list'] = $this->productmodel->getListProduct($where, $config['per_page'], $this->input->get('per_page'));

        }else{
            $where = array(
                'lang' => $this->language
            );
            $config['base_url'] = base_url('techadmin/product/products');
            $config['total_rows'] = $this->productmodel->count_listpro($where); // xác định tổng số record
            $config['per_page'] =20; // xác định số record ở mỗi trang
            $config['uri_segment'] = 4; // xác định segment chứa page number
            $config=array_merge($config,$this->pagination_config);
            $this->pagination->initialize($config);
            $data['list'] = $this->productmodel->getListProduct($where, $config['per_page'],
                $this->uri->segment(4));
        }
        foreach ($data['list'] as $key => $cat) {
            $data['list'][$key]->cat_name = $this->productmodel->getField('product_category',
                array('name'),array('id' => $cat->category_id,));
            $data['list'][$key]->full_name = $this->productmodel->getField('users',
                array('fullname'),array('id' => $cat->user_id));
        }

        $data['product_all'] = $this->productmodel->getFields('product','id,sort,name,image,home,hot,focus,code,alias',array('lang' => $this->language),array('id' => 'desc'));
        $auto_code = '';
        $auto_name = '';
        foreach ($data['product_all'] as $nameget) {
            $subname = $nameget->name;
            $subcode = $nameget->code;
            if ($auto_code == null) {
                $auto_code = $subcode;
            } else {
                $auto_code = $auto_code . "," . $subcode;
            }
            if ($auto_name == null) {
                $auto_name = $subname;
            } else {
                $auto_name = $auto_name . "," . $subname;
            }
        }
        //var_dump($data['product_brand_all']);die;
        $data['auto_code'] = $auto_code;
        $data['auto_name'] = $auto_name;
        $data['cate'] = $this->productmodel->get_data('product_category',array('lang' => $this->language),array('id' => 'desc'));
        // hien thi danh sach nut
        $data['show_home'] = $this->productmodel->getField('config_checkpro','type,field,active,color,name',array('type' => 'product','field' => 'home',));
        $data['show_hot'] = $this->productmodel->getField('config_checkpro','type,field,active,color,name',array('type' => 'product','field' => 'hot',));
        $data['show_focus'] = $this->productmodel->getField('config_checkpro','type,field,active,color,name',array('type' => 'product','field' => 'focus',));
        $data['show_coupon'] = $this->productmodel->getField('config_checkpro','type,field,active,color,name',array('type' => 'product','field' => 'coupon',));
         
         $title = "Sản phẩm";
            $this->LoadHeaderAdmin(false,$title);
        $this->load->view('admin/products/view_product/list', $data);
        $this->load->view('admin/footer');
    }

    public function users_product()
   {
       $this->check_acl();
       if($this->input->get()){
           $where = array(
               'code' => $this->input->get('code')?$this->input->get('code'):'',
               'name' => $this->input->get('name'),
               'cate' => $this->input->get('cate'),
               'view' => $this->input->get('view'),
               'lang' => $this->input->get('lang'),
                'user_id >' => 2
           );
           $config['page_query_string']    = TRUE;
           $config['enable_query_strings'] = TRUE;
           $config['base_url']             = base_url('techadmin/product/products?code='
               . $this->input->get('code')
               . '&name=' . $this->input->get('name')
               . '&cate=' . $this->input->get('cate')
               . '&view=' . $this->input->get('view')
               . '&lang=' . $this->input->get('lang')
           );
           $config['total_rows']           = $this->productmodel->count_listpro($where);
           $config['per_page']             = 20;
           $config['uri_segment'] = 4;
           $config=array_merge($config,$this->pagination_config);
           $this->pagination->initialize($config);
           $data['list'] = $this->productmodel->getListProduct($where, $config['per_page'], $this->input->get('per_page'));

       }else{
            $where = array(
               'lang' => $this->language,
           );

           $config['base_url'] = base_url('techadmin/product/products');
           $config['total_rows'] = $this->productmodel->count_listpro_kh($where); // xác định tổng số record
           $config['per_page'] =20; // xác định số record ở mỗi trang
           $config['uri_segment'] = 4; // xác định segment chứa page number
           $config=array_merge($config,$this->pagination_config);
           $this->pagination->initialize($config);
           $data['list'] = $this->productmodel->getListProduct_kh($where, $config['per_page'],
               $this->uri->segment(4));
       }
       foreach ($data['list'] as $key => $cat) {
           $data['list'][$key]->cat_name = $this->productmodel->getField('product_category',
               array('name'),array('id' => $cat->category_id,));
           $data['list'][$key]->full_name = $this->productmodel->getField('users',
               array('fullname'),array('id' => $cat->user_id));
       }

       $data['product_all'] = $this->productmodel->getFields('product','id,sort,name,image,home,hot,focus,code,alias',array('lang' => $this->language),array('id' => 'desc'));
       $auto_code = '';
       $auto_name = '';
       foreach ($data['product_all'] as $nameget) {
           $subname = $nameget->name;
           $subcode = $nameget->code;
           if ($auto_code == null) {
               $auto_code = $subcode;
           } else {
               $auto_code = $auto_code . "," . $subcode;
           }
           if ($auto_name == null) {
               $auto_name = $subname;
           } else {
               $auto_name = $auto_name . "," . $subname;
           }
       }
       //var_dump($data['product_brand_all']);die;
       $data['auto_code'] = $auto_code;
       $data['auto_name'] = $auto_name;
       $data['cate'] = $this->productmodel->getFields('product_category','id,name,parent_id',array('lang' => $this->language),array('id' => 'desc'));

       // hien thi danh sach nut
       $data['show_home'] = $this->productmodel->getField('config_checkpro','type,field,active,color,name',array('type' => 'product','field' => 'home',));
       $data['show_hot'] = $this->productmodel->getField('config_checkpro','type,field,active,color,name',array('type' => 'product','field' => 'hot',));
       $data['show_focus'] = $this->productmodel->getField('config_checkpro','type,field,active,color,name',array('type' => 'product','field' => 'focus',));
       $data['show_coupon'] = $this->productmodel->getField('config_checkpro','type,field,active,color,name',array('type' => 'product','field' => 'coupon',));
        
        $title = "Sản phẩm";
            $this->LoadHeaderAdmin(false,$title);
       $this->load->view('admin/products/view_product/list_kh', $data);
       $this->load->view('admin/footer');
   }
    public function add(){
       $this->add_edit();
    }
     public function edit($id){
       $this->add_edit($id);
    }
    #achor add
    public function add_edit($id_edit=null)
    {
        $this->check_acl();
        $data['admin'] = $this->session->userdata('adminid');
        $this->load->helper('thumbnail_helper');
        $data['btn_name'] = 'Thêm';
        $data['btn_demo'] = "Upload file demo";
        $data['btn_download'] = "Cập nhật file download";
        $data['max_sort'] = $max_sort=$this->productmodel->SelectMax('product','sort')+1;
        $data['array_json'] = $this->option->config_pro;
        $data['array_json_content'] = $this->option->config_pro_content;

        $data['thuoctinh'] = (array)json_decode(@$this->option->config_pro_content);
        if($id_edit!=null){
            $data['edit']=$this->productmodel->getFirstRowWhere('product',array('id'=>$id_edit));
            if($data['edit']->config_pro!=''){
                $data['array_json'] = json_decode($data['edit']->config_pro);
            }
            $arr1 = json_decode($this->option->config_pro_content);
            if(!empty($data['array_json'])){
                foreach ($arr1 as $key => $cat) {
                    if (isset($data['array_json'][$key]->content)) {
                        $arr1[$key]->content =  $data['array_json'][$key]->content;
                    }
                }
            }


            $data['arr1_thuoctinh'] = $arr1_thuoctinh = (array)json_decode($data['edit']->config_pro_content);


            //var_dump($data['arr1_thuoctinh']);
            $data['thuoctinh'] = $arr1;
            $data['cate_selected'] = $this->productmodel->getField_array('product_to_category','id_category',
                array('id_product'=>$id_edit));
            // $data['season_selected'] = $this->productmodel->getField_array('product_to_season','id_season',
                // array('id_product'=>$id_edit));
            $data['size_selected'] = $this->productmodel->getField_array('product_to_size','id_size',
                 array('id_product'=>$id_edit));
           // var_dump($data['size_checked'] );die;
            $data['color_selected'] = $this->productmodel->getField_array('product_to_color','id_color',
                array('id_product'=>$id_edit));

            // danh sách ảnh hụ
            $data['listimg'] = $this->productmodel->getFields('p_images','name,image,id_item,id',array('id_item'=>$id_edit));
            $data['tag'] = $this->productmodel->get_tag(array(
                'tags_to_product.id_product'=> $id_edit,
                'tags.lang' => $this->language
            ));
            $data['btn_name']='Cập nhật';
            $data['btn_demo'] = "Cập nhật file demo";
            $data['btn_download'] = "File download";
            $data['max_sort']=$max_sort=$data['edit']->sort;
        }

        if (isset($_POST['addnews'])) {

          if (isset($_POST['content']) && sizeof($_POST['content']) > 0) {
                $post_content = $_POST['content'];
                $arr1 = json_decode($this->option->config_pro_content);
                for ($i = 0; $i < sizeof($post_content); $i++) {
                    $name = $arr1[$i]->name;
                    $type = $arr1[$i]->type;
                    $sort_att = $arr1[$i]->sort;
                    $arr1[$i] = array(
                        'content'        => $post_content[$i],
                        'name'   => $name,
                        'type'  =>$type,
                        'sort'   => $sort_att,
                    );
                 }
            }

            // if (isset($_POST['id_dm']) && sizeof($_POST['id_dm']) > 0 && isset($_POST['id_tt']) && sizeof($_POST['id_tt']) > 0 && isset($_POST['name_dm']) && isset($_POST['name_tt'])) {

            //     $post_name_dm = $_POST['name_dm'];
            //     $post_name_tt = $_POST['name_tt'];
            //     $post_id_dm = $_POST['id_dm'];
            //     $post_id_tt = $_POST['id_tt'];
            //     $dm_cha = '';
            //     $dm_con = '';
            //     for ($i = 0; $i < sizeof($post_id_dm); $i++) {
            //         $dm_cha .= $post_id_dm[$i].',';
            //         $dm_con .= $post_id_tt[$i].',';
            //         $arr1_thuoctinh[$i] = array(
            //             'name_dm'        => $post_name_dm[$i],
            //             'id_dm'   => $post_id_dm[$i],
            //             'name_tt'   => $post_name_tt[$i],
            //             'id_tt'   => $post_id_tt[$i],
            //         );
            //      }
            // }


            //var_dump($arr1_thuoctinh);die;
            $id_start  = (int)$this->input->post('downloaded');
            $arrTags = explode(",",$this->input->post('tags'));
            $price       = str_replace(array(';','.',',',' '),'',$this->input->post('price'));
            $price_sale      = str_replace(array(';','.',',',' '),'',$this->input->post('price_sale'));
            $alias = make_alias($this->input->post('alias'));
            $arr = array(
                'name'            => $this->input->post('name'),
                'alias'           => make_alias($this->input->post('alias')),
                'description'     => $this->input->post('description'),
                'code'            => $this->input->post('code'),
                'detail'          => $this->input->post('detail'),
                'price'           => $price,
                'price_sale'      => $price_sale,
                'status'       => $this->input->post('status'),
                'home'            => $this->input->post('home'),
                'hot'             => $this->input->post('hot'),
                'focus'           => $this->input->post('focus'),
                'coupon'          => $this->input->post('coupon'),
                'active'          => $this->input->post('active'),
                'description_seo' => $this->input->post('description_seo'),
                'title_seo'       => $this->input->post('title_seo'),
                'keyword_seo'     => $this->input->post('keyword_seo'),
                'destination'     => $this->input->post('destination'),
                'brand'            => $this->input->post('brand'),
                'style'           => $this->input->post('style'),
                'caption_1'       => $this->input->post('caption_1'),
                'caption_2'       => $this->input->post('caption_2'),
                'locale'          => $this->input->post('locale'),
                'province'          => $this->input->post('province'),
                'district'          => $this->input->post('district'),
                'thuoctinhhang'          => $this->input->post('thuoctinhhang'),
                'tinhtrang'          => $this->input->post('tinhtrang'),
                'view'            => $this->input->post('view'),
                'weight'            => $this->input->post('dangboi'),
               // 'sort'            => $max_sort,
                'counter'         => $this->input->post('counter'),
                'quaranty'         => $this->input->post('quaranty'),
                'dksudung'         => $this->input->post('dksudung'),
                'lang'            => $this->language,
                'group_attribute_id'            => $this->input->post('group'),
                'tags'          => $this->input->post('tags'),
                'time'          =>time(),
                'user_id'           =>$data['admin'],
                'config_pro'            =>json_encode($arr1),
                'config_pro_content'            =>json_encode($arr1_thuoctinh),
                'dm_cha' => @$dm_cha,
                'dm_con' => @$dm_con,
            );

            if (!empty($_POST['edit'])){
                $id = $this->productmodel->Update_where('product', array('id'=>$id_edit), $arr);
                $this->session->set_flashdata("mess", "Cập nhật thành công!");
            } else {
                $id = $this->productmodel->Add('product', $arr);
                $this->session->set_flashdata("mess", "Thêm mới thành công!");
            }
            if ($id_edit != null) {
                  $id = $id_edit;
                } else $id = $id;
            $checkAlias = $this->productmodel->getFirstRowWhere('alias',array(
                'pro' => $id
            ));
            if(empty($checkAlias)){
                $this->productmodel->Add('alias',array(
                    'pro' => $id,
                    'type' => 'pro',
                    'alias' => $alias
                ));
            }else{
                $this->productmodel->Update_where('alias',array('pro' => $id),array(
                    'alias' => $alias
                ));
            }
            /*
             * tags
             */
            if ($arrTags > 0) {
                foreach ($arrTags as $tag)
                {
                    $tag = trim($tag);
                    if($tag !='')
                    {
                        if(make_alias($tag)==null){
                            // trương hop tag cho ngon ngu tieng trung, tiếng nhật
                            $item = $this->productmodel->getFirstRowWhere('tags',array(
                                'alias' => $tagname=trim(stripslashes(json_encode($tag)),'"'),
                            ));
                            if(empty($item)){
                                $id_tag=$this->productmodel->Add('tags',array(
                                    'name' => $tag,
                                    'alias' => $tagname,
                                    'lang'=>$this->language,
                                    'time'=>time(),
                                ));
                            }else{

                                $id_tag=$item->id;
                            }
                            $item_to_tags = $this->productmodel->getFirstRowWhere('tags_to_product',array(
                                'id_tags' => $id_tag,
                                'id_product' => $id,
                            ));
                            if (empty($item_to_tags)) {
                                $this->productmodel->Add('tags_to_product',array(
                                    'id_tags' => $id_tag,
                                    'id_product' => $id,
                                ));
                            }
                        }else{

                            $item = $this->productmodel->getFirstRowWhere('tags',array(
                                'alias' => make_alias($tag),
                            ));
                            if(empty($item)){
                                $id_tag=$this->productmodel->Add('tags',array(
                                    'name' => $tag,
                                    'alias' => make_alias($tag),
                                    'lang'=>$this->language,
                                    'time'=>time(),
                                ));

                            }else{
                                $id_tag=$item->id;
                            }
                            $item_to_tags = $this->productmodel->getFirstRowWhere('tags_to_product',array(
                                'id_tags' => $id_tag,
                                'id_product' => $id,
                            ));
                            if (empty($item_to_tags)) {
                                $this->productmodel->Add('tags_to_product',array(
                                    'id_tags' => $id_tag,
                                    'id_product' => $id,
                                ));
                            }
                        }

                    }

                }
            }




            if (isset($_POST['category']) && sizeof($_POST['category']) > 0) {
                $post_cat = $_POST['category'];
                $this->productmodel->Delete_where('product_to_category', array('id_product' => $id));
                for ($i = 0; $i < sizeof($post_cat); $i++) {
                    $ca = array('id_product' => $id, 'id_category' => $post_cat[$i]);
                    $this->productmodel->Add('product_to_category', $ca);
                }

               $a= $this->productmodel->Update_where('product', array('id'=>$id), array('category_id' => end($post_cat)));

            }
            // cap nhat màu sắc
            if (isset($_POST['color']) && sizeof($_POST['color']) > 0) {
                $post_color = $_POST['color'];

                $this->productmodel->Delete_where('product_to_color', array('id_product' => $id));
                for ($i = 0; $i < sizeof($post_color); $i++) {
                    $color = array('id_product' => $id, 'id_color' => $post_color[$i]);
                    $this->productmodel->Add('product_to_color', $color);
                }
                $this->productmodel->Update_where('product', array('id'=>$id), array('color' => end($post_color)));
            }

            // cap nhat size
            if (isset($_POST['size']) && sizeof($_POST['size']) > 0) {
                $post_size = $_POST['size'];

                $this->productmodel->Delete_where('product_to_size', array('id_product' => $id));
                for ($i = 0; $i < sizeof($post_size); $i++) {
                    $size = array('id_product' => $id, 'id_size' => $post_size[$i]);
                    $this->productmodel->Add('product_to_size', $size);
                }
                $this->productmodel->Update_where('product', array('id'=>$id), array('size' => end($post_size)));
            }
            //upload images ảnh đại diện
            $this->load->library('upload');
            $pathImage = "upload/img/products/";
            $dir_image = date('dmY');
            if(!is_dir($pathImage.$dir_image))
            {
                @mkdir($pathImage.$dir_image);
                $this->load->helper('file');
                @write_file($pathImage.$dir_image.'/index.html', '<p>Directory access is forbidden.</p>');
            }
            if(!is_dir($pathImage.$dir_image.'/thumb'))
            {
                @mkdir($pathImage.$dir_image.'/thumb');
                $this->load->helper('file');
                @write_file($pathImage.$dir_image.'/thumb/index.html', '<p>Directory access is forbidden.</p>');
            }
            $config['upload_path'] = $pathImage.$dir_image.'/';
            $config['allowed_types'] = 'gif|(jpg)|jpg|png|jpeg|JPEG|JPG|PNG|GIF|svg|SVG';
            $config['max_size'] = '*';
            $config['max_width'] = '5000';
            $config['max_height'] = '5000';
            $this->upload->initialize($config);
            $image = '';
            if ($_FILES['userfile']['name'] != '') {
                $type_image = explode(".", $_FILES['userfile']['name']);
                $a = make_alias($type_image[0]);
                $file_name = $a.'.'.$type_image[1];
                $_FILES['userfile']['name'] =  $file_name;

                if (!$this->upload->do_upload('userfile')) {
                    $this->session->set_flashdata("mess", "".$this->upload->display_errors());
                } else {
                    $uploadData = $this->upload->data();
                    if($uploadData['is_image'] == TRUE)
                    {
                        $image = $uploadData['file_name'];
                    }
                    elseif(file_exists($pathImage.$dir_image.'/'.$uploadData['file_name']))
                    {
                        @unlink($pathImage.$dir_image.'/'.$uploadData['file_name']);
                        $this->session->set_flashdata("mess", "".$this->upload->display_errors());
                    }
                    unset($uploadData);
                    // xoa anh dai dien cũ và anh thumb cu
                    $item=$this->productmodel->getFirstRowWhere('product',array('id'=>$id));
                    $dir_image_old = $item->pro_dir;
                    // xoa anh san pham
                    if(file_exists($pathImage.$dir_image_old.'/'.$item->image))
                    {
                        @unlink($pathImage.$dir_image_old.'/'.$item->image);
                        @unlink($pathImage.$dir_image_old.'/thumb/'.$item->image);
                    }
                    // xoa anh thumb
                    for($j = 1; $j <= 3; $j++)
                    {
                        if(file_exists($pathImage.$dir_image_old.'/thumbnail_'.$j.'_'.$item->image))
                        {
                            @unlink($pathImage.$dir_image_old.'/thumbnail_'.$j.'_'.$item->image);
                        }
                    }
                }
            }

            $data['config_home'] = $config_home = $this->productmodel->getFirstRowWhere('site_option',array('lang' => 'config','active'=>0));
            if($image !='')
            {
                if(file_exists($pathImage.$dir_image.'/'.$image))
                {
                    $link =  $pathImage.$dir_image.'/'.$image;
                    // dong dau anh
                    $this->load->library('image_lib');
                    if(@$config_home->watermark==1){
                        if(@$config_home->WM_text==1){
                            // dong giau text trươc khi tao anh thumb
                            $this->load->helper('email_helper');
                            $mt = add_water_mark($link,$this->option->WM_text,$this->option->WM_color, $this->option->WM_size);
                            if(!$mt){
                                $this->session->set_flashdata("mess", "Up ảnh không thành công !");
                            }
                        }else{
                            // dong giau anh logo trươc khi tao anh thumb
                            $config_watermark['wm_type'] = 'overlay';
                            $config_watermark['source_image'] = $pathImage.$dir_image.'/'.$image;;
                            $config_watermark['wm_overlay_path'] = $this->option->site_logo;//'./upload/logo.png';
                            $config_watermark['wm_vrt_alignment'] = 'middle';
                            $config_watermark['wm_hor_alignment'] = 'center';
                            $config_watermark['wm_padding'] = '0';
                            $config_watermark['wm_opacity'] = '100';
                            $this->image_lib->initialize($config_watermark);
                            $this->image_lib->watermark();
                        }
                    }

                    for($j = 1; $j <= 3; $j++)
                    {
                        switch($j)
                        {
                            case 1:
                                $maxWidth = 300;#px
                                $maxHeight = 300;#px
                                $wm_font_size = 28;
                                break;
                            case 3:
                                $maxWidth = 63;#px
                                $maxHeight = 63;#px
                                $wm_font_size = 9;
                                break;
                            default:
                                $maxWidth = 600;#px
                                $maxHeight = 600;#px
                        }
                        $sizeImage = size_thumbnail($pathImage.$dir_image.'/'.$image, $maxWidth, $maxHeight);
                        $configImage['source_image'] = $pathImage.$dir_image.'/'.$image;
                        $configImage['new_image'] = $pathImage.$dir_image.'/thumbnail_'.$j.'_'.$image;
                        $configImage['maintain_ratio'] = TRUE;
                        $configImage['width'] = $sizeImage['width'];
                        $configImage['height'] = $sizeImage['height'];
                        $this->image_lib->initialize($configImage);
                        $this->image_lib->resize();
                        $this->image_lib->clear();
                    }
                }
                // cat ảnh crop
                $fileName = basename($_FILES["userfile"]["name"]);
                $fileTmp = $_FILES["userfile"]["tmp_name"];
                $fileType = $_FILES["userfile"]["type"];
                $fileSize = $_FILES["userfile"]["size"];
                $fileExt = substr($fileName, strrpos($fileName, ".") + 1);
               //  //specify image upload directory
                $largeImagegoc = $pathImage.$dir_image.'/'.$file_name;
                $thumbImagegoc = $pathImage.$dir_image.'/thumb/'.$file_name;
                chmod ($largeImagegoc, 0777);                      
                  //get dimensions of the original image
                  list($width_org, $height_org) = getimagesize($largeImagegoc);
                  
                  //get image coords
                  $x = (int) $_POST['x'];
                  $y = (int) $_POST['y'];
                  $width = (int) $_POST['w'];
                  $height = (int) $_POST['h'];

                  //define the final size of the cropped image
                  $width_new = $width;
                  $height_new = $height;
                  //crop and resize image
                  $newImage = imagecreatetruecolor($width_new,$height_new);
                  
                  switch($fileType) {
                      case "image/gif":
                          $source = imagecreatefromgif($largeImagegoc); 
                          break;
                      case "image/pjpeg":
                      case "image/jpeg":
                      case "image/jpg":
                          $source = imagecreatefromjpeg($largeImagegoc); 
                          break;
                      case "image/png":
                      case "image/x-png":
                          $source = imagecreatefrompng($largeImagegoc); 
                          break;
                  }                      
                  imagecopyresampled($newImage,$source,0,0,$x,$y,$width_new,$height_new,$width,$height);                      
                  switch($fileType) {
                      case "image/gif":
                          imagegif($newImage,$thumbImagegoc); 
                          break;
                      case "image/pjpeg":
                      case "image/jpeg":
                      case "image/jpg":
                          imagejpeg($newImage,$thumbImagegoc,90); 
                          break;
                      case "image/png":
                      case "image/x-png":
                          imagepng($newImage,$thumbImagegoc);  
                          break;
                  }
                  imagedestroy($newImage);   
                // cap nhat anh moi
                $this->productmodel->Update_where('product', array('id'=>$id), array(
                    'image' => @$image,
                    'pro_dir' => $dir_image,
                ));
            }
            if(@$image == 'none.gif')
            {
                #Remove dir
                $this->load->library('file');
                if(trim($dir_image) != '' && trim($dir_image) != 'default' && is_dir('upload/img/products/'.$dir_image) && count($this->file->load('upload/img/products/'.$dir_image,'index.html')) == 0)
                {
                    if(file_exists('upload/img/products/'.$dir_image.'/index.html'))
                    {
                        @unlink('upload/img/products/'.$dir_image.'/index.html');
                    }
                    @rmdir('upload/img/products/'.$dir_image);
                }
                $dir_image = 'default';
            }

            //upload multi images
            $config2['upload_path'] = './upload/img/products_multi/';
            $config2['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF|svg|SVG';
            $config2['max_size'] = '*';
            $config2['max_width'] = '2000';
            $config2['max_height'] = '1400';
            //$config2['encrypt_name'] = true;
            $this->upload->initialize($config2);
            if(!empty($_FILES['images'])){
                $name_array = array();
                $count = count(@$_FILES['images']['size']);
                    for ($s = 0; $s <= $count - 1; $s++) {
                        $_FILES['images2']['name'] = $_FILES['images']['name'][$s];
                        $_FILES['images2']['type'] = $_FILES['images']['type'][$s];
                        $_FILES['images2']['tmp_name'] = $_FILES['images']['tmp_name'][$s];
                        $_FILES['images2']['error'] = $_FILES['images']['error'][$s];
                        $_FILES['images2']['size'] = $_FILES['images']['size'][$s];

                        if($this->upload->do_upload('images2')){
                            $fileData = $this->upload->data();
                            $uploadData[$s]['file_name'] = $fileData['file_name'];
                            $link = 'upload/img/products_multi/' . $fileData['file_name'];
                            $id_i = $this->productmodel->Add('p_images',array(
                                'image' => $link,
                                'id_item' => $id,
                            ));
                            // watermark dong dau anh
                            if(@$config_home->watermark==1){
                                if(@$config_home->WM_text==1){
                                    // dong giau text trươc khi tao anh thumb
                                    $this->load->helper('email_helper');
                                    $mt = add_water_mark($link,$this->option->WM_text,$this->option->WM_color, $this->option->WM_size);
                                    if(!$mt){
                                        $this->session->set_flashdata("mess", "Up ảnh không thành công !");
                                    }
                                }else{
                                    // dong giau anh logo trươc khi tao anh thumb
                                    $this->load->library('image_lib');
                                    $config_watermark['wm_type'] = 'overlay';
                                    $config_watermark['source_image'] = $link;;
                                    $config_watermark['wm_overlay_path'] = $this->option->site_logo;//'./upload/logo.png';
                                    $config_watermark['wm_vrt_alignment'] = 'middle';
                                    $config_watermark['wm_hor_alignment'] = 'center';
                                    $config_watermark['wm_padding'] = '0';
                                    $config_watermark['wm_opacity'] = '100';
                                    $this->image_lib->initialize($config_watermark);
                                    $this->image_lib->watermark();
                                }
                            }
                        }
                }
            }
            redirect(base_url('techadmin/product/products'));
        }

        $data['cate'] = $this->productmodel->getFields('product_category','id,parent_id,name',array(
            'lang' => $this->language
        ),array('sort'=>''));
        foreach ($this->session->userdata('phanquyen') as $key => $cat) {
            if($cat->resource == 'attribute'){
                $data['attribute'] =  $cat;
                foreach ($data['attribute']->cat_sub as $key2 => $cat2) {
                    if($cat2->resource == 'listBrand'){
                        // hiên thị phan quyen thương hiệu
                        $data['show_listBrand'] =  $cat2;
                        $data['cat_brand'] = $this->productmodel->getFields('product_brand','name,id,parent_id',array(
                            'lang' => $this->language
                        ),null);
                    }
                    if($cat2->resource == 'listLocale'){
                        // hiên thị phan quyen xuất sứ
                        $data['show_listLocale'] =  $cat2;
                        $data['cat_locales'] = $this->productmodel->getFields('product_locale','name,id,parent_id',array(
                            'lang' => $this->language
                        ),null);
                    }
                    if($cat2->resource == 'listColor'){
                        // hiên thị phan quyen màu sắc
                        $data['show_listColor'] =  $cat2;
                        $data['color'] = $this->productmodel->getFields('product_color','id,name,parent_id',array(
                            'lang' => $this->language
                        ),null);
                    }
                    if($cat2->resource == 'listOption'){
                        // hiên thị phan quyen kich thuoc
                        $data['show_listOption'] =  $cat2;
                        $data['size'] = $this->productmodel->getFields('product_size','id,name,parent_id',array(
                            'lang' => $this->language
                        ),null);
                    }
                }
            }
        }
        // hien thi danh sach nut
        $data['show_home'] = $this->productmodel->getField('config_checkpro','type,field,active,color,name',array('type' => 'product','field' => 'home',));
        $data['show_hot'] = $this->productmodel->getField('config_checkpro','type,field,active,color,name',array('type' => 'product','field' => 'hot',));
        $data['show_focus'] = $this->productmodel->getField('config_checkpro','type,field,active,color,name',array('type' => 'product','field' => 'focus',));
        $data['show_coupon'] = $this->productmodel->getField('config_checkpro','type,field,active,color,name',array('type' => 'product','field' => 'coupon',));
        $data['show_price'] = $this->productmodel->getField('config_checkpro','type,field,active,color,name',array('type' => 'product','field' => 'price',));
        $data['show_price_sale'] = $this->productmodel->getField('config_checkpro','type,field,active,color,name',array('type' => 'product','field' => 'price_sale',));
        $data['show_tags'] = $this->productmodel->getField('config_checkpro','type,field,active,color,name',array('type' => 'product','field' => 'tags',));
         $data['city'] =  $this->productmodel->getFields('province','name,id',null,null);
         $data['district'] =  $this->productmodel->getFields('district','name,id,provinceid',null,null);

         $data['productprice'] = $this->productmodel->getFields('product_price','id,name,parent_id',array(
                            'lang' => $this->language
                        ),null);

        $data['sizes'] = $this->productmodel->getFields('product_size','id,name,parent_id',array('lang' => $this->language ),array(),false);
         $data['crop_product'] = $this->productmodel->getField('config_pagination','width,height,pagination',array('lang' => $this->language,'name_table'=>'product')); 

         //var_dump($data['show_tags']);die;
         $title = "".$data['btn_name']."&nbsp"."sản phẩm";
            $this->LoadHeaderAdmin(false,$title);
        $this->load->view('admin/products/view_product/add', $data);
        $this->load->view('admin/footer');
    }
    #achor edit
    // xoa 1 ban ghi
    public function delete($id)
    {
        $this->delete_once($id);
        $this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
   //Xóa nhieu ban ghi
    public function deletes()
    {
        if($this->input->post('checkone') && is_array($this->input->post('checkone')) && count($this->input->post('checkone')) > 0)
        {
            $ids = $this->input->post('checkone');
            foreach($ids as $id)
            {
                $this->delete_once($id);
            }
        }
        $this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function delete_once($id){
        $this->check_acl();
        if (is_numeric($id)) {
            $item=$this->productmodel->getField('product','id,name,pro_dir,image',array('id'=>$id));
            $pathImage = "upload/img/products/";
            $pathImage_thumb = "upload/img/products/";
            $dir_image = $item->pro_dir;
            // xoa anh san pham
            if(file_exists($pathImage.$dir_image.'/'.$item->image))
            {
                @unlink($pathImage.$dir_image.'/'.$item->image);
            }
            // xoa anh thumb
            for($j = 1; $j <= 3; $j++)
            {
                if(file_exists($pathImage_thumb.$dir_image.'/thumbnail_'.$j.'_'.$item->image))
                {
                    @unlink($pathImage_thumb.$dir_image.'/thumbnail_'.$j.'_'.$item->image);
                    @unlink($pathImage_thumb.$dir_image.'/thumb/'.$item->image);
                }
            }
            $this->productmodel->Delete_where('product',array('id' => $id));
            $item_alias =$this->productmodel->getField('alias','id,pro',array('pro'=>$id));
            if(!empty($item_alias)){
                $this->productmodel->Delete_where('alias',array('pro' => $id));
            }
            $this->productmodel->Delete_where('product_to_category',array('id_product'=>$id));
           // $this->productmodel->Delete_where('pro_values',array('pro_id'=>$id));
            //delete more image
            $m_images = $this->productmodel->getFields('p_images','id,image',array(
                'id_item' => $id
            ));
            foreach($m_images as $image){
                @unlink($image->image);
                $this->productmodel->Delete_where('p_images', array('id_item'=>$image->id));
            }
        } else return false;
    }
    
 //Them anh cho san pham===========================
    public function images($id)
    {
         
        $pro = $this->productmodel->getField('product','id,name,pro_dir,image', array('id' => $id));
        $data['product_name'] = $pro->name;
        $data['pro_image'] = $this->productmodel->getProImage($id);
        $data['id'] = $id;
       
         $title = "Tải thêm ảnh cho sản phẩm";
            $this->LoadHeaderAdmin(false,$title);
        $this->load->view('admin/products/view_product/view_images', $data);
        $this->load->view('admin/footer');
    }
      public function images_add()
    {
       
        $config['upload_path'] = './upload/img/products_multi/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF|svg|SVG';
        $config['max_size'] = '*';
        $config['max_width'] = '2000';
        $config['max_height'] = '1400';
        $this->load->library('upload', $config);
        if (isset($_POST['Upload']))
        {
            $id = $this->input->post('id_pro');
            $pro = $this->productmodel->getFirstRowWhere('product', array('id' => $id));

            $db_data = array(
                'link' => '',
                'name' => $this->input->post('title'),
                'sort' => $this->input->post('sort'),
                'id_item' => $id
            );
            if (!empty($_POST['edit'])){
                $this->productmodel->Update_where('p_images', array('id' => $_POST['edit']), array('name' => $this->input->post('title'),));
                $id_img = $_POST['edit'];
            }else{
                $id_img = $this->productmodel->Add('p_images', $db_data);
            }

            if (!empty($_FILES['userfile']['name'])) {
                $type_image = explode(".", $_FILES['userfile']['name']);
                $a = make_alias($type_image[0]);
                $file_name = $a.'.'.$type_image[1];
                $_FILES['userfile']['name'] =  $file_name;
                if (!$this->upload->do_upload('userfile')) {
                  $this->session->set_flashdata("mess", "".$this->upload->display_errors());
                } else {
                    $upload = array('upload_data' => $this->upload->data());
                    $image = 'upload/img/products_multi/' . $upload['upload_data']['file_name'];
                    $this->load->helper('email_helper');
                    $mt = add_water_mark($image,$this->option->WM_text,$this->option->WM_color, $this->option->WM_size);
                    $abd = $this->productmodel->Update_where('p_images', array('id' => $id_img), array('image' => $image));
                    $this->session->set_flashdata("mess", "Thêm ảnh thành công!");
                }
            }

          redirect(base_url('techadmin/product/images/'.$id));
        }

        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $id = $_GET['id'];
            //$data['detail'] = $item = $this->productmodel->getFirstRowWhere('p_images', array('id' => $id));
            $data['id'] = $id;
        }
        $this->load->view('admin/modal/view_add_image',$data);
    }
     public function images_edit()
    {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $id = $_GET['id'];
            $data['detail'] = $item = $this->productmodel->getFirstRowWhere('p_images', array('id' => $id));
            $data['id'] = $data['detail']->id_item;
        }
          $this->load->view('admin/modal/view_add_image',$data);
    }
// xoa anh multi san pham
    public function delete_images($id){
        $img = $this->productmodel->getFirstRowWhere('p_images',array(
            'id' => $id
        ));
        if(file_exists($img->image)){
            unlink(($img->image));
        }
        $this->productmodel->Delete_where('p_images',array('id' => $id));
        $this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
//******* danh muc ********************************************************
    public function categories()
    {
        // $this->check_acl();
        $data['cate'] = $this->productmodel->getFields('product_category','id,name,parent_id,home,hot,focus,coupon,sort,image',array(
            'lang' => $this->language
        ),array('sort'=>'asc'));
         $data['show_home'] = $this->productmodel->getField('config_checkpro','type,field,active,color,name',array('type' => 'product_category','field' => 'home',));
        $data['show_hot'] = $this->productmodel->getField('config_checkpro','type,field,active,color,name',array('type' => 'product_category','field' => 'hot',));
        $data['show_focus'] = $this->productmodel->getField('config_checkpro','type,field,active,color,name',array('type' => 'product_category','field' => 'focus',));
        $data['show_coupon'] = $this->productmodel->getField('config_checkpro','type,field,active,color,name',array('type' => 'product_category','field' => 'coupon',));
        $data['show_image'] = $this->productmodel->getField('config_checkpro','type,field,active,color,name',array('type' => 'product_category','field' => 'image',));

       
         $title = "Danh mục sản phẩm";
            $this->LoadHeaderAdmin(false,$title);
        $this->load->view('admin/products/view_category/list_cat', $data);
        $this->load->view('admin/footer');
    }
     public function cat_add()
    {
        $this->cat_add_edit();
    }
     public function cat_edit($id){
        $this->cat_add_edit($id);
    }
    public function cat_add_edit($id_edit=null)
    {
        // $this->check_acl();
        $config['upload_path'] = './upload/img/category/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png|GIF|JPG|JPEG|PNG|svg|SVG';
        $config['max_size']      = '1000';
        $config['max_width']     = '2800';
        $config['max_height']    = '1300';
        $this->load->library('upload', $config);
        $data['btn_name']='Thêm';
        $data['max_sort']=$max_sort=$this->productmodel->SelectMax('product_category','sort')+1;
        if($id_edit!=null){
            $data['edit']=$this->productmodel->get_data('product_category',array('id'=>$id_edit),array(),true);
            $data['max_sort']=$max_sort=$data['edit']->sort;
            $data['btn_name']='Cập nhật';
        }
        if (isset($_POST['addnews'])) {
            $alias = make_alias($this->input->post('alias'));
            $arr = array(
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'parent_id' => $this->input->post('parent'),
                'alias' => $alias,
                'home' => $this->input->post('home'),
                'hot' => $this->input->post('hot'),
                'focus' => $this->input->post('focus'),
                'coupon' => $this->input->post('coupon'),
                'sort' => $max_sort,
                'title_seo' => $this->input->post('title_seo'),
                'keyword_seo' => $this->input->post('keyword'),
                'description_seo' => $this->input->post('description_seo'),
                'lang'            => $this->language,
            );
            if (!empty($_POST['edit'])){
                $id = $this->productmodel->Update_where('product_category', array('id'=>$id_edit), $arr);
                $this->session->set_flashdata("mess", "Cập nhật thành công!");
            } else {
                $id = $this->productmodel->Add('product_category', $arr);
                $this->session->set_flashdata("mess", "Thêm mới thành công!");
            }
            if ($id_edit != null) {
                $id = $id_edit;
            } else $id = $id;
            // check alias
            $checkAlias = $this->productmodel->getFirstRowWhere('alias',array(
                'pro_cat'=> $id
            ));
            if(empty($checkAlias)){
                $this->productmodel->Add('alias', array(
                    'alias' => $alias,
                    'pro_cat' => $id,
                    'type'  => 'cate-pro'
                ));
            }else{
                $this->productmodel->Update_where('alias',array('pro_cat'=>$id),array(
                    'alias' => $this->input->post('alias')
                ));
            }

            if ($_FILES['userfile']['name'] != '') {
                $type_image = explode(".", $_FILES['userfile']['name']);
                $a = make_alias($type_image[0]);
                $file_name = $a.'.'.$type_image[1];
                $_FILES['userfile']['name'] =  $file_name;
                 
                if (!$this->upload->do_upload()) {
                   $this->session->set_flashdata("mess", "".$this->upload->display_errors());
                } else {

                    $upload = array('upload_data' => $this->upload->data());
                     @unlink(@$data['edit']->image);
                          $im=explode('upload/img/category/', @$data['edit']->image);
                          // var_dump($im);die;
                           @unlink('upload/img/category/thumb/'.$im[1]);
                    $image = 'upload/img/category/' . $upload['upload_data']['file_name'];

                    //cắt ảnh

                     $fileName = basename($_FILES["userfile"]["name"]);
                $fileTmp = $_FILES["userfile"]["tmp_name"];
                $fileType = $_FILES["userfile"]["type"];
                $fileSize = $_FILES["userfile"]["size"];
                $fileExt = substr($fileName, strrpos($fileName, ".") + 1);
               //  //specify image upload directory
                $largeImagegoc = $image;
                $thumbImagegoc ='upload/img/category/thumb/'.$file_name;
                // chmod ($largeImagegoc, 0777);                      
                  //get dimensions of the original image
                  list($width_org, $height_org) = getimagesize($largeImagegoc);
                  
                  //get image coords
                  $x = (int) $_POST['x'];
                  $y = (int) $_POST['y'];
                  $width = (int) $_POST['w'];
                  $height = (int) $_POST['h'];

                  //define the final size of the cropped image
                  $width_new = $width;
                  $height_new = $height;
                  //crop and resize image
                  $newImage = imagecreatetruecolor($width_new,$height_new);
                  
                  switch($fileType) {
                      case "image/gif":
                          $source = imagecreatefromgif($largeImagegoc); 
                          break;
                      case "image/pjpeg":
                      case "image/jpeg":
                      case "image/jpg":
                          $source = imagecreatefromjpeg($largeImagegoc); 
                          break;
                      case "image/png":
                      case "image/x-png":
                          $source = imagecreatefrompng($largeImagegoc); 
                          break;
                  }                      
                  imagecopyresampled($newImage,$source,0,0,$x,$y,$width_new,$height_new,$width,$height);                      
                  switch($fileType) {
                      case "image/gif":
                          imagegif($newImage,$thumbImagegoc); 
                          break;
                      case "image/pjpeg":
                      case "image/jpeg":
                      case "image/jpg":
                          imagejpeg($newImage,$thumbImagegoc,90); 
                          break;
                      case "image/png":
                      case "image/x-png":
                          imagepng($newImage,$thumbImagegoc);  
                          break;
                  }
                  imagedestroy($newImage);   

                    $this->productmodel->Update_where('product_category',array('id'=>$id),array('image'=>$image));
                }
            }
            if ($_FILES['userfile2']['name'] != '') {
                $type_image = explode(".", $_FILES['userfile2']['name']);
                $a = make_alias($type_image[0]);
                $file_name = $a.'.'.$type_image[1];
                $_FILES['userfile2']['name'] =  $file_name;

                if (!$this->upload->do_upload('userfile2')) {
                   $this->session->set_flashdata("mess", "".$this->upload->display_errors());
                } else {
                    $upload = array('upload_data' => $this->upload->data());
                    $image = 'upload/img/category/' . $upload['upload_data']['file_name'];

                    $this->productmodel->Update_where('product_category',array('id'=>$id),array('banner'=>$image));
                }
            }
            redirect(base_url('techadmin/product/categories'));
        }
        $data['cate'] = $this->productmodel->get_data('product_category',array(
            'lang' => $this->language
        ),array('sort'=>'asc'));
         $data['show_home'] = $this->productmodel->getField('config_checkpro','type,field,active,color,name',array('type' => 'product_category','field' => 'home',));
        $data['show_hot'] = $this->productmodel->getField('config_checkpro','type,field,active,color,name',array('type' => 'product_category','field' => 'hot',));
        $data['show_focus'] = $this->productmodel->getField('config_checkpro','type,field,active,color,name',array('type' => 'product_category','field' => 'focus',));
        $data['show_coupon'] = $this->productmodel->getField('config_checkpro','type,field,active,color,name',array('type' => 'product_category','field' => 'coupon',));
        $data['show_image'] = $this->productmodel->getField('config_checkpro','type,field,active,color,name',array('type' => 'product_category','field' => 'image',));
       $data['crop_product_category'] = $this->productmodel->getField('config_pagination','width,height,pagination',array('lang' => $this->language,'name_table'=>'product_category')); 
         $title = "".$data['btn_name']."&nbsp"."danh mục sản phẩm";
            $this->LoadHeaderAdmin(false,$title);
        $this->load->view('admin/products/view_category/cat_add', $data);
        $this->load->view('admin/footer');
    }
    public function deletecategory($id)
    {
        if (is_numeric($id)&&$id>1) {
            $cat_parent =$this->productmodel->getField('product_category','id,parent_id,name',array('parent_id'=>$id));
             if(empty($cat_parent)){
                $this->del_cat_once($id);
                $this->session->set_flashdata("mess", "Xóa danh mục thành công!");
             }else{
                $this->session->set_flashdata("mess_err", "Xóa không thành công ! <br />Còn danh mục con");
             }
        }
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function deletes_category(){
        $ids = $this->input->post('checkone');
        foreach($ids as $id)
        {
            $this->del_cat_once($id);
        }
        $this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function del_cat_once($id){
        $this->check_acl();
        $cat_parent =$this->productmodel->getField('product_category','id,name,image,banner',array('parent_id'=>$id));
        if(empty($cat_parent)){
            // xoa ban ghi trong product_category
            $item = $this->productmodel->getField('product_category','id,name,image,banner',array(
                'id' => $id
            ));
            $ip=explode('upload/img/category/', $item->image);
            $bi='upload/img/category/thumb/'.$ip[1];
             
          //  xoa anh trong thu muc
            if(file_exists($item->image)){ @unlink($item->image);
              }
            @unlink($bi);
            if(file_exists($item->banner)){ @unlink($item->banner);}

            $this->productmodel->Delete_where('product_category',array('id' => $id));
            $this->productmodel->Delete_Where('product_to_brand', array('id_category'=>$id));
            $item_alias =$this->productmodel->getField('alias','id,pro_cat',array('pro_cat'=>$id));
            if(!empty($item_alias)){
                $this->productmodel->Delete_where('alias',array('pro_cat' => $id));
            }
        }

    }
    public function export_exel($name = null){
       
        $name = $this->input->get('name');
      // var_dump($name);die;
         $where=array();
        if($this->input->get()){
            $where = array(
                'name' => $this->input->get('name'),
            );
        }
        $data['list'] = $this->productmodel->getsearch_result($where);
       // echo "<pre>";print_r($data['list']);die;

       
        $order_id=array();
        if(empty($data['list'])){
             $data['list'] = $this->productmodel->get_products(array('product.lang' => $this->language),null);
        } 

        $filename = 'Baocao_sanpham-'.date('d-m-Y');

        $filename = rtrim($filename, '_');

        header("Content-Type: application/xls; charset=UTF-8");
        header("Content-Disposition: attachment; filename=$filename.xls");
        header("Pragma: no-cache");
        header("Expires: 0");

        $this->load->view('admin/excels/export_pro',$data);
    }
   
////// end product categories ///////////
////// the tag /////////////////////////////////////////////////
    public function getTagsByAlias(){
        $name   = $this->input->post('name');
        $data['nameget']    =$this->productmodel->searchtag($name);
        $subnametal='';
        foreach ($data['nameget'] as $nameget){
            $subname=$nameget->name;
            if($subnametal==null){
                $subnametal="'".$subname."'";
            }
            else{
                $subnametal= $subnametal.","."'".$subname."'";
            }
        }
        echo $subnametal;
    }
       
     public function save() {
        $this->load->model('import_model');
        $this->load->library('excel');
        $this->load->library('upload');
        if ($this->input->post('importfile')) 
        {
            $path = 'upload/files/';
            $dir_file = date('dmY');
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'xlsx|xls|csv';
            $config['max_size']  = '2048';
            $config['overwrite'] = true;
            $config['remove_spaces'] = TRUE;
            $this->upload->initialize($config);
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('userfile')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $data = array('upload_data' => $this->upload->data());
            }
            
            if (!empty($data['upload_data']['file_name'])) {
                $import_xls_file = $data['upload_data']['file_name'];
            } else {
                $import_xls_file = 0;
            }

            $inputFileName = $path . $import_xls_file;
           
            try {
                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch (Exception $e) {
                die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
                        . '": ' . $e->getMessage());
            }
            $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
           
            $arrayCount = count($allDataInSheet);
            $flag = 1;
            $createArray = array('name', 'Giá cũ', 'Giá mới','Mô tả', 'Trạng thái');
            $makeArray = array('name' => 'name', 'Giá cũ' => 'Giá cũ', 'Giá mới' => 'Giá mới', 'Mô tả' => 'Mô tả','Trạng thái' => 'Trạng thái');
            $SheetDataKey = array();
            foreach ($allDataInSheet as $dataInSheet) {
                foreach ($dataInSheet as $key => $value) {
                    if (in_array(trim($value), $createArray)) {
                       // $value = preg_replace('/\s+/', '', $value);
                        $SheetDataKey[trim($value)] = $key;
                    } else {
                        
                    }
                }
            }
            
            $data = array_diff_key($makeArray, $SheetDataKey);
            
            if (empty($data)) {
                $flag = 1;
            }
            $dem_daco=0;
            $dem_moi=0; 
            if ($flag == 1) {
                for ($i = 2; $i <= $arrayCount; $i++) {    
                    $name = $SheetDataKey['name'];
                    $giacu = $SheetDataKey['Giá cũ'];
                    $giamoi = $SheetDataKey['Giá mới'];
                    $mota = $SheetDataKey['Mô tả'];
                    $trangthai = $SheetDataKey['Trạng thái'];

                    $name = filter_var(trim($allDataInSheet[$i][$name]), FILTER_SANITIZE_STRING);
                    $giacu = filter_var(trim($allDataInSheet[$i][$giacu]), FILTER_SANITIZE_EMAIL);
                    $giamoi = filter_var(trim($allDataInSheet[$i][$giamoi]), FILTER_SANITIZE_STRING);
                    $mota = filter_var(trim($allDataInSheet[$i][$mota]), FILTER_SANITIZE_STRING);
                    $trangthai = filter_var(trim($allDataInSheet[$i][$trangthai]), FILTER_SANITIZE_STRING);

                    $prevQuery = $this->system_model->getField('product','id',array(
                        'name' => $name
                        ),array('sort' => 'desc'));
                   
                    if(count($prevQuery)){
                        //CAP NHAT DU LIEU    
                        $array_update = array('name' => $name, 'price' => $giacu, 'price_sale' => $giamoi, 'active' => '0', 'description' => $mota);
                         $this->system_model->Update_where('product', array('name'=>$name,'id'=>@$prevQuery->id), $array_update);
                         $dem_daco++;
                    }else{
                        //them DU LIEU 
                        $array_add = array('name' => $name, 'price' => $giacu, 'price_sale' => $giamoi,  'active' => '0', 'description' => $mota);
                         $this->system_model->Add('product', $array_add);  
                          $dem_moi++;
                    }                    
                }
            //  echo'so luong da có:';  var_dump($dem_daco);echo'<pre> so luong mới'; var_dump($dem_moi);die;
            } else {
                echo "Please import correct file";
            }
        }
       // $this->load->view('admin/users/display', $data);
        $this->session->set_flashdata("mess", "Thêm mới thành công!"); 
        redirect($_SERVER['HTTP_REFERER']); 
    }

}
