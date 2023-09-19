<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'genderspace') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />

    <link rel="icon" type="image/png" href="logo.png">

    @if (@isset($head))
        {{ $head }}
    @endif

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        @if (isset($globalMessages) && !$globalMessages->isEmpty())
            @foreach ($globalMessages as $globalMessage)
                <div class="py-4">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="flex items-center justify-between">
                                <div class="flex-grow flex items-center">
                                    <div class="p-6 text-gray-900 dark:text-gray-100"
                                        style="background-color: {{ $globalMessage->type }};">
                                        <span class="material-symbols-rounded" style="font-size:36px;">
                                            {{ $globalMessage->icon }}
                                        </span>
                                    </div>
                                    <div class="ml-4 flex-col">
                                        <div class="p-2 text-white-900 dark:text-white">
                                            <b>{{ $globalMessage->title }}</b>
                                        </div>
                                        <hr class="flex-grow border-t-2">
                                        <div class="p-2 text-gray-900 dark:text-gray-100">
                                            {{ $globalMessage->body }}
                                        </div>
                                    </div>
                                </div>
                                <div class="select-none">
                                    <a href="{{ route('unsubscribe.message', $globalMessage->id) }}"
                                        class="close-message-btn">
                                        <span class="p-6 dark:text-gray-500 material-symbols-rounded"
                                            style="font-size:36px;">
                                            close
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif






        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.close-message').click(function() {
                let messageId = $(this).data('message-id');
                $.post(`/global-message/unsubscribe/${messageId}`, {
                    _token: '{{ csrf_token() }}'
                }, function(response) {
                    // Handle success, like hiding the message or showing a confirmation
                    console.log(response.message);
                });
            });
        });
    </script>

</body>

</html>
