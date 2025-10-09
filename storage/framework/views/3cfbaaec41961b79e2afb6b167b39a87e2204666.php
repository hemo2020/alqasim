<?php $__env->startSection('title', 'Sliders'); ?>

<?php $__env->startPush('styles'); ?>

    <!-- JQuery DataTable Css -->
    <link rel="stylesheet" href="<?php echo e(asset('backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')); ?>">

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="block-header_"></div>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-indigo">
                    <h2>
                        SLIDER LIST
                        <a href="<?php echo e(route('admin.sliders.create')); ?>" class="btn waves-effect waves-light right headerightbtn">
                            <i class="material-icons left">add</i>
                            <span>CREATE </span>
                        </a>
                    </h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>SL.</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th width="100px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($key+1); ?></td>
                                    <td>
                                        <?php if(Storage::disk('public')->exists('slider/'.$slider->image)): ?>
                                            <img src="<?php echo e(Storage::url('slider/'.$slider->image)); ?>" alt="<?php echo e($slider->title); ?>" width="160" class="img-responsive img-rounded">
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($slider->title); ?></td>
                                    <td><?php echo e($slider->description); ?></td>
                                    <td class="text-center">
                                        <a href="<?php echo e(route('admin.sliders.edit',$slider->id)); ?>" class="btn btn-info btn-sm waves-effect">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <button type="button" class="btn btn-danger btn-sm waves-effect" onclick="deleteSlider(<?php echo e($slider->id); ?>)">
                                            <i class="material-icons">delete</i>
                                        </button>
                                        <form action="<?php echo e(route('admin.sliders.destroy',$slider->id)); ?>" method="POST" id="del-slider-<?php echo e($slider->id); ?>" style="display:none;">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>

    <!-- Jquery DataTable Plugin Js -->
    <script src="<?php echo e(asset('backend/plugins/jquery-datatable/jquery.dataTables.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/plugins/jquery-datatable/extensions/export/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/plugins/jquery-datatable/extensions/export/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/plugins/jquery-datatable/extensions/export/vfs_fonts.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/plugins/jquery-datatable/extensions/export/buttons.print.min.js')); ?>"></script>

    <!-- Custom Js -->
    <script src="<?php echo e(asset('backend/js/pages/tables/jquery-datatable.js')); ?>"></script>

    <script>
        function deleteSlider(id){
            
            swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    document.getElementById('del-slider-'+id).submit();
                    swal(
                    'Deleted!',
                    'Slider has been deleted.',
                    'success'
                    )
                }
            })
        }
    </script>


<?php $__env->stopPush(); ?>
<?php echo $__env->make('backend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>