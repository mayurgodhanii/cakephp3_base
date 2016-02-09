<?php

use Cake\Core\Configure;

$theme_folder = $this->Url->build('/htmllayout/base_theme/');
?>
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.3.0
    </div>
    <strong>Copyright &copy; 2014-2015 <a href="<?php echo Configure::read('COPY_RIGHT_LINK'); ?>"><?php echo Configure::read('COPY_RIGHT'); ?></a>.</strong> All rights reserved.
</footer>