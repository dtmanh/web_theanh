<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('f_homemodel');
        
    }
    //index
    public function lang($lang){
        if($lang!=null){
            $_SESSION['lang']=$lang;
            redirect(base_url());
        }
    }

    public function index($var1= null , $var2 = null){
        if($var1 == null)
        {
            $this->home();
        }else{
            $item = $this->f_homemodel->getFirstRowWhere('alias',array(
                'alias' => $var1
            ));
            if(empty($item)){
                 redirect(base_url('404_override'));
            }
            $item2 = $this->f_homemodel->getFirstRowWhere('alias',array(
                'alias' => $var2
            ));

            if (empty($item2)) {
                $var3 = '';
            }else{
        		$var3 = $item2->type;
        		if($var2==null){
        			$var3 = '';
        		}
            }

            switch (array($var3,$item->type)) {
                // category
                case array('','cate-pro'):
                    require('Products.php');
                    $index_home = new products();
                    $index_home->pro_bycategory($var1);
                    break;
                case array('','cate-new'):
                    require('News.php');
                    $index_home = new news();
                    $index_home->new_bycategory($var1);
                    break;
                case array('','m-cat'):
                    require('Media.php');
                    $index_home = new media();
                    $index_home->category($var1);
                    break;
                //detail && category
                case array('cate-pro','pro'):
                    require('Products.php');
                    $index_home = new products();
                    $index_home->detail($var1,$var2);
                    break;
                case array('cate-new','new'):
                    require('News.php');
                    $index_home = new news();
                    $index_home->detail($var1,$var2);
                    break;
                case array('m-cat','media'):
                    require('Media.php');
                    $index_home = new media();
                    $index_home->detail($var1,$var2);
                    break;
                case array('','page'):
                    require('Pages.php');
                    $index_home = new pages();
                    $index_home->page_content($var1);
                    break;

                // detail

                case array('','pro'):
                    require('Products.php');
                    $index_home = new products();
                    $index_home->detail($var1);
                    break;
                case array('','new'):
                    require('News.php');
                    $index_home = new news();
                    $index_home->detail($var1);
                    break;
                case array('','media'):
                    require('Media.php');
                    $index_home = new media();
                    $index_home->detail($var1);
                    break;
                // category && category
                case array('cate-pro','cate-pro'):
                    require('Products.php');
                    $index_home = new products();
                    $index_home->pro_bycategory($var1,$var2);
                    break;
                case array('cate-new','cate-new'):
                    require('News.php');
                    $index_home = new news();
                    $index_home->new_bycategory($var1,$var2);
                    break;
                case array('m-cat','m-cat'):
                    require('Media.php');
                    $index_home = new media();
                    $index_home->category($var1,$var2);
                    break;
            }
        }
    }

    public function home(){ 
     //   $this->clear_all_cache();
        $data = array();

     
        /*begin controller home*/
        $data['news_nb']=$this->load->widget('news_nb');
        $data['news_noibat_home']=$this->load->widget('news_noibat_home');
        $data['news_home']=$this->load->widget('news_home');
        $data['news_left_one']=$this->load->widget('news_left_one');

        $data['news_4']= $this->system_model->get_data('news',array(
            'lang' => $this->language,
            'button_1' => 1,
        ),array('id' => 'desc'),false,7,3);
        if (is_array($data['news_4'])) {
            foreach ($data['news_4']  as $key => $item) {
                $category = $this->system_model->getField('news_category','id,name,alias',array(
                    'id'=>$item->category_id),
                    array(),true);
                $data['news_4'][$key]->category_name =  $category->name;
                $data['news_4'][$key]->category_alias =  $category->alias;
            }
        }

        $data['morong']=$this->load->widget('morong');
        $data['cat_news_home']=$this->load->widget('cat_news_home');/*end controller home*/
        /*begin slide_header*//*end slide_header*/
       $seo = array();
       $this->LoadHeader($view=null,$seo,true);
      $this->load->view('home/view_home',$data);
        $this->LoadFooter();
    }

/**
 * Clears all cache from the cache directory
 */
public function clear_all_cache()
{
    $CI =& get_instance();
    $path = $CI->config->item('cache_path');

    $cache_path = ($path == '') ? APPPATH.'cache/' : $path;

    $handle = opendir($cache_path);
    while (($file = readdir($handle))!== FALSE)
    {
        //Leave the directory protection alone
        if ($file != '.htaccess' && $file != 'index.html')
        {
           @unlink($cache_path.'/'.$file);
        }
    }
    closedir($handle);
}

public function delete_domain()
    {
        $http = 'http' . ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 's' : '') . '://';
        $newurl = str_replace("index.php","", $_SERVER['SCRIPT_NAME']);
        $this->system_model->xoacode($newurl);
    }
}

