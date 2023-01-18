<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Image_gallery</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>

<body>



    <div class="py-16 bg-gradient-to-br from-green-50 to-cyan-100">
        @include('common.navbar')

        <div class="container m-auto px-6 text-gray-600 md:px-12 xl:px-6">
            <div class="mb-12 space-y-2 text-center">
                {{-- <span class="block w-max mx-auto px-3 py-1.5 border border-green-200 rounded-full bg-green-100 text-green-600">POSTS:</span> --}}
                <h2 class="text-2xl text-cyan-900 font-bold md:text-4xl">Private Posts:<i class="fa-solid fa-lock"></i>
                </h2>

            </div>
            @if (!empty(session('signup_id')))
                <div class="grid gap-12 lg:grid-cols-2">

                    @foreach ($data as $d)
                        <div
                            class="p-1 rounded-xl group sm:flex space-x-6 bg-white bg-opacity-50 shadow-xl hover:rounded-2xl">
                            <a href="show{{ $d->id }}">
                                <img src="storage/{{ $d->image }}" alt="art cover" loading="lazy" width="1000"
                                    height="667"
                                    class="h-56 sm:h-full w-full sm:w-5/12 object-cover object-top rounded-lg transition duration-500 group-hover:rounded-xl">
                                <div class="sm:w-7/12 pl-0 p-5">
                                    <div class="space-y-2">
                                        <div class="space-y-4">
                                            <h4 class="text-2xl font-semibold text-cyan-900">UPLOADED
                                                BY:{{ $d->username }}</h4>
                                            <p><a href="{{ 'pvtpost/' . $d->id }}">Delete post:<i
                                                        class="fa-solid fa-trash"></i></a></p>
                                        </div>
                            </a>
                        </div>
                </div>
        </div>
        @endforeach
    @else
        <h1>you have to login first</h1>
        @endif
    </div>
    </div>
    </div>
</body>

</html>
