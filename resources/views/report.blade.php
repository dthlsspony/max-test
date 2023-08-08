<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<h3>Количество прокси: <span id="proxy_amount">{{$report->proxies->count()}} (Проверено: {{$report->proxies->where('status', '!=', 0)->count()}})</span></h3>

@if ($report->proxies->count())
    <table>
<thead>
<td>Proxy</td>
<td>Status</td>
</thead>
<tbody>
@foreach($report->proxies as $proxy)
    <tr>
        <td>{{$proxy->ip}}:{{$proxy->port}}</td>
        <td>{{$proxy->status}}</td>
    </tr>
@endforeach
</tbody>
</table>
@endif
</body>
</html>
