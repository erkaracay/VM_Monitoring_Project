@props(['server'])

<tr class="hover:bg-stone-100 dark:hover:bg-stone-500">                                        
    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$server->id}}</td>
    <td class="py-4 px-6 text-sm font-medium whitespace-nowrap dark:text-white">
        <form action="/edit" method="GET">
            <input type="text" class="border-b bg-transparent" name="hostname" value="{{$server->hostname}}">
            <input type="hidden" name="id" value="{{$server->id}}">
        </form>
    </td>
    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$server->ip}}</td>
    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$server->name}}</td>
    @if ($server->availability == "available")
    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
        <a href="/update/{{$server->id}}" class="btn bg-teal-500 dark:bg-teal-700 p-1 rounded w-full">{{$server->availability}}</a>
    </td>
    @else
    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
        <a href="/update/{{$server->id}}" class="btn bg-red-600 dark:bg-rose-700 p-1 rounded w-full">{{$server->availability}}</a>
    </td>
    @endif
    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$server->available_on}}</td>
</tr>