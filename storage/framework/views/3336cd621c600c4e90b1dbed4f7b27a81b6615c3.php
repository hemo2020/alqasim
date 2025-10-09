<ul class="collection with-header">

    <li class="collection-header center">
        <div class="m-t-10">
            <img src="<?php echo e(Storage::url('users/'.auth()->user()->image)); ?>" alt="<?php echo e(auth()->user()->name); ?>" class="circle responsive-img">
        </div>
        <h5 class="truncate">
            <?php echo e(auth()->user()->name); ?>

        </h5>
        <h6 class="m-t-0"><small><?php echo e(auth()->user()->email); ?></small></h6>
    </li>

    <a href="<?php echo e(route('agent.dashboard')); ?>">
        <li class="collection-item <?php echo e(Request::is('agent/dashboard') ? 'active' : ''); ?>">
            <i class="material-icons left">dashboard</i>
            <span>Dashboard<span>
        </li>
    </a>

    <a href="<?php echo e(route('agent.profile')); ?>">
        <li class="collection-item <?php echo e(Request::is('agent/profile') ? 'active' : ''); ?>">
            <i class="material-icons left">person</i>
            <span>Profile</span>
        </li>
    </a>
    <a href="<?php echo e(route('agent.message')); ?>">
        <li class="collection-item <?php echo e(Request::is('agent/message*') ? 'active' : ''); ?>">
            <i class="material-icons left">mail</i>
            <span>Messages</span>
        </li>
    </a>

    <a href="<?php echo e(route('agent.properties.index')); ?>">
        <li class="collection-item <?php echo e(Request::is('agent/properties') ? 'active' : ''); ?>">
            <i class="material-icons left">view_list</i>
            <span>Properties<span>
        </li>
    </a>
    <a href="<?php echo e(route('agent.properties.create')); ?>">
        <li class="collection-item <?php echo e(Request::is('agent/properties/create') ? 'active' : ''); ?>">
            <i class="material-icons left">create</i>
            <span>Create Property<span>
        </li>
    </a>
    <a href="<?php echo e(route('agent.changepassword')); ?>">
        <li class="collection-item <?php echo e(Request::is('agent/changepassword') ? 'active' : ''); ?>">
            <i class="material-icons left">lock</i>
            <span>Change Password</span>
        </li>
    </a>
</ul>