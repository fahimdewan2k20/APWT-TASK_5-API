@extends('layout.teacher')

@section('title')
Index
@endsection

@section('content')

@include('inc.teacherCourseDetailsNav')
<ul class="w-100 d-flex flex-column align-items-left">
    <li>Day: {{$days[$course->days]}}</li>
    <li>Time: {{$course->schedule}}</li>
    <li>Semester: {{$course->semester}}</li>
    <li>Course Teacher: {{$course->getTeacher->fullname}}</li>
    <li>Email: <i><u>{{$course->getTeacher->getUser->email}}</u></i></li>
</ul>
<hr>

@endsection