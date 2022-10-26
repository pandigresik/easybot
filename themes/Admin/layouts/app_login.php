<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <base href="{{ config('app.url') }}" />
    <title>{{config('app.name')}}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>    
</head>

<body class="c-app flex-row align-items-center">
    @yield('content')    
</body>
</html>