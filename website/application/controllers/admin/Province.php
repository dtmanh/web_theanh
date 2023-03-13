<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Province extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
		$this->load->library('pagination');
        if(!$this->check->is_logined($this->session->userdata('sessionUserAdmin'), $this->session->userdata('sessionGroupAdmin')))
        {
            redirect(base_url().'techadmin', 'location');
            die();
        }
       // $this->load->model('system_model');
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
    public function listProvince()
    {
		$this->check_acl();
		$data['list'] = $this->system_model->getFields('province','id,name',array(
        ),array('sort' => 'desc'));
        
         $title = "Quản lý phí vận chuyển ship";
            $this->LoadHeaderAdmin(false,$title);
        $this->load->view('admin/province/list', $data);
        $this->load->view('admin/footer');
    }
/*********** Phường xã ************************************************************/
public function listWard()
    {
		$this->check_acl();
		if($this->input->get()){
			if($this->input->get('cate') !=''){
               $where = array(
                'ward.districtid' => $this->input->get('cate')
                ); 
            }           
            $like = array(
                'ward.name' => $this->input->get('name'),
            );
            $config['page_query_string']    = TRUE;
            $config['enable_query_strings'] = TRUE;
            $config['base_url']             = base_url('techadmin/province/listWard?name='
                . $this->input->get('name')
                . '&cate=' . $this->input->get('cate')
            );
            $config['total_rows']           = $this->system_model->Count_where_like('ward',@$where,@$like);
            $config['per_page']             = 20;
            $config['uri_segment'] = 4;
            $config=array_merge($config,$this->pagination_config);
            $this->pagination->initialize($config);

            $data['list'] = $this->system_model-get_field_like('ward','name,id,districtid',@$where,@$like,array('id'=>'desc'),false, $config['per_page'], $this->input->get('per_page'));
		}else{
			$config['page_query_string']    = TRUE;
			$config['enable_query_strings'] = TRUE;
			$config['base_url']             = base_url('techadmin/province/listWard?');
			$config['total_rows']           = $this->system_model->Count('ward');
			$config['per_page']             = 20;
			$config['uri_segment'] = 4;
			$config=array_merge($config,$this->pagination_config);
			$this->pagination->initialize($config);
			$data['list'] = $this->system_model->getFields('ward','id,name,districtid',array(
			),array(),false,$config['per_page'], $this->input->get('per_page') );
		}

		$auto_name = '';
		foreach ($data['list'] as $key => $cat) {
			$data['list'][$key]->cat_name = $this->system_model->getField('district',
				array('name'),
				array(
				'id' => $cat->districtid,
				));
			$subname = $cat->name;
			if ($auto_name == null) {
                $auto_name = $subname;
            } else {
                $auto_name = $auto_name . "," . $subname;
            }
		}
		$data['auto_name'] = $auto_name;
		$data['district'] = $this->system_model->get_data('district');
        
         $title = "Quản lý phường xã";
            $this->LoadHeaderAdmin(false,$title);
        $this->load->view('admin/province/listward', $data);
        $this->load->view('admin/footer');
    }
/*********** Quận huyện ************************************************************/
public function listDistric()
    {
		$this->check_acl();
		if($this->input->get()){
            if($this->input->get('cate') !=''){
               $where = array(
                'district.provinceid' => $this->input->get('cate')
                ); 
            }			
            $like = array(
                'district.name' => $this->input->get('name'),
            );
            $config['page_query_string']    = TRUE;
            $config['enable_query_strings'] = TRUE;
            $config['base_url']             = base_url('techadmin/province/listDistric?name='
                . $this->input->get('name')
                . '&cate=' . $this->input->get('cate')
            );
            $config['total_rows']           = $this->system_model->Count_where_like('district',@$where,@$like);
            $config['per_page']             = 20;
            $config['uri_segment'] = 4;
            $config=array_merge($config,$this->pagination_config);
            $this->pagination->initialize($config);
            $data['list'] = $this->system_model->get_field_like('district','name,id,provinceid',@$where,@$like,array('id'=>'desc'),false, $config['per_page'], $this->input->get('per_page'));
		}else{

		$config['page_query_string']    = TRUE;
		$config['enable_query_strings'] = TRUE;
		$config['base_url']             = base_url('techadmin/province/listDistric?');
		$config['total_rows']           = $this->system_model->Count('district');
		$config['per_page']             = 20;
		$config['uri_segment'] = 4;
		$config=array_merge($config,$this->pagination_config);
		$this->pagination->initialize($config);
		$data['list'] = $this->system_model->getFields('district','name,id,provinceid',array(
		),array(),false,$config['per_page'], $this->input->get('per_page') );
		}
		$auto_name = '';
		foreach ($data['list'] as $key => $cat) {
			$data['list'][$key]->cat_name = $this->system_model->getField('province','name,id',array('id' => $cat->provinceid));
			$subname = $cat->name;
			if ($auto_name == null) {
                $auto_name = $subname;
            } else {
                $auto_name = $auto_name . "," . $subname;
            }
		}
		$data['auto_name'] = $auto_name;
		$data['city'] = $this->system_model->getFields('province','id,name');
       
         $title = "Quản lý quận huyện";
            $this->LoadHeaderAdmin(false,$title);
        $this->load->view('admin/province/listdistrict', $data);
        $this->load->view('admin/footer');
    }
/*********** Đường phố ************************************************************/
// public function listStreet()
//     {
// 		$this->check_acl();
		
//          $title = "Quản lý đường phố";
//             $this->LoadHeaderAdmin(false,$title);
//         $this->load->view('admin/province/listdistrict', $data);
//         $this->load->view('admin/footer');
// 	}

}