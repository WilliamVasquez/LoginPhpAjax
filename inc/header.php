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
					<a href="index.php" class="list-group-item list-group-item-action" style="border: 0px">
						<i><img src="assets/images/add-expediente.png" alt="" /></i>
                        Expediente
                    </a>
					<a href="reportes.php" class="list-group-item list-group-item-action" style="border: 0px">
						<i><img src="assets/images/edit-expediente.png" alt="" /></i>
                        Reportes
                    </a>
					<a href="logout.php" class="list-group-item list-group-item-action" style="border: 0px">
						<i><img src="assets/images/exit-sesion.png" alt="" /></i>
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
								<a class="nav-link text-white">Bienvenido/a <?= $_SESSION['nameUser']; ?></a>
							</li>
						</ul>
					</div>
				</nav>
				