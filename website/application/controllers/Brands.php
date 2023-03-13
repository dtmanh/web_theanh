<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Brands extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('f_brandmodel');
        $this->load->library('pagination');
    }
     public function brand_bycategory($alias){
        $this->Check_alias($alias);
        $data = array();
        $data['cate_curent'] = $current = $this->f_brandmodel->getField('product_brand','name,id,description,alias,image',array('alias'=>$alias));
       
		$data['product']=$this->f_brandmodel->get_products_catsub(
			array(
			'product.lang' => $this->language,
			'product.brand !=' => 0
			),
			500,0);
		$temp = 'brands/brand_bycategory';
			
		$sBreadcrumbs = '';
		$sBreadcrumbs .= '<a href="">Thương hiệu</a> '; 
		$data['sBreadcrumbs'] =$sBreadcrumbs;
		
        $seo=array('title'=>'Thương hiệu',
            'description'=>'Thương hiệu',
            'keyword'=>'Thương hiệu',
            'image'=>'Thương hiệu',
            'type'=>'Brands'
        );
				   
        $this->LoadHeader(null,$seo,true);
        $this->load->view($temp,$data);
        $this->LoadFooter();
    }
	
	public function pro_byBrand($id,$alias){
        
		$id = (int) $id;
		$data['cate_brand'] = $current = $this->f_brandmodel->getFields('product_brand','id,name,alias,');
        
		$data['cate_curent'] = $current = $this->f_brandmodel->getField('product_brand','id,name,alias,title_seo,description_seo,keyword_seo,image',array('id'=>$id));
		
        $config['base_url'] = base_url($alias.'?');
        $config['page_query_string'] = TRUE;
        $config['enable_query_string'] = TRUE;
        $config['total_rows'] = $this->f_brandmodel->count_ProbyBran($alias);		
        $config['per_page'] = 20; // xác định số record ở mỗi trang
        $config['uri_segment'] = 2; // xác định segment chứa page number
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        $this->pagination->initialize($config);
       
		
		$data['lists'] = $this->f_brandmodel->getProbyBrand($alias,$config['per_page'], $this->input->get('per_page'));
		//var_dump($config['total_rows']);
		//var_dump($data['lists']);die;
	
		$sBreadcrumbs = '';
		// kiem tra xem ton tai danh muc cha k
		$sBreadcrumbs .= '<a href="" class="active">'.$data['cate_curent']->name.'</a> '; 
		$data['sBreadcrumbs'] =$sBreadcrumbs;
		
		//var_dump($temp);die;
        $seo=array('title'=>@$data['cate_curent']->title_seo==''?$data['cate_curent']->name:$data['cate_curent']->title_seo,
                   'description'=>@$data['cate_curent']->description_seo,
                   'keyword'=>@$data['cate_curent']->keyword_seo,
                   'image'=>@$data['cate_curent']->image,
                   'type'=>'products');
				   
        $this->LoadHeader2(null,$seo,false);
        $this->load->view('brands/pro_bybrand',$data);
        $this->LoadFooter();
    }
    public function brand_all(){
        
        $data['cate_brand'] = $current = $this->f_brandmodel->getFields('product_brand','id,name,alias,image');
        
		$data['product']=$this->f_brandmodel->get_products_catsub(
			array(
			'product.lang' => $this->language,
			'product.brand_id !=' => 0
			),
			500,0);
		//var_dump($data['product']);die;
		$temp = 'brands/brand_bycategory';
			
		$sBreadcrumbs = '';
		$sBreadcrumbs .= '<a href="">Loại hình du lịch</a> '; 
		$data['sBreadcrumbs'] =$sBreadcrumbs;
		
        $seo=array('title'=>'Loại hình du lịch',
            'description'=>'Loại hình du lịch',
            'keyword'=>'Loại hình du lịch',
            'image'=>'Loại hình du lịch',
            'type'=>'Brands'
        );
				   
        $this->LoadHeader(null,$seo,false);
        $this->load->view($temp,$data);
        $this->LoadFooter();
    }
	
	public function pro_byBrand($id,$alias){
        
		$id = (int) $id;
		$data['cate_brand'] = $current = $this->f_brandmodel->getFields('product_brand','alias,name,image,id');
        
		$data['cate_curent'] = $current = $this->f_brandmodel->getField('product_brand','id,name,alias,id,title_seo,description_seo,keyword_seo',array('id'=>$id));
		
        $config['base_url'] = base_url($alias.'?');
        $config['page_query_string'] = TRUE;
        $config['enable_query_string'] = TRUE;
        $config['total_rows'] = $this->f_brandmodel->count_ProbyBran($alias);		
        $config['per_page'] = 20; // xác định số record ở mỗi trang
        $config['uri_segment'] = 2; // xác định segment chứa page number
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        $this->pagination->initialize($config);
       
		
		$data['lists'] = $this->f_brandmodel->getProbyBrand($alias,$config['per_page'], $this->input->get('per_page'));
		
		// foreach ($data['lists'] as $key => $cat) {
			// $dem_like = $this->f_brandmodel->get_data('likefacbook',array(
						// 'pro_id'=>$cat->id_product,
						// 'like'=>1,
						// ));
			// $dem_dislike = $this->f_brandmodel->get_data('likefacbook',array(
						// 'pro_id'=>$cat->id_product,
						// 'dislike'=>1,
						// ));
			// $dem_binhluan = $this->f_brandmodel->get_data('comments_binhluan',array(
						// 'id_sanpham'=>$cat->id_product,
						// 'review'=>1,
						// ));			
						
			// $data['lists'][$key]->num_like = count($dem_like);
			// $data['lists'][$key]->num_dislike = count($dem_dislike);
			// $data['lists'][$key]->total_comment = count($dem_binhluan);
		// }
		//var_dump($data['lists']);die;
		$data['home_left']=$this->load->widget('home_left');
		$data['home_right']=$this->load->widget('home_right');
	
		$sBreadcrumbs = '';
		// kiem tra xem ton tai danh muc cha k
		$sBreadcrumbs .= '<li><a href="" class="active">'.$data['cate_curent']->name.'</a></li>'; 
		$data['sBreadcrumbs'] =$sBreadcrumbs;
		
		//var_dump($temp);die;
        $seo=array('title'=>@$data['cate_curent']->title_seo==''?$data['cate_curent']->name:$data['cate_curent']->title_seo,
                   'description'=>@$data['cate_curent']->description_seo,
                   'keyword'=>@$data['cate_curent']->keyword_seo,
                   'image'=>@$data['cate_curent']->image,
                   'type'=>'products');
				   
        $this->LoadHeader(null,$seo,false);
        $this->load->view('brands/pro_bybrand',$data);
        $this->LoadFooter();
    }
    
	
}