<center>
    <h3><b>CETAK SIM PEMOHON</b></h3>
    <br>
        <form action="" method="GET">
            <table class="table table-hover table-bordered">
                <thead>
                    <th>NAMA<span style='color:red'>*</span></th>
                    <!-- <th>JEKEL<span style='color:red'>*</span></th>
                    <th>KOTA<span style='color:red'>*</span></th>
                    <th>TANGGAL LAHIR<span style='color:red'>*</span></th>
                    <th>TINGGI<span style='color:red'>*</span></th>
                    <th>PEKERJAAN<span style='color:red'>*</span></th> -->
                    <th>NO. SIM<span style='color:red'>*</span></th>
                    <th>BERLAKU<span style='color:red'>*</span></th>
                    <th>FOTO<span style='color:red'>*</span></th>
                    <th>AKSI<span style='color:red'>*</span></th>
                </thead>
                <tbody>
                    <?php 
                        $sql_tampil = "SELECT * FROM tb_pemohon natural join tb_sim";
                        $query_tampil = mysqli_query($koneksi,$sql_tampil);
                        while ($array=mysqli_fetch_array($query_tampil,MYSQLI_BOTH)){
                    ?>
                    
                        <tr>
                            <td style='text-transform:uppercase'><?php echo $array['nama']; ?></td>
                            <!-- <td style='text-transform:uppercase'><?php echo $array['jekel']; ?></td>
                            <td style='text-transform:uppercase'><?php echo $array['kota']; ?></td>
                            <td style='text-transform:uppercase'><?php echo $array['tgllhr']; ?></td>
                            <td style='text-transform:uppercase'><?php echo $array['tinggibdn']; ?> CM</td>
                            <td style='text-transform:uppercase'><?php echo $array['pekerjaan']; ?></td> -->
                            <td style='text-transform:uppercase'><?php echo $array['no_sim']; ?></td>
                            <td style='text-transform:uppercase'><?php echo $array['berlaku']; ?></td>
                            <td><img src="dataFoto/<?php echo $array['foto']; ?>" style="width:75px;height:75px;"</td>
                            <td>
                            <a href="sim_dicetak.php?no_sim=<?php echo $array['no_sim'];?>" class="btn btn-success btn-sm">Cetak</a>
                            <a href="?halaman=ubah_sim&no_sim=<?php echo $array['no_sim']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="?halaman=cetak_sim&no_sim=<?php echo $array['no_sim']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin hapus data ini')">Hapus</a>
                            </td>
                        </tr>
                    <?php       
                        }
                    ?>
                </tbody>
            </table>
        </form>
</center>

<?php
    if(isset($_GET['no_sim'])){
        $sql_hapus = "DELETE FROM tb_sim WHERE no_sim='".$_GET['no_sim']."'";
        $query_hapus = mysqli_query($koneksi,$sql_hapus);
        if($query_hapus){
            echo "<script>alert('Hapus Berhasil')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?halaman=cetak_sim'>";
        }
    }
?>