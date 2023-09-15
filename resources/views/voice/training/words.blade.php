<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Voice Trainer | Words') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Microphone Activation Section -->
                    <button id="microphoneToggle">Enable Microphone</button>

                    <!-- Voice Range Display Section (placeholder) -->
                    <div id="voiceRangeDisplay">Voice Range Display Here</div>

                    <!-- Frequency Spectrum Canvas -->
                    <div>
                        <canvas id="frequencySpectrum"></canvas>
                    </div>

                    <!-- Word Exercise Section (placeholder) -->
                    <div id="wordExercise">Words for practice will appear here</div>

                    <!-- Word Tracking Section (placeholder) -->
                    <div id="wordTracking">Practiced words tracking will appear here</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include the JavaScript file with type="module" -->
    <script type="module" src="{{ asset('js/voice.js') }}"></script>
</x-app-layout>
