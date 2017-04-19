<?php
  include 'inc/cnx.php';

  if (isset($_POST['cadastrarPessoa'])) {
    $nome     = $_POST['nome'];
    $rg       = $_POST['rg'];
    $telefone = $_POST['telefone'];
    $cidade   = $_POST['cidade'];
    $estado   = $_POST['estado'];



    if($nome == "" || strlen($rg) <  9 || $telefone == "" || $cidade == "" || $estado == ""){
      $msg="Todos os campos devem ser preenchidos corretamente!";
    }else{

      $ins = mysqli_query($cnx, "INSERT INTO cadastro (nome, rg, telefone, cidade, estado) VALUES ('$nome', '$rg', '$telefone', '$cidade', '$estado')");
      if ($ins) {
        $msg="Cadastro efetuado com sucesso!";
      }else{$msg="Erro ao cadastrar!";}

    }


    if (isset($msg)) {
      echo"<script type='text/javascript'>";
      echo "alert('{$msg}');";
      echo "window.location.replace('index.php');";
      echo "</script>";
    }
  }
