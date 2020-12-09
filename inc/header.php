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
					<a href="#" class="list-group-item list-group-item-action" style="border: 0px">
						<i><img src="assets/images/add-expediente.png" alt="" /></i>
                        Expediente
                    </a>
					<a href="#" class="list-group-item list-group-item-action" style="border: 0px">
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
					<button class="btn" id="menu-toggle">
						<span class="text-white">Ocultar / Mostrar</span>
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
								<a class="nav-link text-white">Welcome <?= $user['PriNombre']; ?></a>
							</li>
						</ul>
					</div>
				</nav>
				<div class="container">
					<div class="row float-right">
						<div class="col-12">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#">Inicio</a></li>
									<li class="breadcrumb-item active" aria-current="page">Expediente</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<br />