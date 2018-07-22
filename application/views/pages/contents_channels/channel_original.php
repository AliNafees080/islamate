<style type="text/css">
    #jq-demo{
        width: 100%;
        overflow: hidden;
    }

    #drag {
        width: 100%;
        float: left;
        padding: 10px 2%;
        background: #EAEEF4;
        /* margin-left:5%;*/
    }

    #dragcont {
        margin: 0;
        padding: 0;
        position: relative;
    }

    .draggablediv {
        list-style-type: none;
        display: block;
        width: 94%;
/*        z-index:5000;*/
    padding:10px;
        margin-bottom: 5px;
        border: 0px solid #C9CFD9;
    }

    #sort {
        width: 100%;
        margin:auto;
        padding: 10px 2%;
    }
    #sort ul{
        border:2px solid;
    }
    #sort li 
    {
        display:inline-block;
        margin:20px 10px 0px;
        height:100px;
        width:100px;
    }

    #finalcontainer {
        margin: 0;
        padding: 0;
        position: relative;
        width: 100%;
        min-height: 500px;
    }

    #finalcontainer li {
        list-style-type: none;
    }

    .emptydiv {
        display: block;
        height: 100px;
        width: 100px;
        background: #F3F6FB;
        margin-bottom: 5px;
        border-radius: 25px;
    }
    /****************/
    .row .row-merge [class*=col-] .pricing-widget {
        position: relative;
        border: 0;
        cursor: move;
        margin: 0px 0;
        -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05) !important;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05) !important;
    }
    .row .row-merge [class*=col-] .content-list:hover:not(.pricing-title) {
        box-shadow: none !important;
    }
    .row .row-merge [class*=col-] .pricing-widget .pricing-head {
        background: none repeat scroll 0 0 #e74c3c;
        padding: 6px 20px;
        font-size: 18px;
        text-align: left;
        color: #ffffff;
    }
    .row .row-merge [class*=col-] .pricing-widget .pricing-body{background: #fff;}
    .row .row-merge [class*=col-] .pricing-widget .pricing-cost {
        background: #4cae4c;
        text-align: center;
        padding: 20px;
        border-bottom: 1px solid #efefef;
        transition: all .3s ease;
        -webkit-transition: all .3s ease;
        -moz-transition: all .3s ease;
        -ms-transition: all .3s ease;
        -o-transition: all .3s ease;
        font-size: 18px;
        color: #ffffff;
        min-height: 125px;
    }
    .row .row-merge [class*=col-] .pricing-widget .pricing-cost strong {
        font-size: 30px;
    }
    .row .row-merge [class*=col-] .pricing-widget .pricing-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .row .row-merge [class*=col-] .pricing-widget .pricing-list li {
        padding: 10px;
        border-bottom: 1px solid #efefef;
    }
    .row .row-merge [class*=col-] .pricing-widget .pricing-list li:last-child {
        min-height: 84px;
        padding-top: 30px;
        box-shadow: none;
        -moz-box-shadow: none;
        -webkit-box-shadow: none;
        border-bottom: none;
    }
    .btn-channel {
  color: #ffffff;
  background:none repeat scroll 0 0 rgba(0, 0, 0, 0);
  border-color: white;
}
.btn-channel:hover,
.btn-channel:focus,
.btn-channel:active,
.btn-channel.active,
.open .dropdown-toggle.btn-channel {
  color: #ffffff;
  background: #4b5d67;
  border-color: #475861;
}
.content_size{
    height:20px;
    width:20px;
    margin:0px;
    padding:0px;
}
.dropdown-menu > .active > a{
    background-color: #ccc;
    color: #fff;
    outline: 0 none;
    text-decoration: none;
    border-radius: 0px !important;
}
.dropdown-menu > .active > a:focus{
    background-color: #777777;
    color: #fff;
    outline: 0 none;
    text-decoration: none;
    border-radius: 0px !important;
}
.dropdown-menu > .active > a:hover{
    background-color: #777777;
    color: #fff;
    outline: 0 none;
    text-decoration: none;
    border-radius: 0px !important;
}
</style>
<script type="text/javascript">//&lt;![CDATA[ 

    var Id=0;
    function alert1(img)
    {
        $(".ui-draggable-dragging").html("<img src='<?php echo base_url(); ?>assets/images/gallery/"+img+"' style='height:100px; width:100px; display:block; z-index:1000;'>");
    }
    $(window).load(function(){

        $(function() {
            $( "#finalcontainer" ).sortable({
                revert: false,
                cursor: "move",
                placeholder: 'emptydiv'			  
            });
            $( ".draggablediv" ).draggable({
                connectToSortable: "#finalcontainer",
                helper: "clone",
                revert: "invalid"
		 
            });
          
			
            $('.sort').droppable({ drop: Drop });

            function Drop(event, ui) {
                var draggableId = ui.draggable.attr("class");
                var droppableId = $(this).attr("class");
                var pos = ui.draggable.attr("data-pos");
                ui.draggable.children('a').css({'display':'block','z-index':'5000'});
                ui.draggable.children('span').css({'display':'inline-block','z-index':'5000','margin-top':'15px','width':'100px'});
                ui.draggable.children('.content_size').css('display','none');
                //alert(ui.draggable.attr("data-pos"));
                //alert($('#dragcont));
            }

        });
    });//]]&gt;  

</script>
<div id="wrapper">

    <!--BEGIN PAGE WRAPPER-->
    <div id="page-wrapper">
        <!--BEGIN TITLE & BREADCRUMB PAGE-->
        <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
            <div class="page-header pull-left">
                <div class="page-title">Contents & Channels</div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-left">
                <li><i class="fa fa-desktop"></i>&nbsp;<a href="#">Contents & Channels</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                <li class="hidden"><a href="#">Channel</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                <li class="active">Channel</li>

                <div class="clearfix"></div>
            </ol>
            
        </div>
        <!--END TITLE & BREADCRUMB PAGE-->
        <!--BEGIN CONTENT-->
        <div class="page-content">
            <div class="row">
                <?php //echo'<pre>'; print_r($detail); echo'</pre>'; ?>
                <!--BEGIN MODAL channel-->
                <div id="modal-channel" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form id="channel_form" class="form-validate" method="POST">
                            <div class="modal-header">
                                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                <h4 class="modal-title">Add a new channel</h4>
                            </div>
                            <div class="modal-body">
                                
                                    <table class="table table-striped table-hover">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="channelname" class="col-md-3 control-label">Channel name<span class='require'>*</span>
                                                        </label>

                                                        <div class="col-md-9">
                                                            <input id="channelname" type="text" name="name" class="form-control required" />                                                        </div>
                                                    </div>
                                                </td>

                                            </tr>
                                           
                                        </tbody>
                                    </table>
                                
                            </div>
                            <div class="modal-footer">
                                <!--                                data-menu-title="filtertitle" data-title-name="filterName" data-ul-id="filterlist"-->
                                <button type="button" data-dismiss="modal"  class="add_channel btn btn-green">Create</button>
                                <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                            </div>
                                </form>
                        </div>
                    </div>
                </div>
                <!--END MODAL channel-->
                <!--BEGIN MODAL user-->
                <div id="modal-user-group" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                <h4 class="modal-title">Manage Channel Access</h4>
                            </div>
                            <div class="modal-body">
                                <form id="album_filter_form" method="POST">
                                    <table class="table table-striped table-hover">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="user" class="col-md-3 control-label">Select users
                                                        </label>
                                                        <div id="user"  class="hide-select col-md-9">
                                                            <select multiple="true" name="users" id=""   class="select2-multi-value form-control ">
                                                                <option value="" >user_1</option>
                                                                    <option value="" >user_2</option>
                                                                <option value="" >user_3</option>
                                                            </select>
                                                        </div>
                                                        
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="group" class="col-md-3 control-label">Select groups
                                                        </label>
                                                        <div id="group"  class="hide-select col-md-9">
                                                            <select multiple="true" name="groups" id=""   class="select2-multi-value form-control ">
                                                                <option value="" >group_1</option>
                                                                    <option value="" >group_2</option>
                                                                <option value="" >group_3</option>
                                                            </select>
                                                        </div>
                                                        
                                                    </div>
                                                </td>

                                            </tr>
                                           
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <!--                                data-menu-title="filtertitle" data-title-name="filterName" data-ul-id="filterlist"-->
                                <button type="button" data-dismiss="modal"  class="add_user_group btn btn-green">Add</button>
                                <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--END MODAL user-->
                 <!--BEGIN MODAL background-->
                <div id="modal-background" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                <h4 class="modal-title">Change background</h4>
                            </div>
                            <div class="modal-body">
                                <form id="channel_background" method="POST">
                                    <table class="table table-striped table-hover">
                                        <tbody>
                                            <tr> 
                                                <td colspan="2">
                                                    <div class="alert alert-warning" style="margin-bottom:0px;">
                                                        Only a JPG or PNG image, measuring 2048x2048px (or 1024x1024px if no retina devices are being used) 
                                                        </div>
                                                </td>

                                            </tr>
                                            <tr> 
                                                <td>
                                                    <div class="form-group">
                                                        <label for="background" class="col-md-3 control-label">Background
                                                        </label>

                                                        <div class="col-md-9">
                                                                <input id="exampleInputFile1" type="file" />
                                                        </div>
                                                    </div>
                                                </td>

                                            </tr>
                                           <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="anchor_position" class="col-md-3 control-label">Anchor Position
                                                        </label>

                                                        <div class="col-md-9">
                                                             <select data-style="btn-default" class="selectpicker form-control">
                                                                <option>Bottom</option>
                                                                <option>Bottom left</option>
                                                                <option>Bottom right</option>
                                                                <option>Top</option>
                                                                <option>Left</option>
                                                                <option>Right</option>
                                                                <option>Center</option>
                                                                <option>Top left</option>
                                                                <option>Top right</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal"  class="change_background btn btn-green">Save</button>
                                <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--END MODAL background-->
                <!--BEGIN MODAL logo-->
                <div id="modal-logo" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                <h4 class="modal-title">Add/Change Logo</h4>
                            </div>
                            <div class="modal-body">
                                <form id="channel_logo" method="POST">
                                    <table class="table table-striped table-hover">
                                        <tbody>
                                            <tr> 
                                                <td colspan="2">
                                                    <div class="alert alert-warning" style="margin-bottom:0px;">
                                                        Only a JPG, PNG or GIF image  
                                                        </div>
                                                </td>

                                            </tr>
                                            <tr> 
                                                <td>
                                                    <div class="form-group">
                                                        <label for="logo" class="col-md-3 control-label">Logo
                                                        </label>

                                                        <div class="col-md-9">
                                                                <input id="exampleInputFile1" type="file" />
                                                        </div>
                                                    </div>
                                                </td>

                                            </tr>
                                           <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="logo_position" class="col-md-3 control-label">Logo Position
                                                        </label>

                                                        <div class="col-md-9">
                                                             <select data-style="btn-default" class="selectpicker form-control">
                                                                <option>Bottom</option>
                                                                <option>Bottom left</option>
                                                                <option>Bottom right</option>
                                                                <option>Top</option>
                                                                <option>Left</option>
                                                                <option>Right</option>
                                                                <option>Center</option>
                                                                <option>Top left</option>
                                                                <option>Top right</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal"  class="change_logo btn btn-green">Save</button>
                                <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--END MODAL logo-->
                <div class="row row-merge">
                    <div class="col-md-4 col-sm-6">
                        <div class="pricing-widget content-list">
                            <div class="pricing-head">Contents</div>
                            <div class="pricing-body" style="height:684px;">
                                <ul id="dragcont">
                                    <?php foreach($detail['content_detail'] as $content){ //print_r($content); ?>
                                     <?php
                                                    $type = $content['mimetype'];
                                                    $mimtype = split("/.", $type);
                                                    $m_type = $mimtype[0];
                                                    ?>
                                                    <?php
                                                    $fil_name = explode('.', $content['filename']);
                                                    $last_element = end($fil_name);
                                                    $file_name = strtoupper($last_element);
                                                    $absolutePath = dirname($_SERVER['SCRIPT_FILENAME']) . "/";
                                                    $thumbnail = base_url() . 'assets/file/' . $file_name . '.png';
                                                    if (!file_exists($absolutePath . 'assets/file/' . $file_name . '.png'))
                                                        $thumbnail = base_url() . 'assets/file/DEFAULT.png';
                                                    ?>
                                    <li class="draggablediv ui-draggable" data-pos="0">
                                        <img class="content_size" src="<?php echo $thumbnail; ?>">
<!--                                        <img class="ui-draggable" src="<?php echo base_url(); ?>assets/upload/<?php echo $content['filename']; ?>" style="height:100px; width:100px; z-index:1000; display:none;">-->
                                        <a class="ui-draggable image_address"  style="height:100px; width:100px; z-index:1000; display:none;" href="<?php echo base_url(); ?>assets/upload/<?php echo $content['filename']; ?>" target="_blank">
                                                <img data-title="Image winter-sun" data-lightbox="image-winter-sun" class="view_image" style="border: 5px solid #fff; box-shadow: 0 2px 3px rgba(0,0,0,0.25);" src="<?php echo $thumbnail; ?>">
                                            </a>
                                        <span class="ellipsis_div" style="width:100px;display:inline-block;text-align:center;">&nbsp;<?php echo $content['filename']; ?></span>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-6">
                        <div class="pricing-widget active">
                            <div class="pricing-head">
                                <div class="actions nav nav-tabs" style="border-bottom: none;">
                                    <button type="button" style="padding:4px 10px;" data-toggle="modal" data-target="#modal-user-group" class="btn btn-channel btn-outlined btn-square" ><i class="fa fa-user"></i></button>
                                    <button type="button" style="padding:4px 10px;" data-toggle="modal" data-target="#modal-channel" class="btn btn-channel btn-outlined btn-square" ><i class="fa fa-desktop"></i></button>
                                     <div class="btn-group">
                                        <ul class="dropdown-menu pull-right" >
                                            <li class="active channel_active"><a href="#home" class="" tabindex="-1" data-toggle="tab">&nbsp;select channel</a>
                                            </li>
                                            <?php foreach($detail['channel'] as $channel){ ?>
                                            <li class="channel_active"><a href="#channel_<?php echo $channel['channel_id']; ?>" class="" tabindex="-1" data-toggle="tab">&nbsp;<?php echo $channel['name']; ?></a>
                                            </li>
                                            <?php } ?>
                                        </ul>

                                        <button type="button" data-toggle="dropdown" class="btn btn-channel btn-outlined btn-square btn-sm dropdown-toggle"><i class="fa fa-desktop"></i> &nbsp;Channels &nbsp;
                                            <span class="caret"></span>
                                        </button>

                                    </div>
                                    <div class="btn-group">
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="#"><i class="fa fa-pencil"></i>&nbsp;
                                                    Rename</a>
                                            </li>
                                            <li><a href="#"  class="del_channel"><i class="fa fa-trash-o"></i>&nbsp;
                                                    Delete</a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-refresh"></i>&nbsp;
                                                    Duplicate</a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-lock"></i>&nbsp;
                                                    Lock</a>
                                            </li>
                                        </ul>

                                        <button type="button" data-toggle="dropdown" class="btn btn-channel btn-outlined btn-square btn-sm dropdown-toggle"><i class="fa fa-cog"></i> &nbsp;Settings &nbsp;
                                            <span class="caret"></span>
                                        </button>

                                    </div>
                                    <div class="btn-group">
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="#" data-toggle="modal" data-target="#modal-background"><i class="fa fa-picture-o"></i>&nbsp;
                                                    Background</a>
                                            </li>
                                            <li><a href="#" data-toggle="modal" data-target="#modal-logo"><i class="fa fa-cogs"></i>&nbsp;
                                                    Logo</a>
                                            </li>
                                            <li><a href="#" data-toggle="modal" data-target="#modal-folder"><i class="fa fa-folder-o"></i>&nbsp;
                                                    Default Folder Icon</a>
                                            </li>
                                            <li><a href="#" data-toggle="modal" data-target="#modal-template"><i class="fa fa-file-o"></i>&nbsp;
                                                    Catalog Template</a>
                                            </li>
                                        </ul>

                                        <button type="button" data-toggle="dropdown" class="btn btn-channel btn-outlined btn-square btn-sm dropdown-toggle"><i class="fa fa-pencil-square-o"></i> &nbsp;Customize &nbsp;
                                            <span class="caret"></span>
                                        </button>

                                    </div>
                                    <button type="button" style="padding:4px 10px;" class="btn btn-channel btn-outlined btn-square pull-right" >Done</button>
                                </div>
                            </div>
                            <div id="" class="tab-content pricing-body">
                                <div id="home" class="tab-pane fade in active">
                                    <div class="sort" style=" margin: 0;min-height: 500px;padding: 0;position: relative; width: 100%;">
                                        <p>No channel selected</p>
                                    </div>
                                </div>
                                <?php foreach($detail['channel'] as $channel){ ?>
                                <div id="channel_<?php echo $channel['channel_id']; ?>" class="tab-pane fade">
                                    <input type="hidden" value="<?php echo $channel['channel_id']; ?>" class="current_channel">
                                    <div id="sort">
                                        <ul id="finalcontainer" class="ui-sortable">
                                             
                                        </ul>
                                    </div>
                                </div>
                                 <?php }  ?>
<!--                                <div id="sort" class="tab-pane fade">
                                    <ul id="finalcontainer" class="ui-sortable"></ul>
                                </div>-->
                                <div class="align-center" style="padding:20px;">
                                    <ul style="display:inline-flex; margin-left:80px;">
                                       <li class="draggablediv ui-draggable" ondragstart="alert1('folder_black_generic.png')" style="height:100px; width:100px; z-index:1000; margin-left:10px; margin-right:10px;" data-pos="3">
                                        <img src="<?php echo base_url(); ?>assets/images/folder_black_generic.png" style="height:100px; width:100px;">
                                        <span style="display:block;text-align:center;">Folder</span>
                                       </li>
                                    <li class="draggablediv ui-draggable" ondragstart="alert1('index.jpg')" style="height:100px; width:100px; z-index:1000;  margin-left:10px; margin-right:10px;" data-pos="3">
                                        <img src="<?php echo base_url(); ?>assets/images/index.jpg" style="height:100px; width:100px;">
                                        <span style="display:block;text-align:center;">Smart folder</span>                                       
                                    </li>
                                    <li class="draggablediv ui-draggable" ondragstart="alert1('link.png')" style="height:100px; width:100px; z-index:1000;  margin-left:10px; margin-right:10px;" data-pos="3">
                                        <img src="<?php echo base_url(); ?>assets/images/link.png" style="height:100px; width:100px;">
                                        <span style="display:block;text-align:center;">Link</span>                                      
                                    </li>
                                    </ul>
                                    
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <!--page contents-->

            </div>
            <!--END CONTENT-->
        </div>
        <!--END PAGE WRAPPER-->
    </div>
    <!--END PAGE WRAPPER-->
</div>
<!--LOADING SCRIPTS FOR contents and channels-->
<script>
$(document).ready(function(){
     $(".select2-multi-value").select2();
        $('.select2-size').select2({
            placeholder: "Select an option",
            allowClear: true
        });
        
        $(document).on('click','.channel_active',function(){
            $('.channel_active').removeClass('active');
            $(this).addClass('active');
            
        })
        //***************add new channel*********************              
            $(document).on('click','.add_channel',function(){
                
                var url = "<?php echo base_url() ?>channels/insert_channel"; // the script where you handle the form input.
                var  tag =  $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#channel_form").serialize(), // serializes the form's elements.
                    async: false
                }).responseText; //console.log(tag);
                var json = $.parseJSON(tag);  console.log(json);//return false;
//                if(json.action != 'updated'){
//                    $('#tag_list li:first').clone().appendTo('#tag_list').addClass('tag_'+json.tag_id).removeClass('hide dynamic_tag_li');
//                }
//                //**********************************+
//                $('#tag_list .tag_'+json.tag_id).find('.tag_json').val(tag); 
//                $('#tag_list .tag_'+json.tag_id).find('.name').text(json.name);
//                $('#tag_list .tag_'+json.tag_id).find('.edit_tag').val(json.tag_id);
//                $('#tag_list .tag_'+json.tag_id).find('.remove_tag').val(json.tag_id);
//                $('#tag_form').find('input[type=text], input[type=hidden]').val(null);
//                $("#modal-tagform").find(".edit_tag_title").text("Create new tag");
//                $("#modal-tagform").find(".add_tag").text("Create");
            });
             //***********delete file content****************
                $(document).on('click','.del_channel',function(e){ e.preventDefault();
                    var id = $('.current_channel').attr("value");
                    var del = confirm('Are you sure you want to delete this channel?');
                    if(del == true){
//                        var contents = {};
//                        contents['content_id'] = id;
//                        contents['content'] = content; console.log(contents);
                        $.ajax({
                            type: "POST",
                            url: '<?php echo base_url(); ?>channels/delete_channel',
                            data: "channel_id="+id
                        }) 
                        $('.current_channel').parents('div').removeClass('active in');
                        $('.channel_active .active').remove();
                        
                        $('#home').addClass('active in');
                       // $(this).parents('li').remove();
                    }
                    else{
                        return false;
                    }
                    return false;
                })
})
</script>
