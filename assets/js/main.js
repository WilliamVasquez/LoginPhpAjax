$(function () {
	getExp();
	fillFacultad();
	fillPrograma();
	fillMotivo();
	fillAnio();
	function getExp() {
		$.ajax({
			url: 'exp-list.php',
			type: 'GET',
			success: function (response) {
				let exps = JSON.parse(response);
				let template = '';
				exps.forEach((exp) => {
					template += `<tr>
						<td>${exp.Expediente}</td>
						<td>${exp.Carnet}</td>
						<td>${exp.Nombres}</td>
						<td>${exp.Apellidos}</td>
						<td>${exp.Programa}</td>
						<td>${exp.Motivo}</td>
						<td>${exp.Estado}</td>
						<td class="d-flex">
						<button type="button" id="verExpediente" class="btn btn-primary exp-item w-50 mr-2" data-toggle="modal" data-target="#formExpediente" value="${exp.idDetalle}">Ver</button>
						<button type="button" id="editarExpediente" class="btn btn-primary exp-item w-50" data-toggle="modal" data-target="#formExpediente" value="${exp.idDetalle}">Editar</button>
						</td>
					</tr>`;
				});
				$('#exps').html(template);
			},
		});
	}
	function fillFacultad() {
		$.ajax({
			url: 'cmbFacultad.php',
			type: 'GET',
			success: function (response) {
				let facts = JSON.parse(response);
				let template = '<option value="-1" disabled selected hidden>Por favor seleccione una opcion</option>';
				facts.forEach((fact) => {
					template += `<option value="${fact.idFacultad}">${fact.Nombre}</option>`;
				});
				$('#cmbFacultad').html(template);
			},
		});
	}
	function fillPrograma() {
		$.ajax({
			url: 'cmbPrograma.php',
			type: 'GET',
			success: function (response) {
				let facts = JSON.parse(response);
				let template = '<option value="-1" disabled selected hidden>Por favor seleccione una opcion</option>';
				facts.forEach((fact) => {
					template += `<option value="${fact.idPrograma}">${fact.Nombre}</option>`;
				});
				$('#cmbPrograma').html(template);
			},
		});
	}
	function fillMotivo() {
		$.ajax({
			url: 'cmbMotivo.php',
			type: 'GET',
			success: function (response) {
				let facts = JSON.parse(response);
				let template = '<option value="-1" disabled selected hidden>Por favor seleccione una opcion</option>';
				facts.forEach((fact) => {
					template += `<option value="${fact.idMotivo}">${fact.Nombre}</option>`;
				});
				$('#cmbMotivo').html(template);
			},
		});
	}
	function fillAnio() {
		$.ajax({
			url: 'cmbAnio.php',
			type: 'GET',
			success: function (response) {
				let facts = JSON.parse(response);
				let template = '<option value="0">Seleccionar::</option>';
				facts.forEach((fact) => {
					template += `<option value="${fact.Anio}">${fact.Anio}</option>`;
				});
				$('#cmbCancelacion').html(template);
			},
		});
	}
	function resetModalExp() {
		$('#cmbPrograma').val(-1);
		$('#cmbFacultad').val(-1);
		$('#cmbMotivo').val(-1);
		$('#expId').val('');
		$('#expExp').val('');
		$('#formExpediente').trigger('reset');
	}
	$('#nuevoExpediente').click(function (e) {
		resetModalExp();
	});
	$('#formExpediente').submit(function (e) {
		$('button[name="addExp"]').click(function () {
			let rand = Math.floor((Math.random() * 10) + 1);
			const postData = {
				codigo: rand.toString(),
				carnet: $('#txtCarnet').val(),
				priNombre: $('#txtNombres').val().trim().split(' ')[0],
				segNombre: $('#txtNombres').val().trim().split(' ')[1],
				priApellido: $('#txtApellidos').val().trim().split(' ')[0],
				segApellido: $('#txtApellidos').val().trim().split(' ')[1],
				inputCity: $('#dtpInputCity').val(),
				programa: $('#cmbPrograma').val(),
				facultad: $('#cmbFacultad').val(),
				motivo: $('#cmbMotivo').val(),
				observacion: $('#txtObservacion').val(),
				};
			console.info(postData);
			$('#formExpediente').modal('toggle');
			$.post('exp-add.php', postData, function (response) {
				console.log(response);
				getExp();
				$('#formExpediente').trigger('reset');
			});
		});

		$('button[name="editExp"]').click(function () {
			const postData = {
				id: $('#expId').val(),
				codigo: $('#expExp').val(),
				carnet: $('#txtCarnet').val(),
				priNombre: $('#txtNombres').val().trim().split(' ')[0],
				segNombre: $('#txtNombres').val().trim().split(' ')[1],
				priApellido: $('#txtApellidos').val().trim().split(' ')[0],
				segApellido: $('#txtApellidos').val().trim().split(' ')[1],
				inputCity: $('#dtpInputCity').val(),
				programa: $('#cmbPrograma').val(),
				facultad: $('#cmbFacultad').val(),
				motivo: $('#cmbMotivo').val(),
				observacion: $('#txtObservacion').val(),
			};
			$.post('exp-edit.php', postData, function (response) {
				console.log(response);
				getExp();
				$('#formExpediente').trigger('reset');
			});
		});
		e.preventDefault();
	});
	$(document).on('click', '.exp-item', function () {
		let idExpediente = $(this).val();
		$.post('exp-single.php', { idExpediente }, function (response) {
			const exp = JSON.parse(response);
			$('#expId').val(exp.idExpediente);
			$('#expExp').val(exp.Expediente);
			$('#txtCarnet').val(exp.Carnet);
			$('#txtNombres').val(exp.Nombres);
			$('#txtApellidos').val(exp.Apellidos);
			$('#dtpInputCity').val(exp.FechaCancelacion);
			$('#cmbPrograma').val(exp.Programa);
			$('#cmbFacultad').val(exp.Facultad);
			$('#cmbMotivo').val(exp.Motivo);
			$('#txtObservacion').val(exp.Observacion);
		});
	});
	$('#menu-toggle').click(function (e) {
		e.preventDefault();
		$('#wrapper').toggleClass('toggled');
	});
	$('#formExpediente').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget);
		var idButton = button.attr('id');
		var textButton = button.text();

		//console.log(textButton);

		var modal = $(this);

		modal.find('.modal-title').text(textButton + ' Expediente');

		if (idButton == 'verExpediente') {
			modal.find('.modal-body input, textarea, select').prop('readonly', true);
			modal.find('.modal-body select, .custom-file-input').prop('disabled', true);

			$('#accion').css('display', 'none'); //Esconder button
			$('.custom-checkbox').css('display', 'none'); //Esconder button

			$('#accion').removeAttr('name');

			modal.find('.modal-body input, textarea, select, label, .custom-file-label').off(); //Para que no agarre el click xd
		}

		if (idButton == 'editarExpediente') {
			modal.find('.modal-body input, textarea, select').prop('readonly', true);
			modal.find('.modal-body select, .custom-file-input').prop('disabled', true);
			$('.custom-checkbox').css('display', 'block');
			$('#accion').text(textButton);
			$('#accion').css('display', 'block');
			$('#accion').removeAttr('name');
			$('#accion').attr('name', 'editExp');

			$('input, select, textarea').click(function (e) {
				let click = $(this);
				console.log(click);
				if (click == 'select') {
					click.prop('disable', true);
				} else {
					click.prop('readonly', false);
				}
			});

			$('#chk-programa').click(function (e) {
				if ($(this).prop('checked')) {
					$('#cmbPrograma').prop('disabled', false).focus();
				} else {
					$('#cmbPrograma').prop('disabled', true);
				}
			});

			$('#chk-facultad').click(function (e) {
				if ($(this).prop('checked')) {
					$('#cmbFacultad').prop('disabled', false).focus();
				} else {
					$('#cmbFacultad').prop('disabled', true);
				}
			});

			$('#chk-motivo').click(function (e) {
				if ($(this).prop('checked')) {
					$('#cmbMotivo').prop('disabled', false).focus();
				} else {
					$('#cmbMotivo').prop('disabled', true);
				}
			});

			$('#chk-files').click(function (e) {
				if ($(this).prop('checked')) {
					$('#fileExp').prop('disabled', false).focus();
				} else {
					$('#fileExp').prop('disabled', true);
				}
			});
		}

		if (idButton == 'nuevoExpediente') {
			modal.find('.modal-body input, textarea, select').prop('readonly', false);
			modal.find('.modal-body select, .custom-file-input').prop('disabled', false);

			$('#accion').text(textButton);
			$('.custom-checkbox').css('display', 'none');
			$('#accion').css('display', 'block');

			$('#carnet').focus();
			$('#accion').removeAttr('name');
			$('#accion').attr('name', 'addExp');
		}

		//Limpiar el modal
		$('#cerrar, .close').click(function () {
			modal.find('#formExpediente')[0].reset();
		});
	});
});
