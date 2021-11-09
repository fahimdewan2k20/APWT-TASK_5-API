<html>
    <head>
    <style>
table, th, td {
  border: 2px solid blue;
  border-collapse: collapse;
}
th, td {
  padding: 15px;
}
</style>
</head>
    <body>
<div align="center">

<table style="width:70%">
    
           <thead>
        
            <th>User Name</th>
            <th>Full Name</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Date of Birth</th>
            <th>Depatment Name</th>
          

</thead>

        @foreach($students as $student)
            <tbody>
                <td>{{$student->username}}</td>
                <td>{{$student->fullname}}</td>
                <td>{{$student->phone}}</td>
                <td>{{$student->address}}</td>
                <td>{{$student->dob}}</td>
                <td>{{$student->department_name}}</td>
</tbody>
        @endforeach

    </table>
</div>
</body>
</html>