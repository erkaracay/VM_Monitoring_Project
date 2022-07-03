@php
use App\Models\User;
@endphp
@props(['server'])
@props(['users'])

<tr class="border-gray-300 hover:bg-gray-300 border-t border-b border-gray-300 ">
    <td class="px-2 py-2 text-center text-md w-2">{{$server->id}}</td>
    <td class="px-2 py-2 text-md">
        @if ($server->user_id == null)
            <span class="text-gray-500">Not Claimed</span>
        @else 
            {{User::find($server->user_id)->name}}
        @endif
    </td>
    <td class="px-2 py-2 text-center text-md">{{$server->ip}}</td>
    <td class="px-2 py-2 text-center text-md">{{$server->name}}</td>
    <td class="px-2 py-2 justify-center text-md flex">
    @if ($server->availability == "available" && $server->running)
        <span class="btn bg-teal-500 dark:bg-teal-400 p-1 px-3 rounded w-75">{{$server->availability}}</span>
    @elseif($server->availability == "claimed")
        <span class="btn bg-amber-500 dark:bg-amber-500 p-1 px-4 rounded w-75">{{$server->availability}}</span>
    @else
        <span class="btn bg-red-600 dark:bg-red-600 p-1 rounded w-75">unavailable</span>
    @endif
    @if ($server->running)
        <div class="ml-3 text-green align-items-center">
            <i class="fa-solid fa-circle h-4" style="color:rgb(51, 227, 51)"></i>
        </div>
    @else
        <div class="ml-3 text-green align-items-center">
            <i class="fa-solid fa-circle h-4" style="color:rgb(210, 4, 4)"></i>
        </div>
    @endif
    </td>
    <td class="px-2 py-2 text-md">
        <ul class="flex justify-center text-lg">
            <li class="mr-2">
                <a href="/servers/{{$server->id}}/edit" class="hover:text-laravel">
                    <i class="fa-solid fa-edit"></i> Edit
                </a>
            </li>
            <li class="ml-2">
                <form action="/servers/{{$server->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="hover:text-laravel"><i class="fa-solid fa-trash"></i></button>
                </form>
            </li>
        </ul>
    </td>
</tr>