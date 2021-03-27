<?php
    session_start();

    echo var_dump($_SESSION['items']);

    if($_SESSION['items'][6]){
        $_SESSION['items'][6] = $_SESSION['items'][6]+1;
    }

    echo var_dump($_SESSION['items']);
?>