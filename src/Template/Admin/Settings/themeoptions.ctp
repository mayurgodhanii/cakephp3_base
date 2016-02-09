<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Theme Options
        <small>Change default theme appearance</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo $this->Url->build(array('controller' => 'dashboards', 'action' => 'index')) ?>"><i class="fa fa-dashboard"></i> Home</a></li>        
        <li class="active">Theme Options</li>
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
                    <h3 class="box-title">Theme Options</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <!--<form class="form-horizontal">-->
                <?php echo $this->Form->create('Setting', array('type' => 'file', 'enctype' => 'multipart/form-data', 'id' => 'formadd', 'class' => 'form-horizontal')); ?>
                <div class="box-body">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Fixed layout</label>
                        <div class="col-sm-4">                                
                            <?php echo $this->Form->input("fixed", array('type' => 'checkbox', 'label' => false, 'div' => false, 'class' => "margin-left-none", (($settings['fixed'] == 1) ? "checked" : ""))) ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Select Theme</label>
                        <div class="col-sm-4">
                            <?php echo $this->Form->input("theme", array('type' => 'select', 'options' => $themes, 'id' => 'themeselect', 'label' => false, 'div' => false, 'class' => "form-control required", 'value' => $settings['theme'])) ?>
                        </div>
                    </div>
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
<script>
    $("#themeselect").change(function () {
        var selected_value = $("#themeselect").val();
        var class_name = "hold-transition sidebar-mini " + selected_value;
        $("body").attr('class', class_name);
    });

</script>