@php
use App\Models\User;
@endphp
@props(['server'])

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
    <td class="px-2 py-2  text-md">{{$server->available_on}}</td>
    @auth
        @if ($server->availability == "available" && $server->running)
        <td class="px-2 py-2  text-md">
            <a href="/servers/{{$server->id}}/claim"><button class="btn bg-gray-900 text-white p-2 rounded">Claim</button></a>
        </td>     
        @else
        <td class="px-2 py-2  text-md">
            @if ($server->user_id == auth()->user()->id)
            <a href="/servers/{{$server->id}}/unclaim"><button class="btn bg-gray-900 text-white p-2 rounded">Unclaim</button></a>
            @else
            <button disabled class="btn disabled bg-gray-300 text-gray-900 p-2 rounded">Claim</button>
            @endif
        </td>     
        @endif
    @endauth
</tr>