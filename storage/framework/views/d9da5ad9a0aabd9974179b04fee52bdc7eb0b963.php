<style>
    @media (max-width: 600px) {
        .slider-content h2 {
            font-size: 1.5rem;
        }
        .slider-content p {
            font-size: 1rem;
        }
    }
</style>
<section class="carousel carousel-slider center">
    <?php if($sliders): ?>
        <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="carousel-item" style="background-image: url(<?php echo e(Storage::url('slider/'.$slider->image)); ?>)" href="#<?php echo e($slider->id); ?>!">
                <div class="slider-content">
                    <h2 class="white-text"><?php echo e($slider->title); ?></h2>
                    <p class="white-text"><?php echo e($slider->description); ?></p>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?> 
        <div class="carousel-item amber indigo-text" style="background-image: url(<?php echo e(asset('frontend/images/real_estate.jpg')); ?>)" href="#1!">
            <h2>Slider Title goes here</h2>
            <p class="indigo-text">Slider description goes here</p>
        </div>
    <?php endif; ?>
</section>