
<script>
    $(document).ready(function () {
        $("#formadd").validate({
            errorClass: 'error m-error',
            errorElement: 'small'
        });
    });
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Default Settings
        <small>Change default theme appearance</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo $this->Url->build(array('controller' => 'dashboards', 'action' => 'index')) ?>"><i class="fa fa-dashboard"></i> Home</a></li>        
        <li class="active">Default Settings</li>
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
                    <h3 class="box-title">Default Settings</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <!--<form class="form-horizontal">-->
                <?php echo $this->Form->create('Setting', array('type' => 'file', 'enctype' => 'multipart/form-data', 'id' => 'formadd', 'class' => 'form-horizontal')); ?>
                <div class="box-body">
                    <?php foreach ($settings as $setting) { ?>
                        <?php
                        $input_class = "";
                        if ($setting->input_type == "text") {
                            $input_class = "form-control required";
                        } elseif ($setting->input_type == "url") {
                            $input_class = "form-control required url";
                        } elseif ($setting->input_type == "number") {
                            $input_class = "form-control required number";
                        } else {
                            $input_class = "form-control required";
                        }
                        ?>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label"><?php echo ucwords(str_replace('_', ' ', $setting->key)); ?></label>
                            <div class="col-sm-4">                                
                                <?php echo $this->Form->input($setting->key, array('label' => false, 'div' => false, 'class' => $input_class, 'value' => $setting->value)) ?>
                            </div>
                        </div>
                    <?php } ?>                    
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">&nbsp;</label>
                        <div class="col-sm-4">
                            <a href="javascript:void(0);" class="btn btn-default" onclick="history.go(-1);">Cancel</a>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </div>
                </div><!-- /.box-body -->                    
                </form>
            </div><!-- /.box -->         
        </div><!--/.col (left) -->                
    </div>   <!-- /.row -->
</section><!-- /.content -->