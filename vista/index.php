<?php

require_once('../modelo/NavesModel.php');
require_once('../controlador/NavesController.php');

$db = new PDO('mysql:host=localhost;dbname=naves_espaciales', 'root', '');
$model = new NavesModel($db);
$controller = new NavesController($model);

if (!empty($_POST['nombre']) && !empty($_POST['sistema_suministro'])) {
   
    $controller->agregarNaveTripulada();

} else if (!empty($_POST['durabilidad']) && !empty($_POST['sistema_comunicacion']) ) {

    $controller->agregarNaveNoTripulada();

} else if (!empty($_POST['sistema_control_vuelo'])) {

    $controller->agregarNaveLanzadera();
}





?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Naves Espaciales Softka</title>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


  <link rel="stylesheet" href="../resources/css/index.css">
  <link rel="stylesheet" href="../resources/css/formulario.css">

</head>

<body>

  <div class="container-fluid text-center mt-5">

    <h1 class="tipo-letra"><strong>✪ Naves Espaciales Softka ✪ </strong> </h1>

    <div class="container mt-5 text-center">
      <div class="row">
        <div class="col-md-4">
          <div class="card fondo-nav" style="width: 18rem;">
            <img src="../images/rocket-g1914b1888_1280.png" class="card-img-top img-nav" alt="...">
           <div class="tipo-letra">
           <strong> <?php if (!empty($_POST['volar'])) {
              echo $controller->vuela();
            }?></strong>
            </div>
            <div class="card-body fondo-body">
              <h5 class="card-title">✪ VEHÍCULOS LANZADERA ✪</h5>

              <div class="text-center">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal3">
                  Crear Nave
                </button>
                <form action="" method="POST">
                  <input type="text" value="volar" name="volar" hidden="true">
                <button type="submit" class="btn btn-primary" >
                  Despegar
                </button>
                </form>
              
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card fondo-nav" style="width: 18rem;">
            <img src="../images/rocket-g73fb2a154_1280.png" class="card-img-top img-nav" alt="...">
            <div class="tipo-letra">
           <strong> <?php if (!empty($_POST['volar2'])) {
              echo $controller->vuela();
            }?></strong>
            </div>
            <div class="card-body fondo-body" style="background: white;">
            
              <h5 class="card-title">✪ NAVES ESPACIALES NO TRIPULADAS ✪</h5>

              <div class="text-center">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                  Crear Nave
                </button>
                <form action="" method="POST">
                  <input type="text" value="volar" name="volar2" hidden="true">
                <button type="submit" class="btn btn-primary" >
                  Despegar
                </button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card fondo-nav" style="width: 18rem;">
            <img src="../images/rocket-gdb33ebdee_1280.png" class="card-img-top img-nav" alt="...">
            <div class="tipo-letra">
           <strong> <?php if (!empty($_POST['volar3'])) {
              echo $controller->vuela();
            }?></strong>
            </div>
            <div class="card-body fondo-body">
              <h5 class="card-title">✪ NAVES ESPACIALES TRIPULADAS ✪</h5>

              <div class="text-center">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  Crear Nave
                </button>
                <form action="" method="POST">
                  <input type="text" value="volar" name="volar3" hidden="true">
                <button type="submit" class="btn btn-primary" >
                  Despegar
                </button>
                </form>
              </div>
            </div>
          </div>
        </div>


      </div>
    </div>
    <h1 class="tipo-letra mt-4"><strong>✪ Consultar o filtrar naves ✪</strong> </h1>
    
    <div class="row">
      <div class="col-md-5">
        <div class="container">]

          <div class="row ">
            <div class="col-lg-7 mx-auto">
              <div class="card mt-2 mx-auto p-4 bg-light">
                <div class="card-body bg-light">

                  <div class="container">
                    <form id="contact-form" role="form" method="POST">
                      <div class="controls">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="form_name">Nombre</label>
                              <input id="form_name" type="text" name="nombreNave" class="form-control"
                                
                                data-error="Firstname is required.">

                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="form_lastname">Fabricante</label>
                              <input id="form_lastname" type="text" name="fabricante" class="form-control"
                                 
                                data-error="Lastname is required.">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="form_need">Ano lanzamiento</label>

                              <input id="form_email" type="date" name="ano_lanzamiento" class="form-control"
                                
                                data-error="Valid email is required.">
                              </select>

                            </div>
                          </div>
                        </div>
                        <div class="row">

                          <div class="col-md-12">

                            <input type="submit" class="btn btn-success btn-send  pt-2 btn-block mt-4" value="Consultar Naves">

                          </div>

                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- /.8 -->
            </div>
            <!-- /.row-->
          </div>
        </div>

      </div>



      <div class="col-md-7">
      <?php


      if (!empty($_POST['nombreNave']) || !empty($_POST['ano_lanzamiento']) || !empty($_POST['fabricante'])) {
        $controller->filtrar();
      
      }
        
      
      
      ?>

      </div>
    </div>




  </div>


  <!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form method="POST">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Nombre</label>
              <input type="text" name="nombre" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Fabricante</label>
              <input type="text" name="fabricante" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Ano lanzamiento</label>
              <input type="date" name="ano_lanzamiento" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Capacidad tripulacion</label>
              <input type="text" name="capacidad_tripulacion" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Sistema suministro</label>
              <input type="text" name="sistema_suministro" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Sistema propulsion</label>
              <input type="text" name="sistema_propulsion" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Equipos medicos</label>
              <input type="text" name="equipo_medico" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Sistema aterrizaje</label>
              <input type="text" name="sistema_aterrizaje" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            </div>

            <div class="text-center ">
              <button type="submit" class="btn btn-primary">Registrar Nave</button>
            </div>

          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>



  <!-- modal naves no tripuladas -->
  <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form method="POST">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Nombre</label>
              <input type="text" name="nombre" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Fabricante</label>
              <input type="text" name="fabricante" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Ano lanzamiento</label>
              <input type="date" name="ano_lanzamiento" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Capacidad mision</label>
              <input type="text" name="capacidad_mision" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Sistema de comunicaciones</label>
              <input type="text" name="sistema_comunicacion" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Sistema control de navegacion</label>
              <input type="text" name="sistema_control" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Durabilidad</label>
              <input type="text" name="durabilidad" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            </div>

            <div class="text-center ">
              <button type="submit" class="btn btn-primary">Registrar Nave</button>
            </div>

          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <!-- modal naves lanzadera -->
  <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form method="POST">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Nombre</label>
              <input type="text" name="nombre" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Fabricante</label>
              <input type="text" name="fabricante" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Ano lanzamiento</label>
              <input type="date" name="ano_lanzamiento" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Capacidad</label>
              <input type="text" name="capacidad" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Sistema de propulsion</label>
              <input type="text" name="sistema_propulsion" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Sistema reentrada</label>
              <input type="text" name="sistema_reentrada" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Sistema aterrizaje</label>
              <input type="text" name="sistema_aterrizaje" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Sistema control de vuelo</label>
              <input type="text" name="sistema_control_vuelo" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            </div>

            <div class="text-center ">
              <button type="submit" class="btn btn-primary">Registrar Nave</button>
            </div>

          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</body>

</html>