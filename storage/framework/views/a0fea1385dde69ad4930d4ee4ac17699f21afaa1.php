<?php $__env->startSection('title', 'Edit Post'); ?>

<?php $__env->startPush('styles'); ?>

    <link rel="stylesheet" href="<?php echo e(asset('backend/plugins/bootstrap-select/css/bootstrap-select.css')); ?>">

<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>

    <div class="block-header"></div>

    <div class="row clearfix">
        <form action="<?php echo e(route('admin.posts.update',$post->slug)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>EDIT POST</h2>
                </div>
                <div class="body">

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="title" class="form-control" value="<?php echo e($post->title); ?>">
                            <label class="form-label">Post Title</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <?php if($post->status): ?>
                            <?php 
                                $checked = 'checked'; 
                            ?>
                        <?php else: ?>
                            <?php 
                                $checked = ''; 
                            ?>
                        <?php endif; ?>
                        <input type="checkbox" id="published" name="status" class="filled-in" value="1" <?php echo e($checked); ?>/>
                        <label for="published">Published</label>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="">Body</label>
                        <textarea name="body" id="tinymce"><?php echo e($post->body); ?></textarea>
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
                            <label for="categories">Select Category</label>
                            <select name="categories[]" class="form-control show-tick" id="categories" multiple data-live-search="true">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line <?php echo e($errors->has('tags') ? 'focused error' : ''); ?>">
                            <label for="tags">Select Tag</label>
                            <select name="tags[]" class="form-control show-tick" id="tags" multiple data-live-search="true">
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
                        <span>UPDATE</span>
                    </button>

                </div>
            </div>
        </div>
        </form>
    </div>

    
    <?php
        $categories = [];
    ?>
    <?php $__currentLoopData = $post->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php 
            $categories[] = $category->id;
        ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>

    <script src="<?php echo e(asset('backend/plugins/bootstrap-select/js/bootstrap-select.js')); ?>"></script>
    <script>
        <?php
            $selectedcategory = json_encode($categories);
            $selectedtags = json_encode($selectedtag);
        ?>

        $('#categories').selectpicker();
        $('#categories').selectpicker('val',<?php echo e($selectedcategory); ?>);

        $('#tags').selectpicker();
        $('#tags').selectpicker('val',<?php echo e($selectedtags); ?>);
        
    </script>

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