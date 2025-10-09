<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section class="section">
        <div class="container">
            <div class="row">
                <h4 class="section-heading">Agent List</h4>
            </div>
            <div class="row">

                <?php $__currentLoopData = $agents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col s12 m4">
                        <div class="card-panel center card-agent">
                            <span class="card-image-bg" style="background-image:url(<?php echo e(Storage::url('users/'.$agent->image)); ?>);"></span>
                            <h5 class="m-b-0">
                                <a href="<?php echo e(route('agents.show',$agent->id)); ?>" class="truncate"><?php echo e($agent->name); ?></a>
                            </h5>
                            <h6 class="email"><?php echo e($agent->email); ?></h6>
                            <p class="about"><?php echo e(str_limit($agent->about,50)); ?></p>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

            <div class="m-t-30 m-b-60 center">
                <?php echo e($agents->links()); ?>

            </div>

        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>