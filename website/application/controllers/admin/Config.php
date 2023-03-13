<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Config extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if(!$this->check->is_logined($this->session->userdata('sessionUserAdmin'), $this->session->userdata('sessionGroupAdmin')))
        {
            redirect(base_url().'techadmin', 'location');
            die();
        }
    
        $this->load->library('filter');
    }
    public function index()
    {
        require_once APPPATH . 'config/setting.php';

        if(file_exists('application/config/setting.php') && class_exists('Setting'))
        {
            if($this->input->post('form-config'))
            {
                $this->load->helper('file');
                $config = '<?php'."\n";
                $config .= "if(!defined('BASEPATH'))exit('No direct script access allowed');"."\n";
                $config .= '/**'."\n";
                $config .= ' *Class Setting: Luu tat ca cac cau hinh'."\n";
                $config .= '**/'."\n";
                $config .= 'class Setting'."\n";
                $config .= '{'."\n";
                #Hiển thị trang chủ
                $config .= '#Hien thi trang chu'."\n";
                $config .= "const store_focus = '".$this->filter->clear($this->input->post('store_focus'))."';"."\n";
                $config .= "const top_cat = '".$this->filter->clear($this->input->post('top_cat'))."';"."\n";
                $config .= "const list_brand = '".$this->filter->clear($this->input->post('list_brand'))."';"."\n";
                $config .= "const list_cate = '".$this->filter->clear($this->input->post('list_cate'))."';"."\n";
                $config .= "const social_title = '".$this->filter->clear($this->input->post('social_title'))."';"."\n";
                $config .= "const hotline_support = '".$this->filter->clear($this->input->post('hotline_support'))."';"."\n";
                $config .= "const tile_get_mail = '".$this->filter->clear($this->input->post('tile_get_mail'))."';"."\n";
                $config .= "const top_brand = '".$this->filter->clear($this->input->post('top_brand'))."';"."\n";
                $config .= "const title_pro_sale = '".$this->filter->clear($this->input->post('title_pro_sale'))."';"."\n";
                $config .= "const copy_right = '".$this->filter->clear($this->input->post('copy_right'))."';"."\n";
                $config .= "const deal_hot = '".$this->filter->clear($this->input->post('deal_hot'))."';"."\n";
                $config .= '}';
                write_file('application/config/setting.php', $config);
                redirect($_SERVER['HTTP_REFERER']);
            }
            #Hiển thị trang chủ
            $data['store_focus'] = @Setting::store_focus;
            $data['top_cat'] = @Setting::top_cat;
            $data['list_brand'] = @Setting::list_brand;
            $data['list_cate'] = @Setting::list_cate;
            $data['social_title'] = @Setting::social_title;
            $data['hotline_support'] = @Setting::hotline_support;
            $data['tile_get_mail'] = @Setting::tile_get_mail;
            $data['top_brand'] = @Setting::top_brand;
            $data['title_pro_sale'] = @Setting::title_pro_sale;
            $data['copy_right'] = @Setting::copy_right;
            $data['deal_hot'] = @Setting::deal_hot;
            //
        }
        $data['headerTitle'] = "Cấu hình chung";
        $this->load->view('admin/header', $data);
        $this->load->view('admin/configs/defaults', $data);
        $this->load->view('admin/footer');
    }
}