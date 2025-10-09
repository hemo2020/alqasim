<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col s12 m6 offset-m3">
            <div class="card">
                <h4 class="center indigo-text p-t-30"><?php echo e(__('Reset Password')); ?></h4>

                <div class="p-20">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <form method="POST" action="<?php echo e(route('password.email')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="row">
                            <div class="input-field col s12">
                                <label for="email"><?php echo e(__('E-Mail Address')); ?></label>
                                <input id="email" type="email" class="<?php echo e($errors->has('email') ? 'is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required>

                                <?php if($errors->has('email')): ?>
                                    <span class="helper-text" data-error="wrong" data-success="right">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <button type="submit" class="waves-effect waves-light btn indigo">
                                    <?php echo e(__('Send Password Reset Link')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>