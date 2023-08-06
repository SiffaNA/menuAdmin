@extends('layouts.app')

@section('title', 'Create Role')

@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container">
    <h1>Create Role</h1>
    <form action="{{ route('role.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="role_name">Role Name</label>
        <input type="text" class="form-control" id="role_name" name="role_name" required>
    </div>
    <div class="form-group">
        <label for="menu_id">Select Menu</label>
        <select class="form-control" id="menu_id" name="menu_id" required>
            @foreach($menus as $menu)
                <option value="{{ $menu->id_menu }}">{{ $menu->menu_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
        <a href="{{ route('role.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</form>

</div>
@endsection

@section('styles')
<style>
    h1 {
        color: rgb(3, 1, 18);
        font-size: 24px;
    }

    .btn-success {
        background-color: green;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
    }

    .btn-primary {
        background-color: blue;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
    }
</style>
@endsection
