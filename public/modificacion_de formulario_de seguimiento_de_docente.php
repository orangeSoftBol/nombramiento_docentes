<?php  

#Realiza modificacioneds en y actualizaciones en el formulario de seguimiento de docentes y lo guarda en la base de datos.
require('class/database.php');
$objData = new Database();
#$facultades = array("ARQUITECTURA Y CIENCIAS DEL HABITAD", "CIENCIAS Y TECNOLOGIA", "ECONOMIA", "ODONTOLOGIA","MEDICINA", "CIENCIAS DE LA EDUCACION", "AGRONOMIA");
#$carreras = array("INFORMATICA", "SISTEMAS");
#$departamentos = array("INFORMATICA-SISTEMAS");
#$categorias = array("INTERINO", "INVITADO", "ASISTENTE", "ADJUNTO", "CATEDRATICO");

if (isset($_GET['opcion'])) {
	$sth1 = $objData->prepare('SELECT * FROM segui_doc SD, docente D WHERE D. = SD.FK_DOCENTE AND D.CODIGO2 = :codigo2');
	$sth1->bindParam(':codigo2', $_GET['opcion']);
	$sth1->execute();

	$result1 = $sth1->fetchAll();
	
}

$sth = $objData->prepare('SELECT M.SIGLA2, M.NOMBRE3 FROM materia M');
$sth->execute();

$result = $sth->fetchAll();

if (isset($_GET['nomDoc'])) {
	$nd = $_GET['nomDoc'];
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>
		MODIFICACION DE SEGUIMIENTO DE DOCENTE
	</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<style>
		#titulo_pagina {
	      background-color: #4d4dff;
	      color: #fff;
	      padding: 60px 25px;
  		}
	</style>
</head>
<body>
	<<header>
		<dir id="titulo_pagina" class="jumbotron container">
			<h1 class="text-center">Registro de Seguimiento de Docentes</h1>
		</dir>
	</header>>
	<div class="container">
		<div >
			<div class="well well-sm">
				<form id="form-segimiento-doc" >
					<div class="form-group">
						<div class="">
							<label class="control-label col-xs-4">Nombre del docente:</label>
						</div>
						<div class="">
							<?php

							if (isset($nd)) { ?>
								<input type="text" name="nom_docente" class="form-control" value="<?php echo $nd; ?>">
								<?php

							} else { ?>
								<input type="text" name="nom_docente" class="form-control">
								<?php
							} ?>

						</div>
						<div class="">
							<button type="button" class="btn-primary btn" id="buscar_docente" onclick="window.location.href = 'busqueda_docente_formulario_seguimiento.php';">BUSCAR</button>
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-5">
							<label class="control-label">MATERIAS</label>
							<select class="form-control" id="lista-materias" multiple size="10">

								<?php 

								foreach ($result as $key => $value) { ?>
								 	<option><?php echo $value['NOMBRE3']; ?></option>
							 		<?php  
								} 
								 ?>
							
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-2">
							<div class="col-xs-9 form-group">
								<br>
								<br>
								<button type="button" id="b-add-mat" name="btn-add-materia" onclick="anadirMateria()" class="btn btn-primary">
									AGREGAR MATERIA 
								</button>
							</div>
							<div class="col-xs-9 form-group">
								<button type="button" id="b-del-mat" name="btn-eliminar-materia" onclick="eliminarMateria()" class="btn 	btn-primary">
									ELIMINAR MATERIA
								</button>
							</div>
							<div>
								<label class="control-label col-xs-6">GRUPO:</label>
								<select class="form-control col-xs-3" id="grupos">
									<option>-</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
									<option>6</option>
									<option>7</option>
									<option>8</option>
									<option>9</option>
									<option>10</option>
									<option>11</option>
									<option>12</option>
									<option>13</option>
									<option>14</option>
									<option>15</option>
									<option>16</option>
									<option>17</option>
									<option>18</option>
									<option>19</option>
									<option>20</option>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-5">
							<label class="control-label">MATERIAS QUE DICTARA:</label>
							<select class="form-control" multiple size="11" id="materias_asignadas"></select>
							<br>
						</div>
					</div>
					<br>
					<br>
					
					<br>
					<br>
					<br>

					<br>
					<br>
					<br>
					<br>
					<br>
					<div class="form-group">
						<div class="form-group">
				            <label class="checkbox">
				                Categoria Docente
				            </label>
				        </div>
				        <div class="form-group">
				            <label class="checkbox-inline">
				                <input type="checkbox" name="aistente" value="asistente"> C (Asistente)
				            </label>
				        </div>
				        <div class="form-group">
				            <label class="checkbox-inline">
				                <input type="checkbox" name="adjunto" value="adjunto"> B (Adjunto)
				            </label>
				        </div>
				        <div class="form-group">
				            <label class="checkbox-inline">
				                <input type="checkbox" name="catedratico" value="catedratico"> A (Catedrático)
				            </label>
				        </div>
				        <div class="form-group">
				            <label class="checkbox-inline">
				                <input type="checkbox" name="auxiliar_docencia" value="auxiliar"> Auxiliar Docencia:
				            </label>
				        </div>
				        <div class="form-group">
				            <label class="control-label">
				                 Otro cargo UMSS:
				            </label>
				            <input type="text" name="otro_cargo" class="">
				        </div>
				    </div>

				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function anadirMateria() {
			var valor_lista = document.getElementById('lista-materias').selectedIndex;
			var valor_grupo = document.getElementById("grupos").selectedIndex;
			var tamano_lista = document.getElementById("materias_asignadas").options.length;

			var materia = document.getElementById('lista-materias').value;
			var grupo = document.getElementById('grupos').value;
			var destino = document.getElementById("materias_asignadas");

			for (var i = 0; i < tamano_lista; i++) {
				var prueva = grupo + " " + materia;
				var bandera = false;

				if (prueva == document.getElementById("materias_asignadas").options.item(i).text) {
					bandera = true;
				}
				
			}

			if (valor_lista == null || valor_lista == 0 || valor_grupo == null || valor_grupo == 0) {
				alert("DEBE SELECCIONAR UNA MATERIA Y EL GRUPO A DESIGNAR");
				

			} else {
				
				if (bandera) {
					alert("No puede adicionar dos veces la misma materia con el mismo grupo.");

				} else {
					var opcion = document.createElement("option");
					opcion.text = grupo + " " + materia;
					destino.add(opcion);
				}
			}
		}

		function eliminarMateria() {
			var x = document.getElementById("materias_asignadas");
   			x.remove(x.selectedIndex);
		}
	</script>
	<script src="js/bootstrap.min.js"></script>

</body>
</html>