<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <style type="text/css">
        body {
            font-family: Arial;
            color: black;
        }
    </style>
</head>
<?php
function rupiah($angka)
{

    $hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.');
    return $hasil_rupiah;
}
?>

<body onLoad="window.print()">
    <table border="0" align="center" width="100%">
        <tr>
            <td>
            <img style="margin-left:40px" width="105px" src="<?= base_url();?>assets/img/bpnlogo.png"> <br>
            </td>
            <td align="center">
            <p style="font-size:22px;margin-right:40px;margin-bottom:1px">
                <b>KEMENTRIAN AGRARIA DAN TATA RUANG/ <br> BADAN PERTANAHAN NASIONAL</b>
            </p>
            <p style="font-size:18px;margin-right:40px">
           <b> KANTOR PERTANAHAN KABUPATEN BANJAR<br>PROVINSI KALIMANTAN SELATAN</b>
            </p>
            </td>
        </tr>
        <tr align="center" style="margin-bottom:1px">
            <td colspan='2'>
                <p style="font-size:15px;margin-bottom:1px">Jalan Menteri Empat No. 04 Kelurahan Sungai Paring Martapura 70613. Telepon: 0511-4271294</p>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <hr  color="black">
            </td>
        </tr>
    </table>
    <div style="text-align: center;font-size:22px">
        LAPORAN DATA ALAT 
    </div>
    <br>
    <div style="text-align: left;font-size:14px;margin-bottom:5px">
        PRIODE : <?php echo strtoupper(tgl_indo(date('Y-m-d'))); ?>
    </div>
    
    <table class="table table-striped table-bordered" width="100%">
        <thead style="font-size:12px">
            <tr>
                <th>No</th>
                <th>Kode Alat</th>
                <th>Nama Alat</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody style="font-size:12px">
        <?php $no=1; foreach($alat as $p) :?>
                <tr>
                <td><?= $no++ ?></td>
                <td><?= $p->kode_alat ?></td>
                <td><?= $p->nama_alat ?></td>      
                <td><?= $p->status ?></td> 
                </tr>
            <?php endforeach ?>

        </tbody>
    </table>

    <!-- AKHIRAN HALAMAN -->


    <!-- MULAI HALAMAN -->

    <br><br><br>

    <div style="text-align: left; display: inline-block; float: left; margin-right: 50px;">
        <label>
        
            <br><br>
            Dibuat Oleh :
            <br>
            <p style="text-align: center;">
                <b>STAFF KANTOR</b>
            </p>
            <br><br><br><br>
            <p style="text-align: center;">
                <b><u>Pramudita Kumala Ardianti, S.T.</u></b><br>
                <b>NIP. 19930814 201881 2 001</b>
            </p>
        </label>
    </div>

    <div style="text-align: left; display: inline-block; float: right; margin-left: 180px;">
        <label>
        Banjarbaru, <?= tgl_indo(date('Y-m-d')) ?>
            <br><br>
            Mengetahui :
            <br>
            <p style="text-align: center;">
                <b>KEPALA DINAS BPN</b>
            </p>
            <br><br><br><br>
            <p style="text-align: center;">
            <b><u>Drs. Fredy Marfin, M.Si</u></b><br>
                <b>NIP. 19710304 199403 1 001</b>
            </p>
        </label>
    </div>



</body>

</html>