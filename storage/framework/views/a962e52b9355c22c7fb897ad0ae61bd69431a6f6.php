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

                    <h4 class="agent-title">MESSAGES</h4>
                    
                    <div class="agent-content">
                        <table class="striped responsive-table">
                            <thead>
                                <tr>
                                    <th>SL.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                    
                            <tbody>
                                <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="right-align"><?php echo e($key+1); ?>.</td>
                                        <td><?php echo e(ucfirst(strtok($message->name,' '))); ?></td>
                                        <td><?php echo e($message->email); ?></td>
                                        <td>
                                            <span class="tooltipped" data-position="bottom" data-tooltip="<?php echo e($message->message); ?>">
                                                <?php echo e(str_limit($message->message,20)); ?>

                                            </span>
                                        </td>
                                        <td>
                                            <?php if($message->status == 0): ?>
                                                <a href="<?php echo e(route('agent.message.read',$message->id)); ?>" class="btn btn-small orange waves-effect">
                                                    <i class="material-icons">local_library</i>
                                                </a>
                                            <?php else: ?> 
                                                <a href="<?php echo e(route('agent.message.read',$message->id)); ?>" class="btn btn-small green waves-effect">
                                                    <i class="material-icons">done</i>
                                                </a>
                                            <?php endif; ?>
                                            <a href="<?php echo e(route('agent.message.replay',$message->id)); ?>" class="btn btn-small indigo waves-effect">
                                                <i class="material-icons">replay</i>
                                            </a>
                                            <button type="button" class="btn btn-small red waves-effect" onclick="deleteMessage(<?php echo e($message->id); ?>)">
                                                <i class="material-icons">delete</i>
                                            </button>
                                            <form action="<?php echo e(route('agent.messages.destroy',$message->id)); ?>" method="POST" id="del-message-<?php echo e($message->id); ?>" style="display:none;">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <div class="center">
                            <?php echo e($messages->links()); ?>

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
        function deleteMessage(id){
            swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            buttons: true,
            dangerMode: true,
            buttons: ["Cancel", "Yes, delete it!"]
            }).then((value) => {
                if (value) {
                    document.getElementById('del-message-'+id).submit();
                    swal(
                    'Deleted!',
                    'Message has been deleted.',
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