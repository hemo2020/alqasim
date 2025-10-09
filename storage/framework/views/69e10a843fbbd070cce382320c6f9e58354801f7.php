<?php $__env->startSection('title', 'Read Message'); ?>

<?php $__env->startPush('styles'); ?>

    
<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>

    <div class="block-header">
        <a href="<?php echo e(route('admin.message')); ?>" class="waves-effect waves-light btn btn-danger right m-b-15">
            <i class="material-icons left">arrow_back</i>
            <span>BACK</span>
        </a>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-indigo">
                    <h2>READ MESSAGE</h2>
                </div>
                <div class="body">
                    <h5>From: <?php echo e($message->name); ?> <<em><?php echo e($message->email); ?>></em></h5>
                    <hr>

                    <h5>Message</h5>
                    <p><?php echo $message->message; ?></p>
                    <hr>

                    <a href="<?php echo e(route('admin.message.replay',$message->id)); ?>" class="btn btn-indigo btn-sm waves-effect">
                        <i class="material-icons">replay</i>
                        <span>Replay</span>
                    </a>

                    <form class="right" action="<?php echo e(route('admin.message.readunread')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="status" value="<?php echo e($message->status); ?>">
                        <input type="hidden" name="messageid" value="<?php echo e($message->id); ?>">

                        <button type="submit" class="btn btn-warning btn-sm waves-effect">
                            <i class="material-icons">local_library</i>
                            <?php if($message->status): ?>
                                <span>Unread</span>
                            <?php else: ?> 
                                <span>Read</span>
                            <?php endif; ?>
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>