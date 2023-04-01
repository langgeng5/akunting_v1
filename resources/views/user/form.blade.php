@extends('main_layout')

@section('subtitle', 'USER')

@if (isset($user))
    @section('page_header', 'Ubah User')
@else
    @section('page_header', 'Tambah User')
@endif

@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            Form User
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ url('user') }}" class="btn btn-sm btn-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form
                        method="POST"
                        action="@if (isset($user)) {{ url('user/edit/'.$user->id_user) }} @else {{ url('user/create') }} @endif"
                        >
                        @csrf
                        @isset($user)
                            @method('put')
                        @endisset
                        <div class="mb-3">
                            <label for="usernameInput" class="form-label">Username<span class="text-danger">*</span></label>
                            <input
                                id="usernameInput"
                                name="username"
                                type="text"
                                class="form-control @error('username') is-invalid @enderror"
                                placeholder="Username"
                                value="{{ old('username', $user->username ?? '') }}"
                            >
                            @error('username')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="passwordInput" class="form-label">Password<span class="text-danger">*</span></label>
                            <input
                                id="passwordInput"
                                name="password"
                                type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Password"
                                value="{{ old('password') }}"
                            >
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="passwordInput" class="form-label">Konfirmasi Password<span class="text-danger">*</span></label>
                            <input
                                id="passwordInput"
                                name="password_confirmation"
                                type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Password"
                                autocomplete="current-password"
                            >
                        </div>
                        <div class="mb-3">
                            <label for="namaPenggunaInput" class="form-label">Nama Pengguna<span class="text-danger">*</span></label>
                            <input
                                id="namaPenggunaInput"
                                name="nama_pengguna"
                                type="text"
                                class="form-control @error('nama_pengguna') is-invalid @enderror"
                                placeholder="Nama Pengguna"
                                value="{{ old('nama_pengguna', $user->nama_pengguna ?? '') }}"
                            >
                            @error('nama_pengguna')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="alamatInput" class="form-label">Alamat</label>
                            <textarea
                                id="alamatInput"
                                name="alamat"
                                class="form-control @error('alamat') is-invalid @enderror"
                                cols="30"
                                rows="5"
                            >{{ old('alamat', $user->alamat ?? '') }}</textarea>
                            @error('alamat')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="kontakInput" class="form-label">No. Telp</label>
                            <input
                                id="kontakInput"
                                name="kontak"
                                type="text"
                                class="form-control @error('kontak') is-invalid @enderror"
                                value="{{ old('kontak', $user->kontak ?? '') }}"
                            >
                            @error('kontak')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tglLahirInput" class="form-label">Tanggal Lahir<span class="text-danger">*</span></label>
                            <input
                                id="tglLahirInput"
                                name="tgl_lahir"
                                type="date"
                                class="form-control @error('tgl_lahir') is-invalid @enderror"
                                value="{{ old('tgl_lahir', $user->tgl_lahir ?? '') }}"
                            >
                            @error('tgl_lahir')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jenisKelaminInput" class="form-label">Jenis Kelamin<span class="text-danger">*</span></label>
                            <select id="jenisKelaminInput" name="jenis_kelamin" class="form-select form-control" >
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="pria" @if (old('jenis_kelamin',  $user->jenis_kelamin ?? '') == 'pria') {{ 'selected' }} @endif>Pria</option>
                                <option value="wanita" @if (old('jenis_kelamin', $user->jenis_kelamin ?? '') == 'wanita') {{ 'selected' }} @endif>Wanita</option>
                            </select>
                            @error('jenis_kelamin')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="levelInput" class="form-label">Jabatan<span class="text-danger">*</span></label>
                            <select id="levelInput" name="level" class="form-select form-control" >
                                <option value="">Pilih Jabatan</option>
                                <option value="admin" @if (old('level', $user->level ?? '') == 'admin') {{ 'selected' }} @endif>Admin</option>
                                <option value="pemilik" @if (old('level', $user->level ?? '') == 'pemilik') {{ 'selected' }} @endif>Pemilik</option>
                            </select>
                            @error('level')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-sm btn-success btn-submit">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $(":input").inputmask();

            $("#kontakInput").inputmask({
                "mask" : "(999) 999-999-9999",
                "clearMaskOnLostFocus" : true,
                "removeMaskOnSubmit" : true
            });
        })
    </script>
@endsection

