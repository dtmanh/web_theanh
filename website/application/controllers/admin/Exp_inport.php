<?php
class Exp_inport extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('system_model');
        if(!$this->check->is_logined($this->session->userdata('sessionUserAdmin'), $this->session->userdata('sessionGroupAdmin')))
        {
            redirect(base_url().'techadmin', 'location');
            die();
        }
        $this->load->library('filter');
        $this->load->library('hash');
    }
     // xuat du lieu ứng viên ra file excel xlsx
    public function export_excel() {
      $check_all = $this->input->post('check_all');
     // tao thu muc up file theo ngay
      $pathFile = "upload/files/excel_oder/";
      $dir_file = date('dmY');
      if(!is_dir($pathFile.$dir_file))
      {
          @mkdir($pathFile.$dir_file);
          $this->load->helper('file');
          @write_file($pathFile.$dir_file.'/index.html', '<p>Directory access is forbidden.</p>');
      }
       // create file name
        $fileName = 'danh-sach-don-hang-'.time().'.xlsx';  
        // load excel library
        $this->load->helper('path');
        $this->load->library('excel');
        $data['empInfo']='';
        if(count($check_all)){
          foreach($check_all as $key => $id)
          {          
            $data['empInfo'][$key] = $this->system_model->getField('order','fullname,code,phone,email,time,status,id',array('id'=>$id),array('id' => 'desc')); 
          }
        }else{
          $data['empInfo'] = $this->system_model->getFields('order','fullname,code,phone,email,time,status,id',array(),array('id' => 'desc'));          
        }
        
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Stt');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Mã đơn hàng');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Tên khách');   
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Email');  
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Điện thoại');  
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Ngày đặt');  
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Trạng thai');  
       
        // set Row
        $rowCount = 2;
        $stt=0;
       foreach ($data['empInfo'] as $nameget){ $stt++;
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $stt);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $nameget->code);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $nameget->fullname);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $nameget->email);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $nameget->phone); 
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, date('d/m/Y',$nameget->time));
            if($nameget->status==0){
               $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount,'Chờ duyệt');
            }elseif($nameget->status==1){
              $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount,'Hoàn thành');
            }else{
              $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount,'Hủy');
            }
           
            
            $rowCount++;
       }
    
       $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
       header('Content-Type: application/vnd.ms-excel');
       header('Content-Disposition: attachment; filename="'.$fileName.'"');
       $objWriter->save($pathFile.$dir_file.'/'.$fileName);
       $objWriter->save('php://output');
      $this->output->clearCache(); 
      redirect($_SERVER['HTTP_REFERER']);
    }
    public function export_user_excel() {
      $check_all = $this->input->post('check_all');
     // tao thu muc up file theo ngay

      $pathFile = "upload/files/excel_user/";
      $dir_file = date('dmY');
      if(!is_dir($pathFile.$dir_file))
      {
          @mkdir($pathFile.$dir_file);
          $this->load->helper('file');
          @write_file($pathFile.$dir_file.'/index.html', '<p>Directory access is forbidden.</p>');
      }
      // create file name
        $fileName = 'Danh-sach-thanh-vien-'.time().'.xlsx';  

      // load excel library
        $this->load->helper('path');
        $this->load->library('excel');
        $data['empInfo']='';
        if(count($check_all)){
          foreach($check_all as $key => $id)
          {          
            $data['empInfo'][$key] = $this->system_model->getField('users','fullname,email,phone,ngaydang,active',array('id'=>$id,'lever ' => 0),array('id' => 'desc')); 
          }
        }else{
          $data['empInfo'] = $this->system_model->getFields('users','fullname,email,phone,ngaydang,active',array('lever ' => 0),array('id' => 'desc'));          
        }

        
        $objPHPExcel = new PHPExcel();

        $objPHPExcel->setActiveSheetIndex(0);

        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Stt');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Tên khách');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Email');   
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Điện thoại');  
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Trạng thái');  
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Ngày đăng ký');  
       
        // set Row
        $rowCount = 2;
        $stt=0;
       foreach ($data['empInfo'] as $nameget){ $stt++;
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $stt);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $nameget->fullname);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $nameget->email);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $nameget->phone);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $nameget->active); 
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $nameget->ngaydang);
            $rowCount++;
       }
    
       $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);

       header('Content-Type: application/vnd.ms-excel');
       header('Content-Disposition: attachment; filename="'.$fileName.'"');
       $objWriter->save($pathFile.$dir_file.'/'.$fileName);
       $objWriter->save('php://output');
      $this->output->clearCache(); 
      redirect($_SERVER['HTTP_REFERER']);
    }
     public function export_pro_excel() {
      $check_all = $this->input->post('check_all');
     // tao thu muc up file theo ngay
      $pathFile = "upload/files/excel_pro/";
      $dir_file = date('dmY');
      if(!is_dir($pathFile.$dir_file))
      {
          @mkdir($pathFile.$dir_file);
          $this->load->helper('file');
          @write_file($pathFile.$dir_file.'/index.html', '<p>Directory access is forbidden.</p>');
      }
    // create file name
        $fileName = 'Danh-sach-san-pham-'.time().'.xlsx';  
    // load excel library
        $this->load->helper('path');
        $this->load->library('excel');
        $data['empInfo']='';
        if(count($check_all)){
          foreach($check_all as $key => $id)
          {          
            $data['empInfo'][$key] = $this->system_model->getField('product','name,id,price,category_id,price_sale',array('lang' => $this->language,'id'=>$id),array('id' => 'desc')); 
          }
        }else{
          $data['empInfo'] = $this->system_model->getFields('product','name,id,price,category_id,price_sale',array('lang' => $this->language),array('id' => 'desc'));          
        }
        
        foreach ($data['empInfo'] as $k => $v){
            $data['empInfo'][$k]->cat_name_pro = $this->system_model->getField('product_category',
                array('name'),array('id' => @$v->category_id));
           
        }

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Stt');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Tên sản phẩm');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Danh mục');   
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Giá cũ');  
         $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Giá mới');  
        // set Row
        $rowCount = 2;
        $stt=0;
       foreach ($data['empInfo'] as $nameget){ $stt++;
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $stt);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $nameget->name);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount,$nameget->cat_name_pro->name);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $nameget->price);
             $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $nameget->price_sale);
            $rowCount++;
       }
    
       @$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
       header('Content-Type: application/vnd.ms-excel');
       header('Content-Disposition: attachment; filename="'.$fileName.'"');
       $objWriter->save($pathFile.$dir_file.'/'.$fileName);
       $objWriter->save('php://output');
      $this->output->clearCache(); 
      redirect($_SERVER['HTTP_REFERER']);
    }
     // xuat du lieu nhà tuyen dung ra file excel xlsx
    public function export_excel_city() {
      $check_all = $this->input->post('check_all');
     // tao thu muc up file theo ngay
      $pathFile = "upload/files/excel_company/";
      $dir_file = date('dmY');
      if(!is_dir($pathFile.$dir_file))
      {
          @mkdir($pathFile.$dir_file);
          $this->load->helper('file');
          @write_file($pathFile.$dir_file.'/index.html', '<p>Directory access is forbidden.</p>');
      }
    // create file name
        $fileName = 'Danh-sach-nha-tuyen-dung-'.time().'.xlsx';  
    // load excel library
        $this->load->helper('path');
        $this->load->library('excel');
        $data['empInfo']='';

        if(count($check_all)){
          foreach($check_all as $key => $id)
          {          
            $data['empInfo'][$key] = $this->system_model->getField('users_city','fullname,name_contact,home,email_contact,phone_contact,use_regisdate,signup_date,link_hoso,id',array('id'=>$id),array('id' => 'desc')); 
          }
        }else{
          $data['empInfo'] = $this->system_model->getFields('users_city','fullname,name_contact,home,email_contact,phone_contact,use_regisdate,signup_date,link_hoso,id',array(),array('id' => 'desc'));          
        }
        foreach($data['empInfo'] as $key=>$v){
            $data['empInfo'][$key]->ketthuc = explode("-",$v->signup_date);
        }
      
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Stt');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Tên người liên hệ');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Email');   
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Điện thoại');  
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Tên công ty');  
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Ngày đăng ký');  
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Ngày hết hạn');   
        // set Row
        $rowCount = 2;
        $stt=0;
       foreach ($data['empInfo'] as $nameget){ $stt++;
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $stt);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $nameget->name_contact);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $nameget->email_contact);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $nameget->phone_contact);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $nameget->fullname); 
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $nameget->ketthuc[0]);
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $nameget->ketthuc[1]);
            $rowCount++;
       }
    
       $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
       header('Content-Type: application/vnd.ms-excel');
       header('Content-Disposition: attachment; filename="'.$fileName.'"');
       $objWriter->save($pathFile.$dir_file.'/'.$fileName);
       $objWriter->save('php://output');
      $this->output->clearCache(); 
      redirect($_SERVER['HTTP_REFERER']);
    }
}