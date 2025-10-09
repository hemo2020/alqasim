<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section class="section">
        <div class="container">
            <div class="row">
                <h4 class="section-heading">Blog Posts</h4>
            </div>
            <div class="row">

                <div class="col s12 m8">

                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card horizontal">
                            <div>
                                <div class="card-content">
                                    <?php if(Storage::disk('public')->exists('posts/'.$post->image) && $post->image): ?>
                                        <div class="card-image blog-content-image">
                                            <img src="<?php echo e(Storage::url('posts/'.$post->image)); ?>" alt="<?php echo e($post->title); ?>">
                                        </div>
                                    <?php endif; ?>
                                    <span class="card-title">
                                        <a href="<?php echo e(route('blog.show',$post->slug)); ?>"><?php echo e($post->title); ?></a>
                                    </span>
                                    <?php echo str_limit($post->body,120); ?>

                                </div>
                                <div class="card-action blog-action clearfix">
                                    <a href="<?php echo e(route('blog.author',$post->user->username)); ?>" class="btn-flat">
                                        <i class="material-icons">person</i>
                                        <span><?php echo e($post->user->name); ?></span>
                                    </a>
                                    <a href="#" class="btn-flat disabled">
                                        <i class="material-icons">watch_later</i>
                                        <span><?php echo e($post->created_at->diffForHumans()); ?></span>
                                    </a>
                                    <?php $__currentLoopData = $post->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="<?php echo e(route('blog.categories',$category->slug)); ?>" class="btn-flat">
                                            <i class="material-icons">folder</i>
                                            <span><?php echo e($category->name); ?></span>
                                        </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="<?php echo e(route('blog.tags',$tag->slug)); ?>" class="btn-flat">
                                            <i class="material-icons">label</i>
                                            <span><?php echo e($tag->name); ?></span>
                                        </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                    <a href="<?php echo e(route('blog.show',$post->slug) . '#comments'); ?>" class="btn-flat">
                                        <i class="material-icons">comment</i>
                                        <span><?php echo e($post->comments_count); ?></span>
                                    </a>
                                    <a href="#" class="btn-flat disabled">
                                        <i class="material-icons">visibility</i>
                                        <span><?php echo e($post->view_count); ?></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    <div class="m-t-30 m-b-60 center">
                        <?php echo e($posts->appends(['month' => Request::get('month'), 'year' => Request::get('year')])->links()); ?>

                    </div>
        
                </div>

                <div class="col s12 m4">

                    <?php echo $__env->make('pages.blog.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                </div>

            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>