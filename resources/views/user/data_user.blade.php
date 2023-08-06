@extends('layouts.app')

@section('title', 'Data User')

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
        <h1>Data User</h1>
        <div class="row">
            <div class="col-md-12">
                <!-- Tambahkan tombol tambah di sini -->
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{ route('user.create') }}" class="btn btn-primary">Tambah</a>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="search-form">
                            <form action="{{ route('user.index') }}" method="GET">
                                <input type="text" name="search" placeholder="Cari User">
                                <button type="submit" class="btn btn-primary">Cari</button>
                            </form>
                        </div>
                    </div>
                </div>

                <br>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>User Name</th>
                                <th>User Email</th>
                                <th>User Gender</th>
                                <th>User Photo</th>
                                <th>Role</th>
                                <th>User Token</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $userData)
                                <tr>
                                    <td>{{ $userData->user_name }}</td>
                                    <td>{{ $userData->user_email }}</td>
                                    <td>{{ $userData->user_gender }}</td>
                                    <td>
                                        @if ($userData->user_photo)
                                            <img src="{{ asset('storage/' . $userData->user_photo) }}" alt="User Photo" style="width: 100px; height: auto;">
                                        @else
                                            No Photo
                                        @endif
                                    </td>
                                    <td>
                                        @if ($userData->role)
                                            {{ $userData->role->role_name }}
                                        @else
                                            Role not assigned
                                        @endif
                                    </td>
                                    <td>{{ $userData->user_token }}</td>
                                    <td>
                                        <a href="{{ route('user.edit', ['id' => $userData->id]) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('user.destroy', $userData->id) }}" method="POST" onsubmit="return confirmDelete()">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function confirmDelete() {
            return confirm('Apakah Anda yakin ingin menghapus data ini?');
        }
    </script>
    <style>
        table {
            border-collapse: collapse;
            border: 1px solid #ccc;
            width: 100%;
        }
        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
        }
    </style>
@endsection
