@extends('layout.teacher')

@section('title')
Index
@endsection

@section('content')

<h3>Courses</h3>
<hr>
@foreach($courses as $course)
<ul class="w-100 d-flex flex-row align-items-left">
    <li class='w-50'><a href="{{route('teacher.courseDetails', ['username' => 'fahim', 'course_id' => $course->course_id])}}" class='text-decoration-none'>{{$course->course_name}}</a></li>
    <li class='w-25'>{{$days[$course->days]}}</li>
    <li class='w-25'>{{$course->schedule}}</li>
</ul>
<hr>
@endforeach

@endsection