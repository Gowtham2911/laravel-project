<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body>
<div class="container mt-4">
<div class="row">
<div class="col-sm-12">
<h4>File Upload using Ajax in Laravel</h4>
</div>
</div>
<form action="{{ route('user.upload') }}" method="POST" enctype="multipart/form-data" id="laravel-ajax-file-upload" >
<div class="row">
<div class="col-md-12">
<div class="form-group">
<input type="file" name="file" placeholder="Choose File" id="file">
</div>
</div>
<div class="col-md-12">
<button type="submit" class="btn btn-primary">Submit</button>
</div>
</div>     
</form>
<div id="image" style="width:10%;"></div>
</div>
</body>
<script type="text/javascript">
$(document).ready(function (e) {
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$('#laravel-ajax-file-upload').submit(function(e) {
e.preventDefault();
var formData = new FormData(this);
$.ajax({
type:'POST',
url: "{{ url('/store-file')}}",
data: formData,
cache:false,
contentType: false,
processData: false,
success: (data) => {
this.reset();
alert('File has been uploaded successfully');
$('#image').append('<img src="{{url('/')}}/uploads/'+data.body+'"/>');
console.log(data);
},
error: function(data){
console.log(data);
}
});
});
});
</script>
</html>
</html>