<?php

use Cake\Core\Configure;

$theme_folder = $this->Url->build('/htmllayout/base_theme/');
?>
﻿<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $this->fetch('title'); ?> | <?php echo Configure::read('SITE_TITLE'); ?></title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="description" content="">
        <meta name="author" content="Mayur Godhani">
        <?php echo $this->Html->meta('icon'); ?>                
        <?php
        echo $this->Html->css("$theme_folder/bootstrap/css/bootstrap.min.css");
        echo $this->Html->css("$theme_folder/font-awesome/css/font-awesome.min.css");
        echo $this->Html->css("$theme_folder/ionicons/css/ionicons.min.css");
        echo $this->Html->css("$theme_folder/dist/css/AdminLTE.min.css");
        echo $this->Html->css("$theme_folder/dist/css/skins/_all-skins.min.css");

        echo $this->Html->css("$theme_folder/plugins/jquery-ui/jquery-ui.min.css");
        echo $this->Html->css("$theme_folder/plugins/gritter/css/jquery.gritter.css");
        echo $this->Html->css("/htmllayout/css/utility.min.css");
        echo $this->Html->css("/htmllayout/css/developer.css");
        ?>
        <!-- jQuery 2.1.4 -->
        <script src="<?php echo $theme_folder; ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <?php
    $body_class = "";
    $body_class = $body_class . " " . (isset($settingsTableData['theme']) ? $settingsTableData['theme'] : "skin-blue");
    $body_class = $body_class . " " . ((isset($settingsTableData['fixed']) && ($settingsTableData['fixed'] == 1)) ? "fixed" : "");
    ?>
    <body class="hold-transition <?php echo $body_class; ?> sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">
            <?php
            echo $this->element('Htmllayout.base_theme/admin_topnavigation');
            echo $this->element('Htmllayout.base_theme/admin_sidebar');
            ?>
            <div class="content-wrapper">
                <?php echo $this->fetch('content'); ?>
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
            </div> 
            <?php
            echo $this->element('Htmllayout.base_theme/admin_footer');
            ?>           
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->       
        <?php
        echo $this->Html->script("$theme_folder/bootstrap/js/bootstrap.min.js");
        echo $this->Html->script("$theme_folder/plugins/slimScroll/jquery.slimscroll.min.js");
        echo $this->Html->script("$theme_folder/plugins/fastclick/fastclick.min.js");
        echo $this->Html->script("$theme_folder/dist/js/app.min.js");

        echo $this->Html->script("$theme_folder/plugins/jquery-ui/jquery-ui.min.js");
        echo $this->Html->script("$theme_folder/plugins/gritter/js/jquery.gritter.min.js");
        echo $this->Html->script("$theme_folder/plugins/jquery-validate/jquery.validate.min.js");
        ?>

        <?php $flash_message = strip_tags(trim($this->Flash->render())); ?>
        <?php if (!empty($flash_message)) { ?>
            <script>
                /*
                 * For Notification with alert.
                 * glitterCallAlert("Title","Message","HideSpeed","SlowSpeed","NotificationClassName");
                 * E.g glitterCallAlert("Notification :","Mayur GOdhani",5000,500,"my-sticky-class");                
                 */
                $(document).ready(function () {
                    glitterCallAlert("Notification :", '<?php echo $flash_message; ?>');
                });
            </script> 
        <?php } ?>       
        <script>
            jQuery(document).ready(function () {
                $(document).on('click', '.ajaxviewmodel', function (event) {
                    var tmp_html = '<div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-body"><p class="ajaxloader"><i class="fa fa-refresh fa-spin fa-3x fa-fw margin-bottom"></i></p></div></div></div>';
                    event.preventDefault();
                    var link = $(this).attr("href");
                    $('#myModal').modal('show');
                    $("#myModal").html(tmp_html);
                    $.ajax({
                        url: link,
                        success: function (data) {
                            $(".ajaxloader").hide();
                            $("#myModal").html(data);
                        }
                    });
                });
            });
        </script>
    </body>
</html>
