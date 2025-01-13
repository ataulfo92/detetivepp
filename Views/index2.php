<?php
session_start();
if(!isset($_SESSION['ID'])):
  exit();
  header('Location:index.php');
else:
  if($_SESSION['TIPO'] == 'Admin'):
    header('Location:painel.php');
  endif;
endif;
  ?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta lang="pt-br">
    <meta name="Autor" content="Vilagrant Ataulfo">
    <link href="../imagens/detective-16.png">
    <link href="../imagens/favicon.ico"    rel="shortcut icon"  type="image/x-icon" />
    <link href="../css/bootstrap.min.css"  rel="stylesheet">
    <link href="../css/config.css"         rel="stylesheet">
    <link href="../css/color.css"          rel="stylesheet">
    <link href="../css/formulario.css"     rel="stylesheet" >
    <title>Sistema Detective Supplier</title>
</head>
<body>
<br/>
<h3 id="texto-titulo">Bem vindo ao Detective Supplier <img src="../imagens/detective-64.png"></h3>
<span class="meuspan">PREVENÇÃO DE PERDAS</span>
<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 210px; margin-top:30px">
  <a href="painel.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-incognito" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="m4.736 1.968-.892 3.269-.014.058C2.113 5.568 1 6.006 1 6.5 1 7.328 4.134 8 8 8s7-.672 7-1.5c0-.494-1.113-.932-2.83-1.205a1.032 1.032 0 0 0-.014-.058l-.892-3.27c-.146-.533-.698-.849-1.239-.734C9.411 1.363 8.62 1.5 8 1.5c-.62 0-1.411-.136-2.025-.267-.541-.115-1.093.2-1.239.735Zm.015 3.867a.25.25 0 0 1 .274-.224c.9.092 1.91.143 2.975.143a29.58 29.58 0 0 0 2.975-.143.25.25 0 0 1 .05.498c-.918.093-1.944.145-3.025.145s-2.107-.052-3.025-.145a.25.25 0 0 1-.224-.274ZM3.5 10h2a.5.5 0 0 1 .5.5v1a1.5 1.5 0 0 1-3 0v-1a.5.5 0 0 1 .5-.5Zm-1.5.5c0-.175.03-.344.085-.5H2a.5.5 0 0 1 0-1h3.5a1.5 1.5 0 0 1 1.488 1.312 3.5 3.5 0 0 1 2.024 0A1.5 1.5 0 0 1 10.5 9H14a.5.5 0 0 1 0 1h-.085c.055.156.085.325.085.5v1a2.5 2.5 0 0 1-5 0v-.14l-.21-.07a2.5 2.5 0 0 0-1.58 0l-.21.07v.14a2.5 2.5 0 0 1-5 0v-1Zm8.5-.5h2a.5.5 0 0 1 .5.5v1a1.5 1.5 0 0 1-3 0v-1a.5.5 0 0 1 .5-.5Z"/>
    </svg>
      <span class="fs-4">PAINEL</span>
  </a>
  <hr>
  <ul class="nav nav-pills flex-column mb-auto">
    <li class="selecionar dropdown-item">
      <a href="cadastro.php" class="nav-link text-white" aria-current="page">
        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
          <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
        </svg>
        Cadastro
      </a>
    </li>
    <li class="selecionar dropdown-item">
      <a href="lista_compradores.php" class="nav-link text-white">
        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
          <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
          <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
          <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
        </svg>
        Compradores
      </a>
    </li>
    <li class="selecionar dropdown-item">
        <a href="lista_fornecedores.php" class="nav-link text-white">
          <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-book-fill" viewBox="0 0 16 16">
            <path d="M8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
          </svg>
          Fornecedores
        </a>
    </li>
  </ul>
  <hr>
  <div class="dropdown">
    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
      <img alt="" width="32" height="32" class="rounded-circle me-2" src="<?php echo $_SESSION['FOTO']; ?>"/>     
      <strong><?php echo $_SESSION['NOME'];?></strong>
    </a>
    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
      <li><a class="dropdown-item"><strong><?php echo $_SESSION['TIPO'];?></strong></a></li>
      <li><a class="dropdown-item" href="formulario.php">Cadastrar conta</a></li> 
      <li><a class="dropdown-item" href="gerenciador.php">Gerenciador de contas</a></li> 
      <li><a class="dropdown-item" href="minhaconta.php">Configurações</a></li>
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item" href="index.php">Sair</a></li>
    </ul>
  </div>
</div>
    <div class="filtro-index">
      <form action="<?php $_SERVER['PHP_SELF'];?>"  method="post">
        <input type="search" name="pesquisar"       id="pesquisar_estilo"   placeholder="Nome do fornecedor" autofocus="on"> 
        <input type="submit" name="Botao-Pesquisar" value="Pesquisar"       class="botao-estilo">
        <input type="radio"  name="Filtro"          value="Nome_Fornecedor" checked> Nome
        <input type="radio"  name="Filtro"          value="Cod_Barra"> Cod Barras
      </form>
    </div>
<br/>
<div class="padrao">
    <div class="foo blue">COM TROCA</div>
    <div class="foo yellow">BONIFICADO</div>
    <div class="foo red"> SEM TROCA </div>
    <div class="foo cinza"> INATIVO </div>
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
  $pesquisar          = mysqli_real_escape_string($conectar,htmlspecialchars($_POST['pesquisar']));
  $sql                = "SELECT * FROM Fornecedor_lista WHERE NOME_FORNECEDOR LIKE '$pesquisar%' order by ESTADO";
  $consulta_sql_index = mysqli_query($conectar,$sql);

  if(mysqli_num_rows($consulta_sql_index) == 0 || $pesquisar == ''):
    echo '<div class="controle-view estado-nao-encontrado">'.
    '<pre>      Error, registro não encontrado.</pre>';
  else:
    foreach($consulta_sql_index as $contagem):
      if($contagem['ESTADO'] == 1):
        echo"<div class='controle-view estado-com-troca redireciona'>".
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
        echo "<div class='controle-view estado-sem-troca redireciona'>".
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
        echo "<div class='controle-view estado-bonificado redireciona'>".
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
        echo "<div class='controle-view estado-desabilitado redireciona'>".
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
<script src="js/arquivo.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>