<?php
if(isset($_POST['nombrep']) && isset($_POST['descrip']) && isset($_POST['idPer']) && isset($_POST['nombrerol']) && isset($_POST['rolito']) && isset($_POST['nombreaccion']) && isset($_POST['acciones']))
{
    $con = new mysqli("localhost", "root", "root","helpdesk");
    $nombre = $_POST['nombrep'];
    $descrip = $_POST['descrip'];
    $idPermiso = $_POST['idPer'];
    $rolselect = $_POST['nombrerol'];
    $rolito=$_POST['rolito'];
    $accion=$_POST['nombreaccion'];
    $accionSelect=$_POST['acciones'];

    if ($rolselect!=0 && $accionSelect==0) {
    	 $qr = "UPDATE permiso SET nombre_permiso = '$nombre', descrip_permiso='$descrip_permiso',id_rol='$rolselect',id_accion WHERE id_permiso = '$idPermiso'";
    }elseif ($accionSelect!=0 && $rolselect!=0) {
    	# code...
    }

   

    //Enviar la consulta a la base de datos
    mysqli_query($con,$qr) or die(mysqli_error($con));
    echo '1';
    
}
