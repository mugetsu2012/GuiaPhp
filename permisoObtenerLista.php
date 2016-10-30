<?php



if(isset($_GET['opc']))
{

    if($_GET['opc'] == 1)
    {

        $con = new mysqli("localhost", "root", "root","helpdesk");

        $roles = array();
        $qr = 'SELECT id_permiso,nombre_permiso FROM permiso';

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