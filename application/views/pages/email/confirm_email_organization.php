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
    <tr height='75' >
        <td style='text-align: center; height: 75px;box-shadow: 0px 2px 5px #ccc;'  bgcolor='#3a24a9;' width='100'>
           <img width='' src='<?php echo base_url(); ?>assets/images/mail/isalesmate_with_title.png' class="img-height">
        </td>     
        <td style='text-align: center; height: 75px;box-shadow: 0px 2px 5px #ccc;'  bgcolor='#f7f7f7' width='400'>
           <h2 style='text-align: center; color: #1b9d74; font-family: "GOTHIC"; font-size: 44px;margin-top: 30px;'>Activate your account!</h2>
        </td>        
    </tr>
    <tr style="">
        <td colspan="2"  bgcolor='#fff' style=' padding: 0 10px 0 10px;  box-shadow: 0px 2px 5px #ccc;' width='800'>
            <style> h1 {font-size:16px} p {color:#20b888; padding: 8px;} li {color:#20b888; padding: 5px;} span { font-weight: bold}</style>
            
            <p style=" font-size: 16px;">Hi <?php echo $data['name']; ?>,</p>
            <h2 style='text-align: center; color: #1b9d74; font-family: "GOTHIC"; font-size: 24px;'>You're nearly there!</h2>
            <p style=" font-family: GOTHIC; font-size: 16px;">We're ready to activate your iSalesMate account. All we need to do is make sure this is your email address.</p>
            
            <p style=" text-align: center; margin: 0px; padding: 0px; ">
                <a href="<?php echo base_url(); ?>signup/registration/<?php echo $code; ?>" style=" text-decoration: none; cursor: pointer;"><input type="button" value="confirm address" style=" font-family: 'GOTHIC'; background-color: #20b888; border-radius: 4px; height: 36px;width: 150px; color: #fff; border-style: none; font-weight: bold; cursor: pointer;"></a>
            </p>
           
            <p style=" font-size: 16px;">Thank you! The iSalesMate Team</p>
        </td>
    </tr>
    <tr height='60' >
        <td colspan="2"  style='background: #ececec;text-align: center;color: #585252;box-shadow: 0px 2px 5px #ccc;'  bgcolor='#20b888' width='800'>
            <span style=" font-size: 16px;">This email was sent to <?php echo $email_id; ?></span>
            <span style=" font-size: 16px;">from iSalesMate</span><br/>          
        </td>        
    </tr>
</table>
        </body>
</html>