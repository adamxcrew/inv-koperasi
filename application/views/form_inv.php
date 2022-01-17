<div class="card shadow mb-4">
    <div class="card-header pb-0">
        <h4 class="float-left">Form Create Invoice</h4>
        <?php if(isset($_GET['inv_id']) && $_GET['inv_id']!=""): ?>
        <a href="<?=base_url('invoice/cetak_all/');?><?=$_GET['inv_id'];?>"
            class="btn btn-primary btn-sm mb-2 ml-5 float-right" target="_blank"><i class="fas fa-print"></i>
            CETAK INVOICE</a>
        <?php endif; ?>
    </div>
    <form role="form" action="<?=base_url('invoice/add_inv');?>" method="post">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Nama Koperasi</label>
                        <input type="text" class="form-control" name="nama" value="<?= _app('name');?>" readonly>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Email</label>
                        <input type="text" class="form-control" name="email" value="<?= _app('email');?>" readonly>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">No. HP</label>
                        <input type="text" class="form-control" name="no_hp" value="<?= _app('email');?>" readonly>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Tanggal Invoice</label>
                        <input type="date" class="form-control" name="tanggal"
                            value="<?=isset($_GET['inv_id'])?inv('tanggal',dec_url($_GET['inv_id'])):date('Y-m-d');?>"
                            <?= isset($_GET['inv_id'])?'readonly':''; ?>>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Alamat lengkap</label>
                        <textarea name="address" id="address" cols="30" rows="5" class="form-control"
                            readonly><?= _app('address'); ?></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Customer</label>
                        <select class="form-control select2" name="customer_id"
                            value="<?=isset($_GET['inv_id'])?inv('customer_id',dec_url($_GET['inv_id'])):'';?>"
                            <?= isset($_GET['inv_id'])?'disabled':''; ?> style="width:100%;" required>
                            <option value="">Pilih Customer</option>
                            <?= list_customer(isset($_GET['inv_id'])?inv('customer_id',dec_url($_GET['inv_id'])):''); ?>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Nomor Surat</label>
                                <input type="text" class="form-control" name="no_surat"
                                    value="<?= isset($_GET['inv_id'])?inv('no_surat',dec_url($_GET['inv_id'])):'404/A-B/'.romawi_bln(date('m')).'/'.date('Y');?>"
                                    <?= isset($_GET['inv_id'])?'readonly':''; ?>>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Nomor PO</label>
                                <input type="text" class="form-control" name="no_po"
                                    value="<?= isset($_GET['inv_id'])?inv('no_po',dec_url($_GET['inv_id'])):'FDS/22/00000032';?>"
                                    <?= isset($_GET['inv_id'])?'readonly':''; ?>>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success float-right mb-2"
                <?= isset($_GET['inv_id'])?'disabled':''; ?>><i
                    class="fas <?= isset($_GET['inv_id'])?'fa-lock':'fa-unlock'; ?>"></i>
                KUNCI INVOICE</button>
        </div>
    </form>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header pb-0 pt-3">
        <form action="<?=base_url('invoice/add_brg');?>" method="post">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <input type="hidden" name="invoice_id" value="<?= dec_url($_GET['inv_id']);?>">
                        <select class="form-control select2" name="barang_id" style="width:100%;" required>
                            <option value="">Pilih Barang</option>
                            <?= list_barang(); ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <input type="text" class="form-control angka" name="volume" placeholder="Volume" autofocus
                            required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" class="form-control uang" name="harga_satuan" placeholder="Harga satuan"
                            required>
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary mb-2 ml-5"
                        <?= isset($_GET['inv_id'])?'':'disabled'; ?>><i class="fas fa-plus"></i>
                        TAMBAH</button>
                </div>
            </div>
        </form>
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
                        <th width="100">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $n=1;foreach(detail_inv(dec_url($_GET['inv_id'])) as $row): ?>
                    <tr>
                        <td><?= $n++; ?></td>
                        <td><?= $row['nama_barang']; ?></td>
                        <td><?= $row['volume']; ?></td>
                        <td><?= $row['satuan']; ?></td>
                        <td class="text-right"><?= 'Rp.'.number_format($row['harga_satuan'],0,'','.'); ?></td>
                        <td class="text-right"><?= 'Rp.'.number_format($row['sub_total'],0,'','.'); ?></td>
                        <td align=" center">
                            <!-- <a href="#" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                                title="Ubah Data" onclick="edit(<?=$row['idbarang'];?>)"><i class="fas fa-edit"></i>
                            </a> -->
                            <a href="<?=base_url('invoice/hapus_inv/');?><?=$row['idinvoice_detail'];?>/<?=$_GET['inv_id'];?>"
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