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
            <p class="line_height" style=" font-family: GOTHIC; font-size: 16px;">Hi <?php echo ucfirst($name); ?>,</p>
            <p class="line_height" style=" font-family: GOTHIC; font-size: 16px;">We got a request to reset your iSalesMate password.</p>
            <p style=" text-align: center;">
                <a href="<?php echo base_url(); ?>forgotpasswords/<?php echo $code; ?>" style=" text-decoration: none; cursor: pointer;" target="_blank"><input type="button" value="confirm address" style=" font-family: 'GOTHIC'; background-color: #20b888; border-radius: 4px; height: 36px;width: 150px; color: #fff; border-style: none; font-weight: bold; cursor: pointer;"></a>
            </p>            
            <p class="line_height" style=" font-family: GOTHIC; font-size: 16px;">If you ignore this message, your password won't be changed.</p>
            <p class="line_height" style=" font-family: GOTHIC; font-size: 16px;">Cheers! <br/>The iSalesMate Team</p>
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