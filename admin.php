<?php
	require 'auth.php';
	require 'database.php';

	if (isset($_SESSION['user_id'])) {
		$records = $conn->prepare('SELECT * FROM usuario WHERE Escritorio = :escritorio');
		$records->bindParam(':escritorio', $_SESSION['user_id']);
		$records->execute();
		$results = $records->fetch(PDO::FETCH_ASSOC);

		$user = null;

		if (is_countable($results) > 0) {
            $user = $results;
		}
	}
?>
<?php if(!empty($user)): ?>
	<?php require 'inc/header.php'; ?>
	<div class="container">
		<div class="row no-gutters mt-5">
			<div class="col-lg-3 col-md-3 col-sm-12 p-0">
				<select class="custom-select" id="filtroExpediente">
					<option selected>Filtrar por:</option>
					<option value="1">Código</option>
					<option value="2">Carnet</option>
					<option value="3">Facultad</option>
					<option value="4">Estado</option>
					<option value="5">Programa</option>
					<option value="6">Año</option>
				</select>
			</div>
			<div class="col-lg-6 col-md-5 col-sm-12 p-0">
				<input
					type="text"
					placeholder="Buscar expediente..."
					class="form-control ml-1"
					id="search"
					name="search"
					autofocus
				/>
			</div>
			<div class="col-lg-1 col-md-2 col-sm-12 ml-xl-1 ml-sm-0">
				<button
					type="submit"
					id="nuevoExpediente"
					class="btn btn-success btn-block ml-2"
					data-toggle="modal"
					data-target="#formExpediente"
					data-tipo="newExpediente"
				>
					Agregar
				</button>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<table class="table table-responsive table-hover table-striped mt-5">
					<thead class="thead-dark">
						<tr>
							<th scope="col">Expediente</th>
							<th scope="col">Carnet</th>
							<th scope="col">Nombres</th>
							<th scope="col">Apellidos</th>
							<th scope="col">Programa</th>
							<th scope="col">Motivo</th>
							<th scope="col">Estado</th>
							<th scope="col" class="text-center">Opciones</th>
						</tr>
					</thead>
					<tbody id="exps"></tbody>
				</table>
			</div>
		</div>
	</div>
	<?php if(!empty($message)): ?>
		<?= $message ?>
	<?php endif; ?>
	<?php 
		require 'inc/modals.php';
		require 'inc/footer.php'; 
	?>
<?php else: ?>
    <h1>Pues no mi ciela</h1>
    <a href="logout.php">Logout</a>
<?php endif; ?>