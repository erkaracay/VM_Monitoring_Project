<x-layout>
    <div class='bg-gray-50 p-5'>
        <table class="w-full table-auto rounded-sm">
            <x-thead />
            <tbody>
                @unless($servers->isEmpty())
                    @foreach($servers as $server)
                        <x-trow :server="$server" :users="$users" />
                    @endforeach
                @else
                    <tr class="border-gray-300">
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            <p class="text-center">No servers Found</p>
                        </td>
                    </tr>
                @endunless
            </tbody>
        </table>
    </div>
</x-layout>