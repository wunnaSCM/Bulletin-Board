@extends('layouts.app')
@section('datepicker_css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <section class="bg-background">
        <div class="py-8 px-4 mx-auto max-w-4xl lg:py-16">
            <h2 class="mb-4 text-2xl font-bold text-gray-900">Edit User</h2>
            <form action="{{ route('user.edit.confirm', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 sm:grid-cols-4 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                        <input type="text" name="name" id="name" value="{{ $user->name }}"
                            class="bg-white-300 border border-gray-300 text-gray-950 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        @error('name')
                            <div class="text-red-600 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                        <input type="text" name="email" id="email" value="{{ $user->email }}"
                            class="bg-white-300 border border-gray-300 text-gray-950 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        @error('email')
                            <div class="text-red-600 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
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
                        <select id="type" name="type"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                            <option value="0" {{ $user->type == 0 ? 'selected' : '' }}>Admin</option>
                            <option value="1" {{ $user->type == 1 ? 'selected' : '' }}>User</option>
                        </select>
                        @error('type')
                            <div class="text-red-600 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">Phone</label>
                        <input type="number" name="phone" id="phone" value="{{ $user->phone }}"
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
                            <input type="date" name="dob" id="dob" value="{{ $user->dob }}"
                                class="bg-white-300 border border-gray-300 text-gray-950 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="address" class="block mb-2 text-sm font-medium text-gray-900">Address</label>
                        <input type="text" name="address" id="address" value="{{ $user->address }}"
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
                            class="block w-full text-sm text-gray-950 border border-gray-300 rounded-lg cursor-pointer bg-white-300 focus:outline-none"
                            aria-describedby="user_avatar_help">
                        {{-- <input type="hidden" name="profile" id="profile" value="{{ $user->profile }}"
                            class="bg-white-300 border border-gray-300 text-gray-950 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"> --}}
                        <p>{{ $user->profile }}</p>
                        <img id="selectedImage" src="{{ asset('images/user_image/' . $user->profile) }}"
                            alt="Selected Image" width="300px" height="200px">
                        @error('profile')
                            <div class="text-red-600 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="flex justify-start py-4">
                    <a href="javascript:history.back()"
                        class="btn inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white-300 bg-primary rounded-lg focus:ring-4 focus:ring-primary-200 mr-4">
                        Clear
                    </a>

                    <button type="submit"
                        class="btn inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white-300 bg-primary rounded-lg focus:ring-4 focus:ring-primary-200">
                        Confirm
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        profile.onchange = evt => {
            const [file] = profile.files
            if (file) {
                selectedImage.src = URL.createObjectURL(file)
            }
        }
    </script>
@endsection
