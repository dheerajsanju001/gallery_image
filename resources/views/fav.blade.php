<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <link rel="stylesheet" href="https://cdn.tailgrids.com/tailgrids-fallback.css" />

    <!-- ====== Cards Section Start -->
    <section class="pt-20 lg:pt-[120px] pb-10 lg:pb-20 bg-[#F3F4F6]">
        {{-- <h6>Your Favorite Images Are Here</h6> --}}
        @include('common.navbar')
       <p class="text-center italic text-2xl"><i class="fa-sharp fa-solid fa-heart"></i>Your Favourite Pics <i class="fa-sharp fa-solid fa-heart"></i></p>
        <div class="container">

            @if (!empty(session('signup_id')))
                <div class="flex flex-wrap -mx-4">
                    @foreach ($data as $d)
                        <div class="w-full md:w-1/2 xl:w-1/3 px-4">


                            <div class="bg-white rounded-lg overflow-hidden mb-10">
                                <img src="storage/{{ $d->image }}" alt="image" class="w-full" />
                                <div class="p-8 sm:p-9 md:p-7 xl:p-9 text-center">
                                    <h3>
                                        views: <i class="fa-solid fa-eye"></i> {{ $d->views }}
                                    </h3>
                                    <p class="text-base text-body-color leading-relaxed mb-7">

                                    </p>
                                    <button
                                        class="  inline-block
                                            py-2
                                            px-7
                                            bg-blue-500
                                            border border-[#E5E7EB]
                                            rounded-full
                                            
                                            ">
                                        added by:{{ $d->username }}</button>
                                </div>
                            </div>
                        </div>

                </div>
            @endforeach
        @else
            <h1>You are not Logged In</h1>
            @endif

        </div>
    </section>
    <!-- ====== Cards Section End -->
</body>

</html>
