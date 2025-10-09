<div class="card">
    <div class="card-content">
        <h3 class="font-18 m-t-0 bold uppercase">المدونات الرائجة</h3>
        <ul class="collection">
            <?php $__currentLoopData = $popularposts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="collection-item">
                    <a href="<?php echo e(route('blog.show',$post->slug)); ?>" class="indigo-text text-darken-4">
                        <span class="truncate tooltipped" data-position="bottom" data-tooltip="<?php echo e($post->title); ?>"><?php echo e($post->title); ?></span>
                    </a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div>
    
<div class="card">
    <div class="card-content">
        <h3 class="font-18 m-t-0 bold uppercase">التصنيف</h3>
        <ul>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="category-bg-image" style="background-image:url(<?php echo e(Storage::url('category/slider/'.$category->image)); ?>);">

                    <a href="<?php echo e(route('blog.categories',$category->slug)); ?>">

                        <span class="left"><?php echo e($category->name); ?></span>

                        <span class="right"><?php echo e($category->posts_count); ?></span>
                    </a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div>

<div class="card">
    <div class="card-content">
        <h3 class="font-18 m-t-0 bold uppercase">الارشيف</h3>
        <ul class="collection">
            <?php $__currentLoopData = $archives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stats): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="collection-item">

                    <a href="/blog/?month=<?php echo e($stats['month']); ?>&year=<?php echo e($stats['year']); ?>" class="indigo-text text-darken-4">

                        <?php echo e($stats['month'] . ' ' . $stats['year']); ?>


                        <span class="badge indigo darken-1 white-text"><?php echo e($stats['published']); ?></span>
                    </a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div>

<div class="card">
    <div class="card-content">
        <h3 class="font-18 m-t-0 bold uppercase">الوسوم</h3>

        <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <a href="<?php echo e(route('blog.tags',$tag->slug)); ?>">

                <span class="btn-small indigo white-text m-b-5 card-no-shadow"><?php echo e($tag->name); ?></span>

            </a>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>