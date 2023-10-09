@extends('layouts.app')

@section('content')
    <section class="bg-background">
        <div class="py-8 px-4 mx-auto max-w-4xl lg:py-16">
            <h2 class="mb-4 text-2xl font-bold text-gray-900">Change Password</h2>
            <form action="{{ route('user.update.change.password', $id) }}" method="POST">
                @csrf
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @elseif (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="grid gap-4 sm:grid-cols-4 sm:gap-6">
                    <div class="sm:col-span-4">
                        <label for="oldPasswordInput" class="block mb-2 text-sm font-medium text-gray-900">Old
                            Password</label>
                        <input type="password" name="old_password" id="old_password"
                            class="bg-white-300 border border-gray-300 text-gray-950 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        @error('old_password')
                            <div class="text-red-600 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="sm:col-span-4">
                        <label for="newPasswordInput" class="block mb-2 text-sm font-medium text-gray-900">New
                            Password</label>
                        <input type="password" name="new_password" id="new_password"
                            class="bg-white-300 border border-gray-300 text-gray-950 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        @error('new_password')
                            <div class="text-red-600 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="sm:col-span-4">
                        <label for="confirmNewPasswordInput" class="block mb-2 text-sm font-medium text-gray-900">Confirm
                            New Password</label>
                        <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                            class="bg-white-300 border border-gray-300 text-gray-950 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    </div>

                    <div class="flex justify-start py-4">
                        <button onclick="clearField();" type="button"
                            class="btn inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white-300 bg-primary rounded-lg focus:ring-4 focus:ring-primary-200 mr-4">
                            Cancel
                        </button>

                        <button type="submit"
                            class="btn inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white-300 bg-primary rounded-lg focus:ring-4 focus:ring-primary-200">
                            Change
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
