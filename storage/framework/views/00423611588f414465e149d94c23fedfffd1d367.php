<?php $__env->startSection('title', 'Edit Property'); ?>

<?php $__env->startPush('styles'); ?>

    <link rel="stylesheet" href="<?php echo e(asset('backend/plugins/bootstrap-select/css/bootstrap-select.css')); ?>">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />

<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>

    <div class="block-header"></div>

    <div class="row clearfix">
        <form action="<?php echo e(route('admin.properties.update',$property->slug)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-indigo">
                    <h2>Edit PROPERTY</h2>
                </div>
                <div class="body">

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="title" class="form-control" value="<?php echo e($property->title); ?>">
                            <label class="form-label">Property Title</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" name="price" class="form-control" value="<?php echo e($property->price); ?>" required>
                            <label class="form-label">Price</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" class="form-control" name="bedroom" value="<?php echo e($property->bedroom); ?>" required>
                            <label class="form-label">Bedroom</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" class="form-control" name="bathroom" value="<?php echo e($property->bathroom); ?>" required>
                            <label class="form-label">Bathroom</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="city" value="<?php echo e($property->city); ?>" required>
                            <label class="form-label">City</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="address" value="<?php echo e($property->address); ?>" required>
                            <label class="form-label">Address</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" class="form-control" name="area" value="<?php echo e($property->area); ?>" required>
                            <label class="form-label">Area</label>
                        </div>
                        <div class="help-info">Square Feet</div>
                    </div>

                    <div class="form-group">
                        <input type="checkbox" id="featured" name="featured" class="filled-in" value="1" <?php echo e($property->featured ? 'checked' : ''); ?>/>
                        <label for="featured">Featured</label>
                    </div>

                    <hr>
                    <div class="form-group">
                        <label for="tinymce">Description</label>
                        <textarea name="description" id="tinymce"><?php echo e($property->description); ?></textarea>
                    </div>

                    <hr>
                    <div class="form-group">
                        <label for="tinymce-nearby">Nearby</label>
                        <textarea name="nearby" id="tinymce-nearby"><?php echo e($property->nearby); ?></textarea>
                    </div>

                </div>
            </div>

            <div class="card">
                <div class="header bg-red">
                    <h2>GALLERY IMAGE</h2>
                </div>
                <div class="body">
                    <div class="gallery-box" id="gallerybox">
                        <?php $__currentLoopData = $property->gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="gallery-image-edit" id="gallery-<?php echo e($gallery->id); ?>">
                            <button type="button" data-id="<?php echo e($gallery->id); ?>" class="btn btn-danger btn-sm"><i class="material-icons">delete_forever</i></button>
                            <img class="img-responsive" src="<?php echo e(Storage::url('property/gallery/'.$gallery->name)); ?>" alt="<?php echo e($gallery->name); ?>">
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="gallery-box">
                        <hr>
                        <input type="file" name="gallaryimage[]" value="UPLOAD" id="gallaryimageupload" multiple>
                        <button type="button" class="btn btn-info btn-lg right" id="galleryuploadbutton">UPLOAD GALLERY IMAGE</button>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-indigo">
                    <h2>SELECT</h2>
                </div>
                <div class="body">

                    <div class="form-group form-float">
                        <div class="form-line <?php echo e($errors->has('purpose') ? 'focused error' : ''); ?>">
                            <label>Select Purpose</label>
                            <select name="purpose" class="form-control show-tick">
                                <option value="">-- Please select --</option>
                                <option value="sale" <?php echo e($property->purpose=='sale' ? 'selected' : ''); ?>>Sale</option>
                                <option value="rent" <?php echo e($property->purpose=='rent' ? 'selected' : ''); ?>>Rent</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line <?php echo e($errors->has('type') ? 'focused error' : ''); ?>">
                            <label>Select type</label>
                            <select name="type" class="form-control show-tick">
                                <option value="">-- Please select --</option>
                                <option value="house" <?php echo e($property->type=='house' ? 'selected' : ''); ?>>House</option>
                                <option value="apartment" <?php echo e($property->type=='apartment' ? 'selected' : ''); ?>>Apartment</option>
                            </select>
                        </div>
                    </div>

                    <h5>Features</h5>
                    <div class="form-group demo-checkbox">
                        <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <input type="checkbox" id="features-<?php echo e($feature->id); ?>" name="features[]" class="filled-in chk-col-indigo" value="<?php echo e($feature->id); ?>" 
                            <?php $__currentLoopData = $property->features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $checked): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e(($checked->id == $feature->id) ? 'checked' : ''); ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            />
                            <label for="features-<?php echo e($feature->id); ?>"><?php echo e($feature->name); ?></label>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <div class="clearfix">
                        <h5>Google Map</h5>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="location_latitude" class="form-control" value="<?php echo e($property->location_latitude); ?>" required/>
                                <label class="form-label">Latitude</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="location_longitude" class="form-control" value="<?php echo e($property->location_longitude); ?>" required/>
                                <label class="form-label">Longitude</label>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="card">
                <div class="header bg-indigo">
                    <h2>PROPERTY VIDEO</h2>
                </div>
                <div class="body">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="video" value="<?php echo e($property->video); ?>">
                            <label class="form-label">Video</label>
                        </div>
                        <div class="help-info">Youtube Link</div>
                    </div>
                    <div class="embed-video center">
                        <?php echo $videoembed; ?>

                    </div>
                </div>
            </div>

            <div class="card">
                <div class="header bg-indigo">
                    <h2>FLOOR PLAN</h2>
                </div>
                <div class="body">
                    <div class="form-group">
                        <?php if(Storage::disk('public')->exists('property/'.$property->floor_plan) && $property->floor_plan ): ?>
                            <img src="<?php echo e(Storage::url('property/'.$property->floor_plan)); ?>" alt="<?php echo e($property->title); ?>" class="img-responsive img-rounded"> <br>
                        <?php endif; ?>
                        <input type="file" name="floor_plan">
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="header bg-indigo">
                    <h2>FEATURED IMAGE</h2>
                </div>
                <div class="body">

                    <div class="form-group">
                        <?php if(Storage::disk('public')->exists('property/'.$property->image)): ?>
                            <img src="<?php echo e(Storage::url('property/'.$property->image)); ?>" alt="<?php echo e($property->title); ?>" class="img-responsive img-rounded"> <br>
                        <?php endif; ?>
                        <input type="file" name="image">
                    </div>

                    
                    <a href="<?php echo e(route('admin.properties.index')); ?>" class="btn btn-danger btn-lg m-t-15 waves-effect">
                        <i class="material-icons left">arrow_back</i>
                        <span>BACK</span>
                    </a>

                    <button type="submit" class="btn btn-indigo btn-lg m-t-15 waves-effect">
                        <i class="material-icons">save</i>
                        <span>SAVE</span>
                    </button>

                </div>
            </div>

        </div>
        </form>
    </div>
    

<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>

    <script src="<?php echo e(asset('backend/plugins/bootstrap-select/js/bootstrap-select.js')); ?>"></script>

    <script>
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
            $.post("<?php echo e(route('admin.gallery-delete')); ?>",{id:id,image:image},function(data){
                if(data.msg == true){
                    $('#gallery-'+id).remove();
                }
            });
        });

        $(function() {
            // Multiple images preview in browser
            var imagesPreview = function(input, placeToInsertImagePreview) {

                if (input.files) {
                    var filesAmount = input.files.length;

                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();

                        reader.onload = function(event) {

                            $('<div class="gallery-image-edit" id="gallery-perview-'+i+'"><img src="'+event.target.result+'" height="106" width="173"/></div>').appendTo(placeToInsertImagePreview);
                        }

                        reader.readAsDataURL(input.files[i]);
                    }
                }

            };

            $('#gallaryimageupload').on('change', function() {
                imagesPreview(this, 'div#gallerybox');
            });
        });

        $(document).on('click','#galleryuploadbutton',function(e){
            e.preventDefault();
            $('#gallaryimageupload').click();
        })

    </script>

    <script src="<?php echo e(asset('backend/plugins/tinymce/tinymce.js')); ?>"></script>
    <script>
        $(function () {
            tinymce.init({
                selector: "textarea#tinymce",
                theme: "modern",
                height: 300,
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons',
                image_advtab: true
            });
            tinymce.suffix = ".min";
            tinyMCE.baseURL = '<?php echo e(asset('backend/plugins/tinymce')); ?>';
        });

        $(function () {
            tinymce.init({
                selector: "textarea#tinymce-nearby",
                theme: "modern",
                height: 300,
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: '',
                image_advtab: true
            });
            tinymce.suffix = ".min";
            tinyMCE.baseURL = '<?php echo e(asset('backend/plugins/tinymce')); ?>';
        });
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>