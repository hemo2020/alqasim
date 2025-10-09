<?php $__env->startSection('title', 'Edit Testimonial'); ?>

<?php $__env->startPush('styles'); ?>

    
<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>

    <div class="block-header">
        <a href="<?php echo e(route('admin.testimonials.index')); ?>" class="waves-effect waves-light btn btn-danger right m-b-15">
            <i class="material-icons left">arrow_back</i>
            <span>BACK</span>
        </a>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-indigo">
                    <h2>EDIT TESTIMONIAL</h2>
                </div>
                <div class="body">
                    <form action="<?php echo e(route('admin.testimonials.update',$testimonial->id)); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <div class="form-group form-float">
                            <label class="form-label">Name</label>
                            <div class="form-line">
                                <input type="text" name="name" class="form-control" value="<?php echo e($testimonial->name); ?>">
                            </div>
                        </div>

                        <?php if(Storage::disk('public')->exists('testimonial/'.$testimonial->image)): ?>
                            <div class="form-group">
                                <img src="<?php echo e(Storage::url('testimonial/'.$testimonial->image)); ?>" id="testimonial-imgsrc-edit" alt="<?php echo e($testimonial->title); ?>" class="img-responsive img-rounded">
                            </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <input type="file" name="image" id="testimonial-image-input-edit" style="display:none;">
                            <button type="button" class="btn bg-grey btn-sm waves-effect m-t-15" id="testimonial-image-btn-edit">
                                <i class="material-icons">image</i>
                                <span>UPLOAD IMAGE</span>
                            </button>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Testimonial</label>
                            <div class="form-line">
                                <textarea name="testimonial" rows="4" class="form-control no-resize"><?php echo e($testimonial->testimonial); ?></textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-indigo btn-lg m-t-15 waves-effect">
                            <i class="material-icons">update</i>
                            <span>Update</span>
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>

<script>
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
    $('#testimonial-image-btn-edit').on('click', function(){
        $('#testimonial-image-input-edit').click();
    });
    $('#testimonial-image-input-edit').on('change', function(){
        showImage(this, '#testimonial-imgsrc-edit');
    });
</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>