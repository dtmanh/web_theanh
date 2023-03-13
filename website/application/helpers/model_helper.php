<?php
// tao alias
if (!function_exists('make_alias')){
    function make_alias($str){
        $cleaner = array(
            'â'		=> 'a', 'Â'		=> 'A',
            'ă'		=> 'a', 'Ă'		=> 'A',
            'ạ'		=> 'a', 'Ạ'		=> 'A',
            'á'		=> 'a', 'Á'		=> 'A',
            'à'		=> 'a', 'À'		=> 'A',
            'ả'		=> 'a', 'Ả'		=> 'A',
            'ã'		=> 'a',	'Ã'		=> 'A',
            'ậ'		=> 'a', 'Ậ'		=> 'A',
            'ấ'		=> 'a', 'Ấ'		=> 'A',
            'ầ'		=> 'a', 'Ầ'		=> 'A',
            'ẩ'		=> 'a', 'Ẩ'		=> 'A',
            'ẫ'		=> 'a',	'Ẫ'		=> 'A',
            'ặ'		=> 'a', 'Ặ'		=> 'A',
            'ắ'		=> 'a', 'Ắ'		=> 'A',
            'ằ'		=> 'a', 'Ằ'		=> 'A',
            'ẳ'		=> 'a', 'Ẳ'		=> 'A',
            'ẵ'		=> 'a',	'Ẵ'		=> 'A',

            'đ'		=> 'd', 'Đ'		=> 'D',

            'ê'		=> 'e',	'Ê'		=> 'E',
            'é'		=> 'e',	'É'		=> 'E',
            'è'		=> 'e',	'È'		=> 'E',
            'ẹ'		=> 'e',	'Ẹ'		=> 'E',
            'ẻ'		=> 'e',	'Ẻ'		=> 'E',
            'ẽ'		=> 'e',	'Ẽ'		=> 'E',
            'ế'		=> 'e',	'Ế'		=> 'E',
            'ề'		=> 'e',	'Ề'		=> 'E',
            'ệ'		=> 'e',	'Ệ'		=> 'E',
            'ể'		=> 'e',	'Ể'		=> 'E',
            'ễ'		=> 'e',	'Ễ'		=> 'E',

            'í'		=> 'i', 'Í'		=> 'I',
            'ì'		=> 'i', 'Ì'		=> 'I',
            'ị'		=> 'i', 'Ị'		=> 'I',
            'ỉ'		=> 'i', 'Ỉ'		=> 'I',
            'ĩ'		=> 'i', 'Ĩ'		=> 'I',

            'ô'		=> 'o',	'Ô'		=> 'O',
            'ơ'		=> 'o',	'Ơ'		=> 'O',
            'ó'		=> 'o',	'Ó'		=> 'O',
            'ò'		=> 'o',	'Ò'		=> 'O',
            'ọ'		=> 'o',	'Ọ'		=> 'O',
            'ỏ'		=> 'o',	'Ỏ'		=> 'O',
            'õ'		=> 'o',	'Õ'		=> 'O',
            'ố'		=> 'o',	'Ố'		=> 'O',
            'ồ'		=> 'o',	'Ồ'		=> 'O',
            'ộ'		=> 'o',	'Ộ'		=> 'O',
            'ổ'		=> 'o',	'Ổ'		=> 'O',
            'ỗ'		=> 'o',	'Ỗ'		=> 'O',
            'ớ'		=> 'o',	'Ớ'		=> 'O',
            'ờ'		=> 'o',	'Ờ'		=> 'O',
            'ợ'		=> 'o',	'Ợ'		=> 'O',
            'ở'		=> 'o',	'Ở'		=> 'O',
            'ỡ'		=> 'o',	'Ỡ'		=> 'O',

            'ư'		=> 'u',	'Ư'		=> 'U',
            'ú'		=> 'u',	'Ú'		=> 'U',
            'ù'		=> 'u',	'Ù'		=> 'U',
            'ụ'		=> 'u',	'Ụ'		=> 'U',
            'ủ'		=> 'u',	'Ủ'		=> 'U',
            'ũ'		=> 'u',	'Ũ'		=> 'U',
            'ứ'		=> 'u',	'Ứ'		=> 'U',
            'ừ'		=> 'u',	'Ừ'		=> 'U',
            'ự'		=> 'u',	'Ự'		=> 'U',
            'ử'		=> 'u',	'Ử'		=> 'U',
            'ữ'		=> 'u',	'Ữ'		=> 'U',

            'ý'		=> 'y',	'Ý'		=> 'Y',
            'ỳ'		=> 'y',	'Ỳ'		=> 'Y',
            'ỵ'		=> 'y',	'Ỵ'		=> 'Y',
            'ỷ'		=> 'y',	'Ỷ'		=> 'Y',
            'ỹ'		=> 'y',	'Ỹ'		=> 'Y'
        );

        $result = $str;

        foreach ($cleaner as $a => $v){
            $result = str_replace($a, $v, $result);
        }

        $result = @iconv('UTF-8','ASCII//TRANSLIT',$result);

        $result = preg_replace("/[^a-zA-Z0-9\/_| -]/", '', $result);
        $result = strtolower(trim($result, '-'));
        $result = preg_replace("/[\/_| -]+/", '-', $result);
        while (strstr($result,'--')){
            $result = str_replace('--','-',$result);
        }
        $result = trim($result,'-');

        return $result;
    }

}

// ham cat chuỗi
if (!function_exists('LimitString')){

    function LimitString($chuoi,$gioihan,$etc="..."){
        if(strlen($chuoi)<=$gioihan)
        {
            return $chuoi;
        }
        else{
            if(strpos($chuoi," ",$gioihan) > $gioihan){
                $new_gioihan=strpos($chuoi," ",$gioihan);
                $new_chuoi = substr($chuoi,0,$new_gioihan).$etc;
                return $new_chuoi;
            }
            $new_chuoi = substr($chuoi,0,$gioihan).$etc;
            return $new_chuoi;
        }
    }
}
// hiện thị danh sach tin danh muc module
function view_module_cate_table($data,$parent=0,$text=''){
    foreach ($data as $k=>$v) {
        if ($v->parent_id == $parent) {
            unset($data[$k]);
            $id = $v->id;
			($v->active == 1)?$check='checked':$check='';
            echo "<tr>
                     <td>".$k."</td>
					 <td>".$text.$v->name."</td>
					 <td>".$text.$v->alias."</td>
					 <td><i class=\"fa $v->icon \"></i></td>
                     <td><input type=\"number\" onchange=\"update_sort($(this))\" value=\"$v->sort\"
								data-placement='resources' data-item='$v->id' style=\"width: 55px\">
                    </td>
					<td class=\"text-center\">
						<label class=\"view_color view_active\" data-value=\"$v->id\" data-placement=\"resources\" data-view=\"active\">
							<input type=\"checkbox\" $check data-toggle=\"toggle\"  id=\"toggle\" data-size=\"mini\"
								   data-on=\"Yes\" data-off=\"No\">
						</label>
					</td>
					<td class='text-center'>
						<div onclick=\"getModal_module($v->id)\"
							class=\"btn btn-xs btn-default\" title=\"Sửa\"><i class=\"fa fa-pencil\"></i></div>
						<a href='".base_url('techadmin/group/deletecategory/' . $v->id)."'
						   onclick=\"return confirm('Bạn có chắc chắn muốn xóa?')\"
						   class=\"btn btn-xs btn-danger\"title=\"Xóa\" style=\"color: #fff\"><i class=\"fa fa-times\"></i> </a>
					</td>
                </tr>";

            view_module_cate_table($data, $id, $text . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ');
        }
    }
}

// hiện thị danh sach tin danh muc new
function view_news_cate_table($data,$parent,$text,$show_home,$show_hot,$show_focus,$show_coupon,$show_image){
    foreach ($data as $k=>$v) {
        if ($v->parent_id == $parent) {
            unset($data[$k]);
            $id = $v->id;
            if(isset($v->image)&&file_exists($v->image)){
                $img="<img src='".base_url($v->image)."' style='height:40px; max-width:100px'/>";
            }else {$img="<img src='".base_url('img/noimage.jpg')."' style='max-width: 80px; max-height: 55px'>";}

            ($v->home == 1)?$home='background:#'.$show_home->color.'':$home='';
            ($v->focus == 1)?$focus='background:#'.$show_focus->color.'':$focus='';
            ($v->hot == 1)?$hot='background:#'.$show_hot->color.'':$hot='';
            ($v->coupon == 1)?$coupon='background:#'.$show_coupon->color.'':$coupon='';
            ($show_home->active == 0)?$an1='hidden':$an1='';
            ($show_hot->active == 0)?$an2='hidden':$an2='';
            ($show_focus->active == 0)?$an3='hidden':$an3='';
            ($show_coupon->active == 0)?$an4='hidden':$an4='';

            echo "<tr>
                     <td><input type=\"checkbox\" name=\"checkone[]\" id=\"checkone\" value=\"$v->id\" ></td>
                     <td><input type=\"number\" onchange=\"update_sort($(this))\" id=\"sort\" value=\"$v->sort\"
								data-placement='news_category' data-item='$v->id' style=\"width: 55px\">
                    </td>
                    <td>".$text.$v->name."</td>";
                if($show_image->active!=0){
                echo"<td>$img</td>"; }
                if($show_home->active!=0 || $show_hot->active!=0 || $show_focus->active!=0 || $show_coupon->active!=0){
                echo"<td class=\"text-center\">
						<div data-toggle='tooltip' data-placement='news_category' title='".$show_home->name."'
                            data-value='$v->id' data-view='home'
                            class='view_color ".$an1."' style='border: 1px solid #".$show_home->color.";margin-right: 5px; ".$home."'></div>
                        <div data-toggle='tooltip' data-placement='news_category' title='".$show_hot->name."'
                            data-value='$v->id' data-view='hot'
                            class='view_color ".$an2."' style='border: 1px solid #".$show_hot->color.";margin-right: 5px;".$hot." '></div>
                        <div data-toggle='tooltip' data-placement='news_category' title='".$show_focus->name."'
                        data-value='$v->id' data-view='focus'
                        class='view_color ".$an3."' style='border: 1px solid #".$show_focus->color.";margin-right: 5px;".$focus." '></div>
                        <div data-toggle='tooltip' data-placement='news_category' title='".$show_coupon->name."'
                        data-value='$v->id' data-view='coupon'
                        class='view_color ".$an4."' style='border: 1px solid #".$show_coupon->color.";margin-right: 5px;".$coupon." '></div>

                    </td>";
                }
                echo"<td class='text-center'>
					<a href='".base_url('techadmin/news/cat_edit/' . $v->id)."'
                        class=\"btn btn-xs btn-default\" title=\"Sửa\"><i class=\"fa fa-pencil\"></i></a>
					<a href='".base_url('techadmin/news/deletecategory/' . $v->id)."'
                       onclick=\"return confirm('Bạn có chắc chắn muốn xóa?')\"
                       class=\"btn btn-xs btn-danger\"title=\"Xóa\" style=\"color: #fff\"><i class=\"fa fa-times\"></i> </a>
                    </td>
                </tr>";

           view_news_cate_table($data, $id, $text . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ',$show_home,$show_hot,$show_focus,$show_coupon,$show_image);
        }
    }
}
// hiện thị danh sach tin danh muc san pham
function view_product_cate_table($data,$parent=0,$text='',$show_home,$show_hot,$show_focus,$show_coupon,$show_image){
    foreach ($data as $k=>$v) {
        if ($v->parent_id == $parent) {
            unset($data[$k]);
            $id = $v->id;
            if(isset($v->image)&&file_exists($v->image)){
                $img="<img src='".base_url($v->image)."' style='height:40px; max-width:100px'/>";
            }else $img="<img src='".base_url('img/noimage.jpg')."' style='max-width: 80px; max-height: 55px'>";

            ($v->home == 1)?$home='background:#'.$show_home->color.'':$home='';
            ($v->focus == 1)?$focus='background:#'.$show_focus->color.'':$focus='';
            ($v->hot == 1)?$hot='background:#'.$show_hot->color.'':$hot='';
            ($v->coupon == 1)?$coupon='background:#'.$show_coupon->color.'':$coupon='';
            ($show_home->active == 0)?$an1='hidden':$an1='';
            ($show_hot->active == 0)?$an2='hidden':$an2='';
            ($show_focus->active == 0)?$an3='hidden':$an3='';
            ($show_coupon->active == 0)?$an4='hidden':$an4='';

            echo "<tr>
                     <td><input type=\"checkbox\" name=\"checkone[]\" id=\"checkone\" value=\"$v->id\" ></td>
                     <td><input type=\"number\" onchange=\"update_sort($(this))\" id=\"sort\" value=\"$v->sort\"
								data-placement='product_category' data-item='$v->id' style=\"width: 55px\">
                    </td>
                    <td><a href='".base_url('techadmin/product/cat_edit/' . $v->id)."'
                         title=\"Sửa\">".$text.$v->name."</a></td>";
            if($show_image->active!=0){
                echo"<td>$img</td>"; }
            if($show_home->active!=0 || $show_hot->active!=0 || $show_focus->active!=0 || $show_coupon->active!=0){
             echo "<td class=\"text-center\">
						<div data-toggle='tooltip' data-placement='product_category' title='".$show_home->name."'
                            data-value='$v->id' data-view='home'
                            class='view_color ".$an1."' style='border: 1px solid #".$show_home->color.";margin-right: 5px; ".$home."'></div>
                        <div data-toggle='tooltip' data-placement='product_category' title='".$show_hot->name."'
                            data-value='$v->id' data-view='hot'
                            class='view_color ".$an2."' style='border: 1px solid #".$show_hot->color.";margin-right: 5px;".$hot." '></div>
                        <div data-toggle='tooltip' data-placement='product_category' title='".$show_focus->name."'
                        data-value='$v->id' data-view='focus'
                        class='view_color ".$an3."' style='border: 1px solid #".$show_focus->color.";margin-right: 5px;".$focus." '></div>
                        <div data-toggle='tooltip' data-placement='product_category' title='".$show_coupon->name."'
                        data-value='$v->id' data-view='coupon'
                        class='view_color ".$an4."' style='border: 1px solid #".$show_coupon->color.";margin-right: 5px;".$coupon." '></div>

                    </td>";
            }
            echo   "<td class='text-center'>
					<a href='".base_url('techadmin/product/cat_edit/' . $v->id)."'
                        class=\"btn btn-xs btn-default\" title=\"Sửa\"><i class=\"fa fa-pencil\"></i></a>
					<a href='".base_url('techadmin/product/deletecategory/' . $v->id)."'
                       onclick=\"return confirm('Bạn có chắc chắn muốn xóa?')\"
                       class=\"btn btn-xs btn-danger\"title=\"Xóa\" style=\"color: #fff\"><i class=\"fa fa-times\"></i> </a>
                    </td>
                </tr>";

            view_product_cate_table($data, $id, $text . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ',$show_home,$show_hot,$show_focus,$show_coupon,$show_image);
        }
    }
}
// hiện thị danh sach tin danh muc san pham
function view_raovat_cate_table($data,$parent=0,$text='',$show_home,$show_hot,$show_focus){
    foreach ($data as $k=>$v) {
        if ($v->parent_id == $parent) {
            unset($data[$k]);
            $id = $v->id;
            if(isset($v->image)&&file_exists($v->image)){
                $img="<img src='".base_url($v->image)."' style='height:40px; max-width:100px'/>";
            }else $img="<img src='".base_url('img/noimage.jpg')."' style='max-width: 80px; max-height: 55px'>";

            ($v->home == 1)?$home='background:#'.$show_home->color.'':$home='';
            ($v->focus == 1)?$focus='background:#'.$show_focus->color.'':$focus='';
            ($v->hot == 1)?$hot='background:#'.$show_hot->color.'':$hot='';
            ($show_home->active == 0)?$an1='hidden':$an1='';
            ($show_hot->active == 0)?$an2='hidden':$an2='';
            ($show_focus->active == 0)?$an3='hidden':$an3='';

            echo "<tr>
                     <td><input type=\"checkbox\" name=\"checkone[]\" id=\"checkone\" value=\"$v->id\" ></td>
                     <td><input type=\"number\" onchange=\"update_sort($(this))\" id=\"sort\" value=\"$v->sort\"
								data-placement='raovat_category' data-item='$v->id' style=\"width: 55px\">
                    </td>
                    <td>".$text.$v->name."</td>
                    <td>$img</td>
                    <td class=\"text-center\">
						<div data-toggle='tooltip' data-placement='raovat_category' title='".$show_home->name."'
                            data-value='$v->id' data-view='home'
                            class='view_color ".$an1."' style='border: 1px solid #".$show_home->color.";margin-right: 5px; ".$home."'></div>
                        <div data-toggle='tooltip' data-placement='raovat_category' title='".$show_hot->name."'
                            data-value='$v->id' data-view='hot'
                            class='view_color ".$an2."' style='border: 1px solid #".$show_hot->color.";margin-right: 5px;".$hot." '></div>
                        <div data-toggle='tooltip' data-placement='raovat_category' title='".$show_focus->name."'
                        data-value='$v->id' data-view='focus'
                        class='view_color ".$an3."' style='border: 1px solid #".$show_focus->color.";margin-right: 5px;".$focus." '></div>
                    </td>

                <td class='text-center'>
					<a href='".base_url('techadmin/raovat/cat_edit/' . $v->id)."'
                        class=\"btn btn-xs btn-default\" title=\"Sửa\"><i class=\"fa fa-pencil\"></i></a>
					<a href='".base_url('techadmin/raovat/deletecategory/' . $v->id)."'
                       onclick=\"return confirm('Bạn có chắc chắn muốn xóa?')\"
                       class=\"btn btn-xs btn-danger\"title=\"Xóa\" style=\"color: #fff\"><i class=\"fa fa-times\"></i> </a>
                    </td>
                </tr>";

            view_raovat_cate_table($data, $id, $text . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ',$show_home,$show_hot,$show_focus);
        }
    }
}
// hiện thị danh sach tin danh muc media
function view_media_cate_table($data,$parent=0,$text='',$show_home,$show_hot,$show_focus,$show_coupon,$show_image){
    foreach ($data as $k=>$v) {
        if ($v->parent_id == $parent) {
            unset($data[$k]);
            $id = $v->id;
            if(isset($v->image)&&file_exists($v->image)){
                $img="<img src='".base_url($v->image)."' style='height:40px; max-width:100px'/>";
            }else $img="<img src='".base_url('img/noimage.jpg')."' style='max-width: 80px; max-height: 55px'>";

            ($v->home == 1)?$home='background:#'.$show_home->color.'':$home='';
            ($v->focus == 1)?$focus='background:#'.$show_focus->color.'':$focus='';
            ($v->hot == 1)?$hot='background:#'.$show_hot->color.'':$hot='';
            ($v->coupon == 1)?$coupon='background:#'.$show_coupon->color.'':$coupon='';
            ($show_home->active == 0)?$an1='hidden':$an1='';
            ($show_hot->active == 0)?$an2='hidden':$an2='';
            ($show_focus->active == 0)?$an3='hidden':$an3='';
            ($show_coupon->active == 0)?$an4='hidden':$an4='';

            echo "<tr>
                     <td><input type=\"checkbox\" name=\"checkone[]\" id=\"checkone\" value=\"$v->id\" ></td>
                     <td ><input type=\"number\" onchange=\"update_sort($(this))\" id=\"sort\" value=\"$v->sort\"
								data-placement='media_category' data-item='$v->id' style=\"width: 55px\">
                    </td>
                    <td>".$text.$v->name."</td>";
                if($show_image->active!=0 ){
                    echo"<td>$img</td>"; }
                if($show_home->active!=0 || $show_hot->active!=0 || $show_focus->active!=0){
                    echo"<td class=\"text-center\">
						<div data-toggle='tooltip' data-placement='media_category' title='".$show_home->name."'
                            data-value='$v->id' data-view='home'
                            class='view_color ".$an1."' style='border: 1px solid #".$show_home->color.";margin-right: 5px; ".$home."'></div>
                        <div data-toggle='tooltip' data-placement='media_category' title='".$show_hot->name."'
                            data-value='$v->id' data-view='hot'
                            class='view_color ".$an2."' style='border: 1px solid #".$show_hot->color.";margin-right: 5px;".$hot." '></div>
                        <div data-toggle='tooltip' data-placement='media_category' title='".$show_focus->name."'
                        data-value='$v->id' data-view='focus'
                        class='view_color ".$an3."' style='border: 1px solid #".$show_focus->color.";margin-right: 5px;".$focus." '></div>
                        <div data-toggle='tooltip' data-placement='media_category' title='".$show_coupon->name."'
                        data-value='$v->id' data-view='coupon'
                        class='view_color ".$an4."' style='border: 1px solid #".$show_coupon->color.";margin-right: 5px;".$coupon." '></div>
                    </td>";
                }
                echo"<td class='text-center'>
					<a href='".base_url('techadmin/media/cat_edit/' . $v->id)."'
                        class=\"btn btn-warning btn-xs mr5\" title=\"Sửa\"><i class=\"fa fa-edit\"></i></a>
					<a href='".base_url('techadmin/media/deletecategory/' . $v->id)."'
                       onclick=\"return confirm('Bạn có chắc chắn muốn xóa?')\"
                       class=\"btn btn-xs btn-danger\"title=\"Xóa\" style=\"color: #fff\"><i class=\"fa fa-remove\"></i> </a>
                    </td>
                </tr>";

           view_media_cate_table($data, $id, $text . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ',$show_home,$show_hot,$show_focus,$show_coupon,$show_image);
        }
    }
}
// hiện thị danh sach tin danh muc video
function view_video_cate_table($data,$parent=0,$text='',$show_home,$show_hot,$show_focus,$show_image){
    foreach ($data as $k=>$v) {
        if ($v->parent_id == $parent) {
            unset($data[$k]);
            $id = $v->id;
            if(isset($v->image)&&file_exists($v->image)){
                $img="<img src='".base_url($v->image)."' style='height:40px; max-width:100px'/>";
            }else $img="<img src='".base_url('img/noimage.jpg')."' style='max-width: 80px; max-height: 55px'>";

            ($v->home == 1)?$home='background:#'.$show_home->color.'':$home='';
            ($v->focus == 1)?$focus='background:#'.$show_focus->color.'':$focus='';
            ($v->hot == 1)?$hot='background:#'.$show_hot->color.'':$hot='';
            ($show_home->active == 0)?$an1='hidden':$an1='';
            ($show_hot->active == 0)?$an2='hidden':$an2='';
            ($show_focus->active == 0)?$an3='hidden':$an3='';

            echo "<tr>
                     <td><input type=\"checkbox\" name=\"checkone[]\" id=\"checkone\" value=\"$v->id\" ></td>
                     <td><input type=\"number\" onchange=\"update_sort($(this))\" id=\"sort\" value=\"$v->sort\"
								data-placement='video_category' data-item='$v->id' style=\"width: 55px\">
                    </td>
                    <td>".$text.$v->name."</td>";
                if($show_image->active!=0 ){
                    echo"<td>$img</td>"; }
                if($show_home->active!=0 || $show_hot->active!=0 || $show_focus->active!=0){
                    echo"<td class=\"text-center\">
						<div data-toggle='tooltip' data-placement='video_category' title='".$show_home->name."'
                            data-value='$v->id' data-view='home'
                            class='view_color ".$an1."' style='border: 1px solid #".$show_home->color.";margin-right: 5px; ".$home."'></div>
                        <div data-toggle='tooltip' data-placement='video_category' title='".$show_hot->name."'
                            data-value='$v->id' data-view='hot'
                            class='view_color ".$an2."' style='border: 1px solid #".$show_hot->color.";margin-right: 5px;".$hot." '></div>
                        <div data-toggle='tooltip' data-placement='video_category' title='".$show_focus->name."'
                        data-value='$v->id' data-view='focus'
                        class='view_color ".$an3."' style='border: 1px solid #".$show_focus->color.";margin-right: 5px;".$focus." '></div>
                    </td>";
                }
					echo"<td class='text-center'>
						<a href='".base_url('techadmin/video/cat_edit/' . $v->id)."'
							class=\"btn btn-xs btn-default\" title=\"Sửa\"><i class=\"fa fa-pencil\"></i></a>
						<a href='".base_url('techadmin/video/deletecategory/' . $v->id)."'
						   onclick=\"return confirm('Bạn có chắc chắn muốn xóa?')\"
						   class=\"btn btn-xs btn-danger\"title=\"Xóa\" style=\"color: #fff\"><i class=\"fa fa-times\"></i> </a>
					</td>
				</tr>";

            view_video_cate_table($data, $id, $text . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ',$show_home,$show_hot,$show_focus,$show_image);
        }
    }
}

// hiện thị danh sach huong dan quan ly document
function view_doc_cate_table($data,$parent=0,$text=''){
    foreach ($data as $k=>$v) {
        if ($v->parent_id == $parent) {
            unset($data[$k]);
            $id = $v->id;
            echo "<tr>
                     <td><input type=\"checkbox\" name=\"checkone[]\" id=\"checkone\" value=\"$v->id\" ></td>
                     <td><input type=\"number\" onchange=\"update_sort($(this))\" value=\"$v->sort\"
                                data-placement='document' data-item='$v->id' style=\"width: 55px\">
                    </td>
                    <td>".$text.$v->name."</td>

                    <td class='text-center'>
                        <a href='".base_url('techadmin/admin/document_edit/' . $v->id)."'
                            class=\"btn btn-xs btn-default\" title=\"Sửa\"><i class=\"fa fa-pencil\"></i></a>
                        <a href='".base_url('techadmin/admin/deletedocument/' . $v->id)."'
                           onclick=\"return confirm('Bạn có chắc chắn muốn xóa?')\"
                           class=\"btn btn-xs btn-danger\"title=\"Xóa\" style=\"color: #fff\"><i class=\"fa fa-times\"></i> </a>
                    </td>
                </tr>";

            view_doc_cate_table($data, $id, $text . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ');
        }
    }
}
// view danh mục  cha dang select
function show_cate($data,$parent=0,$text='',$edit=null,$idone=null){
	foreach ($data as $k=>$v) {
        if ($v->parent_id == $parent) {
            unset($data[$k]);
            $id = $v->id;
            $v->id==$edit?$selected='selected':$selected='';
            $v->id==$idone?$an='disabled':$an='';
            echo '<option '.$an.' value="'.$v->id.'" '.$selected.'>'.$text.$v->name.'</option>';
            show_cate($data, $id, $text . '. &nbsp;&nbsp; ',$edit,$idone);
        }
    }
}
// hiên thị danh muc o menu
function show_cate_menu($data,$parent=0,$text='',$edit=null){

    foreach ($data as $k=>$v) {
        if ($v->parent_id == $parent) {
            unset($data[$k]);
            $id = $v->id;
            $v->id==$edit?$selected='selected':$selected='';
            echo '<option value="'.$v->alias.'" '.$selected.'>'.$text.$v->name.'</option>';

            show_cate_menu($data, $id, $text . '. &nbsp;&nbsp; ',$edit);
        }
    }
}
// hien thi danh muc tro dến alias
function show_cate_menu2($data,$parent=0,$text='',$edit=null){

    foreach ($data as $k=>$v) {
        if ($v->parent_id == $parent) {
            unset($data[$k]);
            $id = $v->id;
            $v->alias==$edit?$selected='selected':$selected='';
            echo '<option value="'.$v->alias.'" '.$selected.'>'.$text.$v->name.'</option>';

            show_cate_menu2($data, $id, $text . '. &nbsp;&nbsp; ',$edit);
        }
    }
}
// view opstion danh mục dang select alias tim kiêm san pham
function view_cate_search_select($data,$parent=0,$text='',$edit=null){
    foreach ($data as $k=>$v) {
        if ($v->parent_id == $parent) {
            unset($data[$k]);
            $id = $v->id;
            $v->alias==$edit?$selected='selected':$selected='';
            echo '<option value="'.$v->alias.'" '.$selected.'>'.$text.$v->name.'</option>';
            view_cate_search_select($data, $id, $text . '. &nbsp;&nbsp; ',$edit);
        }
    }
}
//view danh muc dang check list table_to_table
function view_product_cate_checklist($data,$parent=0,$text='',$edit=null){
	foreach ($data as $k=>$v) {
        if ($v->parent_id == $parent) {
            unset($data[$k]);
            $id = $v->id;
            $item=array('id_category'=> $v->id);
            if($edit!=null){
                in_array($item,$edit)?$selected='checked':$selected='';
            }else{
                $v->id==1?$selected='checked':$selected='';
            }
            echo "<li><ul>";
            echo '<div class="checkbox">
                        <label>
                          '.$text.'<input type="checkbox" name ="category[]" value="'.$v->id.'"'.@$selected.'
                          class="chk" id="'.$v->id.'">
                          '.$v->name.'
                                </label>
                      </div> ';

            view_product_cate_checklist($data, $id, $text . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',$edit);
            echo "</ul><li>";
        }
    }
}


function view_cate_color_checklist($data,$parent=0,$text='',$edit=null){
	foreach ($data as $k=>$v) {
        if ($v->parent_id == $parent) {
            unset($data[$k]);
            $id = $v->id;
            $item=array('id_category'=> $v->id);
            if($edit!=null){
                in_array($item,$edit)?$selected='checked':$selected='';
            }else{
                $v->id==1?$selected='checked':$selected='';
            }
            echo "<li><ul>";
            echo '<div class="checkbox">
                        <label>
                          '.$text.'<input type="checkbox" name ="category[]" value="'.$v->id.'"'.@$selected.'
                          class="chk" id="'.$v->id.'">
                          '.$v->name.'
                                </label>
                      </div> ';

            view_cate_color_checklist($data, $id, $text . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',$edit);
            echo "</ul><li>";
        }
    }
}

function view_product_brand_checklist($data,$parent=0,$text='',$edit=null){
	foreach ($data as $k=>$v) {
        if ($v->parent_id == $parent) {
            unset($data[$k]);
            $id = $v->id;
            $item=array('brand_id'=> $v->id);
            if($edit!=null){
                in_array($item,$edit)?$selected='checked':$selected='';
            }else{
                $v->id==1?$selected='checked':$selected='';
            }
            echo "<li><ul>";
            echo '<div class="checkbox">
                        <label>
                          '.$text.'<input type="checkbox" name ="category[]" value="'.$v->id.'"'.@$selected.'
                          class="chk" id="'.$v->id.'">
                          '.$v->name.'
                                </label>
                      </div> ';

            view_product_brand_checklist($data, $id, $text . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',$edit);
            echo "</ul><li>";
        }
    }
}

function view_product_size_checklist($data,$parent=0,$text='',$edit=null){
	foreach ($data as $k=>$v) {
        if ($v->parent_id_2 == $parent) {
            unset($data[$k]);
            $id = $v->id;
            $item=array('locale_id'=> $v->id);
            if($edit!=null){
                in_array($item,$edit)?$selected='checked':$selected='';
            }else{
                $v->id==1?$selected='checked':$selected='';
            }
            echo "<li><ul>";
            echo '<div class="checkbox">
                    <label>
                      '.$text.'<input type="checkbox" name ="category[]" value="'.$v->id.'"'.@$selected.'
                      class="chk" id="'.$v->id.'">
                      '.$v->name.'
                    </label>
                  </div> ';

            view_product_size_checklist($data, $id, $text . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',$edit);
            echo "</ul><li>";
        }
    }
}

function view_product_price_checklist($data,$parent=0,$text='',$edit=null){
	foreach ($data as $k=>$v) {
        if ($v->parent_id == $parent) {
            unset($data[$k]);
            $id = $v->id;
            $item=array('color_id'=> $v->id);
            if($edit!=null){
                in_array($item,$edit)?$selected='checked':$selected='';
            }else{
                $v->id==1?$selected='checked':$selected='';
            }
            echo "<li><ul>";
            echo '<div class="checkbox">
                    <label>
                      '.$text.'<input type="checkbox" name ="category[]" value="'.$v->id.'"'.@$selected.'
                      class="chk" id="'.$v->id.'">
                      '.$v->name.'
                    </label>
                  </div> ';

            view_product_price_checklist($data, $id, $text . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',$edit);
            echo "</ul><li>";
        }
    }
}

//view danh muc color check list
function view_color_cate_checklist($data,$parent=0,$text='',$edit=null){
	foreach ($data as $k=>$v) {
        if ($v->parent_id == $parent) {
            unset($data[$k]);
            $id = $v->id;
            $item=array('id_color'=> $v->id);
            if($edit!=null){
                in_array($item,$edit)?$selected='checked':$selected='';
            }else{
                $v->id==1?$selected='checked':$selected='';
            }
            echo "<li><ul>";
            echo '<div class="checkbox">
                        <label>
                          '.$text.'<input type="checkbox" name ="color[]" value="'.$v->id.'"'.@$selected.'
                          class="chk" id="'.$v->id.'">
                          '.$v->name.'
                                </label>
                      </div> ';

            view_color_cate_checklist($data, $id, $text . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',$edit);
            echo "</ul><li>";

        }
    }
}
//view danh muc size check list
function view_size_cate_checklist($data,$parent=0,$text='',$edit=null){
 //   var_dump($edit);die;
    foreach ($data as $k=>$v) {
        if ($v->parent_id == $parent) {
            unset($data[$k]);
            $id = $v->id;
           // var_dump($id);die;
            $item=array('id_size'=> $v->id);
            if($edit!=null){
                in_array($item,$edit)?$selected='checked':$selected='';
            }else{
                $v->id==20?$selected='checked':$selected='';
            }
            echo "<li><ul>";
            echo '<div class="checkbox">
                        <label>
                          '.$text.'<input type="checkbox" name ="size[]" value="'.$v->id.'"'.@$selected.'
                          class="chk" id="'.$v->id.'">
                          '.$v->name.'
                                </label>
                      </div> ';

            view_size_cate_checklist($data, $id, $text . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',$edit);
            echo "</ul><li>";

        }
    }
}
//chọn danh muc dang check list 1 phan tử không chọn đc chính nó
function view_cate_checklist_firt($data,$parent=0,$text='',$edit=null,$idone=null){
	foreach ($data as $k=>$v) {
        if ($v->parent_id == $parent) {
            unset($data[$k]);
            $id = $v->id;
            $item=array('id'=> $v->id);
            if($edit!=null){
                in_array($item,$edit)?$selected='checked':$selected='';
			}
			else{
                $v->id==1?$selected='checked':$selected='';
            }
			$v->id==$idone?$an='disabled':$an='';
            echo "<li><ul style=\"padding:5px;\">";
            echo '<div class="checkbox">
                        <label>
                          '.$text.'<input type="checkbox" name ="category[]" '.@$an.' value="'.$v->id.'"'.@$selected.'
                          class="chk" id="'.$v->id.'">
                          '.$v->name.'
                                </label>
                      </div> ';
            view_cate_checklist_firt($data, $id, $text . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',$edit,$idone);
            echo "</ul><li>";

        }
    }
}

// view menu trong admin
function view_menu_admin($data,$parent=0,$text=''){
	$i=1;
	foreach ($data as $k=>$v) {
		$t=$i++;
		if ($v->parent_id == $parent) {
			unset($data[$k]);
			$id = $v->id;

			echo '<li class="dd-item" data-id="' . $v->id . '">
								<div class="dd-handle" data-items="id_'.$t.'">' . $v->name . '</div>

								 <div class="action">
								 <div class="btn-group link_v">
									<button class="btn dropdown-toggle drop_action" data-toggle="dropdown"><span class="caret"></span></button>
									<ul class="dropdown-menu" style="min-width: 40px !important; padding: 5px">
									  <li><a href="'.base_url('techadmin/menu/edit/' . $v->id.'?p='.$v->position.'').'" style="color: #0011ca">Sửa</a></li>
									  <li><a href="'.base_url('techadmin/menu/delete/' . $v->id).'"style="color: red"onclick="return confirm(\'Bạn có chắc chắn muốn xóa?\')" >Xóa</a></li>
									</ul>
								  </div>
								 </div>


								<ol class="dd-list">';

			view_menu_admin($data, $id, $text . '');

			echo '</ol>
							</li>';
		}
	}
}
// hiện thị menu cha để chọn
function show_menu_select($data,$parent=0,$text='',$edit=null){

    foreach ($data as $k=>$v) {
        if ($v->parent_id == $parent) {
            unset($data[$k]);
            $id = $v->id;
            $v->id==$edit?$selected='selected':$selected='';
            echo '<option data-url="'.$v->url.'" value="'.$v->id.'" '.$selected.'>'.$text.$v->name.'</option>';

            show_menu_select($data, $id, $text . '. &nbsp;&nbsp; ',$edit);
        }
    }
}
// check phân quyền cho tung tai khoan
function check_phanquyen($perm, $access_controller = null, $access_action = null)
{
	$check =  false;
	if ($access_action == null) {
		foreach ($perm as $k => $v) {
			if ($k == $access_controller) {
				$check = true;
			}
		}
	}else{
		foreach ($perm as $k => $v) {
			if(!empty($v)){
				foreach ($v as $k2 => $v2) {
					if ($k == $access_controller && $v2 == $access_action) {
						$check = true;
					}
				}
			}

		}
	}
	return $check;
}
// tao brumb cho san pham va tin tưc
function creat_break_crum($data=null,$id=null){
    $temp = '';
   // var_dump($text);die;
    if(is_array($data)&&$id!=null){
        foreach($data as $key => $row){
            if($row->id==$id){
                $id=$row->parent_id;
                $temp .= '<li><a href="'.base_url(@$row->alias.'.html').'">  '.@$row->name.' </a></li>';
                unset($data[$key]);
                creat_break_crum($data,$id);
            }
        }
    }
    echo $temp;
}

function gettimeDay($day)
{
    $thu = '';
    switch($day)
    {
        case 0:
            $thu="Chủ Nhật";
            break;
        case 1:
            $thu="Thứ Hai";
            break;
        case 2:
            $thu="Thứ Ba";
            break;
        case 3:
            $thu="Thứ Tư";
            break;
        case 4:
            $thu="Thứ Năm";
            break;
        case 5:
            $thu="Thứ Sáu";
            break;
        case 6:
            $thu="Thứ 7";
            break;
    }
    echo $thu;
}
function currentcy($lang){
    if($lang == 'vi'){
        echo "vnđ";
    }
    if($lang == 'en'){
        echo "usd";
    }
}
function randString($length, $charset='abcdefghijklmnopqrstuvwxyz0123456789')
{
    $str = '';
    $count = strlen($charset);
    while ($length--) {
        $str .= $charset[mt_rand(0, $count-1)];
    }
    return $str;
}
