<?php
    //Se ejecuta si accedemos desde los botones correspondientes
    if(isset($_REQUEST['btnTerminar'])||isset($_REQUEST['btnBorrar'])||isset($_REQUEST['btnDeshacer']))
    {
        //Si accedemos al terminar el pedido desde el carrito
        if(isset($_POST['btnTerminar']))
        {
            //Crea la fecha y la pasa a variable para mostrarla
            date_default_timezone_set('Europe/Madrid');
            $fecha = date("d-m-Y H:i:s");

            //Si la cookie del numero de pedidos no existe se crea y si existe se le suma un pedido más
            if(isset($_COOKIE['numPedidos'])){
                $pedidos = $_COOKIE['numPedidos'] + 1;
                setcookie('numPedidos', $pedidos);
            }else{
                $pedidos = 1;
                setcookie('numPedidos',$pedidos);
            }

            //Terminamos la sesión
            session_start();
            session_unset();
        }
        //Borrar historial
        if(isset($_POST['btnBorrar']))
        {
            $pedidos = 0;
            setcookie('numPedidos',$pedidos);
            $fecha= "No existente";
        }
        //Deshacer último pedido
        if(isset($_POST['btnDeshacer']))
        {
            //Si tenemos más de un pedido hecho le restamos 1
            if($_COOKIE['numPedidos']>1)
            {
                $pedidos = $_COOKIE['numPedidos'] - 1;
                setcookie('numPedidos',$pedidos);
                $fecha = "No existente";
            }
            /*Si tenemos 1 pedido o ya está en 0 por haber borrado el historial se queda en 0
            para evitar errores*/
            else
            {
                $pedidos = 0;
                setcookie('numPedidos',$pedidos);
                $fecha = "No existente";
            }
        }

        //Damos contenido al body con el mensaje informativo y los botones.
        echo "<div class='container'><div class='row'>";
        echo "<div class='col-8 caja'><div class='alert alert-primary' role='alert'>";
        echo "<h1>Historial</h1>";
        echo "Has realizado ".$pedidos." pedidos.<br/> Fecha del último pedido: ".$fecha;
        echo "</div>";
        echo "<form action='pedidos.php' method='post'>";
        echo "<input type='submit' name='btnDeshacer' value='Deshacer última compra' class='btn btn-outline-danger'>";
        echo "</form>";
        echo "<form action='pedidos.php' method='post'>";
        echo "<input type='submit' name='btnBorrar' value='Borrar Historial' class='btn btn-danger'>";
        echo "</form></div></div></div>";
    }
    //Si se accede mediante url se invita a ir a la página de inicio
    else{echo "<h1>¡Dirígete a la página de <a href='inicio.php'>inicio</a> para añadir productos!</h1>";}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Pedidos</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="assets/css/pedidosStyle.css"/>
    </head>
    <body>

    </body>
</html>