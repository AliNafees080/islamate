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
</style>

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
                <li class="hidden"><a href="#">Library</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                <li class="active">Trash</li>

                <div class="clearfix"></div>
            </ol>
            <!--            <div class="pull-right mbm mtm" style="display: inline-block;">
                            <button type="button" data-type="" data-toggle="modal" data-target="#modal-tagform" class="content-controls btn btn-info"><i class="fa fa-tags"></i>
                            </button>
                            <a href="<?php echo base_url(); ?>channels/channel" class=" btn btn-blue">Add channel</a>
                        </div>-->
        </div>
        <!--END TITLE & BREADCRUMB PAGE-->
        <!--BEGIN CONTENT-->
        <div class="page-content">
            <div class="row">
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
    <!--                                                    <div class=""><i data-hover="tooltip" data-original-title="Correct" class=" tooltips"></i>
                                                            <span class="badge badge-info">Astha</span>
                                                            <span class="badge badge-info">Akanksha</span>
                                                        </div>-->
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




                <!--channel-->
                <!--                <div id="jq-demo">
                                    <div id="drag">
                                        <ul id="dragcont">
                                            <li class="draggablediv ui-draggable" style="height:100px; width:100px;">
                                                <span style="display:block;">ghjgjhgjh</span>
                                                <img src="<?php echo base_url(); ?>assets/images/gallery/10.jpg" style="height:100px; width:100px; display:none;">
                                            </li>
                                            <li class="draggablediv ui-draggable" style="height:100px; width:100px;">
                                                <img src="<?php echo base_url(); ?>assets/images/gallery/11.jpg" style="height:100px; width:100px;">
                                            </li>
                                            <li class="draggablediv ui-draggable" style="height:100px; width:100px;">
                                                <img src="<?php echo base_url(); ?>assets/images/gallery/12.jpg" style="height:100px; width:100px;">
                                            </li>
                                            <li class="draggablediv ui-draggable" style="height:100px; width:100px;">
                                                <img src="<?php echo base_url(); ?>assets/images/gallery/13.jpg" style="height:100px; width:100px;">
                                            </li>
                
                                        </ul>
                                    </div>
                
                                    <div id="sort">
                                        <ul id="finalcontainer" class="ui-sortable"></ul>
                                    </div>
                                </div>-->
                <!--channel-->
                <!--page contents-->
                <?php //echo'<pre>'; print_r($detail); echo'</pre>'; ?>
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

                                    <div data-control-type="views" data-control-name="views" data-control-action="views" data-default="jplist-grid-view" class="jplist-views">
                                        <button type="button" data-type="jplist-list-view" class="jplist-view jplist-list-view btn btn-grey"><i class="fa fa-th-list" style="color:white;"></i>
                                        </button>
                                        <button type="button" data-type="jplist-grid-view" class="jplist-view jplist-grid-view btn btn-grey"><i class="fa fa-th" style="color:white;"></i>
                                        </button>
                                        <button type="button" data-control-type="reset" data-control-name="reset" data-control-action="reset" class="jplist-reset-btn btn btn-grey"><i class="fa fa-refresh"></i>
                                        </button>
    <!--                                        <button type="button" data-type="jplist-thumbs-view" class="jplist-view jplist-thumbs-view btn btn-default"><i class="fa fa-reorder"></i>
                                            </button>-->
                                    </div>
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
<!--                                        
<!--                                        <div class="col-md-3" style="padding-left: 10px; width: 171px; padding-right: 0px;">
                                            <select data-control-type="select" data-control-name="category-filter" data-control-action="filter" class="jplist-select selectpicker form-control" data-style="btn-white"  style="display: none;">
                                                <option data-path="default">File Type</option>
                                                <option data-path=".application">Documents</option>
                                                <option data-path=".image">Photos</option>
                                                <option data-path=".audio">Audio</option>
                                                <option data-path=".video">Videos</option>
                                                <option data-path=".text">Web Applications</option>
                                            </select>
                                        </div>-->
<!--                                    </div>
                                </div>-->

                                <ul class="box text-shadow ul-li-list">
                                    <!--<item>1</item>-->
                                    <?php foreach ($detail['trash_content'] as $content) { ?>
                                        <li class="list-item">
                                            <?php
                                            $type = $content['mimetype'];
                                            $mimtype = split("/.", $type);
                                            $m_type = $mimtype[0];
                                            ?>
                                            <?php
                                            $fil_name = explode('/', $content['mimetype']);
                                            $last_element = end($fil_name);
                                            $file_name = strtoupper($last_element);
                                            $absolutePath = dirname($_SERVER['SCRIPT_FILENAME']) . "/";
                                            $thumbnail = base_url() . 'assets/file/' . $file_name . '.png';
                                            if (!file_exists($absolutePath . 'assets/file/' . $file_name . '.png'))
                                                $thumbnail = base_url() . 'assets/file/DEFAULT.png';
                                            ?>
                                         <?php
                                           // $fil_name = explode('/', $content['mimetype']);
                                            $fil_name = explode('.', $content['filename']);
                                            $last_element = end($fil_name);
                                            $file_name = strtoupper($last_element);
                                            $absolutePath = dirname($_SERVER['SCRIPT_FILENAME']) . "/";
                                            $thumbnail = base_url() . 'assets/file/' . $file_name . '.png';
                                            if (!file_exists($absolutePath . 'assets/file/' . $file_name . '.png'))
                                                $thumbnail = base_url() . 'assets/file/DEFAULT.png';                                           
                                            ?>
                                            <div class="content_<?php echo $content['content_id'];
                                            if($content['comments_count'] != 0){ echo ' commented';}
                                            if($content['comments_count'] == 0){ echo ' no_views';}
                                            if(!empty($content['expiration_date'])){echo ' expired';}
//                                            if()
                                            
                                            ?>
                                          list-box " >
                                            <!--<img/>-->
                                            <div class="img <?php echo $m_type; ?>">
                                                <img id="img" src="<?php echo $thumbnail; ?>" alt="" title=""  class="view_lib" data-toggle="modal" data-target="#modal-items"/>
                                                <input type="hidden" class="content_json" value='<?php echo json_encode($content, JSON_HEX_APOS); ?>'>
                                                <div class="quick-menu btn-group menu-right">
                                                    <a href="" class="btn-default btn btn-default btn-xs  ellipsis_div restore_content ellipsis_div"  value="<?php echo $content['content_id']; ?>">
                                                        <i class="fa fa-undo trash_size"></i>
                                                       </a>
                                                    <a href="" class="btn-default btn btn-default btn-xs del_content ellipsis_div" value="<?php echo $content['content_id']; ?>">
                                                        <i class="fa fa-trash-o trash_size"></i>
                                                       </a>
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
                                <div class="jplist-panel box panel-bottom">
       
                                    <div data-type="{start} - {end} of {all}" data-control-type="pagination-info" data-control-name="paging" data-control-action="paging" class="jplist-label btn btn-default"></div>
                                    <div data-control-type="pagination" data-control-name="paging" data-control-action="paging" data-control-animate-to-top="true" class="jplist-pagination"></div>
                                </div>
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
<!--LOADING SCRIPTS FOR contents and channels-->
<script src="<?php echo base_url(); ?>assets/vendors/jplist/html/js/vendor/modernizr.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/jplist/html/js/jplist.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jplist.js"></script>
<script>
    //************* lIBRARY EDIT and VIEW ***************//
//    $('.view_lib').click(function(e){e.preventDefault();
//        var view = $(this).parent().find('input').val();
//        object = JSON.parse(view);
//        console.log(object);
//        $('.old_filename').val(object.filename);
//        $.each(object,function(key, value){
//            $("[data-name='"+key+"']").text(value);
//            if(key == 'content_tags' || key == 'security'){
//                if(value == null){return false;}
//                else{
//                    $("[name='"+key+"[]']").selectpicker('val',value.split(',')).prop('selected', true);
//                }
//            }
//            else{
//                $("[name='"+key+"']").val(value);
//            }
//        });
//
//    });
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
    //*************update***********
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
        $('.content_list > .list-item > .content_'+json.content_id+' > .img').find('.content_json').val(update_file);
        $('.content_list > .list-item > .content_'+json.content_id+' > .quick-menu').find('.del_content').val(json.content_id);
        //**********dynamic user values*******************
        $('.content_list > .list-item > .content_'+json.content_id+' > .img').find('#img').attr('src',base_url+'assets/upload/'+json.filename);
        $('.content_list > .list-item > .content_'+json.content_id+' > .block').find('.title').text(json.filename);
        $('.content_list > .list-item > .content_'+json.content_id+' > .block').find('.date').text(json.time_to_upload);
        $('.content_list > .list-item > .content_'+json.content_id+' > .block > .tag').find(function(){
            $.each(json.tag_names,function(i,e){
                $('.content_list > .list-item > .content_'+json.content_id+' > .block > .tag').find('.badge').text(e);
            })
        })

    });
    //***********delete file content****************
    $(document).on('click','.del_content',function(e){ e.preventDefault();
        var id = $(this).attr("value");
        var del = confirm('Are you sure you want to delete this content?');
        if(del == true){
                  
            $.ajax({
                type: "POST",
                url: '<?php echo base_url(); ?>content_channels/delete_file',
                data: "content_id="+id
            }) 
            $(this).parents('li').fadeOut();
            //$(this).parents('li').remove();
        }
        else{
            return false;
        }
        return false;
    })
    //**********restore file********
    $(document).on('click','.restore_content',function(e){ e.preventDefault();
        var id = $(this).attr("value");
        var del = confirm('Are you sure you want to restore this content?');
        if(del == true){
            var trash = {};
            trash['content_id'] = id;
            trash['status'] = 0; //console.log(trash);
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
</script>
