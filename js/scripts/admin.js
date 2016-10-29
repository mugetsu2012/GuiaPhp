/**
 * Created by Douglas on 09/10/2016.
 */


$('#crearUsuarios').click(function (e) {
    e.preventDefault();


    $.ajax({
       url: 'controladorAdmin.php',
        type:'POST',
        data: {accion:22},
        success: function (data) {
            if(data == 22)
            {
                $(this).closest('li').attr('class','active');
            }
            window.location.reload();
        },
        error:function () {
            alert('Error!');
        }
    });
})


$('#listarUsuarios').click(function (e) {
    e.preventDefault();


    $.ajax({
        url: 'controladorAdmin.php',
        type:'POST',
        data: {accion:21},
        success: function (data) {
            if(data == 21)
            {
                $(this).closest('li').attr('class','active');
            }
            window.location.reload();
        },
        error:function () {
            alert('Error!');
        }
    });
})
/*HECHO POR FRANKLIN 11/10/2016  COPY$PASTE :V*/
$('#listaroles').click(function (e) {
    e.preventDefault();


    $.ajax({
        url: 'controladorAdmin.php',
        type:'POST',
        data: {accion:41},
        success: function (data) {
            if(data == 41)
            {
                $(this).closest('li').attr('class','active');
            }
            window.location.reload();
        },
        error:function () {
            alert('Error!');
        }
    });
})
$('#creaRol').click(function (e) {
    e.preventDefault();


    $.ajax({
        url: 'controladorAdmin.php',
        type:'POST',
        data: {accion:42},
        success: function (data) {
            if(data == 42)
            {
                $(this).closest('li').attr('class','active');
            }
            window.location.reload();
        },
        error:function () {
            alert('Error!');
        }
    });
})
$('#listaPermiso').click(function (e) {
    e.preventDefault();


    $.ajax({
        url: 'controladorAdmin.php',
        type:'POST',
        data: {accion:51},
        success: function (data) {
            if(data == 51)
            {
                $(this).closest('li').attr('class','active');
            }
            window.location.reload();
        },
        error:function () {
            alert('Error!');
        }
    });
})
$('#creaPermiso').click(function (e) {
    e.preventDefault();


    $.ajax({
        url: 'controladorAdmin.php',
        type:'POST',
        data: {accion:52},
        success: function (data) {
            if(data == 52)
            {
                $(this).closest('li').attr('class','active');
            }
            window.location.reload();
        },
        error:function () {
            alert('Error!');
        }
    });
})