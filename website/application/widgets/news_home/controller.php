<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_home_widget extends MY_Widget
{
    // Nhận 2 biến truyền vào
    function index(){
//        $data['cate_news'] = $this->system_model->getField('news_category','id,name,description,alias',array(
//            'lang' => $this->language,
//            'home' => 1,
//        ));
//        if (is_array($data['cate_news']) &&  count($data['cate_news'])) {
//            $data['newss'] = $this->system_model->getNewsByCategory($data['cate_news']->id,array(
//                      //'home' => 1,
//              'news.lang' => $this->language,
//              'news.home' => 1,
//          ),10,0);
//        }
//
//        $data['cate_news_2'] = $this->system_model->get_data('news_category',array(
//            'lang' => $this->language,
//            'home' => 1,
//        ));
//
//
//        if (is_array($data['cate_news_2'])) {
//            foreach ($data['cate_news_2']  as $key => $cate_news) {
//               $data['cate_news_2'][$key]->news = $this->system_model->getNewsByCategory($cate_news->id,array(
//                    //'home' => 1,
//                'news.lang' => $this->language,
//                'news.home' => 1,
//            ),4,0);
//           }
//
//           //var_dump($data['cate_news']);die;
//       }

       
      $data['news']= $this->system_model->get_data('news',array(
            'lang' => $this->language,
            'home' => 1,
        ));

        if (is_array($data['news'])) {
            foreach ($data['news']  as $key => $item) {
                $category = $this->system_model->getField('news_category','id,name,alias',array(
                    'id'=>$item->category_id),
                    array(),true);
                $data['news'][$key]->category_name =  $category->name;
                $data['news'][$key]->category_alias =  $category->alias;
            }
        }

       $this->load->view('view',$data);
   }
}