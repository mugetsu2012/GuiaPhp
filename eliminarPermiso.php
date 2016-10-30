<?php
if(isset($_POST['idEliminar']))
{
    $con = new mysqli("localhost", "root", "root","helpdesk");
    $permisodel = $_POST['idEliminar'];
    $qr = "DELETE FROM permiso WHERE id_permiso = '".$permisodel."'";

    mysqli_query($con,$qr) or die(mysqli_error($con));
    echo '1';

}