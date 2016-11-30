<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>PHP Login Form</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/main.css">
<style>
    .jumbotron {
      background-color: #f4511e;
      color: #fff;
      padding: 60px 25px;
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
    .boton{
          width: 20%;
          
      }
    }
    </style>

</head>
<!-- NAVBAR
================================================== -->

<body>
<div class="jumbotron text-center">
  <h1>SISTEMA DE APOYO ADMINISTRATIVO</h1>
  <p>Sistema de apoyo administrativo en el seguimiento y nombramiento de docentes</p>
    <h2>por favor ingresar datos</h2>
    <div align="center">
<div class="container">
  <div class="row" style="margin-top:20px">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
      <form name="form_login" method="post" action="login.php" role="form">
        <fieldset>
          <div class="form-group">
            <input name="user_id" type="text" id="user_id" class="form-control input-lg" placeholder="Nombre del usuario">
          </div>
          <div class="form-group">
            <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Contraseña">
          </div>
          <input type="checkbox" name="remember_me" id="remember_me" checked="checked" class="hidden">
          <div class="row">
            <div class="boton">
              <input type="submit" name="Submit" value="INGRESAR" class="btn btn-lg btn-success btn-block">
            </div>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</div>
    </div>
    </div>
    <div id="content">
            <div id="main">
   
   <img src="imagen1.jpg" class="img-circle" alt="Cinque Terre" width="550" height="390" >
   
     </div>
    </div>
    <div class="container-fluid text-center">
    <h2>SISTEMA DE APOYO ADMINISTRATIVO</h2>
  <h4>Sistema de apoyo administrativo en el seguimiento y nombramiento de docentes</h4>
    <h>COCHABAMABA-BOLIVIA</h>
    </div>


<?php     //start php tag
//include connect.php page for database connection
Include('connect.php');
//if submit is not blanked i.e. it is clicked.
if (isset($_REQUEST['Submit'])) //here give the name of your button on which you would like    //to perform action.
{
// here check the submitted text box for null value by giving there name.
	if($_REQUEST['user_id']=="" || $_REQUEST['password']=="")
	{
	echo " Field must be filled";
	}
	else
	{
	   $sql1= "select * from secretaria where usuario= '".$_REQUEST['user_id']."' &&  password ='".$_REQUEST['password']."'";
	  $result=mysql_query($sql1)
	    or exit("Sql Error".mysql_error());
	    $num_rows=mysql_num_rows($result);
	   if($num_rows>0)
	   {
//here you can redirect on your file which you want to show after login just change filename ,give it to your filename.
		   header("location:prueba.php"); 
 //OR just simply print a message.
         //Echo "You have logged in successfully";	
        }
	    else
		{
			//echo "username or password incorrect";
		}
	}
}	
?>


</body>
</html>
