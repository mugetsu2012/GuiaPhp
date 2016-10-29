<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Help Desk | Login</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/sweet-alert/sweetalert2.min.css">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen  animated fadeInDown">
    <br/>
    <br/>
    <div>
        <div>

            <img src="http://www.freeiconspng.com/uploads/help-desk-icon-png-5.png" height="150" width="150">

        </div>
        <h3>Bienvenido a HelpDesk</h3>
        <p>
            Resolvemos tus problemas de forma rápida y eficiente
        </p>


        <?php
        if(isset($_GET["requireLog"]))
            if($_GET["requireLog"]==true){
                ?>
                <div class="alert alert-danger">
                    Necesita loguearse para ver este contenido
                </div>
                <?php
            }

        ?>


        <?php
            if(isset($_GET["errorusuario"]))
            if($_GET["errorusuario"]==true){
        ?>
        <div class="alert alert-danger">
            Datos incorrectos!
        </div>
            <?php
        }

        ?>

        <form class="m-t" action="autenticar.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="usuario" placeholder="Usuario" required="">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="contrasena" placeholder="Password" required="">
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

            <a href="#"><small>Olvidaste tu password?</small></a>

        </form>

    </div>
</div>

<!-- Mainly scripts -->
<script src="js/jquery-2.1.1.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/sweet-alert/sweetalert2.min.js"></script>
</body>

</html>
