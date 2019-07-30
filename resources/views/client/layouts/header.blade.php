<div class="row" id="header">
    <div class="container">
        <div class="col-lg-1">
            <a href="">
                <img src="image/logo.png">
            </a>
                    
        </div>
        <div class="col-lg-1" id="menu">
            <span>Tài liệu</span> <i class="fas fa-chevron-down"></i>
            <ul style="padding-left: 0px">
                <a href="">
                    <li>» Tiểu học</li>
                </a>
                <a href="">
                    <li>» Trung học cơ sở</li>
                </a>
                <a href="">
                    <li>» Trung học phổ thông</li>
                </a>
            </ul>
        </div>
        <div class="col-lg-7">
            <input type="text" placeholder="Tìm kiếm tại đây ..." name="">
        </div>
        <div class="col-lg-3">
            @guest
                <a href="{{ route('login') }}">{{ trans('message.login.name')}}</a> <span style="color: #fff">|</span> <a href="{{ route('register') }}">{{ trans('message.register.name')}}</a>
            @else
                <a>{{Auth::user()->name }}</a> 
                <span style="color: #fff">|</span> 
                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ trans('message.logout')}}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            @endguest
        </div>
        
    </div>
</div>