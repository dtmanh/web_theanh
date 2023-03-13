<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ajax_pm extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
         
    }
	public function chon_khung(){
        $this->load->helper('file');
            $chon_khung = $_POST['giatri'];

            $khung_container_json = read_file('khoi_vitri.json');
            $string_begin = '/*'.'begin container*/';
            $string_end = '/*'.'end container*/';
            $vitri1 =  strpos($khung_container_json, $string_begin )+strlen($string_begin);
            $vitri2 = strpos($khung_container_json, $string_end );
            $chuoi_tim_json = substr( $khung_container_json,  $vitri1, ($vitri2-$vitri1));

            $arr_cu = json_decode($chuoi_tim_json);
            foreach ($arr_cu as $key => $arr) {

                if ($arr->name=='header' || $arr->name=='banner') {
                    $khung_container = read_file('application/views/common/header.php');
                }
                
                if ($arr->name=='footer') {
                    $khung_container = read_file('application/views/common/footer.php');
                }

                $string_begin = '<!-- begin container_'.$arr->name.' -->';
                $string_end = '<!-- end container_'.$arr->name.' -->';
                $vitri1 =  strpos($khung_container, $string_begin )+strlen($string_begin);
                $vitri2 = strpos($khung_container, $string_end );
                $chuoi_tim = substr( $khung_container,  $vitri1, ($vitri2-$vitri1));

                $string_begin_close = '<!-- begin container_close_'.$arr->name.' -->';
                $string_end_close = '<!-- end container_close_'.$arr->name.' -->';
                $vitri1 =  strpos($khung_container, $string_begin_close )+strlen($string_begin_close);
                $vitri2 = strpos($khung_container, $string_end_close );
                $chuoi_tim_close = substr( $khung_container,  $vitri1, ($vitri2-$vitri1));

                if($chon_khung == 1){
                    $arr->container=1;
                    $string_moi= $string_begin."<div class='container'>".$string_end;
                    $string_moi_close= $string_begin_close."</div>".$string_end_close;

                }else {
                    $arr->container=0;
                    $string_moi= $string_begin.$string_end;
                    $string_moi_close= $string_begin_close.$string_end_close;
                }

                $string = str_replace($string_begin.$chuoi_tim.$string_end, $string_moi, $khung_container);
                $string = str_replace($string_begin_close.$chuoi_tim_close.$string_end_close, $string_moi_close, $string);

                if ($arr->name=='header' || $arr->name=='banner') {
                    if ( ! write_file('application/views/common/header.php', $string))
                        {
                            echo 'Không thể ghi tập tin';
                            die;
                        }
                }
                
                if ($arr->name=='footer') {
                    if ( ! write_file('application/views/common/footer.php', $string))
                        {
                            echo 'Không thể ghi tập tin';
                            die;
                        }
                }

                /*========body=================*/
                if ($arr->name=='body') {
                    $khung_container_header = read_file('application/views/common/header.php');
                    $khung_container_footer = read_file('application/views/common/footer.php');

                    $string_begin = '<!-- begin container_'.$arr->name.' -->';
                    $string_end = '<!-- end container_'.$arr->name.' -->';
                    $vitri1 =  strpos($khung_container_header, $string_begin )+strlen($string_begin);
                    $vitri2 = strpos($khung_container_header, $string_end );
                    $chuoi_tim = substr( $khung_container_header,  $vitri1, ($vitri2-$vitri1));

                    $string_begin_close = '<!-- begin container_close_'.$arr->name.' -->';
                    $string_end_close = '<!-- end container_close_'.$arr->name.' -->';
                    $vitri1 =  strpos($khung_container_footer, $string_begin_close )+strlen($string_begin_close);
                    $vitri2 = strpos($khung_container_footer, $string_end_close );
                    $chuoi_tim_close = substr( $khung_container_footer,  $vitri1, ($vitri2-$vitri1));

                    if($chon_khung == 1){
                        $arr->container=1;
                        $string_moi= $string_begin."<div class='container'>".$string_end;
                        $string_moi_close= $string_begin_close."</div>".$string_end_close;

                    }else {
                        $arr->container=0;
                        $string_moi= $string_begin.$string_end;
                        $string_moi_close= $string_begin_close.$string_end_close;
                    }

                    $string1 = str_replace($string_begin.$chuoi_tim.$string_end, $string_moi, $khung_container_header);
                    $string2 = str_replace($string_begin_close.$chuoi_tim_close.$string_end_close, $string_moi_close, $khung_container_footer);

                    if ( ! write_file('application/views/common/header.php', $string1))
                        {
                            echo 'Không thể ghi tập tin';
                            die;
                        }
                    if ( ! write_file('application/views/common/footer.php', $string2))
                        {
                            echo 'Không thể ghi tập tin';
                            die;
                        }

                }
 
            }

            $arr_moi = json_encode($arr_cu);
            $string = str_replace($chuoi_tim_json, $arr_moi, $khung_container_json);
            if ( ! write_file('khoi_vitri.json', $string))
            {
                echo 'Không thể ghi tập tin';
                die;
            }
            if($chon_khung == 1){
                echo 1;
            }else{
                echo 2;
            }
            
    }
    //coppy giu lieu khi chon giao diện
    public function coppy_paste_value()
    {

        $this->load->helper('file');

       
        $string_html = read_file('giaodien/'.$this->input->post('name_file').'/'.$this->input->post('number_foder').'/view.php');

        if($this->input->post('name_file')=="header" || $this->input->post('name_file')=="footer"){
            $string = read_file('application/views/common/'.$this->input->post('name_file').'.php');
        }
 
        if($this->input->post('name_file')=="banner"){
            $string_banner = read_file('application/widgets/slide/view.php');
        }

        if($this->input->post('name_file')=="pro_detail"){
            $string = read_file('application/views/products/view_detail.php');
        }

       
        $string_begin = '<!-- begin '.$this->input->post('name_file').' -->';
        $string_end ='<!-- end '.$this->input->post('name_file').' -->';
       
        $vitri1 =  strpos($string, $string_begin )+strlen($string_begin);
        $vitri2 = strpos($string, $string_end );

        $chuoi_tim = substr( $string,  $vitri1, ($vitri2-$vitri1));
        $chuoi_tim123 = $string_begin.$chuoi_tim.$string_end;
        $string = str_replace($chuoi_tim123, $string_html, $string);
        if($this->input->post('name_file')=="header" || $this->input->post('name_file')=="footer"){
            if ( ! write_file('application/views/common/'.$this->input->post('name_file').'.php', $string))
            {
                echo 'Unable to write the file';
                die;
            }
        }

        if($this->input->post('name_file')=="banner"){
            $string = str_replace($string_banner, $string_html, $string_banner);
            if ( ! write_file('application/widgets/slide/view.php', $string))
            {
                echo 'Unable to write the file';
                die;
            }

        }
        if($this->input->post('name_file')=="pro_detail"){
            if ( ! write_file('application/views/products/view_detail.php', $string))
            {
                echo 'Unable to write the file';
                die;
            }

        }
         

        // copy menu main
            if($this->input->post('name_file')=="header"){
                $chuoi_thaythe = read_file('giaodien/menu-main/'.$this->input->post('number_foder').'/view.php');

                if ($chuoi_thaythe!='')
                    {
                        write_file('application/widgets/menu_main/view.php', $chuoi_thaythe);
                    }
            }
        // copy menu top
            if($this->input->post('name_file')=="header"){
                if(read_file('giaodien/menu-top/'.$this->input->post('number_foder').'/view.php')){
                    $chuoi_thaythe = read_file('giaodien/menu-top/'.$this->input->post('number_foder').'/view.php');


                    if ( ! write_file('application/widgets/menu_top/view.php', $chuoi_thaythe))
                        {
                            echo 'Unable to write the file';
                            die;
                        }
                }
                
            }
        /*======*/

        /*=========================lấy css*/

        //đọc file css cần coppy

        $string_css = read_file('giaodien/'.$this->input->post('name_file').'/'.$this->input->post('number_foder').'/style.css');

        // doc file header paste css vao
        $string = read_file('application/views/common/header.php');

        $string_begin = '/*begin '.$this->input->post('name_file').'*/';
        $string_end ='/*end '.$this->input->post('name_file').'*/';
        $vitri1 =  strpos($string, $string_begin )+strlen($string_begin);
        $vitri2 = strpos($string, $string_end );
      
        $chuoi_tim = substr( $string,  $vitri1, ($vitri2-$vitri1));
        $chuoi_tim123 = $string_begin.$chuoi_tim.$string_end;
        $string = str_replace($chuoi_tim123, $string_begin.$string_css.$string_end, $string);

        if ( ! write_file('application/views/common/header.php', $string))
        {
            echo 'Unable to write the file';
            die;
        }
        
        //========================= coppy file image
        if (is_dir('giaodien/'.$this->input->post('name_file').'/'.$this->input->post('number_foder').'/img')) {
            $src = 'giaodien/'.$this->input->post('name_file').'/'.$this->input->post('number_foder').'/img';
            $dst = 'img';
            $arr_image = array();

            // xoa cac image da co trong khoi
           
            $string1 = read_file('name_image.php');
            $string_begin = '<!-- begin '.$this->input->post('name_file').' -->';
            $string_end ='<!-- end '.$this->input->post('name_file').' -->';
            $vitri1 =  strpos($string1, $string_begin )+strlen($string_begin);
            $vitri2 = strpos($string1, $string_end );
            $chuoi_tim = substr( $string1,  $vitri1, ($vitri2-$vitri1));
            if((strlen($chuoi_tim)-strlen($string_begin)-strlen($string_end)) > 5){
               $arr_image_get =  explode(',', $chuoi_tim);
               foreach ($arr_image_get as $key => $value) {
                //check image co o khoi khac hay k
                    $string_check = $string1;
                    $string_check_2 =   str_replace($chuoi_tim,"",$string1);
                    if(strpos($string_check_2, $value )==0){
                        unlink($value);
                    }
               }
            }
            
            // bat dau them
            $files = glob('giaodien/'.$this->input->post('name_file').'/'.$this->input->post('number_foder').'/img/*.png');
                  foreach($files as $file){
                  $file_to_go = str_replace($src,$dst,$file);
                  copy($file, $file_to_go);
                  array_push($arr_image,$file_to_go);
            }
            $chuoi_tim1 = $string_begin.$chuoi_tim.$string_end;
            $chuoi_thaythe = $string_begin.implode(',',$arr_image).$string_end;
            $string123 = str_replace($chuoi_tim1, $chuoi_thaythe, $string1);

            if($this->input->post('name_file')=="header" || $this->input->post('name_file')=="footer"){
                if ( ! write_file('name_image.php', $string123))
                {
                    echo 'Unable to write the file';
                    die;
                }
            }
        }

        //====================== copy font
        
        if (is_dir('giaodien/'.$this->input->post('name_file').'/'.$this->input->post('number_foder').'/fonts')) {
            $src = 'giaodien/'.$this->input->post('name_file').'/'.$this->input->post('number_foder').'/fonts';
            $dst = 'fonts';
            $arr_image = array();

            // xoa cac font da co trong khoi
            $string1 = read_file('name_font.php');
            $string_begin = '<!-- begin '.$this->input->post('name_file').' -->';
            $string_end ='<!-- end '.$this->input->post('name_file').' -->';
            $vitri1 =  strpos($string1, $string_begin )+strlen($string_begin);
            $vitri2 = strpos($string1, $string_end );
            $chuoi_tim = substr( $string1,  $vitri1, ($vitri2-$vitri1));
            if((strlen($chuoi_tim)-strlen($string_begin)-strlen($string_end)) > 5){
               $arr_image_get =  explode(',', $chuoi_tim);
               foreach ($arr_image_get as $key => $value) {
                    $string_check = $string1;
                    $string_check_2 =   str_replace($chuoi_tim,"",$string1);
                    if(strpos($string_check_2, $value )==0){
                        unlink($value);
                    }
               }
            }
            
            // bat dau them
            
            $files = glob('giaodien/'.$this->input->post('name_file').'/'.$this->input->post('number_foder').'/fonts/*.*');
            foreach($files as $file){
                  $file_to_go = str_replace($src,$dst,$file);
                  copy($file, $file_to_go);
                  array_push($arr_image,$file_to_go);
            }
            $chuoi_tim1 = $string_begin.$chuoi_tim.$string_end;
            $chuoi_thaythe = $string_begin.implode(',',$arr_image).$string_end;
            $string123 = str_replace($chuoi_tim1, $chuoi_thaythe, $string1);

            if($this->input->post('name_file')=="header" || $this->input->post('name_file')=="footer"){
                if ( ! write_file('name_font.php', $string123))
                {
                    echo 'Unable to write the file';
                    die;
                }
            }
        }

        echo json_encode(1);
    }
    // get du lieu khi chon module ben trai    
    public function get_view_module_left(){
        $data['name_file'] = $this->input->post('name_file');
        $data['total_image']  = count( glob("giaodien/".$this->input->post('name_file')."/*", GLOB_ONLYDIR) );
        $data['banner']=0;
        
        if($this->input->post('name_file')=="banner"){
            $data['banner']=1;
            $this->load->helper('file');
            $string1 = read_file('khoi_vitri.json');
            $string_begin = '/*begin '.$this->input->post('name_file').'*/';
            $string_end ='/*end '.$this->input->post('name_file').'*/';
            $vitri1 =  strpos($string1, $string_begin )+strlen($string_begin);
            $vitri2 = strpos($string1, $string_end );
            $chuoi_tim = substr( $string1,  $vitri1, ($vitri2-$vitri1));
            $data['list_check']  = json_decode($chuoi_tim);
        }
        $this->load->view('pm/layout/col_left',$data);
    }
    // get du lieu slide
    public function get_slide()
    { 
        /*======== tim  khoi thay the va tao khoi thay the  ===================*/
        $string1 = read_file('khoi_vitri.json');
       
        $string_begin = '/*begin '.$this->input->post('name_file').'*/';
        $string_end ='/*end '.$this->input->post('name_file').'*/';
        $vitri1 =  strpos($string1, $string_begin )+strlen($string_begin);
        $vitri2 = strpos($string1, $string_end );
        $chuoi_tim = substr( $string1,  $vitri1, ($vitri2-$vitri1));
        
        /*========================*/
        $arr_cu = json_decode($chuoi_tim);

        switch ($this->input->post('name')) {
            case 'full_size':
                if ($arr_cu[0]->full_size) {
                    $arr_cu[0]->full_size = false;
                }else{
                    $arr_cu[0]->full_size = true;
                }
                break;
            case 'nav':
                if ($arr_cu[0]->nav) {
                    $arr_cu[0]->nav = false;
                }else{
                    $arr_cu[0]->nav = true;
                }
                break;
            case 'dot':
                if ($arr_cu[0]->dot) {
                    $arr_cu[0]->dot = false;
                }else{
                    $arr_cu[0]->dot = true;
                }
                break;
            case 'home':
                $string_show_slide = read_file('application/core/MY_Controller.php');
                $string_begin1 = '/*'.'begin slide_header*/';
                $string_end1 ='/*'.'end slide_header*/';
                $vitri1 =  strpos($string_show_slide, $string_begin1 )+strlen($string_begin1);
                $vitri2 = strpos($string_show_slide, $string_end1 );
                $string_show_slide2 = substr( $string_show_slide,  $vitri1, ($vitri2-$vitri1));

                $html_show_slide = read_file('application/views/common/header.php');
                $string_begin2 = '<!-- begin banner -->';
                $string_end2 ='<!-- end banner -->';
                $vitri1 =  strpos($html_show_slide, $string_begin2 )+strlen($string_begin2);
                $vitri2 = strpos($html_show_slide, $string_end2 );
                $html_show_slide2 = substr( $html_show_slide,  $vitri1, ($vitri2-$vitri1));

                $string_show_slide4 = read_file('application/controllers/home.php');
                $vitri1 =  strpos($string_show_slide4, $string_begin1 )+strlen($string_begin1);
                $vitri2 = strpos($string_show_slide4, $string_end1 );
                $string_show_slide3 = substr( $string_show_slide4,  $vitri1, ($vitri2-$vitri1));


                $html_show_slide4 = read_file('application/views/home/view_home.php');
                $vitri1 =  strpos($html_show_slide4, $string_begin2 )+strlen($string_begin2);
                $vitri2 = strpos($html_show_slide4, $string_end2 );
                $html_show_slide3 = substr( $html_show_slide4,  $vitri1, ($vitri2-$vitri1));

                if ($arr_cu[0]->home) {
                    $arr_cu[0]->home = false;
                    $string_news ='';
                    $string = str_replace($string_begin1.$string_show_slide3.$string_end1, $string_begin1.$string_news.$string_end1, $string_show_slide4);
                    
                    if ( ! write_file('application/controllers/Home.php', $string))
                    {
                        echo 'Unable to write the file';
                        die;
                    }

                    $string = str_replace($string_begin2.$html_show_slide3.$string_end2, $string_begin2.$string_news.$string_end2, $html_show_slide4);
                    if ( ! write_file('application/views/home/view_home.php', $string))
                    {
                        echo 'Unable to write the file';
                        die;
                    }

                    $controller =$arr_cu[0]->controller;
                    $view =$arr_cu[0]->view;
                    $string = str_replace($string_begin1.$string_show_slide2.$string_end1, $string_begin1.$controller.$string_end1, $string_show_slide);
                    if ( ! write_file('application/core/MY_Controller.php', $string))
                    {
                        echo 'Unable to write the file';
                        die;
                    }
                    $string = str_replace($string_begin2.$html_show_slide2.$string_end2, $string_begin2.$view.$string_end2, $html_show_slide);
                    if ( ! write_file('application/views/common/header.php', $string))
                    {
                        echo 'Unable to write the file';
                        die;
                    }

                }else{
                    $arr_cu[0]->home = true;

                    
                    $string_news ='';
                    $string_news2 ='<div class="clearfix-10"></div>';
                    $string = str_replace($string_begin1.$string_show_slide2.$string_end1, $string_begin1.$string_news.$string_end1, $string_show_slide);

                    if ( ! write_file('application/core/MY_Controller.php', $string))
                    {
                        echo 'Unable to write the file';
                        die;
                    }

                    $string = str_replace($string_begin2.$html_show_slide2.$string_end2, $string_begin2.$string_news2.$string_end2, $html_show_slide);
                    if ( ! write_file('application/views/common/header.php', $string))
                    {
                        echo 'Unable to write the file';
                        die;
                    }

                    $controller =$arr_cu[0]->controller;
                    $view =$arr_cu[0]->view;
                    $string = str_replace($string_begin1.$string_show_slide3.$string_end1, $string_begin1.$controller.$string_end1, $string_show_slide4);
                    if ( ! write_file('application/controllers/Home.php', $string))
                    {
                        echo 'Unable to write the file';
                        die;
                    }
                    $string = str_replace($string_begin2.$html_show_slide3.$string_end2, $string_begin2.$view.$string_end2, $html_show_slide4);
                    if ( ! write_file('application/views/home/view_home.php', $string))
                    {
                        echo 'Unable to write the file';
                        die;
                    }
                }
                break;
            case 'show':
                $string_show_slide = read_file('application/core/MY_Controller.php');
                $string_begin1 = '/*'.'begin slide_header*/';
                $string_end1 ='/*'.'end slide_header*/';
                $vitri1 =  strpos($string_show_slide, $string_begin1 )+strlen($string_begin1);
                $vitri2 = strpos($string_show_slide, $string_end1 );
                $string_show_slide2 = substr( $string_show_slide,  $vitri1, ($vitri2-$vitri1));
                $html_show_slide = read_file('application/views/common/header.php');
                $string_begin2 = '<!-- begin banner -->';
                $string_end2 ='<!-- end banner -->';
                $vitri1 =  strpos($html_show_slide, $string_begin2 )+strlen($string_begin2);
                $vitri2 = strpos($html_show_slide, $string_end2 );
                $html_show_slide2 = substr( $html_show_slide,  $vitri1, ($vitri2-$vitri1));

                if ($arr_cu[0]->show) {
                    $arr_cu[0]->show = false;

                    $string_news ='';
                    $string = str_replace($string_begin1.$string_show_slide2.$string_end1, $string_begin1.$string_news.$string_end1, $string_show_slide);
                    if ( ! write_file('application/core/MY_Controller.php', $string))
                    {
                        echo 'Unable to write the file';
                        die;
                    }

                    $string = str_replace($string_begin2.$html_show_slide2.$string_end2, $string_begin2.$string_news.$string_end2, $html_show_slide);
                    if ( ! write_file('application/views/common/header.php', $string))
                    {
                        echo 'Unable to write the file';
                        die;
                    }
                     $string_begin1 = '/*'.'begin slide_header*/';
                    $string_end1 ='/*'.'end slide_header*/';
                    $string_show_slide4 = read_file('application/controllers/home.php');
                    $vitri1 =  strpos($string_show_slide4, $string_begin1 )+strlen($string_begin1);
                    $vitri2 = strpos($string_show_slide4, $string_end1 );
                    $string_show_slide3 = substr( $string_show_slide4,  $vitri1, ($vitri2-$vitri1));

                    $string_begin2 = '<!-- begin banner -->';
                    $string_end2 ='<!-- end banner -->';
                    $html_show_slide4 = read_file('application/views/home/view_home.php');
                    $vitri1 =  strpos($html_show_slide4, $string_begin2 )+strlen($string_begin2);
                    $vitri2 = strpos($html_show_slide4, $string_end2 );
                    $html_show_slide3 = substr( $html_show_slide4,  $vitri1, ($vitri2-$vitri1));
                    $string_news ='';
                    $string = str_replace($string_begin1.$string_show_slide3.$string_end1, $string_begin1.$string_news.$string_end1, $string_show_slide4);
                    
                    if ( ! write_file('application/controllers/Home.php', $string))
                    {
                        echo 'Unable to write the file';
                        die;
                    }

                    $string = str_replace($string_begin2.$html_show_slide3.$string_end2, $string_begin2.$string_news.$string_end2, $html_show_slide4);
                    if ( ! write_file('application/views/home/view_home.php', $string))
                    {
                        echo 'Unable to write the file';
                        die;
                    }
                }else{
                    $arr_cu[0]->show = true;

                    $controller =$arr_cu[0]->controller;
                    $view =$arr_cu[0]->view;
                    $string = str_replace($string_begin1.$string_show_slide2.$string_end1, $string_begin1.$controller.$string_end1, $string_show_slide);
                    if ( ! write_file('application/core/MY_Controller.php', $string))
                    {
                        echo 'Unable to write the file';
                        die;
                    }
                    $string = str_replace($string_begin2.$html_show_slide2.$string_end2, $string_begin2.$view.$string_end2, $html_show_slide);
                    if ( ! write_file('application/views/common/header.php', $string))
                    {
                        echo 'Unable to write the file';
                        die;
                    }
                }
                break;    
        }
        $arr_moi = json_encode($arr_cu);
        //var_dump($arr_moi);
        $string = str_replace($chuoi_tim, $arr_moi, $string1);

        /*============ghi file===============*/
        //var_dump($string);
        if ( ! write_file('khoi_vitri.json', $string))
        {
            echo 'Unable to write the file';
            die;
        }

        // doc file widget slide
        $string1 = read_file('application/widgets/slide/view.php');
        $string_begin = '<!-- view dot nav -->';
        $string_end ='<!-- end dot nav -->';
        $vitri1 =  strpos($string1, $string_begin )+strlen($string_begin);
        $vitri2 = strpos($string1, $string_end );
        $chuoi_tim = substr( $string1,  $vitri1, ($vitri2-$vitri1));

        $html_moi ='<input type="hidden" id="dot_slide_main" value="'.$arr_cu[0]->dot.'">
                    <input type="hidden" id="nav_slide_main" value="'.$arr_cu[0]->nav.'">
                    <input type="hidden" id="full_slide_main" value="'.$arr_cu[0]->full_size.'">';
        $string = str_replace($chuoi_tim, $html_moi, $string1);
        if ( ! write_file('application/widgets/slide/view.php', $string))
        {
            echo 'Unable to write the file';
            die;
        }

        echo json_encode('1');
    }
// reset lai toàn bộ giao diện
    public function reset_code()
    {
        if($this->input->post('check')){     
           $this->rrmdir('img/'); //xoa thu muc img        
           mkdir( "img" ); //tao thu muc img
            /*header*/
            $string1 = read_file('giaodien/view_mau/header.php');            
            if ( ! write_file('application/views/common/header.php', $string1))
            {
                echo 'Không thể ghi tập tin';
                die;
            }

            /*footer*/
            $string1 = read_file('giaodien/view_mau/footer.php');            
            if ( ! write_file('application/views/common/footer.php', $string1))
            {
                echo 'Không thể ghi tập tin';
                die;
            }

            /*left*/
            $string1 = read_file('giaodien/view_mau/left.php');            
            if ( ! write_file('application/views/common/left.php', $string1))
            {
                echo 'Không thể ghi tập tin';
                die;
            }

            /*right*/
            $string1 = read_file('giaodien/view_mau/right.php');
            if ( ! write_file('application/views/common/right.php', $string1))
            {
                echo 'Không thể ghi tập tin';
                die;
            }

            /*home*/
            $string1 = read_file('giaodien/view_mau/view_home.php');            
            if ( ! write_file('application/views/home/view_home.php', $string1))
            {
                echo 'Không thể ghi tập tin';
                die;
            }

            /*page*/
            $string1 = read_file('giaodien/view_mau/view_page.php');            
            if ( ! write_file('application/views/page/view_page.php', $string1))
            {
                echo 'Không thể ghi tập tin';
                die;
            }

            /*contact*/
            $string1 = read_file('giaodien/view_mau/contact_view.php');            
            if ( ! write_file('application/views/contact/contact_view.php', $string1))
            {
                echo 'Không thể ghi tập tin';
                die;
            }

            /*product*/
            $string1 = read_file('giaodien/view_mau/pro_category.php');            
            if ( ! write_file('application/views/products/pro_category.php', $string1))
            {
                echo 'Không thể ghi tập tin';
                die;
            }

            $string1 = read_file('giaodien/view_mau/product_detail.php');            
            if ( ! write_file('application/views/products/view_detail.php', $string1))
            {
                echo 'Không thể ghi tập tin';
                die;
            }

            $string1 = read_file('giaodien/view_mau/pro_search.php');            
            if ( ! write_file('application/views/searchs/pro_search.php', $string1))
            {
                echo 'Không thể ghi tập tin';
                die;
            }

            /*news*/

            $string1 = read_file('giaodien/view_mau/news_detail.php');            
            if ( ! write_file('application/views/news/detail.php', $string1))
            {
                echo 'Không thể ghi tập tin';
                die;
            }
            $string1 = read_file('giaodien/view_mau/news_category.php');            
            if ( ! write_file('application/views/news/news_category.php', $string1))
            {
                echo 'Không thể ghi tập tin';
                die;
            }
            /*json*/
            $string1 = read_file('giaodien/view_mau/khoi_vitri.json');            
            if ( ! write_file('khoi_vitri.json', $string1))
            {
                echo 'Không thể ghi tập tin';
                die;
            }
        }
        echo 1;
    }
    // hàm xoa thu mục
    public function rrmdir($dir) {
          if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
              if ($object != "." && $object != "..") {
                if (filetype($dir."/".$object) == "dir") 
                   $this->rrmdir($dir."/".$object); 
                else unlink   ($dir."/".$object);
              }
            }
            reset($objects);
            rmdir($dir);
          }
    }
}