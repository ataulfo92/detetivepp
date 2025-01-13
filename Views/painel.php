<?php
#include 'valida_entrada.php';
include 'header.php';
?>


    <div class="filtro-index">
      <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
        <input type="search" name="pesquisar"       id="pesquisar_estilo"   placeholder="Nome do fornecedor" autofocus="on"> 
        <input type="submit" name="Botao-Pesquisar" value="Pesquisar"       class="botao-estilo">
        <input type="radio"  name="Filtro"          value="Nome_Fornecedor" checked> Nome
        <input type="radio"  name="Filtro"          value="Cod_Barra"> Cod Barras
      </form>
    </div>

<br/>
<div class="padrao">
  <div class="foo blue">TROCA/DEV</div>
  <div class="foo yellow">BONIFICADO</div>
  <div class="foo red"> QUEBRA </div>
  <div class="foo cinza"> INATIVO </div>
  
   <div class="my-3 p-3 bg-body rounded shadow-sm">
    <div class="d-flex text-body-secondary pt-3">
      <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
      <p class="pb-3 mb-0 small lh-sm border-bottom">
             </p>
    </div>
</div>
<br>
<br/>
<br/>
<div class='view-index redireciona'>
  <div class="container">
    <div class="row row-cols-7">
      <div class="col">ID</div>
      <div class="col">FORNECEDOR</div>
      <div class="col">RECOLHIMENTO</div>
      <div class="col" title="[P/P : Produto por Produto] [Ava/Venc : Avaria e Vencimento]">CONDIÇÃO</div>
      <div class="col">TELA</div>
      <div class="col">COMPRADOR</div>
      <div class="col">QUEM RECEBE</div>
    </div>
  </div>
</div>

<?php
if(isset($_POST['Botao-Pesquisar'])):
  require_once '../back-sistema/conexao.php';    
  $pesquisar          = strip_tags(mysqli_escape_string($conectar,htmlspecialchars($_POST['pesquisar'])));
  $sql                = "SELECT * FROM Fornecedor_lista where NOME_FORNECEDOR like '$pesquisar%' order by ESTADO";
  $consulta_sql_index = mysqli_query($conectar,$sql);
    
  if(mysqli_num_rows($consulta_sql_index) == 0 || $pesquisar == ''):
    echo '<div class="controle-view estado-nao-encontrado">'.
    '<pre>      Error, registro não encontrado.</pre>';
  else:
    foreach($consulta_sql_index as $contagem):
      if($contagem['ESTADO'] == 1):
        echo"<div class='controle-view estado-com-troca redireciona' onclick='redireciona(`$contagem[ID]`,`$contagem[NOME_FORNECEDOR]`,`$contagem[COMPRADOR]`,`$contagem[ESTADO]`,`$contagem[TROCA_COND]`,`$contagem[RECOLHIMENTO]`,`$contagem[TELA]`,`$contagem[QUEM_RECEBE]`,`$contagem[STATUS_GERAL]`);'>".
        '<div class="container">'.
        '<div class="row row-cols-7">'.
        '<div class="col">'.$contagem['ID'].'</div>'.
        '<div class="col">'.$contagem['NOME_FORNECEDOR'].'</div>'.
        '<div class="col">'.$contagem['RECOLHIMENTO'].'</div>'.
        '<div class="col">'.$contagem['TROCA_COND'].'</div>'.
        '<div class="col">'.$contagem['TELA'].'</div>'.
        '<div class="col">'.$contagem['COMPRADOR'].'</div>'.
        '<div class="col">'.$contagem['QUEM_RECEBE'].'</div>';
        echo '</div>'.'</div>'.'</div>'.'<br/>';

      elseif($contagem['ESTADO'] == 2):
        echo "<div class='controle-view estado-sem-troca redireciona' onclick='redireciona(`$contagem[ID]`,`$contagem[NOME_FORNECEDOR]`,`$contagem[COMPRADOR]`,`$contagem[ESTADO]`,`$contagem[TROCA_COND]`,`$contagem[RECOLHIMENTO]`,`$contagem[TELA]`,`$contagem[QUEM_RECEBE]`,`$contagem[STATUS_GERAL]`);'>".
        '<div class="container">'.
        '<div class="row row-cols-7">'.
        '<div class="col">'.$contagem['ID'].'</div>'.
        '<div class="col">'.$contagem['NOME_FORNECEDOR'].'</div>'.
        '<div class="col">'.$contagem['RECOLHIMENTO'].'</div>'.
        '<div class="col">'.$contagem['TROCA_COND'].'</div>'.
        '<div class="col">'.$contagem['TELA'].'</div>'.
        '<div class="col">'.$contagem['COMPRADOR'].'</div>'.
        '<div class="col">'.$contagem['QUEM_RECEBE'].'</div>';
        echo '</div>'.'</div>'.'</div>'.'<br/>';    
      elseif($contagem['ESTADO'] == 3):
        echo "<div class='controle-view estado-bonificado redireciona' onclick='redireciona(`$contagem[ID]`,`$contagem[NOME_FORNECEDOR]`,`$contagem[COMPRADOR]`,`$contagem[ESTADO]`,`$contagem[TROCA_COND]`,`$contagem[RECOLHIMENTO]`,`$contagem[TELA]`,`$contagem[QUEM_RECEBE]`,`$contagem[STATUS_GERAL]`);'>".
        '<div class="container">'.
        '<div class="row row-cols-7">'.
        '<div class="col">'.$contagem['ID'].'</div>'.
        '<div class="col">'.$contagem['NOME_FORNECEDOR'].'</div>'.
        '<div class="col">'.$contagem['RECOLHIMENTO'].'</div>'.
        '<div class="col">'.$contagem['TROCA_COND'].'</div>'.
        '<div class="col">'.$contagem['TELA'].'</div>'.
        '<div class="col">'.$contagem['COMPRADOR'].'</div>'.
        '<div class="col">'.$contagem['QUEM_RECEBE'].'</div>';
        echo '</div>'.'</div>'.'</div>'.'<br/>';

      elseif($contagem['ESTADO'] == 4):
        echo "<div class='controle-view estado-desabilitado redireciona' onclick='redireciona(`$contagem[ID]`,`$contagem[NOME_FORNECEDOR]`,`$contagem[COMPRADOR]`,`$contagem[ESTADO]`,`$contagem[TROCA_COND]`,`$contagem[RECOLHIMENTO]`,`$contagem[TELA]`,`$contagem[QUEM_RECEBE]`,`$contagem[STATUS_GERAL]`);'>".
        '<div class="container">'.
        '<div class="row row-cols-7">'.
        '<div class="col">'.$contagem['ID'].'</div>'.
        '<div class="col">'.$contagem['NOME_FORNECEDOR'].'</div>'.
        '<div class="col">'.$contagem['RECOLHIMENTO'].'</div>'.
        '<div class="col">'.$contagem['TROCA_COND'].'</div>'.
        '<div class="col">'.$contagem['TELA'].'</div>'.
        '<div class="col">'.$contagem['COMPRADOR'].'</div>'.
        '<div class="col">'.$contagem['QUEM_RECEBE'].'</div>';
        echo '</div>'.'</div>'.'</div>'.'<br/>';
      endif;
    endforeach;
  endif;
mysqli_close($conectar);
endif;
?>
<?php
include 'footer.php';
?>
