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

                    <h4 class="agent-title">DASHBOARD</h4>
                    
                    <div class="agent-content">

                        <div class="row">
                            <div class="col s6">
                                <div class="box indigo white-text p-30">
                                    <i class="material-icons left">location_city</i>
                                    <span class="truncate uppercase bold font-18">Properties</span>
                                    <h4 class="m-t-10 m-b-0"><?php echo e($propertytotal); ?></h4>
                                </div>
                            </div>
                            <div class="col s6">
                                <div class="box indigo white-text p-30">
                                    <i class="material-icons left">mail</i>
                                    <span class="truncate uppercase bold font-18">Messages</span>
                                    <h4 class="m-t-10 m-b-0"><?php echo e($messagetotal); ?></h4>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s6">
                                <div class="box indigo white-text p-20">
                                    <i class="material-icons left font-18">location_city</i>
                                    <span class="truncate uppercase bold">Recent Properties</span>
                                </div>
                                <div class="box-content">
                                    <?php $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="grey lighten-4">
                                        <a href="<?php echo e(route('property.show',$property->slug)); ?>" target="_blank" class="border-bottom display-block p-15  grey-text-d-2">
                                            <?php echo e(++$key); ?>. <?php echo e(str_limit($property->title, 28)); ?>

                                            <span class="right">&dollar;<?php echo e($property->price); ?></span>
                                        </a>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        
                            <div class="col s6">
                                <div class="box indigo white-text p-20">
                                    <i class="material-icons left font-18">mail</i>
                                    <span class="truncate uppercase bold">Recent Mails</span>
                                </div>
                                <div class="box-content">
                                    <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="grey lighten-4">
                                        <a href="" class="border-bottom display-block p-15 grey-text-d-2">
                                            <strong><?php echo e(strtok($message->name, " ")); ?>:</strong>
                                            <span class="p-l-5"><?php echo e(str_limit($message->message, 25)); ?></span>
                                        </a>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>

                    </div>
        
                </div>

            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>