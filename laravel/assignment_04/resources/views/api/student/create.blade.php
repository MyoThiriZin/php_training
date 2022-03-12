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
      @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
      <div class="col-md-6">
        <h3 class="mb-3">Create a student</h3>
        <form action="" method="POST" id="form">
          @csrf
          <div class="form-group mb-3">
            <label for="f-name">First Name</label>
            <input type="text" class="form-control  @error('first_name') is-invalid @enderror"  name="first_name" id="f-name">
          </div>
          <div class="form-group mb-3">
            <label for="l-name">Last Name</label>
            <input type="text" class="form-control" name="last_name" id="l-name">
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
          <input type="submit" value="Create" class="btn btn-success" id="submit">
        </form>
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>
  <!-- ajax script -->
  <script src="{{ asset('js/create.js') }}"></script>
</body>
</html>