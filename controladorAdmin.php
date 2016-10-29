<?php
session_start();
if(isset($_POST['accion']))
{
    //Se debe crear una lista de acciones representadas por numeros para identificar las acciones
    $accion = $_POST['accion'];

 switch ($accion) {
                case 22:
                    $_SESSION['accion'] = 22;
                    echo $_SESSION['accion'];
                    break;
                 case 21:
                   $_SESSION['accion'] = 21;
                 echo $_SESSION['accion'];
                    break;
                case 41:
                    $_SESSION['accion'] = 41;
                echo $_SESSION['accion'];
                    break;
                case 42:
                   $_SESSION['accion'] = 42;
                echo $_SESSION['accion'];
                    break;
                case 51:
                   $_SESSION['accion'] = 51;
                echo $_SESSION['accion'];
                    break;
                case 52:
                   $_SESSION['accion'] = 52;
                echo $_SESSION['accion'];
                    break;
                default:
                   echo '0';
                    break;
            }

   }