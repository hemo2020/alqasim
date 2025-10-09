<?php $__env->startSection('title', 'Create Gallery'); ?>

<?php $__env->startPush('styles'); ?>

<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>

    <div class="block-header"></div>

    <div class="row clearfix">
        <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-indigo">
                    <h2>ALBUM LIST</h2>
                </div>
                <div class="body">
                    <div class="row">
                        <?php $__currentLoopData = $albums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="card mb0">
                                <a href="<?php echo e(route('admin.album.gallery',$album->id)); ?>">
                                    <div class="header bg-indigo">
                                        <h2><?php echo e($album->name); ?></h2>
                                    </div>
                                    <div class="body">
                                        <?php if(!empty($album->galleryimages)): ?>
                                            <?php $__currentLoopData = $album->galleryimages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $galleryimage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($key == 0): ?>
                                                    <span style="background-image:url(<?php echo e(Storage::url('gallery/'.$galleryimage->image)); ?>);background-size:cover;height:100px;display:block;background-repeat:no-repeat;background-position:center;"></span>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-indigo">
                    <h2>CREATE ALBUM</h2>
                </div>
                <div class="body">

                    <form action="<?php echo e(route('admin.album.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" name="name" class="form-control" required>
                                <label class="form-label">Album Name</label>
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