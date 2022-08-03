<thead class="bg-gray-300">
    <tr class="flex-col">
        <th class="px-4 py-3 border-t border-b border-gray-300 text-md">@sortablelink('id', 'ID')</th>
        <th class="px-4 py-3 border-t border-b border-gray-300 text-md">@sortablelink('user_id', 'Hostname')</th>
        <th class="px-4 py-3 border-t border-b border-gray-300 text-md">@sortablelink('ip', 'IP Address')</th>
        <th class="px-4 py-3 border-t border-b border-gray-300 text-md">@sortablelink('name', 'Server Name')</th>
        <th class="px-4 py-3 border-t border-b border-gray-300 text-md">@sortablelink('availability', 'Availability')</th>
        <th class="px-4 py-3 border-t border-b border-gray-300 text-md">@sortablelink('available_on', 'Available On')</th>
        @auth
        <th class="px-4 py-3 border-t border-b border-gray-300 text-md">Claim</th>
        @endauth
    </tr>
</thead>