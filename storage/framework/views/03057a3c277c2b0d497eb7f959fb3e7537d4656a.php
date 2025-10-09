<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col s12 m6 offset-m3">
            <div class="card">

                <h4 class="center indigo-text uppercase p-t-30"><?php echo e(__('Login')); ?></h4>

                <div class="p-20">
                    <form method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="row">
                            <div class="input-field col s12">
                                <label for="email"><?php echo e(__('E-Mail Address')); ?></label>
                                <input id="email" type="email" class="<?php echo e($errors->has('email') ? 'is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required autofocus>

                                <?php if($errors->has('email')): ?>
                                    <span class="helper-text" data-error="wrong" data-success="right">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <label for="password"><?php echo e(__('Password')); ?></label>
                                <input id="password" type="password" class="<?php echo e($errors->has('password') ? 'is-invalid' : ''); ?>" name="password" required>

                                <?php if($errors->has('password')): ?>
                                    <span class="helper-text" data-error="wrong" data-success="right">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <p>
                            <label>
                                <input type="checkbox" name="remember" class="filled-in" <?php echo e(old('remember') ? 'checked' : ''); ?> />
                                <span><?php echo e(__('Remember Me')); ?></span>
                            </label>
                        </p>

                        <div class="row">
                            <div class="input-field col s12">
                                <button type="submit" class="waves-effect waves-light btn indigo">
                                    <?php echo e(__('Login')); ?>

                                </button>

                                <a class="indigo-text p-l-15" href="<?php echo e(route('password.request')); ?>">
                                    <?php echo e(__('Forgot Your Password?')); ?>

                                </a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>