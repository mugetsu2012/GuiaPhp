<?php
if(isset($_POST['nombre']) && isset($_POST['descrip']) && isset($_POST['idRol']))
{
    $con = new mysqli("localhost", "root", "123456","helpdesk");
    $nombre = $_POST['nombre'];
    $descrip = $_POST['descrip'];
    $idRol = $_POST['idRol'];

    $qr = "UPDATE rol SET nombre = '$nombre', descripion='$descrip' WHERE id_rol= '$idRol'";

    //Enviar la consulta a la base de datos
    mysqli_query($con,$qr) or die(mysqli_error($con));
    echo '1';
    
}
