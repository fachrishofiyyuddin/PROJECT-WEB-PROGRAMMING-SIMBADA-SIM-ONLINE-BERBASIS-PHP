<form method="POST">
    <center>
        <h5 class="title">
            <h3><b>TAMBAH DATA PERMOHONAN</b></h3>
        </h5>
    </center>
    <br>
        <div class="form-group">
            <label>Alamat E-mail <span class="required" style="color:red">*</span></label>
            <input type="email" class="form-control" name="email"  placeholder="Alamat E-mail" required="">
        </div>
        <div class="form-group">
            <label class="required">Jenis Permohonan <span style="color:red">*</span></label>
            <br>
            <input type="radio" name="permohonan" value="Baru"> SIM BARU
            <!-- <input type="radio" name="permohonan" value="PERPANJANG"> PERPANJANG -->
        </div>
        <div class="form-group">
            <label>Golongan SIM <span class="required" style="color:red">*</span></label>
            <br>
            <input type="radio" name="sim" value="C"> C
            <input type="radio" name="sim" value="A"> A

        </div>
        <div class="form-group">
            <label>Polda Kedatangan <span class="required" style="color:red">*</span></label>
            <select name="polda" class="form-control" style="width: 100%" required="">
                <option value="" selected="selected">(Pilih POLDA Kedatangan)</option>
                <option value="Polda Jawa Barat">Polda Jawa Barat</option>
                <option value="Polda Jawa Tengah">Polda Jawa Tengah</option>
                <option value="Polda Jawa Timur">Polda Jawa Timur</option>
                <option value="Polda Yogyakarta">Polda Yogyakarta</option>
                </select>
        </div>
        <div class="form-group">
            <label>Satpas Kedatangan <span class="required" style="color:red">*</span></label>
            <select name="satpas" class="form-control" style="width: 100%" required="">
                <option value="" selected="selected">(Pilih SATPAS Kedatangan)</option>
                <option value="Satpas Jawa Barat">Satpas Jawa Barat</option>
                <option value="Satpas Jawa Tengah">Satpas Jawa Tengah</option>
                <option value="Satpas Jawa Timur">Satpas Jawa Timur</option>
                <option value="Satpas Yogyakarta">Satpas Yogyakarta</option>
                </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-sm" name="btnSIMPAN">Simpan</button>
            <a href="?halaman=beranda" class="btn btn-danger btn-sm">Batal</a>
        </div>
</form>
<?php
    //proses simpan 
    if(isset($_POST['btnSIMPAN'])){
        $sql_simpan = "INSERT INTO tb_pendaftaran (email,jenis_permohonan,gol_sim,polda,satpas) VALUES (
            '".$_POST['email']."',
            '".$_POST['permohonan']."',
            '".$_POST['sim']."',
            '".$_POST['polda']."',
            '".$_POST['satpas']."')";
        $query_simpan = mysqli_query($koneksi,$sql_simpan);

        if($query_simpan){
            echo "<script>alert('Simpan Berhasil')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=pribadi_tambah'>";
        }
    }
?>
