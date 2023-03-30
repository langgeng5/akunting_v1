<div>
    <form id="doDelete" action="{{ url($delete_url) ?? '#' }}" method="POST">
        <button onclick="showData('{{ $show_url ?? '#' }}')" id="btnShow" class="btn btn-sm btn-info"><i class="fa fa-eye" aria-hidden="true"></i></button>
        <button onclick="editData('{{ $edit_url ?? '#' }}')"id="btnEdit" class="btn btn-sm btn-warning"><i class="fa fa-edit" aria-hidden="true"></i></button>

        @csrf
        @method('delete')
        <button onclick="deleteData()" type="button" id="btnDelete" class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
