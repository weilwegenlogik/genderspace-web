<x-app-layout>
    <x-slot name="head">
        <link href="{{ asset('css/tracker.css') }}" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
            crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"
            integrity="sha256-xLD7nhI62fcsEZK2/v8LsBcb4lG7dgULkuXoXB/j91c=" crossorigin="anonymous"></script>

    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Progress Tracker | Overview') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Timeline</h1>
                    <a href="#">
                        <x-success-button-slim class="mt-2" x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'add-timeline-entry')">
                            <span style="font-size: 14px; margin-right: 5px;" class="material-symbols-rounded">
                                add
                            </span>
                            new entry
                        </x-success-button-slim>
                    </a>

                    <x-modal name="add-timeline-entry" focusable>
                        <div id="datepicker-cont" class="p-6">
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Add a new entry') }}
                            </h2>
                            <hr class="mt-2 mb-4" style="border: 0.5px solid gray;">


                            <div class="flex items-center mt-2">
                                <span class="material-symbols-rounded p-2 text-white dark:text-white flex-shrink-0"
                                    style="border-radius: 500px; background-color: #f08097;">
                                    calendar_month
                                </span>
                                <div class="ml-3">
                                    <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-1">
                                        {{ __('Date') }}
                                    </h3>
                                    <a class="text-sm text-gray-600 dark:text-gray-400">
                                        {{ __('Please set the date. (DD-MM-YYYY)') }}
                                    </a>
                                </div>
                            </div>

                            <input id="dateInput"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-2 mt-2"
                                readonly placeholder="Please set the date." onclick="toggleDatePicker()">
                            <div id="datepicker" class="datepicker-container mt-2 hidden">
                                <!-- Month and Year display -->
                                <div id="datepicker-month-year" class="month-year-display"></div>

                                <!-- Datepicker content will be populated here by JS -->

                                <!-- Today and Cancel buttons -->
                                <div class="datepicker-actions">
                                    <button id="today-btn" class="datepicker-btn">Today</button>
                                    <button id="cancel-btn" class="datepicker-btn-gray">Cancel</button>
                                </div>
                            </div>



                        </div>

                        <div class="p-6">
                            <div class="flex items-center">
                                <span class="material-symbols-rounded p-2 text-white dark:text-white flex-shrink-0"
                                    style="border-radius: 500px; background-color: #f08097;">
                                    image
                                </span>
                                <div class="ml-3">
                                    <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-1">
                                        {{ __('Icon') }}
                                    </h3>
                                    <a class="text-sm text-gray-600 dark:text-gray-400">
                                        {{ __('Please set the icon.') }}
                                    </a>
                                </div>
                            </div>
                        </div>



                        <div class="mt-6 flex justify-end p-6">
                            <x-secondary-button x-on:click="$dispatch('close')">
                                {{ __('Cancel') }}
                            </x-secondary-button>

                            <x-success-button class="ml-3"
                                x-on:click="document.getElementById('profileForm').submit();">
                                {{ __("I'm sure!") }}
                            </x-success-button>
                        </div>
                </div>
                </x-modal>

                <!-- Timeline container -->
                <div class="timeline-container mt-4 mb-4">

                    <!-- Start Line -->
                    <div class="timeline-line"></div>

                    <!-- Example Event/Milestone -->
                    <div class="timeline-event">
                        <a href="#" class="event-dot">
                            <span class="material-symbols-rounded">emoji_people</span>
                        </a>
                        <p class="event-date">01/01/2023</p>
                        <p class="event-description">Started HRT</p>
                    </div>

                    <!-- Example Event/Milestone -->
                    <div class="timeline-event">
                        <a href="#" class="event-dot">
                            <span class="material-symbols-rounded">bookmark</span>
                        </a>
                        <p class="event-date">01/02/2023</p>
                        <p class="event-description">First Journal Entry</p>
                    </div>

                    <!-- Example Event/Milestone -->
                    <div class="timeline-event">
                        <a href="#" class="event-dot">
                            <span class="material-symbols-rounded">pill</span>
                        </a>
                        <p class="event-date">01/02/2023</p>
                        <p class="event-description">Changed regimen</p>
                    </div>


                    <!-- End Line -->
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="{{ asset('js/datepicker.js') }}"></script>
</x-app-layout>
