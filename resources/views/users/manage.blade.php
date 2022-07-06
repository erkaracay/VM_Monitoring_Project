<x-layout>
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
                        <td colspan="7" class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            <p class="text-center">No Claimed Servers</p>
                        </td>
                    </tr>
                @endunless
            </tbody>
        </table>
    </div>
</x-layout>