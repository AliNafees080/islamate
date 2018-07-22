
<div id="wrapper">
    <!--BEGIN PAGE WRAPPER-->
    <div id="page-wrapper">
        <?php //echo '<pre>'; //print_r($this->session->userdata('timezone')); echo '</pre>'; ?>

        <!--BEGIN TITLE & BREADCRUMB PAGE-->
        <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
            <div class="page-header pull-left">
                <div class="page-title"><i class="fa fa-home" style=" margin-top: 7px;"></i>&nbsp;&nbsp;Announcements</div>
            </div>
            <!--announcement button-->
            <!--                <div class="row mbl">-->
            <div class="col-lg-4 pull-right user_buttons">
                <a id="new_announcement" class="btn btn-grey form_button pull-right" rel="announcement"><i class="fa fa-bullhorn"></i>&nbsp; New Announcement</a>
            </div>
            <!--                </div>-->
            <!--announcement button-->
            <div class="clearfix"></div>
        </div>
        <!--END TITLE & BREADCRUMB PAGE-->
        <!--BEGIN CONTENT-->
        <div class="page-content">
            <div id="tab-general">
                <!--        Model to delete for announcement    -->
                <div id="modal-announcement-delete" tabindex="-1" data-keyboard="false" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <p>Would you like to delete selected announcement?</p>
                            </div>
                            <div class="modal-footer">
                                <button id="delete_announcement_confirm" type="button"  class="btn btn-grey" value="" >OK</button>
                                <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>

                            </div>
                        </div>
                    </div>
                </div>
                <!--            End model-->
                <!--announcement form-->
                <div class="row mbl hide announcement">
                    <div class="col-lg-12">
                        <div class="panel panel-grey">
                            <div class="edit-heading panel-heading">Send Announcement</div>
                            <div class="panel-body pan">
                                <form action="#" class="form-validate form-horizontal" name="add_announcement_form" id="add_announcement_form">
                                    <div class="form-body pal">
                                        <h3>Send To</h3>
                                        <!--any briefcase and date-->
                                        <div class="row">
                                            <!--briefcase-->
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label for="usingAnyBriefcase" class="col-md-3 control-label">Any Briefcase</label>
                                                    <div class="col-md-9">
                                                        <label class="send-to">
                                                            <input id="optionsRadios1" type="radio" class="disable switch" name="optionsRadios" value="option1" checked="checked" />&nbsp;using any briefcase</label>
                                                        <div id="all_briefcase"  class="hide-select hide col-md-9">
                                                            <select multiple="true" name="all_briefcase" id=""   class="select2-multi-value-all all_briefcase_json form-control ">
                                                                <?php foreach ($detail['briefcases'] as $briefcase) {
                                                                    ?>
                                                                    <option value="<?php echo $briefcase['briefcase_id']; ?>" > <?php echo $briefcase['name']; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--date-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="datetime" class="col-md-3 control-label">Date & time<span class='require'>*</span>
                                                    </label>

                                                    <div class="col-md-9">
                                                        <div class="input-group datetimepicker-default date" id="date_time_to_send">
                                                            <input type="text" data-format="YYYY-MM-DD HH:mm:ss" name="time_to_send" value="" class="form-control announcemnt_time required"  />
                                                            <span class="input-group-addon" ><i class="fa fa-calendar"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--any briefcase and date-->
                                        <!--using specific briefcases-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <label class="control-label col-md-3">Briefcases</label>
                                                    <div class="col-md-9">
                                                        <input type="radio" name="optionsRadios" class="disable switch" name="" id="optionsRadios2">
                                                        <label for="optionsRadios2" style=" padding: 0px; padding-left: 2px;">using following briefcases ...</label>

                                                        <div class="reveal-if-active" style=" margin-left: -34px; height: 32px;">
                                                            <div id="address_to_briefcase" name="address_to_briefcase"  class="hide-select col-md-9 require-if-active" data-require-pair="#optionsRadios2">
                                                                <select multiple="true" name="briefcase" id="briefcase"   class="select2-multi-value briefcasejson form-control" style=" font-size: 16px;">
                                                                    <?php for ($i = 0; $i < count($detail['briefcases']); $i++) { ?>
                                                                        <option value="<?php echo $detail['briefcases'][$i]['briefcase_id']; ?>" > <?php echo $detail['briefcases'][$i]['name']; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label class="col-md-3">
                                                    </label>
                                                    <div class="col-md-9">
                                                        <input id="requestToUpdate" class="switch"  type="checkbox" name="request_to_update" value="" />&nbsp;&nbsp;
                                                        <label for="requestToUpdate" class=" control-label">Request user to update content</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--using specific briefcases-->
                                        <!--using specific groups-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <label class="control-label col-md-3">Groups</label>
                                                    <div class="col-md-9 " >
                                                        <input type="radio" class="disable switch" name="optionsRadios" id="optionsRadios3">
                                                        <label for="optionsRadios3" style=" padding: 0px; padding-left: 2px;">in the following groups ...</label>

                                                        <div class="reveal-if-active" style=" margin-left: -34px; height: 32px;">
                                                            <div id="group-select" name="group-select" data-require-pair="#optionsRadios3" class="require-if-active hide-select col-md-9 " style=" ">
                                                                <select multiple="true" name="group" id="group" class="select2-multi-value-group groupjson form-control disable" style=" font-size: 16px;">
                                                                    <?php for ($i = 0; $i < count($detail['groups']); $i++) { ?>
                                                                        <option value="<?php echo $detail['groups'][$i]['group_id']; ?>" > <?php echo $detail['groups'][$i]['name']; ?></option>
                                                                    <?php } ?>
                                                                </select>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">                                           
                                            <div class="col-md-6">
                                                <div class="form-group user_type_field">
                                                    <label for="role" class="col-md-3 control-label">DST</label>
                                                    <div class="col-md-9">
                                                        <select class="select2-value-dst form-control disable" id="DST" name="DST">
                                                            <option value="1">Enable</option>
                                                            <option value="0" selected="selected">Disable</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="timezone" class="col-md-3 control-label">Timezone
                                                    </label>
                                                    <div class="col-md-9">
                                                        <select class="select2-value-timezone form-control disable" id="timezone" name="timezone">
                                                            <?php foreach ($detail['timezone'] as $timezone) { ?>
                                                                <option value="<?php echo $timezone['TimeZoneId'] ?>" <?php
                                                                if ($this->session->userdata('timezone') == $timezone['TimeZoneId']) {
                                                                    echo "selected='selected'";
                                                                }
                                                                ?>><?php echo $timezone['TimeZoneId']; ?></option>
<?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h3>Announcement</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="message" class="col-md-3 control-label">Announcement<span class='require'>*</span></label>
                                                    <div class="col-md-9">
                                                        <textarea name="message" maxlength="200" class="form-control required" rows="4" style="resize:none;"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--                                            <div class="col-md-6">
                                                                                        </div>-->
                                        </div>
                                    </div>
                                    <div class="form-actions text-right pal">
                                        <input type="hidden" class="" name="announcement_id" id="announcement_id" value="">
                                        <!--<input type="hidden" name="type"  id="announcement_type" value="">-->
                                        <input type="hidden" name="address_to" id="briefcase_group_json" value=''>
                                        <input type="hidden" value="" name="creation_time" class="" id="creation_time">
                                        <!--<input type="hidden" value="" name="created_by" class="" id="created_by">-->
                                        <input type="hidden" value="" name="user_id" class="" id="user_id">
                                        <button type="submit" data-focus="#announcement_table" class="add_announcement btn btn-grey">Send</button>&nbsp;
                                        <button type="button" rel="announcement" data-focus="#announcement_table" class="btn btn-default close_form">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--announcement form echo date("Y-m-d h:i:s");-->
                <!-- announcement table-->

                <div class="row mbl">

                    <div class="col-lg-12" id="announcement_table">
                        <div class="panel panel-grey">
                            <div class="panel-heading">Announcements</div>
                            <div class="panel-body">
                                <form class="" id="announcement_delete_form" method="POST">
<!--                                    <table class=" announcement_table table table-hover table-striped table-bordered table-advanced tablesorter" style="table-layout: fixed">-->
                                    <table id="announcement_table_id" class="announcement_table table table-hover table-striped table-bordered table-advanced table-condensed  display">   
                                        <thead>
                                            <tr>
<!--                                                <th width="5%">#</th>-->
                                                <th width="16%">Created at</th>
                                                <th width="22%">Address to</th>
                                                <th width="17%">Announcement</th>
                                                <th width="22%">Status</th>
                                                <th width="9%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>                                          
<?php foreach ($detail['information'] as $information) { ?>
        <!--//                                                $address_val = $information['address_to']; //echo'<pre>'; print_r($information); echo'</pre>';-->   

                                                <tr class="announcement_<?php echo $information['announcement_id']; ?>">

                                                    <td style=""><?php echo $information['creation_time']; ?><br> By
                                                        <span class="user_name"><?php echo $information['user_name']; ?></span>
                                                    </td>
                                                    <td class="all_using_briefcase wrapword">
                                                        All Users
                                                        <?php
                                                        if (!empty($information['briefcase_name']) && empty($information['all_briefcase'])) {
                                                            echo 'using any of the briefcase(s) ' . $information['briefcase_name'];
                                                        } elseif (!empty($information['group_name']) && empty($information['all_briefcase'])) {
                                                            echo 'using any of the group(s) ' . $information['group_name'];
                                                        } else {
                                                            echo '';
                                                        }
                                                        ?>

                                                    </td>
                                                    <td class="wrapword message"><?php echo $information['message']; ?></td>
                                                    <td>
                                                        <span class="label label-sm badge-playground type">


                                                        <?php echo ($information['type'] == 'sent') ? $information['type'] : 'scheduled'; ?>
                                                        </span>&nbsp; <?php
                                                        if ($information['type'] == 'manual') {
                                                            echo 'for';
                                                        } else {
                                                            echo 'at';
                                                        }
                                                        ?>
                                                        <span class="time_to_send"><?php echo $information['time_to_send']; ?></span>
                                                    </td>
                                                    <td  style="text-align:right;">
                                                        <?php if ($information['type'] == 'manual') { ?>
                                                            <button type="button" title="Edit announcement" value="<?php echo $information['announcement_id']; ?>"  class="btn edit-form btn-grey btn-xs"><i class="fa fa-edit"></i>
                                                            </button>
    <?php } ?>
                                                        <button type="button" value="<?php echo $information['announcement_id']; ?>" data-toggle="modal" data-target="#modal-announcement" title="View announcement"  class="btn view_json btn-grey btn-xs"><i class="fa fa-eye"></i>
                                                        </button>
                                                        <input type="hidden"  class="address_value" value=''>
                                                        <input type="hidden" class="annoucement_json" value='<?php echo $data_json = json_encode($information, JSON_HEX_APOS); ?>' />
                                                        <button class="btn btn-grey btn-xs delete_row" title="Delete announcement" data-target="#modal-announcement-delete" data-toggle="modal" value="<?php echo $information['announcement_id']; ?>"  type="button"><i class="fa fa-trash-o"></i>
                                                        </button>
                                                    </td>
                                                </tr>
<?php } ?>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!--announcement table-->

                <!--BEGIN MODAL view announcement-->
                <div id="modal-announcement" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                <h4 class="modal-title">Announcement</h4>
                            </div>
                            <div class="modal-body">
                                <table class="table table-striped table-hover">
                                    <tbody>
                                        <tr>
                                            <td width="50%">Created At</td>
                                            <td style="word-break: break-all;" data-name="creation_time">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="50%">Time to send</td>
                                            <td style="word-break: break-all;" data-name="time_to_send">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="50%">Created By</td>
                                            <td style="word-break: break-all;" data-name="user_name"></td>
                                        </tr>
                                        <tr>
                                            <td width="50%">Addressed To</td>
                                            <td style="word-break: break-all;" data-name="address_to">
                                                <span class="view_message"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="50%">Request Update</td>
                                            <td style="word-break: break-all;" data-name="request_to_update">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="50%">Status</td>
                                            <td style="word-break: break-all;" data-name="type"> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="50%">Message</td>
                                            <td style="word-break: break-all;" data-name="message">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">

                            </div>
                        </div>
                    </div>
                </div>
                <!--END MODAL View announcement-->

                <div class="row mbl">

                    <div class="col-md-12">

                    </div>
                </div>
                <div class="row mbl">



                </div>

            </div>
        </div>
        <!--END CONTENT-->
    </div>
    <!--END PAGE WRAPPER-->
</div>
<script>
    $(window).load(function () {
        $("#announcement_table_id_filter").find(".dropdown-toggle").css("height", "34px");      //This code is applied to set height of search button manual   
    });

    $(document).ready(function () {



//$("#add_announcement_form").validate({
//        rules: {
//            time_to_send: "required",            
//        },
//        messages: {
//            time_to_send: "",            
//        }
//    });


        // INIT DATATABLES
        $(function () {
            // Init
            var spinner = $(".spinner").spinner();
            var table = $('#announcement_table_id').dataTable({
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
            });

            var tableTools = new $.fn.dataTable.TableTools(table, {
                "sSwfPath": "../vendors/DataTables/extensions/TableTools/swf/copy_csv_xls_pdf.swf",
                "buttons": [
                    "copy",
                    "csv",
                    "xls",
                    "pdf",
                    {"type": "print", "buttonText": "Print me!"}
                ]
            });
//    $(".DTTT_container").css("float","right");
            $(".DTTT_container").css("display", "none");
        });



        //*****************This code validate date field to select past dates*************
        var now = new Date();
        //now.setDate(now.getDate()+1);
        $('#date_time_to_send').datetimepicker({
            language: 'en-US',
            startDate: now,
            defaultDate: now
        });

        //*****************End code********************************
        //  var validate_object=$("#add_announcement_form").validate();
        //*********************briefcase group select box*******************
        $('.select2-multi-value-all').select2();
        $('.select2-multi-value-all').select2('destroy').find('option').prop('selected', 'selected').end().select2();

        $(".select2-multi-value").select2();
        $('.select2-size').select2({
            placeholder: "Select an option",
            allowClear: true
        });
        $(".select2-multi-value-group").select2();
        $('.select2-size').select2({
            placeholder: "Select an option",
            allowClear: true
        });
        //*************dynamic json of briefcase and group***************
        $(".select2-multi-value").click(function () {   //using briefcase
            var array = [];
            item = {};
            $(".briefcasejson").each(function () {

                item ["id"] = $(this).val();
                item ["type"] = $(this).attr("name");
                array = item;
            });
            var jsonString = JSON.stringify(array);
            // console.log(jsonString);
            $("#briefcase_group_json").val(jsonString);

        });
        $(".select2-multi-value-group").click(function () {   //using group
            var garray = [];
            gitem = {};
            $(".groupjson").each(function () {

                gitem ["id"] = $(this).val();
                gitem ["type"] = $(this).attr("name");
                garray = gitem;
            });
            var gjsonString = JSON.stringify(garray);
            // console.log(gjsonString);
            $("#briefcase_group_json").val(gjsonString);

        });
        $('#new_announcement').click(function () {
            form_reset("add_announcement_form");
            $("#add_announcement_form").find('div').removeClass('state-success');
            $("#add_announcement_form").find('input[type=text], input[type=hidden], textarea').removeClass('valid');
            $('input[type=radio]').attr('disabled', false);
            $(".select2-multi-value-all").select2('enable');
            $(".select2-multi-value-group").select2('enable');
            $(".select2-multi-value").select2('enable');
            $('#add_announcement_form').find('input[type=hidden], input[type=text] , input[type=checkbox], textarea').val(null);
            $('#optionsRadios1').attr('checked', true);
            if ($('#optionsRadios1').is(':checked')) {    //using any briefcase

                var array = [];
                item = {};
                $(".all_briefcase_json").each(function () {

                    item ["id"] = $(".select2-multi-value-all").val();
                    item ["type"] = $(".select2-multi-value-all").attr("name");
                    array = item;
                });
                var jsonString = JSON.stringify(array);
                // console.log(jsonString);
                $("#briefcase_group_json").val(jsonString);

            }
            $('#briefcase').select2('val', null);
            $('#group').select2('val', null);
            $(".announcement").find(".edit-heading").text("Send Announcement");
            $("#add_announcement_form").find(".add_announcement").text("Create");
            $(".announcement").removeClass('hide');
            $(".announcement").slideDown();
        })

        //****************announcement form  submit******************    
        $(document).on('submit', '#add_announcement_form', function (e) {
            e.preventDefault();
            var form = $("#add_announcement_form");
            form.validate();
            if (form.valid() == true) {
                $('input[type=radio]').attr('disabled', true);
                $(".select2-multi-value-all").select2('disable');
                $(".select2-multi-value-group").select2('disable');
                $(".select2-multi-value").select2('disable');
                if ($('#optionsRadios1').is(':checked')) {    //using any briefcase
                    $(".select2-multi-value-all").select2('enable');
                    $('.select2-multi-value-all').select2('destroy').find('option').prop('selected', 'selected').end().select2();
                    var array = [];
                    item = {};
                    $(".all_briefcase_json").each(function () {
                        // console.log($(".select2-multi-value-all").val());
                        item ["id"] = $(".select2-multi-value-all").val();
                        item ["type"] = $(".select2-multi-value-all").attr("name");
                        array = item;
                    });
                    var jsonString = JSON.stringify(array);
                    // console.log(jsonString);
                    $("#briefcase_group_json").val(jsonString);

                }

                $('#user_id').val(<?php echo $this->session->userdata('userid'); ?>);//alert($('#user_id').val());return false;
                var url = "<?php echo base_url() ?>announcements/insert_announcement"; // the script where you handle the form input.

                var announcement = $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#add_announcement_form").serializeArray(), // serializes the form's elements.
                    async: false
                }).responseText;
                var url = "";
                $(location).attr('href', url);
            } else {
                $("#date_time_to_send").find("em").remove();
                $("#date_time_to_send").parent().append('<i><em class="invalid" for="time_to_send" style="color: #db4c4a;font-size: 13px;">This field is required</em></i>');
            }
        });
        //**************delete announcement****************
        $(document).on('click', '.delete_row', function () {
            $("#delete_announcement_confirm").val($(this).val());
        });
        $(document).on('click', "#delete_announcement_confirm", function (event) {
            event.preventDefault();
            var id = $(this).val();//console.log(id);
            $('#modal-announcement-delete').modal('hide');
            $.ajax({
                type: "POST",
                url: '<?php echo base_url(); ?>announcements/delete_announcement',
                data: "announcement_id=" + id
            })

            $('#announcement_delete_form').find('.announcement_table > tbody > .announcement_' + id).fadeOut();
            $('#announcement_delete_form').find('.announcement_table > tbody > .announcement_' + id).remove();
            $(this).notification('Announcement deleted successfully', 'Announcement');
        });

        //*********************view announcement***************
        $(document).on('click', '.view_json', function (e) {
            e.preventDefault();
            var view = $(this).parent().find('.annoucement_json').val();//alert(view);
            object = JSON.parse(view);
            jQuery.each(object, function (key, value) {
                switch (key) {
                    case 'request_to_update':
                        var fieldName = $("[data-name='" + key + "']");
                        if (value == 0) {
                            fieldName.text('No');
                        } else {
                            fieldName.text('Yes');
                        }
                        break;
                    case 'briefcase_name':
                        if (object.all_briefcase != 1 && value != null) {
                            $('.view_message').text('All Users using any of the briefcase(s) ' + value);//console.log('briefcase');
                        }
                        break;
                    case 'group_name':
                        if (object.all_briefcase != 1 && value != null) {
                            $('.view_message').text('All Users using any of the group(s) ' + value);//console.log('group');
                        }
                        break;
                    case 'all_briefcase':
                        if (value == 1) {
                            $('.view_message').text('All Users');//console.log('all briefcase');
                        }
                        break;
                    case 'type':
                        var fieldName = $("[data-name='" + key + "']");
                        if (value == 'manual') { //console.log(value);
                            fieldName.text('scheduled');
                        } else {
                            fieldName.text(value);
                        }
                        break;
                    default:
                        var fieldName = $("[data-name='" + key + "']");
                        fieldName.text(value);

                }
            });
        })
        //********************edit form*******************************
        $(document).on('click', ".edit-form", function (event) {
            event.preventDefault();
            $('input[type=radio]').attr('disabled', false);
            $(".select2-multi-value-all").select2('enable');
            $(".select2-multi-value-group").select2('enable');
            $(".select2-multi-value").select2('enable'); //select2-value-dst
//            var $this = $(this);
            $(".announcement").find(".edit-heading").text("Edit Announcement");
            var rowJson = $(this).nextAll(".annoucement_json").val();//alert(rowJson);
            //console.log(rowJson); return false;
//            var add_value = $this.parent().find('.address_value').val(); //alert(add_value); 
            $("#add_announcement_form")[0].reset();
            $("#add_announcement_form").fillEditForm(rowJson);
            $("#add_announcement_form").find(".add_announcement").text("Update");
            $(".announcement").removeClass('hide');
            $(".announcement").slideDown();

        })
        //******function*********
        $.fn.fillEditForm = function (rowJson) {
            $(this).clear_form_elements();
            var obj = $(this).parse_json_custom(rowJson);
            $.each(obj, function (key, value) {
                switch (key) {
                    case "all_briefcase":;
                        if (value != 0) {
                            var field = $("[name='all_briefcase']");
                            var array = (obj.ann_briefcase)?obj.ann_briefcase.split(','):[];
                            field.select2('val', array);
                            $('#optionsRadios1').attr('checked', true);
                            $('#optionsRadios2').attr('checked', false);
                            $('#optionsRadios3').attr('checked', false);
                            var all = [];
                            item = {};
                            $(".all_briefcase_json").each(function () {
                                item ["id"] = $(".select2-multi-value-all").val();
                                item ["type"] = $(".select2-multi-value-all").attr("name");
                                all = item;
                            });
                            var jsonString = JSON.stringify(all);
                            $("#briefcase_group_json").val(jsonString);
                        } break;
                    case "ann_briefcase":
                        if (value != null && obj.all_briefcase == 0) {
                            var field = $("[name='briefcase']");
                            var array = new Array;
                            array = value.split(',');
                            field.select2('val', array);
                            $('#optionsRadios2').attr('checked', true);
                            $('#optionsRadios3').attr('checked', false);
                            $('#optionsRadios1').attr('checked', false);
                        }
                        break;
                    case "ann_group":
                        if (value != null && obj.all_briefcase == 0) {
                            var field = $("[name='group']");
                            var array = new Array;
                            array = value.split(',');
                            field.select2('val', array);
                            $('#optionsRadios3').attr('checked', true);
                            $('#optionsRadios2').attr('checked', false);
                            $('#optionsRadios1').attr('checked', false);
                        }
                        break;
                    default:
                        break;

                } var fieldName = $("[name='" + key + "']");
                switch (fieldName.prop("type")) {
                    case "select-one" :
                        fieldName.find('option[value="' + value + '"]').prop('selected', true);
                        break;
                    case "radio" :
                    case "checkbox":
                        fieldName.each(function () {
                            $(this).prop("checked", ($(this).attr('value') == 1));
                        });
                    default:
                        fieldName.val(value);
                        break;
                }
            });
        }//*************reset form elements
        $.fn.clear_form_elements = function () {
            if ($(this).prop('tagName') == 'FORM') {
                $(this)[0].reset();
            } else {
                $(this).find(':input').each(function () {
                    switch ($(this).prop('type')) {
                        case 'checkbox':
                        case 'radio':
                            $(this).prop('checked', false);
                            break;
                        default :
                            $(this).val('');
                            break;
                    }
                });
            }
        }
        //*******parse json

        $.fn.parse_json_custom = function (str) {//alert('json parse');
            return $.parseJSON(str.replace(/\&apos/g, "'"));
        }

    });
    function form_reset(formid) {
        $('#' + formid)[0].reset();
        $('#' + formid).find(".state-success").removeClass("state-success");
        $('#' + formid).find(".state-error").removeClass("state-error");
        $('#' + formid).find("em").remove();
    }
    //**************checkbox with multiselect**************
    var FormStuff = {

        init: function () {
            // kick it off once, in case the radio is already checked when the page loads
            this.applyConditionalRequired();
            this.bindUIActions();
        },

        bindUIActions: function () {
            // when a radio or checkbox changes value, click or otherwise
            $("input[type='radio'], input[type='checkbox']").on("change", this.applyConditionalRequired);
        },

        applyConditionalRequired: function () {
            // find each input that may be hidden or not
            $(".require-if-active").each(function () {
                var el = $(this);
                // find the pairing radio or checkbox
                if ($(el.data("require-pair")).is(":checked")) {
                    // if its checked, the field should be required
                    el.prop("required", true);
                } else {
                    // otherwise it should not
                    el.prop("required", false);
                }
            });
        }

    };

    FormStuff.init();
    //*****************notification*************************

</script>