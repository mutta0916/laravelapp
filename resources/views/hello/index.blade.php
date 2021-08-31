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
    <ol>
        @foreach ($data as $item)
            <li>{{$item->name}} [{{$item->mail}}],{{$item->age}}</li>
        @endforeach
    </ol>
    <hr>
</body>
@endsection