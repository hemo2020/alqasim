<?php $__env->startSection('title', 'Posts'); ?>

<?php $__env->startPush('styles'); ?>

    <!-- JQuery DataTable Css -->
    <link rel="stylesheet" href="<?php echo e(asset('backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')); ?>">

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="block-header">
        <a href="<?php echo e(route('admin.posts.create')); ?>" class="waves-effect waves-light btn right m-b-15 addbtn">
            <i class="material-icons left">add</i>
            <span>CREATE </span>
        </a>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>POST LIST</h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>SL.</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Category</th>
                                    <th><i class="material-icons">visibility</i></th>
                                    <th>Is Approved</th>
                                    <th>Status</th>
                                    <th><i class="material-icons small">comment</i></th>
                                    <th width="150">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($key+1); ?></td>
                                    <td>
                                        <?php if(Storage::disk('public')->exists('posts/'.$post->image)): ?>
                                            <img src="<?php echo e(Storage::url('posts/'.$post->image)); ?>" alt="<?php echo e($post->title); ?>" class="img-responsive img-rounded">
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <span title="<?php echo e($post->title); ?>">
                                            <?php echo e(str_limit($post->title,10)); ?>

                                        </span>
                                    </td>
                                    <td><?php echo e($post->user->name); ?></td>
                                    <td>
                                        <?php $__currentLoopData = $post->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($key!=0): ?>
                                                <span>,</span>
                                            <?php endif; ?>
                                            <?php echo e($category->name); ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                    <td><?php echo e($post->view_count); ?></td>
                                    <td>
                                        <?php if($post->is_approved == true): ?>
                                            <span class="badge bg-green">Approved</span>
                                        <?php else: ?> 
                                            <span class="badge bg-pink">Pending</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($post->status == true): ?>
                                            <span class="badge bg-green">Published</span>
                                        <?php else: ?> 
                                            <span class="badge bg-pink">Pending</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <span class="badge">
                                            <i class="material-icons small left">comment</i>
                                            <?php echo e($post->comments_count); ?>

                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <a href="<?php echo e(route('admin.posts.show',$post->slug)); ?>" class="btn btn-success btn-sm waves-effect">
                                            <i class="material-icons">visibility</i>
                                        </a>
                                        <a href="<?php echo e(route('admin.posts.edit',$post->slug)); ?>" class="btn btn-info btn-sm waves-effect">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <button type="button" class="btn btn-danger btn-sm waves-effect" onclick="deletePost(<?php echo e($post->id); ?>)">
                                            <i class="material-icons">delete</i>
                                        </button>
                                        <form action="<?php echo e(route('admin.posts.destroy',$post->slug)); ?>" method="POST" id="del-post-<?php echo e($post->id); ?>" style="display:none;">
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
        function deletePost(id){
            
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
                    document.getElementById('del-post-'+id).submit();
                    swal(
                    'Deleted!',
                    'Post has been deleted.',
                    'success'
                    )
                }
            })
        }
    </script>


<?php $__env->stopPush(); ?>
<?php echo $__env->make('backend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>