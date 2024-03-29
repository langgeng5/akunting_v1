<div class="mb-3 akun_input_list">
    <div class="col-md-12 row">
        <div class="col-md-3">
            <select name="no_rekening[]" class="form-select form-control">
                @isset($akun)
                    @foreach ($akun as $row)
                        <option value="{{ $row->id_akun }}">{{ $row->kode_reff." - ".$row->nama_akun }}</option>
                    @endforeach
                @endisset
            </select>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-3"><label class="form-label">Debet:</label></div>
                <div class="col-md-9"><input name="debet[]" type="text" class="form-control format-rupiah" placeholder="Debet" aria-label="Debet" value="{{ $debet ?? '0' }}"></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-3"><label class="form-label">Kredit:</label></div>
                <div class="col-md-9"><input name="kredit[]" type="text" class="form-control format-rupiah" placeholder="Kredit" aria-label="Kredit" value="{{ $kredit ?? '0' }}"></div>
            </div>
        </div>
        <div class="col-md-1">
            <div class="col d-flex flex-grow-1 align-items-center">
                <button type="button" class="btn btn-sm btn-danger remove_row"><i class="fa fa-times" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
</div>
