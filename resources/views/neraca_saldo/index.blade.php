@extends('main_layout')

@section('subtitle', 'NERACA SALDO')

@section('page_header', 'Neraca Saldo')

@section('content')

    <div class="row">
        <div class="col-md-12" id="contentLaporan">
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
                            Laporan Neraca Saldo
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-print-none">
                        <form method="GET" action="{{ url('neraca-saldo') }}">
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
                                    <select id="tahun" name="tahun" class="form-control" required>
                                        <option value="">Pilih Tahun</option>
                                        @isset($tahun)
                                            @foreach ($tahun as $row)
                                                <option value="{{ $row->year }}">{{ $row->year }}</option>
                                            @endforeach
                                        @endisset
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-sm btn-success btn-submit">Submit</button>
                                    <button id="btnPrint" type="button" class="btn btn-sm btn-primary">Print</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <hr class="d-print-none">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="25%">Akun</th>
                                <th width="25%">Debet</th>
                                <th width="25%">Kredit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $totalDebet = 0;
                                $totalKredit = 0;
                            @endphp
                            @foreach ($data_akun as $akun)
                            @php
                                $totalDebet += $akun->debet_rupiah;
                                $totalKredit = $akun->kredit_rupiah;
                            @endphp
                            <tr>
                                <td>{{ $akun->kode_reff." - ".$akun->nama_akun }}</td>
                                <td>{{ $akun->debet_rupiah ? convertRupiah($akun->debet_rupiah) : convertRupiah(0) }}</td>
                                <td>{{ $akun->kredit_rupiah ? convertRupiah($akun->kredit_rupiah) : convertRupiah(0) }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <th>Total</th>
                                <th>{{ convertRupiah($totalDebet) }}</th>
                                <th>{{ convertRupiah($totalKredit) }}</th>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                </div>
            </div>
        </div>
    </div>

@endsection

