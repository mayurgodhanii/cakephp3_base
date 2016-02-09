<?php

use Cake\Core\Configure;

$theme_folder = $this->Url->build('/htmllayout/base_theme/');
?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <?php
                if (!empty($userAuth['profile'])) {
                    $image_src = $this->Url->build('/upload/thumb/' . $userAuth['profile']);
                } else {
                    $image_src = $this->Url->build('/img/admin-icon.png');
                }
                ?>
                <span class="roundimage-45">
                    <img src="<?php echo $image_src; ?>" alt="User Image">
                </span>
            </div>
            <div class="pull-left info">
                <p><?php echo $userAuth['name']; ?></p>                
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>            
            <li id="Dashboards_index">
                <a href="<?php echo $this->Url->build(array('controller' => 'dashboards', 'action' => 'index')); ?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>                    
                </a>
            </li>            
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gears"></i> <span>Settings</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li id="Users_changepassword"><a href="<?php echo $this->Url->build(array('controller' => 'users', 'action' => 'changepassword', 'plugin' => false)) ?>"><i class="fa fa-circle-o"></i> Change Password</a></li>
                    <li id="Settings_index"><a href="<?php echo $this->Url->build(array('controller' => 'settings', 'action' => 'index', 'plugin' => false)) ?>"><i class="fa fa-circle-o"></i> Default Settings</a></li>                    
                    <li id="Settings_themeoptions"><a href="<?php echo $this->Url->build(array('controller' => 'settings', 'action' => 'themeoptions', 'plugin' => false)) ?>"><i class="fa fa-circle-o"></i> Theme Options</a></li>
                </ul>
            </li>            
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
<script type="text/javascript">

    var controller = '<?php echo $this->request->controller; ?>';
    var action = '<?php echo $this->request->action; ?>';
    $('#' + controller + '_' + action).addClass('active');
    var className = $('#' + controller + '_' + action).parent().parent().attr('class');
    if (className == "treeview") {
        $('#' + controller + '_' + action).parent().parent().addClass('active');
    }
</script>