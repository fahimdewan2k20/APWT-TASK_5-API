@extends('layout.teacher')

@section('title')
Index
@endsection

@section('content')

@include('inc.teacherCourseDetailsNav')
<table class="w-100">
    <thead>
        <tr>
            <th>ID</th>
            <th>Student name</th>
            <th>Marks</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($course->students as $detail)
        <form action="{{route('teacher.gradeUpload', ['username' => 'fahim'])}}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$detail->course->grades->where('student', $detail->student)->first()->id}}">
            <tr>
                <td class="w-20">{{$detail->getStudent->username}}</td>
                <td class="w-40">{{$detail->getStudent->fullname}}</td>
                <td class="w-20"><input type="number" name="marks" value="{{$detail->course->grades->where('student', $detail->student)->first()->marks}}" min="0" max="100"></td>
                <!-- <td class="w-20">{{$detail->course->grades->where('student', $detail->student)->first()->marks}}</td> -->
                <td class="w-20"><button type="submit" class="btn py-2 px-0">Update</button></td>
            </tr>
        </form>
    @endforeach
    </tbody>
</table>
<hr>

@endsection