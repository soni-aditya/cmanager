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
    <?php echo $this->Html->css('myCss'); ?>
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
        <h3 class="text-danger">
            THIS PAGE DOESNOT EXIST
            <br>
            404 Error
        </h3>
        <h1>
            <a href="../">
                <i class="ion-ios-location"></i>&nbsp;&nbsp;<small>Go Back Home</small>
            </a>
        </h1>
    </div>
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







<?php
    die();
?>