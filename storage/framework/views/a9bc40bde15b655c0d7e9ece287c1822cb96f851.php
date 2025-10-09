<style>
.footer-social-icons {
    display: inline-flex;
    align-items: center;
    gap: 10px;
}
.whatsapp-icon-container-footer {
  display: inline-block;
}

.whatsapp-icon-container-footer ul {
  margin: 0;
  padding: 0;
  display: flex;
}

.whatsapp-icon-container-footer ul li {
  list-style: none;
}

.whatsapp-icon-container-footer ul li a {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 24px;
  height: 24px;
  text-decoration: none;
  color: #ffffff;
  transition: 0.5s;
}

.whatsapp-icon-container-footer .facebook:hover {
  color: #25d366;
}


</style>
<footer class="page-footer indigo darken-2">
    <div class="container">
        <div class="row">
            <div class="col m4 s12">
                <h5 class="white-text uppercase">نبذه عنا</h5>
                <?php if(isset($footersettings[0]) && $footersettings[0]['aboutus']): ?>
                    <p class="grey-text text-lighten-4"><?php echo e($footersettings[0]['aboutus']); ?></p>
                <?php else: ?>                                                                                                                                                                                                                               
                    <p class="grey-text text-lighten-4"</p>متخصصون في إدارة الأملاك باحترافية وموثوقية تسويق وتأجير وبيع المستودعات، المصانع، والورش. خبرة ممتده </p>
                <?php endif; ?>
                <div class="whatsapp-icon-container-footer">
                    <ul>
                        <li>
                            <a class="facebook" href="https://api.whatsapp.com/send?phone=966920033948" target="_blank" style="display: flex; align-items: center;">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/WhatsApp.svg/512px-WhatsApp.svg.png" alt="WhatsApp" width="24" height="24">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col m6 s12">
                <h5 class="white-text uppercase"> </h5>
                <ul class="collection border0">

                    <?php $__currentLoopData = $footerproperties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="collection-item transparent clearfix p-0 border0">
                        <span class="card-image-bg m-r-10" style="background-image:url(<?php echo e(Storage::url('property/'.$property->image)); ?>);width:60px;height:45px;float:<?php echo e(app()->getLocale() == 'ar' ? 'right' : 'left'); ?>;"></span>
                        <div style="float:<?php echo e(app()->getLocale() == 'ar' ? 'left' : 'right'); ?>;">
                            <h5 class="font-18 m-b-0 m-t-5">
                                <a href="<?php echo e(route('property.show',$property->slug)); ?>" class="white-text"><?php echo e(str_limit($property->title,40)); ?></a>
                            </h5>
                            <p class="m-t-0 m-b-5 grey-text text-lighten-1">Bedroom: <?php echo e($property->bedroom); ?> Bathroom: <?php echo e($property->bathroom); ?> </p>
                        </div>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </ul>
            </div>
            <div class="col m2 s12">
                <h5 class="white-text uppercase">القائمة</h5>
                <ul>
                    <li class="uppercase <?php echo e(Request::is('property*') ? 'underline' : ''); ?>">
                        <a href="<?php echo e(route('property')); ?>" class="grey-text text-lighten-3">العقارات</a>
                    </li>

                    <li class="uppercase <?php echo e(Request::is('agents*') ? 'underline' : ''); ?>">
                        <a href="<?php echo e(route('agents')); ?>" class="grey-text text-lighten-3">العملاء</a>
                    </li>

                    <li class="uppercase <?php echo e(Request::is('gallery*') ? 'underline' : ''); ?>">
                        <a href="<?php echo e(route('gallery')); ?>" class="grey-text text-lighten-3">معرض الصور</a>
                    </li>

                    <li class="uppercase <?php echo e(Request::is('blog*') ? 'underline' : ''); ?>">
                        <a href="<?php echo e(route('blog')); ?>" class="grey-text text-lighten-3">المدونة </a>
                    </li>

                    <li class="uppercase <?php echo e(Request::is('contact') ? 'underline' : ''); ?>">
                        <a href="<?php echo e(route('contact')); ?>" class="grey-text text-lighten-3">تواصل معنا</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <?php if(isset($footersettings[0]) && $footersettings[0]['footer']): ?>
                <?php echo e($footersettings[0]['footer']); ?>

            <?php else: ?>
                © 2018 Developer Canvas Studio.
            <?php endif; ?>

            <div class="footer-social-icons <?php echo e(app()->getLocale() == 'ar' ? 'left' : 'right'); ?>">
                <?php if(isset($footersettings[0]) && $footersettings[0]['facebook']): ?>
                    <a class="grey-text text-lighten-4" href="<?php echo e($footersettings[0]['facebook']); ?>" target="_blank">FACEBOOK</a>
                <?php endif; ?>
                <?php if(isset($footersettings[0]) && $footersettings[0]['twitter']): ?>
                    <a class="grey-text text-lighten-4" href="<?php echo e($footersettings[0]['twitter']); ?>" target="_blank">TWITTER</a>
                <?php endif; ?>
                <?php if(isset($footersettings[0]) && $footersettings[0]['linkedin']): ?>
                    <a class="grey-text text-lighten-4" href="<?php echo e($footersettings[0]['linkedin']); ?>" target="_blank">LINKEDIN</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</footer>