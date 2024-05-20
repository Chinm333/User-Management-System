<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management System</title>
    <link rel="stylesheet" href="{{ url('css/login.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
</head>

<body>
    <div class="login">
        <form action="{{route('users.checkLogin')}}" method="post">
            @csrf
            @method('post')
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <ol>{{ $error }} !, try again</ol>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h3>Login Here</h3>
            <div class="box">
                <label for="email" class="sub_title">Email address</label>
                <input type="email" class="textBox" id="email" name="email" placeholder="Enter email">
            </div>
            <div class="box">
                <label for="password" class="sub_title">Password</label>
                <input type="password" class="textBox" id="password" name="password" placeholder="Enter password">
            </div>
            <div class="buttons">
                <input type="submit" class="btn" value="Login">
            </div>
        </form>
    </div>
</body>

</html>
