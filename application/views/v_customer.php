<script>
function edit(x) {
    if (x == 'add') {
        $('#staticBackdrop').modal('show');
        $('#staticBackdrop .modal-title').html('Tambah Customer');
        $('[name="idcustomer"]').val("");
        $('[name="nama"]').val("");
        $('[name="tujuan_id"]').val("").trigger('change');
    } else {
        $('#staticBackdrop').modal('show');
        $('#staticBackdrop .modal-title').html('Edit Customer');

        $.ajax({
            type: "POST",
            data: {
                id: x
            },
            url: '<?=base_url();?>customer/view',
            dataType: 'json',
            success: function(data) {
                $('[name="idcustomer"]').val(data.idcustomer);
                $('[name="nama"]').val(data.nama);
                $('[name="tujuan_id"]').val(data.tujuan_id).trigger('change');
            }
        });
    }
}
</script>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Customer</h1>
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
                        <th>NAMA CUSTOMER</th>
                        <th>TUJUAN</th>
                        <th width="100">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $n=1;foreach($all_customer as $row): ?>
                    <tr>
                        <td><?= $n++; ?></td>
                        <td><?= $row['nama_customer']; ?></td>
                        <td><?= $row['tujuan']; ?></td>
                        <td align="center">
                            <a href="#" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                                title="Ubah Data" onclick="edit(<?=$row['idcustomer'];?>)"><i class="fas fa-edit"></i>
                            </a>
                            <a href="<?=base_url('customer/hapus/');?><?=$row['idcustomer'];?>"
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?=base_url('customer/save');?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="nama">Nama Customer <span class="text-danger">*</span></label>
                                <input type="hidden" name="idcustomer">
                                <input type="text" class="form-control uppercase" id="nama" name="nama" autofocus
                                    required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tujuan_id" class="control-label">Tujuan <span
                                        class="text-danger">*</span></label>
                                <select name="tujuan_id" id="tujuan_id" class="form-control select2" required>
                                    <option value="">Pilih Tujuan</option>
                                    <?= list_tujuan(); ?>
                                </select>
                            </div>
                        </div>
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