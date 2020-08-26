{{-- template/base.blade.phpを親レイアウトとして継承 --}}
@extends('template.base')

@section('title','プロフィール') 

{{-- コンテンツ --}}
@section('content')
<h1>Profile</h1>

<table class="table" style="width: auto !important;">
    <tr>
    <th>氏名</th>
    <td>{{ Auth::user()->name }}</td>
    </tr>  
    <tr>
    <th>メールアドレス</th>
    <td>{{ Auth::user()->email }}</td>
    </tr>
</table>
@endsection