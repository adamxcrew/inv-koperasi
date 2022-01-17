<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Daftar Kenaikan Gaji Berkala</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <form action="" method="get">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <select name="tahun_kenaikan" id="tahun_kenaikan" class="form-control select2">
                            <option value="">Pilih Tahun</option>
                            <option value="2021">Tahun 2021</option>
                            <option value="2022">Tahun 2022</option>
                            <option value="2023">Tahun 2023</option>
                            <option value="2024">Tahun 2024</option>
                            <option value="2025">Tahun 2025</option>
                            <option value="2026">Tahun 2026</option>
                            <option value="2027">Tahun 2027</option>
                            <option value="2028">Tahun 2028</option>
                            <option value="2029">Tahun 2029</option>
                            <option value="2030">Tahun 2030</option>
                            <option value="2031">Tahun 2031</option>
                            <option value="2032">Tahun 2032</option>
                            <option value="2033">Tahun 2033</option>
                            <option value="2034">Tahun 2034</option>
                            <option value="2035">Tahun 2035</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-info"><i class="fas fa-eye"></i> Tampilkan</button>
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
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>TMTPNS</th>
                        <th>Tahun Naik Gaji</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $n=1; foreach($list_pns as $row): ?>
                    <tr>
                        <td><?= $n++; ?></td>
                        <td>
                            <a href="<?=base_url('pegawai/berkas/'.$row['id_pegawai']);?>"><?= $row['nip']; ?></a>
                        </td>
                        <td><?= ucwords($row['nama']); ?></td>
                        <td><?= $row['tmtpns']; ?></td>
                        <td><?= $row['tahun_naik']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>