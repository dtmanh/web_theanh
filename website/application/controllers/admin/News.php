<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class News extends MY_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
            $this->load->model('news_model');
           
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
        public function newslist()
        {
			$this->check_acl();
            if($this->input->get()){
                $where = array(
                    'name' => $this->input->get('name')?$this->input->get('name'):'',
                    'cate' => $this->input->get('cate'),
                    'lang' => $this->input->get('lang'),
                );
                $config['page_query_string']    = TRUE;
                $config['enable_query_strings'] = TRUE;
                $config['base_url']             = base_url('techadmin/news/newslist?name='
                    . $this->input->get('name')
                    . '&cate=' . $this->input->get('cate')
                    . '&lang=' . $this->input->get('lang')
                );
                $config['total_rows']           = $this->news_model->count_listNews($where);
                $config['per_page']             = 20;
                $config['uri_segment'] = 4;
                $config=array_merge($config,$this->pagination_config);
                $this->pagination->initialize($config);
                $data['list'] = $this->news_model->getListNews($where, $config['per_page'], $this->input->get('per_page'));
            }else{
                $where = array(
                    'lang' => $this->language
                );
                $config['base_url'] = base_url('techadmin/news/newslist');
                $config['total_rows'] = $this->news_model->count_listNews($where); // xác định tổng số record
                $config['per_page'] =20; // xác định số record ở mỗi trang
                $config['uri_segment'] = 4; // xác định segment chứa page number
                $config=array_merge($config,$this->pagination_config);
                $this->pagination->initialize($config);
                $data['list'] = $this->news_model->getListNews($where, $config['per_page'],
                    $this->uri->segment(4));
            }
            
                foreach ($data['list'] as $key => $cat) {
                    $data['list'][$key]->cat_name = $this->news_model->getField('news_category',
                        array('name'),
                        array(
                        'id' => $cat->category_id,
                        ));
                }
                $data['news_all'] = $this->news_model->getFields('news','title,id,alias,home,time,image',array('lang' => $this->language),array('sort' => 'asc'));
                $auto_code = '';
                $auto_name = '';
                foreach ($data['news_all'] as $nameget) {
                    $subname = $nameget->title;
                    if ($auto_name == null) {
                        $auto_name = $subname;
                    } else {
                        $auto_name = $auto_name . "," . $subname;
                    }
                }
             $data['auto_name'] =  $auto_name;
            $data['cate'] = $this->news_model->getFields('news_category','id,name,alias');
             $data['show_home'] = $this->news_model->getField('config_checkpro','type,field,active,color,name',array('type' => 'news','field' => 'home',));
            $data['show_hot'] = $this->news_model->getField('config_checkpro','type,field,active,color,name',array('type' => 'news','field' => 'hot',));
            $data['show_focus'] = $this->news_model->getField('config_checkpro','type,field,active,color,name',array('type' => 'news','field' => 'focus',));   
            $data['show_chuy'] = $this->news_model->getField('config_checkpro','type,field,active,color,name',array('type' => 'news','field' => 'button_1',));
            $title = "Tin tức";
            $this->LoadHeaderAdmin(false,$title);
            $this->load->view('admin/news/list', $data);
            $this->load->view('admin/footer');
        }
        //add News
         public function add()
        {
            $this->add_edit();
        }
        // edit news
        public function edit($id){
           $this->add_edit($id);
        }
        public function add_edit($id_edit=null)
        {
			$this->check_acl();
            $config['upload_path']   = './upload/img/news/';
            $config['allowed_types'] = '*';
            $config['max_size']      = '*';
            $config['max_width']     = '*';
            $config['max_height']    = '*';
            $this->load->library('upload', $config);
            $data['btn_name']='Thêm';
			if($id_edit!=null){
				$data['edit']=$this->news_model->get_data('news',array('id'=>$id_edit),array(),true);
				$data['cate_selected']=$this->news_model->getField_array('news_to_category','id_category',array('id_news'=>$id_edit));
                $data['tag'] = $this->news_model->get_tag(array(
                    'tags_to_news.id_new'=> $id_edit,
                    'tags_news.lang' => $this->language
                ));
				$data['btn_name']='Cập nhật';
			}
            if (isset($_POST['addnews'])) {
                $video='';
                if($this->input->post('video')){
                    $video=explode('=',$this->input->post('video'));
                    $video = $video[1];
                }
                $arrTags = explode(",",$this->input->post('tags'));
				$alias = make_alias($this->input->post('alias'));
                $arr = array(
                    'title'           => $this->input->post('title'),
                    'alias'           => $alias,
                    'description'     => $this->input->post('description'),
                    'hot'             => $this->input->post('hot'),
                    'home'            => $this->input->post('home'),
                    'focus'           => $this->input->post('focus'),
                    'content'         => $this->input->post('content'),
                    'lang'            => $this->language,
                    'tag'             => $this->input->post('tag'),
                    'video'           => $video,
                    'time'            => time(),
                    'active'            => 1,
                    'category_id'     => $this->input->post('category_id'),
                    'title_seo'       => $this->input->post('title_seo'),
                    'keyword_seo'     => $this->input->post('keyword_seo'),
                    'description_seo' => $this->input->post('description_seo'),
                );


				if (!empty($_POST['edit'])){
					$id = $this->news_model->Update_where('news', array('id'=>$id_edit), $arr);
					$this->session->set_flashdata("mess", "Cập nhật thành công");
				} else {
					$id = $this->news_model->Add('news', $arr);
					$this->session->set_flashdata("mess", "Thêm thành công!");
				}
				if ($id_edit != null) {
					$id = $id_edit;
				} else $id = $id;

                $checkAlias = $this->news_model->getFirstRowWhere('alias',array(
					'new'=> $id
				));
				if(empty($checkAlias)){
					$this->news_model->Add('alias', array(
						'alias' => $alias,
						'new' => $id,
						'type'  => 'new'
					));
				}else{
					$this->news_model->Update_where('alias',array('new'=>$id),array(
						'alias' => $alias,
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
                                $item = $this->news_model->getFirstRowWhere('tags_news',array(
                                    'alias' => $tagname=trim(stripslashes(json_encode($tag)),'"'),
                                ));
                                if(empty($item)){
                                    $id_tag=$this->news_model->Add('tags_news',array(
                                        'name' => $tag,
                                        'alias' => $tagname,
                                        'lang'=>$this->language,
                                        'time'=>time(),
                                    ));
                                }else{

                                    $id_tag=$item->id;
                                }
                                $item_to_tags = $this->news_model->getFirstRowWhere('tags_to_news',array(
                                    'id_tag_new' => $id_tag,
                                    'id_new' => $id,
                                ));
                                if (empty($item_to_tags)) {
                                    $this->news_model->Add('tags_to_news',array(
                                        'id_tag_new' => $id_tag,
                                        'id_new' => $id,
                                    ));
                                }
                            }else{

                                $item = $this->news_model->getFirstRowWhere('tags_news',array(
                                    'alias' => make_alias($tag),
                                ));
                                if(empty($item)){
                                    $id_tag=$this->news_model->Add('tags_news',array(
                                        'name' => $tag,
                                        'alias' => make_alias($tag),
                                        'lang'=>$this->language,
                                        'time'=>time(),
                                    ));

                                }else{
                                    $id_tag=$item->id;
                                }
                                $item_to_tags = $this->news_model->getFirstRowWhere('tags_to_news',array(
                                    'id_tag_new' => $id_tag,
                                    'id_new' => $id,
                                ));
                                if (empty($item_to_tags)) {
                                    $this->news_model->Add('tags_to_news',array(
                                        'id_tag_new' => $id_tag,
                                        'id_new' => $id,
                                    ));
                                }
                            }

                        }

                    }
                }

				if ($this->input->post('category') && sizeof($this->input->post('category')) > 0) {

					$post_cat = $this->input->post('category');

					$this->news_model->Delete_where('news_to_category', array('id_news' => $id));
					for ($i = 0; $i < sizeof($post_cat); $i++) {
						$ca = array('id_news' => $id, 'id_category' => $post_cat[$i]);
						$this->news_model->Add('news_to_category', $ca);
					}
					$this->news_model->Update_where('news', array('id'=>$id), array('category_id' => end($post_cat)));
				}


                //update news image
                if ($_FILES['userfile']['name'] != '') {
                    $type_image = explode(".", $_FILES['userfile']['name']);
                    $a = make_alias($type_image[0]);
                    $file_name = $a.'.'.$type_image[1];
                    $_FILES['userfile']['name'] =  $file_name;
                    if (!$this->upload->do_upload('userfile')) {
                        $this->session->set_flashdata("mess", "".$this->upload->display_errors());
                    } else {
                        $upload = array('upload_data' => $this->upload->data());
                          @unlink(@$data['edit']->image);
                          $im=explode('upload/img/news/', $data['edit']->image);
                             @unlink('upload/img/news/thumb/'.$im[1]);
                        $image  = 'upload/img/news/' . $upload['upload_data']['file_name'];
                         // cat ảnh crop
                $fileName = basename($_FILES["userfile"]["name"]);
                $fileTmp = $_FILES["userfile"]["tmp_name"];
                $fileType = $_FILES["userfile"]["type"];
                $fileSize = $_FILES["userfile"]["size"];
                $fileExt = substr($fileName, strrpos($fileName, ".") + 1);
               //  //specify image upload directory
                $largeImagegoc = 'upload/img/news/' . $upload['upload_data']['file_name'];
                $thumbImagegoc = 'upload/img/news/thumb/' . $upload['upload_data']['file_name'];
              //  chmod ($largeImagegoc, 0777);                      
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
                        $this->news_model->Update_where('news', array('id'=>$id), array('image'=>$image));
                    }
                }
                redirect(base_url('techadmin/news/newslist'));
            }
            $data['cate'] = $this->news_model->getFields('news_category','id,name,parent_id,alias',array(
                'lang' => $this->language
            ));
             $data['show_home'] = $this->news_model->getField('config_checkpro','type,field,active,color,name',array('type' => 'news','field' => 'home',));
            $data['show_hot'] = $this->news_model->getField('config_checkpro','type,field,active,color,name',array('type' => 'news','field' => 'hot',));
            $data['show_focus'] = $this->news_model->getField('config_checkpro','type,field,active,color,name',array('type' => 'news','field' => 'focus',));  
            $data['crop_news'] = $this->news_model->getField('config_pagination','width,height,pagination',array('lang' => $this->language,'name_table'=>'news'));
            $data['show_tags'] = $this->news_model->getField('config_checkpro','type,field,active,color,name',array('type' => 'news','field' => 'tag',));
            $title = "".$data['btn_name']."&nbsp"."tin tức";
            $this->LoadHeaderAdmin(false,$title);
            $this->load->view('admin/news/add', $data);
            $this->load->view('admin/footer');
        }
		public function delete($id)
        {
            $this->delete_once($id);
            $this->session->set_flashdata("mess", "Xóa thành công!");
            redirect($_SERVER['HTTP_REFERER']);
        }
        //Delete News
        public function deletes(){
            $ids = $this->input->post('checkone');
            foreach($ids as $id)
            {
                $this->delete_once($id);
            }
			$this->session->set_flashdata("mess", "Xóa thành công!");
            redirect($_SERVER['HTTP_REFERER']);
        }
        public function delete_once($id)
        {
			     $this->check_acl();
            $news=$this->news_model->getField('news','id,image',array('id'=>$id),array(),true);
            $item_alias =$this->news_model->getField('alias','id,new',array('new'=>$id));

             $ip=explode('upload/img/news/', $news->image);
            $bi='upload/img/news/thumb/'.$ip[1];

            if(file_exists($news->image)){
            @unlink(($news->image));
            @unlink(($bi));
            }
            if(!empty($item_alias)){
                $this->news_model->Delete_where('alias',array('new' => $id));
            }
            if(file_exists($news->image));
			$this->news_model->Delete_where('news',array('id' => $id));
        }
        
//************ Danh mục **********************************************************************
        public function categories()
        {
			$this->check_acl();
            $data['cate'] = $this->news_model->getFields('news_category','name,sort,image,alias,id,parent_id,home,focus,hot,coupon',array(
                'lang' => $this->language
            ),array('sort'=>'asc'));
            $data['show_home'] = $this->news_model->getField('config_checkpro','type,field,active,color,name',array('type' => 'news_category','field' => 'home',));
            $data['show_hot'] = $this->news_model->getField('config_checkpro','type,field,active,color,name',array('type' => 'news_category','field' => 'hot',));
            $data['show_focus'] = $this->news_model->getField('config_checkpro','type,field,active,color,name',array('type' => 'news_category','field' => 'focus',));
            $data['show_coupon'] = $this->news_model->getField('config_checkpro','type,field,active,color,name',array('type' => 'news_category','field' => 'coupon',));
            $data['show_image'] = $this->news_model->getField('config_checkpro','type,field,active,color,name',array('type' => 'news_category','field' => 'image',));
             
            $title = "Danh mục tin tức";
            $this->LoadHeaderAdmin(false,$title);
            $this->load->view('admin/news/list_cat', $data);
            $this->load->view('admin/footer');
        }
		//Add Category
        public function cat_add()
        {
            $this->cat_add_edit();
        }    
        // Edit category
        public function cat_edit($id){
           $this->cat_add_edit($id);
        }
        public function cat_add_edit($id_edit=null)
        {
			$this->check_acl();
            $config['upload_path']   = './upload/img/category/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png|GIF|JPG|JPEG|PNG';
            $config['max_size']      = '*';
            $config['max_width']     = '*';
            $config['max_height']    = '*';
            $this->load->library('upload', $config);
      			$data['btn_name']='Thêm';
      			$data['max_sort']=$max_sort=$this->news_model->SelectMax('news_category','sort')+1;
      			if($id_edit!=null){
      				$data['edit']=$this->news_model->get_data('news_category',array('id'=>$id_edit),array(),true);
      				$data['max_sort']=$max_sort=$data['edit']->sort;
      				$data['btn_name']='Cập nhật';
      			}
            if(isset($_POST['addnews'])) {
                $arr    = array(
                    'name'        => $this->input->post('name'),
                    'description' => $this->input->post('description'),
                    'parent_id'   => $this->input->post('parent'),
                     'home'        => $this->input->post('home'),
                    'focus'       => $this->input->post('focus'),
                    'hot'         => $this->input->post('hot'),
                    'coupon'        => $this->input->post('coupon'),
                    'alias'       => make_alias($this->input->post('alias')),
                    'lang'        => $this->language,
                    'title_seo'   => $this->input->post('title_seo'),
                    'keyword'   => $this->input->post('keyword'),
                    'sort'       => $max_sort,
                    'description_seo'   => $this->input->post('description_seo')
                );
				if (!empty($_POST['edit'])){
					$id = $this->news_model->Update_where('news_category', array('id'=>$id_edit), $arr);
					$this->session->set_flashdata("mess", "Cập nhật thành công!");
				} else {
					$id = $this->news_model->Add('news_category', $arr);
					$this->session->set_flashdata("mess", "Thêm thành công!");
				}
				if ($id_edit != null) {
					$id = $id_edit;
				} else $id = $id;
				// check alias
				$checkAlias = $this->news_model->getFirstRowWhere('alias',array(
					'new_cat'=> $id
				));
				if(empty($checkAlias)){
					$this->news_model->Add('alias', array(
						'alias' => $this->input->post('alias'),
						'new_cat' => $id,
						'type'  => 'cate-new'
					));
				}else{
					$this->news_model->Update_where('alias',array('new_cat'=>$id),array(
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
                         // cat ảnh crop
                $fileName = basename($_FILES["userfile"]["name"]);
                $fileTmp = $_FILES["userfile"]["tmp_name"];
                $fileType = $_FILES["userfile"]["type"];
                $fileSize = $_FILES["userfile"]["size"];
                $fileExt = substr($fileName, strrpos($fileName, ".") + 1);
               //  //specify image upload directory
                $largeImagegoc = 'upload/img/category/' . $upload['upload_data']['file_name'];
                $thumbImagegoc = 'upload/img/category/thumb/' . $upload['upload_data']['file_name'];
              //  chmod ($largeImagegoc, 0777);                      
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
                        $this->news_model->Update_where('news_category',array('id'=>$id),array('image'=>$image));
                    }
                }
                redirect(base_url('techadmin/news/categories'));
            }
            $data['category'] = $this->news_model->getFields('news_category','id,parent_id,name,alias',array(
                'lang' => $this->language
            ),array('sort'=>'desc'));
            $data['show_home'] = $this->news_model->getField('config_checkpro','type,field,active,color,name',array('type' => 'news_category','field' => 'home',));
            $data['show_hot'] = $this->news_model->getField('config_checkpro','type,field,active,color,name',array('type' => 'news_category','field' => 'hot',));
            $data['show_focus'] = $this->news_model->getField('config_checkpro','type,field,active,color,name',array('type' => 'news_category','field' => 'focus',));
            $data['show_coupon'] = $this->news_model->getField('config_checkpro','type,field,active,color,name',array('type' => 'news_category','field' => 'coupon',));
            $data['show_image'] = $this->news_model->getField('config_checkpro','type,field,active,color,name',array('type' => 'news_category','field' => 'image',));
			     $data['crop_news_category'] = $this->news_model->getField('config_pagination','width,height,pagination',array('lang' => $this->language,'name_table'=>'news_category')); 
            $title = "".$data['btn_name']."&nbsp"."danh mục tin";
            $this->LoadHeaderAdmin(false,$title);
            $this->load->view('admin/news/cat_add', $data);
            $this->load->view('admin/footer');
        }
		public function deletecategory($id)
        {
            $cat_parent =$this->news_model->getField('news_category','id,parent_id',array('parent_id'=>$id));
            if(empty($cat_parent)){
                $this->del_cat_once($id);
             }else{
                $this->session->set_flashdata("mess", "Xóa không thành công ! <br />Còn danh mục con");
             }
            redirect($_SERVER['HTTP_REFERER']);
        }
        //Delete Cate News
        public function deletes_category()
        {
            $ids = $this->input->post('checkone');
            foreach($ids as $id)
            {
                if($id){
                    $this->del_cat_once($id);
                }
            }
			$this->session->set_flashdata("mess", "Xóa thành công!");
            
            redirect($_SERVER['HTTP_REFERER']);
        }
        public function del_cat_once($id){
           $this->check_acl();
		   $cat_parent =$this->news_model->getField('news_category','id,parent_id',array('parent_id'=>$id));
			if(empty($cat_parent)){
				$item = $this->news_model->getField('news_category','id,parent_id,image',array(
					'id' => $id
				));
                $ip=explode('upload/img/category/', $item->image);
                $bi='upload/img/category/thumb/'.$ip[1];
				// xoa anh trong thu muc
				if(file_exists($item->image) and $item){
					@unlink($item->image);
                    @unlink($bi);
				}
				$this->news_model->Delete_where('news_category',array('id' => $id));
				$item_alias =$this->news_model->getField('alias','new_cat,id',array('new_cat'=>$id));
				if(!empty($item_alias)){
					$this->news_model->Delete_where('alias',array('new_cat' => $id));
				}
			}
        }
       
    }