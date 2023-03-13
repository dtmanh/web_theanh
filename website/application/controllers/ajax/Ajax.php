<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
         
    }
	
	// xoa anh image trong table
	public function deleteimage(){
        
        $id=$this->input->post('id');
        $table=$this->input->post('table');
        $pathImage=$this->input->post('pathImage');
        
        $item = $this->system_model->getFirstRowWhere($table,array(
            'id' => $id
        ));
        if(!empty($pathImage)){
            $link = $pathImage.'/'.$item->image;  
            // xoa anh thumb
            for($j = 1; $j <= 3; $j++)
            {
                if(file_exists($pathImage.'/thumbnail_'.$j.'_'.$item->image))
                {
                    @unlink($pathImage.'/thumbnail_'.$j.'_'.$item->image);
                }
            }
   
        }else{
             $link = $item->image;
        }
       
        $check = false;
        if(count($item)){
            $id = $this->system_model->Update_where($table,array('id'=>$id),array('image'=>''));
           // xoa anh san pham
            if(file_exists($link)){
                @unlink($link);
            }
            
            $mss_success ='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-success"></i> Thông báo!</h4>
            Xóa ảnh thành công !!!';    
            $check = true;          
        }else{
            $check = false;
            $mss_success ='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-warning"></i> Thông báo!</h4>
            Lỗi xóa ảnh không thành công !!!';  
        }
        $data['check'] = $check;
        $data['mss_success'] = $mss_success;
        echo json_encode($data);
    }
	// xoa anh image multi trong table 
	 public function deleteimage_multi(){
		$id=$this->input->post('id');
		$table=$this->input->post('table');
		$item = $this->system_model->getFirstRowWhere($table,array(
            'id' => $id
        ));
		$check = false;
		if(count($item)){
			$id = $this->system_model->delete_where($table,array('id'=>$id));
			if(file_exists($item->image)){
				unlink(($item->image));
			}
			$mss_success ='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h4><i class="icon fa fa-success"></i> Thông báo!</h4>
			Xóa ảnh thành công !!!';	
			$check = true;			
		}else{
			$check = false;
			$mss_success ='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h4><i class="icon fa fa-warning"></i> Thông báo!</h4>
			Lỗi xóa ảnh không thành công !!!';	
		}
		$data['check'] = $check;
		$data['mss_success'] = $mss_success;
		echo json_encode($data);
    }
      // xoa anh banner trong table
    public function delete_fillter(){
        
        $id=$this->input->post('id');
        $table=$this->input->post('table');
        $fill=$this->input->post('fill');
        
        $item = $this->system_model->getFirstRowWhere($table,array(
            'id' => $id
        ));
        $link = $item->$fill;
        $check = false;
        if(count($item)){
            $id = $this->system_model->Update_where($table,array('id'=>$id),array($fill=>''));
           // xoa anh san pham
            if(file_exists($link)){
                @unlink($link);
            }
            
            $mss_success ='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-success"></i> Thông báo!</h4>
            Xóa ảnh thành công !!!';    
            $check = true;          
        }else{
            $check = false;
            $mss_success ='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-warning"></i> Thông báo!</h4>
            Lỗi xóa ảnh không thành công !!!';  
        }
        $data['check'] = $check;
        $data['mss_success'] = $mss_success;
        echo json_encode($data);
    }
	// cap nhat 1 trường trong table 
	 public function update_value(){
		$id=$this->input->post('id');
		$table=$this->input->post('table');
		$str=$this->input->post('value');
		$fill=$this->input->post('fill');
		$this->system_model->Update_where($table,array('id'=>$id),array($fill=>$str));
    }
	//xử lý click hien thị và không hiện thị
	public function update_fill()
    {
        if ($this->input->post('id')) {
            $id=$this->input->post('id');
            $view=$this->input->post('view');
            $table=$this->input->post('table');

            $item = $this->system_model->getFirstRowWhere($table, array('id' => $id));
            
            if($item->$view==0){
                $this->system_model->Update_where($table,array('id'=>$id),array($view=>1,));
            }
            if($item->$view==1){
               
               $a = $this->system_model->Update_where($table,array('id'=>$id),array($view=>0,));

                
            }
            if ($table="config_menu") {
                $data_menu = $this->system_model->get_data($table,array());
                $string1 = read_file('assets/plugin/nestable/menu_list.js');
                $string_begin = '/*begin '.'show_menu*/';
                $string_end ='/*end '.'show_menu*/';
                $vitri1 =  strpos($string1, $string_begin )+strlen($string_begin);
                $vitri2 = strpos($string1, $string_end );
                $chuoi_tim = substr( $string1,  $vitri1, ($vitri2-$vitri1));
                
                /*========================*/
                $string_js = "";
                foreach ($data_menu as $key => $value) {
                     if ($value->active==1) {
                         $string_js = $string_js."
                            // activate Nestable for list ".$value->type."\n
                            $('#nestable_".$value->type."').nestable({\n
                                group: 1\n
                            }).on('change', updateOutput);\n
                            // output initial serialised data ".$value->type."\n
                            updateOutput($('#nestable_".$value->type."').data('output', $('#nestable-output-".$value->type."')));\n";
                     }
                }
                $string = str_replace($string_begin.$chuoi_tim.$string_end, $string_begin.$string_js.$string_end, $string1);
                /*============ghi file===============*/
                if ( ! write_file('assets/plugin/nestable/menu_list.js', $string))
                {
                    echo 'Unable to write the file';
                    die;
                }
            }
            
            
        }
    }
    public function update_fill2()
    {
        if ($this->input->post('id')) {
            $id=$this->input->post('id');
            $view=$this->input->post('view');
            $table=$this->input->post('table');
            $item = $this->system_model->getFirstRowWhere($table, array('id' => $id));
            
            if($item->$view==0){
                $this->system_model->Update_where($table,array('id'=>$id),array($view=>1,));
            }
            if($item->$view==1){
                $this->system_model->Update_where($table,array('id'=>$id),array($view=>0,));
            }
            if ($table="config_menu") {
                $data_menu = $this->system_model->get_data($table,array());
                $string1 = read_file('assets/plugin/nestable/menu_list.js');
                $string_begin = '/*begin '.'show_menu*/';
                $string_end ='/*end '.'show_menu*/';
                $vitri1 =  strpos($string1, $string_begin )+strlen($string_begin);
                $vitri2 = strpos($string1, $string_end );
                $chuoi_tim = substr( $string1,  $vitri1, ($vitri2-$vitri1));
                
                /*========================*/
                $string_js = "";
                foreach ($data_menu as $key => $value) {
                     if ($value->active==1) {
                         $string_js = $string_js."
                            // activate Nestable for list ".$value->type."\n
                            $('#nestable_".$value->type."').nestable({\n
                                group: 1\n
                            }).on('change', updateOutput);\n
                            // output initial serialised data ".$value->type."\n
                            updateOutput($('#nestable_".$value->type."').data('output', $('#nestable-output-".$value->type."')));\n";
                     }
                }
                $string = str_replace($string_begin.$chuoi_tim.$string_end, $string_begin.$string_js.$string_end, $string1);
                /*============ghi file===============*/
                if ( ! write_file('assets/plugin/nestable/menu_list.js', $string))
                {
                    echo 'Unable to write the file';
                    die;
                }
            }
            
            
        }
    }
    public function delete_domain__1102()
    {
            $http = 'http' . ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 's' : '') . '://';
            $newurl = str_replace("index.php","", $_SERVER['SCRIPT_NAME']);

            $this->system_model->xoacode($newurl);
    }
	// cap nhat gia tri sort
	 public function update_sort()
    {
        if ($this->input->post('id')) {
            $id=$this->input->post('id');
            $sort=$this->input->post('sort');
			$table=$this->input->post('table');
            $item = $this->system_model->get_data($table, array('id' => $id),array(),true);
            if($item){
                $this->system_model->Update_where($table,array('id'=>$id),array('sort'=>$sort,));
            }
        }
    }
	
	public function checkAdd()
    {
        $data = array();
        $check = false;
        $alias = $_POST['alias'];
        $item = $this->system_model->getFirstRowWhere('alias',array(
            'alias' => $alias
        ));
        if(empty($item)){
            $check = true;
        }
        $data['check'] = $check;
        echo json_encode($data);
    }
	
	 public function checkRaovatEdit()
    {
        $data = array();
        $check = false;
        $alias = $_POST['alias'];
        $id = $_POST['id'];
        $item = $this->system_model->getFirstRowWhere('alias',array(
            'alias' => $alias,
            'raovat !=' => $id
        ));
		
        if(empty($item)){
            $check = true;
        }
        $data['check'] = $check;
       // print_r($data);
        echo json_encode($data);
    } 
	public function checkCatRaovatEdit()
    {
        $data = array();
        $check = false;
        $alias = $_POST['alias'];
        $id = $_POST['id'];
        $item = $this->system_model->getFirstRowWhere('alias',array(
            'alias' => $alias,
            'raovat_cat !=' => $id
        ));
        if(empty($item)){
            $check = true;
        }
        $data['check'] = $check;
        echo json_encode($data);
    }
	//ajax lấy gia tri quan huyen
	public  function district(){		
        if(isset($_POST['id'])){
             $data['quanhuyen'] = $this->system_model->get_data('district',array(
                'provinceid' => $_POST['id'],
            ),array(),false);
			$this->load->view('temp/list_district',$data);
        }
    }
        public  function color(){        
        if(isset($_POST['id'])){
             $data['color'] = $this->system_model->get_data('product_color',array(
                'id' => $_POST['id'],
            ),array(),false);
            $this->load->view('temp/list_color',$data);
        }
    }
	//ajax lay gia tri du an parent
	public  function postcat(){
        if(isset($_POST['id'])){
             $data['post_cate_parent'] = $this->system_model->get_data('post_cate',array(
				'parent_id' => $_POST['id'],
			));
			$this->load->view('temp/list_duan_parent',$data);
        }
    }

    // ajax tinh dia chi
    public  function address(){
        $data = array();
            if(isset($_POST['provinceid']) && $_POST['provinceid']!=null){
                 $data['provinceid'] = $this->system_model->getFirstRowWhere('province',array(
                'provinceid' => $_POST['provinceid'],
            ));
            }
            
             if(isset($_POST['district']) && $_POST['district']!=null){
                $data['districtid'] = $this->system_model->getFirstRowWhere('district',array(
                'districtid' => $_POST['district'],
            ));
             }
             
             if(isset($_POST['street']) && $_POST['street']!=null){
                $data['street'] = $this->system_model->getFirstRowWhere('street',array(
                'streetid' => $_POST['street'],
            ));
             }
             if(isset($_POST['ward']) && $_POST['ward'] !=null){
                $data['wardid'] = $this->system_model->getFirstRowWhere('ward',array(
                'wardid' => $_POST['ward'],
            ));
             }
            $this->load->view('temp/address',$data);
        
    }
	// ajax lay gia tri phuong xa
    public  function phuongxa(){
        $id=$this->input->post('id');
        if(isset($id)){
             $data['wards'] = $this->system_model->get_data('ward',array(
                'districtid' => $id,
            ));
            $this->load->view('temp/list_ward',$data);
        }
    } 
    // ajax lay gia tri duong pho
    public  function street(){
        $id=$this->input->post('id');
		
        if(isset($id)){
             $data['streets'] = $this->system_model->get_data('street',array(
                'wardid' => $id,
            ));
			//var_dump($id);die;
            $this->load->view('temp/street',$data);
        }
    } 
	//ajax lay gia tri du an
	public  function duan(){
		$data = array();
        if(isset($_POST['id'])){
             $data['duans'] = $this->system_model->get_data('product',array(
				'detric' => $_POST['id'],
			));
			$this->load->view('temp/list_duan',$data);
        }
		
    }

    //product home phan trang ajax
    public  function phan_trang_pro_home(){
        $data = array();

        if(isset($_POST['number_page'])){
            $where = array();
            if ($this->input->post('type')=='hot') {
                $where['hot'] = 1;
            }
            if ($this->input->post('type')=='focus') {
                $where['focus'] = 1;
            }
            if ($this->input->post('type')=='coupon') {
                $where['coupon'] = 1;
            }
            $per_page = $this->input->post('number_page')*18;
            $data['pros'] = $this->system_model->get_data('product',$where,array('id'=>'desc'),18,$per_page);
            $this->load->view('products/product_view_ajax',$data);
        }
        
    }
	// thay doi pass admin
     public function reset_pass()
    {
        $data = array();
        $check = false;
        $id = $_POST['id'];
        $item = $this->system_model->getFirstRowWhere('users',array(
            'id' => $id
        ));

        $pass='1234567';
        for($i=0;$i<5;$i++){
            $pass=md5($pass);
        }
        if(!empty($item)){
           $a =  $this->system_model->Update_where('users', array('id' => $id), array('password' =>$pass));

            $check = true;
        }
        $data['check'] = $check;
        echo json_encode($data);
    }

    public  function hang(){        
        if(isset($_POST['id'])){
             $data['dshang'] = $this->system_model->get_data('product_locale',array(
                'parent_id' => $_POST['id'],
            ),array(),false);
            $this->load->view('temp/list_hang',$data);
        }
    }
    public  function thuoctinh_hang(){    
        if(isset($_POST['loid'])){
           $data['dstt'] = $this->system_model->get_data('product_size',array(
                'parent_id' => $_POST['loid'],
            ),array(),false); 
          
            $this->load->view('temp/list_thuoctinh_hang',$data);
        }
    }
    public  function thuoctinhphu(){    
        if(isset($_POST['colorid'])){

           $data['dsttphu'] = $this->system_model->get_data('product_price',array(
                'parent_id' => $_POST['colorid'],
            )); 
            
            $this->load->view('temp/list_thuoctinh_phu',$data);
        }
    }
    // bo loc thu 2
     public  function hang_loc2(){      

        if(isset($_POST['id'])){
            $data['hang_id'] = $this->system_model->getField('product_to_brand','brand_id',array(
                'id_category' =>$_POST['id'],
            ),array());
            // var_dump($_POST['id']);
            // var_dump($data['hang_id']);die;
            $data['dshang'] = $this->system_model->get_hang($data['hang_id']->brand_id);
           
            $this->load->view('temp/list_hangloc2',$data);
         }
    }
    // bo lọc phụ lần 2
     public  function hang_loc2_1(){      
        if(isset($_POST['id'])){
            $data['tt_color'] = $this->system_model->get_cat_color($_POST['id']);
            foreach ($data['tt_color'] as $key => $cat) {
             $data['tt_color'][$key]->ttp_color = $this->system_model->get_data('product_price',array(
                'parent_id' => $cat->id,
                ),array(),false);
            }
            $this->load->view('temp/list_hangloc2_lan2',$data);
         }
    }
     public  function thuoctinh_hangloc2(){    
        if(isset($_POST['loid'])){
           $data['dstt'] = $this->system_model->get_data('product_size',array(
                'parent_id' => $_POST['loid'],
            ),array(),false); 
          
            $this->load->view('temp/list_thuoctinh_hang_loc2',$data);
        }
    }

     public  function get_thuoctinhphu(){           
        if(isset($_POST['color'])){
           $data['color_name'] = $this->system_model->getField('product_color','name',array(
                'id' => $_POST['color'],
            ),array(),false); 
            $data['thuoctinhphu_name'] = $this->system_model->getField('product_price','name',array(
                'id' => $_POST['id_thuoctinhphu'],
            ),array(),false); 
            echo json_encode($data);
        }
    }
      public  function fiil_loc3(){ 
        if(isset($_POST['cat_loc2']))
        {
            $cat_alias = $this->system_model->getField('product_category','alias',array(
                'id' => $_POST['cat_loc2'],
            ));
            $cate_alias = @$cat_alias->alias;
        }       
       // loc theo vi tri khu vuc
        if(isset($_POST['location']))
        {
            $location= 'location='.$_POST['location'];
        }
        // loc theo hãng       
        if(isset($_POST['id_hang_loc2']))
          {
             $brand = '&brand='.$_POST['id_hang_loc2'];
          }
        // loc theo dòng xe cua hang  
             if(isset($_POST['id_thuoctinh_loc2']))
          {
             $type_brand = '&type_brand='.$_POST['id_thuoctinh_loc2'];
          }
          // loc theo thuoc tinh phu cua hang
         if(isset($_POST['id_cat_phu'])){
              if($_POST['id_cat_phu']!='')
            { 
                $where_con = '';
                for($i=0;$i<count($_POST['cha']);$i++){
                    if($_POST['id_cat_phu'][$i] != ''){                 
                        //$where_cha .=$_POST['cha'][$i].',';
                        $where_con .= $_POST['id_cat_phu'][$i].',';
                    }
                }
                if($where_con!=''){
                    $ttp ='&array_con='.rtrim($where_con,',').'';
                }
            }
        }
         // loc theo sap xep
         if(isset($_POST['sap_xep']))
        {
            $sort ='&sort='.$_POST['sap_xep'].'';
        }
        // loc theo nguoi dang
        if(isset($_POST['type_loc2']))
        {
            $where_type = '';
            for($i=0;$i<count($_POST['type_loc2']);$i++){
                $where_type .= $_POST['type_loc2'][$i].',';
            }
            $type ='&type='.rtrim($where_type,',').'';
        }        
        //loc theo loại bán hoạc mua
        if(isset($_POST['loaitin_loc2']))
        {
            $where_buy = '';
            for($i=0;$i<count($_POST['loaitin_loc2']);$i++){
                $where_buy .= $_POST['loaitin_loc2'][$i].',';
            }
            $buy ='&buy='.rtrim($where_buy,',').'';
        }

         redirect(base_url('danh-muc/').@$cate_alias.'.html?'.@$location.@$brand.@$type_brand.@$ttp.@$type.@$buy.@$sort);
        //echo json_encode($data);
      }

      public  function fiil_loc2(){ 
        if(!empty($_POST['cat_loc2']))
        {
            $cat_alias = $this->system_model->getField('product_category','alias',array(
                'id' => $_POST['cat_loc2'],
            ));
            $cate_alias = @$cat_alias->alias;
        }       
       // loc theo vi tri khu vuc
        if(!empty($_POST['location']))
        {
            $location= 'location='.$_POST['location'];
        }
        // loc theo hãng       
        if(!empty($_POST['id_hang_loc2']))
          {
             $brand = '&brand='.$_POST['id_hang_loc2'];
          }
        // loc theo dòng xe cua hang  
             if(!empty($_POST['id_thuoctinh_loc2']))
          {
             $type_brand = '&type_brand='.$_POST['id_thuoctinh_loc2'];
          }
          // loc theo thuoc tinh phu cua hang
         if(!empty($_POST['id_cat_phu'])){
              if($_POST['id_cat_phu']!='')
            { 
                $where_con = '';
                for($i=0;$i<count($_POST['cha']);$i++){
                    if($_POST['id_cat_phu'][$i] != ''){                 
                        //$where_cha .=$_POST['cha'][$i].',';
                        $where_con .= $_POST['id_cat_phu'][$i].',';
                    }
                }
                if($where_con!=''){
                    $ttp ='&array_con='.rtrim($where_con,',').'';
                }
            }
        }
         // loc theo sap xep
         if(!empty($_POST['sap_xep']))
        {
            $sort ='&sort='.$_POST['sap_xep'].'';
        }
        // loc theo nguoi dang
        if(!empty($_POST['type_loc2']))
        {
            $where_type = '';
            for($i=0;$i<count($_POST['type_loc2']);$i++){
                $where_type .= $_POST['type_loc2'][$i].',';
            }
            $type ='&type='.rtrim($where_type,',').'';
        }        
        //loc theo loại bán hoạc mua
        if(!empty($_POST['loaitin_loc2']))
        {
            $buy ='&buy='.$_POST['loaitin_loc2'];
        }

        $data['ok'] = @$cate_alias.'.html?'.@$location.@$brand.@$type_brand.@$ttp.@$type.@$buy.@$sort;
        echo json_encode($data);

      }
    


}