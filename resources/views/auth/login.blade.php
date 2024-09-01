<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
        .box{
            width:600px;
            margin:0 auto;
            border:1px solid #ccc;
            padding: 20px;
            margin-top: 50px;
        }

        ul {
            list-style: none;
        }
    </style>
</head>
<body>
<div class="container box">
    <h3 align="center">Login</h3><br />

    @if ($errors->any())
        <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('authenticate') }}">
        @csrf
        <div class="form-group">
            <label for="email">Enter Email</label>
            <input id="email" type="email" name="email" class="form-control" required autofocus>
        </div>

        <div class="form-group">
            <label for="password">Enter Password</label>
            <input id="password" type="password" name="password" class="form-control" required>
        </div>

        <div class="form-group">
            <input type="submit" name="login" class="btn btn-primary" value="Login" />
        </div>
    </form>
</div>
</body>
</html>
