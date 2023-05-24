@extends('main_layout')

@section('subtitle', 'JURNAL')

@section('page_header', 'Data Jurnal')

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
                            Data Jurnal
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th width="25%">No Transaksi</th>
                                <th width="15%">Tanggal</th>
                                <th width="20%">Akun</th>
                                <th width="20%">Debet</th>
                                <th width="20%">Kredit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_jurnal as $row)
                            <tr>
                                <td>{{ $row->no_transaksi }}</td>
                                <td>{{ $row->tgl_transaksi }}</td>
                                <td>{{ $row->akun ? $row->akun->kode_reff." - ".$row->akun->nama_akun : '-' }}</td>
                                <td>{{ $row->debet_rupiah }}</td>
                                <td>{{ $row->kredit_rupiah }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
<script>
    // Call the dataTables jQuery plugin
    $(document).ready(function() {
    $('#dataTable').DataTable();
    });
</script>
@endsection
