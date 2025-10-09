<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section class="section">
        <div class="container">
            <div class="row">

                <div class="col s12 m3">
                    <div class="agent-sidebar">
                        <?php echo $__env->make('user.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                </div>

                <div class="col s12 m9">

                    <h4 class="agent-title">DASHBOARD</h4>
                    
                    <div class="agent-content">

                        <div class="row">
                            <div class="col s12">
                                <div class="box indigo white-text p-30">
                                    <i class="material-icons left">comment</i>
                                    <span class="truncate uppercase bold font-18">Comments</span>
                                    <h4 class="m-t-10 m-b-0"><?php echo e($commentcount); ?></h4>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12">
                                <div class="box indigo white-text p-20">
                                    <i class="material-icons left font-18">comment</i>
                                    <span class="truncate uppercase bold">Recent Comments</span>
                                </div>
                                <div class="box-content">
                                    <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="grey lighten-4">
                                            <span class="border-bottom display-block p-15  grey-text-d-2">
                                                <?php echo e(++$key); ?>. <?php echo e($comment->body); ?>

                                                
                                            </span>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <div>
                                    <?php echo e($comments->links()); ?>

                                </div>
                            </div>
                        </div>

                    </div>
        
                </div>

            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>