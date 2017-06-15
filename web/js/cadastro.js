   $(document).ready(function(){
        $("#aqui").fadeIn("slow");

    
    $('#trocaAvatar').click(function(event){
        event.preventDefault();
        $("#aqui").hide();
        //$(".ocultar").hide("slower")
    });
    
    $('#trocaAvatar').click(function(event){
        event.preventDefault();
        $("#aqui").fadeIn("slow");
        //$(".ocultar").show("slower");
    });
    $('#myClasse').click(function(event){
        event.preventDefault();
        $("#aqui").hide();
        //$(".ocultar").hide("slower")
    });
    
    $('#myClasse').click(function(event){
        event.preventDefault();
        $("#aqui").fadeIn("slow");
        //$(".ocultar").show("slower");
    });
    $('#mySelect').click(function(event){
        event.preventDefault();
        $("#aqui").hide();
        //$(".ocultar").hide("slower")
    });
    
    $('#mySelect').click(function(event){
        event.preventDefault();
        $("#aqui").fadeIn("slow");
        //$(".ocultar").show("slower");
    });
 });
    function functionSexoClasse(){
        idavatar=1;
        raca = document.getElementById('mySelect').value;
        classe = document.getElementById('myClasse').value;
        sexo = document.getElementsByName('sexo');
        for(i=0;i<sexo.length;i++){
            if(sexo[0].checked==true){
                sexo = 'M';
            }else if(sexo[1].checked==true){
                sexo = 'F';
            }else{
                sexo = false;
            }
        }
        link = '../web/imagens/personagens/'+raca+'/'+classe+'/'+sexo+'/'+idavatar+'.png';
        if(raca != false && classe != false && sexo != false){
            document.getElementById('aqui').innerHTML='<img height=200px src='+link+' />';
            document.cookie = "avatar="+link+"; path=/";
        }
        document.querySelector('.avatarPersonagem').style.display='block';
    }
  function myFunction(){
        idavatar=1;
        raca = document.getElementById('mySelect').value;
        classe = document.getElementById('myClasse').value;
        sexo = document.getElementsByName('sexo');
        for(i=0;i<sexo.length;i++){
            if(sexo[0].checked==true){
               sexo = 'M';
            }else if(sexo[1].checked==true){
               sexo = 'F';
            }
        }
        link = '../web/imagens/personagens/'+raca+'/'+classe+'/'+sexo+'/'+idavatar+'.png';
    if(classe != false && raca != false && sexo != false){
        document.getElementById('aqui').innerHTML='<img height=200px src='+link+' />';
        document.cookie = "avatar="+link+"; path=/";
    }
    if(raca=='humano'){
      var y = 'Humanos uma raça muito comum e muitas vezes escolhida, boa para iniciantes no RPG, é uma raça neutra, sem benefícios ou malefícios, os humanos não tem nenhuma vantagem ou poder melhor que as outras raças, mas também não tem nenhuma desvantagem.Podem ter várias cores de pele, cabelos e olhos e chegar até 2,20m ';
    }
    if(raca=='elfo'){
      var y = 'Elfos  são pessoas de uma raça mística com aparência humanóide geralmente belos e loiros. São mais baixos e menos fortes, porém mais rápidos e habilidosos que os humanos. Há quem diga que são Semi-Deuses e Imortais.São seres mágicos, ligados à natureza, o que os diferencia de Magos e Feiticeiros, que advém do estudo das artes arcanas por outras raças.São excelentes arqueiros e possuem natural aptidão para as magias da Natureza.';
    }
    if(raca=='anao'){
      var y = 'Os anões demoram a sorrir, ou a brincar e suspeitam muito de estranhos, mas são generosos com os poucos que ganham sua confiança. Eles valorizam o ouro, as gemas, as jóias e os objetos de arte feitos com esses materiais preciosos e muitos já sucumbiram ao poder da ambição. Eles não combatem nem tímida, nem temerariamente, mas com coragem e tenacidade cuidadosas. Seu senso de justiça é forte, mas pode se transformar em uma sede de vingança. Entre os gnomos, que são conhecidos por se darem bem com os anões, é comum dizerem o seguinte juramento: “Se estou mentindo, que eu enraiveça um anão�?.';
    }
    if(raca=='halfling'){
      var y = 'Como raça amigável, tentam se dar bem com todas as outras raças, mesmo assim, não que dizer que considerem todos amigos, no geral consideram amigos verdadeiros apenas os de sua própria raça; porém quando fazem amigos sem ser de sua espécie, são extremamente leais, mostrando ferocidade quando esse amigo está em perigo. Vivem no geral em comunidades pacificas, com grandes fazendas e bosques, nunca construíram um reino próprio, nem reconhecem qualquer tipo de nobreza dos de sua espécie, procurando sempre os anciões de sua família em busca de orientação, essa base construída em cima da família ajudou os halflings a mantes suas tradições por milhares de anos, independente do que estivesse ocorrendo no reino. Criaturas que querem se dar bem com todos, possuem no geral alinhamento leal e bom, não gostando de ver os outros sofrerem ou passar por opressão, mantendo sempre um forte as suas tradições, assim como os velhos hábitos e conforto. A divindade dos Halflings é Yondalla O Abençoado, o protetor dos halflings, a língua usada por ele é um idioma próprio. Como dito anteriormente, eles se aventuram mais com propósitos de proteger a comunidade, família e amigos, porém em uma batalha, por seu tamanho reduzido, usam mais de astúcia e furtividade do que força bruta ou mágia.';
    }
    document.getElementById('aqui.texto').innerHTML=y;
  }
  function dica(){
    var x = "DICA... \r\n     Use sua imaginação. A primeira coisa a fazer é escolher um conceito, uma idéia básica. O que seu personagem vai ser? Um guerreiro bárbaro com um machado mágico e uma pele de pantera jogada sobre os ombros? Um feiticeiro caçador de monstros? Um lutador de rua em busca de vingança? Um elfo caçador de recompensas? Você pode ser tudo isso e qualquer outra coisa que imaginar.";
   alert(x);
  }
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
function habilidades(){  
    var x = document.forms[0];
    var txt = "";
    var i;
    for (i = 0; i < x.length; i++) {
        if(x[i].checked){
            txt = txt + x.elements[i].name;
            if(txt.slice(-1) > 1){
                for(z=i; txt.slice(-1) > 1; z--){
                        x.elements[z].checked=true;
                        txt = txt + x.elements[z].name;
                }
            }
        }       
    }
            //alert(txt.slice(-1));
}
function abrir(URL) {
  var width = 150;
  var height = 250;
  var left = 99;
  var top = 99;
  window.open(URL,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=yes, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');
}
function mudaImagem(max){    
     switch (raca){
        case 'humano':
            switch (classe){
                case 'espadachim':
                    switch (sexo){
                        case 'F':
                            max = 6;
                            break;
                        case 'M':
                            max = 6;
                            break;
                    }
                    break;
                case 'guerreiro':
                    switch (sexo){
                        case 'F':
                            max = 5;
                            break;
                        case 'M':
                            max = 6;
                            break;
                    }
                    break;
                case 'paladino':
                    switch (sexo){
                        case 'F':
                            max = 5;
                            break;
                        case 'M':
                            max = 9;
                            break;
                    }
                    break;
                case 'ranger':
                    switch (sexo){
                        case 'F':
                            max = 9;
                            break;
                        case 'M':
                            max = 5;
                            break;
                    }
                    break;
                case 'gatuno':
                    switch (sexo){
                        case 'F':
                            max = 6;
                            break;
                        case 'M':
                            max = 5;
                            break;
                    }
                    break;
                case 'mago':
                    switch (sexo){
                        case 'F':
                            max = 5;
                            break;
                        case 'M':
                            max = 6;
                            break;
                    }
                    break;
                case 'sacerdote':
                    switch (sexo){
                        case 'F':
                            max = 5;
                            break;
                        case 'M':
                            max = 5;
                            break;
                    }
                    break;
            }
            break;
        case 'anao':
            switch (classe){
                case 'espadachim':
                    switch (sexo){
                        case 'F':
                            max = 1;
                            break;
                        case 'M':
                            max = 2;
                            break;
                    }
                    break;
                case 'guerreiro':
                    switch (sexo){
                        case 'F':
                            max = 2;
                            break;
                        case 'M':
                            max = 7;
                            break;
                    }
                    break;
                case 'paladino':
                    switch (sexo){
                        case 'F':
                            max = 2;
                            break;
                        case 'M':
                            max = 4;
                            break;
                    }
                    break;
                case 'ranger':
                    switch (sexo){
                        case 'F':
                            max = 1;
                            break;
                        case 'M':
                            max = 7;
                            break;
                    }
                    break;
                case 'gatuno':
                    switch (sexo){
                        case 'F':
                            max = 1;
                            break;
                        case 'M':
                            max = 4;
                            break;
                    }
                    break;
                case 'mago':
                    switch (sexo){
                        case 'F':
                            max = 2;
                            break;
                        case 'M':
                            max = 6;
                            break;
                    }
                    break;
                case 'sacerdote':
                    switch (sexo){
                        case 'F':
                            max = 1;
                            break;
                        case 'M':
                            max = 1;
                            break;
                    }
                    break;
            }
            break;
        case 'elfo':
            switch (classe){
                case 'espadachim':
                    switch (sexo){
                        case 'F':
                            max = 1;
                            break;
                        case 'M':
                            max = 3;
                            break;
                    }
                    break;
                case 'guerreiro':
                    switch (sexo){
                        case 'F':
                            max = 1;
                            break;
                        case 'M':
                            max = 2;
                            break;
                    }
                    break;
                case 'paladino':
                    switch (sexo){
                        case 'F':
                            max = 2;
                            break;
                        case 'M':
                            max = 1;
                            break;
                    }
                    break;
                case 'ranger':
                    switch (sexo){
                        case 'F':
                            max = 7;
                            break;
                        case 'M':
                            max = 5;
                            break;
                    }
                    break;
                case 'gatuno':
                    switch (sexo){
                        case 'F':
                            max = 1;
                            break;
                        case 'M':
                            max = 1;
                            break;
                    }
                    break;
                case 'mago':
                    switch (sexo){
                        case 'F':
                            max = 2;
                            break;
                        case 'M':
                            max = 4;
                            break;
                    }
                    break;
                case 'sacerdote':
                    switch (sexo){
                        case 'F':
                            max = 1;
                            break;
                        case 'M':
                            max = 1;
                            break;
                    }
                    break;
            }
            break;
        case 'halfling':
            switch (classe){
                case 'espadachim':
                    switch (sexo){
                        case 'F':
                            max = 1;
                            break;
                        case 'M':
                            max = 1;
                            break;
                    }
                    break;
                case 'guerreiro':
                    switch (sexo){
                        case 'F':
                            max = 2;
                            break;
                        case 'M':
                            max = 1;
                            break;
                    }
                    break;
                case 'paladino':
                    switch (sexo){
                        case 'F':
                            max = 2;
                            break;
                        case 'M':
                            max = 1;
                            break;
                    }
                    break;
                case 'ranger':
                    switch (sexo){
                        case 'F':
                            max = 1;
                            break;
                        case 'M':
                            max = 1;
                            break;
                    }
                    break;
                case 'gatuno':
                    switch (sexo){
                        case 'F':
                            max = 3;
                            break;
                        case 'M':
                            max = 6;
                            break;
                    }
                    break;
                case 'mago':
                    switch (sexo){
                        case 'F':
                            max = 2;
                            break;
                        case 'M':
                            max = 1;
                            break;
                    }
                    break;
                case 'sacerdote':
                    switch (sexo){
                        case 'F':
                            max = 1;
                            break;
                        case 'M':
                            max = 1;
                            break;
                    }
                    break;
            }
            break;
    }
    if(idavatar > max-1){
       idavatar=1;
    }else{
       idavatar++;
    }
   var max;
   if(max==null){
       max = 5;
   }
   var link = 'imagens/personagens/'+raca+'/'+classe+'/'+sexo+'/'+idavatar+'.png';
   var x = '<img height=200px src=\''+link+'\' \>';
   raca;
   document.getElementById("aqui").innerHTML=x;
   document.cookie = "avatar="+link+"; path=/";
}
function trocaAvatar(x){
    var x;
    var link = 'imagens/personagens/'+raca+'/'+classe+'/'+sexo+'/'+nome+'.png';
    alert(link);
    //var estilo = document.querySelector('#trocaAvatar').style;
    estilo.cursor = 'pointer';
    estilo.color = 'red';
    estilo.fontWeight = '700';
    estilo.textShadow = '0 2px 0 black';
    //document.getElementById('trocaAvatar').innerHTML = x;
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