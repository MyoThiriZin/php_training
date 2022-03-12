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
        <th>Id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Major</th>
        <th>Created at</th>
        <th>Action</th>
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