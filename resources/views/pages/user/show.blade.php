@extends('layout.panel')
@section('content')

    <div class="card">
        <div class="card-body">
            @if (session('success'))
                <p class="alert alert-success">{{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </p>
            @endif
            <table class="table table-hover">
                <thead>
                    <th>NO</th>
                    <th>USERNAME</th>
                    <th>FULL NAME</th>
                    <th>EMAIL</th>
                    <th>PHONE</th>
                    <th></th>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>
                                <a href="{{ route('user.edit', ['id' => $user->id]) }}" class="btn btn-sm btn-info">
                                    <i class="fa fa-edit"></i></a>
                                <a href="{{ route('user.delete', ['id' => $user->id]) }}" class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
