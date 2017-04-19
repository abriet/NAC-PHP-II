<?php
  include 'inc/cnx.php';

    $id = $_GET['id'];

    $del = mysqli_query($cnx,"DELETE FROM cadastro WHERE id_cadastro = $id");

    if ($del) {
      $msg = "Registro deletado com sucesso!";
    }else{
      $msg = "Houve um erro ao deletar o registro!";
    }

    if (isset($msg)) {
      echo"<script type='text/javascript'>";
      echo "alert('{$msg}');";
      echo "window.location.replace('index.php');";
      echo "</script>";
    }
