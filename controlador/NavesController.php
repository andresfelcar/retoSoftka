<?php

require_once('../modelo/NavesModel.php');
require_once('../NaveEspacial.php');

class NavesController extends NaveEspacial {
  private $model;

  public function __construct($model) {
    $this->model = $model;
  }

  public function listar() {
    
    $naves = $this->model->listar();
    require_once '../vista/tablaNaves.php';
  }

    public function filtrar()
    {
        
           
            $nombre = $_POST['nombreNave'];
            $anoLanzamiento = $_POST['ano_lanzamiento'];
            $fabricante = $_POST['fabricante'];

            $naves = $this->model->filtrar($nombre, $anoLanzamiento, $fabricante);

            require_once('../vista/tablaNaves.php');
        
    }

  public function agregarNaveTripulada() {
       
    if (isset($_POST['nombre'])) {


      $nombre = $_POST['nombre'];
      $fabricante = $_POST['fabricante'];
      $anoLanzamiento = $_POST['ano_lanzamiento'];
      $capacidadTripulacion = $_POST['capacidad_tripulacion'];
      $sistemaSuministro = $_POST['sistema_suministro'];
      $sistemaPropulsion = $_POST['sistema_propulsion'];
      $equipoMedico = $_POST['equipo_medico'];
      $sistemaAterrizaje = $_POST['sistema_aterrizaje'];
      
      $this->model->agregarNaveTripulada($nombre,$fabricante,$anoLanzamiento,$capacidadTripulacion,
    $sistemaSuministro,$sistemaPropulsion,$equipoMedico,$sistemaAterrizaje);
      header('Location: index.php');
    } else {
      require_once '../vista/index.php';
    }
  }

  public function agregarNaveNoTripulada() {
         
    if (isset($_POST['durabilidad'])) {


      $nombre = $_POST['nombre'];
      $fabricante = $_POST['fabricante'];
      $anoLanzamiento = $_POST['ano_lanzamiento'];
      $capacidadMision = $_POST['capacidad_mision'];
      $sistemaComunicaciones = $_POST['sistema_comunicacion'];
      $sistemaControl = $_POST['sistema_control'];
      $durabilidad = $_POST['durabilidad'];
       
      $this->model->agregarNaveNoTripulada($nombre, $fabricante,$anoLanzamiento,$capacidadMision,$sistemaComunicaciones,$sistemaControl,$durabilidad);
      header('Location: index.php');
    } else {
      require_once '../vista/index.php';
    }
  }

  public function agregarNaveLanzadera() {
         
    if (isset($_POST['sistema_control_vuelo'])) {


      $nombre = $_POST['nombre'];
      $fabricante = $_POST['fabricante'];
      $anoLanzamiento = $_POST['ano_lanzamiento'];
      $capacidad = $_POST['capacidad'];
      $sistemaPropulsion = $_POST['sistema_propulsion'];
      $sistemaReentrada = $_POST['sistema_reentrada'];
      $sistemaAterrizaje = $_POST['sistema_aterrizaje'];
      $sistemaControlVuelo = $_POST['sistema_control_vuelo'];
       
      $this->model->agregarNaveLanzader($nombre, $fabricante,$anoLanzamiento,$capacidad,$sistemaPropulsion,$sistemaReentrada,$sistemaAterrizaje,$sistemaControlVuelo);
      header('Location: index.php');
    } else {
      require_once '../vista/index.php';
    }
  }

  public function editar() {
    if (isset($_POST['submit'])) {
      $id = $_POST['id'];
      $tipo = $_POST['tipo'];
      $caracteristicas = $_POST['caracteristicas'];
      $this->model->editar($id, $tipo, $caracteristicas);
      header('Location: index.php?controller=naves&action=listar');
    } else {
      $id = $_GET['id'];
      $nave = $this->model->obtener($id);
      require_once 'view/naves/editar.php';
    }
  }

  public function eliminar() {
    $id = $_GET['id'];
    $this->model->eliminar($id);
    header('Location: index.php?controller=naves&action=listar');
  }
	/**
	 * @return mixed
	 */
	public function vuela() {
        return  $mensaje = "La Nave Despego De La Tierra";
	}
}
?>
