<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
        <h1 class="flex justify-center text-2xl font-bold leading-tight tracking-tight text-gray-700 md:text-3xl">
            Login
        </h1>
        <form method="POST" action="{{ route('login') }}" class="space-y-4 md:space-y-6">
            @csrf
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                <input type="email" name="email" id="email" :value="old('email')"
                    @if (isset($_COOKIE['email'])) value="{{ $_COOKIE['email'] }}" @endif
                    class="bg-white-300 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div>
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                <input type="password" name="password" id="password"
                    @if (isset($_COOKIE['password'])) value="{{ $_COOKIE['password'] }}" @endif
                    class="bg-white-300 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="remember_me" name="remember" aria-describedby="remember" type="checkbox"
                            @if (isset($_COOKIE['email'])) checked @endif
                            class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="remember" class="text-gray-700">Remember me</label>
                    </div>
                </div>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"
                        class="text-sm font-medium text-primary hover:underline">Forgot
                        password?</a>
                @endif
            </div>
            <button type="submit"
                class="w-full text-white-300 bg-primary hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Sign
                in</button>
            <p class="text-sm font-light text-gray-700">
                Don’t have an account yet? <a href="{{ route('register') }}"
                    class="font-medium text-gray-800 hover:underline">Sign up</a>
            </p>
        </form>
    </div>
</x-guest-layout>
