
<html>
    <body>
        <center>
            <h3><b>TAMPIL DATA PEMOHON</b></h3>
        </center>
        <br>
            <form action="?halaman=pemmbuatan_aksi">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>NIK<span style='color:red'>*</span></th>
                            <th>NAMA LENGKAP<span style='color:red'>*</span></th>
                            <th>KOTA<span style='color:red'>*</span></th>
                            <th>TANGGAL LAHIR<span style='color:red'>*</span></th>
                            <th>JEKEL<span style='color:red'>*</span></th>
                            <th>TINGGI<span style='color:red'>*</span></th>
                            <th>PEKERJAAN<span style='color:red'>*</span></th>
                            <th>AKSI<span style='color:red'>*</span></th>
                        </tr>
                    </thead>
                    <?php
                    if(isset($_GET['email'])){
                        $sql_tampil = "SELECT * FROM tb_pemohon WHERE email='".$_GET['email']."'";
                        $query_tampil = mysqli_query($koneksi,$sql_tampil);
                        $array = mysqli_fetch_array($query_tampil,MYSQLI_BOTH);
                    }
                    ?>
                        <tr>
                            <td><?php echo $array['nik']; ?></td>
                            <td style='text-transform:uppercase'><?php echo $array['nama']; ?></td>
                            <td style='text-transform:uppercase'><?php echo $array['kota']; ?></td>
                            <td><?php echo $array['tgllhr']; ?></td>
                            <td style='text-transform:uppercase'><?php echo $array['jekel']; ?></td>
                            <td><?php echo $array['tinggibdn']; ?> CM</td>
                            <td style='text-transform:uppercase'><?php echo $array['pekerjaan']; ?></td>
                            <td>
                                <a href="?halaman=tambah_sim&nik=<?php echo $array['nik']; ?>" class="btn btn-primary btn-sm">Tambah</a>
                                <!-- <a href="?halaman=pembuatan_sim&nik=<?php echo $array['nik']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" class="btn btn-danger btn-sm">Hapus</a> -->
                            </td>
                        </tr>
                </table>
                <a href="?halaman=cek_pendaftaran" class="btn btn-success btn-sm">Kembali</a>
            </form>
    </body>
</html>
<?php
    if(isset($_GET['nik'])){
        $sql_hapus = "DELETE FROM tb_pemohon WHERE nik='".$_GET['nik']."'";
        $query_hapus = mysqli_query($koneksi,$sql_hapus);
        
        if($query_hapus){
            echo "<script>alert('Hapus Berhasil')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?halaman=pembuatan_sim'>";
        }
    }
?>