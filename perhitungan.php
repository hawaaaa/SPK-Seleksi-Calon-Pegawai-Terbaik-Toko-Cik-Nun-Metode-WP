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
			font-size: 50px;
			margin-left: 160px;
			padding: 10px;
		}
    </style>
  </head>
  <body>
	<div class="left">
            <ul>
              <li><a href="index.php">Home</a></li>
              <li><a href="kriteria.php">Kriteria</a></li>
              <li><a href="alternatif.php">Alternatif</a></li>
              <li class="active"><a href="#">Perhitungan</a></li>
			</ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
	  <div class="right">
	  <div class="container" style="margin-top: 20px">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
             PERHITUNGAN
            </div>
            <div class="card-body">
              
              <table class="table table-bordered" id="myTable">
			
				<?php
					
					$alt = get_alternatif();
					$alt_name = get_alt_name();
					end($alt_name); $arl2 = key($alt_name)+1; //new
					$kep = get_kepentingan();
					$cb = get_costbenefit();
					$k = jml_kriteria();
					$a = jml_alternatif();
					$tkep = 0;
					$tbkep = 0;

					// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> matrix alternatif/kriteria <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< //
					echo "<b>1. Matriks Alternatif/Kriteria</b></br>";
					echo "<table class='table table-striped table-bordered table-hover'>";
					echo "<thead><tr><th>Alternatif / Kriteria</th><th>K1</th><th>K2</th><th>K3</th><th>K4</th><th>K5</th></tr></thead>";
					for($i=0;$i<$a;$i++){
						echo "<tr><td><b>A".($i+1)."</b></td>";
						for($j=0;$j<$k;$j++){
							echo "<td>".$alt[$i][$j]."</td>";
						}
						echo "</tr>";
					}
					echo "</table><hr>";
					// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> bobot kepentingan <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< //
					echo "<b>2. Perhitungan Bobot Kepentingan</b></br>";
					echo "<table class='table table-striped table-bordered table-hover'>";
					echo "<thead><tr><th></th><th>K1</th><th>K2</th><th>K3</th><th>K4</th><th>K5</th><th>Jumlah</th></tr></thead>";
						echo "<tr><td><b>Kepentingan</b></td>";
						for($i=0;$i<$k;$i++){
							$tkep = $tkep + $kep[$i];
							echo "<td>".$kep[$i]."</td>";
						}
						echo "<td>".$tkep."</td></tr>";
						echo "<tr><td><b>Bobot Kepentingan</b></td>";
						for($i=0;$i<$k;$i++){
							$bkep[$i] = ($kep[$i]/$tkep);
							$tbkep = $tbkep + $bkep[$i];
							echo "<td>".round($bkep[$i],6)."</td>";
						}
						echo "<td>".$tbkep."</td></tr>";
					echo "</table><hr>";
					// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> pangkat <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< //
					echo "<b>3. Perhitungan Pangkat</b></br>";
					echo "<table class='table table-striped table-bordered table-hover'>";
					echo "<thead><tr><th></th><th>K1</th><th>K2</th><th>K3</th><th>K4</th><th>K5</th></tr></thead>";
						echo "<tr><td><b>Cost/Benefit</b></td>";
						for($i=0;$i<$k;$i++){
							echo "<td>".ucwords($cb[$i])."</td>";
						}
						echo "</tr>";
						echo "<tr><td><b>Pangkat</b></td>";
						for($i=0;$i<$k;$i++){
							if($cb[$i]=="cost"){
								$pangkat[$i] = (-1) * $bkep[$i];
								echo "<td>".round($pangkat[$i],6)."</td>";
							}
							else{
								$pangkat[$i] = $bkep[$i];
								echo "<td>".round($pangkat[$i],6)."</td>";
							}
						}
						echo "</tr>";
					echo "</table><hr>";
					// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> vektor S <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< //
					echo "<b>4. Perhitungan Nilai S</b></br>";
					echo "<table class='table table-striped table-bordered table-hover'>";
					echo "<thead><tr><th>Alternatif</th><th>S</th></tr></thead>";
					for($i=0;$i<$a;$i++){
						echo "<tr><td><b>A".($i+1)."</b></td>";
						for($j=0;$j<$k;$j++){
							$s[$i][$j] = pow(($alt[$i][$j]),$pangkat[$j]);
						}
						$ss[$i] = $s[$i][0]*$s[$i][1]*$s[$i][2]*$s[$i][3]*$s[$i][4];
						echo "<td>".round($ss[$i],6)."</td></tr>";
					}
					echo "</table><hr>";
					// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> vektor S <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< //
					echo "<b>5. Hasil Akhir</b></br>";
					echo "<table class='table table-striped table-bordered table-hover'>";
					echo "<thead><tr><th>Alternatif</th><th>V</th></tr></thead>";
					$total = 0;
					for($i=0;$i<$a;$i++){
						$total = $total + $ss[$i];
					}
					for($i=0;$i<$a;$i++){
						echo "<tr><td><b>".$alt_name[$i]."</b></td>";
						$v[$i] = round($ss[$i]/$total,6);
						echo "<td>".$v[$i]."</td></tr>";
					}
					echo "</table><hr>";
					// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> vektor S <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< //
					echo "<b>6. Perangkingan</b></br>";
					uasort($v,'cmp');
								for($i=0;$i<$arl2;$i++){ //new for 8 lines below
									if($i==0)
										echo "<div class='alert alert-dismissible alert-info'><b><i>Pertama ".$alt_name[array_search((end($v)), $v)]." dengan hasil ".current($v);
									elseif($i==($arl2-1))
										echo "</br>Dan terakhir ".$alt_name[array_search((prev($v)), $v)]." dengan nilai ".current($v).".</i></b></div>";
									else
										echo "</br>Lalu ".$alt_name[array_search((prev($v)), $v)]." dengan nilai ".current($v);
								}

										function jml_kriteria(){
											include 'koneksi.php';
											$kriteria = $mysqli->query("select * from kriteria");
											return $kriteria->num_rows;
										}

										function jml_alternatif(){
											include 'koneksi.php';
											$alternatif = $mysqli->query("select * from alternatif");
											return $alternatif->num_rows;
										}

										function get_kepentingan(){
											include 'koneksi.php';
											$kepentingan = $mysqli->query("select * from kriteria");
											if(!$kepentingan){
												echo $mysqli->connect_errno." - ".$mysqli->connect_error;
												exit();
											}
											$i=0;
											while ($row = $kepentingan->fetch_assoc()) {
												@$kep[$i] = $row["kepentingan"];
												$i++;
											}
											return $kep;
										}

										function get_costbenefit(){
											include 'koneksi.php';
											$costbenefit = $mysqli->query("select * from kriteria");
											if(!$costbenefit){
												echo $mysqli->connect_errno." - ".$mysqli->connect_error;
												exit();
											}
											$i=0;
											while ($row = $costbenefit->fetch_assoc()) {
												@$cb[$i] = $row["cost_benefit"];
												$i++;
											}
											return $cb;
										}

										function get_alt_name(){
											include 'koneksi.php';
											$alternatif = $mysqli->query("select * from alternatif");
											if(!$alternatif){
												echo $mysqli->connect_errno." - ".$mysqli->connect_error;
												exit();
											}
											$i=0;
											while ($row = $alternatif->fetch_assoc()) {
												@$alt[$i] = $row["alternatif"];
												$i++;
											}
											return $alt;
										}

										function get_alternatif(){
											include 'koneksi.php';
											$alternatif = $mysqli->query("select * from alternatif");
											if(!$alternatif){
												echo $mysqli->connect_errno." - ".$mysqli->connect_error;
												exit();
											}
											$i=0;
											while ($row = $alternatif->fetch_assoc()) {
												@$alt[$i][0] = $row["k1"];
												@$alt[$i][1] = $row["k2"];
												@$alt[$i][2] = $row["k3"];
												@$alt[$i][3] = $row["k4"];
												@$alt[$i][4] = $row["k5"];
												$i++;
											}
											return $alt;
										}

										function cmp($a, $b){
											if ($a == $b) {
												return 0;
											}
											return ($a < $b) ? -1 : 1;
										}

										function print_ar(array $x){	//just for print array
											echo "<pre>";
											print_r($x);
											echo "</pre></br>";
										}
				?>
			
		  </div>
		  <div class="panel-footer text-primary"><?php echo $_SESSION['by'];?><div class="pull-right"></div></div>
		</div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="ui/js/jquery-1.10.2.min.js"></script>
	<script src="ui/js/bootstrap.min.js"></script>
	<script src="ui/js/bootswatch.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="ui/js/ie10-viewport-bug-workaround.js"></script>

</body></html>
