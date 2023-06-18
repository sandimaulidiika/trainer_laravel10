@extends('layout.main')

@section('content')
    <h3>Data Students</h3>
    <div class="card">
        <div class="card-header">
            <a class="btn btn-sm btn-primary" onclick="window.location='{{ url('students/add') }}'">
                <i class="bi bi-plus-circle-fill"></i> Add New Students
            </a>
        </div>
        <div class="card-body">
            @if (session('msg'))
                <div class="alert alert-success" role="alert">
                    <b>Success! </b>{{ session('msg') }}
                </div>
            @endif

            <table id="myTable" class="table table-striped" style="width:100%">
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
                            <td>
                                <a href="{{ url('students/' . $key->idstudent) }}" class="btn btn-info" title="edit data">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form style="display: inline" action="{{ url('students/' . $key->idstudent) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" title="hapus data"
                                        onclick="return deleteData('{{ $key->fullname }}')">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
            </table>
        </div>
    </div>
    <script>
        function deleteData(name) {
            message = confirm(`Sure delete data name  ` + name + '?')
            if (message) {
                return true;
            } else {
                return false;
            }
        }
    </script>
@endsection
