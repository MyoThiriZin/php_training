@extends('layout')

@section('content')
<style>
  .edit-delete-btn {
    width: 70px;
  }
</style>

<table class="table">
    <thead>
        <tr class="table-warning">
        <th class="col">Id</th>
        <th class="col">First Name</th>
        <th class="col">Last Name</th>
        <th class="col">Email</th>
        <th class="col">Phone</th>
        <th class="col-md-2">Address</th>
        <th class="col">Major</th>
        <th class="col">Created at</th>
        <th class="col">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($students as $student)
      <tr>
        <td>{{ $student->id }}</td>
        <td>{{ $student->first_name }}</td>
        <td>{{ $student->last_name }}</td>
        <td>{{ $student->email }}</td>
        <td>{{ $student->phone }}</td>
        <td>{{ $student->address }}</td>
        <td>{{ $student->major_id}}</td>
        <td>{{$student->created_at->diffForHumans()}}</td>
            <td>
            <a href="{{ route('students.edit',$student->id) }}" class="btn btn-primary btn-sm me-2">Edit</a>
          <form action="{{ route('students.destroy',$student->id) }}" onsubmit="return confirm('Are you sure to delete?');" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  @endsection