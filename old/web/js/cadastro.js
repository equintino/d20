 function verificarCheckBox() {
    var check = document.getElementsByName(1); 
    for (var i=0;i<check.length;i++){ 
        if (check[i].checked === true){ 
            alert('CheckBox Marcado... Faça alguma coisa...');

        }  else {
           alert('CheckBox Não Marcado... Faça alguma outra coisa...');
        }
    }
}
function valida(){
    var todos_inputs = document.getElementsByTagName('input'); 
    for (var i=0; i<todos_inputs.length; i++){
        if(todos_inputs[i].checked){
          var custo = custo + todos_inputs[i].id;
          alert(custo);
             if(todos_inputs[i].checked == true){
                   var ok = true;
                   break;
             }
             else
                   var ok = false;
         }
     }
     if (ok == false){
     alert('Selecione a(s) bebida(s) preferida(s)!');
     document.orcamento.bebi1.focus();
     return false;
     }
     alert("Contato enviado com sucesso, em breve entraremos em contato!");
     document.orcamento.submit();
}
function moeda2(valor){
    var x=400-valor;
    document.getElementById('moeda').innerHTML=x;
}

function moeda(saldo) {
    var custo = document.forms[0];
    var saldo;
    var compra = "";
    var i;
    var novoSaldo;
    var checadoOk;
    var checados = new Array();
    var checado;
    for (i = 0; i < custo.length; i++) {
        if (custo[i].checked) {
            compra = (compra*1) + (custo[i].value*1);
            checados.push (i);
            checado = i;
        } 
    }
    if(saldo-compra < 0){
        alert('Você não tem recursos suficiente.');
        novoSaldo = saldo;
        for (i = 0; i < custo.length; i++) {
            custo[i].checked = false;
        }
        
    }else{
        checadosOk = checados;
        novoSaldo = saldo-compra;
    }
    document.getElementById("moeda").innerHTML = novoSaldo;
}
function isNumber(val){
  return typeof val === "number";
}
function abrir(URL) {
  var width = 150;
  var height = 250;
  var left = 99;
  var top = 99;
  window.open(URL,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=yes, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');
}
nome=1;
function mudaImagem2(){
   var link = 'imagens/personagens/viloes/'+nome+'.png';
   var x = '<img height=300px src=\''+link+'\' \>';
   document.getElementById("aqui").innerHTML=x;
   document.cookie = "avatar="+link+"; path=/";
   nome++;
   if(nome > 26){
       nome=1
   }
}