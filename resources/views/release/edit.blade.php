@extends('template.base')

@if($item->artist)
    @section('title','Releaseの編集: '.$item->title.' - '.$item->artist)
@else
    @section('title','Releaseの編集: '.$item->title)
@endif

{{-- コンテンツ --}}
@section('content')

@component('components.release_name')
    @slot('id')
        {{$item->id}}
    @endslot
    @slot('title')
        {{$item->title}}
    @endslot
    @slot('artist')
        {{$item->artist}}
    @endslot
    @slot('text')
        Releaseの編集:
    @endslot
@endcomponent

<p>{{$msg ?? ''}}</p>

{{-- バリデーションのエラーメッセージ --}}
@if (count($errors) > 0)
    <div class="alert alert-primary alert-danger" role="alert">
        <strong>エラー</strong> - 入力に問題があります。再入力して下さい。
    </div>
@endif

{{-- 入力フォーム --}}
<form action="edit" method="post" enctype="multipart/form-data" class="form-horizontal">
    @csrf
    @method('patch')
    <input type="hidden" name="id" value="{{$item->id}}">
    <div class="form-group @if($errors->has('title')) has-error @endif">
        <label for="title" class="col-md-3 control-label">タイトル</label>
        <div class="col-sm-5">
            <input type="text" class="form-control @if($errors->has('title')) is-invalid @endif" id="title" name="title" value="{{old('title',$item->title)}}">
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
            <input type="text" class="form-control @if($errors->has('artist')) is-invalid @endif" id="artist" name="artist" value="{{old('artist',$item->artist)}}">
            <div class="invalid-feedback">
                    @foreach ($errors->get('artist') as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
        </div>
    </div>
    <div class="form-group @if($errors->has('image')) has-error @endif">
        <label for="image" class="col-md-3 control-label">画像</label>
        <div class="ml-3 mb-3">
        @if(isset($item->image))
            {{-- 画像の表示 --}}
            <div class="centering-outer size-150px border shadow-sm">
                <img class="card-img-top rounded-0 size-auto centering-inner maxsize-150px" src="{{URL::asset($item->image)}}" alt="{{$item->title}}" decoding="async">
            </div>
        @else
            {{-- 画像がない場合 --}}
            {{-- <div class="centering-outer size-150px border shadow-sm noimage">
                <i class="centering-inner fas fa-compact-disc"></i>
            </div> --}}
        @endif
        </div>
        <div class="col-sm-5 mb-4">
            <input type="file" class="form-control-file @if($errors->has('image')) is-invalid @endif" accept=".jpg,.png" id="image" name="image" value="{{old('image',$item->image)}}">
            <div class="invalid-feedback">
                @foreach ($errors->get('image') as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
            @if(isset($item->image))
                {{-- 画像の削除 --}}
                <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" value="1" id="defaultCheck1" name="image_delete">
                    <label class="form-check-label" for="defaultCheck1">
                        画像を削除
                    </label>
                </div>
            @endif
        </div>
        <button type="button" @click="addItem">テスト</button>
        {{-- <table id="positions" class="table">
            <tr></tr>
        </table>
        <button type="button" id="add_form" class="btn btn-success mb-4 ml-3">フォームの追加</button>  --}}
        <button type="submit" class="btn btn-success mb-4 ml-3">送信する</button>     {{-- TODO:複数回クリックの対策を考える --}}
    </div>
</form>

@endsection