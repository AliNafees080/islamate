<?php
// this is used for pop up briefcase list.
$briefcasemodel = array();
$i = 0;
foreach($detail['briefcase'] as $key => $value){
    $briefcasemodel[$i] = array($value['name'],$value['briefcase_id']);
    $i++;
}
//echo "<pre>";
//print_r($detail);
//echo "</pre>";
//die();
?>

<style type="text/css">
    #jq-demo{
        width: 100%;
        overflow: hidden;
    }
    .icon_size_one{
        font-size: 18px; 
        margin-top: 1px;
        background-color: #20b889;
        padding: 3px;
        margin-left: -6px;       
    }
    .view_user:hover{
        color: #fff;        
    }
    .icon_size_two{
        font-size: 20px;   
        margin-top: 2px;
        background-color: #20b889;
        padding: 2px;
        margin-left: -6px;  
    }
    .breadcrumb_inactive:hover{
        cursor: pointer;
        color: #20b889;
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
        border: dashed #1b9d75 1px;
    }
    /****************/
    .row .row-merge [class*=col-] .pricing-widget {
        position: relative;
        border: 0;
        cursor: default;
        margin: 0px 0;
        -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05) !important;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05) !important;
        box-shadow: 0 3px 25px -4px rgba(0, 0, 0, 0.898) !important;
    }
    .row .row-merge [class*=col-] .content-list:hover:not(.pricing-title) {
        box-shadow: none !important;
    }
    .row .row-merge [class*=col-] .pricing-widget .pricing-head {
        background: none repeat scroll 0 0 #1b9d75;
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
    .btn-briefcase {
        color: #ffffff;
        background:none repeat scroll 0 0 rgba(0, 0, 0, 0);
        border-color: white;
    }
    .btn-briefcase:hover,
    .btn-briefcase:focus,
    .btn-briefcase:active,
    .btn-briefcase.active,
    .open .dropdown-toggle.btn-briefcase {
        color: #ffffff;
        background: #20b889;
        border-color: #20b889;
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
    
    <li id="hidden_link" attr-index="" style=" display: none;">
        <div class="gallery-pages">
            <div class="mix-grid">
                <div class="col-md-12 mix photography">
                    <div class="hover-effect">
<!--                        <div class="img text-center" style="width: 100px; height: 100px;">-->
                        <div class="file-img text-center" style="">
                            <!--<img class="img-responsive view_image" alt="" src="<?php echo base_url(); ?>assets/file/URL.png">-->
                            <a title="View link" target="_blank" href=""><i class="fa fa-globe img-responsive view_image" style="font-size:70px; color:#393939;"></i></a>
                        </div>
                        <span class="slideleft text-right" style="position:absolute; top:0; right: -91px; ">
                              <!--<a title="View link" target="_blank"  class="btn btn-grey  btn-xs"><i class="fa fa-external-link" style="padding:2px;"></i></a>-->
                              <a  title="Edit link" data-target="#modal-link-group-edit" data-toggle="modal" class="btn btn-grey btn-xs edit_link_icon"><i title="View file" class="glyphicon glyphicon-pencil" style="padding:2px;"></i></a>
                              <a id="" style="" title="Delete link" data-target="#modal-static" data-toggle="modal" value=""  class="btn btn-grey btn-xs delete_icon"><i class="glyphicon glyphicon-trash" style="padding:2px;"></i></a> 
                       </span>
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
<!--                        <div class="img text-center" style="width: 100px; height: 100px;">-->
                        <div class="file-img text-center" style="">
                            <a title="View folder"  class="folder_open_icon"><i class="fa fa-folder-open-o" style="font-size:70px; color:#393939;"></i></a>
                            <!--<img class="img-responsive view_image" alt="" src="<?php echo base_url(); ?>assets/file/folder_black_generic.png">-->
                        </div>
                        <span class="slideleft text-right" style="position:absolute; top:0; right: -90px; ">
                              <!--<a title="View folder"  class="btn btn-grey  btn-xs folder_open_icon"><i class="fa fa-folder-open"></i></a>-->
                              <a  title="Edit folder" data-target="#modal-folder-group-edit" data-toggle="modal" class="btn btn-grey btn-xs edit_folder_icon"><i title="View file" class="glyphicon glyphicon-pencil" style="padding:2px;"></i></a>
                              <a id="" style="" title="Delete folder" data-target="#modal-static" data-toggle="modal" value=""  class="btn btn-grey btn-xs delete_icon"><i class="glyphicon glyphicon-trash" style="padding:2px;"></i></a> 
                       </span>
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
<!--                        <div class="img" style="width: 100px; height: 100px;">-->
                        <div class="file-img text-center" style="height:73px;">
                            <!--<img class="img-responsive view_image" alt="" src="">-->
                                <a class=""  title="View file" target="_blank" href="" data-target="" data-toggle="modal" attr-path="" attr-name="" attr-index="" >
                            <div class="icons">
                                    <div class="file-icon file-icon-lg view_image" data-type="" style="margin:auto;"></div>
                            </div>
                                </a>
                        </div>
                        <span class="slideleft text-right" style="position:absolute; top:0; right: -70px; ">
                              <!--<a style="" title="View file" target="_blank" class="view_user btn btn-grey btn-xs"><i  class="fa fa-external-link" style="padding:2px;"></i></a>-->
                              <a id="" style="" title="Delete file" data-target="#modal-static" data-toggle="modal" value=""  class="btn btn-grey btn-xs delete_icon"><i class="glyphicon glyphicon-trash" style="padding:2px;"></i></a> 
                       </span>
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
                <div class="page-title"><i class="fa fa-home" style=" margin-top: 7px;"></i>&nbsp;&nbsp;Contents & Briefcases</div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-left">
                <li class="active">&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;<a href="">Briefcase</a></li>
                <div class="clearfix"></div>
            </ol>
            <div class="pull-right mbm mtm" style="display: inline-block;" >
<!--               <button type="button" style="padding:4px 10px;" data-toggle="modal" data-target="#modal-briefcase" class="btn btn-briefcase btn-outlined btn-square" ><i class="fa fa-desktop"></i></button>                -->
                <a href="#" data-toggle="modal" data-target="#modal-briefcase" class=" btn btn-grey" id="add_briefacse_reset_btn">Add Briefcase</a>
            </div>
        </div>
        <!--END TITLE & BREADCRUMB PAGE-->
        <!--BEGIN CONTENT-->
        <div class="page-content">
            
            
           <!--        Model to show list of briefcases    --> 
            <div id="modal-briefcase_list" tabindex="-1" role="dialog" aria-labelledby="modal-responsive-label" aria-hidden="true" class="modal fade">

                            <div class="modal-dialog" style=" width: 430px;">

                                <div class="modal-content">

                                    <div class="modal-header" style="background: #20b889; color:#ffffff;"><button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button><h4 id="modal-responsive-label" class="modal-title">Select a briefcase</h4>
                                    </div>

                                    <div class="modal-body">

                                        <div class="row">
                                            
                                            <div class="col-md-12 chat-scroller" style=" max-height: 250px;">
                                                <table class="table table-hover table-bordered">
                                            <tbody>
                                                <?php
                                                    $briefcaselength = sizeof($detail['briefcase']);
                                                    for($i=0;$i<$briefcaselength;$i++){
                                                    ?>
                                                        <tr>
                                                        <td style=" width: 15%; text-align: center;"><?php echo $i+1; ?></td>
                                                        <td class="mbm briefcase_active" style=" width: 80%; cursor: pointer; font-size: 18px; text-align: center;" title="<?php echo $briefcasemodel[$i][0]; ?>" attr-id="<?php echo $briefcasemodel[$i][1]; ?>"><?php echo $briefcasemodel[$i][0]; ?> </td>
                                                        </tr>                                                                                                                                                                                                                                
                                            <?php } ?>
                                                
                                                
                                                </tbody>
                                        </table>

                                            </div>    
                                        </div>
                                    </div>

                                    <div class="modal-footer"><button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
            <!--        End model    -->            
            
            <!--        Model to delete folder, image or link of briefcase    -->
            <div id="modal-static" tabindex="-1"  data-keyboard="false" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <p>Would you like to delete selected briefcase content?</p>
                        </div>
                        <div class="modal-footer">
                            <button id="delete_record_submit" type="button" data-dismiss="modal" class="btn btn-grey" value="">OK</button>
                            <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>

                        </div>
                    </div>
                </div>
            </div>
            <!--            End model-->
            <!--        Model to delete briefcase    -->
            <div id="modal-static-delete-briefcase" tabindex="-1" data-keyboard="false" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <p>Would you like to delete selected briefcase?</p>
                        </div>
                        <div class="modal-footer">
                            <button id="delete_briefcase_submit" type="button" data-dismiss="modal" class="btn btn-grey" value="">OK</button>
                            <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>

                        </div>
                    </div>
                </div>
            </div>
            <!--End model            -->

            <div class="row">                
                <!--BEGIN MODAL for add briefcase-->
                <div id="modal-briefcase" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form id="briefcase_form" class="form-validate form-horizontal"  >
                                <div class="modal-header">
                                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                    <h4 class="modal-title">Add a new briefcase</h4>
                                </div>
                                <div class="modal-body">  
                                    <div class="form">                                        
                                        <div class="form-group">
                                                <label class="control-label col-md-3">Briefcase name<span class='require'>*</span>
                                                </label>

                                                <div class="col-md-9">
                                                    <input type="text" name="name" maxlength="50" class="form-control required" id="briefcasename" />  
                                                </div>
                                        </div>                                                                            
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button id="" type="submit"  class="btn btn-grey">Create</button>
                                    <button id="cancel_add_briefcase" type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--END MODAL briefcase-->
                
                <!--start MODAL of create link-->
                <div id="modal-link-group" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form class="form-horizontal form-validate" id="add_link_form">
                                <div class="modal-header"><button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button><h4 id="modal-login-label" class="modal-title">Add Link</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form">                                        
                                        <div class="form-group">
                                            <label class="control-label col-md-3" style=" text-align: left;">Link<span class="require">*</span>
                                                <span class="pull-right" style=" margin-right: -25px;">http://</span>
                                            </label>
                                            <div class="col-md-9">
                                                <input id="linkaddress" maxlength="200" type="text" class="form-control required" name="linkaddress"/>
                                            </div>
                                        </div>
                                            
                                        <div class="form-group">
                                            <label class="control-label col-md-3" style=" text-align: left;">Link Name<span class="require">*</span></label>
                                            <div class="col-md-9">
                                                <input id="linkname" maxlength="200" type="text" class="form-control required" name="linkname"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-grey">Add</button>
                                    <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--END MODAL link-->

                 <!--start MODAL for user and groups-->
                <div id="modal-users-groups" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form class="form-horizontal form-validate" id="manage_access_form">
                            <div class="modal-header"><button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button><h4 class="modal-title">Manage Briefcase Access</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form">
                                    
                                        <div class="form-group">
                                            <label class="control-label col-md-3" style=" text-align: left;">Select users<span class="require">*</span>                                                
                                            </label>
                                                <div class="hide-select col-md-9 ">
                                                    <select multiple="true" name="users" id="selected_users"   class="select2-multi-value form-control required">
                                                       <?php
                                                               foreach($detail['user'] as $key=> $value){?>
                                                                   <option value="<?php echo $value['user_id']; ?>" ><?php echo $value['name']; ?></option>
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
                                                            <option value="<?php echo $value['group_id']; ?>" ><?php echo $value['name']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>                                            
                                        </div>              
                                   
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button id="submit_group_user_btn" type="submit" class="btn btn-grey">Save</button>
                                <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
                <!--END MODAL link-->
                
                <!--start MODAL of edit link-->
                <div id="modal-link-group-edit" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                             <form class="form-horizontal form-validate" id="edit_link_form">
                            <div class="modal-header"><button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button><h4 id="modal-login-label" class="modal-title">Edit Link</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form">                                   
                                        <div class="form-group">
                                            <label class="control-label col-md-3" style=" text-align: left;">Link<span class="require">*</span>
                                                <span class=" pull-right" style=" margin-right: -25px;">http://</span>
                                            </label>
                                            <div class="col-md-9">
                                                <input id="editlinkaddress" maxlength="200" name="editlinkaddress" type="text" class="form-control required"/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3" style=" text-align: left;">Link Name<span class="require">*</span></label>
                                            <div class="col-md-9">
                                                <input id="editlinkname" maxlength="200" name="editlinkname" type="text" class="form-control required"/>
                                            </div>
                                        </div>              
                                    
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button id="edit_link_btn" type="submit" class="btn btn-grey">Save</button>
                                <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                            </div>
                                 </form>
                        </div>
                    </div>
                </div>
                <!--END MODAL link-->


                <!--start  MODAL for create folder-->
                <div id="modal-folder-group" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form class="form-horizontal form-validate" id="add_folder_form">
                                <div class="modal-header"><button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button><h4 id="modal-login-label" class="modal-title">Add Folder</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form">

                                            <div class="form-group">
                                                <label class="control-label col-md-3" style=" text-align: left;">Folder Name<span class="require">*</span>                                                        
                                                </label>
                                                <div class="col-md-9">
                                                    <input id="foldername" maxlength="200" type="text" class="form-control required"/>
                                                </div>
                                            </div>     

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button id="add_folder_btn" type="submit" class="btn btn-grey">Add</button>
                                    <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--END MODAL folder-->

                <!--start  MODAL for duplicate briefcase-->
                <div id="modal-duplicate-briefcase-group" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form class="form-horizontal form-validate" id="duplicate_briefcase_form">
                            <div class="modal-header"><button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button><h4 id="modal-login-label" class="modal-title">Create duplicate briefcase</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form">
                                    
                                        <div class="form-group">
                                            <label class="control-label col-md-3" style=" text-align: left;">Briefcase Name<span class="require">*</span>                                                        
                                            </label>
                                            <div class="col-md-9">
                                                <input id="duplicate_briefcase_name"  maxlength="50" name="duplicate_briefcase_name" type="text" class="form-control required"/>
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label class="control-label col-md-3" style=" text-align: left;">&nbsp;</label>
                                            <div class="col-md-9">
                                                <label>
                                                    <input id="duplicate_switch" name="" tabindex="5" type="checkbox" />&nbsp;
                                                    Switch to duplicated briefcase?
                                                </label>
                                            </div>
                                        </div> 
                                    
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button id="add_duplicate_briefcase" type="submit" class="btn btn-grey">Add</button>
                                <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                            </div>
                                </form>
                        </div>
                    </div>
                </div>
                <!--END MODAL folder-->



                <!--start  MODAL for rename briefcase-->
                <div id="modal-rename-briefcase" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form class="form-horizontal form-validate" id="briefcase_rename_form">
                            <div class="modal-header"><button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button><h4 id="modal-login-label" class="modal-title">Rename Briefcase</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form">
                                  
                                        <div class="form-group">
                                            <label class="control-label col-md-3" style=" text-align: left;">Briefcase Name<span class="require">*</span>                                                        
                                            </label>
                                            <div class="col-md-9">
                                                <input id="rename_briefcase" maxlength="50" name="rename_briefcase" type="text" class="form-control required"/>
                                            </div>
                                        </div>     
                                    
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button id="rename_briefcase_btn" type="submit" class="btn btn-grey">Save</button>
                                <button id="rename_briefcase_btn_cancel" type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--END MODAL folder-->

                <!--start  MODAL for edit folder-->
                <div id="modal-folder-group-edit" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form class="form-horizontal form-validate" id="edit_folder_form">
                                <div class="modal-header"><button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button><h4 id="modal-login-label" class="modal-title">Edit folder</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form">

                                            <div class="form-group">
                                                <label class="control-label col-md-3" style=" text-align: left;">Folder Name<span class="require">*</span>                                                        
                                                </label>
                                                <div class="col-md-9">
                                                    <input id="editfoldername" maxlength="200" name="editfoldername" type="text" class="form-control required"/>
                                                </div>
                                            </div>     

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button id="edit_folder_btn" type="submit" class="btn btn-grey">Save</button>
                                    <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                                </div>
                            </form>
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
                                <form id="briefcase_background" method="POST">
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
                                <button type="button" data-dismiss="modal"  class="change_background btn btn-grey">Save</button>
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
                                <form id="briefcase_logo" method="POST">
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
                                <button type="button" data-dismiss="modal"  class="change_logo btn btn-grey">Save</button>
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
                            <div style="height:728px;" class="pricing-body chat-scroller" >
                                <ul id="dragcont">
                                    <?php
    //                                    echo "<pre>";
    //                                    print_r($detail['content_detail']); die();
                                    foreach ($detail['content_detail'] as $content) {
                                        $fil_name = explode('.', $content['name']);
                                        $last_element = end($fil_name);
                                        ?>
                                        <li class="draggablediv ui-draggable" style=" cursor: move; padding-bottom: 20px; " title="<?php echo $content['name'].'  [Created on: '.$content['creation_time']; ?>]">
                                            <div class="gallery-pages">
                                                <div class="mix-grid">
                                                    <div class="col-md-12 mix photography" style=" display: inline-block; overflow: visible;">
                                                        <div class="hover-effect" style=" display: inline-block; width: 10%; overflow: visible;">
                                                            <div class="file-img content_size" style="">
                                                                <div class="icons">
                                                                        <?php if ($content['type'] == "image") { ?>
                                                                            <a title="View image" data-target="#modal-image-content" data-toggle="modal" attr-path="<?php echo base_url(); ?>assets/upload/<?php echo $content['filepath']; ?>" attr-name="<?php echo $content['name']; ?>" attr-index=""  class="view_image_icon">
                                                                                <div class="file-icon file-icon-sm" content-id="<?php echo $content['content_id']; ?>" style="margin:auto;" data-type="<?php echo $last_element; ?>"></div>
                                                                            </a>
                                                                        <?php } else if ($content['type'] == "audio") { ?>
                                                                            <a title="View audio" data-target="#modal-audio-content" data-toggle="modal" attr-path="<?php echo base_url(); ?>assets/upload/<?php echo $content['filepath']; ?>" attr-name="<?php echo $content['name']; ?>" attr-index=""  class="view_audio_icon">
                                                                                <div class="file-icon file-icon-sm" content-id="<?php echo $content['content_id']; ?>" style="margin:auto;" data-type="<?php echo $last_element; ?>"></div>
                                                                            </a>
                                                                        <?php } else if ($content['type'] == "video") { ?>
                                                                            <a title="View video" data-target="#modal-video-content" data-toggle="modal" attr-path="<?php echo base_url(); ?>assets/upload/<?php echo $content['filepath']; ?>" attr-name="<?php echo $content['name']; ?>" attr-index=""  class="view_video_icon">
                                                                                <div class="file-icon file-icon-sm" content-id="<?php echo $content['content_id']; ?>" style="margin:auto;" data-type="<?php echo $last_element; ?>"></div>
                                                                            </a>
                                                                        <?php } else { ?>
                                                                            <a title="View file" href="<?php echo base_url(); ?>assets/upload/<?php echo $content['filepath']; ?>" class="">
                                                                                <div class="file-icon file-icon-sm" content-id="<?php echo $content['content_id']; ?>" style="margin:auto;" data-type="<?php echo $last_element; ?>"></div>
                                                                            </a>
                                                                        <?php } ?>
                                                                </div>
                                                            </div>
                                                            <span class="slideleft text-right" style="position:absolute; top:0; right: -90px; display: none;">
                                                                      <!--<a title="View file"  class="btn btn-grey  btn-xs" href="<?php echo base_url(); ?>assets/upload/<?php echo $content['filepath']; ?>"><i class="fa fa-external-link" style="padding:2px;"></i></a>-->
                                                                      <a id="" style="" title="Delete file" data-target="#modal-static" data-toggle="modal" value=""  class="btn btn-grey btn-xs delete_icon"><i class="glyphicon glyphicon-trash" style="padding:2px;"></i></a> 
                                                           </span>
                                                        </div>
                                                        <span class="ellipsis_div"  style="width:100px;display:inline-block; text-align: left; height: 20px;">&nbsp;<?php echo $content['name']; ?> </span>
                                                        <span class="ellipsis_div remove_ellipsis" style="width:120px;display:inline-block; text-align: right; height: 20px; float: right;">&nbsp;<?php echo $content['creation_time']; ?> </span>
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
                                    <button id="set_user_group_btn" type="button" style="padding:4px 10px;" data-toggle="modal" data-target="#modal-users-groups" class="btn btn-briefcase btn-outlined btn-square" title="Manage briefcase access" disabled="disabled" ><i class="fa fa-user"></i></button>
                                    <div class="btn-group">
                                        <ul id="briefcase-list" class="dropdown-menu pull-right" style=" max-height: 184px; overflow-y: scroll;" >
                                            <li class="briefcase_active"><a>&nbsp;Select briefcase</a></li>
                                            <?php foreach ($detail['briefcase'] as $key => $briefcasevalue) { ?>
                                                <li class="briefcase_active" attr-id="<?php echo $key; ?>" ><a>&nbsp;<?php echo $briefcasevalue['name']; ?></a></li>
                                            <?php } ?>
                                        </ul>

                                        <button type="button" data-toggle="dropdown" class="btn btn-briefcase btn-outlined btn-square btn-sm dropdown-toggle" style=" padding: 0px; height: 30px; width: 160px;" title="Briefcase list"><i class="fa fa-briefcase" style=" margin-left: 8px; margin-top: 8px;"></i>
                                            <label id="briefcase_list_button" style=" margin-left: 3px; margin-right: 1px; height: 21px; width: 106px; overflow: hidden; margin-top: 5px;">&nbsp;Select briefcase&nbsp;</label> 
                                            <span class="caret" style=" margin-top: 10px; margin-right: 7px;"></span>
                                        </button>

                                    </div>
                                    <div class="btn-group">
                                        <ul class="dropdown-menu pull-right">
                                            <li><a id="rename_button" data-toggle="modal" data-target="#modal-rename-briefcase" ><i class="fa fa-pencil"></i>&nbsp;
                                                    Rename</a>
                                            </li>
                                            <li><a data-toggle="modal" data-target="#modal-static-delete-briefcase" id="delete_briefcase_icon"><i class="fa fa-trash-o"></i>&nbsp;
                                                    Delete</a>
                                            </li>
                                            <li><a data-toggle="modal" data-target="#modal-duplicate-briefcase-group" id="duplicate_briefcase" ><i class="fa fa-refresh"></i>&nbsp;
                                                    Duplicate</a>
                                            </li>
<!--            This part is under discussion. All features completed                                <li><a id="briefcase_lock"><i class="fa fa-lock"></i>&nbsp;
                                                    Lock</a>
                                            </li>-->
                                        </ul>

                                        <button id="briefcase_edit_property" type="button" data-toggle="dropdown" class="btn btn-briefcase btn-outlined btn-square btn-sm dropdown-toggle" disabled="disabled" title="Briefcase settings"><i class="fa fa-cog"></i> &nbsp;Settings &nbsp;
                                            <span class="caret"></span>
                                        </button>
                                    </div>
<!--                                    <div class="btn-group">
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

                                        <button type="button" data-toggle="dropdown" class="btn btn-briefcase btn-outlined btn-square btn-sm dropdown-toggle"><i class="fa fa-pencil-square-o"></i> &nbsp;Customize &nbsp;
                                            <span class="caret"></span>
                                        </button>

                                    </div>-->
                                    <!--                                    <button id="save_briefcase_button" type="button" style="padding:4px 10px; display: none;" class="btn btn-briefcase btn-outlined btn-square pull-right" >Save Channel</button>-->
                                </div>
                            </div>

                            <div id="briefcase_breadcrumb" class="page-title-breadcrumb" style=" margin: auto; width: 99.5%; height: 18px; display: none;">
                                <ol class="breadcrumb page-breadcrumb pull-left">

                                </ol>
                            </div>
                           

                            <div class="tab-content pricing-body">                                 
                                <div id="home" style=" display: none; ">                                    
                                    <div id="sort">
                                        <ul id="finalcontainer" class="ui-sortable" style=" height: 498px; overflow: auto; padding-left: 32px;">                                            

                                        </ul>
                                    </div>
                                </div> 
                                <div id="home_no_briefcase" >                                    
                                    <div class="sort_2">
                                        <ul id="" class="ui-sortable" style=" height: 509px; background: none repeat scroll 0 0 rgba(88, 93, 95, 0.3); margin: 0px; padding: 0px; text-align: center;" data-toggle="modal" data-target="#modal-briefcase_list" >                                            
                                            <h1 style=" margin-top: 223px;">Click to select briefcase</h1>
                                        </ul>
                                    </div>
                                </div> 

                                <div class="align-center" style="padding:20px; height: 150px; text-align: center;" >
                                    <ul style="display:none;" id="add_briefcase_item">
                                        <li class="draggablediv ui-draggable" id="create_folder_icon" data-toggle="modal" data-target="#modal-folder-group" style="height:100px; display:inline-block;width:100px; z-index:1000; margin-left:10px; margin-right:10px; list-style-type: none;" data-pos="3">
                                            <i class="fa fa-folder-open-o" style="font-size:100px; color:#393939;"></i>
                                            <span style="display:block;text-align:center;">Folder</span>
                                        </li>
                                        <li class="draggablediv ui-draggable" id="create_link_icon" data-toggle="modal" data-target="#modal-link-group" style="height:100px; display:inline-block;width:100px; z-index:1000;  margin-left:10px; margin-right:10px; list-style-type: none;" data-pos="3">
                                            <i class="fa fa-globe" style="font-size:100px; color:#393939;"></i>
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
<!--LOADING SCRIPTS FOR contents and briefcases-->
<script>
    var data = <?php echo json_encode($detail['briefcase'],TRUE); ?>;
    console.log(data);
    var hiddenelement  = 0;
    var position_from = "";
    var position_to = ""; // 
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
  $("#manage_access_form").submit(function(e){
       e.preventDefault();
       var form = $("#manage_access_form");
       form.validate();
       if(form.valid() == true){
           
           $("#modal-users-groups").modal('hide');
            var usergroup = {};
            var id = "";
            $(".briefcase_active").each(function(){
                if($(this).attr("class").length > 18){
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
            usergroup['briefcase_id'] = id;
            usergroup['timezone'] = <?php echo json_encode(date_default_timezone_get()); ?>

            var response = $.fn.ajax_form_submit(
            usergroup,
            '<?php echo base_url(); ?>briefcases/manage_briefcase','false');

            data[id]['groups'] =   usergroup['groups']  // updated global data
            data[id]['users'] = usergroup['users']; // updated global data

            $(this).notification('Users and groups updated successfully','Briefcase'); 
            
       }
   });
  
  $("#edit_folder_form").submit(function(e){
       e.preventDefault();
       var form = $("#edit_folder_form");
       form.validate();
       if(form.valid() == true){
            var updatefolder = {};
            var originalid = $("#edit_folder_btn").val();
            var id = remove_string(originalid);
            var foldername = $("#editfoldername").val();
            updatefolder['briefcase_content_id'] = id;
            updatefolder['description'] = "";
            updatefolder['name'] = foldername;
          
            var response = $.fn.ajax_form_submit(
            updatefolder,
            '<?php echo base_url(); ?>briefcases/update_briefcase_content','false');
            $("#modal-folder-group-edit").modal('hide');
            update_global(response);
            $("#finalcontainer").find("li").each(function(){
                if($(this).find("a").eq(1).attr("attr-index").trim() == originalid){
                    $(this).find(".ellipsis_div").text(foldername);
                }
            });

            $(this).notification('Briefcase content updated successfully','Briefcase'); 
           form_reset("edit_folder_form");
       }
  });
  
  
  $("#add_folder_form").submit(function(e){
       e.preventDefault();
       var form = $("#add_folder_form");
       form.validate();
       if(form.valid() == true){
            var foldername = $("#foldername").val().trim();
            var globalid = get_global_id();
            alldata = {};            
            alldata['name'] = foldername;
            alldata['type'] = "folder";
            alldata['creation_time'] = "0000-00-00 00:00:00";
            alldata['sequence_no'] = $("#finalcontainer").find("li").length;
            if($("#briefcase_breadcrumb").find("li").length > 1){
                globalid = get_global_id();
                var globalidarray =  globalid.split(",");
                alldata['briefcase_id'] = globalidarray[0]; // set briefcase id   
                var newid = remove_string(globalidarray[globalidarray.length-1]);  
                alldata['parent_id'] = newid;// set parentd_id
            }else{
                alldata['parent_id'] = ""; 
                alldata['briefcase_id'] = data[globalid]['briefcase_id'];
            }

            var response = $.fn.ajax_form_submit(
            "content="+JSON.stringify(alldata),
            '<?php echo base_url(); ?>briefcases/insert_briefcase_content','false');
            
            $("#modal-folder-group").modal('hide');
            update_global(response);
            response = $.parseJSON(response);
            var index=response["current_inserted_id"]; 
            create_folder_view(index,foldername);
            form_reset("add_folder_form");
        
       }
  });
  
   $("#duplicate_briefcase_form").submit(function(e){
       e.preventDefault();
       var form = $("#duplicate_briefcase_form");
       form.validate();
       if(form.valid() == true){
           $("#modal-duplicate-briefcase-group").modal('hide');
            var duplicatebriefcase = {};
            var id = $("#add_duplicate_briefcase").val();
            var name = $("#duplicate_briefcase_name").val();
            duplicatebriefcase['briefcase_id'] = id;
            duplicatebriefcase['name'] = name;

            var response = $.fn.ajax_form_submit(
            duplicatebriefcase,
            '<?php echo base_url(); ?>briefcases/duplicate_briefcase','false');

            response = $.parseJSON(response);
            var newbriefcasekey = "";
            $.each(response, function(key,value){ // i getting copmplete briefcase so i can update global array.
                newbriefcasekey = key;  
                return false;
            });
        
            data[newbriefcasekey] = response[newbriefcasekey]; 
            update_briefcase_list(newbriefcasekey,response[newbriefcasekey]['name']);
            $("#briefcase-list").append('<li class="briefcase_active" attr-id="'+newbriefcasekey+'"><a>&nbsp;'+response[newbriefcasekey]['name']+'</a></li>');
            //if switch to duplicate is true;

            if($('#duplicate_switch').prop('checked')){ 
                $("#briefcase-list").find("li:last").trigger("click"); // switch to duplicated briefcase. in last
            }

            $(this).notification('A duplicated briefcase created successfully','Briefcase'); 
            form_reset("duplicate_briefcase_form");
       }
   });
   
   $("#briefcase_rename_form").submit(function(e){
       e.preventDefault();
       var form = $("#briefcase_rename_form");
       form.validate();
       if(form.valid() == true){
            $("#modal-rename-briefcase").modal('hide');
            var renamebriefcase = {};
            var id = $("#rename_briefcase_btn").val();
            var name = $("#rename_briefcase").val().trim();
            renamebriefcase['briefcase_id'] = id;
            renamebriefcase['name'] =  name;
            var response = $.fn.ajax_form_submit(
            renamebriefcase,
            '<?php echo base_url(); ?>briefcases/rename_briefcase','false');

            data[id]['name'] = name; // updated global data
            $("#briefcase_breadcrumb").find("li").eq(0).empty().append(name); // breadcrumb changed
            $("#briefcase_list_button").text(" "+name+" "); // button value updated
            
            $("#briefcase-list").find("li").each(function(){ //To rename briefcase form dropdown list of briefcase
                if($(this).attr("attr-id") == id){
                    $(this).find("a").text(name);
                }
            });
            
            $("#modal-briefcase_list").find("tbody").find(".briefcase_active").each(function(){ //To rename briefcase from popup list of briefcases.
                if($(this).attr("attr-id") == id){
                    $(this).text(name);                    
                } 
            });

            $(this).notification('Briefcase renamed successfully','Briefcase'); 
            form_reset("briefcase_rename_form");
       }
   });
   
   
   $("#edit_link_form").submit(function(e){
       e.preventDefault();
       var form = $("#edit_link_form");
       form.validate();
       if(form.valid() == true){
            $("#modal-link-group-edit").modal('hide');
            var updatelink = {};
            var originalid = $("#edit_link_btn").val();
            var id = remove_string(originalid);
            var linkname = $("#editlinkname").val();
            var linkaddress  = $("#editlinkaddress").val();
            linkaddress = "http://"+linkaddress;
            updatelink['briefcase_content_id'] = id;
            updatelink['description'] = linkaddress;
            updatelink['name'] = linkname;
            
            var response = $.fn.ajax_form_submit(
            updatelink,
            '<?php echo base_url(); ?>briefcases/update_briefcase_content','false');

            update_global(response); 
            $("#finalcontainer").find("li").each(function(){
                if($(this).find("a").eq(1).attr("attr-index").trim() == originalid){
                    $(this).find("a").eq(0).attr("href",linkaddress);
                    $(this).find(".ellipsis_div").text(linkname);
                }
            });

            $(this).notification('Briefcase content updated successfully','Briefcase'); 
            form_reset("edit_link_form");
       }
   });
   
   
   $("#add_link_form").submit(function(e){
       e.preventDefault();
       var form = $("#add_link_form");
       form.validate();
       if(form.valid() == true){
             $('#modal-link-group').modal('hide');
             var linkname = $("#linkname").val();
             var linkaddress = $("#linkaddress").val();
             linkaddress = "http://"+linkaddress;             
             
            var globalid = get_global_id();
            alldata = {};           
            alldata['name'] = linkname;
            alldata['description'] = linkaddress;
            alldata['type'] = "link";
            alldata['creation_time'] = "0000-00-00 00:00:00";          
            alldata['sequence_no'] = $("#finalcontainer").find("li").length;                   
            if($("#briefcase_breadcrumb").find("li").length > 1){
                globalid = get_global_id();
                var globalidarray =  globalid.split(",");
                alldata['briefcase_id'] = globalidarray[0]; // set briefcase id   
                var newid = remove_string(globalidarray[globalidarray.length-1]);  
                alldata['parent_id'] = newid;// set parentd_id
            }else{
                alldata['parent_id'] = "";    
                alldata['briefcase_id'] = data[globalid]['briefcase_id'];
            }

            var response = $.fn.ajax_form_submit(
            "content="+JSON.stringify(alldata),
            '<?php echo base_url(); ?>briefcases/insert_briefcase_content','false');
            
            $("#modal-folder-group").modal('hide');
            update_global(response);
            response = $.parseJSON(response);
            var index=response["current_inserted_id"]; 
            create_link_view(index,linkaddress,linkname);
            form_reset("add_link_form");           
       }
   });
   
   $("#briefcase_form").submit(function(e){
       e.preventDefault();
       var form = $( "#briefcase_form" );
       form.validate();
       if(form.valid() == true){
            $('#modal-briefcase').modal('hide');
            var briefcasedata = {};
            briefcasedata['name'] = $("#briefcasename").val();
            briefcasedata['data'] = {};

            var response = $.fn.ajax_form_submit(
            "briefcase="+JSON.stringify(briefcasedata),
            '<?php echo base_url(); ?>briefcases/insert_briefcase','false');

            $(this).notification('Briefcase added successfully','Briefcase'); 
           
            response = $.parseJSON(response);
            var newbriefcasekey = "";
            $.each(response, function(key,value){ // i getting copmplete briefcase so i can update global array.
                newbriefcasekey = key;  
                return false;
            });
            data[newbriefcasekey] = response[newbriefcasekey]; 
            update_briefcase_list(newbriefcasekey,response[newbriefcasekey]['name']);
            $("#briefcase-list").append('<li class="briefcase_active" attr-id="'+newbriefcasekey+'"><a>&nbsp;'+response[newbriefcasekey]['name']+'</a></li>');
            form_reset("briefcase_form"); 
            
       }  
   });
   
   
    function alert1(img)
    {
//        $(".ui-draggable-dragging").html("<img src='<?php echo base_url(); ?>assets/images/gallery/"+img+"' style='height:100px; width:100px; display:block; z-index:1000;'>");
        $(".ui-draggable-dragging").html("<div class='file-icon file-icon-lg' style='margin:auto;' data-type=''></div>");
    }
    
    function get_global_id(){
        var globalid = "";
        $("#briefcase_breadcrumb").find("li").each(function(e){
            if($(this).attr("class").trim() == "active breadcrumb_view" || $(this).attr("class").trim() == "breadcrumb_view active" || $(this).attr("class").trim() == "breadcrumb_view breadcrumb_inactive"){
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
                distance: 1,
                start: function(event, ui) {
                    ui.item.startPos = ui.item.index();
                    
                },
                stop: function(event, ui) {
                    if(ui.item.text().trim() !== "Folder" && ui.item.text().trim() !== "Link"){
                        position_from = ui.item.startPos;
                        position_to = ui.item.index();   

                        globalid = get_global_id();
                        var globalidarray =  globalid.split(",");
                        var moveelement = {};
                        moveelement['briefcase_id'] = globalidarray[0]; // set briefcase id                        
                        moveelement['briefcase_content_id'] = remove_string(ui.item.attr("attr-index"));
                        moveelement['from'] = position_from;
                        moveelement['to'] = position_to;
                        if($("#briefcase_breadcrumb").find("li").length > 1){
                            var newid = remove_string(globalidarray[globalidarray.length-1]);
                            moveelement['parent_id'] = newid;// set parentd_id                       
                        }else{
                            moveelement['parent_id'] = null;                       
                        }

                        if(position_from != position_to){
                            var response = $.fn.ajax_form_submit(
                            moveelement,
                            '<?php echo base_url(); ?>briefcases/element_move','false'); // reposne complete briefcase value just order by sequence.
                            update_global(response);
                        }
                    }                 
                }
            });
            $( ".draggablediv" ).draggable({
                connectToSortable: "#finalcontainer",
                helper: "clone",
                revert: "invalid",
                start: function(){
                $("#dragcont").find("li").last().find('.remove_ellipsis').remove();
                }
            });          
			
            $('#finalcontainer').droppable({ drop: Drop });
            var i = 1;
            function Drop(event, ui) {
                $(ui.draggable).clone().css('position','relative').appendTo('.droppable');
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
                        ui.draggable.parents('#finalcontainer').find('.remove_ellipsis').remove();   
                        ui.draggable.parents('#finalcontainer').find('.slideleft').css({'display':''});
                        ui.draggable.parents('#finalcontainer').find('.file-img').css({'height':'73px'});
                        ui.draggable.parents('#finalcontainer').find('.file-img').addClass('text-center');
                        ui.draggable.parents('#finalcontainer').find('.file-icon').addClass('view_image');
                        ui.draggable.parents('#finalcontainer').find('.photography > .ellipsis_div').css('text-align','center');
//                        ui.draggable.parents('#finalcontainer').find('.photography').css({"transform": "translate(0px, 0px)","transition-delay": "0ms","transition-duration": "600ms, 600ms","transition-property": "all, opacity","transition-timing-function":" ease, linear"}); //hover-effect
//                        ui.draggable.parents('#finalcontainer').find('.hover-effect').css({'width':'100px','height':'100px'}); //hover-effect
                        ui.draggable.parents('#finalcontainer').find('.hover-effect').removeAttr('style'); //hover-effect
                        
                        if(i==1){ // this condition applied because drop element calling two times when an item dropped.
                                i++;
                                if(ui.draggable.children().text().trim() == "Folder"){
                                    ui.draggable.remove();
                                    form_reset("add_folder_form"); 
                                    $("#modal-folder-group").modal('show');                                     
                                    return false;
                                }else if(ui.draggable.children().text().trim() == "Link"){
                                     ui.draggable.remove();
                                     form_reset("add_link_form"); 
                                     $("#modal-link-group").modal('show');
                                     return false;                                
                                }else{
                                    alldata = {};
                                    alldata["content_id"] = ui.draggable.children().find(".file-icon").last().attr("content-id").trim();
                                    alldata['type'] = "image";
                                    alldata['creation_time'] = "0000-00-00 00:00:00";
                                    if($("#briefcase_breadcrumb").find("li").length > 1){ //This is applied to get parent id if breacrumb has some length thats mean it will have a parent id else no.
                                        globalid = get_global_id();
                                        var tempvalue = fetch_global(data,globalid);
                                        var globalidarray =  globalid.split(",");
                                        alldata['briefcase_id'] = globalidarray[0]; // set briefcase id   
                                        var newid = remove_string(globalidarray[globalidarray.length-1]);  
                                        alldata['parent_id'] = newid;// set parentd_id
                                        //var alldata = tempvalue;
                                    }else{
                                        alldata['parent_id'] = "";
                                        alldata['briefcase_id'] = data[globalid]['briefcase_id'];
                                    } //ui-draggable
                                    alldata['sequence_no'] = $("#finalcontainer").find("li").length -2;
                                    var response = $.fn.ajax_form_submit(
                                    "content="+JSON.stringify(alldata),
                                    '<?php echo base_url(); ?>briefcases/insert_briefcase_content','false');
                                    $(this).find(".file-icon").removeClass('file-icon-sm').addClass('file-icon-lg');
                                    update_global(response);
                                    response = $.parseJSON(response);
                                    var index=response["current_inserted_id"]; //current_inserted_id
                                    ui.draggable.attr("attr-index",index);
                                    ui.draggable.attr("class","");
                                    ui.draggable.attr("style","");
                                    ui.draggable.children().find("a").last().attr("attr-index",index);
                                }
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
    
    $(document).on('click', '#rename_button', function(event){
        form_reset("briefcase_rename_form"); 
        $(".briefcase_active").each(function(){
            if($(this).attr("class").length > 18){
                $("#rename_briefcase").val($(this).text().trim());
                $("#rename_briefcase_btn").val($(this).attr("attr-id")); 
            }
        });
    });
    
    $(document).on('click', '.folder_open_icon', function(event){
        form_reset("edit_folder_form"); 
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
            create_briefcase_view(dataview);
        $("#briefcase_breadcrumb").find("li:last").removeClass("active");
        $("#briefcase_breadcrumb").find("li:last").addClass("breadcrumb_inactive");
        
        $("#briefcase_breadcrumb").find("ol").append('<i class="fa fa-angle-right">&nbsp;&nbsp;</i><li class="active breadcrumb_view" attr-index="'+attrindexli+'">'+foldername+'&nbsp;&nbsp;</li>'); 
       breadcrumb_content_view();
    });
    
    $(document).on('click', '.edit_folder_icon', function(){
        $("#edit_folder_btn").val($(this).attr("attr-index"));
        $("#editfoldername").val($(this).parents(".photography").find(".ellipsis_div").text());
    });
    
    $(document).on('click', '.edit_link_icon', function(){
        form_reset("edit_link_form"); 
        $("#edit_link_btn").val($(this).attr("attr-index"));
        var linkaddress = $(this).parents(".photography").find("a").eq(0).attr("href");
        var linkname = $(this).parents(".photography").find(".ellipsis_div").text();
        linkaddress = linkaddress.substring(7);//Removed http:// 7 letter
        $("#editlinkname").val(linkname);
        $("#editlinkaddress").val(linkaddress);
    });
    
    $("#briefcase_lock").click(function(){
        var id = "";
        $(".briefcase_active").each(function(){
            if($(this).attr("class").length > 18){
                id = $(this).attr("attr-id"); 
            }
        });
        var lockbriefcase = {};
        lockbriefcase['briefcase_id'] = id;
        if($(this).text().trim() == "Lock"){
            lockbriefcase['is_lock'] = 1;
            $("#briefcase_lock").empty();
            $("#briefcase_lock").append('<i class="fa fa-lock" style="margin-left: 2px; margin-right: 8px;"></i>Unlock')
        }   
        else{
            lockbriefcase['is_lock'] = 0;
            $("#briefcase_lock").empty();
            $("#briefcase_lock").append('<i class="fa fa-lock" style="margin-left: 2px; margin-right: 8px;"></i>Lock')
        }
        
        //        var response = $.fn.ajax_form_submit(
        //        lockbriefcase,
        //        '<?php echo base_url(); ?>briefcases/lock_briefcase','false');
        
        data[id]['is_lock'] = lockbriefcase['is_lock']; 
        
        if(lockbriefcase['is_lock'] == 0)
            $(this).notification('Briefcase is unlocked successfully','Briefcase'); 
        else
            $(this).notification('Briefcase is locked successfully','Briefcase'); 
        
        
        
    });    
    
    $(document).on('click', '#delete_briefcase_icon', function(){
        $(".briefcase_active").each(function(){
            if($(this).attr("class").length > 18){
                $("#delete_briefcase_submit").val($(this).attr("attr-id")); 
            }
        });
        
    });
    $(document).on('click', '#delete_briefcase_submit', function(){
        var deleteid = {};
        var id = $(this).val();
        deleteid['briefcase_id'] = id;
        delete data[id];
        
        var response = $.fn.ajax_form_submit(
        deleteid,
        '<?php echo base_url(); ?>briefcases/delete_briefcase','false');
        
        $("#briefcase-list").find("li").each(function(){ //To delete briefcase form dropdown list of briefcase
            if($(this).attr("attr-id") == id){
                $(this).remove(); 
            }
        });
        
        $("#modal-briefcase_list").find("tbody").find(".briefcase_active").each(function(){ //To delete briefcase from popup list of briefcases.
           if($(this).attr("attr-id") == id){
                $(this).parents("tr").remove();  
           } 
        });
        //**********To set serial no. in popup briefcase list*********
        var counter = 1;
        $("#modal-briefcase_list").find("tbody").find("tr").each(function(){
           $(this).find("td:first").text(counter);
           counter = counter+1;
        });

        default_view_briefcase(); 
        $("#briefcase_list_button").text(" "+"Select briefcase"+" ");  
        $(this).notification('Briefcase deleted successfully','Briefcase'); 
        
        
    });
    
    $(document).on('click', '#duplicate_briefcase', function(){
        form_reset("duplicate_briefcase_form");
        $("#briefcase-list").find("li").each(function(){
            if($(this).attr("class").length > 18){
                $("#add_duplicate_briefcase").val($(this).attr("attr-id")); 
            }
        });
    });
   
    $(document).on('click', '.delete_icon', function(){
        $("#delete_record_submit").val($(this).attr("attr-index"));
    }); 
    
    $(document).on('click', '#delete_record_submit', function(){
        var deleteid = {};
        var originalid = $(this).val()      
        var id = remove_string(originalid);      
        deleteid['briefcase_content_id'] = id;
        var response = $.fn.ajax_form_submit(
        deleteid,
        '<?php echo base_url(); ?>briefcases/delete_briefcase_content','false');
       
        update_global(response);
        $("#finalcontainer").find("li").each(function(){
//            if($(this).find("a").attr("attr-index").trim() == originalid){
            if($(this).find("a").eq(1).attr("attr-index").trim() == originalid){
                $(this).remove();
            }
        });
        $(this).notification('Briefcase content deleted successfully','Briefcase'); 
    });
    
    $(document).on('click', '.breadcrumb_view', function(event){
        var folderindex = $(this).attr("attr-index");        
        $("#finalcontainer").empty();
        var tempvalue = fetch_global(data,folderindex);
        var dataview = tempvalue['data'];
        if(typeof(dataview) != "undefined")
            create_briefcase_view(dataview);
        $(this).nextAll().remove();
       
    });


    $(document).on('click','#add_briefacse_reset_btn',function(){
       form_reset("briefcase_form"); 
    }); 
    
    $(document).on('click','#set_user_group_btn',function(){
       form_reset("manage_access_form"); 
    }); 
    
    $(document).on('click','#create_folder_icon',function(){
       form_reset("add_folder_form"); 
    });
    
    $(document).on('click','#create_link_icon',function(){
       form_reset("add_link_form"); 
    });
    
    $(document).on('click','.briefcase_active',function(){
        $("#modal-briefcase_list").modal('hide');
        var label_text = $(this).text().trim();
        $("#briefcase_list_button").empty();
        $("#briefcase_list_button").text(" "+label_text+" ");  
        if(label_text == "Select briefcase"){
            default_view_briefcase();   
        }
        else{
            var briefcaseid = $(this).attr("attr-id");
            if(data[briefcaseid]['is_lock'] == 0){
                $("#briefcase_lock").empty();
                $("#briefcase_lock").append('<i class="fa fa-lock" style="margin-left: 2px; margin-right: 8px;"></i>Lock') ;                            
            }
            else{
                $("#briefcase_lock").empty();
                $("#briefcase_lock").append('<i class="fa fa-lock" style="margin-left: 2px; margin-right: 8px;"></i>Unlock') ;                       
            }
            $("#finalcontainer").empty();
//            $("#add_briefcase_item").css("display","inline-flex"); //display: inline-flex; display: -webkit-flex;  display: -webkit-inline-flex; display: -ms-inline-flexbox; flex-direction: row
//            $("#add_briefcase_item").css({"display":" -webkit-inline-flex","display":"-ms-inline-flexbox","display":"inline-flex"}); //display: inline-flex; display: -webkit-flex;  display: -webkit-inline-flex; display: -ms-inline-flexbox; flex-direction: row
            $("#add_briefcase_item").css({/*"display":"block",*/"flex-direction": "row"}).show(); //display: inline-flex; display: -webkit-flex;  display: -webkit-inline-flex; display: -ms-inline-flexbox; flex-direction: row
            $("#home").show();
            $("#home_no_briefcase").hide();
            $("#briefcase_breadcrumb").show();
            $("#briefcase_breadcrumb").find("ol").empty();
            $("#briefcase_edit_property").attr("disabled",false);
            $("#set_user_group_btn").attr("disabled",false);
            $("#briefcase_breadcrumb").find("ol").append('<li class="active breadcrumb_view" attr-index="'+briefcaseid+'">'+$(this).text().trim()+'&nbsp;&nbsp;</li>'); 
            var dataview = data[briefcaseid]['data'];
            //(dataview);
            create_briefcase_view(dataview);
        }
    }); 
     
    function remove_string(id){
        var id_array = id.split("_");
        return id_array[2];
    } 
    function form_reset(formid){
        $('#'+formid)[0].reset();   
        $('#'+formid).find(".state-success").removeClass("state-success");  
        $('#'+formid).find(".state-error").removeClass("state-error");  
        $('#'+formid).find("em").remove();  
    }
    
    function breadcrumb_content_view(){

        if($("#briefcase_breadcrumb").find("li:visible").length > 5){              
            $("#briefcase_breadcrumb").find("li:visible").eq(1).hide();//hide text
            $("#briefcase_breadcrumb").find(".fa-angle-right:visible").eq(1).hide();// hide arrow symbol
            if($("#briefcase_breadcrumb").find(".dotted_li").length < 1){
                $("#briefcase_breadcrumb").find(".fa-angle-right").eq(1).before('<span class="dotted_li">.........&nbsp;&nbsp;</span>');
            }
        }else{
            if($("#briefcase_breadcrumb").find("li").length < 6){
                $("#briefcase_breadcrumb").find(".dotted_li").remove();
                $("#briefcase_breadcrumb").find("li").show();//hide text            
                $("#briefcase_breadcrumb").find(".fa-angle-right").show();//hide text            
            }else{
                var view_li = $("#briefcase_breadcrumb").find(".dotted_li").nextAll("li:visible").length;
                var loop = 1;
                for(loop=view_li; loop<4;loop++){
                    var li_hidden = $("#briefcase_breadcrumb").find("li:hidden").length;
                    $("#briefcase_breadcrumb").find("li:hidden").eq(li_hidden-1).show();//hide text
                    $("#briefcase_breadcrumb").find(".fa-angle-right:hidden").eq(li_hidden-1).show();// hide arrow symbol
                }
            }
        }
          $("#briefcase_breadcrumb").find("li:visible").last().removeClass("breadcrumb_inactive");//hide text
          $("#briefcase_breadcrumb").find("li:visible").last().addClass("active");//hide text
    }
    
    $(document).on('click','.breadcrumb_inactive',function(){
      breadcrumb_content_view();
    });
    
    function update_briefcase_list(id,name){
        var countof_tr = $("#modal-briefcase_list").find("tbody").find("tr").length;
        $("#modal-briefcase_list").find("tbody").append('<tr><td style=" width: 15%; text-align: center;">'+(countof_tr+1)+'</td><td class="mbm briefcase_active" attr-id="'+id+'" title="'+name+'" style=" width: 80%; cursor: pointer; font-size: 18px; text-align: center;">'+name+'</td></tr>');
    }
    function update_global(response){
        response = $.parseJSON(response);
        var newbriefcasekey = "";
        $.each(response, function(key,value){ // i getting copmplete briefcase so i can update global array.
            newbriefcasekey = key;  
            return false;
        });
        data[newbriefcasekey] = response[newbriefcasekey]; 
        //console.log(data);
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
    
    function default_view_briefcase(){
        $("#home").hide();
        $("#add_briefcase_item").hide();/*css("display","none")*/;
        $("#home_no_briefcase").show();
        $("#briefcase_breadcrumb").hide();
        $("#briefcase_edit_property").attr("disabled",true);
        $("#set_user_group_btn").attr("disabled",true);
    }
    function create_briefcase_view(dataview){
        $.each(dataview, function(index,obj){
            if(obj['type']== "link"){
                create_link_view(index,obj['description'],obj['name']);
            }
            else if(obj['type']== "folder"){
                create_folder_view(index,obj['name'])                        
            }
            else{
                var imagetype = "";
                var namearray  =  obj['name'].split(".");       
                    var imagetype = namearray[namearray.length - 1];
                create_image_view(obj['name'],obj['filepath'],obj['type'],index,imagetype)
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
    
    function create_image_view(name,src,type,index,imagetype){
        $("#finalcontainer").append($("#hidden_image").clone());
        $("#finalcontainer li:last").removeAttr("id");
        $("#finalcontainer li:last").removeAttr("style"); 
        $("#finalcontainer li:last").attr("attr-index",index);
        //*******
        if(type == 'image'){
        $("#finalcontainer li:last").find("a").eq(0).attr("data-target",'#modal-image-content');
        $("#finalcontainer li:last").find("a").eq(0).attr("attr-path",'<?php echo base_url(); ?>assets/upload/'+src.trim());
        $("#finalcontainer li:last").find("a").eq(0).attr("attr-name",name);
        $("#finalcontainer li:last").find("a").eq(0).removeAttr("href");
        $("#finalcontainer li:last").find("a").eq(0).addClass("view_image_icon");
//        $("#finalcontainer li:last").find("a").eq(0).removeAttr("style");
        $("#finalcontainer li:last").find("a").eq(1).attr("attr-index",index);
        $("#finalcontainer li:last").find(".view_image").attr("data-type",imagetype);
        $("#finalcontainer li:last").find(".ellipsis_div").text(name);  
            
        } else if(type == 'audio'){
          $("#finalcontainer li:last").find("a").eq(0).attr("data-target",'#modal-audio-content');  
          $("#finalcontainer li:last").find("a").eq(0).attr("attr-path",'<?php echo base_url(); ?>assets/upload/'+src.trim());
          $("#finalcontainer li:last").find("a").eq(0).attr("attr-name",name);
          $("#finalcontainer li:last").find("a").eq(0).removeAttr("href");
          $("#finalcontainer li:last").find("a").eq(0).addClass("view_audio_icon");
          $("#finalcontainer li:last").find("a").eq(1).attr("attr-index",index);
          $("#finalcontainer li:last").find(".view_image").attr("data-type",imagetype);
          $("#finalcontainer li:last").find(".ellipsis_div").text(name);  
        } else if(type == 'video'){
             $("#finalcontainer li:last").find("a").eq(0).attr("data-target",'#modal-video-content');
             $("#finalcontainer li:last").find("a").eq(0).attr("attr-path",'<?php echo base_url(); ?>assets/upload/'+src.trim());
             $("#finalcontainer li:last").find("a").eq(0).attr("attr-name",name);
             $("#finalcontainer li:last").find("a").eq(0).removeAttr("href");
             $("#finalcontainer li:last").find("a").eq(0).addClass("view_video_icon");
             $("#finalcontainer li:last").find("a").eq(1).attr("attr-index",index);
             $("#finalcontainer li:last").find(".view_image").attr("data-type",imagetype);
             $("#finalcontainer li:last").find(".ellipsis_div").text(name);  
        } else {
             $("#finalcontainer li:last").find("a").eq(0).attr("href","<?php echo base_url(); ?>assets/upload/"+src.trim());
        $("#finalcontainer li:last").find("a").eq(1).attr("attr-index",index);
        $("#finalcontainer li:last").find(".view_image").attr("data-type",imagetype);
        $("#finalcontainer li:last").find(".ellipsis_div").text(name);     
        }
        //******
//        $("#finalcontainer li:last").find("a").eq(0).attr("href","<?php echo base_url(); ?>assets/upload/"+src.trim());
//        $("#finalcontainer li:last").find("a").eq(1).attr("attr-index",index);
//         $("#finalcontainer li:last").find(".image_address").attr("content-id",id);
//        $("#finalcontainer li:last").find(".view_image").attr("src","<?php echo base_url(); ?>/assets/file/"+imagetype);
//        $("#finalcontainer li:last").find(".view_image").attr("data-type",imagetype);
//        $("#finalcontainer li:last").find(".ellipsis_div").text(name);        
    }
    
    $(document).ready(function(){ 
        $(".select2-multi-value").select2();
        $('.select2-size').select2({
            placeholder: "Select an option",
            allowClear: true
        });
    });
    

    $(document).on('click','.briefcase_active',function(){
        $('.briefcase_active').removeClass('active');
        $(this).addClass('active');
            
    })
    //***************add new briefcase*********************              
    $('#add_briefcase').click(function(){
       // (function (e){return typeof x===i||e&&x.event.triggered===e.type?t:x.event.dispatch.apply(f.elem,arguments)})
       // return false;
       
        var briefcasedata = {};
        briefcasedata['name'] = $("#briefcasename").val();
        briefcasedata['data'] = {};
                
        var response = $.fn.ajax_form_submit(
        "briefcase="+JSON.stringify(briefcasedata),
        '<?php echo base_url(); ?>briefcases/insert_briefcase','false');
        
        $(this).notification('Briefcase added successfully','Briefcase'); 
        $('#modal-briefcase').modal('hide');
        response = $.parseJSON(response);
        var newbriefcasekey = "";
        $.each(response, function(key,value){ // i getting copmplete briefcase so i can update global array.
            newbriefcasekey = key;  
            return false;
        });
        data[newbriefcasekey] = response[newbriefcasekey]; 
                
                
        $("#briefcase-list").append('<li class="briefcase_active" attr-id="'+newbriefcasekey+'"><a>&nbsp;'+response[newbriefcasekey]['name']+'</a></li>');
        return false;        
    });  
    $('#add_user_form').validate();
    
    $(document).on('click','#set_user_group_btn',function(){
        var id = "";
        $(".briefcase_active").each(function(){
            if($(this).attr("class").length > 18){
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
    $('#modal-image-content').on('hidden.bs.modal', function (e) {
        set_timer_image();
    });
    
    function set_timer_image(){
        $("#modal-image-path").attr("src","<?php echo base_url()."assets/images/icons/loader1.GIF"; ?>");       
        $("#modal-image-path:hidden").attr("src","<?php echo base_url()."assets/images/icons/loader1.GIF"; ?>");       
    }
            
//    $(document).on('click','#submit_group_user_btn',function(){
//        
//        var usergroup = {};
//        var id = "";
//        $(".briefcase_active").each(function(){
//            if($(this).attr("class").length > 15){
//                id = $(this).attr("attr-id"); 
//            }
//        });
//        var groupvalue = "";
//        var group = $("#selected_groups").val();
//        $.each(group, function(index,value){
//                groupvalue = groupvalue + value + ",";
//        });
//        usergroup['groups'] = groupvalue.substring(0, groupvalue.length - 1);
//        
//        var uservalue = "";
//        var user = $("#selected_users").val();
//        $.each(user, function(index,value){
//                uservalue = uservalue + value + ",";
//        });
//        usergroup['users'] = uservalue.substring(0, uservalue.length - 1);
//        usergroup['briefcase_id'] = id;
//        
//        var response = $.fn.ajax_form_submit(
//        usergroup,
//        '<?php echo base_url(); ?>briefcases/rename_briefcase','false');
//        
//        data[id]['groups'] =   usergroup['groups']  // updated global data
//        data[id]['users'] = usergroup['users']; // updated global data
//        
//        $(this).notification('Users and groups updated successfully','Briefcase');         
//    });
           
    //*****************notification*************************
//    
            
        
</script>
