@extends('layout.student')

@section('content')
    <table class="table table-bordered">
        <tr>
            <th>Course Name</th>
            <th>Title</th>
            <th>description</th>
            <th>Post time</th>
        </tr>
        <tr>
            @foreach($notice as $n)
            <td>{{$n->course->course_name}}</td>
            <td>{{$n->title}}</td>
            <td>{{$n->description}}</td>
            <td>{{$n->upload_time}}</td>
        </tr>
        @endforeach

    </table>

@endsection