<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    </head> 
    <body>

    <h1 align="center" style="color:Tomato";> University Management System </h1>
     <hr style="width:100%;text-align:left;margin-left:0">
     <h2 align="center" style="color:MediumSeaGreen;"> ADD COURSE</h2>

    <form action="{{route('course')}}" class="col-md-6" method="post">
        <!-- Cross Site Request Forgery-->
        {{csrf_field()}}
    <div align ="center">
    <fieldset style="width:600x">
	<table align="center">
        <div align="center">
        
    <div class="col-md-4 form-group">
          <tr> <td><b> <span>Course Id </span></td></b>
           <td> <input type="text" name="courseid" value="{{old('courseid')}}" class="form-control"></td>
           <td> @error('courseid')
                <span class="text-danger">{{$message}}</span>
            @enderror </td>
            </tr>
</div>
<div class="col-md-4 form-group">
          <tr> <td><b> <span>Course Name </span></td></b>
           <td> <input type="text" name="coursename" value="{{old('coursename')}}" class="form-control"></td>
           <td> @error('coursename')
                <span class="text-danger">{{$message}}</span>
            @enderror </td>
            </tr>

<div class="col-md-4 form-group">
          <tr> <td><b> <span>Semester </span></td></b>
           <td>
<select name="semester" id="semester">
  <option value="summer">Summer</option>
  <option value="fall">Fall</option>
  <option value="spring">Spring</option>
</select>
</td>
           <td> @error('semester')
                <span class="text-danger">{{$message}}</span>
            @enderror </td>
            </tr>

<div class="col-md-4 form-group">
          <tr> <td><b> <span>Teacher </span></td></b>
           <td>  <select name="teacher" class="form control input-sm" >
                    @foreach($r as $v)
                    <option value="{{$v->username}}"> {{$v->username}} </option>
                    @endforeach
           </select></td>
           <td> @error('teacher')
                <span class="text-danger">{{$message}}</span>
            @enderror </td>
            </tr>
</div>

<div class="col-md-4 form-group">
        <tr> <td><b> <span>Schedule </span></td></b>
            <td><input type="text" name="schedule" value="{{old('schedule')}}" class="form-control"></td>
            <td> @error('schedule')
                <span class="text-danger">{{$message}}</span>
            @enderror </td>
</tr>
 </div>
 <div class="col-md-4 form-group">
        <tr> <td><b> <span>Days </span></td></b>
            <td><input type="text" name="days" value="{{old('days')}}" class="form-control"></td>
            <td> @error('days')
                <span class="text-danger">{{$message}}</span>
            @enderror </td>
</tr>
 </div>


 <div class="col-md-4 form-group">
        <tr> <td><b> <span>Status </span></td></b>
            <td><input type="text" name="status" value="{{old('status')}}" class="form-control"></td>
            <td> @error('status')
                <span class="text-danger">{{$message}}</span>
            @enderror </td>
</tr>
 </div>

 <tr><td align="center" colspan="2">
 <input type="submit" name="add"class="btn btn-primary" value="Register" ></td>
</tr>

</div> 
     
</table>
</feildset>
<div >
<a class="btn btn-primary" href="{{route('course')}}"> Back </a></div>
</div>
</form>
</body>
</head>
</html>