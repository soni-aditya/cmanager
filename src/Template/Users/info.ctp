        <section class="content-header">
            <h1>
                User Profile
                <small>View User Information</small>
            </h1>
        </section>
        <section class="col-sm-4"></section>
        <!-- Main content -->
        <section class="content col-sm-4">
            <!-- COLOR PALETTE -->
            <div class="box box-default color-palette-box">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-user"></i> User Information</h3>
                </div>
                <div class="box-body">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="../img/profile_dummy.png" alt="User profile picture">

                        <h3 class="profile-username text-center">
                            <?php
                                echo $user['username'];
                            ?>
                        </h3>

                        <p class="text-muted text-center">
                            <?php
                                echo ucwords($user['type']['name']);
                            ?>
                        </p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Projects in Hand</b>
                                <span id="project_count" class="pull-right">01</span>
                            </li>
                            <li class="list-group-item">
                                <b>Team Members</b>
                                <span id='total_feedbacks' class="pull-right">03</span>
                            </li>
                        </ul>

<!--                        <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>-->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </section>
<!--        <section class="col-sm-8">-->
            <!-- COLOR PALETTE -->
<!--            <div class="box box-default" style="overflow-y: hidden !important">-->
<!--                <div class="box-header with-border">-->
<!--                    <h3 class="box-title"><i class="fa fa-building-o"></i>&nbsp; Feedbacks You Wrote</h3>-->
<!--                </div>-->
<!--                <div class="box-body">-->
<!--                    --><?php
//                    foreach ($feedbacks as $feedback){
//                        ?>
<!--                        <div class="callout callout-default">-->
<!--                            <h4>I am a danger callout!</h4>-->
<!---->
<!--                            <p>There is a problem that we need to fix. A wonderful serenity has taken possession of my entire soul,-->
<!--                                like these sweet mornings of spring which I enjoy with my whole heart.</p>-->
<!--                        </div>-->
<!--                    --><?php
//                    }
//                    ?>
<!--                    <div class="callout callout-default">-->
<!--                        <h4>I am a danger callout!</h4>-->
<!---->
<!--                        <p>There is a problem that we need to fix. A wonderful serenity has taken possession of my entire soul,-->
<!--                            like these sweet mornings of spring which I enjoy with my whole heart.</p>-->
<!--                    </div>-->
<!--                    <div class="callout callout-default">-->
<!--                        <h4>I am a danger callout!</h4>-->
<!---->
<!--                        <p>There is a problem that we need to fix. A wonderful serenity has taken possession of my entire soul,-->
<!--                            like these sweet mornings of spring which I enjoy with my whole heart.</p>-->
<!--                    </div>-->
<!--                </div>-->
                <!-- /.box-body -->
<!--            </div>-->
            <!-- /.box -->
<!--        </section>-->
