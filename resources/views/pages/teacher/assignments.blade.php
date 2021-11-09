@extends('layout.teacher')

@section('title')
Index
@endsection

@section('content')

@include('inc.teacherCourseDetailsNav')

@if (sizeOf($course->assignments) < 1)
    <span>Nothing to show</span>
@else
<table class="w-100">
    <thead>
        <tr>
            <th>Name</th>
            <th>Assignment</th>
            <th>Due Date</th>
        </tr>
    </thead>
    <tbody>
    @foreach($course->assignments as $assignment)
        <tr>
            <td class="w-50"><a href="" data-toggle="modal" data-target="#assignment" onclick="getAssignmentDetails({{$assignment}})">{{$assignment->assignment_name}}</a></td>
            <td class="w-25">{{$assignment->description}}</td>
            <td class="w-25">{{$assignment->due_time}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
@endif

<br><br>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#uploadNote">
  Assign New
</button>

<div class="modal fade" id="uploadNote" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Assignment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('teacher.uploadAssignment')}}" method="post" class="d-flex flex-column">
            @csrf
            <input type="hidden" name="course_id" value="{{$course->course_id}}">
            <label for="lecture_name">Assignment Name</label>
            <input type="text" name="lecture_name">
            <br>
            <label for="description">Assignment File</label>
            <input type="file" name="description">
            <br>
            <label for="due_time">Due Time</label>
            <input type="date" name="due_time">
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Upload</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- view notice modal -->
<div class="modal fade" id="assignment" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Notice</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('teacher.updateNote')}}" method="post" class="d-flex flex-column">
            @csrf
            <input type="hidden" name="notice_id" id="id">
            <label for="title">Title</label>
            <input type="text" name="title" id="title">
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="" rows="10"></textarea>
            <div class="modal-footer" id="modal-footer">
                <button type="submit" class="btn btn-success">Update</button>
                <a href="" class="btn btn-danger" id="delete">Delete</a>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<hr>

<script>
    function getNoticeDetails(notice) {
        document.querySelector('#id').value = notice.id;
        document.querySelector('#title').value = notice.title;
        document.querySelector('#description').value = notice.description;
        document.querySelector('#delete').href = "{{URL::to('/teacher/deleteNote')}}" + '/' + notice.id;
    }
</script>
@endsection
