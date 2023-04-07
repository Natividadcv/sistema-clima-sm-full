<?php
    require_once("../../config/conexion.php");
    require_once("../../models/Rol.php");
    $rol = new Rol();
    $datos = $rol->validar_acceso_rol($_SESSION["USU_ID"],"mntcategoria");
    if(isset($_SESSION["USU_ID"])){
        if(is_array($datos) and count($datos)>0){
?>


<!doctype html>
<html lang="es" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">
<head>
    <title>AnderCode | Categoria</title>
    
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/css/main.min.css">
    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/css/propio.css">
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
                                <h4 class="mb-sm-0">Mantenimiento CA</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mantenimiento</a></li>
                                        <li class="breadcrumb-item active">Instalacion Aire</li>
                                    </ol>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="card">

                                <div class="card-header">
                                <h1>Registrar Cita</h1>
                                 <div class="fc-toolbar">
                                <div class="fc-right">
                                    <button id="btnDescargarPDF" class="btn btn-primary">Descargar PDF</button>
                                </div>
                                </div>

                                <select id="month-selector">
  <option value="0">Enero</option>
  <option value="1">Febrero</option>
  <option value="2">Marzo</option>
  <option value="3">Abril</option>
  <option value="4">Mayo</option>
  <option value="5">Junio</option>
  <option value="6">Julio</option>
  <option value="7">Agosto</option>
  <option value="8">Septiembre</option>
  <option value="9">Octubre</option>
  <option value="10">Noviembre</option>
  <option value="11">Diciembre</option>
</select>

<button id="btnDescargarPDFXMes">Descargar PDF</button>







                                </div>

            

                                <div class="card-body">
                                    <!-- TODO: Tabla de Categoria -->
                                     <div class="container">
                                    <div id="calendar"></div>
                                </div>

                               




    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header p-3 bg-soft-info">
                    <h5 class="modal-title" id="titulo">Registro de Eventos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

         



                <form id="formulario" autocomplete="off">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                
                                <div class="form-floating mb-3">
                                    <input type="hidden" id="id" name="id">
                                    <input id="title" type="text" class="form-control" name="title">
                                    <label for="title">Evento</label>
                                </div>

                            </div>

                            <div class="col-md-12">


                                <div class="form-floating mb-3">
                                    <input class="form-control" id="start" type="date" name="start">
                                    <label for="" class="form-label">Hora de inicio Fecha</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input class="form-control" id="end" type="date" name="end">
                                    <label for="" class="form-label">Hora de finalización Fecha</label>
                                </div>


               





                            </div>
                            <div class="col-md-12">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="color" type="color" name="color">
                                    <label for="color" class="form-label">Color</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-danger" id="btnEliminar">Eliminar</button>
                        <button type="submit" class="btn btn-primary" id="btnAccion">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>

      
      <!-- Agregar jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="<?php echo base_url; ?>Assets/js/main.min.js"></script>
    <script src="<?php echo base_url; ?>Assets/js/es.js"></script>
    <script>
        const base_url = '<?php echo base_url; ?>';
    </script>
    <script src="<?php echo base_url; ?>Assets/js/sweetalert2.all.min.js"></script>
    <script src="<?php echo base_url; ?>Assets/js/app.js"></script>

                                    
   









                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <?php require_once("../html/footer.php"); ?>
        </div>

    </div>

  

    <?php require_once("../html/js.php"); ?>
    <script type="text/javascript" src="mntcategoria.js"></script>




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