<?php
  require_once '../back-sistema/conexao.php';
  require_once 'valida_entrada.php';
  include 'header.php';
  $sql    = 'SELECT NOME FROM Comprador';
  $listar = mysqli_query($conectar,$sql);
?>
  
<h4 class="titulo-lista-fornecedores">LISTA DE FORNECEDORES ASSOCIADO AO COMPRADOR <br/>  PESQUISA AVANÇADA</h4>
<div class="posicao-filtro">
  <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
    Comprador: 
    <select name="COMPRADOR" id="Status_Comprador">
      <?php foreach($listar as $NOMES){
      echo "<option value=".$NOMES['NOME'].">".$NOMES['NOME']."</option>";
      }
      ?>
    </select>
    <input type="submit" class="botao-estilo" name="Pesquisar" value="Pesquisar" onclick="nome_comprador();">
    <br/>
    <div id="campo_checkbox">
      <input type="radio"  name="FILTRO"          value="1"> Troca dev<br/>
      <input type="radio"  name="FILTRO"          value="2"> Quebra <br/>
      <input type="radio"  name="FILTRO"          value="3"> Bonificado<br/>
      <input type="radio"  name="FILTRO"          value="4"checked> Todos
    </div>
  </form>
</div>
<br/>
<div class='VIEW-Lista-Fornecedor redireciona'>
  <div class="container">
    <div class="row row-cols-7">
      <div class="col">ID</div>
      <div class="col">FORNECEDOR</div>
      <div class="col">RECOLHIMENTO</div>
      <div class="col" title="[P/P : Produto por Produto] [Ava/Venc : Avaria e Vencimento]">CONDIÇÃO</div>
      <div class="col">COMPRADOR</div>
      <div class="col">QUEM RECEBE</div>
    </div>
  </div>
</div>

<?php
if(isset($_POST['Pesquisar'])):
  require_once '../back-sistema/conexao.php';
 
  $COMPRADOR          = $_POST['COMPRADOR'];
  $FILTRO             = $_POST['FILTRO'];
  
  $sql     = "SELECT * FROM Fornecedor_lista WHERE COMPRADOR ='$COMPRADOR' ORDER BY ESTADO"; 
  $consulta_sql_index = mysqli_query($conectar,$sql);
  if(mysqli_num_rows($consulta_sql_index) == 0):
    echo '<div class="controle-view estado-nao-encontrado">'.
    '<pre>      Error, registro não encontrado.</pre>';
  else:
    foreach($consulta_sql_index as $contagem):
      if($contagem['ESTADO']==1):
        echo "<div class='controle-view estado-com-troca redireciona'>".
        '<div class="container">'.
        '<div class="row row-cols-7">'.
        '<div class="col">'.$contagem['ID'].'</div>'.
        '<div class="col">'.$contagem['NOME_FORNECEDOR'].'</div>'.
        '<div class="col">'.$contagem['RECOLHIMENTO'].'</div>'.
        '<div class="col">'.$contagem['TROCA_COND'].'</div>'.
        '<div class="col">'.$contagem['COMPRADOR'].'</div>'.
        '<div class="col">'.$contagem['QUEM_RECEBE'].'</div>';
        echo '</div>'.'</div>'.'</div>'.'<br/>';
  
      elseif($contagem['ESTADO'] == 2):
        echo "<div class='controle-view estado-sem-troca redireciona'>".
        '<div class="container">'.
        '<div class="row row-cols-7">'.
        '<div class="col">'.$contagem['ID'].'</div>'.
        '<div class="col">'.$contagem['NOME_FORNECEDOR'].'</div>'.
        '<div class="col">'.$contagem['RECOLHIMENTO'].'</div>'.
        '<div class="col">'.$contagem['TROCA_COND'].'</div>'.
        '<div class="col">'.$contagem['COMPRADOR'].'</div>'.
        '<div class="col">'.$contagem['QUEM_RECEBE'].'</div>';
        echo '</div>'.'</div>'.'</div>'.'<br/>';
        
      elseif($contagem['ESTADO'] == 3):
        echo "<div class='controle-view estado-bonificado redireciona'>".
        '<div class="container">'.
        '<div class="row row-cols-7">'.
        '<div class="col">'.$contagem['ID'].'</div>'.
        '<div class="col">'.$contagem['NOME_FORNECEDOR'].'</div>'.
        '<div class="col">'.$contagem['RECOLHIMENTO'].'</div>'.
        '<div class="col">'.$contagem['TROCA_COND'].'</div>'.
        '<div class="col">'.$contagem['COMPRADOR'].'</div>'.
        '<div class="col">'.$contagem['QUEM_RECEBE'].'</div>';
        echo '</div>'.'</div>'.'</div>'.'<br/>';
   
      elseif($contagem['ESTADO'] == 4):
        echo "<div class='controle-view estado-desabilitado redireciona'>".
        '<div class="container">'.
        '<div class="row row-cols-7">'.
        '<div class="col">'.$contagem['ID'].'</div>'.
        '<div class="col">'.$contagem['NOME_FORNECEDOR'].'</div>'.
        '<div class="col">'.$contagem['RECOLHIMENTO'].'</div>'.
        '<div class="col">'.$contagem['TROCA_COND'].'</div>'.
        '<div class="col">'.$contagem['COMPRADOR'].'</div>'.
        '<div class="col">'.$contagem['QUEM_RECEBE'].'</div>';
        echo '</div>'.'</div>'.'</div>'.'<br/>';     
      endif;
    endforeach;
  endif; 
endif;
mysqli_close($conectar);
?>
<?php
include 'footer.php';
?>