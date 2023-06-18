@extends('layout.main')

@section('content')
    <h3>Form Edit Students</h3>
    <div class="card">
        <div class="card-header">
            <a class="btn btn-sm btn-warning" onclick="window.location='{{ url('students') }}'">
                <i class="bi bi-back"></i> Back
            </a>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('students/' . $idstudent) }}">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <label for="idstudent" class="col-sm-2 col-form-label">ID Student</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control-plaintext" id="idstudent" name="idstudent"
                            value="{{ $idstudent }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="fullname" class="col-sm-2 col-form-label">Full Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('fullname') is-invalid @enderror" id="fullname"
                            name="fullname" value="{{ $fullname }}">
                        @error('fullname')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="gender">Gender</label>
                    <div class="col-sm-4">
                        <select class="form-select form-select @error('gender') is-invalid @enderror" id="gender"
                            name="gender">
                            <option selected disabled>Choose gender</option>
                            <option value="M" {{ $gender == 'M' ? 'selected' : '' }}>Male</option>
                            <option value="F" {{ $gender == 'F' ? 'selected' : '' }}>Female
                            </option>
                        </select>
                        @error('gender')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" value="{{ $email }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone"
                            name="phone" value="{{ $phone }}">
                        @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Save Data</button>
            </form>
        </div>
    </div>
@endsection
