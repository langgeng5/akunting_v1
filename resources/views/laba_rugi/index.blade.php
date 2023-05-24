@extends('main_layout')

@section('subtitle', 'LABA RUGI')

@section('page_header', 'Laba Rugi')

@section('content')

    <div class="row">
        <div class="col-md-12">
            @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
                @php
                    Session::forget('success');
                @endphp
            </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            Laporan Laba Rugi
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        <form method="GET" action="{{ url('laba-rugi') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <select id="bulan" name="bulan" class="form-control" required>
                                        <option value="">Pilih Bulan</option>
                                        <option value="1" @if (old('bulan',  $bulan ?? '') == '1') {{ 'selected' }} @endif>Januari</option>
                                        <option value="2" @if (old('bulan',  $bulan ?? '') == '2') {{ 'selected' }} @endif>Februari</option>
                                        <option value="3" @if (old('bulan',  $bulan ?? '') == '3') {{ 'selected' }} @endif>Maret</option>
                                        <option value="4" @if (old('bulan',  $bulan ?? '') == '4') {{ 'selected' }} @endif>April</option>
                                        <option value="5" @if (old('bulan',  $bulan ?? '') == '5') {{ 'selected' }} @endif>Mei</option>
                                        <option value="6" @if (old('bulan',  $bulan ?? '') == '6') {{ 'selected' }} @endif>Juni</option>
                                        <option value="7" @if (old('bulan',  $bulan ?? '') == '7') {{ 'selected' }} @endif>Juli</option>
                                        <option value="8" @if (old('bulan',  $bulan ?? '') == '8') {{ 'selected' }} @endif>Agustus</option>
                                        <option value="9" @if (old('bulan',  $bulan ?? '') == '9') {{ 'selected' }} @endif>September</option>
                                        <option value="10" @if (old('bulan',  $bulan ?? '') == '10') {{ 'selected' }} @endif>Oktober</option>
                                        <option value="11" @if (old('bulan',  $bulan ?? '') == '11') {{ 'selected' }} @endif>Nopember</option>
                                        <option value="12" @if (old('bulan',  $bulan ?? '') == '12') {{ 'selected' }} @endif>Desember</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <input type="number" name="tahun" class="form-control" placeholder="Tahun" aria-label="Tahun">
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-sm btn-success btn-submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <hr>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="25%">Akun</th>
                                <th width="25%">Debet</th>
                                <th width="25%">Kredit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_akun as $akun)
                            <tr>
                                <td>{{ $akun->kode_reff." - ".$akun->nama_akun }}</td>
                                <td>{{ $akun->debet_rupiah ? $akun->debet_rupiah : '0' }}</td>
                                <td>{{ $akun->kredit_rupiah ? $akun->kredit_rupiah : '0' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                </div>
            </div>
        </div>
    </div>

@endsection

