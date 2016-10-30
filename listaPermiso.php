<?php
$con = new mysqli("localhost", "root", "root","helpdesk");
$qr = "select p.id_permiso, p.nombre_permiso,  p.descrip_permiso,r.nombre,a.nombre_accion from permiso as p
join rol as r on p.id_rol = r.id_rol join accion as a on p.id_accion=a.id_accion";

$resultado = mysqli_query($con,$qr);
$totalResults = $resultado->num_rows;
?>


<br />
<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Permisos existentes </h5>
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

                        <th>Permiso</th>
                        <th>Descripcion</th>
                        <th>Rol Asociado</th>
                        <th>Accion Asociada</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                        while ($row = mysqli_fetch_array($resultado,MYSQLI_ASSOC))
                        {
                            echo '<tr id="'.'row'.$row['id_permiso'].'">';
                                echo '<td>'.$row['nombre_permiso'].'</td>';
                                echo '<td>'.$row['descrip_permiso'].'</td>';
                                echo '<td>'.$row['nombre'].'</td>';
                                echo '<td>'.$row['nombre_accion'].'</td>';
                                echo '<td><button type="button" value='.$row['id_permiso'].' name="deleteBtn" class="btn btn-w-m btn-danger">Eliminar</button></td>';
                                echo '<td><a data-toggle="modal" class="btn btn-w-m btn-info" href='.'#modal-form'.$row['id_permiso'].'>Editar</a></td>';
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
$qr = "select p.id_permiso, p.nombre_permiso,  p.descrip_permiso,r.nombre,a.nombre_accion from permiso as p
join rol as r on p.id_rol = r.id_rol join accion as a on p.id_accion=a.id_accion";
$resultado = mysqli_query($con,$qr);

$totalResults = $resultado->num_rows;

while ($row = mysqli_fetch_array($resultado,MYSQLI_ASSOC))
{
    echo '<div id='.'modal-form'.$row['id_permiso'].' class="modal fade" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12"><h3 class="m-t-none m-b">Modificar Permiso</h3>
                        <p>Edita los datos del Permiso.</p>
                        <form role="form" name="formsModal" id='.'frm'.$row['id_permiso'].'>
                            <div class="form-group"><label>Permiso: </label> <input type="text" value='.$row['nombre_permiso'].' name="nombrep" class="form-control" required></div>
                            <div class="form-group"><label>Descripcion: </label> <input type="text" value='.$row['descrip_permiso'].' name="descrip" class="form-control" required></div><br>
                             <div class="form-group"><label>Rol: </label> <input type="text" value='.$row['nombre'].' name="nombrerol" class="form-control" disabled required></div>
                              <div class="col-sm-3"><select class="form-control m-b" name="rolito" id="rolesSistema">
                                <option value="0">Seleccione un Rol:</option>
                            </select>
                        </div>
                              <div class="form-group">
                              <br><br><br><label>Accion: </label> <input type="text" value='.$row['nombre_accion'].' name="nombreaccion" class="form-control" required disabled></div>
                             
                               <div class="col-sm-3"><select class="form-control m-b" name="accion" id="acciones">
                                <option value="0">Seleccione una Accion</option>
                            </select><br>
                        </div>
                            <input type="hidden" name="idPer" value='.$row['id_permiso'].'>
                            <div>
                                <br><br><br><button type="button" value='.$row['id_permiso'].' name="editPer" class="btn btn-primary">Guardar</button>
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
            nombrep: {
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
                        'El Permiso ha sido eliminado',
                        'success'
                    );
                }
            });
            
            

        })
    });
// LLENANDO SELECT
$.ajax({
            url: 'funciones.php',
            type: 'get',
            data: {opc : 1},
        success: function (data) {
        var opts = $.parseJSON(data);
        $.each(opts, function(i,d)
        {
            $('#rolesSistema').append('<option value="' + d.id_rol + '">' + d.descripion + '</option>');
        });
    }

    });
$.ajax({
            url: 'permisoObtenerLista.php',
            type: 'get',
            data: {opc : 1},
        success: function (data) {
        var opts = $.parseJSON(data);
        $.each(opts, function(i,d)
        {
            $('#acciones').append('<option value="' + d.id_permiso + '">' + d.nombre_permiso + '</option>');
        });
    }

    });


//EDITANDO
    $('[name="editPer"]').click(function (e) {
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