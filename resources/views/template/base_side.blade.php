{{-- template/base.blade.phpを親レイアウトとして継承 --}}
@extends('template.master')

@section('container')
    <div class="container-fluid pt-3" id="page-content">
        <div class="row flex-xl-nowrap">
            <div class="col-12 col-sm-3 col-xl-2 bd-sidebar">
                @yield('sidebar')
            </div>
            <div class="content col-12 col-sm-9 col-xl-8 bd-content" role="main">
                @yield('content')
            </div>
        </div>
    </div>
@endsection