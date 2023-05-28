/* Este es un código PHP que muestra una lista de ventas en una página web. Primero incluye los
archivos necesarios para la conexión a la base de datos y el modelo Rol. Luego verifica si el
usuario tiene acceso para ver la lista de ventas al validar su ID de usuario y rol. Si el usuario
tiene acceso, muestra el código HTML para la página de la lista de ventas, que incluye una tabla con
columnas para la información de ventas, como el número de documento, el nombre del cliente, el
método de pago y el monto total. También incluye código JavaScript para manejar los datos de la
tabla. Si el usuario no tiene acceso, lo redirige a una página de error 404. */
<?php
    require_once("../../config/conexion.php");
    require_once("../../models/Rol.php");
    $rol = new Rol();
    $datos = $rol->validar_acceso_rol($_SESSION["USU_ID"],"listventa");
    if(isset($_SESSION["USU_ID"])){
        if(is_array($datos) and count($datos)>0){
?>

<!doctype html>
<html lang="es" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">
<head>
    <title>Clima Cool | Listado de Venta</title>
    <?php require_once("../html/head.php"); ?>
</head>

<body>

    <div id="layout-wrapper">

        <?php require_once("../html/header.php"); ?>

        <?php require_once("../html/menu.php"); ?>

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Listado de Venta</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Listado</a></li>
                                        <li class="breadcrumb-item active">Venta</li>
                                    </ol>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="card">

                                <div class="card-body">
                                    <table id="table_data" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Nro</th>
                                                <th>Doc.</th>
                                                <th>NIT</th>
                                                <th>Cliente</th>
                                                <th>Pago</th>
                                                <th>Moneda</th>
                                                <th>SubTotal</th>
                                                <th>IVA</th>
                                                <th>Total</th>
                                                <th>Usuario</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <?php require_once("../html/footer.php"); ?>
        </div>

    </div>

    <?php require_once("mantenimiento.php"); ?>

    <?php require_once("../html/js.php"); ?>
    <script type="text/javascript" src="listventa.js"></script>
</body>

</html>
<?php
        }else{
            header("Location:".Conectar::ruta()."view/404/");
        }
    }else{
        header("Location:".Conectar::ruta()."view/404/");
    }
?>