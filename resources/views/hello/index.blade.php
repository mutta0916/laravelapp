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
<body style="padding:10px;">
    <h1>Hello/index</h1>
    <p>{{$msg}}</p>

    {{-- <div>
        <form action="/hello" method="POST">
        @csrf
        ID: <input type="text" id="id" name="id">
        <input type="submit">
        </form>
    </div>
    <hr>
    <table border="1">
        @foreach ($data as $item)
        <tr>
            <th>{{$item->id}}</th>
            <td>{{$item->all_data}}</td>
        </tr>
        @endforeach
    </table>
    <hr> --}}

    <table border="1">
        @foreach ($data as $item)
        <tr>
            <th>{{$item->id}}</th>
            <td>{{$item->all_data}}</td>
        </tr>
        @endforeach
    </table>

    <hr>

    <div id="app">
        <my-component></my-component>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
@endsection
