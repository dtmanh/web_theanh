<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Comment extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        if(!$this->check->is_logined($this->session->userdata('sessionUserAdmin'), $this->session->userdata('sessionGroupAdmin')))
        {
            redirect(base_url().'techadmin', 'location');
            die();
        }
        $this->load->helper('url');
        $this->load->model('m_comment');
        $this->load->library('pagination');
    }
	protected $pagination_config= array(
        'full_tag_open'=>"<ul class='pagination pagination-sm'>",
        'full_tag_close'=>"</ul>",
        'num_tag_open'=>'<li>',
        'num_tag_close'=>'</li>',
        'cur_tag_open'=>"<li class='disabled'><li class='active'><a href='#'>",
        'cur_tag_close'=>"<span class='sr-only'></span></a></li>",
        'next_tag_open'=>"<li>",
        'next_tagl_close'=>"</li>",
        'prev_tag_open'=>"<li>",
        'prev_tagl_close'=>"</li>",
        'first_tag_open'=>"<li>",
        'first_tagl_close'=>"</li>",
        'last_tag_open'=>"<li>",
        'last_tagl_close'=>"</li>",
    );
    public function comments()
    {
		$this->check_acl();
		$config['page_query_string']    = TRUE;
        $config['enable_query_strings'] = TRUE;
		$config['base_url']    = base_url('techadmin/comment/comments');
        $config['total_rows']  = $this->m_comment->countComment(); // xác định tổng số record
			$config['per_page']    = 20; // xác định số record ở mỗi trang
        $config['uri_segment'] = 4; // xác định segment chứa page number
        $config=array_merge($config,$this->pagination_config);
		$this->pagination->initialize($config);
        $data              = array();
        $data['list']  = $this->m_comment->listAllComment($config['per_page'],$this->uri->segment(4));
        if(isset($_POST['ok'])){
            $arr = array(
                'comment' => $this->input->post('traloi'),
                'reply' => $this->input->post('parent_id'),
                'id_sanpham' => $this->input->post('pid'),
                'time' => time(),
                'date' => date('Y-m-d'),
                'lang' => $this->language,
            );
            $this->m_comment->Add('comments_binhluan', $arr);
            redirect('admin/comment/comments');
        }
       
         $title = "Bình luận";
        $this->LoadHeaderAdmin(false,$title);
        $this->load->view('admin/comments/list', $data);
        $this->load->view('admin/footer');
    }
    public function popupdata()
    {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $id   = $_GET['id'];
            $pid = $_GET['pro_id'];
            $item = $this->m_comment->getFirstRowWhere('comments_binhluan', array('id' => $id));
            $cmt_child = $this->m_comment->Get_where('comments_binhluan', array(
                'parent_id ' => $id
            ));
            $html = '';
            $html ='
            <div class="col-xs-12">
				<div class="row">
					<div class="col-md-2">
						<h4 style="font-size: 12px; font-weight: bold">Khách hàng:</h4>
					</div>
					<div class="col-md-9">
						'.@$item->user_name.'
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
						<h4 style="font-size: 12px; font-weight: bold">Nội dung :</h4>
					</div>
					<div class="col-md-8">
						'.@$item->comment.'
					</div>
				</div>
                <div class="row">
                    <ul>';
                    foreach ($cmt_child as $val){
                            $html .='<li>'.@$val->user_name.': '.@$val->comment.'   <a href="'.base_url('techadmin/comment/delete/'.$id).'" class="btn btn-danger"><i class="fa fa-times-circle" style=""></i></a></li>';

                    }
            $html .=  '</ul>
                </div>
            </div>
                ';
            $html .= '<input type="hidden" name="pid" value="'.$pid.'">';
            echo $html;
        }
    }
	public function deletes()
    {
        $ids = $this->input->post('checkone');
        foreach($ids as $id)
        {
            $this->delete_once_comment($id);
        }
		$this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function delete_once_comment($id)
    {
		$this->check_acl();
		$this->m_comment->Delete_where('comments_binhluan',array('id' => $id));
    }
    public function delete($id){
        $this->check_acl();
        $this->delete_once_comment($id);
		$this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
///// hoi dap	///////////////////////////////////////
	public function questions()
    {
		$this->check_acl();
		$config['page_query_string']    = TRUE;
        $config['enable_query_strings'] = TRUE;
        $config['base_url']    = base_url('techadmin/comment/comments');
        $config['total_rows']  = $this->m_comment->countQuestions(); // xác định tổng số record
        $config['per_page']    = 20; // xác định số record ở mỗi trang
        $config['uri_segment'] = 4; // xác định segment chứa page number
        $config=array_merge($config,$this->pagination_config);
		$this->pagination->initialize($config);
        $data              = array();
        $data['list']  = $this->m_comment->listAllQuestionPro($config['per_page'],$this->uri->segment(4));
        if(isset($_POST['ok'])){
            $arr = array(
                'comment' => $this->input->post('traloi'),
                'reply' => $this->input->post('parent_id'),
                'id_sanpham' => $this->input->post('pid'),
                'time' => time(),
                'date' => date('Y-m-d'),
                'user_name' => 'Admin',
            );
            $this->m_comment->Add('questions', $arr);
            redirect('admin/comment/questions');
        }
         
         $title = "Câu hỏi";
        $this->LoadHeaderAdmin(false,$title);
        $this->load->view('admin/comments/list_questions', $data);
        $this->load->view('admin/footer');
    }

    //delete Question
    public function delete_multi_question()
    {
        $ids = $this->input->post('checkone');
        foreach($ids as $id)
        {
            $this->delete_once_question($id);
        }
		$this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function delete_once_question($id)
    {
        $this->check_acl();
       $this->m_comment->Delete_where('questions',array('id' => $id));
    }
    public function delete_question($id){
		$this->m_comment->Delete_where('questions',array('id' => $id));
		$this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }

    //question modal
    public function popupdata_question()
    {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $id   = $_GET['id'];
            $pid = $_GET['pro_id'];
            $item = $this->m_comment->getFirstRowWhere('questions', array('id' => $id));
            $cmt_child = $this->m_comment->Get_where('questions', array(
                'reply ' => $id
            ));

            $html = '';
            $html ='
            <div class="col-xs-12">
                <div class="row">
					<div class="col-md-2">
						<h4 style="font-size: 12px; font-weight: bold">Khách hàng:</h4>
					</div>
					<div class="col-md-9">
						'.@$item->user_name.'
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
						<h4 style="font-size: 12px; font-weight: bold">Nội dung :</h4>
					</div>
					<div class="col-md-8">
						'.@$item->comment.'
					</div>
				</div>
				<div class="row">
                    <ul>';
            foreach ($cmt_child as $val){
                $html .='<li>'.@$val->user_name.': '.@$val->comment.'   <a href="'.base_url('techadmin/comment/delete/'.$id).'" class="btn btn-danger"><i class="fa fa-times-circle" style=""></i></a></li>';

            }
            $html .=  '</ul>
                </div>
            </div>
                ';
            $html .= '<input type="hidden" name="pid" value="'.$pid.'">';
            echo $html;
        }
    }

}