<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class F_productmodel extends MY_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('model');
    }
    // dem so sp của 1 danh muc
public function count_ProbyCate($where)
    {
   
    
        $this->db->select('product.id');
            $this->db->from('product');
            $this->db->join('product_to_category','product.id=product_to_category.id_product','left');
            if(!empty($where)){
             $this->db->where($where);
            }
            $this->db->group_by('product.id');
            $query = $this->db->get();
        return $query->num_rows();
    }
    //danh sách sp cua 1 danh muc
    public function getProbyCate($where,$order, $limit, $offset)
    {   
        $this->db->select('product.id,
                            product.alias,
                            product.price_sale,
                            product.pro_dir,
                            product.time,
                            product.description,
                            product.category_id,
                            product.multi_image,
                            product.img_dir,
                            product.image,
                            product.price,
                            product.name,
                            product_to_category.id_category');
            $this->db->from('product');
           $this->db->join('product_to_category', 'product.id=product_to_category.id_product','left');
            if(!empty($where)){
             $this->db->where($where);
            }
            $this->db->order_by(@$order[0],@$order[1]);
            $this->db->limit($limit, 0);
           $query =  $this->db->get();

        return $query->result();
    }
    public function count_ProbyCate2($where)
    {
     
        $this->db->select('product.id');
            $this->db->from('product');
           // $this->db->join('product_to_category', 'product.id=product_to_category.id_product','left');
             $this->db->join('wishlist', 'product.id=wishlist.pro_id','left');
            if(!empty($where)){
             $this->db->where($where);
            }
            $this->db->group_by('product.id');
            $query = $this->db->get();
        return $query->num_rows();
    }
    //danh sách sp cua 1 danh muc
    public function getProbyCate2($where,$order, $limit, $offset)
    {
      //  var_dump($where);die;
        $this->db->select('wishlist.*');
            $this->db->from('wishlist');
         //  $this->db->join('product_to_category', 'product.id=product_to_category.id_product','left');
        //  $this->db->join('wishlist', 'product.id=wishlist.pro_id','left');
            if(!empty($where)){
             $this->db->where($where);
            }
            $this->db->order_by($order[0],$order[1]);
            $this->db->limit($limit, $offset);
           $query =  $this->db->get();

        return $query->result();
    }
      public function count_Newbydem($id){
        $query = $this->db->select('product.id')
            ->from('product')
             ->join('wishlist', 'product.id = wishlist.pro_id')
            ->where('wishlist.user_id',$id)
            ->group_by('product.id')
            ->get('');
        return $query->num_rows();
    }
     public function getNewsByluot($id,$limit,$offset){
        $query = $this->db->select('product.id,
                                    product.name,
                                    product.description,
                                    product.alias,
                                    product.category_id,
                                     product.*,
                                    wishlist.id as wish_id,
                                    wishlist.user_id as user_pro,
                                    wishlist.pro_id')
            ->from('product')
            ->join('wishlist', 'product.id = wishlist.pro_id')
          //  ->join('news_category', 'news_category.id = news_to_category.id_category')
            ->where('wishlist.user_id',$id)
            ->order_by('product.id','desc')
            ->group_by('product.id')
            ->get('', $limit, $offset);

        return $query->result();
    }

  
    //tag
    public function searchtag($name){
        $this->db->select('tags.name');
        $this->db->from('tags');
        $this->db->like('name',$name);
        $q = $this->db->get();

        return $q->result();
    }
     public  function  get_tag($where){
        $this->db->select('tags.*, tags_to_product.id_tags as id_totag, tags_to_product.id_product as id_toproduct');
        $this->db->from('tags');
        $this->db->join('tags_to_product', 'tags.id=tags_to_product.id_tags','left');
        $this->db->where($where);
        $q = $this->db->get();
        //echo  $this->db->last_query();
        return $q->result();
    }
 

// sô binh luan cua sp
    public function getCountComment($id){
        $this->db->select('comments_binhluan.id');
        $this->db->where('review',1);
        $this->db->where('id_sanpham',$id);
        $q = $this->db->get('comments_binhluan');
        return $q->num_rows();
    }

   
    public function Product_comment_binhluan($id_sanpham){
        $q=$this->db->query("SELECT sum(giatri) as tong_giatri from comments_binhluan where  id_sanpham = '".$id_sanpham."' and review = 1");
        return $q->result();
    }
   
    public function getProShopSales($where,$limit,$offset){
        $this->db->select('product.id,product.name,product.pro_dir,product.image,product.alias,product.price,product.price_sale,');
        $this->db->join('product_to_category', 'product.id=product_to_category.id_product','left');
        $this->db->join('product_category', 'product_category.id=product.category_id','left');
        $this->db->where($where);
        $this->db->limit($limit,$offset);
        $this->db->group_by('product.id');
        $this->db->order_by('product.id','desc');
        $q=$this->db->get('product');
        return $q->result();
    }

	
    
    public function getProductSimilar($product_id,$catid, $limit, $offset)
    {
        //$arr_in=$this->getarr_idcategory($product_id);
        $query = $this->db->select('product.id as pro_id,product_category.id,product.alias,product.image,product.caption_1,
                                product.category_id,product.user_id , product.view, product.focus, product.hot, product.code, product.price,product.price_sale,product_category.name as cate_name,product.bought,
                                product.name,product.description,product.price as pro_price,product.multi_image,product.pro_dir,product.img_dir,product_category.alias as cate_alias,product_category.parent_id,
                                product_to_category.id as product_to_category_id,product_brand.name as brand_name')
            ->from('product')
            ->join('product_to_category', 'product_to_category.id_product = product.id','left')
            ->join('product_category', 'product_to_category.id_category = product_category.id','left')
            ->join('product_brand', 'product_brand.id = product.style','left')
            ->where('product_category.id',$catid)
            ->where('product.id !=', $product_id)
            ->group_by('product.id')
            ->get('', $limit, $offset);
        return $query->result();
    }
    
    public function count_Probyhangsx($id_hang)
    {
        $query = $this->db->select('product.id')
            ->from('product')
            ->join('product_hangsx', 'product_hangsx.id=product.style', 'left')
            ->where('product_hangsx.id', $id_hang)
            ->order_by('product.id', 'desc')
            ->get();
    }
    public function getProbyHangsx($id_hang,$order,$limit,$offset)
    {
        $query = $this->db->select('product.id,product.name as pro_name,product.price_sale,
        product.price as pro_price,product.alias as pro_alias,product.price,product.id,product.pro_dir,
        product.image as pro_image,product_brand.id as hang_id,product_brand.alias as brand_alias,
        product_brand.name as brand_name')
            ->from('product')
            ->join('product_brand', 'product_brand.id=product.style', 'left')
            ->where('product_brand.id', $id_hang)
            ->limit($limit,$offset)
            ->order_by($order[0],$order[1])
            ->get();

        return $query->result();
    }
    public function ProductBycategory($where = array(),$where1,$where2,$khoanggia,$order,$limit,$offset){
         $this->db->select('product.id as pro_id,
                            product.alias as pro_alias,
                            product.description as pro_des,
                            product.price,
                            product.description,
                            product.bought,
                            product.view,
                            product.pro_dir,
                            product.price_sale,
                            product.name as pro_name,
                            product.category_id,
                            product.alias as pro_alias,
                            product.home,
                            product.image as pro_image,
                            product.hot,
                            product.focus,
                            product.style,
                            product.user_id,
                            product.active,
                            product_category.id as cate_id,
                            product_category.name as cate_name,
                            product_category.alias as cate_alias,
                            product_brand.name as brand_name,
                            product_brand.alias as brand_alias,
                            ');
        $this->db->join('product_to_category', 'product.id=product_to_category.id_product','left');
        $this->db->join('product_category', 'product_category.id=product_to_category.id_category','left');
        $this->db->join('product_brand','product_brand.id=product.style','left');
        $this->db->join('pro_values','pro_values.pro_id=product.id','left');
        if(is_array($where)&&!empty($where)){
            $this->db->where($where);
        }
        if($khoanggia != 0){
            $this->db->where('product.price_sale BETWEEN "'.$khoanggia[0].'" and "'.$khoanggia[1].'"');
        }
        if(is_array($where2)&&!empty($where2)){
            $this->db->where_in($where2);
        }
        if(is_array($where1)&&!empty($where1)){
            $this->db->or_where($where1);
        }
        $this->db->group_by('product.id');
        $this->db->order_by($order[0],$order[1]);
        $this->db->limit($limit,$offset);
        $q=$this->db->get('product');
        return $q->result();
    }
    public function countItemFilters($catid,$brand,$khoanggia,$filter)
    {
        //echo $catid."-".$brand."-".$khoanggia."-".$filter;die;
        $this->db->select('product.id');
        $this->db->join('product_to_category', 'product.id=product_to_category.id_product','left');
        $this->db->join('product_category', 'product_category.id=product_to_category.id_category','left');
        $this->db->join('product_brand','product_brand.id=product.style','left');
        $this->db->join('pro_values','pro_values.pro_id=product.id','left');
        $this->db->where('product_to_category.id_category',$catid);
        //$this->db->or_where('product_category.parent_id',$catid);
        if($brand != 0) {
            $this->db->where('product_brand.id',$brand);
        }
        if($khoanggia != 0) {
            //echo $khoanggia[0].'-'.$khoanggia[1];die();
            $this->db->where('product.price_sale BETWEEN "'.$khoanggia[0].'" and "'.$khoanggia[1].'"');
        }
        if(($filter) != 0){
            $this->db->where_in('pro_values.value',$filter);
        }

        /*$this->db->or_where('product_category.parent_id',$catid);*/
        $this->db->group_by('product.id');
        $this->db->order_by('product.id','desc');
        $q=$this->db->get('product');
        return $q->num_rows();
    }

    //=============================end Location

    public function getProImages($proId)
    {
        $this->db->select('product.id, product.alias, product.image, images.id as image_id,images.id_item ,images.image ');
        $this->db->join('product', 'images.id_item=product.id', 'left');
        $this->db->where('images.id_item', $proId);
        $q = $this->db->get('images');
        return $q->result();
    }


  
    public function getComments($product_id,$limit){
        $this->db->select('comments.*, users.fullname,users.avatar');
        $this->db->join('users','users.id=comments.user');
        $this->db->where('comments.item_id',$product_id);
        $this->db->order_by('comments.id','desc');
        $n=$this->db->get('comments',$limit);
        return $n->result();
    }
    public function getComments_desc($product_id){
        $this->db->select('comments.*, users.fullname, users.avatar');
        $this->db->join('users','users.id=comments.user');
        $this->db->where('comments.item_id',$product_id);
        $n=$this->db->get('comments');
        return $n->result();
    }

    public function countAllPro($where)
    {
        $this->db->select('product.id as pro_id');
        $this->db->join('product_category', 'product_category.id=product.category_id');
        $this->db->where($where);
        $q = $this->db->get('product');
        return $q->num_rows();
    }
    public function getAllPro($where,$limit,$offset)
    {
        $this->db->select('product.id as pro_id,product.name as pro_name,product_category.id as cat_id,product.alias as pro_alias,
        product.image as pro_image,product.price,product.price_sale,product_category.alias,
        product.multi_image,product.pro_dir,product.img_dir,caption_3,
        product_category.alias as cate_alias,product_category.parent_id
                            ');
        $this->db->join('product_category', 'product_category.id=product.category_id');
        $this->db->where($where);
        $this->db->order_by('product.sort', 'asc');
        $this->db->limit($limit,$offset);
        $q = $this->db->get('product');
        return $q->result();
    }

    public function getItemByCateId($where,$order,$offset,$limit)
    {
        $this->db->select('product.id as pro_id,
                            product.alias as pro_alias,
                            product.description as pro_des,
                            product.price,
                            product.downloaded,
                            product.view,
                            product.finish,
                            product.itinerary,
                            product.price_sale,
                            product.name as pro_name,
                            product.category_id,
                            product.season,
                            product.destination,
                            product.alias as pro_alias,
                            product.home,
                            product.image as pro_img,
                            product.hot,
                            product.focus,
                            product_category.id as cate_id,
                            product_category.name as cate_name,
                            product_category.alias as cate_alias,
                            ');
        $this->db->join('product_to_category', 'product.id=product_to_category.id_product','left');
        $this->db->join('product_category', 'product_category.id=product.category_id','left');
        if($where['filter_type'] !='')
        {
            $this->db->where('product.'.$where['filter_type'],$where['filter_value']);
        }
        if($where['catid'] !=''){
            $this->db->where('product_to_category.id_category',$where['catid']);
            $this->db->or_where('product_category.parent_id',$where['catid']);
        }
        
        if(count($order))
        {
            $this->db->order_by('product.'.$order['order_type'],$order['order_value']);
        }
        else{
            $this->db->order_by('product.id','desc');
        }
        $this->db->group_by('product.id');
        $this->db->limit($limit,$offset);
        $q=$this->db->get('product');
        return $q->result();
    }
    public function countItemByCateId($where)
    {
        $this->db->select('product.id');
        $this->db->join('product_to_category', 'product.id=product_to_category.id_product','left');
        $this->db->join('product_category', 'product_category.id=product.category_id','left');
        if($where['filter_type'] !='')
        {
            $this->db->where('product.'.$where['filter_type'],$where['filter_value']);
        }
        if($where['catid'] !=''){
            $this->db->where('product_to_category.id_category',$where['catid']);
            $this->db->or_where('product_category.parent_id',$where['catid']);
        }
        $this->db->group_by('product.id');
        $this->db->order_by('product.id','desc');
        $q=$this->db->get('product');
        return $q->num_rows();
    }
    public function countItemByTagId($arrId)
    {
        $query = $this->db->select('product.id,product.name as pro_name,product_category.id,product.alias as pro_alias,
        product.image as pro_image,product.price as pro_price,product_category.alias,product_category.alias as cate_alias,product_category.parent_id ')
            ->from('product')
            ->join('product_category', 'product_category.id=product.category_id', 'left')
            ->where_in('product.id', $arrId)
            ->order_by('product.id', 'desc')
            ->get();

        return $query->num_rows();
    }
    public function getItemByTagId($arrId,$limit,$offset)
    {
        $query = $this->db->select('product.id as pro_id,
                            product.alias as pro_alias,
                            product.description as pro_des,
                            product.price,
                            product.downloaded,
                            product.view,
                            product.finish,
                            product.itinerary,
                            product.price_sale,
                            product.name as pro_name,
                            product.category_id,
                            product.season,
                            product.destination,
                            product.alias as pro_alias,
                            product.home,
                            product.image as pro_img,
                            product.hot,
                            product.focus,
                            product_category.id as cate_id,
                            product_category.name as cate_name,
                            product_category.alias as cate_alias,
                            ')
            ->from('product')
            ->join('product_category', 'product_category.id=product.category_id', 'left')
            ->where_in('product.id', $arrId)
            ->order_by('product.id', 'desc')
            ->get('', $limit, $offset);

        return $query->result();
    }
    //prosimilar ajaxt
    public function countProSameAjax($product_id,$catid)
    {
        $query = $this->db->select('product.id')
            ->from('product')
            ->join('product_to_category', 'product_to_category.id_product = product.id')
            ->join('product_category', 'product_to_category.id_category = product_category.id')
            ->join('product_brand', 'product_brand.id = product.style')
            ->where('product_category.id',$catid)
            ->where('product.id !=', $product_id)
            ->group_by('product.id')
            ->get('');
        return $query->num_rows();
    }
    public function getProSameAjax($product_id,$catid,$limit,$offset)
    {
        $query = $this->db->select('product.id as pro_id,product_category.id,product.alias as pro_alias,product.image as pro_image,product.caption_1,
                                product.category_id, product.price,product.price_sale,product_category.name as cate_name,
                                product.name as product_name,product.description,product.price as pro_price,product.multi_image,product.pro_dir,product.img_dir,
                                product_category.alias,product_category.alias as cate_alias,product_category.parent_id,
                                product_to_category.id as product_to_category_id,product_brand.name as brand_name')
            ->from('product')
            ->join('product_to_category', 'product_to_category.id_product = product.id')
            ->join('product_category', 'product_to_category.id_category = product_category.id')
            ->join('product_brand', 'product_brand.id = product.style')
            ->where('product_category.id',$catid)
            ->where('product.id !=', $product_id)
            ->group_by('product.id')
            ->get('', $limit, $offset);
        return $query->result();
    }
    //get brands by cat id
    public function getBrandsBycatId($catid)
    {
        $query = $this->db->select('product_brand.name as brand_name,
        product_brand.alias as brand_alias,product_brand.id as brand_id')
            ->from('product_brand')
            ->join('product_to_brand', 'product_to_brand.brand_id = product_brand.id')
            ->join('product_category', 'product_to_brand.id_category = product_category.id')
            ->where('product_category.id',$catid)
            ->group_by('product_brand.id')
            ->get('');
        return $query->result();
    }
      public function get_size($product_id, $limit, $offset)
    {
        //$arr_in=$this->getarr_idcategory($product_id);
        $query = $this->db->select('product_size.id ,
                                    product_size.name,
                                    product_size.size')
            ->from('product_size')
            ->join('product_to_size', 'product_to_size.id_size = product_size.id','left')
            ->where('product_to_size.id_product',$product_id)
            ->group_by('product_size.id')
            ->get('', $limit, $offset);
        return $query->result();
    }
     public function get_color($product_id, $limit, $offset)
    {
        //$arr_in=$this->getarr_idcategory($product_id);
        $query = $this->db->select('product_color.id ,
                                    product_color.name,
                                    product_color.color')
            ->from('product_color')
            ->join('product_to_color', 'product_to_color.id_color = product_color.id','left')
            ->where('product_to_color.id_product',$product_id)
            ->group_by('product_color.id')
            ->get('', $limit, $offset);
        return $query->result();
    }
}