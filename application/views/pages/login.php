<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Sign In </title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="cache-control" content="no-cache">
        <meta http-equiv="expires" content="Thu, 19 Nov 1900 08:52:00 GMT">
        <script src="<?php echo base_url() ?>assets/commonfiles/jquery.min.js"></script>   
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/css/font.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/commonfiles/fonts1.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/commonfiles/fonts2.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/jquery-ui-1.10.4.custom/css/ui-lightness/jquery-ui-1.10.4.custom.min.css">
        
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/font-awesome/css/font-awesome.min.css">

        <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/bootstrap/css/bootstrap.min.css">
        <!--Loading style vendors-->

        <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/animate.css/animate.css">

        <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/iCheck/skins/all.css">
        <!--Loading style-->

        <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/css/themes/style1/orange-blue.css" class="default-style">

        <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/css/themes/style2/orange-blue.css" id="theme-change" class="style-change color-change">

        <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/css/style-responsive.css">
        <style>
            .textlabel{
                color: #20b889; 
                font-size: 18px; 
                margin-right: 15px;
            }            
            .required{
                border: none;
                border-bottom: solid #20b889 1px !important;
            }
            .state-error input{
                background: none !important;
                border: none !important;
                border-bottom: solid #db4c4a 1px !important;
            }
            .state-success input{
                background: none !important; 
                border: none !important;
                border-bottom: solid #20b889 1px !important;
            }
        </style>
    </head>

    <body style=" background-color: #393939;">
        <div class="page-form" style=" background: none; text-align: center; height: 200px; width: 200px; margin-top: 35px;">
            <img src='<?php echo base_url(); ?>assets/images/mail/isalesmate_with_title.png' style="width: 95%;">
        </div>
        <div class="page-form" style=" background: #fff; width: 550px; margin-top: -5px;">

            <form class="form form-validate form-horizontal" id="login_form" action=""  method="post">            
                <div class="body-content" style=" ">
                    <?php                   
                    if($mailmatch == 1){
                        echo "<p style=' text-align: center; color: #1a8a5b; font-size: 18px;'>Invalid details</p>";
                    }  ?>
                    <div class="form-group">
                        <label class="col-md-3 control-label textlabel" for="inputName">Organization</label>
                        <div class="input-icon right col-md-8">
                            <input type="text" placeholder="Organization" name="organization" class="required" style=" color: #20b889;  width: 100%; font-size: 18px;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label textlabel" for="inputName">Email</label>
                        <div class="input-icon right col-md-8">
                            <input type="text" placeholder="Email address" name="login_username" class="required" style=" color: #20b889;  width: 100%; font-size: 18px;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label textlabel" for="inputName">Password</label>
                        <div class="input-icon right col-md-8">
                            <input type="password" placeholder="Password" name="password" class="required" style=" color: #20b889; width: 100%; font-size: 18px;">
                        </div>
                    </div>                 
                    <div class="form-group pull-right" style=" border-radius: 10px; padding-top: 10px;margin:0;display:block">
<!--                        <a href="<?php echo base_url(); ?>signup/forgotpassword" style=" cursor: pointer; vertical-align: middle; width: 100%">Forgot Password</a>-->
                        <button type="submit" class="btn btn-success" style=" background-color: #20b889; border-color: #20b889;">Login</button>
                        <a id="reset_button"><button type="button" class="btn btn-success" style=" background-color: #20b889; border-color: #20b889;">Reset</button></a>
                    </div>
                    <div class="clearfix" style=" height:45px;">
                    </div>
                </div>
            </form>
        </div>
        <div class="page-form" style=" background: none; width: 255px; margin-top:8px; vertical-align: middle; text-align: center;">
            <a href="<?php echo base_url(); ?>signup" style=" cursor: pointer; width: 100%; color: #fff; font-size: 17px;">Sign Up</a>
            <a style="color: #fff; font-size: 17px;">|</a>
            <a href="<?php echo base_url(); ?>signup/forgotpassword" style=" cursor: pointer; width: 100%; color: #fff; font-size: 17px; display: inline;">Forgot Password</a>
        </div>
        
        <script src="<?php echo base_url() ?>assets/js/jquery-1.10.2.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/jquery-migrate-1.2.1.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/jquery-ui.js"></script>
        <!--loading bootstrap js-->
        <script src="<?php echo base_url() ?>assets/vendors/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>assets/vendors/bootstrap-hover-dropdown/bootstrap-hover-dropdown.js"></script>
        <script src="<?php echo base_url() ?>assets/js/html5shiv.js"></script>
        <script src="<?php echo base_url() ?>assets/js/respond.min.js"></script>       
        <script src="<?php echo base_url() ?>assets/vendors/iCheck/custom.min.js"></script> 
        <script src="<?php echo base_url(); ?>assets/vendors/jquery-validate/jquery.validate.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/form-validation.js"></script> 
        <script>
        $(document).ready(function(){
           $("#reset_button").click(function(){
                $('#login_form')[0].reset();   
                $('#login_form').find(".state-success").removeClass("state-success");  
                $('#login_form').find(".state-error").removeClass("state-error");  
                $('#login_form').find("em").remove();  
           })
        });
        
        </script>
    </body>    
</html>
<?php die();?>