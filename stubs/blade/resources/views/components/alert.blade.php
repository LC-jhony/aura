@if (session()->has('info'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 6000)" x-show="show"
        class="fixed bottom-3 right-3 flex items-center gap-3 rounded-lg bg-blue-600 dark:bg-blue-500 px-6 py-4 text-sm text-white">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
            <path fill-rule="evenodd"
                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a.75.75 0 000 1.5h.253a.25.25 0 01.244.304l-.459 2.066A1.75 1.75 0 0010.747 15H11a.75.75 0 000-1.5h-.253a.25.25 0 01-.244-.304l.459-2.066A1.75 1.75 0 009.253 9H9z"
                clip-rule="evenodd" />
        </svg>
        <p>{{ session('info') }}</p>
    </div>
@endif
@if (session()->has('danger'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 6000)" x-show="show"
        class="fixed bottom-3 right-3 flex items-center gap-3 rounded-lg bg-red-600 dark:bg-red-500 px-6 py-4 text-sm text-white">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
            <path fill-rule="evenodd"
                d="M10.339 2.237a.532.532 0 00-.678 0 11.947 11.947 0 01-7.078 2.75.5.5 0 00-.479.425A12.11 12.11 0 002 7c0 5.163 3.26 9.564 7.834 11.257a.48.48 0 00.332 0C14.74 16.564 18 12.163 18 7.001c0-.54-.035-1.07-.104-1.59a.5.5 0 00-.48-.425 11.947 11.947 0 01-7.077-2.75zM10 6a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0v-3.5A.75.75 0 0110 6zm0 9a1 1 0 100-2 1 1 0 000 2z"
                clip-rule="evenodd" />
        </svg>
        <p>{{ session('danger') }}</p>
    </div>
@endif
@if (session()->has('success'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 6000)" x-show="show"
        class="fixed bottom-3 right-3 flex items-center gap-3 rounded-lg bg-green-600 dark:bg-green-500 px-6 py-4 text-sm text-white">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
            <path fill-rule="evenodd"
                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                clip-rule="evenodd" />
        </svg>
        <p>{{ session('success') }}</p>
    </div>
@endif
@if (session()->has('warning'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 6000)" x-show="show"
        class="fixed bottom-3 right-3 flex items-center gap-3 rounded-lg bg-yellow-600 dark:bg-yellow-500 px-6 py-4 text-sm text-white">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
            <path fill-rule="evenodd"
                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z"
                clip-rule="evenodd" />
        </svg>
        <p>{{ session('warning') }}</p>
    </div>
@endif
@if (session()->has('dark'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 6000)" x-show="show"
        class="fixed bottom-3 right-3 flex items-center gap-3 rounded-lg bg-gray-600 dark:bg-gray-500 px-6 py-4 text-sm text-white">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
            <path
                d="M4.214 3.227a.75.75 0 00-1.156-.956 8.97 8.97 0 00-1.856 3.826.75.75 0 001.466.316 7.47 7.47 0 011.546-3.186zM16.942 2.271a.75.75 0 00-1.157.956 7.47 7.47 0 011.547 3.186.75.75 0 001.466-.316 8.971 8.971 0 00-1.856-3.826z" />
            <path fill-rule="evenodd"
                d="M10 2a6 6 0 00-6 6c0 1.887-.454 3.665-1.257 5.234a.75.75 0 00.515 1.076 32.94 32.94 0 003.256.508 3.5 3.5 0 006.972 0 32.933 32.933 0 003.256-.508.75.75 0 00.515-1.076A11.448 11.448 0 0116 8a6 6 0 00-6-6zm0 14.5a2 2 0 01-1.95-1.557 33.54 33.54 0 003.9 0A2 2 0 0110 16.5z"
                clip-rule="evenodd" />
        </svg>
        <p>{{ session('dark') }}</p>
    </div>
@endif
