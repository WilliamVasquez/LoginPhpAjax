<?php
    include '../conexion/database.php';

    $limit = 10;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $star = ($page - 1) * $limit;
    $query = "CALL crud_expediente (1, 0, '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0)";
    $result = $con->query($query);
    $expedientes = $result->fetchAll(PDO::FETCH_ASSOC);
    $result->closeCursor();

    $query2 = "SELECT count(*) as id FROM expediente";
    $result2 = $con->query($query2);
    $expedientesCount = $result2->fetchAll(PDO::FETCH_ASSOC);
    $total = $expedientesCount[0]['id'];
    $pages = ceil($total/$limit);
?> 

<div
        class="modal fade"
        id="formExpediente"
        tabindex="-1"
        role="dialog"
        aria-labelledby="formExpediente"
        aria-hidden="true"
        data-backdrop="static"
        data-keyboard="false"
    >
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold" id="tituloModal">:titulo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" id="formExpediente">
                        <input type="hidden" id="expId" />
                        <input type="hidden" id="expExp" />
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="carnet">Carnet</label>
                                <input type="text" class="form-control" id="txtCarnet" pattern="[A-Z0-9]+" required />
                            </div>

                            <div class="form-group col-md-6">
                                <label for="facultad">Facultad</label>
                                <select id="cmbFacultad" class="form-control select-css">
                                </select>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="chk-facultad" />
                                    <label class="custom-control-label" for="chk-facultad">Activar</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nombres">Nombres</label>
                                <input type="text" class="form-control" id="txtNombres" pattern="[A-Za-z ]+" required />
                            </div>

                            <div class="form-group col-md-6">
                                <label for="apellidos">Apellidos</label>
                                <input type="text" class="form-control" id="txtApellidos" pattern="[A-Za-z ]+" required />
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">Fecha de Cancelación</label>
                                <input type="date" class="form-control" id="dtpInputCity" />
                            </div>

                            <div class="form-group col-md-6">
                                <label for="programa">Programa</label>
                                <select id="cmbPrograma" class="form-control select-css">
                                </select>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="chk-programa" />
                                    <label class="custom-control-label" for="chk-programa">Activar</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="motivoCancelacion">Motivo de Cancelación</label>
                                <select id="cmbMotivo" class="form-control select-css">
                                </select>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="chk-motivo" />
                                    <label class="custom-control-label" for="chk-motivo">Activar</label>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="observaciones">Observaciones</label>
                            <textarea
                                class="form-control"
                                id="txtObservacion"
                                rows="3"
                                placeholder="Observaciones del expediente"
                                pattern="[A-Za-z0-9 ]+"
                            ></textarea>
                        </div>

                        <div class="form-group">
                            <label for="fileExp">Archivos del expediente</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="fileExp" lang="es" accept=".jpg,.jpeg,.png,.pdf" name="uploadedFile" />
                                <label class="custom-file-label" for="customFileLang">Seleccionar Archivo ... </label>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="chk-files" />
                                    <label class="custom-control-label" for="chk-files">Activar</label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-danger" data-dismiss="modal" id="cerrar">Cerrar</button>
                            <button type="submit" class="btn btn-success" id="accion">:Accion</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- MODAL TABLA -->
<div
        class="modal fade"
        id="formTabla"
        tabindex="-1"
        role="dialog"
        aria-labelledby="formTabla"
        aria-hidden="true"
        data-backdrop="static"
        data-keyboard="false"
    >
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold" id="tituloModal">Selección :titulo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                <div class="row px-5 mt-4">
                    <div class="col-lg-4 col-md-3 col-sm-12 p-0">
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
                    <div class="col-lg-8 col-md-5 col-sm-12 p-0">
                        <input
                            type="text"
                            placeholder="Buscar expediente..."
                            class="form-control ml-1"
                            id="search"
                            name="search"
                            autofocus
                        />
                    </div>
                </div>
                    <form method="POST" enctype="multipart/form-data" id="formTabla">
                        <input type="hidden" id="expId" />
                        <input type="hidden" id="expExp" />
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <table class="table table-opc table-responsive table-hover table-striped mt-5">
                                        <thead class="thead-dark">
                                            <tr>
                                                <!-- <th scope="col">Expediente</th> -->
                                                <th scope="col">Carnet</th>
                                                <th scope="col">Nombres</th>
                                                <th scope="col">Apellidos</th>
                                                <th scope="col">Programa</th>
                                                <th scope="col">Facultad</th>
                                                <th scope="col">Estado</th>
                                                <th scope="col" class="text-center">Opciones</th>
                                            </tr>                                            
                                        </thead>
                                        <tbody id="">
                                        <?php foreach($expedientes as $row) :?>
                                            <tr>                                                
                                                <th scope="row"> <?= $row['Carnet'] ?> </th>
                                                <td>  <?= $row['Nombres'] ?> </td>
                                                <td>  <?= $row['Apellidos'] ?> </td>
                                                <td>  <?= $row['Programa'] ?> </td>
                                                <td>  <?= $row['Facultad'] ?> </td>
                                                <td>  <?= $row['Estado'] ?> </td>
                                                <td class="d-flex">
                                                <button type="button" id="tipoOpc" class="btn btn-primary exp-item" data-toggle="modal" data-target="#formExpediente" value="">Seleccionar</button>
                                                </td>                                                
                                            </tr>
                                        <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                                <nav aria-label="Page navigation">
                                  <ul class="pagination justify-content-center">
                                    <li class="page-item disabled">
                                      <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                      </a>
                                    </li>
                                    <?php for($i = 1; $i <= $pages; $i++) :?>                                                                             
                                    <li class="page-item active"><a class="page-link" href="?page=<?= $i; ?>"> <?= $i; ?> </a></li>
                                    <?php endfor ?>
                                    <li class="page-item">
                                      <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                      </a>
                                    </li>
                                  </ul>
                                </nav>
                                
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="col-4">
                                <button type="reset" class="btn btn-danger btn-block" data-dismiss="modal" id="cerrar">Cancelar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 