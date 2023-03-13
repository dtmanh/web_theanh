<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Comment extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('view_helper');
        $this->load->model('comment_model');
        $this->load->model('m_comment');
    }
    //index
    public function index(){
        if(isset($_POST['sendcontact'])){

            $arr=array('full_name' => $this->input->post('full_name'),
                'phone' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
                'address' => $this->input->post('address'),
                'city' => $this->input->post('city'),
                'country' => $this->input->post('country'),
                'comment' => $this->input->post('comment'),
                'time' => time(),
            );
            $id=$this->comment_model->Add('contact',$arr);

            if($id){
				$this->session->set_flashdata("mess", "Bạn gửi thông tin thành công!");
            }
            redirect($_SERVER['HTTP_REFERER']);
        }

        $data['slide']=$this->comment_model->getBanner('banner',0);
        $data['slide_2']=$this->comment_model->getBanner('banner',1);


        $site_name='Liên hệ khách hàng ';
        $site_keyword='Liên hệ khách hàng';
        $site_description='';

        $this->LoadHeader($site_name,$site_keyword,$site_description);
        $this->load->view('comment',$data);
        $this->LoadFooter();
    }
    /***add question***/
    public function addQuestion(){
        $comment = $_POST['comment'];
        $user_name = $_POST['name_users'];
        $user_email = $_POST['email_users'];
        $id_sanpham = $_POST['id'];
        $rs= $this->comment_model->Add('questions',array(
            'id_sanpham'=>$id_sanpham,
            'comment'=>$comment,
            'user_name'=>$user_name,
            'user_email'=>$user_email,
            'time'=>time(),
            'reply' => 0
        ));
		// if($rs){
			// $this->session->set_flashdata("mess", "Đánh giá của bạn đã được gửi. Đang trong quá trình xét duyệt!");
			// redirect($_SERVER['HTTP_REFERER']);
		// }
    }
    /**add comment**/
    public function Add_comment_binhluan(){
        $comment = $_POST['comment'];
        $user_name = $_POST['name_users'];
        $user_email = $_POST['email_users'];
        $giatri = $_POST['giatri'];
        $id_sanpham = $_POST['id'];
        $rs= $this->comment_model->Add('comments_binhluan',array(
            'id_sanpham'=>$id_sanpham,
            'comment'=>$comment,
            'user_name'=>$user_name,
            'user_email'=>$user_email,
            'giatri'=>$giatri,
            'time'=>time(),
            'date' =>date("Y-m-d"),
            'reply' => 0
        ));
		// if($rs){
			// $this->session->set_flashdata("mess", "Đánh giá của bạn đã được gửi. Đang trong quá trình xét duyệt!");
			// redirect($_SERVER['HTTP_REFERER']);
		// }
		
    }
    public function getcomments(){
        $product_id = $_POST['id'];
        $limit = $_POST['number_per_page'];
        $data['comments']=$this->comment_model->getComments_All($product_id,$limit);
        $data['comments_sub']=$this->comment_model->getComments_desc($product_id);
        $data['product_id']=$product_id;
//        echo '<pre>';
//        print_r($product_id); die();
        $this->load->view('products/productcoments', $data);
    }
    public function getComments_desc($product_id){
        $this->db->select('comments.*, users.fullname, users.avatar');
        $this->db->join('users','users.id=comments.user');
        $this->db->where('comments.item_id',$product_id);
        $n=$this->db->get('comments');
        return $n->result();
    }
    public function addComment()
    {
        if($_POST['itemId']){
            $arr = array(
                'id_sanpham' => (int) $_POST['itemId'],
                'user_name' => $this->input->post('userName'),
                'user_email' => $this->input->post('email'),
                'comment' => $this->input->post('message'),
                'giatri' => $this->input->post('giatri'),
                'reply' => (int) $this->input->post('reply'),
                'time' => time(),
            );
            /*echo "<pre>";var_dump($arr);die();*/
            $this->m_comment->Add('comments_binhluan',$arr);
        }

        //echo "<pre>";var_dump($arr);die();
        $data['status'] = true;
        echo json_encode($data);
    }
    public function addSubQuestion(){
        if($_POST['itemId']){
            $arr = array(
                'id_sanpham' => (int) $_POST['itemId'],
                'user_name' => $this->input->post('userName'),
                'user_email' => $this->input->post('email'),
                'comment' => $this->input->post('message'),
                'reply' => (int) $this->input->post('reply'),
                'time' => time(),
            );
            /*echo "<pre>";var_dump($arr);die();*/
            $this->m_comment->Add('questions',$arr);
        }

        //echo "<pre>";var_dump($arr);die();
        $data['status'] = true;
        echo json_encode($data);
    }
    /**getComment ajax**/
    public function getComment_ajax()
    {
        $data = array();
        $idItem = $this->input->post('itemId');
        $this->load->library('pagination_ajax');
        $page =  $_POST['page'];
        $limit= $_POST['number_per_page'];
        $offset = ($page - 1) * $limit;
        $number_per_page= $_POST['number_per_page'];
        //$arr = $this->m_comment->getCommentByItem($idItem,$offset,$limit);
        $data['subs'] = $arr_sub = $this->m_comment->getCommentSubs($idItem);
        //echo buildArray($arr_sub,1);die();
        //$data['lists'] = $lists = buildArray($arr,0);
        $data['lists'] = $lists = $this->m_comment->getCommentByItem($idItem,$offset,$limit);
      
        $data['total_rows'] = $this->m_comment->countCommentByItem($idItem);
        $data['phantrang'] = $this->pagination_ajax->create($data['total_rows'], $number_per_page, $page);
        $this->load->view('comments/view_comments',$data);
    }
    /**get question**/
    public function getQuestions(){
        $data = array();
        $idItem = $this->input->post('itemId');
        $this->load->library('pagination_ajax');
        $page =  $_POST['page'];
        $limit= $_POST['number_per_page'];
        $offset = ($page - 1) * $limit;
        $number_per_page= $_POST['number_per_page'];
        //$arr = $this->m_comment->getCommentByItem($idItem,$offset,$limit);
        $data['subs'] = $arr_sub = $this->m_comment->getQuestionSubs($idItem);
       
        $data['lists'] = $lists = $this->m_comment->getQuestionByItem($idItem,$offset,$limit);
         
        $data['total_rows'] = $this->m_comment->countQuestionByItem($idItem);
        $data['phantrang'] = $this->pagination_ajax->create($data['total_rows'], $number_per_page, $page);
        $this->load->view('comments/view_question',$data);
    }
    public function getForm()
    {
        $data = array();
        $data['pid'] = $itemId = $this->input->post('pid');
        $data['cid'] = $userId = $this->input->post('cid');
        $data['user'] = $this->m_comment->getFirstRowWhere('comments_binhluan',array(
            'id' => $userId
        ));
        $this->load->view('comments/view_form',$data);
    }
    //get form question
    public function getFormQuestion()
    {
        $data = array();
        $data['pid'] = $itemId = $this->input->post('pid');
        $data['cid'] = $userId = $this->input->post('cid');
        $data['user'] = $this->m_comment->getFirstRowWhere('questions',array(
            'id' => $userId
        ));
        $this->load->view('comments/view_form_question',$data);
    }
}