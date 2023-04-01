@extends('main_layout')

@section('subtitle', 'USER')

@section('page_header', 'Data User')

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
                            Data User
                        </div>
                        <div class="col-md-6 text-right">
                            <a class="btn btn-sm btn-primary" href="{{ url('user/create') }}">Tambah <i class="fa fa-plus" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th width="10%">Username</th>
                                <th width="15%">Nama</th>
                                <th width="15%">Alamat</th>
                                <th width="10%">Kontak</th>
                                <th width="15%">Tgl. Lahir</th>
                                <th width="10%">Jenis Kelamin</th>
                                <th width="10%">Jabatan</th>
                                <th width="15%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_user as $row)
                            <tr>
                                <td>{{ $row->username }}</td>
                                <td>{{ $row->nama_pengguna }}</td>
                                <td>{{ $row->alamat ?? '-' }}</td>
                                <td>{{ $row->kontak ?? '-' }}</td>
                                <td>{{ $row->tgl_lahir }}</td>
                                <td>{{ Str::ucfirst($row->jenis_kelamin) }}</td>
                                <td>{{ Str::ucfirst($row->level) }}</td>
                                <td class="text-center">@include('component.action_buttons', ['edit_url' => '/user/edit/'.$row->id_user, 'delete_url' => '/user/delete/'.$row->id_user,])</td>
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
