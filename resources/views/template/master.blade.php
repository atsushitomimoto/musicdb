<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @if (View::hasSection('title'))
            @yield('title') |
        @endif
        musicdb
    </title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Font Awesome5 -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

    <!-- CSS -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/sticky-footer.css')}}" rel="stylesheet" type="text/css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="{{asset('js/ex01.js')}}"></script>
    <!-- なんやろ -->
    {{-- <link rel="stylesheet" href="{{ mix('/css/app.css') }}"> --}}
</head>
<body class="d-flex flex-column" style="padding-top:3.5rem;">
    <div id="app">
        {{-- ナビゲーションバー --}}
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top py-0 outline-none">
            <a href="{{url('')}}" class="navbar-brand flex-nowrap px-3 mr-2 d-none d-sm-block">musicdb</a>
            <form class="form-inline mr-auto w-100 pr-3 navbar-Search-Width" action="{{url('/search')}}" method="get">
                <div class="input-group w-100">
                    <input class="form-control maxwidth-300px" type="text" name="keyword" placeholder="検索" value="{{$keyword ?? ''}}">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-secondary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <button class="navbar-toggler my-2" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-grow-0 text-nowrap" id="navbarSupportedContent">
                @if(Auth::check())
                {{-- ログイン時 --}}
                <ul class="navbar-nav">
                    <li class="nav-item active d-sm-none">
                        <a class="nav-link" href="{{url('/')}}"><i class="fas fa-home fa-fw"></i>トップページ</a>
                    </li>
                    <li class="nav-item active d-sm-none">
                        <a class="nav-link" href="{{url('/profile')}}"><i class="fas fa-user fa-fw"></i>プロフィール</a>
                    </li>
                    <li class="nav-item active d-sm-none">
                        <a class="nav-link" href="{{url('#')}}"><i class="fas fa-cog fa-fw"></i>設定</a>
                    </li>
                    <li class="nav-item active d-sm-none">
                        <a class="nav-link" href="{{url('/logout')}}"><i class="fas fa-sign-out-alt fa-fw"></i>ログアウト</a>
                    </li>
                    <li class="nav-item dropdown d-none d-sm-block">
                        <a class="nav-link dropdown-toggle px-3 py-3 active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right border-0 rounded-0 mt-0 py-0 shadow" aria-labelledby="navbarDropdown" style="top: 2.875rem; padding-top: 0px;">
                        <a class="dropdown-item text-white" href="{{url('/profile')}}"><i class="fas fa-user fa-fw"></i>プロフィール</a>
                        <a class="dropdown-item text-white" href="{{url('/setting')}}"><i class="fas fa-cog fa-fw"></i>設定</a>
                        <a class="dropdown-item text-white" href="{{url('/logout')}}"><i class="fas fa-sign-out-alt fa-fw"></i>ログアウト</a>
                        </div>
                    </li>
                </ul>
                @else
                {{-- ゲスト時 --}}
                <ul class="navbar-nav">
                    <li class="nav-item active d-sm-none">
                        <a class="nav-link" href="{{url('/')}}"><i class="fas fa-home fa-fw"></i>トップページ</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('/login')}}"><i class="fas fa-sign-in-alt fa-fw"></i>ログイン</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('/register')}}"><i class="fas fa-plus fa-fw"></i>登録</a>
                    </li>
                </ul>
                @endif
            </div>
        </nav>
        {{-- アラート --}}
        @if(session('alert_danger'))
            @component('components.alert')
            @slot('style')
                danger
            @endslot
            @slot('icon')
                <i class="fas fa-exclamation-triangle"></i>
            @endslot
            @slot('text')
                {{ session('alert_danger') }}
            @endslot
            @endcomponent
        @endif
        @if(session('alert_success'))
            @component('components.alert')
            @slot('style')
                success
            @endslot
            @slot('icon')
                <i class="fas fa-check-circle"></i>
            @endslot
            @slot('text')
                {{ session('alert_success') }}
            @endslot
            @endcomponent
        @endif
        @if(session('alert_info'))
            @component('components.alert')
            @slot('style')
                info
            @endslot
            @slot('icon')
                <i class="fas fa-info-circle"></i>
            @endslot
            @slot('text')
                {{ session('alert_info') }}
            @endslot
            @endcomponent
        @endif
        @if(session('alert_warning'))
            @component('components.alert')
            @slot('style')
                warning
            @endslot
            @slot('icon')
                <i class="fas fa-exclamation-triangle"></i>
            @endslot
            @slot('text')
                {{ session('alert_warning') }}
            @endslot
            @endcomponent
        @endif
        {{-- コンテンツ --}}
        @yield('container')
        {{-- フッター --}}
        <footer class="footer">
            <div class="container text-center">
                <span class="text-muted">© 2019-2020 Anthurium Schulz</span>
            </div>
        </footer>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
        {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script> --}}
        <!-- Vue.js -->
        <script src="{{ mix('js/app.js') }}"></script>
    </div>
</body>
</html>