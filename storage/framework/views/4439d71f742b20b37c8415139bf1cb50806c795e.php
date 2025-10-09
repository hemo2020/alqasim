<?php $__env->startSection('title', 'Edit Slider'); ?>

<?php $__env->startPush('styles'); ?>

    
<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-indigo">
                    <h2>
                        EDIT SLIDER
                        <a href="<?php echo e(route('admin.sliders.index')); ?>" class="waves-effect waves-light btn right headerightbtn">
                            <i class="material-icons left">arrow_back</i>
                            <span>BACK</span>
                        </a>
                    </h2>
                </div>
                <div class="body">
                    <form action="<?php echo e(route('admin.sliders.update',$slider->id)); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <div class="form-group form-float">
                            <label class="form-label">Title</label>
                            <div class="form-line">
                                <input type="text" name="title" class="form-control" value="<?php echo e($slider->title); ?>">
                            </div>
                        </div>

                        <?php if(Storage::disk('public')->exists('slider/'.$slider->image)): ?>
                            <div class="form-group">
                                <img src="<?php echo e(Storage::url('slider/'.$slider->image)); ?>" id="slider-imgsrc-edit" alt="<?php echo e($slider->title); ?>" class="img-responsive img-rounded">
                            </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <input type="file" name="image" id="slider-image-input-edit" style="display:none;">
                            <button type="button" class="btn bg-grey btn-sm waves-effect m-t-15" id="slider-image-btn-edit">
                                <i class="material-icons">image</i>
                                <span>UPLOAD IMAGE</span>
                            </button>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Description</label>
                            <div class="form-line">
                                <textarea name="description" rows="4" class="form-control no-resize"><?php echo e($slider->description); ?></textarea>
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
    $('#slider-image-btn-edit').on('click', function(){
        $('#slider-image-input-edit').click();
    });
    $('#slider-image-input-edit').on('change', function(){
        showImage(this, '#slider-imgsrc-edit');
    });
</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>