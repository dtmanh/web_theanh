<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tag_model extends MY_Model{
    function __construct() {
        parent::__construct();
        $this->load->helper('model');
        $this->load->database();
    }
    // đếm danh sach tag san pham trong admin
	public function count_listtags($data)
    {
        if(!empty($data))
        {
            $this->db->select('tags.id');
            $this->db->from('tags');

            if(isset($data['tagname'])&&$data['tagname'] !=''){
                $this->db->like('tags.name',$data['tagname']);
            }
			if(isset($data['lang'])&&$data['lang'] !=''){
                $this->db->where('tags.lang',$data['lang']);
            }
            $this->db->order_by('tags.id', 'desc');
			$this->db->group_by('tags.id');
			
            $q = $this->db->get();
            return $q->num_rows();
        }
        else{
            return 0;
        }
    }
	// danh sach tag san pham trong admin
	public function getListtags($data,$limit,$offset){

        $this->db->select('tags.*');
		$this->db->from('tags');

		if(isset($data['tagname'])&&$data['tagname'] !=''){
			$this->db->like('tags.name',$data['tagname']);
		}
		if(isset($data['lang'])&&$data['lang'] !=''){
			$this->db->where('tags.lang',$data['lang']);
		}
		if($limit||$offset){
			$this->db->limit($limit, $offset);
		}
	
		$this->db->order_by('tags.id', 'desc');
		$this->db->group_by('tags.id');
		$q = $this->db->get();
		return $q->result();
    }
//============== tag tin tuc ========================================
 // đếm danh sach tag tin tuc trong admin
	public function count_listtags_news($data)
    {
        if(!empty($data))
        {
            $this->db->select('tags_news.id');
            $this->db->from('tags_news');

            if(isset($data['tagname'])&&$data['tagname'] !=''){
                $this->db->like('tags_news.name',$data['tagname']);
            }
			if(isset($data['lang'])&&$data['lang'] !=''){
                $this->db->where('tags_news.lang',$data['lang']);
            }
            $this->db->order_by('tags_news.id', 'desc');
			$this->db->group_by('tags_news.id');
			
            $q = $this->db->get();
            return $q->num_rows();
        }
        else{
            return 0;
        }
    }
	// danh sach tag san pham trong admin
	public function getListtags_news($data,$limit,$offset){

        $this->db->select('tags_news.*');
		$this->db->from('tags_news');

		if(isset($data['tagname'])&&$data['tagname'] !=''){
			$this->db->like('tags_news.name',$data['tagname']);
		}
		if(isset($data['lang'])&&$data['lang'] !=''){
			$this->db->where('tags_news.lang',$data['lang']);
		}
		if($limit||$offset){
			$this->db->limit($limit, $offset);
		}
	
		$this->db->order_by('tags_news.id', 'desc');
		$this->db->group_by('tags_news.id');
		$q = $this->db->get();
		return $q->result();
    }
	//
    // đếm danh sach san pham thuộc tag ngoai home
    public function count_list_protag($id)
    {
        $this->db->select('product.id');
        $this->db->from('product');
        $this->db->join('tags_to_product', 'product.id=tags_to_product.id_product','left');
        if(isset($id)&&$id !=''){
            $this->db->where('tags_to_product.id_tags',$id);
        }
        $this->db->where('product.lang',$this->language);
        $this->db->order_by('product.id', 'desc');
        $this->db->group_by('product.id');
        
        $q = $this->db->get();
        return $q->num_rows();
    }	
    // danh sach san pham trong admin
    public function getListTagpro($id,$limit,$offset){

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
                            product.name,');
        $this->db->from('product');
        $this->db->join('tags_to_product', 'product.id=tags_to_product.id_product','left');
        if(isset($id)&&$id !=''){
            $this->db->where('tags_to_product.id_tags',$id);
        }
        $this->db->where('product.lang',$this->language);
        if($limit||$offset){
            $this->db->limit($limit, $offset);
        }
        $this->db->order_by('product.id', 'desc');
        $this->db->group_by('product.id');
        $q = $this->db->get();
        return $q->result();
    }
     // đếm danh sach tin tuc thuộc tag ngoai home
    public function count_list_newtag($id)
    {
        $this->db->select('news.id');
        $this->db->from('news');
        $this->db->join('tags_to_news', 'news.id=tags_to_news.id_raovat','left');
        if(isset($id)&&$id !=''){
            $this->db->where('tags_to_news.id_category',$id);
        }
        $this->db->where('news.lang',$this->language);
        $this->db->order_by('news.id', 'desc');
        $this->db->group_by('news.id');
        
        $q = $this->db->get();
        return $q->num_rows();
    }   
    // danh sach san pham trong admin
    public function getListTagnew($id,$limit,$offset){

        $this->db->select('news.id,
                            news.alias,
                            news.time,
                            news.description,
                            news.category_id,
                            news.content,
                            news.image,
                            news.price,
                            news.title,');
        $this->db->from('news');
        $this->db->join('tags_to_news', 'news.id=tags_to_news.id_raovat','left');
        if(isset($id)&&$id !=''){
            $this->db->where('tags_to_news.id_category',$id);
        }
        $this->db->where('news.lang',$this->language);
        if($limit||$offset){
            $this->db->limit($limit, $offset);
        }
        $this->db->order_by('news.id', 'desc');
        $this->db->group_by('news.id');
        $q = $this->db->get();
        return $q->result();
    }
}
