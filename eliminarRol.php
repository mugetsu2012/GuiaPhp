<?php
if(isset($_POST['idEliminar']))
{
    $con = new mysqli("localhost", "root", "root","helpdesk");
    $roldelete = $_POST['idEliminar'];
    $qr = "DELETE FROM rol WHERE id_rol = '".$roldelete."'";

    mysqli_query($con,$qr) or die(mysqli_error($con));
    echo '1';

}