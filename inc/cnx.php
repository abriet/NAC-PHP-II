<?php

DEFINE('DB_USER','root');
DEFINE('DB_PASS','fiap');
DEFINE('DB_HOST','localhost');
DEFINE('DB_BASE','nac');
//Conexão com o banco de dados deve ser feita na sequencia: Host, User, Pass, Data Base
$cnx = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_BASE);

if (!$cnx) {
  echo "Erro ao se conectar com o banco de dados => ".mysqli_error();
}
