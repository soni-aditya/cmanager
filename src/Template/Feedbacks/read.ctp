<div class="content">
    <div class="row">
        <?php
        foreach ($feedbacks as $feedback){
        ?>
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                        <i class="fa fa-commenting-o"></i>

                        <h3 class="box-title">
                            <?php echo $feedback->title ;?>
                        </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?php echo $feedback->content ;?>
                    </div>
                    <div class="box-footer text-right">
                        <h5>
                            <strong>
                                <?php echo '- '.$feedback->user->first_name.' '.$feedback->user->last_name;?>
                            </strong>
                        </h5>
                    </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <?php
            }
        ?>
    </div>
</div>