<?php
    session_start();
    if($_POST['accion'] == "modifica-cliente"){
        $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
        $apellido = filter_var($_POST['apellido'], FILTER_SANITIZE_STRING);
        $telefono = filter_var($_POST['nw-tel'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
        $fecha = $_POST['fecha'];
        $nw_pass = filter_var($_POST['nw-pass'], FILTER_SANITIZE_STRING);

        $noti = "off";
        if(isset($_POST['newsletter'])){
            $noti = filter_var($_POST['newsletter'], FILTER_SANITIZE_STRING);
        }

        try{
            include_once 'db_conexion.php';

            $valida_informacion = false;
            if(!($telefono==$_SESSION['tel_cliente'])){
                $valida_informacion = exite_tel($telefono, $conn);
            }

            if(!($valida_informacion)){
                if($nw_pass==''){
                    $stmt = $conn->prepare("UPDATE clientes SET nombre_cliente=?, apellido_cliente=?, tel_cliente=?, email_cliente=?, fecha_cliente=?, notifica_cliente=? WHERE id_cliente =".$_SESSION['id_cliente']);
                    $stmt->bind_param("ssssss", $nombre, $apellido, $telefono, $email, $fecha, $noti);
                }else{
                    $opciones = array('cost' => 12);
                    $hashed_password = password_hash($nw_pass, PASSWORD_BCRYPT, $opciones);
                    $stmt = $conn->prepare("UPDATE clientes SET nombre_cliente=?, apellido_cliente=?, tel_cliente=?, email_cliente=?, fecha_cliente=?, password_cliente=?, notifica_cliente=? WHERE id_cliente =".$_SESSION['id_cliente']);
                    $stmt->bind_param("sssssss", $nombre, $apellido, $telefono, $email, $fecha, $hashed_password, $noti);
                }
                $stmt->execute();
    
                if($nw_pass==''){
                    $respuesta = array(
                        'respuesta' => 'correcto',
                        'pass' => "no"
                    );
                }else{
                    $respuesta = array(
                        'respuesta' => 'correcto',
                        'pass' => "si"
                    );
                }
                
                $_SESSION['nombre_cliente'] = $nombre;
                $_SESSION['tel_cliente'] = $telefono;

                $stmt->close();
                $conn->close();

            }else{
                $respuesta = array(
                    'respuesta' => 'error',
                    'tipo' => "Error!: Información de contacto previamete registrada",
                    'old_tel' => $_SESSION['tel_cliente']
                );
            }
            
        }catch(Exception $e) {
            $respuesta = array(
                'respuesta' => 'error',
                'tipo' => "Error!: ".$e->getMessage()
            );
        }
        echo json_encode($respuesta);
    }

    if($_POST['accion'] == "valida_olpass"){
        $old_pass = filter_var($_POST['old-pass'], FILTER_SANITIZE_STRING);
        try{
            include_once 'db_conexion.php';
            $stmt = $conn->prepare("SELECT password_cliente FROM clientes WHERE id_cliente = ?;");
            $stmt->bind_param("i", $_SESSION['id_cliente']);
            $stmt->execute();
            $stmt->bind_result($password_db);
            if($stmt->affected_rows){
                $existe = $stmt->fetch();
                if($existe){
                    if(password_verify($old_pass, $password_db)){
                        $respuesta = array(
                            'respuesta' => 'correcto'
                        );
                    }else{
                        $respuesta = array(
                            'respuesta' => 'error',
                            'tipo' => "Error!: DatosNoConinsiden"
                        );
                    }   
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

    if($_POST['accion'] == "modificar-direccion"){
        $pais = filter_var($_POST['pais'], FILTER_SANITIZE_STRING);
        $entidad = filter_var($_POST['entidad-f'], FILTER_SANITIZE_STRING);
        $ciudad = filter_var($_POST['ciudad'], FILTER_SANITIZE_STRING);
        $cp = filter_var($_POST['cp'], FILTER_SANITIZE_STRING);
        $calle = filter_var($_POST['calle'], FILTER_SANITIZE_STRING);
        $num_ext = filter_var($_POST['numero-ext'], FILTER_SANITIZE_STRING);
        $num_int = filter_var($_POST['numero-int'], FILTER_SANITIZE_STRING);

        $respuesta = array(
            'respuesta'=> 'correcto',
            'datos' => array(
            'id' => $_SESSION['id_cliente'],
            'pais' => $pais,
            'entidad' => $entidad,
            'entidad' => $entidad,
            'ciudad' => $ciudad,
            'cp' => $cp,
            'calle' => $calle,
            'num_ext' => $num_ext,
            'num_int' => $num_int)
        );

        echo json_encode($respuesta);
    }
?>      