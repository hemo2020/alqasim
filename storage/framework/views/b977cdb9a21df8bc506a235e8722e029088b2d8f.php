<?php $__env->startSection('title', 'Create Testimonial'); ?>

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
                    <h2>CREATE TESTIMONIAL</h2>
                </div>
                <div class="body">
                    <form action="<?php echo e(route('admin.testimonials.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" name="name" class="form-control">
                                <label class="form-label">Name</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-line">
                                <textarea name="testimonial" rows="4" class="form-control no-resize"></textarea>
                                <label class="form-label">Testimonial</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <img src="" id="testimonial-imgsrc" class="img-responsive">
                            <input type="file" name="image" id="testimonial-image-input" style="display:none;">
                            <button type="button" class="btn bg-grey btn-sm waves-effect m-t-15" id="testimonial-image-btn">
                                <i class="material-icons">image</i>
                                <span>UPLOAD IMAGE</span>
                            </button>
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
        $('#testimonial-image-btn').on('click', function(){
            $('#testimonial-image-input').click();
        });
        $('#testimonial-image-input').on('change', function(){
            showImage(this, '#testimonial-imgsrc');
        });
    })
</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>