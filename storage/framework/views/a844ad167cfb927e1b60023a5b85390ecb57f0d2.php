<style>
.whatsapp-icon-container ul {
  margin: 0;
  padding: 0;
  display: flex;
}
.whatsapp-icon-container ul li {
  list-style: none;
  display: flex;
  align-items: center;
  height: 64px;
}
.whatsapp-icon-container ul li a {
  display: block;
  position: relative;
  width: 48px;
  height: 48px;
  line-height: 48px;
  font-size: 28px;
  text-align: center;
  text-decoration: none;
  color: #ffffff;
  margin: 0;
  transition: 0.5s;
}
.whatsapp-icon-container ul li a span {
  position: absolute;
  transition: transform 0.5s;
}
.whatsapp-icon-container ul li a span:nth-child(1),
.whatsapp-icon-container ul li a span:nth-child(3) {
  width: 100%;
  height: 2px;
  background: #ffffff;
}
.whatsapp-icon-container ul li a span:nth-child(1) {
  top: 0;
  left: 0;
  transform-origin: right;
}
.whatsapp-icon-container ul li a:hover span:nth-child(1) {
  transform: scaleX(0);
  transform-origin: left;
  transition: transform 0.5s;
}

.whatsapp-icon-container ul li a span:nth-child(3) {
  bottom: 0;
  left: 0;
  transform-origin: left;
}
.whatsapp-icon-container ul li a:hover span:nth-child(3) {
  transform: scaleX(0);
  transform-origin: right;
  transition: transform 0.5s;
}

.whatsapp-icon-container ul li a span:nth-child(2),
.whatsapp-icon-container ul li a span:nth-child(4) {
  width: 2px;
  height: 100%;
  background: #ffffff;
}
.whatsapp-icon-container ul li a span:nth-child(2) {
  top: 0;
  left: 0;
  transform: scale(0);
  transform-origin: bottom;
}
.whatsapp-icon-container ul li a:hover span:nth-child(2) {
  transform: scale(1);
  transform-origin: top;
  transition: transform 0.5s;
}
.whatsapp-icon-container ul li a span:nth-child(4) {
  top: 0;
  right: 0;
  transform: scale(0);
  transform-origin: top;
}
.whatsapp-icon-container ul li a:hover span:nth-child(4) {
  transform: scale(1);
  transform-origin: bottom;
  transition: transform 0.5s;
}

.whatsapp-icon-container .whatsapp:hover {
  color: #25d366;
}
.whatsapp-icon-container .whatsapp:hover span {
  background: #25d366;
}
</style>
<div class="navbar-fixed">
    <nav class="indigo darken-4" style="background-color: #404040 !important;">
        <div class="container">
            <div class="nav-wrapper nav-flex-wrapper <?php if(Request::is('/')): ?> homepage-logo-right <?php endif; ?>">
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <!--<a href="<?php echo e(route('home')); ?>" class="brand-logo">
                    <?php if(isset($navbarsettings[0]) && $navbarsettings[0]['name']): ?>
                        <?php echo e($navbarsettings[0]['name']); ?>

                    <?php else: ?>
                       القاسم العقارية 
                    <?php endif; ?>
                    <i class="material-icons left">location_city</i>
                </a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger">
                    <i class="material-icons">القائمة</i>
               </a>
-->

<a href="<?php echo e(route('home')); ?>" class="brand-logo right" style="display: flex; align-items: center; gap: 10px;">
    <span style="font-size: 1.6rem; white-space: nowrap; font-weight: 800; word-break: break-word; max-width: 100%; display: inline-block; line-height: 1;">
        <?php if(isset($navbarsettings[0]) && $navbarsettings[0]['name']): ?>
            <?php echo e($navbarsettings[0]['name']); ?>

        <?php else: ?>
            القاسم العقارية
        <?php endif; ?>
    </span>
    <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Company logo" class="custom-logo-img" style="height: 48px; width: auto; max-width: 100%; flex-shrink: 0;">
</a>
                <ul class="hide-on-med-and-down">
                    <li class="whatsapp-icon-container">
                        <ul>
                            <li>
                                <a class="whatsapp" href="https://api.whatsapp.com/send?phone=966920033948" target="_blank">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <svg
                                    viewBox="0 0 16 16"
                                    class="bi bi-whatsapp"
                                    fill="currentColor"
                                    height="28"
                                    width="28"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                    d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"
                                    ></path>
                                </svg>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?php echo e(Request::is('contact') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('contact')); ?>" style="font-size: 1.3rem; font-weight: bold;">اتصل بنا</a>
                    </li>

                    <li class="<?php echo e(Request::is('blog*') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('blog')); ?>" style="font-size: 1.3rem; font-weight: bold;">المدونة</a>
                    </li>

                    <li class="<?php echo e(Request::is('agents*') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('agents')); ?>" style="font-size: 1.3rem; font-weight: bold;">العملاء</a>
                    </li>

                    <li class="<?php echo e(Request::is('gallery') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('gallery')); ?>" style="font-size: 1.3rem; font-weight: bold;">معرض الصور</a>
                    </li>

                    <li class="<?php echo e(Request::is('property*') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('property')); ?>" style="font-size: 1.3rem; font-weight: bold;">العقارات</a>
                    </li>

                    <li class="<?php echo e(Request::is('/') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('home')); ?>" style="font-size: 1.3rem; font-weight: bold;">الرئيسية</a>
                    </li>
                    <?php if(auth()->guard()->guest()): ?>
                        <li><a href="<?php echo e(route('login')); ?>"><i class="material-icons">input</i></a></li>
                        <li><a href="<?php echo e(route('register')); ?>"><i class="material-icons">person_add</i></a></li>
                    <?php else: ?>
                        <li>
                            <a class="dropdown-trigger" href="#!" data-target="dropdown-auth-frontend">
                                <?php echo e(ucfirst(Auth::user()->username)); ?>

                                <i class="material-icons right">arrow_drop_down</i>
                            </a>
                        </li>

                        <ul id="dropdown-auth-frontend" class="dropdown-content">
                            <li>
                                <?php if(Auth::user()->role->id == 1): ?>
                                    <a href="<?php echo e(route('admin.dashboard')); ?>" class="indigo-text">
                                        <i class="material-icons">person</i>Profile
                                    </a>
                                <?php elseif(Auth::user()->role->id == 2): ?>
                                    <a href="<?php echo e(route('agent.dashboard')); ?>" class="indigo-text">
                                        <i class="material-icons">person</i>Profile
                                    </a>
                                <?php elseif(Auth::user()->role->id == 3): ?>
                                    <a href="<?php echo e(route('user.dashboard')); ?>" class="indigo-text">
                                        <i class="material-icons">person</i>Profile
                                    </a>
                                <?php endif; ?>
                            </li>
                            <li>
                                <a class="dropdownitem indigo-text" href="<?php echo e(route('logout')); ?>"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <i class="material-icons">power_settings_new</i><?php echo e(__('Logout')); ?>

                                </a>

                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </li>
                        </ul>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    
    <ul class="sidenav" id="mobile-demo">
        <li class="<?php echo e(Request::is('/') ? 'active' : ''); ?>">
            <a href="<?php echo e(route('home')); ?>">الرئيسية</a>
        </li>

        <li class="<?php echo e(Request::is('property*') ? 'active' : ''); ?>">
            <a href="<?php echo e(route('property')); ?>">العقارات</a>
        </li>

        <li class="<?php echo e(Request::is('gallery') ? 'active' : ''); ?>">
            <a href="<?php echo e(route('gallery')); ?>">معرض الصور</a>
        </li>

        <li class="<?php echo e(Request::is('agents*') ? 'active' : ''); ?>">
            <a href="<?php echo e(route('agents')); ?>">الوكلاء</a>
        </li>

        <li class="<?php echo e(Request::is('blog*') ? 'active' : ''); ?>">
            <a href="<?php echo e(route('blog')); ?>">المدونة</a>
        </li>

        <li class="<?php echo e(Request::is('contact') ? 'active' : ''); ?>">
            <a href="<?php echo e(route('contact')); ?>">اتصل بنا</a>
        </li>
        <li>
            <a href="https://api.whatsapp.com/send?phone=966920033948" target="_blank">واتساب</a>
        </li>
        <?php if(auth()->guard()->guest()): ?>
            <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
            <li><a href="<?php echo e(route('register')); ?>">Register</a></li>
        <?php else: ?>
            <li>
                <?php if(Auth::user()->role->id == 1): ?>
                    <a href="<?php echo e(route('admin.dashboard')); ?>">Profile</a>
                <?php elseif(Auth::user()->role->id == 2): ?>
                    <a href="<?php echo e(route('agent.dashboard')); ?>">Profile</a>
                <?php elseif(Auth::user()->role->id == 3): ?>
                    <a href="<?php echo e(route('user.dashboard')); ?>">Profile</a>
                <?php endif; ?>
            </li>
            <li>
                <a href="<?php echo e(route('logout')); ?>"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form-mobile').submit();">
                    Logout
                </a>

                <form id="logout-form-mobile" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                    <?php echo csrf_field(); ?>
                </form>
            </li>
        <?php endif; ?>
    </ul>

</div>