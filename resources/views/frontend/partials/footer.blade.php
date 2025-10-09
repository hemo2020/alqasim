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
                @if(isset($footersettings[0]) && $footersettings[0]['aboutus'])
                    <p class="grey-text text-lighten-4">{{ $footersettings[0]['aboutus'] }}</p>
                @else                                                                                                                                                                                                                               
                    <p class="grey-text text-lighten-4"</p>متخصصون في إدارة الأملاك باحترافية وموثوقية تسويق وتأجير وبيع المستودعات، المصانع، والورش. خبرة ممتده </p>
                @endif
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

                    

                </ul>
            </div>
            <div class="col m2 s12">
                <h5 class="white-text uppercase">القائمة</h5>
                <ul>
                    <li class="uppercase {{ Request::is('property*') ? 'underline' : '' }}">
                        <a href="{{ route('property') }}" class="grey-text text-lighten-3">العقارات</a>
                    </li>

                    <li class="uppercase {{ Request::is('agents*') ? 'underline' : '' }}">
                        <a href="{{ route('agents') }}" class="grey-text text-lighten-3">العملاء</a>
                    </li>

                    <li class="uppercase {{ Request::is('gallery*') ? 'underline' : '' }}">
                        <a href="{{ route('gallery') }}" class="grey-text text-lighten-3">معرض الصور</a>
                    </li>

                    <li class="uppercase {{ Request::is('blog*') ? 'underline' : '' }}">
                        <a href="{{ route('blog') }}" class="grey-text text-lighten-3">المدونة </a>
                    </li>

                    <li class="uppercase {{ Request::is('contact') ? 'underline' : '' }}">
                        <a href="{{ route('contact') }}" class="grey-text text-lighten-3">تواصل معنا</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            @if(isset($footersettings[0]) && $footersettings[0]['footer'])
                {{ $footersettings[0]['footer'] }}
            @else
                © 2018 Developer Canvas Studio.
            @endif

            <div class="footer-social-icons {{ app()->getLocale() == 'ar' ? 'left' : 'right' }}">
                @if(isset($footersettings[0]) && $footersettings[0]['facebook'])
                    <a class="grey-text text-lighten-4" href="{{ $footersettings[0]['facebook'] }}" target="_blank">FACEBOOK</a>
                @endif
                @if(isset($footersettings[0]) && $footersettings[0]['twitter'])
                    <a class="grey-text text-lighten-4" href="{{ $footersettings[0]['twitter'] }}" target="_blank">TWITTER</a>
                @endif
                @if(isset($footersettings[0]) && $footersettings[0]['linkedin'])
                    <a class="grey-text text-lighten-4" href="{{ $footersettings[0]['linkedin'] }}" target="_blank">LINKEDIN</a>
                @endif
            </div>
        </div>
    </div>
</footer>