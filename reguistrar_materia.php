<!DOCTYPE html>
<html lang="en">
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
  <style>
  .jumbotron {
      background-color: #f4511e;
      color: #fff;
      padding: 100px 25px;
  }
  .container-fluid {
      padding: 5px 10px;
  }
  .bg-grey {
      background-color: #f6f6f6;
  }
  .logo-small {
      color: #f4511e;
      font-size: 50px;
  }
  .logo {
      color: #f4511e;
      font-size: 200px;
  }
  .thumbnail {
      padding: 0 0 15px 0;
      border: none;
      border-radius: 0;
  }
  .thumbnail img {
      width: 100%;
      height: 100%;
      margin-bottom: 10px;
  }
 
  .item span {
      font-style: normal;
  }
  .panel {
      border: 1px solid #f4511e;
      border-radius:0 !important;
      transition: box-shadow 0.5s;
  }
  .panel:hover {
      box-shadow: 5px 0px 40px rgba(0,0,0, .2);
  }
  .panel-footer .btn:hover {
      border: 1px solid #f4511e;
      background-color: #fff !important;
      color: #f4511e;
  }
  .panel-heading {
      color: #fff !important;
      background-color: #f4511e !important;
      padding: 25px;
      border-bottom: 1px solid transparent;
      border-top-left-radius: 0px;
      border-top-right-radius: 0px;
      border-bottom-left-radius: 0px;
      border-bottom-right-radius: 0px;
  }
  .panel-footer {
      background-color: white !important;
  }
  .panel-footer h3 {
      font-size: 32px;
  }
  .panel-footer h4 {
      color: #aaa;
      font-size: 14px;
  }
  .panel-footer .btn {
      margin: 15px 0;
      background-color: #f4511e;
      color: #fff;
  }
  .navbar {
      margin-bottom: 0;
      background-color: black;
      z-index: 9999;
      border: 0;
      font-size: 12px !important;
      line-height: 1.42857143 !important;
      letter-spacing: 4px;
      border-radius: 0;
  }
      

ul.dropdown-menu {
    background-color: black;
}


  .navbar li a, .navbar .navbar-brand {
      color: #fff !important;
  }
 
      .form-group{
          width: 50%;
          
      }
      .boton{
          width: 20%;
          
      }
      
  .navbar-nav li a:hover, .navbar-nav li.active a {
      color: #f4511e !important;
      background-color: #fff !important;
  }
  .navbar-default .navbar-toggle {
      border-color: transparent;
      color: #fff !important;
  }
  @media screen and (max-width: 768px) {
    .col-sm-4 {
      text-align: center;
      margin: 25px 0;
    }
  }
  </style>
</head>
<body>
     <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#myPage">ORANGESOFT</a>
    </div>
      <ul class="nav navbar-nav navbar-right">
             <li><a href="prueba.php"><span class="glyphicon glyphicon-log-in"></span> pagina_anterior</a></li>
      </ul>
        </div>
    </nav>
<div class="jumbotron text-center">
  <h1>SISTEMA DE APOYO ADMINISTRATIVO</h1>
  <p>Sistema de apoyo administrativo en el seguimiento y nombramiento de docentes</p>
    <h2> Registro Materia </h2>
</div>
      <div align="center">
 
    <div>
         <form action="reguistrar_materia" method="post" role="form" id="materia-form" class="form-horizontal">
             <div class="form-group">
                 <label class="col-xs-3 col-form-label">ID materia:</label>
                 <div class="col-xs-6">
                     <input type="text" id="id_materia" name="id_materia" class="form-control" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                 </div>
             </div>
             <br>
             <div class="form-group">
                 <label class="col-xs-3 col-form-label">Nombre:</label>
                 <div class="col-xs-6">
                     <input type="text" id="nombre_materia" name="nombre_materia" class="form-control" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                 </div>
             </div>
             <br>
             <div class="form-group">
                 <label class="col-xs-3 col-form-label">Sigla:</label>
                 <div class="col-xs-6">
                     <input type="text" id="sigla_materia" name="sigla_materia" class="form-control" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                 </div>
             </div>
             <br>
             <div class="form-group">
                 <label class="col-xs-3 col-form-label">Tipo:</label>
                 <div class="col-xs-6">
                     <select name="tipo" id="tipo" class="form-control">
                         <option value="activo">CURRICULAR</option>
                     </select>
                 </div>
             </div>
             <br>
             <div class="form-group">
                 <label class="col-xs-3 col-form-label">Estado:</label>
                 <div class="col-xs-6">
                     <select name="estado" id="estado" class="form-control">
                         <option value="activo">ACTIVO</option>
                     </select>
                 </div>
             </div>
             <div class="form-group">
                 <label class="col-xs-3 col-form-label">Estado_seguimiento:</label>
                 <div class="col-xs-6">
                     <select name="estado_seguimiento" id="estado_seguimiento" class="form-control">
                         <option value="activo">SI</option>
                         <option value="activo">NO</option>
                     </select>
                 </div>
             </div>
             
             
              <div class="boton">
              <input type="submit" name="Submit" value="REGISTRAR" class="btn btn-lg btn-success btn-block">
            </div>
         </form>
     </div>
 </div>
    
    
    <?php    
Include('connect.php');

if (isset($_REQUEST['Submit'])) 
{

	if($_REQUEST['nombre_materia']=="" || $_REQUEST['id_materia']=="" || $_REQUEST['sigla_materia']=="")
	{
	echo " Field must be filled";
	}
	else
	{
	   $sql12= "select * from materia where materia_id= '".$_REQUEST['id_materia']."' &&  sigla ='".$_REQUEST['sigla_materia']."'";
	  $result=mysql_query($sql12)
	    or exit("Sql Error".mysql_error());
	   $num_rows=mysql_num_rows($result);
	   if($num_rows>0)
	   {

		    ?>
<script type="text/javascript">
    alert("ya tiene registrado el el nombre y la sigla");
</script>
<?php

        }
	    else
		{
			 $sql1= mysql_query("INSERT INTO materia (materia_id,nombre,sigla,tipo,estado,seguimiento_nombramiento) VALUES ( '".$_REQUEST['id_materia']."','".$_REQUEST['nombre_materia']."','".$_REQUEST['sigla_materia']."','".$_REQUEST['tipo']."','".$_REQUEST['estado']."','".$_REQUEST['estado_seguimiento']."')");
           
                 ?>
<script type="text/javascript">
    alert("se ha registrado exitosamente");
</script>
<?php
                
                
            
		}
	}
}	
?>
</body>
</html>
