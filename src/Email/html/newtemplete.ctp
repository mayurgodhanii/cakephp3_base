<?php

use Cake\Core\Configure;
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;"/>
    </head>
    <body style="padding:0; margin:0; color:#6e6e6e; font-family:Verdana; -webkit-text-size-adjust: none;">
        <table  style="-webkit-text-size-adjust: none;" width="100%" cellspacing="0" cellpadding="0" border="0">
            <tr>
                <td align="center">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="min-width:200px; border: 1px solid #e5e5e5; max-width:600px; border-collapse: collapse;">
                        <tr style="background:#4d81ae;">
                            <td>
                        <center>
                            <a  style="color:white; text-decoration:none;" href="#">
                                <h1>
                                    <img src="http://openxcell.com/ims/img/businessInquiry-logo.png" alt="<?php echo Configure::read('SITE_TITLE'); ?>" />
                                </h1>                                
                            </a>
                        </center>
                </td>
            </tr>
            <tr>
                <td style="padding: 15px; font-size: 10pt; line-height: 22px;">
                    <?php
                    $content = explode("\n", $content);
                    foreach ($content as $line):
                        echo $line;
                    endforeach;
                    ?>
                </td>
            </tr>
            <tr>
                <td style="text-align: center; background-color: rgb(76, 76, 76); color: rgb(255, 255, 255); padding-top: 5px; padding-bottom: 5px; font-weight: bold; font-size: 30px;" colspan="2">
                    <img src="http://www.openxcell.com/wp-content/uploads/2014/03/openxcell-logo.png" alt="Openxcell">
                </td>
            </tr>
            <tr>
                <td style="text-align: center; background-color: rgb(76, 76, 76); color: rgb(255, 255, 255); padding: 0px 0px 10px;" colspan="2"> Copyright � <?php echo date('Y'); ?> by OpenXcell Technolabs </td>
            </tr>
        </table>
    </td>
</tr>
</table>
</body>
</html>

