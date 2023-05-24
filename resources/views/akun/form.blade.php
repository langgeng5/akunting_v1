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
                            <select id="kategoriAkun" name="kategori_akun" class="form-select form-control">
                                <option value="">Pilih Kategori Akun</option>
                                <option value="Neraca" @if (old('kategori_akun',  $akun->kategori_akun ?? '') == 'Neraca') {{ 'selected' }} @endif>Neraca</option>
                                <option value="Laba-rugi" @if (old('kategori_akun',  $akun->kategori_akun ?? '') == 'Laba-rugi') {{ 'selected' }} @endif>Laba-Rugi</option>
                            </select>
                            @error('kategori_akun')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jenisAkun" class="form-label">Jenis Akun<span class="text-danger">*</span></label>
                            <select id="jenisAkun" name="jenis_akun" class="form-select form-control">
                                <option value="">Pilih Jenis Akun</option>
                                <option value="Aktiva" @if (old('jenis_akun',  $akun->jenis_akun ?? '') == 'Aktiva') {{ 'selected' }} @endif>Aktiva</option>
                                <option value="Hutang" @if (old('jenis_akun',  $akun->jenis_akun ?? '') == 'Hutang') {{ 'selected' }} @endif>Hutang</option>
                                <option value="Ekuitas" @if (old('jenis_akun',  $akun->jenis_akun ?? '') == 'Ekuitas') {{ 'selected' }} @endif>Ekuitas</option>
                                <option value="Pendapatan" @if (old('jenis_akun',  $akun->jenis_akun ?? '') == 'Pendapatan') {{ 'selected' }} @endif>Pendapatan</option>
                                <option value="Biaya" @if (old('jenis_akun',  $akun->jenis_akun ?? '') == 'Biaya') {{ 'selected' }} @endif>Biaya</option>
                            </select>
                            @error('jenis_akun')
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

