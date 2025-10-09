<?php $__env->startSection('title', 'Show Post'); ?>

<?php $__env->startPush('styles'); ?>


<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>

    <div class="block-header"></div>

    <div class="row clearfix">

        <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
            <div class="card">

                <div class="header bg-indigo">
                    <h2>SHOW POST</h2>
                </div>

                <div class="header">
                    <h2>
                        <?php echo e($post->title); ?>

                        <br>
                        <small>Posted By <strong><?php echo e($post->user->name); ?></strong> on <?php echo e($post->created_at->toFormattedDateString()); ?></small>
                    </h2>
                </div>

                <div class="body">
                    <?php echo $post->body; ?>

                </div>

            </div>

            
            <div class="card">
                <div class="header">
                    <h2><?php echo e($post->comments_count); ?> Comments</h2>
                </div>
                <div class="body">
                    <?php $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
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
                    <h2>SELECTED CATEGORY</h2>
                </div>
                <div class="body">
                    <?php $__currentLoopData = $post->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="label bg-cyan"><?php echo e($category->name); ?></span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="card">
                <div class="header bg-green">
                    <h2>SELECTED TAGS</h2>
                </div>
                <div class="body">
                    <?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="label bg-green"><?php echo e($tag->name); ?></span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            <div class="card">
                <div class="header bg-amber">
                    <h2>FEATURED IMAGE</h2>
                </div>
                <div class="body">

                    <img class="img-responsive thumbnail" src="<?php echo e(Storage::url('posts/'.$post->image)); ?>" alt="">
                    

                    <a href="<?php echo e(route('admin.posts.index')); ?>" class="btn btn-danger btn-lg waves-effect">
                        <i class="material-icons left">arrow_back</i>
                        <span>BACK</span>
                    </a>
                    <a href="<?php echo e(route('admin.posts.edit',$post->slug)); ?>" class="btn btn-info btn-lg waves-effect">
                        <i class="material-icons">edit</i>
                        <span>EDIT</span>
                    </a>

                </div>
            </div>
        </div>

    </div>


<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>

    <script>


        
    </script>


<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>