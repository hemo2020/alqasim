<?php $__env->startSection('title', 'Gallery'); ?>

<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('backend/plugins/bootstrap-select/css/bootstrap-select.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('backend/plugins/dropzone/dropzone.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('backend/plugins/light-gallery/css/lightgallery.css')); ?>">
<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>

    <div class="block-header"></div>

    <div class="row clearfix">

        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-indigo">
                    <h2>
                        GALLERY IMAGE
                        <a href="<?php echo e(route('admin.album')); ?>" class="right" title="Back"><i class="material-icons">undo</i></a>
                    </h2>
                </div>
                <div class="body">
                    <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
                        <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                <a href="<?php echo e(Storage::url('gallery/'.$gallery->image)); ?>" data-sub-html="Demo Description">
                                    <img class="img-responsive thumbnail" src="<?php echo e(Storage::url('gallery/'.$gallery->image)); ?>">
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-indigo">
                    <h2>UPLOAD GALLERY IMAGE</h2>
                </div>
                <div class="body">
                    <form action="<?php echo e(route('admin.galleries.store')); ?>" method="POST" id="frmFileUpload" class="dropzone">
                        <?php echo csrf_field(); ?>
                        <div class="dz-message">
                            <div class="drag-icon-cph">
                                <i class="material-icons">touch_app</i>
                            </div>
                            <h3>Drop files here or click to upload.</h3>
                            <em>(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</em>
                        </div>
                        <div class="fallback">
                            <input name="file" type="file" multiple />
                        </div>
                        <input type="hidden" name="albumid" value="<?php echo e($album_id); ?>">
                    </form>
                    
                    <a href="<?php echo e(route('admin.album.gallery',$album_id)); ?>" class="btn btn-indigo btn-lg m-t-15 waves-effect" style="width:100%">
                        <i class="material-icons">refresh</i>
                        <span>Refresh</span>
                    </a>

                </div>
            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('backend/plugins/bootstrap-select/js/bootstrap-select.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/plugins/dropzone/dropzone.js')); ?>"></script>

    <script src="<?php echo e(asset('backend/plugins/light-gallery/js/lightgallery-all.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/js/pages/medias/image-gallery.js')); ?>"></script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>