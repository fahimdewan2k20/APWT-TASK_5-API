<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Profile</title>
</head>
<body>
    <h1>welcome {{session('id')}}</h1>
    <h3> EDIT User</h3>

    <a href='/admin/showUser'> Back </a> 
    <form method="post" enctype="multipart/form-data">
        @csrf
      <table>
          <tr>
              <td>Course ID</td>
              <td><input type="text" name="courseid" value="{{$course->course_id}}"></td>
          </tr>
          <tr>
            <td>Course Email</td>
            <td><input type="text" name="coursename" value="{{$course->course_name}}"></td>
        </tr>
        <tr>
            <td>Semester</td>
            <td><input type="text" name="semester" value="{{$course->semester}}"></td>
        </tr>
        <tr>
            <td>Teacher</td>
            <td><input type="text" name="teacher" value="{{$course->teacher}}"></td>
        </tr>
        <tr>
            <td>Status</td>
            <td><input type="text" name="status" value="{{$course->status}}"></td>
        </tr>

        <tr>
            <td></td>
            <td><input type="submit" name="update" class="btn btn-primary" value="update"></td>
        </tr>
      </table>
    </form>
      @foreach ($errors->all() as $error)
        {{$error}} <br>
      @endforeach
</body>
</html>