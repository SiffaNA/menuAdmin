<!-- resources/views/role/role.blade.php -->
@extends('layouts.app')

@section('title', 'Role Page')

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
        <h1>Role Page</h1>

        <!-- Tombol Tambah Role -->
        <div class="row mb-3">
            <div class="col-md-6">
                <a href="{{ route('role.create') }}" class="btn btn-primary">Tambah</a>
            </div>
            <div class="col-md-6 text-right">
                <div class="search-form form-inline">
                    <!-- Form Pencarian Role -->
                    <form action="{{ route('role.index') }}" method="GET">
                        <input type="text" name="search" class="form-control mr-2" placeholder="Cari Role">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Tabel Data Role -->
        <div class="table-responsive">
            <table class="table table-bordered table-gray">
                <thead>
                    <tr>
                        <th>Role ID</th>
                        <th>Role Name</th>
                        <th>Menu</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->role_name }}</td>
                            <td>
                                @foreach($role->menus as $menu)
                                    {{ $menu->menu_name }}<br>
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('role.edit', $role->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('role.destroy', $role->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirmDelete()">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

<!-- ... Bagian konten sebelumnya ... -->

<!-- ... Bagian konten sebelumnya ... -->

@section('scripts')
    @parent
    <script>
        function confirmDelete() {
            return confirm('Apakah Anda yakin ingin menghapus data ini?');
        }

        // Fungsi untuk menampilkan notifikasi sukses penghapusan dan perbarui tampilan setelah 2 detik
        @if(session('success'))
            document.addEventListener('DOMContentLoaded', function() {
                const successAlert = document.querySelector('.alert-success');
                if (successAlert) {
                    setTimeout(function() {
                        successAlert.style.display = 'none'; // Sembunyikan notifikasi
                        location.reload(); // Perbarui halaman
                    }, 2000); // Waktu jeda sebelum perbarui halaman (dalam milidetik)
                }
            });
        @endif
    </script>
    <style>
        table {
            border-collapse: collapse;
            border: 1px solid #ccc;
            width: 100%;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
        }
        .even-row {
            background-color: #f2f2f2;
        }
        .odd-row {
            background-color: #e8e8e8;
        }
    </style>
@endsection
