<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <meta lang="pt-br"> 
  <meta name="Autor" content="Vilagrant Ataulfo">
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/config.css"        rel="stylesheet">
  <link href="../css/color.css"         rel="stylesheet" type="text/css"  media="screen"/>
</head>
<body>

<?php
  session_start();
  require_once 'valida_entrada.php';
  require_once '../back-sistema/conexao.php';
  $SQL    = 'SELECT NOME FROM Comprador';
  $listar = mysqli_query($conectar,$SQL);
?>

<h3 style="margin-left:220px;">Cadastrar comprador</h3>
<form id="form-altera_dados" action="<?php $_SERVER['PHP_SELF'];?>" method='post'><br/>
  NOME:     <input type="text" name="NOME"      id='NOME'     maxlength="12" ><br/><br/>
  Telefone: <input type="text" name="TELEFONE"  id='TELEFONE' maxlength="20" number_format><br/><br/>
  Email:    <input type="text" name="EMAIL"     id='EMAIL'    maxlength="40" ><br/><br/>
  Ativo:
  <select name="STATUS" id='STATUS'>
    <option value="Ativo">SIM</option>
    <option value="Inativo">NAO</option> 
  </select>   
  <br/>
  <br/>
  Situação: 
  <select name="SITUACAO" id='SITUACAO'>
    <option value="EM OPERAÇÃO">EM OPERAÇÃO</option>
    <option value="FERIAS">FERIAS</option>
    <option value="AVISO">AVISO</option>
    <option value="SUSPENSO">SUSPENSO</option>
  </select>     
  <br/><br/>
  <input type="submit" name="Cadastrar" value="Cadastrar" class="botao-estilo">
</form>
<?php

if(isset($_POST['Cadastrar'])):
  
  $NOME     = mysqli_real_escape_string($conectar,htmlspecialchars($_POST['NOME']));
  $TELEFONE = mysqli_real_escape_string($conectar,htmlspecialchars($_POST['TELEFONE']));
  $EMAIL    = mysqli_real_escape_string($conectar,htmlspecialchars($_POST['EMAIL']));
  $STATUS   = $_POST['STATUS'];
  $SITUACAO = $_POST['SITUACAO'];

  $sql_inserir  = "INSERT INTO Comprador(`NOME`,`TELEFONE`,`EMAIL`,`STATUS`,`SITUACAO`)VALUES('$NOME','$TELEFONE','$EMAIL','$STATUS','$SITUACAO');";
  $estado_query = mysqli_query($conectar,$sql_inserir);
  mysqli_close($conectar);
  if($estado_query && $NOME != ''):
    echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">';
    echo '<symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">';
    echo '<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>';
    echo '</symbol>';
    echo '<div class="alert alert-success d-flex align-items-center" role="alert">';
    echo '<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>';
    echo '<div>';
    echo "Dados do comprador $NOME adicionados com sucesso!";
    echo '</div>';
    echo '</div>';
  elseif($estado_query == false || $NOME == ''):
    echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">';
    echo '<symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">';
    echo '<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>';
    echo '</symbol>';
    echo '<div class="alert alert-danger d-flex align-items-center" role="alert">';
    echo '<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>';
    echo '<div>';
    echo "Erro na gravação do comprador $NOME campo nome vazio ou erro na conexão";
    echo '</div>';
    echo '</div>'; 
  endif;
endif;
?>
</body>
</html>