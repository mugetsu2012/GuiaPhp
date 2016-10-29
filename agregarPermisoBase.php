<?php
if(isset($_POST['nombrePer']) && isset($_POST['descrip']) && isset($_POST['grupo']) && isset($_POST['descrip']) && isset($_POST['accion']) )
{
    $con = new mysqli("localhost", "root", "123456","helpdesk");

    
    $nombreP = $_POST['nombrePer'];

    $qr = "SELECT nombre FROM permiso WHERE nombre = '".$nombreP."'";

    //Enviar la consulta a la base de datos
    $resultado = mysqli_query($con,$qr);

    //Obtener la cantidad de registros
    $nr = $resultado->num_rows;


    if($nr === 0) //Significa que no hay roles con ese nombre
    {
       
        $descrip = $_POST['descrip'];
        $grupo = $_POST['grupo'];
        $accion = $_POST['accion'];
        $qr = "INSERT INTO rol(id_rol,nombre,descripion,id_accion) VALUES('$grupo','$nombreP','$descrip','$accion')";
        $resultado = mysqli_query($con,$qr) or die(mysqli_error($con));
        echo '1';
    }
    else
    {

        mysqli_close($con);
        echo '2';
    }


}
else
{
    echo '0';
}
