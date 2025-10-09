<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section class="section">
        <div class="container">
            <div class="row">

                <div class="col s12 m8">

                    <div class="card horizontal card-no-shadow m-b-60">
                        <div class="card-image agent-image">
                            <img src="<?php echo e(Storage::url('users/'.$agent->image)); ?>" alt="<?php echo e($agent->username); ?>" class="imgresponsive">
                        </div>
                        <div class="card-stacked p-l-15">
                            <div class="">
                                <h5 class=""><?php echo e($agent->name); ?></h5>
                                <strong><?php echo e($agent->email); ?></strong>
                            </div>
                            <div class="">
                                <p><?php echo e($agent->about); ?></p>
                            </div>
                        </div>
                    </div>

                    <h5 class="uppercase">Property List of <?php echo e($agent->name); ?></h5>

                    
                    <?php $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="card horizontal card-no-shadow border1">
                            <div class="card-image horizontal-bg-image">
                                <span class="card-image-bg" style="background-image:url(<?php echo e(Storage::url('property/'.$property->image)); ?>);"></span>
                            </div>
                            <div class="card-stacked">
                                <div class="p-20 property-content">
                                    <span class="card-title search-title" title="<?php echo e($property->title); ?>">
                                        <a href="<?php echo e(route('property.show',$property->slug)); ?>"><?php echo e(str_limit($property->title,25)); ?></a>
                                    </span>
                                    <h5>
                                        &dollar;<?php echo e($property->price); ?>

                                        <small class="right p-r-10"><?php echo e($property->type); ?> for <?php echo e($property->purpose); ?></small>
                                    </h5>
                                </div>

                                <div class="card-action property-action">
                                    <span class="btn-flat">
                                        <i class="material-icons">check_box</i>
                                        Beds: <strong><?php echo e($property->bedroom); ?></strong> 
                                    </span>
                                    <span class="btn-flat">
                                        <i class="material-icons">check_box</i>
                                        Baths: <strong><?php echo e($property->bathroom); ?></strong> 
                                    </span>
                                    <span class="btn-flat">
                                        <i class="material-icons">check_box</i>
                                        Area: <strong><?php echo e($property->area); ?></strong> Sq Ft
                                    </span>
                                    
                                    <?php if($property->featured == 1): ?>
                                        <span class="right featured-stars">
                                            <i class="material-icons">stars</i>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <div class="m-t-30 m-b-60 center">
                        <?php echo e($properties->links()); ?>

                    </div>

                </div>

                <div class="col s12 m4">
                    <div class="clearfix">

                        <div>
                            <ul class="collection with-header m-t-0">
                                <li class="collection-header grey lighten-4">
                                    <h5 class="m-0">Contact with Agent</h5>
                                </li>
                                <li class="collection agent-message">
                                    <form class="agent-message-box" action="" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="agent_id" value="<?php echo e($agent->id); ?>">
                                        <input type="hidden" name="user_id" value="<?php echo e(auth()->id()); ?>">
                                            
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

                    </div>
                </div>
            </div>

        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $(function(){
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>