<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    </head>
    <body>
        <div align ="center">
        <fieldset style="width:400px">
	<table align="center">
        <div align="center">
        <form action="{{URL::to('profile/' . $accountant->id)}}" class="col-md-6" method="post">
        <!-- Cross Site Request Forgery-->
        {{csrf_field()}}
    <div class="col-md-4 form-group">
          <tr> <td><b> <span>User Name </span></td></b>
           <td> <input type="text" name="username" value="{{$accountant->username}}" class="form-control"></td>
            @error('username')
                <span class="text-danger">{{$message}}</span>
            @enderror
            </tr>
</div>
<div class="col-md-4 form-group">
          <tr> <td><b> <span>Full Name </span></td></b>
           <td> <input type="text" name="fullname" value="{{$accountant->fullname}}" class="form-control"></td>
            @error('fullname')
                <span class="text-danger">{{$message}}</span>
            @enderror
            </tr>
</div>
<div class="col-md-4 form-group">
          <tr> <td><b> <span>Phone </span></td></b>
           <td> <input type="text" name="phone" value="{{$accountant->phone}}" class="form-control"></td>
            @error('phone')
                <span class="text-danger">{{$message}}</span>
            @enderror
            </tr>
</div>
<div class="col-md-4 form-group">
          <tr> <td><b> <span>Address </span></td></b>
           <td> <input type="text" name="address" value="{{$accountant->address}}" class="form-control"></td>
            @error('address')
                <span class="text-danger">{{$message}}</span>
            @enderror
            </tr>
</div>
        <div class="col-md-4 form-group">
        <tr> <td><b> <span>Date Of Birth </span></td></b>
            <td><input type="date" name="dob" value="{{$accountant->dob}}" class="form-control"></td>
</tr>
 </div>
 <tr><td align="center" colspan="2">
 <input type="submit" name="update"  class="btn btn-primary" value="update" ></td>
</tr>

</div> 
     
</table>
</feildset>
</form>
<div align="right">
<a class="btn btn-primary" href="{{route('index')}}"> Back </a>
</div>
</div>
</body>
