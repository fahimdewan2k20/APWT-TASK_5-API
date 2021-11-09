@extends('layout.student')
@section('content')
    @if(Session::has('reg'))

    @if($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>
    @endif
        <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Course Name</th>
            <th>Course Teacher</th>
            <th>Semester</th>
            
        </tr>
        <tr>
        @php
            $total = 0
        @endphp
            @foreach($reg as $r)
            <td>{{$r->course_id}}</td>
            <td>{{$r->course_name}}</td>
            <td>{{$r->teacher}}</td>
            <td>{{$r->semester}}</td>
            
            @php 
                        $total += 15000 
             @endphp

        </tr>
        @endforeach

        </table>
        <table class="table table-bordered">
        <tr height="80px">
            
            <th style="text-align:center; width:70%;" >Your total Amount is = {{$total}}

            <form action="{{route('confirm')}}" method="post">
            {{@csrf_field()}}
            <input type="hidden" name="total" value="{{$total}}">
            <input type="submit" class="btn btn-danger" value="confirm">
        </form>
            </th>
        </tr>
        </table>
        
        
    @else
        You have no subject.
    @endif
@endsection