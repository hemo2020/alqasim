<?php $__env->startSection('title', 'Edit Categories'); ?>

<?php $__env->startPush('styles'); ?>

    
<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>

    <div class="block-header">
        <a href="<?php echo e(route('admin.categories.index')); ?>" class="waves-effect waves-light btn btn-danger right m-b-15">
            <i class="material-icons left">arrow_back</i>
            <span>BACK</span>
        </a>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>EDIT CATEGORY</h2>
                </div>
                <div class="body">
                    <form action="<?php echo e(route('admin.categories.update',$category->id)); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" name="name" class="form-control" value="<?php echo e($category->name); ?>">
                                <label class="form-label">Category</label>
                            </div>
                        </div>

                        <?php if(Storage::disk('public')->exists('category/thumb/'.$category->image)): ?>
                            <div class="form-group">
                                <img src="<?php echo e(Storage::url('category/thumb/'.$category->image)); ?>" alt="<?php echo e($category->name); ?>" class="img-responsive img-rounded">
                            </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <input type="file" name="image">
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



<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>