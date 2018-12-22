<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="LeafUI Admin - UI Admin Kit Powered by Bootstrap 4">
        <meta name="author" content="Lukasz Holeczek">
        <meta name="keyword" content="LeafUI Admin - UI Admin Kit Powered by Bootstrap 4">
        <!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->
        <title>CodeDoc |</title>
        <!-- Main styles for this application -->
        <link href="<?php echo base_url('assets/frontuser/css/style.css'); ?>" rel="stylesheet">
    </head>
    <!-- BODY options, add following classes to body to change options
		1. 'sidebar-nav'		  - Navigation on the left
			1.1. 'sidebar-off-canvas'	- Off-Canvas
				1.1.1 'sidebar-off-canvas-push'	- Off-Canvas which move content
				1.1.2 'sidebar-off-canvas-with-shadow'	- Add shadow to body elements
		2. 'fixed-nav'			  - Fixed navigation
		3. 'navbar-fixed'		  - Fixed navbar
	-->
    <body class="navbar-fixed sidebar-nav fixed-nav">
        <header class="navbar">
            <div class="container-fluid">
                <button class="navbar-toggler mobile-toggler hidden-lg-up" type="button">&#9776;</button>
                <a style="width: 150px;" class="navbar-brand" href="#"><h3 class="brand">CodeDoc</h3></a>
                <ul class="nav navbar-nav hidden-md-down">
                <?php if ($this->session->userdata('name') != NULL ) { ?>
                    <li class="nav-item">
                        <a class="nav-link navbar-toggler layout-toggler" href="#">☰</a>
                    </li>
                    <li class="nav-item p-x-1">
                        <a class="nav-link" href="<?php echo site_url('materi/Materi/materi_user'); ?>">Materi</a>
                    </li>
                    <li class="nav-item p-x-1">
                        <a class="nav-link" href="<?php echo site_url('soal/Quiz/index'); ?>">Quiz</a>
                    </li>
                    <li class="nav-item p-x-1">
                        <a class="nav-link" href="<?php echo site_url('forum/Forum/index'); ?>">Forum</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link navbar-toggler layout-toggler" href="#">☰</a>
                    </li>
                    <li class="nav-item p-x-1">
                        <a class="nav-link" href="" data-toggle="modal" data-target="#modal_login">Materi</a>
                    </li>
                    <li class="nav-item p-x-1">
                        <a class="nav-link" href="" data-toggle="modal" data-target="#modal_login">Quiz</a>
                    </li>
                    <li class="nav-item p-x-1">
                        <a class="nav-link" href="<?php echo site_url('forum/Forum/index'); ?>">Forum</a>
                    </li>
                <?php } ?>
                </ul>
                <ul class="nav navbar-nav pull-right hidden-md-down">
                    <?php if ($this->session->userdata('name') != NULL ) { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <!-- <img src="assets/img/avatars/6.jpg" class="img-avatar" alt="admin@bootstrapmaster.com"> -->
                            <span class="hidden-md-down"><?php echo ucfirst($this->session->userdata('name')); ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-header text-xs-center">
                                <strong>Account</strong>
                            </div>
                            <a class="dropdown-item" href="#"><i class="fa fa-user"></i>
                            <?php echo $this->session->userdata('name'); ?>
                            </a>
                            <a class="dropdown-item" href="#"><i class="fa fa-wrench"></i> Settings</a>
                            <a class="dropdown-item" href="<?php echo site_url('user/User/logout'); ?>"><i class="fa fa-lock"></i> Logout</a>
                        </div>
                    </li>
                    <?php } else { ?>
                    <li class="nav-item">
                        <a style="background-color: #4dbd74;color: white;" class="nav-link" href="#" data-toggle="modal" data-target="#modal_login">
                        Login
                        </a>
                    </li>
                    <?php } ?>
                    <li class="nav-item"></li>
                    <!-- <li class="nav-item">
                        <a class="nav-link navbar-toggler aside-toggle" href="#">&#9776;</a>
                    </li> -->
                </ul>
            </div>
        </header>
        <!-- <div class="sidebar">
            <nav class="sidebar-nav">
                <ul class="nav">
                    <li class="nav-title">
                        DASHBOARD
                    </li> -->
                    <!-- <li class="divider"></li> -->
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="widgets.html"><i class="icon-drawer"></i> MATERI</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="components-forms.html"><i class="icon-note"></i> QUIZ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="forum_list.html"><i class="icon-note"></i> FORUM</a>
                    </li>
                </ul>
            </nav>
        </div> -->