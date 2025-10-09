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

                    <h4 class="agent-title">REPLAY MESSAGES</h4>
                    
                    <div class="agent-content">
                        <?php if($message->user_id): ?>
                            <form action="<?php echo e(route('agent.message.send')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="agent_id" value="<?php echo e($message->user_id); ?>">
                                <input type="hidden" name="user_id" value="<?php echo e(auth()->id()); ?>">
                                <input type="hidden" name="name" value="<?php echo e(auth()->user()->name); ?>">
                                <input type="hidden" name="email" value="<?php echo e(auth()->user()->email); ?>">

                                <div class="row">
                                    <div class="input-field col s6">
                                        <i class="material-icons prefix">email</i>
                                        <input id="email" type="email" value="<?php echo e($message->email); ?>" class="validate" readonly>
                                        <label for="email">TO</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <i class="material-icons prefix">phone</i>
                                        <input id="phone" name="phone" type="number" class="validate">
                                        <label for="phone">Phone</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">mode_edit</i>
                                        <textarea id="message" name="message" class="materialize-textarea"></textarea>
                                        <label for="message">Message</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <button class="btn waves-effect waves-light btn-small indigo darken-4 right" type="submit">
                                        <span>SEND</span>
                                        <i class="material-icons right">send</i>
                                    </button>
                                </div>
                            </form>
                        <?php else: ?> 
                            <form action="<?php echo e(route('agent.message.mail')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="name" value="<?php echo e($message->name); ?>">
                                <input type="hidden" name="mailfrom" value="<?php echo e(auth()->user()->email); ?>">

                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">email</i>
                                        <input id="email" name="email" type="email" value="<?php echo e($message->email); ?>" class="validate" readonly>
                                        <label for="email">TO</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">subject</i>
                                        <input id="subject" name="subject" type="text" class="validate">
                                        <label for="subject">Subject</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">mode_edit</i>
                                        <textarea id="message" name="message" class="materialize-textarea"></textarea>
                                        <label for="message">Message</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <button class="btn waves-effect waves-light btn-small indigo darken-4 right" type="submit">
                                        <span>SEND</span>
                                        <i class="material-icons right">send</i>
                                    </button>
                                </div>
                            </form>
                        <?php endif; ?>

                    </div>
                </div>

            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    $(document).ready(function() {
        $('textarea#message').characterCounter();
        $('textarea#message-mail').characterCounter();
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>