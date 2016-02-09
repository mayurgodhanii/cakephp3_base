<?php

use Cake\Core\Configure;

//echo $theme_folder;exit;
//$theme_folder = $this->Url->build('/htmllayout/adminlte');
//echo $theme_folder;exit;
$theme_folder = $this->Url->build('/htmllayout/base_theme/');
?>
﻿﻿<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <?php echo $this->Html->meta('icon'); ?>
        <title><?php echo Configure::read('SITE_TITLE'); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- STYLESHEETS --><!--[if lt IE 9]><script src="js/flot/excanvas.min.js"></script><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script><![endif]-->
        <?php
        /* --- Core CSS --- */
        echo $this->Html->css("$theme_folder/bootstrap/css/bootstrap.min.css");
        echo $this->Html->css("$theme_folder/dist/css/AdminLTE.min.css");

        /* --- Custom css --- */
        echo $this->Html->css("/htmllayout/css/login.css");
        echo $this->Html->css("/htmllayout/css/utility.css");
        /* --- Core JS --- */
        ?>   
        <script src="<?php echo $theme_folder; ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>  
        <?php
        echo $this->Html->script("$theme_folder/plugins/jquery-validate/jquery.validate.min.js");
        ?>
    </head>
    <body class="hold-transition login-page">	
        <!-- Content -->
        <div class="login-box">
            <?php echo $this->fetch('content'); ?>
        </div>        
        <?php
        echo $this->Html->script("$theme_folder/bootstrap/js/bootstrap.min.js");
        ?>
    </body>
</html>