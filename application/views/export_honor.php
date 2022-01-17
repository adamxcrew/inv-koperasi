<?php
    header("Chace-Control: no-chace, must-revalidate");
    header("Pragma: no-chace");
    header("Content-type: application/x-msexcel");
    header("Content-type: application/octet-stream");
    header("Content-Disposition: attachment; filename=Export_Excel_Honor.xls");
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
            <th>Nama</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Agama</th>
            <th>Unit Kerja</th>
            <th>SK</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php $n=1; foreach($list_honor as $row): ?>
        <tr>
            <td><?=$n++; ?></td>
            <td><?=$row['nama']; ?></td>
            <td><?=$row['tempat_lahir']; ?></td>
            <td><?=$row['tgl_lahir']; ?></td>
            <td><?=$row['agama']; ?></td>
            <td><?=$row['unit_kerja']; ?></td>
            <td><?=$row['sk']; ?></td>
            <td><?=$row['status']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>