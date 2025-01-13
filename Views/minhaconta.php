<?php
require_once 'valida_entrada.php';
?>
<?php
include      'header.php';
?>
<div class="input-cadastro">
  <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
    <legend>Alterar conta</legend><br/>
    Nome:  <input type="text" name="NOME" maxlenght="20" autofocus="on"  pattern="[ABCDEFGHIJLMNOPQRSWYTKÇUVXZabcdefghijlmnopqrysktwuvxzç' ']+$" value='<?php echo $_SESSION['NOME'];?>'>
    <br/>
    <br/>
    Email: <input type="email" name="EMAIL" maxlenght="40" style="margin-left:-1px" value='<?php echo $_SESSION['EMAIL'];?>'>
    <br/>
    <br/>
    Senha: <input type="password" name="SENHA" maxlenght="20" style="margin-left:-1px">
    <br/>
    <br/>
    <input type="submit"     name="Adicionar"   value="Alterar"  class="botao-estilo">
</div>
<?php
if(isset($_POST['Adicionar'])):
  require_once '../back-sistema/conexao.php';
  $OPTIONS = ['cost'=>10];
  $ID      = $_SESSION['ID'];
  $NOME    = ucfirst(mysqli_real_escape_string($conectar,htmlspecialchars($_POST['NOME']))); //OK
  $EMAIL   = mysqli_real_escape_string($conectar,htmlspecialchars($_POST['EMAIL']));//OK
  $SENHA   = password_hash(mysqli_real_escape_string($conectar,htmlspecialchars($_POST['SENHA'])),PASSWORD_DEFAULT,$OPTIONS);//OK

  if($NOME == '' || $EMAIL == '' || $SENHA == ''):
    echo '<script>alert("Aviso os campos não podem ser vazios");</script>';
  
  else:
    $sql = "UPDATE conta SET `NOME`='$NOME', `EMAIL`='$EMAIL', `SENHA`='$SENHA' WHERE `ID`='$ID'";
    $alterar_conta = mysqli_query($conectar,$sql);
    mysqli_close($conectar);
    echo '<script>alert("E necessário logar novamente");</script>';
    if($alterar_conta == true):
      echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">';
      echo '<symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">';
      echo '<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>';
      echo '</symbol>';
      echo '<div class="alert alert-success d-flex align-items-center" role="alert">';
      echo '<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>';
      echo '<div>';
      echo "Dados da conta alterado com sucesso!".'<br/>.<br/>.<br/>.<br/>.<br/>';
      echo '</div>';
      echo '</div>';
    elseif($alterar_conta == false || empty($alterar_conta)):
      echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">';
      echo '<symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">';
      echo '<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>';
      echo '</symbol>';
      echo '<div class="alert alert-danger d-flex align-items-center" role="alert">';
      echo '<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>';
      echo '<div>';
      echo "Erro na alteração da conta ".$_SESSION['NOME']." campo nome vazio ou erro na conexão";
      echo '</div>';
      echo '</div>'; 
    endif;
  endif;
  session_unset();
  session_destroy();
  header('refresh:2;index.php');
endif;
?>
<?php
require_once 'footer.php';
?>