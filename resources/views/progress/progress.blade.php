<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Progress Tracker | Overview') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Tools</h1>
                    <a href="{{ route('progress.hrttracker') }}">
                        <x-info-button class="mt-6">
                            <span class="material-symbols-rounded">
                                pill
                            </span>
                            HRT
                        </x-info-button>
                    </a>
                    <a href="{{ route('progress.bloodtests') }}">
                        <x-danger-button class="mt-6 ml-4"><span class="material-symbols-rounded">
                                humidity_low
                            </span>
                            Bloodtest Checker
                        </x-danger-button>
                    </a>
                    <a href="{{ route('progress.bloodtests') }}">
                        <x-success-button class="mt-6 ml-4"><span class="material-symbols-rounded">
                                bookmark
                            </span>
                            Journal
                        </x-success-button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
