
<?php
#includes
require_once 'valida_entrada.php';
require_once '../back-sistema/conexao.php';
include 'header.php'
?>

<table id="tabela-compradores"class="table table-dark table-hover">
  <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">NOME</th>
        <th scope="col">TELEFONE</th>
        <th scope="col">EMAIL</th>
        <th scope="col">STATUS</th>
        <th scope="col">SITUAÇÃO</th>
      </tr>
  </thead>
  <tbody>
        
    <?php
    $comando_sql = 'SELECT * FROM Comprador ORDER BY `STATUS`';
    $visualizar_comprador = mysqli_query($conectar,$comando_sql);
    mysqli_close($conectar);
    foreach($visualizar_comprador as $contador):
      if($contador['STATUS'] == 'Ativo' ):
        echo  "<tr onclick='funcao_alterar_comprador(`$contador[ID]`,`$contador[NOME]`,`$contador[TELEFONE]`,`$contador[EMAIL]`,`$contador[STATUS]`,`$contador[SITUACAO]`);'>"
        .'<th scope="row">'.$contador['ID'].'</th>'
        ."<td class='situacao-ativo'>".$contador['NOME'].'</td>'
        .'<td class="situacao-ativo">'.$contador['TELEFONE'].'</td>'.
        '<td class="situacao-ativo">'.$contador['EMAIL'].' </td>'.
        '<td class="situacao-ativo">'.$contador['STATUS'].'</td>'.
        '<td class="situacao-ativo">'.$contador['SITUACAO'].'</td>'.
        '</tr>';
      elseif($contador['STATUS'] == 'Inativo'):
        echo  "<tr onclick='funcao_alterar_comprador(`$contador[ID]`,`$contador[NOME]`,`$contador[TELEFONE]`,`$contador[EMAIL]`,`$contador[STATUS]`,`$contador[SITUACAO]`);'>"
        .'<th scope="row">'.$contador['ID'].'</th>'
        .'<td class="situacao-inativo">'.$contador['NOME'].'</td>'
        .'<td class="situacao-inativo">'.$contador['TELEFONE'].'</td>'.
        '<td class="situacao-inativo">'.$contador['EMAIL'].'</td>'.
        '<td class="situacao-inativo">'.$contador['STATUS'].'</td>'.
        '<td class="situacao-inativo">'.$contador['SITUACAO'].'</td>'.
        '</tr>';
      endif;
    endforeach;
    ?>
  </tbody>
</table>

<?php
include 'footer.php';
?>