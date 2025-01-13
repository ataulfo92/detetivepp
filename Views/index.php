<!doctype html>
<head>
    <meta charset="utf-8">
    <meta name="viewport"     content="width=device-width, initial-scale=1">
    <meta name="description"  content="Sistema controle de troca">
    <meta name="autor"        content="Vilagrant Ataulfo">
    <meta name="theme-color" content="#7952b3">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/signin.css" rel="stylesheet">    
    <link rel="shortcut icon" href="../imagens/favicon.ico" type="image/x-icon" />

</head>
<body class="text-center">
<title>Login Detective Supplier</title>

<main class="form-signin">
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <img class="mb-4" src="../imagens/detective-64.png"id="imagem-login" alt="" width="62" height="57">
    <h1 class="h3 mb-3 fw-normal">Detective Supplier - Login</h1>

    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" required>
      <label for="floatingInput">Email</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" name="senha" placeholder="Password" maxlength="14">
      <label for="floatingPassword">Senha</label>
    </div>
  
  <div class="checkbox mb-3">
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit"name="logar">Entrar</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2021–2022</p>


<?php
  session_start();
  if(isset($_POST['logar'])):

    require_once '../back-sistema/conexao.php';

    $resultado = array();
    $email     = mysqli_escape_string($conectar,htmlspecialchars($_POST['email']));
    $senha     = mysqli_escape_string($conectar,htmlspecialchars($_POST['senha']));
    $sql       = "select * from conta where EMAIL='$email'";
    $resultado = mysqli_fetch_array(mysqli_query($conectar,$sql));
    $comparar_senha = $resultado['SENHA'];
    mysqli_close($conectar); 

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
  else:
    session_unset();
    session_destroy();
  endif; 
?>
<?php
include 'parteLogin2.php';
?>