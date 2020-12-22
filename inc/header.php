<?php 
$url= $_SERVER["REQUEST_URI"];
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Sistema Archivos</title>
		<link rel="stylesheet" type="text/css" href="assets/css/all.css" />
		<link rel="stylesheet" type="text/css" href="assets/css/alertify.min.css" />
		<link rel="stylesheet" type="text/css" href="assets/css/default.min.css" />
		<link rel="stylesheet" type="text/css" href="assets/css/simple-sidebar.css" />
		<link rel="stylesheet" type="text/css" href="assets/css/estilos.css" />
	</head>
	<body>
		<div class="d-flex bg-light" id="wrapper">
			<div class="border-right" id="sidebar-wrapper">
				<div class="sidebar-heading bg-dark text-white">
					<span class="text-uppercase font-weight-bolder lead">Menú Principal</span>
					<hr />
				</div>
				<div class="list-group list-group-flush">
<<<<<<< Updated upstream
					<a href="index.php" class="list-group-item list-group-item-action" style="border: 0px">
						<i><svg class="svg-icon-side" viewBox="0 0 20 20">
							<path d="M17.927,5.828h-4.41l-1.929-1.961c-0.078-0.079-0.186-0.125-0.297-0.125H4.159c-0.229,0-0.417,0.188-0.417,0.417v1.669H2.073c-0.229,0-0.417,0.188-0.417,0.417v9.596c0,0.229,0.188,0.417,0.417,0.417h15.854c0.229,0,0.417-0.188,0.417-0.417V6.245C18.344,6.016,18.156,5.828,17.927,5.828 M4.577,4.577h6.539l1.231,1.251h-7.77V4.577z M17.51,15.424H2.491V6.663H17.51V15.424z"></path>
						</svg></i>
=======
					<?php if(strpos($url, 'escritorio') !== false):?>
						<a href="escritorio.php" class="list-group-item list-group-item-action" style="border: 0px">
						<i><img src="../assets/images/expediente.svg"></i>
>>>>>>> Stashed changes
                        Expedientes
                    </a>
					<a href="reportes.php" class="list-group-item list-group-item-action" style="border: 0px">
						<i><img src="../assets/images/reportes.svg"></i>						
                        Reportes
<<<<<<< Updated upstream
                    </a>
					<a href="logout.php" class="list-group-item list-group-item-action" style="border: 0px">
						<i><svg class="svg-icon-side" viewBox="0 0 20 20">
							<path fill="none" d="M8.416,3.943l1.12-1.12v9.031c0,0.257,0.208,0.464,0.464,0.464c0.256,0,0.464-0.207,0.464-0.464V2.823l1.12,1.12c0.182,0.182,0.476,0.182,0.656,0c0.182-0.181,0.182-0.475,0-0.656l-1.744-1.745c-0.018-0.081-0.048-0.16-0.112-0.224C10.279,1.214,10.137,1.177,10,1.194c-0.137-0.017-0.279,0.02-0.384,0.125C9.551,1.384,9.518,1.465,9.499,1.548L7.76,3.288c-0.182,0.181-0.182,0.475,0,0.656C7.941,4.125,8.234,4.125,8.416,3.943z M15.569,6.286h-2.32v0.928h2.32c0.512,0,0.928,0.416,0.928,0.928v8.817c0,0.513-0.416,0.929-0.928,0.929H4.432c-0.513,0-0.928-0.416-0.928-0.929V8.142c0-0.513,0.416-0.928,0.928-0.928h2.32V6.286h-2.32c-1.025,0-1.856,0.831-1.856,1.856v8.817c0,1.025,0.832,1.856,1.856,1.856h11.138c1.024,0,1.855-0.831,1.855-1.856V8.142C17.425,7.117,16.594,6.286,15.569,6.286z"></path>
						</svg></i>
=======
                    </a>					
					<?php endif ?>

					<?php if(strpos($url, 'admin') !== false):?>
						<a href="escritorio.php" class="list-group-item list-group-item-action" style="border: 0px">
						<i><img src="../assets/images/expediente.svg"></i>
                        Expediente
						</a>
						<a href="reportes.php" class="list-group-item list-group-item-action" style="border: 0px">
							<i><img src="../assets/images/alumno.svg"></i>
							Alumno
						</a>
						<a href="reportes.php" class="list-group-item list-group-item-action" style="border: 0px">
							<i><img src="../assets/images/facultad.svg"></i>
							Facultad
						</a>
						<a href="reportes.php" class="list-group-item list-group-item-action" style="border: 0px">
							<i><img src="../assets/images/usuario.svg"></i>
							Usuario
						</a>
						<a href="reportes.php" class="list-group-item list-group-item-action" style="border: 0px">
							<i><img src="../assets/images/tipoUsuario.svg"></i>
							Tipo Usuario
						</a>
						<a href="reportes.php" class="list-group-item list-group-item-action" style="border: 0px">
							<i><img src="../assets/images/reportes.svg"></i>
							Alumno
						</a>
					<?php endif ?>

					<a href="/util/logout.php" class="list-group-item list-group-item-action" style="border: 0px">
						<i><img src="../assets/images/exit.svg" alt=""></i>
>>>>>>> Stashed changes
                        Salir
                    </a>
				</div>
			</div>
			<div id="page-content-wrapper">
				<nav class="navbar navbar-vista navbar-expand-lg navbar-light border-bottom">
					<button class="btn" id="menu-toggle" onclick="this.classList.toggle('opened');this.setAttribute('aria-expanded', this.classList.contains('opened'))" aria-label="Main Menu">
					<svg width="48" height="44" viewBox="0 0 100 100">
						<path class="line line1" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
						<path class="line line2" d="M 20,50 H 80" />
						<path class="line line3" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
					</svg>
					</button>
					<button
						class="navbar-toggler"
						type="button"
						data-toggle="collapse"
						data-target="#navbarSupportedContent"
						aria-controls="navbarSupportedContent"
						aria-expanded="false"
						aria-label="Toggle navigation"
					>
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto mt-2 mt-lg-0">
							<li class="nav-item active">
								<a class="nav-link text-white">
								<svg class="svg-icon" viewBox="0 0 20 20">
								<path fill="none" d="M12.443,9.672c0.203-0.496,0.329-1.052,0.329-1.652c0-1.969-1.241-3.565-2.772-3.565S7.228,6.051,7.228,8.02c0,0.599,0.126,1.156,0.33,1.652c-1.379,0.555-2.31,1.553-2.31,2.704c0,1.75,2.128,3.169,4.753,3.169c2.624,0,4.753-1.419,4.753-3.169C14.753,11.225,13.821,10.227,12.443,9.672z M10,5.247c1.094,0,1.98,1.242,1.98,2.773c0,1.531-0.887,2.772-1.98,2.772S8.02,9.551,8.02,8.02C8.02,6.489,8.906,5.247,10,5.247z M10,14.753c-2.187,0-3.96-1.063-3.96-2.377c0-0.854,0.757-1.596,1.885-2.015c0.508,0.745,1.245,1.224,2.076,1.224s1.567-0.479,2.076-1.224c1.127,0.418,1.885,1.162,1.885,2.015C13.961,13.689,12.188,14.753,10,14.753z M10,0.891c-5.031,0-9.109,4.079-9.109,9.109c0,5.031,4.079,9.109,9.109,9.109c5.031,0,9.109-4.078,9.109-9.109C19.109,4.969,15.031,0.891,10,0.891z M10,18.317c-4.593,0-8.317-3.725-8.317-8.317c0-4.593,3.724-8.317,8.317-8.317c4.593,0,8.317,3.724,8.317,8.317C18.317,14.593,14.593,18.317,10,18.317z"></path>
								</svg>&nbsp;<u><b><?= $_SESSION['nameUser']; ?></b></u></a>
							</li>
						</ul>
					</div>
				</nav>
				