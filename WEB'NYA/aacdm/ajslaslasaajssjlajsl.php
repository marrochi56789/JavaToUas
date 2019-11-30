<?php error_reporting(0);

include "assets/koneksi/koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="assets/JQ/jquery.js"></script>
    <script src="assets/js/oci.js"></script>
    <link rel="stylesheet" href="assets/css/oci.css">
    <link rel="stylesheet" href="assets/FA/css/all.css">
    <link rel="stylesheet" href="lightbox/dist/css/lightbox.css">
    <!-- <script src="assets/FA/js/all.js"></script> -->
    <title>Laporan Data Barang</title>
<style>
  body {
    font-family: "Lato", sans-serif;
    background: #fdfdfd;
  }
  
  .sidenav-iki {
    height: 100%;
    width: 100px;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #4be2bf;
    overflow-x: hidden;
    padding-top: 20px;
  }
  
  .sidenav-iki a {
    padding: 8px 8px 8px 25px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
  }
  
  .sidenav-iki i:hover { 
    font-size: 3rem;
    padding: 5px;
  }
  
  .main-iki {
    margin-left: 120px; /* Same as the width of the sidenav-iki */
   
    padding: 0px 10px;

  }
  
  @media screen and (max-height: 450px) {
    .sidenav-iki {padding-top: 15px;}
    .sidenav-iki a {font-size: 18px;}
  }

  /* form search */
  .box-search1{
  margin: 1% auto;
  width: 300px;
  height: 50px;
}.container-search{
  width: 300px;
  vertical-align: middle;
  white-space: nowrap;
  position: relative;
}
.container-search input#search{
  width: 300px;
  height: 40px;
  background: #4be2bf;
  border: none;
  font-size: 10pt;
  float: left;
  color: #fff;
  padding-left: 45px;
  /* -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px; */
}
.container-search input#search::-webkit-input-placeholder {
   color: #fff;
}
 
.container-search input#search:-moz-placeholder { /* Firefox 18- */
   color: #fff;  
}
 
.container-search input#search::-moz-placeholder {  /* Firefox 19+ */
   color: #fff;  
}
 
.container-search input#search:-ms-input-placeholder {  
   color: #fff;  
}
.container-search .icon{
  position: absolute;
  /* top: 50%; */
  margin-left: 2%;
  margin-top: 1%;
  font-size: 25px;
  /* margin-top: 17px; */
  /* z-index: 1; */
  color: #fff;
}

/* table */
#tbl-penjualan-iki {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;

  width: 100%;
 
}

#tbl-penjualan-iki td, #tbl-penjualan-iki th {
  border-top: 1px solid #ddd;
  padding: 8px;
}

#tbl-penjualan-iki tr:nth-child(even){background-color: #f2f2f2;}

#tbl-penjualan-iki tr:hover {background-color: #ddd;}

#tbl-penjualan-iki th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #4be2bf;
  color: white;
}
/* pagination1 */
.pagination1 {
  display: inline-block;
}

.pagination1 a {
  background: #4be2bf;
  color: #fff;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  border-collapse: collapse;
  border-right: 2px solid #fff;
}

  </style>
  </head>
  <body>
  
  <div class="sidenav-iki " style="border-right: 8px solid rgba(156,197,187,0.280); box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <a href="javascript:void(0)"><i class="fas fa-dice-d6 fa-2x fc-white fa-pulse"> </i></a>
    <a href="javascript:void(0)"><i class="fas fa-dice-d20 fa-2x fc-white "> </i></a>
    <a href="javascript:void(0)"><i class="fas fa-adjust fa-2x fc-white"></i></a>
    <a href="javascript:void(0)" ><i class="fas fa-calculator fa-2x fc-white"></i></a>
    <a href="javascript:void(0)"><i class="fas fa-sign-out-alt fa-2x fc-white"></i></a>
    <!-- <a href="#contact">Contact</a> -->
  </div>
  
  <div class="main-iki">
    <!--  -->
    <!--  -->
    <div class="puso">
      <br>
      <h1 class="mt-1 GP17"><i class="fas fa-snowboarding fa-fw border-r3 bs-1" style="background:#4be2bf; "></i> Laporan<b>DataBarang</b></h1>
    </div>
    <!--  -->
    <br>
   

<br>

<?php 
$per_hal=10;
$jumlah_record=mysqli_query($con, "SELECT * from tbl_barang");
$jum=mysqli_num_rows($jumlah_record);
$halaman=ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
?>
<div class="puso">
<a href="" class='btn btn-P' onclick='window.print()'><i class="fas fa-print"></i></a>  
<a href="javascript:void(0)" class='btn btn-T4'>JumlahBaris : <?php echo $jum; ?></a>
<a href="javascript:void(0)" class='btn btn-T4'>JumlahHalaman : <?php echo $halaman; ?></a>
<?php
     if(isset($_GET['pesan'])){
          if($_GET['pesan']=='t1'){
            echo "<a href='' class='btn btn-T3'>Barang Berhasil Ditambah!!</a>"; 
          }
    
     }
    ?>
<!--  -->
<?php 
if(isset($_GET['cari'])){
  $cari=mysqli_real_escape_string($con, $_GET['cari']);
  $db1=mysqli_query($con, "SELECT * from tbl_barang where   nama_barang like '$cari%' ");
}else{
  $db1=mysqli_query($con, "SELECT * from tbl_barang limit $start, $per_hal");
}
?>
<div class="box-search1 float-r ">
           <form action="TT-C.php" method="get">
           <div class="container-search ">
                <span class="icon"><i class="fas fa-search"></i></span>
                <input type="text"  name='cari' class="bs-1" id="search" placeholder="Search..." />
            </div>
           </form>
</div> 
</div>
<br><br>
<div class="puso">
      <table id="tbl-penjualan-iki" class="bs-1" style="font-size: 14px!important;text-align:center;">
       <thead>
       <tr>           
                    <th>No</th>
                    <th>Kode Barang</th>
		                <th>Nama Barang</th>
		                <th>Jumlah Barang</th>
		                <th>Harga Beli</th>
		                <th>Harga Jual</th>
		                <th>Tanggal Masuk</th>
          </tr>
       </thead>
      <tbody>
      <?php
          $no =1; 
									while ($rsdb1 = mysqli_fetch_array($db1)) {
												
                      ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $rsdb1['kd_barang'] ?></td>
		                <td><?php echo $rsdb1['nama_barang'] ?></td>
		                <td><?php echo $rsdb1['jumlah_barang'] ?></td>
		                <td><?php echo $rsdb1['harga_beli'] ?></td>
		                <td><?php echo $rsdb1['harga_jual'] ?></td>
		                <td><?php echo $rsdb1['tanggal_masuk'] ?></td>
                </tr>     
                  <?php } ?> 
      </tbody>
        </table>
  </div>
<br>
<div class="puso">
    <div class="pagination1">
		<?php 
			for($x3=1;$x3<=$halaman;$x3++){
				?>
			<a href="?page=<?php echo $x3 ?>"><?php echo $x3 ?></a>
				<?php
			}
			?>	
      </div>
</div>

</div>
<script src="lightbox/dist/js/lightbox-plus-jquery.js"></script>
</body>
</html>


 
