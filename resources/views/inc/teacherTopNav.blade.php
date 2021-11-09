<nav class='d-flex flex-row algin-items-center justify-content-center mb-2'>
    <div>
        <a href="{{route('teacher.home', ['username' => 'fahim'])}}" class="btn btn-dark">Home</a>
        <a href="{{route('teacher.profile', ['username' => 'fahim'])}}" class="btn btn-dark">Profile</a>
        <a href="" class="btn btn-dark">Leave Application</a>
        <a href="{{route('logout')}}" class="btn btn-danger">Logout</a>
    </div>
</nav>