<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section class="section">
        <div class="container">
            <div class="row">

                <div class="col s12 m8">
                    <div class="contact-content">
                        <h4 class="contact-title">Contact Us</h4>

                        <form id="contact-us" action="" method="POST">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="mailto" value="<?php echo e($contactsettings[0]['email'] ?? 'p4alam@gmail.com'); ?>">

                            <?php if(auth()->guard()->check()): ?>
                                <input type="hidden" name="user_id" value="<?php echo e(auth()->id()); ?>">
                            <?php endif; ?>

                            <?php if(auth()->guard()->check()): ?>
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">person</i>
                                    <input id="name" name="name" type="text" class="validate" value="<?php echo e(auth()->user()->name); ?>" readonly>
                                    <label for="name">Name</label>
                                </div>
                            <?php endif; ?>
                            <?php if(auth()->guard()->guest()): ?>
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">person</i>
                                    <input id="name" name="name" type="text" class="validate">
                                    <label for="name">Name</label>
                                </div>
                            <?php endif; ?>

                            <?php if(auth()->guard()->check()): ?>
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">mail</i>
                                    <input id="email" name="email" type="email" class="validate" value="<?php echo e(auth()->user()->email); ?>" readonly>
                                    <label for="email">Email</label>
                                </div>
                            <?php endif; ?>
                            <?php if(auth()->guard()->guest()): ?>
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">mail</i>
                                    <input id="email" name="email" type="email" class="validate">
                                    <label for="email">Email</label>
                                </div>
                            <?php endif; ?>

                            <div class="input-field col s12">
                                <i class="material-icons prefix">phone</i>
                                <input id="phone" name="phone" type="number" class="validate">
                                <label for="phone">Phone</label>
                            </div>

                            <div class="input-field col s12">
                                <i class="material-icons prefix">mode_edit</i>
                                <textarea id="message" name="message" class="materialize-textarea"></textarea>
                                <label for="message">Message</label>
                            </div>
                            
                            <button id="msgsubmitbtn" class="btn waves-effect waves-light indigo darken-4 btn-large" type="submit">
                                <span>SEND</span>
                                <i class="material-icons right">send</i>
                            </button>

                        </form>

                    </div>
                </div> <!-- /.col -->

                <div class="col s12 m4">
                    <div class="contact-sidebar">
                        <div class="m-t-30">
                            <i class="material-icons left">call</i>
                            <h6 class="uppercase">Call us Now</h6>
                            <?php if(isset($contactsettings[0]) && $contactsettings[0]['phone']): ?>
                                <h6 class="bold m-l-40"><?php echo e($contactsettings[0]['phone']); ?></h6>
                            <?php endif; ?>
                        </div>
                        <div class="m-t-30">
                            <i class="material-icons left">mail</i>
                            <h6 class="uppercase">Email Address</h6>
                            <?php if(isset($contactsettings[0]) && $contactsettings[0]['email']): ?>
                                <h6 class="bold m-l-40"><?php echo e($contactsettings[0]['email']); ?></h6>
                            <?php endif; ?>
                        </div>
                        <div class="m-t-30">
                            <i class="material-icons left">map</i>
                            <h6 class="uppercase">Address</h6>
                            <?php if(isset($contactsettings[0]) && $contactsettings[0]['address']): ?>
                                <h6 class="bold m-l-40"><?php echo $contactsettings[0]['address']; ?></h6>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $('textarea#message').characterCounter();

        $(function(){
            $(document).on('submit','#contact-us',function(e){
                e.preventDefault();

                var data = $(this).serialize();
                var url = "<?php echo e(route('contact.message')); ?>";
                var btn = $('#msgsubmitbtn');

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    beforeSend: function() {
                        $(btn).addClass('disabled');
                        $(btn).empty().append('<span>LOADING...</span><i class="material-icons right">rotate_right</i>');
                    },
                    success: function(data) {
                        if (data.message) {
                            M.toast({html: data.message, classes:'green darken-4'})
                        }
                    },
                    error: function(xhr) {
                        M.toast({html: 'ERROR: Failed to send message!', classes: 'red darken-4'})
                    },
                    complete: function() {
                        $('form#contact-us')[0].reset();
                        $(btn).removeClass('disabled');
                        $(btn).empty().append('<span>SEND</span><i class="material-icons right">send</i>');
                    },
                    dataType: 'json'
                });

            })
        })

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>