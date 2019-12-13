<?php 
require_once("../../Modelos/Conexion.php");
class Equipo {

    public function obtenerEquipos($inicio, $final) {
        $conexion = new Conexion();
        $db = $conexion->conectar();
        $sql = "SELECT codigo, categoria, nombre,disponibilidad, cantidad,full_name AS encargado, email, s.sede as sede, unidad_facultad as facultad, e.created_at, e.updated_at FROM equipos e LEFT JOIN sedes s ON e.sede = s.id LEFT JOIN unidades_facultades uf ON e.facultad = uf.id LEFT JOIN personas p  ON e.encargado = p.id, users LIMIT  {$inicio} , {$final}";
        foreach ($db->query($sql) as $res) {
            $equipo[] = $res;
        }
        if(empty($equipo)){
            return "No hay Datos";
        }
        else{
            return $equipo;
        }
        $db->close();
    }

    public function recuperarImagen($id){
        $conexion = new Conexion();
        $db = $conexion->conectar();
        $sql = "SELECT imagen FROM equipos WHERE codigo = $id";
        $resultado=$db->query($sql);
        $datos = mysqli_fetch_assoc($resultado);
        if(empty($datos)){
            return "No hay Datos";
        }
        else{
            return $datos;
        }
    }
    
    public function ordenarEquipos($id, $orden, $inicio, $final) {
        $conexion = new Conexion();
        $db = $conexion->conectar();
        $sql =  "SELECT codigo, categoria, nombre,disponibilidad, cantidad,full_name AS encargado, email, s.sede as sede, unidad_facultad as facultad, e.created_at, e.updated_at FROM equipos e LEFT JOIN sedes s ON e.sede = s.id LEFT JOIN unidades_facultades uf ON e.facultad = uf.id LEFT JOIN personas p  ON e.encargado = p.id, users ORDER BY {$id} {$orden} LIMIT  {$inicio} ,{$final}";
        foreach ($db->query($sql) as $res) {
            $equipo[] = $res;
        }
        if(empty($equipo)){
            return "No hay Datos";
        }
        else{
            return $equipo;
        }
        $db->close();
    }

    public function añadirEquipo($modelodatos){
        $conexion = new Conexion();
        $db = $conexion->conectar();
        $sql = "INSERT INTO equipos (categoria,nombre,disponibilidad,cantidad,encargado,sede,facultad) VALUES('$modelodatos[categoria]','$modelodatos[nombre]','$modelodatos[disponibilidad]','$modelodatos[cantidad]','$modelodatos[encargado]','$modelodatos[sede]','$modelodatos[facultad]')";
        if($db->query($sql) === TRUE) {
            return 'success';
        }
        else{
            return $db->error;
        }
        $db->close();
    }

    public function buscarEquipos($id){
        $conexion = new Conexion();
        $db = $conexion->conectar();
        $sql = "SELECT codigo, categoria, nombre,disponibilidad, cantidad,full_name AS encargado, email, s.sede as sede, unidad_facultad as facultad, e.created_at, e.updated_at FROM equipos e LEFT JOIN sedes s ON e.sede = s.id LEFT JOIN unidades_facultades uf ON e.facultad = uf.id LEFT JOIN personas p  ON e.encargado = p.id, users WHERE codigo = {$id}";
        $result = $db->query($sql);
        $equipo = $result->fetch_assoc();
        return $equipo;
        $db->close();
    }

    public function editarEquipo($modelodatos){
        $conexion = new Conexion();
        $db = $conexion->conectar();
        $sql = "UPDATE equipos SET nombre = '$modelodatos[nombre]', cantidad = '$modelodatos[cantidad]', disponibilidad = '$modelodatos[disponibilidad]', encargado = '$modelodatos[encargado]', categoria = '$modelodatos[categoria]' , sede = '$modelodatos[sede]' , facultad = '$modelodatos[facultad]' WHERE codigo = $modelodatos[id]";
        if($db->query($sql) === TRUE) {
            return 'success';
        }
        else{
            return $db->error;
        }
        $db->close();
    }

    public function eliminarEquipo($id){
        $conexion = new Conexion();
        $db = $conexion->conectar();
        $sql = "DELETE FROM equipos WHERE codigo = {$id}";
        if($db->query($sql) === TRUE) {
            return 'success';
        }
        else{
            return $db->error;
        }
        $db->close();
    }

    public function corregirIncremento(){
        $conexion = new Conexion();
        $db = $conexion->conectar();
        $sql = "SELECT * FROM equipos ORDER BY codigo DESC LIMIT 0,1";
        $resp = $db->query($sql);
        while($row = mysqli_fetch_assoc($resp)){
            $ultimo_id = $row["codigo"];
        }
        $sql = "ALTER TABLE equipos AUTO_INCREMENT = $ultimo_id";
        $db->query($sql);
        $db->close();
    }
}
?>