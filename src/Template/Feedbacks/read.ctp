<div class="content">
    <div class="row">
        <?php
        //Checking if there are no feedbacks for the user or not
        function checkIfEmpty($obj){
            $count=0;
            foreach ($obj as $item){
                $count++;
            }
            return $count;
        }
        if(checkIfEmpty($feedbacks)) {

            foreach ($feedbacks as $feedback) {
                ?>
                <div class="col-md-12">
                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <i class="fa fa-commenting-o"></i>

                            <h3 class="box-title">
                                <?php echo $feedback->title; ?>
                            </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <?php echo $feedback->content; ?>
                        </div>
                        <div class="box-footer text-right">
                            <h5>
                                <strong>
                                    <?php echo '- ' . $feedback->user->first_name . ' ' . $feedback->user->last_name; ?>
                                </strong>
                            </h5>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <?php
            }
        }
        else{
            ?>
            <section class="content">

                <div class="error-page">
                    <h1 class="text-success">Sorry</h1>

                    <div class="error-content">
                        <h3><i class="ion ion-sad"></i> No Feedbacks For You.</h3>
                        <p>
                            Don't be sad, you'll eventually get the chance tomorrow.
                            <br>
                            Your Feedbacks and Ratings are Valuable.
                            <br>
                        </p>
                    </div>
                </div>
            </section>
        <?php
        }
        ?>
    </div>
</div>