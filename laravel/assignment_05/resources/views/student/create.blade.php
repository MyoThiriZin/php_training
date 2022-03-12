@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <div class="row">
    <div class="col-offset-3 col-md-6">
      <h3 class="mb-3">Create a student</h3>
      <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
          <label for="f-name">First Name</label>
          <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" id="f-name" value="{{ old('first_name')}}">
          @error('first_name')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group mb-3">
          <label for="l-name">Last Name</label>
          <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" id="l-name" value="{{ old('last_name')}}">
          @error('last_name')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group mb-3">
          <label for="email">Email</label>
          <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email')}}">
          @error('email')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group mb-3">
          <label for="Phone">Phone Number</label>
          <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{ old('phone')}}">
          @error('phone')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group mb-3">
          <label for="address">Address</label>
          <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" value="{{ old('address')}}">
          @error('address')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group mb-3">
          <label for="major">Major</label>
          <select class="form-select form-control @error('major_id') is-invalid @enderror" name="major_id">
            <option value="">Select A major</option>
            @foreach ($majors as $major)
            <option value="{{$major->id}}">{{ $major->name }}</option>
            @endforeach
          </select>
        </div>
        <input type="submit" value="Create" class="btn btn-success">
      </form>
    </div>
  </div>
</div>

@endsection