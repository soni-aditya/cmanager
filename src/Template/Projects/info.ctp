<div class="content">
    <div class="row">
        <?php
        foreach ($UserProjects as $userProject){
            ?>
            <div class="col-md-12">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <i class="fa fa-commenting-o"></i>

                        <h3 class="box-title">
                            <?php echo $userProject['title'] ;?>
                        </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?php echo $userProject['content'] ;?>
                        <hr>
                        <p class="text-left">
                            <h4>
                                <u>Team Info :</u>
                            </h4>
                            <p>
                                <strong>Leader :</strong>
                                &nbsp;&nbsp;&nbsp;
                                <?php echo $userProject['leader'] ;?>
                            </p>
                        <p class="text-left">
                            <strong>Team Members :</strong>
                            <br>
                            <?php
                                $members=$userProject['team'];
                                $count=1;
                                foreach ($members as $member){
                                    echo $count.')  '.$member.'<br>';
                                    $count++;
                                }
                            ?>
                        </p>
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