<?php
session_start();
unset($_SESSION['usuario']);
unset($_SESSION['carrito']);
//session_destroy(); //elimina las variables de sesion creadas
header('Location: index.php');