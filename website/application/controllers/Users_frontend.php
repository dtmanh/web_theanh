<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Users_frontend extends MY_Controller
{
    private $b_Check = false;
    function __construct()
    {
        parent::__construct();
        $this->load->model('f_usersmodel');
        $this->load->library('pagination');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('unlink');
        $this->load->library('form_validation');
        $this->load->library('hash');
        $this->load->library('filter');
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
// dang ky tai khoan thanh vien
     public function createpost()
    {
        $pass = $_POST['password'];
        for($i=0;$i<5;$i++){
            $pass=md5($pass);
        }
        if($this->input->post('form_key') && $this->input->post('form_key') == $this->session->userdata('formkey'))
        {
            if($this->checkEmail(trim($this->input->post('email')))){
                $salt = $this->hash->key(8);
                $regisdate = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
                $arr = array(
                    'username' => 'taikhoan',
                    'fullname' => $this->input->post('fullname'),
                    'email' => $this->input->post('email'),
                    'phone' => $this->input->post('phone'),
                    'use_regisdate' => $regisdate,
                    'use_salt'          =>      $salt,
                    'password' => $pass,
                    'use_key'           =>      $this->hash->create($this->input->post('fullname'), $this->input->post('fullname'), 'sha256md5'),
                    'active' => 0,
                    'lever' => 0,
                    'block'=>0,
                    'address_province' => $this->input->post('province'),
                );
                $id = $this->f_usersmodel->Add('users',$arr);
                $this->f_usersmodel->Update_Where('users', array('id' => $id),
                    array('md5_id' => md5($id), 'token' => md5($this->input->post('email') . $id),));
                if (isset($id)) {
                    $config = Array(
                            'protocol'  => 'smtp',
                            'smtp_host' => $this->config->item('smtp_hostssl'),
                            'smtp_port' => $this->config->item('smtp_portssl'),
                            'smtp_user' => $this->config->item('smtp_user'), // change it to yours
                            'smtp_pass' => $this->config->item('smtp_pass'), // change it to yours
                            'mailtype'  => 'html',
                            'charset'   => 'utf-8',
                            'wordwrap'  => TRUE
                        );

                        $this->load->library('email', $config);
                        $user=$this->f_usersmodel->getFirstRowWhere('users',array('id'=>$id));
                        $subject = $this->site_name.' - Kích hoạt tài khoản';
                        $message = '
                                    <p>Nhấn vào link dưới đây để kích hoạt tài khoản:</p>
                                    <a href="'.base_url('users_frontend/userActive?id='.$user->md5_id.'&token='.$user->token).'">
                                    '.base_url('users_frontend/userActive?id='.$user->md5_id.'&token='.$user->token).'</a>';

                                        // Get full html:
                                        $body =
                                            '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                            <html xmlns="http://www.w3.org/1999/xhtml">
                                            <head>
                                                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                                                <title>' . htmlspecialchars($subject, ENT_QUOTES, $this->email->charset) . '</title>
                                        <style type="text/css">
                                            body {
                                                font-family: Arial, Verdana, Helvetica, sans-serif;
                                                font-size: 16px;
                                            }
                                        </style>
                                    </head>
                                    <body>
                                    ' . $message . '
                                    </body>
                                    </html>';

                        $receiver_email = $user->email . ','.@$this->option->site_email;
                        $this->email->set_newline("\r\n");
                        $this->email->from(@$this->option->site_email,'Thông tin tài khoản'); // change it to yours
                        $this->email->to($receiver_email);
                        $this->email->subject($subject);
                        $this->email->message($body);
                        if ($this->email->send()) {
                            $this->session->set_flashdata("mess", "Đăng ký tài khoản thành công!");
                            redirect(base_url('dang-ky-thanh-cong?u='.$user->md5_id));
                        } else {
                            $this->session->set_flashdata("mess_err", "Đăng ký thành công! Lỗi gửi email");
                            redirect($_SERVER['HTTP_REFERER']);
                        }
                    $this->session->set_flashdata("mess", "Đăng ký tài khoản thành công!");
                }
            }else{
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
    }
// check email xem tai khoan da dang ky chua
    public function checkEmail($email){
        $check = $this->f_usersmodel->getFirstRowWhere('users',array(
            'email' => $email
        ));
        if(!empty($check)){
            $this->session->set_flashdata("mess", "Email đã tồn tại!");
            return false;
        }
        else{
            return true;
        }
    }
// kich hoat tai khoan thanh vien
    public function userActive(){
        if(isset($_GET['id'])&& isset($_GET['token'])){
            $md5_id=$_GET['id'];
            $user=$this->f_usersmodel->getFirstRowWhere('users',array('md5_id'=>$md5_id));
            if($user->token==$_GET['token']){
                $this->f_usersmodel->Update_where('users',array('id'=>$user->id),array('active'=>1));
            }
            $seo = array(
                'title' => "Kích hoạt tài khoản"
            );
            $data = array();
            $this->LoadHeader(null,$seo,false);
            $this->load->view('users/success_active_user',$data);
            $this->LoadFooter();

        }else
        {redirect(base_url());}
    }
   // kich hoat tai khoan thanh cong
  public function success_active_user(){
        $seo = array(
            'title' => 'Kích hoạt tài khoản thành công'
        );
        $this->load->LoadHeader(null,$seo);
        $this->load->view('users/success_active_user',$data);
        $this->load->LoadFooter();
    }
// dang ky tai khoan thanh cong
 public function success_signup(){
        if(isset($_GET['u'])){
            $data['u']=$this->f_usersmodel->getFirstRowWhere('users',array('md5_id'=>$_GET['u']));
        }
        $seo = array(
            'title' => 'Đăng ký thành công'
        );
        $this->LoadHeader(null,$seo,true);
        $this->load->view('users/success_signup',$data);
        $this->LoadFooter();
    }
// dang nhap user fonts_end
    public function login(){
        $email = $_POST['email'];
        $pass=$_POST['pass'];
        for($i=0;$i<5;$i++){
            $pass=md5($pass);
        }

        $check = false;
        if($this->input->post('email') && trim($this->input->post('email')) != '' && $this->input->post('pass') && trim($this->input->post('pass')) != ''){
           $user = $this->f_usersmodel->getFirstRowWhere('users',array(
                'email' => $this->filter->injection_html($this->input->post('email'))
            ));
            if(!empty($user)){
                $this->load->library('hash');
                if($user->password === $pass && $user->lever == 0){
                    if($user->active == 1){
                        $userData['oauth_uid'] = $user->id;
                        $userData['use_salt'] = $user->use_salt;
                        $userData['fullname'] = $user->fullname;
                        $userData['email'] = $user->email;
                        $userData['avatar'] = $user->avatar;
                        $this->session->set_userdata('userData',$userData);
                        $check = true;
                        $this->session->set_flashdata("mess", "Bạn đã đăng nhập thành công!");
                    }else{
                        $this->session->set_flashdata("mess_err", "Bạn Chưa kích hoạt tài khoản!");
                    }
                }else{
                     $this->session->set_flashdata("mess_err", "Sai mật khẩu!");
                }
            }else{
                $this->session->set_flashdata("mess_err", "Tài khoản đăng nhập sai !!!");
            }
        }else{
            $this->session->set_flashdata("mess_err", "Mời bạn nhập đầy đủ thông tin !!!");
        }
        $data['check'] = $check;
        if($check==true){
            $data['mss_success'] = $this->session->flashdata('mess');
        }else{
             $data['mss_success'] = $this->session->flashdata('mess_err');
        }
        echo json_encode($data);
    }
    // thanh vien thoat
    public function logout() {
        $user = $this->session->userData('userData');
        // cập nhật giờ logout
        $this->f_usersmodel->Update_where('users',array('id' => $user['oauth_uid']),array(
                    'lastest_login' => time("Y-m-d H:i:s")
                ));
        $this->session->unset_userdata('token');
        $this->session->unset_userdata('userData');
         $this->session->set_flashdata("mess", "Thoát tài khoản thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
// thông tin tai khoan
    public function acount()
    {
        $user = $this->session->userData('userData');
        $id = $user['oauth_uid'];
        $config['upload_path'] = './upload/img/avatar/';
        $config['allowed_types'] = 'gif|jpg|png|JPG|PNG|GIF';
        $config['max_size'] = '4000';
        $config['max_width'] = '3000';
        $config['max_height'] = '3000';
        $this->load->library('upload', $config);
        $data['user_item'] = $this->f_usersmodel->getItemByID('users',$id);
        if (isset($_POST['update_profiler'])) {

            $arr = array(
                'fullname' => $this->input->post('fullname'),
                'phone' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
                'address' => $this->input->post('address'),
                'address_province' => $this->input->post('province'),
                'address_district' => $this->input->post('address_district'),
                'address_ward' => $this->input->post('address_ward')
            );
            $this->f_usersmodel->Update_where('users',array('id' => $id ),$arr);
            $this->session->set_flashdata("mess", "Cập nhật thông tin thành công!!!");
            redirect($_SERVER['HTTP_REFERER']);
        }

        $data['province'] = $this->f_usersmodel->get_data('province');
        $seo = array(
            'title' => 'Thông tin tài khoản'
        );

        $this->LoadHeader(null,$seo);
        $this->load->view('users/acount',$data);
        $this->LoadFooter();
    }
   // thay doi mat khau
     public function change_pass(){
        if($this->session->userData('userData')){
            $users = $this->session->userData('userData');
            $pass=$this->input->post('old_pass');
            $password_new = $this->input->post('new_pass');
            for($i=0;$i<5;$i++){
                $pass=md5($pass);
                $password_new=md5($password_new);
            }
            //var_dump($password_new);die;
            $arr2 = array('password' => $password_new);
            $user=$this->f_usersmodel->getFirstRowWhere('users',array('id'=>$users['oauth_uid']));
            if($pass==$user->password){
                $rs=$this->f_usersmodel->Update_where('users',array('id' => $users['oauth_uid']),$arr2);
                  if($rs){
						 $config = Array(
                            'protocol'  => 'smtp',
                            'smtp_host' => $this->config->item('smtp_hostssl'),
                            'smtp_port' => $this->config->item('smtp_portssl'),
                            'smtp_user' => $this->config->item('smtp_user'), // change it to yours
                            'smtp_pass' => $this->config->item('smtp_pass'), // change it to yours
                            'mailtype'  => 'html',
                            'charset'   => 'utf-8',
                            'wordwrap'  => TRUE
                        );

						$this->load->library('email', $config);
                        $subject = $this->option->site_name.' - Thay đổi mật khẩu';
                        $message = '<p>Mật khẩu tài khoản của bạn đã được đổi: '.$this->input->post('new_pass').'</p>';
                        // Get full html:
                        $body =
                            '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                            <html xmlns="http://www.w3.org/1999/xhtml">
                            <head>
                                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                                <title>' . htmlspecialchars($subject, ENT_QUOTES, $this->email->charset) . '</title>
                                    <style type="text/css">
                                        body {
                                            font-family: Arial, Verdana, Helvetica, sans-serif;
                                            font-size: 16px;
                                        }
                                    </style>
                                </head>
                                <body>
                                ' . $message . '
                                </body>
                                </html>';

						$receiver_email = $user->email . ','.@$this->option->site_email;
                        $this->email->set_newline("\r\n");
                        $this->email->from(@$this->option->site_email,'Thay đổi mật khẩu'); // change it to yours
                        $this->email->to($receiver_email);
                        $this->email->subject($subject);
                        $this->email->message($body);
                        if ($this->email->send()) {
                            $this->session->set_flashdata("mess", "Đổi mật khẩu thành công!!!");
                        } else {
                            $this->session->set_flashdata("mess_err", "Đổi mật khẩu thất bại!!!");
                            redirect($_SERVER['HTTP_REFERER']);
                        }
                    redirect($_SERVER['HTTP_REFERER']);
                }
           }else{
               $this->session->set_flashdata("mess_err", "mật khẩu cũ không đúng!!!");
               redirect($_SERVER['HTTP_REFERER']);
           }

        }else{
            redirect(base_url());
        }
    }
  // thay doi mat khau
 public function changePass()
    {
        if($_POST['old_pass'] && $_POST['old_pass'] !=''){
            $user = $this->f_usersmodel->getFirstRowWhere('users',array(
                'phone' => $this->input->post('phone')
            ));
            $current_pass = $this->input->post('old_pass');
            for ($i=0; $i < 5; $i++) {
                 $current_pass = md5( $current_pass);
            }
            $check = false;
            if($user->password == $current_pass){
                $check = true;
                $change_pass = $this->input->post('new_pass');
                for ($i=0; $i < 5; $i++) {
                     $change_pass = md5( $change_pass);
                }
                $this->f_usersmodel->Update_where('users',array('id'=>$user->id),array(
                    'password' => $change_pass,
                    //'modified' => date("Y-m-d H:i:s"),
                    //'use_salt'          =>      $salt,
                ));
            }
        }
        $data['check'] = $check;
        echo json_encode($data);
    }
// danh sach don hang cua tai khoan
    public function acount_order()
    {
        $user = $this->session->userData('userData');
         $id=$user['oauth_uid'];
        $config['page_query_string'] = TRUE;
        $config['enable_query_string'] = TRUE;
        $config['base_url'] = base_url('don-hang?');
        $config['total_rows'] = $this->f_usersmodel->coutnUserOrder($id); // xác định tổng số record
        $config['per_page'] = 9; // xác định số record ở mỗi trang
        $config['uri_segment'] = 3; // xác định segment chứa page number
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        $this->pagination->initialize($config);
        $data = array();

        $data['item_list'] = $this->f_usersmodel->Getlist_oder($id,$config['per_page'], $this->input->get('per_page'));

        $order_id=array();
        foreach($data['item_list'] as $v){
            $order_id[]=$v->id;
        }
        if(empty($data['item_list'])){
            $data['detail']=array();
        }else{
            $data['detail'] = $this->f_usersmodel->order_detail($order_id);
        }

        $seo = array(
            'title' => 'Quản lý đơn hàng'
        );
        $this->LoadHeader(null,$seo);
        $this->load->view('users/acount_order',$data);
        $this->LoadFooter();

    }
   // them san pham yeu thich
public function addWishList()
    {
        $pro_id = $this->input->post('pro_id');
        $user_id = $this->input->post('user_id');
        $item = $this->f_usersmodel->getFirstRowWhere('wishlist',array(
            'pro_id' => $pro_id, 'user_id' => $user_id
        ));
        if(!empty($item)){
            $check = false;
            $this->session->set_flashdata("mess", " Tin đã có trong danh sách  của bạn!");
        }else{
            $check = true;
            $this->f_usersmodel->Add('wishlist',array(
                'pro_id' => $pro_id,
                'user_id' => $user_id
            ));
            $this->session->set_flashdata("mess", " Tin đã được lưu");

        }
        $data['check'] = $check;
        echo json_encode($data);
    }
    public function deleteWishList($id)
    {
        $pro_id = $this->input->post('pro_id');
       
            $this->f_usersmodel->Delete_where('wishlist',array(
                'id' => $pro_id,
            ));
            $this->session->set_flashdata("mess", "Xóa Tin thành công");

  
        echo json_encode($data);
    }
     public function delete($id)
    {
        $this->delete_once($id);
        $this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function delete_once($id){
      
            $this->f_usersmodel->Delete_where('wishlist',array('id'=>$id));
           // $this->productmodel->Delete_where('pro_values',array('pro_id'=>$id));
            //delete more image
            
        
    }
  // ajax kiem tra email xem co tôn tai trong db không
 public function check_email(){
        $email = $this->input->post('email');
        $rs['check']=false;
        $rs['mss']='';
        if (!empty($email)){
            $user = $this->f_usersmodel->getFirstRowWhere('users',array(
                'email' => $this->input->post('email'),
                'lever' => 0
            ));
            if(!empty($user)){
                $rs['check']=true;
            }else{
                $rs['check']=false;
                $rs['mss']='Email chưa đăng ký';
            }
        }else{
             $rs['check']=false;
             $rs['mss']='Email không được để trống';
        }
        echo json_encode($rs);
    }
  
     public function check_email_user(){
      //  var_dump( $this->input->post('status'));die;
        $email = $this->input->post('email');

        $rs['check']=false;
        $rs['mss']='';
        if (!empty($email)){
            $user = $this->f_usersmodel->getFirstRowWhere('site_option',array(
                'site_email' => $this->input->post('email'),
            ));
            if(!empty($user)){
                $rs['check']=true;
            }else{
                $rs['check']=false;
                $rs['mss']='Email chưa đăng ký';
            }
        }else{
             $rs['check']=false;
             $rs['mss']='Email không được để trống';
        }
        echo json_encode($rs);
    }
// tao mat khaui random
function randString($length, $charset='abcdefghijklmnopqrstuvwxyz0123456789')
    {
        $str = '';
        $count = strlen($charset);
        while ($length--) {
            $str .= $charset[mt_rand(0, $count-1)];
        }
        return $str;
    }
 // quên mật khẩu khi ma tai khoan tim mat khau
public function forgotPass(){
        if (isset($_POST['email'])) {
             $email=$this->input->post('email');
             $pass  = $this->randString(6);
            $user = $this->f_usersmodel->getFirstRowWhere('users',array(
                'email' => $this->input->post('email'),
                'lever' => 0
            ));

            $config = Array(
                'protocol'  => 'smtp',
                'smtp_host' => $this->config->item('smtp_hostssl'),
                'smtp_port' => $this->config->item('smtp_portssl'),
                'smtp_user' => $this->config->item('smtp_user'), // change it to yours
                'smtp_pass' => $this->config->item('smtp_pass'), // change it to yours
                'mailtype'  => 'html',
                'charset'   => 'utf-8',
                'wordwrap'  => TRUE
            );

             $this->load->library('email', @$config);

            $subject = $this->site_name . ' - Xác nhận thay đổi mật khẩu tài khoản';
            $subject_admin = $this->site_name . ' - Xác nhận thay đổi mật khẩu tài khoản';

            $message = '
                    <p>Nhấn vào link dưới đây (bắt buộc) để Xác nhận thay đổi mật khẩu tài khoản:</p>
                    <a href="' . base_url('users_frontend/userchangepass?id=' . $user->md5_id . '&token=' . $user->token . '&pass=' . $pass) . '">
                    ' . base_url('users_frontend/userchangepass?id=' . $user->md5_id . '&token=' . $user->token . '&pass=' . $pass) . '</a>
                    <p>Mật khẩu mới của bạn là: ' .$pass. '  </p>';

            //Get full html:
            $body =
                '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html xmlns="http://www.w3.org/1999/xhtml">
                <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                    <title>' . htmlspecialchars($subject, ENT_QUOTES, $this->email->charset) . '</title>
                <style type="text/css">
                    body {
                        font-family: Arial, Verdana, Helvetica, sans-serif;
                        font-size: 16px;
                    }
                </style>
            </head>
            <body>
            ' . $message . '
            </body>
            </html>';

            $receiver_email = $email. ','.@$this->option->site_email;
            $this->email->set_newline("\r\n");
            $this->email->from(@$this->option->site_email,'Thay đổi mật khẩu'); // change it to yours
            $this->email->to($receiver_email);
            $this->email->subject($subject);
            $this->email->message($body);
            if ($this->email->send()) {
                $this->session->set_flashdata("mess", "Gửi email cập lại mật khẩu thành công!!!");
                redirect(base_url('thay-doi-mat-khau-thanh-cong?email='.$email));
            } else {
                $this->session->set_flashdata("mess_err", "Gửi email cập lại mật khẩu thất bại!!!");
                redirect($_SERVER['HTTP_REFERER']);
            }

        }
        // $seo = array(
            // 'title' => 'Thay đổi mật khẩu'
        // );
        // $data = array();
        // $this->LoadHeader(null,$seo,false);
        // $this->load->view('users/view_forgot_pass',$data);
        // $this->LoadFooter();
    }
    public function forgotPass2(){
        if (isset($_POST['email'])) {
             $email=$this->input->post('email');

             $pass  = $this->randString(6);
            $user = $this->f_usersmodel->getFirstRowWhere('users',array(
                'username' => 'admin',
                'lever' => 2,
            ));

            $config = Array(
                'protocol'  => 'smtp',
                'smtp_host' => $this->config->item('smtp_hostssl'),
                'smtp_port' => $this->config->item('smtp_portssl'),
                'smtp_user' => $this->config->item('smtp_user'), // change it to yours
                'smtp_pass' => $this->config->item('smtp_pass'), // change it to yours
                'mailtype'  => 'html',
                'charset'   => 'utf-8',
                'wordwrap'  => TRUE
            );

             $this->load->library('email', @$config);

            $subject = $this->site_name . ' - Xác nhận thay đổi mật khẩu tài khoản';
            $subject_admin = $this->site_name . ' - Xác nhận thay đổi mật khẩu tài khoản';

            $message = '
                    <p>Nhấn vào link dưới đây (bắt buộc) để Xác nhận thay đổi mật khẩu tài khoản:</p>
                    <a href="' . base_url('users_frontend/userchangepass?id=' . $user->md5_id . '&token=' . $user->token . '&pass=' . $pass) . '">
                    ' . base_url('users_frontend/userchangepass?id=' . $user->md5_id . '&token=' . $user->token . '&pass=' . $pass) . '</a>
                    <p>Mật khẩu mới của bạn là: ' .$pass. '  </p>';

            //Get full html:
            $body =
                '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html xmlns="http://www.w3.org/1999/xhtml">
                <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                    <title>' . htmlspecialchars($subject, ENT_QUOTES, $this->email->charset) . '</title>
                <style type="text/css">
                    body {
                        font-family: Arial, Verdana, Helvetica, sans-serif;
                        font-size: 16px;
                    }
                </style>
            </head>
            <body>
            ' . $message . '
            </body>
            </html>';

            $receiver_email = @$this->option->site_email;
            $this->email->set_newline("\r\n");
            $this->email->from(@$this->option->site_email,'Thay đổi mật khẩu'); // change it to yours
            $this->email->to($receiver_email);
            $this->email->subject($subject);
            $this->email->message($body);
            if ($this->email->send()) {
                $this->session->set_flashdata("mess", "Gửi email cập lại mật khẩu thành công!!!");
                redirect(base_url('thay-doi-mat-khau-thanh-cong?email='.$email));
            } else {
                $this->session->set_flashdata("mess_err", "Gửi email cập lại mật khẩu thất bại!!!");
                redirect($_SERVER['HTTP_REFERER']);
            }

        }
        // $seo = array(
            // 'title' => 'Thay đổi mật khẩu'
        // );
        // $data = array();
        // $this->LoadHeader(null,$seo,false);
        // $this->load->view('users/view_forgot_pass',$data);
        // $this->LoadFooter();
    }
// thya doi mat khau thanh cong
    public function success_changepass(){
        if(isset($_GET['email'])){
            $data['u']=$this->f_usersmodel->getFirstRowWhere('users',array('email'=>$_GET['email']));
        }

        $data['doitac']=$this->load->widget('doitac');

        $seo = array(
            'title' => 'Thay đổi mật khẩu thành công'
        );

        $this->LoadHeader(null,$seo);
        $this->load->view('users/success_changepass',$data);
        $this->LoadFooter();
    }
// xac nhan thay đôi mat khau tai khoan thanh vien qua email
    public function userchangepass(){
        if(isset($_GET['id'])&& isset($_GET['token'])&& isset($_GET['pass'])){
            $md5_id=$_GET['id'];

            $salt = $this->hash->key(8);
            $pass = $_GET['pass'];

            for($i=0;$i<5;$i++){
                $pass=md5($pass);
            }
            $data['u'] = $user=$this->f_usersmodel->getFirstRowWhere('users',array('md5_id'=>$md5_id));
            if($user->token==$_GET['token']){
                $this->f_usersmodel->Update_where('users',array(
                    'id'=>$user->id,
                    'lever' => 0
                ),array(
                    'password' => $pass,
                    'lastest_login' => time("Y-m-d H:i:s"),
                    'use_salt'          =>      $salt,
                ));
            }
            $data['doitac']=$this->load->widget('doitac');

            $seo = array(
                'title' => 'Thay đổi mật khẩu thành công'
            );

            $this->LoadHeader(null,$seo);
            $this->load->view('users/success_changepass',$data);
            $this->LoadFooter();

        }else
        {
            redirect(base_url());
        }
    }
  // kiem tra mat khau cu xem co dung k
 public function check_old_pass(){
        if ($this->input->post('pass')) {
            $user=$this->f_usersmodel->getFirstRowWhere('users',array('id'=>$this->session->userdata('userid')));
            $rs['check']=false;
            $rs['mss']='Mật khẩu cũ không chính xác';
            $pass=$this->input->post('pass');
            for($i=0;$i<5;$i++){
                $pass=md5($pass);
            }
            if($pass==$user->password){
                $rs['check']=true;
                $rs['mss']='';
            }

            echo json_encode($rs);
        }
    }
 #kich hoat sms
    public function sms_active_signup()
    {
        // ajax
        if (!$this->input->is_ajax_request()) {
           exit('No direct script access allowed');
        }
        $arr = array();
        if(isset($_POST['md5id'])&& isset($_POST['type'])){
            $id=$_POST['md5id'];
            $user=$this->f_usersmodel->getFirstRowWhere('users',array('md5_id'=>$id));
            if(!empty($user)){
                if($user->smskey==$_POST['key']){
                    // kiểm tra loại yêu cầu
                    $this->f_usersmodel->Update_where('users',array('id'=>$user->id),array('use_status'=>1));

                    $arr['status'] = true;
                    $arr['msg'] = 'Kích Hoạt Thành Cồng ! Bạn Có thể Đăng Nhập !';
                }else{
                    $arr['status'] = false;
                    $arr['msg'] = 'Mã SMS Không đúng';
                }
            }else{
                // tài khoản nhập key sai
                $arr['status'] = false;
                $arr['msg'] = 'Mã Tài Khoản Không đúng 1';
            }

        }else {
            // POST không hợp lệ
            $arr['status'] = false;
            $arr['msg'] = 'Không Hợp Lệ !';
        }
        echo json_encode($arr);
    }
 // check kiem tra tai khoan da dang ky chua
public function  checkRegisterUser()
    {
        if ($this->input->post('username')) {
            $arr=$this->f_usersmodel->getField_array('users','username');
            $input=array('username'=>$this->input->post('username'));
            $rs['check']=true;
            $rs['mss']='';
            if(in_array($input,$arr)){
                $rs['check']=false;
                $rs['mss']='Tên đăng nhập này đã có người sử dụng !';
            }
            echo json_encode($rs);
        }
    }

}
