<?php
/**
 * Created by JetBrains PhpStorm.
 * author: NguyenDai,daibkz@gmail.com
 * Date: 7/31/16
 * Time: 5:25 PM
 * To change this template use File | Settings | File Templates.
 */
function buildArray($arr,$parentId = 0)
{
    $resourceArr = array();
    recursive($arr,$parentId,$newMenu,'children');
    return str_replace('<ul class="children"></ul>','',$newMenu);
}
function recursive($sourceArr,$parents = 0,&$newMenu,$class=''){
    if(count($sourceArr)>0){
        $idUL = '';
        $newMenu .= '<ul class="'.$class.'">';
        foreach ($sourceArr as $key => $value){
            //echo $parents;
            if($value['reply'] == $parents){
                $newMenu .= '<li id="comment-'.$value['id'].'" class="clearfix">
                    <div class="comment even depth-2 comment-wrap">
                    <div class="comment-avatar">
                    <img src="http://2.gravatar.com/avatar/ba3416ca792ab676c5091091c3bbbaaa?s=65&amp;d=mm&amp;r=g" width="65" height="65" alt="" class="avatar avatar-65wp-user-avatar wp-user-avatar-65 alignnone photo avatar-default tie-appear"></div>

                    <div class="comment-content">
                        <div class="author-comment">
                            <cite class="fn">'.$value['user_name'].'</cite><span class="block-rate"><input disabled id="input-21b" value="'.$value['giatri'].'" type="number" class="rating" min=0 max=5 step=1 data-size="lg"></span>
                            <div class="comment-meta commentmetadata">
                             '.date('M d,Y',$value['time']).'</div>
                            <div class="clear"></div>
                        </div>


                        <p>'.$value['comment'].'</p>
                    </div>
                    <div id="reply-'.$value['id'].'" class="reply"><a rel="nofollow" class="comment-reply-link seoquake-nofollow MSI_ext_nofollow" href="javascript:void(0)" onclick="return addCommentForm('.$value['id'].','.$value['id_sanpham'].')" aria-label="'.$value['user_name'].'">Trả lời</a></div><!-- .reply -->
                </div>';

                $newParents = $value['id'];
                unset($sourceArr[$key]);
                $class = "children";
                recursive($sourceArr,$newParents, $newMenu,$class);
                $newMenu .= '</li>';
            }
        }
        $newMenu .= '</ul>';
    }
}

function buildArrayQuestion($arr,$parentId = 0)
{
    $resourceArr = array();
    recursive_q($arr,$parentId,$newMenu,'children');
    return str_replace('<ul class="children"></ul>','',$newMenu);
}
function recursive_q($sourceArr,$parents = 0,&$newMenu,$class=''){
    if(count($sourceArr)>0){
        $idUL = '';
        $newMenu .= '<ul class="'.$class.'">';
        foreach ($sourceArr as $key => $value){
            //echo $parents;
            if($value['reply'] == $parents){
                $newMenu .= '<li id="comment-'.$value['id'].'" class="clearfix">
                    <div class="comment even depth-2 comment-wrap">
                    <div class="comment-avatar">
                    <img src="http://2.gravatar.com/avatar/ba3416ca792ab676c5091091c3bbbaaa?s=65&amp;d=mm&amp;r=g" width="65" height="65" alt="" class="avatar avatar-65wp-user-avatar wp-user-avatar-65 alignnone photo avatar-default tie-appear"></div>

                    <div class="comment-content">
                        <div class="author-comment">
                            <cite class="fn">'.$value['user_name'].'</cite>
                            <div class="comment-meta commentmetadata">
                             '.date('M d,Y',$value['time']).'</div>
                            <div class="clear"></div>
                        </div>


                        <p>'.$value['comment'].'</p>
                    </div>
                    <div id="reply-'.$value['id'].'" class="reply"><a rel="nofollow" class="comment-reply-link seoquake-nofollow MSI_ext_nofollow" href="javascript:void(0)" onclick="return addCommentForm('.$value['id'].','.$value['id_sanpham'].')" aria-label="'.$value['user_name'].'">Trả lời</a></div><!-- .reply -->
                </div>';

                $newParents = $value['id'];
                unset($sourceArr[$key]);
                $class = "children";
                recursive($sourceArr,$newParents, $newMenu,$class);
                $newMenu .= '</li>';
            }
        }
        $newMenu .= '</ul>';
    }
}
?>