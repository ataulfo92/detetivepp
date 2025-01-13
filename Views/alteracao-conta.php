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
    require_once '../back-sistema/conexao.php';

    function deleta_perfil_foto($avalia){

    if($avalia != "../perfil/utilizador.png"):
      unlink($avalia);
    endif;  
    }

    $OPTIONS = ['cost'=>10]; 
    $ID      = $_POST['ID'];
    $NOME    = ucfirst(mysqli_real_escape_string($conectar,htmlspecialchars($_POST['NOME']))); //OK
    $EMAIL   = mysqli_real_escape_string($conectar,htmlspecialchars($_POST["EMAIL"])); //OK
    $SENHA   = password_hash(mysqli_real_escape_string($conectar,htmlspecialchars($_POST['SENHA'])),PASSWORD_DEFAULT,$OPTIONS);
    $TIPO    = $_POST['conta']; //OK
    $STATUS  = $_POST["TIPO_STATUS"];//OK

    if(isset($_POST['Adicionar'])):

      if($SENHA == ''): 
        $sql_alterar = "UPDATE conta SET `NOME`='$NOME',`EMAIL`='$EMAIL', `TIPO`='$TIPO', `STATUS`='$STATUS'  WHERE `ID`='$ID'";
        $Inserir_dados = mysqli_query($conectar,$sql_alterar);

      elseif($SENHA != ''):
        $sql_alterar = "UPDATE conta SET `NOME`='$NOME',`EMAIL`='$EMAIL',`SENHA`='$SENHA', `TIPO`='$TIPO', `STATUS`='$STATUS'  WHERE `ID`='$ID'";
        $Inserir_dados = mysqli_query($conectar,$sql_alterar);
      endif;
    if($Inserir_dados):
      echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">';
      echo '<symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">';
      echo '<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>';
      echo '</symbol>';
      echo '<div class="alert alert-success d-flex align-items-center" role="alert">';
      echo '<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>';
      echo '<div>';
      echo "Dados da conta $NOME alterado com sucesso!";
      echo '</div>';
      echo '</div>';
    else:
      echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">';
      echo '<symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">';
      echo '<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>';
      echo '</symbol>';
      echo '<div class="alert alert-danger d-flex align-items-center" role="alert">';
      echo '<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>';
      echo '<div>';
      echo "Erro na alteração da conta $NOME";
      echo '</div>';
      echo '</div>';
    endif;
    elseif(isset($_POST['Deletar'])):
  
      $FOTO = $_POST['FOTO'];  
      deleta_perfil_foto($FOTO);
      $sql_deletar = "DELETE FROM conta WHERE `ID`='$ID'";
      $Deletar_dados = mysqli_query($conectar,$sql_deletar);
    
      if($Deletar_dados == true):
        echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">';
        echo '<symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">';
        echo '<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>';
        echo '</symbol>';
        echo '<div class="alert alert-danger d-flex align-items-center" role="alert">';
        echo '<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>';
        echo '<div>';
        echo "Conta $NOME excluído com sucesso!";
        echo '</div>';
        echo '</div>';
      else:
        echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">';
        echo '<symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">';
        echo '<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>';
        echo '</symbol>';
        echo '<div class="alert alert-danger d-flex align-items-center" role="alert">';
        echo '<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>';
        echo '<div>';
        echo "Erro na exclusão da conta $NOME";
        echo header("refresh: 5;");
        echo '</div>';
        echo '</div>';
      endif; 
    endif;
    mysqli_close($conectar);
  ?>
</body>
</html>