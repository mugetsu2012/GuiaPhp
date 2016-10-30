<?php
if(isset($_POST['nombres']) && isset($_POST['apellidos']) && isset($_POST['nUser']) &&
    isset($_POST['contra']) && isset($_POST['grupo']))
{
    $con = new mysqli("localhost", "root", "root","helpdesk");

    $roles = array();
    $nombreU = $_POST['nUser'];
    $qr = "SELECT nom_user FROM usuario WHERE nom_user = '".$nombreU."'";

    //Enviar la consulta a la base de datos
    $resultado = mysqli_query($con,$qr);

    //Obtener la cantidad de registros
    $nr = $resultado->num_rows;


    if($nr === 0) //Significa que no hay usuarios con ese nombre user
    {
        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        $nombreU = $_POST['nUser'];
        $contra = md5($_POST['contra']);
        $rol = $_POST['grupo'];
        $qr = "INSERT INTO usuario(nom_user,nombres,apellidos,passwd,id_rol) VALUES('$nombreU','$nombres','$apellidos',md5('$contra'),'$rol')";
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
