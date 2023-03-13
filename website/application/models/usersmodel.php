<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usersmodel extends MY_Model{
    function __construct() {
        parent::__construct();
        $this->load->helper('model');
    }
    public function count_listuser($data)
    {
        if(!empty($data))
        {
            $this->db->select('users.id');
            $this->db->from('users');
            if(isset($data['name'])&&$data['name'] !=''){
                $this->db->like('users.fullname',$data['name']);
            }
            if(isset($data['email'])&&$data['email'] !=''){
                $this->db->where('users.email',$data['email']);
            }
			if(isset($data['phone'])&&$data['phone'] !=''){
                $this->db->where('users.phone',$data['phone']);
            }
            if(isset($data['view'])&&$data['view'] !=''){
                $this->db->where('users.active',$data['view']);
            }
            $this->db->order_by('users.id', 'desc');
			$this->db->group_by('users.id');
            $q = $this->db->get();
            return $q->num_rows();
        }
        else{
            return 0;
        }
    }
	// danh sach san pham trong admin
	public function getListuser($data,$limit,$offset){
		
        $this->db->select('users.*');
        $this->db->from('users');        
		if(isset($data['name'])&&$data['name'] !=''){
			$this->db->like('users.fullname',$data['name']);
		}
		if(isset($data['email'])&&$data['email'] !=''){
			$this->db->where('users.email',$data['email']);
		}
		if(isset($data['phone'])&&$data['phone'] !=''){
			$this->db->where('users.phone',$data['phone']);
		}
		if(isset($data['view'])&&$data['view'] !=''){
			$this->db->where('users.active',$data['view']);
		}
		if($limit||$offset){
			$this->db->limit($limit, $offset);
		}
		$this->db->order_by('users.id', 'desc');
		$this->db->group_by('users.id');
		$q = $this->db->get();
		return $q->result();
    }
//==============phan quyen ====================
	function fetch($select = "*", $where = "", $order = "id", $by = "DESC", $start = -1, $limit = 0)
	{
        //$this->db->cache_off();
		$this->db->select($select);
		if($where && $where != "")
		{
			$this->db->where($where, NULL, false);
		}
		if($order && $order != "" && $by && ($by == "DESC" || $by == "ASC"))
		{
            $this->db->order_by($order, $by);
		}
		if((int)$start >= 0 && $limit && (int)$limit > 0)
		{
			$this->db->limit($limit, $start);
		}
		#Query
		$query = $this->db->get("users");
		$result = $query->result();
		$query->free_result();
		return $result;
	}
	function fetch_join($select = "*", $join, $table, $on, $where = "", $order = "id", $by = "DESC", $start = -1, $limit = 0, $distinct = false)
	{
        $this->db->cache_off();
		$this->db->select($select);
		if($join && ($join == "INNER" || $join == "LEFT" || $join == "RIGHT") && $table && $table != "" && $on && $on != "")
		{
			$this->db->join($table, $on, $join);
		}
		if($where && $where != "")
		{
			$this->db->where($where, NULL, false);
		}
		if($order && $order != "" && $by && ($by == "DESC" || $by == "ASC"))
		{
            $this->db->order_by($order, $by);
		}
		if((int)$start >= 0 && $limit && (int)$limit > 0)
		{
			$this->db->limit($limit, $start);
		}
		if($distinct && $distinct == true)
		{
			$this->db->distinct();
		}
		#Query
		$query = $this->db->get("users");
		$result = $query->result();
		$query->free_result();
		return $result;
	}
	function delete($value, $field = "id", $in = true)
    {
		if($in == true)
		{
			$this->db->where_in($field, $value);
		}
		else
		{
            $this->db->where($field, $value);
		}
		return $this->db->delete("users");
    }
}
