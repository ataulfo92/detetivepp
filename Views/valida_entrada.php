<?php
session_start();
if(!isset($_SESSION['ID'])):
  exit();
  header('Location:index.php');
else:
  if($_SESSION['TIPO'] != 'Admin'):
    echo"<script>alert('Acesso restrito');</script>";
    header('Location:index2.php');
  endif;
endif;
?>