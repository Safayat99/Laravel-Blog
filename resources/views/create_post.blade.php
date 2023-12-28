<!-- x-app-layout.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <div>
            <section>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-sm-8 mt-5">
                            <div class="card mt-3 p-3">

                                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>
                                            <strong>
                                                Title
                                            </strong>
                                        </label>
                                        <input type="text" name="title" class="form-control" value="{{ old('title') }}"
                                            placeholder="Title... " />
                                    </div>

                                    <div class="form-group">
                                        <label>
                                            <strong>
                                                Description...
                                            </strong>
                                        </label>
                                        <textarea type="text" name="description" class="form-control" rows="4"
                                            value="{{ old('description') }}" placeholder="Description... "></textarea>
                                    </div>

                                    <button type="submit" class="btn btn-white">Submit</button>

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
</body>

</html>
