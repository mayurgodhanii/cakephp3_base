<script>
    $(document).ready(function () {
        $("#formadd").validate({
            errorClass: 'error m-error',
            errorElement: 'small',
            rules: {
                "new_password": {
                    required: true,
                    minlength: 5
                },
                "confirm_password": {
                    required: true,
                    minlength: 5,
                    equalTo: "#password",
                }
            },
            messages: {
                "confirm_password": {
                    equalTo: "Enter Confirm Password Same as Password."
                }
            }

        });
    });
</script>
<section class="content-header">
    <h1>
        Change Password
<!--        <small>Preview</small>-->
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo $this->Url->build(array('controller' => 'dashboards', 'action' => 'index')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>     
        <li class="active">Change Password</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Change Password</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php echo $this->Form->create($users, array('id' => 'formadd', 'class' => 'form-horizontal')); ?>
                <div class="box-body big">
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-offset-2 control-label">Old Password *</label>
                        <div class="col-sm-4">
                            <?php
                            echo $this->Form->input('old_password', array(
                                'label' => FALSE,
                                'type' => 'password',
                                'class' => "form-control required"
                            ));
                            ?>
                        </div>                                    
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-offset-2 control-label">New Password *</label>
                        <div class="col-sm-4">
                            <?php
                            echo $this->Form->input('new_password', array(
                                'label' => FALSE,
                                'type' => 'password',
                                'class' => "form-control required",
                                'id' => 'password'
                            ));
                            ?>
                        </div>                                    
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-offset-2 control-label">Confirm Password *</label>
                        <div class="col-sm-4">
                            <?php
                            echo $this->Form->input('confirm_password', array(
                                'label' => FALSE,
                                'type' => 'password',
                                'class' => "form-control required"
                            ));
                            ?>
                        </div>                                    
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-offset-2 control-label">&nbsp;</label>
                        <div class="col-sm-4">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>                                    
                    </div>
                </div><!-- /.box-body -->               
                <?php echo $this->Form->end(); ?>
            </div><!-- /.box -->            
        </div><!--/.col (left) -->                
    </div>   <!-- /.row -->
</section><!-- /.content -->