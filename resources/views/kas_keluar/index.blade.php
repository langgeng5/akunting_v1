@extends('main_layout')

@section('subtitle', 'KAS KELUAR')

@section('page_header', 'Data Kas Keluar')

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
                            Data Kas Keluar
                        </div>
                        <div class="col-md-6 text-right">
                            <a class="btn btn-sm btn-primary" href="{{ url('kas-keluar/create') }}">Tambah <i class="fa fa-plus" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th width="20%">Nomor</th>
                                <th width="30%">Tanggal</th>
                                <th width="35%">Jumlah</th>
                                <th width="15%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_kas_keluar as $row)
                            <tr>
                                <td>{{ $row->no_bkk }}</td>
                                <td>{{ $row->tgl_bkk }}</td>
                                <td>{{ convertRupiah($row->uang_berjumlah) }}</td>
                                <td class="text-center">@include('component.action_buttons', ['edit_url' => '/kas-keluar/edit/'.$row->no_bkk, 'delete_url' => '/kas-keluar/delete/'.$row->no_bkk,])</td>
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
