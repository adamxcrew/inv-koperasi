<script>
function edit(x) {
    if (x == 'add') {
        $('#staticBackdrop').modal('show');
        $('#staticBackdrop .modal-title').html('Tambah Tujuan');
        $('[name="idtujuan"]').val("");
        $('[name="nama"]').val("");
    } else {
        $('#staticBackdrop').modal('show');
        $('#staticBackdrop .modal-title').html('Edit Tujuan');

        $.ajax({
            type: "POST",
            data: {
                id: x
            },
            url: '<?=base_url();?>tujuan/view',
            dataType: 'json',
            success: function(data) {
                $('[name="idtujuan"]').val(data.idtujuan);
                $('[name="nama"]').val(data.nama);
            }
        });
    }
}
</script>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Tujuan</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="#" class="btn btn-primary btn-icon-split btn-sm" onclick="edit('add')">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah</span>
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="25">NO</th>
                        <th>NAMA TUJUAN</th>
                        <th width="100">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $n=1;foreach($all_tujuan as $row): ?>
                    <tr>
                        <td><?= $n++; ?></td>
                        <td><?= $row['nama']; ?></td>
                        <td align="center">
                            <a href="#" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                                title="Ubah Data" onclick="edit(<?=$row['idtujuan'];?>)"><i class="fas fa-edit"></i>
                            </a>
                            <a href="<?=base_url('tujuan/hapus/');?><?=$row['idtujuan'];?>"
                                class="btn btn-danger btn-sm btn-hapus" data-toggle="tooltip" data-placement="top"
                                data-title="Hapus Data"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?=base_url('tujuan/save');?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Tujuan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama Tujuan <span class="text-danger">*</span></label>
                        <input type="hidden" name="idtujuan">
                        <input type="text" class="form-control" id="nama" name="nama" autofocus required>
                    </div>
                </div>
                <div class="modal-footer float-left">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i>
                        BATAL</button>
                </div>
                <div class="modal-footer float-right">
                    <button type="submit" class="btn btn-primary float-right"><i class="fas fa-save"></i>
                        SIMPAN</button>
                </div>
            </form>
        </div>
    </div>
</div>