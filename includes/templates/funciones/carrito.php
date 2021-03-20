<?php
    if($_POST['accion'] == "add"){
        $respuesta = array(
            'respuesta' => 'correcto',
            'datos' => array(
            'productos' => $_POST['id'])
        );  

        echo json_encode($respuesta);
    }
?>