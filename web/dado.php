<html>
<head>
<!-- Definindo o tamanho da tela --> 
    <meta name="viewport" content="width=device-width">  
    <link rel="stylesheet" href="css/dado.css" type="text/css" /> <!--media='screen'-->  
    
    
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    
    
    <!--<link rel="stylesheet" href="css/mobile.css" media="(max-width: 320px)">-->
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
    //document.getElementById('dado'+y).innerHTML = '<img height=<?= $tamanho ?> src='+x+' />';
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


/*
function dropdown(){
var topo = document.getElementById('topo');
//for(i=0; i < menu.length; i++){
	//if(menu.item(i).getElementsByTagName('ul').length > 0){

		topo.onmouseover = function(){
			//this.style.background = 'url(../web/imagens/d6.png)';
            //this.style.backgroundPosition = '0px 40px';
			document.querySelector('#topo').style.display = 'none';
		}

		topo.onmouseout = function(){
			//this.style.background = 'url(../web/imagens/d6.png)';
            //this.style.backgroundPosition = '0px 0px';
			//this.getElementsByTagName('ul').item(0).style.display = 'none';	
			document.querySelector('#topo').style.display = 'block';
		}

	//}
//}
}
*/

$(document).ready(function(){
    $('.conteudo').hide();

    $('#topo').hover(function(event){
        event.preventDefault();
        $(".conteudo").show("slow");
        //$(".ocultar").show("slower");
    });

    $('.conteudo').dblclick(function(event){
        event.preventDefault();
        $(".conteudo").hide("slow");
        //$(".ocultar").hide("slower")
    });
 });




</script>

<style>
/*    
    #nav {
list-style:none;
margin:0;
padding:0;
}
#nav li {
position:relative;
float:left;
}
#nav li a {
position:relative;
float:left;
width:142px;
height:40px;
padding:0;
margin:0;
line-height:40px;
text-align:center;
text-decoration:none;
text-decoration:none;
color:#FFF;
font-family:Arial, Helvetica, sans-serif;
font-size:16px;
}
#nav li a:hover {
background-image:url(imagens/d6.png);
background-position:0px 40px;
}
#nav li ul {
position:absolute;
float:left;
width:240px;
list-style:none;
padding:0;
margin-top:40px;
background-color:#993300;
border-left:#000 1px solid;
border-right:#000 1px solid;
display:none;
}
#nav li ul li {
position:relative;
float:left;
}
#nav li ul li a {
position:relative;
float:left;
width:230px;
text-align:left;
padding-left:10px;
border-bottom:#000000 1px solid;
}
#nav li ul li a:hover {
background-image:url(imagens/d20.png);
background-position:0px 0px;
}
 */   
    
</style>




<?php
@$act=$_GET['act'];
@$dado=$_POST['dado'];
if(@!$dado){
  @$dado=$_GET['dado'];
}
@$rolar=$_POST['rolar'];
 /*function redirecionar($tempo,$url, $mensagem, $dado){
  echo '<script>rolaDado(\'imagens/dado/rd'.$dado.'.gif\','.$dado.')</script>';
  echo "<div class=carregando>";
  echo '<center class=msg>'.$mensagem.  '</center><br/>';
  echo "</div>";
 }*/
 ?>
</head>
<body>
<div class="conteudo">
   <button title="Aperte e segure para girar o dado." onmousedown="mostrarDado()" onmouseup="valor()">Segure para girar</button>
<center>
    <form action="dado.php?act=1" method="post">
        <!--<legenda class="t_dado">Escolha o dado abaixo</legenda>-->
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
</center>
        <span class="resultado">Resultado<br><center id="resultado"></center></span> 
 <?php
    /*    echo '<div id=resultado class=resultado>';
 if($rolar){
        //echo $dado;
        if($dado == '6x2'){
           $dado_ = rand(1,6)+rand(1,6);
        }elseif($dado == '6x3'){
           $dado_ = rand(1,6)+rand(1,6)+rand(1,6);
        }else{
           $dado_ = rand(1,$dado);
        }
           echo "Você tirou<br><span>$dado_</span>";
 }*/
 ?>
 </div>
    <!--<div class="topoCima" ></div>-->
    <div class="topo"><img id="topo" height=30px src="../web/imagens/cordinha.png" /></div>
    <!--<span id="ocultar" >Esconder</span>-->
</body>
</html>