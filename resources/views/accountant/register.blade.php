<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    </head> 
    <form action="{{route('register')}}" class="col-md-6" method="post">
        <!-- Cross Site Request Forgery-->
        {{csrf_field()}}

    <div align ="center">
    <fieldset style="width:600x">
	<table align="center">
        <div align="center">
        
    <div class="col-md-4 form-group">
          <tr> <td><b> <span>User Name </span></td></b>
           <td> <input type="text" name="username" value="{{old('username')}}" class="form-control"></td>
           <td> @error('username')
                <span class="text-danger">{{$message}}</span>
            @enderror </td>
            </tr>
</div>
<div class="col-md-4 form-group">
          <tr> <td><b> <span>Full Name </span></td></b>
           <td> <input type="text" name="fullname" value="{{old('fullname')}}" class="form-control"></td>
           <td> @error('fullname')
                <span class="text-danger">{{$message}}</span>
            @enderror </td>
            </tr>
</div>
<div class="col-md-4 form-group">
          <tr> <td><b> <span>Phone </span></td></b>
           <td> <input type="text" name="phone" value="{{old('phone')}}" class="form-control"></td>
           <td> @error('phone')
                <span class="text-danger">{{$message}}</span>
            @enderror </td>
            </tr>
</div>
<div class="col-md-4 form-group">
          <tr> <td><b> <span>Address </span></td></b>
           <td> <input type="text" name="address" value="{{old('address')}}" class="form-control"></td>
           <td> @error('address')
                <span class="text-danger">{{$message}}</span>
            @enderror </td>
            </tr>
</div>
        <div class="col-md-4 form-group">
        <tr> <td><b> <span>Date Of Birth </span></td></b>
            <td><input type="date" name="dob" value="{{old('dob')}}" class="form-control"></td>
</tr>
 </div>
 <div class="col-md-4 form-group">
        <tr> <td><b> <span>Department Name </span></td></b>
            <td><input type="text" name="department_name" value="{{old('department_name')}}" class="form-control"></td>
</tr>
 </div>

 <tr><td align="center" colspan="2">
 <input type="submit" name="add"class="btn btn-primary" value="Register" ></td>
</tr>

</div> 
     
</table>
</feildset>
<div align="right">
<a class="btn btn-primary" href="{{route('index')}}"> Back </a></div>
</div>
</form>
