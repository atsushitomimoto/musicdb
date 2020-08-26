@extends('template.base')

@section('title','Search')

{{-- コンテンツ --}}
@section('content')

<h1><a href="{{url('/search')}}" class="text-black text-decoration-none">Search</a></h1>

<p>{{$msg ?? ''}}</p>

@if(session('msg'))
    <p>{{ session('msg') }}</p>
@endif

{{-- 検索結果の件数表示 --}}
@if($keyword)
    <h5 class="font-weight-bold mb-4">{{$keyword}}を検索中</h5>
@endif

@if($totalcount)
    <p>{{$totalcount.'件中 '.$items->firstItem().'-'.$items->lastItem().'件'}}</p>
@else
    <p>検索結果が見つかりませんでした。</p>
    <p><a href="/release/add">リリースを追加する</a></p>
@endif
{{-- リリースのカード表示 --}}
<div class="row mx-minus10px">
    @foreach ($items as $item)
        <div class="card img-thumbnail border-0 m-2">
            @if(isset($item->image))
                {{-- 画像の表示 --}}
                <div class="centering-outer size-150px border shadow-sm">
                    <a href="release/{{$item->id}}" class="link-expantion" title="{{$item->title}}">
                        <img class="card-img-top rounded-0 size-auto centering-inner maxsize-150px" src="{{asset($item->image)}}" alt="{{$item->title}}" decoding="async">
                    </a>
                </div>
            @else
                {{-- 画像がない場合 --}}
                <div class="centering-outer size-150px border shadow-sm noimage">
                    <a href="release/{{$item->id}}" class="link-expantion" title="{{$item->title}}"></a>
                    <i class="centering-inner fas fa-compact-disc"></i>
                </div>
            @endif
            {{-- テキスト表示 --}}
            <div class="card-body px-0 py-2">
                <h5 class="card-title mb-1 font-weight-bold small text-truncate" title="{{$item->title}}"><a href="release/{{$item->id}}">{{$item->title}}</a></h5>
                <h6 class="card-text small text-truncate" title="{{$item->artist}}">{{$item->artist}}</h6>
            </div>
        </div>
    @endforeach
</div>

{{-- ペジネーション --}}
{!! $items->appends(['keyword'=>$keyword])->links() !!}

@endsection