<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel Real Estate')); ?></title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <!-- Styles -->
    <link href="<?php echo e(asset('frontend/css/materialize.min.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

    <?php echo $__env->yieldContent('styles'); ?>
    
    <link href="<?php echo e(asset('frontend/css/styles.css')); ?>" rel="stylesheet">
</head>

    <body>
        
        
        <?php echo $__env->make('frontend.partials.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        
        <?php if(Request::is('/')): ?>
            <?php echo $__env->make('frontend.partials.slider', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>

        
        <?php echo $__env->make('frontend.partials.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        
        
        <main class="main-content">
            <?php echo $__env->yieldContent('content'); ?>
        </main>

        
        <?php echo $__env->make('frontend.partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


        <!--JavaScript at end of body for optimized loading-->
        
        <script type="text/javascript" src="<?php echo e(asset('frontend/js/jquery.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('frontend/js/materialize.min.js')); ?>"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
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

        <?php echo $__env->yieldContent('scripts'); ?>

        <script>
        $(document).ready(function(){
            $('.sidenav').sidenav();

            $('.carousel.carousel-slider').carousel({
                fullWidth: true,
                indicators: true,
            });

            $('.carousel.testimonials').carousel({
                indicators: true,
            });

            var city_list = <?php echo json_encode($citylist, 15, 512) ?>;
            $('input.autocomplete').autocomplete({
                data: city_list
            });

            $(".dropdown-trigger").dropdown({
                top: '65px'
            });

            $('.tooltipped').tooltip();

        });
        </script>

    </body>
  </html>