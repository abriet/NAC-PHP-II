  <h1 class="logo">PESSOAS</h1>
  <hr>
  <br>
  <h4>Buscar por estado:</h4>

  <form class="filtro" action="index.php" method="GET">
    <input type="radio" name="estado" value="all"> TODOS
    <input type="radio" name="estado" value="sp"> SP
    <input type="radio" name="estado" value="rj"> RJ
    <input type="radio" name="estado" value="sc"> SC
    <button type="submit">FILTRAR</button>
  </form>
  <br><hr>



  <?php if(isset($_GET['editar'])){
    $id = ver_mesagem(ver_mesagem($_GET['editar']));
    $q = mysqli_query($cnx,"SELECT * FROM cadastro WHERE id_cadastro = $id LIMIT 1");

    while ( $row = mysqli_fetch_array($q) ) {
      $id     = $row['id_cadastro'];
      $nome     = $row['nome'];
      $rg       = $row['rg'];
      $telefone = $row['telefone'];
      $cidade   = $row['cidade'];
      $estado   = $row['estado'];
  ?>

    <form class="cadastrar" id="editar" action="editar.php" method="post">

      <input type="hidden" name="id" id="id" required value="<?php echo $id ?>">

      <br><br>
      <label for="nome">Nome</label><br>
      <input type="text" name="nome" id="nome" required value="<?php echo $nome ?>"><br><br>

      <label for="rg">RG</label><br>
      <input type="text" name="rg" id="rg" required value="<?php echo $rg ?>"><br><br>

      <label for="telefone">Telefone</label><br>
      <input type="text" name="telefone" id="telefone" required value="<?php echo $telefone ?>"><br><br>

      <label for="cidade">Cidade</label><br>
      <input type="text" name="cidade" id="cidade" required value="<?php echo $cidade ?>"><br><br>

      <label for="estado">Estado</label><br>
      <input type="text" name="estado" id="estado" maxlength="2" required value="<?php echo $estado ?>"><br><br>

      <button type="submit" name="editarPessoa"> SALVAR EDIÇÃO</button>
    </form>

  <?php } }else{  ?>

    <form class="cadastrar" id="cadastrar" action="cadastrar.php" method="post">
      <br><br>
      <label for="nome">Nome</label><br>
      <input type="text" name="nome" id="nome" required min="5"><br><br>

      <label for="rg">RG</label><br>
      <input type="text" name="rg" id="rg" required><br><br>

      <label for="telefone">Telefone</label><br>
      <input type="text" name="telefone" id="telefone" required><br><br>

      <label for="cidade">Cidade</label><br>
      <input type="text" name="cidade" id="cidade" required><br><br>

      <label for="estado">Estado</label><br>
      <input type="text" name="estado" id="estado" maxlength="2" required><br><br>

      <button type="submit" name="cadastrarPessoa"> CADASTRAR PESSOA</button>
    </form>

  <?php } ?>


<!-- LSITAGEM DE PESSOAS  -->
<table class="table">
  <thead>
    <tr>
      <th>#</th>
      <th>NOME</th>
      <th>RG</th>
      <th>TELEFONE</th>
      <th>CIDADE</th>
      <th>ESTADO</th>
      <th>AÇÃO</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $filtro = @$_GET['estado'];

      if (!isset($filtro) OR $filtro == "all") {
        $sql = "SELECT * FROM cadastro";
      }else{
        $sql = "SELECT * FROM cadastro WHERE estado LIKE '%".$filtro."%' ";
      }

      $querry = mysqli_query($cnx,$sql);
      echo (mysqli_num_rows($querry)) ? "" : "<tr><td style='position:absolute; margin-left:20%; margin-top:20px; color:#900;'><span>NENHUM REGISTRO FOI ENCONTRADO!</span></td></tr>";
      while ($row = mysqli_fetch_array($querry)) {
     ?>
     <tr>
       <td><?php echo $row['id_cadastro'] ?></td>
       <td><?php echo $row['nome'] ?></td>
       <td><?php echo $row['rg'] ?></td>
       <td><?php echo $row['telefone'] ?></td>
       <td><?php echo $row['cidade'] ?></td>
       <td><?php echo $row['estado'] ?></td>
       <td><a href="index.php?editar=<?php echo criar_mesagem(criar_mesagem($row['id_cadastro'])) ?>">EDITAR</a> | <a href="deletar.php?id=<?php echo $row['id_cadastro'] ?>">X</a></td>
     </tr>
     <?php } ?>
  </tbody>
</table>
