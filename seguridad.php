<?php

    if($_SESSION["autenticado"] != "si")//Si no esta autenticado
    {
        header("Location: login.php?requireLog=true");
    }