<head>
	<title>Form Order</title>
	<style>
        body{
            background-image: url('assets/image/background.png');
            background-position: center;
            background-size: fixed;
        }
    </style>
</head>
<?php 
	require 'server/config.php';
	session_start();
	
	$id = $_SESSION['user_id'];
	$bytes = random_bytes(10);
	$_code = random_bytes(20);
	
	$month = date('m');
	$day = date('d');
	$year = date('Y');

	$today = $year . '-' . $month . '-' . $day;	

	$id_payment = random_bytes(5);
	$id_jdwl = $_GET['id'];
	
	if(isset($_POST['btn-order'])){
		// Order
		$_id = bin2hex($bytes);
		$id_user = $id;
	 	$id_jadwal = $id_jdwl;
	 	$no_kk = $_POST['no_kk'];
	 	$nama = $_POST['nama'];
	 	$usia = $_POST['usia'];
	 	$no_hp = $_POST['no_hp'];
	 	$tgl_order = $_POST['tgl_order'];
	 	$jml_penumpang = $_POST['jml_penumpang'];
	 	$date = date('Y-m-d H:i:s');

	 	// Payment
	 	$_idpayment = bin2hex($id_payment);
		$_codepayment = 'KAI-'.bin2hex($_code);
		$status = 'belum';

		$jml = mysqli_query($conn,"SELECT * from k_tujuan where id_jadwal='$id_jadwal'");
		while ($row = mysqli_fetch_array($jml)) {
			 $totals = $row['jml_penumpang'] + $jml_penumpang;
			 $sql4 = "UPDATE k_tujuan SET jml_penumpang=$totals WHERE id_jadwal= +'$id_jdwl'";
			 if ($row['jml_penumpang'] > $row['limit_penumpang']) {
			 	echo 'error';
			 }else{

				$res3 = mysqli_query($conn, $sql4);	
				$sql1 = "INSERT INTO t_order (id,id_user,id_jadwal,nama,usia,no_kk,no_hp,tgl_order,jml_penumpang,date_created)
				VALUES
				('$_id','$id_user','$id_jadwal','$nama','$usia','$no_kk','$no_hp','$tgl_order','$jml_penumpang','$date')";
				$sql2 = "INSERT INTO log_order (id,id_user,id_jadwal,nama,usia,no_kk,no_hp,tgl_order,jml_penumpang,date_created)
						VALUES
						('$_id','$id_user','$id_jadwal','$nama','$usia','$no_kk','$no_hp','$tgl_order','$jml_penumpang','$date')";
				$sql3 = "INSERT INTO payment (id,id_order,payment_code,status,date_created) VALUES ('$_idpayment','$_id','$_codepayment','$status','$date')";
				$res = mysqli_query($conn, $sql1);
				$res2 = mysqli_query($conn, $sql2);

				$result = mysqli_query($conn,$sql3);
				if ($result === true) {
					header('location: dashboard/payment.php?id='.$_idpayment.'&paymentUrl='.$_codepayment);
				}else{
					$message = "Gagal memasukan ke database";
					echo "<script type='text/javascript'>alert('$message');</script>";
				}
			 }	 		
		}		
		
		
	}
	
	?>
<body>
	<?php
	require 'pages/navbar/navbar.php';
	require 'pages/templates/header.php';
	?>
	<div class="wrapper align-item-center">
		<div class="container">
			<div class="">

				<div class="jumbotron box-search bg-light" style="margin-top: 100px;">
					<div class="col-sm-12  overflow-auto">
					<div class="container">
						<div class="col-lg-12">
							<h2>Form Pemesanan</h2>
							<p>Lengkapi data di bawah dengan benar!</p>
						</div>
						<div class="dropdown-divider"></div>
						<form method="post" action="">
							<div class="col-sm-12">
							<div class="form-group">
								<label>NIK</label>
								<input type="text" class="form-control"  name="no_kk" placeholder="Masukan Nomor Induk Keluarga..." required="required">
							</div>
							<div class="form-group">
								<label >Nama</label>
								<input type="text" class="form-control"   name="nama"  placeholder="Masukan Nama..." required="required">
							</div>
							<div class="form-group">
								<label >Usia</label>
								<input type="text" class="form-control" name="usia" placeholder="Masukan Usia..." required="required">
							</div>
							<div class="form-group">
								<label >No HP</label>
								<input type="text" class="form-control" name="no_hp" placeholder="Masukan Nomor Hp..." required="required">
							</div>
							<div class="col-sm-10">
								<div class="row">
									<div class="form-group">
										<label>Tanggal Pemesanan</label>
										<!-- <input type="date" class="form-control"  name="tgl_order" required="required"> -->
										<input type="date" value="<?php echo $today; ?>" class="form-control" name="tgl_order" >
										
										<label >Jumlah Penumpang</label>
										<input type="number" class="form-control" name="jml_penumpang" placeholder="1" required="required">
									</div>
								</div>
							</div>
							<input type="submit" class="btn btn-primary" name="btn-order" value="Book Ticket">
							<a class="ml-3" href="index.php">Batal</a>
						</div>
					</form>
				</div>	
			</div>
		</div>
		</div>
	</div>
		
</div>
</body>