@extends('template.base')

@if($item->artist)
    @section('title','Releaseの削除: '.$item->title.' - '.$item->artist)
@else
    @section('title','Releaseの削除: '.$item->title)
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
        Releaseの削除:
    @endslot
@endcomponent

<p>{{$item->title}}{{$msg ?? ''}}</p>

{{-- 入力フォーム --}}
<table class="table" style="width: auto !important;">
    <form action="delete" method="post" enctype="multipart/form-data">
        @csrf
        @method('delete')
        <input type="hidden" name="id" value="{{$item->id}}">
        <input type="hidden" name="title" value="{{$item->title}}">     {{-- 削除タイトル送信用 --}}
        <input type="hidden" name="image" value="{{$item->image}}">
        <tbody>
            <tr><th scope="row">id</th><td>{{$item->id}}</td></tr>
            <tr><th scope="row">form</th><td>{{$item->title}}</td></tr>
            <tr><th scope="row">artist</th><td>{{$item->artist}}</td></tr>
            <tr><th scope="row">image</th><td>
                @if(isset($item->image))
                    {{-- 画像の表示 --}}
                    <div class="centering-outer size-150px border shadow-sm">
                        <a href="release?id={{$item->id}}" class="link-expantion" title="{{$item->title}}">
                            <img class="card-img-top rounded-0 size-auto centering-inner maxsize-150px" src="{{URL::asset($item->image)}}" alt="{{$item->title}}" decoding="async">
                        </a>
                    </div>
                @else
                    {{-- 画像がない場合 --}}
                    <div class="centering-outer size-150px border shadow-sm noimage">
                        <a href="release?id={{$item->id}}" class="link-expantion" title="{{$item->title}}"></a>
                        <i class="centering-inner fas fa-compact-disc"></i>
                    </div>
                @endif
            </td></tr>
            <td><button type="submit" class="btn btn-danger">削除</button></td>
            <td></td>
        </tbody>
    </form>
</table>

@endsection