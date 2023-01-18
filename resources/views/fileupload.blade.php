<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style_fileup.css">
</head>

<body>
    @include('common.navbar')
    <div class="login-box">
        @if (!empty(session('signup_id')))
        <h2>Select File</h2>
       
        <form action="{{ url('upload') }}" enctype="multipart/form-data" method="post">
            {{ csrf_field() }}
            <div class="user-box">
                <input type="text" name="username" required="">
                <label>Username</label>
            </div>
            <div class="user-box">
                <input type="file" name="image" required="">
                {{-- <label>Password</label> --}}
                <select name="selection" id="">
                    <option value="public">public</option>
                    <option value="private">private</option>
                </select>
            </div>
            <input type="hidden" name="signup_id" value="{{ session('signup_id') }}">
            <input type="hidden" name="views" value="0">
                <input class="btn" type="submit" name="submit" value="upload">
          
            
          
        </form>
        @else
        <p class="loginfirst">You have to ligin first</p>
        @endif

    </div>
</body>

</html>
