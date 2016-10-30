<?php
$con = new mysqli("localhost", "root", "root","helpdesk");
$qr = "select id_rol, nombre, descripion from rol";

$resultado = mysqli_query($con,$qr);
$totalResults = $resultado->num_rows;
?>


<br />
<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Roles existentes </h5>
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

                        <th>Rol</th>
                        <th>Descripcion</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                        while ($row = mysqli_fetch_array($resultado,MYSQLI_ASSOC))
                        {
                            echo '<tr id="'.'row'.$row['id_rol'].'">';
                                echo '<td>'.$row['nombre'].'</td>';
                                echo '<td>'.$row['descripion'].'</td>';
                                echo '<td><button type="button" value='.$row['id_rol'].' name="deleteBtn" class="btn btn-w-m btn-danger">Eliminar</button></td>';
                                echo '<td><a data-toggle="modal" class="btn btn-w-m btn-info" href='.'#modal-form'.$row['id_rol'].'>Editar</a></td>';
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
$qr = "select u.id_rol, u.nombre, u.descripion from rol as u";

$resultado = mysqli_query($con,$qr);

$totalResults = $resultado->num_rows;

while ($row = mysqli_fetch_array($resultado,MYSQLI_ASSOC))
{
    echo '<div id='.'modal-form'.$row['id_rol'].' class="modal fade" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12"><h3 class="m-t-none m-b">Modificar Rol</h3>

                        <p>Edita los datos del rol.</p>

                        <form role="form" name="formsModal" id='.'frm'.$row['id_rol'].'>
                            <div class="form-group"><label>Nombre: </label> <input type="text" value='.$row['nombre'].' name="nombre" class="form-control" required></div>
                            <div class="form-group"><label>Descripcion: </label> <input type="text" value='.$row['descripion'].' name="descrip" class="form-control" required></div>
                            <input type="hidden" name="idRol" value='.$row['id_rol'].'>
                            <div>
                                <button type="button" value='.$row['id_rol'].' name="editrol" class="btn btn-primary">Guardar</button>
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
            nombre: {
                lettersonly: true
            },
            descrip:
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
               url: 'eliminarRol.php',
                type: 'POST',
                data:{idEliminar : self.val()},
                success: function () {
                    $('#'+'row'+self.val()).remove();
                    swal(
                        'Eliminado!',
                        'El Rol ha sido eliminado',
                        'success'
                    );
                }
            });
            
            

        })
    });




    $('[name="editrol"]').click(function (e) {
       e.preventDefault();
        var self = $(this);

        $.ajax({
           url:'editarRol.php',
            type:'POST',
            data: $('#'+'frm'+self.val()).serialize(),
            success : function (data) {
                if(data == 1)
                {
                    swal(
                        'Modificado!',
                        'El Rol ha sido modificado',
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