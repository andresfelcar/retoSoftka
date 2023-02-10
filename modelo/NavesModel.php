<?php

require_once('../modelo/Conexion.php');

class NavesModel {
  private $db;

  public function __construct($db) {
    $this->db = $db;
  }

  public function listar() {
        
    $query = "SELECT * FROM naves_tripuladas";
    $stmt = $this->db->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function filtrar($nombre,$anoLanzamiento,$fabricante) {
    

    if(!empty($fabricante)){
        $query = "SELECT id,nombre,fabricante,ano_lanzamiento FROM naves_tripuladas WHERE fabricante=:fabricante
        UNION
        SELECT id,nombre,fabricante,ano_lanzamiento FROM naves_no_tripuladas WHERE fabricante=:fabricante
        UNION
        SELECT id,nombre,fabricante,ano_lanzamiento FROM vehiculos_lanzadera WHERE fabricante=:fabricante ";
    
    
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':fabricante', $fabricante);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
       
    } else if (!empty($anoLanzamiento)) {
        
            $query = "SELECT id,nombre,fabricante,ano_lanzamiento FROM naves_tripuladas WHERE ano_lanzamiento=:ano_lanzamiento
            UNION
            SELECT id,nombre,fabricante,ano_lanzamiento FROM naves_no_tripuladas WHERE ano_lanzamiento=:ano_lanzamiento
            UNION
            SELECT id,nombre,fabricante,ano_lanzamiento FROM vehiculos_lanzadera WHERE ano_lanzamiento=:ano_lanzamiento ";
        
        
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':ano_lanzamiento', $anoLanzamiento);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } else if (!empty($nombre)) {

            $query = "SELECT id,nombre,fabricante,ano_lanzamiento FROM naves_tripuladas WHERE nombre=:nombre
            UNION
            SELECT id,nombre,fabricante,ano_lanzamiento FROM naves_no_tripuladas WHERE nombre=:nombre
            UNION
            SELECT id,nombre,fabricante,ano_lanzamiento FROM vehiculos_lanzadera WHERE nombre=:nombre ";
        
        
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else if (!empty($nombre) && !empty($anoLanzamiento) && !empty($fabricante)) {
        
            $query = "SELECT id,nombre,fabricante,ano_lanzamiento FROM naves_tripuladas WHERE nombre=:nombre AND fabricante=:fabricante AND ano_lanzamiento=:ano_lanzamiento
            UNION
            SELECT id,nombre,fabricante,ano_lanzamiento FROM naves_no_tripuladas WHERE nombre=:nombre AND fabricante=:fabricante AND ano_lanzamiento=:ano_lanzamiento
            UNION
            SELECT id,nombre,fabricante,ano_lanzamiento FROM vehiculos_lanzadera WHERE nombre=:nombre AND fabricante=:fabricante AND ano_lanzamiento=:ano_lanzamiento ";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':fabricante', $fabricante);
        $stmt->bindParam(':ano_lanzamiento', $anoLanzamiento);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

   
  }

  public function obtener($id) {
    $query = "SELECT * FROM naves WHERE id = :id";
    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function agregarNaveTripulada($nombre, $fabricante,$anoLanzamiento,$capacidadTripulacion,$sistemasuministros,$sistemaPropulsion,$equiposMedicos,$sistemaAterrizaje) {

           $query = "INSERT INTO naves_tripuladas (nombre, fabricante,ano_lanzamiento,capacidad_tripulacion,sistema_suministro,sistema_propulsion,equipos_medicos,sistema_aterrizaje)
            VALUES (:nombre, :fabricante, :ano_lanzamiento, :capacidad_tripulacion, :sistema_suministro, :sistema_propulsion, :equipos_medicos, :sistema_aterrizaje)";
           $stmt = $this->db->prepare($query);
           $stmt->bindParam(':nombre', $nombre);
           $stmt->bindParam(':fabricante', $fabricante);
           $stmt->bindParam(':ano_lanzamiento', $anoLanzamiento);
           $stmt->bindParam(':capacidad_tripulacion', $capacidadTripulacion);
           $stmt->bindParam(':sistema_suministro', $sistemasuministros);
           $stmt->bindParam(':sistema_propulsion', $sistemaPropulsion);
           $stmt->bindParam(':equipos_medicos', $equiposMedicos);
           $stmt->bindParam(':sistema_aterrizaje', $sistemaAterrizaje);
           $stmt->execute();


  }

  public function agregarNaveNoTripulada($nombre, $fabricante,$anoLanzamiento,$capacidadMision,$sistemaComunicaciones,$sistemaControl,$durabilidad) {

       $query = "INSERT INTO naves_no_tripuladas (nombre,fabricante,ano_lanzamiento,capacidad_mision,sistema_comunicaciones,sistema_control_navegacion,durabilidad)
       VALUES (:nombre, :fabricante, :ano_lanzamiento, :capacidad_mision, :sistema_comunicaciones, :sistema_control_navegacion, :durabilidad)";
       $stmt = $this->db->prepare($query);
       $stmt->bindParam(':nombre', $nombre);
       $stmt->bindParam(':fabricante', $fabricante);
       $stmt->bindParam(':ano_lanzamiento', $anoLanzamiento);
       $stmt->bindParam(':capacidad_mision', $capacidadMision);
       $stmt->bindParam(':sistema_comunicaciones', $sistemaComunicaciones);
       $stmt->bindParam(':sistema_control_navegacion', $sistemaControl);
       $stmt->bindParam(':durabilidad', $durabilidad);
       $stmt->execute();

}

    public function agregarNaveLanzader($nombre, $fabricante,$anoLanzamiento,$capacidad,$sistemaPropulsion,$sistemaReentrada,$sistemaAterrizaje,$sistemaControlVuelo)
    {
        $query = "INSERT INTO vehiculos_lanzadera (nombre,fabricante,ano_lanzamiento,capacidad,sistema_propulsion,sistema_reentrada,sistema_aterrizaje,sistema_control_vuelo)
        VALUES (:nombre, :fabricante, :ano_lanzamiento, :capacidad, :sistema_propulsion, :sistema_reentrada, :sistema_aterrizaje, :sistema_control_vuelo)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':fabricante', $fabricante);
        $stmt->bindParam(':ano_lanzamiento', $anoLanzamiento);
        $stmt->bindParam(':capacidad', $capacidad);
        $stmt->bindParam(':sistema_propulsion', $sistemaPropulsion);
        $stmt->bindParam(':sistema_reentrada', $sistemaReentrada);
        $stmt->bindParam(':sistema_aterrizaje', $sistemaAterrizaje);
        $stmt->bindParam(':sistema_control_vuelo', $sistemaControlVuelo);
        $stmt->execute();
    }

  

  public function editar($id, $tipo, $caracteristicas) {
    $query = "UPDATE naves SET tipo = :tipo, caracteristicas = :caracteristicas WHERE id = :id";
    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':tipo', $tipo);
    $stmt->bindParam(':caracteristicas', $caracteristicas);
    $stmt->execute();
  }

  public function eliminar($id) {
    $query = "DELETE FROM naves WHERE id = :id";
    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
  }
}
?>
