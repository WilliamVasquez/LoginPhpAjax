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
		<div class="row">
			<div class="card-deck col-sm-12">
				<div class="card">
					<img src="assets/images/report_all.svg" class="card-img-top p-5" alt="report_all">
					<div class="card-body">
					<h5 class="card-title">Reporte de Expediente Ingresados</h5>
					<p class="card-text">El reporte se genera con los expedientes ingresados del escritorio.</p>
					</div>
					<div class="card-footer bg-white">
						<form action="reporteAll.php">
							<button type="submit" class="btn btn-outline-danger btn-block" id="reporteTodo">Generar</button>
						</form>
					</div>
				</div>
				<div class="card">
					<img src="assets/images/report_filtrado.svg" class="card-img-top p-5" alt="...">
					<div class="card-body">
					<h5 class="card-title">Reporte de Expediente por Filtros</h5>
					<p class="card-text">El reporte se genera con los expedientes ingresados del escritorio.</p>
					</div>
					<div class="card-footer bg-white">
					<button class="btn btn btn-outline-danger btn-block" data-toggle="modal" data-target="#modalForm">
						Establecer Filtros
					</button>
					</div>
				</div>
				<div class="card">
					<img src="assets/images/report_otros.svg" class="card-img-top p-5" alt="...">
					<div class="card-body">
					<h5 class="card-title">Otros Reportes</h5>
					<p class="card-text">Reporte con otras opciones</p>					
					</div>
					<div class="card-footer bg-white">
						<form action="">
							<button type="submit" class="btn btn-outline-danger btn-block" id="reporteOtro">Generar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
<div class="modal fade" id="modalForm" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">                
                <h4 class="modal-title" id="myModalLabel">Filtros del Reporte</h4>
				<button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form role="form" action="reporteFiltrado.php" method="POST">
					<div class="form-group col-12">
						<label for="cmbFacultad">Facultad</label>
						<select id="cmbFacultad" name="cmbFacultad" class="form-control select-css">											
						</select>								
					</div>
					<div class="form-group col-12">						
						<label for="cmbPrograma">Programa</label>
                            <select id="cmbPrograma" name="cmbPrograma" class="form-control select-css">
                        </select>			
					</div>
					<div class="form-group col-12">
						<label for="cmbCancelacion">Año de cancelación</label>
                            <select id="cmbCancelacion" name="cmbCancelacion" class="form-control select-css">
							<option value="0">Seleccione:</option>			
                        </select>				
					</div>
					<button type="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


	<?php 
		require 'inc/modals.php';
		require 'inc/footer.php'; 
	?>
<?php else: ?>
    <h1>Pues no mi ciela</h1>
    <a href="logout.php">Logout</a>
<?php endif; ?>