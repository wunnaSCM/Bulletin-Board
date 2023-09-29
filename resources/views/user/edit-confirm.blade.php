@extends('layouts.app')
@section('datepicker_css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <section class="bg-background">
        <div class="py-8 px-4 mx-auto max-w-4xl lg:py-16">
            <h2 class="mb-4 text-2xl font-bold text-gray-900">Edit Confirm User</h2>
            <form action="{{ route('user.update', $id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid gap-4 sm:grid-cols-4 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                        <p id="name">{{ $request->name }}</p>
                        <input type="hidden" name="name" id="name" value="{{ $request->name }}"
                            class="bg-white-300 border border-gray-300 text-gray-950 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                        <p id="email">{{ $request->name }}</p>
                        <input type="hidden" name="email" id="email" value="{{ $request->email }}"
                            class="bg-white-300 border border-gray-300 text-gray-950 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    </div>
                    {{-- <div class="sm:col-span-2">
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
                    </div> --}}
                    <div class="sm:col-span-2">
                        <label for="type" class="block mb-2 text-sm font-medium text-gray-900">Type</label>
                        <p id="type">{{ $request->type }}</p>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">Phone</label>
                        <p id="phone">{{ $request->phone }}</p>
                        <input type="hidden" name="phone" id="phone" value="{{ $request->phone }}"
                            class="bg-white-300 border border-gray-300 text-gray-950 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="dob" class="block mb-2 text-sm font-medium text-gray-900">Date of Birth</label>
                        <p id="dob">{{ $request->dob }}</p>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="address" class="block mb-2 text-sm font-medium text-gray-900">Address</label>
                        <p id="name">{{ $request->address }}</p>
                        <input type="hidden" name="address" id="address" value="{{ $request->address }}"
                            class="bg-white-300 border border-gray-300 text-gray-950 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="Profile" class="block mb-2 text-sm font-medium text-gray-900">Photo</label>
                        <img id="selectedImage" src="#" alt="Selected Image" width="300px" height="200px">
                    </div>
                </div>
                <div class="flex justify-start py-4">
                    <button
                        class="btn inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white-300 bg-primary rounded-lg focus:ring-4 focus:ring-primary-200 mr-4">
                        Cancel
                    </button>

                    <button type="submit"
                        class="btn inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white-300 bg-primary rounded-lg focus:ring-4 focus:ring-primary-200">
                        Update
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
            datepicker.getDate($user - > dob);

            datepicker.on('change', function() {
                const selectedDate = datepicker.getDate();
                $.ajax({
                    type: 'POST',
                    url: '{{ route('user.store') }}',
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

    <script>
        profile.onchange = evt => {
            const [file] = profile.files
            if (file) {
                selectedImage.src = URL.createObjectURL(file)
            }
        }
    </script>
@endsection
