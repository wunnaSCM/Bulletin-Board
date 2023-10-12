@extends('layouts.app')
@section('content')
    <section class="bg-background">
        <div class="py-8 px-4 mx-auto max-w-4xl lg:py-16">
            <h2 class="mb-4 text-2xl font-bold text-gray-900">Add User</h2>
            <form action="{{ route('user.create.confirm') }}" method="POST" enctype="multipart/form-data" id="create">
                @csrf
                <div class="grid gap-4 sm:grid-cols-4 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                            class="bg-white-300 border border-gray-300 text-gray-950 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        @error('name')
                            <div class="text-red-600 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                        <input type="text" name="email" id="email" value="{{ old('email') }}"
                            class="bg-white-300 border border-gray-300 text-gray-950 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        @error('email')
                            <div class="text-red-600 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
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
                    </div>
                    <div class="sm:col-span-2">
                        <label for="type" class="block mb-2 text-sm font-medium text-gray-900">Type</label>
                        <select id="type" name="type"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                            <option value="0">Admin</option>
                            <option value="1">User</option>
                        </select>
                        @error('type')
                            <div class="text-red-600 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">Phone</label>
                        <input type="number" name="phone" id="phone" value="{{ old('phone') }}"
                            class="bg-white-300 border border-gray-300 text-gray-950 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        @error('phone')
                            <div class="text-red-600 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="dob" class="block mb-2 text-sm font-medium text-gray-900">Date of Birth</label>
                        <input type="date" name="dob" id="dob" value="{{ old('dob') }}"
                            class="bg-white-300 border border-gray-300 text-gray-950 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        @error('dob')
                            <div class="text-red-600 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <div class="sm:col-span-2">
                        <label for="address" class="block mb-2 text-sm font-medium text-gray-900">Address</label>
                        <input type="text" name="address" id="address" value="{{ old('address') }}"
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
                        <img id="selectedImage" src="" alt="Selected Image">
                        @error('profile')
                            <div class="text-red-600 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="flex justify-start py-4">
                    <button onclick="clearField();" type="button"
                        class="btn inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white-300 bg-primary rounded-lg focus:ring-4 focus:ring-primary-200 mr-4">
                        Clear
                    </button>

                    <button type="submit"
                        class="btn inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white-300 bg-primary rounded-lg focus:ring-4 focus:ring-primary-200">
                        Add
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        document.getElementById('selectedImage').style.visibility = 'hidden';
        profile.onchange = evt => {
            const [file] = profile.files
            if (file) {
                selectedImage.src = URL.createObjectURL(file)
                document.getElementById('selectedImage').style.visibility = 'visible';
            }
        }

        function clearField() {
            document.getElementById("create").reset();
            var image_x = document.getElementById('selectedImage');
            image_x.parentNode.removeChild(image_x);
        }
    </script>
@endsection
