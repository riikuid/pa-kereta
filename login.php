<head>
	<title>Login</title>
	<style>
        body{
            background-image: url('assets/image/background.png');
            background-position: center;
            background-size: fixed;
        }
    </style>
</head>
<?php 
session_start();
	require 'server/config.php';
	include 'pages/navbar/navbar.php';

	if (isset($_SESSION['email'])) {
		header('Location: index.php');
	}
	require 'pages/templates/header.php';
 ?>
 <body>	 
		<div class="login mx-auto p-4 bg-light">
			<div class="text-center">
				<h2><b>LOGIN</b></h2>
				<a href="index.php">
				<img src="assets/image/logo.svg" alt="">
				</a>
				<br>
			</div>
			<br/>
			<form action="q_login.php" method="post">
				<div>
					<label>Username:</label>
					<input type="text" name="email" id="email" />
				</div>
				<div>
					<label>Password:</label>
					<input type="password" name="password" id="password" />
				</div>			
				<div>
					<br>
					<input type="submit" value="Login" name="login" class="btn btn-primary"> <br><br>
					<p>Belum punya akun? <a href="register.php">Daftar</a></p>
				</div>
			</form>
</div>
</body>
