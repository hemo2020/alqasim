<?php $__env->startSection('title', 'Profile'); ?>

<?php $__env->startPush('styles'); ?>

<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>

    <div class="block-header"></div>

    <div class="row clearfix">

        <div class="col-xs-12">
            <div class="card">
                <div class="header bg-indigo">
                    <h2>
                        PROFILE
                        <a href="<?php echo e(route('admin.changepassword')); ?>" class="btn waves-effect waves-light right headerightbtn">
                            <i class="material-icons left">lock</i>
                            <span>CHANGE PASSWORD </span>
                        </a>
                    </h2>
                </div>
                <div class="body">
                    <form action="<?php echo e(route('admin.profile')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="name" class="form-control" value="<?php echo e(isset($profile->name) ? $profile->name : null); ?>">
                                <label class="form-label">Name</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="username" class="form-control" value="<?php echo e(isset($profile->username) ? $profile->username : null); ?>">
                                <label class="form-label">User Name</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-line">
                                <input type="email" name="email" class="form-control" value="<?php echo e(isset($profile->email) ? $profile->email : null); ?>">
                                <label class="form-label">Email</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="file" name="image">
                            
                        </div>

                        <div class="form-group">
                            <div class="form-line">
                                <textarea name="about" rows="4" class="form-control no-resize"><?php echo e(isset($profile->about) ? $profile->about : null); ?></textarea>
                                <label class="form-label">About Us</label>
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

<script>
    $(function(){
        function showImage(fileInput,imgID){
            if (fileInput.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e){
                    $(imgID).attr('src',e.target.result);
                    $(imgID).attr('alt',fileInput.files[0].name);
                }
                reader.readAsDataURL(fileInput.files[0]);
            }
        }
        $('#profile-image-btn').on('click', function(){
            $('#profile-image-input').click();
        });
        $('#profile-image-input').on('change', function(){
            showImage(this, '#profile-imgsrc');
        });
    })
</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>