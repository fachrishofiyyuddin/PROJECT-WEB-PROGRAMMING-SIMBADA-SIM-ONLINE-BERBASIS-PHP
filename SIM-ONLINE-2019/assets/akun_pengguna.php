<center>
<h3>
     <b>AKUN PENGGUNA</b>
     <br><br>
     <a href="?halaman=pengguna_tambah" class="btn btn-primary btn-sm">TAMBAH</a>
</h3>
</center>

<br>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <!-- <th>No.<span style='color:red'>*</span></th> -->
                    <th>ALAMAT E-MAIL<span style='color:red'>*</span></th>
                    <th>NAMA<span style='color:red'>*</span></th>
                    <th>PASSWORD<span style='color:red'>*</span></th>
                    <th>STATUS<span style='color:red'>*</span></th>
                    <th>AKSI<span style='color:red'>*</span></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql_tampil = "SELECT * FROM tb_pengguna";
                    $query_tampil = mysqli_query($koneksi, $sql_tampil);
                    $no=1;
                    while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
                ?>
                <tr>
                    <!-- <td><?php echo $no; ?></td> -->
                    <td><?php echo $data['email']; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['password']; ?></td>
                    <td><?php echo $data['status']; ?></td>
                    <td>
                                     

                    <a href="?halaman=pengguna_ubah&email=<?php echo $data['email']; ?>" class="btn btn-warning btn-sm">EDIT</a>
                    <a href="?halaman=akun_pengguna&email=<?php echo $data['email']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ')" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                </tr>
                <?php        
                    $no++;
                    }
                ?>
            </tbody>
        </table>
        <?php
                if(isset($_GET['email'])){
                    //mulai proses hapus
                    $sql_hapus = "DELETE FROM tb_pengguna WHERE email='".$_GET['email']."'";
                    $query_hapus = mysqli_query($koneksi, $sql_hapus);
        
                    if($query_hapus){
                        echo "<script>alert('Hapus Berhasil')</script>";
                        echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=akun_pengguna'>";
                    }else{
                        echo "<script>alert('Hapus Gagal')</script>";
                        echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=akun_pengguna'>";
                    }
                }
        ?>

