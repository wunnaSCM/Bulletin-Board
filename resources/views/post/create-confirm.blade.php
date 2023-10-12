@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 py-12">
        <form action="{{ route('post.store') }}" method="POST">
            @csrf
            <div class="bg-white-100 overflow-hidden shadow-lg sm:rounded-lg">
                <div class="px-6 pt-6">
                    <h1 class="text-2xl font-semibold">Create Post Confirmation</h1>
                </div>
                <div class="px-6 pt-6">
                    <div class="flex flex-start">
                        <div class="mr-10">
                            <label for="title" class="mb-3 text-sm font-medium text-gray-900">Title:</label>
                        </div>
                        <div>
                            <p id="title" class="inline">{{ $request->title }}</p>
                            <input type="hidden" id="hidden-title" name="title" value="{{ $request->title }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                        </div>
                    </div>
                </div>

                <div class="px-6 pt-6">
                    <div class="flex flex-start">
                        <div class="mr-10">
                            <label for="description" class="mb-3 text-sm font-medium text-gray-900">Description: </label>
                        </div>
                        <div>
                            <p id="description" class="inline">{{ $request->description }}</p>
                            <input type="hidden" id="hidden-description" name="description"
                                value="{{ $request->description }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                        </div>
                    </div>
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

@section('scripts')
    <script>
        var title = document.getElementById('title').innerText;
        document.getElementById('hidden-title').value = title;
        var description = document.getElementById('description').innerText;
        document.getElementById('hidden-description').value = description;
    </script>
@endsection
