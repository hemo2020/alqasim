<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col s12 m6 offset-m3">
            <div class="card">
                <h4 class="center indigo-text uppercase p-t-30"><?php echo e(__('Register')); ?></h4>

                <div class="p-20">
                    <form method="POST" action="<?php echo e(route('register')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="row">
                            <div class="input-field col s12">
                                <label for="name"><?php echo e(__('Name')); ?></label>
                                <input id="name" type="text" class="<?php echo e($errors->has('name') ? 'is-invalid' : ''); ?>" name="name" value="<?php echo e(old('name')); ?>" required autofocus>

                                <?php if($errors->has('name')): ?>
                                    <span class="helper-text" data-error="wrong" data-success="right">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

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
                                <label for="password"><?php echo e(__('Password')); ?></label>
                                <input id="password" type="password" class="<?php echo e($errors->has('password') ? 'is-invalid' : ''); ?>" name="password" required>
                                
                                <?php if($errors->has('password')): ?>
                                <span class="helper-text" data-error="wrong" data-success="right">
                                    <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="input-field col s12">
                                <label for="password-confirm"><?php echo e(__('Confirm Password')); ?></label>
                                <input id="password-confirm" type="password" name="password_confirmation" required>
                            </div>
                        </div>
                        
                        <p>
                            <label>
                                <input type="checkbox" name="agent" class="filled-in" />
                                <span><?php echo e(__('Registration as Agent')); ?></span>
                            </label>
                        </p>
                        
                        <div class="row">
                            <div class="input-field col s12">
                                <button type="submit" class="waves-effect waves-light btn indigo">
                                    <?php echo e(__('Register')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>