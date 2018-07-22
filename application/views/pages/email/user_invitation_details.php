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
                <style> h1 {font-size:16px} p {color:#20b888; padding: 8px;} li {color:#20b888; padding: 5px;} span { font-weight: bold}</style>
                <h2 style='text-align: center; color: #1b9d74; font-family: "GOTHIC"; font-size: 24px;'>You've taken the first step towards sales domination!</h2>
                <p style=" font-size: 16px;">Hi <?php echo $name; ?>,</p>
                <p style=" font-family: GOTHIC; font-size: 16px;">Below you will find all of your account information. Keep it in a safe place.</p>
                <ul>
                    <li>Organization: <span style=" color: #1b9d74; font-size: 16px;"><?php echo $organization_name; ?></span></li>
                    <li>Username: <span style=" color: #1b9d74; font-size: 16px;"><?php echo $email_id; ?></span></li>
                    <li>Password: <span style=" color: #1b9d74; font-size: 16px;">******</span></li>
                </ul>
                <p style=" padding-bottom: 0px; font-size: 16px;">You can now log in to the iSalesMate application. If you do not have a copy of the iSalesMate iPad application, please download it from the iTunes App Store.</p>

                <p style=" text-align: center; margin: 0px; padding: 0px; ">
                    <a href="http://www.google.com" target="_blank"><img width='' title="Link of app" src='<?php echo base_url(); ?>/assets/images/mail/aple1.png'></a>
                </p>
                <p style=" padding-top: 0px; font-size: 16px;">if you're having trouble accessing your account, contact your administrator, <?php echo $admin_name; ?> .</p>
                <p style=" font-size: 16px;">Thank you!  The iSalesMate Team</p>
            </td>
        </tr>
        <tr height='80' >
            <td style='text-align: center; color: #fff;'  bgcolor='#20b888' width='800'>
                <span style=" font-size: 16px;">This email was sent to <?php echo $email_id; ?></span>
                <span style=" font-size: 16px;">from iSalesMate</span><br/>            
            </td>        
        </tr>
    </table>
</body>
</html>