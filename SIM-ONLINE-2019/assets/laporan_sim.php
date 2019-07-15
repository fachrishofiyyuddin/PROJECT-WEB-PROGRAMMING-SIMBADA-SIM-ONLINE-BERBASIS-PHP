<?php 
    // $koneksi = mysqli_connect("localhost","id9966066_localhost","ngehek12345","id9966066_simbada5");
    $koneksi = mysqli_connect("localhost","root","","simbada1");  
?>
<html>
    <head>
     <title>Laporan</title>
     <!-- Bootstrap core CSS     -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="css/demo.css" rel="stylesheet" />`
    </head>
    <body>
    <center><h3><b>LAPORAN PEMBUATAN SIM</b></h3></center><br>
    <form action="" method="POST">
    <table class="table table-hover table-bordered" style='text-size:11'>
        <thead>
        <tr>
            <th>NAMA<span style='color:red'>*</span></th>
            <th>NO. SIM<span style='color:red'>*</span></th>
            <th>GOL. SIM<span style='color:red'>*</span></th>
            <th>BERLAKU<span style='color:red'>*</span></th>
        </tr>
        </thead>  
        <tbody>
            <?php 
                $sql_tampil = "SELECT * FROM tb_pemohon natural join tb_sim natural join tb_pendaftaran";
                $query_tampil = mysqli_query($koneksi,$sql_tampil);
                while($array=mysqli_fetch_array($query_tampil,MYSQLI_BOTH)){
            ?>
                <tr>
                    <td style='text-transform:uppercase'><?php echo $array['nama'];?></td>
                    <td style='text-transform:uppercase'><?php echo $array['no_sim'];?></td>
                    <td><?php echo $array['gol_sim'];?></td>
                    <td><?php echo $array['berlaku'];?></td>
                </tr>

            <?php
                }
            ?>
        </tbody>



       
    </table>
    <script>
        window.print();
    </script>
</form>
        
    </body>
</html>

