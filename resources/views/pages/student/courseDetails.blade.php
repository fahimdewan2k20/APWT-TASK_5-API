@extends('layout.student')
@section('content')
    <h3>Course Details</h3>

    <ul class="w-100 d-flex flex-column align-items-left">
    <li>Course Name: {{$CourseDetails->course->course_name}}</li>
    <li>Course Id: {{$CourseDetails->course_id}}</li>
    <li>Time: {{$CourseDetails->course->schedule}}</li>
    <li>Semester: {{$CourseDetails->course->semester}}</li>
    <li>Teacher: {{$CourseDetails->course->teacher}}</li><br>


    @php 
         $c = $CourseDetails->course_id

     @endphp
     <table class="table table-bordered">
        <tr>
            <th>Assignment Name</th>
            <th>Assignment Description</th>
            <th>Assignment Duetime</th>
            <th>Your File</th>
            <th>Action</th>
        </tr>
        <tr>
            @foreach($assignmentDetails as $a)
            <td>{{$a->assignment->assignment_name}}</td>
            <td>{{$a->assignment->description}}</td>
            <td>{{$a->assignment->due_time}}</td>
            <td>{{$a->file_name}}</td>
            <td>

            @php 
                $d = $a->assignment_id
         
             @endphp
                
            <form enctype="multipart/form-data" method="post" action="{{route('uploadAssignment')}}">
                {{@csrf_field()}}
                <input type="hidden" name="c" value="{{$c}}">
                <input type="hidden" name="d" value="{{$d}}">
                <input type="file" name="assignment">
                <input type="submit" value="upload">
                @error('assignment')
                <span>{{$message}}</span>
                @enderror

            </form>
            </td>
            

        </tr>
        @endforeach
    </table>

   
@endsection
