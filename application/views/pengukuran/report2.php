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
    <div style="text-align: center;font-size:14px">
       <b> LAPORAN JADWAL PENGUKURAN TANAH </b>
    </div>
    <br>
    
    <table style="font-size:10px" class="table table-striped table-bordered" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Pengukuran</th>
                <th>Kode Permohonan</th>
                <th>Kelurahan</th>
                <th>Kecamatan</th>
                <th>Alamat Lokasi</th>
                <th>Nama Pemohon</th>
                <th>Nama Petugas</th>
                <th>Tanggal Pengukuran</th>
                <th>Waktu</th>
            </tr>
        </thead>
        <tbody>
        <?php $no=1; foreach($liat as $s) :?>
                <tr>
                    <td><center><?php echo $no++; ?></center></td>
                    <td><?= $s->kode_ukur ?></td>  
                    <td><?= $s->kode_permohonan ?></td>  
                    <td><?= $s->kelurahan ?></td>  
                    <td><?= $s->kecamatan ?></td>  
                    <td><?= $s->alamat ?></td>
                    <td><?= $s->nama_pemohon?></td>          
                    <td><?= $s->nama_pegawai ?></td>
                    <td><?= tgl_indo($s->tgl_pengukuran) ?></td> 
                    <td><?= $s->waktu?></td> 
                </tr>
            <?php endforeach ?>

        </tbody>
    </table>

    <!-- AKHIRAN HALAMAN -->


    <!-- MULAI HALAMAN -->

    <br><br><br>

    <div style="text-align: left; display: inline-block; float: right; margin-right: 50px;">
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



</body>

</html>