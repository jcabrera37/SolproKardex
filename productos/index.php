<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>productos</title>
</head>
<body>
    <div class="container">
        <h1>Productos</h1>
        <form action="" method="post" class="form-control">
            <label for="">Nombre producto</label>
            <input type="text" class="form-control" id="nombre">
            <label for="">Precio producto</label>
            <input type="number" class="form-control" id="precio">
            <label for="">catidad producto</label>
            <input type="numbeer" class="form-control" id="cantidad">
            <br>
            <button type="button" class="btn btn-success" id="agregar">Agregar</button>
            <button type="button" class="btn btn-success" id="guardar">Guradar</button>
        </form>

        <div class="col-12 mt-3" id="productos">
            <table class="table table-striped" id="lista">
                <tr>
                    <td>Nombre</td>
                    <td>Precio</td>
                    <td>cantidad</td>
                    <td>Total</td>
                    <td>Acciones</td>
                </tr>
            </table>
        </div>
    </div>
    
    <div class="col-10 text-right" id="total">

    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="includes/jquery-3.6.0.min.js"></script>
    <script src="app.js"></script>
</body>
</html>