
<?php
//print_r($info); die();

?>
<div id="wrapper">
    

    <!--BEGIN PAGE WRAPPER-->
    <div id="page-wrapper">
        <!--BEGIN TITLE & BREADCRUMB PAGE-->
        <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
             <div class="page-header pull-left">
                <div class="page-title"><i class="fa fa-home" style=" margin-top: 7px;"></i>&nbsp;&nbsp;Users</div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-left">
                <li class="active">&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;<a href="">Groups</a></li>
                <div class="clearfix"></div>
            </ol> 
            <!--button-->
            <div class="col-lg-4 pull-right user_buttons">
                <a class="btn  btn-grey form_button pull-right" id="new_group" style="margin-left:10px;" data-focus=".up" rel="groupform" href="javascript:void(0)"><i class="fa fa-group"></i>&nbsp;+ New Group</a>
            </div>
            <div class="clearfix"></div>
        </div>
        <!--END TITLE & BREADCRUMB PAGE-->
        <!--BEGIN CONTENT-->
        <div class="page-content">
            <div id="tab-general">
                 <!--        Model to delete for group    -->
            <div id="modal-group-delete" tabindex="-1" data-keyboard="false" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <p>Would you like to delete selected group?</p>
                        </div>
                        <div class="modal-footer">
                            <button id="delete_group_confirm" type="button"  class="btn btn-grey" value="" >OK</button>
                            <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!--            End model-->
             <!--        Model to delete for user   -->
            <div id="modal-user-delete" tabindex="-1" data-keyboard="false" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <p>Would you like to delete selected user?</p>
                        </div>
                        <div class="modal-footer">
                            <button id="delete_user_confirm" type="button"  class="btn btn-grey" value="" >OK</button>
                            <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!--            End model-->
                <!--BEGIN MODAL User PORTLET-->
                <div id="modal-config" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                <h4 class="modal-title">Diane Harris</h4>
                            </div>
                            <div class="modal-body">
                                <table class="table table-striped table-hover">
                                    <tbody>
                                        <tr>
                                            <td colspan="2">
                                                <div class="text-center mbl">
                                                        <img class="img-circle-view" style="border: 5px solid #fff; border-radius:50%; box-shadow: 0 2px 3px rgba(0,0,0,0.25); height: 128px; width: 128px;" src="<?php echo base_url()."assets/images/icons/loader1.GIF"; ?>">
                                                    </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="50%">User Name</td>
                                            <td><span data-name="name"></span></td>
                                        </tr>
                                        <tr>
                                            <td width="50%">Email</td>
                                            <td data-name="email_id">name@example.com</td>
                                        </tr>
                                        <tr>
                                            <td width="50%">Role</td>
                                            <td data-name="role_in_platform">Administrator</td>
                                        </tr>
                                        <tr>
                                            <td width="50%">Timezone</td>
                                            <td data-name="timezone">Asia/Calcutta</td>
                                        </tr>
                                        <tr>
                                            <td width="50%">Groups</td>
                                            <td data-name="group_name">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="50%">Briefcases</td>
                                            <td data-name="briefcase_name">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="50%">Created at</td>
                                            <td data-name="created">Jun 03, 2014</td>
                                        </tr>
                                        <tr>
                                            <td width="50%">Last login</td>
                                            <td data-name="last_login">Jun 06, 2014</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">

                            </div>
                        </div>
                    </div>
                </div>
                <!--END MODAL User PORTLET-->

                <!-- add group form-->
                <div class="groupform row mbl hide ">
                    <div class="col-lg-12">
                        <div class="panel panel-grey">
                            <div class="panel-heading group_heading">Add Group</div>
                            <div class="panel-body pan">
                                <form  id="add_group_form" class="form-validate" method="POST">
                                    <div class="form-body pal" style=" height: 210px">
                                        <div class="form-group">
                                            <label for="groupName" class="control-label col-md-1">Name<span class='require'>*</span>
                                            </label>
                                            <div class="input-icon col-md-11"><i class="fa fa-user"></i>
                                                <input id="groupName" maxlength="50" name="name" type="text" placeholder="GroupName" class="form-control required alphanumeric" />
                                            </div>
                                        </div> <br/>  <br/>  
                                       <div class="form-group">
                                            <label class="control-label col-md-1">Users</label>
                                            <div class="col-md-11">
                                                <div class="input-group"><span class="input-group-addon"><i class="fa fa-users"></i></span>
                                                    <select multiple="multiple" name="users[]" id="selected_users" class="select2-multi-value-group form-control group_ids">
                                                        <?php foreach ($info['detail'] as $users) { ?>
                                                            <option value="<?php echo $users['user_id']; ?>"><?php echo $users['name']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div> <br/>    <br/>  
                                        <div class="form-group mbn">
                                            <label for="inputContent" class="control-label col-md-1">Description</label>
                                            <div class="input-icon col-md-11">                                                
                                                <textarea id="inputContent" maxlength="200" name="description" rows="3" class="form-control col-md-11" style="resize:none;"></textarea>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="form-actions text-right pll prl">
                                        <input type="hidden" name="group_id" id="group_id" value="">
                                        <input type="hidden" name="user_id" id="group_user_id" value="<?php echo $this->session->userdata('userid'); ?>">
                                        <button type="submit" rel="groupform" data-menu-title="" data-title-name="" data-ul-id="" class="btn btn-grey add_group">Create</button>&nbsp;
                                        <button type="button" rel="groupform" data-focus="#groups" class="close_form btn btn-default">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--add group form-->

                  <!--user form-->
                <div class="row hide userform">
                    <div class="col-lg-12">
                        <div class="panel panel-grey">
                            <div class="panel-heading form_heading">Add a User</div>
                            <div class="panel-body pan">
                                <form action="#" id="add_user_form" class="form-validate form-horizontal" enctype="multipart/form-data">
                                    <div class="form-body pal">
                                        <!--<h3>Personal</h3>-->
                                            <div class="row">
                                            <div class="col-md-12 user_image hide">
                                                <div class="form-group">
                                                    <div class="text-center mbl">
                                                        <img class="img-circle-edit" style="border: 5px solid #fff; border-radius:50%; box-shadow: 0 2px 3px rgba(0,0,0,0.25); height: 128px; width: 128px;" src="<?php echo base_url()."assets/images/icons/loader1.GIF"; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="first_name" class="col-md-3 control-label">First Name <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <input id="first_name" maxlength="30" name="first_name" type="text" placeholder="First Name" class="form-control required" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="last_name" class="col-md-3 control-label">Last Name <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <input id="last_name" maxlength="30" name="last_name" type="text" placeholder="Last Name" class="form-control required" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email_id" class="col-md-3 control-label">Email <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="input-icon"><i class="fa fa-envelope"></i>
                                                            <input type="text" maxlength="50" name="email_id" id="email_id" placeholder="Email Address" class="form-control required email" />
                                                            <input type="hidden" id="emails" value='<?php echo json_encode($info['emails'], JSON_HEX_APOS); ?>' class="" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="timezone" class="col-md-3 control-label">Timezone <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <select id="timezone" name="timezone" class="form-control required">
                                                            <option value="0">Please, select timezone</option>
                                                           <?php foreach ($info['timezone'] as $t) { ?>
                                                                <option value="<?php echo $t['TimeZoneId']; ?>"><?php echo $t['TimeZoneId']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Briefcases</label>
                                                    <div class="col-md-9">
                                                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                                                            <select multiple="true" name="briefcase[]" class="select2-multi-value form-control channel_ids">
                                                                <?php foreach ($info['briefcase'] as $briefcase) { ?>
                                                                    <option value="<?php echo $briefcase['briefcase_id']; ?>"><?php echo $briefcase['name']; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Groups</label>
                                                    <div class="col-md-9">
                                                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-users"></i></span>
                                                            <select multiple="multiple" name="groups[]" class="select2-multi-value-group form-control group_ids">
                                                                <?php foreach ($info['group'] as $groups) { ?>
                                                                    <option value="<?php echo $groups['group_id']; ?>"><?php echo $groups['name']; ?></option>
                                                                <?php } ?>
                                                            </select>
<!--                                                            <input type="hidden" name="group" id="group_json" value="">-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group user_type_field">
                                                    <label for="role" class="col-md-3 control-label">Role</label>
                                                    <div class="col-md-9">
                                                        <select id="role" name="user_type" class="form-control required">
                                                            <option value="tablet_user">User</option>
                                                            <option value="administrator">Administrator</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="user_img" class="col-md-3 control-label">User image</label>                                   
                                                    <div class="col-md-9">                                             
                                                        <input id="txt" maxlength="200" name="txt" class="form-control" type = "text" value = "Choose File" 
                                                               onclick ="javascript:document.getElementById('file').click();">
                                                        <input id = "file" type="file" style='visibility: hidden;' class="" name="user_img" onchange="ChangeText(this, 'txt');"/>
                                                        <!--<input type="hidden" value="" id="user_img" name="user_img">-->
                                                                                                          <!--<input type="file" name="user_img" id="user_img" >-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                           <h3 class="hide change_pswd">Password</h3>
                                          <div class="row hide change_pswd">
                                              <div class="col-md-6 hide">
                                                
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="changepass" class="col-md-3 control-label">Edit Password</label>
                                                    <div class="col-md-9">
                                                        <!--<div class="input-group "><span class="input-group-addon"><input id="specifypass" type="radio" name="password" class="disable" value="option2" /></span>-->
                                                            <!--<input type="text" class="disable form-control required" id="password_field" value=""/>-->
                                                            <input type="password" maxlength="32" class="form-control required" name="password" id="password" value=""/>
                                                        <!--</div>-->
                                                    </div>
                                                </div>
                                            </div>
                                              
                                        </div>

                                        <!--<h3>Password</h3>-->
                                    
                                    </div>
                                    <div class="form-actions text-right pal">
                                        <input type="hidden" class="required" name="user_id" id="user_id" value=""> 
                                        <!--<input type="hidden" name="password" id="password" value="">--> 
                                        <input type="hidden" name="organization_id" class="required" id="org" value="<?php echo $this->session->userdata('organization_id'); ?>">
                                        <!--<input type="hidden" name="creation_time" id="creation_time" class="required" value="">-->
                                        <input type="hidden" name="last_login" id="last_login" value="">
                                        <button type="submit" class="btn btn-grey add_user">Invite</button>&nbsp;
                                        <button type="button" rel="userform" data-focus="#groups" class="btn btn-default user_close_form">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--user form-->

                <!--user image list-->
                <div class="row mbl up" id="groups">
                    <div class="col-lg-12">
                        <div class="portlet box portlet-grey">
                            <div class="portlet-header">
                                <div class="caption">Groups</div>
                                <div class="tools"><i class="fa fa-chevron-up"></i>
                                </div>
                            </div>
                            <!------ user image block menu ---->
                            <div class="portlet-body">
                                <div class="gallery-pages">
                                    <!--group filter-->
                                    <form id="group_del_form" method="POST">
                                        <ul id="grouplist" class="list-filter list-unstyled">
                                            <!--hidden li-->
                                            <li class=" hide dynamic_li" id="" style=" height: 31px; padding-top: 5px;" >
                                                <span class="filter group_name active name" data-filter=''></span>
                                                <button class="btn btn-default btn-xs edit_group" rel="groupform"  type="button" title="Edit group"><i class="fa fa-pencil"></i>
                                                </button>
                                                <input type="hidden" class="group_json" value=''>
                                                <button class="btn btn-default btn-xs" id="del_group" data-target="#modal-group-delete" data-toggle="modal" value="" type="button" title="Delete group"><i class="fa fa-trash-o"></i>
                                                </button>
                                            </li>
                                            <!--hidden li-->
                                            <li class="filter active" data-filter="all">All</li>
                                            <?php foreach ($group as $group_name) { ?>
                                                <li class="group_<?php echo $group_name['group_id']; ?>" style=" height: 31px; padding-top: 5px;">
                                                    <span class="filter group_name name" data-filter=".<?php echo $group_name['name']; ?>"><?php echo $group_name['name']; ?> &nbsp;</span>
                                                    <button class="btn btn-default btn-xs edit_group" title="Edit group" rel="groupform"  type="button"><i class="fa fa-pencil"></i>
                                                    </button>
                                                    <input type="hidden" class="group_json"  value='<?php echo json_encode($group_name, JSON_HEX_APOS); ?>'>
                                                    <button class="btn btn-default btn-xs" title="Delete group" id="del_group" data-target="#modal-group-delete" data-toggle="modal" value="<?php echo $group_name['group_id']; ?>"  type="button"><i class="fa fa-trash-o"></i>
                                                    </button>

                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </form>
                                    <!------ user image block ---->
                                    <!--hidden user-->
                                    <div class="dynamic_user del_parent col-md-3 mix  same_line hide">
                                        <div class="hover-effect">
                                            <div class="box_pad" style="">
                                                <div class="img_size">
                                                    <div class="">
                                                                    <img class="img-circle text-center mbl" style="border: 5px solid #fff;  box-shadow: 0 2px 3px rgba(0,0,0,0.25); height: 100px; width: 100px;" src="">
                                                                </div>
                                                </div>   
                                                <div class="ellipsis_div"><span class="name"></span> (<span class="email_id"></span>)</div>
                                                <div class="ellipsis_div"><span>Created On:</span>&nbsp;&nbsp;&nbsp;<span class="created"></span></div>
                                                <div class="ellipsis_div"><span>Last Access:</span>&nbsp;&nbsp;&nbsp;<span class="last_login"></span></div>
                                            </div>
                                            <div class="info">
                                                <h3>Colin Nixon</h3>
                                                <h3><span class="name"></span> </h3>
                                                <a style="" data-toggle="modal" title="View user" data-target="#modal-config" class="mix-link info_cursor view_user"><i class="glyphicon glyphicon-eye-open"></i></a>
                                                <a style=""  rel="userform" title="Edit user" class="mix-link info_cursor edit_user"><i class="glyphicon glyphicon-pencil"></i></a>                   
                                                <a id="delete_user" data-target="#modal-user-delete" data-toggle="modal" style="" value="" title="Delete user"  class="mix-link info_cursor"><i class="glyphicon glyphicon-trash"></i></a>                                                 
                                                <input type="hidden" class="user_json" value=''>                  
                                            </div>
                                        </div>
                                    </div>
                                    <!--hidden user-->
                                    <!--This is hidden div for dynamically adding user-->
                                    <div class="col-md-3 mix same_line hide" id="add_user_row">
                                        <div class="hover-effect">
                                            <div class="box_pad" style="">
                                                <div class="img_size">
                                                    <div class="">
                                                        <img class="img-circle text-center mbl view_user" data-toggle="modal" title="View User" data-target="#modal-config" style="border: 5px solid #fff; box-shadow: 0 2px 3px rgba(0,0,0,0.25); height: 100px; width: 100px;" src="">
                                                        <input type="hidden" class="user_json" value=''>                                                                                           
                                                    </div>
                                                    <br>
                                                </div> 
                                                <div class="ellipsis_div"><span>  </span></div>
                                                <div class="ellipsis_div"><span>Created at:</span>&nbsp;&nbsp;&nbsp;<span></span></div>
                                                <div class="ellipsis_div"><span>Last Access:</span>&nbsp;&nbsp;&nbsp;<span></span></div>
                                            </div>
                                            <span class="slideleft text-right" style="position:absolute; top:0; right: -70px; ">
                                                <a style="" rel="userform" title="Edit User" class="edit_user btn btn-grey btn-outlined btn-xs "><i class="glyphicon glyphicon-pencil" style="padding:2px;"></i></a>
                                                <a id="delete_user" style="" title="Delete User" data-target="#modal-user-delete" data-toggle="modal" value=""  class="btn btn-grey btn-outlined btn-xs "><i class="glyphicon glyphicon-trash" style="padding:2px;"></i></a> 
                                                <input type="hidden" class="user_json" value=''>
                                            </span>
                                        </div>
                                    </div>
                                    <!--End code-->
                                    
                                    <div class="row mix-grid" id="users_list">
                                        <?php //echo '<pre>'; print_R($info); echo '</pre>'; ?>
                                        <?php foreach ($info['detail'] as $user) {  if($user['user_id'] == $this->session->userdata('user_id')){unset($user); continue;} ?>
                                            <div class="del_parent user_<?php echo $user['user_id'];  ?> col-md-3 mix  same_line <?php echo $user['user_type'] . ' ' . str_replace(",", " ", $user['group_name']); if(!in_array($user['user_id'],$info['all_users_in_group'])){ echo "hide";} ?>">
                                                <div class="hover-effect">
                                                    <div class="box_pad" style="">
                                                        <div class="img_size">
                                                            <div class="">
                                                                <img class="img-circle text-center mbl view_user" data-toggle="modal" title="View User" data-target="#modal-config" style="border: 5px solid #fff; box-shadow: 0 2px 3px rgba(0,0,0,0.25); height: 100px; width: 100px;" src="<?php echo base_url(); ?>assets/upload/<?php echo ($user['user_img'] != '') ? $user['user_img'] : (($user['user_type'] == 'owner') ? 'users/owner.png' : (($user['user_type'] == 'tablet_user') ? 'users/user.png' : 'users/admin.png' ) ); ?>">
                                                                <input type="hidden" class="user_json" value='<?php echo json_encode($user, JSON_HEX_APOS); ?>'>                                                                                           </div>
                                                            <br>
                                                        </div>
                                                        <div class="ellipsis_div"> <span> <?php echo $user['name']; ?> (<?php echo $user['email_id']; ?>)</span></div>
                                                        <div class="ellipsis_div"><span>Created at:</span>&nbsp;&nbsp;&nbsp;<span><?php echo $user['creation_time']; ?></span></div>
                                                        <div class="ellipsis_div"><span>Last Access:</span>&nbsp;&nbsp;&nbsp;<span><?php echo $user['last_update']; ?></span></div>
                                                    </div>
                                                    <span class="slideleft text-right" style="position:absolute; top:0; right: -70px; ">
                                                              <a style="" rel="userform" title="Edit User" class="edit_user btn btn-grey btn-outlined btn-xs <?php echo ($user['user_id'] == $this->session->userdata('userid')) ? 'hide' : ''; ?>"><i class="glyphicon glyphicon-pencil" style="padding:2px;"></i></a>
                                                              <a id="delete_user" style="" title="Delete User" data-target="#modal-user-delete" data-toggle="modal" value="<?php echo $user['user_id'] ; ?>"  class="btn btn-grey btn-outlined btn-xs <?php echo ($user['user_id'] == $this->session->userdata('userid')) ? 'hide' : '' ?> <?php echo ($user['user_type'] == 'owner') ? 'hide' : ''; ?>"><i class="glyphicon glyphicon-trash" style="padding:2px;"></i></a> 
                                                              <input type="hidden" class="user_json" value='<?php echo json_encode($user, JSON_HEX_APOS); ?>'>
                                                          </span>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>

                                </div>
                            </div>

                            <!------------ END image block---------->

                        </div>
                    </div>
                </div>
                <!--user image list-->


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
    $(document).ready(function(){
        
        $('#modal-config').on('hidden.bs.modal', function (e) {
           set_timer_image();
        })
        
         $('#email_id').popover({'trigger' : 'manual', 'content': 'Email id already exist. Try another one.','placement':'left','container':'body'});
        //**************form open*******************
        $(document).on('click','.user_form_button',function(e){e.preventDefault();
            $("."+$(this).attr('rel')).removeClass('hide');
            $('#add_user_form').find('input[type=text] , select , input[type=checkbox]').val(null);
            $('#user_id').val('');
            $('.icheckbox_minimal-grey').removeClass('checked');
            $(".select2-multi-value").select2('val',null);
            $(".select2-multi-value-group").select2('val',null);
            //*************
            $(".userform").find(".form_heading").text("Add a User");
//            $(".userform").find(".change_pswd").text("Specify Password");
            $(".hide_field").removeClass('hide');
            $(".userform").find(".add_user").text("Invite");
            $("."+$(this).attr('rel')).slideDown('slow');
            //**************************
            $('html, body').animate({
                scrollTop: $("."+$(this).attr('rel')).offset().top -20       }, 1000);
        })
        //*************form slideup*****************
        $('.user_close_form').click(function(e){
            e.preventDefault();
            $("."+$(this).attr('rel')).slideUp('slow');
            $("."+$(this).attr('rel')).addClass('hide');
            $('html, body').animate({ 
                scrollTop: $($(this).attr('data-focus') ).offset().top      }, 1000);
        })
        //*********************briefcase group select box*******************
        $(".select2-multi-value").select2();

        $(".select2-multi-value-group").select2();
         //*************email id validation******************
        $('#email_id').change(function(e){
            var emailinfo = {'email_id':$("#email_id").val(),'user_id':$('#user_id').val()};//console.log(emailinfo);//return false;
            e.preventDefault();
            var url = "<?php echo base_url() ?>users/check_email"; // the script where you handle the form input.
            var email = $.ajax({
                type: "POST",
                url: url,
                data: emailinfo, // serializes the form's elements.
                async: false
            }).responseText;
            if(email == 'already exist'){
                $('#email_id').popover('show');
                $('#email_id').addClass('invalid');
                $('#email_id').parent().addClass('state-error');
                $('#email_id').val(null);
            }
            else{
                $('#email_id').popover('hide');
                $('#email_id').removeClass('invalid');
                $('#email_id').parent().removeClass('state-error');
            }
        })
   
      //****************user form  submit***************************************************************************    
        $('#add_user_form').submit(function(e){e.preventDefault();
            $('#email_id').popover('hide');
            var form = $("#add_user_form");
            form.validate();
            if(form.valid() == true){
                //**********encrypt password*************
//                var pswd = $('#password_field').val();
//                $('#password').val(pswd);
                //*********created at*****************
                var d = new Date();
                var t = d.getFullYear() +"-"+ d.getMonth() +"-"+d.getDate() +" "+ d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds(); 
                $('#creation_time').val(t);
                //**********disable fields***************
                $('.disable').removeAttr('name');
                //$('#user_img').val($('#file').val());
                var formData = new FormData($(this)[0]);//console.log($(this)[0]);
                //**********form submition******************
                var url = "<?php echo base_url() ?>users/insert_user"; // the script where you handle the form input.
                var user = $.ajax({
                    type: "POST",
                    enctype: 'multipart/form-data',
                    url: url,
                    data: formData, // serializes the form's elements.  data: $("#add_user_form").serializeArray(), // serializes the form's elements.
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false
                }).responseText;//return false;
                //*******update condition************
                var json = $.parseJSON(user); //console.log(json);return false;
                //********user create********* 
                if(json.action != 'updated'){//console.log('new user');
                    $('.dynamic_user').clone().appendTo('.mix-grid');
                    $('.mix-grid > .del_parent:last').addClass('user_'+json.user_id+" "+json.user_type).removeClass('hide dynamic_user').css('display','inline-block');
                }
                var session_user = <?php echo $this->session->userdata('userid'); ?>; //console.log(session_user);
                if(session_user == json.user_id){
                    $('#side-menu > .user-panel > .info > p').text(json.name);
                    $('#login_user_info > .topbar-user > a > .hidden-xs').text(json.name);                
                }
                //return false;
                $('.mix-grid > .user_'+json.user_id).find('.user_json').val(user);
                $('.mix-grid > .user_'+json.user_id).find('#delete_user').val(json.user_id);
                $.each(json, function(key, value){ 
                    if(key == 'user_img'){
                         var src = '';
                    if(value != '') {
                        src = '<?php echo base_url(); ?>assets/upload/'+value+'?timestamp=' + new Date().getTime();
                        //$('.img-circle').attr('src','<?php echo base_url(); ?>assets/upload/'+value+'?timestamp=' + new Date().getTime());
                        } else {
                           
                        switch (json.user_type) {
                            case "owner": src = '<?php echo base_url(); ?>assets/upload/users/owner.png';
                                break;
                            case "tablet_user": src = '<?php echo base_url(); ?>assets/upload/users/user.png';
                                break;
                            case "administrator": src = '<?php echo base_url(); ?>assets/upload/users/admin.png';
                                break;  
               
                        }
                        }
                        $('.mix-grid > .user_'+json.user_id).find('.img-circle').attr('src',src); // for user image
                    }
                    //**********dynamic user values*******************
                    $('.mix-grid > .user_'+json.user_id).find(function(){
                        if(key == 'briefcase[]' || key == 'groups[]'){return false;}
                        $('.mix-grid > .user_'+json.user_id+' .'+key).text(value); //for dynamic user box data
                    })
            
                });
                // }
                $(".userform").slideUp('slow');
                 $(this).notification('User updated successfully','Group'); 
                //********************
                $(".userform").find(".form_heading").text("Add a User");
//                $(".userform").find(".change_pswd").text("Specify Password");
                $(".hide_field").removeClass('hide');
                $(".userform").find(".add_user").text("Invite");
                $(".userform").addClass('hide');
                $('#add_user_form').trigger("reset");
            }
            //}
        });
        //****************delete user****************
        $(document).on('click', '#delete_user', function(){
            $("#delete_user_confirm").val($(this).attr('value')); 
        });
        $(document).on('click', "#delete_user_confirm", function (event){
            event.preventDefault();
            var id = $(this).val();//(id);
            $('#modal-user-delete').modal('hide');
            $.ajax({
                type: "POST",
                url: '<?php echo base_url(); ?>users/delete_user',
                data: "user_id="+id
            })
            
            $('.mix-grid').find(".user_"+id).fadeOut();
            $('.mix-grid').find(".user_"+id).remove();
             $(this).notification('User deleted successfully','Group'); 
        });
       //*********************view user***************
        $(document).on('click','.view_user',function(){//console.log('view user');
            set_timer_image();    
            var view = $(this).parent().find('input').val();
            object = JSON.parse(view);
            jQuery.each(object,function(key, value){
                if(key == 'user_img'){
                    (value != '') ? $('.img-circle-view').attr('src','<?php echo base_url(); ?>assets/upload/'+value+'?timestamp=' + new Date().getTime()) :
                        ((object.user_type == 'owner') ? $('.img-circle-view').attr('src','<?php echo base_url(); ?>assets/upload/users/owner.png') : 
                          ((object.user_type == 'administrator') ? $('.img-circle-view').attr('src','<?php echo base_url(); ?>assets/upload/users/admin.png') : 
                      $('.img-circle-view').attr('src','<?php echo base_url(); ?>assets/upload/users/user.png')));
                } else if(key == 'briefcase_name'){
                    var fieldName = $("[data-name='"+key+"']");
                    if(value == null){
                        fieldName.text('No briefcase assigned');
                    }
                    else{
                        fieldName.text(value);
                    }
                } else if(key == 'name'){
                    var fieldName = $("[data-name='"+key+"']");
                    if(value == null){
                        fieldName.text('No group assigned');
                    }
                    else{
                        fieldName.text(value);
                    }
                }
                else{
                    var fieldName = $("[data-name='"+key+"']");//console.log('view user '+key);
                    fieldName.text(value);
                }
            });
        })
          //*******************edit user**************
        $(document).on('click', ".edit_user", function (event){
            set_timer_image();
            form_reset("add_user_form");  
            event.preventDefault();
            $(".userform").find(".form_heading").text("Edit User");
            $(".userform").find(".change_pswd").removeClass("hide");
            $(".hide_field").addClass('hide');
            $(".userform").find(".add_user").text("Update");
            var rowJson = $(this).nextAll(".user_json").val();//alert(rowJson);
            $("#add_user_form").fillEditForm(rowJson);  
//            $('#password_field').removeClass('required');
            $(".userform").removeClass('hide');
            $(".userform").slideDown();
            //**************
            $('html, body').animate({
                scrollTop: $("."+$(this).attr('rel')).offset().top -20       }, 1000);
        })
            //******form edit field functions start************************************
    $.fn.fillEditForm = function (rowJson) {   
        $(this).clear_form_elements();
        var obj = $(this).parse_json_custom(rowJson); 
        $.each(obj, function(key, value){  //console.log(key+'-----------all users-----------'+value);
                if(key == 'user_type'){//console.log('user');
                            if(value == 'owner'){
                             $('.user_type_field').addClass('hide');
                             $(".userform").find(".change_pswd").addClass("hide");
                            } else {
                                $('.user_type_field').removeClass('hide');
                                 }
                             } 
            var fieldName = $("[name='"+key+"']");
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
                    var arr = new Array;
                    if(value == null){
                        arr = {};
                    }
                    else {
                     arr = value.split(',');//console.log(value);
                    }
                    fieldName.select2('val',arr);                   
                   //console.log(key+'---multiselect----'+value);
                    break;
               case "file":
                   arr = value.split('/');//console.log(arr[arr.length - 1]);
                    $('#txt').val(arr[arr.length - 1]);
                    $('.user_image').removeClass('hide');
                     (value != '') ? $('.img-circle-edit').attr('src','<?php echo base_url(); ?>assets/upload/'+value+'?timestamp=' + new Date().getTime()) :
                        ((obj.user_type == 'owner') ? $('.img-circle-edit').attr('src','<?php echo base_url(); ?>assets/upload/users/owner.png') : 
                          ((obj.user_type == 'administrator') ? $('.img-circle-edit').attr('src','<?php echo base_url(); ?>assets/upload/users/admin.png') : 
                      $('.img-circle-edit').attr('src','<?php echo base_url(); ?>assets/upload/users/user.png')));
                    break;
                default:
                    fieldName.val(value); //console.log(key+'---fields----'+value);
                    break;
            }  
        });  
    }
    //*************reset form elements
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
//******form edit field functions end************************************
    });
    //************file uplooad*************
    function ChangeText(oFileInput, sTargetID) {
            
        document.getElementById(sTargetID).value = oFileInput.value;
    }  
  
    function set_timer_image(){
        $(".img-circle-edit").attr("src","<?php echo base_url()."assets/images/icons/loader1.GIF"; ?>");       
        $(".img-circle-edit:hidden").attr("src","<?php echo base_url()."assets/images/icons/loader1.GIF"; ?>");       
        
        $(".img-circle-view").attr("src","<?php echo base_url()."assets/images/icons/loader1.GIF"; ?>");       
        $(".img-circle-view:hidden").attr("src","<?php echo base_url()."assets/images/icons/loader1.GIF"; ?>");       
    }
    
  
    //************file uplooad*************
        //****************reset form***********
        $(document).on('click','#new_group',function(){
            form_reset("add_group_form");
            $("#add_group_form").find('div').removeClass('state-success');
            $("#add_group_form").find('input[type=text], input[type=hidden], textarea').removeClass('valid');
            $("#add_group_form").find('input[type=text], input[type=hidden], textarea').val(null);
            $('#group_user_id').val(<?php echo $this->session->userdata('userid'); ?>);
            $("#selected_users").select2();
            $(".groupform").find(".group_heading").text("Add Group");
            $(".groupform").find(".add_group").text("Create");
        })
        //****************group form  submit******************    
        $(document).on('submit','#add_group_form',function(e){
            e.preventDefault();
            var form = $('#add_group_form');
            form.validate();
            if(form.valid() == true){
            var url = "<?php echo base_url() ?>groups/insert_group"; // the script where you handle the form input.

            var group = $.ajax({
                type: "POST",
                url: url,
                data: $("#add_group_form").serializeArray(), // serializes the form's elements.
                async: false
            }).responseText;
            var json = $.parseJSON(group); //console.log(json);
            //********user create********* 
            if(json.action != 'updated'){
                $('.dynamic_li').clone().appendTo('#grouplist');
                $('#grouplist li:last').addClass('group_'+json.group_id).removeClass('hide dynamic_li');
            }
            $('#grouplist .group_'+json.group_id).find('.group_json').val(group);
            $('#grouplist .group_'+json.group_id).find('#del_group').val(json.group_id);
            $('#grouplist .group_'+json.group_id+' > .group_name').attr('data-filter','.'+json.name);
            //   $('#grouplist li:last').find('.edit-form').val(json.group_id);
            $.each(json, function(key, value){
                if(key == "all_users"){
                    $(".del_parent").each(function(){ //To delete creted view
                        var id = $(this).find("#delete_user").attr("value");
                        var found_id = 0;
                        $.each(value,function(value_key,value_val){
                            if(id == value_val){
                                found_id++;
                            }
                        });
                        if(found_id == 0){ //delete view
                           $(this).closest(".del_parent").addClass("hide"); 
                        }
                    })
                    
                    $.each(value,function(value_key,value_val){
                        var found_id = 0;
                        $(".del_parent:visible").each(function(){
                            if($(this).find("#delete_user").attr("value") == value_val){
                                found_id++;
                            }
                        });
                        if(found_id == 0){  //add view
                            $(".del_parent:hidden").each(function(){
                                if($(this).find("#delete_user").attr("value") == value_val){                                   
                                    $(this).closest(".del_parent").removeClass("hide");
                                }
                            });
                        }
                    });
                }
                if(key == "selected_user"){
                    $(".del_parent").removeClass(json['name']);
                    var value_array = value.split(","); 
                    $.each(value_array, function(user_key, user_val){                        
                        $(".del_parent").each(function(){
                            if($(this).find("#delete_user").attr("value") == user_val){
                                $(this).closest(".del_parent").addClass(json['name']);
                            }                            
                        })                        
                    });
                }
                $('#grouplist .group_'+json.group_id).find(function(){
                    $('.group_'+json.group_id+' > .'+key).text(value); //console.log(json.announcement_id);
                })
            });
            if(json.action != 'updated'){
                $(this).notification('Group created successfully','Group'); 
            } else {
                $(this).notification('Group updated successfully','Group'); 
            }
            //  $(".userform").slideUp();
            $(".groupform").slideUp('slow');
            $(".groupform").addClass('hide');
            // $("#add_group_form")[0].reset();//alert('a');
        }
        });
        //***************edit group ********************
        $(document).on('click', ".edit_group", function (event){
            form_reset("add_group_form");    
            event.preventDefault();
            $(".groupform").find(".group_heading").text("Edit Group");
            $(".groupform").find(".add_group").text("Update");
            var rowJson = $(this).nextAll(".group_json").val();//alert(rowJson);
            var obj = $(this).parse_json_custom(rowJson); 
           // console.log(obj.selected_user);
            $("#add_group_form").fillEditForm(rowJson);  
            $(".groupform").removeClass('hide');
            $(".groupform").slideDown();
            
            
            var group = obj.selected_user;
            var grouparray = group.split(",");       
            $("#selected_users").select2();
            $("#selected_users").select2('val', grouparray);       
        
            //**************
            $('html, body').animate({
                scrollTop: $("."+$(this).attr('rel')).offset().top -20}, 1000);
        })
  //  });
    //**************delete group****************
     $(document).on('click', '#del_group', function(){
                $("#delete_group_confirm").val($(this).val()); 
    });
    $(document).on('click', "#delete_group_confirm", function (event){
        event.preventDefault();
        var id = $(this).val();//console.log(id);
             $('#modal-group-delete').modal('hide');
            $.ajax({
                type: "POST",
                url: '<?php echo base_url(); ?>groups/delete_group',
                data: "group_id="+id
            })
            
            $('#grouplist').find(".group_"+id).fadeOut();
             $('#grouplist').find(".group_"+id).remove();
              $(this).notification('Group deleted successfully','Group'); 
    }); 
    
    function form_reset(formid){
        $('#'+formid)[0].reset();   
        $('#'+formid).find(".state-success").removeClass("state-success");  
        $('#'+formid).find(".state-error").removeClass("state-error");  
        $('#'+formid).find("em").remove();  
    }
      //*****************notification*************************
    
</script>        