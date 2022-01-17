<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Daftar Berkas "<b><?= $row['nama']; ?></b>"</h1>

<?php 
if($row['jenis_jabatan']=='struktural'){
    $tahun = 1460;
}else{
    $tahun = 730;
}
?>
<?php if(date('Y')==date('Y',strtotime($row['tmtpns'])+60*60*24*$tahun)):?>
<!-- Informasi Kenaikan Pangkat -->
<div class="card shadow mb-4">
    <div class="card-body">
        <p class="text-center" style="color:red;font-size: 14pt;"><i class="fa fa-exclamation-triangle"></i> BERDASARKAN
            JADWAL DAN KETENTUAN YANG BERLAKU BAHWA BAPAK/IBU <b><u><?=strtoupper($ket_berkas['nama']);?></u></b> SUDAH
            DAPAT MELAKUKAN PENGUSULAN KENAIKAN PANGKAT !</p>
    </div>
</div>
<?php endif;?>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <form action="<?=base_url('pegawai/upload_berkas');?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-7">
                    <div class="form-group">
                        <input type="hidden" name="id_pegawai" value="<?= $row['id_pegawai'];?>">
                        <input type="text" name="keterangan" id="keterangan" class="form-control"
                            placeholder="Keterangan Berkas" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="file" name="berkas" id="berkas" class="form-control">
                    </div>
                </div>
                <div class="col-md-2 text-center">
                    <button type="submit" class="btn btn-success"><i class="fas fa-upload"></i> Upload</button>
                </div>
            </div>
        </form>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-sm text-nowrap" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="45">NO</th>
                        <th>KETERANGAN</th>
                        <th width="100">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $n=1; foreach($all_berkas as $row): ?>
                    <tr>
                        <td><?= $n++; ?></td>
                        <td><?= ucwords($row['keterangan']); ?></td>
                        <td>
                            <a href="<?=base_url('uploads/').$row['nama_berkas'];?>"
                                class="btn btn-info btn-sm btn-circle" data-toggle="tooltip" data-placement="top"
                                title="Lihat" target="_blank"><i class="fas fa-eye"></i>
                            </a>
                            <a href="<?=base_url('pegawai/hapus_berkas/');?><?=$row['id_berkas'];?>"
                                class="btn btn-danger btn-sm btn-hapus btn-circle" data-toggle="tooltip"
                                data-placement="top" title="Hapus Data"><i class="fas fa-trash"></i> </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>