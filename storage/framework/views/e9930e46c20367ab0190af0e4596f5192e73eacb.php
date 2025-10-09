<?php $__env->startSection('title', 'Create Post'); ?>

<?php $__env->startPush('styles'); ?>

    <link rel="stylesheet" href="<?php echo e(asset('backend/plugins/bootstrap-select/css/bootstrap-select.css')); ?>">

<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>

    <div class="block-header"></div>

    <div class="row clearfix">
        <form action="<?php echo e(route('admin.posts.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>CREATE POST</h2>
                </div>
                <div class="body">

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="title" class="form-control" value="<?php echo e(old('title')); ?>">
                            <label class="form-label">Post Title</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="checkbox" id="published" name="status" class="filled-in" value="1" />
                        <label for="published">Published</label>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="">Body</label>
                        <textarea name="body" id="tinymce"><?php echo e(old('body')); ?></textarea>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>SELECT CATEGORY</h2>
                </div>
                <div class="body">

                    <div class="form-group form-float">
                        <div class="form-line <?php echo e($errors->has('categories') ? 'focused error' : ''); ?>">
                            <label>Select Category</label>
                            <select name="categories[]" class="form-control show-tick" multiple data-live-search="true">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line <?php echo e($errors->has('tags') ? 'focused error' : ''); ?>">
                            <label>Select Tag</label>
                            <select name="tags[]" class="form-control show-tick" multiple data-live-search="true">
                                <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($tag->id); ?>"><?php echo e($tag->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="form-label">Featured Image</label>
                        <input type="file" name="image">
                    </div>


                    <a href="<?php echo e(route('admin.posts.index')); ?>" class="btn btn-danger btn-lg m-t-15 waves-effect">
                        <i class="material-icons left">arrow_back</i>
                        <span>BACK</span>
                    </a>

                    <button type="submit" class="btn btn-indigo btn-lg m-t-15 waves-effect">
                        <i class="material-icons">save</i>
                        <span>SAVE</span>
                    </button>

                </div>
            </div>
        </div>
        </form>
    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>

    <script src="<?php echo e(asset('backend/plugins/bootstrap-select/js/bootstrap-select.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/plugins/tinymce/tinymce.js')); ?>"></script>
    <script>
        $(function () {
            tinymce.init({
                selector: "textarea#tinymce",
                theme: "modern",
                height: 300,
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons',
                image_advtab: true
            });
            tinymce.suffix = ".min";
            tinyMCE.baseURL = '<?php echo e(asset('backend/plugins/tinymce')); ?>';
        });
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>