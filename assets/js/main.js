$(function () {
	getExp();
	fillFacultad();
	fillPrograma();
	fillMotivo();
	let edit = false;
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
						<button type="button" id="verExpediente" class="btn btn-primary exp-item w-50 mr-2" data-toggle="modal" data-target="#formExpediente" value="${exp.Expediente}">Ver</button>
						<button type="button" id="editarExpediente" class="btn btn-primary exp-item w-50" data-toggle="modal" data-target="#formExpediente" value="${exp.Expediente}">Editar</button>
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
				let template = '';
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
				let template = '';
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
				let template = '';
				facts.forEach((fact) => {
					template += `<option value="${fact.idMotivo}">${fact.Nombre}</option>`;
				});
				$('#cmbMotivo').html(template);
			},
		});
	}
	$('#form-Expediente').submit(function (e) {
		const postData = {
			Expediente: $('#expId').val(),
			Carnet: $('#Carnet').val(),
		};
		let url = '';
		if (edit === false) url = 'exp-add.php';
		else url = 'exp-edit.php';
		$.post(url, postData, function (response) {
			edit = false;
			getExp();
			$('#form-Expediente').trigger('reset');
		});
		e.preventDefault();
	});
	$(document).on('click', '.exp-item', function () {
		let Expediente = $(this).val();
		$.post('exp-single.php', { Expediente }, function (response) {
			const exp = JSON.parse(response);
			$('#expId').val(exp.Expediente);
			$('#txtCarnet').val(exp.Carnet);
			$('#txtNombres').val(exp.Nombres);
			$('#txtApellidos').val(exp.Apellidos);
			$('#dtpInputCity').val(exp.FechaCancelacion);
			$('#cmbPrograma').val(exp.Programa);
			$('#cmbFacultad').val(exp.Facultad);
			$('#cmbMotivo').val(exp.Motivo);
			$('#txtObservacion').val(exp.Observacion);
			edit = true;
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

			modal.find('.modal-body input, textarea, select, label, .custom-file-label').off(); //Para que no agarre el click xd
		}

		if (idButton == 'editarExpediente') {
			modal.find('.modal-body input, textarea, select').prop('readonly', true);
			modal.find('.modal-body select, .custom-file-input').prop('disabled', true);
			$('.custom-checkbox').css('display', 'block');
			$('#accion').text(textButton);
			$('#accion').css('display', 'block');

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
					$('#programa').prop('disabled', false).focus();
				} else {
					$('#programa').prop('disabled', true);
				}
			});

			$('#chk-facultad').click(function (e) {
				if ($(this).prop('checked')) {
					$('#facultad').prop('disabled', false).focus();
				} else {
					$('#facultad').prop('disabled', true);
				}
			});

			$('#chk-motivos').click(function (e) {
				if ($(this).prop('checked')) {
					$('#motivos').prop('disabled', false).focus();
				} else {
					$('#motivos').prop('disabled', true);
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

			$('#carnet').focus();
		}

		//Limpiar el modal
		$('#cerrar, .close').click(function () {
			modal.find('#formExpediente')[0].reset();
		});
	});
});
