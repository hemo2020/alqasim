<?php $__env->startSection('styles'); ?>
<style>
    #map {
        height: 320px;
    }

    .jssorl-009-spin img {
        animation-name: jssorl-009-spin;
        animation-duration: 1.6s;
        animation-iteration-count: infinite;
        animation-timing-function: linear;
    }

    @keyframes  jssorl-009-spin {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    .jssora106 {display:block;position:absolute;cursor:pointer;}
    .jssora106 .c {fill:#fff;opacity:.3;}
    .jssora106 .a {fill:none;stroke:#000;stroke-width:350;stroke-miterlimit:10;}
    .jssora106:hover .c {opacity:.5;}
    .jssora106:hover .a {opacity:.8;}
    .jssora106.jssora106dn .c {opacity:.2;}
    .jssora106.jssora106dn .a {opacity:1;}
    .jssora106.jssora106ds {opacity:.3;pointer-events:none;}

    .jssort101 .p {position: absolute;top:0;left:0;box-sizing:border-box;background:#000;}
    .jssort101 .p .cv {position:relative;top:0;left:0;width:100%;height:100%;box-sizing:border-box;z-index:1;}
    .jssort101 .a {fill:none;stroke:#fff;stroke-width:400;stroke-miterlimit:10;visibility:hidden;}
    .jssort101 .p:hover .cv, .jssort101 .p.pdn .cv {border:none;border-color:transparent;}
    .jssort101 .p:hover{padding:2px;}
    .jssort101 .p:hover .cv {background-color:rgba(0,0,0,6);opacity:.35;}
    .jssort101 .p:hover.pdn{padding:0;}
    .jssort101 .p:hover.pdn .cv {border:2px solid #fff;background:none;opacity:.35;}
    .jssort101 .pav .cv {border-color:#fff;opacity:.35;}
    .jssort101 .pav .a, .jssort101 .p:hover .a {visibility:visible;}
    .jssort101 .t {position:absolute;top:0;left:0;width:100%;height:100%;border:none;opacity:.6;}
    .jssort101 .pav .t, .jssort101 .p:hover .t{opacity:1;}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- SINGLE PROPERTY SECTION -->

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col s12 m8">
                    <div class="single-title">
                        <h4 class="single-title"><?php echo e($property->title); ?></h4>
                    </div>

                    <div class="address m-b-30">
                        <i class="small material-icons left">place</i>
                        <span class="font-18"><?php echo e($property->address); ?></span>
                    </div>

                    <div>
                        <?php if($property->featured == 1): ?>
                            <a class="btn-floating btn-small disabled"><i class="material-icons">star</i></a>
                        <?php endif; ?>

                        <span class="btn btn-small disabled b-r-20">Bedroom: <?php echo e($property->bedroom); ?> </span>
                        <span class="btn btn-small disabled b-r-20">Bathroom: <?php echo e($property->bathroom); ?> </span>
                        <span class="btn btn-small disabled b-r-20">Area: <?php echo e($property->area); ?> Sq Ft</span>
                    </div>
                </div>
                <div class="col s12 m4">
                    <div>
                        <h4 class="left">$<?php echo e($property->price); ?></h4>
                        <button type="button" class="btn btn-small m-t-25 right disabled b-r-20"> For <?php echo e($property->purpose); ?></button>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col s12 m8">

                    <?php if(!$property->gallery->isEmpty()): ?>
                        <div class="single-slider">
                            <?php echo $__env->make('pages.properties.slider', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                    <?php else: ?>
                        <div class="single-image">
                            <?php if(Storage::disk('public')->exists('property/'.$property->image) && $property->image): ?>
                                <img src="<?php echo e(Storage::url('property/'.$property->image)); ?>" alt="<?php echo e($property->title); ?>" class="imgresponsive">
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <div class="single-description p-15 m-b-15 border2 border-top-0">
                        <?php echo $property->description; ?>

                    </div>

                    <div>
                        <?php if($property->features): ?>
                            <ul class="collection with-header">
                                <li class="collection-header grey lighten-4"><h5 class="m-0">Features</h5></li>
                                <?php $__currentLoopData = $property->features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="collection-item"><?php echo e($feature->name); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>
                    </div>

                    <div class="card-no-box-shadow card">
                        <div class="p-15 grey lighten-4">
                            <h5 class="m-0">Floor Plan</h5>
                        </div>
                        <div class="card-image">
                            <?php if(Storage::disk('public')->exists('property/'.$property->floor_plan) && $property->floor_plan): ?>
                                <img src="<?php echo e(Storage::url('property/'.$property->floor_plan)); ?>" alt="<?php echo e($property->title); ?>" class="imgresponsive">
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="card-no-box-shadow card">
                        <div class="p-15 grey lighten-4">
                            <h5 class="m-0">Location</h5>
                        </div>
                        <div class="card-image">
                            <div id="map"></div>
                        </div>
                    </div>

                    <?php if($videoembed): ?>
                        <div class="card-no-box-shadow card">
                            <div class="p-15 grey lighten-4">
                                <h5 class="m-0">Video</h5>
                            </div>
                            <div class="card-image center m-t-10">
                                <?php echo $videoembed; ?>

                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="card-no-box-shadow card">
                        <div class="p-15 grey lighten-4">
                            <h5 class="m-0">Near By</h5>
                        </div>
                        <div class="single-narebay p-15">
                            <?php echo $property->nearby; ?>

                        </div>
                    </div>

                    <div class="card-no-box-shadow card">
                        <div class="p-15 grey lighten-4">
                            <h5 class="m-0">
                                <?php echo e($property->comments_count); ?> Comments
                                <?php if(auth()->guard()->check()): ?>
                                <div class="right" id="rateYo"></div>
                                <?php endif; ?>
                            </h5>
                        </div>
                        <div class="single-narebay p-15">

                            <?php $__currentLoopData = $property->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <?php if($comment->parent_id == NULL): ?>
                                    <div class="comment">
                                        <div class="author-image">
                                            <span style="background-image:url(<?php echo e(Storage::url('users/'.$comment->users->image)); ?>);"></span>
                                        </div>
                                        <div class="content">
                                            <div class="author-name">
                                                <strong><?php echo e($comment->users->name); ?></strong>
                                                <span class="time"><?php echo e($comment->created_at->diffForHumans()); ?></span>

                                                <?php if(auth()->guard()->check()): ?>
                                                    <span id="commentreplay" class="right replay" data-commentid="<?php echo e($comment->id); ?>">Replay</span>
                                                <?php endif; ?>

                                            </div>
                                            <div class="author-comment">
                                                <?php echo e($comment->body); ?>

                                            </div>
                                        </div>
                                        <div id="procomment-<?php echo e($comment->id); ?>"></div>
                                    </div>
                                <?php endif; ?>

                                <?php $__currentLoopData = $comment->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commentchildren): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="comment children">
                                        <div class="author-image">
                                            <span style="background-image:url(<?php echo e(Storage::url('users/'.$commentchildren->users->image)); ?>);"></span>
                                        </div>
                                        <div class="content">
                                            <div class="author-name">
                                                <strong><?php echo e($commentchildren->users->name); ?></strong>
                                                <span class="time"><?php echo e($commentchildren->created_at->diffForHumans()); ?></span>
                                            </div>
                                            <div class="author-comment">
                                                <?php echo e($commentchildren->body); ?>

                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <?php if(auth()->guard()->check()): ?>
                                <div class="comment-box">
                                    <h6>Leave a comment</h6>
                                    <form action="<?php echo e(route('property.comment',$property->id)); ?>" method="POST">
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
                    <div class="clearfix">

                        <div>
                            <ul class="collection with-header m-t-0">
                                <li class="collection-header grey lighten-4">
                                    <h5 class="m-0">Contact with Agent</h5>
                                </li>
                                <li class="collection-item p-0">
                                    <?php if($property->user): ?>
                                        <div class="card horizontal card-no-shadow">
                                            <div class="card-image p-l-10 agent-image">
                                                <img src="<?php echo e(Storage::url('users/'.$property->user->image)); ?>" alt="<?php echo e($property->user->username); ?>" class="imgresponsive">
                                            </div>
                                            <div class="card-stacked">
                                                <div class="p-l-10 p-r-10">
                                                    <h5 class="m-t-b-0"><?php echo e($property->user->name); ?></h5>
                                                    <strong><?php echo e($property->user->email); ?></strong>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-l-10 p-r-10">
                                            <p><?php echo e($property->user->about); ?></p>
                                            <a href="<?php echo e(route('agents.show',$property->agent_id)); ?>" class="profile-link">Profile</a>
                                        </div>
                                    <?php endif; ?>
                                </li>

                                <li class="collection agent-message">
                                    <form class="agent-message-box" action="" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="agent_id" value="<?php echo e($property->user->id); ?>">
                                        <input type="hidden" name="user_id" value="<?php echo e(auth()->id()); ?>">
                                        <input type="hidden" name="property_id" value="<?php echo e($property->id); ?>">
                                            
                                        <div class="box">
                                            <input type="text" name="name" placeholder="Your Name">
                                        </div>
                                        <div class="box">
                                            <input type="email" name="email" placeholder="Your Email">
                                        </div>
                                        <div class="box">
                                            <input type="number" name="phone" placeholder="Your Phone">
                                        </div>
                                        <div class="box">
                                            <textarea name="message" placeholder="Your Msssage"></textarea>
                                        </div>
                                        <div class="box">
                                            <button id="msgsubmitbtn" class="btn waves-effect waves-light w100 indigo" type="submit">
                                                SEND
                                                <i class="material-icons left">send</i>
                                            </button>
                                        </div>
                                    </form>
                                </li>
                            </ul>
                        </div>

                        <div>
                            <ul class="collection with-header">
                                <li class="collection-header grey lighten-4">
                                    <h5 class="m-0">City List</h5>
                                </li>
                                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="collection-item p-0">
                                        <a class="city-list" href="<?php echo e(route('property.city',$city->city_slug)); ?>">
                                            <span><?php echo e($city->city); ?></span>
                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>

                        <div>
                            <ul class="collection with-header">
                                <li class="collection-header grey lighten-4">
                                    <h5 class="m-0">Related Properties</h5>
                                </li>
                                <?php $__currentLoopData = $relatedproperty; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property_related): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="collection-item p-0">
                                        <a href="<?php echo e(route('property.show',$property_related->id)); ?>">
                                            <div class="card horizontal card-no-shadow m-0">
                                                <?php if($property_related->image): ?>
                                                <div class="card-image">
                                                    <img src="<?php echo e(Storage::url('property/'.$property_related->image)); ?>" alt="<?php echo e($property_related->title); ?>" class="imgresponsive">
                                                </div>
                                                <?php endif; ?>
                                                <div class="card-stacked">
                                                    <div class="p-l-10 p-r-10 indigo-text">
                                                        <h6 title="<?php echo e($property_related->title); ?>"><?php echo e(str_limit( $property_related->title, 18 )); ?></h6>
                                                        <strong>&dollar;<?php echo e($property_related->price); ?></strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>

    
    <?php
        $rating = ($rating == null) ? 0 : $rating;
    ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <script>
        $(function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // RATING
            $("#rateYo").rateYo({
                rating: <?php echo json_encode($rating, 15, 512) ?>,
                halfStar: true,
                starWidth: "26px"
            })
            .on("rateyo.set", function (e, data) {

                var rating = data.rating;
                var property_id = <?php echo json_encode($property->id, 15, 512) ?>;
                var user_id = <?php echo json_encode(auth()->id(), 15, 512) ?>;
                
                $.post( "<?php echo e(route('property.rating')); ?>", { rating: rating, property_id: property_id, user_id: user_id }, function( data ) {
                    if(data.rating.rating){
                        M.toast({html: 'Rating: '+ data.rating.rating + ' added successfully.', classes:'green darken-4'})
                    }
                });
            });
            

            // COMMENT
            $(document).on('click','#commentreplay',function(e){
                e.preventDefault();
                
                var commentid = $(this).data('commentid');

                $('#procomment-'+commentid).empty().append(
                    `<div class="comment-box">
                        <form action="<?php echo e(route('property.comment',$property->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="parent" value="1">
                            <input type="hidden" name="parent_id" value="`+commentid+`">
                            
                            <textarea name="body" class="box" placeholder="Leave a comment"></textarea>
                            <input type="submit" class="btn indigo" value="Comment">
                        </form>
                    </div>`
                );
            });

            // MESSAGE
            $(document).on('submit','.agent-message-box',function(e){
                e.preventDefault();

                var data = $(this).serialize();
                var url = "<?php echo e(route('property.message')); ?>";
                var btn = $('#msgsubmitbtn');

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    beforeSend: function() {
                        $(btn).addClass('disabled');
                        $(btn).empty().append('LOADING...<i class="material-icons left">rotate_right</i>');
                    },
                    success: function(data) {
                        if (data.message) {
                            M.toast({html: data.message, classes:'green darken-4'})
                        }
                    },
                    error: function(xhr) {
                        M.toast({html: xhr.statusText, classes: 'red darken-4'})
                    },
                    complete: function() {
                        $('form.agent-message-box')[0].reset();
                        $(btn).removeClass('disabled');
                        $(btn).empty().append('SEND<i class="material-icons left">send</i>');
                    },
                    dataType: 'json'
                });

            })
        })
    </script>

    <script src="<?php echo e(asset('frontend/js/jssor.slider.min.js')); ?>"></script>
    <script>
        jssor_1_slider_init = function() {

            var jssor_1_SlideshowTransitions = [
            {$Duration:1200,x:0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:1200,x:-0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:1200,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:1200,x:0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:1200,y:0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:1200,y:-0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:1200,y:-0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:1200,y:0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:1200,x:0.3,$Cols:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:1200,x:0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:1200,y:0.3,$Rows:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:1200,y:0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:1200,y:0.3,$Cols:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:1200,y:-0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:1200,x:0.3,$Rows:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:1200,x:-0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:1200,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:1200,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:1200,$Delay:20,$Clip:3,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:1200,$Delay:20,$Clip:3,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:1200,$Delay:20,$Clip:12,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:1200,$Delay:20,$Clip:12,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2}
            ];

            var jssor_1_options = {
            $AutoPlay: 1,
            $SlideshowOptions: {
                $Class: $JssorSlideshowRunner$,
                $Transitions: jssor_1_SlideshowTransitions,
                $TransitionsOrder: 1
            },
            $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
            },
            $ThumbnailNavigatorOptions: {
                $Class: $JssorThumbnailNavigator$,
                $SpacingX: 5,
                $SpacingY: 5
            }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 980;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };

        <?php if(!$property->gallery->isEmpty()): ?>
            jssor_1_slider_init();
        <?php endif; ?>

    </script>
    <script>
        function initMap() {
            var propLatLng = {
                lat: <?php echo e($property->location_latitude); ?>,
                lng: <?php echo e($property->location_longitude); ?>

            };

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 12,
                center: propLatLng
            });

            var marker = new google.maps.Marker({
                position: propLatLng,
                map: map,
                title: '<?php echo e($property->title); ?>'
            });
        }
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBRLaJEjRudGCuEi1_pqC4n3hpVHIyJJZA&callback=initMap">
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>