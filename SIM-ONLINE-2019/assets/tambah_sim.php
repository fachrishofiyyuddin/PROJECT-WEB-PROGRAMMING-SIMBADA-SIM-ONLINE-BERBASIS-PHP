<?php
   
   date_default_timezone_set("Asia/Jakarta");
   $date= date("Y-m-d");

   $query_kode =mysqli_query($koneksi,"SELECT max(no_sim) as maxKode FROM tb_sim");
    $data = mysqli_fetch_array($query_kode);
   $noOrder = $data['maxKode'];
   $noUrut = (int) substr($noOrder, 9, 2);
   $noUrut++;
   $char = 15;
   $tahun=substr($date, 0, 4);
   $bulan=substr($date, 5, 2);
   $sim = $char .$tahun .$bulan . sprintf("%02s", $noUrut);
   
?>
<!-- <?php
    $sql_tampil = "SELECT * FROM tb_pemohon";
    $query_tampil = mysqli_query($koneksi,$sql_tampil);
    $cek = mysqli_fetch_array($query_tampil,MYSQLI_BOTH);
?> -->
<?php
    if(isset($_GET['nik'])) {
        $sql_cek = "SELECT * FROM tb_pemohon WHERE
            nik='".$_GET['nik']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>
<html>
    <body>
       <center><h3><b>TAMBAH DATA SIM BARU</b></h3></center>
            <form method="POST" enctype="multipart/form-data">
                <div class=form-group>
                    <label>Nik<span style="color:red">*</span></label>
                    <input type="text" name="nik" value="<?php echo $data['nik']; ?>" class="form-control" name="nik" readonly="">
                </div>
                <div class=form-group>
                    <label>Foto<span style="color:red">*</span></label>
                    <input type="file" name="Foto" class="form-control" size="37">
                    <input type="hidden" name="FotoH">
                </div>
                <div class=form-group>
                    <label>No. SIM<span style="color:red">*</span></label>
                    <input type="number" name="sim" class="form-control" value="<?php echo $sim; ?>" readonly="">
                </div>
                <div class=form-group>
                    <label>Berlaku<span style="color:red">*</span></label>
                    <input type="date" name="berlaku" class="form-control">
                </div>
                <div class=form-group>
                    <!-- <label>Nama<span style="color:red">*</span></label> -->
                    <input type="hidden" name="nama" value="<?php echo $data['nama']; ?>" class="form-control" name="nik" readonly="">
                </div>
                <div class=form-group>
                    <!-- <label>Tanggal Lahir<span style="color:red">*</span></label> -->
                    <input type="hidden" name="tgllhr" value="<?php echo $data['tgllhr']; ?>" class="form-control" name="nik" readonly="">
                </div>
                <div class=form-group>
                    <!-- <label>Jekel<span style="color:red">*</span></label> -->
                    <input type="hidden" name="jekel" value="<?php echo $data['jekel']; ?>" class="form-control" name="nik" readonly="">
                </div>
                <div class=form-group>
                    <!-- <label>Kota<span style="color:red">*</span></label> -->
                    <input type="hidden" name="kota" value="<?php echo $data['kota']; ?>" class="form-control" name="nik" readonly="">
                </div>
                <div class=form-group>
                    <!-- <label>Tinggi<span style="color:red">*</span></label> -->
                    <input type="hidden" name="tinggi" value="<?php echo $data['tinggibdn']; ?>" class="form-control" name="nik" readonly="">
                </div>
                <div class=form-group>
                    <!-- <label>Pekerjaan<span style="color:red">*</span></label> -->
                    <input type="hidden" name="pekerjaan" value="<?php echo $data['pekerjaan']; ?>" class="form-control" name="nik" readonly="">
                </div>
                <div class=form-group>
                   <button class="btn btn-primary btn-sm" name="btnSIMPAN">Simpan</button>
                   <a href="?halaman=cek_pendaftaran" class="btn btn-danger btn-sm">Batal</a>
                </div>
            </form>
    </body>
</html>
<?php
    if(isset($_POST['btnSIMPAN'])){
        $nama_foto = isset($_FILES['Foto']);
        $file_foto = $_POST['nik'].".jpg";


        $sql_insert = "INSERT INTO tb_sim (no_sim,nik,foto,berlaku,nama,tgllhr,jekel,kota,tinggi,pekerjaan) VALUES (
            '".$_POST['sim']."',
            '".$_POST['nik']."',
            '".$file_foto."',
            '".$_POST['berlaku']."',
            '".$_POST['nama']."',
            '".$_POST['tgllhr']."',
            '".$_POST['jekel']."',
            '".$_POST['kota']."',
            '".$_POST['tinggi']."',
            '".$_POST['pekerjaan']."')";
        $query_insert = mysqli_query($koneksi,$sql_insert) or die (mysqli_error());

        if($query_insert){
            copy($_FILES['Foto']['tmp_name'],"dataFoto/".$file_foto);
            echo "<script>alert('Berhasil dibuat')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?halaman=cetak_sim'>";
        }
    }
?>