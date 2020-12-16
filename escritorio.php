<?php
	require_once 'auth.php';
	require_once 'database.php';
	require_once 'inc/header.php'; 
?>
<div class="container mt-5">
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-3">
        <div class="col mb-4">
          <div class="card card-btn">
            <!-- SOLO IMAGENES 600X400 -->
            <div class="text-center">
              <img
                src="assets/images/undraw_add_file2_gvbb.svg"
                class="card-img-top p-4 img-fluid img-btn"
                alt="undraw_add_file2_gvbb"
              />
            </div>
            <div class="card-body">
              <h5 class="card-title text-center font-weight-bold">Añadir Expediente</h5>
              <p class="card-text text-center">
                Se muestra un formulario para ingresar un nuevo expediente.
              </p>
            </div>
            <div class="card-footer bg-transparent">
              <form action="">
                <button
                  type="submit"
                  class="btn btn-outline-danger btn-block"
                  id="reporteTodo"
                >
                  Seleccionar
                </button>
              </form>
            </div>
          </div>
        </div>
        <div class="col mb-4">
          <div class="card card-btn">
              <!-- SOLO IMAGENES 600X400 -->
            <div class="text-center">
              <img
              src="assets/images/undraw_publish_post_vowb.svg"
              class="card-img-top p-4 img-fluid img-btn"
              alt="undraw_add_file2_gvbb"
            />
            </div>
            <div class="card-body">
              <h5 class="card-title text-center font-weight-bold">Editar Expediente</h5>
              <p class="card-text text-center">
                Se muestra un formulario para editar un expediente recientemente ingresado.
              </p>
            </div>
            <div class="card-footer bg-transparent">
              <form action="">
                <button
                  type="submit"
                  class="btn btn-outline-danger btn-block"
                  id="reporteTodo"
                >
                  Seleccionar
                </button>
              </form>
            </div>
          </div>
        </div>
        <div class="col mb-4">
          <div class="card card-btn">
              <!-- SOLO IMAGENES 600X400 -->
            <div class="text-center">
              <img
              src="assets/images/undraw_Throw_away_re_x60k.svg"
              class="card-img-top p-4 img-fluid img-btn"
              alt="undraw_add_file2_gvbb"
            />
            </div>
            <div class="card-body">
              <h5 class="card-title text-center font-weight-bold">Eliminar Expediente</h5>
              <p class="card-text text-muted">
                Se muestra un formulario para eliminar un expediente recientemente ingresado.
              </p>
            </div>
            <div class="card-footer bg-transparent">
              <form action="">
                <button
                  type="submit"
                  class="btn btn-outline-danger btn-block"
                  id="reporteTodo"
                >
                  Seleccionar
                </button>
              </form>
            </div>
          </div>
        </div>
        <div class="col mb-4">
          <div class="card card-btn">
              <!-- SOLO IMAGENES 600X400 -->
            <img
              src="assets/images/undraw_live_collaboration_2r4y.svg"
              class="card-img-top p-4 img-fluid img-btn"
              alt="undraw_add_file2_gvbb"
            />
            <div class="card-body">
              <h5 class="card-title text-center font-weight-bold">Dar de Baja</h5>
              <p class="card-text text-center">
                Se muestra un formulario para dar de bajo a un expediente por cambio de facultad, programa u otros motivos del alumno.
              </p>
            </div>
            <div class="card-footer bg-transparent">
              <form action="">
                <button
                  type="submit"
                  class="btn btn-outline-danger btn-block"
                  id="reporteTodo"
                >
                  Seleccionar
                </button>
              </form>
            </div>
          </div>
        </div>
        <div class="col mb-4">
          <div class="card card-btn">
              <!-- SOLO IMAGENES 600X400 -->
            <div class="text-center">
              <img
              src="assets/images/undraw_add_file2_gvbb.svg"
              class="card-img-top p-4 img-fluid img-btn"
              alt="undraw_add_file2_gvbb"
            />
            </div>
            <div class="card-body">
              <h5 class="card-title text-center font-weight-bold">Filtrar Expediente</h5>
              <p class="card-text text-center">
                Se muestra los expedientes ingresados por el escritorio.
              </p>
              
            </div>
            <br><br>
            <div class="card-footer bg-transparent">
              <form action="">
                <button
                  type="submit"
                  class="btn btn-outline-danger btn-block"
                  id="reporteTodo"
                >
                  Seleccionar
                </button>
              </form>
            </div>
          </div>
        </div>
        <div class="col mb-4">
          <div class="card card-btn">
              <!-- SOLO IMAGENES 600X400 -->
            <div class="text-center">
              <img
              src="assets/images/undraw_Files_sent_re_kv00.svg"
              class="card-img-top p-4 img-fluid img-btn"
              alt="undraw_add_file2_gvbb"
            />
            </div>
            <br><br>
            <div class="card-body">
              <h5 class="card-title text-center font-weight-bold">Solicitar Expediente</h5>
              <p class="card-text text-center">
                Se hace una solicitud para el prestamo de un expediente.
              </p>
            </div>
            <div class="card-footer bg-transparent">
              <form action="">
                <button
                  type="submit"
                  class="btn btn-outline-danger btn-block"
                  id="reporteTodo"
                >
                  Seleccionar
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
    require_once 'inc/modals.php';
    require_once 'inc/footer.php'; 
?>