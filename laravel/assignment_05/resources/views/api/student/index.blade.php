<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laravel assignment</title>
  <!-- bootstrap -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <!-- script -->
  <script src="{{ asset('js/library/jquery-3.6.0.min.js') }}"></script>
</head>
<body>
<div class="container mt-2">
  <div class="row">
    <div class="col-md-12">
      <nav class="navbar navbar-light bg-light">
          <div class="container-fluid">
            <a class="navbar-brand" href=''>Student List</a>
            <a class="btn btn-success" href="{{url('ajax/students/create')}}">Create Student</a>
          </div>
      </nav>
    </div>
  </div>
  
  <table class='table mt-5 table-hover table-bordered'>
    <thead>
      <tr class="bg-secondary text-white">
        <th class="col">Id</th>
        <th class="col">First Name</th>
        <th class="col">Last Name</th>
        <th class="col">Email</th>
        <th class="col">Phone</th>
        <th class="col-md-2">Address</th>
        <th class="col">Major</th>
        <th class="col">Created at</th>
        <th class="col">Edit and Delete</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
</div>
  <!-- ajax script -->
  <script src="{{ asset('js/index.js') }}"></script>
  <script></script>
  </body>
</html>