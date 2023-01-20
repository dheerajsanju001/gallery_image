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
    <section class="max-w-6xl  px-6  sm:px-6 lg:px-12 py-12 flex ">

        @foreach ($data as $d)
            <div class="text-center pb-11 line-height: 1rem;">


            </div>
            <div class="grid grid-cols-1 break-words  m-3.5 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-20 ">
                <div class="w-full bg-white rounded-lg p-20  flex flex-col justify-center items-center">
                    <a href="show{{ $d->id }}">
                        <div class="mb-8">
                            <p class="text-base text-gray-400 font-normal">uploaded by:{{ $d->signup->username }}</p>
                            <img width="100px" class="object-center object-cover rounded-full h-36 w-36"
                                src="storage/store/{{ $d->image }}">
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

                    <div class="flex mx-auto items-center justify-center shadow-lg  mx-8 mb-4 max-w-lg">
                        <form class="w-full max-w-xl bg-white rounded-lg px-4 pt-2"
                            action="comment_form{{ $d->id }}" method="post">
                            {{ csrf_field() }}
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Add a new comment</h2>
                                <div class="w-full md:w-full px-3 mb-2 mt-2">
                                    <input class="bg-blue" type="hidden" value="{{ session('signup_id') }}"
                                        name="sign_id">
                                    <input class="bg-blue" type="hidden" value="{{ $d->id }}" name="pic_id"
                                        placeholder="image">
                                    <textarea
                                        class="bg-gray-100 rounded border border-gray-400 
             leading-normal resize-none w-full h-20 py-2 px-3 font-medium 
             placeholder-gray-700 focus:outline-none focus:bg-white"
                                        name="comment" placeholder='Type Your Comment' required></textarea>
                                </div>
                                <div class="w-full md:w-full flex items-start md:w-full px-3">
                                    <div class="flex items-start w-1/2 text-gray-700 px-2 mr-auto">
                                        <svg fill="none" class="w-5 h-5 text-gray-600 mr-1" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            {{-- <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/> --}}
                                        </svg>
                                    </div>
                                    <div class="-mr-1">
                                        @if (!empty(session('signup_id')))
                                            <input type='submit'
                                                class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg
                 tracking-wide mr-1 hover:bg-gray-100"
                                                name="submit" value='Post Comment'>
                                        @else
                                            <a href="login"><input type='button'
                                                    class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg
                 tracking-wide mr-1 hover:bg-gray-100"
                                                    name="submit" value='Login first'></a>
                                        @endif
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>


            </div>
            </div>
        @endforeach
    </section>
</body>

</html>
