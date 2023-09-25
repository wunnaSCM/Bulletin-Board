@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 py-12">
        <form action="{{ route('post.create.confirm') }}" method="POST" id="create">
            @csrf
            <input type="hidden" id="hidden-user_id" name="created_user_id" value="{{ Auth::user()->id }}"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
            <div class="bg-white-100 overflow-hidden shadow-lg sm:rounded-lg">
                <div class="px-6 pt-6">
                    <h1 class="text-2xl font-semibold">Create Post</h1>
                </div>
                <div class="px-6 pt-6">
                    <label for="title" class="block mb-3 text-sm font-medium text-gray-900">Title</label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                    @error('title')
                        <div class="text-red-600 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="px-6 pt-6">
                    <label for="description" class="block mb-3 text-sm font-medium text-gray-900">Description</label>
                    <textarea id="description" rows="4"
                        name="description" value="{{ old('description') }}"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300"
                        placeholder="Write your thoughts here..."></textarea>
                    @error('description')
                        <div class="text-red-600 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="flex justify-start px-6 pb-6">
                    <button onclick="clearField();" type="button"
                        class="btn inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white-300 bg-primary rounded-lg focus:ring-4 focus:ring-primary-200 mr-4">
                        Clear
                    </button>

                    <button type="submit"
                        class="btn inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white-300 bg-primary rounded-lg focus:ring-4 focus:ring-primary-200">
                        Confirm
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
<script>
    function clearField() {
        document.getElementById("create").reset();
    }
</script>
@endsection

