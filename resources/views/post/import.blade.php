@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 py-12">
        <div class="bg-white-100 overflow-hidden shadow-lg sm:rounded-lg">
            <div class="px-6 pt-6">
                <h1 class="text-2xl font-semibold">Upload CSV File</h1>
            </div>
            <form action="{{ route('post.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="px-6 pt-6">
                    <input type="file" class="pointer" name="file" accept=".xlsx" id="file">
                    <div class="text-red-600 mt-2 text-sm">
                        @foreach ($errors->all() as $error)
                            {{ $error }} <br>
                        @endforeach
                    </div>
                </div>
                <div class="flex justify-start px-6 pb-6">
                    <button type="submit"
                        class="btn inline-flex items-center px-5 py-2.5 mr-3 sm:mt-6 text-sm font-medium text-center text-white-300 bg-primary rounded-lg focus:ring-4 focus:ring-primary-200">
                        Upload
                    </button>

                    <button type="button" id="resetbtn"
                        class="btn inline-flex items-center px-5 py-2.5 sm:mt-6 text-sm font-medium text-center text-white-300 bg-primary rounded-lg focus:ring-4 focus:ring-primary-200">
                        Clear
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#resetbtn').on('click', function(e) {
                let $el = $('#file');
                $el.wrap('<form>').closest(
                    'form').get(0).reset();
                $el.unwrap();
            });
        });
    </script>
@endsection
