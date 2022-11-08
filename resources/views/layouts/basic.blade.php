<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('main.index') }}">Main</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ route('post.index') }}">Posts</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ route('gallery.index') }}">Gallery</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ route('contact.index') }}">Contacts</a>
            </li>
            <li class="nav-item">
            <a class="btn btn-info" href="{{ route('post.create') }}" >Create new post</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>
    <div class="container">
    <div class="row">
        <div class="col">
            @yield('content')  
        </div>
    </div>
</div> 
    
</body>
</html>