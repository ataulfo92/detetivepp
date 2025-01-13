<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <meta lang="pt-br">
  <meta name="Autor" content="Vilagrant Ataulfo">
  <link href="../diretorio_html/imagens/detective-16.png">
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/config.css"        rel="stylesheet">
  <link href="../css/color.css"         rel="stylesheet" type="text/css"  media="screen"/>
</head>
<body>
<?php
  include 'valida_entrada.php';
  include '../back-sistema/conexao.php';
  $SQL_lista_comprador  = 'SELECT NOME FROM Comprador WHERE NOT id=1;';
  $listar               = mysqli_query($conectar,$SQL_lista_comprador);
  mysqli_close($conectar);
?>

<form id="form-altera_dados" action="resposta-alteracao.php" method="post">
  <fieldset>
    <legend>Alterar dados do Fornecedor</legend><br/><br/>
    ID: 
    <input type="text" name="ID" id="input-ID-alterar" readonly>
    <br/>
    Fornecedor: 
    <input type="text" name="FORNECEDOR" class="teste_classe" id="pesquisar_estilo" maxlength="30" autofocus="on" pattern="[ABCDEFGHIJLMNWOPYQRSTKUVXZabcdefghijlmnwopqrskytuvxz' ']+$">
    <br/>
    <br/>
    Comprador: 
    <select name="COMPRADOR" id="Status_Comprador">
      <?php foreach($listar as $NOMES){
      echo "<option value=".$NOMES['NOME'].">".$NOMES['NOME']."</option>";
      }
      ?>
    </select>
    <br/>
    <br/>
    Estado: 
    <select name="ESTADO_TROCA" id="Estado_troca" onclick="escolher_opcao();">
      <option name="COM_TROCA"   value="1">COM TROCA</option>
      <option name="SEM_TROCA"   value="2">SEM TROCA</option>
      <option name="EXCESSAO"    value="3">BONIFICAÇÃO</option> 
      <option name="INATIVO"     value="4">INATIVO</option>   
    </select>
    <br/>
    <br>
    Condição da Troca: 
    <input type="text" maxlenght="10" id="Estado_condicao" name="TROCA_MEDIANTE">
    <br/>
    <br/>
    Recolhimento: 
    <select name="STATUS_RECOLHIMENTO" id="Estado_recolhimento">
      <option value="Sim">SIM</option>
      <option value="Não">NÃO</option>    
    </select>
    <br/>
    <br/>
    STATUS:
    <br/>
    <input type="radio" name="STATUS_GERAL" value="Ativo">
    <label for="Ativo">ATIVO</label><br/>
    <input type="radio" name="STATUS_GERAL" value="Inativo">
    <lable for="Inativo">INATIVO</lable>
    <br/>
    <br/>
    Tela:
    <br/>
    <input type="radio"  name="STATUS_TELA" value="Transf / Locais">
    <label for="Transf / Locais">TROCA ENTRE LOCAIS</label><br/>
    <input type="radio"  name="STATUS_TELA" value="Movimentação">
    <label for="Movimentação">MOVIMENTAÇÃO ESTOQUE</label><br/><br/>
    QUEM RECEBE:
    <select name="QUEM_RECEBE" id="Estado_recebe">
      <option value="CD">CD</option>
      <option value="F/L">F/L</option>
      <option value="S/R">S/R</option>
    </select>
    <br/>
    <br/>
    <input type="submit" value="Deletar" name="Deletar" class="botao-deletar-estilo">
    <input type="submit" value="Alterar" name="Alterar" class="botao-alterar-estilo">
  </fieldset>
</form>
<script>
  const parametros = new URLSearchParams(window.location.search)
  
  const meuarray = Array.from(parametros.values())
 
  document.getElementById('input-ID-alterar').value = meuarray[0]
  document.getElementById('pesquisar_estilo').value = meuarray[1]
  document.getElementById('Status_Comprador').value = meuarray[2]
  document.getElementById('Estado_troca').value     = meuarray[3]
  document.getElementById('Estado_condicao').value  = meuarray[4]
  document.getElementById('Estado_recolhimento').value = meuarray[5]

  let Tela = document.getElementsByName('STATUS_TELA')
    if(meuarray[6].toString() == "Movimentação"){
      Tela[1].checked = true
    }else{
      Tela[0].checked = true  
    }

  let Status_geral = document.getElementsByName('STATUS_GERAL')

  if(meuarray[8].toString() == "Ativo"){
    Status_geral[0].checked = true;
  }else{
    Status_geral[1].checked = true  
  }

  document.getElementById('Estado_recebe').value = meuarray[7]

</script>
<script src="../js/arquivo.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>