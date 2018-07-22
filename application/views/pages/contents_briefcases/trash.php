<!--ALKIEMoePQBaxeAi5v0DQz-->
<style>
    .btn-group,
    .btn-group-vertical {
        position: relative;
        display: table;
        margin: auto;
        vertical-align: middle;
        table-layout: fixed;
        width: 100%;
        height: 40px;
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
<div id="wrapper">

    <!--BEGIN PAGE WRAPPER-->
    <div id="page-wrapper">
        <!--BEGIN TITLE & BREADCRUMB PAGE-->
        <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
            <div class="page-header pull-left">
                <div class="page-title"><i class="fa fa-home" style=" margin-top: 7px;"></i>&nbsp;&nbsp;Contents & Briefcases</div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-left">
                <li class="active">&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;<a href="">Trash</a></li>
                <div class="clearfix"></div>
            </ol>           
        </div>
        <!--END TITLE & BREADCRUMB PAGE-->
        <!--BEGIN CONTENT-->
        <div class="page-content">
            
            <!--        Model to delete content    -->
            <div id="modal-delete-content" tabindex="-1" data-keyboard="false" class="modal fade" style="">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <p>Would you like to delete selected content permanently?</p>
                        </div>
                        <div class="modal-footer">
                            <button id="delete_content_submit" type="button" data-dismiss="modal" class="btn btn-grey" value="">OK</button>
                            <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!--            End model-->
            
            <!---------Model to restore content------->
            <div id="modal-restore-content" tabindex="-1" data-keyboard="false" class="modal fade" style="">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <p>Would you like to restore selected content?</p>
                        </div>
                        <div class="modal-footer">
                            <button id="restore_content_submit" type="button" data-dismiss="modal" class="btn btn-grey" value="">OK</button>
                            <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!------------ End model------------->
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
                                                    <!--<img data-title="Image winter-sun" data-lightbox="image-winter-sun" class="view_image" style="border: 5px solid #fff; box-shadow: 0 2px 3px rgba(0,0,0,0.25);" src="<?php echo base_url(); ?>assets/vendors/jplist/html/img/thumbs/winter-sun.jpg">-->
                                                    <div  class="icons">
                                                        <div id="img" style="" class="file-icon file-icon-xl view_image" src="" style="margin:auto;" data-toggle="modal"  data-type="">
                                                        </div>
                                                    </div>
                                                </a>
                                            </span>
                                            <span class="col-md-10" style="display: table-cell;margin-top:90px;padding-left: 40px; width: 79%;">
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
            
            <div class="row">
                <!--page contents-->
                <?php //echo'<pre>'; print_r($detail); echo'</pre>'; ?>
                <div class="col-lg-12">
                    <div class="panel">
                        <div class="panel-body">
                            <div id="grid-layout-ul-li" class="box jplist">
                                <div class="jplist-ios-button"><i class="fa fa-sort"></i>jPList Actions</div>
                                <div class="jplist-panel box panel-top">
                                    <div style="display: inline-block;">
                                        <div data-control-type="drop-down" data-control-name="paging" data-control-action="paging" class="jplist-drop-down form-control" style="padding-left: 0px;">
                                            <ul class="dropdown-menu">
                                                <li><span data-number="6"> 5 per page</span>
                                                </li>
                                                <li><span data-number="11" data-default="true"> 10 per page</span>
                                                </li>
                                                <li><span data-number="all"> view all</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div data-control-type="drop-down" data-control-name="sort" data-control-action="sort" data-datetime-format="{month}/{day}/{year}" class="jplist-drop-down form-control" style="padding-left: 0px;">
                                            <ul class="dropdown-menu">
                                                <li><span data-path="default">Sort by</span>
                                                </li>
                                                <li><span data-path=".title" data-order="asc" data-type="text">Title A-Z</span>
                                                </li>
                                                <li><span data-path=".title" data-order="desc" data-type="text">Title Z-A</span>
                                                </li>
                                                <li><span data-path=".date" data-order="asc" data-type="datetime">Date asc</span>
                                                </li>
                                                <li><span data-path=".date" data-order="desc" data-type="datetime">Date desc</span>
                                                </li>
                                            </ul>
                                        </div>
                                         <div data-control-type="drop-down" data-control-name="category-filter" data-control-action="filter" class="jplist-drop-down form-control" style="padding-left: 0px;">
                                            <ul class="dropdown-menu">
                                                <li><span data-path="default">File Type</span></li>
                                                <li><span data-path=".application">Documents</span></li>
                                                <li><span data-path=".image">Photos</span></li>
                                                <li><span data-path=".audio">Audio</span></li>
                                                <li><span data-path=".video">Videos</span></li>
                                                <li><span data-path=".text">Web Applications</span></li>
                                            </ul>
                                        </div>
                                        <div data-control-type="drop-down" data-control-name="category-filter" data-control-action="filter" class="jplist-drop-down form-control" style="padding-left: 0px; width: 171px;">
                                            <ul class="dropdown-menu" style="width: 100%;">
                                                <li><span data-path="default">Property</span></li>
                                                <li><span data-path=".commented">Commented</span></li>
                                                <li><span data-path=".no_views">No Views</span></li>                                                   
                                            </ul>
                                        </div>
                                         <div class="text-filter-box">
                                            <div class="input-group"><span class="input-group-addon"><i class="fa fa-search"></i></span>
                                                <input data-path=".title" type="text" value="" placeholder="Filter by Title" data-control-type="textbox" data-control-name="title-filter"
                                                       data-control-action="filter" class="form-control" style="padding-left: 0px; width: 232px;" />
                                            </div>
                                        </div>
                                        
                                    </div>                                   
<!--                                    <div class="" style="">
                                       <div class="col-md-3" style="padding-left: 0px; width: 171px; padding-right: 0px;">
                                            <div data-control-type="drop-down" data-control-name="category-filter" data-control-action="filter" class="jplist-drop-down form-control" style="padding-left: 0px;">
                                                <ul class="dropdown-menu">
                                                    <li><span data-path="default">File Type</span></li>
                                                    <li><span data-path=".application">Documents</span></li>
                                                    <li><span data-path=".image">Photos</span></li>
                                                    <li><span data-path=".audio">Audio</span></li>
                                                    <li><span data-path=".video">Videos</span></li>
                                                    <li><span data-path=".text">Web Applications</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3" style="padding-left: 9px; width: 171px; padding-right: 0px;">
                                            <div data-control-type="drop-down" data-control-name="category-filter" data-control-action="filter" class="jplist-drop-down form-control" style="padding-left: 0px; width: 171px;">
                                                <ul class="dropdown-menu" style="width: 100%;">
                                                    <li><span data-path="default">Property</span></li>
                                                    <li><span data-path=".commented">Commented</span></li>
                                                    <li><span data-path=".no_views">No Views</span></li>                                                   
                                                </ul>
                                            </div>
                                        </div>
                                    </div>-->
                                    <div class="jplist-panel box panel-bottom">       
                                        <div data-type="{start} - {end} of {all}" data-control-type="pagination-info" data-control-name="paging" data-control-action="paging" class="jplist-label btn btn-default"></div>
                                        <div data-control-type="pagination" data-control-name="paging" data-control-action="paging" data-control-animate-to-top="true" class="jplist-pagination"></div>
                                    </div>
                                <ul class="box text-shadow ul-li-list content_list">
                                    <!--<item>1</item>-->
                                    <?php foreach ($detail['trash_content'] as $content) { ?>
                                        <li class="list-item" style="width:120px;">
                                            <?php
                                            $m_type = $content['type'];
                                            $fil_name = explode('.', $content['name']);
                                            $last_element = end($fil_name);
                                            $file_name = strtoupper($last_element);
                                            $absolutePath = dirname($_SERVER['SCRIPT_FILENAME']) . "/";
                                            $thumbnail = base_url() . 'assets/file/' . $file_name . '.png';
                                                                               
                                            ?>
                                            <div class="content_<?php echo $content['content_id'];
                                            if($content['comments_count'] != 0){ echo ' commented';}
                                            if($content['comments_count'] == 0){ echo ' no_views';}
                                            if(!empty($content['expiration_date'])){echo ' expired';}
                                            ?>
                                          list-box">
                                     
                                            <div class="imgtag align-center <?php echo $m_type; ?>">
                                                <div class="icons">
                                                    <div id="img" class="file-icon file-icon-xl view_lib" style="margin:auto; cursor: pointer;" data-toggle="modal" data-target="#modal-items" data-type="<?php echo $last_element; ?>" title="Click to view"></div>
                                                    <input type="hidden" class="content_json" value='<?php echo json_encode($content, JSON_HEX_APOS); ?>'>
                                                </div>
                                                <div class="quick-menu btn-group menu-right">
                                                    <a href="#modal-restore-content"  data-toggle="modal" title="Restore" class="btn-default btn btn-default btn-xs  ellipsis_div restore_content ellipsis_div"  value="<?php echo $content['content_id']; ?>">
                                                        <i class="fa fa-undo trash_size"></i>
                                                    </a>
                                                    <a href="#modal-delete-content"  data-toggle="modal" title="Delete" class="btn-default btn btn-default btn-xs del_content ellipsis_div" value="<?php echo $content['content_id']; ?>">
                                                        <i class="fa fa-trash-o trash_size"></i>
                                                    </a>
                                                </div>
                                      
                                                <div class="block" style="width: 100%">
                                                    <p class="title ellipsis_div" title="<?php echo $content['name']; ?>"><?php echo $content['name']; ?></p>
                                                    <p class="date ellipsis_div" title="<?php echo $content['creation_time']; ?>"><?php echo date("Y/m/d",strtotime($content['creation_time'])); ?></p>                                                    
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
        </div>
        <!--END CONTENT-->
    </div>
    <!--END PAGE WRAPPER-->
</div>
<!--LOADING SCRIPTS FOR contents and briefcases-->
<script src="<?php echo base_url(); ?>assets/vendors/jplist/html/js/vendor/modernizr.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/jplist/html/js/jplist.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jplist.js"></script>
<script>
        
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
    $('#modal-image-content').on('hidden.bs.modal', function (e) {
        set_timer_image();
    });
    
    function set_timer_image(){
        $("#modal-image-path").attr("src","<?php echo base_url()."assets/images/icons/loader1.GIF"; ?>");       
        $("#modal-image-path:hidden").attr("src","<?php echo base_url()."assets/images/icons/loader1.GIF"; ?>");       
    }
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
            $(document).on('click','.view_lib',function(e){  e.preventDefault();//console.log('hello');
                var base_url = "<?php echo base_url() ?>";
                var view = $(this).parent().find('input').val();//console.log(view);//return false;
                object = JSON.parse(view);                
                var img_type= object.name.split('.');
                if(img_type.length == 1)
                    image = "DEFAULT";
                else
//                    var image = img_type[1].toUpperCase();
                    var image = img_type[img_type.length - 1];
                $('.old_filename').val(object.name);
                var alldata = image+'.png';
//                var response = $.fn.ajax_form_submit(
//                "filelink="+(alldata),
//                '<?php echo base_url(); ?>content_briefcases/check_file','false');
//                response = $.parseJSON(response);  
//                if(response['status']== "Success")
////                    $('#update_form').find('.view_image').attr('src',base_url+'assets/file/'+image+'.png');
//                    $('#update_form').find('.view_image').attr('data-type',image);
//                else
////                    $('#update_form').find('.view_image').attr('src',base_url+'assets/file/DEFAULT.png');
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
                    
                    $("[data-name='"+key+"']").text(value);
                    $("[name='"+key+"']").val(value);                    
                });
            });
    //*************update***********
    $(document).on('click','.update_content',function(e){e.preventDefault();
        var url = "<?php echo base_url() ?>content_briefcases/update_file"; // the script where you handle the form input.
        var base_url = "<?php echo base_url() ?>";
        var data =  $('#update_form').serialize();
        var  update_file =  $.ajax({
            type: "POST",
            url: url,
            data: $('#update_form').serialize(), // serializes the form's elements.
            async: false
        }).responseText;
        //*******update condition************
        var json = $.parseJSON(update_file); 
        var img_type= json.name.split('.');
        if(img_type.length == 1)
            image = "DEFAULT";
        else
//            var image = img_type[1].toUpperCase();
            var image = img_type[img_type.length - 1];


        $('.content_list > .list-item > .content_'+json.content_id+' > .imgtag').find('.content_json').val(update_file);
        $('.content_list > .list-item > .content_'+json.content_id+' > .imgtag > .quick-menu').find('.del_content').attr('value',json.content_id);
        
//        var alldata = image+'.png';
        var alldata = image;
//        var response = $.fn.ajax_form_submit(
//        "filelink="+(alldata),
//        '<?php echo base_url(); ?>content_briefcases/check_file','false');
//        response = $.parseJSON(response);  
//        if(response['status']== "Success")
////            $('.content_list > .list-item > .content_'+json.content_id+' > .imgtag').find('#img').attr('src',base_url+'assets/file/'+image+'.png');
//            $('.content_list > .list-item > .content_'+json.content_id+' > .imgtag').find('#img').attr('data-type',image);
//        else
////            $('.content_list > .list-item > .content_'+json.content_id+' > .imgtag').find('#img').attr('src',base_url+'assets/file/DEFAULT.png');
        $('.content_list > .list-item > .content_'+json.content_id+' > .imgtag').find('#img').attr('data-type',image);

        $('.content_list > .list-item > .content_'+json.content_id).find(".block").find(".title").text(json.name);
        $(this).notification('Content updated successfully','Trash');
          
        $('#grid-layout-ul-li').jplist({
            itemsBox: '.ul-li-list'
            , itemPath: '.list-item'
            , panelPath: '.jplist-panel'
            , storage: 'localstorage' //'', 'cookies', 'localstorage'			
            , storageName: 'jplist-div-layout'
        });
    });
    
    
    //***********delete file content****************
    
    $(document).on('click','.del_content',function(e){ 
        var id = $(this).attr("value");
        $("#delete_content_submit").attr("value",id);
    });
    
    $(document).on('click','#delete_content_submit',function(e){ e.preventDefault();
        var id = $(this).attr("value");
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>content_briefcases/delete_file',
            data: "content_id="+id
        }) 
        $(".ul-li-list").find(".content_"+id).parents(".list-item").remove();
        
        $(this).notification('Content deleted successfully','Trash');
        $('#grid-layout-ul-li').jplist({
           itemsBox: '.ul-li-list'
           , itemPath: '.list-item'
           , panelPath: '.jplist-panel'
           , storage: 'localstorage' //'', 'cookies', 'localstorage'			
           , storageName: 'jplist-div-layout'
        });
         
    })
    //**********restore file********
     $(document).on('click','.restore_content',function(e){
        var id = $(this).attr("value");
        $("#restore_content_submit").attr("value",id);
     });
    
    
    $(document).on('click','#restore_content_submit',function(e){ 
        var id = $(this).attr("value");
        var trash = {};
        trash['content_id'] = id;
        trash['trash'] = 1; //console.log(trash);
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>content_briefcases/trash_file',
            data: trash //"content_id="+id
        }) 
        $(".ul-li-list").find(".content_"+id).parents(".list-item").remove();
         $(this).notification('Content restored successfully','Trash');           
    })
</script>
