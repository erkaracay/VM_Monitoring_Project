@props(['server'])
@props(['users'])

<tr class="border-gray-300 hover:bg-gray-400">
    <td class="px-4 py-3 border-t border-b border-gray-300 text-md w-2">{{$server->id}}</td>
    <td class="px-4 py-3 border-t border-b border-gray-300 text-md">
        <form action="/edit" method="GET">
            <select class="bg-transparent border-b" name="user">
                @foreach ($users as $user)
                    <option class="text-black" value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
            <input type="hidden" name="id" value="{{$server->id}}">
        </form>
    </td>
    <td class="px-4 py-3 border-t border-b border-gray-300 text-md">{{$server->ip}}</td>
    <td class="px-4 py-3 border-t border-b border-gray-300 text-md">{{$server->name}}</td>
    @if ($server->availability == "available")
    <td class="px-4 py-3 border-t border-b border-gray-300 text-md">
        <a href="/update/{{$server->id}}" class="btn bg-teal-500 dark:bg-teal-400 p-1 px-3 rounded w-full">{{$server->availability}}</a>
    </td>
    @else
    <td class="px-4 py-3 border-t border-b border-gray-300 text-md">
        <a href="/update/{{$server->id}}" class="btn bg-red-600 dark:bg-red-600 p-1 rounded w-full">{{$server->availability}}</a>
    </td>
    @endif
    <td class="px-4 py-3 border-t border-b border-gray-300 text-md">{{$server->available_on}}</td>
</tr>