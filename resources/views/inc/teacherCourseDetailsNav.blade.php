<h4>{{$course->course_name}}</h4>
<hr>
<div class='mb-4'>
    <a href="{{route('teacher.courseDetails', ['username' => 'fahim', 'course_id' => $course->course_id])}}" class="btn btn-secondary">TSF</a>
    <a href="{{route('teacher.getStudents', ['username' => 'fahim', 'course_id' => $course->course_id])}}" class="btn btn-secondary">Students</a>
    <a href="{{route('teacher.assignments', ['username' => 'fahim', 'course_id' => $course->course_id])}}" class="btn btn-secondary">Assignment</a>
    <a href="{{route('teacher.notes', ['username' => 'fahim', 'course_id' => $course->course_id])}}" class="btn btn-secondary">Notes</a>
    <a href="{{route('teacher.notices', ['username' => 'fahim', 'course_id' => $course->course_id])}}" class="btn btn-secondary">Notices</a>
</div>