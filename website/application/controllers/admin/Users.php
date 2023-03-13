<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MY_Controller
{
    public function __construct() {
        parent::__construct();
		$this->load->model('usersmodel');
        $this->load->library('pagination');
		 if(!$this->check->is_logined($this->session->userdata('sessionUserAdmin'), $this->session->userdata('sessionGroupAdmin')))
        {
            redirect(base_url().'techadmin', 'location');
			show_error('Bạn không có quyền truy cập vào chức năng này !!!');
            die();
        }
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
	public function index(){	
        $data = array();	 
        $title = "Thành viên";
        $this->LoadHeaderAdmin(false,$title);
        $this->load->view('admin/users/infomation_user', $data);
        $this->load->view('admin/footer');
	}
    public function listusers(){
		$this->check_acl();
		if($this->input->get()){
            $where = array(
                'phone' => $this->input->get('phone')?$this->input->get('phone'):'',
                'name' => $this->input->get('fullname'),
                'email' => $this->input->get('email'),
                'view' => $this->input->get('view'),
				'lever ' => 0
            );
            $config['page_query_string']    = TRUE;
            $config['enable_query_strings'] = TRUE;
            $config['base_url']             = base_url('techadmin/users/listusers?phone='
                . $this->input->get('phone')
                . '&name=' . $this->input->get('fullname')
                . '&email=' . $this->input->get('email')
				. '&view=' . $this->input->get('view')
            );
            $config['total_rows']           = $this->usersmodel->count_listuser($where);
            $config['per_page']             = 20;
            $config['uri_segment'] = 4;
            $config=array_merge($config,$this->pagination_config);
            $this->pagination->initialize($config);
            $data['list'] = $this->usersmodel->getListuser($where, $config['per_page'], $this->input->get('per_page'));
		}else{
			$where = array(
			'lever ' => 0
			);
            $config['base_url'] = base_url('techadmin/users/listusers');
            $config['total_rows'] = $this->usersmodel->count_All('users'); // xác định tổng số record
            $config['per_page'] =20; // xác định số record ở mỗi trang
            $config['uri_segment'] = 4; // xác định segment chứa page number
            $config=array_merge($config,$this->pagination_config);
            $this->pagination->initialize($config);
            $data['list'] = $this->usersmodel->get_data('users',$where,array('id' => 'desc'), $config['per_page'],
                $this->uri->segment(4));
        }
		$data['users_all'] = $this->usersmodel->get_data('users',array(),array('id' => 'desc'));
		$auto_fullname = '';
		$auto_email = '';
		$auto_phone = '';
        foreach ($data['users_all'] as $nameget) {
            $subname = $nameget->fullname;
            $subemail = $nameget->email;
            $subphone = $nameget->phone;
            if ($auto_email == null) {
                $auto_email = $subemail;
            } else {
                $auto_email = $auto_email . "," . $subemail;
            }
			if ($auto_fullname == null) {
                $auto_fullname = $subname;
            } else {
                $auto_fullname = $auto_fullname . "," . $subname;
            }
			if ($auto_phone == null) {
                $auto_phone = $subphone;
            } else {
                $auto_phone = $auto_phone . "," . $subphone;
            }
        }
        $data['auto_phone'] = $auto_phone;
        $data['auto_email'] = $auto_email;
        $data['auto_fullname'] = $auto_fullname;
        
         $title = "Thành viên";
            $this->LoadHeaderAdmin(false,$title);
        $this->load->view('admin/users/list', $data);
        $this->load->view('admin/footer');
    }
	 //Xóa nhieu ban ghi
    public function deletes()
    {
        if($this->input->post('checkone') && is_array($this->input->post('checkone')) && count($this->input->post('checkone')) > 0)
        {
            $ids = $this->input->post('checkone');
            foreach($ids as $id)
            {
                $this->delete_users_once($id);
            }
        }
		$this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function delete_users_once($id){
		$this->check_acl();
        if (is_numeric($id)) {
			$this->usersmodel->Delete_where('users',array('id' => $id));
        } else return false;
    }
	// xoa 1 ban ghi
	public function delete($id)
    {
		$this->delete_users_once($id);
		$this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }

//============ hiện thị thong tin thanh vien ========================
	public function popupdata()
    {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $id   = $_GET['id'];
            $data['detail'] = $item = $this->usersmodel->getFirstRowWhere('users', array('id' => $id));
			$data['id']='id';
			$this->load->view('admin/modal/view_detail_users',$data);
          //json_encode($rs);
        }
    }
//======= danh sach tài khoản admin =============================================================
public function listuser_admin(){
		if($this->input->get()){
			if($this->session->userdata('adminfull')->lever ==3){
            $where = array(
                'phone' => $this->input->get('phone')?$this->input->get('phone'):'',
                'name' => $this->input->get('fullname'),
                'email' => $this->input->get('email'),
                'view' => $this->input->get('view'),
				'lever =' => 1
            );
			}else{
				$where = array(
					'phone' => $this->input->get('phone')?$this->input->get('phone'):'',
					'name' => $this->input->get('fullname'),
					'email' => $this->input->get('email'),
					'view' => $this->input->get('view'),
					'lever >=' => 1
				);
			}
            $config['page_query_string']    = TRUE;
            $config['enable_query_strings'] = TRUE;
            $config['base_url']             = base_url('techadmin/users/listuser_admin?phone='
                . $this->input->get('phone')
                . '&name=' . $this->input->get('fullname')
                . '&email=' . $this->input->get('email')
				. '&view=' . $this->input->get('view')
            );
            $config['total_rows']           = $this->usersmodel->count_listuser($where);
            $config['per_page']             = 20;
            $config['uri_segment'] = 4;
            $config=array_merge($config,$this->pagination_config);
            $this->pagination->initialize($config);
            $data['list'] = $this->usersmodel->getListuser($where, $config['per_page'], $this->input->get('per_page'));
		}else{			
			if($this->session->userdata('adminfull')->lever ==3){
				$where = array(
					'lever >=' => 1
				);
			}else{
				$where = array(
				'lever =' => 1
				);
			}			
            $config['base_url'] = base_url('techadmin/users/listuser_admin');
            $config['total_rows'] = $this->usersmodel->count_All('users'); // xác định tổng số record
            $config['per_page'] =20; // xác định số record ở mỗi trang
            $config['uri_segment'] = 4; // xác định segment chứa page number
            $config=array_merge($config,$this->pagination_config);
            $this->pagination->initialize($config);
            $data['list'] = $this->usersmodel->getFields('users','id,fullname,email,phone,active,use_regisdate,lastest_login,sort',$where,array('sort' => 'asc'), $config['per_page'],
                $this->uri->segment(4));
        }

		$data['users_all'] = $this->usersmodel->get_data('users',array(),array('id' => 'desc'));
		$auto_fullname = '';
		$auto_email = '';
		$auto_phone = '';
        foreach ($data['users_all'] as $nameget) {
            $subname = $nameget->fullname;
            $subemail = $nameget->email;
            $subphone = $nameget->phone;
            if ($auto_email == null) {
                $auto_email = $subemail;
            } else {
                $auto_email = $auto_email . "," . $subemail;
            }
			if ($auto_fullname == null) {
                $auto_fullname = $subname;
            } else {
                $auto_fullname = $auto_fullname . "," . $subname;
            }
			if ($auto_phone == null) {
                $auto_phone = $subphone;
            } else {
                $auto_phone = $auto_phone . "," . $subphone;
            }
        }
        $data['auto_phone'] = $auto_phone;
        $data['auto_email'] = $auto_email;
        $data['auto_fullname'] = $auto_fullname;
       
         $title = "Thành viên";
            $this->LoadHeaderAdmin(false,$title);
        $this->load->view('admin/users/list_user_admin', $data);
        $this->load->view('admin/footer');
    }

// them thanh vien quan trị  ===============================
	  public function add_users($id_edit = null)
    {
		$this->check_acl();
		$this->load->library('filter');
        $this->load->library('hash');
        $data = array();
        $data['btn_name']='Them moi';
        if($id_edit!=null){
            $data['edit']=$this->usersmodel->getFirstRowWhere('users',array('id'=>$id_edit));
            $data['btn_name']='Cập nhật';
//            $data['max_sort']=$data['edit']->sort;
        }
        if(isset($_POST['adduser']))
        {
            $salt = $this->hash->key(8);
            if($this->input->post('active_user') == '1')
            {
                $active_user = 1;
            }
            else
            {
                $active_user = 0;
            }
            $regisdate = mktime(0, 0, 0, date('m'), date('d'), date('Y'));

            $dataAdd = array(
                'username'      =>      trim(strtolower($this->filter->injection_html($this->input->post('username_user')))),
                'use_salt'          =>      $salt,
                'email'         =>      trim(strtolower($this->filter->injection_html($this->input->post('email_user')))),
                'fullname'      =>      trim($this->filter->injection_html($this->input->post('fullname_user'))),
                'sex'           =>      (int)$this->input->post('sex_user'),
                'active'        =>      $active_user,
                'lever'        =>      1,
                'use_regisdate'     =>      $regisdate,
                'use_enddate'       =>      $regisdate,
                'use_key'           =>      $this->hash->create($this->input->post('username_user'), $this->input->post('username_user'), 'sha256md5'),
                'lastest_login' =>      $regisdate,
                'phone'         => $this->input->post('phone'),
            );
            $pass = $this->input->post('password_user');
            $repass = $this->input->post('repassword_user');
            if(!empty($_POST['edit'])){
                if(!empty($pass) && ($pass == $repass)){
                   for ($i=0; $i < 5; $i++) {
                        $pass = md5($pass);
                    }
                    $dataAdd['password'] = $pass;
                }
                $id = $this->usersmodel->Update_where('users',array('id'=>$id_edit),$dataAdd);
				$this->session->set_flashdata("mess", "Cập nhật thành công!");
            }else{
                //add user
                $this->input->post('password_user');
                for ($i=0; $i < 5; $i++) {
                $pass = md5($pass);
                }
                $dataAdd['password'] = $pass;
                $id=$this->usersmodel->Add('users',$dataAdd);
				$this->session->set_flashdata("mess", "Thêm thành công!");
            }
            $this->usersmodel->Update_Where('users', array('id' => $id),
                    array('md5_id' => md5($id), 'token' => md5($this->input->post('email_user') . $id),));

            redirect(base_url('techadmin/users/listuser_admin'));
        }
       
         $title = "Thêm thành viên";
        $this->LoadHeaderAdmin(false,$title);
        $this->load->view('admin/users/user_add', $data);
        $this->load->view('admin/footer');
    }
  public function import_excel($id_edit = null)
    {
        if(isset($_POST['importSubmit'])){
        //validate whether uploaded file is a csv file
            $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
            if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes)){
                if(is_uploaded_file($_FILES['file']['tmp_name'])){
                    
                    //open uploaded csv file with read only mode
                    $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
                    
                    //skip first line
                    fgetcsv($csvFile);
                   
                   // parse data from csv file line by line
                    while(($line = fgetcsv($csvFile)) !== FALSE){
                        //check whether member already exists in database with same email
                        $prevQuery = "SELECT id FROM users WHERE email = '".$line[1]."'";
                        $prevResult = $this->db->query($prevQuery);
                         if($prevResult->num_rows > 0){
                            //update member data
                            $this->db->query("UPDATE users SET fullname = '".$line[0]."', phone = '".$line[2]."', username = 'taikhoan' WHERE email = '".$line[1]."'");
                            }else{
                                //insert member data into database
                                $this->db->query("INSERT INTO users (fullname, email, phone, username) VALUES ('".$line[0]."','".$line[1]."','".$line[2]."','taikhoan')");
                            }
                    }
                    
                    //close opened csv file
                    fclose($csvFile);

                    $qstring = '?status=succ';
                }else{
                    $qstring = '?status=err';
                }
            }else{
                $qstring = '?status=invalid_file';
            }
           redirect($_SERVER['HTTP_REFERER']); 
        }
    }
    public function save() {
        $this->load->model('import_model');
        $this->load->library('excel');
        $this->load->library('upload');
        if ($this->input->post('importfile')) 
        {
            $path = 'upload/files/';
            $dir_file = date('dmY');
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'xlsx|xls|csv';
            $config['max_size']  = '2048';
            $config['overwrite'] = true;
            $config['remove_spaces'] = TRUE;
            $this->upload->initialize($config);
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('userfile')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $data = array('upload_data' => $this->upload->data());
            }
            
            if (!empty($data['upload_data']['file_name'])) {
                $import_xls_file = $data['upload_data']['file_name'];
            } else {
                $import_xls_file = 0;
            }

            $inputFileName = $path . $import_xls_file;
           
            try {
                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch (Exception $e) {
                die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
                        . '": ' . $e->getMessage());
            }
            $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
           
            $arrayCount = count($allDataInSheet);
            $flag = 0;
            $createArray = array('Tên khách', 'Email', 'Số điện thoại', 'Trạng thái','Ngày đăng ký');
            $makeArray = array('Tên khách' => 'Tên Khách', 'Email' => 'Email', 'Số điện thoại' => 'Số điện thoại', 'Trạng thái' => 'Trạng thái','Ngày đăng ký' => 'Ngày đăng ký');
            $SheetDataKey = array();
            foreach ($allDataInSheet as $dataInSheet) {
                foreach ($dataInSheet as $key => $value) {
                    if (in_array(trim($value), $createArray)) {
                       // $value = preg_replace('/\s+/', '', $value);
                        $SheetDataKey[trim($value)] = $key;
                    } else {
                        
                    }
                }
            }
            
            $data = array_diff_key($makeArray, $SheetDataKey);
            
            if (empty($data)) {
                $flag = 1;
            }
            $dem_daco=0;
            $dem_moi=0; 
            if ($flag == 1) {
                for ($i = 3; $i <= $arrayCount; $i++) {    
                    $name = $SheetDataKey['Tên khách'];
                    $email = $SheetDataKey['Email'];
                    $phone = $SheetDataKey['Số điện thoại'];
                    $trangthai = $SheetDataKey['Trạng thái'];
                    $ngaydangky = $SheetDataKey['Ngày đăng ký'];

                    $name = filter_var(trim($allDataInSheet[$i][$name]), FILTER_SANITIZE_STRING);
                    $email = filter_var(trim($allDataInSheet[$i][$email]), FILTER_SANITIZE_EMAIL);
                    $phone = filter_var(trim($allDataInSheet[$i][$phone]), FILTER_SANITIZE_STRING);
                    $trangthai = filter_var(trim($allDataInSheet[$i][$trangthai]), FILTER_SANITIZE_STRING);
                    $ngaydangky = filter_var(trim($allDataInSheet[$i][$ngaydangky]), FILTER_SANITIZE_STRING);

                    $prevQuery = $this->system_model->getField('users','id',array(
                        'email' => $email
                        ),array('sort' => 'desc'));
                   
                    if(count($prevQuery)){
                        //CAP NHAT DU LIEU    
                        $array_update = array('fullname' => $name, 'phone' => $phone, 'active' => '0', 'ngaydang' => $ngaydangky);
                         $this->system_model->Update_where('users', array('email'=>$email,'id'=>@$prevQuery->id), $array_update);
                         $dem_daco++;
                    }else{
                        //them DU LIEU 
                        $array_add = array('fullname' => $name, 'phone' => $phone, 'email' => $email,  'active' => '0', 'ngaydang' => $ngaydangky);
                         $this->system_model->Add('users', $array_add);  
                          $dem_moi++;
                    }                    
                }
              //echo'so luong da có:';  var_dump($dem_daco);echo'<pre> so luong mới'; var_dump($dem_moi);die;
            } else {
                echo "Please import correct file";
            }
        }
       // $this->load->view('admin/users/display', $data);
        $this->session->set_flashdata("mess", "Thêm mới thành công!"); 
        redirect($_SERVER['HTTP_REFERER']); 
    }

}