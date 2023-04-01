@extends('main_layout')

@section('subtitle', 'AKUN')

@if (isset($akun))
    @section('page_header', 'Ubah Akun')
@else
    @section('page_header', 'Tambah Akun')
@endif

@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            Form Akun
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ url('akun') }}" class="btn btn-sm btn-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form
                        method="POST"
                        action="@if (isset($akun)) {{ url('akun/edit/'.$akun->id_akun) }} @else {{ url('akun/create') }} @endif"
                        >
                        @csrf
                        @isset($akun)
                            @method('put')
                        @endisset
                        <div class="mb-3">
                            <label for="kodeReff" class="form-label">Kode Reff<span class="text-danger">*</span></label>
                            <input
                                id="kodeReff"
                                name="kode_reff"
                                type="text"
                                class="form-control @error('kode_reff') is-invalid @enderror"
                                placeholder="Kode Reff"
                                value="{{ old('kode_reff', $akun->kode_reff ?? '') }}"
                            >
                            @error('kode_reff')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="kategoriAkun" class="form-label">Kategori Akun<span class="text-danger">*</span></label>
                            <input
                                id="kategoriAkun"
                                name="kategori_akun"
                                type="text"
                                class="form-control @error('kategori_akun') is-invalid @enderror"
                                placeholder="Kategori Akun"
                                value="{{ old('kategori_akun', $akun->kategori_akun ?? '') }}"
                            >
                            @error('kategori_akun')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="namaAkun" class="form-label">Nama Akun<span class="text-danger">*</span></label>
                            <input
                                id="namaAkun"
                                name="nama_akun"
                                type="text"
                                class="form-control @error('nama_akun') is-invalid @enderror"
                                placeholder="Nama Akun"
                                value="{{ old('nama_akun', $akun->nama_akun ?? '') }}"
                            >
                            @error('nama_akun')
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

