<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ ('Edit Post') }}
        </h2>
    </x-slot>

    <div>
        <section>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-8 mt-5">
                        <div class="card mt-3 p-3">

                            <!-- Added CSS Styles -->
                            <style>
                                body {
                                    font-family: 'Arial', sans-serif;
                                    background-color: #f4f4f4;
                                    margin: 0;
                                    padding: 0;
                                    box-sizing: border-box;
                                }

                                .x-app-layout {
                                    margin: 20px;
                                }

                                .card {
                                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                                    border-radius: 10px;
                                    background-color: #ffffff;
                                    padding: 20px;
                                }

                                .form-group {
                                    margin-bottom: 20px;
                                }

                                label {
                                    font-weight: bold;
                                    display: block;
                                    margin-bottom: 5px;
                                }

                                input[type="text"],
                                textarea {
                                    width: 100%;
                                    padding: 10px;
                                    border: 1px solid #ccc;
                                    border-radius: 6px;
                                    box-sizing: border-box;
                                    margin-top: 5px;
                                    margin-bottom: 10px;
                                }

                                button {
                                    background-color: #3490dc;
                                    color: #ffffff;
                                    padding: 12px 20px;
                                    border: none;
                                    border-radius: 6px;
                                    cursor: pointer;
                                    font-size: 16px;
                                    transition: background-color 0.3s ease;
                                }

                                button:hover {
                                    background-color: #2779bd;
                                }

                                .x-slot h2 {
                                    font-size: 1.5rem;
                                    color: #3490dc;
                                    margin-bottom: 15px;
                                }

                                /* Responsive Design */
                                @media (max-width: 768px) {
                                    .col-sm-8 {
                                        width: 100%;
                                    }
                                }
                            </style>

                            <form action="{{ route('post.update', ['id' => $post->id]) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>
                                        <strong>
                                            Title
                                        </strong>
                                    </label>
                                    <input type="text" name="title" class="form-control" value="{{ $post->title }}" />
                                </div>

                                <div class="form-group">
                                    <label>
                                        <strong>
                                            Description...
                                        </strong>
                                    </label>
                                    <textarea type="text" name="description" class="form-control"
                                        rows="4">{{ $post->description }}</textarea>
                                </div>

                                <button type="submit" class="btn btn-white">Update</button>

                            </form>

                            @if(session()->has('status'))
                            {{ session('status') }}
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
