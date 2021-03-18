<?php
    if($_POST['accion'] == "registro"){
        $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
        $apellido = filter_var($_POST['apellido'], FILTER_SANITIZE_STRING);
        $telefono = filter_var($_POST['nw-tel'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
        $fecha = $_POST['fecha'];

        $password = filter_var($_POST['nw-pass'], FILTER_SANITIZE_STRING);
        $opciones = array('cost' => 12);
        $hashed_password = password_hash($password, PASSWORD_BCRYPT, $opciones);

        $noti = "off";
        if(isset($_POST['newsletter'])){
            $noti = filter_var($_POST['newsletter'], FILTER_SANITIZE_STRING);
        }

        try {
            include_once 'db_conexion.php';
            if(!exite_tel($telefono, $conn)){
                $stmt = $conn->prepare("INSERT INTO clientes (nombre_cliente, apellido_cliente, tel_cliente, email_cliente, fecha_cliente, password_cliente, notifica_cliente) VALUES (?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("sssssss", $nombre, $apellido, $telefono, $email, $fecha, $hashed_password, $noti);
                $stmt->execute();
                if($stmt->affected_rows == 1) {
                    
                    $respuesta = array(
                        'respuesta' => 'correcto',
                        'datos' => array(
                        'nombre' => $nombre)
                    );
    
                    session_start();
                    $_SESSION['id_cliente'] = $stmt->insert_id;
                    $_SESSION['nombre_cliente'] = $nombre;
                    $_SESSION['tel_cliente'] = $telefono;

                    $stmt->close();
                    $conn->close();
                }
            }else{
                $respuesta = array(
                    'respuesta' => 'error',
                    'tipo' => 'Error!: Informacion de contacto previamente agregada'
                );
            }
        } catch(Exception $e) {
            $respuesta = array(
                'respuesta' => 'error',
                'tipo' => "Error!: ".$e->getMessage()
            );
        }
        echo json_encode($respuesta);
    }

    if($_POST['accion'] == "inicio"){

        $telefono= filter_var($_POST['tel'], FILTER_SANITIZE_STRING);
        $password = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);

        try{
            include_once 'db_conexion.php';
            $stmt = $conn->prepare("SELECT id_cliente,nombre_cliente,password_cliente FROM clientes WHERE tel_cliente = ?;");
            $stmt->bind_param("s", $telefono);
            $stmt->execute();
            $stmt->bind_result($id_cliente_db, $nombre_db, $password_db);
            if($stmt->affected_rows){
                $existe = $stmt->fetch();

                if($existe){

                    if(password_verify($password, $password_db)){
                        $respuesta = array(
                            'respuesta'=> 'correcto',
                            'datos' => array(
                            'id_insertado' => $id_cliente_db,
                            'nombre' => $nombre_db)
                        );
                        session_start();
                        $_SESSION['id_cliente'] = $id_cliente_db;
                        $_SESSION['nombre_cliente'] = $nombre_db;
                        $_SESSION['tel_cliente'] = $telefono;
                    }else{
                        $respuesta = array(
                            'respuesta' => 'error',
                            'tipo' => 'Error!: DatosIncorrectos'
                        );
                    }

                    
                }else{
                    $respuesta = array(
                        'respuesta' => 'error',
                        'tipo' => 'Error!DatosIncorrectos'
                    );
                }
            }

            $stmt->close();
            $conn->close();

        }catch(Exception $e){
            $respuesta = array(
                'respuesta' => 'error',
                'tipo' => "Error!: ".$e->getMessage()
            );
        }

        echo json_encode($respuesta);
    }

    function exite_tel($tel, $conn){
        $existe = false;
        try{
            $stmt = $conn->prepare("SELECT * FROM clientes WHERE tel_cliente = ?;");
            $stmt->bind_param("s", $tel);
            $stmt->execute();
            if($stmt->affected_rows){
                $existe = $stmt->fetch();
            }
        }catch(Exception $e){
            $existe = $e->getMessage();
        }
        return $existe;
    }

?>