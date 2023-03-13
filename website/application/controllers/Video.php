<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Video extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('system_model');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->library('pagination');

    }

    //appends all error messages
    private function handle_error($err) {
        $this->error .= $err . "rn";
    }

    //appends all success messages
    private function handle_success($succ) {
        $this->success .= $succ . "rn";
    }

    public function index() {
        if ($this->input->post('video_upload')) {
            //set preferences
            //file upload destination
            $upload_path = './upload/files/video/';
            $config['upload_path'] = $upload_path;
            //allowed file types. * means all types
            $config['allowed_types'] = 'wmv|mp4|avi|mov';
            //allowed max file size. 0 means unlimited file size
            $config['max_size'] = '0';
            //max file name size
            $config['max_filename'] = '255';
            //whether file name should be encrypted or not
            $config['encrypt_name'] = FALSE;
            //store video info once uploaded
            $video_data = array();
            //check for errors
            $is_file_error = FALSE;
            //check if file was selected for upload
            if (!$_FILES) {
                $is_file_error = TRUE;
                $this->handle_error('Select a video file.');
            }
            //if file was selected then proceed to upload
            if (!$is_file_error) {
                //load the preferences
                $this->load->library('upload', $config);
                //check file successfully uploaded. 'video_name' is the name of the input
                if (!$this->upload->do_upload('video_name')) {
                    //if file upload failed then catch the errors
                    $this->handle_error($this->upload->display_errors());
                    $is_file_error = TRUE;
                } else {
                    //store the video file info
                    $video_data = $this->upload->data();
                }
            }
            // There were errors, we have to delete the uploaded video
            if ($is_file_error) {
                if ($video_data) {
                    $file = $upload_path . $video_data['file_name'];
                    if (file_exists($file)) {
                        unlink($file);
                    }
                }
            } else {
                $data['video_name'] = $video_data['file_name'];
                $data['video_path'] = $upload_path;
                $data['video_type'] = $video_data['file_type'];
                $this->handle_success('Video was successfully uploaded to direcoty <strong>' . $upload_path . '</strong>.');
            }
        }

        //load the error and success messages
        $data['errors'] = $this->error;
        $data['success'] = $this->success;
        //load the view along with data
        $this->load->view('video/view', $data);
    }
     public function video_bycategory($alias){
        $this->Check_alias($alias);
        $data = array();
        $data['cate_curent'] = $current = $this->system_model->getField('video_category','name,id,alias,description_seo,title_seo,image,keyword_seo',array(
            'lang' => $this->language,
            'alias' => $alias
        ));
        $where = array(
            'lang'=>$this->language,
            'cate'=>$data['cate_curent']->id
        );

        $config['base_url'] = base_url('video/'.$alias.'.html');
        $config['page_query_string'] = TRUE;
        $config['enable_query_string'] = TRUE;
        $config['total_rows'] = $this->system_model->count_VideobyCate($current->id);
        $config['per_page'] = 15; // xác định số record ở mỗi trang
        $config['uri_segment'] = 4; // xác định segment chứa page number
        $config=array_merge($config,$this->pagination_config);

        $this->pagination->initialize($config);
         $data['lists'] = $this->system_model->getVideosByCategory($current->id,$config['per_page'], $this->input->get('per_page'));

        
        $seo=array('title'=>@$data['cate_curent']->title_seo==''?$data['cate_curent']->name:$data['cate_curent']->title_seo,
                   'description'=>@$data['cate_curent']->description_seo,
                   'keyword'=>@$data['cate_curent']->keyword_seo,
                   'image'=>@$data['cate_curent']->image,
                   'type'=>'products');

        $this->LoadHeader(null,$seo,false);
        $this->load->view('video/video_bycategory',$data);
        $this->LoadFooter();
    }
    public function detail($alias)
    {
        $data = array();
        $data['video'] = $video = $this->system_model->getField('video','id,alias,name,category_id,description_seo,keyword_seo,title_seo,link_video,description',array(
            'alias'=>$alias,
        ),array(),true);
        $data['cate_current'] = $cate_current = $this->system_model->getField('video_category','id,name,alias',array(
                'id'=>$data['video']->category_id),
            array(),true);
       
        $seo=array('title'=>@$data['video']->title_seo==''?$data['video']->name:$data['video']->title_seo,
            'description'=>@$data['video']->description_seo,
            'keyword'=>@$data['video']->keyword_seo,
            'image'=>@$data['video']->image,
            'type'=>'article');

        $this->LoadHeader(null,$seo,true);
        $this->load->view('video/detail',$data);
        $this->LoadFooter();
    }
}

