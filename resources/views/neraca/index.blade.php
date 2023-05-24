@extends('main_layout')

@section('subtitle', 'NERACA')

@section('page_header', 'Neraca')

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
                            Laporan Neraca
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        <form method="GET" action="{{ url('neraca') }}">
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
                                <th width="25%">Aktiva</th>
                                <th width="25%">Akun</th>
                                <th width="25%">Pasiva</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $countAktiva = count($data_akun['aktiva']);
                                $countPasiva = count($data_akun['pasiva']);
                                $numArray = 0;
                                if ($countAktiva > $countPasiva) {
                                    $numArray = $countAktiva;
                                }else {
                                    $numArray = $countPasiva;
                                }
                                $totalAktiva = 0;
                                $totalPasiva = 0;
                            @endphp

                            @for ($i = 0; $i < $numArray; $i++)
                            <tr>
                                <td>{{ isset($data_akun['aktiva'][$i]) ? $data_akun['aktiva'][$i]->kode_reff." - ".$data_akun['aktiva'][$i]->nama_akun : '' }}</td>
                                <td>{{ isset($data_akun['aktiva'][$i]) ? $data_akun['aktiva'][$i]->kredit_rupiah - $data_akun['aktiva'][$i]->debet_rupiah : '' }}</td>
                                <td>{{ isset($data_akun['pasiva'][$i]) ? $data_akun['pasiva'][$i]->kode_reff." - ".$data_akun['pasiva'][$i]->nama_akun : '' }}</td>
                                <td>{{ isset($data_akun['pasiva'][$i]) ? $data_akun['pasiva'][$i]->debet_rupiah - $data_akun['pasiva'][$i]->kredit_rupiah : '' }}</td>
                            </tr>
                            @php
                                if (isset($data_akun['aktiva'][$i])) {
                                    $totalAktiva = $totalAktiva + ($data_akun['aktiva'][$i]->kredit_rupiah - $data_akun['aktiva'][$i]->debet_rupiah);
                                }
                                if (isset($data_akun['pasiva'][$i])) {
                                    $totalPasiva = $totalPasiva + ($data_akun['pasiva'][$i]->debet_rupiah - $data_akun['pasiva'][$i]->kredit_rupiah);
                                }
                            @endphp
                            @endfor

                            <tr>
                                <th width="25%">Total Aktiva</th>
                                <th width="25%">{{ $totalAktiva }}</th>
                                <th width="25%">Total Pasiva</th>
                                <th width="25%">{{ $totalPasiva }}</th>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                </div>
            </div>
        </div>
    </div>

@endsection

