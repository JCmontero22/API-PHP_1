
<?php 

    class CategoriaModel extends conexion
    {
        function getAll_categorias() {
            $query = "SELECT * FROM categoria WHERE estado_categoria = 1";
            return $this->select($query);
        }

        function getOne_categoria($id) {
            $query = "SELECT * FROM categoria WHERE id_categoria = '$id' ";
            return $this->select($query);
        }

        function insetCategoria($data){
            $data = json_decode($data, true);
            $query = "INSERT INTO categoria (nombre_categoria, estado_categoria) VALUES ('".$data["nombre"]."', '".$data["estado"]."')";
            $response = $this->execute($query);
            
            if ($response > 0) {
                $respuesta['status'] = true;
                $respuesta['mensaje'] = "Categoria registrada";
            }else{
                $respuesta['status'] = false;
                $respuesta['mensaje'] = "La Categoria no pudo ser registrada";
            }

            return $respuesta; 
        }

        function updateCategoria($data) {
            $data = json_decode($data, true);
            $query = "UPDATE categoria SET nombre_categoria = '".$data['nombre']."' WHERE id_categoria = " . $data['id'];
            $response = $this->execute($query);

            if ($response > 0) {
                $respuesta['status'] = true;
                $respuesta['mensaje'] = "Se actualizo la categoria";
            }else{
                $respuesta['status'] = false;
                $respuesta['mensaje'] = "No se pudo actualizar la categoria";
            }

            return $respuesta;
        }

        function deleteCategoria($data) {
            $data = json_decode($data, true);
            $query = "UPDATE categoria SET estado_categoria = 0 WHERE id_categoria = " . $data['id'];
            $response = $this->execute($query);
            
            if ($response > 0) {
                $respuesta['status'] = true;
                $respuesta['mensaje'] = "Se eleimino la categoria";
            }else{
                $respuesta['status'] = false;
                $respuesta['mensaje'] = "No se pudo eliminar la categoria";
            }

            return $respuesta;
        }
    }
    