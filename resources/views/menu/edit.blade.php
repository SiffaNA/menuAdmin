@extends('layouts.app')

@section('title', 'Edit Menu')

@section('content')
    <div class="container">
        <h1>Edit Menu</h1>

        <form action="{{ route('menu.update', $menu->id_menu) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- <div class="form-group row">
                <label for="id_menu" class="col-sm-2 col-form-label">ID Menu</label>
                <div class="col-sm-10">
                    <input type="number" name="id_menu" id="id_menu" class="form-control" value="{{ $menu->id_menu }}" required>
                </div>
            </div> -->

            <div class="form-group row">
                <label for="menu_name" class="col-sm-2 col-form-label">Nama Menu</label>
                <div class="col-sm-10">
                    <input type="text" name="menu_name" id="menu_name" class="form-control" value="{{ $menu->menu_name }}" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="menu_link" class="col-sm-2 col-form-label">Link Menu</label>
                <div class="col-sm-10">
                    <input type="text" name="menu_link" id="menu_link" class="form-control" value="{{ $menu->menu_link }}" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="menu_category" class="col-sm-2 col-form-label">Kategori Menu</label>
                <div class="col-sm-10">
                    <select name="menu_category" id="menu_category" class="form-control" required>
                        <option value="">Pilih Kategori</option>
                        <option value="Master Menu" {{ $menu->menu_category === 'Master Menu' ? 'selected' : '' }}>Master Menu</option>
                        <option value="Sub Menu" {{ $menu->menu_category === 'Sub Menu' ? 'selected' : '' }}>Sub Menu</option>
                    </select>
                    <div class="form-group mt-3" id="subMenuDiv" style="display: {{ $menu->menu_category === 'Sub Menu' ? 'block' : 'none' }}">
                        <label for="menu_sub">Sub Menu</label>
                        <input type="text" name="menu_sub" id="menu_sub" class="form-control" value="{{ $menu->menu_sub }}">
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="menu_position" class="col-sm-2 col-form-label">Posisi Menu</label>
                <div class="col-sm-10">
                    <input type="number" name="menu_position" id="menu_position" class="form-control" value="{{ $menu->menu_position }}" required>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('menu.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    @parent
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const menuCategoryField = document.getElementById('menu_category');
            const subMenuDiv = document.getElementById('subMenuDiv');

            function toggleSubMenuField() {
                const selectedValue = menuCategoryField.value;
                subMenuDiv.style.display = selectedValue === 'Sub Menu' ? 'block' : 'none';
            }

            menuCategoryField.addEventListener('change', toggleSubMenuField);
            toggleSubMenuField(); // Eksekusi awal ketika halaman dimuat

            // Penambahan event listener untuk menyembunyikan sub menu ketika "Master Menu" dipilih
            menuCategoryField.addEventListener('change', function() {
                if (menuCategoryField.value === 'Master Menu') {
                    document.getElementById('menu_sub').value = ''; // Menghapus nilai sub menu
                    subMenuDiv.style.display = 'none'; // Menyembunyikan bidang sub menu
                }
            });
        });
    </script>
@endsection


@section('styles')
    @parent
    <style>
        h1 {
            color: rgb(1, 1, 20);
            font-size: 24px;
        }
        .form-control {
            width: 100%;
        }
    </style>
@endsection
