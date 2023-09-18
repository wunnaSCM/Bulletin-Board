<x-guest-layout>
    {{-- <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div> --}}

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    {{-- <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form> --}}

    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
        <h1 class="flex justify-center text-2xl font-bold leading-tight tracking-tight text-gray-700 md:text-3xl">
            Reset Password
        </h1>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                <input type="email" name="email" id="email" :value="old('email')"
                    class="bg-white-300 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                    placeholder="user@gmail.com">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="submit"
                    class="text-white-300 bg-primary hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Email Password Reset Link
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>
