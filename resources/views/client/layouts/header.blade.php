<div class="row" id="header">
    <div class="container">
        <div class="col-lg-1">
            <a href="">
                <img src="{{ asset('/image/' . 'logo.png') }}">
            </a>
        </div>
        <div class="col-lg-1" id="menu">
            <span>{{ trans('message.client.category.document') }}</span> <i class="fas fa-chevron-down"></i>
            <ul style="padding-left: 0px">
                @foreach ($listCategory as $category)
                    <a href="{{ route('client.category', ['unsigned_name' => $category->unsigned_name, 'id' => $category->id]) }}">
                        <li>» {{ $category->name }}</li>
                    </a>
                @endforeach
            </ul>
        </div>
        <div class="col-lg-6" style="position: relative; padding: 0px">
            <input type="text" class="search" placeholder="Tìm kiếm tại đây ..." name="">
            <div class="result"></div>
        </div>
        <div class="col-lg-4">
            @guest
                <a href="{{ route('login') }}">{{ trans('message.login.name')}}</a> <span style="color: #fff">|</span> <a href="{{ route('register') }}">{{ trans('message.register.name')}}</a>
            @else
                <span style="color: #fff; font-weight: bold;">{{ trans('message.client.header.balance') }}: {{ number_format(Auth::user()->balance) }}<sup>đ </sup> | </span>
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
