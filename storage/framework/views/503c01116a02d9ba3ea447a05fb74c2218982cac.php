<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section class="section">
        <div class="container">
            <div class="row">

                <div class="col s12 m3">
                    <div class="agent-sidebar">
                        <?php echo $__env->make('agent.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                </div>

                <div class="col s12 m9">

                    <h4 class="agent-title">PROPERTY LIST</h4>
                    
                    <div class="agent-content">
                        <table class="striped responsive-table">
                            <thead>
                                <tr>
                                    <th>SL.</th>
                                    <th>Title</th>
                                    <th>Type</th>
                                    <th>City</th>
                                    <th><i class="material-icons small-star p-t-10">comment</i></th>
                                    <th><i class="material-icons small-star p-t-10">stars</i></th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                    
                            <tbody>
                                <?php $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="right-align"><?php echo e($key+1); ?>.</td>
                                        <td>
                                            <span class="tooltipped" data-position="bottom" data-tooltip="<?php echo e($property->title); ?>">
                                                <?php echo e(str_limit($property->title,30)); ?>

                                            </span>
                                        </td>
                                        
                                        <td><?php echo e(ucfirst($property->type)); ?></td>
                                        <td><?php echo e(ucfirst($property->city)); ?></td>

                                        <td class="center">
                                            <span><i class="material-icons small-comment left">comment</i><?php echo e($property->comments_count); ?></span>
                                        </td>

                                        <td class="center">
                                            <?php if($property->featured == true): ?>
                                                <span class="indigo-text"><i class="material-icons small-star">stars</i></span>
                                            <?php endif; ?>
                                        </td>
    
                                        <td class="center">
                                            <a href="<?php echo e(route('property.show',$property->slug)); ?>" target="_blank" class="btn btn-small green waves-effect">
                                                <i class="material-icons">visibility</i>
                                            </a>
                                            <a href="<?php echo e(route('agent.properties.edit',$property->slug)); ?>" class="btn btn-small orange waves-effect">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <button type="button" class="btn btn-small deep-orange accent-3 waves-effect" onclick="deleteProperty(<?php echo e($property->id); ?>)">
                                                <i class="material-icons">delete</i>
                                            </button>
                                            <form action="<?php echo e(route('agent.properties.destroy',$property->slug)); ?>" method="POST" id="del-property-<?php echo e($property->id); ?>" style="display:none;">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <div class="center">
                            <?php echo e($properties->links()); ?>

                        </div>
                    </div>
        
                </div>

            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function deleteProperty(id){
            swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            buttons: true,
            dangerMode: true,
            buttons: ["Cancel", "Yes, delete it!"]
            }).then((value) => {
                if (value) {
                    document.getElementById('del-property-'+id).submit();
                    swal(
                    'Deleted!',
                    'Property has been deleted.',
                    'success',
                    {
                        buttons: false,
                        timer: 1000,
                    })
                }
            })
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>