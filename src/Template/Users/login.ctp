<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo isset($theme['title']) ? $theme['title'] : 'AdminLTE 2 | Register'; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <?php echo $this->Html->css('AdminLTE./bootstrap/css/bootstrap'); ?>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <?php echo $this->Html->css('AdminLTE.AdminLTE.min'); ?>
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <?php echo $this->Html->css('AdminLTE.skins/skin-blue'); ?>
    <?php echo $this->Html->css('AdminLTE./plugins/iCheck/square/blue'); ?>
    <?php echo $this->fetch('css'); ?>
    <?php echo $this->Html->css('custom'); ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>

    </style>
</head>
<body class="hold-transition login-page">
<div class="register-box">
   <div class="login-box-header text-center">
       <h1><strong>C</strong>Manager</h1>
   </div>
    <div class="login-box-body">
<!--        <p class="login-box-msg"><a href="/">Click here for more information</a></p>-->

        <!-- <form action="../../index2.html" method="post">
           <div class="form-group has-feedback">
             <input type="email" class="form-control" placeholder="Email">
             <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
           </div>
           <div class="form-group has-feedback">
             <input type="password" class="form-control" placeholder="Password">
             <span class="glyphicon glyphicon-lock form-control-feedback"></span>
           </div>
           <div class="row">
             <div class="col-xs-8">
               <div class="checkbox icheck">
                 <label>
                   <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Remember Me
                 </label>
               </div>
             </div>

             <div class="col-xs-4">
               <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
             </div>

           </div>
         </form> --><?= $this->Flash->render() ?>

        <?= $this->Form->create() ?>
<!--        --><?//= $this->Form->input('email', ['required' => true]) ?>
        <?= $this->Form->input('username', ['required' => true]) ?>
        <?= $this->Form->input('password', ['required' => true]) ?>
        <?= $this->Form->hidden('timezone',['id'=>'timezone']) ?>


        <div class="row">
            <div class="col-xs-8">

            </div>
            <!-- /.col -->
            <div class="col-xs-12">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
            </div>
            <!-- /.col -->
        </div>
        <?php echo $this->Form->end(); ?>


        <!-- /.social-auth-links -->
<!--        <div class="row">-->
<!--            <div class="col-xs-6">-->
<!--                <a href="--><?php //echo $this->Url->build('/users/forgot-Password'); ?><!--" class="login-page-bottom-text-size"><b>Forgot password</a>-->
<!--               </div>-->
<!--            <div class="col-xs-6">-->
<!--                <a href="--><?php //echo $this->Url->build('/users/registration'); ?><!--" class="text-right login-page-bottom-text-size" style="float: right"><b>Register Business</a>-->
<!--            </div>-->
<!--        </div>-->
    <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery  -->
    <?php echo $this->Html->script('jquery'); ?>
<?php //echo $this->Html->script('AdminLTE./plugins/jQuery/jQuery-2.1.4.min'); ?>
<!-- Bootstrap 3.3.5 -->
<?php echo $this->Html->script('AdminLTE./bootstrap/js/bootstrap'); ?>
<!-- iCheck -->
<?php echo $this->Html->script('AdminLTE./plugins/iCheck/icheck.min'); ?>

<script>


    $(function () {
        var offset = new Date().getTimezoneOffset();
//        console.log(offset);

        $('#timezone').val(offset);

        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });



    });


</script>

<!-- AdminLTE for demo purposes -->
<?php echo $this->fetch('script'); ?>
<?php echo $this->fetch('scriptBotton'); ?>

</body>
</html>
