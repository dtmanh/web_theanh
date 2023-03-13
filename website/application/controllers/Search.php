<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Search extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('f_search');
        $this->load->library('pagination');
    }

    protected $pagination_config= array(
        'full_tag_open'=>"<ul class='pagination justify-content-center'>",
        'full_tag_close'=>"</ul>",
        'first_link' => 'Trang đầu',
        'last_link' => 'Trang cuối',
        'num_links' => 2,
        'num_tag_open'=>'<li class="page-item disabled">',
        'num_tag_close'=>'</li>',
        'cur_tag_open'=>"<li class='page-item '><li class='page-item active'><a href='#' class='page-link'>",
        'cur_tag_close'=>"</a></li>",
        'next_tag_open'=>"<li class='page-item'>",
        'next_tagl_close'=>"</li>",
        'prev_tag_open'=>"<li class='page-item'>",
        'prev_tagl_close'=>"</li>",
        'first_tag_open'=>"<li class='page-item'>",
        'first_tagl_close'=>"</li>",
        'last_tag_open'=>"<li class='page-item'>",
        'last_tagl_close'=>"</li>",
    );
  

    public function searchPro(){
        
        $key=$this->input->get('s');
        $id = $this->input->get('cat');
        $data = array();


        $where=array();
        if($this->input->get()){
            $where = array(
                'id' => $this->input->get('cat'),
                'key' => $this->input->get('s'),
            );
        }
        else{
            redirect(base_url());
        }
        $config['page_query_string'] = TRUE;
        $config['enable_query_strings'] = TRUE;
        $config['base_url'] = base_url('tim-kiem?cat='.$this->input->get('cat').'&s='.$this->input->get('s'));
        $config['total_rows'] = $this->f_search->countPoduct_search($where); // xác định tổng số record
        $config['per_page'] = 20;
        $config['uri_segment'] =3;
        $config=array_merge($config,$this->pagination_config);
        $this->pagination->initialize($config);
        $data['lists'] = $this->f_search->getPoduct_search($where,$config['per_page'],
            $this->input->get('per_page'));
         foreach ($data['lists'] as $key => $value) {
             $data['lists'][$key]->p_images = $this->f_search->getFields('p_images','id,image',array(
            'id_item' => $value->id
        ),1,0);
        }
        foreach ($data['lists'] as $k => $v){
            $data['lists'][$k]->comment = $this->f_search->Count('comments_binhluan',array('id_sanpham'=>$v->id,'review'=>1));
        }
      
        $data['toal_item'] = $config['total_rows'];
        $title='Kết quả tìm kiếm';
        $seo = array(
            'title' => $title
        );

        $this->LoadHeader(null,$seo,false);
        $this->load->view('searchs/pro_search',$data);
        $this->LoadFooter();
    }
    public function searchNew(){
        
        $key=$this->input->get('s');
        $id = $this->input->get('cat');
        $data = array();


        $where=array();
        if($this->input->get()){
            $where = array(
                'id' => $this->input->get('cat'),
                'key' => $this->input->get('s'),
            );
        }
        else{
            redirect(base_url());
        }
        $config['page_query_string'] = TRUE;
        $config['enable_query_strings'] = TRUE;
        $config['base_url'] = base_url('tim-kiem?cat='.$this->input->get('cat').'&s='.$this->input->get('s'));
        $config['total_rows'] = $this->f_search->countNew_search($where); // xác định tổng số record
        $config['per_page'] = 8;
        $config['uri_segment'] =2;
        $config=array_merge($config,$this->pagination_config);
        $this->pagination->initialize($config);
        $data['lists'] = $this->f_search->getNew_search($where,$config['per_page'],
            $this->input->get('per_page'));
      

        // $string1 = read_file('string_search.json');
        // $x = json_decode($string1);
        // $array1 = array($x[0]);
        
        // array_push($array1,$this->input->get('s')); 
        // if ( ! write_file('string_search.json', json_encode($array1)))
        // {
        //     echo 'Unable to write the file';
        //     die;
        // }
        
        $data['toal_item'] = $config['total_rows'];
        $title='Kết quả tìm kiếm';
        $seo = array(
            'title' => $title
        );

        $this->LoadHeader(null,$seo,true);
        $this->load->view('searchs/new_search',$data);
        $this->LoadFooter();
    }
    public function filter(){
        $data = array();
        $catid = $this->input->post('id');
        $thuonghieu = $this->input->post('thuong_hieu');

        $khoang_gia = $this->input->post('khoang_gia');
        $size = $this->input->post('size');
        $cat = $this->input->post('id');
       // var_dump($catid);die;

        $where_khoanggia = '';
        $where_thuonghieu = '';
        $where_size = '';
        $whereAll = '';
        $whereAll .='product.active = 1 ';

       
       
                $whereAll .=" and product_to_category.id_category = ".$catid." ";
        
   
        if($khoang_gia !='')
        {
            if($catid != ''){
                $arr_khoanggia = explode(",",$khoang_gia);
                foreach($arr_khoanggia as $price){
                    $arrp = explode("-",$price);
                    //echo "<pre>";var_dump($arrp);die();
                    $where_khoanggia .="product_to_category.id_category = ".$catid." and product.price_sale >= ".$arrp[0]." and product.price_sale <= ".$arrp[1]." or ";
                }
                $where_khoanggia = rtrim($where_khoanggia,'or ');
                $whereAll .= ' and ' .$where_khoanggia;
            } else {
                $arr_khoanggia = explode(",",$khoang_gia);
                foreach($arr_khoanggia as $price){
                    $arrp = explode("-",$price);
                    //echo "<pre>";var_dump($arrp);die();
                    $where_khoanggia .="product.price_sale >= ".$arrp[0]." and product.price_sale <= ".$arrp[1]." or ";
                }
                $where_khoanggia = rtrim($where_khoanggia,'or ');
                $whereAll .= ' and ' .$where_khoanggia;
            }

        }

       if($thuonghieu !='')
        {
            if($catid != ''){

                $arr_thuonghieu = explode(",",$thuonghieu);
             //   var_dump($arr_thuonghieu);die;
                foreach($arr_thuonghieu as $brand){
                    $where_thuonghieu .="product_to_category.id_category = ".$catid. " and product.brand = '".$brand."' or ";
                }
                $where_thuonghieu = rtrim($where_thuonghieu,'or ');
                $whereAll .= ' and ' .$where_thuonghieu;
            } else {
                $arr_thuonghieu = explode(",",$thuonghieu);
                foreach($arr_thuonghieu as $brand){
                    $where_thuonghieu .=" product.brand = '".$brand."' or ";
                }
                // echo "<pre>";var_dump($arr_thuonghieu);die();
                $where_thuonghieu = rtrim($where_thuonghieu,'or ');
                $whereAll .= ' and ' .$where_thuonghieu;
            }
        }

        if($size !='')
        {
            if($catid != ''){
                $arr_size = explode(",",$size);
                foreach($arr_size as $lc){
                    $where_size .="product_to_category.id_category = ". $catid ." and product_size.id = '".$lc."' or ";
                }
                $where_size = rtrim($where_size,'or ');
                $whereAll .= ' and ' .$where_size;
            } else {
                $arr_size = explode(",",$size);
                foreach($arr_size as $lc){
                    $where_size .=" product_size.id = '".$lc."' or ";
                }
                $where_size = rtrim($where_size,'or ');
                $whereAll .= ' and ' .$where_size;
            }
        }
        $total_where = $whereAll;
        $sapxep = "order by product.id desc";

        
        $page =  1;
        if($this->input->post('page')){
            $page = $this->input->post('page');
        }


        $number_per_page = 16;
        $offset = ($page - 1) * $number_per_page;
        $this->load->library('pagination_ajax');

         $data['total_rows'] = $this->f_search->countProByFilters($total_where);
      //   var_dump($data['total_rows']);die;
            
        $data['phantrang'] = $this->pagination_ajax->create($data['total_rows'], $number_per_page, $page);

        $data['lists'] = $this->f_search->getProByFilters1($total_where,$sapxep,$number_per_page,$offset);
       // var_dump($data['lists']);die;
         foreach ($data['lists'] as $key => $value) {
             $data['lists'][$key]->p_images = $this->f_search->getFields('p_images','id,image',array(
            'id_item' => $value->id
        ),1,0);
        }
        // var_dump($data['total_rows']);die;
        //      echo "<pre>";var_dump($total_where);die;
        //echo "<pre>";var_dump($data['lists']);die();
        $this->load->view('searchs/view_filter_cat',$data);
    }
    public function autoComplete()
    {
        $data = array();
        $name = $this->input->post('name');
        $data['lists'] = $this->f_search->getItemAutoComplete($name,15,0);
        $this->load->view('searchs/view_autocomplete',$data);
    }
    public function filter_search(){
        $data = array();
        $catid = $this->input->post('id');
        $thuonghieu = $this->input->post('thuong_hieu');
        $khoang_gia = $this->input->post('khoang_gia');
        $xuatxu = $this->input->post('xuatxu');
        $where_khoanggia = '';
        $where_thuonghieu = '';
        $where_xuatxu = '';
        $whereAll = '';
        $whereAll .='product.active = 1';
        if(!empty($catid)){
            $whereAll .=" and product_to_category.id_category = ".$catid." ";
        }
        if($khoang_gia !='')
        {
            $arr_khoanggia = explode(",",$khoang_gia);
            foreach($arr_khoanggia as $price){
                $arrp = explode("-",$price);
                //echo "<pre>";var_dump($arrp);die();
                $where_khoanggia .="product.price_sale >= ".$arrp[0]." and product.price_sale <= ".$arrp[1]." or ";
            }
            $where_khoanggia = rtrim($where_khoanggia,'or ');
            $whereAll .= ' and ' .$where_khoanggia;
        }
        if($thuonghieu !='')
        {
            if($cat != ''){
                $arr_thuonghieu = explode(",",$thuonghieu);

                foreach($arr_thuonghieu as $brand){
                    $where_thuonghieu .="product_category.id = ".$cat. " and product_brand.id = '".$brand."' or ";
                }
                $where_thuonghieu = rtrim($where_thuonghieu,'or ');
                $whereAll .= ' and ' .$where_thuonghieu;
            } else {
                $arr_thuonghieu = explode(",",$thuonghieu);
                foreach($arr_thuonghieu as $brand){
                    $where_thuonghieu .=" product_brand.id = '".$brand."' or ";
                }
                // echo "<pre>";var_dump($arr_thuonghieu);die();
                $where_thuonghieu = rtrim($where_thuonghieu,'or ');
                $whereAll .= ' and ' .$where_thuonghieu;
            }
        }
        if($xuatxu !='')
        {
            $arr_xuatxu = explode(",",$xuatxu);
            foreach($arr_xuatxu as $lc){
                $where_xuatxu .=" locale.id = '".$lc."' or ";
            }
            $where_xuatxu = rtrim($where_xuatxu,'or ');
            $whereAll .= ' and ' .$where_xuatxu;
        }
        $total_where = $whereAll;
        $sapxep = "order by product.id desc";
        $page =  1;
        if($this->input->post('page')){
            $page = $this->input->post('page');
        }
        $number_per_page = 16;
        $offset = ($page - 1) * $number_per_page;
        $this->load->library('pagination_ajax');

        $data['lists'] = $this->f_search->getProByFilters1($total_where,$sapxep,$number_per_page,$offset);
        $data['total_rows'] = $this->f_search->countProByFilters($total_where);
        $data['phantrang'] = $this->pagination_ajax->create($data['total_rows'], $number_per_page, $page);
        //echo "<pre>";var_dump($data['lists']);die();
        $this->load->view('searchs/view_filter_search',$data);
    }
}