@extends('layout.panel')
@section('content')
    <div class="col-md-4">
        <div class="card">
            <form action="{{ route('user.editpost') }}" method="POST">
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
                        <label>Username</label>
                        <input type="hidden" class="form-control" name="id" value="{{ $user->id }}">
                        <input type="text" class="form-control" name="username" value="{{ $user->username }}">
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="hidden" class="form-control" name="id" value="{{ $user->id }}">
                        <input type="text" class="form-control" name="username" value="{{ $user->username }}">
                    </div>
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" name="phone" value="{{ $user->phone }}">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name="address" value="{{ $user->address }}">
                    </div>
                    <div class="form-group">
                        <label>Bio</label>
                        <input type="text" class="form-control" name="bio" value="{{ $user->bio }}">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label>Retype Password</label>
                        <input type="password" class="form-control" name="repassword" placeholder="Retype Password">
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-md btn-info"><i class="fa fa-save"></i> Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
