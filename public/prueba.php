
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
 
       #content {
                position: static;
                top: 0px;
                bottom: 0px;
                right: 12px;
                width: 70%;
            }
            #main {
                margin: 0 auto;
                width: 80%;
                text-align: right
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
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">NOMBRAMIENTO<span class="caret"></span></a>
             <ul class="dropdown-menu">
                 <li><a href="#">MODIFICACION</a></li>
                 <li><a href="registro_nombramiento.php">REGISTRO</a></li>
            
            </ul>
          </li>
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">SEGUIMIENTO<span class="caret"></span></a>
             <ul class="dropdown-menu">
                 <li><a href="busqueda_docente_formulario_seguimiento.php">MODIDFICACION</a></li>
                 <li><a href="registro_seguimiento.php">REGISTRO</a></li>
            
            </ul>
          </li>
        <li><a href="#portfolio">REPORTES</a></li>
        <li><a href="#pricing">HISTORICOS</a></li>
          <li><a href="docente.php">REGISTRAR DOCENTE</a></li>
          <li><a href="reguistrar_materia.php">REGISTRAR MATERIA</a></li>
      </ul>
         <ul class="nav navbar-nav navbar-right">
             <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> cerrar_sesion</a></li>
      </ul>
    </div>
  </div>
</nav>
    
<!-- Sidenav/menu -->
<nav class="w3-sidenav w3-collapse w3-white w3-animate-left" style="z-index:3;width:250px;" id="mySidenav">
    <br>
  <hr>
  <div class="w3-container">
    <h5>APOYO ADMINISTRATIVO</h5>
  </div>
  <a href="#" class="w3-padding-4 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
  <a href="registro.php" class="w3-padding"><i class="fa fa-users fa-fw"></i> REGISTRO </a>
  <a href="#" class="w3-padding"><i class="fa fa-eye fa-fw"></i> inicio</a>
  <a href="#" class="w3-padding"><i class="fa fa-users fa-fw"></i> manual PDF</a>
  <a href="#" class="w3-padding"><i class="fa fa-bullseye fa-fw"></i> manual DOC</a>
  <a href="#" class="w3-padding"><i class="fa fa-diamond fa-fw"></i> contacto</a>
</nav>
    

<div class="jumbotron text-center">
  <h1>SISTEMA DE APOYO ADMINISTRATIVO</h1>
  <p>Sistema de apoyo administrativo en el seguimiento y nombramiento de docentes</p>
  <form class="form-inline">
  </form>
</div>
 <div id="content">
            <div id="main">
   
   <img src="imagen1.jpg" class="img-circle" alt="Cinque Terre" width="550" height="390" >
   
     </div>
    </div>
<!-- Container (Services Section) -->
<div class="container-fluid text-center">
    <h2>SISTEMA DE APOYO ADMINISTRATIVO</h2>
  <h4>Sistema de apoyo administrativo en el seguimiento y nombramiento de docentes</h4>
    <h>COCHABAMABA-BOLIVIA</h>
    </div>
  <br>
  
</body>
</html>

