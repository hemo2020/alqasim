<?php $__env->startSection('title', 'Messages'); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')); ?>">
<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>

    <div class="block-header"></div>

    <div class="row clearfix">

        <div class="col-xs-12">
            <div class="card">
                <div class="header bg-indigo">
                    <h2>MESSAGES</h2>
                </div>
                <div class="body">

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>SL.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Message</th>
                                    <th width="150px">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($key+1); ?></td>
                                    <td><?php echo e($message->name); ?></td>
                                    <td><?php echo e($message->email); ?></td>
                                    <td><?php echo e($message->phone); ?></td>
                                    <td><?php echo e(str_limit($message->message,40,'...')); ?></td>
                                    <td>
                                        <?php if($message->status == 0): ?>
                                            <a href="<?php echo e(route('admin.message.read',$message->id)); ?>" class="btn btn-warning btn-sm waves-effect">
                                                <i class="material-icons">local_library</i>
                                            </a>
                                        <?php else: ?> 
                                            <a href="<?php echo e(route('admin.message.read',$message->id)); ?>" class="btn btn-success btn-sm waves-effect">
                                                <i class="material-icons">done</i>
                                            </a>
                                        <?php endif; ?>
                                        <a href="<?php echo e(route('admin.message.replay',$message->id)); ?>" class="btn btn-indigo btn-sm waves-effect">
                                            <i class="material-icons">replay</i>
                                        </a>
                                        <button type="button" class="btn btn-danger btn-sm waves-effect" onclick="deleteMessage(<?php echo e($message->id); ?>)">
                                            <i class="material-icons">delete</i>
                                        </button>
                                        <form action="<?php echo e(route('admin.messages.destroy',$message->id)); ?>" method="POST" id="del-message-<?php echo e($message->id); ?>" style="display:none;">
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
        function deleteMessage(id){
            
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
                    document.getElementById('del-message-'+id).submit();
                    swal(
                    'Deleted!',
                    'Message has been deleted.',
                    'success'
                    )
                }
            })
        }
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>