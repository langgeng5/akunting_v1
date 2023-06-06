@extends('main_layout')

@section('subtitle', 'KAS KELUAR')

@if (isset($kas_keluar))
    @section('page_header', 'Ubah Kas Keluar')
@else
    @section('page_header', 'Tambah Kas Keluar')
@endif

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            Form Kas Keluar
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ url('kas-keluar') }}" class="btn btn-sm btn-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form
                        method="POST"
                        action="@if (isset($kas_keluar)) {{ url('kas-keluar/edit/'.$kas_keluar->no_bkk) }} @else {{ url('kas-keluar/create') }} @endif"
                        >
                        @csrf
                        @isset($kas_keluar)
                            @method('put')
                        @endisset
                        <div class="mb-3">
                            <label for="noBkkInput" class="form-label">No Bkk<span class="text-danger">*</span></label>
                            <input
                                id="noBkkInput"
                                name="no_bkk"
                                type="number"
                                class="form-control @error('no_bkk') is-invalid @enderror"
                                placeholder="No BkK"
                                value="{{ old('no_bkk', $kas_keluar->no_bkk ?? '') }}"
                            >
                            @error('no_bkk')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tglBkkInput" class="form-label">Tanggal Bkk<span class="text-danger">*</span></label>
                            <input
                                id="tglBkkInput"
                                name="tgl_bkk"
                                type="date"
                                class="form-control @error('tgl_bkk') is-invalid @enderror"
                                value="{{ old('tgl_bkk', $kas_keluar->tgl_bkk ?? '') }}"
                            >
                            @error('tgl_bkk')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="dibayarKepadaInput" class="form-label">Dibayar Kepada<span class="text-danger">*</span></label>
                            <input
                                id="dibayarKepadaInput"
                                name="dibayar_kepada"
                                type="text"
                                class="form-control @error('dibayar_kepada') is-invalid @enderror"
                                placeholder="Dibayar Kepada"
                                value="{{ old('dibayar_kepada', $kas_keluar->dibayar_kepada ?? '') }}"
                            >
                            @error('dibayar_kepada')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="untukPembayaranInput" class="form-label">Untuk Pembayaran<span class="text-danger">*</span></label>
                            <input
                                id="untukPembayaranInput"
                                name="untuk_pembayaran"
                                type="text"
                                class="form-control @error('untuk_pembayaran') is-invalid @enderror"
                                placeholder="Untuk Pembayaran"
                                value="{{ old('untuk_pembayaran', $kas_keluar->untuk_pembayaran ?? '') }}"
                            >
                            @error('untuk_pembayaran')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Akun<button type="button" id="add_row" class="btn btn-sm btn-primary ms-2"><i class="fa fa-plus" aria-hidden="true"></i></button></label>
                            <div id="akun_list">
                                @includeWhen(!isset($kas_keluar), 'kas_keluar.akun_input_row', ['akun' => $akun])
                                @isset($kas_keluar)
                                    @foreach ($kas_keluar->jurnal as $jurnal)
                                        @include('kas_keluar.akun_input_row', ['akun' => $akun, 'no_rekening' => $jurnal->no_rekening, 'debet' => $jurnal->debet_rupiah, 'kredit' => $jurnal->kredit_rupiah])
                                    @endforeach
                                @endisset
                            </div>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-sm btn-success btn-submit">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="akun_input" class="d-none">
        @include('kas_keluar.akun_input_row', ['akun' => $akun])
    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $(":input").inputmask();
            $(".format-rupiah").inputmask({
                "alias" : "rupiah"
            });

            $("#add_row").click(function(){
                var input = $("#akun_input").html();
                $("#akun_list").append(input);

                $(".format-rupiah").inputmask({
                    "alias" : "rupiah"
                });
            });

            $(document).on('click', '.remove_row', function () {
                $(this).closest('.akun_input_list').remove();
            });
        })
    </script>
@endsection
