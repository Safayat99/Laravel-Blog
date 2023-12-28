<x-app-layout>
        <x-slot name="header">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Dashboard') }}
                    </h2>
                </div>
                <div class="col-md-6 text-right">
                    <form method="GET" action="{{route('post.search')}}" class="ml-4">
                        <div class="input-group">
                            <input class="form-control" name="search" placeholder="Search...">
                                <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </x-slot>
    

    <div class="py-12">
        @if(session()->has('status'))
        {{ session('status') }}
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- Added CSS Styles -->
                    <style>
                        /* Center the content within the page */
                        .max-w-7xl {
                            margin: 0 auto;
                        }

                        /* Style for the table */
                        .table {
                            width: 100%;
                            border-collapse: collapse;
                            margin-top: 1em;
                        }

                        .table th,
                        .table td {
                            border: 1px solid #e2e8f0;
                            padding: 0.75em;
                            text-align: left;
                        }

                        .table th {
                            background-color: #f8fafc;
                        }

                        /* Style for buttons */
                        .btn {
                            display: inline-block;
                            padding: 0.375em 0.75em;
                            font-size: 1rem;
                            font-weight: 600;
                            line-height: 1.5;
                            text-align: center;
                            text-decoration: none;
                            white-space: nowrap;
                            cursor: pointer;
                            border-radius: 0.25rem;
                        }

                        .btn-dark {
                            background-color: #4a5568;
                            color: #ffffff;
                        }

                        .btn-danger {
                            background-color: #e53e3e;
                            color: #ffffff;
                        }
                    </style>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Action</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($post as $post)
                            <tr>
                                <td>{{ $post->user->name }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->description }}</td>
                                <td>
                                    <a href="{{ url('/post/edit', $post->id) }}"
                                        class="btn btn-dark btn-sm">Edit</a>
                                </td>
                                <td>
                                    <a href="{{ url('/post/delete', $post->id) }}"
                                        class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
