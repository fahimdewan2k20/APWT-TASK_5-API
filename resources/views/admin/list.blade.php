<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<h1 align="center" style="color:Tomato";> University Management System </h1>
<hr style="width:100%;text-align:left;margin-left:0">
<h1 align="center" style="color:MediumSeaGreen;"> USERS PROFILE</h1>
<div align ="center">
    
    <table class="table table-borded">
        <thead>
            
                <th>Course Id</th>
                <th>Course Name</th>
                <th>Semester</th>
                <th>Teacher</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>

            
    </thead>
    <tbody>
            @foreach($list as $course)
                <tr>
                    <td>{{$course->course_id}}</td>
                    <td>{{$course->course_name}}</td>
                    <td>{{$course->semester}}</td>
                    <td>{{$course->teacher}}</td>
                    <td>{{$course->status}}</td>
                    <td><a class="btn btn-primary" href="/course/{{$course->id}}/edit"> Edit</a></td>
                    <td><a class="btn btn-danger" href="/course/{{$course->id}}/delete/"> Delete</a></td>

                </tr>

            @endforeach

    </tbody>
        </table>
    </div>
</body>
</html>
