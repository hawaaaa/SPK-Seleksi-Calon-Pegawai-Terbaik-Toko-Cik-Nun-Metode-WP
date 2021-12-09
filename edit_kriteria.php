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
              EDIT DATA KRITERIA
            </div>
            <div class="card-body">
              
              <table class="table table-bordered" id="myTable">
						<?php
									$result = $mysqli->query("select * from kriteria where id_kriteria = ".$_GET['id']."");
									if(!$result){
										echo $mysqli->connect_errno." - ".$mysqli->connect_error;
										exit();
									}
									while($row = $result->fetch_assoc()){
						?>
		  <div class="panel-body">
							<form role="form" method="post" action="edit_datakriteria.php?id=<?php echo $_GET['id'];?>">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="kriteria">Kriteria</label>
                                            <input type="text" class="form-control" name="kriteria" id="kriteria" value="<?php echo $row["kriteria"];?>" placeholder="Kriteria">
                                        </div>
                                        <div class="form-group">
                                            <label for="kepentingan">Nilai Kepentingan</label>
											<select class="form-control" name="kepentingan" id="kepentingan">
												<option value='1' <?php if($row["kepentingan"]=='1') echo "selected"?>>1 - (STP) sangat tidak penting</option>
												<option value='2' <?php if($row["kepentingan"]=='2') echo "selected"?>>2 - (TP) tidak penting</option>
												<option value='3' <?php if($row["kepentingan"]=='3') echo "selected"?>>3 - (CP) cukup penting</option>
												<option value='4' <?php if($row["kepentingan"]=='4') echo "selected"?>>4 - (P) penting</option>
												<option value='5' <?php if($row["kepentingan"]=='5') echo "selected"?>>5 - (SP) sangat penting</option>
											</select>
                                        </div>
										<div class="form-group">
                                            <label for="cost_benefit">Cost / Benefit</label>
                                            <select class="form-control" name="cost_benefit" id="cost_benefit">
												<option value='cost' <?php if($row["cost_benefit"]=='cost') echo "selected"?>>Cost</option>
												<option value='benefit' <?php if($row["cost_benefit"]=='benefit') echo "selected"?>>Benefit</option>
											</select>
                                        </div>
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
										<button type="reset" class="btn btn-info">Reset</button>
										<a href="kriteria.php" type="cancel" class="btn btn-warning">Batal</a>
                                        <button type="submit" class="btn btn-primary">Proses Edit</button>
                                    </div>
                            </form>
							<?php
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