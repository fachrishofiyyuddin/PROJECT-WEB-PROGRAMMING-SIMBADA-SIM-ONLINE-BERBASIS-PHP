<?php
    $sql_simpan = "SELECT * FROM tb_pendaftaran order by email desc limit 1";
    $query= mysqli_query($koneksi,$sql_simpan);
    $data = mysqli_fetch_array($query);
?>
<form method="POST">
    <h5 class="title">
        <center>
            <h3><b>TAMBAH DATA PRIBADI</b></h3>
        </center>
        <br>
    </h5>

            <div class="form-group">
                <!-- <label>Alamat E-mail <span class="required" style="color:red">*</span></label> -->
                <input type="text" class="form-control" name="email" readonly="" value="<?php  echo $data['email']; ?>" required="">
            </div>

            <div class="form-group">
                <label>Nama Lengkap <span class="required" style="color:red">*</span></label>
                <input type="text" class="form-control" name="nama"  placeholder="Nama Lengkap" required="">
            </div>

            <div class="form-group">
                <label>Nik<span class="required" style="color:red">*</span></label>
                <input type="number" class="form-control" name="nik"  placeholder="Nik" required="">
            </div>

            <div class="form-group">
                <label>Jenis Kelamin <span class="required" style="color:red">*</span></label>
                <select name="jekel" class="form-control" >
                    <option value="" selected="selected">(Pilih JENIS KELAMIN)</option>
                    <option value="Pria">Pria</option>
                    <option value="Wanita">Wanita</option>
                </select>
            </div>

            <div class="form-group">
                <label class="required">Tanggal Lahir <span style="color:red">*</span></label>
                <input type="date" name="tgllhr" class="form-control">
            </div>

            <div class="form-group">
                <label>Kota <span class="required" style="color:red">*</span></label>
                <input type="text" name="kota" class="form-control"  placeholder="Kota" required="">
            </div>

            <div class="form-group">
                <label>Agama <span class="required" style="color:red">*</span></label>
                <select name="agama" class="form-control" >
                    <option value="" selected="selected">(Pilih AGAMA)</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katholik">Katholik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Budha">Budha</option>
                </select>
            </div>

            <div class="form-group">
                <label>Tinggi Badan <span class="required" style="color:red">*</span></label>
                <input type="number" name="tinggibdn" class="form-control"  placeholder="Tinggi Badan" required="">
            </div>

            <div class="form-group">
                <label>Pekerjaan <span class="required" style="color:red">*</span></label>
                <select name="pekerjaan" class="form-control" >
                    <option value="" selected="selected">(Pilih PEKERJAAN)</option>
                    <option value="Mahasiswa">Mahasiswa</option>
                    <option value="Wiraswasta">Wiraswasta</option>
                    <option value="Wirausaha">Wirausaha</option>
                    <option value="Pengangguran">Pengangguran</option>
                </select>
            </div>

            <div class="form-group">
                <label>No Telepon <span class="required" style="color:red">*</span></label>
                <input type="number" name="telepon" class="form-control"  placeholder="No Telepon" required="">
            </div>

            <div class="form-group">
                <button class="btn btn-primary btn-sm" name="btnSIMPAN">Simpan</button>
                <a href="?halaman=beranda" class="btn btn-danger btn-sm">Batal</a>
            </div>
</form>
<?php
    if(isset($_POST['btnSIMPAN'])){
        //proses simpan
        $sql_simpan = "INSERT INTO tb_pemohon (nik,email,nama,jekel,tgllhr,kota,agama,tinggibdn,pekerjaan,telepon) VALUE (
            '".$_POST['nik']."',
            '".$_POST['email']."',
            '".$_POST['nama']."',
            '".$_POST['jekel']."',
            '".$_POST['tgllhr']."',
            '".$_POST['kota']."',
            '".$_POST['agama']."',
            '".$_POST['tinggibdn']."',
            '".$_POST['pekerjaan']."',
            '".$_POST['telepon']."')";
        $query_simpan = mysqli_query($koneksi,$sql_simpan);
            if($query_simpan){
                echo "<script>alert('Simpan Berhasil')</script>";
                echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=cetak_permohonan'>";
            }
    }

?>
