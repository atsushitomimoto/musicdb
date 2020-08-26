@extends('template.base')

@section('title','Releaseの新規登録')

{{-- コンテンツ --}}
@section('content')
<h1>Releaseの新規登録</h1>
<p>{{$msg ?? ''}}</p>

{{-- バリデーションのエラーメッセージ --}}
@if (count($errors) > 0)
    <div class="alert alert-primary alert-danger" role="alert">
        <strong>エラー</strong> - 入力に問題があります。再入力して下さい。
    </div>
@endif

{{-- 入力フォーム --}}
<form action="/release/add" method="post" enctype="multipart/form-data" class="form-horizontal">
    @csrf
    <div class="form-group @if($errors->has('title')) has-error @endif">
        <label for="title" class="col-md-3 control-label">タイトル</label>
        <div class="col-sm-5">
            <input type="text" class="form-control @if($errors->has('title')) is-invalid @endif" id="title" name="title" value="{{old('title')}}">
            <div class="invalid-feedback">
                @foreach ($errors->get('title') as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        </div>
    </div>
    <div class="form-group @if($errors->has('artist')) has-error @endif">
        <label for="artist" class="col-md-3 control-label">アーティスト</label>
        <div class="col-sm-5">
            <input type="text" class="form-control @if($errors->has('artist')) is-invalid @endif" id="artist" name="artist" value="{{old('artist')}}">
            <div class="invalid-feedback">
                    @foreach ($errors->get('artist') as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
        </div>
    </div>
    <div class="form-group @if($errors->has('image')) has-error @endif">
        <label for="image" class="col-md-3 control-label">画像</label>
        <div class="col-sm-5">
            <input type="file" class="form-control-file @if($errors->has('image')) is-invalid @endif" accept=".jpg,.png" id="image" name="image">
            <div class="invalid-feedback">
                    @foreach ($errors->get('image') as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success">送信する</button>     {{-- TODO:複数回クリックの対策を考える --}}
</form>

@endsection