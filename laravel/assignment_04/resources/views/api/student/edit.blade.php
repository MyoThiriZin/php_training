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
<div class="container mt-5">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <h3 class="mb-3">Edit a student</h3>
        <form action="" method="POST" id="form">
          @csrf
          <div class="form-group mb-3">
            <label for="first_name">First Name</label>
            <input type="text" class="form-control" name="first_name" id="first_name">
          </div>
          <div class="form-group mb-3">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" name="last_name" id="last_name">
          </div>
          <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email">
          </div>
          <div class="form-group mb-3">
            <label for="Phone">Phone Number</label>
            <input type="tel" class="form-control" name="phone" id="phone">
          </div>
          <div class="form-group mb-3">
            <label for="address">Address</label>
            <input type="text" class="form-control" name="address" id="address">
          </div>
          <div class="form-group mb-3">
            <label for="major">Major</label>
            <select class="form-select" name="major_id">
            </select>
          </div>
          
          <input type="submit" value="Update" class="btn btn-success" id="submit">
        </form>
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>

  <!-- ajax script -->
  <script src="{{ asset('js/edit.js') }}"></script>
</body>
</html>