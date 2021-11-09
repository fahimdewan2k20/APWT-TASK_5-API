@extends('layout.teacher')

@section('title')
Index
@endsection

@section('content')

@include('inc.teacherCourseDetailsNav')

@if (sizeOf($course->notices) < 1)
    <span>No notice to show</span>
@else
<table class="w-100">
    <thead>
        <tr>
            <th>Subject</th>
            <th>Post Date</th>
        </tr>
    </thead>
    <tbody>
    @foreach($course->notices as $notice)
        <tr>
            <td class="w-50"><a href="" data-toggle="modal" data-target="#notice" onclick="getNoticeDetails({{$notice}})">{{$notice->title}}</a></td>
            <td class="w-50">{{$notice->upload_time}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
@endif

<br>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#postNotice">
  Post Notice
</button>

<div class="modal fade" id="postNotice" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Notice</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('teacher.postNotice')}}" method="post" class="d-flex flex-column">
            @csrf
            <input type="hidden" name="course_id" value="{{$course->course_id}}">
            <input type="hidden" name="username" value="fahim">
            <label for="title">Title</label>
            <input type="text" name="title">
            <label for="description">Description</label>
            <textarea name="description" cols="" rows="10"></textarea>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Post</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- view notice modal -->
<div class="modal fade" id="notice" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Notice</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('teacher.updateNotice')}}" method="post" class="d-flex flex-column">
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
        document.querySelector('#delete').href = "{{URL::to('/teacher/deleteNotice')}}" + '/' + notice.id;
    }
</script>
@endsection
