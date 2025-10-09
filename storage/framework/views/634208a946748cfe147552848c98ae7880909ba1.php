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
                        <h4 class="agent-title">PROFILE</h4>

                        <form action="<?php echo e(route('agent.profile.update')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <div class="row">
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">person</i>
                                    <input id="name" name="name" type="text" value="<?php echo e($profile->name); ?>" class="validate">
                                    <label for="name">Name</label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">assignment_ind</i>
                                    <input id="username" name="username" type="text" value="<?php echo e(isset($profile->username) ? $profile->username : null); ?>" class="validate">
                                    <label for="username">Username</label>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">email</i>
                                    <input id="email" name="email" type="email" value="<?php echo e($profile->email); ?>" class="validate">
                                    <label for="email">Email</label>
                                </div>
                                <div class="file-field input-field col s6">
                                    <div class="btn indigo">
                                        <span>Image</span>
                                        <input type="file" name="image">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">mode_edit</i>
                                    <textarea id="about" name="about" class="materialize-textarea"><?php echo e(isset($profile->about) ? $profile->about : null); ?></textarea>
                                    <label for="about">About</label>
                                </div>
                            </div>

                            <div class="row">
                                <button class="btn waves-effect waves-light btn-large indigo darken-4" type="submit">
                                    Submit
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>

                        </form>


                    </div>
                </div> <!-- /.col -->

            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    $(document).ready(function() {
        $('textarea#about').characterCounter();
    });

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>