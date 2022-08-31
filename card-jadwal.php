<?php 

	require 'server/config.php';
	session_start();


	require 'pages/templates/header.php';
	// include 'pages/navbar/navbar.php';

    if (isset($_POST['cari'])) {
        $cari = $_POST['keyword'];
        $QueryString = "SELECT jadwal.id, jadwal.asal, jadwal.tujuan, jadwal.kelas, jadwal.harga, jadwal.tanggal, jadwal.waktu FROM jadwal WHERE
    	jadwal.id LIKE '%$cari%' or jadwal.asal LIKE '%$cari%' or jadwal.tujuan LIKE '%$cari%' or jadwal.kelas LIKE '%$cari%' or jadwal.harga LIKE '%$cari%' or jadwal.tanggal LIKE '%$cari%' or jadwal.waktu LIKE '%$cari%'";
        $SQL = mysqli_query($conn, $QueryString);
    } else {
        $SQL = mysqli_query($conn, "select * from jadwal ORDER BY id DESC");
    }
 ?>
<div>
<!-- style="background-image:url('/assets/image/background.png');" -->
	<div class="text-center">
		<div class="text-black">
			<h4></h4>
		</div>
	</div>
	<div class="container">
		<div class="jumbotron" style="background-color: #efefef; fill-opacity: 50%;">
			<div class="col-sm-12  overflow-auto">
				<div class="container">
					<h4>Jadwal Kereta Api</h4>
				    <table class="table">
				        <thead>
				            <tr>
				                <th>No</th>
				                <th>asal</th>
				                <th>Tujuan</th>
				                <th>Kelas</th>
				                <th>Harga</th>
				                <th>Tanggal Berangkat</th>
				                <th>Waktu Keberangkatan</th>
				                <?php if(isset($_SESSION['status'])) {?>
				                <th></th>
				            	<?php }else{ ?>

				            	<?php } ?>
				            </tr>
				        </thead>
				        <tbody>
				            <?php
				            $i = 1;
				            while ($data = mysqli_fetch_array($SQL) and extract($data)) { 
			            		$jam = substr($waktu,0,2);
								$time = (int)$jam;
								if ($time > 12) {
									$date = ' PM';
								}else if($time <12){
									$date = ' AM';
								}else{}
								
								

				             ?>
				                <tr>
				                    <td><?= $i++ ?></td>
				                    <td><?= $asal ?></td>
				                    <td><?= $tujuan ?></td>
				                    <td><?= $kelas ?></td>
				                    <td>Rp. <?= number_format($harga); ?></td>
				                    <td><?= $tanggal ?></td>
				                    <td><?= $waktu.$date ?></td>
				                    <?php if(isset($_SESSION['status'])) {?>
				                		<td><a href='order.php?id=<?= $id?>' class="btn btn-warning">Book Ticket</a></td>
			            			<?php }else{ ?>

				            		<?php } ?>
				                    
				                </tr>
				            <?php }
				            ?>
				        </tbody>
				    </table>
				</div>	
			</div>
					
						
					
			<?php  ?>	
		</div>
	</div>
		
</div>

