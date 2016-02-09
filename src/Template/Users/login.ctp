<?php

use Cake\Core\Configure;
?>
<script>
    $(document).ready(function () {
        $("#formadd").validate({
            errorClass: 'error m-error',
            errorElement: 'small'
        });
    });
</script>
<div class = "login-logo">
    <a href = "<?php echo $this->Url->build('/') ?>"><?php echo Configure::read('SITE_TITLE');
?></a>
</div>
<div class="login-box-body">
    <p class="login-box-msg">Sign in</p>
    <?php echo $this->Form->create('User', array('type' => 'file', 'enctype' => 'multipart/form-data', 'id' => 'formadd', 'class' => '')); ?>
    <div class="form-group">
        <?php echo $this->Flash->render(); ?>
    </div>

    <div class="form-group">
        <?php
        echo $this->Form->input('username', array(
            'label' => false,
            'placeholder' => "Enter your Email address",
            "required",
            'class' => "form-control required"
                )
        );
        ?>
    </div>

    <div class="form-group">
        <?php
        echo $this->Form->input('password', array(
            'label' => false,
            'placeholder' => 'Password',
            "required",
            'class' => "form-control required"
                )
        );
        ?>
    </div>

    <div class="row">
        <div class="col-xs-8">
            <a href="<?php echo $this->Url->build('/forgot') ?>">Forgot Password ?</a>
        </div>
        <div class="col-xs-4 pull-right">
            <button type="submit" class="btn btn-primary  btn-block btn-flat">Sign In</button>
        </div>
    </div>
    <?php echo $this->Form->end(); ?>    
</div>