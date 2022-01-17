<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Invoice</h1>
<div class="card shadow mb-4">
    <!-- <div class="card-header pb-0 pt-3">
        <form action="<?=base_url('invoice/filter');?>" method="post">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <input type="hidden" name="invoice_id">
                        <select class="form-control select2" name="customer_id" style="width:100%;" required>
                            <option value="">Pilih Customer</option>
                            <?= list_customer(); ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <input type="date" class="form-control" name="tanggal" required>
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary mb-2"><i class="fas fa-search"></i>
                        TAMPILKAN</button>
                </div>
            </div>
        </form>
    </div> -->
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="25">NO</th>
                        <th>TANGGAL</th>
                        <th>NAMA CUSTOMER</th>
                        <th>NO. SURAT</th>
                        <th>NO. PO</th>
                        <th width="120">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $n=1;foreach($all_inv as $row): ?>
                    <tr>
                        <td><?= $n++; ?></td>
                        <td><?= $row['tanggal']; ?></td>
                        <td><?= $row['nama_customer']; ?></td>
                        <td><?= $row['no_surat']; ?></td>
                        <td><?= $row['no_po']; ?></td>
                        <td align=" center">
                            <a href="<?=base_url('invoice/detail/');?><?=enc_url($row['idinvoice']);?>"
                                class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top"
                                title="Detail Data"><i class="fas fa-eye"></i>
                            </a>
                            <!-- <a href="<?=base_url('invoice/cetak_all/');?><?=enc_url($row['idinvoice']);?>" class=" btn
                                btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Cetak"
                                target="_blank"><i class=" fas fa-print"></i>
                            </a> -->
                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-print"></i>
                            </button>
                            <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item"
                                    href="<?=base_url('invoice/cetak_all/');?><?=enc_url($row['idinvoice']);?>"
                                    target="_blank">Semua</a>
                                <a class="dropdown-item"
                                    href="<?=base_url('invoice/cetak_inv/');?><?=enc_url($row['idinvoice']);?>"
                                    target="_blank">Invoice</a>
                                <a class="dropdown-item"
                                    href="<?=base_url('invoice/cetak_surat_jalan/');?><?=enc_url($row['idinvoice']);?>"
                                    target="_blank">Surat
                                    Jalan</a>
                                <a class="dropdown-item" href="#">Manifest</a>
                            </div>
                            <a href="<?=base_url('invoice/hapus/');?><?=$row['idinvoice'];?>"
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