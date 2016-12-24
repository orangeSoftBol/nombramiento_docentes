<!DOCTYPE html>
<html lang="en">
<head>
  <title>sistema de apoyo administrativo</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
  .carousel-control.right, .carousel-control.left {
      background-image: none;
      color: #f4511e;
  }
  .carousel-indicators li {
      border-color: #f4511e;
  }
  .carousel-indicators li.active {
      background-color: #f4511e;
  }
  .item h4 {
      font-size: 19px;
      line-height: 1.375em;
      font-weight: 400;
      font-style: italic;
      margin: 70px 0;
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


<div class="jumbotron text-center">
  <h1>SISTEMA DE APOYO ADMINISTRATIVO</h1>
  <p>Sistema de apoyo administrativo en el seguimiento y nombramiento de docentes</p>
</div>
    <div align="center">
        <div class="container">
        <form class="form" role="form" method="post" action="registro_docente.php"> 
            
            <br>
            <div class="form-group">
                <label>Ingresar ci del docente</label>
                <input type="text" name="ci_docente" class="form-control" required="" placeholder="ci_docente"id="ci_docente">
            </div>
            <br>
             <div class="form-group">
                 <label>ingresar nombre del docente</label>
                <input type="e-mail" name="nombre_docente" class="form-control" required="" placeholder="nombre_docente"id="nombre_docente">
            </div>
            <br>
            <div class="form-group">
                <label>ingresar apellido paterno</label>
                <input type="e-mail" name="apellido_p_docente" class="form-control" required="" placeholder="apellido_paterno_docente" id="apellido_p_docente">
            </div>
            <br>
            <div class="form-group">
                <label>ingresar apellido materno</label>
                <input type="password" name="apellido_m_docente" class="form-control" required="" placeholder="apellido_materno_docente" id="apellido_m_docente">
            </div>
            <div class="form-group">
                <label>ingresar estado del docente</label>
                <input type="password" name="estado_docente" class="form-control" required="" placeholder="estado_docente" id="estado_docente">
            </div>
            <div class="form-group">
                <label>ingresar titulo del docente</label>
                <input type="password" name="titulo_docente" class="form-control" required="" placeholder="titulo_docente" id="titulo_docente">
            </div>
            <div class="form-group">
                <label>ingresar tiempo del docente</label>
                <input type="password" name="tiempo_docente" class="form-control" required="" placeholder="tiempo_docente" id="tiempo_docente">
            </div>
            <div class="form-group">
                <label>ingresar titulo del docente</label>
                <input type="password" name="diploma_docente" class="form-control" required="" placeholder="titulo_docente" id="diploma_docente">
            </div>
            <div class="boton">
              <input type="submit" name="Submit" value="REGISTRAR" class="btn btn-lg btn-success btn-block">
            </div>
        </form>
    </div>

    </div>
    
    
    
    <?php     //start php tag
//include connect.php page for database connection
Include('connect.php');
//if submit is not blanked i.e. it is clicked.
if (isset($_REQUEST['Submit'])) //here give the name of your button on which you would like    //to perform action.
{
// here check the submitted text box for null value by giving there name.
	if($_REQUEST['ci_docente']=="" || $_REQUEST['nombre_docente']=="" || $_REQUEST['apellido_p_docente']=="" || $_REQUEST['apellido_m_docente']=="" || $_REQUEST['estado_docente']=="" || $_REQUEST['tiempo_docente']=="" || $_REQUEST['titulo_docente']=="" || $_REQUEST['diploma_docente']=="")
	{
	echo " Field must be filled";
	}
	else
	{
	   $sql12= "select * from docente where ci= '".$_REQUEST['ci_docente']."' &&  nombre ='".$_REQUEST['nombre_docente']."'";
	  $result=mysql_query($sql12)
	    or exit("Sql Error".mysql_error());
	   $num_rows=mysql_num_rows($result);
	   if($num_rows>0)
	   {
//here you can redirect on your file which you want to show after login just change filename ,give it to your filename.
		    ?>
<script type="text/javascript">
    alert("ya tiene registrado el ci y el nombre");
</script>
<?php
 //OR just simply print a message.
         //Echo "You have logged in successfully";	
        }
	    else
		{
			 $sql1= mysql_query("INSERT INTO docente (docente_id,ci,nombre,apellido_paterno,apellido_materno,estado,titulo,tiempo,diploma) VALUES (NULL,'".$_REQUEST['ci_docente']."','".$_REQUEST['nombre_docente']."','".$_REQUEST['apellido_p_docente']."','".$_REQUEST['apellido_m_docente']."','".$_REQUEST['estado_docente']."','".$_REQUEST['titulo_docente']."','".$_REQUEST['tiempo_docente']."','".$_REQUEST['diploma_docente']."' )");
           
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