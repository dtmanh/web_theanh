<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class F_brandmodel extends MY_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('model');
        
    }
    public function get_products_catsub($where,$limit,$offset){
        $this->db->select('product.id as pro_id,
                            product.alias as pro_alias,
                            product.caption_1,
                            product.price,
                            product.price_sale,
                            product.name as pro_name,
                            product.category_id,
                            product.alias as pro_alias,
                            product.view,
                            product.multi_image,
                            product.pro_dir,
                            product.img_dir,
                            product.image as pro_img,
                            product.description as pro_des,
                            product.detail,
                            product_brand.id as brand_id,
                            product_brand.name as brand_name,
                            product_brand.alias as brand_alias,
                         
                            
                            ');
        $this->db->join('product_brand', 'product_brand.id=product.brand','left');
        // $this->db->join('product_to_brand', 'product.id=product_to_brand.id_product','left');
        $this->db->where($where);
        $this->db->limit($limit,$offset);
        $this->db->order_by('product.id','desc');
        // $this->db->group_by('product.id');
        $q=$this->db->get('product');
        return $q->result();
    }
    //dem pro thuoc thuong hieu
    public function count_ProbyBran($alias)
    {
       
       
       $q1 = $this->db->query("SELECT id,alias FROM product_brand where alias = '" . $alias . "'");

        $query = $this->db->select('product.id,product.name as pro_name,product.price as pro_price,product_brand.id,product.alias,
        product.image as pro_image,product_brand.alias as brand_alias')
            ->from('product')
           // ->join('product_to_brand', 'product.id=product_to_brand.id_product','left')
            ->join('product_brand', 'product_brand.id=product_to_brand.id_brand','left')
          //  ->where('product_to_brand.id_brand', @$q1->first_row()->id)
            ->group_by('product.id')
            ->order_by('product.id', 'desc')
            ->get();
        return $query->num_rows();
    }
    
     public function getProbyBrand($alias, $limit, $offset)
    {
        // var_dump($id);die;
       $q1 = $this->db->query("SELECT id,alias FROM product_brand where alias = '" . $alias . "'");
        $query = $this->db->select('product.id as pro_id,
                            product.alias,
                            product.caption_1,
                            product.price,
                            product.code,
                            product.price_sale,
                            product.name,
                            product.category_id,
                            product.alias as pro_alias,
                            product.view,
                            product.multi_image,
                            product.pro_dir,
                            product.img_dir,
                            product.image,
                            product.description as pro_des,
                            product.detail,
                            product_brand.id as brand_id,
                            product_brand.name as brand_name,
                            product_brand.alias as brand_alias,
                            product_to_brand.id_product,
                            product_to_brand.id_brand,
                            ')
            ->from('product')
           // ->join('product_to_brand', 'product.id=product_to_brand.id_product','left')
            ->join('product_brand', 'product_brand.id=product_to_brand.id_brand','left')
            ->where('product_brand.alias', $alias)
            ->or_where('product_to_brand.id_brand', @$q1->first_row()->id)
            ->limit($limit, $offset)
            ->get();

        return $query->result();
    }

}