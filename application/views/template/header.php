<!DOCTYPE html>
<html lang="en">
    <?php //$b = $this->session->userdata('briefcase[]'); $b = explode(',',$b); print_R($b);  die(); ?>
    <head>
        <title>iSalesMate</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="cache-control" content="no-cache">
        <meta http-equiv="expires" content="Thu, 19 Nov 1900 08:52:00 GMT">
        <link rel="shortcut icon"  href="<?php echo base_url(); ?>assets/images/icons/isalesmate_black_title.png">
        <link rel="apple-touch-icon" href="<?php echo base_url(); ?>assets/images/icons/favicon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url(); ?>assets/images/icons/favicon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url(); ?>assets/images/icons/favicon-114x114.png">
        <!--Loading bootstrap css-->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/FileIcon.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/commonfiles/fonts1.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/commonfiles/fonts2.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/jquery-ui-1.10.4.custom/css/ui-lightness/jquery-ui-1.10.4.custom.min.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/font-awesome/css/font-awesome.min.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/bootstrap/css/bootstrap.min.css">
        <!--LOADING STYLESHEET FOR PAGE-->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/intro.js/introjs.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/calendar/zabuto_calendar.min.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/sco.message/sco.message.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/intro.js/introjs.css">
        <!--LOADING STYLESHEET FOR colorpicker-->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/bootstrap-colorpicker/css/colorpicker.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/bootstrap-datepicker/css/datepicker.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/bootstrap-clockface/css/clockface.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/bootstrap-switch/css/bootstrap-switch.css">
        <!--LOADING STYLESHEET contents channels list-->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/jplist/html/css/jplist-custom.css">
        <!--LOADING STYLESHEET channels-->
        <link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" type="text/css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/result-light.css" type="text/css" rel="stylesheet">
        <!--LOADING STYLESHEET Table sorter-->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/jquery-tablesorter/themes/blue/style-custom.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/select2/select2-madmin.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/bootstrap-select/bootstrap-select.min.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/multi-select/css/multi-select-madmin.css">
        <!--gallery channel-->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/lightbox/css/lightbox.css">
        <!--contact data table-->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/DataTables/media/css/jquery.dataTables.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/DataTables/extensions/TableTools/css/dataTables.tableTools.min.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/DataTables/media/css/dataTables.bootstrap.css">
    <!--       <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/website.css" type="text/css" media="screen"/>-->
        <!--Loading style vendors-->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/animate.css/animate.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/jquery-pace/pace.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/iCheck/skins/all.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/jquery-notific8/jquery.notific8.min.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/bootstrap-daterangepicker/daterangepicker-bs3.css">
        <!--Loading style-->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/themes/style2/red-grey.css" class="">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/themes/style1/orange-blue.css" class="default-style">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/themes/style1/orange-blue.css" id="theme-change" class="style-change color-change">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/themes/style2/orange-blue.css" class="">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style-responsive.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/home.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/prettyPhoto.css">
        <!--core js-->
        <script src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery-migrate-1.2.1.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
        <script src="<?php echo base_url() ?>assets/js/jquery.md5.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/Common/common.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.prettyPhoto.js"></script>


        <script>
            $.fn.ajax_form_submit = function(Json, Action,valid){
                valid=valid || 'true';
                if(((valid=='true') && $(this).valid()) || (valid=='false')){
                    return $.ajax({
                        type: "POST",
                        url: Action,
                        data: Json,
                        async: false
                    }).responseText;
                }        
            }
        </script>
    </head>
    <body>
        <!--start MODAL of edit link-->
        <div id="login-user-edit" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!--<form class="form-horizontal form-validate" id="edit_password_form">-->
                    <form class="form-horizontal form-validate" id="edit_login_user_form">
                        <div class="modal-header"><button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button><h4 id="modal-login-label" class="modal-title"><?php echo $this->session->userdata('username'); ?></h4>
                        </div>
                        <div class="modal-body">
                            <div class="form">                                   
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="text-center mbl">
                                            <img class="img-circle-edit-login-user" style="border: 5px solid #fff; border-radius:50%; box-shadow: 0 2px 3px rgba(0,0,0,0.25); height: 128px; width: 128px;" src="<?php echo base_url(); ?>assets/upload/<?php echo $this->session->userdata('user_img'); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3" style=" text-align: left;">First Name<span class="require">*</span></label>
                                    <div class="col-md-9">
                                        <input id="first_name" name="first_name" maxlength="30" type="text" value="<?php echo $this->session->userdata('first_name'); ?>" class="form-control required"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3" style=" text-align: left;">Last Name<span class="require">*</span></label>
                                    <div class="col-md-9">
                                        <input id="last_name" maxlength="30" name="last_name" type="text" value="<?php echo $this->session->userdata('last_name'); ?>" class="form-control required"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3" style=" text-align: left;">Email_id<span class="require">*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" maxlength="50" name="email_id" id="email_id_login_user" value="<?php echo $this->session->userdata('email_id'); ?>" placeholder="Email Address" class="form-control required email" />
                                        <input type="hidden" id="emails" value='<?php echo json_encode($emails, JSON_HEX_APOS); ?>' class="" >
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label col-md-3" style=" text-align: left;">Timezone<span class="require">*</span></label>
                                    <div class="col-md-9">
                                        <select id="timezone" name="timezone" class="form-control required">
                                                            <option value="0">Please, select timezone</option>
                                                            <?php foreach ($timezone as $t) { ?>
                                                                <option value="<?php echo $t['TimeZoneId']; ?>" <?php if($t['TimeZoneId'] == $this->session->userdata('timezone')) echo 'selected="selected"'; ?> ><?php echo $t['TimeZoneId']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3" style=" text-align: left;">Briefcases</label>
                                    <div class="col-md-9">
                                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                                            <select multiple="true" name="briefcase[]" class="select2-multi-value form-control channel_ids">
                                                <?php $b = $this->session->userdata('briefcase[]'); $b = explode(',',$b); //echo $b;die();
                                                foreach ($briefcase_detail as $briefcase) { ?>
                                                    <option value="<?php echo $briefcase['briefcase_id']; ?>" <?php foreach($b as $b_id){if($briefcase['briefcase_id'] == $b_id) echo 'selected="selected"';} ?>><?php echo $briefcase['name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3" style=" text-align: left;">Groups</label>
                                    <div class="col-md-9">
                                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-users"></i></span>
                                                            <select multiple="multiple" name="groups[]" class="select2-multi-value-group form-control group_ids">
                                                                <?php $g = $this->session->userdata('groups[]'); $g = explode(',',$g);
                                                                foreach ($group_detail as $groups) { ?>
                                                                    <option value="<?php echo $groups['group_id']; ?>" <?php foreach($g as $g_id){if($groups['group_id'] == $g_id) echo 'selected="selected"';} ?>><?php echo $groups['name']; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3" style=" text-align: left;">Password</label>
                                    <div class="col-md-9">
                                        <input type="password" maxlength="32" value="<?php echo $this->session->userdata('password'); ?>" class="form-control required" name="password" id="password" value=""/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3" style=" text-align: left;">User Image<span class="require">*</span></label>
                                    <div class="col-md-9">
                                        <input id="txt"  maxlength="200" name="txt" class="form-control" type = "text" value = "<?php $image = explode('/',$this->session->userdata('user_img')); echo end($image); ?>" onclick ="javascript:document.getElementById('file').click();">
                                        <input id = "file" type="file" style='visibility: hidden;' class="" name="user_img" onchange="ChangeText(this, 'txt');"/>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" class="required" name="user_id" id="user_id" value="<?php echo $this->session->userdata('user_id'); ?>"> 
                                        <input type="hidden" name="organization_id" class="required" id="org" value="<?php echo $this->session->userdata('organization_id'); ?>">
                            <button id="edit_password_btn" type="submit" class="btn btn-grey">Save</button>
                            <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--END MODAL link-->
        <!--BEGIN BACK TO TOP--><a id="totop" href="#"><i style="margin-top: 0px" class="fa fa-angle-up"></i></a>
        <!--END BACK TO TOP-->
        <!--BEGIN TOPBAR-->
        <div id="header-topbar-option-demo" class="page-header-topbar">
            <nav id="topbar" role="navigation" style="margin-bottom: 0; z-index: 2;" class="navbar navbar-default navbar-static-top">
                <div class="navbar-header">
                    <button type="button" data-toggle="collapse" data-target=".sidebar-collapse" class="navbar-toggle"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                    </button>
                    <a id="logo" href="<?php echo base_url(); ?>content_briefcases/briefcase" class="navbar-brand" style=" padding:0;">
                        <span class="fa fa-rocket"></span>
                        <span class="logo-text" style=" display: inline-flex; display: -webkit-flex; background-color: #393939; display: -webkit-inline-flex; display: -ms-inline-flexbox; flex-direction: row;">
                            <img src="<?php echo base_url(); ?>assets/images/mail/isalesmate_cno_title.png"  style="background-color: #393939; height: 50px; margin-right: 172px; padding-right: 13px; padding-left: 13px;">
                            
                        </span>
                        <span style=" display: inline-flex; display: -webkit-flex;  display: -webkit-inline-flex; display: -ms-inline-flexbox; flex-direction: row;">
                            <img src="<?php echo base_url(); ?>assets/images/mail/isalesmate_title_only.png"  style="height: 30px; margin-top: -40px; margin-left: 65px;">
                        </span>
                        <span style="display: none; height: 100%; width: 100%; " class="logo-text-icon">
                            <b>
                                <img src="<?php echo base_url(); ?>assets/images/mail/isalesmate_with_title.png" style="height:100%; width:100%; background-color: #393939; margin-top: -20px;">
                            </b>
                            
                        </span>
                    </a>

                </div>
                <div class="topbar-main" style=" background-color: #393939;"><a id="menu-toggle" href="#" class=""><i class="fa fa-bars"></i></a>
                    <ul id="login_user_info" class="nav navbar navbar-top-links navbar-right mbn">
                        <li class="dropdown topbar-user">
                            <a data-hover="dropdown" class="dropdown-toggle" style=" padding: 8px 16px 6px;">
                                <?php $userimage = $this->session->userdata('user_img'); ?>
                                <img src="<?php echo base_url(); ?>assets/upload/<?php echo ($userimage != '') ? $userimage : (($this->session->userdata('type') == 'owner') ? 'users/owner.png' : 'users/admin.png' ); ?>" style="background:none;  border-radius:50%; height: 35px; width: 35px;" alt="" class="img-responsive img-circle-header" />&nbsp; <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-user pull-right">
                                <li>
                                    <a href="#" data-toggle="modal" data-target="#login-user-edit" id="edit_profile_link" rel="userform" value="<?php echo $this->session->userdata('userid'); ?>"><i class="fa fa-user"></i>Edit Profile</a>
                                    <input type="hidden" class="login_user_json" value='<?php echo json_encode($this->session->userdata, JSON_HEX_APOS); ?>'>
                                </li>
                                <li><a href="<?php echo base_url(); ?>logout"><i class="fa fa-lock"></i>&nbsp;Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!--END TOPBAR-->
        <div id="wrapper">
            <script>
                $(document).ready(function(){
                    $('#email_id_login_user').popover({
                        trigger: 'manual', 
                        content:'Email id already exist. Try another one.',
                        placement:'left',
                        container:'body'
                    });
                    //*********************briefcase group select box*******************
                    $(".select2-multi-value").select2();
                    $(".select2-multi-value-group").select2();
                    //*************email id validation******************
                    $('#email_id_login_user').change(function(e){
                        e.preventDefault();
                        var email = $.ajax({
                            type: "POST",
                            url: "<?php echo base_url() ?>users/check_email",
                            data: {email_id:$("#email_id_login_user").val(),user_id:$('#user_id').val()},
                            async: false
                        }).responseText;
                        if(email === 'already exist'){
                            $('#email_id_login_user').popover('show');
                            $('#email_id_login_user').addClass('invalid');
                            $('#email_id_login_user').parent().addClass('state-error');
                            $('#email_id_login_user').val(null);
                        } else{
                            $('#email_id_login_user').popover('hide');
                            $('#email_id_login_user').removeClass('invalid');
                            $('#email_id_login_user').parent().removeClass('state-error');
                        }
                    });
                    //****************user form  submit***************************************************************************    
                    $('#edit_login_user_form').submit(function(e){
                        e.preventDefault();
                        $('#email_id_login_user').popover('hide');
                        var form = $("#edit_login_user_form");
                        form.validate();
                        if(form.valid()){
                            $('.disable').removeAttr('name');
                            $('#login-user-edit').modal('hide');
                            //**********form submition******************
                            var user = $.ajax({
                                type: "POST",
                                enctype: 'multipart/form-data',
                                url: "<?php echo base_url() ?>users/insert_user",
                                data: new FormData($(this)[0]),
                                async: false,
                                cache: false,
                                contentType: false,
                                processData: false
                            }).responseText;
                            //*******update condition************
                            var json = $.parseJSON(user);// console.log(json);//return false;
                            var user_name = json.name;
                            var session_user = <?php echo $this->session->userdata('userid'); ?>;
                            if(session_user == json.user_id){
                                $('#side-menu > .user-panel > .info > p:first').text(json.name);
                            } var src = '<?php echo base_url(); ?>assets/upload/';
                            if(json.user_img != '') {
                                src +=json.user_img;
                            } else {
                                switch (json.user_type) {
                                    case "owner": src += 'users/owner.png';
                                        break;
                                    case "tablet_user": src += 'users/user.png';
                                        break;
                                    case "administrator": src += 'users/admin.png';
                                        break;  
                                }
                            } $('#login-user-edit').find('#txt').attr('src',src.split("/").pop());
                            src+='?timestamp=' + new Date().getTime();
                            $('#side-menu > .user-panel > .thumb > img').attr('src',src);
                            $('#login-user-edit').find('.img-circle-edit-login-user').attr('src',src);
                            $('#login_user_info').find('.img-circle-header').attr('src',src);
                            $(this).notification('Your profile updated successfully',user_name);   
                        }
                    });
                    //*****************notification*************************
                    $.fn.notification = function(message, heading) {
                        $.notific8(message, {
                            life: 2000,
                            heading: heading,
                            theme: 'ebony',
                            sticky: false,
                            horizontalEdge: 'top',
                            verticalEdge: 'right',
                            zindex: 1500,
                            icon: false,
                            closeText: 'close',
                            onInit: null,
                            onCreate: null,
                            onClose: null
                        });
                    };
                });
                //************file uplooad*************
                function ChangeText(oFileInput, sTargetID) {
                    document.getElementById(sTargetID).value = oFileInput.value;
                }
            </script>
           