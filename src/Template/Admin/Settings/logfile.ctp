<style>
    .m-log-bg{
        background-color: rgb(238, 238, 238);
        border-radius: 5px;
        cursor: no-drop;
        height: 400px;
        overflow-x: auto;
        padding: 5px;
    }
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Access Log
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo $this->Url->build(array('controller' => 'dashboards', 'action' => 'index')) ?>"><i class="fa fa-dashboard"></i> Home</a></li>        
        <li class="active">Access Log</li>
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
                    <h3 class="box-title">Access Log</h3>
                </div><!-- /.box-header -->                              

                <div class="box-body margin-top-sm">
                    <form id="searchform" method="get" class="">                        
                        <div class="row table-header-element">                            
                            <div class="col-md-2 pull-right">
                                <span class="select-span">entries</span>                                
                                <span class="select-limit">
                                    <?php
                                    $limit_options = array(20 => 20, 50 => 50, 100 => 100, 'all' => 'All');
                                    echo $this->Form->input('limit', array(
                                        'value' => (isset($_GET['limit']) ? $_GET['limit'] : ""),
                                        'type' => 'select',
                                        'options' => $limit_options,
                                        'class' => 'form-control submitform-select',
                                        'style' => 'width: 100%;',
                                        'label' => FALSE,
                                        'div' => FALSE,
                                        'id' => 'selectlimit'
                                    ));
                                    ?>
                                </span>
                                <span class="select-span">Show</span>                                
                            </div>   
                        </div>
                    </form>
                    <script>
                        $(function () {
                            $(".submitform-select").change(function () {
                                $("#searchform").submit();
                            });
                        });
                    </script>

                    <div class="m-log-bg">
                        <?php
                        $logs = trim($logs);
                        if (!empty($logs)) {
                            echo $logs;
                        } else {
                            echo "Logs not available.";
                        }
                        ?>
                    </div>
                </div>


            </div><!-- /.box-body -->                                
        </div><!-- /.box -->         
    </div><!--/.col (left) -->                
</div>   <!-- /.row -->
</section><!-- /.content -->