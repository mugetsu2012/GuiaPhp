<br />
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Creacion de Permisos en Git</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">

                    </a>


                </div>
            </div>
            <div class="ibox-content">
                <form method="POST" class="form-horizontal" id="frmAddRol">
                    <div class="form-group"><label class="col-sm-2 control-label">Nombre:</label>

                        <div class="col-sm-10"><input type="text" class="form-control" name="nomrol" id="nombreRol" required></div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Descripcion:</label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="descrip" id="descrip" required></div>
                    </div>

                     <div class="form-group"><label class="col-sm-2 control-label">Grupo:</label>

                        <div class="col-sm-3"><select class="form-control m-b" name="grupo" id="rolesSistema">
                                <option value="0">Seleccione un grupo</option>

                            </select>


                        </div>
                    </div>
                     <div class="form-group"><label class="col-sm-2 control-label">Grupo:</label>
                     <div class="col-sm-3"><select class="form-control m-b" name="accion" id="acciones">
                                <option value="0">Seleccione una Accion</option>
                            </select><br>
                        </div>
                        </div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">

                            <button class="btn btn-primary" type="submit" id="btnSaveRol">Guardar Rol</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<script>
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


    $('.logOut').click(function (e) {
        e.preventDefault();

        $.ajax({
            url:'logout.php',
            type: 'post',
            success: function (  ) {
                window.location.href = 'login.php';
            }
        });

    });

    jQuery.validator.addMethod("lettersonly", function(value, element) {
        return this.optional(element) || /^[a-z," "]+$/i.test(value);
    }, "Este campo sólo acepta letras");

    jQuery.validator.addMethod("lettersonlyNs", function(value, element) {
        return this.optional(element) || /^[a-z]+$/i.test(value);
    }, "Este campo adminte solo letras sin espacios");

    $('#frmAddRol').validate({
        rules: {
            nomrol: {
                lettersonly: true
            },
            descrip:
            {
                lettersonly: true
            }
        }
    });

    $('#btnSaveRol').click(function (e) {
        e.preventDefault();
        if($('#frmAddRol').valid())
        {
                
                $.ajax({
                    url: 'agregarRolBase.php',
                    type: 'post',
                    data: $('#frmAddRol').serialize(),
                    success: function (data) {
                        if(data == 1)
                        {
                            swal(
                                'Rol Agregado!',
                                'Se agrego correctamente un Rol!',
                                'success'
                            )
                        }
                        else if(data == 2)
                        {
                            swal(
                                'Oops...',
                                'Ya existe ese Rol, debes elegir otro',
                                'error'
                            )
                        }
                        else if(data == 0)
                        {
                            swal(
                                'Oops...',
                                'Faltan datos!',
                                'error'
                            )
                        }

            },
                    error: function () {

                        swal(
                            'Oops...',
                            'Error en el servidor!',
                            'error'
                        )
                    }
                })
            
        }
        else
        {
            $('#frmAddRol').submit();
        }



    })
</script>