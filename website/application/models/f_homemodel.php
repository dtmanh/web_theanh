<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class F_homemodel extends MY_Model{
    function __construct() {
        parent::__construct();
        $this->load->helper('model');
    }
    // hien thi san pham cua danh muc
     public function get_products($where,$order=array(),$limit,$offset){
        $this->db->select('product.id,
                            product.alias,
                            product.location,
                            product.caption_1,
                            product.price,
                            product.price_sale,
                            product.name,
                            product.category_id,
                            product.view,
                            product.time,
                            product.home,
                            product.image,
                            product.pro_dir,
                            product.hot,
                            product.focus,
                            product.description,
                            product.user_id,
                            product_to_category.id_product,
                            product_to_category.id_category,
                            ');
        $this->db->join('product_to_category','product_to_category.id_product=product.id','left');
        $this->db->where($where);

        if(!empty($order)&&is_array($order)){
            foreach ($order as $field => $val){
               $this->db->order_by($field,$val);
            }
        }else{
            $this->db->order_by('product.id','desc');
        }
        $this->db->group_by('product.id');
        $this->db->limit($limit,$offset);
        $q=$this->db->get('product');
        return $q->result();
    }
// hien thi danh sách tin tuc
    public function get_news($where,$order=array(),$limit,$offset){

        $query = $this->db->select('news.id,
                                    news.title,
                                    news.description,
                                    news.alias,
                                    news.category_id,
                                    news.image,
                                    news.time,
                                    news.view,
                                    news_to_category.id_category,
                                    news_to_category.id_news')
            ->from('news')
            ->join('news_to_category', 'news.id = news_to_category.id_news')
            ->where($where)
            ->order_by($order[0],$order[1])
            ->group_by('news.id')
            ->get('', $limit, $offset);

        return $query->result();
    }
}