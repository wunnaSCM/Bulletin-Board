@extends('layouts.app')
@section('datepicker_css')
 <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
 <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <section class="bg-background">
        <div class="py-8 px-4 mx-auto max-w-4xl lg:py-16">
            <h2 class="mb-4 text-2xl font-bold text-gray-900">Add User</h2>
            <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 sm:grid-cols-4 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                            class="bg-white-300 border border-gray-300 text-gray-950 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        @error('name')
                            <div class="text-red-600 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                        <input type="text" name="email" id="email" value="{{ old('email') }}"
                            class="bg-white-300 border border-gray-300 text-gray-950 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        @error('email')
                            <div class="text-red-600 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Pssword</label>
                        <input type="password" name="password" id="password" value="{{ old('password') }}"
                            class="bg-white-300 border border-gray-300 text-gray-950 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        @error('password')
                            <div class="text-red-600 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900">Password
                            Confirmation</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            value="{{ old('password_confirmation') }}"
                            class="bg-white-300 border border-gray-300 text-gray-950 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        @error('password_confirmation')
                            <div class="text-red-600 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="type" class="block mb-2 text-sm font-medium text-gray-900">Type</label>
                        <select id="type" name="type"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                            <option value="0">Admin</option>
                            <option value="1">User</option>
                        </select>
                        @error('type')
                            <div class="text-red-600 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">Phone</label>
                        <input type="number" name="phone" id="phone" value="{{ old('phone') }}"
                            class="bg-white-300 border border-gray-300 text-gray-950 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        @error('phone')
                            <div class="text-red-600 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="dob" class="block mb-2 text-sm font-medium text-gray-900">Date of Birth</label>
                        <div class="relative max-w-sm">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input datepicker datepicker-format="dd/mm/yyyy" datepicker-autohide type="text" name="dob" id="dob"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                                placeholder="Select date">
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="address" class="block mb-2 text-sm font-medium text-gray-900">Address</label>
                        <input type="text" name="address" id="address" value="{{ old('address') }}"
                            class="bg-white-300 border border-gray-300 text-gray-950 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        @error('address')
                            <div class="text-red-600 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="Profile" class="block mb-2 text-sm font-medium text-gray-900">Photo</label>
                        <input type="file" name="profile" id="profile"
                            class="bg-white-300 border border-gray-300 text-gray-950 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        @error('profile')
                            <div class="text-red-600 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="flex justify-start py-4">
                    <button
                        class="btn inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white-300 bg-primary rounded-lg focus:ring-4 focus:ring-primary-200 mr-4">
                        Cancel
                    </button>

                    <button type="submit"
                        class="btn inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white-300 bg-primary rounded-lg focus:ring-4 focus:ring-primary-200">
                        Add product
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const datepicker = new Datepicker(document.getElementById('dob'));

        datepicker.on('change', function () {
            const selectedDate = datepicker.getDate();
            $.ajax({
                type: 'POST',
                url: '{{ route("user.store") }}',
                data: {
                    selectedDate: selectedDate
                },
                success: function(response) {
                    console.log('Date selected: ', selectedDate);
                    console.log('Server response: ', response);
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });
        });
    });
</script>
@endsection

