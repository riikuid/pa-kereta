<head>
	<title>Register</title>
	<style>
        body{
            background-image: url('assets/image/background.png');
            background-position: center;
            background-size: fixed;
        }
    </style>
</head>
<?php 
include 'pages/templates/header.php'; 
include 'pages/navbar/navbar.php';
?>
<body>	
	<div class="form-controll">
		<form method="post" action='q_register.php'>
			<div class="container">
				<div class="col-sm-12">
					<div class="row mt-5">
						<div class="login col-sm-8 bg-light">
							<div class="form-group header-login text-center mt-4">
								<h2><b>REGISTER</b></h2>
								<img src="assets/image/logo.svg" alt="">
							</div>
							<div class="form-group">
							<input type="text" name="email" placeholder="Masukan email...">
						</div>
						<div class="form-group">
							<input type="password" name="password" placeholder="Masukan password...">
						</div>
						<input class="btn btn-primary" type="submit" name="btn" value="Register"><br><br>
						<p>Sudah punya akun? <a href="login.php">Login</a></p>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
</body>