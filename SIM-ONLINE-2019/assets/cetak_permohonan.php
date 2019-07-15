<center>
        <h3 class="title">
          <b>BUKTI PENDAFTARAN</b>  
        </h3>
        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Menu</a>
        <br> <br>
        
            <table class="table table-hover table-bordered">
                <?php
                    $sql_tampil = "SELECT * FROM tb_pendaftaran natural join tb_pemohon order by email desc limit 1";
                    $query_tampil = mysqli_query($koneksi,$sql_tampil);
                    while ($array = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)){

                ?>
                    <tr>
                        <th>NIK<span style='color:red'>*</span></th>
                        <td><?php echo $array['nik']; ?></td>
                    </tr>
                    <tr>
                        <th>NAMA LENGKAP<span style='color:red'>*</span></th>
                        <td><?php echo $array['nama']; ?></td>
                    </tr>
                    <tr>
                        <th>E-MAIL<span style='color:red'>*</span></th>
                        <td><?php echo $array['email']; ?></td>
                    </tr>
                    <tr>
                        <th>KOTA<span style='color:red'>*</span></th>
                        <td><?php echo $array['kota']; ?></td>
                    </tr>
                    <tr>
                        <th>JENIS PERMOHONAN<span style='color:red'>*</span></th>
                        <td><?php echo $array['jenis_permohonan']; ?></td>
                    </tr>
                    <tr>
                        <th>GOLONGAN SIM<span style='color:red'>*</span></th>
                        <td><?php echo $array['gol_sim']; ?></td>
                    </tr>
                    <tr>
                        <th>POLDA KEDATANGAN<span style='color:red'>*</span></th>
                        <td><?php echo $array['polda']; ?></td>
                    </tr>
                    <tr>
                        <th>SATPAS KEDATANGAN<span style='color:red'>*</span></th>
                        <td><?php echo $array['satpas']; ?></td>
                    </tr>

                <?php 
                    }
                ?>
            
            </table>
    </center>
                <?php
                    $sql_simpan = "SELECT * FROM tb_pendaftaran order by email desc limit 1";
                    $query= mysqli_query($koneksi,$sql_simpan);
                    $data = mysqli_fetch_array($query);
                ?>
                <form method="POST">
                    <div class="form-group">
                        <input type="hidden" name="email" value="<?php echo $data['email']; ?>" class="form-control" readonly="">
                    </div>
                    <div class="form-group">
                        <label class="required">TANGGAL KEDATANGAN <span style='color:red'>*</span></label>
                        <input type="date" name="tgl" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-sm" name="btnCETAK">Cetak</button>
                        <a href="?halaman=cetak_permohonan&email=<?php echo $data['email']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin membatalkan pendaftaran ?')" >Batal</a>
                    </div>
                </form>
                <?php
    if(isset($_POST['btnCETAK'])){
        $sql_simpan = "INSERT INTO tb_cetakpendaftaran (email,tgl_kedatangan) VALUES (
            '".$_POST['email']."',
            '".$_POST['tgl']."')";
        $query_simpan = mysqli_query($koneksi,$sql_simpan);

        if($query_simpan){
            echo "<script>alert('Cetak Berhasil')</script>";
            echo "<meta http-equiv='refresh' content='0; url=bukti.php'>";
        }else{
            echo "<script>alert('Cetak Gagal, Silahkan Mengisi dengan Benar!')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?halaman=permohonan'>";
        }
    }else if(isset($_GET['email'])){
        $sql_hapus = "DELETE FROM tb_pendaftaran WHERE email='".$_GET['email']."'";
        $query_hapus = mysqli_query($koneksi,$sql_hapus);

        if($query_hapus){
            echo "<script>alert('Hapus Berhasil!')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?halaman=beranda'>";
        }
    }
?>
                

