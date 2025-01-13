<?php

session_start();

if(isset($_POST['logar'])):

  require_once 'back-sistema/conexao.php';
  
  $resultado = array();
  $email     = mysqli_escape_string($conectar,htmlspecialchars($_POST['email']));
  $senha     = mysqli_escape_string($conectar,htmlspecialchars($_POST['senha']));
  $sql       = "SELECT * FROM conta WHERE EMAIL='$email'";
  $resultado = mysqli_fetch_array(mysqli_query($conectar,$sql));
  mysqli_close($conectar);
  $comparar_senha = $resultado['SENHA'];
  
  if(password_verify($senha,$comparar_senha)):
                      
    $_SESSION['ID']     =  $resultado['ID'];
    $_SESSION['NOME']   =  $resultado['NOME'];
    $_SESSION['EMAIL']  =  $resultado['EMAIL'];
    $_SESSION['TIPO']   =  $resultado['TIPO'];
    $_SESSION['STATUS'] =  $resultado['STATUS'];
    $_SESSION['FOTO']   =  $resultado['FOTO'];

    if($_SESSION['STATUS'] == 'Ativo'):
      if($_SESSION['TIPO'] == 'Admin'):
        header('Location:painel.php');
      else:
        header('Location:index2.php');
      endif;
    else:
      header("refresh:1;index.php");
      echo '<script>alert("Sua conta está inativa")</script>';
    endif;
  else:
    header("refresh:1;url=index.php");
    session_unset();
    session_destroy(); 
    echo '<script>alert("Senha ou email Não correspondem")</script>';
  endif;
endif;

?>