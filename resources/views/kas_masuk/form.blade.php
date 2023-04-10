@extends('main_layout')

@section('subtitle', 'KAS MASUK')

@if (isset($kas_masuk))
    @section('page_header', 'Ubah Kas Masuk')
@else
    @section('page_header', 'Tambah Kas Masuk')
@endif

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            Form Kas Masuk
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ url('kas-masuk') }}" class="btn btn-sm btn-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form
                        method="POST"
                        action="@if (isset($kas_masuk)) {{ url('kas-masuk/edit/'.$kas_masuk->no_bkm) }} @else {{ url('kas-masuk/create') }} @endif"
                        >
                        @csrf
                        @isset($kas_masuk)
                            @method('put')
                        @endisset
                        <div class="mb-3">
                            <label for="noBkmInput" class="form-label">No Bkm<span class="text-danger">*</span></label>
                            <input
                                id="noBkmInput"
                                name="no_bkm"
                                type="number"
                                class="form-control @error('no_bkm') is-invalid @enderror"
                                placeholder="No Bkm"
                                value="{{ old('no_bkm', $kas_masuk->no_bkm ?? '') }}"
                            >
                            @error('no_bkm')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tglBkmInput" class="form-label">Tanggal Bkm<span class="text-danger">*</span></label>
                            <input
                                id="tglBkmInput"
                                name="tgl_bkm"
                                type="date"
                                class="form-control @error('tgl_bkm') is-invalid @enderror"
                                value="{{ old('tgl_bkm', $kas_masuk->tgl_bkm ?? '') }}"
                            >
                            @error('tgl_bkm')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="diterimaDariInput" class="form-label">Diterima Dari<span class="text-danger">*</span></label>
                            <input
                                id="diterimaDariInput"
                                name="diterima_dari"
                                type="text"
                                class="form-control @error('diterima_dari') is-invalid @enderror"
                                placeholder="Diterima Dari"
                                value="{{ old('diterima_dari', $kas_masuk->diterima_dari ?? '') }}"
                            >
                            @error('diterima_dari')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="untukPenerimaanInput" class="form-label">Untuk Penerimaan<span class="text-danger">*</span></label>
                            <input
                                id="untukPenerimaanInput"
                                name="untuk_penerimaan"
                                type="text"
                                class="form-control @error('untuk_penerimaan') is-invalid @enderror"
                                placeholder="Untuk Penerimaan"
                                value="{{ old('untuk_penerimaan', $kas_masuk->untuk_penerimaan ?? '') }}"
                            >
                            @error('untuk_penerimaan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Akun<button type="button" id="add_row" class="btn btn-sm btn-primary ms-2"><i class="fa fa-plus" aria-hidden="true"></i></button></label>
                            <div id="akun_list">
                                @includeWhen(!isset($kas_masuk), 'kas_masuk.akun_input_row', ['akun' => $akun])
                                @foreach ($kas_masuk->jurnal as $jurnal)
                                    @include('kas_masuk.akun_input_row', ['akun' => $akun, 'no_rekening' => $jurnal->no_rekening, 'debet' => $jurnal->debet_rupiah, 'kredit' => $jurnal->kredit_rupiah])
                                @endforeach
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
        @include('kas_masuk.akun_input_row', ['akun' => $akun])
    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $("#add_row").click(function(){
                console.log('dafds');
                var input = $("#akun_input").html();
                $("#akun_list").append(input);
            });

            $(document).on('click', '.remove_row', function () {
                $(this).closest('.akun_input_list').remove();
            });
        })
    </script>
@endsection
