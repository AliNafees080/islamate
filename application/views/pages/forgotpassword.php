<!DOCTYPE html>
<html lang="en" style=" height: 100%; width: 100%;">
    <head>
        <title>Salesbean - Forgot Password</title>
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
        <div class="page-form" style="  background: none; text-align: center; height: 200px; width: 200px; margin-top: 35px;">
            <img src='<?php echo base_url(); ?>/assets/images/mail/isalesmate_with_title.png' style=" width: 95%;">
        </div>
        <?php
        if($view == 1){ ?>    
        <div class="page-form" style=" background: #fff; width: 550px; margin-top: -5px;" >
            <form class="form form-validate form-horizontal" id="login_form" action=""  method="post">               
                <div class="body-content">
                    <div class="form-group">
                        <label class="col-md-3 control-label textlabel" for="inputName">Password</label>
                        <div class="input-icon right col-md-8">
                            <input type="hidden" name="user_id" value="<?php  echo $user_id; ?>"/>
                            <input type="password" maxlength="32" id="password" placeholder="Password" name="password" class="required" style=" color: #20b889; width: 100%; font-size: 18px;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label textlabel" for="inputName">Confirm password</label>
                        <div class="input-icon right col-md-8">
                            <input type="password" maxlength="32" id="confirmpassword" placeholder="Confirm password" name="confirmpassword" class="required" style=" color: #20b889; width: 100%; font-size: 18px;">
                        </div>
                    </div>        
                    <div class="form-group pull-right" style=" border-radius: 10px; padding-top: 10px;">
                        <button type="submit" class="btn btn-success" style=" background-color: #20b889; border-color: #20b889;">Reset</button>
                    </div>
                    <div class="clearfix">
                    </div>
                </div>
            </form>
        </div>
        <?php } 
        else{ ?>
        <div style="text-align: center; height: 30%; width: 100%; display: table;">
            <div class="header-content" style=" display: table-cell; height: 100%; width: 100%; vertical-align: middle; text-align: center; color: #646464;">
                <h1><?php echo $message; ?></h1>
            </div>
        </div>
        <?php } ?>        
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
        
    </body>
</html>