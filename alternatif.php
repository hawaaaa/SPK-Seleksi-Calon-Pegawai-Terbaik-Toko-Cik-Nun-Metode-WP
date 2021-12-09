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
              <li class="active"><a href="#">Alternatif</a></li>
              <li><a href="perhitungan.php">Perhitungan</a></li>
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
              DATA ALTERNATIF
            </div>
            <div class="card-body">
              
              <table class="table table-bordered" id="myTable">
						<?php
							//include 'config.php';
											$kriteria = $mysqli->query("select * from kriteria");
											if(!$kriteria){
												echo $mysqli->connect_errno." - ".$mysqli->connect_error;
												exit();
											}
											$i=0;
											while ($row = $kriteria->fetch_assoc()) {
												@$k[$i] = $row["kriteria"];
												$i++;
											}

							$alternatif = $mysqli->query("select * from alternatif");
							if(!$alternatif){
								echo $mysqli->connect_errno." - ".$mysqli->connect_error;
								exit();
							}
							$i=0;
						?>
		  <div class="panel-body table-responsive">
			<a class='btn btn-primary' href='tambah_alternatif.php'> Tambah Data Alternatif</a><br /><br />
			<table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>No.</th>
					<th>Alternatif</th>
					<th><?php echo ucwords($k[0]);?></th>
					<th><?php echo ucwords($k[1]);?></th>
					<th><?php echo ucwords($k[2]);?></th>
					<th><?php echo ucwords($k[3]);?></th>
					<th><?php echo ucwords($k[4]);?></th>
					<th>Pilihan</th>
				</tr>
			</thead>
			<tbody>
										<?php
												$i = 1;
												while ($row = $alternatif->fetch_assoc()) {
													echo '<tr>';
													echo '<td>'.$i++.'</td>';
													echo '<td>'.ucwords($row["alternatif"]).'</td>';
													echo '<td>'.$row["k1"].'</td>';
													echo '<td>'.$row["k2"].'</td>';
													echo '<td>'.$row["k3"].'</td>';
													echo '<td>'.$row["k4"].'</td>';
													echo '<td>'.$row["k5"].'</td>';
													echo '<td><!--a href="#"><i class="fa fa-search"></i></a-->';
													?>
														  <a href="edit_alternatif.php?id=<?php echo $row['id_alternatif'];?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>
														  <a href="hapus.php?id=<?php echo $row['id_alternatif'];?>" onClick="return confirm('Menghapus data ke-<?php echo $i-1;?> Alternatif <?php echo $row['alternatif'];?> ?');" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</a></td>
													<?php
													echo '</tr>';
												}
										?>
			</tbody>
			</table>
		  </div>
		  <div class="panel-footer text-primary"><?php echo $_SESSION['by'];?><div class="pull-right"></div></div>
		</div>


	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script>
      $(document).ready( function () {
          $('#myTable').DataTable();
      } );
    </script>
  </body>
</html>

