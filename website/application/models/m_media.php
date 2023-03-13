<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_media extends MY_Model{
    function __construct() {
        parent::__construct();
        $this->load->helper('model');
		$this->load->database();
    }
    // đếm danh sach san pham trong admin
	public function count_listmedia($data)
    {
        if(!empty($data))
        {
            $this->db->select('media.id');
            $this->db->from('media');
            $this->db->join('media_category', 'media_category.id=media.category_id','left');

            if(isset($data['name'])&&$data['name'] !=''){
                $this->db->like('media.name',$data['name']);
            }
            if(isset($data['view'])&&$data['view'] !=''){
                $this->db->where('media.'.$data['view'],'1');
            }
            if(isset($data['code'])&&$data['code'] !=''){
                $this->db->where('media.code',$data['code']);
            }
            if(isset($data['cate'])&&$data['cate'] !=''){
                $this->db->where('media.category_id',$data['cate']);
            }
			if(isset($data['lang'])&&$data['lang'] !=''){
                $this->db->where('media.lang',$data['lang']);
            }
			
            $this->db->order_by('media.id', 'desc');
			$this->db->group_by('media.id');
			
            $q = $this->db->get();
            return $q->num_rows();
        }
        else{
            return 0;
        }
    }
	// danh sach san pham trong admin
	public function getListMedia($data,$limit,$offset){

        $this->db->select('media.*');
        $this->db->from('media');
        
		if(isset($data['name'])&&$data['name'] !=''){
			$this->db->like('media.name',$data['name']);
		}
		if(isset($data['view'])&&$data['view'] !=''){
			$this->db->where('media.'.$data['view'],'1');
		}
		if(isset($data['cate'])&&$data['cate'] !=''){
			$this->db->where('media.category_id',$data['cate']);
		}
		if(isset($data['lang'])&&$data['lang'] !=''){
			$this->db->where('media.lang',$data['lang']);
		}
		if($limit||$offset){
			$this->db->limit($limit, $offset);
		}
		$this->db->order_by('media.sort', 'asc');
		$this->db->group_by('media.id');
		$q = $this->db->get();
		return $q->result();
    }
	 //====================================================================================================================
    public function getProImage($id){
        $this->db->select('media.id as media_id, media.name as media_name,media_images.*, media_images.id as img_id ');
        $this->db->join('media','media.id=media_images.id_item','left');
        $this->db->where('media.id',$id);
        $q=$this->db->get('media_images');
        return $q->result();
    }
}