<?php
   $koneksi = mysqli_connect("localhost","root","","simbada1"); 
?>
<html>
    <head>
        <title>KARTU SIM</title>
        <link href="css/bootstrap-min-css" rel="stylesheet">
    </head> 
    <body>
    <img src="img/1.png" alt="">
    <table>
    <?php
        if(isset($_GET['no_sim'])){
            $sql_tampil = "SELECT * FROM tb_pendaftaran natural join tb_pemohon natural join tb_sim WHERE no_sim='".$_GET['no_sim']."'";
            $query_tampil = mysqli_query($koneksi,$sql_tampil);
            $array = mysqli_fetch_array($query_tampil,MYSQLI_BOTH);
        }
    ?>
        <tr>
            <td>Nama Lengkap</td>
            <td>:</td>
            <td style='text-transform:uppercase'><?php echo $array['nama']; ?></td>
        </tr>
        <tr>
            <td>Jekel</td>
            <td>:</td>
            <td style='text-transform:uppercase'><?php echo $array['jekel']; ?></td>
        </tr>
        <tr>
            <td>Kota</td>
            <td>:</td>
            <td style='text-transform:uppercase'><?php echo $array['kota']; ?></td>
            
        </tr>
        <tr>
            <td>Tanggal Lahir</td>
            <td>:</td>
            <td style='text-transform:uppercase'><?php echo $array['tgllhr']; ?></td>
        </tr>
        <tr>
            <td>Tinggi</td>
            <td>:</td>
            <td style='text-transform:uppercase'><?php echo $array['tinggibdn']; ?> cm</td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td>:</td>
            <td style='text-transform:uppercase'><?php echo $array['pekerjaan']; ?></td>
        </tr>
        <tr>
            <td>No. SIM</td>
            <td>:</td>
            <td style='text-transform:uppercase'><?php echo $array['no_sim']; ?></td>
        </tr>
        <tr>
            <td>Gol. SIM</td>
            <td>:</td>
            <td style='text-transform:uppercase'><?php echo $array['gol_sim']; ?></td>
        </tr>
        <tr>
            <td>Berlaku</td>
            <td>:</td>
            <td style='text-transform:uppercase'><?php echo $array['berlaku']; ?></td>
        </tr>
        <tr>
            <td>Foto</td>
            <td>:</td>
            <td><img src="dataFoto/<?php echo $array['foto']; ?>" alt="" style="width:75px;height:75px;"></td>
        </tr>
        <tr>
            <td>Kudus, <?php echo date("d-m-Y");?></td>
        </tr>
        <tr>
            <td>Korlantas Polri</td>
        </tr>
    </table>
    <!-- <img src="img/3.png" alt=""> -->
        <script>
            window.print();
        </script>
    </body>
</html>