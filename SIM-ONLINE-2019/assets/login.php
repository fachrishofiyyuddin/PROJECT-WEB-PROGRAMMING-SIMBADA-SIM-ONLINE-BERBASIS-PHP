<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1,
    shrink-to-fit=no">
 <meta name="description" content="">
 <meta name="author" content="">
 <title>SI SIM ONLINE 2019</title>
 <!-- Bootstrap core CSS -->
 <link href="css/bootstrap.min.css" rel="stylesheet">
 <!-- Custom styles for this template -->
 <link href="css/simple-sidebar.css" rel="stylesheet">
</head>
<body>
 <center>
    <div class="col-lg-5">
    
        <form action="" method="POST" enctype="multipart/form-data">
        <br>
            <h1>HALAMAN LOGIN</h1>
        <br><br>
            <input type="email" class="form-control"
                placeholder="Masukkan Username" name="txtUsername" required autofocus>
        <br>
            <input type="password" class="form-control"
            placeholder="Masukkan Password" name="txtPassword" required>
        <br><br>
            <button type="submit" class="btn btn-lg btn-primary btnblock" name="btnLogin">Log In</button>
        </form>
    </div>
 <center>
</body>
</html>

<?php
//  $koneksi = mysqli_connect("localhost","id9966066_localhost","ngehek12345","id9966066_simbada5");
$koneksi = mysqli_connect("localhost","root","","simbada1");  
 if (isset($_POST['btnLogin'])) {
 $sql_login = "SELECT * FROM tb_pengguna WHERE
    email='".$_POST['txtUsername']."' AND password='".$_POST['txtPassword']."'";
 $query_login = mysqli_query($koneksi, $sql_login);
 $data_login = mysqli_fetch_array($query_login,MYSQLI_BOTH);
 $jumlah_login = mysqli_num_rows($query_login);

 if ($jumlah_login >=1 ){
    $_SESSION["ses_username"]=$data_login["email"];
    $_SESSION["ses_status"]=$data_login["status"];

    echo "<script>alert('Login Berhasil')</script>";
    echo "<meta http-equiv='refresh' content='0; url=index.php'>";
 }else{
    echo "<script>alert('Login Gagal')</script>";
    echo "<meta http-equiv='refresh' content='0; url=login.php'>";
 }
 }
?>
