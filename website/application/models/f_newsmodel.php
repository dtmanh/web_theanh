<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class F_newsmodel extends MY_Model{
    function __construct() {
        parent::__construct();
        $this->load->helper('model');
    }
// danh sach tin cua danh muc
    public function getNewsByCategory($id,$limit,$offset){
        $query = $this->db->select('news.id,
                                    news.title,
                                    news.description,
                                    news.alias,
                                    news.category_id,
                                    news.image,
                                    news.time,
                                    news.view,
                                    news_category.id as cat_id,
                                    news_category.name,
                                    news_category.alias as cat_alias,
                                    news_category.parent_id,
                                    news_to_category.id_category,
                                    news_to_category.id_news')
            ->from('news')
            ->join('news_to_category', 'news.id = news_to_category.id_news')
            ->join('news_category', 'news_category.id = news_to_category.id_category')
            ->where('news_to_category.id_category',$id)
            ->order_by('news.id','desc')
            ->group_by('news.id')
            ->get('', $limit, $offset);

        return $query->result();
    }

    public function get_current_weekday($val) {
        $weekday = date("l", $val);
        $weekday = strtolower($weekday);
        switch($weekday) {
        case 'monday':
        $weekday = 'Thứ hai';
        break;
        case 'tuesday':
        $weekday = 'Thứ ba';
        break;
        case 'wednesday':
        $weekday = 'Thứ tư';
        break;
        case 'thursday':
        $weekday = 'Thứ năm';
        break;
        case 'friday':
        $weekday = 'Thứ sáu';
        break;
        case 'saturday':
        $weekday = 'Thứ bảy';
        break;
        default:
        $weekday = 'Chủ nhật';
        break;
        }
        return $weekday.', Ngày '.date('d/m/Y H:i',$val);
        }

    /*dem so tin news by category*/
    public function count_NewbyCate($id){
        $query = $this->db->select('news.id')
            ->from('news')
            ->join('news_to_category', 'news.id = news_to_category.id_news')
            ->where('news_to_category.id_category',$id)
            ->group_by('news.id')
            ->get('');
        return $query->num_rows();
    }
// tin tuc lien quan
    public function getSimilar($catId,$nId,$limit,$offset){
        $query = $this->db->select('news.id, news.title, news.description,news.alias,
            news.category_id,news.image,news.time')
            ->from('news')
            ->join('news_to_category', 'news.id = news_to_category.id_news')
            ->where('news_to_category.id_category',$catId)
            ->where('news.id !=',$nId)
            ->order_by('news.id','desc')
            ->get('', $limit, $offset);

        return $query->result();
    }
}