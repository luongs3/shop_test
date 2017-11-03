<!DOCTYPE html>
<html>
<head>
    <title>Admin - Index</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ mix('css/admin.css') }}">
</head>
<body>
    <script>
        window.user = {!! json_encode(auth()->user()) !!}
    </script>
    <div id="app">
        <div class="loading">
            <div class="splash-overlay"></div>
            <div class="splash-spinner"></div>
        </div>
    </div>
    <div class="splash-screen">
        <div class="splash-overlay"></div>
        <div class="splash-spinner"></div>
    </div>
    <script type="text/javascript" src="{{ mix('js/admin.js') }}"></script>
</body>
</html>
