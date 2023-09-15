<link rel="stylesheet" href="{{ asset('css/buttons.css') }}">

<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'custom-blue-button inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
