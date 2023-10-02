@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 py-12">
        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="bg-white-100 overflow-hidden shadow-lg sm:rounded-lg">
                <div class="px-6 pt-6">
                    <h1 class="text-2xl font-semibold">Create User Confirmation</h1>
                </div>
                <div class="px-6 pt-6">
                    <label for="title" class="block mb-3 text-sm font-medium text-gray-900">Username</label>
                    <p id="name">{{ $request->name }}</p>
                    <input type="hidden" id="hidden-title" name="name" value="{{ $request->name }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                </div>

                <div class="px-6 pt-6">
                    <label for="email" class="block mb-3 text-sm font-medium text-gray-900">Email</label>
                    <p id="email">{{ $request->email }}</p>
                    <input type="hidden" id="hidden-email" name="email" value="{{ $request->email }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                </div>

                <div class="px-6 pt-6">
                    <label for="password" class="block mb-3 text-sm font-medium text-gray-900">Password</label>
                    <p id="password">{{ $request->password }}</p>
                    <input type="hidden" id="hidden-password" name="password" value="{{ $request->password }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                </div>

                <div class="px-6 pt-6">
                    <label for="type" class="block mb-3 text-sm font-medium text-gray-900">Type</label>
                    <p id="type">{{ $request->type }}</p>
                    <input type="hidden" id="hidden-type" name="type" value="{{ $request->type }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                </div>

                <div class="px-6 pt-6">
                    <label for="phone" class="block mb-3 text-sm font-medium text-gray-900">Phone</label>
                    <p id="phone">{{ $request->phone }}</p>
                    <input type="hidden" id="hidden-phone" name="phone" value="{{ $request->phone }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                </div>

                <div class="px-6 pt-6">
                    <label for="dob" class="block mb-3 text-sm font-medium text-gray-900">Date of Birth</label>
                    <p id="dob">{{ $request->dob }}</p>
                    <input type="hidden" id="hidden-dob" name="dob" value="{{ $request->dob }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                </div>

                <div class="px-6 pt-6">
                    <label for="address" class="block mb-3 text-sm font-medium text-gray-900">Address</label>
                    <p id="address">{{ $request->address }}</p>
                    <input type="hidden" id="hidden-address" name="address" value="{{ $request->address }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                </div>

                <div class="px-6 pt-6">
                    <label for="profile" class="block mb-3 text-sm font-medium text-gray-900">Image</label>
                    <img src="{{ asset('images/user_image/' . $imagePath) }}" width="300px" height="200px" />
                    <input type="hidden" id="hidden-profile" name="profile" value="{{ $imagePath }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                </div>

                <div class="flex justify-start px-6 pb-6">
                    <a href="javascript:history.back()"
                        class="btn inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white-300 bg-primary rounded-lg focus:ring-4 focus:ring-primary-200 mr-4">
                        Cancel
                    </a>

                    <button type="submit"
                        class="btn inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white-300 bg-primary rounded-lg focus:ring-4 focus:ring-primary-200">
                        Create
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
