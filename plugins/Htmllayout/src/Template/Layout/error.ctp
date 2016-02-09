<?php

use Cake\Core\Configure;

$theme_folder = $this->Url->build('/htmllayout/base_theme');
?>
﻿﻿<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $this->fetch('title'); ?> | <?php echo Configure::read('SITE_TITLE'); ?></title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="<?php echo $theme_folder; ?>/bootstrap/css/bootstrap.min.css" />
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">                
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo $theme_folder; ?>/dist/css/AdminLTE.min.css">
    </head>
    <body class="hold-transition lockscreen">
        <!-- Automatic element centering -->
        <div class="lockscreen-wrapper">
            <div class="lockscreen-logo">
                <a href="<?php echo $this->Url->build('/'); ?>"><b><?php echo Configure::read('SITE_TITLE'); ?></b></a>
            </div>            
            <div class="error-page">
                <h2 class="headline text-yellow"> 404</h2>
                <div class="error-content" style="padding-top: 15px;">
                    <h3><i class="fa fa-warning text-yellow"></i> Oops! Page not found.</h3>
                    <p>
                        We could not find the page you were looking for.
                        <br />Meanwhile, you may <a href="<?php echo $this->Url->build('/'); ?>">return to home.</a>
                    </p>
                </div><!-- /.error-content -->
            </div>
        </div><!-- /.center -->

        <!-- jQuery 2.1.4 -->
        <script src="<?php echo $theme_folder; ?>/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="<?php echo $theme_folder; ?>/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>
