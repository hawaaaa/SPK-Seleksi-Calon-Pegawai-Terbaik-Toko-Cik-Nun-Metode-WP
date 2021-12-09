<?php
	session_start();
	include('koneksi.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	
</head>
  <style type="text/css">
    *{
			padding: 0;
			margin: 0;
      font-size: 20px;
			box-sizing: border-box;
			color: black
      
		}
		li{
			list-style: none;
			line-height: 60px;
			padding-left: 20px;
			border-bottom: 3px solid #fff;
		}
		li:hover{
			background: #FD7272
		}
		.left{
			width: 160px;
			position: fixed;
			top: 0;
			left: 0;
			float: left;
			background: #FFDAB9;
			height: 100%;
		}
		.right{
			font-size: 20px;
			margin-left: 160px;
			padding: 10px;
		}
    </style>
  </head>
  <body>
      <!-- Static navbar -->
        <div class="left">
            <ul>
              <li class="active"><a href="#">Home</a></li>
              <li><a href="kriteria.php">Kriteria</a></li>
              <li><a href="alternatif.php">Alternatif</a></li>
              <li><a href="perhitungan.php">Perhitungan</a></li>
			      </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
		

      <!-- Main component for a primary marketing message or call to action -->
      
      <div class="right">
			<center>
				<h1 style="line-height: 80px; color: #6495ED ; font-family:'MisterEarl'" >SELAMAT DATANG DI SISTEM PENDUKUNG KEPUTUSAN DENGAN METODE WP!</h1>
        <h2 style="line-height: 50px; color: Black; font-family:'Trebuchet MS'" >Pemilihan Calon Pegawai Terbaik pada Toko Kelontong Cik Nun</h2>
			<img src="toko.jpg" alt="gambar toko kelontong" height="300" width="500">
		</center>
		  </div>
      <div class="right">
		<p>Toko Cik Nun ini merupakan toko kelontong yang menjual berbagai macam jenis barang kebutuhan sehari-hari dari makanan, mainan, bahkan hingga alat kecantikan. Contohnya saja seperti kebutuhan bahan-bahan pokok seperti sembako, makanan ringan,minuman, lauk pauk, sayuran segar, lampu, bedak, cream wajah dan masih banyak lagi yang dijual.</p>
	</div>
      


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="ui/js/jquery-1.10.2.min.js"></script>
	<script src="ui/js/bootstrap.min.js"></script>
	<script src="ui/js/bootswatch.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="ui/js/ie10-viewport-bug-workaround.js"></script>

</body></html>
