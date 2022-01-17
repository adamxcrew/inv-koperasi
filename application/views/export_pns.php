<?php
    header("Chace-Control: no-chace, must-revalidate");
    header("Pragma: no-chace");
    header("Content-type: application/x-msexcel");
    header("Content-type: application/octet-stream");
    header("Content-Disposition: attachment; filename=Export_Excel_PNS.xls");
?>

<style type="text/css">
table,
th,
td {
    border-collapse: collapse;
    padding: 15px;
    margin: 10px;
    color: #000;
    font-size: 12pt;
    font-family: times;
}
</style>

<div style="text-align: center;">
    <span style="margin-left: 10px; font-size: 14px; font-family: times;"><b></b></span>

</div>
<br>
<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>NIP</th>
            <th>Nama</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Agama</th>
            <th>Karpeg</th>
            <th>TMPTCPNS</th>
            <th>No. SKCP</th>
            <th>Tanggal SKCP</th>
            <th>TMTPNS</th>
            <th>No. SKPN</th>
            <th>Tanggal PNS</th>
            <th>Profesi</th>
            <th>Tanggal Jabatan</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php $n=1; foreach($list_pns as $row): ?>
        <tr>
            <td><?=$n++; ?></td>
            <td><?=$row['nip']; ?></td>
            <td><?=$row['nama']; ?></td>
            <td><?=$row['tempat_lahir']; ?></td>
            <td><?=$row['tgl_lahir']; ?></td>
            <td><?=$row['agama']; ?></td>
            <td><?=$row['karpeg']; ?></td>
            <td><?=$row['tmtcpns']; ?></td>
            <td><?=$row['noskcp']; ?></td>
            <td><?=$row['tgl_skcp']; ?></td>
            <td><?=$row['tmtpns']; ?></td>
            <td><?=$row['noskpn']; ?></td>
            <td><?=$row['tgl_pns']; ?></td>
            <td><?=$row['profesi']; ?></td>
            <td><?=$row['tgl_jabatan']; ?></td>
            <td><?=$row['status']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>