<?php
if(isset($_GET['opc']))
{

    if($_GET['opc'] == 1)
    {

        $con = new mysqli("localhost", "root", "123456","helpdesk");

        $roles = array();
        $qr = 'SELECT id_rol,descripion FROM rol';

        //Enviar la consulta a la base de datos
        $resultado = mysqli_query($con,$qr);

        //Obtener la cantidad de registros
        $nr = $resultado->num_rows;

        while ($row = mysqli_fetch_assoc($resultado))
        {
            $roles[] = $row;
        }

        mysqli_close($con);
        echo json_encode($roles);
    }
}

