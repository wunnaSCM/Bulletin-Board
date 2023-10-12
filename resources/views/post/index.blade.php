@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <div class="flex justify-between">
            <form>
                <input type="search" class="form-control rounded-lg border" placeholder="Find user here" name="search"
                    value="{{ request('search') }}">
                <button type="sumbit"
                    class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-gray-300 rounded-lg border border-gray-200 hover:bg-primary hover:text-white-300 focus:z-10 focus:ring-4 focus:ring-gray-200">Search</button>
            </form>
            <div class="flex justify-end mb-3">
                {{-- Search Input --}}

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
        </div>

        @if ($posts->count())
            <div class="grid grid-cols-3 gap-8">
                @foreach ($posts as $post)
                    <div class="max-w-sm p-6 bg-white-300 border border-gray-200 rounded-lg shadow">
                        <a href={{ route('post.show', $post->id) }} class="mb-8">
                            <div class="flex justify-between">
                                <div class="text-gray-900 font-bold text-xl mb-2">{{ $post->title }}</div>
                            </div>
                            <div class="h-20">
                                <p class="line-clamp-3 text-gray-700 text-base">{{ $post->description }}</p>
                            </div>
                        </a>
                        <div class="flex items-center mt-5">
                            <img class="w-10 h-10 rounded-full mr-4"
                                src="{{ Storage::url('user_image/' . $post->user->profile) }}"
                                alt="Avatar of Jonathan Reinink">
                            <div class="text-sm">
                                <p class="text-primary leading-none">{{ $post->user->name }}</p>
                                <p class="text-gray-600">{{ $post->created_at->diffForHumans() }}</p>
                            </div>

                        </div>
                        <div class="flex items-center mt-5">
                            <a href="{{ route('post.edit', $post->id) }}"
                                class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-white-300 focus:outline-none bg-green-700 rounded-lg border border-gray-200 hover:bg-gray-300 hover:text-gray-950 focus:z-10 focus:ring-4 focus:ring-gray-200">
                                Edit
                            </a>
                            <a href="{{ route('post.delete', $post->id) }}" type="button"
                                class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-white-300 focus:outline-none bg-accent rounded-lg border border-gray-200 hover:bg-primary hover:text-gray-950 focus:z-10 focus:ring-4 focus:ring-gray-200"
                                data-confirm-delete="true">Delete</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="flex items-center justify-center overflow-y-hidden">
                <div class="text-center">
                    <p>This is no data: <x-carbon-no-ticket /></p>
                </div>
            </div>
        @endif

        @if ($posts->count())
            <div class="container mx-auto mt-10">
                <form method="GET" action="{{ route('post.index') }}">
                    <select name="perPage" class="px-2 py-1 border rounded" onchange="this.form.submit()">
                        <option value="6" {{ request()->get('perPage') == 6 ? 'selected' : '' }}>6</option>
                        <option value="12" {{ request()->get('perPage') == 12 ? 'selected' : '' }}>12</option>
                        <option value="24" {{ request()->get('perPage') == 24 ? 'selected' : '' }}>24</option>
                    </select>
                </form>
            </div>
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
