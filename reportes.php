<?php
	require_once 'auth.php';
	require_once 'database.php';
	require_once 'inc/header.php';
?>
	<div class="container mt-5">
		<div class="row">
			<div class="card-deck col-sm-12">
				<div class="card">
					<img src="assets/images/report_all.svg" class="card-img-top img-fluid img-btn p-4" alt="report_all">
					<div class="card-body">
					<h5 class="card-title text-center font-weight-bold">Expedientes Ingresados</h5>
					<p class="card-text text-center lead">El reporte se genera con los expedientes ingresados del escritorio.</p>
					</div>
					<div class="card-footer">
						<form action="reporteAll.php">
							<button type="submit" class="btn btn-opc btn-block" id="reporteTodo">Generar</button>
						</form>
					</div>
				</div>
				<div class="card">
					<img src="assets/images/report_filtrado.svg" class="card-img-top img-fluid img-btn p-4" alt="REPORT_FILTRADO">
					<div class="card-body">
					<h5 class="card-title text-center font-weight-bold">Expediente por Filtros</h5>
					<p class="card-text text-center lead">El reporte se genera con los expedientes ingresados del escritorio.</p>
					</div>
					<div class="card-footer">
					<button class="btn btn-opc btn-block" data-toggle="modal" data-target="#modalForm">
						Establecer Filtros
					</button>
					</div>
				</div>
				<div class="card">
					<img src="assets/images/report_otros.svg" class="card-img-top img-fluid img-btn p-4" alt="REPORT_OTROS">
					<div class="card-body">
					<h5 class="card-title text-center font-weight-bold">Otros Reportes</h5>
					<p class="card-text text-center lead">Reporte con otras opciones</p>
					</div>
					<div class="card-footer">
						<form action="">
							<button type="submit" class="btn btn-opc btn-block" id="reporteOtro">Generar</button>
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
					<button type="submit" class="btn btn-primary btn-block">Generar</button>
                </form>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<?php
	require_once 'inc/footer.php';
?>
