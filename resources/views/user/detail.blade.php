@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 py-12">
        <div class="bg-white-100 overflow-hidden shadow-lg sm:rounded-lg">
            <div class="px-6 pt-6">
                <h1 class="text-2xl font-semibold">Profile</h1>
            </div>
            <div class="flex flex-row">
                <div class="px-6 pt-6">
                    <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-80 md:rounded-none md:rounded-l-lg"
                        src="{{ Storage::url('user_image/' . $user->profile) }}" alt="">
                </div>
                <div>
                    <div class="px-6 pt-6">
                        <div class="mb-3">
                            <span class="mr-3">Name: </span>
                            <p class="inline text-md mb-3 font-medium text-gray-900">{{ $user->name }}</p>
                        </div>

                        <div class="mb-3">
                            <span class="mr-3">Email: </span>
                            <p class="inline text-md mb-3 font-medium text-gray-900">{{ $user->email }}</p>
                        </div>

                        <div class="mb-3">
                            <span class="mr-3">Phone: </span>
                            <p class="inline text-md mb-3 font-medium text-gray-900">{{ $user->phone }}</p>
                        </div>

                        <div class="mb-3">
                            <span class="mr-3">Type: </span>
                            <p class="inline text-md mb-3 font-medium text-gray-900">
                                {{ $user->type === '1' ? 'Admin' : 'User' }}</p>
                        </div>

                        <div class="mb-3">
                            <span class="mr-3">Dato of Birth: </span>
                            <p class="inline text-md mb-3 font-medium text-gray-900">{{ $user->dob }}</p>
                        </div>

                        <div class="mb-3">
                            <span class="mr-3">Address: </span>
                            <p class="inline text-md mb-3 font-medium text-gray-900">{{ $user->address }}</p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="flex justify-start px-6 pb-6">
                <a href="javascript:history.back()"
                    class="btn inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white-300 bg-primary rounded-lg focus:ring-4 focus:ring-primary-200 mr-4">
                    Back
                </a>

                <a href="{{ route('user.change-password', $user->id) }}"
                    class="btn inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white-300 bg-primary rounded-lg focus:ring-4 focus:ring-primary-200">
                    Change Password
                </a>
            </div>
        </div>
    </div>
@endsection
