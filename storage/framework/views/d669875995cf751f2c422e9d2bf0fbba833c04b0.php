<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section class="section">
        <div class="container">
            <div class="row">

                <div class="col s12 m3">
                    <div class="agent-sidebar">
                        <?php echo $__env->make('agent.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                </div>

                <div class="col s12 m9">
                    <div class="agent-content">
                        <h4 class="agent-title">Change Password</h4>

                        <form action="<?php echo e(route('agent.changepassword.update')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <div class="input-field col s12">
                                <i class="material-icons prefix">lock_open</i>
                                <input id="currentpassword" name="currentpassword" type="password" class="validate">
                                <label for="currentpassword">Current Password</label>
                            </div>

                            <div class="input-field col s12">
                                <i class="material-icons prefix">lock_outline</i>
                                <input id="newpassword" name="newpassword" type="password" class="validate">
                                <label for="newpassword">New Password</label>
                            </div>

                            <div class="input-field col s12">
                                <i class="material-icons prefix">lock</i>
                                <input id="new-password_confirmation" name="newpassword_confirmation" type="password" class="validate">
                                <label for="new-password_confirmation">Confirm New Password</label>
                            </div>

                            <button class="btn waves-effect waves-light indigo darken-4 m-l-30" type="submit">
                                Submit
                                <i class="material-icons right">send</i>
                            </button>

                        </form>

                    </div>
                </div> <!-- /.col -->

            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>