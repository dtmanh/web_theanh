<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Products extends MY_Controller
{
    function __construct()
    {

        parent::__construct();
        $CI =& get_instance();
        $this->load->model('f_productmodel');
        $this->load->library('pagination');
    }
    protected $pagination_config= array(
        'full_tag_open'=>"<ul class='pagination justify-content-center'>",
        'full_tag_close'=>"</ul>",
        'first_link' => 'Trang đầu',
        'last_link' => 'Trang cuối',
        'num_links' => 2,
        'num_tag_open'=>'<li class="page-numbers">',
        'num_tag_close'=>'</li>',
        'cur_tag_open'=>"<span class='page-numbers current'>",
        'cur_tag_close'=>"</span>",
        'next_tag_open'=>'<li class="page-numbers">',
        'next_tagl_close'=>'</li >',
        'prev_tag_open'=>"<li class='page-numbers'>",
        'prev_tagl_close'=>"</li>",
        'first_tag_open'=>"<li class='page-numbers'>",
        'first_tagl_close'=>"</li>",
        'last_tag_open'=>"<li class='page-numbers'>",
        'last_tagl_close'=>"</li>",
    );
    public function pro_bycategory($alias){
        $this->Check_alias($alias);
        $data = array();
        $data['crop_product'] = $this->f_productmodel->getField('config_pagination','width,height,pagination',array('lang' => $this->language,'name_table'=>'product')); 
        $data['crop_product_category'] = $this->f_productmodel->getField('config_pagination','width,height,pagination',array('lang' => $this->language,'name_table'=>'product_category'));
        $data['cate_curent'] = $current = $this->f_productmodel->getField('product_category','id,name,parent_id,title_seo,description_seo,image',array('alias'=>$alias));

        $cat_id=$this->input->get('cat_id');
        $whereAll ='product.active = 1';
        $whereAll .=" and product_to_category.id_category =".$current->id."";
        $sort = $this->input->get('sort');
        $order = array('product.id','desc');
        if($sort != null){
            if($sort == ''){
                $order = array('product.id','desc');
            }
            if($sort == 'asc'){
                $order = array('product.id','asc');
            }
            if($sort=='desc'){
                $order = array('product.id','desc');
            }
             if($sort == 'price-asc'){
                $order = array('product.price_sale','asc');
            }
            if($sort=='price-desc'){
                $order = array('product.price_sale','desc');
            }
        }

        $config['base_url'] = base_url('danh-muc/'.@$alias.'.html?'.@$sort_alias);
        $config['page_query_string'] = TRUE;
        $config['enable_query_string'] = TRUE;
        $config['total_rows'] = $this->f_productmodel->count_ProbyCate($whereAll);
        $config['per_page'] = @$data['crop_product_category']->pagination; // xác định số record ở mỗi trang
        $config['uri_segment'] = 0; // xác định segment chứa page number
        $config=array_merge($config,$this->pagination_config);
        $this->pagination->initialize($config);
     
        $data['lists'] = $lists = $this->f_productmodel->getProbyCate($whereAll,$order,$config['per_page'],$this->input->get('per_page'));
        foreach ($data['lists'] as $key => $value) {
             $data['lists'][$key]->p_images = $this->f_productmodel->getFields('p_images','id,image',array(
                'id_item' => $value->id
            ),1,0);
        }
        $data['khoanggia'] = $this->f_productmodel->getFields('product_price','id,from_price,name,to_price',array(
            'lang' => $this->language
        ),array('sort'=>'sort'));
            //thuong hieu
        $data['brands'] = $this->f_productmodel->getFields('product_brand','id,name',array(
            'lang' => $this->language
        ),array('sort'=>'sort'));
        $data['size'] = $this->f_productmodel->getFields('product_size','id,name',array(
            'lang' => $this->language
        ),array('sort'=>'sort'));

        //$data['home_left']=$this->load->widget('home_left');
        //$data['doitac']=$this->load->widget('doitac');
        $seo=array('title'=>@$data['cate_curent']->title_seo==''?$data['cate_curent']->name:$data['cate_curent']->title_seo,
                   'description'=>@$data['cate_curent']->description_seo,'keyword'=>@$data['cate_curent']->keyword_seo,'image'=>@$data['cate_curent']->image,'type'=>'products');

        $this->LoadHeader(null,$seo,false);
        $this->load->view('products/pro_bycategory',$data);
        $this->LoadFooter();
    }
    //product detail
    public function detail($alias){
        $this->Check_alias($alias);
        $data = array();
         $data['config_chiase'] = $this->system_model->getFirstRowWhere('config_checkpro',array('type' => 'hotline','field'=>'shase','active' => 1));
        $data['item'] = $item = $this->system_model->getField('product','alias,id,view,category_id,image,img_dir,price_sale,price,time,name,pro_dir,title_seo,description_seo,code,status,keyword_seo,description,config_pro,config_pro_content', array(
            'alias' => $alias,
        ), array(), true);
        /*Nâng cấp Đặng Trần Mạnh*/
        $data['array_json'] = json_decode($data['item']->config_pro);
        $arr1 = json_decode($this->option->config_pro_content);
        if(!empty($data['array_json'])){
            foreach ($arr1 as $key => $cat) {
                if (isset($data['array_json'][$key]->content)) {
                    $arr1[$key]->content =  $data['array_json'][$key]->content;
                }
            }
        }
        $data['thuoctinh'] = $arr1;
       
        // cap nhat view
        if (!$this->session->userdata('session_pro_' . $data['item']->id)) {
            $this->session->set_userdata('session_pro_' . $data['item']->id, 1);
            $view = 1;
        } else {
            $view = 1;
        }
        $view = $data['item']->view + $view;
        $this->system_model->Update_where('product', array('id' => $data['item']->id), array('view' => $view));
        $data['cate_current'] = $this->system_model->getField('product_category','id,name,alias', array(
            'id' => $item->category_id
        ));
		//sp lien quan
		$data['list_item'] = $this->f_productmodel->getProductSimilar($item->id,@$item->category_id,10,0);
        foreach ($data['list_item'] as $key => $value) {
             $data['list_item'][$key]->p_ima = $this->f_productmodel->getFields('p_images','id,image',array(
            'id_item' => $value->pro_id
        ),1,0);
        }
        //tag
        $data['tag'] = $this->f_productmodel->get_tag(array(
                'tags_to_product.id_product'=> $item->id,
                'tags.lang' => $this->language
            ));

        //size 
        $data['size'] = $this->f_productmodel->get_size($item->id,10,0);
        //color
         $data['color'] = $this->f_productmodel->get_color($item->id,10,0);
        //sp da xem
        $data['pro_view']=array();
        if (!$this->session->userdata('pro_view_old')) {
            $this->session->set_userdata('pro_view_old',$item->id);
        } else {
            if (!in_array($item->id, explode(',', $this->session->userdata('pro_view_old'))) ) {
                $pro_view_old = $this->session->userdata('pro_view_old').','.$item->id;
                $this->session->set_userdata('pro_view_old',$pro_view_old);

            }
            $data['pro_view'] = $this->f_productmodel->getField_array('product','*','id IN ('.$this->session->userdata('pro_view_old').')');
        }
 
        $data['p_images'] = $this->f_productmodel->getFields('p_images','id,image',array(
            'id_item' => $item->id
        ));
 
        $data['view_question'] = $this->load->widget('question',array($item->id));
        $link_img = 'upload/img/products/'.$data['item']->pro_dir.'/thumbnail_2_'.$data['item']->image;
        $seo=array('title'=>@$data['item']->title_seo==''
         || @$data['item']->title_seo== '0' ?$data['item']->name:$data['item']->title_seo,
                   'description'=>@$data['item']->description_seo == ''?strip_tags(base64_decode($data['item']->description)):@$data['item']->description_seo,
                   'keyword'=>@$data['item']->keyword_seo == ''?strip_tags($data['item']->name):$data['item']->keyword_seo,
                   'image'=> $link_img,
                   'type'=>'products');

       
        $this->LoadHeader(null,$seo,false);
        $this->load->view('products/view_detail',$data);
        $this->LoadFooter();
    }

    public function all_products(){
        $data = array();
         $data['crop_product'] = $this->f_productmodel->getField('config_pagination','width,height,pagination',array('lang' => $this->language,'name_table'=>'product')); 
        $where = array('lang'=>$this->language);
        $config['base_url'] = base_url('san-pham');
        $config['page_query_string'] = TRUE;
        $config['enable_query_string'] = TRUE;
        $config['total_rows'] = $this->f_productmodel->Count('product',$where);
        $config['per_page'] = @$data['crop_product']->pagination; // xác định số record ở mỗi trang
        $config['uri_segment'] = 4; // xác định segment chứa page number
        $config=array_merge($config,$this->pagination_config);
        $this->pagination->initialize($config);
        $sort = $this->input->get('sort');
        $order = array('product.id','desc');
        if($sort != null){
            if($sort == '0'){
                $order = array('product.id','desc');
            }
            if($sort == 'asc'){
                $order = array('product.id','asc');
            }
            if($sort=='desc'){
                $order = array('product.id','desc');
            }
        }
        $data['lists'] = $lists = $this->f_productmodel->getFields('product','alias,id,view,category_id,image,img_dir,price_sale,price,time,name,pro_dir,title_seo,description_seo,keyword_seo,description,config_pro,config_pro_content',$where,$order,false,$config['per_page'],$this->input->get('per_page'));

        $data['cate_curent'] = $this->f_productmodel->getField('product','name,id,title_seo,description_seo,keyword_seo,image,pro_dir');
         $link_img = 'upload/img/products/'.$data['cate_curent']->pro_dir.'/thumbnail_2_'.$data['cate_curent']->image;
        $seo=array('title'=>@$data['cate_curent']->title_seo==''?$data['cate_curent']->name:$data['cate_curent']->title_seo,
                   'description'=>@$data['cate_curent']->description_seo,
                   'keyword'=>@$data['cate_curent']->keyword_seo,
                   'image'=>@$link_img,
                   'type'=>'products');

        $this->LoadHeader(null,$seo,true);
        $this->load->view('products/all_pro',$data);
        $this->LoadFooter();
    }

    public function dangtin ($id_edit=null) {
      $data = array();

      if($this->session->userData('userData')){
          $user = $this->session->userData('userData');
      }else{
          $this->session->set_flashdata("mess", "Bạn chưa đăng nhập!");
          redirect(base_url());
      }

      if ($user['oauth_uid'] == $this->input->post('user_id')) {
        $data['user_id'] = $this->input->post('user_id');
      }

      if (isset($_POST['addnews'])) {
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
            'color'          => $this->input->post('color'),
            'thuoctinhphu'          => $this->input->post('thuoctinhphu'),
            'tinhtrang'          => $this->input->post('tinhtrang'),
            'view'            => $this->input->post('view'),
            'weight'            => $this->input->post('dangboi'),
            'bought'          => $this->input->post('bought'),
            'counter'         => $this->input->post('counter'),
            'quaranty'         => $this->input->post('quaranty'),
            'dksudung'         => $this->input->post('dksudung'),
            'lang'            => $this->language,
            'group_attribute_id'            => $this->input->post('group'),
            'tags'          => $this->input->post('tags'),
            'time'          =>time(),
            'user_id'           =>$data['user_id'],
        );

        if (!empty($_POST['edit'])){
            $id = $this->system_model->Update_where('product', array('id'=>$id_edit), $arr);
            $this->session->set_flashdata("mess", "Cập nhật thành công!");
        } else {
            $id = $this->system_model->Add('product', $arr);
            $this->session->set_flashdata("mess", "Thêm mới thành công!");
        }
        if ($id_edit != null) {
              $id = $id_edit;
            } else $id = $id;
        $checkAlias = $this->system_model->getFirstRowWhere('alias',array(
            'pro' => $id
        ));
        if(empty($checkAlias)){
            $this->system_model->Add('alias',array(
                'pro' => $id,
                'type' => 'pro',
                'alias' => $alias
            ));
        }else{
            $this->system_model->Update_where('alias',array('pro' => $id),array(
                'alias' => $alias
            ));
        }
      }

      $data['cate_home'] = $this->system_model->get_data('product_category',array(
          'lang' => $this->language,
          'parent_id' => 0,
          'home'=> 1
      ),array('sort' => 'desc'),null);

      $data['city'] =  $this->system_model->getFields('province','id,name',null,null);
      $data['district'] =  $this->system_model->get_data('district',null,null);

      $data['cat_brand'] = $this->system_model->getFields('product_brand','id,name',array(
          'lang' => $this->language
      ),null);
      $data['cat_locales'] = $this->system_model->getFields('product_locale','id,name',array(
          'lang' => $this->language
      ),null);
      $data['color'] = $this->system_model->getFields('product_color','id,name',array(
          'lang' => $this->language
      ),null);
      $data['size'] = $this->system_model->get_data('product_size',array(
          'lang' => $this->language
      ),null);


      $seo=array('title'=>'Đăng tin');

      $this->LoadHeader(null,$seo,false);
      $this->load->view('products/dangtin',$data);
      $this->LoadFooter();
    }
    public function getChildCategory () {

        $id = $_POST['id'];
        $data['cate_child'] = $this->system_model->getFields('product_category','name,id,parent_id,lang,image',array(
            'lang' => $this->language,
            'parent_id !=' => 0,
            'parent_id' => $id
        ),array('sort' => 'desc'),null);
        $this->load->view('temp/pro_child_cate',$data);
    }
    
    public function detail_sp () {

        $data = array();
        $data['item'] = $item = $this->system_model->getField('product','alias,id,view,category_id,image,img_dir,price_sale,price,time,name,pro_dir,title_seo,description_seo,keyword_seo,description,config_pro,config_pro_content', array(), array(), true);
        $data['cate_current'] = $this->system_model->getField('product_category','id,name,alias', array(
            'id' => $item->category_id
        ));
        
        $seo = array();
        $this->LoadHeader(null,$seo,false);
        $this->load->view('products/view_detail',$data);
        $this->LoadFooter();
    }
}
