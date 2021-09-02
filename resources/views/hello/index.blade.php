@extends('layouts.helloapp')
<style>
    .pagination { font-size: 10pt; }
    .pagination li { display: inline-block; }
    tr th a:link { color: white; }
    tr th a:visited { color: white; }
    tr th a:hover { color: white; }
    tr th a:active { color: white; }
</style>
@section('title', 'Index')

@section('menubar')
    @parent
    インデックスページ
@endsection

@section('content')
<body>
    <h1>Hello/index</h1>
    <p>{!!$msg!!}</p>

    <h2>全件取得</h2>
    <table border="1">
        @foreach ($alldata as $item)
        <tr>
            <th>{{$item->id}}</th>
            <td>{{$item->name}}</td>
            <td>{{$item->mail}}</td>
            <td>{{$item->age}}</td>
        </tr>
        @endforeach
    </table>

    <h2>結果</h2>
    <table border="1">
        @foreach ($data as $item)
        <tr>
            <th>{{$item->id}}</th>
            <td>{{$item->name_and_age}}</td>
        </tr>
        @endforeach
    </table>
    <hr>
</body>
@endsection