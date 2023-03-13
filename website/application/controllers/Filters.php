<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Filters extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_search');
        $this->load->library('pagination');
    }
    public function filter_brand()
    {
        $kieudang = $_GET['kieudang'];
        $thuonghieu = $_GET['brand'];
        $id_cat = $_GET['id'];
        $colors = $_GET['color'];
        $genders = $_GET['gender'];
        $sizes = $_GET['size'];
        $heights = $_GET['height'];
        $khoang_gia= $_GET['khoang_gia'];
        $order = $_GET['order'];
        $page= $_GET['page'];
        $number_per_page= $_GET['number_per_page'];
        $where_khoanggia = '';$where_thuonghieu = '';
        $where_kieudang = '';$where_gender = '';
        $where_color = '';$where_size = '';
        $where_height = '';
        $whereAll = '';
        $whereAll .='product.active = 1';
        if(isset($id_cat)){
            $whereAll .=" and product_brand.id = ".$id_cat." ";
        }
        if($khoang_gia !='')
        {
            $arr_khoanggia = explode("_",$khoang_gia);
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
            $arr_thuonghieu = explode("_",$thuonghieu);
            foreach($arr_thuonghieu as $brand){
                $where_thuonghieu .=" product_brand.alias = '".$brand."' or ";
            }
            $where_thuonghieu = rtrim($where_thuonghieu,'or ');
            $whereAll .= ' and ' .$where_thuonghieu;
        }

        if($kieudang !='')
        {
            $arr_kieudang = explode("_",$kieudang);
            foreach($arr_kieudang as $type){
                $where_kieudang .="  product_hangsx.alias = '".$type."' or ";
            }
            $where_kieudang = rtrim($where_kieudang,'or ');
            $whereAll .= ' and ' .$where_kieudang;
        }
        if($genders !='')
        {
            $arr_gender = explode("_",$genders);
            foreach($arr_gender as $gender){
                $where_gender .=" product.gender = ".$gender." or ";
            }
            $where_gender = rtrim($where_gender,'or ');
            $whereAll .= ' and ' .$where_gender;
        }
        if($colors !='')
        {
            $arr_colors = explode("_",$colors);
            foreach($arr_colors as $color){
                $where_color .=" pro_values.id = ".$color." or ";
            }
            $where_color =  rtrim($where_color,'or ');
            $whereAll .= ' and ' .$where_color;
        }
        if($sizes !='')
        {
            $arr_size = explode("_",$sizes);
            foreach($arr_size as $size){
                $where_size .=" pro_values.name = '".$size."' or ";
            }
            $where_size = rtrim($where_size,'or ');
            $whereAll .= ' and ' .$where_size;
        }
        if($heights !='')
        {
            $arr_height = explode("_",$heights);
            foreach($arr_height as $height){
                $where_height .=" pro_values.id = ".$height." or ";
            }
            $where_height = rtrim($where_height,'or ');
            $whereAll .= ' and ' .$where_height;
        }
        $sapxep = '';
        if($order == 'new'){
            $sapxep = "order by product.id desc";
        }
        if($order=='price-asc'){$sapxep = "order by product.price_sale asc";}
        if($order=='price-desc'){$sapxep = "order by product.price_sale desc";}
        $total_where = $whereAll;

        $offset = ($page - 1) * $number_per_page;
        //echo $total_where;
        //$data['total_rows'] = $this->m_search->CountProByCategory2($total_where);
        $data['lists'] = $this->m_search->getProByFilters($total_where,$sapxep,$offset,$number_per_page);
        $data['total'] = count($data['lists']);
        //echo "<pre>";var_dump($data['lists']);die();
        $this->load->view('filters/view_brand_filter',$data);
    }
    public function filter(){
        $kieudang = $_GET['kieudang'];
        $thuonghieu = $_GET['brand'];
        $id_cat = $_GET['id'];
        $colors = $_GET['color'];
        $genders = $_GET['gender'];
        $sizes = $_GET['size'];
        $heights = $_GET['height'];
        $khoang_gia= $_GET['khoang_gia'];
        $order = $_GET['order'];
        $page= $_GET['page'];
        $number_per_page= $_GET['number_per_page'];
        $where_khoanggia = '';$where_thuonghieu = '';
        $where_kieudang = '';$where_gender = '';
        $where_color = '';$where_size = '';
        $where_height = '';
        $whereAll = '';
        $whereAll .='product.active = 1';
        if(isset($id_cat)){
            $whereAll .=" and product_category.id = ".$id_cat." ";
        }
        if($khoang_gia !='')
        {
            $arr_khoanggia = explode("_",$khoang_gia);
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
            $arr_thuonghieu = explode("_",$thuonghieu);
            foreach($arr_thuonghieu as $brand){
                $where_thuonghieu .=" product_brand.alias = '".$brand."' or ";
            }
            $where_thuonghieu = rtrim($where_thuonghieu,'or ');
            $whereAll .= ' and ' .$where_thuonghieu;
        }

        if($kieudang !='')
        {
            $arr_kieudang = explode("_",$kieudang);
            foreach($arr_kieudang as $type){
                $where_kieudang .="  product_hangsx.alias = '".$type."' or ";
            }
            $where_kieudang = rtrim($where_kieudang,'or ');
            $whereAll .= ' and ' .$where_kieudang;
        }
        if($genders !='')
        {
            $arr_gender = explode("_",$genders);
            foreach($arr_gender as $gender){
                $where_gender .=" product.gender = ".$gender." or ";
            }
            $where_gender = rtrim($where_gender,'or ');
            $whereAll .= ' and ' .$where_gender;
        }
        if($colors !='')
        {
            $arr_colors = explode("_",$colors);
            foreach($arr_colors as $color){
                $where_color .=" pro_values.id = ".$color." or ";
            }
            $where_color =  rtrim($where_color,'or ');
            $whereAll .= ' and ' .$where_color;
        }
        if($sizes !='')
        {
            $arr_size = explode("_",$sizes);
            foreach($arr_size as $size){
                $where_size .=" pro_values.name = '".$size."' or ";
            }
            $where_size = rtrim($where_size,'or ');
            $whereAll .= ' and ' .$where_size;
        }
        if($heights !='')
        {
            $arr_height = explode("_",$heights);
            foreach($arr_height as $height){
                $where_height .=" pro_values.id = ".$height." or ";
            }
            $where_height = rtrim($where_height,'or ');
            $whereAll .= ' and ' .$where_height;
        }
        $sapxep = '';
        if($order == 'new'){
            $sapxep = "order by product.id desc";
        }
        if($order=='price-asc'){$sapxep = "order by product.price_sale asc";}
        if($order=='price-desc'){$sapxep = "order by product.price_sale desc";}
        $total_where = $whereAll;

        $offset = ($page - 1) * $number_per_page;
        //echo $total_where;
        //$data['total_rows'] = $this->m_search->CountProByCategory2($total_where);
        $data['lists'] = $this->m_search->getProByFilters($total_where,$sapxep,$offset,$number_per_page);
        $data['total'] = count($data['lists']);
        //echo "<pre>";var_dump($data['lists']);die();
        $this->load->view('filters/view_multi_filter',$data);
    }
}