<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Slide Navbar</title>
        {{-- <link rel="stylesheet" type="text/css" href="slide navbar style.css">ss --}}
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style2.css">
    </head>

    <body>
        @include('common.navbar')
        <div class="main">

            <input type="checkbox" id="chk" aria-hidden="true">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="signup">

                <form action="{{ url('form_save') }}" method="POST">
                    @csrf
                    <label for="chk" aria-hidden="true">Sign up</label>
                    <input type="text" name="username" placeholder="User name" required="">
                    <input type="email" name="email" placeholder="Email" required="">
                    <input type="password" name="password" placeholder="Password" required="">
                    <input class="button" type="submit" name="submit" value="sign up">
                </form>
            </div>

            <div class="login">

                <form action="{{ url('login_form') }}" method="post">
                    {{ csrf_field() }}
                    <label for="chk" aria-hidden="true">Login</label>
                    <input type="email" name="email" placeholder="Email" required="">
                    <input type="password" name="password" placeholder="Password" required="">
                    <input class="button1" type="submit" name="submit" value="login">
                </form>
            </div>
        </div>
    </body>

    </html>
</body>

</html>
