<?php
//Iniciamos sesión
session_start();
    //Se ejecuta solo si accedemos a la página tras añadir un producto en inicio
    if(isset($_REQUEST['btnAgregar']))
    {
        //Añadimos a los arrays de sesión el producto y la cantidad seleccionada
        $_SESSION['producto'][]=$_REQUEST['producto'];
        $_SESSION['cantidad'][]=$_REQUEST['cantidad'];

        //Creamos la tabla
        echo "<table class='table'>";
        echo "<thead class='thead-dark'>";
        echo "<tr>";
        echo "<th scope='col'>Nº</th><th scope='col'>Producto</th><th scope='col'>Cantidad</th><th scope='col'>Precio</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        //Se recorre todo el array de sesión producto para hacer comprobaciones
        for($i=0;$i<count($_SESSION['producto']);$i++)
        {
            //Si no se ha introducido una cantidad, la cantidad es 1.
            if(empty($_SESSION['cantidad'][$i]))
            {
                $_SESSION['cantidad'][$i]=1;
            }
            /*Por cada producto se compara con todos los demás para ver si hay otro igual,
            si lo hay se suma la cantidad al primero y se destruye el último*/
            for($o=0;$o<(count($_SESSION['producto'])-1);$o++)
            {
                //Ejecutar si son el mismo producto pero no consigo mismo
                if($_SESSION['producto'][$i]==$_SESSION['producto'][$o]&&($i!=$o))
                {
                    //Se pasa la cantidad
                    $_SESSION['cantidad'][$o]+=$_SESSION['cantidad'][$i];
                    //Se destruye
                    unset($_SESSION['cantidad'][$i]);
                    unset($_SESSION['producto'][$i]);
                }
            }
            
        }
        //Se vuelve a recorrer cada producto para que se muestre actualizado y en formato tabla
        for($i=0;$i<count($_SESSION['producto']);$i++)
        {
            echo "<tr><th scope='row'>".($i+1)."</th><td>".$_SESSION['producto'][$i]."</td><td>".$_SESSION['cantidad'][$i]."</td><td>".precio($_SESSION['producto'][$i],$_SESSION['cantidad'][$i])." €</td></tr>";
        }
        echo "<tr><th scope='row'>Total</th><td></td><td></td><td>".precioTotal()." €</td></tr>";
        echo "</tbody>";
        echo "</table>";
        echo "<form action='inicio.php' method='post'>";
        echo "<input type='submit' class='btn btn-primary' value='Seguir Comprando'>";
        echo "</form>";
        echo "<form action='pedidos.php' method='post'>";
        echo "<input type='submit' class='btn btn-success' name='btnTerminar' value='Terminar la Compra'>";
        echo "</form>";
    }
    //Si se accede mediante url nos invita a ir a la página de inicio
    else{echo "<h1 style='text-align:center;'>¡Dirígete a la página de <a href='inicio.php'>inicio</a> para añadir productos!</h1>";}

    //Función que calcula el total de todos los precios
    function precioTotal()
    {
        $total=0;
        for($aux=0;$aux<count($_SESSION['producto']);$aux++)
        {
            $total += precio($_SESSION['producto'][$aux],$_SESSION['cantidad'][$aux]);
        }
        return($total);
    }

    //Función que calcula el precio según el producto y la cantidad
    function precio($producto,$cantidad)
    {
        switch($producto)
        {
            case'camiseta': return(3*$cantidad);
            case'pantalón': return(10*$cantidad);
            case'zapatos': return(25*$cantidad);
            case'gorro': return(5*$cantidad);
            case'sudadera': return(7*$cantidad);
            case'falda': return(15*$cantidad);
            case'pulsera': return(1*$cantidad);
            case'collar': return(2*$cantidad);
            case'chanclas': return(4*$cantidad);
            case'chaquetón': return(40*$cantidad);
            default: return(0);
        }
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Carrito</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"/>
    </head>
    <body>
    </body>
</html>