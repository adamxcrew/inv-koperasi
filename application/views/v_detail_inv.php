<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Detail Data Invoice "<b><?= inv('no_surat',$id); ?></b>"</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-2">
        <a href="<?= base_url('menu/invoice');?>" class="btn btn-primary btn-icon-split btn-sm">
            <span class="icon text-white-50">
                <i class="fas fa-chevron-left"></i>
            </span>
            <span class="text">Kembali</span>
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="25">NO</th>
                        <th>NAMA BARANG</th>
                        <th>VOLUME</th>
                        <th>SATUAN</th>
                        <th>HARGA SATUAN</th>
                        <th>SUB TOTAL</th>
                        <!-- <th width="100">AKSI</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php $n=1;foreach(detail_inv($id) as $row): ?>
                    <tr>
                        <td><?= $n++; ?></td>
                        <td><?= $row['nama_barang']; ?></td>
                        <td><?= $row['volume']; ?></td>
                        <td><?= $row['satuan']; ?></td>
                        <td class="text-right"><?= 'Rp.'.number_format($row['harga_satuan'],0,'','.'); ?></td>
                        <td class="text-right"><?= 'Rp.'.number_format($row['sub_total'],0,'','.'); ?></td>
                        <!-- <td align=" center">
                            <a href="#" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                                title="Ubah Data" onclick="edit(<?=$row['idbarang'];?>)"><i class="fas fa-edit"></i>
                            </a>
                            <a href="<?=base_url('barang/hapus/');?><?=$row['idbarang'];?>"
                                class="btn btn-danger btn-sm btn-hapus" data-toggle="tooltip" data-placement="top"
                                data-title="Hapus Data"><i class="fas fa-trash"></i></a>
                        </td> -->
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>