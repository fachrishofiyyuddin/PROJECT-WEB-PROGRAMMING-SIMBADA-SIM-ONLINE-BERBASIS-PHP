<?php
 if (isset($_SESSION['ses_username'])=="") {
 echo"<meta http-equiv='refresh' content='0;url=login.php'>";
 }else{
 $data_username = $_SESSION["ses_username"];
 $data_status = $_SESSION["ses_status"];
 }
//  $koneksi = mysqli_connect("localhost","id9966066_localhost","ngehek12345","id9966066_simbada5"); 
$koneksi = mysqli_connect("localhost","root","","simbada1"); 
 ?>
<?php
    if($data_status=="operator"){
        echo "<h1>HI, Operator</h1>";
    }else if($data_status=="admin"){
        echo "<h1>HI, Admin</h1>";
    }
?>
<p>SELAMAT DATANG DI SI PEMBUATAN SIM ONLINE 2019.</p>
<p><code>follow @fachrishofiyyuddin</code>.</p>
<a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Menu</a>