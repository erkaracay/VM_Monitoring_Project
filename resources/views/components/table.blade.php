<div {{$attributes->merge(['class' => 'max-w-max mx-auto'])}}>
    <div class="flex flex-col">
        <div class="overflow-x-auto shadow-md sm:rounded-lg">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden ">
                    <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-700">
                        <x-thead />
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                            {{$slot}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>