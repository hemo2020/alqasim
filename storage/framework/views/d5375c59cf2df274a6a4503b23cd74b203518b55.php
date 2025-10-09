<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Real Estate - <?php echo $__env->yieldContent('title'); ?></title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo e(asset('backend/plugins/bootstrap/css/bootstrap.css')); ?>" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo e(asset('backend/plugins/node-waves/waves.css')); ?>" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo e(asset('backend/plugins/animate-css/animate.css')); ?>" rel="stylesheet" />

    
    <?php echo $__env->yieldPushContent('styles'); ?>

    <!-- Custom Css -->
    <link href="<?php echo e(asset('backend/css/style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('backend/css/main.css')); ?>" rel="stylesheet">

    <!-- AdminBSB Themes -->
    <link href="<?php echo e(asset('backend/css/themes/theme-indigo.css')); ?>" rel="stylesheet" />


</head>

    <body class="theme-indigo">

        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="preloader">
                    <div class="spinner-layer pl-red">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
                <p>Please wait...</p>
            </div>
        </div>

        <!-- Overlay For Sidebars -->
        <div class="overlay"></div>

        <!-- Search Bar -->
        <div class="search-bar">
            <div class="search-icon">
                <i class="material-icons">search</i>
            </div>
            <input type="text" placeholder="START TYPING...">
            <div class="close-search">
                <i class="material-icons">close</i>
            </div>
        </div>

        
        
        <?php echo $__env->make('backend.partials.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        
        <section>
            <?php echo $__env->make('backend.partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </section>
        
        
        <section class="content">
            <div class="container-fluid">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </section>


        <!-- Jquery Core Js -->
        <script src="<?php echo e(asset('backend/plugins/jquery/jquery.min.js')); ?>"></script>

        <!-- Bootstrap Core Js -->
        <script src="<?php echo e(asset('backend/plugins/bootstrap/js/bootstrap.js')); ?>"></script>

        <!-- Slimscroll Plugin Js -->
        <script src="<?php echo e(asset('backend/plugins/jquery-slimscroll/jquery.slimscroll.js')); ?>"></script>
        
        <!-- Waves Effect Plugin Js -->
        <script src="<?php echo e(asset('backend/plugins/node-waves/waves.js')); ?>"></script>
        
        
        <?php echo $__env->yieldPushContent('scripts'); ?>

        <!-- Custom Js -->
        <script src="<?php echo e(asset('backend/js/admin.js')); ?>"></script>

        <!-- Demo Js -->
        

        <script src="https://unpkg.com/sweetalert2@7.19.3/dist/sweetalert2.all.js"></script>

        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        <?php echo Toastr::message(); ?>


        <script>
            <?php if($errors->any()): ?>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    toastr.error('<?php echo e($error); ?>','Error',{
                        closeButtor: true,
                        progressBar: true 
                    });
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </script>


    </body>
  </html>