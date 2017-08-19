<html>
<head>
<!-- Definindo o tamanho da tela --> 
    <meta name="viewport" content="width=device-width">  
    <link rel="stylesheet" href="css/dado.css" type="text/css" />   
    
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <?php    
      $height='height=30px';
      $tamanho='30px';
      $largura='34px';
      $tamanho2='30px';
    ?>
<title>Rola o dado</title>
<SCRIPT language=JavaScript>
  function rolaDado($rdado,y){
    var x = $rdado;
    mostrarDado();
  }
   function mostrarDado(){
    dado = getRadioValor('dado');
    document.getElementById('resultado').innerHTML = '';
    if(dado == '6x2'){
       document.getElementById('dado'+dado).innerHTML = '<img width=<?= $largura ?> height=<?= $tamanho ?> src="imagens/dado/rd'+dado+'.gif" />';
       document.getElementById('dado2'+dado).innerHTML = '<img width=<?= $largura ?>  height=<?= $tamanho ?> src="imagens/dado/rd'+dado+'.gif" />';
    }else if(dado == '6x3'){
       document.getElementById('dado'+dado).innerHTML = '<img width=<?= $largura ?>  height=<?= $tamanho ?> src="imagens/dado/rd6.gif" />';
       document.getElementById('dado2'+dado).innerHTML = '<img width=<?= $largura ?>  height=<?= $tamanho ?> src="imagens/dado/rd6.gif" />';
       document.getElementById('dado3'+dado).innerHTML = '<img width=<?= $largura ?>  height=<?= $tamanho ?> src="imagens/dado/rd6.gif" />';
   }else{
      document.getElementById('dado'+dado).innerHTML = '<img width=<?= $largura ?>  height=<?= $tamanho ?> src="imagens/dado/rd'+dado+'.gif" />';    
    }
 }
  
 function getRadioValor(name){
  var rads = document.getElementsByName(name);
   
  for(var i = 0; i < rads.length; i++){
   if(rads[i].checked){
    return rads[i].value;
   } 
  }  
  return null;
 }
function valor() {
    var x;
    if(dado == '6x2'){
       document.getElementById('dado'+dado).innerHTML = '<img height=<?= $tamanho2 ?> src="../web/imagens/d6.png" />';
       document.getElementById('dado2'+dado).innerHTML = '<img height=<?= $tamanho2 ?> src="../web/imagens/d6.png" />';
    x1 = Math.floor((Math.random() * 6) + 1); 
    x2 = Math.floor((Math.random() * 6) + 1); 
    x = x1+x2;
    }else if(dado == '6x3'){
       document.getElementById('dado'+dado).innerHTML = '<img height=<?= $tamanho2 ?> src="../web/imagens/d6.png" />';
       document.getElementById('dado2'+dado).innerHTML = '<img height=<?= $tamanho2 ?> src="../web/imagens/d6.png" />';
       document.getElementById('dado3'+dado).innerHTML = '<img height=<?= $tamanho2 ?> src="../web/imagens/d6.png" />';
    x1 = Math.floor((Math.random() * 6) + 1); 
    x2 = Math.floor((Math.random() * 6) + 1); 
    x3 = Math.floor((Math.random() * 6) + 1); 
    x = x1+x2+x3;
   }else{
      document.getElementById('dado'+dado).innerHTML = '<img height=<?= $tamanho2 ?> src="../web/imagens/d6.png" />'; 
    x = Math.floor((Math.random() * 6) + 1);   
    }
    document.getElementById("resultado").innerHTML = x;
}

$(document).ready(function(){
   $('body').css({
      //background:'rgba(0, 0, 0, 0.3)'
   });
    $('.conteudo').hide();   
    $('#topo').mouseover(function(){
       $(this).css('cursor','pointer');
    });
    $('#topo').click(function(event){
         if($('.conteudo').is(':visible')){
               event.preventDefault();
               $(".conteudo").hide("slow");
        }else{
             event.preventDefault();
             $(".conteudo").show("slow");
        }
   });
 });
</script>
<style>
    body{
        //width: 500px;
    }
    .rolaDado{
        //border: 1px solid red;
        width: 500px;
        margin-left: 140px;
        //float: left;
    }
    #seletor > button{
        //border: 1px solid red;
        float: left;
    }
    body{
        width: 700px;
        //margin: auto;
        //border: 1px solid red;
    }
    #topo{
        //border: 5px solid red;
        margin-left: -100px;
    }
</style>
<?php
@$act=$_GET['act'];
@$dado=$_POST['dado'];
if(@!$dado){
  @$dado=$_GET['dado'];
}
@$rolar=$_POST['rolar'];
 ?>
</head>
<body>
<div class="conteudo" id=seletor>
   <button title="Aperte e segure para girar o dado." onmousedown="mostrarDado()" onmouseup="valor()">Segure para girar</button>
<!--<center>-->
   <div class="rolaDado">
        <div class="resultado">Resultado<br><center id="resultado"></center></div> 
    <form action="dado.php?act=1" method="post">
        <span class="dados"> 
        <span id='dado6'><img <?= $height ?> title='Dado de 6 lados' src='../web/imagens/d6.png'></span>
        <input type='radio' id="dado" name='dado' value='6' required="">  
        <span id="dado6x2"><img onmousedown="mostrarDado()" onmouseup="valor()" <?= $height ?> title='Dado de 6 lados' src='../web/imagens/d6.png'></span><span id='dado26x2'><img onmousedown="mostrarDado()" onmouseup="valor()" <?= $height ?> title='Dado de 6 lados' src='../web/imagens/d6.png'></span>
        <input type='radio' id="dadox2" name='dado' value='6x2' checked="checked" required="">
        <span id='dado6x3'><img onmousedown="mostrarDado()" onmouseup="valor()" <?= $height ?> title='Dado de 6 lados' src='../web/imagens/d6.png'></span><span id='dado26x3'><img onmousedown="mostrarDado()" onmouseup="valor()" <?= $height ?> title='Dado de 6 lados' src='../web/imagens/d6.png'></span><span id='dado36x3'><img onmousedown="mostrarDado()" onmouseup="valor()" <?= $height ?> title='Dado de 6 lados' src='../web/imagens/d6.png'></span>
        <input type='radio' id="dadox3" name='dado' value='6x3'>
        <input type="hidden" name="rolar" value="1">
        </span> 
    </form> 
</div>
<!--</center>-->
 </div>
    <div class="topo"><img id="topo" height=30px src="../web/imagens/cordinha.png" /></div>
</body>
</html>