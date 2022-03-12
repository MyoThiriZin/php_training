
@extends('layout')

@section('content')
    <div class="card">
        <div class="card-header">
            Import Student Data
        </div>
        <div class="card-body">
        <form action="{{route('import')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Choose Your File</label>
                    <input type="file" name="file" class="form-control" required>
                    @if ($errors->has('file'))
                        <small class="text-danger">*{{ $errors->first('file') }}</small>
                    @endif
                </div>
                <input type="submit" value="Import Excel" class="btn btn-primary float-end">
            </form>
        </div>
    </div>
@endsection