@extends('template.base')

@section('title','サインアップ') 

{{-- コンテンツ --}}
@section('content')
<h1>Register</h1>
<form action="{{ route('user.register')}}" method="post" class="form-horizontal mt-4">
    @csrf
    <div class="form-group @if($errors->has('name')) has-error @endif">
        <label for="name" class="col-md-3 control-label">ユーザーネーム</label>
        <div class="col-sm-9">
            <input type="text" class="form-control @if($errors->has('name')) is-invalid @endif" id="name" name="name" value="{{old('name')}}">
            <div class="invalid-feedback">
                @foreach ($errors->get('name') as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        </div>
    </div>

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

    <div class="form-group @if($errors->has('password_confirmation')) has-error @endif">
        <label for="password_confirmation" class="col-md-3 control-label">パスワードの確認</label>
        <div class="col-sm-9">
            <input type="password" class="form-control @if($errors->has('password_confirmation')) is-invalid @endif" id="password_confirmation" name="password_confirmation">
            <div class="invalid-feedback">
                @foreach ($errors->get('password_confirmation') as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
            <button type="submit" class="btn btn-primary btn-block">新規登録</button>
        </div>
    </div>
</form>
@endsection