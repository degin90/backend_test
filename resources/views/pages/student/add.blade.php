@extends('layout.panel')
@section('content')
    <div class="col-md-4">
        <div class="card">
            <form action="{{ route('student.addpost') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    @if (session('success'))
                        <p class="alert alert-success">{{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </p>
                    @endif
                    @if ($errors->any())
                        @foreach ($errors->all() as $err)
                            <p class="alert alert-danger">{{ $err }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </p>
                        @endforeach
                    @endif

                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control" name="avatar" placeholder="Avatar Image">
                    </div>
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Full Name">
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <select class="form-control" name="gender">
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Date Of Birth</label>
                        <input type="date" class="form-control" name="bio" placeholder="Date Of Birth">
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-md btn-info"><i class="fa fa-save"></i> Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
