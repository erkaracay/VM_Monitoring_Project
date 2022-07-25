<x-layout>   
    <x-server-search />
    <div class='bg-gray-50 p-5'>
        <table class="w-full table-auto rounded-sm">
            <x-head />
            <tbody>
                @unless($servers->isEmpty())
                    @foreach($servers as $server)
                        <x-row :server="$server" />
                    @endforeach
                @else
                    <tr class="border-gray-300">
                        <td colspan="5" class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            <p class="text-center">No servers Found</p>
                        </td>
                    </tr>
                @endunless
            </tbody>
        </table>
    </div>
    <div class="mt-6 p-4">
        {{$servers->links()}}
    </div>
</x-layout>