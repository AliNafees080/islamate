<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/website.css" type="text/css" media="screen"/>
<style>
    .dataTables_filter .input-group.input-group-sm.mbs .input-group-btn .btn.btn-grey.dropdown-toggle {
        height: 34px;
    }
</style>
<div id="wrapper">

    <!--BEGIN PAGE WRAPPER-->
    <div id="page-wrapper">
        <!--BEGIN TITLE & BREADCRUMB PAGE-->
        <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
            <div class="page-header pull-left">
                <div class="page-title">Contacts</div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-left">
                <li><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                <li class="hidden"><a href="#">Contacts</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                <li class="active">Contacts</li>
            </ol>
            <div class="col-lg-4 pull-right user_buttons">
                <a class="btn btn-grey form_button pull-right" id="customize_form" rel="customization" href="#"><i class="fa fa-user"></i>&nbsp;Customize Form</a>
            </div>
            <div class="clearfix"></div>
        </div>
        <!--END TITLE & BREADCRUMB PAGE-->
        <!--BEGIN CONTENT-->
        <div class="page-content">

            <div id="tab-general">
                <!--                <div id="sum_box" class="row mbl">-->
                  <!--        Model delete contact    -->
            <div id="modal-contact-delete" tabindex="-1" data-backdrop="static" data-keyboard="false" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <p>Would you like to delete this contact?</p>
                        </div>
                        <div class="modal-footer">
                            <button id="delete_contact_confirm" type="button" data-dismiss="modal" class="btn btn-grey" value="">OK</button>
                            <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!--            End model-->
             <!--        Model to delete for contact field    -->
            <div id="modal-field-delete" tabindex="-1" data-backdrop="static" data-keyboard="false" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <p>Would you like to delete selected field?</p>
                        </div>
                        <div class="modal-footer">
                            <button id="delete_field_confirm" type="button"  class="btn btn-grey" value="" >OK</button>
                            <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!--            End model-->
             <!--        Model to delete for contact status    -->
            <div id="modal-status-delete" tabindex="-1" data-backdrop="static" data-keyboard="false" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <p>Would you like to delete selected status?</p>
                        </div>
                        <div class="modal-footer">
                            <button id="delete_status_confirm" type="button"  class="btn btn-grey" value="" >OK</button>
                            <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!--            End model-->
                <!--BEGIN contact info-->

                <div id="modal-contact" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                <h4 class="modal-title">Contact Info</h4>
                            </div>
                            <div class="modal-body">

                                <table class="table table-striped table-hover">
                                    <tbody>
                                        <tr>
                                            <td width="50%">First Name</td>
                                            <td data-name="first_name">Diane</td>
                                        </tr>
                                        <tr>
                                            <td width="50%">Last Name</td>
                                            <td data-name="last_name">Harris</td>
                                        </tr>
                                        <tr>
                                            <td width="50%">Email</td>
                                            <td data-name="email">name@example.com</td>
                                        </tr>
                                        <tr>
                                            <td width="50%">Organization</td>
                                            <td data-name="organization_id"></td>
                                        </tr>
                                        <tr>
                                            <td width="50%">Description</td>
                                            <td data-name="description">This is extra field</td>
                                        </tr>

                                    </tbody>
                                </table>
                                <!--                                </div>-->
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
                <!--END contact info-->

                <!--add form field-->
                <div id="modal-add-form-field" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                <h4 class="modal-title edit_field">Add Contact field</h4>
                            </div>
                            <form class="form-validate" name="add_field_form" id="add_field_form" action="#">
                                <div class="modal-body">
                                    <table class="table table-striped table-hover">

                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="fieldName" class="col-md-3 control-label text-center">Label
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input id="fieldName" name="name" type="text" placeholder="Field name" class="form-control required" />
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="is_mandatory" class="col-md-3 control-label ">
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input id="is_mandatory" name="is_mandatory" type="checkbox" class="form-control" value="" />&nbsp; Mandatory
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="input-fields-type" class="col-md-3 control-label text-center">Type
                                                        </label>
                                                        <div class="col-md-9">
                                                            <select  class="form-control required" name="type" id="input-fields-type">
                                                                <option value="text">Text field</option>
                                                                <option value="email">Email field</option>
                                                                <option value="phone">Phone field</option>
                                                                <option value="url">Url field</option>
                                                                <option value="textarea">Text area</option>
                                                                <option value="large_textarea">Large text area</option>
                                                                <option value="checkbox">Check box</option>
                                                                <option value="select">Select list</option>
                                                                <option value="multiselect">Multi-select list</option>
                                                                <option value="separator">Separator</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>                       
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="contact_field_id" class="" value="">
                                    <button type="submit" class="btn btn-default addfield">Create</button>
                                    <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>                                
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--add form field-->

                <!--add colorpiker-->
                <div id="modal-colorpicker" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                <h4 class="modal-title edit_status">Add Contact status</h4>
                            </div>
                            <form class="form-validate" action="#" id="add_status_form" name="add_status_form">
                                <div class="modal-body">
                                    <table class="table table-striped table-hover">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <!--                                                        <label for="statuscolor" class="col-md-3 control-label text-center">status color
                                                                                                                    <i style="" id="statusflag" class="fa fa-flag"></i>
                                                                                                                </label>-->
                                                        <div class="col-md-12  text-center">
                                                            <label for="statuscolor" class="control-label">status color</label>
                                                            <div id="colorPicker">
                                                                <a class="color"><div class="colorInner"></div></a>
                                                                <div class="track"></div>
                                                                <ul class="dropdown"  ><li></li></ul>
                                                                <input type="hidden" name="color" class="colorInput"/>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="status_name" class="col-md-3 control-label text-center">Status Name
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input id="status_name" name="name" type="text" value="" placeholder="Status name" class="form-control required" />
                                                        </div>
                                                        <input type="hidden" name="contact_status_id" id="contact_status_id" value="">
                                                    </div>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>                       
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="user_id" id="user_id" value="">
                                    <button type="submit" class="btn btn-grey addstatus">Create</button>
                                    <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--add colorpicker-->
                <!--                </div>-->

                <!--form customization-->
                <div class="row hide customization">
                    <div class="col-lg-12">
                        <div class="panel panel-grey">
                            <div class="panel-heading">Form customization
                                <a href="#" rel="customization" class="pull-right close_form" style="color:#ffffff;" data-focus="#customize_form"><i class="fa fa-times"></i></a>
                            </div>
                            <div class="panel-body pan">
                                <!--Form composer-->
<!--                                <div class="col-md-6">


                                    <div class="portlet box">
                                        <div class="portlet-header prolet-primary">
                                            <div class="caption text-uppercase"> <i style="font-size: 17px; margin-top: 2px;" class="fa fa-list-alt"></i>Form Composer</div>
                                            <a id="contact_field" class="btn btn-default btn-xs pull-right" data-toggle="modal"  href="#modal-add-form-field">&nbsp;Add Field +</a>
                                        </div>
                                        <div style="overflow: hidden;" class="portlet-body">
                                            <form class="" id="delete_form_field" method="POST">
                                                <ul id="formfields" class="todo-list sortable">
                                                    dynamic li
                                                    <li class="clearfix hide"><span class="drag-drop"><i></i></span>

                                                        <div  class="todo-title contents-user"><span class="name"></span> | <span class="type"></span></div>
                                                        <div class="todo-actions pull-right clearfix"><a value="" data-toggle="modal"  href="#modal-add-form-field" title="Edit Field" class="edit-form-field"><i class="fa fa-edit"></i></a><a href="#" data-toggle="modal" data-target="#modal-field-delete" value="" title="Remove Field" id="remove_field"><i class="fa fa-trash-o"></i></a>
                                                            <input type="hidden" class="contact_json" value='' /> 
                                                        </div>
                                                    </li>
                                                    dynamic li

                                                    <?php
                                                    // for($i = 0;$i< count($field); $i++){
                                                    foreach ($field as $fieldname) {
                                                        ?>
                                                        <li class="clearfix contact_field_<?php echo $fieldname['contact_field_id']; ?>"><span class="drag-drop"><i></i></span>

                                                            <div class="todo-title contents-user"><?php echo $fieldname['name'] . " | " . $fieldname['type']; ?></div>
                                                            <div class="todo-actions pull-right clearfix">
                                                                <a value="<?php echo $fieldname['contact_field_id']; ?>" data-toggle="modal" title="Edit Field" href="#modal-add-form-field" class="edit-form-field"><i class="fa fa-edit"></i></a>
                                                                <a href="#" title="Remove Field" data-toggle="modal" data-target="#modal-field-delete" value="<?php echo $fieldname['contact_field_id']; ?>" id="remove_field"><i class="fa fa-trash-o"></i></a>
                                                                <input type="hidden" class="contact_json" value='<?php echo json_encode($fieldname, JSON_HEX_APOS); ?>' />                                                   
                                                            </div>
                                                        </li>
                                                    <?php } ?>
                                                </ul>
                                            </form>
                                        </div>
                                    </div>
                                </div>-->
                                <!--Form Composer-->
                                <!--contact statuses-->
                                <div class="col-md-12" style="margin-top:20px;">
                                    <div class="portlet box">
                                        <div class="portlet-header prolet-primary">
                                            <div class="caption text-uppercase"> <i style="font-size: 17px; color:#ffffff; margin-top: 2px;" class="fa fa-flag"></i>Contact statuses</div>
                                            <a id="status_button" class="btn btn-default btn-xs pull-right" data-toggle="modal" href="#modal-colorpicker">&nbsp;Add Status +</a>
                                        </div>
                                        <!--data-toggle="modal" href="#modal-colorpicker"-->
                                        <div style="overflow: hidden;" class="portlet-body">
                                            <form class="" id="delete_form_status" method="POST">
                                                <ul id="contactstatus" class="todo-list sortable">
                                                    <!--dynamic li-->
                                                    <li class="clearfix hide" style="cursor:default;"><span class="drag-drop"><i></i></span>
                                                        <div class="todo-check pull-left">
                                                            <i style="font-size: 17px; margin-top: 2px; " class="fa fa-flag flagcolor"></i>
                                                        </div>
                                                        <div  class="todo-title contents-user"></div>
                                                        <div class="todo-actions pull-right clearfix"><a data-toggle="modal" title="Edit Status" href="#modal-colorpicker" data-color="" value="" class="edit_status_form"><i class="fa fa-edit"></i></a><a href="#" data-toggle="modal" data-target="#modal-status-delete" value="" title="Delete Status" class="delete delete_status" id="remove_status"><i class="fa fa-trash-o"></i></a>
                                                                <input type="hidden"  class="status_json" value=''>                                                       
                                                        </div>
                                                    </li>
                                                    <!--dynamic li-->
                                                    <?php
                                                    //for($i = 0;$i< count($status); $i++){
                                                    foreach ($status as $status_info) {
                                                        ?>
                                                        <li style="cursor:default;" class="clearfix contact_status<?php echo $status_info['contact_status_id']; ?>"><span class="drag-drop"><i></i></span>
                                                            <div class="todo-check pull-left">
                                                                <i style="font-size: 17px; margin-top: 2px; color:<?php echo $status_info['color']; ?> " class="fa fa-flag"></i>
                                                            </div>
                                                            <div class="todo-title contents-user"><?php echo$status_info['name']; ?></div>
                                                            <div class="todo-actions pull-right clearfix"><a data-toggle="modal" href="#modal-colorpicker" data-color="<?php echo $status_info['color']; ?>" value="<?php echo $status_info['contact_status_id']; ?>" title="Edit Status" class="edit_status_form"><i class="fa fa-edit"></i></a><a href="#"  data-toggle="modal" data-target="#modal-status-delete" value="<?php echo $status_info['contact_status_id']; ?>" title="Delete Status" class="delete" id="remove_status"><i class="fa fa-trash-o"></i></a>
                                                                <input type="hidden"  class="status_json" value='<?php echo json_encode($status_info, JSON_HEX_APOS); ?>'>
                                                            </div>
                                                        </li>
                                                    <?php } ?>
                                                </ul>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--contact statuses-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--form customization-->
                <!--Contacts list-->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-grey">
                            <div class="panel-heading">Contacts
                                <div class="btn-group pull-right">
                                    <!--<a href="#" data-toggle="dropdown" class="btn btn-default btn-sm dropdown-toggle"><i class="fa fa-wrench"></i>&nbsp;Export</a>-->
                                    <ul class="dropdown-menu">

                                        <li>
                                            <a href="#" onclick="$('#table_id').tableExport({type:'csv'});">
                                                <img src="<?php echo base_url(); ?>assets/vendors/tableExport/icon/csv.png" width="24px" class="mrx" />Export to csv</a>
                                        </li>

                                        <li>
                                            <a href="#" onclick="$('#table_id').tableExport({type:'excel',escape:'false'});">
                                                <img src="<?php echo base_url(); ?>assets/vendors/tableExport/icon/xls.png" width="24px" class="mrx" />Export to Excel</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-body">

                                <div class="row mbm">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <form id="contact_delete_form" method="POST">
                                                <table id="contact_table_id" class="table table-hover table-striped table-bordered table-advanced  display">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 3%; padding: 10px; background: #efefef">
                                                                <input type="checkbox" class="checkall" />
                                                            </th>
                                                            <th width="25%">Contact name</th>
                                                            <th width="15%">Created at</th>
                                                            <th width="30%">Created by</th>
                                                            <th width="20%">Last Synced at</th>
                                                            <th width="10%">Actions</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        //echo '<pre>'; print_r($detail); echo '</pre>';
                                                        foreach ($detail as $contact) {
                                                            $contact_info = json_decode($contact['contact_info'], true);
                                                            ?>
                                                            <tr class="contact_<?php echo $contact_info['contact_id']; ?>">
                                                                <td>
                                                                    <input type="checkbox" />
                                                                </td>
                                                                <td><?php echo $contact_info['first_name'] . " " . $contact_info['last_name']; ?></td>
                                                                <td><?php echo $contact_info['created_at']; ?></td>
                                                                <td><?php echo $contact['user']; ?></td>
                                                                <td><?php echo $contact_info['last_synced']; ?></td>
                                                                <td  style="text-align:right;">
                                                                    <input type="hidden" class="contact_info_json" value='<?php echo $contact['contact_info']; ?>' />
                                                                    <button class="btn btn-grey btn-xs view_data" title="View Contact" data-org="<?php echo $contact['organization']; ?>" data-toggle="modal" data-target="#modal-contact" value="<?php echo $contact['contact_id']; ?>"  type="button"><i class="fa fa-eye"></i>
                                                                    </button>
                                                                    <button class="btn btn-grey btn-xs delete_contact" data-toggle="modal" data-target="#modal-contact-delete" title="Delete Contact" value="<?php echo $contact['contact_id']; ?>"  type="button"><i class="fa fa-trash-o"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>


                                                    </tbody>
                                                    </thead>
                                                </table>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Contacts list-->





            </div>
        </div>
        <!--END CONTENT-->
    </div>
    <!--END PAGE WRAPPER-->
</div>
<script src="<?php echo base_url(); ?>assets/js/table-datatables.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.tinycolorpicker.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#contact_delete_form').find('')
         //**************delete contact****************
     $(document).on('click', '.delete_contact', function(){
                $("#delete_contact_confirm").val($(this).val()); 
    });
    $(document).on('click', "#delete_contact_confirm", function (event){
        event.preventDefault();
        var id = $(this).val();//console.log(id);
             $('#modal-contact-delete').modal('hide');
            $.ajax({
                type: "POST",
                url: '<?php echo base_url(); ?>contacts/delete_contact',
                data: "contact_id="+id
            })
            
            $('#contact_table_id > tbody').find('.contact_'+id).fadeOut();
             $('#contact_table_id > tbody').find('.contact_'+id).remove();
    }); 
        //*******************delete**************************
//        $(document).on('click', ".delete_contact", function (event){      //delete contact
//            event.preventDefault();
//            var id = $(this).attr("value");
//            var del = confirm('Are you sure you want to delete this contact?');
//            if(del == true){
//                $.ajax({
//                    type: "POST",
//                    url: '<?php echo base_url(); ?>contacts/delete_contact',
//                    data: "contact_id="+id
//                })
//                $(this).parents('tr').fadeOut(function () {
//                    $(this).parents('tr').remove();
//                });
//            }
//            else{
//                $('#contact_delete_form').submit(function(e){
//                    e.stopPropagation();
//                    // e.preventDefault();
//                    return false;
//                })
//            }
//            return false;
//        });
        //***************remove field**************
         $(document).on('click', '#remove_field', function(){
                $("#delete_field_confirm").val($(this).attr('value')); 
    });
    $(document).on('click', "#delete_field_confirm", function (event){
        event.preventDefault();
        var id = $(this).val();//console.log(id);
             $('#modal-field-delete').modal('hide');
            $.ajax({
                type: "POST",
                url: '<?php echo base_url(); ?>contacts/delete_fields',
                data: "contact_field_id="+id
            })
            
            $('#formfields').find('.contact_field_'+id).fadeOut();
              $('#formfields').find('.contact_field_'+id).remove();
    }); 
//        $(document).on('click','#remove_field',function(){          //delete form field
//            var id = $(this).attr("value");
//            var del = confirm('Are you sure you want to delete this field?');
//            if(del == true){
//                $.ajax({
//                    type: "POST",
//                    url: '<?php echo base_url(); ?>contacts/delete_fields',
//                    data: "contact_field_id="+id
//                })
//                $(this).parents('li').fadeOut(function () {
//                    $(this).parents('li').remove();
//                });
//            }
//            else{
//                $('#delete_form_field').submit(function(e){
//                    e.stopPropagation();
//                    return false;
//                })
//            }
//            return false;
//        });
        //***********remove status*********************
           $(document).on('click', '#remove_status', function(){
                $("#delete_status_confirm").val($(this).attr('value')); 
    });
    $(document).on('click', "#delete_status_confirm", function (event){
        event.preventDefault();
        var id = $(this).val();//console.log(id);
             $('#modal-status-delete').modal('hide');
            $.ajax({
                type: "POST",
                url: '<?php echo base_url(); ?>contacts/delete_status',
                data: "contact_status_id="+id
            })
            
            $('#contactstatus').find('.contact_status'+id).fadeOut();
              $('#formfields').find('.contact_status'+id).remove();
    }); 
//        $(document).on('click','#remove_status',function(){        //delete status
//            var id = $(this).attr("value");
//            var del = confirm('Are you sure you want to delete this status?');
//            if(del == true){
//                $.ajax({
//                    type: "POST",
//                    url: '<?php echo base_url(); ?>contacts/delete_status',
//                    data: "contact_status_id="+id
//                })
//                $(this).parents('li').fadeOut(function () {
//                    $(this).parents('li').remove();
//                });
//            }
//            else{
//                $('#delete_form_status').submit(function(e){
//                    e.stopPropagation();
//                    // e.preventDefault();
//                    return false;
//                })
//            }
//            return false;
//        });
        //**********form reset************
        $(document).on('click','#contact_field',function(){
            $("#modal-add-form-field").find(".edit_field").text("Add Contact Field");
            $("#modal-add-form-field").find(".addfield").text("Create");
            $("#add_field_form").find('input[type=text], input[type=hidden], select').val(null);
            $('.icheckbox_minimal-grey').removeClass('checked');
        });
        $(document).on('click','#status_button',function(){
            $("#modal-colorpicker").find(".edit_status").text("Add Contact Status");
            $("#modal-colorpicker").find(".addstatus").text("Create");
            $("#add_status_form").find('input[type=text], input[type=hidden]').val(null);
            $('#user_id').val(<?php echo $this->session->userdata('userid'); ?>);
            $("#modal-colorpicker").find(".colorInner").css("background-color",'#777777');
        })
        //****************form field***************
        $(document).on('submit','#add_field_form',function(){
              var form = $("#add_field_form");
             form.validate();
            if(form.valid() == true){
            var url = "<?php echo base_url() ?>contacts/add_field"; // the script where you handle the form input.
            var  field =  $.ajax({
                type: "POST",
                url: url,
                data: $("#add_field_form").serialize(), // serializes the form's elements.
                async: false
            }).responseText; //console.log(field);
            $("#modal-add-form-field").modal('hide');
            var json = $.parseJSON(field); // console.log(json);//return false;
            if(json.action != 'updated'){
                $('#formfields li:first').clone().appendTo('#formfields').addClass('contact_field_'+json.contact_field_id).removeClass('hide');
            }
            $('#formfields .contact_field_'+json.contact_field_id).find('.contact_json').val(field);            
            //**********************************+
            $('#formfields .contact_field_'+json.contact_field_id).find('.name').text(json.name);
            $('#formfields .contact_field_'+json.contact_field_id).find('.type').text(json.type);
            $('#formfields .contact_field_'+json.contact_field_id).find('.edit-form-field').val(json.contact_field_id);
            $('#formfields .contact_field_'+json.contact_field_id).find('#remove_field').val(json.contact_field_id);
            $("#modal-add-form-field").find(".edit_field").text("Add Contact Field");
            $("#modal-add-form-field").find(".addfield").text("Create");
            $('.icheckbox_minimal-grey').removeClass('checked');
            }
        });
     
        //***********add status****************
        $('.statuscolor').change(function(){
            $('#statusflag').css('color', $(this).find('option:selected').val());
          
        })
        //**********status of contact***********************
        $(document).on('submit','#add_status_form',function(){
             var form = $("#add_status_form");
             form.validate();
            if(form.valid() == true){
            var url = "<?php echo base_url() ?>contacts/add_status"; 
            var status = $.ajax({
                type: "POST",
                url: url,
                data: $("#add_status_form").serialize(), 
                async: false
            }).responseText;
            $("#modal-colorpicker").modal('hide');
            //console.log(status);
            var json = $.parseJSON(status);
            //console.log(json);//return false;
            if(json.action != 'updated'){
                $('#contactstatus li:first').clone().appendTo('#contactstatus').addClass('contact_status'+json.contact_status_id).removeClass('hide');
            }
             $('#contactstatus .contact_status'+json.contact_status_id).find('.status_json').val(status);            
            //**********************************+
            $('#contactstatus .contact_status'+json.contact_status_id).find('.contents-user').text(json.name);
            $('#contactstatus .contact_status'+json.contact_status_id).find('.flagcolor').css('color',json.color);
            $('#contactstatus .contact_status'+json.contact_status_id).find('.edit_status_form').val(json.contact_status_id).attr('data-color',json.color);
            $('#contactstatus .contact_status'+json.contact_status_id).find('.delete_status').val(json.contact_status_id);
            $("#modal-colorpicker").find(".edit_status").text("Add Contact Status");
            $("#modal-colorpicker").find(".addstatus").text("Create");
            $('#statusflag').css('color','#777777');
            }
        });
    });
    //******************edit form fields*******************
    $(document).on('click', ".edit-form-field", function (event){
        event.preventDefault();
        //alert($(".contact_json").val());
        $("#modal-add-form-field").find(".edit_field").text("Edit Contact Field");
        $("#modal-add-form-field").find(".addfield").text("Update");
        var rowJson = $(this).nextAll(".contact_json").val();//alert(rowJson);
        $("#add_field_form").fillEditForm(rowJson);    
    })
    //******************edit status color form*******************
    $(document).on('click', ".edit_status_form", function (event){
        event.preventDefault();
        $("#modal-colorpicker").find(".edit_status").text("Edit Contact Status");
        $("#modal-colorpicker").find(".addstatus").text("Update");
        $("#modal-colorpicker").find(".colorInner").css("background-color",$(this).attr('data-color'));
        var rowJson = $(this).nextAll(".status_json").val();//alert(rowJson);
        $("#add_status_form").fillEditForm(rowJson);    
    })
    //*********************view contact detail***************
    $('.view_data').click(function(){
        var $this = $(this);
        var view = $this.parent().find('input').val();
        object = JSON.parse(view);
        jQuery.each(object,function(key, value){
            if(key == 'organization_id'){
                var fieldName = $("[data-name='"+key+"']");
                fieldName.text($this.attr('data-org'));
            }else{
                var fieldName = $("[data-name='"+key+"']");
                fieldName.text(value);
            }
        });
    })
    //*************data table*****************
    
    $(document).ready(function()
    {
        var $box = $('#colorPicker');
        $box.tinycolorpicker();
        var box = $box.data("plugin_tinycolorpicker")

        box.setColor("#777777");
    });
	
</script>
