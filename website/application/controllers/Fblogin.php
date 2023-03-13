<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/facebook/facebook.php';
class Fblogin extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('f_usersmodel');
    }
    public function login(){

        $facebook = new Facebook(array(
            'appId'  => '1446442305372089',
            'secret' => '612c60bbba8e4a71c71be851597620bb',
            'cookie' => true,
        ));
        $user =  $facebook->getUser();
        if($user) {
            try {
                $user_profile =  $facebook->api('/me',array('fields' => 'id,email,first_name,last_name,picture,gender,birthday,languages'));
                $data['user_profile'] = @$user_profile;

                $user_info = $this->checkUser('facebook',(int)$user_profile['id'],$user_profile['first_name'],$user_profile['last_name'],$user_profile['email'],$user_profile['gender'],$user_profile['picture']['data']['url']);
                //echo "<pre>";var_dump(@$user_profile);die();
                if(!empty($user_info)){
                    $userData['oauth_provider'] = 'facebook';
                    $userData['oauth_uid'] = $user_info->id;
                    $userData['first_name'] = $user_info->first_name;
                    $userData['last_name'] = $user_info->last_name;
                    $userData['email'] = $user_info->email;
                    $userData['picture_url'] = $user_info->picture_url;
                    $this->session->set_userdata('userData',$userData);
                }
                redirect(base_url());
                if($this->session->userData('userData')){
                    echo '<script>window.close();
                window.opener.location.reload();</script>';
                }
            } catch (FacebookApiException $e) {
                error_log($e);
                $user = null;
            }
        }
        redirect(base_url());
    }
    public function checkUser($oauth_provider,$oauth_uid,$fname,$lname,$email,$gender,$picture){
        $fullname = $fname.$lname;
        $prev_query = $this->f_usersmodel->getFirstRowWhere('users',array(
            'oauth_provider' => $oauth_provider,
            'oauth_uid' => $oauth_uid
        ));

        if(!empty($prev_query)){
            $this->f_usersmodel->Update_where('users',array(
                'oauth_provider' => $oauth_provider,
                'oauth_uid' => $oauth_uid,
            ),array(
                'oauth_provider' => $oauth_provider,
                'oauth_uid' => (int)$oauth_uid,
                'first_name' => $fname,
                'last_name' => $lname,
                'email' => $email,
                'gender' => $gender,
                'picture_url' => $picture,
                'modified' => date("Y-m-d H:i:s")
            ));
        }else{
            $this->f_usersmodel->Add('users',array(
                'oauth_provider' => $oauth_provider,
                'oauth_uid' => (int) $oauth_uid,
                'first_name' => $fname,
                'last_name' => $lname,
                'email' => $email,
                'gender' => $gender,
                'picture_url' => $picture,
                'created' => date("Y-m-d H:i:s")
            ));
        }

        $result = $this->f_usersmodel->getFirstRowWhere('users',array(
            'oauth_provider' => $oauth_provider,
            'oauth_uid' => $oauth_uid
        ));
        return $result;
    }
}