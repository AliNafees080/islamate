<html>
    <head>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font.css">        
    </head>
    <body>
        
    
<table cellspacing='0' cellpadding='0' style='margin:auto; font-style:normal; font-weight: normal; font-family: "GOTHIC",Arial;'> 
    <tr height='140' >
        <td style='text-align: center; height: 200px;'  bgcolor='#20b888' width='800'>
           <img width='' src='<?php echo base_url(); ?>/assets/images/mail/isalesmate_with_title.png'>
        </td>        
    </tr>
    <tr style="">
        <td  bgcolor='#fff' style=' padding: 0 15px 0 15px;  border: solid #20b888 2px;' width='800'>
            <style> h1 {font-size:16px} p {color:#20b888; padding: 15px;} li {color:#20b888; padding: 5px;} span { font-weight: bold}</style>
            <h2 style='text-align: center; color: #1b9d74; font-family: "GOTHIC";'>You've taken the first step towards sales domination!</h2>
            <p>Hi <?php echo $data['first_name']; ?>,</p>
            <p>Below you will find all of your account information. Keep it in a safe place.</p>
            <ul>
                <li>Organization: <span><?php echo $data['organization_id']; ?></span></li>
                <li>Username: <span><?php echo $data['email_id']; ?></span></li>
                <li>Password: <span>****</span></li>
            </ul>
            <p>You can now log in to the Salesbean app. You can download it from the iTunes App Store or the Google Play Store.</p>
            
            <p style=" text-align: center; margin: 0px; padding: 0px;">
                <img style=" width: 140px;" src='<?php echo base_url(); ?>/assets/images/mail/badge_android.png' title="Link of android app"><br/>
                <img style=" width: 140px; padding-top: 10px;" src='<?php echo base_url(); ?>/assets/images/mail/badge_ios.png' title="Link of ios app">
            </p>
            <p>if you're having trouble accessing your account, contact your administrator, brandie sheley.</p>
            <p>Cheers!The Salesbean Team</p>
        </td>
    </tr>
    <tr height='140' >
        <td style='text-align: center; color: #fff;'  bgcolor='#20b888' width='800'>
            <span>Salesbean</span><br/>
            <span>59 Grant Avenue, San Francisco, CA 94108</span>
        </td>        
    </tr>
</table>
        </body>
</html>