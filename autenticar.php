<?php
session_start();
//Conectando a base de datos
$con = new mysqli("localhost", "root", "root","helpdesk");

$qr  = "SELECT u.nom_user, u.passwd, u.nombres, u.apellidos,u.id_rol,r.descripion ";
$qr .= "FROM usuario as u join rol as r on r.id_rol=u.id_rol WHERE nom_user = '" . $_POST['usuario'] . "'";
$qr .= " AND passwd = '" . md5($_POST['contrasena']) . "'";


//Enviar la consulta a la base de datos
$resultado = $con->query($qr);

//Obtener la cantidad de registros
$nr = $resultado->num_rows;

$persona = mysqli_fetch_object($resultado);
/* liberar el conjunto de resultados */
$resultado->close();



if($nr == 1){
    //usuario y contraseña válidos
    //se define una sesion y se guarda el dato session_start();

    $_SESSION["autenticado"] = "si";
    $_SESSION["usuario"] = $_POST['usuario'];
    $_SESSION["nombreusr"] = $persona->nombres . " " . $persona->apellidos;
    $_SESSION['tipoUser'] = $persona->id_rol;
    $_SESSION['puesto'] = $persona->descripion;
    header ("Location: index.php");
}
else if($nr <= 0) {
    //si no existe se va a login.php
    header("Location: login.php?errorusuario=true");
}
?>
