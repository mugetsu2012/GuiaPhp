<?php
if(isset($_POST['nomrol']) && isset($_POST['descrip']))
{
    $con = new mysqli("localhost", "root", "root","helpdesk");

    $roles = array();
    $nombreR = $_POST['nomrol'];
    $qr = "SELECT nombre FROM rol WHERE nombre = '".$nombreR."'";

    //Enviar la consulta a la base de datos
    $resultado = mysqli_query($con,$qr);

    //Obtener la cantidad de registros
    $nr = $resultado->num_rows;


    if($nr === 0) //Significa que no hay roles con ese nombre
    {
        $nomRol = $_POST['nombrol'];
        $descrip = $_POST['descrip'];
        $qr = "INSERT INTO rol(nombre,descripion) VALUES('$nombreR','$descrip')";
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
