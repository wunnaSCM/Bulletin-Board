@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 py-12">
        <div class="bg-white-100 overflow-hidden shadow-lg sm:rounded-lg">
            <div class="px-6 pt-6">
                <h1 class="text-2xl font-semibold">{{ $post->title }}</h1>
                <div class="flex flex-row mt-2">
                    <img class="w-12 h-12 rounded-full inline" src="{{ Storage::url('user_image/' . $post->user->profile) }}">
                    <div class="ml-2">
                        <span class="text-accent">Posted by {{ $post->user->name }}</span>
                        <span class="text-accent block">{{ $post->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            </div>
            <div class="flex flex-row">
                <div>
                    <div class="px-6 pt-6">
                        <div class="mb-3">
                            <p class="inline text-md mb-3 font-medium text-gray-900">{{ $post->description }}</p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="flex justify-start px-6 pb-6">
                <a href="javascript:history.back()"
                    class="btn inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white-300 bg-primary rounded-lg focus:ring-4 focus:ring-primary-200 mr-4">
                    Back
                </a>
            </div>
        </div>
    </div>
@endsection
