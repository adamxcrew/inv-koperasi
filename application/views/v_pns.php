<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Daftar PNS</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <?php if($this->session->userdata('level')=='admin' || $this->session->userdata('level')=='staf'): ?>
        <a href="<?=base_url('pegawai/add_pns');?>" class="btn btn-primary btn-icon-split btn-sm">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah</span>
        </a>
        <a href="<?=base_url('pegawai/cetak_pns');?>" class="btn btn-secondary btn-icon-split btn-sm float-right">
            <span class="icon text-white-50">
                <i class="fas fa-file-excel"></i>
            </span>
            <span class="text">Export</span>
        </a>
        <?php endif; ?>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-sm text-nowrap" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="45">NO</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>TTL</th>
                        <th>Agama</th>
                        <th>Karpeg</th>
                        <th>TMTCPNS</th>
                        <th>No.SKCP</th>
                        <th>Tanggal SKCP</th>
                        <th>TMTPNS</th>
                        <th>No.SKPN</th>
                        <th>Tanggal PNS</th>
                        <th>Profesi</th>
                        <th>Unit Kerja</th>
                        <th>Tanggal Jabatan</th>
                        <th>Status</th>
                        <?php if($this->session->userdata('level')=='admin' || $this->session->userdata('level')=='staf'): ?>
                        <th width="100">Aksi</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $n=1; foreach($all_pns as $row): ?>
                    <tr>
                        <td><?= $n++; ?></td>
                        <td>
                            <a href="<?=base_url('pegawai/berkas/').$row['id_pegawai'];?>">
                                <?= $row['nip']; ?>
                            </a>
                        </td>
                        <td><?= ucwords($row['nama']); ?></td>
                        <td><?= $row['tempat_lahir'].', '.date('d F Y',strtotime($row['tgl_lahir'])); ?></td>
                        <td><?= $row['agama']; ?></td>
                        <td><?= $row['karpeg']; ?></td>
                        <td><?= $row['tmtcpns']; ?></td>
                        <td><?= $row['noskcp']; ?></td>
                        <td><?= $row['tgl_skcp']; ?></td>
                        <td><?= $row['tmtpns']; ?></td>
                        <td><?= $row['noskpn']; ?></td>
                        <td><?= $row['tgl_pns']; ?></td>
                        <td><?= $row['profesi']; ?></td>
                        <td><?= $row['unit_kerja']; ?></td>
                        <td><?= $row['tgl_jabatan']; ?></td>
                        <td>
                            <?php if($row['status']=='Aktif'): ?>
                            <span class="badge badge-success"><?= $row['status']; ?></span>
                            <?php else: ?>
                            <span class="badge badge-danger"><?= $row['status']; ?></span>
                            <?php endif; ?>
                        </td>
                        <?php if($this->session->userdata('level')=='admin' || $this->session->userdata('level')=='staf'): ?>
                        <td>
                            <a href="<?=base_url('pegawai/edit_pns/').$row['id_pegawai'];?>"
                                class="btn btn-info btn-sm btn-circle" data-toggle="tooltip" data-placement="top"
                                title="Ubah Data"><i class="fas fa-edit"></i>
                            </a>
                            <a href="<?=base_url('pegawai/hapus_pns/');?><?=$row['id_pegawai'];?>"
                                class="btn btn-danger btn-sm btn-hapus btn-circle" data-toggle="tooltip"
                                data-placement="top" title="Hapus Data"><i class="fas fa-trash"></i> </a>
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>