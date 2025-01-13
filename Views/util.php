<?php

function selecao_estado_troca($OPERACAO){
  switch($OPERACAO):
    case '1':
      return 'Loja / Avaria';
      break;
    case '2':
      return 'Quebra Operacional';
      break;
    case '3':
      return 'Quebra Bonificada';
      break;
    case '4':
      return 'Quebra Operacional';
      break;  
  endswitch;
}

function selecao_estado_filtro($FILTRO,$COMPRADOR){

  switch($FILTRO){
    case 1:
      return 1;  
    break;
    case 2:
      return 2;
    break;  
    case 3:
      return 3;
    break;
    case 4:
      return "SELECT * FROM Fornecedor_lista WHERE COMPRADOR ='$COMPRADOR' ORDER BY ESTADO";
     break;

  }


}



?>