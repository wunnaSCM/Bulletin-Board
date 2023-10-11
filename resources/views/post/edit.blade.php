@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 py-12">
        <form action="{{ route('post.edit.confirm', $post->id) }}" method="POST" id="edit">
            @csrf
            <div class="bg-white-100 overflow-hidden shadow-lg sm:rounded-lg">
                <div class="px-6 pt-6">
                    <h1 class="text-2xl font-semibold">Update Post</h1>
                </div>
                <div class="px-6 pt-6">
                    <label for="title" class="block mb-3 text-sm font-medium text-gray-900">Title</label>
                    <input type="text" id="title" name="title" value="{{ $post->title }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                    @error('title')
                        <div class="text-red-600 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="px-6 pt-6">
                    <label for="description" class="block mb-3 text-sm font-medium text-gray-900">Description</label>
                    <textarea id="description" rows="4" name="description"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300">{{ $post->description }}</textarea>
                    @error('description')
                        <div class="text-red-600 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="px-6 pt-6">

                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" id="status" name="status"
                            @if ($post->status === 0) checked @endif class="sr-only peer">
                        <div
                            class="w-11 h-6 bg-gray-500 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-700">
                        </div>
                        <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Checked toggle</span>
                    </label>

                </div>

                <div class="flex justify-start px-6 pb-6">
                    <a href="{{ route('post.index') }}"
                        class="btn inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white-300 bg-primary rounded-lg focus:ring-4 focus:ring-primary-200 mr-4">
                        Back
                    </a>

                    <button type="button" onclick="clearField();"
                        class="btn inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white-300 bg-primary rounded-lg focus:ring-4 focus:ring-primary-200 mr-4">
                        Clear
                    </button>

                    <button type="submit"
                        class="btn inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white-300 bg-primary rounded-lg focus:ring-4 focus:ring-primary-200">
                        Cofirm
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        function clearField() {
            document.getElementById("title").value = '';
            document.getElementById("description").value = ''
            state = false;
        }
    </script>
@endsection
