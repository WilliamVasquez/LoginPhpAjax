<?php
	require_once '../util/auth.php';
	require_once '../conexion/database.php';
	require_once '../inc/header.php';
?>
<div class="container mt-5">
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-3">
        <div class="col mb-4">
          <div class="card card-btn">            
              <img
                src="../assets/images/agregar-expediente-alter.svg"
                class="card-img-top p-4 img-fluid img-btn"
                alt="undraw_add_file2_gvbb"
              />            
            <div class="card-body">
              <h5 class="card-title text-center font-weight-bold">Añadir Expediente</h5>
              <p class="card-text text-center lead">
                Se muestra un formulario para ingresar un nuevo expediente.
              </p>
            </div>
            <div class="card-footer">      
                <button
                  type="button"
                  class="btn btn-opc btn-block"
                  id="nuevoExpediente"
                  data-toggle="modal"
                  data-target="#formExpediente"
                  data-tipo="newExpediente"
                >
                  Agregar
                </button>
            </div>
          </div>
        </div>
        <div class="col mb-4">
          <div class="card card-btn">
              <img
              src="../assets/images/editar-documento.svg"
              class="card-img-top p-4 img-fluid img-btn"
              alt="undraw_add_file2_gvbb"
            />        
            <div class="card-body">
              <h5 class="card-title text-center font-weight-bold">Editar Expediente</h5>
              <p class="card-text text-center lead">
                Se muestra un formulario para editar un expediente recientemente ingresado.
              </p>
            </div>
            <div class="card-footer">
                <button
                  class="btn btn-opc btn-block"
                  type="button" 
                  id="editarExpediente"
                  data-toggle="modal" 
                  data-target="#formTabla"
                >
                  Editar
                </button>
            </div>
          </div>
        </div>
        <div class="col mb-4">
          <div class="card card-btn">
              <img
              src="../assets/images/eliminar.svg"
              class="card-img-top p-4 img-fluid img-btn"
              alt="eliminar-documento"
            />            
            <div class="card-body">
              <h5 class="card-title text-center font-weight-bold">Eliminar Expediente</h5>
              <p class="card-text text-center lead">
                Se muestra un formulario para eliminar un expediente recientemente ingresado.
              </p>
            </div>
            <div class="card-footer">
              <form action="">
                <button
                  type="submit"
                  class="btn btn-opc btn-block"
                  id="reporteTodo"
                >
                  Eliminar
                </button>
              </form>
            </div>
          </div>
        </div>
        <div class="col mb-4">
          <div class="card card-btn">
							<img
	              src="../assets/images/dar-de-baja.svg"
	              class="card-img-top p-4 img-fluid img-btn"
	              alt="dar-de-baja"
	            />
            <div class="card-body">
              <h5 class="card-title text-center font-weight-bold">Dar de Baja</h5>
              <p class="card-text text-center lead">
              Se muestra un formulario para dar de bajo a un expediente por cambio de facultad, programa o algún otro motivo.
              </p>
            </div>
            <div class="card-footer">
              <form action="">
                <button
                  type="submit"
                  class="btn btn-opc btn-block"
                  id="reporteTodo"
                >
                  Dar de baja
                </button>
              </form>
            </div>
          </div>
        </div>
        <div class="col mb-4">
          <div class="card card-btn">
              <img
              src="../assets/images/buscar-documento.svg"
              class="card-img-top p-4 img-fluid img-btn"
              alt="buscar-documento"
            />          
            <div class="card-body">
              <h5 class="card-title text-center font-weight-bold">Filtrar Expediente</h5>
              <p class="card-text text-center lead">
                Se muestra los expedientes ingresados por el escritorio. <br><br>
              </p>
            </div>
            <div class="card-footer">
              <form action="">
                <button
                  type="submit"
                  class="btn btn-opc btn-block"
                  id="reporteTodo"
                >
                  Filtrar
                </button>
              </form>
            </div>
          </div>
        </div>
        <div class="col mb-4">
          <div class="card card-btn">              
              <img
              src="../assets/images/solicitar-documento.svg"
              class="card-img-top p-4 img-fluid img-btn"
              alt="solicitar-documento"
            />                       
            <div class="card-body">
              <h5 class="card-title text-center font-weight-bold">Solicitar Expediente</h5>
              <p class="card-text text-center lead">
                Se hace una solicitud para el prestamo de un expediente. <br><br>                
              </p>
              
            </div>
            <div class="card-footer">
              <form action="">
                <button
                  type="submit"
                  class="btn btn-opc btn-block"
                  id="reporteTodo"
                >
                  Solicitar
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
    <?php if(!empty($message)): ?>
		<?= $message ?>
	<?php endif; ?>
<?php
    require_once '../inc/modals.php';
    require_once '../inc/footer.php';
?>
