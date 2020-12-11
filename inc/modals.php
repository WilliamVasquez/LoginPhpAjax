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