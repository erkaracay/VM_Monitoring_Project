<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script src="https://cdn.tailwindcss.com"></script>
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
            <li>
                <span class="font text-capitalize">
                    Welcome {{ auth()->user()->name }}
                </span>
            </li>
            <li>
                <form action="/logout" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="p-2 hover:text-white hover:bg-gray-700 hover:rounded">
                        <i class="fa-solid fa-door-closed"></i> Logout
                    </button>
                </form>
            </li>
            @else
            <li>
                <a href="/register" class="p-2 hover:text-white hover:bg-gray-700 hover:rounded"
                    ><i class="fa-solid fa-user-plus"></i> Register
                    </a>
            </li>
            <li>
                <a href="/login" class="p-2 hover:text-white hover:bg-gray-700 hover:rounded">
                    <i class="fa-solid fa-arrow-right-to-bracket"></i>Login
                </a>
            </li>
            @endauth
        </ul>
    </nav>
    <main>
        {{$slot}}
    </main>
    <footer class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-gray-50 text-white h-16 mt-24 opacity-90 md:justify-center">
        <a href="/login" class="absolute top-2/7 right-10 bg-black text-white py-2 px-5">Log In</a>
    </footer>
</body>
</html>
