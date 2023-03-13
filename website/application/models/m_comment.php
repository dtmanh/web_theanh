<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_comment extends MY_Model{
    function __construct() {
        parent::__construct();
        $this->load->helper('model');
        $this->load->database();
    }
    public function listAllComment($limit,$offset)
    {
        $this->db->select('comments_binhluan.*,comments_binhluan.id as id_comment,
        product.name as pro_name,
        product.id as pro_id,
        product.alias as pro_alias,');
        $this->db->join('product','product.id=comments_binhluan.id_sanpham','left');
        $this->db->limit($limit,$offset);
        $this->db->order_by('comments_binhluan.id','desc');
        $this->db->group_by('comments_binhluan.id');
        $q = $this->db->get('comments_binhluan');
        return $q->result();
    }
    public function countComment()
    {
        $this->db->select('comments_binhluan.id');
        $this->db->join('product','product.id=comments_binhluan.id_sanpham','left');
        $q = $this->db->get('comments_binhluan');
        return $q->num_rows();
    }
   
    //questions
    public function countQuestions()
    {
        $this->db->select('questions.id');
        $this->db->join('product','product.id=questions.id_sanpham','left');
        $q = $this->db->get('questions');
        return $q->num_rows();
    }
    public function listAllQuestionPro($limit,$offset)
    {
        $this->db->select('questions.*,questions.id as id_comment,
        product.name as pro_name,
        product.id as pro_id,
        product.alias as pro_alias,
        product.category_id as cate_id,
        product.alias');
        $this->db->join('product','product.id=questions.id_sanpham','left');
        $this->db->limit($limit,$offset);
        $this->db->order_by('questions.id','desc');
        $this->db->group_by('questions.id');
        $q = $this->db->get('questions');
        return $q->result();
    }

   

    public function listCommentNew($limit,$offset)

    {

        $this->db->select('comments_binhluan.*,comments_binhluan.id as id_comment,

        news.title,

        news.id as new_id,

        news.alias as new_alias,

        news.category_id as cate_id

        ');

        $this->db->join('news','news.id=comments_binhluan.id_sanpham','left');

        $this->db->limit($limit,$offset);

        $this->db->order_by('comments_binhluan.id','desc');

        $this->db->group_by('comments_binhluan.id');

        $q = $this->db->get('comments_binhluan');

        return $q->result();

    }

    public function countCommentNew()

    {

        $this->db->select('comments_binhluan.id');

        $this->db->join('news','news.id=comments_binhluan.id_sanpham','left');

        $q = $this->db->get('comments_binhluan');

        return $q->num_rows();

    }

    public function getCommentByItem($id,$offset,$limit){

        $this->db->select('*');

        $this->db->where('id_sanpham',$id);

        $this->db->where('reply','0');

        $this->db->where('review','1');

        $this->db->limit($limit,$offset);

        $this->db->order_by('id','desc');

        $q = $this->db->get('comments_binhluan');

        return $q->result();

    }

    public function countCommentByItem($id){

        $this->db->select('comments_binhluan.*');

        $this->db->where('id_sanpham',$id);

        $this->db->where('reply','0');

        $this->db->where('review','1');

        $this->db->order_by('id','desc');

        $this->db->group_by('id');

        $q = $this->db->get('comments_binhluan');

        return $q->num_rows();

    }

    public function getCommentSubs($id)

    {

        $this->db->select('*');

        //$this->db->where('id_sanpham',$id);

        $this->db->where('reply !=',0);

        $this->db->where('id_sanpham',$id);

        $this->db->where('review','1');

        $this->db->order_by('id','desc');

        $q = $this->db->get('comments_binhluan');

        return $q->result_array();

    }

    /**question**/

    public function getQuestionSubs($id)

    {

        $this->db->select('*');

        //$this->db->where('id_sanpham',$id);

        $this->db->where('reply !=',0);

        $this->db->where('id_sanpham',$id);

        $this->db->where('review','1');

        $this->db->order_by('id','desc');

        $q = $this->db->get('questions');

        return $q->result_array();

    }

    public function getQuestionByItem($id,$offset,$limit){

        $this->db->select('*');

        $this->db->where('id_sanpham',$id);

        $this->db->where('reply','0');

        $this->db->where('review','1');

        $this->db->limit($limit,$offset);

        $this->db->order_by('id','desc');

        $q = $this->db->get('questions');

        return $q->result();

    }

    public function countQuestionByItem($id){

        $this->db->select('questions.id');

        $this->db->where('id_sanpham',$id);

        $this->db->where('reply','0');

        $this->db->where('review','1');

        $this->db->order_by('id','desc');

        $this->db->group_by('id');

        $q = $this->db->get('questions');

        return $q->num_rows();

    }
}