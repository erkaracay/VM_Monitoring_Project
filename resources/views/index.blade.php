<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Server Monitoring System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/public/favicon.ico') }}">
</head>
<body class="bg-stone-200">
    <div class="bg-stone-700 py-4 mb-3 rounded-bottom">
        <h1 class="text-center text-stone-200 text-4xl">Servers</h1>
    </div>
    <x-table class=" mb-5">
        @foreach ($servers as $server)
            <x-trow :server="$server" />
        @endforeach
    </x-table>
</body>
</html>