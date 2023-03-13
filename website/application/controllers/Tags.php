<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Tags extends MY_Controller
{
    function __construct()
    {
        
        parent::__construct();
        $CI =& get_instance();
        $this->load->model('tag_model');
        $this->load->library('pagination');
    }
    protected $pagination_config= array(
        'full_tag_open'=>"<ul class='pagination phantrang'>",
        'full_tag_close'=>"</ul>",
        'first_link' => 'Trang đầu',
        'last_link' => 'Trang cuối',
        'num_links' => 2,
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
    //product tags
    public function tags_pro($alias){        
        $data = array();
        $data['item'] = $item = $this->system_model->getField('tags','id,name,alias,title_seo,keyword_seo,description_seo', array(
            'alias' => $alias,), array(), true);
        $config['page_query_string'] = TRUE;
        $config['enable_query_string'] = TRUE;
        $config['base_url'] = base_url('tags-pro/'.$alias.'?');
        $config['total_rows'] = $this->tag_model->count_list_protag($item->id); // xác định 
        $config['per_page'] = 16; // xác định số record ở mỗi trang
        $config['uri_segment'] = 4; // xác định segment chứa page number
        $config=array_merge($config,$this->pagination_config);
        $this->pagination->initialize($config);
        $data['lists'] = $this->tag_model->getListTagpro($item->id,$config['per_page'], $this->input->get('per_page'));
        $data['home_left']=$this->load->widget('home_left');
        $seo=array('title'=>@$data['item']->title_seo==''
         || @$data['item']->title_seo== '0' ?$data['item']->name:$data['item']->title_seo,
                   'description'=>@$data['item']->description_seo,
                   'keyword'=>@$data['item']->keyword_seo == ''?strip_tags($data['item']->name):$data['item']->keyword_seo,
                   'type'=>'tags');
        $this->LoadHeader(null,$seo,true);
        $this->load->view('tags/pro_bytags',$data);
        $this->LoadFooter();
    }
    public function tags_new($alias){        
        $data = array();
        $data['item'] = $item = $this->system_model->getField('tags_news','id,name,alias,title_seo,keyword_seo,description_seo', array('alias' => $alias,), array(), true);
        $config['page_query_string'] = TRUE;
        $config['enable_query_string'] = TRUE;
        $config['base_url'] = base_url('tags-pro/'.$alias.'?');
        $config['total_rows'] = $this->tag_model->count_list_newtag($item->id); // xác định 
        $config['per_page'] = 16; // xác định số record ở mỗi trang
        $config['uri_segment'] = 4; // xác định segment chứa page number
        $config=array_merge($config,$this->pagination_config);
        $this->pagination->initialize($config);
        $data['lists'] = $this->tag_model->getListTagnew($item->id,$config['per_page'], $this->input->get('per_page'));       
        $seo=array('title'=>@$data['item']->title_seo==''
         || @$data['item']->title_seo== '0' ?$data['item']->name:$data['item']->title_seo,
                   'description'=>@$data['item']->description_seo == ''?strip_tags(base64_decode($data['item']->description)):@$data['item']->description_seo,
                   'keyword'=>@$data['item']->keyword_seo == ''?strip_tags($data['item']->name):$data['item']->keyword_seo,
                   'image'=> '',
                   'type'=>'tags');        
        $this->LoadHeader(null,$seo,true);
        $this->load->view('tags/news_bytags',$data);
        $this->LoadFooter();
    }
}