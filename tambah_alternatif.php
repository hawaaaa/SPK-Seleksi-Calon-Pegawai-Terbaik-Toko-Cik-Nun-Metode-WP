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
             TAMBAH DATA ALTERNATIF
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
											while ($row = $kriteria->fetch_assoc()) {
												@$k[$i] = $row["kriteria"];
												$i++;
											}
							?>
							<form role="form" method="post" action="tambah.php">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="alternatif">Alternatif</label>
                                            <input type="text" class="form-control" name="alternatif" id="alternatif" placeholder="Alternatif Calon Pegawai">
                                        </div>
											<div class="form-group">
                                            <label for="alternatif">C1 Umur</label>
                                            <input type="text" class="form-control" name="k1" id="alternatif" placeholder="Masukkan Umur">
                                        </div>

										<div class="form-group">
                                            <label for="k2"><?php echo ucwords($k[1]);?></label>
                                           <select class="form-control" name="k2" id="k2">
												<option value='1'>1</option>
												<option value='2'>2</option>
												<option value='3'>3</option>
												<option value='4'>4</option>
												<option value='5'>5</option>
												<option value='6'>6</option>
												<option value='7'>7</option>
												<option value='8'>8</option>
												<option value='9'>9</option>
											</select>
                                        </div>
										<div class="form-group">
                                            <label for="k3"><?php echo ucwords($k[2]);?></label>
                                            <select class="form-control" name="k3" id="k3">
												<option value='1'>1</option>
												<option value='2'>2</option>
												<option value='3'>3</option>
												<option value='4'>4</option>
												<option value='5'>5</option>
												<option value='6'>6</option>
												<option value='7'>7</option>
												<option value='8'>8</option>
												<option value='9'>9</option>
											</select>
                                        </div>
										<div class="form-group">
                                            <label for="k4"><?php echo ucwords($k[3]);?></label>
                                           <select class="form-control" name="k4" id="k4">
												<option value='1'>1</option>
												<option value='2'>2</option>
												<option value='3'>3</option>
												<option value='4'>4</option>
												<option value='5'>5</option>
												<option value='6'>6</option>
												<option value='7'>7</option>
												<option value='8'>8</option>
												<option value='9'>9</option>
											</select>
                                        </div>
										<div class="form-group">
                                            <label for="k5"><?php echo ucwords($k[4]);?></label>
                                            <select class="form-control" name="k5" id="k5">
												<option value='1'>1</option>
												<option value='2'>2</option>
												<option value='3'>3</option>
												<option value='4'>4</option>
												<option value='5'>5</option>
												<option value='6'>6</option>
												<option value='7'>7</option>
												<option value='8'>8</option>
												<option value='9'>9</option>
											</select>
                                        </div>
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
										<button type="reset" class="btn btn-info">Reset</button>
										<a href="alternatif.php" type="cancel" class="btn btn-warning">Batal</a>
                                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                                    </div>
                            </form>
							<?php ?>
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
