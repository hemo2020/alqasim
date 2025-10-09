<?php $__env->startSection('title', 'Settings'); ?>

<?php $__env->startPush('styles'); ?>

<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>

    <div class="block-header"></div>

    <div class="row clearfix">

        <div class="col-xs-12">
            <div class="card">
                <div class="header bg-indigo">
                    <h2>
                        GENERAL SETTING
                        <a href="<?php echo e(route('admin.profile')); ?>" class="btn waves-effect waves-light right headerightbtn">
                            <i class="material-icons left">person</i>
                            <span>PROFILE </span>
                        </a>
                    </h2>
                </div>
                <div class="body">
                    <form action="<?php echo e(route('admin.settings.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="name" class="form-control" value="<?php echo e(isset($settings->name) ? $settings->name : null); ?>">
                                <label class="form-label">Site Title</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="email" name="email" class="form-control" value="<?php echo e(isset($settings->email) ? $settings->email : null); ?>">
                                <label class="form-label">Email</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="number" name="phone" class="form-control" value="<?php echo e(isset($settings->phone) ? $settings->phone : null); ?>">
                                <label class="form-label">Phone</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="address" class="form-control" value="<?php echo e(isset($settings->address) ? $settings->address : null); ?>">
                                <label class="form-label">Address</label>
                            </div>
                            <small class="col-red font-italic">HTML Tag allowed</small>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="footer" class="form-control" value="<?php echo e(isset($settings->footer) ? $settings->footer : null); ?>">
                                <label class="form-label">Footer</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-line">
                                <textarea name="aboutus" rows="4" class="form-control no-resize"><?php echo e(isset($settings->aboutus) ? $settings->aboutus : null); ?></textarea>
                                <label class="form-label">About Us</label>
                            </div>
                        </div>

                        <h6>Social Links</h6>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="facebook" class="form-control" value="<?php echo e(isset($settings->facebook) ? $settings->facebook : null); ?>">
                                <label class="form-label">Facebook Handler</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="twitter" class="form-control" value="<?php echo e(isset($settings->twitter) ? $settings->twitter : null); ?>">
                                <label class="form-label">Twitter Handler</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="linkedin" class="form-control" value="<?php echo e(isset($settings->linkedin) ? $settings->linkedin : null); ?>">
                                <label class="form-label">LinkedIn Handler</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-indigo btn-lg m-t-15 waves-effect">
                            <i class="material-icons">save</i>
                            <span>SAVE</span>
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