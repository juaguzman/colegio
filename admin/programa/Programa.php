<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Programa
 *
 * @author Fernanda
 */
class Programa {
    //put your code here
    
    var $nombre;
    var $fechaAsignacion;
    var $acreditacion;
    var $numAdmitidos;
    var $idFacultad;
            
    
    function Programa($nombre, $fechaAsignacion, $acreditacion,$numAdmitidos,$idFacultad)
    {
        $this->nombre = $nombre;
        $this->fechaAsignacion = $fechaAsignacion;
        $this->acreditacion = $acreditacion;
        $this->numAdmitidos = $numAdmitidos;
        $this->idFacultad =$idFacultad;
        
    }    
    static function insetarPrograma($pNombre, $pFecha, $pAcreditacion,$pNumAdmitidos,$pIdfacultad)
    {
        include '../conexion.php';
        $mensaje = "resultados: ";
        //Insertar Programa en la BD
        $sql = @mysql_query("INSERT INTO programa(nombre,fechaRegistro,estadoAcreditacion, totalAspirantes, facultad_idfacultad)"
                ."VALUES('$pNombre','$pFecha','$pAcreditacion','$pNumAdmitidos','$pIdfacultad')");
        if (!$sql)
        {
            $mensaje.="error Insertando Programa en la base de datos: ".mysql_error();
        }
        else
            {
            $mensaje.="El Programa con el nombre: ". $pNombre. "fue agregado al sistema";
            }
            return $mensaje;
        }
        
        public function lista_programa($tabla)
        {
            include '../conexion.php';
            $result = mysql_query("SELECT * FROM programa");
            echo "<table border = '3' id=res > \n";
            echo "<tr id=tit><td >&nbsp;ID_PROGRAMA&nbsp;</td><td>&nbsp;NOMBRE&nbsp;</td><td>&nbsp;FECHA REGISTRO&nbsp;</td><td>&nbsp;ACREDITACION&nbsp;</td><td>&nbsp;NUMERO ADMITIDOS&nbsp;</td><td>&nbsp;OPCIONES&nbsp;</td></tr> \n";
            while ($row = mysql_fetch_row($result)) 
                {
                echo "<tr id=resul><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td>". "<td><a href=../programa/procesar_programa.php?req_col=eliminar&id=".$row[0]."><img src=../../img/Colegio/elmn.png width=25px heigt=25px /></a>" 
                    . "&nbsp;&nbsp;&nbsp;  <a href=../programa/modificarPrograma.php?req_col=modificar&id=$row[0]&nombre=".$row[1]."&fechaAsignacion=$row[2]&acreditacion=$row[3] &numAdmitidos=$row[4] &idFacultad=$row[5]> <img src=../../img/Colegio/mdf.png width=25px heigt=25px /></a></td> "  . "</tr> \n";
           // echo "<td><a href=editar_estudiante.php?id=".$row[$campos[0]].">Editar</a></td>";
            
            
                }
            echo "</table> \n";
        }
        
        static function eliminar_programa($id)
        {
            include '../conexion.php';
            $mensaje = "resultados:";
            //Insertar usuario en la BD  
       
            $sql = @mysql_query("delete from programa where idprograma=$id");
            if (!$sql) {
            $mensaje.="Error Eliminando programa en la base de datos: " . mysql_error();
        } 
            else 
                {
            $mensaje.="El colegio con identificacion " . $id . " fue eliminado del sistema";
            
        }
        
        return $mensaje;
       
    }
}

