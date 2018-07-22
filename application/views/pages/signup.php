<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Sign Up</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="cache-control" content="no-cache">
        <meta http-equiv="expires" content="Thu, 19 Nov 1900 08:52:00 GMT">
        <script src="<?php echo base_url() ?>assets/commonfiles/jquery.min.js"></script>   
        <link rel="shortcut icon" type="image/png" href="<?php echo base_url();?>isalesmate_black.png">
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
                margin-top: 18px; 
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
            <img src='<?php echo base_url(); ?>/assets/images/mail/isalesmate_with_title.png' style="width:95%;">
        </div>
        <?php
        
        if($div == 0){
        ?>
        
        <div style="text-align: center; height: 30%; width: 100%; display: table;">
            <div class="header-content" style=" display: table-cell; height: 100%; width: 100%; vertical-align: middle; text-align: center; color: #646464;">
                <h1><?php echo $message1; ?></h1>
                <h1><?php echo $message2; ?></h1>
            </div>
        </div>
        <?php }
        else { ?>
        <div class="page-form" style=" background: #fff; width: 550px; margin-top: -5px; ">

            <form class="form form-validate form-horizontal" id="signup_form" action=""  method="post">                 
                <div class="body-content" style=" ">
                    <div class="form-group">
                        <label class="col-md-3 control-label textlabel" for="inputName">First name</label>
                        <div class="input-icon right col-md-8">
                            <input type="text" placeholder="First name" maxlength="30" name="first_name" class="required" style=" color: #20b889; width: 100%; font-size: 18px;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label textlabel" for="inputName">Last name</label>
                        <div class="input-icon right col-md-8">
                            <input type="text" placeholder="Last name" maxlength="30" name="last_name" class="required" style=" color: #20b889; width: 100%; font-size: 18px;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label textlabel" for="inputName">Email</label>
                        <div class="input-icon right col-md-8">
                            <input type="text" placeholder="Work email address" maxlength="50" name="email_id" class="required" style=" color: #20b889; width: 100%; font-size: 18px;">
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="col-md-3 control-label textlabel" for="inputName">Phone no.</label>
                        <div class="input-icon right col-md-8">
                            <input type="text" placeholder="Phone number" maxlength="50" name="contact" class="required numeric" style=" color: #20b889; width: 100%; font-size: 18px;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label textlabel" for="inputName">Role</label>
                        <div class="input-icon right col-md-8">
                            <input type="text" placeholder="Role" maxlength="50" maxlength="50" name="designation" class="required" style=" color: #20b889; width: 100%; font-size: 18px;">
                        </div>
                    </div>  
                    <div class="form-group">
                        <label class="col-md-3 control-label textlabel" for="inputName">Company</label>
                        <div class="input-icon right col-md-8">
                            <input type="text" placeholder="Company name" maxlength="50" name="name" id="name" class="required" style=" color: #20b889; width: 100%; font-size: 18px;">
                            <input type="hidden" name="timezone" id="timezone">
                        </div>
                    </div>
                    <div class="form-group pull-right" style=" border-radius: 10px; padding-top: 10px;margin:0;display:block;width:160px">
                        <button type="submit" class="btn btn-success" style=" background-color: #20b889; border-color: #20b889;">Sign Up</button>
                        <a href="<?php echo base_url(); ?>"><button  type="button" class="btn btn-success" style=" background-color: #20b889; border-color: #20b889;">Sign In</button></a>
                    </div>
                    <div class="clearfix" style=" height:45px;">
                    </div>
                </div>
            </form>
        </div>
        
         <?php }     ?>
        <div class="clearfix" style=" height:45px;">
        </div>
        <script src="<?php echo base_url() ?>assets/js/jquery-1.10.2.min.js">
        </script>
        <script src="<?php echo base_url() ?>assets/js/jquery-migrate-1.2.1.min.js">
        </script>
        <script src="<?php echo base_url() ?>assets/js/jquery-ui.js">
        </script>
        <!--loading bootstrap js-->
        <script src="<?php echo base_url() ?>assets/vendors/bootstrap/js/bootstrap.min.js">
        </script>
        <script src="<?php echo base_url() ?>assets/vendors/bootstrap-hover-dropdown/bootstrap-hover-dropdown.js">
        </script>
        <script src="<?php echo base_url() ?>assets/js/html5shiv.js">
        </script>
        <script src="<?php echo base_url() ?>assets/js/respond.min.js">
        </script>       
        <script src="<?php echo base_url() ?>assets/vendors/iCheck/custom.min.js">
        </script> 
        <script src="<?php echo base_url(); ?>assets/vendors/jquery-validate/jquery.validate.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/form-validation.js"></script>     
        <script src="<?php echo base_url(); ?>assets/js/jstz-1.0.4.min.js"></script>     
        <script>
            timezone = jstz.determine();
            //console.log(timezone.name());
            $("#timezone").val(timezone.name());
            $('#name').popover({'trigger' : 'manual', 'content': 'Company already registered. Please choose another one.','placement':'left','container':'body'});
            $('#name').change(function(e){
                var organization_info = {'name':$("#name").val()};//console.log(emailinfo);//return false;
                e.preventDefault();
                var url = "<?php echo base_url() ?>signup/check_organization"; // the script where you handle the form input.
                var email = $.ajax({
                    type: "POST",
                    url: url,
                    data: organization_info, // serializes the form's elements.
                    async: false
                }).responseText;
                    if(email == 'already exist'){
                        $('#name').popover('show');
                        $('#name').addClass('invalid');
                        $('#name').parent().addClass('state-error');
                        $('#name').val(null);
                    }
                    else{
                        $('#name').popover('hide');
                        $('#name').removeClass('invalid');
                        $('#name').parent().removeClass('state-error');
                    }
                })
        </script>
            
        
    </body>
</html>  
<?php die();?>
