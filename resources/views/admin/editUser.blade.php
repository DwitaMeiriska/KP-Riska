@extends('admin.template.template')

@section('content')
<div class="container-fluid">
    <h2>Edit Pengguna</h2>

    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email </label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>

        <div class="form-group">
            <label for="role">Role</label>
            <select name="role" class="form-control" required>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="guru" {{ $user->role == 'guru' ? 'selected' : '' }}>User</option>
                <option value="kelas" {{ $user->role == 'kelas' ? 'selected' : '' }}>kelas</option>
                <!-- Tambahkan role lainnya sesuai kebutuhan -->
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('user') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
