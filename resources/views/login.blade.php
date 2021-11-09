<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        .login-div {
            width: 300px;
        }
    </style>
    <title>Login</title>
</head>
<body>
    <h1 align="center" class="py-3">University Management System</h1>
    <hr><br><br>

	<form action="{{route('login')}}" method="post" class="d-flex justify-content-center align-items-center">
        @csrf
        <div align="center" class="login-div">
            <label for="username">User Name</label>
            <input type="text" class="form-control" name="username">
            <br>
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password">
            <br>
            <input type="submit" name="submit" class="btn btn-primary"  class="form-control">
        </div>
	</form>
    @if($failed)
    <div class="alert alert-danger" role="alert">
        Incorrect username or password
    </div>
    @endif
</body>
</html>