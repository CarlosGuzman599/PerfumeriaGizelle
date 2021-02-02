<?php
  define('PERFUMERIA_GIZELLE_HOST', 'localhost');
  define('PERFUMERIA_GIZELLE_DB_USUARIO', 'root');
  define('PERFUMERIA_GIZELLE_DB_PASSWORD', 'root1234');
  define('PERFUMERIA_GIZELLE_DB_DATABASE', 'perfumeria_gizelle');

  $conn = new mysqli(PERFUMERIA_GIZELLE_HOST, PERFUMERIA_GIZELLE_DB_USUARIO, PERFUMERIA_GIZELLE_DB_PASSWORD, PERFUMERIA_GIZELLE_DB_DATABASE);

  if($conn->connect_error) {
    echo $conn->connect_error;
  }
?>