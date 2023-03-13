<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Raovat_model extends MY_Model{
    function __construct() {
        parent::__construct();
        $this->load->helper('model');
    }
	// đếm danh sach san pham trong admin
	public function count_listraovat($data)
    {
        if(!empty($data))
        {
            $this->db->select('raovat.id');
            $this->db->from('raovat');
            $this->db->join('raovat_to_category', 'raovat.id=raovat_to_category.id_raovat','left');
            $this->db->join('raovat_category', 'raovat_category.id=raovat_to_category.id_category','left');

            if(isset($data['name'])&&$data['name'] !=''){
                $this->db->like('raovat.name',$data['name']);
            }
            if(isset($data['view'])&&$data['view'] !=''){
                $this->db->where('raovat.'.$data['view'],'1');
            }
            if(isset($data['code'])&&$data['code'] !=''){
                $this->db->where('raovat.code',$data['code']);
            }
            if(isset($data['cate'])&&$data['cate'] !=''){
                $this->db->where('raovat_category.alias',$data['cate']);
            }
			if(isset($data['lang'])&&$data['lang'] !=''){
                $this->db->where('raovat.lang',$data['lang']);
            }
			if(isset($data['user'])&&$data['user'] !=''){
                $this->db->where('raovat.user',$data['user']);
            }
            if(isset($data['active'])&&$data['active'] !=''){
                $this->db->where('raovat.active',$data['active']);
            }
            $this->db->order_by('raovat.id', 'desc');
			$this->db->group_by('raovat.id');
			
            $q = $this->db->get();
            return $q->num_rows();
        }
        else{
            return 0;
        }
    }
	// danh sach san pham trong admin
	public function getListraovat($where,$limit,$offset){

        $this->db->select('raovat.*,
        raovat_category.id as cat_id,
        raovat_category.name as cat_name,
        raovat_category.alias as cat_alias,
        raovat_to_category.id_raovat,
        raovat_to_category.id_category');
        $this->db->from('raovat');
        $this->db->join('raovat_to_category', 'raovat.id=raovat_to_category.id_raovat','left');
        $this->db->join('raovat_category', 'raovat_category.id=raovat.category_id','left');
        
		if(isset($data['name'])&&$data['name'] !=''){
			$this->db->like('raovat.name',$data['name']);
		}
		if(isset($data['view'])&&$data['view'] !=''){
			$this->db->where('raovat.'.$data['view'],'1');
		}
		if(isset($data['code'])&&$data['code'] !=''){
			$this->db->where('raovat.code',$data['code']);
		}
		if(isset($data['cate'])&&$data['cate'] !=''){
			$this->db->where('raovat_category.alias',$data['cate']);
		}
		if(isset($data['lang'])&&$data['lang'] !=''){
			$this->db->where('raovat.lang',$data['lang']);
		}
		if(isset($data['user'])&&$data['user'] !=''){
			$this->db->where('raovat.user',$data['user']);
		}
		if(isset($data['active'])&&$data['active'] !=''){
			$this->db->where('raovat.active',$data['active']);
		}
		if($limit||$offset){
			$this->db->limit($limit, $offset);
		}
	
		$this->db->order_by('raovat.sort', 'asc');
		$this->db->group_by('raovat.id');
		$q = $this->db->get();
		return $q->result();
    }
    
}
