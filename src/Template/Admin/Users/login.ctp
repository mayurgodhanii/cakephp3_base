<?php

use Cake\Core\Configure;
?>
<div class = "login-logo">
    <a href = "<?php echo $this->Url->build('/') ?>"><?php echo Configure::read('SITE_TITLE');
?></a>
</div>
<div class="login-box-body">
    <p class="login-box-msg">Sign in to admin</p>
        <?php echo $this->Form->create(); ?>
    <div class="form-group">
<?php echo $this->Flash->render(); ?>
    </div>

    <div class="form-group">
        <?php
        echo $this->Form->input('username', array(
            'label' => false,
            'placeholder' => "Username",
            'class' => "form-control"
                )
        );
        ?>
    </div>

    <div class="form-group">
        <?php
        echo $this->Form->input('password', array(
            'label' => false,
            'placeholder' => 'Password',
            'class' => "form-control"
                )
        );
        ?>
    </div>

    <div class="row">
        <!--        <div class="col-xs-8">
<?php // echo $this->Html->link('Forgot Password?', array('controller' => 'users', 'action' => 'reset_password', 'admin' => false));  ?>
                </div>-->
        <div class="col-xs-4 col-xs-offset-4">
            <button type="submit" class="btn btn-default btn-block btn-flat">Sign In</button>
        </div>
    </div>
<?php echo $this->Form->end(); ?>    
</div>