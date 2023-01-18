<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="navbar">
        <div class="navbar-container container">
            <input type="checkbox" name="" id="">
            <div class="hamburger-lines">
                <span class="line line1"></span>
                <span class="line line2"></span>
                <span class="line line3"></span>
            </div>
            <ul class="menu-items">
                <li><a href="home">Home</a></li>
                <li><a href="fileupload">Upload</a></li>
                <li><a href="fav">Favourite</a></li>
                @if (empty(session('signup_id')))
                    <li><a href="login">Login</a></li>
                @else
                    <li><a href="{{ url('form_back') }}">Logout</a></li>
                @endif


                <li><a href="pvtpost{{ session('signup_id') }}">User Posts</a></li>

            </ul>

            <h1 class="logo">GALLERY</h1>
        </div>
        
    </nav>
</body>

</html>
