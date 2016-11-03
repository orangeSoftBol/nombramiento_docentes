<?php
	
/**
*Realiza una actualizacion de los datos del nombramiento del docente elegido de la lista
*e imprime el formulario de solicitud correspondiente.
*/	


/*Se extraeb los datos del formulario y se actualiza la base de datos.
*/
	$nom_doc = $_REQUEST['nom_prof'];
	$facultad = $_REQUEST['fac_doc'];
	$carrera = $_REQUEST['Carr_doc'];
	$departamento = $_REQUEST['dep_doc'];
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
	$asignaturas_asignadas = $_REQUEST['asignatura_docente'];
	$tiempo_de_dedicacion = $_REQUEST['dedicacion'];
	
	//Generacion del documento pdf. 

	//Importacion de la libreria fpdf.
	require('fpdf/fpdf.php');
	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Helvetica','B', 10);
    $pdf->Image('images/formulario.jpg', 0, 0, 215, 'JPG');
  
  	#Area de tatos personales.
    $pdf->Text(65, 65, $nom_doc);
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
	$pdf->Text(42, 143, $asignaturas_asignadas);

	if ($tiempo_de_dedicacion == "parcial") {
		$pdf->Text(115, 150,"X");
	} else {
		$pdf->Text(165, 150,"X");
	}
	$pdf->Output();
	
?>    