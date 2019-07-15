<?php
    if(isset($_GET['email'])) {
        $sql_cek = "SELECT * FROM tb_pengguna WHERE
            email='".$_GET['email']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<form method="post" enctype="multipart/form-data">
    <center>
        <h5>
            <b>UBAH AKUN PENGGUNA</b>   
        </h5>
    </center>
        <div class="form-group">
                <label>Alamat E-mail<span style='color:red'>*</span></label>
                <input type="text" readonly="" class="form-control" style='text-transform:uppercase' value="<?php echo $data_cek['email']; ?>" placeholder="email" name="email" required="">
            </div>

            <div class="form-group">
                <label>Nama<span style='color:red'>*</span></label>
                <input type="text" class="form-control" style='text-transform:uppercase' placeholder="Nama" value="<?php echo $data_cek['nama']; ?>" name="nama" required="">
            </div>

            <div class="form-group">
                <label>Password<span style='color:red'>*</span></label>
                <input type="text" class="form-control" style='text-transform:uppercase' placeholder="Password" value="<?php echo $data_cek['password']; ?>" name="password" required="">
            </div>

            <div class="form-group">
                <label>Status<span style='color:red'>*</span></label>
                <input type="text" class="form-control" style='text-transform:uppercase' placeholder="Status" name="status" value="<?php echo $data_cek['status']; ?>" required="">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm" name="btnUBAH">UBAH</button>
                <a href="?halaman=akun_pengguna" class="btn btn-danger btn-sm">BATAL</a>
            </div>
</form>
<?php
if(isset($_POST['btnUBAH'])) {
        //mulai proses ubah
        $sql_ubah = "UPDATE tb_pengguna SET
            nama='".$_POST['nama']."',
            password='".$_POST['password']."',
            status='".$_POST['status']."'
            WHERE email='".$_POST['email']."'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);

        if($query_ubah) {
            echo "<script>alert('Ubah Berhasil ^-^')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?halaman=akun_pengguna'>";
        }
    }
?>