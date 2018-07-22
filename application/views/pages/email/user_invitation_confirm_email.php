<?php
//print_r($code); die();
?>
<html>
    <head>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font.css"> 
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/font-awesome/css/font-awesome.min.css">
        <style>
            .img-height{
                height: 120px;
            }
        </style>
    </head>
    <body>
        
    
<table cellspacing='0' cellpadding='0' style='margin:auto; font-style:normal; font-weight: normal; font-family: "GOTHIC","Arial";'> 
    <tr height='140' >
        <td style='text-align: center; height: 200px;'  bgcolor='#20b888' width='800'>
            <img width='' src='<?php echo base_url(); ?>assets/images/mail/isalesmate_with_title.png' class="img-height">
        </td>        
    </tr>
    <tr style="">
        <td  bgcolor='#fff' style=' padding: 0 10px 0 10px;  border: solid #20b888 2px;' width='800'>
            <style>
                h1 {font-size:16px} 
                p {color:#20b888; padding: 8px;} 
                li,h2 {color:#20b888; padding: 5px;} 
                span { font-weight: bold}
                .line_height { line-height: 150%;}
            </style>
            <h2 style='text-align: center; color: #1b9d74; font-family: "GOTHIC"; font-size: 24px;'>Welcome to iSalesMate, <?php echo ucfirst($data['name']); ?>!</h2>
            <p class="line_height" style=" font-family: GOTHIC; font-size: 16px;">You've been invited to start using iSalesMate, a great way to present and share sales and marketing content on any device.</p>
            <table style=" width: 100%; height: 100%;">
                <tr>
                    <td style=" width: 50%; ">
                        <h2>Your Content Anywhere</h2>
                        <p class="line_height" style=" padding-top: 0px; margin-top: -10px;">The iSalesMate tablet application can be used anywhere and anytime to present and share your content with prospects.</p>
                    </td>
                    <td style=" width: 50%;">
                        <p style=" text-align: center; margin: 0px; padding: 0px; ">
                            <img style=" width: 50%; height: 50%;" src='<?php echo base_url(); ?>/assets/images/mail/red_cgi.png'>
                        </p>
                    </td>
                </tr>
            </table>
            
            <p style=" text-align: center; padding-bottom: 25px; ">
                <a href="<?php echo base_url(); ?>signup/user_confirm_email/<?php echo $code; ?>" style=" text-decoration: none; cursor: pointer;" target="_blank"><input type="button" value="confirm address" style=" font-family: 'GOTHIC'; background-color: #20b888; border-radius: 4px; height: 36px;width: 150px; color: #fff; border-style: none; font-weight: bold; cursor: pointer;"></a>
            </p>            
        </td>
    </tr>
    <tr height='140' >
        <td style='text-align: center; color: #fff;'  bgcolor='#20b888' width='800'>
            <span style=" font-size: 16px;">This email was sent to <?php echo $email_id; ?></span>
            <span style=" font-size: 16px;">from iSalesMate</span><br/>                     
        </td>        
    </tr>
</table>
        </body>
</html>