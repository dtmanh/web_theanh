<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_video extends MY_Model{
    function __construct() {
        parent::__construct();
        $this->load->helper('model');
		$this->load->database();
    }
    // đếm danh sach san pham trong admin
	public function count_list($data)
    {
        if(!empty($data))
        {
            $this->db->select('video.id');
            $this->db->from('video');
            $this->db->join('video_category', 'video_category.id=video.category_id','left');

            if(isset($data['name'])&&$data['name'] !=''){
                $this->db->like('video.name',$data['name']);
            }
            if(isset($data['view'])&&$data['view'] !=''){
                $this->db->where('video.'.$data['view'],'1');
            }
            if(isset($data['code'])&&$data['code'] !=''){
                $this->db->where('video.code',$data['code']);
            }
            if(isset($data['cate'])&&$data['cate'] !=''){
                $this->db->where('video_category.id',$data['cate']);
            }
			if(isset($data['lang'])&&$data['lang'] !=''){
                $this->db->where('video.lang',$data['lang']);
            }
			
            $this->db->order_by('video.id', 'desc');
			$this->db->group_by('video.id');
			
            $q = $this->db->get();
            return $q->num_rows();
        }
        else{
            return 0;
        }
    }
	// danh sach san pham trong admin
	public function getList($data,$limit,$offset){

        $this->db->select('video.*,
        video_category.id as cat_id,
        video_category.name as cat_name,
        video_category.alias as cat_alias');
        $this->db->from('video');
        $this->db->join('video_category', 'video_category.id=video.category_id','left');
        
		if(isset($data['name'])&&$data['name'] !=''){
			$this->db->like('video.name',$data['name']);
		}
		if(isset($data['view'])&&$data['view'] !=''){
			$this->db->where('video.'.$data['view'],'1');
		}
		if(isset($data['code'])&&$data['code'] !=''){
			$this->db->where('video.code',$data['code']);
		}
		if(isset($data['cate'])&&$data['cate'] !=''){
			$this->db->where('video_category.id',$data['cate']);
		}
		if(isset($data['lang'])&&$data['lang'] !=''){
			$this->db->where('video.lang',$data['lang']);
		}
		if($limit||$offset){
			$this->db->limit($limit, $offset);
		}
		$this->db->order_by('video.sort', 'asc');
		$this->db->group_by('video.id');
		$q = $this->db->get();
		return $q->result();
    }
	
}