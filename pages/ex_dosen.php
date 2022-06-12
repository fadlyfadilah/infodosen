<?php
include 'fungsi.php';

$dosen = queryy('SELECT * FROM `dosen`');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Dosen Aktif</title>
</head>

<body>
    <style type="text/css">
        body {
            font-family: sans-serif;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px solid #3c3c3c;
            padding: 3px 8px;

        }

        a {
            background: blue;
            color: #fff;
            padding: 8px 10px;
            text-decoration: none;
            border-radius: 2px;
        }
    </style>

    <?php
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Laporan Data Dosen Aktif.xls");
    ?>

    <center>
        <h1>Data Dosen</h1>
    </center>

    <table border="1">
        <tr>
            <th rowspan='2'>No</th>
            <th rowspan='2'>Nama Dosen</th>
            <th rowspan='2'>NIDN/NIDK</th>
            <th colspan='2'>Pendidikan Pasca Sarjana</th>
            <th rowspan='2'>Bidang Ahli</th>
            <th rowspan='2'>Jabatan Akademik</th>
            <th rowspan='2'>Sertifikat Pendidikan</th>
            <th rowspan='2'>Matakuliah yang Diampu</th>

        </tr>
        <tr>
            <td>Magister/Magister Terapan/Spesialis</td>
            <td>Doktor/Doktor Terapan/ Spesialis</td>
        </tr>
        <?php foreach($dosen as $d) { ?>
            <?php $no=0 ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $d['nama_lengkap']; ?></td>
            <td><?= $d['nidn']; ?></td>
            <td><?= $d['pendidikan_s2']; ?></td>
            <td><?= $d['pedidikan_s3']; ?></td>
            <td><?= $d['bidang_ahli']; ?></td>
            <td><?= $d['jafung']; ?></td>
            <td><?= $d['sertipedik']; ?></td>
            <td><?= $d['matkul']; ?></td>
        </tr>
        <?php $no++; } ?>
    </table>
</body>

</html>