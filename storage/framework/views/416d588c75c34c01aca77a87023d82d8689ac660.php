<?php $__env->startSection('content'); ?>
    <!-- SERVICESS SECTION -->
    <style>
     @import  url('https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap');

     .wpk_process {
        width: 100%;
        max-width: 12.5rem;
        height: 16.25rem;
        padding: 0.625rem;
        border: 0.042rem solid rgb(255, 255, 255);
        border-radius: 0.5rem;
        background-color: #fff;
        color: #27ae60;
        font-size: 0.94rem;
        font-family: Tajawal, sans-serif;
        line-height: 1.406rem;
        text-align: center;
        box-shadow: rgba(0, 0, 0, 0.2) 0rem 0rem 1.563rem 0rem;
        transform: matrix(1, 0, 0, 1, 0, 0);
        transition: opacity 1.5s, transform 1.5s;
        border-width: 0.042rem;
        border-style: solid;
        margin: 0.5rem auto;
    }
    .wpk_process:hover {
        opacity: 0.9;
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        border-color: currentColor;
    }
    .wpk_thumb {
        display: flex;
        width: 6.875rem;
        height: 6.875rem;
        margin: 1.25rem 2.146rem 0.938rem;
        padding: 0.5rem;
        border: 0.292rem solid rgb(226, 229, 239);
        border-radius: 50%;
        color: #27ae60;
        font-size: 0.94rem;
        font-family: Tajawal, sans-serif;
        line-height: 1.406rem;
        text-align: center;
        transition: all 0.3s ease;
        justify-content: center;
        border-width: 0.292rem;
        border-style: solid;
    }
    .wpk_thumb_figure {
        display: flex;
        width: 5rem;
        height: 5rem;
        margin: 0rem 0.146rem;
        border-radius: 50%;
        background-color: #ebedf3;
        color: #2778aeff;
        font-size: 0.94rem;
        font-family: Tajawal, sans-serif;
        line-height: 1.406rem;
        text-align: center;
        transition: all 0.3s ease;
        justify-content: center;
    }

    .wpk_thumb_figure:hover {
        opacity: 0.9;
        transform: translateY(-1px);
    }
    .img-fluid {
        position: absolute;
        width: 2.813rem;
        height: 2.813rem;
        color: #277aaeff;
        font-size: 0.94rem;
        font-family: Tajawal, sans-serif;
        line-height: 1.406rem;
        text-align: center;
        transform: matrix(1, 0, 0, 1, -22.5, -22.5);
        transition: all 0.3s ease;
    }
    /* Service card + icon styles to match attached design */
    .service-card {
        background: #fff;
        border-radius: 12px;
        padding: 2rem 1.25rem;
        width: 100%;
        max-width: 14rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        box-shadow: 0 14px 30px rgba(38, 63, 84, 0.06);
        margin: 0.5rem auto;
    }
    .service-title {
        margin-top: 1rem;
        color: #2b3b50;
        font-weight: 600;
        font-size: 1rem;
        text-align: center;
        font-family: Tajawal, sans-serif;
    }
    /* Outer ring using box-shadow creates the double-ring effect */
    .wpk_thumb {
        width: 86px;
        height: 86px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #fff;
        box-shadow: 0 0 0 10px rgba(232, 236, 242, 1), inset 0 0 0 2px rgba(255,255,255,0.6);
    }
    .wpk_thumb_figure {
        width: 56px;
        height: 56px;
        border-radius: 50%;
        background-color: #eef2f7;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .wpk_thumb_figure .img-fluid,
    .wpk_thumb_figure i.material-icons {
        font-size: 28px !important;
        color: #2b89d6;
        position: relative;
    }
        /* Marketing card styles (replaced with user design) */
        .marketing-card {
            background: #ffffff;
            border-radius: 18px;
            padding: 40px 30px;
            text-align: center;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            border: 1px solid #cbd5e1;
            max-width: 300px;
            margin: 0 auto;
        }

        .marketing-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        .marketing-card .icon-container {
            margin-bottom: 24px;
        }

        /* Outer ring + inner circle style to match attached card */
        .marketing-card .icon-circle {
            width: 86px;
            height: 86px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 8px auto;
            position: relative;
            background: #ffffff; /* card background through */
            /* outer ring using box-shadow to create the double-ring look (darker) */
            box-shadow: 0 0 0 10px rgba(210, 217, 227, 1);
        }

        /* inner circle (light grey) behind the icon */
        .marketing-card .icon-circle::after {
            content: '';
            position: absolute;
            width: 56px;
            height: 56px;
            border-radius: 50%;
            /* slightly darker inner circle for better contrast */
            background: #d9dee6;
            z-index: 0;
        }

        .marketing-card .icon {
            width: 36px;
            height: 36px;
            color: #2b89d6; /* blue stroke for the icon */
            display: block;
            line-height: 0;
            position: relative;
            z-index: 1; /* sit above the inner circle */
        }

        /* Ensure SVG strokes stay crisp when scaled */
        .marketing-card svg.icon {
            width: 32px;
            height: 32px;
            display: block;
            shape-rendering: geometricPrecision;
            vector-effect: non-scaling-stroke;
        }

        /* Improve icon font rendering for material icons */
        .service-item .material-icons,
        .wpk_thumb_figure i.material-icons {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            text-rendering: optimizeLegibility;
        }

        /* Make dynamic service icons match the marketing card color */
        .service-item .material-icons {
            color: #2596be !important;
        }

        /* Update other thumb/icon rules to match */
        .wpk_thumb_figure .img-fluid,
        .wpk_thumb_figure i.material-icons {
            font-size: 28px !important;
            color: #2596be;
            position: relative;
        }

        .marketing-card .title {
            font-size: 18px;
            font-weight: 600;
            color: #1e293b;
            line-height: 1.4;
            margin: 0;
        }
        /* smaller modifier for long titles (applied to specific card) */
        .marketing-card .title.small {
            font-size: 16px;
        }

        /* Responsive design for the marketing card */
        @media (max-width: 768px) {
          .marketing-card {
            padding: 32px 24px;
            max-width: 280px;
          }
          .marketing-card .icon-circle { width:70px; height:70px; }
          .marketing-card .icon { width:28px; height:28px; }
          .marketing-card .title { font-size:16px; }
        }

        @media (max-width: 480px) {
          .marketing-card { padding: 28px 20px; max-width:260px; }
          .marketing-card .icon-circle { width:64px; height:64px; }
          .marketing-card .icon { width:24px; height:24px; }
          .marketing-card .title { font-size:15px; }
        }

        @media (max-width: 600px) {
            .section-heading {
                font-size: 1.8rem;
            }
        }

                /* Service item fade-up animation */
                @keyframes  fadeUp {
                    0% { opacity: 0; transform: translateY(12px); }
                    100% { opacity: 1; transform: translateY(0); }
                }

                .service-item {
                    opacity: 0;
                    transform: translateY(12px);
                    animation: fadeUp 0.6s ease forwards;
                }

                /* Staggered delays for up to 6 items; adjust as needed */
                .service-item:nth-child(1) { animation-delay: 0.05s; }
                .service-item:nth-child(2) { animation-delay: 0.15s; }
                .service-item:nth-child(3) { animation-delay: 0.25s; }
                .service-item:nth-child(4) { animation-delay: 0.35s; }
                .service-item:nth-child(5) { animation-delay: 0.45s; }
                .service-item:nth-child(6) { animation-delay: 0.55s; }
    </style>

    <!-- SERVICE SECTION -->

    <section class="section grey lighten-4 center">
        <div class="container">
            <div class="row">
                <h4 class="section-heading"><?php echo e(__('messages.services')); ?></h4>
            </div>
            <!-- Static featured marketing cards placed under the services heading -->
            <div class="row" style="display:flex;justify-content:center;flex-wrap:wrap;">
                <div class="col s12 m6 l3">
                    <div class="marketing-card" role="article" aria-label="التسويق العقاري">
                        <div class="icon-container">
                            <div class="icon-circle">
                                <svg class="icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <rect x="3" y="4" width="18" height="12" rx="1" stroke="#2b89d6" stroke-width="1.8" fill="none" stroke-linecap="round" stroke-linejoin="round" />
                                    <polyline points="7,12 10,8 13,10 17,6" stroke="#2b89d6" stroke-width="1.8" fill="none" stroke-linecap="round" stroke-linejoin="round" />
                                    <circle cx="12" cy="20" r="1.4" fill="#2b89d6" />
                                    <line x1="12" y1="16" x2="12" y2="18.5" stroke="#2b89d6" stroke-width="1.8" stroke-linecap="round" />
                                </svg>
                            </div>
                        </div>
                        <h3 class="title">التسويق العقاري</h3>
                    </div>
                </div>

                <div class="col s12 m6 l3">
                    <div class="marketing-card" role="article" aria-label="إدارة الأملاك">
                        <div class="icon-container">
                            <div class="icon-circle">
                                <!-- Building + key icon for property management -->
                                <svg class="icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <!-- building -->
                                    <rect x="4" y="6" width="7" height="12" rx="0.5" stroke="#2b89d6" stroke-width="1.6" fill="none" stroke-linecap="round" stroke-linejoin="round" />
                                    <rect x="13" y="8" width="6" height="10" rx="0.5" stroke="#2b89d6" stroke-width="1.6" fill="none" stroke-linecap="round" stroke-linejoin="round" />
                                    <!-- windows -->
                                    <rect x="5.5" y="8.5" width="1.2" height="1.6" fill="#2b89d6" />
                                    <rect x="7.8" y="8.5" width="1.2" height="1.6" fill="#2b89d6" />
                                    <rect x="5.5" y="11" width="1.2" height="1.6" fill="#2b89d6" />
                                    <rect x="7.8" y="11" width="1.2" height="1.6" fill="#2b89d6" />
                                    <!-- key -->
                                    <circle cx="18.5" cy="17" r="1.1" fill="#2b89d6" />
                                    <path d="M17.2 16.2l2 2" stroke="#2b89d6" stroke-width="1.6" stroke-linecap="round" />
                                    <path d="M19.1 18.1h1.2v1.2" stroke="#2b89d6" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                        </div>
                        <h3 class="title">إدارة الأملاك</h3>
                    </div>
                </div>

                <div class="col s12 m6 l3">
                    <div class="marketing-card" role="article" aria-label="توثيق العقود الالكترونية">
                        <div class="icon-container">
                            <div class="icon-circle">
                                <!-- Document + check icon for electronic contract notarization -->
                                <svg class="icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <!-- document -->
                                    <path d="M6 3h8l4 4v11a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1z" stroke="#2b89d6" stroke-width="1.6" fill="none" stroke-linecap="round" stroke-linejoin="round" />
                                    <!-- folded corner line -->
                                    <path d="M14 3v4h4" stroke="#2b89d6" stroke-width="1.6" fill="none" stroke-linecap="round" stroke-linejoin="round" />
                                    <!-- check mark inside a small circle -->
                                    <circle cx="9.5" cy="13.5" r="2" fill="#2b89d6" />
                                    <path d="M8.4 13.6l0.7 0.7 1.5-1.7" stroke="#ffffff" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" fill="none" />
                                    <!-- signature-like line -->
                                    <path d="M7 17.5c1-0.5 2.5-0.5 3.5 0" stroke="#2b89d6" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" fill="none" />
                                </svg>
                            </div>
                        </div>
                        <h3 class="title small">توثيق العقود الالكترونية</h3>
                    </div>
                </div>

                <div class="col s12 m6 l3">
                    <div class="marketing-card" role="article" aria-label="إدارة المرافق">
                        <div class="icon-container">
                            <div class="icon-circle">
                                <!-- Wrench + building icon for facilities management -->
                                <svg class="icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <!-- building silhouette -->
                                    <rect x="3.5" y="6" width="6" height="11" rx="0.4" stroke="#2b89d6" stroke-width="1.6" fill="none" stroke-linecap="round" stroke-linejoin="round" />
                                    <rect x="14" y="7.5" width="6" height="9.5" rx="0.4" stroke="#2b89d6" stroke-width="1.6" fill="none" stroke-linecap="round" stroke-linejoin="round" />
                                    <!-- small windows -->
                                    <rect x="4.6" y="8.2" width="1" height="1" fill="#2b89d6" />
                                    <rect x="6.2" y="8.2" width="1" height="1" fill="#2b89d6" />
                                    <rect x="4.6" y="10" width="1" height="1" fill="#2b89d6" />
                                    <!-- wrench overlay -->
                                    <path d="M18 14l2 2-2 2-2-2" stroke="#2b89d6" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M16.5 13.5l-2.2 2.2" stroke="#2b89d6" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                    <circle cx="18" cy="14" r="0.9" fill="#2b89d6" />
                                </svg>
                            </div>
                        </div>
                        <h3 class="title">إدارة المرافق</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col s12 m6 l4 service-item">
                        <div class="card-panel">
                            <i class="material-icons large indigo-text"><?php echo e($service->icon); ?></i>
                            <h5><?php echo e($service->title); ?></h5>
                            <p><?php echo e($service->description); ?></p>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>

    <!-- PROPERTY LIST SECTION -->
    <section class="section">
        <div class="container">
            <div class="row">
                <h4 class="section-heading"><?php echo e(__('messages.featured_properties')); ?></h4>
            </div>
            <div class="row">
                <?php $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col s12 m6 l4">
                        <div class="card">
                            <div class="card-image">
                                <?php if(Storage::disk('public')->exists('property/'.$property->image) && $property->image): ?>
                                    <span class="card-image-bg" style="background-image:url(<?php echo e(Storage::url('property/'.$property->image)); ?>);"></span>
                                <?php else: ?>
                                    <span class="card-image-bg" style="background-image:url(<?php echo e(asset('frontend/images/default.jpg')); ?>);"></span>
                                <?php endif; ?>
                                <?php if($property->featured == 1): ?>
                                    <a class="btn-floating halfway-fab waves-effect waves-light indigo" title="Featured"><i class="small material-icons">star</i></a>
                                <?php endif; ?>
                            </div>
                            <div class="card-content property-content">
                                <a href="<?php echo e(route('property.show',$property->slug)); ?>">
                                    <span class="card-title tooltipped" data-position="bottom" data-tooltip="<?php echo e($property->title); ?>"><?php echo e(str_limit( $property->title, 18 )); ?></span>
                                </a>

                                <div class="address">
                                    <i class="small material-icons left">location_city</i>
                                    <span><?php echo e(ucfirst($property->city)); ?></span>
                                </div>
                                <div class="address">
                                    <i class="small material-icons left">place</i>
                                    <span><?php echo e(ucfirst($property->address)); ?></span>
                                </div>
                                <div class="address">
                                    <i class="small material-icons left">check_box</i>
                                    <span><?php echo e(ucfirst($property->type)); ?> <?php echo e(__('messages.for')); ?> <?php echo e($property->purpose); ?></span>
                                </div>

                                <h5>
                                    &#65020;<?php echo e($property->price); ?>

                                    <div class="right" id="propertyrating-<?php echo e($property->id); ?>"></div>
                                </h5>
                            </div>
                            <div class="card-action property-action">
                                <span class="btn-flat">
                                    <i class="material-icons">check_box</i>
                                    <?php echo e(__('messages.bedroom')); ?>: <strong><?php echo e($property->bedroom); ?></strong> 
                                </span>
                                <span class="btn-flat">
                                    <i class="material-icons">check_box</i>
                                    <?php echo e(__('messages.bathroom')); ?>: <strong><?php echo e($property->bathroom); ?></strong> 
                                </span>
                                <span class="btn-flat">
                                    <i class="material-icons">check_box</i>
                                    <?php echo e(__('messages.area')); ?>: <strong><?php echo e($property->area); ?></strong> <?php echo e(__('messages.square_feet')); ?>

                                </span>
                                <span class="btn-flat">
                                    <i class="material-icons">comment</i> 
                                    <strong><?php echo e($property->comments_count); ?></strong>
                                </span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>


    <!-- TESTIMONIALS SECTION -->

    <section class="section grey lighten-3 center">
        <div class="container">

            <h4 class="section-heading">العقارات</h4>

            <div class="carousel testimonials">

                <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="carousel-item testimonial-item" href="#<?php echo e($testimonial->id); ?>!">
                        <div class="card testimonial-card">
                            <span style="height:20px;display:block;"></span>
                            <div class="card-image testimonial-image">
                                <img class="responsive-img" src="<?php echo e(Storage::url('testimonial/'.$testimonial->image)); ?>">
                            </div>
                            <div class="card-content">
                                <span class="card-title"><?php echo e($testimonial->name); ?></span>
                                <p>
                                    <?php echo e($testimonial->testimonial); ?>

                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

        </div>

    </section>


    <!-- BLOG SECTION -->

    <section class="section center">
        <div class="row">
            <h4 class="section-heading"><?php echo e(__('messages.recent_blog')); ?></h4>
        </div>
        <div class="container">
            <div class="row">

                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col s12 m6 l4">
                    <div class="card">
                        <div class="card-image">
                            <?php if(Storage::disk('public')->exists('posts/'.$post->image) && $post->image): ?>
                                <span class="card-image-bg" style="background-image:url(<?php echo e(Storage::url('posts/'.$post->image)); ?>);"></span>
                            <?php endif; ?>
                        </div>
                        <div class="card-content">
                            <span class="card-title tooltipped" data-position="bottom" data-tooltip="<?php echo e($post->title); ?>">
                                <a href="<?php echo e(route('blog.show',$post->slug)); ?>"><?php echo e(str_limit($post->title,18)); ?></a>
                            </span>
                            <?php echo str_limit($post->body,120); ?>

                        </div>
                        <div class="card-action blog-action">
                            <a href="<?php echo e(route('blog.author',$post->user->username)); ?>" class="btn-flat">
                                <i class="material-icons">person</i>
                                <span><?php echo e($post->user->name); ?></span>
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
                                <i class="material-icons">watch_later</i>
                                <span><?php echo e($post->created_at->diffForHumans()); ?></span>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
    </section>

    <script>
        $(function(){
            var js_properties = <?php echo json_encode($properties, 15, 512) ?>;
            js_properties.forEach(element => {
                if(element.rating){
                    var elmt = element.rating;
                    var sum = 0;
                    for( var i = 0; i < elmt.length; i++ ){
                        sum += parseFloat( elmt[i].rating ); 
                    }
                    var avg = sum/elmt.length;
                    if(isNaN(avg) == false){
                        $("#propertyrating-"+element.id).rateYo({
                            rating: avg,
                            starWidth: "20px",
                            readOnly: true
                        });
                    }else{
                        $("#propertyrating-"+element.id).rateYo({
                            rating: 0,
                            starWidth: "20px",
                            readOnly: true
                        });
                    }
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>