{{-- template/base.blade.phpを親レイアウトとして継承 --}}
@extends('template.base')

{{-- コンテンツ --}}
@section('content')
<h1>Index</h1>
<ul>
    <li><a href="/search">検索</a></li>
    <li><a href="/release/add">リリースの新規登録</a></li>
</ul>
<div id="app">
    <!-- デフォルトだとこの中ではvue.jsが有効 -->
    <!-- example-component はLaravelに入っているサンプルのコンポーネント -->
    <example-component></example-component>
</div>
@endsection