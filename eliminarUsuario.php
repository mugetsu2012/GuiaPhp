<?php
if(isset($_POST['idEliminar']))
{
    $con = new mysqli("localhost", "root", "root","helpdesk");
    $userDelete = $_POST['idEliminar'];
    $qr = "DELETE FROM usuario WHERE iduser = '".$userDelete."'";

    mysqli_query($con,$qr) or die(mysqli_error($con));
    echo '1';

}