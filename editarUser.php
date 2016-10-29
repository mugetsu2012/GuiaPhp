<?php
if(isset($_POST['nombres']) && isset($_POST['apellidos']) && isset($_POST['idUser']))
{
    $con = new mysqli("localhost", "root", "123456","helpdesk");
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $iduser = $_POST['idUser'];

    $qr = "UPDATE usuario SET nombres = '$nombres', apellidos='$apellidos' WHERE iduser= '$iduser'";

    //Enviar la consulta a la base de datos
    mysqli_query($con,$qr) or die(mysqli_error($con));
    echo '1';
    
}

