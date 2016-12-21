<?php
	
/**
*Realiza una actualizacion de los datos del nombramiento del docente elegido de la lista
*e imprime el formulario de solicitud correspondiente.
*/	
	

	#Importacion de la clase que contiene la coneccion a la base de datos.
	require('class/database.php');

/*Se extraen los datos del formulario y se actualiza la base de datos.
*/
	$objData = new Database();
	$consulta = $objData->prepare('SELECT NOMBRE FROM nombra_doc WHERE CODIGO = :codigo');
	$consulta->bindParam(':codigo', $_REQUEST['lista_de_docentes']);
	$consulta->execute();
	$result2 = $consulta->fetchAll();
	$nombre_docente = $result2[0]['NOMBRE'];
	$facultad = $_REQUEST['lista_facultades'];
	$carrera = $_REQUEST['lista_carreras'];
	$departamento = $_REQUEST['lista_departamentos'];
	$titulo_prof = $_REQUEST['tit_doc'];
	$diploma_academico = $_REQUEST['dip_ac_doc'];
	
	if (isset($_REQUEST['interino'])) {

		$cat_interino = "X ";
	} else {
		$cat_interino = "  ";
	}

	if (isset($_REQUEST['invitado'])) {

		$cat_invitado = "X ";
	} else {
		$cat_invitado = "  ";
	}

	if (isset($_REQUEST['asistente'])) {

		$cat_asistente = "X ";
	} else {
		$cat_asistente = "  ";
	}

	if (isset($_REQUEST['adjunto'])) {

		$cat_adjunto = "X ";
	} else {
		$cat_adjunto = "  ";
	}

	if (isset($_REQUEST['catedratico'])) {

		$cat_catedratico = "X ";
	} else {
		$cat_catedratico = "  ";
	}

	$fecha_de_inicio = $_REQUEST['fecha_inicio'];
	$fecha_de_solicitud = $_REQUEST['fecha_solicitud'];
	$tiempo_de_duracion_nombramiento = $_REQUEST['tiempo'];
	$tiempo_de_dedicacion = $_REQUEST['dedicacion'];
	
	//Generacion del documento pdf. 

	//Importacion de la libreria fpdf.
	require('fpdf/fpdf.php');
	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Helvetica','B', 10);
    $pdf->Image('images/formulario.jpg', 0, 0, 215, 'JPG');
  
  	#Area de tatos personales.
  	$pdf->Text(90, 68, $nombre_docente);
    $pdf->Text(100, 78, $carrera);
    $pdf->Text(50, 91, $facultad);
    $pdf->Text(60, 85, $departamento);
    $pdf->Text(110, 105, $titulo_prof);
    $pdf->Text(70, 98, $diploma_academico);

    #Area de categoria de solicitud.
    $pdf->Text(84, 118, $cat_interino);
    $pdf->Text(84, 122, $cat_invitado);
    $pdf->Text(145, 118, $cat_asistente);
    $pdf->Text(145, 122, $cat_adjunto);
    $pdf->Text(145, 126, $cat_catedratico);

    #Fecha de solicitud
	$pdf->Text(84, 159, $fecha_de_inicio);
	$pdf->Text(68, 176, $fecha_de_solicitud);
	$pdf->Text(105, 168, $tiempo_de_duracion_nombramiento);

	#Asignaturas asignadas.
	#$pdf->Text(42, 143, $asignaturas_asignadas);

	if ($tiempo_de_dedicacion == "parcial") {
		$pdf->Text(115, 150,"X");
	} else {
		$pdf->Text(165, 150,"X");
	}
	$pdf->Output();

	#Actualizar la base de datos.
	if ($cat_asistente == "X ") {
		$cat_asistente = 'S';

	} else {
		$cat_asistente = 'N';
	}

	if ($cat_interino == "X ") {
		$cat_interino = 'S';

	} else {
		$cat_interino = 'N';
	}

	if ($cat_invitado == "X ") {
		$cat_invitado = 'S';

	} else {
		$cat_invitado = 'N';
	}

	if ($cat_adjunto == "X ") {
		$cat_adjunto = 'S';

	} else {
		$cat_adjunto = 'N';
	}

	if ($cat_catedratico == "X ") {
		$cat_catedratico = 'S';

	} else {
		$cat_catedratico = 'N';
	}
	$consulta1 = $objData->prepare('UPDATE nombra_doc, categoria_doc SET CARRERA = :carrera, FACULTAD = :facultad, DEPARTAMENTO = :departamento, TIEMPO = :tiempo, FECHA_NOM = :fecha_nom, FECHA_SOL = :fecha_solicitud, DURACION = :duracion, INTERNO = :interno, INVITADO = :invitado, ASISTENTEA = :asistente, ADJUNTOB =:adjunto, CATEDRATICOC = :catedratico WHERE CODIGO = :codigo AND CODIGO = FK_NOMBRA_DOC');
	$consulta1->bindParam(':carrera', $carrera);
	$consulta1->bindParam(':facultad', $facultad);
	$consulta1->bindParam(':departamento', $departamento);
	$consulta1->bindParam(':tiempo', $tiempo_de_dedicacion);
	$consulta1->bindParam(':fecha_nom', $fecha_de_inicio);
	$consulta1->bindParam(':fecha_solicitud', $fecha_de_solicitud);
	$consulta1->bindParam(':duracion', $tiempo_de_duracion_nombramiento);
	$consulta1->bindParam(':interno', $cat_interino);
	$consulta1->bindParam(':invitado', $cat_invitado);
	$consulta1->bindParam(':asistente', $cat_asistente);
	$consulta1->bindParam(':adjunto', $cat_adjunto);
	$consulta1->bindParam(':catedratico', $cat_catedratico);
	$consulta1->bindParam(':codigo', $_REQUEST['lista_de_docentes']);
	$consulta1->execute();
?>