<!DOCTYPE html>
<html>
    <head>
        <title>Inicio</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="assets/css/inicioStyle.css"/>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <form action="carrito.php" method="post">
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label for="seleccion">Selecciona el producto: </label>
                                <select name="producto" id="seleccion" class="form-control">
                                    <option value="camiseta">Camiseta</option>
                                    <option value="pantalón">Pantalón</option>
                                    <option value="zapatos">Zapatos</option>
                                    <option value="gorro">Gorro</option>
                                    <option value="sudadera">Sudadera</option>
                                    <option value="falda">Falda</option>
                                    <option value="pulsera">Pulsera</option>
                                    <option value="collar">Collar</option>
                                    <option value="chanclas">Chanclas</option>
                                    <option value="chaquetón">Chaquetón</option>
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="num">Cantidad: </label>
                                <input type="number" min="1" name="cantidad" class="form-control" id="num">
                            </div>
                        </div>
                        <button type="submit" name="btnAgregar" class="btn btn-primary">Añadir al carrito</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>