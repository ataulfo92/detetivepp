<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<meta lang="pt-br">
<meta name="Autor" content="Vilagrant Ataulfo">
<link href="../diretorio_html/imagens/detective-16.png">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/config.css"        rel="stylesheet">
<link href="css/color.css"         rel="stylesheet">
<title>Sistema Detective Supplier</title>
</head>
<body>
<?php
include 'valida_entrada.php';

?>
<h3>Alterar dados do comprador</h3>
<form id="form-altera_dados" action="alterar_comprador.php" method='post'><br/>
  ID:         <input type="text" name="ID"        id="input-ID-alterar" readonly><br/><br/>
  NOME:       <input type="text" name="NOME"      maxlength="25" id='NOME'><br/><br/>
  Telefone:   <input type="text" name="TELEFONE"  maxlength="20" id='TELEFONE'><br/><br/>
  Email:      <input type="text" name="EMAIL"     maxlength="40" id='EMAIL'><br/><br/>
  Ativo:
 <select name="STATUS" id='STATUS'>
    <option value="Ativo">SIM</option>
    <option value="Inativo">NAO</option> 
 </select>   
 <br/>
 <br/>
  Situação: 
  <select name="SITUACAO" id='SITUACAO'>
    <option value="FERIAS">FERIAS</option>
    <option value="EM OPERAÇÃO">EM OPERAÇÃO</option>
    <option value="AVISO">AVISO</option>
    <option value="SUSPENSO">SUSPENSO</option>
  </select>     
  <br/><br/>
  <input type="submit" name="Deletar" value="Deletar"  class="botao-deletar-estilo">
  <input type="submit" name="Alterar" value="Alterar"  class="botao-alterar-estilo">
</form>
<script>

  const parametros = new URLSearchParams(window.location.search)
  const meuarray = Array.from(parametros.values())
             
  document.getElementById('input-ID-alterar').value = meuarray[0]
  document.getElementById('NOME').value             = meuarray[1]
  document.getElementById('TELEFONE').value         = meuarray[2]
  document.getElementById('EMAIL').value            = meuarray[3]
  document.getElementById('STATUS').value           = meuarray[4]
  document.getElementById('SITUACAO').value         = meuarray[5]         
  let STATUS = document.getElementsByName('STATUS')
  if(meuarray[4].toString() == "Inativo"){
    STATUS[1].checked = true
  }else{
    STATUS[0].checked = true  
  }

  let TIPO = document.getElementsByName('SITUACAO')
  if(meuarray[5].toString() == "EM OPERAÇÃO"){
    TIPO[1].checked = true
  }else{
    TIPO[0].checked = true  
  }          
</script>
<script src="js/arquivo.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>