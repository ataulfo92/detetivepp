<?php
require_once 'valida_entrada.php';
require_once '../back-sistema/conexao.php';
include 'header.php';
?>
<div>
  <h4>Gerenciador de Contas</h4>
</div>
<br/>
<table id="tabela-compradores"class="table table-dark table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NOME</th>
      <th scope="col">EMAIL</th>
      <th scope="col">CONTA</th>
      <th scope="col">STATUS</th> 
    </tr>
  </thead>
  <tbody>      
    <?php
      
      $comando_sql = "SELECT * FROM conta WHERE NOT ID='45' ORDER BY TIPO ";
      $visualizar_contas = mysqli_query($conectar,$comando_sql);
      while($contador = mysqli_fetch_array($visualizar_contas)):
        if($contador['STATUS'] == 'Ativo' ):
          echo  "<tr onclick='funcao_alterar_conta(`$contador[ID]`,`$contador[NOME]`,`$contador[EMAIL]`,`$contador[TIPO]`,`$contador[STATUS]`,`$contador[FOTO]`);'>"
          .'<th scope="row">'.$contador['ID'].'</th>'
          ."<td class='situacao-ativo'>".$contador['NOME'].'</td>'
          .'<td class="situacao-ativo">'.$contador['EMAIL'].'</td>'.
          '<td class="situacao-ativo">'.$contador['TIPO'].' </td>'.
          '<td class="situacao-ativo">'.$contador['STATUS'].'</td>'.
          '</tr>';
        elseif($contador['STATUS'] == 'Inativo'):
          echo  "<tr onclick='funcao_alterar_conta(`$contador[ID]`,`$contador[NOME]`,`$contador[EMAIL]`,`$contador[TIPO]`,`$contador[STATUS]`,`$contador[FOTO]`);'>"
          .'<th scope="row">'.$contador['ID'].'</th>'
          .'<td class="situacao-inativo">'.$contador['NOME'].'</td>'
          .'<td class="situacao-inativo">'.$contador['EMAIL'].'</td>'.
          '<td class="situacao-inativo">'.$contador['TIPO'].'</td>'.
          '<td class="situacao-inativo">'.$contador['STATUS'].'</td>'.
          '</tr>';
        endif;
      endwhile;
      mysqli_close($conectar);
    ?>
  </tbody>
</table>
<?php
include 'footer.php';
?>