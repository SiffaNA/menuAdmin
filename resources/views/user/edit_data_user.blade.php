@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
    <div class="container">
        <h1>Edit User</h1>

        <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="user_name">User Name</label>
                <input type="text" name="user_name" id="user_name" class="form-control" value="{{ $user->user_name }}" required>
            </div>

            <div class="form-group">
                <label for="user_email">User Email</label>
                <input type="email" name="user_email" id="user_email" class="form-control" value="{{ $user->user_email }}" required>
            </div>

            <div class="form-group">
                <label for="user_gender">User Gender</label>
                <select name="user_gender" id="user_gender" class="form-control" required>
                    <option value="male" {{ $user->user_gender === 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ $user->user_gender === 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ $user->user_gender === 'other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>

            <div class="form-group">
    <label for="role_id">Role</label>
    <select name="role_id" id="role_id" class="form-control" required>
        @foreach ($roles as $role)
            <option value="{{ $role->id }}" {{ $role->id === $user->role_id ? 'selected' : '' }}>
                {{ $role->role_name }}
            </option>
        @endforeach
    </select>
</div>


            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('user.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection

@section('styles')
    @parent
    <style>
        h1 {
            color: blue;
            font-size: 24px;
        }
    </style>
@endsection

@section('scripts')
    @parent
    <script>
        // Initialize Select2 on the 'role_id' select element
        $(document).ready(function() {
            $('#role_id').select2();
        });
    </script>
@endsection
