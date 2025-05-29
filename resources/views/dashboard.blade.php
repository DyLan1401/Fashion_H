<!DOCTYPE html>
<html>
<head>
    <title>Laravel 10.48.0 - CRUD User Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/scripts.js') }}"></script>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 30px;
        background-color: #f5f5f5;
    }

    h2 {
        margin-bottom: 20px;
    }

    form {
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        max-width: 600px;
    }

    form div {
        margin-bottom: 15px;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="number"],
    input[type="datetime-local"],
    select {
        width: 100%;
        padding: 8px 12px;
        border: 1px solid #ccc;
        border-radius: 6px;
    }

    button {
        background-color: #3490dc;
        color: white;
        border: none;
        padding: 10px 18px;
        border-radius: 6px;
        cursor: pointer;
    }

    button:hover {
        background-color: #2779bd;
    }

    .btn-primary {
        background-color: #38c172;
        padding: 8px 15px;
        border-radius: 6px;
        text-decoration: none;
        color: white;
    }

    .btn-primary:hover {
        background-color: #2d995b;
    }

    .alert {
        padding: 10px 15px;
        border-radius: 6px;
        margin-bottom: 15px;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background: white;
        margin-top: 20px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    table th, table td {
        padding: 10px;
        border: 1px solid #ccc;
        text-align: left;
    }

    table th {
        background-color: #f0f0f0;
    }

    form button[type="submit"] {
        margin-top: 10px;
    }
</style>

</head>
<body>
<nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #e3f2fd;">
    <div class="container">
        <a class="navbar-brand mr-auto" href="#">Laravel Training</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.createUser') }}">Create user</a>
                    </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('discounts.index') }}">Discounts</a>
        </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('signout') }}">Logout</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
@yield('content')
</body>
</html>
