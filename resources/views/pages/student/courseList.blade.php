@extends('layout.student')

@section('content')
@if($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Course Name</th>
            <th>Course Teacher</th>
            <th>Semester</th>
            <th>Action</th>
        </tr>
        <tr>
            @foreach($courses as $c)
            <td>{{$c->course_id}}</td>
            <td>{{$c->course_name}}</td>
            <td>{{$c->teacher}}</td>
            <td>{{$c->semester}}</td>
            <td>
                <a class="btn btn-info" href="{{route('student.AddCourse',['id'=>$c->id])}}">Add this course</a>
            </td>
            

        </tr>
        @endforeach

    </table>
    <a class="btn btn-info" href="{{route('student.showRegistration')}}">Show</a>

@endsection