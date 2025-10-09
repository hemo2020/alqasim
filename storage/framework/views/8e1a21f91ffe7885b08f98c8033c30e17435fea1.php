<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section class="section">
        <div class="container">
            
            <div class="row">
                <h4 class="section-heading">Properties</h4>
            </div>

            <div class="row">
                <div class="city-categories">
                    <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col s12 m3">
                            <a href="<?php echo e(route('property.city',$city->city_slug)); ?>">
                                <div class="city-category">
                                    <span><?php echo e($city->city); ?></span>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            <div class="row">

                <?php $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col s12 m4">
                        <div class="card">
                            <div class="card-image">
                                <?php if(Storage::disk('public')->exists('property/'.$property->image) && $property->image): ?>
                                    <span class="card-image-bg" style="background-image:url(<?php echo e(Storage::url('property/'.$property->image)); ?>);"></span>
                                <?php else: ?>
                                    <span class="card-image-bg"><span>
                                <?php endif; ?>
                                <?php if($property->featured == 1): ?>
                                    <a class="btn-floating halfway-fab waves-effect waves-light indigo"><i class="small material-icons">star</i></a>
                                <?php endif; ?>
                            </div>
                            <div class="card-content property-content">
                                <a href="<?php echo e(route('property.show',$property->slug)); ?>">
                                    <span class="card-title tooltipped" data-position="bottom" data-tooltip="<?php echo e($property->title); ?>"><?php echo e(str_limit( $property->title, 18 )); ?></span>
                                </a>

                                <div class="address">
                                    <i class="small material-icons left">place</i>
                                    <span><?php echo e(ucfirst($property->city)); ?></span>
                                </div>
                                <div class="address">
                                    <i class="small material-icons left">language</i>
                                    <span><?php echo e(ucfirst($property->address)); ?></span>
                                </div>

                                <div class="address">
                                    <i class="small material-icons left">check_box</i>
                                    <span><?php echo e(ucfirst($property->type)); ?></span>
                                </div>
                                <div class="address">
                                    <i class="small material-icons left">check_box</i>
                                    <span>For <?php echo e(ucfirst($property->purpose)); ?></span>
                                </div>

                                <h5>
                                    &dollar;<?php echo e($property->price); ?>

                                    <div class="right" id="propertyrating-<?php echo e($property->id); ?>"></div>
                                </h5>                                
                            </div>
                            <div class="card-action property-action">
                                <span class="btn-flat">
                                    <i class="material-icons">check_box</i>
                                    Bedroom: <strong><?php echo e($property->bedroom); ?></strong> 
                                </span>
                                <span class="btn-flat">
                                    <i class="material-icons">check_box</i>
                                    Bathroom: <strong><?php echo e($property->bathroom); ?></strong> 
                                </span>
                                <span class="btn-flat">
                                    <i class="material-icons">check_box</i>
                                    Area: <strong><?php echo e($property->area); ?></strong> Square Feet
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

            <div class="m-t-30 m-b-60 center">
                <?php echo e($properties->links()); ?>

            </div>

        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<script>

    $(function(){
        var js_properties = <?php echo json_encode($properties, 15, 512) ?>;
        var items = js_properties.data ? js_properties.data : js_properties;
        items.forEach(element => {
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
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>