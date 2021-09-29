<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<form action="{{ route('valid') }}" method="POST">
{{csrf_field()}}

   
 <div class="col-sm-3">

    

<div class="form-group">
<label>Name:</label>
<input type="text" name="name" class="form-control" placeholder="Enter your name">
</div>
<div class="form-group">
<label>Email:</label>
<input type="text" name="email" class="form-control" placeholder="Enter your email">
</div>
<div class="form-group">
<label>Password:</label>
<input type="password" name="password" class="form-control" placeholder="Enter your password">
</div>

<div class="form-group">
<label>Confirm_Password:</label>
<input type="password" name="confirm_password" class="form-control" placeholder="Enter your password">
</div>

<div class="form-group">
<button  class="btn btn-success">Submit</button>
</div>

<p>If you are already registered please<a href="/login"> login here</a></p>

</form>
</body>
</html>