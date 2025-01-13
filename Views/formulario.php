<?php
include 'valida_entrada.php';
include 'header.php';
?>
<div id="cadastro">
  <legend>CADASTRO ANALISTA</legend>
  <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
    <div class="m-b-sm">
      <input type="hidden" name="defotoa" value="<?php echo $defotom; ?>">
      <label title="Alterar Foto" for="defotom" class="btn btn-success" value="<?php echo $defotom; ?>">
      [Imagem de perfil]<br/><input type="file" name="foto" accept=".jpeg" id="foto"><br/><br/>
    </div>
    Nome: <br/><input type="text"      maxlength="20" name="nome" autofocus="on" pattern="[ABCDEFGHIJLMNOPQRSWYTKÇUVXZabcdefghijlmnopqrysktwuvxzç' ']+$"><br/>
    Email:<br/><input type="email"     maxlength="40" name="email" style="margin-left:-1px;"><br/>
    Senha:<br/><input type="password"  maxlength="12" name="senha" style="margin-left:-1px;"><br/>
    
    Tipo de conta:<br/>
    <select name="opcao-conta">
      <option value="0">Usuario</option>
      <option value="1">Admin</option>   
    </select>
    <br/>
    <br/>
    <input type="submit" name="botao-cadastrar" value="Cadastrar">   
  </form>
<?php
 include 'footer.php';
 require_once '../back-sistema/conexao.php';

  if(isset($_POST['botao-cadastrar'])):


  //custo 10 para a senha ficar forte
  $options = ['cost'=>10];
  $NOME    = ucfirst(mysqli_real_escape_string($conectar,htmlspecialchars($_POST['nome']))); //OK
  $EMAIL   = mysqli_real_escape_string($conectar,htmlspecialchars($_POST['email']));//OK
  $SENHA   = password_hash(mysqli_real_escape_string($conectar,htmlspecialchars($_POST['senha'])),PASSWORD_DEFAULT,$options);
  $TIPO    = $_POST['opcao-conta'];
  $STATUS  = 'Ativo';
  $defoto  = "";
  
  $imagem_convertida    = basename(uniqid($_FILES['name'])).'.jpeg';
  $uploaddir            = $_SERVER['DOCUMENT_ROOT'].'/detective-producao/detectiveproducao/perfil/';
  $uploadfile           = $uploaddir . $imagem_convertida;
  $nome_arquivo         = $imagem_convertida;

  if(move_uploaded_file($_FILES['foto']['tmp_name'], $uploadfile)):  
    $defoto  = '../perfil/'.$nome_arquivo;
  else:
    $defoto = '../perfil/utilizador.png';
  endif;

  $width  = 380;
  $height = 100;
  list($width_origin, $height_origin) = getimagesize($defoto);
  
  $ratio_origin = $width_origin/$height_origin;
  if($width/$height > $ratio_origin):
      $width = $ratio_origin*$height;
  else:
      $height = $ratio_origin*$width;
  endif;

  header('Content-Type: image/jpg');
  $Tamanho_imagem = imagecreatetruecolor($width,$height);
  $nova_imagem    = imagecreatefromjpeg($uploadfile);
                    
  imagecopyresampled($Tamanho_imagem,$nova_imagem, 0, 0, 0, 0,$width,$height,$width_origin,$height_origin);
  $salvar_nova_imagem =  $defoto;
  unlink($defoto);
  imagejpeg($Tamanho_imagem,$salvar_nova_imagem, 75);

  if($TIPO == '1'):
    $TIPO = 'Admin';
  else:
    $TIPO = 'Usuario';
  endif;

  $sql_consulta_verificacao    = "SELECT NOME FROM conta WHERE  NOME = '$NOME'";
  $verifica_registro_existente = mysqli_query($conectar,$sql_consulta_verificacao);

  //Caso não houver registro executará a condição
  if(mysqli_num_rows($verifica_registro_existente) == 0 && $NOME != ''):
    $sql = "INSERT INTO conta(`NOME`, `EMAIL`, `SENHA`,`TIPO`,`STATUS`,`FOTO`)VALUES('$NOME', '$EMAIL', '$SENHA','$TIPO','$STATUS','$salvar_nova_imagem');";
    $Inserir_dados  = mysqli_query($conectar,$sql);
  if($Inserir_dados == true):
    echo '<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>';
    echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">';
    echo '<symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">';
    echo '<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>';
    echo '</symbol>';
    echo '<div class="alert alert-success d-flex align-items-center" role="alert">';
    echo '<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>';
    echo '<div>';
    echo "Conta $NOME criado com sucesso!";
    echo '</div>';
    echo '</div>';

  elseif($Inserir_dados == false || empty($Inserir_dados)):
    echo '<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>';
    echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">';
    echo '<symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">';
    echo '<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>';
    echo '</symbol>';
    echo '<div class="alert alert-danger d-flex align-items-center" role="alert">';
    echo '<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>';
    echo '<div>';
    echo "Erro na gravação do $NOME campo nome vazio ou erro na conexão";
    echo '</div>';
    echo '</div>'; 
  endif;
  elseif($NOME == ''):
    echo '<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>';
    echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">';
    echo '<symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">';
    echo '<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>';
    echo '</symbol>';
    echo '<div class="alert alert-danger d-flex align-items-center" role="alert">';
    echo '<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>';
    echo '<div>';
    echo "Erro na gravação do $NOME campo nome vazio ou erro na conexão";
    echo '</div>';
    echo '</div>';
  else:
    echo '<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>';
    echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">';
    echo '<symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">';
    echo '<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>';
    echo '</symbol>';
    echo '<div class="alert alert-warning d-flex align-items-center" role="alert" autofocus="on">';
    echo '<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>';
    echo '<div>';
    echo "Aviso o $NOME já se encontra registrado!";
    echo '</div>';
    echo '</div>';
  endif;
endif;
mysqli_close($conectar);

?>


