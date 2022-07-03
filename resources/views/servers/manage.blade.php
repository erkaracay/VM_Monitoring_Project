<x-layout>
    <div class='bg-gray-50 p-5'>
        <table class="w-full table-auto rounded-sm">
            <x-man-head />
            <tbody>
                @unless($servers->isEmpty())
                    @foreach($servers as $server)
                        <x-man-row :server="$server" :users="$users" />
                    @endforeach
                @else
                    <tr class="border-gray-300">
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            <p class="text-center">No servers Found</p>
                        </td>
                    </tr>
                @endunless
                <tr class="border-gray-300 hover:bg-gray-300 border-t border-b border-gray-300 ">
                    <td colspan="6" class="px-2 py-2 text-center text-md text-xl">
                        <a href="/servers/create" class="hover:text-laravel"><i class="fa-solid fa-plus"></i> Add Server</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="mt-6 p-4">
        {{$servers->links()}}
    </div>
</x-layout>