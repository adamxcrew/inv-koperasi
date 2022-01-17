<script>
function edit(x) {
    if (x == 'add') {
        $('#staticBackdrop .modal-title').html('Tambah Pengaturan');
        $('[name="idsetting"]').val("");
        $('[name="name"]').val("");
        $('[name="value"]').val("");
        $('[name="desc"]').val("");
        $('[name="name"]').prop('readonly', false);
    } else {
        $('#staticBackdrop').modal('show');
        $('[name="name"]').prop('readonly', true);
        $('#staticBackdrop .modal-title').html('Edit Pengaturan');

        $.ajax({
            type: "POST",
            data: {
                id: x
            },
            url: '<?=base_url();?>setting/view',
            dataType: 'json',
            success: function(data) {
                $('[name="idsetting"]').val(data.idsetting);
                $('[name="name"]').val(data.name);
                $('[name="value"]').val(data.value);
                $('[name="desc"]').val(data.desc);
            }
        });
    }
}
</script>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Pengaturan</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#staticBackdrop">
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
                        <th>NAMA</th>
                        <th>VALUE</th>
                        <th width="100">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $n=1;foreach($all_setting as $row): ?>
                    <tr>
                        <td><?= $n++; ?></td>
                        <td><?= $row['desc']; ?></td>
                        <td><?= $row['value']; ?></td>
                        <td align="center">
                            <a href="#" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                                title="Ubah Data" onclick="edit(<?=$row['idsetting'];?>)"><i class="fas fa-edit"></i>
                            </a>
                            <!-- <a href="<?=base_url('setting/hapus/');?><?=$row['idsetting'];?>"
                                class="btn btn-danger btn-sm btn-hapus" data-toggle="tooltip" data-placement="top"
                                data-title="Hapus Data"><i class="fas fa-trash"></i></a> -->
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
            <form action="<?=base_url('setting/save');?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Pengaturan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Name <span class="text-danger">*</span></label>
                        <input type="hidden" name="idsetting">
                        <input type="text" class="form-control" id="name" name="name" placeholder="ex: app-name"
                            autofocus required>
                    </div>
                    <div class="form-group">
                        <label for="value">Value <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="value" name="value" required>
                    </div>
                    <div class="form-group">
                        <label for="desc">Desc <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="desc" name="desc" required>
                    </div>
                </div>
                <div class="modal-footer float-left">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i>
                        Batal</button>
                </div>
                <div class="modal-footer float-right">
                    <button type="submit" class="btn btn-primary float-right"><i class="fas fa-save"></i>
                        Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>