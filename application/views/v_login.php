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
        <title>CodeDoc | Login</title>
        <!-- Main styles for this application -->
        <link href="<?php echo base_url('assets/frontuser/css/style.css'); ?>" rel="stylesheet">
    </head>
    <body class="">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="card-group vamiddle">
                        <div class="card  p-a-2">
                            <div class="card-block">
                            <?php echo form_open('user/User/login/'); ?>
                                <h1>Login</h1>
                                <p class="text-muted">Sign In to your account</p>
                                <div class="input-group m-b-1">
                                    <span class="input-group-addon">@</i></span>
                                    <input type="text" class="form-control" placeholder="Email" name="email">
                                </div>
                                <div class="input-group m-b-2">
                                    <span class="input-group-addon"><i class="icon-lock"></i></span>
                                    <input type="password" class="form-control" placeholder="Password" name="password">
                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <?php echo form_submit(array('id' => 'submit', 'value' => 'Login','class'=>"btn btn-primary p-x-2")); ?>
                                    </div>
                                    <!-- <div class="col-xs-6 text-xs-right">
                                        <button type="button" class="btn btn-link p-x-0">Forgot password?</button>
                                    </div> -->
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                        <div class="card card-inverse card-primary p-y-3" style="width:44%">
                            <div class="card-block text-xs-center">
                                <div>
                                    <h2>Sign up</h2>
                                    <p>Don't have an account?</p>
                                    <a style="text-decoration: none;" href="<?php echo site_url('user/User/registrasi'); ?>">
                                    <button type="button" class="btn btn-primary active m-t-1">Register Now!</button>
                                    </a>
                                </div>
                            </div>
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