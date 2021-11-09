@extends('layout.student')

@section('content')
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Course Name</th>
            <th>Course Details</th>
        </tr>
        <tr>
            @foreach($CourseDetails as $c)
            <td>{{$c->course_id}}</td>
            <td>{{$c->course->course_name}}</td>
            <td>
                <a class="btn btn-info" href="{{route('courseDetails',['id'=>$c->course_id])}}">Details</a>
            </td>
            

        </tr>
        @endforeach

    </table>

@endsection