<x-layout>
    <div class='bg-gray-50 p-5'>
        <table class="w-full table-auto rounded-sm">
            <thead>
                <th class="px-4 py-3 border-t border-b border-gray-300 text-md">ID</th>
                <th class="px-4 py-3 border-t border-b border-gray-300 text-md">Name</th>
                <th class="px-4 py-3 border-t border-b border-gray-300 text-md">Email</th>
                <th class="px-4 py-3 border-t border-b border-gray-300 text-md">Created At</th>
                <th class="px-4 py-3 border-t border-b border-gray-300 text-md">Claimed Servers</th>
            </thead>
            <tbody>
                @unless($users->isEmpty())
                    @foreach($users as $user)
                    <tr class="border-gray-300">
                        <td class="px-4 py-2 border-t border-b border-gray-300 text-center text-lg">{{$user->id}}</td>
                        <td class="px-4 py-2 border-t border-b border-gray-300 text-center text-lg">{{$user->name}}</td>
                        <td class="px-4 py-2 border-t border-b border-gray-300 text-center text-lg">{{$user->email}}</td>
                        <td class="px-4 py-2 border-t border-b border-gray-300 text-center text-lg">{{$user->created_at}}</td>
                        <td class="px-4 py-2 border-t border-b border-gray-300 text-center text-lg">
                            <a href="/users/{{$user->id}}/servers"><button class="btn p-2 rounded hover:bg-gray-700 hover:text-white"><i class="fa-solid fa-server"></i> Servers</button></a>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr class="border-gray-300">
                        <td class="px-4 py-2 border-t border-b border-gray-300 text-lg">
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