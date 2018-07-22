<!--ALKIEMoePQBaxeAi5v0DQz-->
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
</style>

<div id="wrapper">

    <!--BEGIN PAGE WRAPPER-->
    <div id="page-wrapper">
        <!--BEGIN TITLE & BREADCRUMB PAGE-->
        <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
            <div class="page-header pull-left">
                <div class="page-title">Contents & Channels</div>
            </div>
            <?php $type = $detail['data']['filter_detail']['type']; ?>
            <ol class="breadcrumb page-breadcrumb pull-left">
                <li><i class="fa <?php echo ($type == 'filter')? 'fa-filter': 'fa-camera-retro'; ?>"></i>&nbsp;<a href="#" class=""><?php echo ($type == 'filter')? 'Saved filters': 'Albums'; ?></a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                <li class="hidden"><a href="#"><?php echo $detail['data']['filter_detail']['name']; ?></a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                <li class="active"><?php echo $detail['data']['filter_detail']['name']; ?></li>

                <div class="clearfix"></div>
            </ol>

            <div class="pull-right mbm mtm" style="display: inline-block;">
                <button type="button" data-toggle="modal" data-target="#modal-filter-album" class="btn btn-grey  edit_album_filter" value="<?php echo $detail['data']['filter_detail']['album_filter_id']; ?>">
                <?php echo ($type == 'filter')? 'Edit filter': 'Edit Album'; ?>
                </button>
                <input type="hidden"  class="album_filter_json" value='<?php echo json_encode($detail['data']['filter_detail'], JSON_HEX_APOS); ?>'>      
<!--                <button class="btn btn-grey remove_album_filter" value="<?php //echo $detail['data']['filter_detail']['album_filter_id']; ?>"  type="button">
                    <?php //echo ($type == 'filter')? 'Remove filter': 'Remove Album'; ?>
                </button>-->
                <a href="<?php echo base_url(); ?>content_channels/delete_album_filter/<?php echo $detail['data']['filter_detail']['album_filter_id']; ?>/<?php echo $detail['data']['filter_detail']['type']; ?>" class=" btn btn-grey remove_album_filter"><?php echo ($type == 'filter')? 'Remove filter': 'Remove Album'; ?></a>
                <a href="<?php echo base_url(); ?>channels/channel" class=" btn btn-grey">Add channel</a>                
            </div>
        </div>
        <!--END TITLE & BREADCRUMB PAGE-->
        <!--BEGIN CONTENT-->
        <div class="page-content">
            <div class="row">
                <?php //echo'<pre>'; print_r($detail); echo'</pre>'; ?>
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
                                                <input  name="filename" class="form-control" value="" type="text" style="width: 560px;">
                                                <input type="hidden" class="old_filename"  name="old_filename" value="">
                                            </span>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group ">
                                                    <div class="col-md-3">
                                                        <label for="inputFirstName" class="control-label weight">Tags
                                                        </label>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <select data-style="btn-white" multiple="multiple" name="content_tags[]" data-selected-text-format="values" class="selectpicker show-tick form-control">
                                                            <option class="hide"></option>
                                                            <?php foreach ($tag as $tag_list) { ?>                                            
                                                                <option value="<?php echo $tag_list['tag_id']; ?>"><?php echo $tag_list['name']; ?></option>
                                                            <?php } ?>
                                                        </select>     
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="inputLastName" class="control-label weight">Used in channels
                                                    </label>
                                                    <div class=""><i data-hover="tooltip" data-original-title="Last Name is empty" class=" tooltips"></i>
                                                        <span data-name="channels"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label for="inputEmail" class="control-label weight">Security
                                                        </label>
                                                    </div>
                                                    <!--                                                    <div class="input-icon">
                                                                                                            <span class="badge badge-info">confidential</span>
                                                                                                            <span class="badge badge-info">Can be shared & downloaded </span>
                                                                                                            <span class="badge badge-info">Can be annotated </span>
                                                                                                        </div>-->
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
                                                    <label for="selGender" class="control-label weight">Use Optimized file
                                                    </label>


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
                                                    <label for="inputBirthday" class="control-label weight">Last Update : </label><span style="margin-left: 50px;"><span data-name="last_update"></span></span><br/><br/>
                                                    <label for="inputPhone" class="control-label weight">Uploaded at : </label><span style="margin-left: 50px;"><span data-name="time_to_upload"></span></span> </div>
                                            </div>
                                            <div class="col-md-4">
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
                                            <button class="btn btn-primary update_content"  data-dismiss="modal" type="submit">Update</button>&nbsp;
                                            <button class="btn btn-green" data-dismiss="modal" type="button">Close</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> 
                <!--END MODAL Content PORTLET-->
                <?php //echo'<pre>'; print_r($detail); echo'</pre>'; ?>
                <!--BEGIN MODAL filter-->
                <div id="modal-filter-album" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                <h4 class="modal-title">Create Filter</h4>
                            </div>
                            <div class="modal-body">
                                <form id="album_filter_form" method="POST">
                                    <table class="table table-striped table-hover">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="filteralbumname" class="col-md-3 control-label">Name<span class='require'>*</span>
                                                        </label>

                                                        <div class="col-md-9">
                                                            <input id="filteralbumname" type="text" name="name" class="form-control" />                                                        </div>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="" class="col-md-3 control-label">Tags<span class='require'>*</span>
                                                        </label>

                                                        <div class="col-md-9">
                                                            <select data-style="btn-white" multiple="multiple" name="tags[]" data-selected-text-format="values" class="selectpicker show-tick form-control">
                                                                <option class="hide"></option>
                                                                <?php foreach ($tag as $tag_list) { ?>                                            
                                                                    <option value="<?php echo $tag_list['tag_id']; ?>"><?php echo $tag_list['name']; ?></option>
                                                                <?php } ?>
                                                            </select>                                                       
                                                        </div>
                                                        <input type="hidden" id="type" name="type" value="">
                                                        <input type="hidden" id="type" name="album_filter_id" value="">
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr class="album_des hide">
                                                <td>
                                                    <div class="form-group">
                                                        <label for="album_description" class="col-md-3 control-label">Description
                                                        </label>

                                                        <div class="col-md-9">
                                                            <textarea id="album_description" name="album_description" rows="3" class="form-control"></textarea>                                                        </div>
                                                    </div>
                                                </td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <!--                                data-menu-title="filtertitle" data-title-name="filterName" data-ul-id="filterlist"-->
                                <button type="button" data-dismiss="modal"  class="add_album_filter btn btn-green add_menu">Create</button>
                                <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--END MODAL filter-->
                <!--BEGIN MODAL tag form-->
                <div id="modal-tagform" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                <h4 class="modal-title edit_tag_title">Create new tag</h4>
                            </div>
                            <div class="modal-body">

                                <table class="table table-striped table-hover">
                                    <tbody>

                                        <tr id="showtag" class="hide">
                                            <td>
                                                <form id="delete_tag_form" method="POST">
                                                    <ul id="tag_list" class="list-group">
                                                        <!--dynamic tag li-->
                                                        <li class="list-group-item dynamic_tag_li hide"><span class="name">Cras justo odio</span>
                                                            <span class=" pull-right">
                                                                <button type="button" class="btn btn-grey btn-xs edit_tag" value=""><i class="fa fa-edit"></i>
                                                                </button>
                                                                <input type="hidden"  class="tag_json" value=''>      
                                                                <button class="btn btn-danger btn-xs remove_tag" value="" type="button"><i class="fa fa-trash-o"></i>
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
                                                                    <button class="btn btn-danger btn-xs remove_tag" value="<?php echo $tag_item['tag_id']; ?>" type="button"><i class="fa fa-trash-o"></i>
                                                                    </button>
                                                                </span>
                                                            </li>
                                                        <?php } ?>
                                                    </ul>
                                                </form>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                <form id="tag_form" method="POST" >
                                                    <div class="form-group">
                                                        <label for="tagname" class="col-md-3 control-label">Name<span class='require'>*</span>
                                                        </label>

                                                        <div class="col-md-9">
                                                            <input type="text" name="name" class="form-control" />
                                                        </div>
                                                    </div>
                                                    <input type="hidden" id="tag_id" name="tag_id" value="">
                                                </form>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal"  class="add_tag btn btn-green">Create</button>
                                <button type="button" class="btn btn-info manage_tag">Manage Tags</button>
                            </div>
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
                                        <li class="out">
                                            <img src="https://s3.amazonaws.com/uifaces/faces/twitter/mijustin/128.jpg" class="avatar img-responsive" />
                                            <div class="message"><span class="chat-arrow"></span><a href="#" class="chat-name">Admin</a>&nbsp;<span class="chat-datetime">at July 06, 2014 18:06</span><span class="chat-body">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</span>
                                            </div>
                                        </li>
                                        <li class="in">
                                            <img src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/48.jpg" class="avatar img-responsive" />
                                            <div class="message"><span class="chat-arrow"></span><a href="#" class="chat-name">Admin</a>&nbsp;<span class="chat-datetime">at July 06, 2014 17:06</span><span class="chat-body">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</span>
                                            </div>
                                        </li>
                                        <li class="out">
                                            <img src="https://s3.amazonaws.com/uifaces/faces/twitter/mijustin/128.jpg" class="avatar img-responsive" />
                                            <div class="message"><span class="chat-arrow"></span><a href="#" class="chat-name">Admin</a>&nbsp;<span class="chat-datetime">at July 06, 2014 18:06</span><span class="chat-body">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</span>
                                            </div>
                                        </li>
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
                                        <input id="input-chat" type="text" placeholder="Type a message here..." class="form-control" /><span id="btn-chat" class="input-group-btn"><button type="button" class="btn btn-green"><i class="fa fa-check"></i></button></span>
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
                                            <img src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/48.jpg" class="avatar img-responsive" />
                                            <div class="message"><span class="chat-arrow"></span><a href="#" class="chat-name">Admin</a>&nbsp;<span class="chat-datetime">at July 06, 2014 17:06</span><span class="chat-body">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</span>
                                            </div>
                                        </li>
                                        <li class="out">
                                            <img src="https://s3.amazonaws.com/uifaces/faces/twitter/mijustin/128.jpg" class="avatar img-responsive" />
                                            <div class="message"><span class="chat-arrow"></span><a href="#" class="chat-name">Admin</a>&nbsp;<span class="chat-datetime">at July 06, 2014 18:06</span><span class="chat-body">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</span>
                                            </div>
                                        </li>
                                        <li class="in">
                                            <img src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/48.jpg" class="avatar img-responsive" />
                                            <div class="message"><span class="chat-arrow"></span><a href="#" class="chat-name">Admin</a>&nbsp;<span class="chat-datetime">at July 06, 2014 17:06</span><span class="chat-body">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</span>
                                            </div>
                                        </li>
                                        <li class="out">
                                            <img src="https://s3.amazonaws.com/uifaces/faces/twitter/mijustin/128.jpg" class="avatar img-responsive" />
                                            <div class="message"><span class="chat-arrow"></span><a href="#" class="chat-name">Admin</a>&nbsp;<span class="chat-datetime">at July 06, 2014 18:06</span><span class="chat-body">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</span>
                                            </div>
                                        </li>
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
                                        <input id="input-chat" type="text" placeholder="Type a message here..." class="form-control" /><span id="btn-chat" class="input-group-btn"><button type="button" class="btn btn-green"><i class="fa fa-check"></i></button></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--update version-->
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
                                                <li><span data-number="5"> 5 per page</span>
                                                </li>
                                                <li><span data-number="10" data-default="true"> 10 per page</span>
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
    <!--                                            <li><span data-path=".desc" data-order="asc" data-type="text">Description A-Z</span>
                                                </li>
                                                <li><span data-path=".desc" data-order="desc" data-type="text">Description Z-A</span>
                                                </li>
                                                <li><span data-path=".like" data-order="asc" data-type="number" data-default="true">Likes asc</span>
                                                </li>
                                                <li><span data-path=".like" data-order="desc" data-type="number">Likes desc</span>
                                                </li>-->
                                                <li><span data-path=".date" data-order="asc" data-type="datetime">Date asc</span>
                                                </li>
                                                <li><span data-path=".date" data-order="desc" data-type="datetime">Date desc</span>
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
                                    <div class="" style="display: inline-block;float: right">
                                        <!--filepicker-->
                                        <input onchange="filepickerresponse(event.fpfiles)" data-fp-button-class="btn btn-grey fa fa-upload" data-fp-multiple="true"  data-fp-button-text=" " data-fp-store-path="" data-fp-mimetypes="*/*" data-fp-apikey="ALKIEMoePQBaxeAi5v0DQz" type="filepicker">
                                        <!--filepicker-->
                                        <button type="button" data-toggle="modal" data-target="#modal-filter-album" class="album_filter btn btn-grey"><i class="fa fa-filter"></i>
                                        </button>
                                        <button type="button" id="album_form" data-type="" data-toggle="modal" data-target="#modal-filter-album" class="album_filter album_button  btn btn-grey"><i class="fa fa-camera-retro"></i>
                                        </button>
                                        <button type="button" data-type="" data-toggle="modal" data-target="#modal-tagform" class=" tags btn btn-grey"><i class="fa fa-tags"></i>
                                        </button>

                                    </div>

                                    <!--                                </div>-->

                                    <div class="" style="float: left;display: inline-block">
                                        <div class="col-md-3" style="padding-left: 0px; width: 171px; padding-right: 0px;">
                                            <div data-control-type="drop-down" data-control-name="category-filter" data-control-action="filter" class="jplist-drop-down form-control" style="padding-left: 0px;">
                                                <ul class="dropdown-menu">
                                                    <li><span data-path="default">File Type</span>
                                                    </li>
                                                    <li><span data-path=".application">Documents</span>
                                                    </li>
                                                    <li><span data-path=".image">Photos</span>
                                                    </li>
                                                    <li><span data-path=".audio">Audio</span>
                                                    </li>
                                                    <li><span data-path=".video">Videos</span>
                                                    </li>
                                                    <li><span data-path=".text">Web Applications</span>
                                                    </li>
                                                </ul>
                                            </div>
    <!--                                            <select data-control-type="select" data-control-name="category-filter" data-control-action="filter" class="jplist-select selectpicker form-control" data-style="btn-white"  style="display: none;">
                                                    <option data-path="default">File Type</option>
                                                    <option data-path=".application">Documents</option>
                                                    <option data-path=".image">Photos</option>
                                                    <option data-path=".audio">Audio</option>
                                                    <option data-path=".video">Videos</option>
                                                    <option data-path=".text">Web Applications</option>
                                                </select>-->

                                        </div>

                                        <div class="col-md-3" style="padding-left: 9px; width: 292px; padding-right: 0px;">
                                            <div data-control-type="drop-down" data-control-name="category-filter" data-control-action="filter" class="jplist-drop-down form-control" style="padding-left: 0px; width: 272px;">
                                                <ul class="dropdown-menu" style="width: 100%;">
                                                    <li><span data-path="default">Property</span>
                                                    </li>
                                                    <li><span data-path=".rated">Rated</span>
                                                    </li>
                                                    <li><span data-path=".commented">Commented</span>
                                                    </li>
                                                    <li><span data-path=".no_views">No Views</span>
                                                    </li>
                                                    <li><span data-path=".confidential"> Confidential</span>
                                                    </li>
                                                    <li><span data-path=".not_shared">Cannot be shared or downloaded</span>
                                                    </li>
                                                    <li><span data-path=".expired">Expired</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="col-md-3" style="padding-left: 0px; width: 177px; padding-right: 0px;">
                                            <div data-control-type="drop-down" data-control-name="category-filter" data-control-action="filter" class="jplist-drop-down form-control" style="padding-left: 0px;">
                                                <ul class="dropdown-menu">
                                                    <li><span data-path="default">Tags</span>
                                                    </li>
                                                    <?php foreach ($tag as $tag_list) { ?>                                            
                                                        <li> <span data-path=".<?php echo $tag_list['name']; ?>"></span> <?php echo $tag_list['name']; ?></li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-control-type="views" data-control-name="views" data-control-action="views" data-default="jplist-grid-view" class="jplist-views" style="display: inline-block;float: right">
                                        <button type="button" data-type="jplist-list-view" class="jplist-view jplist-list-view btn btn-grey"><i class="fa fa-th-list" style="color:white;"></i>
                                        </button>
                                        <button type="button" data-type="jplist-grid-view" class="jplist-view jplist-grid-view btn btn-grey"><i class="fa fa-th" style="color:white;"></i>
                                        </button>
                                        <button type="button" data-control-type="reset" data-control-name="reset" data-control-action="reset" class="jplist-reset-btn btn btn-grey"><i class="fa fa-refresh"></i>
                                        </button>
    <!--                                        <button type="button" data-type="jplist-thumbs-view" class="jplist-view jplist-thumbs-view btn btn-default"><i class="fa fa-reorder"></i>
                                            </button>-->
                                    </div>
                                    <!--                                </div>-->

                                </div>

                                <ul class="box text-shadow ul-li-list content_list">
                                    <!--dynamic li-->
                                    <li class="list-item hide">

                                        <div class="list-box">
                                            <!--<img/>-->
                                            <div class="img">
                                                <img id="img" src="" alt="" title="" class="view_lib" data-toggle="modal" data-target="#modal-items" />
                                                <input type="hidden" class="content_json" value=''>
                                                <div class="quick-menu btn-group menu-right">
                                                    <!--                                                            <a href="javascript:void(0);" class="btn btn-default btn-xs ellipsis_div">
                                                                                                                    <div class="fa fa-thumbs-o-up"></div><br/> 10
                                                                                                                </a>-->
                                                    <a href="#modal-comments" class="btn btn-default btn-xs  ellipsis_div"  data-toggle="modal" >
                                                        <div class="fa fa-comment"></div><br/><span class="comments_count"></span>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-default btn-xs  ellipsis_div">
                                                        <div class="fa fa-eye"></div><br/><span class="views"></span>
                                                    </a>
                                                    <a href="" class="del_content btn-default btn btn-default btn-xs  ellipsis_div" value="">
                                                        <i class="fa fa-trash-o trash_size"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <!--<data></data>-->
                                            <div class="block">
                                                <p class="title ellipsis_div filename"></p>
                                                <p class="date ellipsis_div time_to_upload"></p>

                                                <div class="tag">
                                                    <span class="badge badge-info"></span>
                                                </div>


                                            </div>
                                        </div>

                                    </li>
                                    <?php foreach ($detail['data']['content'] as $content) { ?>
                                        <li class="list-item">
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
//                                            if()
                                            ?> list-box">
                                                <!--<img/>-->
                                                <div class="img <?php echo $m_type . " " . implode(" ", $content['tag_names']); ?> ">
                                                    <img id="img" src="<?php echo $thumbnail; ?>" alt="" title="" class="<?php echo $content['content_id'] . " " . implode(' ', $content['tag_names']); ?> view_lib" data-toggle="modal" data-target="#modal-items" />
                                                    <input type="hidden" class="content_json" value='<?php echo json_encode($content, JSON_HEX_APOS); ?>'>

                                                    <div class="quick-menu btn-group menu-right">
                                                        <!--                                                            <a href="javascript:void(0);" class="btn btn-default btn-xs ellipsis_div">
                                                                                                                        <div class="fa fa-thumbs-o-up"></div><br/> 10
                                                                                                                    </a>-->
                                                        <a href="#modal-comments" class="btn btn-default btn-xs  ellipsis_div"  data-toggle="modal" >
                                                            <div class="fa fa-comment"></div><br/><?php echo $content['comments_count']; ?>
                                                        </a>
                                                        <a href="javascript:void(0);" class="btn btn-default btn-xs  ellipsis_div">
                                                            <div class="fa fa-eye"></div><br/><?php echo $content['views']; ?>
                                                        </a>
                                                        <a href="javascript:void(0);" class="btn-default btn btn-default btn-xs del_content  ellipsis_div" value="<?php echo $content['content_id']; ?>">
                                                            <i class="fa fa-trash-o trash_size"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <!--<data></data>-->
                                                <div class="block">
                                                    <p class="title ellipsis_div"><?php echo $content['filename']; ?></p>
                                                    <p class="date ellipsis_div"><?php echo $content['time_to_upload']; ?></p>

                                                    <div class="tag">
                                                        <?php foreach ($content['tag_names'] as $content_tag) { ?>
                                                            <span class="badge badge-info"><?php echo $content_tag; ?></span>
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
<!--LOADING SCRIPTS FOR contents and channels-->
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
            var img_type= object.filename.split('.');
            var image = img_type[1].toUpperCase();
            console.log(object);
            $('.old_filename').val(object.filename);
            $.each(object,function(key, value){
                $('#update_form').find('.image_address').attr('href',base_url+'assets/upload/'+object.filename);
                $('#update_form').find('.view_image').attr('src',base_url+'assets/file/'+image+'.png');
                $("[data-name='"+key+"']").text(value);
                $("[name='"+key+"']").val(value);
                if(key == 'content_tags' || key == 'security'){
                    if(value == null){return false;}
                    else{
                        //                            $("[name='"+key+"']").val(value);
                    }
                }
            });

        });
        //***************add new tag*********************              
        $(document).on('click','.add_tag',function(){
                
            var url = "<?php echo base_url() ?>content_channels/insert_tag"; // the script where you handle the form input.
            var  tag =  $.ajax({
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
            //**********************************+
            $('#tag_list .tag_'+json.tag_id).find('.tag_json').val(tag); 
            $('#tag_list .tag_'+json.tag_id).find('.name').text(json.name);
            $('#tag_list .tag_'+json.tag_id).find('.edit_tag').val(json.tag_id);
            $('#tag_list .tag_'+json.tag_id).find('.remove_tag').val(json.tag_id);
            $('#tag_form').find('input[type=text], input[type=hidden]').val(null);
            $("#modal-tagform").find(".edit_tag_title").text("Create new tag");
            $("#modal-tagform").find(".add_tag").text("Create");
        });
        //**********delete tag********************
        $(document).on('click','.remove_tag',function(){        //delete status
            var id = $(this).attr("value");
            var del = confirm('Are you sure you want to delete this status?');
            if(del == true){
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url(); ?>content_channels/delete_tag',
                    data: "tag_id="+id
                })
                $(this).parents('li').fadeOut(function () {
                    $(this).parents('li').remove();
                });
            }
            else{
                $('#delete_tag_form').submit(function(e){
                    e.stopPropagation();
                    // e.preventDefault();
                    return false;
                })
            }
            return false;
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
           //**********add album and filter************
    $(document).on('click','.add_album_filter',function(){
            
        var url = "<?php echo base_url() ?>content_channels/insert_album_filter"; // the script where you handle the form input.
        var  album_filter =  $.ajax({
            type: "POST",
            url: url,
            data: $("#album_filter_form").serialize(), // serializes the form's elements.
            async: false
        }).responseText; //console.log(tag);
        var json = $.parseJSON(album_filter);  console.log(json.type);//return false;
        if(json.type == 'filter'){console.log(json.action);
            if(json.action != 'updated'){ 
            
                $('#filterlist li:first').clone().appendTo('#filterlist').addClass('filter_'+json.album_filter_id).removeClass('hide');
            }
            $('#filterlist .filter_'+json.album_filter_id).find('.album_filter_json').val(album_filter); console.log(json.action);
            $('#filterlist .filter_'+json.album_filter_id).find('.submenu-title').text(json.name);
            $('#filterlist .filter_'+json.album_filter_id).find('.edit_album_filter').val(json.album_filter_id);
            $('#filterlist .filter_'+json.album_filter_id).find('.remove_album_filter').val(json.album_filter_id);
            $('#album_filter_form').find('input[type=text], input[type=hidden], textarea').val(null);
          
        }
        else{
            if(json.action != 'updated'){
                $('#albumlist li:first').clone().appendTo('#albumlist').addClass('album_'+json.album_filter_id).removeClass('hide');
            }
            $('#albumlist .album_'+json.album_filter_id).find('.album_filter_json').val(album_filter); 
            $('#albumlist .album_'+json.album_filter_id).find('.submenu-title').text(json.name);
            $('#albumlist .album_'+json.album_filter_id).find('.edit_album_filter').val(json.album_filter_id);
            $('#albumlist .album_'+json.album_filter_id).find('.remove_album_filter').val(json.album_filter_id);
            $('#album_filter_form').find('input[type=text], input[type=hidden], textarea').val(null);
           
        }
        $('.selectpicker').selectpicker('deselectAll');
        $("#modal-filter-album").find(".modal-title").text("Create filter");
        $(this).text("Create");
    });
    
    //**********delete album and filter**********
    $(document).on('click','.remove_album_filter',function(){        //delete status
        var id = $(this).attr("value");
        if($(this).closest('li').hasClass('album_menu')){
            var del = confirm('Are you sure you want to delete this album?');
        }
        else{
            var del = confirm('Are you sure you want to delete this filter?');
        }
        if(del == false){
            return false;
//            $.ajax({
//                type: "POST",
//                url: '<?php echo base_url(); ?>content_channels/delete_album_filter',
//                data: "album_filter_id="+id
//            })
//            $(this).parents('li:eq(0)').fadeOut();
//            $(this).parents('li:eq(0)').remove();
        }
        else{
                 return true;
        }
        return false;
    });  
                    
        //*************edit album filter*************
        $(document).on('click', ".edit_album_filter", function (event){
            event.preventDefault();// console.log($('.selectpicker').prop('type'));
            var rowJson = $(this).nextAll(".album_filter_json").val();//alert(rowJson);
            var edit = $.parseJSON(rowJson);
            if(edit.type == 'filter'){
                $("#modal-filter-album").find(".modal-title").text("Edit filter");
                $('.album_des').addClass('hide');
                //                        $("#modal-filter-album").find(".add_album_filter").text("Update");
            }
            else{
                $("#modal-filter-album").find(".modal-title").text("Edit album");
                $('.album_des').removeClass('hide');
                //                        $("#modal-filter-album").find(".add_album_filter").text("Update");
            }
            //    $("#modal-filter-album").find(".modal-title").text("Edit filter");
            $("#modal-filter-album").find(".add_album_filter").text("Update");
            //        var rowJson = $(this).nextAll(".album_filter_json").val();//alert(rowJson);
            $("#album_filter_form").fillEditForm(rowJson);  console.log(rowJson+'----------------------');

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
                var del = confirm('Are you sure you want to delete this content?');
                if(del == true){
                    var trash = {};
                    trash['content_id'] = id;
                    trash['status'] = -1; //console.log(trash);
                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url(); ?>content_channels/trash_file',
                        data: trash //"content_id="+id
                    }) 
                    $(this).parents('li').fadeOut();
                    //$(this).parents('li').remove();
                }
                else{
                    return false;
                }
                return false;
            })
          
            $(document).on('click','.update_content',function(e){e.preventDefault();
                var url = "<?php echo base_url() ?>content_channels/update_file"; // the script where you handle the form input.
                var base_url = "<?php echo base_url() ?>";
                var  update_file =  $.ajax({
                    type: "POST",
                    url: url,
                    data: $('#update_form').serialize(), // serializes the form's elements.
                    async: false
                }).responseText;
                //*******update condition************
                var json = $.parseJSON(update_file); console.log(json); //return false; //console.log(json);
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
                            $.each(value,function(i,e){console.log(e);
                                $('.badge').text(e);
                            })
                        })
                        $.each(value,function(i,e){console.log(e);
                            $('.content_list > .list-item > .content_'+json.content_id+' > .block > .tag').appendTo('<span class="badge badge-info">'+e+'</span>');
                            //                            $('.content_list > .list-item > .content_'+json.content_id+' > .block > .tag').find('.badge').text(e);
                        })
                    }
                        
                });
            });
        });
        //********************file upload**************
        function filepickerresponse (response){ // console.log("entered");
            $.each(response,function(key,file){//console.log(file.url)
                var base_url = "<?php echo base_url() ?>";
                var url = "<?php echo base_url() ?>content_channels/insert_file"; // the script where you handle the form input.
                var  uploadedfile =  $.ajax({
                    type: "POST",
                    url: url,
                    data: file, // serializes the form's elements.
                    async: false,
                    success:function(){
                        filepicker.setKey("ALKIEMoePQBaxeAi5v0DQz");                              
                        filepicker.remove(
                        file.url,
                        function(){
                            console.log("Removed");
                        }
                    );
                    }
                }).responseText;
                //*******update condition************
                var json = $.parseJSON(uploadedfile); //console.log(json); //return false; //console.log(json);
                //*********add dynamic row**************
                if(json.action != 'updated'){
                    $('.content_list li:first').clone().appendTo('.content_list');
                }
            }).responseText;
            //*******update condition************
            var json = $.parseJSON(uploadedfile); //console.log(json); //return false; //console.log(json);
            var img_type= json.filename.split('.');
            var image = img_type[1].toUpperCase();
            var type = json.mimetype.split('/');
            var filter_text = type[0];
            //*********add dynamic row**************
            if(json.action != 'updated'){
                $('.content_list li:first').clone().appendTo('.content_list');
            }
            $('.content_list .list-item:last > .list-box').addClass('content_'+json.content_id).removeClass('hide');//.css('display','inline-block');
            $('.content_list .list-item:last > .list-box > .img').addClass(filter_text);
            $('.content_list .list-item:last').find('.content_json').val(uploadedfile);
            $('.content_list .list-item:last > .list-box > .img > .quick-menu').find('.del_content').attr('value',json.content_id);
            $('.content_list .list-item:last').removeClass('hide');
            $.each(json, function(key, value){ 
                if(key == 'tag_names'){
                    $.each(value,function(index,tag){
                        $('.content_list .list-item:last').find(function(){
                            $('.tag > .'+index).text(tag);
                        }) 
                    })
                }
                //**********dynamic user values*******************
                var base_url = "<?php echo base_url() ?>";
                $('.content_list .list-item:last').find(function(){
                    $('.content_list .list-item:last').find('#img').attr('src',base_url+'assets/file/'+image+'.png');
                    $('.content_list .list-item:last').find('.'+key).text(value); //for dynamic user box data
                })
            })
        }
</script>