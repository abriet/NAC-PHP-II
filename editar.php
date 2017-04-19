<?php
  include 'inc/cnx.php';

  if (isset($_POST['editarPessoa'])) {
    $id     = $_POST['id'];
    $nome     = $_POST['nome'];
    $rg       = $_POST['rg'];
    $telefone = $_POST['telefone'];
    $cidade   = $_POST['cidade'];
    $estado   = $_POST['estado'];



    if($nome == "" || strlen($rg) <  9 || $telefone == "" || $cidade == "" || $estado == ""){
      $msg="Todos os campos devem ser preenchidos corretamente!";
    }else{

      $ins = mysqli_query($cnx, "UPDATE cadastro SET nome='$nome', rg='$rg', telefone='$telefone', cidade='$cidade', estado='$estado' WHERE id_cadastro = $id");
      if ($ins) {
        $msg="Cadastro atualizado com sucesso!";
      }else{$msg="Erro ao atualizar!";}

    }


    if (isset($msg)) {
      echo"<script type='text/javascript'>";
      echo "alert('{$msg}');";
      echo "window.location.replace('index.php');";
      echo "</script>";
    }
  }
