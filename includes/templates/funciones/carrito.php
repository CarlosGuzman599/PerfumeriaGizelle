<?php

    session_start();
    if($_POST['accion'] == "add"){
        $id = filter_var($_POST['id'], FILTER_SANITIZE_STRING);
        $precio = precio_item($id);

        if(!($precio=='no')){
            $total = $_SESSION['total'] + $precio;
            $total_items = $_SESSION['total_items'] + 1;

            if(!$_SESSION['items']){
                $_SESSION['items'] = [0 => 0];
            }

            if(isset($_SESSION['items'][$id])){
                $_SESSION['items'][$id] = $_SESSION['items'][$id]+1;
            }else{
                $_SESSION['items'] += [$id => 1];
            }
            
            $_SESSION['total'] = $total;
            $_SESSION['total_items'] = $total_items;
            

            $respuesta = array(
                'respuesta' => 'correcto',
                'datos' => array(
                'total' => $total,
                'total_items' => $total_items,
                'items' => $_SESSION['items'])
            );
        }else{
            $respuesta = array(
                'respuesta' => 'error',
                'tipo' => 'Error!: Informacion corrupta'
            );
        }

        echo json_encode($respuesta);
    }

    function precio_item($id){
        $precio = 'no';
        try{
            include_once 'db_conexion.php';
            $stmt = $conn->prepare("SELECT precio_producto FROM productos WHERE id_producto = ?;");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->bind_result($precio_db);
            if($stmt->affected_rows){
                $existe = $stmt->fetch();
                if($existe){
                    $precio = $precio_db;  
                }
            }
            $stmt->close();
            $conn->close();
        }catch(Exception $e){
            $precio = 'no';
        }
        return $precio;
    }
?>