<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    </head> 
    <form action="{{route('transaction')}}" class="col-md-6" method="post">
  <!-- Cross Site Request Forgery-->
  {{csrf_field()}}

<div align ="center">
<fieldset style="width:600x">
<table align="center">
    <div align="center">

    <div class="col-md-4 form-group">
          <tr> <td><b> <span>Student Name </span></td></b>
           <td> <input type="text" name="student" value="{{old('student')}}" class="form-control"></td>
           <td> @error('student')
                <span class="text-danger">{{$message}}</span>
            @enderror </td>
            </tr>
</div>

<div class="col-md-4 form-group">
          <tr> <td><b> <span>Amount </span></td></b>
           <td> <input type="text" name="amount" value="{{old('amount')}}" class="form-control"></td>
           <td> @error('amount')
                <span class="text-danger">{{$message}}</span>
            @enderror </td>
            </tr>
</div>
<div class="col-md-4 form-group">
          <tr> <td><b> <span>Date </span></td></b>
           <td> <input type="date" name="date" value="{{old('date')}}" class="form-control"></td>
           <td> @error('date')
                <span class="text-danger">{{$message}}</span>
            @enderror </td>
            </tr>
</div>


<tr><td align="center" colspan="2">
 <input type="submit" name="add"class="btn btn-primary" value="Add" ></td>
</tr>
</div> 
</table>
</fieldset>
<div align="right">
<a class="btn btn-primary" href="{{route('index')}}"> Back </a>
</div>

</div>
</form>