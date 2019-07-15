<form method="POST" enctype="multipart/form-data">
    <center>
        <h3>
           <b>TAMBAH DATA PENGGUNA</b>
        </h3>
    </center>
            <div class="form-group">
                <label>Alamat E-mail<span style='color:red'>*</span></label>
                <input type="text" class="form-control" style='text-transform:uppercase' placeholder="email" name="email" required="">
            </div>

            <div class="form-group">
                <label>Nama<span style='color:red'>*</span></label>
                <input type="text" class="form-control" style='text-transform:uppercase' placeholder="Nama" name="nama" required="">
            </div>

            <div class="form-group">
                <label>Password<span style='color:red'>*</span></label>
                <input type="password" class="form-control" style='text-transform:uppercase' placeholder="Password" name="password" required="">
            </div>

            <div class="form-group">
                <label>Status<span style='color:red'>*</span></label>
                <input type="text" class="form-control" style='text-transform:uppercase' placeholder="Status" name="status" required="">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm" name="btnSIMPAN">SIMPAN</button>
                <a href="?halaman=akun_pengguna" class="btn btn-danger btn-sm">BATAL</a>
            </div>
</form>
<?php
    if(isset($_POST['btnSIMPAN'])) {
        //mulai proses simpan
        $sql_simpan = "INSERT INTO tb_pengguna (email,nama,password,status) VALUES (
            '".$_POST['email']."',
            '".$_POST['nama']."',
            '".$_POST['password']."',
            '".$_POST['status']."')";
        $query_simpan = mysqli_query($koneksi,$sql_simpan);

        if($query_simpan){
            echo "<script>alert('Simpan Berhasil ^-^')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?halaman=akun_pengguna'>";

        }
    }

?>