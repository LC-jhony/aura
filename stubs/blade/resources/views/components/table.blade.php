<div x-data="tableComponent()">
    <div class="overflow-x-auto rounded-lg">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-none">
            <thead class="bg-gray-50 dark:bg-gray-800">
                @foreach ($headers as $header)
                    @php $header = is_array($header) ? $header : ['name' => $header]; @endphp
                    <th
                        class="px-6 py-3 text-left text-xs font-medium whitespace-nowrap text-gray-500 uppercase
                    tracking-wider dark:bg-gray-900 dark:text-gray-400 {{ $header['classes'] ?? '' }}">
                        {{ $header['name'] }}</th>
                @endforeach
            </thead>

            <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
                {{ $slot }}
            </tbody>
        </table>
    </div>
</div>
