<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cat_news_home_widget extends MY_Widget
{
    // Nhận 2 biến truyền vào
    function index(){
        
		$this->load->model('f_homemodel');

        $data['cate_all'] = $this->system_model->get_data('news_category',array(
            //'home' => 1,
            'lang' => $this->language,
            'parent_id' => 0,
            'home' => 1,
        ),array('sort' => 'desc'));

        if (isset($data['cate_all'])) {
            foreach ($data['cate_all'] as $key => $cat) {
                $data['cate_all'][$key]->news = $this->system_model->getNewsByCategory($cat->id, array(
                    //'home' =cate_all
                    'news.lang' => $this->language,
                    'news.focus' => 1,
                ), 3, 0);
            }
        }
		//var_dump($data['cate_all']);;die;
	    $this->load->view('view',$data);
    }
}