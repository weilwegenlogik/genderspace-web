<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <div class="mt-6 space-y-6">

        <form id="profileForm" method="post" action="{{ route('profile.update') }}">
            @csrf
            @method('PUT')

            @if (Auth::user()->global_name)
                <div>
                    <x-input-label for="global_name" :value="__('Display Name')" />
                    <input id="global_name" name="global_name" type="text"
                        value="{{ old('global_name', $user->global_name) }}" required
                        class='mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm'>
                    <x-input-error class="mt-2" :messages="$errors->get('global_name')" />
                </div>
            @endif

            <div>
                <x-input-label for="username" :value="__('Username')" />
                <x-text-input id="username" name="username" type="text" class="mt-1 block w-full" :value="old('username', $user->username)"
                    required autocomplete="username" disabled />
                <x-input-error class="mt-2" :messages="$errors->get('username')" />
            </div>

            @if (!Auth::user()->global_name)
                <div>
                    <x-input-label for="discriminator" :value="__('Discriminator')" />
                    <x-text-input id="discriminator" name="discriminator" type="text" class="mt-1 block w-full"
                        :value="old('discriminator', $user->discriminator)" required autocomplete="discriminator" disabled />
                    <x-input-error class="mt-2" :messages="$errors->get('discriminator')" />
                </div>
            @endif

            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email ?? __('Unknown'))"
                    required autocomplete="email" disabled />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->verified)
                    <div>
                        <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                            {{ __('Your email address is unverified.') }}
                        </p>
                    </div>
                @endif
            </div>

            <x-success-button class="mt-4" x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'confirm-save-changes')">
                {{ __('Save Changes') }}
            </x-success-button>
        </form>

        <x-modal name="confirm-save-changes" focusable>
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Are you sure you want to make these changes to your account?') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('These changes are reversible.') }}
                </p>

                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <x-success-button class="ml-3" x-on:click="document.getElementById('profileForm').submit();">
                        {{ __("I'm sure!") }}
                    </x-success-button>
                </div>
            </div>
        </x-modal>

    </div>
</section>
