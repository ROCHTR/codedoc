<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="ROOT Admin - UI Admin Kit Powered by Bootstrap 4">
        <meta name="author" content="Lukasz Holeczek">
        <meta name="keyword" content="ROOT Admin - UI Admin Kit Powered by Bootstrap 4">
        <!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->
        <title>CodeDoc | SingUp</title>
        <!-- Main styles for this application -->
        <link href="<?php echo base_url('assets/frontuser/css/style.css'); ?>" rel="stylesheet">
    </head>
    <body class="">
        <div class="container">
            <div class="row">
                <div class="col-md-5 center-block pull-xs-none">
                    <div class="card vamiddle">
                    <?php echo form_open('user/User/insertnew/'); ?>
                        <div class="card-block p-a-2">
                            <h1>Register</h1>
                            <p class="text-muted">Create your account</p>
                            <div class="input-group m-b-1">
                                <span class="input-group-addon"><i class="icon-user"></i></span>
                                <input type="text" class="form-control" placeholder="Username" name="username">
                            </div>
                            <div class="input-group m-b-1">
                                <span class="input-group-addon">@</span>
                                <input type="text" class="form-control" placeholder="Email" name="email">
                            </div>
                            <div class="input-group m-b-1">
                                <span class="input-group-addon"><i class="icon-lock"></i></span>
                                <input type="password" class="form-control" placeholder="Password" name="password">
                            </div>
                            <!-- <button type="button" class="btn btn-block btn-success">Create Account</button> -->
                            <?php echo form_submit(array('id' => 'submit', 'value' => 'Create Account','class'=>"btn btn-block btn-success")); ?>
                        </div>
                    <?php echo form_close(); ?>
                        <div class="card-footer p-a-2">
                            <a style="text-decoration: none;" href="<?php echo site_url('user/User/view_login'); ?>">
                                <button type="button" class="btn btn-block btn-primary">Login</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap and necessary plugins -->
        <script src="<?php echo base_url('assets/frontuser/js/libs/jquery.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/frontuser/js/libs/tether.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/frontuser/js/libs/bootstrap.min.js'); ?>"></script>
        <script>
        function verticalAlignMiddle()
        {
            var bodyHeight = $(window).height();
            var formHeight = $('.vamiddle').height();
            var marginTop = (bodyHeight / 2) - (formHeight / 2);
            if (marginTop > 0)
            {
                $('.vamiddle').css('margin-top', marginTop);
            }
        }
        $(document).ready(function()
        {
            verticalAlignMiddle();
        });
        $(window).bind('resize', verticalAlignMiddle);
        </script>
        
        
    </body>
</html>