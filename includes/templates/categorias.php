<?php
    try {
        require_once('includes/templates/funciones/db_conexion.php');
        $sql = "SELECT * FROM `categoria`";
        $resultado = $conn->query($sql);
    } catch (Exception $e) {
        $error = $e->getMessage();
    }

    while($categoria = $resultado->fetch_assoc() ){ ?>
        <option value="<?php echo $categoria['id_categoria']?>"><?php echo $categoria['nombre_categoria']?></option>
    <?php } ?>
?>