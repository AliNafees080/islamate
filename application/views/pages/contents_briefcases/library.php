<!--ALKIEMoePQBaxeAi5v0DQz------old key-->
<!--Ayr6iaQ5lSSiU6LJjOlNvz---new key-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/filepicker.js"></script>
<style>
    .btn-group,
    .btn-group-vertical {
        position: relative;
        display: table;
        margin: auto;
        vertical-align: middle;
        table-layout: fixed;
        width: 100%;
    }
    .btn-group>.btn,
    .btn-group-vertical>.btn {
        position: relative;
        display: table-cell;
    }
    .btn-xs,
    .btn-group-xs>.btn {
        padding: 1px;
        font-size: 12px;
        line-height: 1.5;
        border-radius: 3px
    }
    #modal-items > .modal-dialog{ width:75%;}
    .switch-left {
    background-color: #20b888 !important;
    background-image: linear-gradient(to bottom, #0044cc, #0088cc);
    background-repeat: repeat-x;
    border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
    color: #ffffff;
    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
}
</style>
<?php
//echo "<pre>";
//print_r($detail);
//echo "</pre>";
//die();
?>
<div id="wrapper">
<!--    To create dynamic view of tags in filter list-->
    <li id="tag_view_for_filterlist" class="hide"> 
        <span data-path=""></span>
    </li>
<!--    End -->
<!--        Model to show analytics content -->
            <div id="modal-image-content" tabindex="-1" data-keyboard="false" class="modal fade" style=" z-index: 2000;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button class="close" aria-hidden="true" data-dismiss="modal" type="button">×</button>
                            <h4 id="modal-image-label" class="modal-title">Modal Responsive</h4>
                        </div>
                        <div class="modal-body">
                            <img id="modal-image-path" src="<?php echo base_url()."assets/images/icons/loader1.GIF"; ?>" style=" width: 100%; height: 100%;"/>
                        </div>                        
                    </div>
                </div>
            </div>
            <!--            End model-->
            
            <!--        Model to show analytics content -->
            <div id="modal-audio-content" tabindex="-1" data-keyboard="false" class="modal fade" style=" z-index: 2000; text-align: center;">
                <div class="modal-dialog" style=" width: 333px;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button class="close" aria-hidden="true" data-dismiss="modal" type="button">×</button>
                            <h4 id="modal-audio-label" class="modal-title">Modal Responsive</h4>
                        </div>
                        <div class="modal-body">
                            <audio controls id="audio_player">
                                <source id="modal-audio-path" src="" type="audio/mpeg">                               
                            </audio>
                        </div>                       
                    </div>
                </div>
            </div>
            <!--            End model-->
            
            <!--        Model to show analytics content -->
            <div id="modal-video-content" tabindex="-1" data-keyboard="false" class="modal fade" style=" z-index: 2000; text-align: center">
                <div class="modal-dialog" style=" width: 500px;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button class="close" aria-hidden="true" data-dismiss="modal" type="button">×</button>
                            <h4 id="modal-video-label" class="modal-title">Modal Responsive</h4>
                        </div>
                        <div class="modal-body">                          
                             <video width="420" height="240" controls id="video_player" style=" width: 100%; height: 90%;">
                                <source id="modal-video-path" src="" type="video/mp4">
                            </video> 
                        </div>                        
                    </div>
                </div>
            </div>
            <!--            End model-->    

<!--    To create view of content-->
    <li class="list-item hide" id="content_view_item" style=" width: 120px;">
        <div class="list-box">
            <!--<img/>-->
            <div class="imgtag">
                <!--<img id="img" src="" alt="" title="" class="view_lib" data-toggle="modal" data-target="#modal-items" />-->
                <div  class="icons">
                           <div id="img" class="file-icon file-icon-xl view_lib" style="margin:auto;" data-toggle="modal" data-target="#modal-items" data-type=""></div>
                           <input type="hidden" class="content_json" value=''>
                </div>
                
                <div class="quick-menu btn-group menu-right">
                    <a content_id="" attr-index="" href="#modal-comments" title="Comments" class="btn btn-default btn-xs  ellipsis_div comment_view_icon"  data-toggle="modal" >
                        <div class="fa fa-comment"></div><br/><span class="comment_count_value">0</span>
                    </a>
                    <a style=" cursor: default;" class="btn btn-default btn-xs  ellipsis_div" title="Views">
                        <div class="fa fa-eye"></div><br/><span class="views"></span>
                    </a>
                    <a data-toggle="modal" href="#modal-delete-content" title="Move to trash" class="del_content btn-default btn btn-default btn-xs  ellipsis_div" value="">
                        <i class="fa fa-trash-o trash_size"></i>
                    </a>
                </div>
            </div>
            <!--<data></data>-->
            <div class="block">
                <p class="title ellipsis_div name"></p>
                <p class="date ellipsis_div creation_time"></p>                    
                <div class="tag">
                    <span class="badge badge-playground"></span>
                </div>
            </div>
        </div>            
    </li>

    <li class="in" style=" display: none;" id="comment_view">
        <img src="" class="avatar img-responsive" />
        <div class="message">
            <span class="chat-arrow"></span>
            <a class="chat-name"></a>&nbsp;
            <span class="chat-datetime">at July 06, 2014 17:06</span> 
            <i class="fa fa-times delete_comment_icon" data-target="#modal-delete-comment" data-toggle="modal" attr-index="" style="float: right; cursor: pointer;" title="Delete comment"></i>
            <span class="chat-body wrapword"></span>
        </div>
    </li>   
    
    <!--BEGIN PAGE WRAPPER-->
    <div id="page-wrapper">
        <!--BEGIN TITLE & BREADCRUMB PAGE-->
        <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
            <div class="page-header pull-left">
                <div class="page-title"><i class="fa fa-home" style=" margin-top: 7px;"></i>&nbsp;&nbsp;Contents & Briefcases</div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-left">
                <li class="active">&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;<a href="">Library</a></li>
                <div class="clearfix"></div>
            </ol>           
            <form action="<?php echo base_url() ?>content_briefcases/insert_file" class="pull-right mbm mtm" style="display: inline-block;" enctype="multipart/form-data" method="post">
                <label for="file-upload" class="btn btn btn-grey">Add File</label>
                <input type="file" id="file-upload" class="hidden" name="uploadfile" />
<!--                <input onchange="filepickerresponse(event.fpfiles)" data-fp-button-title="Add file" data-fp-button-class="btn btn-grey" data-fp-multiple="true"  data-fp-button-text="Add File" data-fp-store-path="" data-fp-mimetypes="*/*" data-fp-apikey="ALKIEMoePQBaxeAi5v0DQz" type="filepicker"> -->
                <!--<a onclick="filepickerresponse(event.fpfiles)" data-fp-button-title="Add File" data-fp-multiple="true"  data-fp-button-text=" " data-fp-store-path="" data-fp-mimetypes="*/*" data-fp-apikey="ALKIEMoePQBaxeAi5v0DQz" type="filepicker" title="Upload file" class=" btn btn-grey">Add Briefcase</a>-->
            </form>
        </div>
        <!--END TITLE & BREADCRUMB PAGE-->
        <!--BEGIN CONTENT-->
        <div class="page-content">  
            
            <!--        Model to delete tag    -->
            <div id="modal-delete-tag" tabindex="-1" data-keyboard="false" class="modal fade" style=" z-index: 2000;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <p>Would you like to delete selected content permanently?</p>
                        </div>
                        <div class="modal-footer">
                            <button id="remove_tag_submit" type="button" data-dismiss="modal" class="btn btn-grey" value="">OK</button>
                            <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>                           
                        </div>
                    </div>
                </div>
            </div>
            <!--            End model-->
    
            <div class="row">           
                <!--BEGIN MODAL content PORTLET-->
                <div id="modal-items" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                <h4 class="modal-title weight ed_name"><span data-name="name"></span></h4>
                            </div>
                            <div class="panel-body pan" >
                                <form action="#" id="update_form" class="horizontal-form update_frm" method="POST">
                                    <div class="form-body pal col-md-10" style="float: none;margin: auto" >
                                        <div class="row col-md-12 mbl" style="display: table">
                                            <span class="col-md-2" style="display: table-cell">
                                                <a class="image_address" href="" target="_blank" data-target="" data-toggle="modal" attr-path="" attr-name="" attr-index=""  class="">
                                                   
                                                    <div  class="icons">
                                                        <div id="img" style="" class="file-icon file-icon-xl view_image" src="" style="margin:auto;" data-type="">
                                                        </div>
                                                    </div>
                                                </a>
                                            </span>
                                            <span class="col-md-10" style="display: table-cell;padding-left: 40px; width: 79%; margin-top: 90px;">
                                                <input  name="name" maxlength="200" class="form-control col-md-10" value="" type="text" style="">
                                                <input type="hidden" class="old_filename"  name="old_filename" value="">
                                            </span>                                            
                                        </div>                                      
                                    
                                        <div class="row">
                                            <div class="col-md-5" style="margin-bottom:15px;">
                                                <div class="form-group">
                                                    <label  class="control-label col-md-6 weight">Last Update : </label><span class="col-md-6"><span data-name="last_update"></span></span> 
                                                </div>                                                    
                                            </div>                                              
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="inputPhone" class="control-label col-md-5 weight">Expires</label>
                                                        <span class="col-md-7">
                                                           <div class="input-group datetimepicker-default date" id="">
                                                               <input type="text" data-format="YYYY-MM-DD HH:mm:ss" name="expiration_date" value="" class="form-control"  />
                                                               <span class="input-group-addon" ><i class="fa fa-calendar"></i></span>
                                                           </div>
                                                       </span>
                                                </div>
                                            </div>
                                        </div> <br/>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label  class="control-label col-md-6 weight">Uploaded at : </label><span class="col-md-6" ><span data-name="creation_time"></span></span> </div>
                                            </div>  
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="inputPhone" class="control-label col-md-5 weight">Used in briefcase</label>
                                                    <span class="col-md-7" style="width:220px; word-wrap:break-word;" data-name="used_in_briefcase">briefcase1,briefcase2,db1,db3</span>
                                                </div>
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="row">
                                             <div class="col-md-12">
                                                <div class="form-group">
                                                    <label  class="control-label col-md-2 weight">Description</label>
                                                    <span class="col-md-9" ><textarea  name="description" maxlength="200" type="text" placeholder="" rows="2" style="resize: none; float: right; width: 96%;" class="form-control col-md-12" ></textarea></span> 
                                                </div>
                                            </div> 
                                        </div><br/>

                                        <div class="row modal-footer" style="border: none; ">
                                            <div class="col-md-12" style="padding: 0; ">
                                            <input type="hidden" name="content_id" value="">
                                            <button class="btn btn-grey update_content"  data-dismiss="modal" type="submit">Update</button>&nbsp;
                                            <button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> 
                <!--END MODAL Content PORTLET-->
                
                <!--        Model to delete comment    -->
            <div id="modal-delete-comment" tabindex="-1" data-keyboard="false" class="modal fade" style=" z-index: 2000;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <p>Would you like to delete selected content comment?</p>
                        </div>
                        <div class="modal-footer">
                            <button id="delete_comment_submit" type="button" data-dismiss="modal" class="btn btn-grey" value="">OK</button>
                            <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!--            End model-->
            
             <!--        Model to delete content    -->
            <div id="modal-delete-content" tabindex="-1" data-keyboard="false" class="modal fade" style="">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <p>Would you like to move selected content to trash?</p>
                        </div>
                        <div class="modal-footer">
                            <button id="delete_content_submit" type="button" data-dismiss="modal" class="btn btn-grey" value="">OK</button>
                            <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!--            End model-->

                <!--comment box-->
                <div id="modal-comments" class="modal fade" style="">
                    <div class="modal-dialog" style=" z-index: 100;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                <h4 class="modal-title">Comments</h4>
                            </div>
                            <div class="modal-body">
                                <div class="chat-scroller" style=" max-height: 350px;">
                                    <ul class="chats" id="comment_view_ul">
                                                                               
                                    </ul>
                                </div>

                            </div>
                            <div class="modal-footer" style=" border-top: none;">
                                <div class="chat-form">
                                    <div class="input-group">
                                        <input id="input-chat2" maxlength="255" type="text" placeholder="Type a comment here..." class="form-control" /><span id="btn-chat" class="input-group-btn">
                                            <button type="button" class="btn btn-grey" id="comment_submit_btn"><i class="fa fa-check"></i></button></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--comment box-->

                <!--update version-->
                <div id="modal-version" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                <h4 class="modal-title">Upload a new version for content</h4>
                            </div>
                            <div class="modal-body">
                                <div class="chat-scroller">
                                    <ul class="chats">
                                        <li class="in">
                                            <img src="" class="avatar img-responsive" />
                                            <div class="message"><span class="chat-arrow"></span><a href="#" class="chat-name">Admin</a>&nbsp;<span class="chat-datetime">at July 06, 2014 17:06</span><span class="chat-body wrapword">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</span>
                                            </div>
                                        </li>                                       
                                    </ul>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <div class="chat-form">
                                    <div class="input-group">
                                        <input id="input-chat" type="text" placeholder="Type a message here..." class="form-control" /><span id="btn-chat" class="input-group-btn"><button type="button" class="btn btn-grey"><i class="fa fa-check"></i></button></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--update version-->
                <!--page contents-->
                <div class="col-lg-12">
                    <div class="panel">
                        <div class="panel-body">
                            <div id="grid-layout-ul-li" class="box jplist">
                                <div class="jplist-ios-button"><i class="fa fa-sort"></i>jPList Actions</div>
                                <div class="jplist-panel box panel-top">
                                    <div style="display: inline-block;">
                                        <div data-control-type="drop-down" data-control-name="paging" data-control-action="paging" class="jplist-drop-down form-control" style="padding-left: 0px;">
                                            <ul class="dropdown-menu">
                                                <li><span data-number="5"> 5 per page</span></li>
                                                <li><span data-number="10" data-default="true"> 10 per page</span></li>
                                                <li><span data-number="all"> view all</span></li>
                                            </ul>
                                        </div>
                                        <div data-control-type="drop-down" data-control-name="sort" data-control-action="sort" data-datetime-format="{month}/{day}/{year}" class="jplist-drop-down form-control" style="padding-left: 0px;">
                                            <ul class="dropdown-menu">
                                                <li><span data-path="default">Sort by</span></li>
                                                <li><span data-path=".title" data-order="asc" data-type="text">Title A-Z</span></li>
                                                <li><span data-path=".title" data-order="desc" data-type="text">Title Z-A</span></li>
                                                <li><span data-path=".date" data-order="asc" data-type="datetime">Date asc</span></li>
                                                <li><span data-path=".date" data-order="desc" data-type="datetime">Date desc</span></li>
                                            </ul>
                                        </div>                                       
                                         <div data-control-type="drop-down" data-control-name="category-filter" data-control-action="filter" class="jplist-drop-down form-control" style="padding-left: 0px;">
                                            <ul class="dropdown-menu">
                                                <li><span data-path="default">File Type</span></li>
                                                <li><span data-path=".application">Documents</span>
                                                </li>
                                                <li><span data-path=".image">Photos</span>
                                                </li>
                                                <li><span data-path=".audio">Audio</span>
                                                </li>
                                                <li><span data-path=".video">Videos</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div data-control-type="drop-down" data-control-name="category-filter" data-control-action="filter" class="jplist-drop-down form-control" style="padding-left: 0px; width: 171px;">
                                            <ul class="dropdown-menu" style="width: 100%;">
                                                <li><span data-path="default">Property</span>
                                                </li>
                                                <li><span data-path=".commented">Commented</span>
                                                </li>
                                                <li><span data-path=".no_views">No Views</span>
                                                </li>
                                            </ul>
                                        </div>
                                         <div class="text-filter-box">
                                            <div class="input-group"><span class="input-group-addon"><i class="fa fa-search"></i></span>
                                                <input data-path=".title" type="text" value="" placeholder="Filter by Title" data-control-type="textbox" data-control-name="title-filter"
                                                       data-control-action="filter" class="form-control" style="padding-left: 0px; width: 232px;" />
                                            </div>
                                        </div>                                        
                                    </div>
                                    <br/>
<!--                                    <div class="" style="">
                                        <div class="col-md-3" style="padding-left: 0px; width: 171px; padding-right: 0px;">
                                            <div data-control-type="drop-down" data-control-name="category-filter" data-control-action="filter" class="jplist-drop-down form-control" style="padding-left: 0px;">
                                                <ul class="dropdown-menu">
                                                    <li><span data-path="default">File Type</span></li>
                                                    <li><span data-path=".application">Documents</span>
                                                    </li>
                                                    <li><span data-path=".image">Photos</span>
                                                    </li>
                                                    <li><span data-path=".audio">Audio</span>
                                                    </li>
                                                    <li><span data-path=".video">Videos</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-3" style="padding-left: 9px; width: 171px; padding-right: 0px;">
                                            <div data-control-type="drop-down" data-control-name="category-filter" data-control-action="filter" class="jplist-drop-down form-control" style="padding-left: 0px; width: 171px;">
                                                <ul class="dropdown-menu" style="width: 100%;">
                                                    <li><span data-path="default">Property</span>
                                                    </li>
                                                    <li><span data-path=".commented">Commented</span>
                                                    </li>
                                                    <li><span data-path=".no_views">No Views</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>-->
                                        <div data-control-type="views" data-control-name="views" data-control-action="views" data-default="jplist-grid-view" class="jplist-views" style="display: inline-block;float: right">

                                        </div>
                                    
                                        <div style=" margin-top: 10px;" data-type="{start} - {end} of {all}" data-control-type="pagination-info" data-control-name="paging" data-control-action="paging" class="jplist-label btn btn-default"></div>
                                        <div style=" margin-top: 10px;" data-control-type="pagination" data-control-name="paging" data-control-action="paging" data-control-animate-to-top="true" class="jplist-pagination"></div>
                                    </div>
                                                                <?php //echo '<pre>'; print_r($detail); echo '</pre>'; ?>
                                    <ul class="box text-shadow ul-li-list content_list">
                                        <?php foreach ($detail['content'] as $key => $content) {
//                                                $key_array = explode("_", $key);
//                                                $key = $key_array[1];//Because key has value string value (content_12 ).
                                                ?>
                                                <li class="list-item" style="width:120px;">
                                                    <?php
                                                    $m_type = $content['type'];
                                                    $fil_name = explode('.', $content['filepath']);
                                                    $last_element = end($fil_name);
                                                    $file_name = strtoupper($last_element);
                                                    $absolutePath = dirname($_SERVER['SCRIPT_FILENAME']) . "/";
                                                    $thumbnail = base_url() . 'assets/file/' . $file_name . '.png';
                                                    if(!file_exists($absolutePath . 'assets/file/' . $file_name . '.png'))
                                                        $thumbnail = base_url() . 'assets/file/DEFAULT.png';
                                                    ?>
                                                    <div class="content_<?php
                                                        echo $content['content_id'];
                                                        if ($content['comments_count'] != 0) {
                                                            echo ' commented';
                                                        }
                                                        if ($content['comments_count'] == 0) {
                                                            echo ' no_views';
                                                        }
                                                        if (!empty($content['expiration_date'])) {
                                                            echo ' expired';
                                                        }
//                                            
                                            ?> list-box">
                                                        <div class="imgtag align-center <?php echo $m_type; ?>">
                                                        <div class="<?php echo $content['type']; ?>">
                                                            <!--<img id="img" src="<?php echo $thumbnail; ?>" alt="" title="" class="<?php echo $content['content_id'] . " " . implode(' ', $content['tag_names']); ?> view_lib" data-toggle="modal" data-target="#modal-items" />-->
                                                            
                                                            <div class="icons">
                                                                <div id="img" class="file-icon file-icon-xl <?php echo $content['content_id']; ?> view_lib" data-toggle="modal" data-target="#modal-items" style="margin:auto; cursor: pointer;" title="Click to view" data-type="<?php echo $last_element; ?>"></div>
                                                                <input type="hidden" class="content_json" value='<?php echo json_encode($content, JSON_HEX_APOS); ?>'>
                                                            </div>
                                                            <div class="quick-menu btn-group menu-right" style="">
                                                                <a href="#modal-comments" title="Comments" class="btn btn-default btn-xs  ellipsis_div comment_view_icon"  data-toggle="modal" attr-index="<?php echo $key; ?>" content_id="<?php echo $content['content_id']; ?>">
                                                                    <div class="fa fa-comment"></div><br/><span class="comment_count_value"><?php echo $content['comments_count']; ?></span>
                                                                </a>
                                                                <a title="Views" class="btn btn-default btn-xs  ellipsis_div" style=" cursor: default;">
                                                                    <div class="fa fa-eye"></div><br/><?php echo $content['views']; ?>
                                                                </a>
                                                                <a href="#modal-delete-content"  data-toggle="modal" title="Move to trash" class="btn-default btn btn-default btn-xs del_content  ellipsis_div" value="<?php echo $content['content_id']; ?>">
                                                                    <i class="fa fa-trash-o trash_size"></i>
                                                                </a>
                                                            </div>
                                                        </div>                                                      
                                                        <div class="block" style=" width: 100%">
                                                            <p class="title ellipsis_div"><?php echo $content['name']; ?></p>
                                                            <p class="date ellipsis_div"><?php echo date("Y/m/d",strtotime($content['creation_time'])); ?></p>
                                                        </div>
                                                    </div>
                                                </li>
                                        <?php } ?>
                                        </ul>
                                        <div class="jplist-ios-button"><i class="fa fa-sort"></i>jPList Actions</div>
                                        
                                        <div class="box jplist-no-results text-shadow align-center">
                                            <p>No results found</p>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--END CONTENT-->
            </div>
            <!--END PAGE WRAPPER-->
        </div>
        <!--END PAGE WRAPPER-->
    </div>
    <!--LOADING SCRIPTS FOR contents and briefcases-->
    <script src="<?php echo base_url(); ?>assets/vendors/jplist/html/js/vendor/modernizr.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/jplist/html/js/jplist.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jplist.js"></script>
    <script>
      //******************tag add edit delete*************** 
    var allcomments = <?php echo json_encode($detail['content']) ?>;
    //console.log(allcomments);
    
    $(document).ready(function(){     
            $("#frm-name").validate({
                ignore: ':not(select:hidden, input:visible, textarea:visible)',
                rules: {
                    country: {
                        required: true
                    }
                },
                errorPlacement: function (error, element) {
                    if ($(element).is('select')) {
                        element.next().after(error); // special placement for select elements
                    } else {
                        error.insertAfter(element);  // default placement for everything else
                    }
                }
            })
    //*******content view in briefcase on click for audio, video and image**************
     $(document).on('click', '.view_image_icon', function(){
        $("#modal-image-path").attr("src",$(this).attr("attr-path"));
        $("#modal-image-label").text($(this).attr("attr-name"));
    });
    
    $(document).on('click', '.view_audio_icon', function(){
        $("#modal-audio-path").attr("src",$(this).attr("attr-path"));
        $("#modal-audio-label").text($(this).attr("attr-name"));
        var audio = $("#audio_player");              
        audio[0].pause();
        audio[0].load();
        audio[0].play();
    });
    
    $(document).on('click', '.view_video_icon', function(){
        $("#modal-video-path").attr("src",$(this).attr("attr-path"));
        $("#modal-video-label").text($(this).attr("attr-name"));
        var video = $("#video_player");              
        video[0].pause();
        video[0].load();
        video[0].play();
    });
    //****************************************
            //************* lIBRARY EDIT and VIEW ***************//
            $(document).on('click','.view_lib',function(e){  e.preventDefault();
                var base_url = "<?php echo base_url() ?>";
                var view = $(this).parent().find('input').val();//console.log(view);//return false;
                object = JSON.parse(view);  //console.log(object);              
                var img_type= object.name.split('.');//console.log(img_type);
                
                if(img_type.length == 1)
                   var image = "DEFAULT";
                else
                   var image = img_type[img_type.length-1];//console.log(image);
        
        
                $('.old_filename').val(object.name);
                $('#update_form').find('.view_image').attr('data-type',image);
                
                $.each(object,function(key, value){
                    if(key == "name"){ //This code is applied to show only image name not extension.
                        var valuearray = value.split('.');
                        if(valuearray.length > 1)
                            value = valuearray[0];
                    }
//                    $('#update_form').find('.image_address').attr('href',base_url+'assets/upload/'+object.filepath);
                    if(object.type == 'image'){
                        $('#update_form').find('.image_address').removeAttr('href');
                    $('#update_form').find('.image_address').attr('data-target','#modal-image-content');
                    $('#update_form').find('.image_address').addClass('view_image_icon');
                    } else if(object.type == 'video'){
                    $('#update_form').find('.image_address').attr('data-target','#modal-video-content');
                        $('#update_form').find('.image_address').removeAttr('href');
                         $('#update_form').find('.image_address').addClass('view_video_icon');
                    } else if(object.type == 'audio'){
                    $('#update_form').find('.image_address').attr('data-target','#modal-audio-content');
                        $('#update_form').find('.image_address').removeAttr('href');
                         $('#update_form').find('.image_address').addClass('view_audio_icon');
                    } else {
                        $('#update_form').find('.image_address').attr('href',base_url+'assets/upload/'+object.filepath);
                        $('#update_form').find('.image_address').removeAttr('data-target');
                    }
                    $('#update_form').find('.image_address').attr('attr-path',base_url+'assets/upload/'+object.filepath);
                    $('#update_form').find('.image_address').attr('attr-name',object.name);
//                    $('#update_form').find('.image_address').removeAttr('href');
                    $("[data-name='"+key+"']").text(value);
                    $("[name='"+key+"']").val(value);                   
                });
            });            
            $(document).on('click','#comment_submit_btn',function(){
                 if($("#input-chat2").val().trim() != '')
                    save_comment();
            }); 
            document.getElementById("input-chat2").addEventListener( "keydown", function( e ) {
                var keyCode = e.keyCode || e.which;
                if ( keyCode === 13 ) {
                    if($("#input-chat2").val().trim() != ''){
                        save_comment();
                    }
                }
            }, false);
            //***************Create comment view*********************              
            
            $(document).on('click','.comment_view_icon',function(){
               var id = $(this).attr("attr-index"); 
               var content_id = $(this).attr("content_id"); 
               $("#comment_submit_btn").attr("content_id",content_id);
               $("#comment_submit_btn").attr("content_index",id);
               var comment_list = {};
               comment_list = allcomments[id]['comments'];
               $("#comment_view_ul").empty();
               $.each(comment_list, function(key,value){
                   var user_image = '<?php echo base_url(); ?>assets/upload/'+value['user_img'];
                   create_comment_view(value['type_value'],value['notification_id'],value['user_name'],value['activity_time'],user_image);
               });
               //comment_list = allcomments[id]['comments'].reverse();
            });
            $(document).on('click','.delete_comment_icon',function(){
               $("#delete_comment_submit").attr("attr-index",$(this).attr("attr-index"));
            });
            
            $(document).on('click','#delete_comment_submit',function(){
                var deleteid = {};
                var id = $(this).attr('attr-index');
                deleteid["notification_id"] = id;
                
                $("#comment_view_ul").find("li").each(function(){
                   if($(this).attr("attr-index") == id)
                       $(this).remove();
                });
                
                var response = $.fn.ajax_form_submit(
                deleteid,
                '<?php echo base_url(); ?>content_briefcases/delete_comment','false');
                response = $.parseJSON(response);     
                allcomments = response['content'];     
                
                update_comment_detail($("#comment_submit_btn").attr('content_index'));
                $(this).notification('Comment deleted successfully','Library'); 
            });
            //***********edit values function******************** 
            $.fn.fillEditForm = function (rowJson) { //console.log(rowJson);  
                $(this).clear_form_elements();
                var obj = $(this).parse_json_custom(rowJson); //console.log(obj+'----------------------');
            
                $.each(obj, function(key, value){ //console.log(key+'---selectpicker----'+value);
                    if(key == 'tags'){
                        key = 'tags[]';
                        value = value;
                    }
                    var fieldName = $("[name='"+key+"']"); //console.log(key+'****'+value); //return false;
                    switch(fieldName.prop("type"))  
                    {   
                        case "radio" : case "checkbox":
                                fieldName.each(function(){
                                    fieldName.val(value);
                                    if($(this).attr('value') == 1) {
                                        $(this).parent().addClass('checked');
                                    } else {
                                        $(this).parent().removeClass('checked');
                                    } 
                                });   
                                break;  
                            case "select-one" ://console.log(key+'---'+value);
                                fieldName.find('option[value="'+value+'"]').prop('selected', true);//console.log(key+'----select---'+value);
                                break;
                            case "select-multiple" :
                                var arr = value.split(',');
                                //                                    $('.selectpicker').selectpicker('val',arr);
                                fieldName.selectpicker('val',arr).prop('selected', true);
                                break;
                            default:
                                fieldName.val(value); //console.log(key+'---fields----'+value);
                                break;
                        }  
                    });  
                }//*************reset form elements
                $.fn.clear_form_elements = function () {
                    if($(this).prop('tagName')=='FORM'){
                        // $(this)[0].reset();
                    }else{
                        $(this).find(':input').each(function() {
                            switch($(this).prop('type')) {
                                case 'checkbox':
                                case 'radio':
                                    $(this).prop('checked',false);
                                    break;
                                default :
                                    $(this).val('');
                                    break;
                            }
                        });
                    }
                }
                //*******parse json

                $.fn.parse_json_custom= function(str){//alert('json parse');
                    return $.parseJSON(str.replace(/\&apos/g, "'"));
                }
                //***********delete file content****************
                $(document).on('click','.del_content',function(e){ e.preventDefault();
                    var id = $(this).attr("value");
                    $("#delete_content_submit").attr("value",id);
                });
                
                $(document).on('click','#delete_content_submit',function(e){ e.preventDefault();
                    var id = $(this).attr("value");
                    var trash = {};
                    trash['content_id'] = id;
                    trash['trash'] = 0; //console.log(trash);
                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url(); ?>content_briefcases/trash_file',
                        data: trash //"content_id="+id
                    }) 
                    $(this).parents('li').fadeOut();
                    $("#grid-layout-ul-li").find(".content_"+id).parents(".list-item").remove();
                     $(this).notification('Content moved to trash successfully','Library');
                })
          
                $(document).on('click','.update_content',function(e){e.preventDefault();
                    var url = "<?php echo base_url() ?>content_briefcases/update_file"; // the script where you handle the form input.
                    var base_url = "<?php echo base_url() ?>";
                    var  update_file =  $.ajax({
                        type: "POST",
                        url: url,
                        data: $('#update_form').serialize(), // serializes the form's elements.
                        async: false
                    }).responseText;
                    //*******update condition************
                    var json = $.parseJSON(update_file); //console.log(json); //return false; //console.log(json);
                    //*******update condition************
                    var img_type= json.name.split('.');
                    if(img_type.length == 1)
                        image = "DEFAULT";
                    else
                        var image = img_type[1];
                    //console.log(json.content_id)
                    $('.content_list > .list-item > .content_'+json.content_id+' > .imgtag').find('.content_json').val(update_file);
                    $('.content_list > .list-item > .content_'+json.content_id+' > .imgtag > .quick-menu').find('.del_content').attr('value',json.content_id);
                    //**********dynamic user values*******************
                    
                    $('.content_list > .list-item > .content_'+json.content_id+' > .imgtag').find('#img').attr('data-type',image);
                    
                    $.each(json, function(key, value){
                        $('.content_list .list-item:last').find(function(){
//                            $('.content_list .list-item:last').find('#img').attr('src',base_url+'assets/file/'+image+'.png');
                            $('.content_list .list-item:last').find('#img').attr('data-type',image);
                            $('.content_list .list-item:last').find('.'+key).text(value); //for dynamic user box data
                        })                        
                        
                        if(key == 'name'){
                            $('.content_list > .list-item > .content_'+json.content_id+' > .imgtag > .block > .title').text(value);
                        }
                    });
                    $(this).notification('Content updated successfully','Library');
                     
                    $('#grid-layout-ul-li').jplist({
                        itemsBox: '.ul-li-list'
                        , itemPath: '.list-item'
                        , panelPath: '.jplist-panel'
                        , storage: 'localstorage' //'', 'cookies', 'localstorage'			
                        , storageName: 'jplist-div-layout'
                    });
                
                });
            });
            
            //***************form reseting**********
           
            
            function save_comment(){
                var alldata = {};
                var content_id = $("#comment_submit_btn").attr("content_id");
                alldata['content_id'] = content_id;
                alldata['type'] = "comment";
                alldata['type_value'] = $("#input-chat2").val();
                var date = new Date();
                $("#input-chat2").val(""); //Reset to blank value for next comment.
                
                var response = $.fn.ajax_form_submit(
                alldata,
                '<?php echo base_url(); ?>content_briefcases/insert_comment','false');
                response = $.parseJSON(response);     
                allcomments = response['content'];
                var username = "<?php echo $this->session->userdata("username") ?>";
                create_comment_view(alldata['type_value'],response['current_inserted_id'],username,response['activity_time'],response['user_image']);                
                update_comment_detail($("#comment_submit_btn").attr("content_index"));
                $(this).notification('Comment created successfully','Library');                

            }
            
            function update_comment_detail(content_id){
                $(".comment_view_icon").each(function(){
                   var id = "content_"+$(this).attr('content_id');
                   if(id == content_id){
                        if(allcomments[content_id]['comments_count'] > 0){
                            $(this).parents(".list-box").addClass("commented");
                        }else{
                            $(this).parents(".list-box").removeClass("commented");
                        }
                        $('#grid-layout-ul-li').jplist({
                            itemsBox: '.ul-li-list'
                            , itemPath: '.list-item'
                            , panelPath: '.jplist-panel'
                            , storage: 'localstorage' //'', 'cookies', 'localstorage'			
                            , storageName: 'jplist-div-layout'
                        });
                       $(this).find(".comment_count_value").text("");
                       $(this).find(".comment_count_value").text(allcomments[content_id]['comments_count']);                       
                   }
                });
            }
            $('#modal-image-content').on('hidden.bs.modal', function (e) {
                set_timer_image();
            });
            //$modal-image-content
            function set_timer_image(){
                $("#modal-image-path").attr("src","<?php echo base_url()."assets/images/icons/loader1.GIF"; ?>");       
                $("#modal-image-path:hidden").attr("src","<?php echo base_url()."assets/images/icons/loader1.GIF"; ?>");       
            }
    
           function create_comment_view(comment,index,name,time,user_image){ 
                $("#comment_view_ul").prepend($("#comment_view").clone());
                $("#comment_view_ul li:first").attr("attr-index",index);
                $("#comment_view_ul li:first").find("img").attr("src",user_image);
                $("#comment_view_ul li:first").removeAttr("id");
                $("#comment_view_ul li:first").removeAttr("style"); 
                $("#comment_view_ul li:first").find(".chat-body").text(comment); 
                $("#comment_view_ul li:first").find(".chat-name").text(name); 
                $("#comment_view_ul li:first").find(".chat-datetime").text(time);
                $("#comment_view_ul li:first").find(".delete_comment_icon").attr('attr-index',index);               
            }  
                   
        //***************form reseting**********
        function form_reset(formid){
            $("#tag_id").removeAttr('value');
            $('#'+formid)[0].reset();   
            $('#'+formid).find(".state-success").removeClass("state-success"); 
            $('#'+formid).find(".state-error").removeClass("state-error");
            $('#'+formid).find("em").remove();
        }
            
            //********************file upload**************
            $("#file-upload").change(function (){
                $(this).parents("form").submit();
//                var data = new FormData();
//                $.each(event.target.files, function(key, value) {
//                    data.append(key, value);
//                });
//                console.log(data);
//                var url = "<?php echo base_url() ?>content_briefcases/insert_file"; // the script where you handle the form input.
//                var uploadedfile =  ""//$.ajax({
//                    type: "POST",
//                    url: url,
//                    data: file, // serializes the form's elements.
//                    async: false,
//                    success:function(){
//
//                    }
//                }).responseText;
            //*******update condition************
//
//            var json = $.parseJSON(uploadedfile); //console.log(json); return false; //console.log(json);
//            allcomments['content_'+json.content_id] = json;
//            var img_type= json.name.split('.');
//            var image = img_type[1].toUpperCase();
//            var type = json.type.split('/');
//            var filter_text = type[0];
//
//            //*********add dynamic row**************
//            if(json.action != 'updated'){
//                $('#content_view_item').clone().appendTo('.content_list');
//                $(".content_list").find('#content_view_item').removeAttr("id");
//            }
//            $('.content_list .list-item:last > .list-box').addClass('content_'+json.content_id).removeClass('hide');//.css('display','inline-block');
//            $('.content_list .list-item:last > .list-box > .imgtag').addClass(filter_text);
//            $('.content_list .list-item:last').find('.content_json').val(uploadedfile);
//            $('.content_list .list-item:last > .list-box > .imgtag > .quick-menu').find('.del_content').attr('value',json.content_id);
//            $('.content_list .list-item:last > .list-box > .imgtag > .quick-menu').find('.comment_view_icon').attr('value',json.content_id);
//            $('.content_list .list-item:last > .list-box > .imgtag > .quick-menu').find('.comment_view_icon').attr('content_id',json.content_id);
//            $('.content_list .list-item:last > .list-box > .imgtag > .quick-menu').find('.comment_view_icon').attr('attr-index','content_'+json.content_id);
//            $('.content_list .list-item:last').removeClass('hide');
//            $.each(json, function(key, value){ 
//                //**********dynamic user values*******************
//                var base_url = "<?php echo base_url() ?>";
//                $('.content_list .list-item:last').find(function(){
////                        $('.content_list .list-item:last').find('#img').attr('src',base_url+'assets/file/'+image+'.png');
//                    $('.content_list .list-item:last').find('#img').attr('data-type',image);
//                    $('.content_list .list-item:last').find('.'+key).text(value); //for dynamic user box data
//                })
//            })
//
//            $(this).notification('Content uploaded successfully','Library');
//
//            $('#grid-layout-ul-li').jplist({
//                itemsBox: '.ul-li-list'
//                , itemPath: '.list-item'
//                , panelPath: '.jplist-panel'
//                , storage: 'localstorage' //'', 'cookies', 'localstorage'			
//                , storageName: 'jplist-div-layout'
//            });
        });
          //*****************notification*************************
    </script>
