@extends('main_layout')

@section('subtitle', 'AKUN')

@section('page_header', 'Data Akun')

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
                            Data Akun
                        </div>
                        <div class="col-md-6 text-right">
                            <a class="btn btn-sm btn-primary" href="{{ url('akun/create') }}">Tambah <i class="fa fa-plus" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th width="20%">Kode Akun</th>
                                <th width="30%">Jenis Akun</th>
                                <th width="35%">Nama Akun</th>
                                <th width="15%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_akun as $row)
                            <tr>
                                <td>{{ $row->kode_reff }}</td>
                                <td>{{ $row->kategori_akun }}</td>
                                <td>{{ $row->nama_akun }}</td>
                                <td class="text-center">@include('component.action_buttons', ['show_url' => '/akun/'.$row->id_akun, 'edit_url' => '/akun/edit/'.$row->id_akun, 'delete_url' => '/akun/delete/'.$row->id_akun,])</td>
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
