<?php defined('BASEPATH') OR exit('No direct script access allowed.');

if (!function_exists('valid_email')) {

    // This function has been borrowed from PHPMailer Version 5.2.9.
    /**
     * Check that a string looks like an email address.
     * @param string $address The email address to check
     * @param string $patternselect A selector for the validation pattern to use :
     * * `auto` Pick strictest one automatically;
     * * `pcre8` Use the squiloople.com pattern, requires PCRE > 8.0, PHP >= 5.3.2, 5.2.14;
     * * `pcre` Use old PCRE implementation;
     * * `php` Use PHP built-in FILTER_VALIDATE_EMAIL; same as pcre8 but does not allow 'dotless' domains;
     * * `html5` Use the pattern given by the HTML5 spec for 'email' type form input elements.
     * * `noregex` Don't use a regex: super fast, really dumb.
     * @return boolean
     * @static
     * @access public
     */
    // Modified by Ivan Tcholakov, 24-DEC-2013.
    //public static function validateAddress($address, $patternselect = 'auto')
    //{
    function valid_email($address) {
        $patternselect = 'auto';
    //

        if (!$patternselect or $patternselect == 'auto') {
            //Check this constant first so it works when extension_loaded() is disabled by safe mode
            //Constant was added in PHP 5.2.4
            if (defined('PCRE_VERSION')) {
                //This pattern can get stuck in a recursive loop in PCRE <= 8.0.2
                if (version_compare(PCRE_VERSION, '8.0.3') >= 0) {
                    $patternselect = 'pcre8';
                } else {
                    $patternselect = 'pcre';
                }
            } elseif (function_exists('extension_loaded') and extension_loaded('pcre')) {
                //Fall back to older PCRE
                $patternselect = 'pcre';
            } else {
                //Filter_var appeared in PHP 5.2.0 and does not require the PCRE extension
                if (version_compare(PHP_VERSION, '5.2.0') >= 0) {
                    $patternselect = 'php';
                } else {
                    $patternselect = 'noregex';
                }
            }
        }
        switch ($patternselect) {
            case 'pcre8':
                /**
                 * Uses the same RFC5322 regex on which FILTER_VALIDATE_EMAIL is based, but allows dotless domains.
                 * @link http://squiloople.com/2009/12/20/email-address-validation/
                 * @copyright 2009-2010 Michael Rushton
                 * Feel free to use and redistribute this code. But please keep this copyright notice.
                 */
                return (boolean)preg_match(
                    '/^(?!(?>(?1)"?(?>\\\[ -~]|[^"])"?(?1)){255,})(?!(?>(?1)"?(?>\\\[ -~]|[^"])"?(?1)){65,}@)' .
                    '((?>(?>(?>((?>(?>(?>\x0D\x0A)?[\t ])+|(?>[\t ]*\x0D\x0A)?[\t ]+)?)(\((?>(?2)' .
                    '(?>[\x01-\x08\x0B\x0C\x0E-\'*-\[\]-\x7F]|\\\[\x00-\x7F]|(?3)))*(?2)\)))+(?2))|(?2))?)' .
                    '([!#-\'*+\/-9=?^-~-]+|"(?>(?2)(?>[\x01-\x08\x0B\x0C\x0E-!#-\[\]-\x7F]|\\\[\x00-\x7F]))*' .
                    '(?2)")(?>(?1)\.(?1)(?4))*(?1)@(?!(?1)[a-z0-9-]{64,})(?1)(?>([a-z0-9](?>[a-z0-9-]*[a-z0-9])?)' .
                    '(?>(?1)\.(?!(?1)[a-z0-9-]{64,})(?1)(?5)){0,126}|\[(?:(?>IPv6:(?>([a-f0-9]{1,4})(?>:(?6)){7}' .
                    '|(?!(?:.*[a-f0-9][:\]]){8,})((?6)(?>:(?6)){0,6})?::(?7)?))|(?>(?>IPv6:(?>(?6)(?>:(?6)){5}:' .
                    '|(?!(?:.*[a-f0-9]:){6,})(?8)?::(?>((?6)(?>:(?6)){0,4}):)?))?(25[0-5]|2[0-4][0-9]|1[0-9]{2}' .
                    '|[1-9]?[0-9])(?>\.(?9)){3}))\])(?1)$/isD',
                    $address
                );
            case 'pcre':
                //An older regex that doesn't need a recent PCRE
                return (boolean)preg_match(
                    '/^(?!(?>"?(?>\\\[ -~]|[^"])"?){255,})(?!(?>"?(?>\\\[ -~]|[^"])"?){65,}@)(?>' .
                    '[!#-\'*+\/-9=?^-~-]+|"(?>(?>[\x01-\x08\x0B\x0C\x0E-!#-\[\]-\x7F]|\\\[\x00-\xFF]))*")' .
                    '(?>\.(?>[!#-\'*+\/-9=?^-~-]+|"(?>(?>[\x01-\x08\x0B\x0C\x0E-!#-\[\]-\x7F]|\\\[\x00-\xFF]))*"))*' .
                    '@(?>(?![a-z0-9-]{64,})(?>[a-z0-9](?>[a-z0-9-]*[a-z0-9])?)(?>\.(?![a-z0-9-]{64,})' .
                    '(?>[a-z0-9](?>[a-z0-9-]*[a-z0-9])?)){0,126}|\[(?:(?>IPv6:(?>(?>[a-f0-9]{1,4})(?>:' .
                    '[a-f0-9]{1,4}){7}|(?!(?:.*[a-f0-9][:\]]){8,})(?>[a-f0-9]{1,4}(?>:[a-f0-9]{1,4}){0,6})?' .
                    '::(?>[a-f0-9]{1,4}(?>:[a-f0-9]{1,4}){0,6})?))|(?>(?>IPv6:(?>[a-f0-9]{1,4}(?>:' .
                    '[a-f0-9]{1,4}){5}:|(?!(?:.*[a-f0-9]:){6,})(?>[a-f0-9]{1,4}(?>:[a-f0-9]{1,4}){0,4})?' .
                    '::(?>(?:[a-f0-9]{1,4}(?>:[a-f0-9]{1,4}){0,4}):)?))?(?>25[0-5]|2[0-4][0-9]|1[0-9]{2}' .
                    '|[1-9]?[0-9])(?>\.(?>25[0-5]|2[0-4][0-9]|1[0-9]{2}|[1-9]?[0-9])){3}))\])$/isD',
                    $address
                );
            case 'html5':
                /**
                 * This is the pattern used in the HTML5 spec for validation of 'email' type form input elements.
                 * @link http://www.whatwg.org/specs/web-apps/current-work/#e-mail-state-(type=email)
                 */
                return (boolean)preg_match(
                    '/^[a-zA-Z0-9.!#$%&\'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}' .
                    '[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/sD',
                    $address
                );
            case 'noregex':
                //No PCRE! Do something _very_ approximate!
                //Check the address is 3 chars or longer and contains an @ that's not the first or last char
                return (strlen($address) >= 3
                    and strpos($address, '@') >= 1
                    and strpos($address, '@') != strlen($address) - 1);
            case 'php':
            default:
                return (boolean)filter_var($address, FILTER_VALIDATE_EMAIL);
        }
    }

}

if (!function_exists('name_email_format')) {

    function name_email_format($name, $email) {
        return $name.' <'.$email.'>';
    }

}

if (!function_exists('sms_send')) {

    function sms_send($phone=null,$Content='SMS KTV-Việt',$type='4')
    {   
        //API SMS -  http://esms.vn/
          
        $APIKey="824AEC6496267DE4E409A3CAFB555A";
        $SecretKey="0E8EF5EE78314CF238FA33B00FFA66";
        //$phone="0974901590";
        if(empty($phone)){
            return false;
        }
        
        $SendContent=urlencode($Content);
        $data="http://rest.esms.vn/MainService.svc/json/SendMultipleMessage_V4_get?Phone=$phone&ApiKey=$APIKey&SecretKey=$SecretKey&Content=$SendContent&SmsType=$type";
        // gửi yêu cầu 
        $curl = curl_init($data); 
        curl_setopt($curl, CURLOPT_FAILONERROR, true); 
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true); 
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
        $result = curl_exec($curl); 
        // sử lý kết quả trả về 
        $obj = json_decode($result,true);
          if($obj['CodeResult']==100)
        {
            $arr = array();
            $arr['result']  = $obj['CodeResult'];
            $arr['count']   = $obj['CountRegenerate'];
            $arr['phone']   = $phone;
            $arr['content'] = $Content;
            $arr['smsid']   = $obj['SMSID'];
            $arr['create_at'] = date("Y-m-d H:i:s");
            return $arr;
        }
        else
        {
            //print "ErrorMessage:".$obj['ErrorMessage'];
            $arr = array();
            $arr['result']  = $obj['CodeResult'];
            $arr['count']   = $obj['CountRegenerate'];
            $arr['phone']   = $phone;
            $arr['content'] = $Content;
            $arr['smsid']   = null;
            $arr['error'] = $obj['ErrorMessage'];
            $arr['create_at'] = date("Y-m-d H:i:s");
            return $arr;
        }
    }
}
// chen text vào ảnh
if (!function_exists('add_water_mark')) {	
    function add_water_mark($link, $text ='Techtology4.0.vn',$color = 'ed1c24',$size = 10) {       
        $CI =& get_instance();
		$CI->load->library('image_lib');		
        // get file width height
        list($width, $height) = getimagesize($link);
        $textsize = ($height/100)*$size ;
        $pading = ($height/100)*2; // cách viền 2 %
        $config['source_image'] = $link;
        $config['wm_text'] = $text;
        $config['wm_type'] = 'text';
        $config['wm_font_color'] = $color;
        $config['wm_font_path'] = './system/fonts/UTM AvoBold.ttf';
        $config['wm_font_size'] = $textsize;
        $config['wm_padding'] = $pading;
        $config['wm_opacity'] = '40';
        $config['wm_vrt_alignment'] = 'middle';
        $config['wm_hor_alignment'] = 'center';		
        $CI->image_lib->initialize($config);		
        return $CI->image_lib->watermark();
    }

}

// remove dir 
if (!function_exists('deleteDir')) {

    function deleteDir($path) {
    if (empty($path)) { 
        return false;
    }
    return is_file($path) ?
            @unlink($path) :
            array_map(__FUNCTION__, glob($path.'/*')) == @rmdir($path);
    }

}


if (!function_exists('send_mail_api')) {
  
    function send_mail_api($receiver_email, $subject ='Gửi Thư',$title ='Gửi EMail',$body = 'Gửi Thu Content') {
        $ch = curl_init(); 
        $url = base_url()+'home/sendmail_api';
        $receiver_email=urlencode($receiver_email);
        $subject=urlencode($subject);
        $title=urlencode($title);
        $body=urlencode($body);
        $api = urlencode('abc@123');
        // set url get 
        $url .= '?email='.$receiver_email;
        $url .= '&subject='.$subject;
        $url .= '&title='.$title;
        $url .= '&body='.$body;
        $url .= '&api='.$api;
        curl_setopt($ch, CURLOPT_URL, $url); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $output = curl_exec($ch); 
        $return = json_decode($output);
        return $return['status']; 
        //echo $output;
        curl_close($ch);  
    }

}