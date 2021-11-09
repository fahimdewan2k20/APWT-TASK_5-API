@extends('layout.student')

@section('content')

    <table class="table table-bordered">
        <tr>
            <th>Course Name</th>
            <th>Mark</th>
           
        </tr>
        <tr>
            @foreach($grade as $g)
            <td>{{$g->courseDetails->course_name}}</td>
            <td>{{$g->marks}}</td>
           
            

        </tr>
        @endforeach

    </table>

@endsection