<?php
//$channel['channel_38']['data'] = json_decode('{"0":{"type":"file","content_id":"24","name":" pickAcolor.png","url":"PNG.png"},"1":{"type":"folder","name":"adsfsadf","data":{}},"2":{"type":"link","url":"http://asdf","name":"sadf"}}',true);
//echo "<pre>"; print_r($detail['channel']); echo "</pre>"; die();
?>

<style type="text/css">
    #jq-demo{
        width: 100%;
        overflow: hidden;
    }
    .icon_size_one{
        font-size: 18px; 
        margin-top: 1px;
/*        margin: -7px 2px 0px 0px;
        padding: 8px 6px 6px 10px;
        background: none repeat scroll 0 0 #e74c3c;*/
       
    }
    .view_user:hover{
        color: #fff;        
    }
    .icon_size_two{
        font-size: 20px;   
        margin-top: 2px;
/*        margin: -7px 2px 0px 0px;
        padding: 8px 6px 6px 10px;
        background: none repeat scroll 0 0 #e74c3c; */
    }
    .breadcrumb_inactive:hover{
        cursor: pointer;
        color: #e74c3c;
    }
    .mix-link2{
        color: #fff;
        display: inline-block;
        margin: 30px 5px 5px 5px;
        padding: 10px 0px;
        text-align: center;   
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
        /*        position: relative;*/
    }

    .draggablediv {
        list-style-type: none;
        display: block;
        width: 94%;
        z-index:5000;
        padding:10px;
        margin-bottom: 5px;
        border: 0px solid #C9CFD9;
    }
    .sort_2{
        width: 100%;
        margin:auto;
        padding: 10px 2%;
    }
    .sort_2 ul{
        border:2px solid;
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
        border: dashed red 1px;
    }
    /****************/
    .row .row-merge [class*=col-] .pricing-widget {
        position: relative;
        border: 0;
        cursor: move;
        margin: 0px 0;
        -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05) !important;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05) !important;
        box-shadow: 0 3px 25px -4px rgba(0, 0, 0, 0.898) !important;
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
    
</script>
<div id="wrapper">

    <li id="hidden_link" attr-index="" style=" display: none;">
        <div class="gallery-pages">
            <div class="mix-grid">
                <div class="col-md-12 mix photography">
                    <div class="hover-effect">
                        <div class="img" style="width: 100px; height: 100px;">
                            <img class="img-responsive view_image" alt="" src="<?php echo base_url(); ?>assets/file/URL.png">
                        </div>

                        <div class="info" style="width: 100px; height: 100px;">
                            <a class="mix-link2 info_cursor view_user" target="_blank"><i title="View link" class="fa fa-external-link icon_size_two"></i></a>
                            <a class="mix-link2 info_cursor view_user edit_link_icon"><i title="Edit link" class="glyphicon glyphicon-pencil icon_size_one" data-toggle="modal" data-target="#modal-link-group-edit"></i></a>
                            <a class="mix-link2 info_cursor view_user delete_icon"><i title="Delete link" class="glyphicon glyphicon-trash icon_size_one" data-target="#modal-static" data-toggle="modal"></i></a>
                        </div>
                    </div>
                    <span class="ellipsis_div" style="width:100px;display:inline-block; text-align: center; "> </span>
                </div>
            </div>
        </div>
    </li>

    <li id="hidden_folder" attr-index="" style=" display: none;" class="folder_selection">
        <div class="gallery-pages">
            <div class="mix-grid">
                <div class="col-md-12 mix photography">
                    <div class="hover-effect">
                        <div class="img" style="width: 100px; height: 100px;">
                            <img class="img-responsive view_image" alt="" src="<?php echo base_url(); ?>assets/file/folder_black_generic.png">
                        </div>

                        <div class="info" style="width: 100px; height: 100px;">
                            <a class="mix-link2 info_cursor view_user folder_open_icon"><i title="View folder" class="fa fa-folder-open icon_size_one" style=" margin-top: 0px;"></i></a>
                            <a class="mix-link2 info_cursor view_user edit_folder_icon"><i title="Edit folder" class="glyphicon glyphicon-pencil icon_size_one"  data-target="#modal-folder-group-edit" data-toggle="modal"></i></a>
                            <a class="mix-link2 info_cursor view_user delete_icon"><i title="Delete folder" class="glyphicon glyphicon-trash icon_size_one" data-target="#modal-static" data-toggle="modal"></i></a>
                        </div>
                    </div>
                    <span class="ellipsis_div" style="width:100px;display:inline-block; text-align: center;"> </span>
                </div>
            </div>
        </div>
    </li>


    <li id="hidden_image" attr-index="" style=" display: none;" class="">
        <div class="gallery-pages">
            <div class="mix-grid">
                <div class="col-md-12 mix photography">
                    <div class="hover-effect">
                        <div class="img" style="width: 100px; height: 100px;">
                            <img class="img-responsive view_image" alt="" src="">
                        </div>

                        <div class="info" style="width: 100px; height: 100px;">
                            <a class="mix-link2 info_cursor view_user" href="" target="_blank"><i title="View file" class="fa fa-external-link icon_size_two" ></i></a>
                            <a class="mix-link2 info_cursor view_user delete_icon"><i title="Delete file" class="glyphicon glyphicon-trash icon_size_one" data-target="#modal-static" data-toggle="modal"></i></a>
                        </div>
                    </div>
                    <span class="ellipsis_div" style="width:100px;display:inline-block; text-align: center;"> </span>
                </div>
            </div>
        </div>
    </li>

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
            <div class="pull-right mbm mtm" style="display: inline-block;">
<!--               <button type="button" style="padding:4px 10px;" data-toggle="modal" data-target="#modal-channel" class="btn btn-channel btn-outlined btn-square" ><i class="fa fa-desktop"></i></button>                -->
                <a href="#" data-toggle="modal" data-target="#modal-channel" class=" btn btn-grey">Add channel</a>
            </div>
        </div>
        <!--END TITLE & BREADCRUMB PAGE-->
        <!--BEGIN CONTENT-->
        <div class="page-content">
            <!--        Model to delete folder, image or link of channel    -->
            <div id="modal-static" tabindex="-1" data-backdrop="static" data-keyboard="false" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <p>Would you like to delete selected channel content?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                            <button id="delete_record_submit" type="button" data-dismiss="modal" class="btn btn-primary" value="">OK</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--            End model-->
            <!--        Model to delete channel    -->
            <div id="modal-static-delete-channel" tabindex="-1" data-backdrop="static" data-keyboard="false" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <p>Would you like to delete selected channel?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                            <button id="delete_channel_submit" type="button" data-dismiss="modal" class="btn btn-primary" value="">OK</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--End model            -->


            <div class="row">
                <?php
                // echo'<pre>'; print_r($detail['channel'][1]['contents']); 
//                      echo $json = json_encode($detail['channel'][1]['contents'],true);
//                      echo'</pre>';
                ?>
                <!--BEGIN MODAL channel-->
                <div id="modal-channel" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form id="channel_form" class="form-validate"  >
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
                                                            <input class="form-control required" id="channelname" type="text" name="name"  />  
                                                        </div>
                                                    </div>
                                                </td>

                                            </tr>

                                        </tbody>
                                    </table>

                                </div>
                                <div class="modal-footer">
                                    <button id="add_channel" type="button"  class="btn btn-green">Create</button>
                                    <button id="cancel_add_channel" type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
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
                            <form id="add_user_form" class="form-validate">
                                <div class="modal-header">
                                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                    <h4 class="modal-title">Manage Channel Access</h4>
                                </div>
                                <div class="modal-body">

                                    <table class="table table-striped table-hover">
                                        <tbody>

                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="user" class="col-md-3 control-label">Select users
                                                        </label>
                                                        <div id="user"  class="hide-select col-md-9 ">
                                                            <select multiple="true" name="users" id=""   class="select2-multi-value form-control required">
                                                               <?php
                                                               foreach($detail['user'] as $key=> $value){?>
                                                                   <option value="<?php echo $value['user_id']; ?>" ><?php echo $value['first_name']; ?></option>
                                                              <?php } ?>
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
                                                            <select multiple="true" name="groups" id=""   class="select2-multi-value form-control required">
                                                                 <?php
                                                               foreach($detail['group'] as $key=> $value){?>
                                                                   <option value="<?php echo $value['user_id']; ?>" ><?php echo $value['first_name']; ?></option>
                                                              <?php } ?>
                                                            </select>
                                                        </div>

                                                    </div>
                                                </td>

                                            </tr>

                                        </tbody>
                                    </table>

                                </div>
                                <div class="modal-footer">
                                    <!--                                data-menu-title="filtertitle" data-title-name="filterName" data-ul-id="filterlist"-->
                                    <button id="add_user_group" type="submit"  class=" btn btn-green">Add</button>
                                    <!--                                <button type="button" data-dismiss="modal"  class="add_user_group btn btn-green">Add</button>-->
                                    <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--END MODAL user-->
                <!--start MODAL of create link-->
                <div id="modal-link-group" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header"><button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button><h4 id="modal-login-label" class="modal-title">Add Link</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form">
                                    <form class="form-horizontal form-validate">
                                        <div class="form-group">
                                            <label class="control-label col-md-3" style=" text-align: left;">Link<span class="require">*</span>
                                                <span class=" pull-right" style=" margin-right: -25px;">http://</span>
                                            </label>
                                            <div class="col-md-9">
                                                <input id="linkaddress" type="text" class="form-control required"/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3" style=" text-align: left;">Link Name<span class="require">*</span></label>
                                            <div class="col-md-9">
                                                <input id="linkname" type="text" class="form-control required"/>
                                            </div>
                                        </div>              
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button id="create_link_btn" type="submit" data-dismiss="modal" class="btn btn-green">Add</button>
                                <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--END MODAL link-->

                 <!--start MODAL for user and groups-->
                <div id="modal-users-groups" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header"><button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button><h4 class="modal-title">Manage Channel Access</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form">
                                    <form class="form-horizontal form-validate">
                                        <div class="form-group">
                                            <label class="control-label col-md-3" style=" text-align: left;">Select users<span class="require">*</span>                                                
                                            </label>
                                                <div class="hide-select col-md-9 ">
                                                    <select multiple="true" name="users" id="selected_users"   class="select2-multi-value form-control required">
                                                       <?php
                                                               foreach($detail['user'] as $key=> $value){?>
                                                                   <option value="<?php echo $value['user_id']; ?>" ><?php echo $value['first_name']; ?></option>
                                                              <?php } ?>
                                                            </select>
                                                    </select>
                                                </div>    
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3" style=" text-align: left;">Select groups<span class="require">*</span></label>
                                                <div class="hide-select col-md-9 ">
                                                    <select multiple="true" name="groups" id="selected_groups" class="select2-multi-value form-control required">
                                                       <?php
                                                               foreach($detail['group'] as $key=> $value){?>
                                                                   <option value="<?php echo $value['group_id']; ?>" ><?php echo $value['group_name']; ?></option>
                                                              <?php } ?>
                                                            </select>
                                                    </select>
                                                </div>                                            
                                        </div>              
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button id="submit_group_user_btn" type="submit" data-dismiss="modal" class="btn btn-green">Save</button>
                                <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--END MODAL link-->
                
                <!--start MODAL of edit link-->
                <div id="modal-link-group-edit" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header"><button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button><h4 id="modal-login-label" class="modal-title">Edit Link</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form">
                                    <form class="form-horizontal form-validate">
                                        <div class="form-group">
                                            <label class="control-label col-md-3" style=" text-align: left;">Link<span class="require">*</span>
                                                <span class=" pull-right" style=" margin-right: -25px;">http://</span>
                                            </label>
                                            <div class="col-md-9">
                                                <input id="editlinkaddress" type="text" class="form-control required"/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3" style=" text-align: left;">Link Name<span class="require">*</span></label>
                                            <div class="col-md-9">
                                                <input id="editlinkname" type="text" class="form-control required"/>
                                            </div>
                                        </div>              
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button id="edit_link_btn" type="submit" data-dismiss="modal" class="btn btn-green" value="">Save</button>
                                <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--END MODAL link-->


                <!--start  MODAL for create folder-->
                <div id="modal-folder-group" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header"><button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button><h4 id="modal-login-label" class="modal-title">Add Folder</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form">
                                    <form class="form-horizontal form-validate">
                                        <div class="form-group">
                                            <label class="control-label col-md-3" style=" text-align: left;">Folder Name<span class="require">*</span>                                                        
                                            </label>
                                            <div class="col-md-9">
                                                <input id="foldername" type="text" class="form-control required"/>
                                            </div>
                                        </div>     
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button id="add_folder_btn" type="submit" data-dismiss="modal" class="btn btn-green">Add</button>
                                <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--END MODAL folder-->

                <!--start  MODAL for duplicate channel-->
                <div id="modal-duplicate-channel-group" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header"><button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button><h4 id="modal-login-label" class="modal-title">Create duplicate channel</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form">
                                    <form class="form-horizontal form-validate">
                                        <div class="form-group">
                                            <label class="control-label col-md-3" style=" text-align: left;">Channel Name<span class="require">*</span>                                                        
                                            </label>
                                            <div class="col-md-9">
                                                <input id="duplicate_channel_name" type="text" class="form-control required"/>
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label class="control-label col-md-3" style=" text-align: left;">&nbsp;</label>
                                            <div class="col-md-9">
                                                <label>
                                                    <input id="duplicate_switch" tabindex="5" type="checkbox" />&nbsp;
                                                    Switch to duplicated channel?
                                                </label>
                                            </div>
                                        </div> 
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button id="add_duplicate_channel" type="submit" data-dismiss="modal" class="btn btn-green">Add</button>
                                <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--END MODAL folder-->



                <!--start  MODAL for rename channel-->
                <div id="modal-rename-channel" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header"><button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button><h4 id="modal-login-label" class="modal-title">Rename Channel</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form">
                                    <form class="form-horizontal form-validate">
                                        <div class="form-group">
                                            <label class="control-label col-md-3" style=" text-align: left;">Channel Name<span class="require">*</span>                                                        
                                            </label>
                                            <div class="col-md-9">
                                                <input id="rename_channel" type="text" class="form-control required"/>
                                            </div>
                                        </div>     
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button id="rename_channel_btn" type="submit" data-dismiss="modal" class="btn btn-green">Save</button>
                                <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--END MODAL folder-->

                <!--start  MODAL for edit folder-->
                <div id="modal-folder-group-edit" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header"><button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button><h4 id="modal-login-label" class="modal-title">Edit folder</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form">
                                    <form class="form-horizontal form-validate">
                                        <div class="form-group">
                                            <label class="control-label col-md-3" style=" text-align: left;">Folder Name<span class="require">*</span>                                                        
                                            </label>
                                            <div class="col-md-9">
                                                <input id="editfoldername" type="text" class="form-control required"/>
                                            </div>
                                        </div>     
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button id="edit_folder_btn" type="submit" data-dismiss="modal" class="btn btn-green">Save</button>
                                <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--END MODAL folder-->

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
                            <div style="height:684px;" class="pricing-body chat-scroller" >
                                <ul id="dragcont">
                                    <?php
                                    foreach ($detail['content_detail'] as $content) {

                                        $fil_name = explode('.', $content['filename']);
                                        $last_element = end($fil_name);
                                        $file_name = strtoupper($last_element);
                                        $absolutePath = dirname($_SERVER['SCRIPT_FILENAME']) . "/";
                                        $thumbnail = base_url() . 'assets/file/' . $file_name . '.png';
                                        if (!file_exists($absolutePath . 'assets/file/' . $file_name . '.png'))
                                            $thumbnail = base_url() . 'assets/file/DEFAULT.png';
                                        ?>
                                        <li class="draggablediv ui-draggable">
                                            <div class="gallery-pages">
                                                <div class="mix-grid">
                                                    <div class="col-md-12 mix photography" style=" display: inline-block; overflow: visible; ">
                                                        <div class="hover-effect" style=" display: inline-block; width: 10%; overflow: visible;">
                                                            <div class="img content_size" style="">
                                                                <img class="img-responsive view_image" alt="" src="<?php echo $thumbnail; ?>" content-id="<?php echo $content['content_id']; ?>">
                                                            </div>

                                                            <div class="info" style="width: 100px; height: 100px; display: none;">
                                                                <a class="mix-link2 info_cursor" href="<?php echo base_url(); ?>assets/upload/<?php echo $content['filename']; ?>" target="_blank"><i title="View file" class="fa fa-external-link icon_size_two" ></i></a>
                                                                <a class="mix-link2 info_cursor delete_icon" ><i class="glyphicon glyphicon-trash icon_size_one" data-target="#modal-static" data-toggle="modal" title="Delete file"></i></a>
                                                            </div>
                                                        </div>
                                                        <span class="ellipsis_div" style="width:100px;display:inline-block; text-align: left; height: 20px;">&nbsp;<?php echo $content['filename']; ?> </span>
                                                    </div>
                                                </div>
                                            </div>
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
                                    <button id="set_user_group_btn" type="button" style="padding:4px 10px;" data-toggle="modal" data-target="#modal-users-groups" class="btn btn-channel btn-outlined btn-square" ><i class="fa fa-user"></i></button>
                                    <div class="btn-group">
                                        <ul id="channel-list" class="dropdown-menu pull-right" >
                                            <li class="channel_active"><a>&nbsp;Channels</a></li>
                                            <?php foreach ($detail['channel'] as $key => $channelvalue) { ?>
                                                <li class="channel_active" attr-id="<?php echo $key; ?>" ><a>&nbsp;<?php echo $channelvalue['name']; ?></a></li>
                                            <?php } ?>
                                        </ul>

                                        <button type="button" data-toggle="dropdown" class="btn btn-channel btn-outlined btn-square btn-sm dropdown-toggle"><i class="fa fa-desktop"></i><label id="channel_list_button" style=" margin-left: 6px; margin-right: 6px; height: 14px; width: 50px; overflow: hidden;">&nbsp;Channels&nbsp;</label> 
                                            <span class="caret"></span>
                                        </button>

                                    </div>
                                    <div class="btn-group">
                                        <ul class="dropdown-menu pull-right">
                                            <li><a id="rename_button" data-toggle="modal" data-target="#modal-rename-channel" ><i class="fa fa-pencil"></i>&nbsp;
                                                    Rename</a>
                                            </li>
                                            <li><a data-toggle="modal" data-target="#modal-static-delete-channel" id="delete_channel_icon"><i class="fa fa-trash-o"></i>&nbsp;
                                                    Delete</a>
                                            </li>
                                            <li><a data-toggle="modal" data-target="#modal-duplicate-channel-group" id="duplicate_channel" ><i class="fa fa-refresh"></i>&nbsp;
                                                    Duplicate</a>
                                            </li>
<!--            This part is under discussion. All features completed                                <li><a id="channel_lock"><i class="fa fa-lock"></i>&nbsp;
                                                    Lock</a>
                                            </li>-->
                                        </ul>

                                        <button id="channel_edit_property" type="button" data-toggle="dropdown" class="btn btn-channel btn-outlined btn-square btn-sm dropdown-toggle" disabled="disabled"><i class="fa fa-cog"></i> &nbsp;Settings &nbsp;
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
                                    <!--                                    <button id="save_channel_button" type="button" style="padding:4px 10px; display: none;" class="btn btn-channel btn-outlined btn-square pull-right" >Save Channel</button>-->
                                </div>
                            </div>

                            <div id="channel_breadcrumb" class="page-title-breadcrumb" style=" margin: auto; width: 99.5%; height: 18px; display: none;">
                                <ol class="breadcrumb page-breadcrumb pull-left">

                                </ol>
                            </div>
                            <!--                            <div id="" class="page-title-breadcrumb">
                                                            <ol class="breadcrumb page-breadcrumb pull-left">
                                                                <li>&nbsp;<a href="#">Contents & Channels</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                                                                <li class="active">Channel</li>                                    
                                                            </ol>                                
                                                        </div>-->

                            <div class="tab-content pricing-body">                                 
                                <div id="home" style=" display: none; ">                                    
                                    <div id="sort">
                                        <ul id="finalcontainer" class="ui-sortable" style=" height: 498px; overflow: auto;">                                            

                                        </ul>
                                    </div>
                                </div> 
                                <div id="home_no_channel" >                                    
                                    <div class="sort_2">
                                        <ul id="" class="ui-sortable" style=" height: 498px; overflow: auto;">                                            
                                            <h1 style=" margin-top: 223px; margin-left: 115px;">No channel selected</h1>
                                        </ul>
                                    </div>
                                </div> 

                                <div class="align-center" style="padding:20px; height: 150px;" >
                                    <ul style="display:none; margin-left:80px;" id="add_channel_item">
                                        <li style="height:100px; width:100px; z-index:1000; margin-left:10px; margin-right:10px; list-style-type: none;" data-pos="3">
                                            <img  data-toggle="modal" data-target="#modal-folder-group" src="<?php echo base_url(); ?>assets/file/folder_black_generic.png" style="height:100px; width:100px;">
                                            <span style="display:block;text-align:center;">Folder</span>
                                        </li>
                                        <li style="height:100px; width:100px; z-index:1000;  margin-left:10px; margin-right:10px; list-style-type: none;" data-pos="3">
                                            <img src="<?php echo base_url(); ?>assets/images/index.jpg" style="height:100px; width:100px;">
                                            <span style="display:block;text-align:center;">Smart folder</span>                                       
                                        </li>
                                        <li style="height:100px; width:100px; z-index:1000;  margin-left:10px; margin-right:10px; list-style-type: none;" data-pos="3">
                                            <img data-toggle="modal" data-target="#modal-link-group" src="<?php echo base_url(); ?>assets/images/link.png" style="height:100px; width:100px;">
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
    var data = <?php echo json_encode($detail['channel']); ?>;
    var hiddenelement  = 0;
    var position_from = "";
    var position_to = "";
   // console.log(JSON.stringify(data));
    function alert1(img)
    {
        $(".ui-draggable-dragging").html("<img src='<?php echo base_url(); ?>assets/images/gallery/"+img+"' style='height:100px; width:100px; display:block; z-index:1000;'>");
    }
    
    function get_global_id(){
        var globalid = "";
        $("#channel_breadcrumb").find("li").each(function(e){
            if($(this).attr("class").trim() == "active breadcrumb_view" || $(this).attr("class").trim() == "breadcrumb_view breadcrumb_inactive"){
                var elementindex = $(this).attr("attr-index");
                var elementaindexarray = elementindex.split(",");
                if(elementaindexarray.length >1){
                    globalid = elementindex;
                }
                else{
                    globalid = globalid+elementindex;
                }            
            }
        });
        return globalid;        
    }
    
    
    $(window).load(function(){

        $(function() {
            $( "#finalcontainer" ).sortable({
                revert: false,
                placeholder: 'emptydiv'	,
                start: function(event, ui) {
                    ui.item.startPos = ui.item.index();
                    
                },
                stop: function(event, ui) {
                    position_from = ui.item.startPos;
                    position_to = ui.item.index();   
                    
                    globalid = get_global_id();
                    var globalidarray =  globalid.split(",");
                    var moveelement = {};
                    moveelement['channel_id'] = globalidarray[0]; // set channel id                        
                    moveelement['channel_content_id'] = ui.item.attr("attr-index");
                    moveelement['from'] = position_from;
                    moveelement['to'] = position_to;
                    if($("#channel_breadcrumb").find("li").length > 1){
                        moveelement['parent_id'] = globalidarray[globalidarray.length-1];// set parentd_id                       
                    }else{
                        moveelement['parent_id'] = null;                       
                    }
                    
                    if(position_from != position_to){
                        var response = $.fn.ajax_form_submit(
                        moveelement,
                        '<?php echo base_url(); ?>channels/element_move','false'); // reposne complete channel value just order by sequence.
                        update_global(response);
                        
                    }
                    
                                      
                }
            });
            $( ".draggablediv" ).draggable({
                connectToSortable: "#finalcontainer",
                helper: "clone",
                revert: "invalid"
		 
            });          
			
            $('#finalcontainer').droppable({ drop: Drop });
            var i = 1;
            function Drop(event, ui) {
                var globalid = get_global_id();
                var tempvalue = fetch_global(data,globalid);
                
                var key, count = 0;
                for(key in tempvalue['data']) {
                    if(tempvalue['data'].hasOwnProperty(key)) {
                        count++;
                    }
                }
                count++;
                if(count < $("#finalcontainer").find("li").length){ // this condition is applied to call following function only n droping condition not when moving items in finalcontainer
                        var draggableId = ui.draggable.attr("class");
                        var droppableId = $(this).attr("class");
                        ui.draggable.parents('#finalcontainer').find('.ui-draggable').css({'margin-top':'10px','margin-bottom':'15px'});
                        ui.draggable.parents('#finalcontainer').find('.content_size').removeClass('content_size');               
                        ui.draggable.parents('#finalcontainer').find('.info').css({'display':''});
                        ui.draggable.parents('#finalcontainer').find('.photography').css({'width':'100px','height':'120px'}); //hover-effect
                        ui.draggable.parents('#finalcontainer').find('.hover-effect').css({'width':'100px','height':'100px'}); //hover-effect
                        if(i==1){ // this condition applied because drop element calling two times when an item dropped.
                            i++;
                            var complete_json = {};
                            var folder_element_data = {};
                            var element_name = "";
                            element_name = ui.draggable.children().find(".ellipsis_div").last().text().trim(); 
                            var image_link = ui.draggable.children().find("img").last().attr('src'); 

                            folder_element_data["type"] = "file";
                            folder_element_data["content_id"] = ui.draggable.children().find("img").last().attr("content-id").trim();
                            folder_element_data["name"] = element_name;
                            var imagelinkarray = image_link.split("/");
                            folder_element_data["details"] = imagelinkarray[imagelinkarray.length-1];
                            complete_json[0] = folder_element_data; 
                          
                            if($("#channel_breadcrumb").find("li").length > 1){
                                globalid = get_global_id();
                                var tempvalue = fetch_global(data,globalid);

                                var globalidarray =  globalid.split(",");
                                tempvalue['channel_id'] = globalidarray[0]; // set channel id                        
                                tempvalue['parent_id'] = globalidarray[globalidarray.length-1];// set parentd_id

                                tempvalue['data'] = complete_json;
                                var alldata = tempvalue;
                            }else{
                                data[globalid]['parent_id'] = "";
                                data[globalid]['data'] =  complete_json;                        
                                var alldata = data[globalid];
                            }                            
                            var response = $.fn.ajax_form_submit(
                            "content="+JSON.stringify(alldata),
                            '<?php echo base_url(); ?>channels/insert_channel_content','false');

                            update_global(response);
                            response = $.parseJSON(response);
                            var index=response["current_inserted_id"]; //current_inserted_id
                            ui.draggable.attr("attr-index",index);
                            ui.draggable.attr("class","");
                            ui.draggable.attr("style","");
                            ui.draggable.children().find("a").last().attr("attr-index",index);
                            
                        }
                        else{
                            i=1;
                        }
                    }                   
                }
        });
    });

    $(window).load(function(){
        $(".slimScrollDiv").css({"overflow-x":"auto","overflow-y":"hidden","position":"static"});
        $(".chat-scroller").css({"overflow":" "});    
    });
       
    
    $("#create_link_btn").click(function(){
        
        var linkname = $("#linkname").val();
        var linkaddress = $("#linkaddress").val();
        linkaddress = "http://"+linkaddress;
        
        var complete_json = {};
        
        var folder_element_data = {};
        var globalid = get_global_id();
        
        folder_element_data["type"] = "link";
        folder_element_data["name"] = linkname;
        folder_element_data["details"] = linkaddress;
        complete_json[0] = folder_element_data; 
        
        if($("#channel_breadcrumb").find("li").length > 1){
            globalid = get_global_id();
            var tempvalue = fetch_global(data,globalid);

            var globalidarray =  globalid.split(",");
            tempvalue['channel_id'] = globalidarray[0]; // set channel id                        
            tempvalue['parent_id'] = globalidarray[globalidarray.length-1];// set parentd_id

            tempvalue['data'] = complete_json;
            var alldata = tempvalue;
        }else{
            data[globalid]['parent_id'] = "";
            data[globalid]['data'] =  complete_json;            
            var alldata = data[globalid];
        }
        
        var response = $.fn.ajax_form_submit(
        "content="+JSON.stringify(alldata),
        '<?php echo base_url(); ?>channels/insert_channel_content','false');

        update_global(response);
        var index=response["current_inserted_id"];
        create_link_view(index,linkaddress,linkname)
    });
    
    
    $("#add_folder_btn").click(function(){
        var foldername = $("#foldername").val();
        
        var complete_json = {};
        
        var folder_element_data = {};
        var globalid = get_global_id();
        
        folder_element_data["type"] = "folder";
        folder_element_data["name"] = foldername;
        folder_element_data["details"] = {};
        complete_json[0] = folder_element_data; 
        
        if($("#channel_breadcrumb").find("li").length > 1){
            globalid = get_global_id();
            var tempvalue = fetch_global(data,globalid);
            
            var globalidarray =  globalid.split(",");
            tempvalue['channel_id'] = globalidarray[0]; // set channel id                        
            tempvalue['parent_id'] = globalidarray[globalidarray.length-1];// set parentd_id

            tempvalue['data'] = complete_json;
            var alldata = tempvalue;
        }else{
            data[globalid]['parent_id'] = "";
            data[globalid]['data'] =  complete_json;            
            var alldata = data[globalid];
        }
        
        var response = $.fn.ajax_form_submit(
        "content="+JSON.stringify(alldata),
        '<?php echo base_url(); ?>channels/insert_channel_content','false');
        
        update_global(response);
        var index=response["current_inserted_id"]; 
        create_folder_view(index,foldername);
    });
    
    $(document).on('click', '#rename_button', function(event){
        $(".channel_active").each(function(){
            if($(this).attr("class").length > 15){
                $("#rename_channel").val($(this).text().trim());
                $("#rename_channel_btn").val($(this).attr("attr-id")); 
            }
        });
    });
    
    $(document).on('click', '#rename_channel_btn', function(event){
        var renamechannel = {};
        var id = $(this).val();
        var name = $("#rename_channel").val().trim();
        renamechannel['channel_id'] = id;
        renamechannel['name'] =  name;
        
        var response = $.fn.ajax_form_submit(
        renamechannel,
        '<?php echo base_url(); ?>channels/rename_channel','false');
        
        data[id]['name'] = name; // updated global data
        $("#channel_breadcrumb").find("li").eq(0).empty().append(name); // breadcrumb changed
        $("#channel_list_button").text(" "+name+" "); // button value updated
        
        $(".channel_active").each(function(){
            if($(this).attr("class").length > 15){
                $(this).find("a").text(name);
            }
        });
        
        $(this).notification('Channel renamed successfully','Channel'); 
    });
    
    $(document).on('click', '.folder_open_icon', function(event){
        var foldername = $(this).parents(".photography").find("span").text().trim();
        var globalid = get_global_id();
        var folderindex = "";
        var attrindex = $(this).attr("attr-index");
        folderindex = globalid+','+attrindex;
        var attrindexli = folderindex;
        
        $("#finalcontainer").empty();
        var tempvalue = fetch_global(data,folderindex);
        
        var dataview = tempvalue['data'];
        if(typeof(dataview) != "undefined")
            create_channel_view(dataview);
        $("#channel_breadcrumb").find("li:last").removeClass("active");
        $("#channel_breadcrumb").find("li:last").addClass("breadcrumb_inactive");
        
        $("#channel_breadcrumb").find("ol").append('<i class="fa fa-angle-right"></i>&nbsp;&nbsp;<li class="active breadcrumb_view" attr-index="'+attrindexli+'">'+foldername+'&nbsp;&nbsp;</li>'); 
        //breadcrumb_content_view();
    });
    
    $(document).on('click', '.edit_folder_icon', function(){
        $("#edit_folder_btn").val($(this).attr("attr-index"));
        $("#editfoldername").val($(this).parents(".photography").find(".ellipsis_div").text());
    });
    
    $(document).on('click', '#edit_folder_btn', function(){
        var updatefolder = {};
        var id = $(this).val();
        var foldername = $("#editfoldername").val();
        updatefolder['channel_content_id'] = id;
        updatefolder['details'] = "";
        updatefolder['name'] = foldername;
        
        var response = $.fn.ajax_form_submit(
        updatefolder,
        '<?php echo base_url(); ?>channels/update_channel_content','false');
        
        update_global(response);
        $("#finalcontainer").find("li").each(function(){
            if($(this).find("a").eq(1).attr("attr-index").trim() == id){
                $(this).find(".ellipsis_div").text(foldername);
            }
        });
        
        $(this).notification('Channel content updated successfully','Channel'); 
        
    });
    
    $(document).on('click', '.edit_link_icon', function(){
        $("#edit_link_btn").val($(this).attr("attr-index"));
        var linkaddress = $(this).parents(".photography").find("a").eq(0).attr("href");
        var linkname = $(this).parents(".photography").find(".ellipsis_div").text();
        linkaddress = linkaddress.substring(7);//Removed http:// 7 letter
        $("#editlinkname").val(linkname);
        $("#editlinkaddress").val(linkaddress);
    });
    
    $("#channel_lock").click(function(){
        var id = "";
        $(".channel_active").each(function(){
            if($(this).attr("class").length > 15){
                id = $(this).attr("attr-id"); 
            }
        });
        var lockchannel = {};
        lockchannel['channel_id'] = id;
        if($(this).text().trim() == "Lock"){
            lockchannel['is_lock'] = 1;
            $("#channel_lock").empty();
            $("#channel_lock").append('<i class="fa fa-lock" style="margin-left: 2px; margin-right: 8px;"></i>Unlock')
        }   
        else{
            lockchannel['is_lock'] = 0;
            $("#channel_lock").empty();
            $("#channel_lock").append('<i class="fa fa-lock" style="margin-left: 2px; margin-right: 8px;"></i>Lock')
        }
        
        //        var response = $.fn.ajax_form_submit(
        //        lockchannel,
        //        '<?php echo base_url(); ?>channels/lock_channel','false');
        
        data[id]['is_lock'] = lockchannel['is_lock']; 
        
        if(lockchannel['is_lock'] == 0)
            $(this).notification('Channel is unlocked successfully','Channel'); 
        else
            $(this).notification('Channel is locked successfully','Channel'); 
        
        
        
    });
    
    $(document).on('click', '#edit_link_btn', function(){
        var updatelink = {};
        var id = $(this).val();
        var linkname = $("#editlinkname").val();
        var linkaddress  = $("#editlinkaddress").val();
        linkaddress = "http://"+linkaddress;
        updatelink['channel_content_id'] = id;
        updatelink['details'] = linkaddress;
        updatelink['name'] = linkname;
        
        var response = $.fn.ajax_form_submit(
        updatelink,
        '<?php echo base_url(); ?>channels/update_channel_content','false');
        
        update_global(response); 
        $("#finalcontainer").find("li").each(function(){
            if($(this).find("a").eq(1).attr("attr-index").trim() == id){
                $(this).find("a").eq(0).attr("href",linkaddress);
                $(this).find(".ellipsis_div").text(linkname);
            }
        });
        
        $(this).notification('Channel content updated successfully','Channel'); 
        
        
    });
    
    
    $(document).on('click', '#delete_channel_icon', function(){
        $(".channel_active").each(function(){
            if($(this).attr("class").length > 15){
                $("#delete_channel_submit").val($(this).attr("attr-id")); 
            }
        });
        
    });
    $(document).on('click', '#delete_channel_submit', function(){
        var deleteid = {};
        var id = $(this).val();
        deleteid['channel_id'] = id;
        delete data[id];
        
        var response = $.fn.ajax_form_submit(
        deleteid,
        '<?php echo base_url(); ?>channels/delete_channel','false');
        
        $(".channel_active").each(function(){
            if($(this).attr("class").length > 15){
                $(this).remove(); 
            }
        });
        
        default_view_channel(); 
        $("#channel_list_button").text(" "+"Channels"+" ");  
        $(this).notification('Channel deleted successfully','Channel'); 
        
        
    });
    
    $(document).on('click', '#duplicate_channel', function(){
        $(".channel_active").each(function(){
            if($(this).attr("class").length > 15){
                $("#add_duplicate_channel").val($(this).attr("attr-id")); 
            }
        });
    });
    
    $(document).on('click', '#add_duplicate_channel', function(){
        var duplicatechannel = {};
        var id = $(this).val();
        var name = $("#duplicate_channel_name").val();
        duplicatechannel['channel_id'] = id;
        duplicatechannel['name'] = name;

        var response = $.fn.ajax_form_submit(
        duplicatechannel,
        '<?php echo base_url(); ?>channels/duplicate_channel','false');
        
        response = $.parseJSON(response);
        var newchannelkey = "";
        $.each(response, function(key,value){ // i getting copmplete channel so i can update global array.
            newchannelkey = key;  
            return false;
        });
        
        data[newchannelkey] = response[newchannelkey]; 
        $("#channel-list").append('<li class="channel_active" attr-id="'+newchannelkey+'"><a>&nbsp;'+response[newchannelkey]['name']+'</a></li>');
        //if switch to duplicate is true;
        
        if($('#duplicate_switch').prop('checked')){ 
            $("#channel-list").find("li:last").trigger("click"); // switch to duplicated channel. in last
        }
        
        $(this).notification('A duplicated channel created successfully','Channel'); 
    });
    
    $(document).on('click', '.delete_icon', function(){
        $("#delete_record_submit").val($(this).attr("attr-index"));
    }); 
    
    $(document).on('click', '#delete_record_submit', function(){
        var deleteid = {};
        var id = $(this).val()
        deleteid['channel_content_id'] = id;
        var response = $.fn.ajax_form_submit(
        deleteid,
        '<?php echo base_url(); ?>channels/delete_channel_content','false');
       
        update_global(response);
        $("#finalcontainer").find("li").each(function(){
            if($(this).find("a").eq(1).attr("attr-index").trim() == id){
                $(this).remove();
            }
        });
        
        
        $(this).notification('Channel content deleted successfully','Channel'); 
    });
    
    $(document).on('click', '.breadcrumb_view', function(event){
        var folderindex = $(this).attr("attr-index");        
        $("#finalcontainer").empty();
        var tempvalue = fetch_global(data,folderindex);
        var dataview = tempvalue['data'];
        if(typeof(dataview) != "undefined")
            create_channel_view(dataview);
        $(this).nextAll().remove();
       
    });


    $(document).on('click','.channel_active',function(){
        var label_text = $(this).text().trim();
        $("#channel_list_button").empty();
        $("#channel_list_button").text(" "+label_text+" ");  
        if(label_text == "Channels"){
            default_view_channel();   
        }
        else{
            var channelid = $(this).attr("attr-id");
            if(data[channelid]['is_lock'] == 0){
                $("#channel_lock").empty();
                $("#channel_lock").append('<i class="fa fa-lock" style="margin-left: 2px; margin-right: 8px;"></i>Lock') ;                            
            }
            else{
                $("#channel_lock").empty();
                $("#channel_lock").append('<i class="fa fa-lock" style="margin-left: 2px; margin-right: 8px;"></i>Unlock') ;                       
            }
            $("#finalcontainer").empty();
            $("#add_channel_item").css("display","inline-flex");
            $("#home").show();
            $("#home_no_channel").hide();
            $("#channel_breadcrumb").show();
            $("#channel_breadcrumb").find("ol").empty();
            $("#channel_edit_property").attr("disabled",false);
            $("#channel_breadcrumb").find("ol").append('<li class="active breadcrumb_view" attr-index="'+channelid+'">'+$(this).text().trim()+'&nbsp;&nbsp;</li>'); 
            var dataview = data[channelid]['data'];
            create_channel_view(dataview);
        }
    }); 
            
    function breadcrumb_content_view(){
//        alert($("#channel_breadcrumb").find("li:visible").text().trim().length);
//        if($("#channel_breadcrumb").find("li:visible").text().trim().length > 95){
//            hiddenelement++;
//            $("#channel_breadcrumb").find("li").eq(hiddenelement).hide();
//            $("#channel_breadcrumb").find("i").eq(hiddenelement - 1).hide();
//        }
//        alert($("#channel_breadcrumb").find("li:visible").text().trim().length);
    }
            
    function update_global(response){
        response = $.parseJSON(response);
        var newchannelkey = "";
        $.each(response, function(key,value){ // i getting copmplete channel so i can update global array.
            newchannelkey = key;  
            return false;
        });
        data[newchannelkey] = response[newchannelkey]; 
    }

    function fetch_global(data,gloabalid){
        var globalidarray = gloabalid.split(',');
        var tempvalue = data[globalidarray[0]];
        if(globalidarray.length > 1){
            gloabalid = gloabalid.substr(globalidarray[0].length+1);
            return fetch_global(tempvalue['data'],gloabalid);
        }
        else{
            return tempvalue;    
        }
    }
    
    function default_view_channel(){
        $("#home").hide();
        $("#add_channel_item").css("display","none");
        $("#home_no_channel").show();
        $("#channel_breadcrumb").hide();
        $("#channel_edit_property").attr("disabled",true);
    }
    function create_channel_view(dataview){
        $.each(dataview, function(index,obj){
            if(obj['type']== "file"){
                create_image_view(obj['name'],obj['details'],obj['content_id'],index)
            }
            if(obj['type']== "link"){
                create_link_view(obj['channel_content_id'],obj['details'],obj['name']);
            }
            if(obj['type']== "folder"){
                create_folder_view(obj['channel_content_id'],obj['name'])                        
            }
        });
    }
    function create_folder_view(index,foldername){                
        $("#finalcontainer").append($("#hidden_folder").clone());
        $("#finalcontainer li:last").removeAttr("id");
        $("#finalcontainer li:last").removeAttr("style"); 
        $("#finalcontainer li:last").attr("attr-index",index);
        $("#finalcontainer li:last").find("a").eq(0).attr("attr-index",index);
        $("#finalcontainer li:last").find("a").eq(1).attr("attr-index",index);
        $("#finalcontainer li:last").find("a").eq(2).attr("attr-index",index);                
        $("#finalcontainer li:last").find(".ellipsis_div").text(foldername);        
    }
    
    function create_link_view(index,linkaddress,linkname){
        $("#finalcontainer").append($("#hidden_link").clone());
        $("#finalcontainer li:last").removeAttr("id");
        $("#finalcontainer li:last").removeAttr("style"); //image_address
        $("#finalcontainer li:last").attr("attr-index",index);
        $("#finalcontainer li:last").find("a").eq(0).attr("href",linkaddress);
        $("#finalcontainer li:last").find("a").eq(1).attr("attr-index",index);
        $("#finalcontainer li:last").find("a").eq(2).attr("attr-index",index);
        $("#finalcontainer li:last").find(".ellipsis_div").text(linkname);        
    }
    
    function create_image_view(name,src,id,index){  
        $("#finalcontainer").append($("#hidden_image").clone());
        $("#finalcontainer li:last").removeAttr("id");
        $("#finalcontainer li:last").removeAttr("style"); 
        $("#finalcontainer li:last").attr("attr-index",index);
        $("#finalcontainer li:last").find("a").eq(0).attr("href","<?php echo base_url(); ?>/assets/upload/"+name.trim());
        $("#finalcontainer li:last").find("a").eq(1).attr("attr-index",index);
        $("#finalcontainer li:last").find(".image_address").attr("content-id",id);
        $("#finalcontainer li:last").find(".view_image").attr("src","<?php echo base_url(); ?>/assets/file/"+src);
        $("#finalcontainer li:last").find(".ellipsis_div").text(name);        
    }
    
    $(document).ready(function(){ 
        $(".select2-multi-value").select2();
        $('.select2-size').select2({
            placeholder: "Select an option",
            allowClear: true
        });
    });
    

    $(document).on('click','.channel_active',function(){
        $('.channel_active').removeClass('active');
        $(this).addClass('active');
            
    })
    //***************add new channel*********************              
    $('#add_channel').click(function(){
        var channeldata = {};
        channeldata['name'] = $("#channelname").val();
        channeldata['data'] = {};
                
        var response = $.fn.ajax_form_submit(
        "channel="+JSON.stringify(channeldata),
        '<?php echo base_url(); ?>channels/insert_channel','false');
        response = $.parseJSON(response);
        $(this).notification('Channel added successfully','Channel'); 
        $('#modal-channel').modal('hide');
        response = $.parseJSON(response);
        var newchannelkey = "";
        $.each(response, function(key,value){ // i getting copmplete channel so i can update global array.
            newchannelkey = key;  
            return false;
        });
        data[newchannelkey] = response[newchannelkey]; 
                
                
        $("#channel-list").append('<li class="channel_active" attr-id="'+newchallekey+'"><a>&nbsp;'+response[newchallekey]['name']+'</a></li>');
        return false;        
    });  
    $('#add_user_form').validate();
    
    $(document).on('click','#set_user_group_btn',function(){
        var id = "";
        $(".channel_active").each(function(){
            if($(this).attr("class").length > 15){
                id = $(this).attr("attr-id"); 
            }
        });
        var user = data[id]['users'];        
        var userarray = user.split(",");       
        $("#selected_users").select2();
        $("#selected_users").select2('val', userarray);
        
        var group = data[id]['groups'];
        var grouparray = group.split(",");       
        $("#selected_groups").select2();
        $("#selected_groups").select2('val', grouparray);        
    });
    $(document).on('click','#submit_group_user_btn',function(){
        
        var usergroup = {};
        var id = "";
        $(".channel_active").each(function(){
            if($(this).attr("class").length > 15){
                id = $(this).attr("attr-id"); 
            }
        });
        var groupvalue = "";
        var group = $("#selected_groups").val();
        $.each(group, function(index,value){
                groupvalue = groupvalue + value + ",";
        });
        usergroup['groups'] = groupvalue.substring(0, groupvalue.length - 1);
        
        var uservalue = "";
        var user = $("#selected_users").val();
        $.each(user, function(index,value){
                uservalue = uservalue + value + ",";
        });
        usergroup['users'] = uservalue.substring(0, uservalue.length - 1);
        usergroup['channel_id'] = id;
        
        var response = $.fn.ajax_form_submit(
        usergroup,
        '<?php echo base_url(); ?>channels/rename_channel','false');
        
        data[id]['groups'] =   usergroup['groups']  // updated global data
        data[id]['users'] = usergroup['users']; // updated global data
        
        $(this).notification('Users and groups updated successfully','Channel');         
    });
           
    //*****************notification*************************
    $.fn.notification = function(message, heading) {
        $.notific8(message, {
            life: 2000,
            heading: heading,
            theme: 'ebony',
            sticky: true,
            horizontalEdge: 'top',
            verticalEdge: 'right',
            zindex: 1500,
            icon: false,
            closeText: 'close',
            onInit: null,
            onCreate: null,
            onClose: null
        });
    }
            
        
</script>
