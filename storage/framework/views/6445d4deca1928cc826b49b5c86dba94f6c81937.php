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

                    <h4 class="agent-title">READ MESSAGES</h4>
                    
                    <div class="agent-content">
                        
                        <span><strong>From:</strong> <em><?php echo e($message->name); ?> < <?php echo e($message->email); ?> ></em></span> <br>
                        <span><strong>Phone:</strong> <?php echo e($message->phone); ?></span>

                        <div class="read-message">
                            <span>Message:</span>
                            <p><?php echo $message->message; ?></p>
                        </div>

                        <a href="<?php echo e(route('user.message.replay',$message->id)); ?>" class="btn btn-small indigo waves-effect">
                            <i class="material-icons left">replay</i>
                            <span>Replay</span>
                        </a>

                        <form class="right" action="<?php echo e(route('user.message.readunread')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="status" value="<?php echo e($message->status); ?>">
                            <input type="hidden" name="messageid" value="<?php echo e($message->id); ?>">

                            <button type="submit" class="btn btn-small orange waves-effect">
                                <i class="material-icons left">local_library</i>
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
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>