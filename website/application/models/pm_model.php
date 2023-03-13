<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pm_model extends MY_Model{
    function __construct() {
        parent::__construct();
        $this->load->helper('model');
       

    }
    public function my_model_method($name_link)
    {
         $ci=& get_instance();
        ini_set('memory_limit', '256M');
        ini_set('max_execution_time', 3000);
        $this->db2 =  $ci->load->database('demo', TRUE); 
            $string1 = read_file('../demo/'.$name_link.'/sql/mybackup.sql');

            // create db
            $string_begin = 'CREATE TABLE ';
            $string_end ='CHARSET=utf8 COLLATE=utf8_unicode_ci;';
            while (strpos($string1, $string_begin )) {
                $vitri1 =  strpos($string1, $string_begin )+strlen($string_begin);
                $vitri2 = strpos($string1, $string_end );
                $chuoi_tim = substr( $string1,  $vitri1, ($vitri2-$vitri1));
                $string1 = str_replace($string_begin.$chuoi_tim.$string_end, '', $string1);
                $this->db2->query($string_begin.$chuoi_tim.$string_end);
            }
            if ( ! write_file("../demo/".$name_link."/sql/mybackup1.sql",$string1))
            {
                echo 'Unable to write the file left';
                die;
            }
            // insert db
               if ($file = fopen("../demo/".$name_link."/sql/mybackup1.sql", "r")) {
                while(!feof($file)) {
                    $line = fgets($file);
                    $pattern = '';
                    $test  = str_replace("INSERT INTO","",$line);
                    if ($test != $line) {
                        $this->db2->query($line);
                    }
                }
                fclose($file);
        }
            
    }
    public function my_cread_csdl($name_link)
    {
         $ci=& get_instance();
        ini_set('memory_limit', '256M');
        ini_set('max_execution_time', 3000);
        $this->db2 =  $ci->load->database('demo', TRUE); 
            $string1 = read_file('config_upload_db/kho_upload/'.$name_link.'/mybackup.sql');

            // create db
            $string_begin = 'CREATE TABLE ';
            $string_end ='CHARSET=utf8 COLLATE=utf8_unicode_ci;';
            while (strpos($string1, $string_begin )) {
                $vitri1 =  strpos($string1, $string_begin )+strlen($string_begin);
                $vitri2 = strpos($string1, $string_end );
                $chuoi_tim = substr( $string1,  $vitri1, ($vitri2-$vitri1));
                $string1 = str_replace($string_begin.$chuoi_tim.$string_end, '', $string1);
                $this->db2->query($string_begin.$chuoi_tim.$string_end);
            }
            if ( ! write_file("config_upload_db/kho_upload/".$name_link."/mybackup1.sql",$string1))
            {
                echo 'Unable to write the file left';
                die;
            }
            // insert db
        if ($file = fopen("config_upload_db/kho_upload/".$name_link."/mybackup1.sql", "r")) {
            while(!feof($file)) {
                $line = fgets($file);
                $test  = str_replace("INSERT INTO","",$line);
                if ($test != $line) {
                   $this->db2->query($line);                    
                }
            }
            fclose($file);
        }
        // lma rong du lieu cu
        $this->db2->truncate('product');
        $this->db2->truncate('product_category');
        $this->db2->truncate('product_to_category');
        $this->db2->truncate('news');
        $this->db2->truncate('news_category');
        $this->db2->truncate('news_to_category');
        $this->db2->truncate('color_to_category');
        $this->db2->truncate('product_img');
        $this->db2->truncate('product_new_pro');
        $this->db2->truncate('product_tag');
        $this->db2->truncate('product_to_brand');
        $this->db2->truncate('product_to_color');
        $this->db2->truncate('product_to_option');
        $this->db2->truncate('product_to_season');
        $this->db2->truncate('product_to_size');
        $this->db2->truncate('p_images');
        $this->db2->truncate('order');
        $this->db2->truncate('order_item');
        $this->db2->delete('alias', array('pro !=' =>0));
        $this->db2->delete('alias', array('pro_cat !=' =>0));
        $this->db2->delete('alias', array('new !=' =>0));
        $this->db2->delete('alias', array('new_cat !=' =>0));            
    }
    
     public function getFirstRowWhere_pm($table,$where=array())
    {
         $ci=& get_instance();
        ini_set('memory_limit', '256M');
        ini_set('max_execution_time', 3000);
        $this->db2 =  $ci->load->database('demo', TRUE); 
        
        if ($table && is_array($where)) {
            $this->db2->where($where);
        } else {
            return false;
        }
        $this->db2->order_by('id','desc');
        $q = $this->db2->get($table);
        return $q->first_row();
    }
     public function get_data_pm($tablename,$where=array(),$order=array(),$getfirst=false,$limit=0,$offset=0){
         $ci=& get_instance();
        ini_set('memory_limit', '256M');
        ini_set('max_execution_time', 3000);
        $this->db2 =  $ci->load->database('demo', TRUE); 
        $this->db2->from($tablename);
        if(is_array($where)&&!empty($where)){
            $this->db2->where($where);
        }
        
        if(!empty($order)&&is_array($order)){
            foreach ($order as $field => $val){
               $this->db2->order_by($field,$val);
            }
        }
        if ($limit){
            if ($offset){
                $this->db2->limit($limit,$offset);
            }else{
                $this->db2->limit($limit);
            }
        }

        if ($getfirst===true){
            return $this->db2->get()->first_row();
        }else{
            return $this->db2->get()->result();
        }
    }
}