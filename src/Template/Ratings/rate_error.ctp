<?php
if($error == 1) {
    ?>


    <section class="content-header">
        <h1>
            Mysql Conflict
        </h1>
    </section>
    <section class="content">

        <div class="error-page">
            <h2 class="headline text-success">OOPs</h2>

            <div class="error-content">
                <h3><i class="ion ion-happy"></i> U Have Already Rated your day.</h3>
                <p>
                    Don't be sad, you'll eventually get the chance tomorrow.
                    <br>
                    Your Feedbacks and Ratings are Valuable.
                    <br>
                </p>
                <a href="/cmanager/Dashboard/">
                    <h4 class='text-right'><i class='fa fa-arrow-circle-left'></i>&nbsp;&nbsp; Getback To Dashboard</h4>
                </a>
            </div>
        </div>
    </section>



    <?php
}
?>