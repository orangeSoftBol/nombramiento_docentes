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
<html lang="es">
<head>
	
  <title>sistema de apoyo administrativo</title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css" rel="stylesheet">
    <script src="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
     <script type="text/javascript" src="js/validator_materia.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>

<body> 
 
  <div class="PanelPrincipal">
    <form  action="" method="post">
             <div class="col-xs-12 active btn-primary">
			  <center><h3>Asignacion de Materias Docente</h3></center>

			  	<div class="clearfix"></div><br><br>
           <div class="col-xs-10">
               
                <form id="form-segimiento-doc" >
                    
					<div class="form-group">
						<div class="">
							<label class="control-label col-xs-2">Nombre del docente:</label>
						</div>
						<div class="col-xs-2">
							<?php

							if (isset($nd)) { ?>
								<input type="text" name="nom_docente" id="nombre_doc" class="form-control" value="<?php echo $nd; ?>">
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
						<div class="col-xs-4">
							<label class="control-label">MATERIAS</label>
							<select class="form-control" id="lista-materias" multiple size="11">

								<?php 

								foreach ($result as $key => $value) { ?>
								 	<option><?php echo $value['SIGLA2'];echo " "; echo $value['NOMBRE3']; ?></option>
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
								<button type="button" id="b-del-mat" name="btn-eliminar-materia" onclick="eliminarMateria()" class="btn btn-primary">
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
						<div class="col-xs-4">
							<label class="control-label">MATERIAS QUE DICTARA:</label>
							<select class="form-control" multiple size="11" id="materias_asignadas"></select>
							<br>
						</div>
					</div>
					
                   
					<div class="form-group">
                       
						<div class="col-xs-2">
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

				    <!--Asignacion de periodos al horario.-->
				    <fieldset class="form-group col-xs-4">
					<legend>HORARIO:</legend>
						<div class="form-group">
							<div class="col-xs-6 form-group">
								<label class="control-label">Día</label>
								<select class="form-control" name="dia-horario" id="dia-horario">
									<option>--</option>
									<option>LUNES</option>
									<option>MARTES</option>
									<option>MIERCOLES</option>
									<option>JUEVES</option>
									<option>VIERNES</option>
									<option>SABADO</option>
								</select>
							</div>
							<div class="form-group col-xs-6">
								<label class="control-label">HORA INICIO</label>
								<select class="form-control" name="hora-inicio-horario" id="hora-inicio">
									<option>--</option>
									<option>06:45</option>
									<option>08:15</option>
									<option>09:45</option>
									<option>11:15</option>
									<option>12:45</option>
									<option>14:15</option>
									<option>15:45</option>
									<option>17:15</option>
									<option>19:45</option>
									<option>20:15</option>
								</select>
							</div>
							<div class="col-xs-6 form-group">
								<label class="control-label">HORA FIN</label>
								<select class="form-control" name="hora-fin-horario">
									<option>--</option>
									<option>08:15</option>
									<option>09:45</option>
									<option>11:15</option>
									<option>12:45</option>
									<option>14:15</option>
									<option>15:45</option>
									<option>17:15</option>
									<option>19:45</option>
									<option>20:15</option>
									<option>21:45</option>
								</select>
							</div>
							<div class="col-xs-6 form-group">
								<label class="control-label ">AULA</label>
								<input type="text" name="aula" class="form-control">
							</div>
						</div>
					</fieldset>
					<br>
					<br>
					<div class="form-group col-xs-6">
						<button type="button" class="btn btn-primary" onclick="anadirPeriodoMateria()">AGREGAR</button>
					</div>
					<div class="form-group col-xs-6">
						<button type="button" class="btn btn-primary">QUITAR</button>
					</div>
				    <div>
				    	<table class="table table-bordered" id="horario">
						    	<thead>
						    		<tr>
						        		<th>RANGO</th>
							        	<th>LUN</th>
							        	<th>MAR</th>
							        	<th>MIE</th>
							        	<th>JUE</th>
							        	<th>VIE</th>
							        	<th>SAB</th>
						      		</tr>
						   		</thead>
						   		<tbody>
						   	   		<tr>
						        		<td>06:45-08:15</td>
						    	    	<td>--</td>
						    	    	<td>--</td>
						    	    	<td>--</td>
						    	    	<td>--</td>
						        		<td>--</td>
						        		<td>--</td>
						 	     	</tr>
						 	     	<tr>
						        		<td>08:15-09:45</td>
						    	    	<td>--</td>
						    	    	<td>--</td>
						    	    	<td>--</td>
						    	    	<td>--</td>
						        		<td>--</td>
						        		<td>--</td>
						 	     	</tr>
						 	     	<tr>
						        		<td>09:45-11:15</td>
						    	    	<td>--</td>
						    	    	<td>--</td>
						    	    	<td>--</td>
						    	    	<td>--</td>
						        		<td>--</td>
						        		<td>--</td>
						 	     	</tr>
						 	     	<tr>
						        		<td>11:15-12:45</td>
						    	    	<td>--</td>
						    	    	<td>--</td>
						    	    	<td>--</td>
						    	    	<td>--</td>
						        		<td>--</td>
						        		<td>--</td>
						 	     	</tr>
						 	     	<tr>
						        		<td>12:45-14:15</td>
						    	    	<td>--</td>
						    	    	<td>--</td>
						    	    	<td>--</td>
						    	    	<td>--</td>
						        		<td>--</td>
						        		<td>--</td>
						 	     	</tr>
						 	     	<tr>
						        		<td>14:15-15:45</td>
						    	    	<td>--</td>
						    	    	<td>--</td>
						    	    	<td>--</td>
						    	    	<td>--</td>
						        		<td>--</td>
						        		<td>--</td>
						 	     	</tr>
						 	     	<tr>
						        		<td>15:45-17:15</td>
						    	    	<td>--</td>
						    	    	<td>--</td>
						    	    	<td>--</td>
						    	    	<td>--</td>
						        		<td>--</td>
						        		<td>--</td>
						 	     	</tr>
						 	     	<tr>
						        		<td>17:15-18:45</td>
						    	    	<td>--</td>
						    	    	<td>--</td>
						    	    	<td>--</td>
						    	    	<td>--</td>
						        		<td>--</td>
						        		<td>--</td>
						 	     	</tr>
						 	     	<tr>
						        		<td>18:45-20:15</td>
						    	    	<td>--</td>
						    	    	<td>--</td>
						    	    	<td>--</td>
						    	    	<td>--</td>
						        		<td>--</td>
						        		<td>--</td>
						 	     	</tr>
						 	     	<tr>
						        		<td>20:15-21:45</td>
						    	    	<td>--</td>
						    	    	<td>--</td>
						    	    	<td>--</td>
						    	    	<td>--</td>
						        		<td>--</td>
						        		<td>--</td>
						 	     	</tr>
						      	
						    	</tbody>
							</table>
				    </div>
				    
                    </div>
                 </div>
				</form>
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
			var nombreD = document.getElementById('nombre_doc').value;

			for (var i = 0; i < tamano_lista; i++) {
				var prueva = grupo + " " + materia;
				var bandera = false;

				if (prueva == document.getElementById("materias_asignadas").options.item(i).text) {
					bandera = true;
				}
				
			}

			if ( nombre_doc == "" || nombre_doc.length == 0) {
					alert("DEBE SLECCIONAR UN DOCENTE PARA ASIGNARLE UNA MATERIA");

			} else {
				
				if (valor_lista == null || valor_lista == 0 || valor_grupo == null || valor_grupo == 0) {
				alert("DEBE SELECCIONAR UNA MATERIA Y EL GRUPO A DESIGNAR");

				} else {

					if (bandera) {
						alert("NO PUEDE ADICIONAR DOS VECES LA MISMA MATERIA CON EL MISMO GRUPO.");

					} else {
						var opcion = document.createElement("option");
						opcion.text = grupo + " " + materia;
						destino.add(opcion);
					}
				}


				
			}
		}

		function eliminarMateria() {
			var x = document.getElementById("materias_asignadas");
   			x.remove(x.selectedIndex);
		}

		function anadirPeriodoMateria() {
			var hora = document.getElementById("hora-inicio").value;
			var dia = document.getElementById("dia-horario").value;
			//document.getElementById("horario").rows[3].cells[3].innerHTML = "X";
			//alert(hora+dia);
			switch (hora) {
				case "06:45": 
				switch (dia) {
					case "LUNES": document.getElementById("horario").rows[1].cells[1].innerHTML = "X";
					break;
					case "MARTES": document.getElementById("horario").rows[1].cells[2].innerHTML = "X";
					break;
					case "MIERCOLES": document.getElementById("horario").rows[1].cells[3].innerHTML = "X";
					break;
					case "JUEVES": document.getElementById("horario").rows[1].cells[4].innerHTML = "X";
					break;
					case "VIERNES": document.getElementById("horario").rows[1].cells[5].innerHTML = "X";
					break;
					case "SABADO": document.getElementById("horario").rows[1].cells[6].innerHTML = "X";
					break;
				}
				break;
				case "08:15": 
				switch (dia) {
					case "LUNES": document.getElementById("horario").rows[2].cells[1].innerHTML = "X";
					break;
					case "MARTES": document.getElementById("horario").rows[2].cells[2].innerHTML = "X";
					break;
					case "MIERCOLES": document.getElementById("horario").rows[2].cells[3].innerHTML = "X";
					break;
					case "JUEVES": document.getElementById("horario").rows[2].cells[4].innerHTML = "X";
					break;
					case "VIERNES": document.getElementById("horario").rows[2].cells[5].innerHTML = "X";
					break;
					case "SABADO": document.getElementById("horario").rows[2].cells[6].innerHTML = "X";
					break;
				}
				break;
				case "09:45": 
				switch (dia) {
					case "LUNES": document.getElementById("horario").rows[3].cells[1].innerHTML = "X";
					break;
					case "MARTES": document.getElementById("horario").rows[3].cells[2].innerHTML = "X";
					break;
					case "MIERCOLES": document.getElementById("horario").rows[3].cells[3].innerHTML = "X";
					break;
					case "JUEVES": document.getElementById("horario").rows[3].cells[4].innerHTML = "X";
					break;
					case "VIERNES": document.getElementById("horario").rows[3].cells[5].innerHTML = "X";
					break;
					case "SABADO": document.getElementById("horario").rows[3].cells[6].innerHTML = "X";
					break;
				}
				break;
				case "11:15": 
				switch (dia) {
					case "LUNES": document.getElementById("horario").rows[4].cells[1].innerHTML = "X";
					break;
					case "MARTES": document.getElementById("horario").rows[4].cells[2].innerHTML = "X";
					break;
					case "MIERCOLES": document.getElementById("horario").rows[4].cells[3].innerHTML = "X";
					break;
					case "JUEVES": document.getElementById("horario").rows[4].cells[4].innerHTML = "X";
					break;
					case "VIERNES": document.getElementById("horario").rows[4].cells[5].innerHTML = "X";
					break;
					case "SABADO": document.getElementById("horario").rows[4].cells[6].innerHTML = "X";
					break;
				}
				break;
				case "12:45": 
				switch (dia) {
					case "LUNES": document.getElementById("horario").rows[5].cells[1].innerHTML = "X";
					break;
					case "MARTES": document.getElementById("horario").rows[5].cells[2].innerHTML = "X";
					break;
					case "MIERCOLES": document.getElementById("horario").rows[5].cells[3].innerHTML = "X";
					break;
					case "JUEVES": document.getElementById("horario").rows[5].cells[4].innerHTML = "X";
					break;
					case "VIERNES": document.getElementById("horario").rows[5].cells[5].innerHTML = "X";
					break;
					case "SABADO": document.getElementById("horario").rows[5].cells[6].innerHTML = "X";
					break;
				}
				break;
				case "14:15": 
				switch (dia) {
					case "LUNES": document.getElementById("horario").rows[6].cells[1].innerHTML = "X";
					break;
					case "MARTES": document.getElementById("horario").rows[6].cells[2].innerHTML = "X";
					break;
					case "MIERCOLES": document.getElementById("horario").rows[6].cells[3].innerHTML = "X";
					break;
					case "JUEVES": document.getElementById("horario").rows[6].cells[4].innerHTML = "X";
					break;
					case "VIERNES": document.getElementById("horario").rows[6].cells[5].innerHTML = "X";
					break;
					case "SABADO": document.getElementById("horario").rows[6].cells[6].innerHTML = "X";
					break;
				}
				break;
				case "15:45": 
				switch (dia) {
					case "LUNES": document.getElementById("horario").rows[7].cells[1].innerHTML = "X";
					break;
					case "MARTES": document.getElementById("horario").rows[7].cells[2].innerHTML = "X";
					break;
					case "MIERCOLES": document.getElementById("horario").rows[7].cells[3].innerHTML = "X";
					break;
					case "JUEVES": document.getElementById("horario").rows[7].cells[4].innerHTML = "X";
					break;
					case "VIERNES": document.getElementById("horario").rows[7].cells[5].innerHTML = "X";
					break;
					case "SABADO": document.getElementById("horario").rows[7].cells[6].innerHTML = "X";
					break;
				}
				break;
				case "17:15": 
				switch (dia) {
					case "LUNES": document.getElementById("horario").rows[8].cells[1].innerHTML = "X";
					break;
					case "MARTES": document.getElementById("horario").rows[8].cells[2].innerHTML = "X";
					break;
					case "MIERCOLES": document.getElementById("horario").rows[8].cells[3].innerHTML = "X";
					break;
					case "JUEVES": document.getElementById("horario").rows[8].cells[4].innerHTML = "X";
					break;
					case "VIERNES": document.getElementById("horario").rows[8].cells[5].innerHTML = "X";
					break;
					case "SABADO": document.getElementById("horario").rows[8].cells[6].innerHTML = "X";
					break;
				}break;
				case "18:45": 
				switch (dia) {
					case "LUNES": document.getElementById("horario").rows[9].cells[1].innerHTML = "X";
					break;
					case "MARTES": document.getElementById("horario").rows[9].cells[2].innerHTML = "X";
					break;
					case "MIERCOLES": document.getElementById("horario").rows[9].cells[3].innerHTML = "X";
					break;
					case "JUEVES": document.getElementById("horario").rows[9].cells[4].innerHTML = "X";
					break;
					case "VIERNES": document.getElementById("horario").rows[9].cells[5].innerHTML = "X";
					break;
					case "SABADO": document.getElementById("horario").rows[9].cells[6].innerHTML = "X";
					break;
				}break;
				case "20:15": 
				switch (dia) {
					case "LUNES": document.getElementById("horario").rows[10].cells[1].innerHTML = "X";
					break;
					case "MARTES": document.getElementById("horario").rows[10].cells[2].innerHTML = "X";
					break;
					case "MIERCOLES": document.getElementById("horario").rows[10].cells[3].innerHTML = "X";
					break;
					case "JUEVES": document.getElementById("horario").rows[10].cells[4].innerHTML = "X";
					break;
					case "VIERNES": document.getElementById("horario").rows[10].cells[5].innerHTML = "X";
					break;
					case "SABADO": document.getElementById("horario").rows[10].cells[6].innerHTML = "X";
					break;
				}
				break;
			}
			calcularHoras();
		}

		function calcularHoras(){
			var tabla = document.getElementById("horario");
			var horasSemana=0;
			var rango;
			var aux;
			var a;
			var b;
			for(i=1 ; i<tabla.rows.length ; i++){
				for(j=1 ; j<7 ; j++){
					if(tabla.rows[i].cells[j].innerHTML == "X"){
						rango = tabla.rows[i].cells[0].innerHTML;
						aux = rango.split("-");
						if(aux.length>1){
							a = moment(new Date("October 13, 2014 " + aux[0]));
							b = moment(new Date("October 13, 2014 " + aux[1]));
							horasSemana += b.diff(a, 'minutes')/60;
							//alert(typeof totalHoras);
						}
					}
				}
			}
			//alert(totalHoras);
			document.getElementById("horasSemana").value = horasSemana;
			document.getElementById("horasTeoricas").value = horasSemana*4/2;
			document.getElementById("horasPracticas").value = horasSemana*4/2;
			document.getElementById("horasMes").value = horasSemana*4;
			document.getElementById("horasAutorizadas").value = horasSemana*4;

			//r.innerHTML = totalHoras;
			//windows.alert("hola");
		}


	</script>
	<script src="js/bootstrap.min.js"></script>

           <!-- Primera columna-->

  <!-- inicio del panel de registro a detalle de horarios en el formulario-->

  <div class="panel panel-primary">
	  <div class="panel-heading">
		  <h3 class="panel-title">Materia Agregada</h3>
	  </div>
	  <div class="panel-body">
		  <div class="container">
			  <div class="row">
				  <div class="col-md-4">
					  <div class="input-group">
						  <span class="input-group-addon" id="basic-addon1">Grupo</span>
						  <input type="text" placeholder="1" aria-describedby="basic-addon1">
					  </div>
				  </div>
				  <div class="col-md-4">
					  <div class="input-group">
						  <span class="input-group-addon" id="basic-addon1">Facultad</span>
						  <input type="text" placeholder="CIENCIAS Y TECNOLOGIA" aria-describedby="basic-addon1">
					  </div>
				  </div>
				  <div class="col-md-4">
					  <div class="input-group">
						  <span class="input-group-addon" id="basic-addon1">Departamento</span>
						  <input type="text" placeholder="INFORMATICA-SISTEMAS" aria-describedby="basic-addon1">
					  </div>
				  </div>
			  </div>
			  <div class="row">
				  <label class="col-md-2 col-form-label">Carrera:</label>
				  <div class="col-md-2">
					  <select class="form-control">
						  <option>INFORMATICA</option>
						  <option>SISTEMAS</option>
					  </select>
				  </div>
				  <label class="col-md-2 col-form-label">Tipo:</label>
				  <div class="col-md-2">
					  <select class="form-control">
						  <option>INVITADO</option>
						  <option>TITULAR</option>
					  </select>
				  </div>
				  <div class="col-md-4">
					  <div class="input-group">
						  <span class="input-group-addon" id="basic-addon1">Nro. Alumnos</span>
						  <input type="NUMBER" aria-describedby="basic-addon1">
					  </div>
				  </div>
			  </div>
			  <div class="row">
				  <label class="col-md-1 col-form-label">Dia:</label>
				  <div class="col-md-1">
					  <select class="form-control">
						  <option>Lunes</option>
						  <option>Martes</option>
						  <option>Miercoles</option>
						  <option>Jueves</option>
						  <option>Viernes</option>
						  <option>Sabado</option>
					  </select>
				  </div>
				  <div class="col-md-2">
					  <div class="input-group">
						  <span class="input-group-addon" id="basic-addon1">Aula</span>
						  <input type="text" aria-describedby="basic-addon1">
					  </div>
				  </div>
				  <div class="col-md-2">
					  <button type="button" class="btn btn-default">-></button>
				  </div>
				  <div class="col-md-6">
					  <table class="table">
						  <thead>
						  <tr>
							  <th>RANGO</th>
							  <th>LU</th>
							  <th>MA</th>
							  <th>MI</th>
							  <th>JU</th>
							  <th>VI</th>
							  <th>SA</th>
						  </tr>
						  </thead>
						  <tbody>
						  </tbody>
					  </table>
				  </div>
			  </div>
			  <div class="row">
				  <label class="col-md-1 col-form-label">Hora Inicio:</label>
				  <div class="col-md-1">
					  <select class="form-control">
						  <option>06:45</option>
						  <option>07:30</option>
						  <option>08:15</option>
						  <option>09:00</option>
						  <option>09:45</option>
						  <option>10:30</option>
						  <option>11:15</option>
						  <option>12:00</option>
						  <option>12:45</option>
						  <option>13:30</option>
						  <option>14:15</option>
						  <option>15:00</option>
						  <option>15:45</option>
						  <option>16:30</option>
						  <option>17:15</option>
						  <option>18:00</option>
						  <option>18:45</option>
						  <option>19:30</option>
						  <option>20:15</option>
						  <option>21:00</option>
					  </select>
				  </div>
				  <label class="col-md-1 col-form-label">Hora Fin:</label>
				  <div class="col-md-1">
					  <select class="form-control">
						  <option>07:30</option>
						  <option>08:15</option>
						  <option>09:00</option>
						  <option>09:45</option>
						  <option>10:30</option>
						  <option>11:15</option>
						  <option>12:00</option>
						  <option>12:45</option>
						  <option>13:30</option>
						  <option>14:15</option>
						  <option>15:00</option>
						  <option>15:45</option>
						  <option>16:30</option>
						  <option>17:15</option>
						  <option>18:00</option>
						  <option>18:45</option>
						  <option>19:30</option>
						  <option>20:15</option>
						  <option>21:00</option>
						  <option>21:45</option>
						  <option>22:30</option>
					  </select>
				  </div>
				  <div class="col-md-2">
					  <button type="button" class="btn btn-default">X</button>
				  </div>
			  </div>
		  </div>
	  </div>
  </div>

  <!-- final de panel de registro a detalle de horarios en el formulario-->



	  <!-- termina segunda columna-->
            <div class="col-xs-4">
                      <label class="control-label col-xs-7" >Hrs. Semana</label>
                      <div class="col-xs-4">
                        <input required type="text" name="NombreProfesional" class="form-control" placeholder="Codigo" id="horasSemana" >
                      </div><div class="clearfix"></div>
                       <label class="control-label col-xs-7">Hrs.teoricas Mes</label>
                      <div class="col-xs-4">
                         <input required type="number" name="NombreProfesional" class="form-control" placeholder="Codigo" id="horasTeoricas">
                      </div><div class="clearfix"></div>
                       <label class="control-label col-xs-7">Hrs.Practicas Mes</label>
                      <div class="col-xs-4">
                         <input required type="text" name="NombreProfesional" class="form-control" placeholder="Codigo" id="horasPracticas">
                      </div><div class="clearfix"></div>
                       <label class="control-label col-xs-7">Hrs. Mes de la Materia</label>
                      <div class="col-xs-4">
                         <input required type="text" name="NombreProfesional" class="form-control" placeholder="Codigo" id="horasMes">
                      </div><div class="clearfix"></div>
                      <label class="control-label col-xs-7">Hrs. Autorizadas Mes</label>
                      <div class="col-xs-4">
                         <input required type="text" name="NombreProfesional" class="form-control" placeholder="Codigo" id="horasAutorizadas">
                      </div><div class="clearfix"></div>
                       <label class="control-label col-xs-7">Exclusividad</label>
                      <div class="col-xs-4">
                         <input required type="number" name="NombreProfesional" class="form-control" placeholder="0" >
                      </div><div class="clearfix"></div>	
                 </div><!-- termina Tercera columna-->
                
<!-- Fin Modulo 1-->

             <div class="clearfix"></div><br>
              <legend><b></b></legend><!--pone una divicion-->
 </div>
       <div class="clearfix"></div><br>      
<!-- Modulo 2-->
 <div class="fondo">
          <!-- Primera tabla-->
             	 <div class="col-xs-6">
             	 	<table class="table table-bordered">
				      <tr class="btn-primary">
				          <th>Materia</th>
				          <th>Horario</th>
				          <th>Eliminar</th>
				          <th>Grupo</th>
				         
				      </tr>
				       <tr>
				          <td>Carlos</td>
				          <td>Peres</td>
				          <td>Segundo Apellido</td>
				          <td>Tiempo</td>
				         
				      </tr>
				      <tr>
				          <td>Antonio</td>
				          <td>Jimenes</td>
				          <td>Segundo Apellido</td>
				          <td>Tiempo</td>
				          
				      </tr>
				       <tr>
					          <td>Antonio</td>
					          <td>Jimenes</td>
					          <td>Segundo Apellido</td>
					          <td>Tiempo</td>
					         
					      </tr>
				      
				    </table>
             	</div>

           <!-- Segunda tabla-->
             	 <div class="col-xs-6">
             	 		<table class="table table-bordered">
				      <tr class="btn-warning">
					       <th>Materia</th>
				          <th>Horario</th>
				          <th>Eliminar</th>
				          <th>Grupo</th>
					      </tr>
					       <tr>
					          <td>Carlos</td>
					          <td>Peres</td>
					          <td>Segundo Apellido</td>
					          <td>Tiempo</td>
					        
					      </tr>
					      <tr>
					          <td>Antonio</td>
					          <td>Jimenes</td>
					          <td>Segundo Apellido</td>
					          <td>Tiempo</td>
					         
					      </tr>
					       <tr>
					          <td>Antonio</td>
					          <td>Jimenes</td>
					          <td>Segundo Apellido</td>
					          <td>Tiempo</td>
					         
					      </tr>

					      
					    </table>

             	 </div>
                  
             <!-- fin de las tablas-->
      </div>
     
  <!-- Fin Modulo 2-->

             <div class="clearfix"></div><br>
             <div class="col-xs-12 active btn-primary">
              <legend><b></b></legend><!--pone una divicion-->
  <!-- Modulo 3-->
             <div class="col-xs-12">
            <legend><b></b></legend><!--pone una divicion-->
                      <!-- Primerra columna del modulo 3-->

                    <div class="col-xs-6">
                    		 <label class="control-label col-xs-2">Docente:</label>
				         <div class="col-xs-6">
						          <select class="form-control" name="Facultad">
						                         <option>Samuel Acha</option>
						                         <option>Bjhhghhh</option>
						                         <option>Chhhhgggg</option>                
						          </select>
				        </div>
						 <div class="col-xs-4">
	                       <label><input type="checkbox"> Horario Oficina</label>
	       				 </div>
	       				 	<div class="clearfix"></div><br>

	       				 	<label class="control-label col-xs-2">Materia:</label>
				         <div class="col-xs-6">
						          <select class="form-control" name="Facultad">
						                         <option>Electrotecnia</option>
						                         <option>Bjhhghhh</option>
						                         <option>Chhhhgggg</option>                
						          </select>
				        </div>
	                     <div class="col-xs-4">
	                         <label><input type="checkbox"> Horario Continuo </label>
	       				 </div>
					</div>

						<!-- segunda columna-->
					<div class="col-xs-6">
							 <label class="control-label col-xs-2">Mañana:</label>
				         <div class="col-xs-4">
						          <select class="form-control" name="Facultad">
						                         <option>6:45</option>
						                         <option>Bjhhghhh</option>
						                         <option>Chhhhgggg</option>                
						          </select>
				        </div>
				              <div class="col-xs-1"> a </div>
						 <div class="col-xs-4">
	                        <select class="form-control" name="Facultad">
						                         <option>8:15</option>
						                         <option>Bjhhghhh</option>
						                         <option>Chhhhgggg</option>                
						          </select>
	       				 </div>
	       				 	<div class="clearfix"></div><br>

	       				 	<label class="control-label col-xs-2">Tarde:</label>
				         <div class="col-xs-4">
						          <select class="form-control" name="Facultad">
						                         <option>12:45 a</option>
						                         <option>Bjhhghhh</option>
						                         <option>Chhhhgggg</option>                
						          </select>
				        </div>
				        				<div class="col-xs-1"> a </div>
	                     <div class="col-xs-4">
	                         <select class="form-control" name="Facultad">
						                         <option>14:15</option>
						                         <option>Bjhhghhh</option>
						                         <option>Chhhhgggg</option>                
						          </select>
	       				 </div>
					</div>
			 </div>
 <!-- fin Modulo 3-->
 <div class="clearfix"></div><br>
  <legend><b></b></legend><!--pone una divicion-->
 <!-- Modulo 4-->
 			<div class="col-xs-12">
 				 <!-- Primera columna-->
 					 	 <div class="col-xs-4">
 					 	 	 <div class="col-xs-6">
 					 	 	 		  <label class="control-label col-xs-6">Hrs. Teorica</label>
				                      <div class="col-xs-6">
				                        <input required type="number" name="NombreProfesional" class="form-control" placeholder="Hrs" >
				                      </div><div class="clearfix"></div>

				                      <label class="control-label col-xs-6">Hrs. Investig</label>
				                      <div class="col-xs-6">
				                        <input required type="number" name="NombreProfesional" class="form-control" placeholder="Hrs." >
				                      </div><div class="clearfix"></div>

				                      <label class="control-label col-xs-6">Hrs. Extencion</label>
				                      <div class="col-xs-6">
				                        <input required type="number" name="NombreProfesional" class="form-control" placeholder="Hrs." >
				                      </div><div class="clearfix"></div>

				                       <label class="control-label col-xs-6">Hrs. Servicio</label>
				                      <div class="col-xs-6">
				                        <input required type="number" name="NombreProfesional" class="form-control" placeholder="Hrs." >
				                      </div><div class="clearfix"></div>
							 </div>

							 <div class="col-xs-6">
							 		  <label class="control-label col-xs-6">Hrs. Practica</label>
				                      <div class="col-xs-6">
				                        <input required type="text" name="NombreProfesional" class="form-control" placeholder="Hrs" >
				                      </div><div class="clearfix"></div>

				                      <label class="control-label col-xs-6">RCF No</label>
				                      <div class="col-xs-6">
				                        <input required type="text" name="NombreProfesional" class="form-control" placeholder="Hrs." >
				                      </div><div class="clearfix"></div>

				                      <label class="control-label col-xs-6">RCF No</label>
				                      <div class="col-xs-6">
				                        <input required type="text" name="NombreProfesional" class="form-control" placeholder="Hrs." >
				                      </div><div class="clearfix"></div>

				                       <label class="control-label col-xs-6">RCF No</label>
				                      <div class="col-xs-6">
				                        <input required type="text" name="NombreProfesional" class="form-control" placeholder="Hrs." >
				                      </div><div class="clearfix"></div>
							 </div>
						</div>

                     <!-- Segunda columna-->
 					 	 <div class="col-xs-5">
 					 	 	 <div class="col-xs-7">
 					 	 	          <label class="control-label col-xs-6">Hrs. Produccion</label>
				                      <div class="col-xs-6">
				                        <input required type="text" name="NombreProfesional" class="form-control" placeholder="Hrs" >
				                      </div><div class="clearfix"></div>

				                      <label class="control-label col-xs-6">Hrs. Servi.Acad</label>
				                      <div class="col-xs-6">
				                        <input required type="text" name="NombreProfesional" class="form-control" placeholder="Hrs." >
				                      </div><div class="clearfix"></div>

				                      <label class="control-label col-xs-6">Hrs. Produc.Acad</label>
				                      <div class="col-xs-6">
				                        <input required type="text" name="NombreProfesional" class="form-control" placeholder="Hrs." >
				                      </div><div class="clearfix"></div>

				                       <label class="control-label col-xs-6">Hrs. Admi.Acad</label>
				                      <div class="col-xs-6">
				                        <input required type="text" name="NombreProfesional" class="form-control" placeholder="Hrs." >
				                      </div><div class="clearfix"></div>

							 </div>

							 <div class="col-xs-5">
							         <label class="control-label col-xs-6">RCF No</label>
				                      <div class="col-xs-6">
				                        <input required type="text" name="NombreProfesional" class="form-control" placeholder="Hrs" >
				                      </div><div class="clearfix"></div>

				                      <label class="control-label col-xs-6">RCF No</label>
				                      <div class="col-xs-6">
				                        <input required type="text" name="NombreProfesional" class="form-control" placeholder="Hrs." >
				                      </div><div class="clearfix"></div>

				                      <label class="control-label col-xs-6">RCF No</label>
				                      <div class="col-xs-6">
				                        <input required type="text" name="NombreProfesional" class="form-control" placeholder="Hrs." >
				                      </div><div class="clearfix"></div>

				                       <label class="control-label col-xs-6">RCF No</label>
				                      <div class="col-xs-6">
				                        <input required type="text" name="NombreProfesional" class="form-control" placeholder="Hrs." >
				                      </div><div class="clearfix"></div>

							 </div>
 					 	 </div>

					<!-- Tercera columna-->
 					 	 <div class="col-xs-3">
 					 	 			 <label class="control-label col-xs-8">Total Hrs. Trabajadas Semana</label>
				                      <div class="col-xs-4">
				                        <input required type="text" name="NombreProfesional" class="form-control" placeholder="Hrs" >
				                      </div><div class="clearfix"></div>

				                     <label class="control-label col-xs-8">Total Hrs. Trabajadas Semana</label>
				                      <div class="col-xs-4">
				                        <input required type="text" name="NombreProfesional" class="form-control" placeholder="Hrs" >
				                      </div><div class="clearfix"></div>

				                      <label class="control-label col-xs-8">Total Hrs. Trabajadas Semana</label>
				                      <div class="col-xs-4">
				                        <input required type="text" name="NombreProfesional" class="form-control" placeholder="Hrs" >
				                      </div><div class="clearfix"></div>

				                      <label class="control-label col-xs-8">Total Hrs. Trabajadas Semana</label>
				                      <div class="col-xs-4">
				                        <input required type="text" name="NombreProfesional" class="form-control" placeholder="Hrs" >
				                      </div><div class="clearfix"></div>

				                     
 					 	 </div>


 			 </div>
<!-- fin Modulo 4-->
<!--  Modulo 5-->
<div class="clearfix"></div><br>
 <legend><b></b></legend><!--pone una divicion-->
<!-- fin Modulo 5-->
			    
			    		<div class="col-xs-12">
			    		 <label class="control-label col-xs-4">Observaciones:</label>
				                      <div class="col-xs-6">
				                        <input required type="text" name="NombreProfesional" class="form-control" placeholder="Comenta" >
				                      </div><div class="clearfix"></div>

			    		</div>
			   <div class="clearfix"></div><br><br>
			    <center>
                        <div class="col-xs-6">
                           <button type="submit" class="btn btn-success active">
                              <span class="glyphicon glyphicon-ok"></span> Registrar
                           </button>
                        </div>
                        <div class="col-xs-6">
                             <button type="reset" class="btn btn-danger active" onclick="location='Principal.php'">
                               <span class="glyphicon glyphicon-remove"></span> Cancelar
                             </button>
                       </div>
                  </center>
              <div class="clearfix"></div><br>
	       		
	   </form>
	 </div>

	
 </div>


</body>

</html>