@extends('layouts.app')

@section('content')
@if(Session('success'))
<div class="alert alert-success mt-3">
  <strong>{{ Session('success') }}</strong>
</div>
@endif

<a href="{{route('students.create')}}" class="btn btn-success my-3">Create</a>
<a href="{{url('importExportView')}}" class="btn btn-success my-3 ml-auto">Import/Export</a>


<div class="my-4" style="float: right;">
  <form class="form-inline my-2 my-lg-0" action="{{ url('students') }}" method="GET">
    @csrf
    <label for="keyword">Keyword:</label>
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="keyword" id="keyword">

    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</div>

@if(count($students)>0)
<table class='table my-5 table-hover table-bordered'>
  <tr class="bg-secondary text-white">
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
  @foreach($students as $student)
  <tr>
    <td>{{ $student->id }}</td>
    <td>{{ $student->first_name }}</td>
    <td>{{ $student->last_name }}</td>
    <td>{{ $student->email }}</td>
    <td>{{ $student->phone }}</td>
    <td>{{ $student->address }}</td>
    <td>{{ $student->major_name}}</td>
    <td>{{$student->created_at}}</td>
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
</table>
@else
<h4 class="text-danger text-center mt-5">No data!</h4>
@endif
@endsection