<html>
<head>
<title>@yield('title')</title>
<link href="/css/app.css" rel="stylesheet">
<style>
body {font-size: 16pt; color:#999; margin: 5px;}
h1 {font-size: 50pt; text-align:right; color:#f6f6f6;  margin:-20px 0px -30px 0px; letter-spacing: -4pt;}
ul {font-size: 12pt;}
hr {margin: 25px 100px; border-top: 1px dashed #ddd;}
th {background-color: #999; color: fff; padding: 5px 10px;}
td {border: solid 1px #aaa; color: #999; padding: 5px 10px;}
.menutitle {font-size: 14pt; font-weight: bold; margin: 0px;}
.content {margin: 10px;}
.footer {text-align: right; font-size: 10pt; margin: 10px; border-bottom: solid 1px #ccc; color: #ccc;}
</style>
<script>
    function doAction(){
        var id = document.querySelector('#id').value;
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '/hello/json/' + id, true);
        xhr.responseType = 'json';
        xhr.onload = function(e) {
            if (this.status == 200) {
                var result = this.response;
                document.querySelector('#name').textContent = result.name;
                document.querySelector('#mail').textContent = result.mail;
                document.querySelector('#age').textContent = result.age;
            }
        };
        xhr.send();
    }
</script>
</head>
<body>
    <h1>@yield('title')</h1>
    @section('menubar')
    <h2 class="menutitle">※メニュー</h2>
    <ul>
        <li>@show</li>
    </ul>
    <hr size="1">
    <div class="content">
        @yield('content')
    </div>
    <div class="footer">
        @yield('footer')
    </div>
</body>
</html>