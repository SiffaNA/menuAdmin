@extends('layouts.app')

@section('title', 'Edit Role')

@section('content')
<div class="container">
    <h1>Edit Role</h1>
    <form action="{{ route('role.update', $role->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="role_name">Role Name</label>
        <input type="text" class="form-control" id="role_name" name="role_name" value="{{ $role->role_name }}" required>
    </div>
    <div class="form-group">
        <label for="menu_ids">Select Menu</label>
        <select class="form-control" id="menu_ids" name="menu_ids[]" required multiple>
            @foreach($menus as $menu)
                <option value="{{ $menu->id_menu }}" {{ in_array($menu->id_menu, $role->menus->pluck('id_menu')->toArray()) ? 'selected' : '' }}>{{ $menu->menu_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="row">
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('role.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</form>

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
