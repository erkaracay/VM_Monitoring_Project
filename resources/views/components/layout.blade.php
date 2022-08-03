<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="{{asset('images/favicon.ico')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <title>Server Monitoring System</title>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#ef3b2d",
                    },
                },
            },
        };
    </script>
</head>
<body class="mb-48 bg-gray-50">
    <nav class="flex justify-between items-center mb-4 bg-gray-50 py-3">
        <div class="flex">
            <a href="/"><img class="w-24 mx-3" src="{{asset('images/orion_logo.png')}}" class="logo"/></a>
            <a href="/" class="h-full my-auto text-2xl">Server Monitoring System</a>
        </div>
        <ul class="flex space-x-6 mr-6 text-lg">
            @auth                
            <li class="flex align-items-center">
                <span class="font text-capitalize p-2">
                    Welcome {{ auth()->user()->name }}
                </span>
            </li>
            @if (auth()->user()->isAdmin == 1)
                <li>
                <a href="/servers/manage" class="font text-capitalize">
                        <button type="button" class="p-2 hover:text-white hover:bg-gray-700 hover:rounded">
                            <i class="fa-solid fa-gear"></i> Manage Servers
                        </button>
                    </a>
                </li>        
                @endif
            <li>
                <form action="/users/logout" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="p-2 hover:text-white hover:bg-gray-700 hover:rounded">
                        <i class="fa-solid fa-door-closed"></i> Logout
                    </button>
                </form>
            </li>
            @else
            <li>
                <a href="/users/register" class="p-2 hover:text-white hover:bg-gray-700 hover:rounded"
                    ><i class="fa-solid fa-user-plus"></i> Register
                    </a>
            </li>
            <li>
                <a href="/users/login" class="p-2 hover:text-white hover:bg-gray-700 hover:rounded">
                    <i class="fa-solid fa-arrow-right-to-bracket"></i> Login
                </a>
            </li>
            @endauth
        </ul>
    </nav>
    <main>
        {{$slot}}
    </main>
    <footer class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-gray-50 h-16 opacity-90 md:justify-center">
        <p class="ml-2">Version 0.2</p>
        @auth
        <ul class="flex absolute top-2/7 right-10 ">
            <li class="mx-1">
                <a href="/users/owned" class="bg-gray-900 hover:bg-black text-white py-2 px-5">Your Servers</a>
            </li>
            <li class="mx-1">
                <a href="/users" class="bg-gray-900 hover:bg-black text-white py-2 px-5">All Users</a>
            </li>
                @if (auth()->user()->isAdmin == 1)
                <li class="mx-1">
                    <a href="/servers/manage" class="bg-gray-900 hover:bg-black text-white py-2 px-5">Manage Servers</a>
                </li>
                @endif
        </ul>
        @else
        <a href="/users/login" class="absolute top-2/7 right-10 bg-gray-900 hover:bg-black text-white py-2 px-5">Log In</a>
        @endauth
    </footer>

    <x-flash-message />
</body>
</html>
