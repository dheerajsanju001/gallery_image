<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    @include('common.navbar')
    <div class="max-w-2xl mx-auto">

        <div
            class="bg-white shadow-md border border-gray-200 rounded-lg max-w-sm dark:bg-gray-800 dark:border-gray-700 mt-20">
            <a href="#">
                @foreach ($data as $d)
                    <img class="rounded-t-lg  " src="storage/store/{{ $d->image }}" alt="">


            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="text-gray-900 font-bold text-2xl tracking-tight mb-2 dark:text-white">
                        welcome on image</h5>
                </a>
                @endforeach
                @foreach ($comment as $r)
                    <p>Commented by {{ $r->one->username }}:<i class="fa-solid fa-comment"></i>{{ $r->comment }}</p>
                @endforeach


            </div>

        </div>
    </div>

    </div>
</body>

</html>
