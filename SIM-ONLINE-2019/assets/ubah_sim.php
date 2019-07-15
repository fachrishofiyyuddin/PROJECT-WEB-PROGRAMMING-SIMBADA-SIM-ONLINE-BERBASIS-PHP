<?php
    if(isset($_GET['no_sim'])){
        $sql_tampil = "SELECT * FROM tb_sim WHERE no_sim='".$_GET['no_sim']."'";
        $query_tampil = mysqli_query($koneksi,$sql_tampil);
        $array = mysqli_fetch_array($query_tampil,MYSQLI_BOTH);
    }
?>
<html>
    <head>
        <title>Ubah SIM</title>
    </head>
    <body>
    <center><h3><b>UBAH DATA SIM</b></h3></center>
        <form method="POST">
            <div class="form-group">
            <label>NO. SIM<span style="color:red">*</span></label>
            <input type="number" name="no_sim" value="<?php echo $array['no_sim']; ?>" class="form-control" readonly="">
            <br>
            <div class="form-group">
            <label>BERLAKU<span style="color:red">*</span></label>
            <input type="date"  name="berlaku" value="<?php echo $array['berlaku']; ?>" class="form-control">
            </div>
            <button class="btn btn-warning btn-sm" name="btnUBAH" onclick="return confirm('Apakah anda yakin ubah data ini')">Ubah</button>
            <a href="?halaman=cetak_sim" class="btn btn-danger btn-sm">Batal</a>
        </form>
    </body>
</html>

<?php
    if(isset($_POST['btnUBAH'])){
        $sql_ubah ="UPDATE tb_sim SET
        berlaku='".$_POST['berlaku']."'
        WHERE no_sim='".$_POST['no_sim']."'";
        $query_ubah = mysqli_query($koneksi,$sql_ubah);
        if($query_ubah){
            echo "<script>alert('Ubah Berhasil')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=cetak_sim'";
        }
    }
?>