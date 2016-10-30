<?php
$con = new mysqli("localhost", "root", "root","helpdesk");
$qr = "select u.iduser, u.nombres, u.apellidos,u.nom_user,r.descripion from usuario as u
join rol as r on u.id_rol = r.id_rol";

$resultado = mysqli_query($con,$qr);
$totalResults = $resultado->num_rows;
?>


<br />
<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Usuarios existentes cambios Git</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>



                </div>
            </div>
            <div class="ibox-content">

                <table class="table table-bordered">
                    <thead>
                    <tr>

                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Nombre de usuario</th>
                        <th>Grupo</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                        while ($row = mysqli_fetch_array($resultado,MYSQLI_ASSOC))
                        {
                            echo '<tr id="'.'row'.$row['iduser'].'">';
                                echo '<td>'.$row['nombres'].'</td>';
                                echo '<td>'.$row['apellidos'].'</td>';
                                echo '<td>'.$row['nom_user'].'</td>';
                                echo '<td>'.$row['descripion'].'</td>';
                                echo '<td><button type="button" value='.$row['iduser'].' name="deleteBtn" class="btn btn-w-m btn-danger">Eliminar</button></td>';
                                echo '<td><a data-toggle="modal" class="btn btn-w-m btn-info" href='.'#modal-form'.$row['iduser'].'>Editar</a></td>';
                            echo '</tr>';
                        }
                    ?>



                    </tbody>
                </table>

            </div>

        </div>
    </div>
</div>

<?php
$con = new mysqli("localhost", "root", "root","helpdesk");
$qr = "select u.iduser, u.nombres, u.apellidos,u.nom_user,r.descripion from usuario as u
join rol as r on u.id_rol = r.id_rol";

$resultado = mysqli_query($con,$qr);

$totalResults = $resultado->num_rows;

while ($row = mysqli_fetch_array($resultado,MYSQLI_ASSOC))
{
    echo '<div id='.'modal-form'.$row['iduser'].' class="modal fade" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12"><h3 class="m-t-none m-b">Modificar Usuario</h3>

                        <p>Edita los datos del usuario.</p>

                        <form role="form" name="formsModal" id='.'frm'.$row['iduser'].'>
                            <div class="form-group"><label>Nombres</label> <input type="text" value='.$row['nombres'].' name="nombres" class="form-control" required></div>
                            <div class="form-group"><label>Apellidos</label> <input type="text" value='.$row['apellidos'].' name="apellidos" class="form-control" required></div>
                            <input type="hidden" name="idUser" value='.$row['iduser'].'>
                            <div>
                                <button type="button" value='.$row['iduser'].' name="editUser" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>';
}
?>









<script>


    jQuery.validator.addMethod("lettersonly", function(value, element) {
        return this.optional(element) || /^[a-z," "]+$/i.test(value);
    }, "Este campo sólo acepta letras");

    $('[name="formsModal"]').validate({
        rules: {
            nombres: {
                lettersonly: true
            },
            apellidos:
            {
                lettersonly: true
            }
        }
    });
    $('[name="deleteBtn"]').click(function () {
        var self = $(this);
        swal({
            title: 'Confirmación',
            text: "Realmente deseas eliminar este registro?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, elimínalo!'
        }).then(function() {

            $.ajax({
               url: 'eliminarUsuario.php',
                type: 'POST',
                data:{idEliminar : self.val()},
                success: function () {
                    $('#'+'row'+self.val()).remove();
                    swal(
                        'Eliminado!',
                        'El usuario ha sido eliminado',
                        'success'
                    );
                }
            });
            
            

        })
    });




    $('[name="editUser"]').click(function (e) {
       e.preventDefault();
        var self = $(this);

        $.ajax({
           url:'editarUser.php',
            type:'POST',
            data: $('#'+'frm'+self.val()).serialize(),
            success : function (data) {
                if(data == 1)
                {
                    swal(
                        'Modificado!',
                        'El usuario ha sido modificado',
                        'success'
                    );

                    setTimeout(function () {
                        window.location.reload();
                    },1000)
                }
        }

        });


    });
</script>