@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <div class="flex justify-end mb-3">
            {{-- Search Input --}}
            <form>
                <input type="search" class="form-control" placeholder="Find user here" name="search"
                    value="{{ request('search') }}">
            </form>

            <a href="{{ route('post.create') }}"
                class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-gray-300 rounded-lg border border-gray-200 hover:bg-primary hover:text-white-300 focus:z-10 focus:ring-4 focus:ring-gray-200">
                Create
            </a>
            <a href="{{ route('post.import.view') }}"
                class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-gray-300 rounded-lg border border-gray-200 hover:bg-primary hover:text-white-300 focus:z-10 focus:ring-4 focus:ring-gray-200">
                Import
            </a>
            <a href="{{ route('post.export') }}"
                class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-gray-300 rounded-lg border border-gray-200 hover:bg-primary hover:text-white-300 focus:z-10 focus:ring-4 focus:ring-gray-200">
                Download
            </a>
        </div>
        <div class="grid grid-cols-3 gap-8">
            @if ($posts->count())
                @foreach ($posts as $post)
                    <div class="max-w-sm p-6 bg-white-300 border border-gray-200 rounded-lg shadow">
                        <div class="mb-8">
                            <div class="flex justify-between">
                                <div class="text-gray-900 font-bold text-xl mb-2">{{ $post->title }}</div>
                                {{-- <div>
                                    <button id="dropdownButton" data-dropdown-toggle="dropdown"
                                        class="inline-block text-gray-500 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg text-sm p-1.5"
                                        type="button">
                                        <span class="sr-only">Open dropdown</span>
                                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor" viewBox="0 0 16 3">
                                            <path
                                                d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                        </svg>
                                    </button>
                                    <!-- Dropdown menu -->
                                    <div id="dropdown"
                                        class="z-10 hidden text-base list-none bg-background divide-y divide-gray-100 rounded-lg shadow w-44">
                                        <ul class="py-2" aria-labelledby="dropdownButton">
                                            <li>
                                                <p>{{ $post->id }}</p>
                                                <a href="{{ route('post.edit', $post->id) }}"
                                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary hover:text-white-200">Edit</a>
                                            </li>
                                            <li>
                                                <form action="{{ route('post.delete', $post->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="block w-full px-4 py-2 text-sm text-red-600 hover:bg-primary hover:text-white-200">
                                                        <div class="flex justify-start">
                                                            Delete</div>
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="h-max">
                                <p class="text-gray-700 text-base">{{ $post->description }}</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <img class="w-10 h-10 rounded-full mr-4"
                                src="{{ asset('images/user_image/' . $post->user->profile) }}"
                                alt="Avatar of Jonathan Reinink">
                            <div class="text-sm">
                                <p class="text-primary leading-none">{{ $post->user->name }}</p>
                                <p class="text-gray-600">{{ $post->created_at->diffForHumans() }}</p>
                            </div>

                        </div>
                        <div class="flex items-center mt-5">
                            <a href="{{ route('post.edit', $post->id) }}"
                                class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-gray-300 rounded-lg border border-gray-200 hover:bg-primary hover:text-white-300 focus:z-10 focus:ring-4 focus:ring-gray-200">
                                Edit
                            </a>
                            <Form action="{{ route('post.delete', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-gray-300 rounded-lg border border-gray-200 hover:bg-primary hover:text-white-300 focus:z-10 focus:ring-4 focus:ring-gray-200">
                                    Delete
                                </button>
                            </Form>
                        </div>
                    </div>
                @endforeach
            @else
                <p>There is no data</p>
            @endif
        </div>

        @if ($posts->count())
            {{ $posts->links() }}
        @endif
    </div>
@endsection

@section('scripts')
    <script>
        function triggerFileInput() {
            document.getElementById('file').click();
        }
    </script>
@endsection
