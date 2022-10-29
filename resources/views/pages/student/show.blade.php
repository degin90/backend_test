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
            <table class="table table-bordered table-hover dataTable dtr-inline datatables">
                <thead>
                    <th>ID</th>
                    <th>Avatar</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Dob</th>
                    <th>Action</th>
                </thead>
            </table>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        var oTable = $('.datatables').DataTable({
            "processing": true,
            "serverSide": true,
            "autoWidth": false,
            "ajax": {
                "url": "{{ route('student.ajax') }}",
                "type": "POST",
                "data": function(data) {
                    data._token = "{{ csrf_token() }}";
                },
            },
            "columns": [{
                    data: "id"
                },
                {
                    data: "avatar"
                },
                {
                    data: "name"
                },
                {
                    data: "gender"
                },
                {
                    data: "dob"
                },
                {
                    data: "action"
                }
            ]
        });
    </script>
@endsection
