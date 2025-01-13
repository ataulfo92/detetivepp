<?php
#require_once '../back-sistema/conexao.php';
#require_once 'valida_entrada.php';
#$SQL = 'SELECT NOME FROM Comprador';
#$listar = mysqli_query($conectar,$SQL);
?>
<?php 
include 'header.php';
?>

<form class="input-cadastro" action="<?php $_SERVER['PHP_SELF'];?>" method="post">
  <a class="btn btn-success" style="margin-left:480px;"onclick="botao_cadastro_comprador();">Comprador+</button></a>
  
  <legend>Cadastro Fornecedor</legend><br/><br/>

  Fornecedor: <input type="text" name="FORNECEDOR" maxlength="30" autofocus="on" pattern="[ABCDEFGHIJLMNOPQRSWYTKÇUVXZabcdefghijlmnopqrysktwuvxzç' ']+$">
  <br/>
  <br/>
  Comprador: <select name="COMPRADOR">
  <?php foreach($listar as $NOMES){
    echo "<option value=".$NOMES['NOME'].">".$NOMES['NOME']."</option>";
    }
  ?>
  </select>
  <br/> 
  <br/>
  Estado: 
  <select name="ESTADO_TROCA" id="estado_troca">
    <option name="COM_TROCA"   value="1">TROCA/DEV</option>
    <option name="SEM_TROCA"   value="2">QUEBRA OP</option>
    <option name="EXCESSAO"    value="3">BONIFICAÇÃO</option> 
  </select>
  <br/>
  <br>
  Condição De Troca: 
  <input type="text" maxlenght="10" id="estado_input" name="TROCA_MEDIANTE">
  <br/>
  <br/>
  Recolhimento: 
  <select name="STATUS_RECOLHIMENTO">
    <option value="Sim">SIM</option>    
    <option value="Não">NÃO</option>    
  </select>
  <br/>
  <br/>
  Tela:
  <br/>
  <input type="radio" id="teste" name="STATUS_TELA" value="Transf / Locais" checked>
  <label for="Troca">TROCA ENTRE LOCAIS</label><br/>
  <input type="radio" id="teste" name="STATUS_TELA" value="Movimentação">
  <label for="Movimentacao">MOVIMENTAÇÃO ESTOQUE</label><br/><br/>
  QUEM RECEBE:
  <select name="QUEM_RECEBE">
    <option value="CD">CD</option>
    <option value="F/L">F/L</option>
    <option value="S/R">S/R</option>
  </select>
  <br/>
  <details>
    <summary>Instruções</summary>
    <h5><span style="color:blue;">CD</span></h5>
    <p><span style="color:blue;"> Centro de Distribuição</span></p> 
    <h5><span style="color:green;">F/L</span></h5>
    <p><span style="color:green;"> Fornecedor Local </span></p>
    <h5><span style="color:red"> S/R </span></h5>
    <p><span style="color:red">Sem Recebimento </span></p>
  </details>
  <br/>
  <input type="submit" value="Cadastrar" name="Adicionar" class="botao-estilo">
</form>
<?php

if(isset($_POST['Adicionar'])):
  require_once '../back-sistema/conexao.php';
  require_once 'util.php';
  $NOME_FORNECEDOR     = ucfirst(mysqli_real_escape_string($conectar,htmlspecialchars($_POST['FORNECEDOR']))); //OK
  $STATUS_RECOLHIMENTO = $_POST["STATUS_RECOLHIMENTO"]; //OK
  $TROCA_COND          = mysqli_real_escape_string($conectar,htmlspecialchars($_POST['TROCA_MEDIANTE']));
  $STATUS_TELA         = $_POST['STATUS_TELA']; //OK
  $COMPRADOR           = $_POST["COMPRADOR"];//OK
  $ESTADO_TROCA        = $_POST["ESTADO_TROCA"];//OK
  $QUEM_RECEBE         = $_POST['QUEM_RECEBE'];//OK
  $STATUS_GERAL        = 'Ativo';
  $OPERACAO            = selecao_estado_troca($ESTADO_TROCA);

  if(empty($TROCA_COND)):
    $TROCA_COND = 'Nenhum';
  endif;

  $sql_consulta_verificacao    = "SELECT NOME_FORNECEDOR FROM Fornecedor_lista where NOME_FORNECEDOR = '$NOME_FORNECEDOR'";
  $verifica_registro_existente = mysqli_query($conectar,$sql_consulta_verificacao);

  if(mysqli_num_rows($verifica_registro_existente) == 0 && $NOME_FORNECEDOR != ''):
    $sql_inserir_dados = "INSERT INTO Fornecedor_lista(`NOME_FORNECEDOR`, `RECOLHIMENTO`, `TROCA_COND`, `TELA`, `COMPRADOR`, `QUEM_RECEBE`, `ESTADO`,`STATUS_GERAL`,`OPERACAO`)VALUES('$NOME_FORNECEDOR', '$STATUS_RECOLHIMENTO', '$TROCA_COND', '$STATUS_TELA', '$COMPRADOR','$QUEM_RECEBE','$ESTADO_TROCA','$STATUS_GERAL','$OPERACAO');";
    $Inserir_dados = mysqli_query($conectar,$sql_inserir_dados);
    if($Inserir_dados):
      echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">';
      echo '<symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">';
      echo '<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>';
      echo '</symbol>';
      echo '<div class="alert alert-success d-flex align-items-center" role="alert">';
      echo '<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>';
      echo '<div>';
      echo "Dados do fornecedor $NOME_FORNECEDOR adicionados com sucesso!";
      echo '</div>';
      echo '</div>';
    elseif($Inserir_dados == false || empty($Inserir_dados)):
      echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">';
      echo '<symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">';
      echo '<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>';
      echo '</symbol>';
      echo '<div class="alert alert-danger d-flex align-items-center" role="alert">';
      echo '<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>';
      echo '<div>';
      echo "Erro na gravação do fornecedor $NOME_FORNECEDOR campo nome vazio ou erro na conexão";
      echo '</div>';
      echo '</div>'; 
    endif;
  elseif($NOME_FORNECEDOR == ''):
    echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">';
    echo '<symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">';
    echo '<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>';
    echo '</symbol>';
    echo '<div class="alert alert-danger d-flex align-items-center" role="alert">';
    echo '<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>';
    echo '<div>';
    echo "Erro na gravação do fornecedor $NOME_FORNECEDOR campo nome vazio ou erro na conexão";
    echo '</div>';
    echo '</div>';
  else:
    echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">';
    echo '<symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">';
    echo '<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>';
    echo '</symbol>';
    echo '<div class="alert alert-warning d-flex align-items-center" role="alert" autofocus="on">';
    echo '<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>';
    echo '<div>';
    echo "Aviso o fornecedor $NOME_FORNECEDOR já se encontra registrado!";
    echo '</div>';
    echo '</div>';
  endif;
endif;
mysqli_close($conectar);
?>
<?php
include 'footer.php';
?>
