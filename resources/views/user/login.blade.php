@extends('template.base')

@section('title','ログイン') 

{{-- コンテンツ --}}
@section('content')
<h1>Login</h1>
<form action="{{ route('user.login') }}" method="post" class="form-horizontal mt-4">
    @csrf
    <div class="form-group @if($errors->has('email')) has-error @endif">
        <label for="email" class="col-md-3 control-label">メールアドレス</label>
        <div class="col-sm-9">
            <input type="email" class="form-control @if($errors->has('email')) is-invalid @endif" id="email" name="email" value="{{old('email')}}">
            <div class="invalid-feedback">
                @foreach ($errors->get('email') as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        </div>
    </div>

    <div class="form-group @if($errors->has('password')) has-error @endif">
        <label for="password" class="col-md-3 control-label">パスワード</label>
        <div class="col-sm-9">
            <input type="password" class="form-control @if($errors->has('password')) is-invalid @endif" id="password" name="password">
            <div class="invalid-feedback">
                @foreach ($errors->get('password') as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        </div>
    </div>        
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
            <button type="submit" class="btn btn-primary btn-block">ログイン</button>
        </div>
    </div>
</form>
@endsection