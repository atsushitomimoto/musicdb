@extends('template.master')

@section('container')
    <div class="container pt-3" id="page-content">
        <div class="content" role="main">
            @yield('content')
        </div>
    </div>
@endsection