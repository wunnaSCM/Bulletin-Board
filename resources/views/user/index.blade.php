@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <div class="flex justify-between mb-3">
            <form>
                {{-- Search Input --}}
                <input type="search" class="form-control mr-3 rounded-lg border" placeholder="Name" id="name"
                    name="name" value="{{ request('name') }}">
                <input type="search" class="form-control mr-3 rounded-lg border" placeholder="Email" name="email"
                    value="{{ request('email') }}">
                <input type="text" class="form-control mr-3 rounded-lg border" placeholder="Start Date" name="start"
                    value="{{ request('start') }}" onfocus="(this.type='date')" onblur="(this.type='text')">
                <input type="text" class="form-control mr-3 rounded-lg border" placeholder="End Date" name="end"
                    value="{{ request('end') }}" onfocus="(this.type='date')" onblur="(this.type='text')">
                <button type="submit"
                    class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-gray-300 rounded-lg border border-gray-200 hover:bg-primary hover:text-white-300 focus:z-10 focus:ring-4 focus:ring-gray-200">
                    Search
                </button>
            </form>
        </div>
        @if ($users->count())
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-8">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-black uppercase bg-primary">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Created User
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Type
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Phone
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Date of Birth
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Address
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Created Date
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Updated Date
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Operation
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap">
                                    <img class="w-10 h-10 rounded-full"
                                        src="{{ $user->profile ? $user->profile : 'https://res.cloudinary.com/db3aejokb/image/upload/v1684981779/k0thepmdaacdqo7amr9w.jpg' }}"
                                        alt="Jese image">
                                    <div class="pl-3">
                                        <div class="text-base font-semibold">{{ $user->name }}</div>
                                        <div class="font-normal text-gray-500">{{ $user->email }}</div>
                                    </div>
                                </th>
                                <td class="px-6 py-4">
                                    @foreach ($users as $user_id)
                                        @if ($user_id->id == $user->created_user_id)
                                            {{ $user_id->name }}
                                        @endif
                                    @endforeach
                                </td>
                                <td class="px-6 py-4">
                                    {{ $user->type == 1 ? 'Admin' : 'User' }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $user->phone }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ date('Y/m/d', strtotime($user->dob)) }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $user->address }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ date('Y/m/d', strtotime($user->created_at)) }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ date('Y/m/d', strtotime($user->updated_at)) }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-between">
                                        <a href="{{ route('user.edit', $user->id) }}"
                                            class="font-medium text-green-500 hover:underline mr-4">Edit</a>
                                        <a href="{{ route('user.delete', $user->id) }}"
                                            class="font-medium text-accent hover:underline"
                                            data-confirm-delete="true">Delete</a>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        @else
            <div class="flex items-center h-screen justify-center overflow-y-hidden">
                <div class="text-center">
                    <p>This is no data: <x-carbon-no-ticket /></p>
                </div>
            </div>
        @endif
        @if ($users->count())
            <div class="container mx-auto mt-10">
                <form method="GET" action="{{ route('user.index') }}">
                    <select name="perPage" class="px-2 py-1 border rounded" onchange="this.form.submit()">
                        <option value="5" {{ request()->get('perPage') == 5 ? 'selected' : '' }}>5</option>
                        <option value="10" {{ request()->get('perPage') == 10 ? 'selected' : '' }}>10</option>
                        <option value="15" {{ request()->get('perPage') == 15 ? 'selected' : '' }}>15</option>
                    </select>
                </form>
            </div>
            {{ $users->links() }}
        @endif
    </div>
@endsection
