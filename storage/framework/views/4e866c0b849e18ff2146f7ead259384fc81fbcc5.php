<?php $__env->startSection('title', 'Replay Message'); ?>

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
                    <h2>REPLAY MESSAGE</h2>
                </div>
                <div class="body">
                    <?php if($message->user_id): ?>
                        <form action="<?php echo e(route('admin.message.send')); ?>" method="POST">
                            <?php echo csrf_field(); ?>

                            <input type="hidden" name="agent_id" value="<?php echo e($message->user_id); ?>">
                            <input type="hidden" name="user_id" value="<?php echo e(auth()->id()); ?>">
                            <input type="hidden" name="name" value="<?php echo e(auth()->user()->name); ?>">
                            <input type="hidden" name="email" value="<?php echo e(auth()->user()->email); ?>">

                            <div class="form-group form-float">
                                <h5>Replay To: <?php echo e($message->email); ?></h5>
                            </div>

                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" name="phone" class="form-control">
                                    <label class="form-label">Phone</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line">
                                    <textarea name="message" rows="4" class="form-control no-resize"></textarea>
                                    <label class="form-label">Message</label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-indigo btn-lg m-t-15 waves-effect">
                                <i class="material-icons">replay</i>
                                <span>Replay</span>
                            </button>
                        </form>

                    <?php else: ?> 
                        
                        <form action="<?php echo e(route('admin.message.mail')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="name" value="<?php echo e($message->name); ?>">
                            <input type="hidden" name="mailfrom" value="<?php echo e(auth()->user()->email); ?>">

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="email" name="email" class="form-control" value="<?php echo e($message->email); ?>" readonly>
                                    <label class="form-label">TO</label>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="subject" class="form-control">
                                    <label class="form-label">Subject</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line">
                                    <textarea name="message" rows="4" class="form-control no-resize"></textarea>
                                    <label class="form-label">Message</label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-indigo btn-lg m-t-15 waves-effect">
                                <i class="material-icons">replay</i>
                                <span>SEND</span>
                            </button>
                        </form>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>