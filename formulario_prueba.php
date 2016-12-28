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
	</script>
	<script src="js/bootstrap.min.js"></script>

           <!-- Primera columna-->
          

<!-- termina segunda columna-->
            <div class="col-xs-4">
                      <label class="control-label col-xs-7">Hrs. Semana</label>
                      <div class="col-xs-4">
                        <input required type="text" name="NombreProfesional" class="form-control" placeholder="Codigo" >
                      </div><div class="clearfix"></div>
                       <label class="control-label col-xs-7">Hrs.teoricas Mes</label>
                      <div class="col-xs-4">
                         <input required type="text" name="NombreProfesional" class="form-control" placeholder="Codigo" >
                      </div><div class="clearfix"></div>
                       <label class="control-label col-xs-7">Hrs.Practicas Mes</label>
                      <div class="col-xs-4">
                         <input required type="text" name="NombreProfesional" class="form-control" placeholder="Codigo" >
                      </div><div class="clearfix"></div>
                       <label class="control-label col-xs-7">Hrs. Mes de la Materia</label>
                      <div class="col-xs-4">
                         <input required type="text" name="NombreProfesional" class="form-control" placeholder="Codigo" >
                      </div><div class="clearfix"></div>
                      <label class="control-label col-xs-7">Hrs. Autorizadas Mes</label>
                      <div class="col-xs-4">
                         <input required type="text" name="NombreProfesional" class="form-control" placeholder="Codigo" >
                      </div><div class="clearfix"></div>
                       <label class="control-label col-xs-7">Exclusividad</label>
                      <div class="col-xs-4">
                         <input required type="text" name="NombreProfesional" class="form-control" placeholder="Codigo" >
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
    <script src="../modal/js/jquery.min.js"></script>
    <script src="../modal/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="js/app.js"></script>

</body>

</html>