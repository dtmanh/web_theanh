<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Contact extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
    }
    //index
    public function index(){
        $data=array();
        if(isset($_POST['sendcontact'])){
            $arr=array('full_name' => $this->input->post('full_name'),
                'phone' => $this->input->post('phone'),
                'title' => $this->input->post('title'),
                'email' => $this->input->post('email'),
                'address' => $this->input->post('address'),
                'city' => $this->input->post('city'),
                'country' => $this->input->post('country'),
                'comment' => $this->input->post('comment'),
                'time' => time(),
            );
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
            $subject = 'Thông tin liên hệ ';
            $message = '<p>Thông tin của khách hàng liên hệ như sau:</p>';
            $message .='<p>Họ và tên :'.$this->input->post('full_name').'<p>';
            $message .='<p>Số điện thoại :'.$this->input->post('phone').'<p>';
            $message .='<p>Email:'.$this->input->post('email').'<p>';
            $message .='<p>Địa chỉ :'.$this->input->post('address').'<p>';
            $message .='<p>nội dung :'.$this->input->post('comment').'<p>';
            // Get full html:
            $body =
                '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html xmlns="http://www.w3.org/1999/xhtml">
                <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                    <title>' . htmlspecialchars($subject, ENT_QUOTES, $this->option->site_name) . '</title>
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

            $this->email->set_newline("\r\n");
            $this->email->from($this->input->post('email'),$this->option->site_name); // change it to yours
            $this->email->to($this->input->post('email').','.$this->option->site_email); // change it to yours
            $this->email->subject($subject);
            $this->email->message($body);
            $this->email->send();
            $id=$this->system_model->Add('contact',$arr);

            if($id){
                $this->session->set_flashdata("mess", "Bạn đã gửi thông tin liên hệ thành công!");
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
        $data['map']=$this->system_model->getFields('map_shopping','id,title,toa_domap,diachi_shop,phone',array());
        //var_dump($data['map']->toa_domap[0]);die;
        $a=$this->option->hdfMap;
             $map= str_replace(array(')','(',' '),'',$a);
            $data['loca_map']=explode(",",$map);
         
         
        foreach ($data['map'] as $key => $value) {
               $data['map'][$key]->map_t = str_replace(array(')','(',' '),'',$value->toa_domap);
            $data['map'][$key]->maps= explode(",",$data['map'][$key]->map_t);
        }

         
        $seo = array(
            'title' => 'Liên Hệ'
        );	 
        $this->LoadHeader(null,$seo,false);
        $this->load->view('contact/contact',$data);
        $this->LoadFooter();
    }
     // dang ky  mail tran manh
    public  function add_email(){
        if(isset($_POST['email'])){
            $arr=array(
               // 'name' => $_POST['name'],
                'email' => $_POST['email'],
                // 'phone' => $_POST['phone'],
                'time' => time()
            );
            $item = $this->system_model->getField('emails','id,email',array('email',$_POST['email']));
            if(!empty($item)){
                $this->system_model->Update_where('emails',array('if',$item->id),$arr);
            }
            else{
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

            $subject = 'Thông tin đăng ký email ';
            
            $message .='<p>Email:'.$_POST['email'].'<p>';
            
            // Get full html:
            $body =
                '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html xmlns="http://www.w3.org/1999/xhtml">
                <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                    <title>' . htmlspecialchars($subject, ENT_QUOTES, $this->option->site_name) . '</title>
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

            $this->email->set_newline("\r\n");
            $this->email->from( $this->option->site_name); // change it to yours
            $this->email->to($this->option->site_email); // change it to yours
            $this->email->subject($subject);
            $this->email->message($body);
            $this->email->send();
                $this->system_model->Add('emails',$arr);
            }
            $this->session->set_flashdata("mess", "Bạn đăng ký thành công!");
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function dang_ky(){
        $data=array();
        if(isset($_POST['dang-ky'])){
            $arr=array('full_name' => $this->input->post('full_name'),
                'phone' => $this->input->post('phone'),
                //'title' => $this->input->post('title'),
                'email' => $this->input->post('email'),
                'address' => $this->input->post('address'),
                'cat_name' => $this->input->post('cat_name'),
                'comment' => $this->input->post('comment'),
                'time' => time(),
            );
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
            $subject = 'Thông tin liên hệ ';
            $message = '<p>Thông tin của khách hàng liên hệ như sau:</p>';
            $message .='<p>Họ và tên :'.$this->input->post('full_name').'<p>';
            $message .='<p>Số điện thoại :'.$this->input->post('phone').'<p>';
            $message .='<p>Email:'.$this->input->post('email').'<p>';
            $message .='<p>Địa chỉ :'.$this->input->post('address').'<p>';
            $message .='<p>nội dung :'.$this->input->post('comment').'<p>';
            // Get full html:
            $body =
                '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html xmlns="http://www.w3.org/1999/xhtml">
                <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                    <title>' . htmlspecialchars($subject, ENT_QUOTES, $this->option->site_name) . '</title>
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

            $this->email->set_newline("\r\n");
            $this->email->from($this->input->post('email'),$this->option->site_name); // change it to yours
            $this->email->to($this->input->post('email').','.$this->option->site_email); // change it to yours
            $this->email->subject($subject);
            $this->email->message($body);
            $this->email->send();
            $id=$this->system_model->Add('contact',$arr);

            if($id){
                $this->session->set_flashdata("mess", "Bạn đã gửi thông tin liên hệ thành công!");
            }
            $this->session->set_flashdata("message", array('msg'=>'Bạn đã gửi thông tin liên hệ thành công!','type'=>'success'));
            redirect(base_url());
        }
        $data['map']=$this->system_model->getFields('map_shopping','id,title,toa_domap,diachi_shop,phone',array());
        //var_dump($data['map']->toa_domap[0]);die;
        $a=$this->option->hdfMap;
             $map= str_replace(array(')','(',' '),'',$a);
            $data['loca_map']=explode(",",$map);
         
         
        foreach ($data['map'] as $key => $value) {
               $data['map'][$key]->map_t = str_replace(array(')','(',' '),'',$value->toa_domap);
            $data['map'][$key]->maps= explode(",",$data['map'][$key]->map_t);
        }

         
        $seo = array(
            'title' => 'Liên Hệ'
        );   
        $this->LoadHeader(null,$seo,false);
        $this->load->view('contact/contact',$data);
        $this->LoadFooter();
    }

   // dat cau hoi dap
    public function  sendQuestion(){

        if($data = $this->input->post()){
            $data['time'] = time();
            $id=$this->system_model->Add('contact',$data);
            if($id){
                $this->session->set_flashdata('message',
                    array(
                        'msg'=> 'Bạn đăng ký thành công!!',
                        'type'=> 'success',
                    )

                );
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
}
