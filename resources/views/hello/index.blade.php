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
    <form action="/hello" method="get">
        @csrf
        <div>NAME:<input type="text" name="name" value="{{old('name')}}"></div>
        <div>MAIL:<input type="text" name="mail" value="{{old('mail')}}"></div>
        <div>TEL:<input type="text" name="tel" value="{{old('tel')}}"></div>
        <input type="submit">
    </form>
    <hr>
    <ol>
        @for ($i = 0; $i < count($keys); $i++)
            <li>{{$keys[$i]}}:{{$values[$i]}}</li>
        @endfor
    </ol>
</body>
@endsection