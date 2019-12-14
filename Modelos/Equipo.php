<?php 
require_once("../../Modelos/Conexion.php");
class Equipo {

    public function obtenerEquipos($inicio, $final) {
        $conexion = new Conexion();
        $db = $conexion->conectar();
        $sql = "SELECT codigo, categoria, nombre,disponibilidad, cantidad,full_name AS encargado, email, s.sede as sede, unidad_facultad as facultad, e.created_at, e.updated_at FROM equipos e LEFT JOIN sedes s ON e.sede = s.id LEFT JOIN unidades_facultades uf ON e.facultad = uf.id LEFT JOIN personas p  ON e.encargado = p.id INNER JOIN user_persona up on up.id_user = p.id INNER JOIN users u on up.id_user = u.id LIMIT  {$inicio} , {$final}";
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
        $sql = "SELECT imagen, tipo_imagen FROM equipos WHERE codigo = $id";
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
        $sql =  "SELECT codigo, categoria, nombre,disponibilidad, cantidad,full_name AS encargado, email, s.sede as sede, unidad_facultad as facultad, e.created_at, e.updated_at FROM equipos e LEFT JOIN sedes s ON e.sede = s.id LEFT JOIN unidades_facultades uf ON e.facultad = uf.id LEFT JOIN personas p  ON e.encargado = p.id INNER JOIN user_persona up on up.id_user = p.id INNER JOIN users u on up.id_user = u.id ORDER BY {$id} {$orden} LIMIT  {$inicio} ,{$final}";
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
        $modelodatos['imagen'] = mysqli_real_escape_string($db,$modelodatos['imagen']);
        $sql = "INSERT INTO equipos (categoria,nombre,disponibilidad,cantidad,encargado,sede,facultad,imagen,tipo_imagen, created_at, updated_at) VALUES('$modelodatos[categoria]','$modelodatos[nombre]','$modelodatos[disponibilidad]','$modelodatos[cantidad]','$modelodatos[encargado]','$modelodatos[sede]','$modelodatos[facultad]', '$modelodatos[imagen]','$modelodatos[tipo]', current_timestamp(), current_timestamp())";
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
        $sql = "SELECT codigo, categoria, nombre,disponibilidad, cantidad,full_name AS encargado, email, s.sede as sede, unidad_facultad as facultad FROM equipos e LEFT JOIN sedes s ON e.sede = s.id LEFT JOIN unidades_facultades uf ON e.facultad = uf.id LEFT JOIN personas p  ON e.encargado = p.id, users WHERE codigo = {$id}";
        $result = $db->query($sql);
        $equipo = $result->fetch_assoc();
        return $equipo;
        $db->close();
    }

    public function editarEquipo($modelodatos, $anterior){
        $conexion = new Conexion();
        $db = $conexion->conectar(); 
        $sql = "UPDATE equipos SET nombre = '$modelodatos[nombre]', cantidad = '$modelodatos[cantidad]', disponibilidad = '$modelodatos[disponibilidad]', categoria = '$modelodatos[categoria]', updated_at = current_timestamp()";


        if($modelodatos['encargado'] != $anterior['encargado']){
        $sql = "{$sql} , encargado = '$modelodatos[encargado]'";
        }

        if($modelodatos['sede'] != $anterior['sede']){
            $sql = "{$sql} , sede = '$modelodatos[sede]'";
            }

        if($modelodatos['facultad'] != $anterior['facultad']){
                $sql = "{$sql} , facultad = '$modelodatos[facultad]'";
            }
        
        if(isset($modelodatos['imagen']) && isset($modelodatos['tipo']) ){
            $modelodatos['imagen'] = mysqli_real_escape_string($db,$modelodatos['imagen']);
            $sql = "{$sql} , imagen = '$modelodatos[imagen]' , tipo_imagen = '$modelodatos[tipo]'";
        }


        $sql = "{$sql} WHERE codigo = '$modelodatos[id]'";

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