@props(['active'])

@php
    $classes = $active ?? false ? 'inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 text-gray-900 dark:text-gray-100 transition duration-150 ease-in-out' : 'inline-flex items-center px-1 pt-1 border-transparent text-sm font-medium leading-5 text-gray-200 dark:text-gray-200 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
