<br />
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Creacion de Usuarios con Git</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">

                    </a>


                </div>
            </div>
            <div class="ibox-content">
                <form method="POST" class="form-horizontal" id="frmAddUser">
                    <div class="form-group"><label class="col-sm-2 control-label">Nombres</label>

                        <div class="col-sm-10"><input type="text" class="form-control" name="nombres" id="nombresUser" required></div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Apellidos</label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="apellidos" id="apellidosUser" required></div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Nombre de Usuario</label>

                        <div class="col-sm-3"><input type="text" class="form-control" name="nUser" required></div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Password</label>

                        <div class="col-sm-3"><input type="password" class="form-control" name="contra" required></div>
                    </div>
                    <div class="hr-line-dashed"></div>


                    <div class="form-group"><label class="col-sm-2 control-label">Grupo</label>

                        <div class="col-sm-3"><select class="form-control m-b" name="grupo" id="rolesSistema">
                                <option value="0">Seleccione un grupo</option>

                            </select>


                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">

                            <button class="btn btn-primary" type="submit" id="btnSaveUser">Guardar Usuario</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<script>



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

    $('#frmAddUser').validate({
        rules: {
            nombres: {
                lettersonly: true
            },
            apellidos:
            {
                lettersonly: true
            },
            nUser: {
                lettersonlyNs: true
            },
            contra:
            {
                required: true
            }
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


    $('#btnSaveUser').click(function (e) {
        e.preventDefault();
        if($('#frmAddUser').valid())
        {
            if($('#rolesSistema').find(":selected").val() == 0)
            {
                swal(
                    'Oops...',
                    'Debes seleccionar un grupo para el usuario!',
                    'error'
                )
                return;
            }
            else
            {
                
                $.ajax({
                    url: 'agregarUsuarioBase.php',
                    type: 'post',
                    data: $('#frmAddUser').serialize(),
                    success: function (data) {
                        if(data == 1)
                        {
                            swal(
                                'Usuario Agregado!',
                                'Se agrego correctamente un usuario!',
                                'success'
                            )
                        }
                        else if(data == 2)
                        {
                            swal(
                                'Oops...',
                                'Ya existe alguien con ese nombre de usuario, debes elegir otro',
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
        }
        else
        {
            $('#frmAddUser').submit();
        }



    })
</script>