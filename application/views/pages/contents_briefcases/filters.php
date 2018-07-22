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
//die();

?>
<div id="wrapper">

    <!--BEGIN PAGE WRAPPER-->
    <div id="page-wrapper">
        <!--BEGIN TITLE & BREADCRUMB PAGE-->
        <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
            <div class="page-header pull-left">
                <div class="page-title">Contents & Briefcases</div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-left">
                <li><i class="fa fa-camera-retro"></i>&nbsp;<a style=" cursor: pointer;">Albums</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                <li class="hidden"><a style=" cursor: pointer;"><?php echo $detail['data']['filter_detail']['name']; ?></a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                <li class="active"><?php echo $detail['data']['filter_detail']['name']; ?></li>
                <div class="clearfix"></div>
            </ol>

            <div class="pull-right mbm mtm" style="display: inline-block;">
                <button type="button" data-toggle="modal" data-target="#modal-filter-album" class="btn btn-grey  edit_album" value="<?php echo $detail['data']['filter_detail']['content_id']; ?>">
                    Edit Album
                </button>
                <input type="hidden"  class="album_filter_json" value='<?php echo json_encode($detail['data']['filter_detail'], JSON_HEX_APOS); ?>'>      
                <a data-toggle="modal" data-target="#modal-delete-album" class="btn btn-grey remove_album_filter">Remove Album</a>
                <a href="<?php echo base_url(); ?>content_briefcases/briefcase" title="Add briefcase" class=" btn btn-grey">Add briefcase</a>                
            </div>
        </div>
        <!--END TITLE & BREADCRUMB PAGE-->
        <!--BEGIN CONTENT-->
        <div class="page-content">            
            
            <!--        Model to delete tag    -->
            <div id="modal-delete-tag" tabindex="-1" data-backdrop="static" data-keyboard="false" class="modal fade" style=" z-index: 2000;">
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
                <!--        Model to delete album    -->
                <div id="modal-delete-album" tabindex="-1" data-backdrop="static" data-keyboard="false" class="modal fade" style="">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <p>Would you like to remove this selected album?</p>
                            </div>
                            <div class="modal-footer">
                                <a href="<?php echo base_url(); ?>content_briefcases/delete_album_filter/<?php echo $detail['data']['filter_detail']['content_id']; ?>/album" id="delete_album_filter_popup"  class="btn btn-grey">OK</a>
                                <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
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
                                <h4 class="modal-title weight ed_name"><span data-name="filename"></span></h4>
                            </div>
                            <div class="panel-body pan" >
                                <form action="#" id="update_form" class="horizontal-form update_frm" method="POST">
                                    <div class="form-body pal col-md-10" style="float: none;margin: auto" >
                                        <div class=" mbl" style="display: table">
                                            <span style="display: table-cell">
                                                <a class="image_address" href="<?php echo base_url(); ?>assets/vendors/jplist/html/img/thumbs/winter-sun.jpg" target="_blank">
                                                    <img data-title="Image winter-sun" data-lightbox="image-winter-sun" class="view_image" style="border: 5px solid #fff; box-shadow: 0 2px 3px rgba(0,0,0,0.25);" src="<?php echo base_url(); ?>assets/vendors/jplist/html/img/thumbs/winter-sun.jpg">
                                                </a>
                                            </span>
                                            <span class="" style="display: table-cell;vertical-align: bottom;padding-left: 40px;">
                                                <input  name="name" class="form-control" value="" type="text" style="width: 560px;">
                                                <input type="hidden" class="old_filename"  name="old_filename" value="">
                                            </span>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group ">
                                                    <div class="col-md-2">
                                                        <label for="inputFirstName" class="control-label weight">Tags
                                                        </label>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <select data-style="btn-white" multiple="multiple" name="content_tags[]" data-selected-text-format="values" class="selectpicker show-tick form-control" id="content_tags_select">
                                                            <option class="hide"></option>
                                                            <?php foreach ($tag as $tag_list) { ?>                                            
                                                                <option value="<?php echo $tag_list['tag_id']; ?>"><?php echo $tag_list['name']; ?></option>
                                                            <?php } ?>
                                                        </select>     
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 hide">
                                                <div class="form-group">
                                                    <label for="inputLastName" class="control-label weight">Used in briefcases
                                                    </label>
                                                    <div class=""><i data-hover="tooltip" data-original-title="Last Name is empty" class=" tooltips"></i>
                                                        <span data-name="briefcases"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row hide">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label for="inputEmail" class="control-label weight">Security</label>
                                                    </div>                                                   
                                                    <div class="col-md-6">
                                                        <select data-style="btn-white" multiple="multiple" name="security[]" data-selected-text-format="values" class="selectpicker show-tick form-control">
                                                            <option class="">is_shared</option>
                                                            <option class="">is_confidential</option>
                                                            <option class="">is_annotated</option>
                                                        </select>     
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="selGender" class="control-label weight">Use Optimized file</label>
                                                    <div class="form-group">
                                                        <div data-on-label="Yes"  data-off-label="No" class="make-switch mts">
                                                            <input type="checkbox" checked="checked" class="switch" />
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="inputBirthday" class="control-label weight">Last Update : </label><span style="margin-left: 70px;"><span data-name="last_update"></span></span><br/><br/>
                                                    <label for="inputPhone" class="control-label weight">Uploaded at : </label><span style="margin-left: 65px;"><span data-name="creation_time"></span></span> </div>
                                            </div>
                                            <div class="col-md-4 hide">
                                                <div class="form-group">
                                                    <label for="inputPhone" class="control-label weight">Expires</label><br/>
                                                    <div class=""> <div class="">
                                                            <div class="" style="width: 203px;">
                                                                <div class="input-group datetimepicker-disable-time date">
                                                                    <input type="text" data-format="YYYY-MM-DD hh:mm:ss" name="expiration_date" class="form-control" /><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> </div>
                                            </div>
                                        </div>

                                        <div class="">
                                            <label for="inputStreet" class="control-label weight">Description
                                            </label>
                                            <textarea  name="description" type="text" placeholder="" rows="2" style="width: 96%;resize: none" class="form-control" ></textarea>
                                        </div>

                                        <div class="modal-footer" style="border: medium none; width: 729px; padding-right: 0px;">
                                            <input type="hidden" name="content_id" value="">
                                            <button class="btn btn-grey update_content"  data-dismiss="modal" type="submit">Update</button>&nbsp;
                                            <button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> 
                <!--END MODAL Content PORTLET-->
            <!--        Model to delete content    -->
            <div id="modal-delete-content" tabindex="-1" data-backdrop="static" data-keyboard="false" class="modal fade" style="">
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
                
                <!--BEGIN MODAL filter-->
                <div id="modal-filter-album" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                <h4 class="modal-title">Edit Album</h4>
                            </div>
                            <form id="album_filter_form" class="form-validate">
                                <div class="modal-body">
                                    <table class="table table-striped table-hover">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="filteralbumname" class="col-md-3 control-label">Name<span class='require'>*</span>
                                                        </label>

                                                        <div class="col-md-9">
                                                            <input id="filteralbumname" type="text" name="name" class="form-control required" />                                                        </div>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="" class="col-md-3 control-label">Tags<span class='require'>*</span></label>
                                                        <div class="col-md-9">
                                                            <select data-style="btn-white" multiple="multiple" name="tag_names[]" data-selected-text-format="values" class="selectpicker show-tick form-control required" id="edit_album_select">
                                                                <option class="hide"></option>
                                                                <?php foreach ($tag as $tag_list) { ?>                                            
                                                                    <option value="<?php echo $tag_list['tag_id']; ?>"><?php echo $tag_list['name']; ?></option>
                                                                <?php } ?>
                                                            </select>                                                       
                                                        </div>
                                                        <input type="hidden" id="type" name="type" value="album">
                                                        <input type="hidden" id="type" name="content_id" value="">
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr class="album_des hide">
                                                <td>
                                                    <div class="form-group">
                                                        <label for="album_description" class="col-md-3 control-label">Description</label>
                                                        <div class="col-md-9">
                                                            <textarea id="description" name="description" rows="3" class="form-control"></textarea>                                                        </div>
                                                        </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="add_album_filter btn btn-grey">Create</button>
                                    <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--END MODAL filter-->
                <!--BEGIN MODAL tag form-->
                <div id="modal-tagform" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form class="form-horizontal form-validate" id="tag_form" >
                                <div class="modal-header">
                                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                    <h4 class="modal-title edit_tag_title">Create new tag</h4>
                                </div>
                            <div class="modal-body">
                                <table class="table table-striped table-hover">
                                    <tbody>
                                        <tr id="showtag" class="hide">
                                            <td>
                                                <ul id="tag_list" class="list-group chat-scroller" style="height:300px;">
                                                        <!--dynamic tag li-->
                                                        <li class="list-group-item dynamic_tag_li hide"><span class="name">Cras justo odio</span>
                                                            <span class=" pull-right">
                                                                <button type="button" class="btn btn-grey btn-xs edit_tag" value=""><i class="fa fa-edit"></i>
                                                                </button>
                                                                <input type="hidden" class="tag_json" value=''>      
                                                                <button href="#modal-delete-tag" data-toggle="modal" class="btn btn-danger btn-xs remove_tag" value="" type="button"><i class="fa fa-trash-o"></i>
                                                                </button>
                                                            </span>
                                                        </li>
                                                        <!--dynamic tag li-->
                                                        <?php foreach ($tag as $tag_item) { ?>
                                                            <li class="list-group-item"><span class="name"><?php echo $tag_item['name']; ?></span>
                                                                <span class=" pull-right">
                                                                    <button type="button" class="btn btn-grey btn-xs edit_tag" value="<?php echo $tag_item['tag_id']; ?>"><i class="fa fa-edit"></i>
                                                                    </button>
                                                                    <input type="hidden"  class="tag_json" value='<?php echo json_encode($tag_item, JSON_HEX_APOS); ?>'>      
                                                                    <button href="#modal-delete-tag" data-toggle="modal" class="btn btn-danger btn-xs remove_tag" value="<?php echo $tag_item['tag_id']; ?>" type="button"><i class="fa fa-trash-o"></i>
                                                                    </button>
                                                                </span>
                                                            </li>
                                                        <?php } ?>
                                                    </ul>                                               
                                            </td>

                                        </tr>
                                        <tr>
                                            <td style=" border-top: none;">
                                               
                                                    <div class="form-group">
                                                        <label for="tagname" class="col-md-3 control-label">Name<span class='require'>*</span>
                                                        </label>

                                                        <div class="col-md-9">
                                                            <input id="tag_name_filed" type="text" name="name" class="form-control required" />
                                                        </div>
                                                    </div>
                                                    <input type="hidden" id="tag_id" name="tag_id" value="">
                                                
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="add_tag btn btn-grey">Create</button>
                                <button type="button" class="btn btn-default manage_tag">Manage Tags</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
                <!--END MODAL tag form-->

                <!--comment box-->
                <div id="modal-comments" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                <h4 class="modal-title">Comments</h4>
                            </div>
                            <div class="modal-body">
                                <div class="chat-scroller">
                                    <ul class="chats">
                                        <li class="in">
                                            <img src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/48.jpg" class="avatar img-responsive" />
                                            <div class="message"><span class="chat-arrow"></span><a href="#" class="chat-name">Admin</a>&nbsp;<span class="chat-datetime">at July 06, 2014 17:06</span><span class="chat-body">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</span>
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
                <!--comment box-->

              
                <?php
//                echo'<pre>';
//                print_r($detail['data']);
//                echo '</pre>';
                ?>

                <!--page contents-->
                <div class="col-lg-12">

                    <div class="panel">
                        <div class="panel-body">
                            <div id="grid-layout-ul-li" class="box jplist">
                                <div class="jplist-ios-button"><i class="fa fa-sort"></i>jPList Actions</div>
                                <div class="jplist-panel box panel-top">
                                    <div style="display: inline-block;float: left">
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

                                        <div class="text-filter-box">
                                            <div class="input-group"><span class="input-group-addon"><i class="fa fa-search"></i></span>
                                                <input data-path=".title" type="text" value="" placeholder="Filter by Title" data-control-type="textbox" data-control-name="title-filter" data-control-action="filter" class="form-control" style="padding-left: 0px; width: 232px;" />
                                            </div>
                                        </div>                                         
                                    </div>
                                    <div data-control-type="views" data-control-name="views" data-control-action="views" data-default="jplist-grid-view" class="jplist-views" style="display: inline-block;float: right">
                                            <button type="button" data-type="jplist-list-view" title="List view" class="jplist-view jplist-list-view btn btn-grey"><i class="fa fa-th-list" style="color:white;"></i></button>
                                            <button type="button" data-type="jplist-grid-view" title="Grid view" class="jplist-view jplist-grid-view btn btn-grey"><i class="fa fa-th" style="color:white;"></i></button>
                                            <button type="button" data-control-type="reset" title="Refresh" data-control-name="reset" data-control-action="reset" class="jplist-reset-btn btn btn-grey"><i class="fa fa-refresh"></i></button>
                                    </div>
                                    <div class="" style="float: left;display: inline-block">
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

                                        <div class="col-md-3" style="padding-left: 9px; width: 292px; padding-right: 0px;">
                                            <div data-control-type="drop-down" data-control-name="category-filter" data-control-action="filter" class="jplist-drop-down form-control" style="padding-left: 0px; width: 272px;">
                                                <ul class="dropdown-menu" style="width: 100%;">
                                                    <li><span data-path="default">Property</span></li>
                                                    <li><span data-path=".rated">Rated</span></li>
                                                    <li><span data-path=".commented">Commented</span></li>
                                                    <li><span data-path=".no_views">No Views</span></li>
                                                    <li><span data-path=".confidential"> Confidential</span></li>
                                                    <li><span data-path=".not_shared">Cannot be shared or downloaded</span></li>
                                                    <li><span data-path=".expired">Expired</span></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="col-md-3" style="padding-left: 0px; width: 177px; padding-right: 0px;">
                                            <div data-control-type="drop-down" data-control-name="category-filter" data-control-action="filter" class="jplist-drop-down form-control" style="padding-left: 0px;">
                                                <ul class="dropdown-menu " style=" max-height: 150px; overflow-y: scroll; width: 100%">
                                                    <li><span data-path="default">Tags</span>
                                                    </li>
                                                    <?php foreach ($tag as $tag_list) { ?>                                            
                                                        <li style=" width: 158px; overflow: hidden;"> <span data-path=".<?php echo $tag_list['name']; ?>"></span> <?php echo $tag_list['name']; ?></li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>                                   
                                </div>

                                <ul class="box text-shadow ul-li-list content_list">
                                    <!--dynamic li-->
                                    <li class="list-item hide">
                                        <div class="list-box">
                                            <div class="img">
                                                <img id="img" src="" alt="" title="" class="view_lib" data-toggle="modal" data-target="#modal-items" />
                                                <input type="hidden" class="content_json" value=''>
                                                <div class="quick-menu btn-group menu-right">
                                                    <a href="#modal-comments" title="Comments" class="btn btn-default btn-xs  ellipsis_div"  data-toggle="modal" >
                                                        <div class="fa fa-comment"></div><br/><span class="comments_count"></span>
                                                    </a>
                                                    <a href="javascript:void(0);" title="Views" class="btn btn-default btn-xs  ellipsis_div">
                                                        <div class="fa fa-eye"></div><br/><span class="views"></span>
                                                    </a>
                                                    <a href="" title="Move to trash" class="del_content btn-default btn btn-default btn-xs  ellipsis_div" value="">
                                                        <i class="fa fa-trash-o trash_size"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="block">
                                                <p class="title ellipsis_div filename"></p>
                                                <p class="date ellipsis_div time_to_upload"></p>
                                                <div class="tag">
                                                    <span class="badge badge-playground"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <?php foreach ($detail['data']['content'] as $content) { ?>
                                        <li class="list-item">
                                            <?php
                                            $type = $content['type'];
                                            $mimtype = split("/.", $type);
                                            $m_type = $mimtype[0];
                                            ?>
                                            <?php
                                            $fil_name = explode('.', $content['name']);
                                            $last_element = end($fil_name);
                                            $file_name = strtoupper($last_element);
                                            $absolutePath = dirname($_SERVER['SCRIPT_FILENAME']) . "/";
                                            $thumbnail = base_url() . 'assets/file/' . $file_name . '.png';
                                            if (!file_exists($absolutePath . 'assets/file/' . $file_name . '.png'))
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
                                            ?> list-box">
                                                <div class="img <?php echo $m_type . " " . implode(" ", $content['tag_names']); ?> ">
                                                    <img id="img" src="<?php echo $thumbnail; ?>" alt="" title="" class="<?php echo $content['content_id'] . " " . implode(' ', $content['tag_names']); ?> view_lib" data-toggle="modal" data-target="#modal-items" />
                                                    <input type="hidden" class="content_json" value='<?php echo json_encode($content, JSON_HEX_APOS); ?>'>
                                                    <div class="quick-menu btn-group menu-right">
                                                        <a href="#modal-comments" title="Comments" class="btn btn-default btn-xs  ellipsis_div"  data-toggle="modal" >
                                                            <div class="fa fa-comment"></div><br/><?php echo $content['comments_count']; ?>
                                                        </a>
                                                        <a title="Views" class="btn btn-default btn-xs  ellipsis_div">
                                                            <div class="fa fa-eye"></div><br/><?php echo $content['views']; ?>
                                                        </a>
                                                        <a href="#modal-delete-content"  data-toggle="modal" title="Move to trash" class="btn-default btn btn-default btn-xs del_content  ellipsis_div" value="<?php echo $content['content_id']; ?>">
                                                            <i class="fa fa-trash-o trash_size"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <!--<data></data>-->
                                                <div class="block">
                                                    <p class="title ellipsis_div"><?php echo $content['name']; ?></p>
                                                    <p class="date ellipsis_div"><?php echo $content['creation_time']; ?></p>

                                                    <div class="tag">
                                                        <?php foreach ($content['tag_names'] as $contentkey => $content_tag) { ?>
                                                            <span class="badge badge-playground" tag-id="<?php echo $contentkey; ?>"><?php echo $content_tag; ?></span>
                                                        <?php } ?>
                                                    </div>
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
    $(document).ready(function(){  
        //************* lIBRARY EDIT and VIEW ***************//
        $(document).on('click','.view_lib',function(e){  e.preventDefault();
                var base_url = "<?php echo base_url() ?>";
                var view = $(this).parent().find('input').val();
                object = JSON.parse(view);                
                var img_type= object.name.split('.');
                
                if(img_type.length == 1)
                    image = "DEFAULT";
                else
                    var image = img_type[1].toUpperCase();
        
        
                $('.old_filename').val(object.name);
                var alldata = image+'.png';
                var response = $.fn.ajax_form_submit(
                "filelink="+(alldata),
                '<?php echo base_url(); ?>content_briefcases/check_file','false');
                response = $.parseJSON(response);  
                if(response['status']== "Success")
                    $('#update_form').find('.view_image').attr('src',base_url+'assets/file/'+image+'.png');
                else
                    $('#update_form').find('.view_image').attr('src',base_url+'assets/file/DEFAULT.png');
                
                $.each(object,function(key, value){
                    if(key == "name"){ //This code is applied to show only image name not extension.
                        var valuearray = value.split('.');
                        if(valuearray.length > 1)
                            value = valuearray[0];
                    }
                    $('#update_form').find('.image_address').attr('href',base_url+'assets/upload/'+object.filepath);
                   $("[data-name='"+key+"']").text(value);
                    $("[name='"+key+"']").val(value);
                    if(key == 'tag_names'){ //tag_names
                        $('#content_tags_select').selectpicker('deselectAll');  // reset to none selection
                        $('#content_tags_select').selectpicker('refresh');
                        if(value == null || value == ""){
                            return false;
                        }
                        else{
                                var strWard = '[';
                                $.each(value, function(tagid, tagvalue){
                                    strWard += '"' + tagid + '",';
                                })
                                strWard = strWard.slice(0, -1); //remove last comma
                                strWard += ']';
                                $('#content_tags_select').selectpicker('val', JSON.parse(strWard)); 
                                $('#content_tags_select').selectpicker('refresh');
                        }
                    }
                });
            });       
   
   //***************add new tag*********************   
    document.getElementById("tag_name_filed").addEventListener( "keydown", function( e ) {
        var keyCode = e.keyCode || e.which;
        if ( keyCode === 13 ) {
            save_tag();
        }
    }, false);
            
    $("#tag_form").submit(function(e){
        e.preventDefault();
        var form = $( "#tag_form" );
        form.validate();
        if(form.valid() == true){
            save_tag();            
        }  
    });
    
    $("#album_filter_form").submit(function(e){
        e.preventDefault();
        var form = $("#album_filter_form");
        form.validate();
        if(form.valid() == true){
            alert("submit");
            return false;
        }  
    });
   
   function save_tag(){
       $('#modal-tagform').modal('hide');
       //console.log($("#tag_form").serialize());
            var url = "<?php echo base_url() ?>content_briefcases/insert_tag"; // the script where you handle the form input.
            var tag =  $.ajax({
                type: "POST",
                url: url,
                data: $("#tag_form").serialize(), // serializes the form's elements.
                async: false
            }).responseText; //console.log(tag);
            var json = $.parseJSON(tag); // console.log(json);//return false;
            if(json.action != 'updated'){
                $('#tag_list li:first').clone().appendTo('#tag_list').addClass('tag_'+json.tag_id).removeClass('hide dynamic_tag_li');
                //  $('.tag_select option:first').clone().appendTo('.tag_select').removeClass('hide');
            }
            
            $('#tag_list .tag_'+json.tag_id).find('.tag_json').val(tag); 
            $('#tag_list .tag_'+json.tag_id).find('.name').text(json.name);
            $('#tag_list .tag_'+json.tag_id).find('.edit_tag').val(json.tag_id);
            $('#tag_list .tag_'+json.tag_id).find('.remove_tag').val(json.tag_id);
            $('#tag_form')[0].reset();
            $("#modal-tagform").find(".edit_tag_title").text("Create new tag");
            $("#modal-tagform").find(".add_tag").text("Create");
            form_reset("tag_form"); 
            //return false; 
   };          
        
    //*********Reset tag form******************
    $(document).on('click','.tags',function(){  
            form_reset("tag_form"); 
            //alert("clicked"); // edit_tag_title // showtag /add_tag
            $("#showtag").addClass("hide");
            $("#tag_form")[0].reset();
            $("#modal-tagform").find(".edit_tag_title").text("Create new tag");
            $("#modal-tagform").find(".add_tag").text("Create");
    });        
        
        //**********delete tag********************
        $(document).on('click','.remove_tag',function(){  
             var id = $(this).attr("value");
             $("#remove_tag_submit").attr("value",id);
        });
        
        $(document).on('click','#remove_tag_submit',function(){        //delete status
            var id = $(this).attr("value");//Get id of tag which to be deleted.
            
            //Delete tag from database
            $.ajax({
                type: "POST",
                url: '<?php echo base_url(); ?>content_briefcases/delete_tag',
                data: "tag_id="+id
            })
            
            //Deleted tag form view
            $("#tag_list").find(".list-group-item").each(function(){
                if($(this).find(".btn-danger").val() == id){
                    $(this).remove();
                }
            });            
            
            //Deleted update condtion if tagid exist in edit section
             if($("#tag_id").attr('value') == id){
                $("#tag_id").removeAttr('value');   
                $("#tag_name_filed").val('');
             }
        });
        //*****************edit tag****************
        $(document).on('click', ".edit_tag", function (event){
            event.preventDefault();
            $("#modal-tagform").find(".edit_tag_title").text("Edit tag");
            $("#modal-tagform").find(".add_tag").text("Update");
            var rowJson = $(this).nextAll(".tag_json").val();//alert(rowJson);
            $("#tag_form").fillEditForm(rowJson);    
        })
        //*************album and filter*************************
        $(document).on('click','.album_filter',function(){
            $('.album_des').addClass('hide');
            $('.modal-title').text('Create filter');
            $('#type').val('filter');
            $('#filter_album_form').find('input[type=text], input[type=hidden], select, textarea').val(null);
            if ($(this).hasClass('album_button')) {
                $('.album_des').removeClass('hide');
                $('.modal-title').text('Create album');
                $('#type').val('album');
            }
        })
    
        //**********delete album and filter**********
        $(document).on('click','.remove_album_filter',function(e){ e.preventDefault();
            if($(this).text() == 'Remove Album'){
                $("#delete_album_filter_popup").find('p').text('Would you like to remove this selected album?');
            }
        });
                    
        //*************edit album filter*************
        $(document).on('click', ".edit_album", function (event){
            event.preventDefault();// console.log($('.selectpicker').prop('type'));
            var rowJson = $(this).nextAll(".album_filter_json").val();//alert(rowJson);
            var edit = $.parseJSON(rowJson);
            $('.album_des').removeClass('hide');
            $("#album_filter_form").fillEditForm(rowJson);
            $.each(edit,function(key, value){
                    if(key == 'tag_names'){ //tag_names
                    $('#edit_album_select').selectpicker('deselectAll');  // reset to none selection
                    $('#edit_album_select').selectpicker('refresh');
                    if(value == null || value == ""){
                        return false;
                    }
                    else{
                            var strWard = '[';
                            $.each(value, function(tagid, tagvalue){
                                strWard += '"' + tagid + '",';
                            })
                            strWard = strWard.slice(0, -1); //remove last comma
                            strWard += ']';
                            $('#edit_album_select').selectpicker('val', JSON.parse(strWard)); 
                            $('#edit_album_select').selectpicker('refresh');
                        }
                    }
            });
            

        })
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
                    trash['status'] = -1; //console.log(trash);
                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url(); ?>content_briefcases/trash_file',
                        data: trash //"content_id="+id
                    }) 
                    $(this).parents('li').fadeOut();
                    $("#grid-layout-ul-li").find(".content_"+id).parents(".list-item").remove();
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
                var img_type= json.filename.split('.');
                var image = img_type[1].toUpperCase();
                  
                $('.content_list > .list-item > .content_'+json.content_id+' > .img').find('.content_json').val(update_file);
                $('.content_list > .list-item > .content_'+json.content_id+' > .img > .quick-menu').find('.del_content').attr('value',json.content_id);
                //**********dynamic user values*******************
                    
                $('.content_list > .list-item > .content_'+json.content_id+' > .img').find('#img').attr('src',base_url+'assets/file/'+image+'.png');
                //                $('.content_list > .list-item > .content_'+json.content_id+' > .block').find('.title').text(json.filename);
                //                $('.content_list > .list-item > .content_'+json.content_id+' > .block').find('.date').text(json.time_to_upload);
                $.each(json, function(key, value){
                    $('.content_list .list-item:last').find(function(){
                        $('.content_list .list-item:last').find('#img').attr('src',base_url+'assets/file/'+image+'.png');
                        $('.content_list .list-item:last').find('.'+key).text(value); //for dynamic user box data
                    })
                    if(key == 'tag_names'){
                        $('.content_list > .list-item > .content_'+json.content_id+' > .block > .tag').find(value,function(i,e){
                            $.each(value,function(i,e){//console.log(e);
                                $('.badge').text(e);
                            })
                        })
                        $.each(value,function(i,e){//console.log(e);
                            $('.content_list > .list-item > .content_'+json.content_id+' > .block > .tag').appendTo('<span class="badge badge-playground">'+e+'</span>');
                            //                            $('.content_list > .list-item > .content_'+json.content_id+' > .block > .tag').find('.badge').text(e);
                        })
                    }
                        
                });
            });
        });
        //***************form reseting**********
        function form_reset(formid){
            $("#tag_id").removeAttr('value');
            $('#'+formid)[0].reset();   
            $('#'+formid).find(".state-success").removeClass("state-success"); 
            $('#'+formid).find(".state-error").removeClass("state-error");
            $('#'+formid).find("em").remove();
        }
        
</script>