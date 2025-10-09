<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section class="section">
        <div class="container">
            <div class="row">

                <div class="col s12 m8">

                    <div class="card">
                        <div class="card-image">
                            <?php if(Storage::disk('public')->exists('posts/'.$post->image)): ?>
                                <img src="<?php echo e(Storage::url('posts/'.$post->image)); ?>" alt="<?php echo e($post->title); ?>">
                            <?php endif; ?>
                        </div>
                        <div class="card-content">
                            <span class="card-title" title="<?php echo e($post->title); ?>"><?php echo e($post->title); ?></span>
                            <?php echo $post->body; ?>

                        </div>
                        <div class="card-action blog-action">
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

                            <a href="#" class="btn-flat disabled">
                                <i class="material-icons">visibility</i>
                                <span><?php echo e($post->view_count); ?></span>
                            </a>
                        </div>

                    </div>

                    <div class="card" id="comments">
                        <div class="p-15 grey lighten-4">
                            <h5 class="m-0"><?php echo e($post->comments_count); ?> Comments</h5>
                        </div>
                        <div class="single-narebay p-15">

                            <?php $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <?php if($comment->parent_id == null): ?>
                                    <div class="comment">
                                        <div class="author-image">
                                            <span style="background-image:url(<?php echo e(Storage::url('users/'.$comment->users->image)); ?>);"></span>
                                        </div>
                                        <div class="content">
                                            <div class="author-name">
                                                <strong><?php echo e($comment->users->name); ?></strong>
                                                <span class="time"><?php echo e($comment->created_at->diffForHumans()); ?></span>

                                                <?php if(auth()->guard()->check()): ?>
                                                    <span class="right replay" data-commentid="<?php echo e($comment->id); ?>">Replay</span>
                                                <?php endif; ?>

                                            </div>
                                            <div class="author-comment">
                                                <?php echo e($comment->body); ?>

                                            </div>
                                        </div>
                                        <div id="comment-<?php echo e($comment->id); ?>"></div>
                                    </div>
                                <?php endif; ?>

                                <?php if($comment->children->count() > 0): ?>
                                    <?php $__currentLoopData = $comment->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="comment children">
                                            <div class="author-image">
                                                <span style="background-image:url(<?php echo e(Storage::url('users/'.$comment->users->image)); ?>);"></span>
                                            </div>
                                            <div class="content">
                                                <div class="author-name">
                                                    <strong><?php echo e($comment->users->name); ?></strong>
                                                    <span class="time"><?php echo e($comment->created_at->diffForHumans()); ?></span>
                                                </div>
                                                <div class="author-comment">
                                                    <?php echo e($comment->body); ?>

                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <?php if(auth()->guard()->check()): ?>
                                <div class="comment-box">
                                    <h6>Leave a comment</h6>
                                    <form action="<?php echo e(route('blog.comment',$post->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="parent" value="0">

                                        <textarea name="body" class="box"></textarea>
                                        <input type="submit" class="btn indigo" value="Comment">
                                    </form>
                                </div>
                            <?php endif; ?>

                            <?php if(auth()->guard()->guest()): ?> 
                                <div class="comment-login">
                                    <h6>Please Login to comment</h6>
                                    <a href="<?php echo e(route('login')); ?>" class="btn indigo">Login</a>
                                </div>
                            <?php endif; ?>
                            
                        </div>
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
<script>
    $(document).on('click','span.right.replay',function(e){
        e.preventDefault();
        
        var commentid = $(this).data('commentid');

        $('#comment-'+commentid).empty().append(
            `<div class="comment-box">
                <form action="<?php echo e(route('blog.comment',$post->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="parent" value="1">
                    <input type="hidden" name="parent_id" value="`+commentid+`">
                    
                    <textarea name="body" class="box" placeholder="Leave a comment"></textarea>
                    <input type="submit" class="btn indigo" value="Comment">
                </form>
            </div>`
        );
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>