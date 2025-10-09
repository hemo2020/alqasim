<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section class="section">
        <div class="container">
            <div class="row">
                <h4 class="section-heading">Gallery</h4>
            </div>
            <div class="row">

                <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(Storage::disk('public')->exists('gallery/'.$gallery->image) && $gallery->image): ?>
                        <div class="col s12 m4">
                            <div class="card">
                                <div class="card-image">
                                    <span class="card-image-bg materialboxed" style="background-image:url(<?php echo e(Storage::url('gallery/'.$gallery->image)); ?>);"></span>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

            <div class="m-t-30 m-b-60 center">
                <?php echo e($galleries->links()); ?>

            </div>

        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    $(document).ready(function(){
        $('.materialboxed').materialbox();
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>