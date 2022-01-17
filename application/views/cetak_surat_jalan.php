<html>

<head>
    <style>
    h2 {
        padding: 0px;
        margin: 0px;
        font-size: 14pt;
    }

    h4 {
        font-size: 12pt;
    }

    text {
        padding: 0px;
    }

    table {
        border-collapse: collapse;
        font-size: 11pt;
    }

    th,
    td {
        padding: 3px;
    }

    .tab th {
        border: 0.5px solid #000;
    }

    .tab td {
        border: 0.5px solid #000;
        padding: 3px;
    }

    table.tab {
        table-layout: auto;
        border: 0.5px solid #000;
        width: 100%;
    }

    table.no-border {
        table-layout: auto;
        border: 0px solid #000;
        width: 100%;
    }

    .rp {
        float: left;
        text-align: left;
    }

    .left {
        text-align: left;
    }

    .center {
        text-align: center;
    }

    .right {
        text-align: right;
    }

    .b {
        font-weight: bold;
    }

    .i {
        font-style: italic;
    }
    </style>
    <title><?= _app('name') ?></title>
</head>

<body>
    <div style="border:1px #000 solid;">
        <div style="page-break-after:always;margin-top:0%;padding:5px 10px 5px 10px;">
            <div style="margin-top:0%;float:left;margin-left:15px;margin-right:25px;">
                <img src="<?= base_url('/uploads/'._app('logo')); ?>" width="120" height="80">
            </div>
            <div style="margin-bottom:40px;">
                <p style="font-size:12pt;font-weight:bold;text-align:center;margin-top:1%;margin-bottom:1%;">KOPERASI
                    SERBA USAHA (KSU <?= _app('name'); ?>)</p>
                <p style="font-size:12pt;font-weight:bold;text-align:center;margin-top:1%;margin-bottom:1%;">Distrik
                    Bintuni, Kabupaten Teluk Bintuni, Provinsi Papua Barat</p>
                <p style="font-size:12pt;font-weight:bold;text-align:center;margin-top:1%;margin-bottom:1%;">No. HP
                    <?= _app('name'); ?>, e-mail : <?= _app('email'); ?></p>
                <hr style="border-color:black;">
            </div>
            <div style="text-align:center;">
                <h4>SURAT JALAN</h4>
            </div>
            <!-- <div style="line-height:4px;float:left;margin-right:20%;margin-top:-20px;margin-bottom:25px;">
                <h5>KOPERASI SERBA USAHA (KSU)</h5>
                <h3 style="color:#00008B;"><?= _app('name'); ?></h3>
                <p><?= _app('address'); ?></p>
                <p>Email : <?= _app('email'); ?></p>
                <p>No. HP : <?= _app('no_hp'); ?></p>
            </div>
            <div style="line-height:5px;margin-left:40px;">
                <p>Bintuni, <?= date('d F Y'); ?></p>
                <p>Kepada Yth :</p>
                <p style="font-size:12pt;font-weight:bold;"></p>
                <h4><?= inv('nama_customer',$id); ?></h4>
                <p>Di. TANGGUH LNG</p>
                <p style="margin-bottom:-5px;">Lokasi Tujuan : </p>
                <h4><?= inv('tujuan',$id); ?></h4>
            </div> -->
            <table class="tab">
                <tr>
                    <td rowspan="4">
                        <h4 style="margin-top:-15px;">KEPADA YTH :</h4>
                        <h4 style="margin-top:-15px;"><?= inv('nama_customer',$id); ?></h4>
                        <h4 style="margin-bottom:-15px;">DI. TANGGUH LNG</h4>
                    </td>
                    <td class="b" width="120">TGL</td>
                    <td class="b" width="3">:</td>
                    <td class="b"><?= date('d F Y',strtotime(inv('tanggal',$id))); ?></td>
                </tr>
                <tr>
                    <td class="b" width="120">Nomor Surat</td>
                    <td class="b" width="3">:</td>
                    <td class="b"><?= inv('no_surat',$id); ?></td>
                </tr>
                <tr>
                    <td class="b" width="120">Lokasi Tujuan</td>
                    <td class="b" width="3">:</td>
                    <td class="b"><?= inv('tujuan',$id); ?></td>
                </tr>
                <tr>
                    <td class="b" width="120">Nomor PO</td>
                    <td class="b" width="3">:</td>
                    <td class="b"><?= inv('no_po',$id); ?></td>
                </tr>
            </table>
            <br>
            <!-- <hr style="border-color:black;"> -->
            <table class="tab">
                <tr style="background-color:#F7DC6F;color:black;">
                    <th width="20">No.</th>
                    <th>JENIS BARANG</th>
                    <th width="60">JUMLAH</th>
                    <th width="60">SATUAN</th>
                    <th>KETERANGAN</th>
                </tr>
                <?php $n=1;foreach(detail_inv($id) as $row): ?>
                <tr>
                    <td class="center"><?= $n++; ?></td>
                    <td><?= $row['nama_barang']; ?></td>
                    <td class="center"><?= $row['volume']; ?></td>
                    <td class="center"><?= $row['satuan']; ?></td>
                    <td width="25%"></td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td class="center b" colspan="2">TOTAL</td>
                    <td class="center b"><?= uang(t_inv('t_volume',$id)); ?></td>
                    <td class="right b" colspan="2">
                        <?php foreach(t_satuan($id) as $row): ?>
                        [<?= $row['t_volume'].' '.$row['satuan']; ?>]
                        <?php endforeach; ?>
                    </td>
                </tr>
            </table>
            <!-- <table class="no-border">
                <tr>
                    <td>Terbilang : </td>
                    <td class="right b">Total</td>
                    <td class="right b" style="border:1.5px solid #000;" width="25%"><span
                            class="rp">Rp</span><?= uang(t_inv('total',$id)); ?></td>
                </tr>
                <tr>
                    <td class="i b"><?= ucwords(terbilang(t_inv('total',$id))); ?></td>
                </tr>
            </table> -->
            <table class="no-border">
                <tr>
                    <td class="center" width="50%">
                        <p>Diterima oleh,</p>
                        <br>
                        <br>
                        <br>
                        <p>.......................................................</p>
                        <h4 style="margin-top:-10px;margin-bottom:-5px;"><?= inv('nama_customer',$id); ?></h4>
                    </td>
                    <td class="center" width="50%">
                        <p>Diserahkan oleh,</p>
                        <br>
                        <br>
                        <br>
                        <h4><?= _app('admin',$id); ?></h4>
                        <p style="margin-top:-15px;">Admin KSU <?= _app('name'); ?></p>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>


</html>

<script>
window.print();
</script>