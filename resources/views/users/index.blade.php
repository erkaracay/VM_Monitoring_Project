<x-layout>
    <x-user-search />
    <div class='bg-gray-50 p-5'>
        <table class="w-full table-auto rounded-sm">
            <thead class="bg-gray-300">
                <th class="px-4 py-3 border-t border-b border-gray-300 text-md">@sortablelink('id', 'ID')</th>
                <th class="px-4 py-3 border-t border-b border-gray-300 text-md">@sortablelink('name', 'Name')</th>
                <th class="px-4 py-3 border-t border-b border-gray-300 text-md">@sortablelink('email', 'Email')</th>
                <th class="px-4 py-3 border-t border-b border-gray-300 text-md">@sortablelink('created_at', 'Created At')</th>
                <th class="px-4 py-3 border-t border-b border-gray-300 text-md">Claimed Servers</th>
                @if (auth()->user()->isAdmin)
                    <th class="px-4 py-3 border-t border-b border-gray-300 text-md">Admin</th>
                @endif
            </thead>
            <tbody>
                @unless($users->isEmpty())
                    @foreach($users as $user)
                    <tr class="border-gray-300 hover:bg-gray-300">
                        <td class="px-4 py-2 border-t border-b border-gray-300 text-center text-lg">{{$user->id}}</td>
                        <td class="px-4 py-2 border-t border-b border-gray-300 text-center text-lg">{{$user->name}}</td>
                        <td class="px-4 py-2 border-t border-b border-gray-300 text-center text-lg">{{$user->email}}</td>
                        <td class="px-4 py-2 border-t border-b border-gray-300 text-center text-lg">{{$user->created_at}}</td>
                        <td class="px-4 py-2 border-t border-b border-gray-300 text-center text-lg">
                            <a href="/users/{{$user->id}}/servers"><button class="btn p-2 rounded hover:bg-gray-700 hover:text-white"><i class="fa-solid fa-server"></i> Servers</button></a>
                        </td>
                        @if (auth()->user()->isAdmin)
                        <td class="px-4 py-2 border-t border-b border-gray-300 text-center text-lg">
                            <a href="/users/{{$user->id}}/admin"><button class="btn p-2 rounded hover:bg-gray-700 hover:text-white"><i class="fa-solid fa-user-cog"></i> Actions</button></a>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                    @if (auth()->user()->isAdmin)
                    <tr class="border-gray-300 hover:bg-gray-300 border-t border-b border-gray-300 ">
                        <td colspan="6" class="px-2 py-2 text-center text-md text-xl">
                            <a href="/users/create" class="hover:text-laravel"><i class="fa-solid fa-plus"></i> Create User</a>
                        </td>
                    </tr>
                    @endif
                @else
                    <tr class="border-gray-300">
                        <td colspan="5" class="px-4 py-2 border-t border-b border-gray-300 text-lg">
                            <p class="text-center">No Users Found</p>
                        </td>
                    </tr>
                @endunless
            </tbody>
        </table>
    </div>
    <div class="mt-6 p-4">
        {{$users->links()}}
    </div>
</x-layout>