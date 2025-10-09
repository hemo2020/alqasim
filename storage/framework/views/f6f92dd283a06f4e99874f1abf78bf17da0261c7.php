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
    
        <a href="<?php echo e(route('user.dashboard')); ?>">
            <li class="collection-item <?php echo e(Request::is('user/dashboard') ? 'active' : ''); ?>">
                <i class="material-icons left">dashboard</i>
                <span>Dashboard<span>
            </li>
        </a>
    
        <a href="<?php echo e(route('user.profile')); ?>">
            <li class="collection-item <?php echo e(Request::is('user/profile') ? 'active' : ''); ?>">
                <i class="material-icons left">person</i>
                <span>Profile</span>
            </li>
        </a>
        <a href="<?php echo e(route('user.message')); ?>">
            <li class="collection-item <?php echo e(Request::is('user/message*') ? 'active' : ''); ?>">
                <i class="material-icons left">mail</i>
                <span>Messages</span>
            </li>
        </a>
        <a href="<?php echo e(route('user.changepassword')); ?>">
            <li class="collection-item <?php echo e(Request::is('user/changepassword') ? 'active' : ''); ?>">
                <i class="material-icons left">lock</i>
                <span>Change Password</span>
            </li>
        </a>
    
    </ul>