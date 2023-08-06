@extends('layouts.app')

@section('title', 'Create Menu')

@section('content')
    <h1>Tambah Menu</h1>

    <form action="{{ route('menu.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="menu_name">Nama Menu</label>
            <input type="text" name="menu_name" id="menu_name" class="form-control" pattern="[A-Za-z ]+" title="Nama menu hanya boleh berisi huruf" required>
        </div>

        <div class="form-group">
            <label for="menu_link">Link Menu</label>
            <input type="text" name="menu_link" id="menu_link" class="form-control" pattern="[A-Za-z0-9/]+" title="Link menu hanya boleh berisi huruf, angka, dan garis miring" required>
        </div>

        <div class="form-group">
            <label for="menu_category">Kategori Menu</label>
            <select name="menu_category" id="menu_category" class="form-control" required>
                <option value="">Pilih Kategori</option>
                <option value="master menu">Master Menu</option>
                <option value="sub menu">Sub Menu</option>
            </select>
        </div>

        <div id="subMenuDiv" style="display: none;">
            <div class="form-group">
                <label for="menu_sub">Sub Menu</label>
                <select class="form-control" id="menu_sub" name="menu_sub" required>
                    @foreach($masterMenus as $menu)
                        <option value="{{ $menu->id_menu }}">{{ $menu->menu_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="menu_position">Posisi Menu</label>
            <input type="number" name="menu_position" id="menu_position" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Tambah</button>
        <a href="{{ route('menu.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection

@section('scripts')
    <script>
        document.getElementById('menu_category').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex].value;
            var subMenuDiv = document.getElementById('subMenuDiv');
          
            if (selectedOption === 'Sub Menu') {
                subMenuDiv.style.display = 'block';
            } else {
                subMenuDiv.style.display = 'none';
            }
        });
    </script>
    <style>
        h1 {
            color: rgb(3, 1, 18);
            font-size: 24px;
        }

        .btn-primary {
            background-color: blue;
            color: rgb(138, 186, 212);
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        .btn-secondary {
            background-color: rgb(3, 1, 10);
            color: rgb(138, 198, 220);
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
    </style>
@endsection
