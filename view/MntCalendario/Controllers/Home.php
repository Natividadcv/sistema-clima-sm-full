<?php
class Home extends Controller
{
    public function __construct() {
        parent::__construct();
    }
    public function index()
    {
        $this->views->getView($this, "index");
    }
    public function registrar()
    {
        if (isset($_POST)) {
            if (empty($_POST['title']) || empty($_POST['start']) || empty($_POST['end']) || empty($_POST['idcliente'])) {
            }else{
                $title = $_POST['title'];
                $start = $_POST['start'];
                $end = $_POST['end'];
                $cliente = $_POST['idcliente'];
                $color = $_POST['color'];
                $id = $_POST['id'];
                if ($id == '') {
                    $data = $this->model->registrar($title, $start, $end, $cliente, $color);
                    if ($data == 'ok') {
                        $msg = array('msg' => 'Evento Registrado', 'estado' => true, 'tipo' => 'success');
                    }else{
                        $msg = array('msg' => 'Error al Registrar', 'estado' => false, 'tipo' => 'danger');
                    }
                } else {
                    $data = $this->model->modificar($title, $start, $end, $cliente, $color, $id);
                    if ($data == 'ok') {
                        $msg = array('msg' => 'Evento Modificado', 'estado' => true, 'tipo' => 'success');
                    } else {
                        $msg = array('msg' => 'Error al Modificar', 'estado' => false, 'tipo' => 'danger');
                    }
                }
                
            }
            echo json_encode($msg);
        }
        die();
    }

    public function listar()
    {
        $data = $this->model->getEventos();
        echo json_encode($data);
        die();
    }

    public function listarCliente()
    {
        $data = $this->model->getCliente();
        echo json_encode($data);
        die();
    }



    public function eliminar($id)
    {
        $data = $this->model->eliminar($id);
        if ($data == 'ok') {
            $msg = array('msg' => 'Evento Eliminado', 'estado' => true, 'tipo' => 'success');
        } else {
            $msg = array('msg' => 'Error al Eliminar', 'estado' => false, 'tipo' => 'danger');
        }
        echo json_encode($msg);
        die();
    }
    public function drag()
    {
        if (isset($_POST)) {
            if (empty($_POST['id']) || empty($_POST['start']) || empty($_POST['end']) || empty($_POST['idcliente'])) {
                $msg = array('msg' => 'Todo los campos son requeridos', 'estado' => false, 'tipo' => 'danger');
            } else {
                $start = $_POST['start'];
                $end = $_POST['end'];
                $cliente = $_POST['idcliente'];
                $id = $_POST['id'];
                $data = $this->model->dragOver($start, $end, $cliente, $id);
                if ($data == 'ok') {
                    $msg = array('msg' => 'Evento Modificado', 'estado' => true, 'tipo' => 'success');
                } else {
                    $msg = array('msg' => 'Error al Modificar', 'estado' => false, 'tipo' => 'danger');
                }
            }
            echo json_encode($msg);
        }
        die();
    }
}
