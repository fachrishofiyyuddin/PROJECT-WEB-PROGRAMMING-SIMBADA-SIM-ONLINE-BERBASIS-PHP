<html>
    <head>
        <title>Cek Pendaftaran</title>
    </head>
    <body>
        <center>
            <h3><b>TAMPIL DAFTAR PEMOHON</b></h3>
        </center>
        <br>
        <form action="">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>E-MAIL</th>
                    <th>JENIS PERMOHONAN</th>
                    <th>GOLONGAN SIM</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $sql_tampil = "SELECT * FROM tb_pendaftaran";
                    $query_tampil = mysqli_query($koneksi,$sql_tampil);
                    while($array=mysqli_fetch_array($query_tampil,MYSQLI_BOTH)){
                ?>
                <tr>
                    <td><?php echo $array['email']; ?></td>
                    <td><?php echo $array['jenis_permohonan']; ?></td>
                    <td><?php echo $array['gol_sim']; ?></td>
                    <td>
                        <a href="?halaman=pembuatan_sim&email=<?php echo $array['email']; ?>" class="btn btn-primary btn-sm">Lihat</a>
                        <a href="?halaman=cek_pendaftaran&email=<?php echo $array['email']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                </tr>
                <?php         
                    }
                ?>
        </form>
        
            </tbody>
        </table>
    </body>
</html>

<?php
    if(isset($_GET['email'])){
        $sql_hapus = "DELETE FROM tb_pendaftaran WHERE email='".$_GET['email']."'";
        $query_hapus = mysqli_query($koneksi,$sql_hapus);
        if($query_hapus){
            echo "<script>alert('Data Berhasil dihapus')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?halaman=cek_pendaftaran'>";
        }
    }
?>