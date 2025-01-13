function redireciona(ID,NOME,COMPRADOR,ESTADO,CONDICAO,RECOLHIMENTO,TELA,RECEBE,STATUS_GERAL){
window.open('altera_fornecedor.php?id='+ID+'&nome='+NOME+'&comprador='+COMPRADOR+'&troca='+ESTADO+'&condicao='+CONDICAO+'&recolhimento='+RECOLHIMENTO+'&tela='+TELA+'&recebe='+RECEBE+'&status='+STATUS_GERAL+'',"DescriptiveWindowName","left=100,top=100,width=600,height=560");
}
function funcao_alterar_conta(ID,NOME,EMAIL,CONTA,STATUS,FOTO){
window.open('alterarconta.php?id='+ID+'&nome='+NOME+'&email='+EMAIL+'&conta='+CONTA+'&status='+STATUS+'&foto='+FOTO+'',"DescriptiveWindowName","left=100,top=100,width=520,height=440");
}    
function funcao_alterar_comprador(ID,NOME,TELEFONE,EMAIL,STATUS,SITUACAO){
window.open('atualizar_comprador.php?id='+ID+'&nome='+NOME+'&telefone='+TELEFONE+'&email='+EMAIL+'&status='+STATUS+'&situacao='+SITUACAO+'',"DescriptiveWindowName","left=100,top=100,width=650,height=560");
}

function botao_cadastro_comprador(){
window.open('cadastro_comprador.php',"DescriptiveWindowName", "left=100,top=100,width=650,height=560");

}