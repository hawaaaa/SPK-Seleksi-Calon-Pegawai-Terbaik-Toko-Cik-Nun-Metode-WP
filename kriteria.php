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
              <li class="active"><a href="kriteria.php">Kriteria</a></li>
              <li><a href="alternatif.php">Alternatif</a></li>
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
              DATA KRITERIA
            </div>
            <div class="card-body">
              
              <table class="table table-bordered" id="myTable">
	
		    <?php
							$kriteria = $mysqli->query("select * from kriteria");
							if(!$kriteria){
								echo $mysqli->connect_errno." - ".$mysqli->connect_error;
								exit();
							}
							$i=0;
		    ?>
			<thead>
				<tr>
					<th>No.</th>
					<th>Kriteria</th>
					<th>Kepentingan</th>
					<th>Cost / Benefit</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<tbody>
										<?php
												$i = 1;
												while ($row = $kriteria->fetch_assoc()) {
													echo '<tr>';
													echo '<td>'.$i++.'</td>';
													echo '<td>'.ucwords($row["kriteria"]).'</td>';
													echo '<td>'.$row["kepentingan"].'</td>';
													echo '<td class="text-uppercase">'.$row["cost_benefit"].'</td>';
													echo '<td><!--a href="#"><i class="fa fa-search"></i></a-->';
										?>
														  <a href="edit_kriteria.php?id=<?php echo $row["id_kriteria"];?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>
														  <!--a href="#"><i class="fa fa-times"></i></a></td-->
										<?php
													echo '</tr>';
												}
										?>
			</tbody>
			</table>
		  </div>
		  <div>
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