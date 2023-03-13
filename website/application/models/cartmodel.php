<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cartmodel extends MY_Model{
    function __construct() {
        parent::__construct();
        $this->load->helper('model');
        $this->load->database();
    }
    public function Get_product_order($id){
        $this->db->select('
            order_item.count,
            order_item.color,
            order_item.size,
            order_item.price,
            order_item.price_sale,
            product.name,
            product.image
        ');
        $this->db->from('order_item');
        $this->db->join('product', 'product.id = order_item.item_id');
        $this->db->where('order_item.order_id', $id);
        $data = $this->db->get();
        return $data->result();
    }


}