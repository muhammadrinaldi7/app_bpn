<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <style type="text/css">
        @media print{@page {size: landscape}}
        body {
            font-family: Arial;
            color: black;
            font-size: 10px;
        }
        .table th, .table td {
        vertical-align: middle;
        line-height: 1;
        white-space: nowrap;
        padding: 0.2rem 0.2rem;
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

<?php
 ?>

<body onLoad="window.print()">
<table border="0px solid" align="center" width="100%">
<tr align="center">
        <td>
                <img width="70px" src="<?= base_url() ?>assets/img/bpnlogo.png">
            </td>
           <td>
               <b> 
                <font size="4">KEMENTRIAN AGRARIA DAN TATA RUANG/</font> <br>
                <font size="4"> BADAN PERTANAHAN NASIONAL  KANTOR PERTANAHAN KABUPATEN BANJAR</font> <br>
                <font size="4">PROVINSI KALIMANTAN SELATAN</font><br></b>
                <font size="3">Jalan Menteri Empat No. 04 Kelurahan Sungai Paring Martapura 70613. Telepon: 0511-4271294</font><br>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <hr size="3px" color="black">
            </td>
        </tr>
</table>
    <div style="text-align: center;font-size:20px">
       <b> <u> SURAT TUGAS </u></b>
    </div>
    <br>
    <div style="text-align: left;font-size:11px;margin-bottom:5px">
        Yang Bertanda Tangan Dibawah Ini :
    </div>
    
    <div  style="text-align: left;font-size:14px;margin-bottom:5px">
      <table style="font-size:14px" border="0px solid">
        <tr>
            <td style="padding: 10px"></td>
            <td>Nama </td>
            <td style="padding-right: 54px"></td>
            <td> <b> : Drs. Fredy Marfin, M.Si</b></td>
        </tr>
        <tr>
            <td style="padding: 10px"></td>
            <td>NIP</td>
            <td style="padding-right: 54px"></td>
            <td>: 19710304 199403 1 001</td>
        </tr>
        <tr>
            <td style="padding: 10px"></td>
            <td>Jabatan</td>
            <td style="padding-right: 54px"></td>
            <td>: Kepala Dinas BPN</td>
        </tr>
      </table>
    </div>
    <div style="text-align: left;font-size:11px;margin-bottom:5px">
        Memberikan Tugas Kepada :
    </div>
    <div style="text-align: left;font-size:14px;margin-bottom:5px">
    <?php foreach ($tugas as $p ) : ?>
    <?php endforeach; ?>
    <table style="font-size:14px" border="0px solid">
        <tr>
            <td style="padding: 10px"></td>
            <td>Nama </td>
            <td style="padding: 10px"></td>
            <td> <b> : <?= $p->nama_pegawai ?></b></td>
        </tr>
        <tr>
            <td style="padding: 10px"></td>
            <td>NIK</td>
            <td style="padding: 10px"></td>
            <td>: <?= $p->nik ?></td>
        </tr>
        <tr>
            <td style="padding: 10px"></td>
            <td>Tanggal Lahir</td>
            <td style="padding: 10px"></td>
            <td>: <?= $p->tgl_lahir ?></td>
        </tr>
      </table>
    </div>
    <div style="text-align: left;font-size:14px;margin-bottom:5px;font-size:11px">
    Untuk melaksanakan tugas ATR/BPN Kabupaten Martapura dalam rangka : <br>
    Melaksanakan pengukuran dan pemetaan dengan lokasi tanah dibawah ini, hasil pelaksanaan tugas supaya dilaporkan. <br> 
    </div>
    <div style="text-align: left;font-size:14px;margin-bottom:5px">
    <table style="font-size:14px">
        <?php foreach ($x as $a) :?>
        <?php endforeach; ?>
        <tr>
            <td style="padding: 10px"></td>
            <td>Kode Permohonan</td>
            <td style="padding: 10px"></td>
            <td> <b> : <?= $a->kode_permohonan ?></b></td>
        </tr>
        <tr>
            <td style="padding: 10px"></td>
            <td>Nama Pemohon</td>
            <td style="padding: 10px"></td>
            <td> <b> : <?= $a->nama_pemohon ?></b></td>
        </tr>
        <tr>
            <td style="padding: 10px"></td>
            <td>Alamat</td>
            <td style="padding: 10px"></td>
            <td>: <?= $a->alamat ?></td>
        </tr>
        <tr>
            <td style="padding: 10px"></td>
            <td>Kelurahan</td>
            <td style="padding: 10px"></td>
            <td>: <?= $a->kelurahan ?></td>
        </tr>
        <tr>
            <td style="padding: 10px"></td>
            <td>Kecamatan</td>
            <td style="padding: 10px"></td>
            <td>: <?= $a->kecamatan ?></td>
        </tr>
    </table>
    </div>
    Demikian surat tugas ini dibuat untuk dilaksanakan dengan penuh tanggung jawab dan dipergunakan sebagaimana mestinya.
    <br><br>
    <div style="text-align: left; display: inline-block; float: right; margin-left: 180px;">
        <label>
        Banjarbaru, <?= tgl_indo(date('Y-m-d')) ?>
            <br>
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