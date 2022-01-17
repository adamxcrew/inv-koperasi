<div class="card shadow">
    <div class="card-header">
        <h4>Form Tambah PNS</h4>
    </div>
    <?php if(isset($edit)): ?>
    <form role="form" action="<?=base_url('pegawai/proses_edit_pns');?>" method="post">
        <?php else: ?>
        <form role="form" action="<?=base_url('pegawai/proses_add_pns');?>" method="post">
            <?php endif; ?>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label class="control-label">NIP</label>
                            <input type="hidden" name="id_pegawai" value="<?=isset($edit)?$row['id_pegawai']:'';?>">
                            <input type="text" class="form-control" name="nip" value="<?=isset($edit)?$row['nip']:'';?>"
                                placeholder="Masukkan NIP" />
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <label class="control-label">Nama</label>
                            <input type="text" class="form-control" name="nama"
                                value="<?=isset($edit)?$row['nama']:'';?>" placeholder="Masukkan Nama" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir"
                                value="<?=isset($edit)?$row['tempat_lahir']:'';?>"
                                placeholder="Masukkan Tempat Lahir" />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label class="control-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tgl_lahir"
                                value="<?=isset($edit)?$row['tgl_lahir']:'';?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label class="control-label">Agama</label>
                            <select class="form-control select" name="agama">
                                <option value="Islam" <?=isset($edit)?$row['agama']=='Islam'?'selected':'':'';?>>
                                    Islam</option>
                                <option value="K.Protestan"
                                    <?=isset($edit)?$row['agama']=='K.Protestan'?'selected':'':'';?>>K.Protestan
                                </option>
                                <option value="K.Katolik"
                                    <?=isset($edit)?$row['agama']=='K.Katolik'?'selected':'':'';?>>
                                    K.Katolik
                                </option>
                                <option value="Hindu" <?=isset($edit)?$row['agama']=='Hindu'?'selected':'':'';?>>
                                    Hindu</option>
                                <option value="Budha" <?=isset($edit)?$row['agama']=='Budha'?'selected':'':'';?>>
                                    Budha</option>
                                <option value="Konghucu" <?=isset($edit)?$row['agama']=='Konghucu'?'selected':'':'';?>>
                                    Konghucu</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label">Karpeg</label>
                            <input type="text" class="form-control" name="karpeg"
                                value="<?=isset($edit)?$row['karpeg']:'';?>" placeholder="Masukkan Karpeg" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">TMTCPNS</label>
                            <input type="date" class="form-control" name="tmtcpns"
                                value="<?=isset($edit)?$row['tmtcpns']:'';?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">No. SKCP</label>
                            <input type="text" class="form-control" name="noskcp"
                                value="<?=isset($edit)?$row['noskcp']:'';?>" placeholder="Masukkan No. SKCP" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Tgl SKCP</label>
                            <input type="date" class="form-control" name="tgl_skcp"
                                value="<?=isset($edit)?$row['tgl_skcp']:'';?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">TMTPNS</label>
                            <input type="date" class="form-control" name="tmtpns"
                                value="<?=isset($edit)?$row['tmtpns']:'';?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label">No. SKPN</label>
                            <input type="text" class="form-control" name="noskpn"
                                value="<?=isset($edit)?$row['noskpn']:'';?>" placeholder="Masukkan No. SKPN" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Tgl PNS</label>
                            <input type="date" class="form-control" name="tgl_pns"
                                value="<?=isset($edit)?$row['tgl_pns']:'';?>">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label class="control-label">Profesi</label>
                            <input type="text" class="form-control" name="profesi"
                                value="<?=isset($edit)?$row['profesi']:'';?>" placeholder="Masukkan Profesi" />
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label class="control-label">Unit Kerja</label>
                            <input type="text" class="form-control" name="unit_kerja"
                                value="<?=isset($edit)?$row['unit_kerja']:'';?>" placeholder="Masukkan Unit Kerja" />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label class="control-label">Tgl Jabatan</label>
                            <input type="date" class="form-control" name="tgl_jabatan"
                                value="<?=isset($edit)?$row['tgl_jabatan']:'';?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Jabatan</label>
                            <select class="form-control select2" data-live-search="true" name="id_jabatan">
                                <?php foreach(list_jabatan() as $lj):?>
                                <option value="<?=$lj['id_jabatan'];?>"
                                    <?=isset($edit)?$lj['id_jabatan']==$row['id_jabatan']?'selected':'':'';?>>
                                    <?=strtoupper($lj['pangkat'].' '.$lj['golongan']);?>
                                </option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label class="control-label">Status</label>
                            <select class="form-control" name="status">
                                <option value="Aktif" <?=isset($edit)?$row['status']=='Aktif'?'selected':'':'';?>>
                                    Aktif</option>
                                <option value="Non Aktif"
                                    <?=isset($edit)?$row['status']=='Non Aktif'?'selected':'':'';?>>Non Aktif
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="<?=base_url('menu/pns');?>" class="btn btn-secondary float-left mb-2"><i
                        class="fas fa-undo"></i>
                    Kembali</a>
                <button type="submit" class="btn btn-success float-right mb-2"><i class="fas fa-save"></i>
                    Simpan</button>
            </div>
        </form>
</div>