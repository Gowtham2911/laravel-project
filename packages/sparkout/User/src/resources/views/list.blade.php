<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <title>Document</title>
</head>
<body>
<div class="topcorner" style="float:right;padding:8px 16px;">
    <a class="btn btn-primary" href="{{ route('user.file') }}">File Upload</a>
</div>
<div class="topcorner" style="float:right;padding:8px 16px;">
    <a class="btn btn-primary" href="{{ route('user.index') }}">Add User</a>
</div>
<table id="table_id" class="display">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th >Actions</th>
        </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
        <a class="btn btn-primary" href="{{ route('user.edit',$user->id) }}">Edit</a>
        <a class="btn btn-primary" href="{{ route('user.destroy',$user->id) }}">Delete</a></td>
   </tr>
   @endforeach 
    </tbody>
</table>
</body>
</html>
<script>
    $(document).ready( function () {
    $('#table_id').DataTable();
} );
    </script>