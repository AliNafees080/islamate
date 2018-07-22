<html>
    <head>
        <title>Api</title>
        <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/jquery.md5.js"></script>
        <style>
            .hide{
                display: none;
            }
        </style>
    </head>
    <body>
<!--        <a href="<?php //echo base_url(); ?>assets/vendors/flot-chart/jquery.flot.js">red-grey</a>-->
        <h1>Test Api</h1>
        <table>
            <form id="api_form" action="<?php echo base_url(); ?>apis" name="api_form" method="post">
                <tr>
                    <td>
                        <label>Method: </label>
                    </td>
                    <td>
                        <select name="method" class="" id="method">
                            <option value="" selected="selected">Select method</option>
                            <option value="organization">Organization</option>
                            <option value="login">Login</option>
                            <option value="logout">Logout</option>
                            <option value="forgot_password">Forgot Password</option>
<!--                            <option value="set_device_info">Device Information</option>-->
                            <option value="update">Update</option>
                            <option value="get_notifications">Get Notifications</option>
                            <option value="set_notifications">Set Notifications</option>
                        </select>
                    <td>
                </tr>
                <tr>
                    <td>
                        <label class="api organization hide">Organization Name: </label>
                    </td>
                    <td>
                        <input type="text" name="organization_name" id="organization_name" class="api organization hide" value="">
                    </td>
                </tr>
<!--                <tr>
                    <td>
                        <label class="api organization hide">Time to create: </label>
                    </td>
                    <td>
                        <input type="text" name="time_to_create" id="time_to_create" class="api organization hide" value="">
                    </td>
                </tr>-->
                <tr>
                    <td>
                        <label class="api login hide forgot_password">Organization Id: </label>
                    </td>
                    <td>
                        <input type="text" name="organization_id" id="organization_id" class="api login hide forgot_password" value="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="api hide logout  set_device_info update get_notifications set_notifications">User Id</label>
                    </td>
                    <td>
                        <input type="text" name="user_id" id="user_id" class="api hide logout set_device_info update get_notifications set_notifications" value="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="api login forgot_password hide">Email:</label>
                    </td>
                    <td>
                        <input type="text" name="email_id" id="email_id" class="api login forgot_password hide" value="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="api login hide">Password: </label>
                    </td>
                    <td>
                        <input type="text" name="password" id="password" class="api login hide" value="">

                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="api login hide">Login time: </label>
                    </td>
                    <td>
                        <input type="text" name="login_time" id="login_time" class="api login hide" value="">

                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="api set_device_info hide">Device model: </label>
                    </td>
                    <td>
                        <input type="text" name="device_model" id="device_model" class="api set_device_info hide" value="">

                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="api set_device_info hide">Device OS: </label>
                    </td>
                    <td>
                        <input type="text" name="device_os" id="device_os" class="api set_device_info hide" value="">

                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="api set_device_info hide">App Version: </label>
                    </td>
                    <td>
                        <input type="text" name="app_version" id="app_version" class="api set_device_info hide" value="">

                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="api set_device_info login hide logout">Device token: </label>
                    </td>
                    <td>
                        <input type="text" name="device_token" id="device_token" class="api set_device_info hide login logout" value="">

                    </td>
                </tr>
                 <tr>
                    <td>
                        <label class="api set_device_info hide">Device UU-ID: </label>
                    </td>
                    <td>
                        <input type="text" name="device_uuid" id="device_uuid" class="api set_device_info hide" value="">

                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="api hide login update  get_notifications set_notifications">Last Update time: </label>
                    </td>
                    <td>
                        <input type="text" name="last_update" id="last_update" class="api hide login update  get_notifications set_notifications" value="">

                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="api set_notifications hide">Notifications json: </label>
                    </td>
                    <td>
                        <textarea name="notification_json" id="notification_json" class="api set_notifications hide" rows="3"></textarea>

                    </td>
                </tr>
<!--                <tr>
                    <td>
                        <label class="api set_contact hide">Contact other info: </label>
                    </td>
                    <td>
                        <textarea name="contact_info" id="contact_info" class="api set_contact hide" rows="3"></textarea>

                    </td>
                </tr>-->
                <tr>
                    <td>
                        <label class="api set_notifications hide">Type: </label>
                    </td>
                    <td>
                            <select name="type" class="api set_notifications hide" id="type">
                            <option value="" selected="selected">Select type</option>
                            <option value="share">Share</option>
                            <option value="view">View</option>
                            <option value="comment">Comment</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Cipher: </label>
                    </td>
                    <td>
                        <input type="text" name="cipher" id="cipher" class="" value="">

                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button id="submit">Submit</button>
                    </td>
                </tr>
            </form>

        </table>
    </body>
</html>
<script>
    $(document).ready(function(){
        $('.api').change(function(){
            str="";
            $(".api").each(function(){
                str += $(this).val();
            });// alert(str);
            var final_str = $('#method').find('option:selected').val(); //console.log(final_str);
            var secret_key = "D1A124268D72AF770FF83989B340A548";
            final_str += str + secret_key;  //console.log(final_str);
            $('#cipher').val($.md5(final_str));//console.log($.md5(final_str));
        });   
    
        $('#method').on('change',function(e){
            e.preventDefault();
            $('input, select, textarea').attr('disabled', 'disabled');
            $('.api').addClass('hide');
            $('#method').removeAttr('disabled');
            $('#cipher').removeAttr('disabled');
            var method = $(this).find('option:selected').val();
            switch(method){
                case 'organization':
                    $('.organization').removeClass('hide');
                    $('.organization').removeAttr('disabled');
                    break;
                case 'login':
                    $('.login').removeClass('hide'); 
                    $('.login').removeAttr('disabled');
                    break;
                case 'logout':
                    $('.logout').removeClass('hide'); 
                    $('.logout').removeAttr('disabled');
                    break;
                case 'login':
                    $('.login').removeClass('hide'); 
                    $('.login').removeAttr('disabled');
                    break;
                case 'set_device_info':
                    $('.set_device_info').removeClass('hide'); 
                    $('.set_device_info').removeAttr('disabled');
                    break;
                case 'update':
                    $('.update').removeClass('hide'); 
                    $('.update').removeAttr('disabled');
                    break;
                case 'get_notifications':
                    $('.get_notifications').removeClass('hide'); 
                    $('.get_notifications').removeAttr('disabled');
                    break;
                case 'set_notifications':
                    $('.set_notifications').removeClass('hide'); 
                    $('.set_notifications').removeAttr('disabled');
                    break;
                case 'forgot_password':
                    $('.forgot_password').removeClass('hide'); 
                    $('.forgot_password').removeAttr('disabled');
                    break;
                default:
                // alert('Please select method');
        }
    })
    $('#submit').click(function(){//e.preventDefault();
           
    });
}); 
</script>
