<?php
    // $koneksi = mysqli_connect("localhost","id9966066_root","ngehek12345","id9966066_simbada1");
    // $koneksi = mysqli_connect("localhost","id9966066_localhost","ngehek12345","id9966066_simbada5");
    $koneksi = mysqli_connect("localhost","root","","simbada1"); 
?>
<html>
    <head>
        <title>BUKTI</title>
        <link href="asset/bootstrap/css/bootstrap-min-css" rel="stylesheet">
    </head>
    <body>
        <center>
            <br>
            <h3>Bukti Pendaftaran SIM online Polri</h3>
        </center>
        <br>
            <br>
                Terimaksih anda telah melakukan registrasi SIM Online Korlantas Polri, 
                Berikut ini adalah informasi mengenai Registrasi SIM Anda
            <br>
        <br>

        <table class="table table-hover table-bordered">
            <tbody>
            <?php
                    $sql_tampil = "SELECT * FROM tb_pendaftaran natural join tb_pemohon natural join tb_cetakpendaftaran order by email desc limit 1";
                    $query_tampil = mysqli_query($koneksi,$sql_tampil);
                    while ($array = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)){

                ?>
                    <tr>
                        <td><b>Nik</b></td>
                        <td>:</td>
                        <td><?php echo $array['nik']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Nama Lengkap</b></td>
                        <td>:</td>
                        <td style='text-transform:uppercase'><?php echo $array['nama']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Email</b></td>
                        <td>:</td>
                        <td style='text-transform:uppercase'><?php echo $array['email']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Kota</b></td>
                        <td>:</td>
                        <td style='text-transform:uppercase'><?php echo $array['kota']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Jenis Permohonan</b></td>
                        <td>:</td>
                        <td style='text-transform:uppercase'><?php echo $array['jenis_permohonan']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Golongan SIM</b></td>
                        <td>:</td>
                        <td style='text-transform:uppercase'><?php echo $array['gol_sim']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Polda Kedatangan</b></td>
                        <td>:</td>
                        <td style='text-transform:uppercase'><?php echo $array['polda']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Satpas Kedatangan</b></td>
                        <td>:</td>
                        <td style='text-transform:uppercase'><?php echo $array['satpas']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Tanggal Kedatangan</b></td>
                        <td>:</td>
                        <td><?php echo $array['tgl_kedatangan']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Biaya Pendaftaran</b></td>
                        <td>:</td>
                        <td>RP. 85.000</td>
                    </tr>

                <?php 
                    }
                ?>
            </tbody>
        </table>
        <br>
            <br>
                Mohon menunjukan kepada petugas satpas ditempat pada saat kedatngan Anda
                membawa KTP asli dan fotocopy KTP serta SIM lama anda serta fotocopy SIM lama jika mengajukan
                perpanjangan SIM. Terima kasih.
            <br>
        <br>
        <div>
            <b>Kudus, <?php echo date("d-m-Y");?></b>
            <br>
                <br>
                    <br>
                        Hormat kami,
                <br>
            <br>
            <b>Korlantas POLRI<b>
        </div>
        <script>
            window.print();
        </script>
    </body>
</html>