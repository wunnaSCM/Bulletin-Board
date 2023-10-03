@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <div class="flex justify-between mb-3">
            {{-- Search Input --}}
            <form>
                <input type="search" class="form-control" placeholder="Name" name="name" value="{{ request('name') }}">

                <input type="search" class="form-control" placeholder="Email" name="email" value="{{ request('email') }}">

                <input type="date" class="form-control" placeholder="Created From" name="start"
                    value="{{ request('start') }}">

                <input type="date" class="form-control" placeholder="Find user here" name="end"
                    value="{{ request('end') }}">

                <button type="submit"
                    class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-gray-300 rounded-lg border border-gray-200 hover:bg-primary hover:text-white-300 focus:z-10 focus:ring-4 focus:ring-gray-200">
                    Search
                </button>
            </form>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
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
                    @if ($users->count())
                        @foreach ($users as $user)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50">
                                <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap">
                                    <img class="w-10 h-10 rounded-full"
                                        src="{{ asset('images/user_image/' . $user->profile) }}" alt="Jese image">
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
                                    {{ $user->type == 0 ? 'Admin' : 'User' }}
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
                                        <a href="#" class="font-medium text-accent hover:underline">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <p>There is no data</p>
                    @endif
                </tbody>
            </table>
        </div>
        @if ($users->count())
            {{ $users->links() }}
        @endif
    </div>
@endsection
