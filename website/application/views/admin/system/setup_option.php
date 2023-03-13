<form name="formbk" method="post" action="">
    <table id="example" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th width="2%" class="text-center no-sort">STT</th>
                <th width="15%">Tên hiển thị</th>
                <th width="4%" class="no-sort text-center">Tên trường</th>
                <th width="1%" class="no-sort text-center"> Hiện thị </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center">1</td>
                 <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="site_title" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="site_title"
                value="<?=@$config_text->site_title?>" placeholder=""/></td>
                 <td class="text-center">site_title</td>
                <td class="text-center">
                    <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="site_title">
                        <input type="checkbox" <?=@$config_home->site_title==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                               data-on="Yes" data-off="No">
                    </label>
                </td>
            </tr>
            <tr>
                <td class="text-center">2</td>
                 <td>
                    <input type="text" data-id="<?=@$config_text->id ?>" data-view="site_name" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="site_name"
                value="<?=@$config_text->site_name?>" placeholder=""/>
                    </td>
                 <td class="text-center">site_name</td>
                <td class="text-center">
                    <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="site_name">
                        <input type="checkbox" <?=@$config_home->site_name==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                               data-on="Yes" data-off="No">
                    </label>
                </td>
            </tr>
            <tr>
                <td class="text-center">3</td>
                 <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="timeopen" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="timeopen"
                value="<?=@$config_text->timeopen?>" placeholder=""/></td>
                 <td class="text-center">timeopen</td>
                <td class="text-center">
                    <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="timeopen">
                        <input type="checkbox" <?=@$config_home->timeopen==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                               data-on="Yes" data-off="No">
                    </label>
                </td>
            </tr>
            <tr><td class="text-center">4</td>
                 <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="slogan" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="slogan"
                value="<?=@$config_text->slogan?>" placeholder=""/></td>
                 <td class="text-center">slogan</td>
                <td class="text-center">
                    <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="slogan">
                        <input type="checkbox" <?=@$config_home->slogan==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                               data-on="Yes" data-off="No">
                    </label>
                </td>
            </tr>
            <tr>
                <td class="text-center">5</td>
                 <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="site_video" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="site_video"
                value="<?=@$config_text->site_video?>" placeholder=""/></td>
                 <td class="text-center">site_video</td>
                <td class="text-center">
                    <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="site_video">
                        <input type="checkbox" <?=@$config_home->site_video==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                               data-on="Yes" data-off="No">
                    </label>
                </td>
            </tr>
            <tr>
                <td class="text-center">6</td>
                 <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="map_iframe" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="map_iframe"
                value="<?=@$config_text->map_iframe?>" placeholder=""/></td>
                 <td class="text-center">map_iframe</td>
                <td class="text-center">
                    <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="map_iframe">
                        <input type="checkbox" <?=@$config_home->map_iframe==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                               data-on="Yes" data-off="No">
                    </label>
                </td>
            </tr>
            <tr>
                <td class="text-center">7</td>
                 <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="shipping" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="shipping"
                value="<?=@$config_text->shipping?>" placeholder=""/></td>
                 <td class="text-center">shipping</td>
                <td class="text-center">
                    <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="shipping">
                        <input type="checkbox" <?=@$config_home->shipping==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                               data-on="Yes" data-off="No">
                    </label>
                </td>
            </tr>
            <tr>
                <td class="text-center">8</td>
                 <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="map_footer" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="chat"
                value="<?=@$config_text->map_footer?>" placeholder=""/></td>
                 <td class="text-center">map_footer</td>
                <td class="text-center">
                    <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="map_footer">
                        <input type="checkbox" <?=@$config_home->map_footer==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                               data-on="Yes" data-off="No">
                    </label>
                </td>
            </tr>
            <tr>
                <td class="text-center">9</td>
                 <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="coppy_right" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="coppy_right"
                value="<?=@$config_text->coppy_right?>" placeholder=""/></td>
                 <td class="text-center">coppy_right</td>
                <td class="text-center">
                    <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="coppy_right">
                        <input type="checkbox" <?=@$config_home->coppy_right==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                               data-on="Yes" data-off="No">
                    </label>
                </td>
            </tr>
            <tr>
                <td class="text-center">10</td>
                 <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="domain" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="domain"
                value="<?=@$config_text->domain?>" placeholder=""/></td>
                 <td class="text-center">domain</td>
                <td class="text-center">
                    <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="domain">
                        <input type="checkbox" <?=@$config_home->domain==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                               data-on="Yes" data-off="No">
                    </label>
                </td>
            </tr>
            <tr>
                <td class="text-center">11</td>
                 <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="site_logo_footer" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="site_logo_footer"
                value="<?=@$config_text->site_logo_footer?>" placeholder=""/></td>
                 <td class="text-center">site_logo_footer</td>
                <td class="text-center">
                    <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="site_logo_footer">
                        <input type="checkbox" <?=@$config_home->site_logo_footer==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                               data-on="Yes" data-off="No">
                    </label>
                </td>
            </tr>
            <tr><td class="text-center">12</td>
                 <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="WM_text" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="WM_text"
                value="<?=@$config_text->WM_text?>" placeholder=""/></td>
                 <td class="text-center">WM_text</td>
                <td class="text-center">
                    <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="WM_text">
                        <input type="checkbox" <?=@$config_home->WM_text==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                               data-on="Yes" data-off="No">
                    </label>
                </td>
            </tr>
            <tr><td class="text-center">13</td>
                 <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="WM_color" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="WM_color"
                value="<?=@$config_text->WM_color?>" placeholder=""/></td>
                 <td class="text-center">WM_color</td>
                <td class="text-center">
                    <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="WM_color">
                        <input type="checkbox" <?=@$config_home->WM_color==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                               data-on="Yes" data-off="No">
                    </label>
                </td>
            </tr>
            <tr><td class="text-center">14</td>
                 <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="WM_size" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="WM_size"
                value="<?=@$config_text->WM_size?>" placeholder=""/></td>
                 <td class="text-center">WM_size</td>
                <td class="text-center">
                    <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="WM_size">
                        <input type="checkbox" <?=@$config_home->WM_size==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                               data-on="Yes" data-off="No">
                    </label>
                </td>
            </tr>
            <tr><td class="text-center">15</td>
                 <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="input_text_1" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="input_text_1"
                value="<?=@$config_text->input_text_1?>" placeholder=""/></td>
                 <td class="text-center">input_text_1</td>
                <td class="text-center">
                    <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="input_text_1">
                        <input type="checkbox" <?=@$config_home->input_text_1==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                               data-on="Yes" data-off="No">
                    </label>
                </td>
            </tr>
            <tr><td class="text-center">16</td>
                 <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="face_id" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="face_id"
                value="<?=@$config_text->face_id?>" placeholder=""/></td>
                 <td class="text-center">face_id</td>
                <td class="text-center">
                    <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="face_id">
                        <input type="checkbox" <?=@$config_home->face_id==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                               data-on="Yes" data-off="No">
                    </label>
                </td>
            </tr>
            <tr><td class="text-center">17</td>
                 <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="site_fanpage" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="site_fanpage"
                value="<?=@$config_text->site_fanpage?>" placeholder=""/></td>
                 <td class="text-center">site_fanpage</td>
                <td class="text-center">
                    <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="site_fanpage">
                        <input type="checkbox" <?=@$config_home->site_fanpage==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                               data-on="Yes" data-off="No">
                    </label>
                </td>
            </tr>
            <tr><td class="text-center">18</td>
                 <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="link_gg" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="link_gg"
                value="<?=@$config_text->link_gg?>" placeholder=""/></td>
                 <td class="text-center">link_gg</td>
                <td class="text-center">
                    <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="link_gg">
                        <input type="checkbox" <?=@$config_home->link_gg==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                               data-on="Yes" data-off="No">
                    </label>
                </td>
            </tr>
            <tr><td class="text-center">19</td>
                 <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="link_printer" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="link_printer"
                value="<?=@$config_text->link_printer?>" placeholder=""/></td>
                 <td class="text-center">link_printer</td>
                <td class="text-center">
                    <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="link_printer">
                        <input type="checkbox" <?=@$config_home->link_printer==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                               data-on="Yes" data-off="No">
                    </label>
                </td>
            </tr>
            <tr><td class="text-center">20</td>
                 <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="link_linkedin" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="link_linkedin"
                value="<?=@$config_text->link_linkedin?>" placeholder=""/></td>
                 <td class="text-center">link_linkedin</td>
                <td class="text-center">
                    <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="link_linkedin">
                        <input type="checkbox" <?=@$config_home->link_linkedin==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                               data-on="Yes" data-off="No">
                    </label>
                </td>
            </tr>
            <tr><td class="text-center">21</td>
                 <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="link_youtube" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="link_youtube"
                value="<?=@$config_text->link_youtube?>" placeholder=""/></td>
                 <td class="text-center">link_youtube</td>
                <td class="text-center">
                    <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="link_youtube">
                        <input type="checkbox" <?=@$config_home->link_youtube==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                               data-on="Yes" data-off="No">
                    </label>
                </td>
            </tr>
            <tr><td class="text-center">22</td>
                 <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="link_tt" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="link_tt"
                value="<?=@$config_text->link_tt?>" placeholder=""/></td>
                 <td class="text-center">link_tt</td>
                <td class="text-center">
                    <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="link_tt">
                        <input type="checkbox" <?=@$config_home->link_tt==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                               data-on="Yes" data-off="No">
                    </label>
                </td>
            </tr>
            <tr><td class="text-center">22</td>
                 <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="link_sky" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="link_sky"
                value="<?=@$config_text->link_sky?>" placeholder=""/></td>
                 <td class="text-center">link_sky</td>
                <td class="text-center">
                    <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="link_sky">
                        <input type="checkbox" <?=@$config_home->link_sky==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                               data-on="Yes" data-off="No">
                    </label>
                </td>
            </tr>
            <tr><td class="text-center">23</td>
                 <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="link_instagram" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="link_instagram"
                value="<?=@$config_text->link_instagram?>" placeholder=""/></td>
                 <td class="text-center">link_instagram</td>
                <td class="text-center">
                    <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="link_instagram">
                        <input type="checkbox" <?=@$config_home->link_instagram==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                               data-on="Yes" data-off="No">
                    </label>
                </td>
            </tr>
            <tr><td class="text-center">24</td>
                 <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="hotline1" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="link_tt"
                value="<?=@$config_text->hotline1?>" placeholder=""/></td>
                 <td class="text-center">hotline1</td>
                <td class="text-center">
                    <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="hotline1">
                        <input type="checkbox" <?=@$config_home->hotline1==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                               data-on="Yes" data-off="No">
                    </label>
                </td>
            </tr>
            <tr><td class="text-center">25</td>
                 <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="hotline2" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="hotline2"
                value="<?=@$config_text->hotline2?>" placeholder=""/></td>
                 <td class="text-center">hotline2</td>
                <td class="text-center">
                    <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="hotline2">
                        <input type="checkbox" <?=@$config_home->hotline2==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                               data-on="Yes" data-off="No">
                    </label>
                </td>
            </tr>
            <tr><td class="text-center">26</td>
                 <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="hotline3" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="hotline3"
                value="<?=@$config_text->hotline3?>" placeholder=""/></td>
                 <td class="text-center">hotline3</td>
                <td class="text-center">
                    <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="hotline3">
                        <input type="checkbox" <?=@$config_home->hotline3==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                               data-on="Yes" data-off="No">
                    </label>
                </td>
            </tr>
             <tr><td class="text-center">27</td>
                 <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="site_promo" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="site_promo"
                value="<?=@$config_text->site_promo?>" placeholder=""/></td>
                 <td class="text-center">site_promo</td>
                <td class="text-center">
                    <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="site_promo">
                        <input type="checkbox" <?=@$config_home->site_promo==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                               data-on="Yes" data-off="No">
                    </label>
                </td>
            </tr>
            <tr><td class="text-center">28</td>
                 <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="address" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="address"
                value="<?=@$config_text->address?>" placeholder=""/></td>
                 <td class="text-center">address</td>
                <td class="text-center">
                    <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="address">
                        <input type="checkbox" <?=@$config_home->address==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                               data-on="Yes" data-off="No">
                    </label>
                </td>
            </tr>
            <tr><td class="text-center">29</td>
                 <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="chat" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="chat"
                value="<?=@$config_text->chat?>" placeholder=""/></td>
                 <td class="text-center">chat</td>
                <td class="text-center">
                    <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="chat">
                        <input type="checkbox" <?=@$config_home->chat==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                               data-on="Yes" data-off="No">
                    </label>
                </td>
            </tr>
            <tr><td class="text-center">30</td>
                 <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="watermark" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="watermark"
                value="<?=@$config_text->watermark?>" placeholder=""/></td>
                 <td class="text-center">watermark</td>
                <td class="text-center">
                    <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="watermark">
                        <input type="checkbox" <?=@$config_home->watermark==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                               data-on="Yes" data-off="No">
                    </label>
                </td>
            </tr>
            <tr><td class="text-center">31</td>
                 <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="color" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="color"
                value="<?=@$config_text->color?>" placeholder=""/></td>
                 <td class="text-center">color</td>
                <td class="text-center">
                    <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="color">
                        <input type="checkbox" <?=@$config_home->color==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                               data-on="Yes" data-off="No">
                    </label>
                </td>
            </tr>
            <tr><td class="text-center">32</td>
                 <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="size" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="size"
                value="<?=@$config_text->size?>" placeholder=""/></td>
                 <td class="text-center">size</td>
                <td class="text-center">
                    <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="size">
                        <input type="checkbox" <?=@$config_home->size==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                               data-on="Yes" data-off="No">
                    </label>
                </td>
            </tr>
        </tbody>
    </table>
</form> 