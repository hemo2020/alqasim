<?php $__env->startSection('title', 'Show Property'); ?>

<?php $__env->startPush('styles'); ?>


<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>

    <div class="block-header"></div>

    <div class="row clearfix">

        <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
            <div class="card">

                <div class="header bg-indigo">
                    <h2>SHOW PROPERTY</h2>
                </div>

                <div class="header">
                    <h2>
                        <?php echo e($property->title); ?>

                        <br>
                        <small>Posted By <strong><?php echo e($property->user->name); ?></strong> on <?php echo e($property->created_at->toFormattedDateString()); ?></small>
                    </h2>
                </div>

                <div class="header">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <strong>Price : </strong>
                            <span class="right"> &dollar;<?php echo e($property->price); ?></span>
                        </li>
                        <li class="list-group-item">
                            <strong>Bedroom : </strong>
                            <span class="right"><?php echo e($property->bedroom); ?></span>
                        </li>
                        <li class="list-group-item">
                            <strong>Bathroom : </strong>
                            <span class="right"><?php echo e($property->bathroom); ?></span>
                        </li>
                        <li class="list-group-item">
                            <strong>City : </strong>
                            <span class="right"><?php echo e($property->city); ?></span>
                        </li>
                        <li class="list-group-item">
                            <strong>Address : </strong>
                            <span class="left"><?php echo e($property->address); ?></span>
                        </li>
                    </ul>
                </div>

                <div class="body">
                    <h5>Description</h5>
                    <?php echo $property->description; ?>

                </div>

            </div> 
            <div class="card">
                <div class="header">
                    <h2>MAP</h2>
                </div>
                <div class="body">
                    <div id="gmap_markers" class="gmap"></div>
                </div>
            </div>

            <?php if($property->floor_plan): ?>
            <div class="card">
                <div class="header">
                    <h2>FLOOR PLAN</h2>
                </div>
                <?php if($property->floor_plan && $property->floor_plan != 'default.png'): ?>
                <div class="body">
                    <img class="img-responsive" src="<?php echo e(Storage::url('property/'.$property->floor_plan)); ?>" alt="<?php echo e($property->title); ?>">
                </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>

            <?php if($videoembed): ?>
            <div class="card">
                <div class="header">
                    <h2>PROPERTY VIDEO</h2>
                </div>
                <div class="body text-center">
                    <?php echo $videoembed; ?>

                </div>
            </div>
            <?php endif; ?>

            <?php if(!$property->gallery->isEmpty()): ?>
            <div class="card">
                <div class="header bg-red">
                    <h2>GALLERY IMAGE</h2>
                </div>
                <div class="body">
                    <div class="gallery-box">
                        <?php $__currentLoopData = $property->gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="gallery-image">
                            <img class="img-responsive" src="<?php echo e(Storage::url('property/gallery/'.$gallery->name)); ?>" alt="<?php echo e($property->title); ?>">
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            
            <div class="card">
                <div class="header">
                    <h2><?php echo e($property->comments_count); ?> Comments</h2>
                </div>
                <div class="body">

                    <?php $__currentLoopData = $property->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                        <?php if($comment->parent_id == NULL): ?>
                            <div class="comment">
                                <div class="author-image">
                                    <span style="background-image:url(<?php echo e(Storage::url('users/'.$comment->users->image)); ?>);"></span>
                                </div>
                                <div class="content">
                                    <div class="author-name">
                                        <strong><?php echo e($comment->users->name); ?></strong>
                                        <span class="right"><?php echo e($comment->created_at->diffForHumans()); ?></span>
                                    </div>
                                    <div class="author-comment">
                                        <?php echo e($comment->body); ?>

                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php $__currentLoopData = $comment->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="comment children">
                                <div class="author-image">
                                    <span style="background-image:url(<?php echo e(Storage::url('users/'.$comment->users->image)); ?>);"></span>
                                </div>
                                <div class="content">
                                    <div class="author-name">
                                        <strong><?php echo e($comment->users->name); ?></strong>
                                        <span class="right"><?php echo e($comment->created_at->diffForHumans()); ?></span>
                                    </div>
                                    <div class="author-comment">
                                        <?php echo e($comment->body); ?>

                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                </div>
            </div>

        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-cyan">
                    <h2>TYPE</h2>
                </div>
                <div class="body">
                    <strong class="label bg-red"><?php echo e($property->type); ?></strong> for <strong class="label bg-blue"><?php echo e($property->purpose); ?></strong>
                </div>
            </div>
            <div class="card">
                <div class="header bg-green">
                    <h2>FEATURES</h2>
                </div>
                <div class="body">
                    <?php $__currentLoopData = $property->features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="label bg-green"><?php echo e($feature->name); ?></span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            <div class="card">
                <div class="header bg-amber">
                    <h2>FEATURED IMAGE</h2>
                </div>
                <div class="body">

                    <img class="img-responsive thumbnail" src="<?php echo e(Storage::url('property/'.$property->image)); ?>" alt="<?php echo e($property->title); ?>">
                    
                    <a href="<?php echo e(route('admin.properties.index')); ?>" class="btn btn-danger btn-lg waves-effect">
                        <i class="material-icons left">arrow_back</i>
                        <span>BACK</span>
                    </a>
                    <a href="<?php echo e(route('admin.properties.edit',$property->slug)); ?>" class="btn btn-info btn-lg waves-effect">
                        <i class="material-icons">edit</i>
                        <span>EDIT</span>
                    </a>

                </div>
            </div>
        </div>

    </div>


<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>

    <script src="https://maps.google.com/maps/api/js?v=3&sensor=false"></script>
    <script src="<?php echo e(asset('backend/plugins/gmaps/gmaps.js')); ?>"></script>
    <script>
        //Markers
        var markers = new GMaps({
            div: '#gmap_markers',
            lat: '<?php echo e($property->location_latitude); ?>',
            lng: '<?php echo e($property->location_longitude); ?>'
        });
        markers.addMarker({
            lat: '<?php echo e($property->location_latitude); ?>',
            lng: '<?php echo e($property->location_longitude); ?>',
            title: '<?php echo e($property->title); ?>',
        });
        
    </script>


<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>