@extends('layout.main')

@section('content')
    <h3>Data Students</h3>
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-sm btn-primary">
                <i class="bi bi-plus-circle-fill"></i> Add New Students
            </button>
        </div>
        <div class="card-body">
            <table id="table" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $key)
                        <tr>
                            <td>{{ $key->idstudent }}</td>
                            <td>{{ $key->fullname }}</td>
                            <td>{{ $key->gender == 'M' ? 'Male' : 'Female' }}</td>
                            <td>{{ $key->email }}</td>
                            <td>{{ $key->phone }}</td>
                            <td></td>
                        </tr>
                    @endforeach
            </table>
        </div>
    </div>
@endsection
