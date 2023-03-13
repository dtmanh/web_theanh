<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Media extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_media');
        $this->load->helper('url');
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
    public function category($alias)
    {
        $data = array();
        $data['cate_curent'] = $cate_current = $this->m_media->getField('media_category','id,alias,name,title_seo,keyword_seo,description_seo',array(
            'lang' => $this->language,
            'alias' => $alias
        ));
        $where = array(
            'lang'=>$this->language,
            'cate'=>$data['cate_curent']->id
        );
        $data['so_phantrang'] = $this->m_media->getField('config_pagination','width,height,pagination',array('lang' => $this->language,'name_table'=>'media_category'));

        $config['page_query_string'] = TRUE;
        $config['enable_query_string'] = TRUE;
        $config['base_url'] = base_url($alias.'?');
        $config['total_rows'] = $this->m_media->count_listmedia('media_category',$where); // xác định tổng số record
        $config['per_page'] =@$data['so_phantrang']->pagination; // xác định số record ở mỗi trang
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

        $data['news_bycate'] = $this->m_media->getListMedia($where,$config['per_page'], $this->input->get('per_page'));
        $seo=array('title'=>@$data['cate_curent']->title_seo==''?$data['cate_curent']->name:$data['cate_curent']->title_seo,
            'description'=>@$data['cate_curent']->description_seo,
            'keyword'=>@$data['cate_curent']->keyword_seo,
        );
        $this->LoadHeader(null,$seo,true);
        $this->load->view('medias/category',$data);
        $this->LoadFooter();
    }
    public function detail($alias)
    {
       
        $data = array();

        $data['media'] = $media = $this->m_media->getField('media','alias,id,category_id,name,description,content,link,view,image,description_seo,keyword_seo,title_seo',array(
            'alias'=>$alias,
        ),array(),true);

        $data['cate_current'] = $cate_current = $this->m_media->getField('media_category','id,name,alias',array(
                'id'=>$data['media']->category_id),
            array(),true);
        if(empty($cate_current)){
            show_error('Mục này chưa được trỏ danh mục');
        }
        if(!$this->session->userdata('session_'.$media->id)){
            $this->session->set_userdata('session_'.$media->id,1);
            $view = 1;
        }
        else{
            $view = 0;
        }
        $view = $media->view + $view;
        $this->m_media->Update('media',$media->id,array(
            'view' => $view
        ));
        //var_dump($data['news']);die();
        $config['page_query_string']    = TRUE;
        $config['enable_query_strings'] = TRUE;
        $config['base_url'] = base_url($alias.'?');
        $config['per_page'] = 12; // xác định số record ở mỗi trang
        $config['uri_segment'] = 3; // xác định segment chứa page number
        $config['total_rows'] = $this->m_media->count_listmedia(array(
            'media_category.id' => $cate_current->id,
            'media.id !=' => $media->id
        )); // xác định tổng số record
        $config=array_merge($config,$this->pagination_config);
        $this->pagination->initialize($config);
        //echo "<pre>";var_dump($data['images']);die();
        $data['lists'] = $this->m_media->getListMedia(array(
            'media_category.id' => $cate_current->id,
            'media.id !=' => $media->id
        ),$config['per_page'],$this->input->get('per_page'));
        $seo=array('title'=>@$data['media']->title_seo==''?$data['media']->name:$data['media']->title_seo,
            'description'=>@$data['media']->description_seo,
            'keyword'=>@$data['media']->keyword_seo,
            'image'=>@$data['media']->image,
            'type'=>'article');
        $this->LoadHeader(null,$seo,true);
        $this->load->view('medias/detail',$data);
        $this->LoadFooter();
    }
    public function upview_ajax(){
        $id = $this->input->post('id');
        if(isset($id)){
            $item = $this->m_media->getFirstRowWhere('images',array(
                'id' => $id
            ));
            $view = $item->name + 1;
            $this->m_media->Update_where('images',array('id' => $id),array('name' => $view));
        }
    }
}