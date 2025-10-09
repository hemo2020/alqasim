<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section class="section">
        <div class="container">
            <div class="row">

                <div class="col s12 m3">
                    <div class="agent-sidebar">
                        <?php echo $__env->make('agent.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                </div>

                <div class="col s12 m9">
                    <div class="agent-content">
                        <h4 class="agent-title">EDIT PROPERTY</h4>

                        <form action="<?php echo e(route('agent.properties.update',$property->slug)); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">title</i>
                                    <input id="title" name="title" type="text" class="validate" value="<?php echo e($property->title); ?>" data-length="200">
                                    <label for="title">Title</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">attach_money</i>
                                    <input id="price" name="price" type="number" value="<?php echo e($property->price); ?>" class="validate">
                                    <label for="price">Price</label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">business</i>
                                    <input id="area" name="area" type="number" value="<?php echo e($property->area); ?>" class="validate">
                                    <label for="area">Floor Area</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">airline_seat_flat</i>
                                    <input id="bedroom" name="bedroom" type="number" value="<?php echo e($property->bedroom); ?>" class="validate">
                                    <label for="bedroom">Bedroom</label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">event_seat</i>
                                    <input id="bathroom" name="bathroom" type="number" value="<?php echo e($property->bathroom); ?>" class="validate">
                                    <label for="bathroom">Bathroom</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s4">
                                    <i class="material-icons prefix">location_city</i>
                                    <input id="city" name="city" type="text" value="<?php echo e($property->city); ?>" class="validate">
                                    <label for="city">City</label>
                                </div>
                                <div class="input-field col s8">
                                    <i class="material-icons prefix">account_balance</i>
                                    <textarea id="address" name="address" class="materialize-textarea"><?php echo e($property->address); ?></textarea>
                                    <label for="address">Address</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s3">
                                    <p>
                                        <label>
                                            <input type="checkbox" name="featured" class="filled-in" <?php echo e($property->featured == 1 ? 'checked' : ''); ?> />
                                            <span>Featured</span>
                                        </label>
                                    </p>
                                </div>
                                <div class="input-field col s9">
                                    <i class="material-icons prefix">mode_edit</i>
                                    <textarea id="description" name="description" class="materialize-textarea"><?php echo e($property->description); ?></textarea>
                                    <label for="description">Description</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col s3">
                                    <label class="label-custom" for="type">Property Type</label>
                                    <p>
                                        <label>
                                            <input class="with-gap" name="type" value="house" type="radio" <?php echo e($property->type == 'house' ? 'checked' : ''); ?> />
                                            <span>Sale</span>
                                        </label>
                                    <p>
                                    </p>
                                        <label>
                                            <input class="with-gap" name="type" value="apartment" type="radio" <?php echo e($property->type == 'apartment' ? 'checked' : ''); ?> />
                                            <span>Rent</span>
                                        </label>
                                    </p>
                                </div>
                                <div class="col s3">
                                    <label class="label-custom" for="purpose">Property Purpose</label>
                                    <p>
                                        <label>
                                            <input class="with-gap" name="purpose" value="sale" type="radio" <?php echo e($property->purpose == 'sale' ? 'checked' : ''); ?> />
                                            <span>House</span>
                                        </label>
                                    <p>
                                    </p>
                                        <label>
                                            <input class="with-gap" name="purpose" value="rent" type="radio" <?php echo e($property->purpose == 'rent' ? 'checked' : ''); ?> />
                                            <span>Apartment</span>
                                        </label>
                                    </p>
                                </div>
                                <div class="input-field col s6">
                                    <select multiple name="features[]">
                                        <option value="" disabled>Choose Features</option>
                                        <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($feature->id); ?>" 
                                                    <?php $__currentLoopData = $property->features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $checked): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php echo e(($checked->id == $feature->id) ? 'selected' : ''); ?>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            ><?php echo e($feature->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <label class="label-custom">Select Features</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="file-field input-field col s10">
                                    <div class="btn indigo">
                                        <span>Featured Image</span>
                                        <input type="file" name="image">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text">
                                    </div>
                                </div>
                                <div class="file-field input-field col s2">
                                    <?php if(Storage::disk('public')->exists('property/'.$property->image) && $property->image ): ?>
                                        <img src="<?php echo e(Storage::url('property/'.$property->image)); ?>" alt="<?php echo e($property->title); ?>" class="responsive-img">
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">map</i>
                                    <input id="location_latitude" name="location_latitude" type="text" value="<?php echo e($property->location_latitude); ?>" class="validate">
                                    <label for="location_latitude">Latitude</label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">map</i>
                                    <input id="location_longitude" name="location_longitude" type="text" value="<?php echo e($property->location_longitude); ?>" class="validate">
                                    <label for="location_longitude">Longitude</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">voice_chat</i>
                                    <input id="video" name="video" type="text" value="<?php echo e($property->video); ?>" class="validate">
                                    <label for="video">Youtube Link</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="file-field input-field col s10">
                                    <div class="btn indigo">
                                        <span>Floor Plan</span>
                                        <input type="file" name="floor_plan">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text">
                                    </div>
                                </div>
                                <div class="file-field input-field col s2">
                                    <?php if(Storage::disk('public')->exists('property/'.$property->floor_plan) && $property->floor_plan ): ?>
                                        <img src="<?php echo e(Storage::url('property/'.$property->floor_plan)); ?>" alt="<?php echo e($property->title); ?>" class="responsive-img">
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">place</i>
                                    <textarea id="nearby" name="nearby" class="materialize-textarea"><?php echo e($property->nearby); ?></textarea>
                                    <label for="nearby">Nearby</label>
                                </div>
                            </div>

                            <?php if($property->gallery): ?>
                            <div class="row m-b-0">
                                <?php $__currentLoopData = $property->gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col m3 s6">
                                    <div class="gallery-image-edit" id="gallery-<?php echo e($gallery->id); ?>">
                                        <button type="button" data-id="<?php echo e($gallery->id); ?>" class="btn btn-small red"><i class="material-icons">delete_forever</i></button>
                                        <img class="responsive-img" src="<?php echo e(Storage::url('property/gallery/'.$gallery->name)); ?>" alt="<?php echo e($gallery->name); ?>">
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <?php endif; ?>
                            <div class="row">
                                <div class="file-field input-field col s12">
                                    <div class="btn indigo">
                                        <span>Upload Gallery Images</span>
                                        <input type="file" name="gallaryimage[]" multiple>
                                        <span class="helper-text" data-error="wrong" data-success="right">Upload one or more images</span>
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text" placeholder="Upload one or more images">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col s12 m-t-30">
                                    <button class="btn waves-effect waves-light btn-large indigo darken-4" type="submit">
                                        Submit
                                        <i class="material-icons right">send</i>
                                    </button>
                                </div>
                            </div>

                        </form>


                    </div>
                </div> <!-- /.col -->

            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    $(document).ready(function() {
        $('input#title, textarea#nearby').characterCounter();
        $('select').formSelect();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // DELETE PROPERTY GALLERY IMAGE
        $('.gallery-image-edit button').on('click',function(e){
            e.preventDefault();
            var id = $(this).data('id');
            var image = $('#gallery-'+id+' img').attr('alt');
            $.post("<?php echo e(route('agent.gallery-delete')); ?>",{id:id,image:image},function(data){
                if(data.msg == true){
                    $('#gallery-'+id).parent().remove();
                    M.toast({html: 'Image deleted successfully.', classes:'green darken-4'})
                }
            });
            
        });
    });

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>