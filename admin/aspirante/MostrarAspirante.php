<?php
$id=$_GET['id'];
include ("../conexion.php");

include '../conexioni.php';
        $mysql = new conexioni();
        $mysqli=$mysql->conctar();
        $consulta= "select * from aspirante where identificacion = $id";
        $result   = $mysqli->query($consulta);
        $campos = mysqli_fetch_object($result);

$sql1 ="select * from resultados where identificacion = $id";
$consulta1=  mysql_query($sql1);
$campos1=  mysql_fetch_object($consulta1);
        
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
             <link type="text/css" rel="stylesheet" href="../../css/styleResultados.css">   
             <link type="text/css" rel="stylesheet" href="../../css/styleResul.css">   
        <title> Estudiante</title>
    </head>
     <header>
            <div id="header2" >
               <h5>Universidad la Gorgona</h5> <!-- titulo de la universidad  -->
                <div id="logo">
                     <a href="./"> 
                         <img id="imgRes" src="../../img/logo.png" width="250" height="80"> <!-- logo de la aplicaccion  -->
                         
                    </a>
                </div>
            </div>
    </header>
    <body>
        <table>
            <tbody id="foto">
                
                <tr >
                    <th id="foto">
                        <img src="Fotos/<?php echo $campos->nom_imagen ?>" width="400" height="300"> 
                    </th >
                </tr>
                <tr id="campos">
                    <th >
                        Nombres: <?php echo $campos->nombres ?>
                    </th >
                </tr>
                <tr id="campos">
                    <th >
                        Apellidos: <?php echo $campos->apellidos ?>
                    </th >
                </tr>
                <tr id="campos">
                    <th >
                        Fecha nacimiento: <?php echo $campos->fecha_nacimiento ?>
                    </th >
                </tr>
                <tr id="campos">
                    <th >
                        Lugar de nacimiento: <?php echo $campos->lugar_nacimiento ?>
                    </th >
                </tr>
                <tr id="campos">
                    <th >
                        Genero: <?php echo $campos->genero ?>
                    </th >
                </tr>
                <tr id="campos">
                    <th >
                        Colegio: <?php echo $campos->id_colegio ?>
                    </th >
                </tr>
                <tr id="campos">
                    <th >
                        Promedio Colegio: <?php echo $campos->promedio ?>
                    </th >
                   
                </tr>
                            
            </tbody >                
        </table>
    </body>
</html>
