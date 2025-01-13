<?php
    

$im = imagecreatefromjpeg('/home/ataulfo/diretorio_html/detective-producao/detectiveproducao/perfil/6329bde14a391.jpeg');
  

header('Content-type: image/jpg');  
imagejpeg($im);
imagedestroy($im);
?>