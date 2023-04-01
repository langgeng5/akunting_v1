<div>
    <form id="doDelete" action="{{ url($delete_url) ?? '#' }}" method="POST">
        @isset($show_url)
            <button onclick="showData('{{ $show_url ?? '#' }}')" type="button" id="btnShow" class="btn btn-sm btn-info"><i class="fa fa-eye" aria-hidden="true"></i></button>
        @endisset
        @isset($edit_url)
            <button onclick="editData('{{ $edit_url ?? '#' }}')" type="button" id="btnEdit" class="btn btn-sm btn-warning"><i class="fa fa-edit" aria-hidden="true"></i></button>
        @endisset

        @csrf
        @method('delete')
        @isset($delete_url)
            <button onclick="deleteData()" type="button" id="btnDelete" class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
        @endisset
    </form>
</div>

<script>

function showData(url) {
    window.location.href = '{{ url('/') }}'+url;
}

function editData(url) {
    window.location.href = '{{ url('/') }}'+url;
}

function deleteData() {
    if (confirm("Apa Anda Yakin Menghapus Data Ini?") == true) {
        $('#doDelete').submit();
    }
}

</script>
