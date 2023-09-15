<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('global-messages.store') }}" method="post" enctype="multipart/form-data"
                    class="space-y-4">
                    @csrf
                    <div class="mb-6">
                        <x-input-label for="selector" class="block text-gray-500">Change the Title</x-input-label>
                        <x-text-input id="title" type="text" name="title" placeholder="Message Title" required
                            class="w-full p-2 text-gray-900 bg-gray-700 rounded focus:outline-none focus:shadow-outline-gray"></x-text-input>
                    </div>
                    <div class="mb-4">
                        <x-input-label for="body" class="block text-gray-500">Change the Body</x-input-label>
                        <textarea id="body" name="body" placeholder="Message Body" required rows="4"
                            class="w-full p-2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm rounded focus:outline-none focus:shadow-outline-gray"></textarea>
                    </div>

                    <div class="mb-4">
                        <x-input-label for="selector" class="block text-gray-500">Choose a Type</x-input-label>
                        <select id="selector" name="type"
                            class=" w-full p-2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm rounded focus:outline-none focus:shadow-outline-gray">
                            <option value="#65a30d">Success (Green)</option>
                            <option value="#2563eb">Info (Blue)</option>
                            <option value="#f59e0b">Warning (Yellow)</option>
                            <option value="#dc2626">Error (Red)</option>
                        </select>
                    </div>

                    <div class="mb-6">
                        <x-input-label for="icon" class="block text-gray-500">Choose an Icon</x-input-label>
                        <input id="icon" type="text" name="icon" placeholder="Icon Name" required
                            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full p-2 text-gray-900 bg-gray-700 rounded focus:outline-none focus:shadow-outline-gray">
                        <a class="dark:text-gray-300"
                            href="https://fonts.google.com/icons?icon.style=Rounded&icon.set=Material+Symbols">
                            <span class="material-symbols-rounded">
                                link
                            </span>
                            Material Icon Library (Usage: Search for icon. Enter <b>only</b> the name. (e.g. warning,
                            close, etc.)</a>
                    </div>

                    <div>
                        <x-success-button type="submit"
                            class="dark:bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline-blue">
                            Create Message
                        </x-success-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
