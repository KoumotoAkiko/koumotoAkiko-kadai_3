<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PiGLy</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')

    <style>
    svg.w-5.h-5{
        /*paginateの矢印の大きさ調整*/
        width:30px;
        height:30px;
    }
</style>

</head>


<body>
<div class="app">
    <header class="header">
        <h2 class="header__headind"> PiGLy</h2>
        <nav class="header-nav">
            <ul class="nav-list">
                <li class="nav-item">
                    <button onclick="location.href='{{route('weight_target.edit')}}'" class="nav-link set-btn">
                        <img src="{{asset('images/gear.svg')}}" alt="歯車" class="icon">
                        目標体重設定
                    </button>
                </li>
                <li  class="nav-item">
                    <form action="/logout" method="post">
                        @csrf
                        <button class="nav-link logout-btn" type="submit">
                            <img src="{{asset('images/logoutdoor.svg')}}" alt="ドア" class="icon">
                            ログアウト
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
    </header>
    <div class="content">
        @yield('content')
    </div>
</div>
</body>
</html>