<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>

<body>
    @include('common.navbar')
    <section class="max-w-6xl m-auto px-4 sm:px-6 lg:px-4 py-12 flex ">

        @foreach ($data as $d)
            <div class="text-center pb-11 line-height: 1rem;">


            </div>
            <div class="grid grid-cols-1 break-words  m-3.5 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-20 ">
                <div class="w-full bg-white rounded-lg p-12  flex flex-col justify-center items-center">
                    <a href="show{{ $d->id }}">
                        <div class="mb-8">
                            <p class="text-base text-gray-400 font-normal">uploaded by:{{ $d->signup->username }}</p>
                            <img width="100px" class="object-center object-cover rounded-full h-36 w-36"
                                src="storage/{{ $d->image }}">
                            <p><i class="fa-solid fa-eye"></i>{{ $d->views }}</p>

                        </div>
                        <div class="text-center">
                            <p class="text-xl text-gray-700 font-bold mb-2"></p>




                        </div>
                        <form action="form_data" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="image" value="{{ $d->image }}">
                            <input type="hidden" name="username" value="{{ $d->signup->username }}">
                            <input type="hidden" name="views" value="{{ $d->views }}">
                            <input class="mt-2 ml-3 rounded-2xl p-2 sm-10 bg-blue-500" type="submit" name="submit"
                                value="Add to favourite">

                        </form>

                    </a>


                </div>
            </div>
        @endforeach
    </section>
</body>

</html>
