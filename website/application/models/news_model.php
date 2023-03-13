<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_model extends MY_Model{
    function __construct() {
        parent::__construct();
        $this->load->helper('model');
        $this->load->database();
    }

    // đếm danh sach san pham trong admin
    public function count_listNews($data)
    {
        if(!empty($data))
        {
            $this->db->select('news.id');
            $this->db->from('news');
            $this->db->join('news_to_category', 'news.id=news_to_category.id_news','left');
            $this->db->join('news_category', 'news_category.id=news_to_category.id_category','left');

            if(isset($data['name'])&&$data['name'] !=''){
                $this->db->like('news.title',$data['name']);
            }
            
            if(isset($data['cate'])&&$data['cate'] !=''){
                $this->db->where('news_to_category.id_category',$data['cate']);
            }
            if(isset($data['lang'])&&$data['lang'] !=''){
                $this->db->where('news.lang',$data['lang']);
            }
            if(isset($data['user'])&&$data['user'] !=''){
                $this->db->where('news.user_id',$data['user']);
            }
           
            $this->db->order_by('news.sort', 'asc');
            $this->db->group_by('news.id');
            
            $q = $this->db->get();
            return $q->num_rows();
        }
        else{
            return 0;
        }
    }
    public function getListNews($data,$limit,$offset){

        $this->db->select('news.*,
        news_category.id as cat_id,
        news_category.name as cat_name,
        news_category.alias as cat_alias,
        news_to_category.id_news,
        news_to_category.id_category');
        $this->db->from('news');
        $this->db->join('news_to_category', 'news.id=news_to_category.id_news','left');
            $this->db->join('news_category', 'news_category.id=news_to_category.id_category','left');
        
        if(isset($data['name'])&&$data['name'] !=''){
            $this->db->like('news.title',$data['name']);
        }
       
        if(isset($data['cate'])&&$data['cate'] !=''){
            $this->db->where('news_to_category.id_category',$data['cate']);
        }
        if(isset($data['lang'])&&$data['lang'] !=''){
            $this->db->where('news.lang',$data['lang']);
        }
        if(isset($data['user'])&&$data['user'] !=''){
            $this->db->where('news.user_id',$data['user']);
        }
       
        if($limit||$offset){
            $this->db->limit($limit, $offset);
        }
    
        $this->db->order_by('news.ID', 'DESC');
        $this->db->group_by('news.id');
        $q = $this->db->get();
        return $q->result();
    }

    public function getsearch_result($data,$limit = 0, $offset = 0)
    {

        if(!empty($data))
        {
            if($data['name']==null&&$data['cate']==null&&$data['view']==null&&$data['lang']==null){
                return array();
            }
            $this->db->select('news.*,news_category.name as cat_name,news_to_category.id_news,news_to_category.id_category');
            $this->db->from('news');
            $this->db->join('news_to_category', 'news.id=news_to_category.id_news','left');
            $this->db->join('news_category', 'news_category.id=news_to_category.id_category','left');

            if($data['name'] !=''){
                $this->db->like('news.title',$data['name']);
            }
            if($data['view'] !=''){
                $this->db->where('news.'.$data['view'],'1');
            }
            if($data['lang'] !=''){
                $this->db->where('news.lang',$data['lang']);
            }
            if($data['cate'] !=''){
                $this->db->where('news_category.alias',$data['cate']);
            }
            if($limit||$offset){
                $this->db->limit($limit, $offset);
            }
            $this->db->group_by('news.id');
            $this->db->order_by('news.sort', 'asc');
            $q = $this->db->get();
            return $q->result();
        }
    }
    public function countsearch_result($data)
    {
        if(!empty($data))
        {
            if($data['name']==null&&$data['cate']==null&&$data['view']==null&&$data['lang']==null){
                return 0;
            }
            $this->db->select('news.*,news_category.name as cat_name,news_to_category.id_news,news_to_category.id_category');
            $this->db->from('news');
            $this->db->join('news_to_category', 'news.id=news_to_category.id_news','left');
            $this->db->join('news_category', 'news_category.id=news_to_category.id_category','left');

            if($data['name'] !=''){
                $this->db->like('news.title',$data['name']);
            }
            if($data['view'] !=''){
                $this->db->where('news.'.$data['view'],'1');
            }
            if($data['lang'] !=''){
                $this->db->where('news.lang',$data['lang']);
            }
            if($data['cate'] !=''){
                $this->db->where('news_category.alias',$data['cate']);
            }
            $this->db->group_by('news.id');
            $q = $this->db->get();
            //echo  $this->db->last_query();
            return $q->num_rows();
        }
        else{
            return 0;
        }
    }

    /* hien thi trong admin k xoa */
      public function get_order_dashboard(){
        $this->db->select('order.*,province.name as provin_name,district.name as distric_name,ward.name as ward_name');
        $this->db->join('province','order.province=province.id','left');
        $this->db->join('district','order.district=district.id','left');
        $this->db->join('ward','order.ward=ward.id','left');
        //$this->db->where('order.status','0');
        $this->db->order_by('id','desc');
        $q=$this->db->get('order');
        return $q->result();
    }

    public function order_detail($order_id){
        $this->db->select('product.id as product_id,product.name,order_item.*');
        $this->db->join('product','product.id=order_item.item_id');
        $this->db->where_in('order_item.order_id',$order_id);
        $this->db->order_by('product.id','desc');
        $q=$this->db->get('order_item');
        return $q->result();
    }



    public function contact_dashboard(){
        $this->db->where('show','0');
        $this->db->order_by('id','desc');
        $q=$this->db->get('contact');
        return $q->result();
    }

    public function countByLang($where)
    {
        $this->db->select('news.*,news_category.name as cat_name,news_to_category.id_news,news_to_category.id_category');
        $this->db->from('news');
        $this->db->join('news_to_category', 'news.id=news_to_category.id_news','left');
        $this->db->join('news_category', 'news_category.id=news_to_category.id_category','left');
        $this->db->where($where);
        $this->db->group_by('news.id');
        $q = $this->db->get();
        //echo  $this->db->last_query();
        return $q->num_rows();
    }

    /*========= thẻ tag =======================================================================	*/
    public function searchtag($name){
        $this->db->select('tags_news.name');
        $this->db->from('tags_news');
        $this->db->like('name',$name);
        $q = $this->db->get();

        return $q->result();
    }
    public  function  get_tag($where){
        $this->db->select('tags_news.*, tags_to_news.id_tag_new as id_totag, tags_to_news.id_new as id_tonew');
        $this->db->from('tags_news');
        $this->db->join('tags_to_news', 'tags_news.id=tags_to_news.id_tag_new','left');
        $this->db->where($where);
        $q = $this->db->get();
        //echo  $this->db->last_query();
        return $q->result();
    }
}
