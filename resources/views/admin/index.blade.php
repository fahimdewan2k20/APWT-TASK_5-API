<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    </head>

<body>
<h1 align="center" style="color:Tomato";> University Management System </h1>
<hr style="width:100%;text-align:left;margin-left:0">

   <div align="center">
<a class="btn btn-primary" href="{{route('home')}}">Home</a>
<a class="btn btn-primary" href="{{URL::to('list')}}">Users Profile</a>
<a class="btn btn-primary" href="{{route('course')}}">Add Course</a>
<a class="btn btn-primary" href="{{route('adduser')}}">Add User</a>
<a class="btn btn-primary" href="{{route('logout')}}">Logout</a>
<a class="btn btn-primary" href="#">Grade Report</a>
<a class="btn btn-primary" href="#">Leaves</a>




</div>
</body>
</html>