@extends('layouts.app')

@section('title', 'Menu List')

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

    <h1>Daftar Menu</h1>

    <div class="row">
        <div class="col-md-6">
            <a href="{{ route('menu.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Tambah</a>
        </div>
        <div class="col-md-6 text-right">
            <div class="search-form">
                <form action="{{ route('menu.index') }}" method="GET">
                    <input type="text" name="search" placeholder="Cari Menu">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </form>
            </div>
        </div>
    </div>

    <br>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Menu ID</th>
                    <th>Nama Menu</th>
                    <th>Link Menu</th>
                    <th>Kategori Menu</th>
                    <th>Sub Menu</th>
                    <th>Posisi Menu</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($masterMenus as $key => $menu)
                    <tr class="{{ $key % 2 == 0 ? 'even-row' : 'odd-row' }}">
                        <td>{{ $menu->id_menu }}</td>
                        <td>{{ $menu->menu_name }}</td>
                        <td>{{ $menu->menu_link }}</td>
                        <td>{{ $menu->menu_category }}</td>
                        <td>{{ $menu->submenu_name }}</td>
                        <td>{{ $menu->menu_position }}</td>
                        <td>
                            <a href="{{ route('menu.edit', $menu->id_menu) }}" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a>
                            <form action="{{ route('menu.destroy', $menu->id_menu) }}" method="POST" style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirmDelete()"><i class="fas fa-trash-alt"></i> Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
    @parent
    <script>
        function confirmDelete() {
            return confirm('Apakah Anda yakin ingin menghapus data ini?');
        }
    </script>
    <style>
        table {
            border-collapse: collapse;
            border: 1px solid #b2eaf8;
            width: 100%;
        }
        th, td {
            border: 1px solid #b2eaf8;
            padding: 8px;
        }
        .even-row {
            background-color: #b2eaf8;
        }
        .odd-row {
            background-color: #b2eaf8;
        }
    </style>
@endsection
