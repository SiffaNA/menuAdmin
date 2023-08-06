@extends('layouts.app')

@section('title', 'Create User')

@section('content')
    <!-- Tampilkan notifikasi jika ada -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tampilkan notifikasi jika ada kesalahan -->
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="container">
        <h1>Create User</h1>
        <div class="row">
            <div class="col-md-12">
                <!-- Tambahkan form untuk menambahkan data user di sini -->
                <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Tambahkan input fields untuk data user di sini -->
                    <div class="form-group">
                        <label for="user_name">User Name</label>
                        <input type="text" class="form-control" id="user_name" name="user_name" required>
                    </div>

                    <div class="form-group">
                        <label for="user_email">User Email</label>
                        <input type="email" class="form-control" id="user_email" name="user_email" required>
                    </div>

                    <div class="form-group">
                        <label for="user_gender">User Gender</label>
                        <select class="form-control" id="user_gender" name="user_gender" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="user_photo">User Photo</label>
                        <input type="file" class="form-control-file" id="user_photo" name="user_photo" required>
                    </div>

                    <div class="form-group">
                        <label for="role_id">Role ID</label>
                        <select class="form-control" id="role_id" name="role_id" required>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="user_token">User Token</label>
                        <input type="text" class="form-control" id="user_token" name="user_token" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('user.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        h1 {
            color: blue;
            font-size: 24px;
        }

        .btn-primary {
            background-color: blue;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        .btn-secondary {
            background-color: gray;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
    </style>
@endsection
