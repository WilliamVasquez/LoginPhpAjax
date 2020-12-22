<?php

	session_start();

  	if (isset($_SESSION['idUser'])) {
		//header('Location: '.$_SESSION['vista'].'.php');
		header('Location: escritorio.php');
  	}
	require_once 'database.php';
	if (isset($_POST['txtEscritorio']) && isset($_POST['txtPassword'])) {
		
		$result = $con->prepare('SELECT us.Escritorio, us.PriNombre, us.PriApellido, us.Clave, tp.Nombre as Vista FROM usuario us inner join tipousuario tp on us.IdtipoUsuario=tp.IdtipoUsuario WHERE Escritorio = :escritorio;');
		$escritorio = sano($_POST['txtEscritorio']);
		$password = sano($_POST['txtPassword']);
		$result->bindValue(':escritorio', $escritorio);
		$result->execute();
		$results = $result->fetch();
		if (password_verify($password, $results['Clave']) && $results != 0)
		{
			$_SESSION['idUser'] = $results['Escritorio'];
			$_SESSION['nameUser'] = $results['PriNombre'];
			$_SESSION['vista'] = $results['Vista'];
			header('Location: admin.php');
		}
		else
			$message = "<script>alertify.error('Sorry, those credentials do not match.');</script>"; 
	} ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="assets/css/alertify.min.css" />
		<link rel="stylesheet" type="text/css" href="assets/css/default.min.css" />
		<link rel="stylesheet" href="assets/css/estilos.css" />
		<script src="assets/js/alertify.min.js"></script>
	</head>
	<body class="bg-light">
		<?php if(!empty($message)): ?>
			<?= $message ?>
		<?php endif; ?>
		<header>
			<nav class="navbar navbar-light">
				<div class="navbar-brand" href="#">
					<img
						src="assets/images/Escudo_de_la_Universidad_de_El_Salvador.svg"
						width="48"
						height="100%"
						class="d-inline-block align-top"
						alt=""
						loading="lazy"
					/>
				</div>
				<span class="navbar-brand mb-0 h1 text-white font-weight-bold">Universidad de El Salvador</span>
			</nav>
		</header>

		<div class="container p-5 my-5 d-flex justify-content-center align-items-center">
			<div class="row no-gutters login">
				<div class="col-lg-5 col-sm-5">
					<div class="row h-100">
						<div class="col-sm-12 my-auto">
							<div class="logo">
								<img src="assets/images/logo-uese.png" alt="logo-uese" class="img-fluid logo-uese" />
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-7 col-sm-7 px-5 pt-5 content-form">
					<h1 class="font-weight-bold py-1">BIENVENIDO</h1>
					<h4 class="my-sm-3 my-lg-4 mb-3 mt-5">Iniciar sesión</h4>
					<form action="index.php" method="POST" class="form-login" autocomplete="off">
						<div class="form-group mb-3">
							<input
								type="text"
								name="txtEscritorio"
								class="form-control"
								placeholder="Usuario"
								pattern="[A-Za-z0-9]+"
								required
								autofocus
							/>
						</div>
						<div class="form-group mb-3">
							<input
								type="password"
								name="txtPassword"
								class="form-control"
								placeholder="Contraseña"
								pattern="[A-Za-z0-9]+"
								required
								autofocus
							/>
						</div>
						<button type="submit" class="btn btn-lg btn-block btn-login mb-3">Ingresar</button>
					</form>
				</div>
			</div>
		</div>
		<footer class="footer">
			<div class="footer-copyright text-center py-3">© 2020 Copyright: ITCA-FEPADE</div>
		</footer>
	</body>
</html>
