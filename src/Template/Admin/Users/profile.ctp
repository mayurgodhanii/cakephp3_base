
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
        My Profile
        <small>Change profile information</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo $this->Url->build(array('controller' => 'dashboards', 'action' => 'index')) ?>"><i class="fa fa-dashboard"></i> Home</a></li>        
        <li class="active">My Profile</li>
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
                    <h3 class="box-title">My Profile</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <!--<form class="form-horizontal">-->
                <?php echo $this->Form->create($users, array('type' => 'file', 'enctype' => 'multipart/form-data', 'id' => 'formadd', 'class' => 'form-horizontal')); ?>
                <div class="box-body">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Name *</label>
                        <div class="col-sm-4">                                
                            <?php echo $this->Form->input("name", array('label' => false, 'div' => false, 'class' => "form-control required")) ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Bio</label>
                        <div class="col-sm-4">                                
                            <?php echo $this->Form->input("bio", array('type' => 'textarea', 'label' => false, 'div' => false, 'class' => "form-control")) ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Profile Picture</label>
                        <div class="col-sm-4">                                
                            <?php echo $this->Form->input("profile", array('type' => 'file', 'label' => false, 'div' => false, 'class' => "", 'onchange' => 'showimagepreview(this)')) ?>
                        </div>
                    </div>
                    <?php
                    if (!empty($users->profile)) {
                        $image_src = $this->Url->build('/upload/thumb/' . $users->profile);
                    } else {
                        $image_src = $this->Url->build('/img/admin-icon.png');
                    }
                    ?>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">&nbsp;</label>
                        <div class="col-sm-4">                                
                            <div class="roundimage-100">
                                <img id="imgprvw" src="<?php echo $image_src; ?>" />
                            </div>
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
    function showimagepreview(input) {
        if (input.files && input.files[0]) {
            var filerdr = new FileReader();
            filerdr.onload = function (e) {
                $('#imgprvw').attr('src', e.target.result);
            };
            filerdr.readAsDataURL(input.files[0]);
        }
    }
</script>