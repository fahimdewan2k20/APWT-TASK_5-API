<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    </head> 
    <body>
    <h1 align="center" style="color:Tomato";> University Management System </h1>
    <hr style="width:100%;text-align:left;margin-left:0">
    <h2 align="center" style="color:MediumSeaGreen;">ADD NEW USER</h2>

    <form action="{{route('adduser')}}" class="col-md-6" method="post">
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
          <tr> <td><b> <span>E-mail </span></td></b>
           <td> <input type="email" name="email" value="{{old('email')}}" class="form-control"></td>
           <td> @error('email')
                <span class="text-danger">{{$message}}</span>
            @enderror </td>
            </tr>
</div>
<div class="col-md-4 form-group">
          <tr> <td><b> <span>Password </span></td></b>
           <td> <input type="password" name="password" value="{{old('password')}}" class="form-control"></td>
           <td> @error('password')
                <span class="text-danger">{{$message}}</span>
            @enderror </td>
            </tr>

 </div>
 <div class="col-md-4 form-group">
        <tr> <td><b> <span>Identity </span></td></b>
            <td><input type="text" name="identity" value="{{old('identity')}}" class="form-control"></td>
</tr>
</div>
 <!-- <div class="col-md-4 form-group">
        <tr> <td><b> <span>User Type </span></td></b>
            <td><select name="Type" id="User">
  <option value="Teacher">Teacher</option>
  <option value="Accountant">Accountant</option> -->

</select></td>
</tr>
 </div>
 <tr><td align="center" colspan="2">
 <input type="submit" name="add"class="btn btn-primary" value="Register" ></td>
</tr>

</div> 
     
</table>
</feildset>
<div >
<a class="btn btn-primary" href="{{route('adduser')}}"> Back </a></div>
</div>
</form>
</body>
</html>
