<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
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
    <p>registro nombramiento de docentes</p>
</div>
<div align="center">
  <div class="container">
    <form class="form-group" role="form" method="post" > 
      <div class="form-group">
        <label>Ingresar nombre completo</label>
          <input type="text" name="nombre" class="form-control" required="" placeholder="Nombre completo" id="skills">
      </div>
      <br>            
    </form>
  </div>
</div>  


<div class="panel panel-default">
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
            <input type="NUMBER" placeholder="INFORMATICA-SISTEMAS" aria-describedby="basic-addon1">
          </div>
        </div>
      </div>
  </div>
</div>





</body>
</html>