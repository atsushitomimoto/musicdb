@extends('template.base')

@if($item->artist)
    @section('title',$item->title.' - '.$item->artist)
@else
    @section('title',$item->title)
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
@endcomponent

<p>{{$msg ?? ''}}</p>

@if (session('msg'))
    <p>{{ session('msg') }}</p>
@endif

<table class="table" style="width: auto !important;">
    <tbody>
        <tr><th scope="row">id</th><td>{{$item->id}}</td></tr>
        <tr><th scope="row">title</th><td>{{$item->title}}</td></tr>
        <tr><th scope="row">artist</th><td>{{$item->artist}}</td></tr>
        <tr><th scope="row">image</th><td>
            @if(isset($item->image))
                {{-- 画像の表示 --}}
                <div class="centering-outer size-150px border shadow-sm">
                    <img class="card-img-top rounded-0 size-auto centering-inner maxsize-150px" src="{{URL::asset($item->image)}}" alt="{{$item->title}}" decoding="async">
                </div>
            @else
                {{-- 画像がない場合 --}}
                <div class="centering-outer size-150px border shadow-sm noimage">
                    <i class="centering-inner fas fa-compact-disc"></i>
                </div>
            @endif
        </td></tr>
        <td><a href="{{$item->id}}/edit"><button class="btn btn-primary">編集</button></a></td>
        <td><a href="{{$item->id}}/delete"><button class="btn btn-danger">削除</button></a></td>
    </tbody>
</table>

@if ($show_positions)
<table class="table table-sm" style="width: auto !important;">
    <thead>
        <tr>
            <th scope="row" class="text-center">#</th>
            <th class="pr-4">タイトル</th>
            @if ($show_artist)
                <th>アーティスト</th>
            @endif
            @if ($show_length)
                <th class="text-right">長さ</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($positions as $position)
            <tr>
                @switch($position->type)
                    @case('track')
                        <td scope="row" class="text-center">{{$position->position}}</td>
                        <td class="pr-4">
                            @if ($position->subtitle)
                                {{$position->title}}<small class="text-muted pl-1">{{$position->subtitle}}</small>
                            @else
                                {{$position->title}}
                            @endif
                        </td>
                        @if ($show_artist)
                            <td>{{$position->artist}}</td>
                        @endif
                        @if ($show_length)
                            <td class="text-right">{{$position->length}}</td>
                        @endif
                    @break
                    @case('head')
                        <td></td>
                        <th class="" scope="row" colspan="3">
                            @if ($position->subtitle)
                                <span>{{$position->title}}<span class="font-weight-normal pl-2">{{$position->subtitle}}</span></span>
                            @else
                                <span>{{$position->title}}</span>
                            @endif
                        </th>
                    @break
                    @case('index')
                        <td scope="row" class="text-center">{{$position->position}}</td>
                        <td class="pr-4">
                            @if ($position->subtitle)
                                <span>{{$position->title}}<small class="text-muted pl-1">{{$position->subtitle}}</small></span>
                            @else
                                <span>{{$position->title}}</span>
                            @endif
                        </td>
                        @if ($show_artist)
                            <td>{{$position->artist}}</td>
                        @endif
                        @if ($show_length)
                            <td class="text-right">{{$position->length}}</td>
                        @endif
                    @break
                    @case('subtrack')
                        <td scope="row" class="text-center">{{$position->position}}</td>
                        <td class="pr-4"><i class="fas fa-caret-right"></i>
                            @if ($position->subtitle)
                                {{$position->title}}<small class="text-muted pl-1">{{$position->subtitle}}</small>
                            @else
                                {{$position->title}}
                            @endif
                        </td>
                        @if ($show_artist)
                            <td>{{$position->artist}}</td>
                        @endif
                        @if ($show_length)
                            <td class="text-right">{{$position->length}}</td>
                        @endif
                    @break
                @endswitch
            </tr>
        @endforeach
        <tr>
            <td scope="row"></td>
            @if ($show_artist)
                <td></td>
            @endif
            @if ($show_length)
                <th class="text-right">合計時間</th>
                <td class="text-right">{{$total_length}}</td>
            @else
                <th></th>
            @endif
        </tr>
    </tbody>
</table>
@endif

@endsection