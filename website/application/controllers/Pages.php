<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class Pages extends MY_Controller
    {

        function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
        }
		public function page_content($alias){
			$data = array();
			$data['page']=$this->system_model->getField('staticpage','name,alias,description,content,id,title_seo,description_seo,keyword_seo,image',array(
				'alias'=>$alias,
				'lang' => $this->language
			),array(),true);

      
            $seo=array('title'=>@$data['page']->title_seo==''?$data['page']->name:$data['page']->title_seo,
            'description'=>@$data['page']->description_seo,
            'keyword'=>@$data['page']->keyword_seo,
            'image'=>@$data['page']->image,
            'type'=>'page');
			 
			$this->LoadHeader(null,$seo,false);
			$this->load->view('page/view_page',$data);
			$this->LoadFooter();
		  }

 


    }
