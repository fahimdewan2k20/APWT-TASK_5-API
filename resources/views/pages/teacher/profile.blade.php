@extends('layout.teacher')

@section('title')
Profile
@endsection

@section('content')

<h3>Profile</h3>
<hr>
<p>Username: {{$teacher->username}}</p>
<p>Full Name: {{$teacher->fullname}}</p>
<p>Email: {{$teacher->getUser->email}}</p>
<p>Identity: Teacher</p>
<p>Phone: {{$teacher->phone}}</p>
<p>Address: {{$teacher->address}}</p>
<p>Date of Birth: {{$teacher->dob}}</p>
<p>Department: {{$teacher->department_name}}</p>
<hr>
<a href="" class="btn btn-primary" data-toggle="modal" data-target="#update">Update</a>
<a href="" class="btn btn-secondary" data-toggle="modal" data-target="#changePassword">Change Password</a>

<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('teacher.updateProfile', ['username' => $teacher->username])}}" method="post" class="d-flex flex-column">
            @csrf
            <input type="text" name="username" value="{{$teacher->username}}" disabled>
            <br>
            <label for="fullname">Full Name</label>
            <input type="text" name="fullname" value="{{$teacher->fullname}}">
            @error('fullname')
                <span class="text-danger">{{$message}}</span>
            @enderror
            <br>
            <label for="email">Email</label>
            <input type="email" name="email" value="{{$teacher->getUser->email}}">
            @error('email')
                <span class="text-danger">{{$message}}</span>
            @enderror
            <br>
            <label for="phone">Phone</label>
            <input type="number" name="phone" value="{{$teacher->phone}}">
            @error('phone')
                <span class="text-danger">{{$message}}</span>
            @enderror
            <br>
            <label for="address">Address</label>
            <input type="text" name="address" value="{{$teacher->address}}">
            @error('address')
                <span class="text-danger">{{$message}}</span>
            @enderror
            <br>
            <label for="dob">Date of Birth</label>
            <input type="date" name="dob" value="{{$teacher->dob}}">
            @error('dob')
                <span class="text-danger">{{$message}}</span>
            @enderror
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('teacher.changePassword', ['username' => $teacher->username])}}" method="post" class="d-flex flex-column">
            @csrf
            <label for="password">Current Password</label>
            <input type="password" name="password" value="">
            <br>
            <label for="new_password">New Password</label>
            <input type="password" name="new_password" value="">
            <br>
            <label for="verify_password">Re-enter Password</label>
            <input type="password" name="verify_password" value="">
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection