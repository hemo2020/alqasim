<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section>
        <div class="container">
            <div class="row">

                <div class="col s12 m4 card">

                    <h2 class="sidebar-title">ابحث عن عقارك

                    <form class="sidebar-search" action="<?php echo e(route('search')); ?>" method="GET">

                        <div class="searchbar">
                            <div class="input-field col s12">
                                <input type="text" name="city" id="autocomplete-input-sidebar" class="autocomplete custominputbox" autocomplete="off">
                                <label for="autocomplete-input-sidebar">الرجاء إختر المدينة
                            </div>
    
                            <div class="input-field col s12">
                                <select name="type" class="browser-default">
                                    <option value="" disabled selected>إختر نوع العقار
                                    <option value="apartment">مستودع</option>
                                    <option value="house">محل</option>
                                    <option value="commercial">فيلا</option>
                                </select>
                            </div>
    
                            <div class="input-field col s12">
                                <select name="purpose" class="browser-default">
                                    <option value="" disabled selected>إختر نوع الخدمة
                                    <option value="rent">إيجار</option>
                                    <option value="sale">شراء</option>
                                </select>
                            </div>
    
                            <div class="input-field col s12">
                                <select name="bedroom" class="browser-default">
                                    <option value="" disabled selected>إختر عدد الغرف</option>
                                    <?php $__currentLoopData = $bedroomdistinct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bedroom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($bedroom->bedroom); ?>"><?php echo e($bedroom->bedroom); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="input-field col s12">
                                <select name="bathroom" class="browser-default">
                                    <option value="" disabled selected>إختر عدد دورات المياه
                                    <?php $__currentLoopData = $bathroomdistinct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bathroom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($bathroom->bathroom); ?>"><?php echo e($bathroom->bathroom); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
    
                            <div class="input-field col s12">
                                <input type="number" name="minprice" id="minprice" class="custominputbox">
                                <label for="minprice">الحدالأدنى
                            </div>
    
                            <div class="input-field col s12">
                                <input type="number" name="maxprice" id="maxprice" class="custominputbox">
                                <label for="maxprice">الحد الأقصى</label>
                            </div>
    
                            <div class="input-field col s12">
                                <input type="number" name="minarea" id="minarea" class="custominputbox">
                                <label for="minarea">الحدالأدنى للمساحة</label>
                            </div>
    
                            <div class="input-field col s12">
                                <input type="number" name="maxarea" id="maxarea" class="custominputbox">
                                <label for="maxarea">الحد الاعلى للمساحة</label>
                            </div>
</label>
                            </div>
                            
                            <div class="input-field col s12">
                                <div class="switch">
                                    <label>
                                        <input type="checkbox" name="featured">
                                        <span class="lever"></span>
                                        فقط المميزة
                                    </label>
                                </div>
                            </div>
                            <div class="input-field col s12">
                                <button class="btn btnsearch indigo" type="submit">
                                    <i class="material-icons left">search</i>
                                    <span>بحث</span>
                                </button>
                            </div>
                        </div>
    
                    </form>

                </div>

                <div class="col s12 m8">

                    <?php $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card horizontal">
                            <div>
                                <div class="card-content property-content">
                                    <?php if(Storage::disk('public')->exists('property/'.$property->image) && $property->image): ?>
                                        <div class="card-image blog-content-image">
                                            <img src="<?php echo e(Storage::url('property/'.$property->image)); ?>" alt="<?php echo e($property->title); ?>">
                                        </div>
                                    <?php endif; ?>
                                    <span class="card-title search-title" title="<?php echo e($property->title); ?>">
                                        <a href="<?php echo e(route('property.show',$property->slug)); ?>"><?php echo e($property->title); ?></a>
                                    </span>
                                    
                                    <div class="address">
                                        <i class="small material-icons left">location_city</i>
                                        <span><?php echo e(ucfirst($property->city)); ?></span>
                                    </div>
                                    <div class="address">
                                        <i class="small material-icons left">place</i>
                                        <span><?php echo e(ucfirst($property->address)); ?></span>
                                    </div>

                                    <h5>
                                        &#65020;<?php echo e($property->price); ?>

                                        <small class="right"><?php echo e($property->type); ?> for <?php echo e($property->purpose); ?></small>
                                    </h5>

                                </div>
                                <div class="card-action property-action clearfix">
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
                                        Area: <strong><?php echo e($property->area); ?></strong> Sq Ft
                                    </span>
                                    <span class="btn-flat">
                                        <i class="material-icons">comment</i>
                                        <?php echo e($property->comments_count); ?>

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
                        <?php echo e($properties->appends([
                                'city'      => Request::get('city'),
                                'type'      => Request::get('type'),
                                'purpose'   => Request::get('purpose'),
                                'bedroom'   => Request::get('bedroom'),
                                'bathroom'  => Request::get('bathroom'),
                                'minprice'  => Request::get('minprice'),
                                'maxprice'  => Request::get('maxprice'),
                                'minarea'   => Request::get('minarea'),
                                'maxarea'   => Request::get('maxarea'),
                                'featured'  => Request::get('featured')
                            ])->links()); ?>

                    </div>
        
                </div>

            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>