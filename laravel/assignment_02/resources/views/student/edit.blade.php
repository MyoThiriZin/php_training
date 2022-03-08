@extends('layouts.app')

@section('content')
  <div class="container mt-5">
    <div class="row">
      <div class="col-offset-3 col-md-6">
        <h3 class="mb-3">Update a student</h3>
        <form action="{{  route('students.update',$student->id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group mb-3">
            <label for="f-name">First Name</label>
            <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" id="f-name" value="{{ $student->first_name ?? old('first_name')}}">
            @error('first_name')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group mb-3">
            <label for="l-name">Last Name</label>
            <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" id="l-name" value="{{ $student->last_name ?? old('last_name')}}">
            @error('last_name')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ $student->email ?? old('email')}}">
            @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group mb-3">
            <label for="Phone">Phone Number</label>
            <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{ $student->phone ?? old('phone')}}">
            @error('phone')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group mb-3">
            <label for="address">Address</label>
            <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" value="{{ $student->address ?? old('address')}}">
            @error('address')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group mb-3">
            <label for="major">Major</label>
            <select class="form-select form-control @error('major') is-invalid @enderror" name="major_id">
              @foreach ($majors as $major)
                @if($student->major_id == $major->id) {
                    <option value="{{ $major->id }}" selected>{{ $major->name }}</option>
                }
                @else
                    <option value="{{ $major->id }}">{{ $major->name }}</option>
                @endif
              @endforeach
          </select>
          </div>
          

          <input type="submit" value="Update" class="btn btn-success">
        </form>
      </div>
@endsection