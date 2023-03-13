<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class F_usersmodel extends MY_Model{
    function __construct() {
        parent::__construct();
        $this->load->helper('model');
    }
// dem don hang cua tai khoan
      public function coutnUserOrder($uId){
        $this->db->select('order.id');
        $this->db->join('users','order.user_id=users.id','left');
        $this->db->where('users.id',$uId);
        $this->db->order_by('id','desc');
        $q=$this->db->get('order');
        return $q->num_rows();
    }
   // danh sach don hang cua tai khoan
    public function Getlist_oder($uId,$limit,$offset){
        $this->db->select('order.*,province.name as provin_name,district.name as distric_name,ward.name as ward_name');
        $this->db->join('province','order.province=province.id','left');
        $this->db->join('district','order.district=district.id','left');
        $this->db->join('users','order.user_id=users.id','left');
        $this->db->join('ward','order.ward=ward.id','left');
        $this->db->where('users.id',$uId);
        $this->db->limit($limit,$offset);
        $this->db->order_by('id','desc');
        $q=$this->db->get('order');
        return $q->result();
    }



    public function getPage($alias){
        $this->db->select('*');
        $this->db->where('alias',$alias);
        $q=$this->db->get('staticpage');
        return $q->first_row();
    }
    public function GetCatePro($id = null){
        $this->db->select('*');
        $this->db->where('id',$id);
        $q=$this->db->get('product_category');
        return $q->first_row();
    }
    public function loginUser($username,$password){
        if($username==null || $password==null)
        {
            return false;
        }
        $this->db->where('phone',$username);
        $user = $this->db->get('users');
        //pre($user);
        if($user->num_rows<=0|| $user->num_rows>1)
        {
            return false;
        }
        $user=$user->first_row();
        //pre($password);
        for($i =1; $i <=5; $i++)
            $password = md5($password);
        //pre($password);
        if($user->password === $password){
            $datauser = array(
                'lastest_login' => time()
            );
            $this->db->where('id',$user->id);
            $this->db->update('users',$datauser);
            return $user;
        }

    }
    public function update_pass_user($id,$array){
        if(isset($id)&&is_array($array)){
            $this->db->where('id',$id);
            $this->db->update('users', $array);
            return $id;
        }else return false;
    }
    public function getMenuRightRoot(){
        $this->db->select('*');
        $this->db->where('position','right');
        $this->db->where('parent_id',0);
        $q=$this->db->get('menu');
        return $q->result();
    }
    public function countItemOrders($userId)
    {
        $this->db->select('product.id');
        $this->db->join('product','product.id=order_item.item_id');
        $this->db->join('order','order.id=order_item.order_id');
        $this->db->where('order.user_id',$userId);
        $this->db->order_by('product.id','desc');
        $q=$this->db->get('order_item');
        return $q->num_rows();
    }
    public function getItemOrders($userId,$limit,$offset)
    {
        $this->db->select('product.id as pro_id,product.name as pro_name,product.alias as pro_alias,
        product.pro_dir,product.image as pro_img,order_item.*,order.show,order.time,
        product.price_sale,order.status,order.price_ship');
        $this->db->join('product','product.id=order_item.item_id');
        $this->db->join('order','order.id=order_item.order_id');
        $this->db->where('order.user_id',$userId);
        $this->db->order_by('product.id','desc');
        $q=$this->db->get('order_item');
        return $q->result();
    }

    public function getItemList($userId,$limit,$offset)
    {
        $this->db->select('*');
        $this->db->where('user_id',$userId);
        $this->db->limit($limit,$offset);
        $this->db->order_by('id','desc');
        $q=$this->db->get('product');
        return $q->result();
    }

    public function getUserListOrder($where,$limit,$offset)
    {
        $this->db->select('*');
        $this->db->where('id',$where);
        $this->db->where('view','1');
        $this->db->limit($limit,$offset);
        $this->db->order_by('id','desc');
        $q=$this->db->get('order');
        return $q->result();
    }
    public function countUserListOrder($where)
    {
        $this->db->select('*');
        $this->db->where('id',$where);
        $this->db->where('view','1');
        //$this->db->limit($limit,$offset);
        $this->db->order_by('id','desc');
        $q=$this->db->get('order');
        return $q->num_rows();
    }
    public function countUserListPro($where)
    {
        $this->db->select('*');
        $this->db->where('user_id',$where);
        //$this->db->limit($limit,$offset);
        $this->db->order_by('id','desc');
        $q=$this->db->get('product');
        return $q->num_rows();
    }
    public function UserOderDetail($where)
    {
        $this->db->select('product.id as product_id,product.name,order_item.*');
        $this->db->join('product','product.id=order_item.item_id');
        $this->db->join('order','order.id=order_item.order_id');
        $this->db->where('order.user_id',$where);
        $this->db->order_by('product.id','desc');
        $q=$this->db->get('order_item');
        return $q->result();
    }

    public function getListProLike($where,$limit,$offset)
    {
        if(!empty($where))
        {
            $this->db->select('product.id,product.bought,product.view,product.name as pro_name,product.alias,product.image as pro_img,product.price,product.price_sale,product.pro_dir,product.user_id');
            $this->db->join('wishlist','wishlist.pro_id=product.id','left');
            $this->db->where('wishlist.user_id',$where);
            $this->db->order_by('name');
            $this->db->limit($limit,$offset);
            $q = $this->db->get('product');
            return $q->result();
        }else{
            return array();
        }
    }

    public function countListProLike($where)
    {
        if(!empty($where))
        {
            $this->db->select('product.id');
            $this->db->join('wishlist','wishlist.pro_id=product.id');
            $this->db->where('wishlist.user_id',$where);
            $q = $this->db->get('product');
            return $q->num_rows();
        }else{
            return 0;
        }
    }

    /*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
    public function get_myproducts($user,$limit,$offset){

        $this->db->select('product.*,
        product_category.id as cat_id,
        product_category.name as cat_name,
        product_category.alias as cat_alias,
        product_to_category.id_product,
        product_to_category.id_category');
        $this->db->from('product');
        $this->db->join('product_to_category', 'product.id=product_to_category.id_product','left');
        $this->db->join('product_category', 'product_category.id=product_to_category.id_category','left');
        $this->db->where('product.user',$user);
        if($limit||$offset){
            $this->db->limit($limit, $offset);
        }
        $this->db->order_by('product.id', 'desc');
        $this->db->group_by('product.id');
        $q = $this->db->get();
        return $q->result();
    }
    public function count_myproducts($user){

        $this->db->select('product.id,
        product_category.id as cat_id,
        product_category.alias as cat_alias,
        product_to_category.id_product,
        product_to_category.id_category');
        $this->db->from('product');
        $this->db->join('product_to_category', 'product.id=product_to_category.id_product','left');
        $this->db->join('product_category', 'product_category.id=product_to_category.id_category','left');
        $this->db->where('product.user',$user);
        $this->db->order_by('product.id', 'desc');
        $this->db->group_by('product.id');
        $q = $this->db->get();
        return $q->num_rows();
    }

    public function getsearch_result($data,$limit = 0, $offset = 0)
    {


        if(!empty($data))
        {
            if($data['name']==null&&$data['cate']==null&&$data['view']==null&&$data['code']==null&&$data['lang']==null){
                return array();
            }
            $this->db->select('product.*,product_category.name as cat_name,product_to_category.id_product,product_to_category.id_category');
            $this->db->from('product');
            $this->db->join('product_to_category', 'product.id=product_to_category.id_product','left');
            $this->db->join('product_category', 'product_category.id=product_to_category.id_category','left');

            $this->db->where('product.user',$data['user']);
            if($data['name'] !=''){
                $this->db->like('product.name',$data['name']);
            }
            if($data['view'] !=''){
                $this->db->where('product.'.$data['view'],'1');
            }
            if($data['code'] !=''){
                $this->db->where('product.code',$data['code']);
            }
            if($data['lang'] !=''){
                $this->db->where('product.lang',$data['lang']);
            }
            if($data['cate'] !=''){
                $this->db->where('product_category.alias',$data['cate']);
            }
            if($limit||$offset){
                $this->db->limit($limit, $offset);
            }
            $this->db->group_by('product.id');
            $this->db->order_by('product.id', 'desc');
            $q = $this->db->get();

            return $q->result();
        }
    }
    public function countsearch_result($data)
    {
        if(!empty($data))
        {
            if($data['name']==null&&$data['cate']==null&&$data['view']==null&&$data['code']==null&&$data['lang']==null){
                return 0;
            }
            $this->db->select('product.*,product_category.name as cat_name,product_to_category.id_product,product_to_category.id_category');
            $this->db->from('product');
            $this->db->join('product_to_category', 'product.id=product_to_category.id_product','left');
            $this->db->join('product_category', 'product_category.id=product_to_category.id_category','left');

            $this->db->where('product.user',$data['user']);
            if($data['name'] !=''){
                $this->db->like('product.name',$data['name']);
            }
            if($data['view'] !=''){
                $this->db->where('product.'.$data['view'],'1');
            }
            if($data['code'] !=''){
                $this->db->where('product.code',$data['code']);
            }
            if($data['lang'] !=''){
                $this->db->where('product.lang',$data['lang']);
            }
            if($data['cate'] !=''){
                $this->db->where('product_category.alias',$data['cate']);
            }
            $this->db->group_by('product.id');
            $this->db->order_by('product.id', 'desc');
            $q = $this->db->get();
            return $q->num_rows();
        }
        else{
            return 0;
        }
    }

    public function get_user_orders($user,$limit,$offset){
        $this->db->select('
            order.*,
            order_item.shop,
            order_item.order_id,
            order_item.item_id
        ');
        $this->db->from('order');
        $this->db->join('order_item','order_item.order_id=order.id','left');
        $this->db->where('order_item.shop',$user);
        $this->db->group_by('order.id');
        $this->db->order_by('order.id','desc');
        $q= $this->db->get('',$limit,$offset);
        return $q->result();
    }
    public function count_user_orders($user){
        $this->db->select('
            order.*,
            order_item.shop,
            order_item.order_id,
            order_item.item_id
        ');
        $this->db->from('order');
        $this->db->join('order_item','order_item.order_id=order.id','left');
        $this->db->where('order_item.shop',$user);
        $this->db->group_by('order.id');
        $this->db->order_by('order.id','desc');
        $q= $this->db->get('');
        return $q->num_rows();
    }
    public function get_user_orders_item($orderid){
        $this->db->select('
            order_item.*,
            product.name,
        ');
        $this->db->join('product','order_item.item_id=product.id');
        $this->db->where_in('order_id',$orderid);
        $q= $this->db->get('order_item');
        return $q->result();
    }

    public function getOption($id = null,$pid = null){
        $this->db->select("oc_option.*, product_to_option.id as to_ids");
        $this->db->from('product');
        $this->db->join('product_to_option', 'product_to_option.product_id=product.id','left');
        $this->db->join('oc_option', 'oc_option.option_id=product_to_option.option_id','left');
        $this->db->where('product_to_option.id', $id);
        $this->db->where('product.id', $pid);
        $this->db->order_by('oc_option.option_id', 'desc');
        $q = $this->db->get();
        return $q->first_row();
    }
    public function getValueById($to_ids = null)
    {
        $this->db->select('*');
        $this->db->from('oc_option_value');
        $this->db->where('to_ids', $to_ids);
        $q = $this->db->get();
        return $q->result();
    }
    public function getAllOptByPro($pid = null)
    {
        $this->db->select('*');
        $this->db->from('product_to_option');
        $this->db->where('product_id', $pid);
        $q = $this->db->get();
        return $q->result();
    }
    public function user_del($id)
    {
        if (is_numeric($id)) {
            $this->db->where('description_id', $id);
            $this->db->delete('oc_option_value_description');
        } else return false;
    }
}