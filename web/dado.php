<html>
<head>
<!-- Definindo o tamanho da tela --> 
    <meta name="viewport" content="width=device-width">  
    <link rel="stylesheet" href="css/dado.css" type="text/css" media='screen'/>   
    <!--<link rel="stylesheet" href="css/mobile.css" media="(max-width: 320px)">-->
<title>Rola o dado</title>
<SCRIPT language=JavaScript>
  function rolaDado($rdado,y){
    var x = $rdado;
    mostrarDado();
    document.getElementById('dado'+y).innerHTML = '<img height=60px src='+x+' />';
  }
   function mostrarDado(){
    var dado = getRadioValor('dado');
    document.getElementById('resultado').innerHTML = '';
    if(dado == '6x2'){
       document.getElementById('dado'+dado).innerHTML = '<img height=60px src="imagens/dado/rd'+dado+'.gif" />';
       document.getElementById('dado2'+dado).innerHTML = '<img height=60px src="imagens/dado/rd'+dado+'.gif" />';
    }else if(dado == '6x3'){
       document.getElementById('dado'+dado).innerHTML = '<img height=60px src="imagens/dado/rd6.gif" />';
       document.getElementById('dado2'+dado).innerHTML = '<img height=60px src="imagens/dado/rd6.gif" />';
       document.getElementById('dado3'+dado).innerHTML = '<img height=60px src="imagens/dado/rd6.gif" />';
   }else{
      document.getElementById('dado'+dado).innerHTML = '<img height=60px src="imagens/dado/rd'+dado+'.gif" />';    
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
</script>
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
<br><br><br>
<center>
    <form action="index.php?pagina=dado&act=1" method="post">
        <legenda class="t_dado">Escolha o dado abaixo</legenda>
        <div class="dados"> 
        <span id='dado6'><img height=56px title='Dado de 6 lados' src='../web/imagens/d6.png'></span>
        <input type='radio' id="dado" name='dado' value='6' required="">  
        <span id="dado6x2"><img height=56px title='Dado de 6 lados' src='../web/imagens/d6.png'></span><span id='dado26x2'><img height=56px title='Dado de 6 lados' src='../web/imagens/d6.png'></span>
        <input type='radio' id="dadox2" name='dado' value='6x2' checked="checked" required="">
        <span id='dado6x3'><img height=56px title='Dado de 6 lados' src='../web/imagens/d6.png'></span><span id='dado26x3'><img height=56px title='Dado de 6 lados' src='../web/imagens/d6.png'></span><span id='dado36x3'><img height=56px title='Dado de 6 lados' src='../web/imagens/d6.png'></span>
        <input type='radio' id="dadox3" name='dado' value='6x3'>
        <input type="hidden" name="rolar" value="1">
        </div>
        <button title="Aperte e segure para girar o dado." class='rolar rolar-red' onmousedown="mostrarDado()"; >Segure para girar</button>       
    </form>
</center>
<br><br>
 <?php
        echo '<div id=resultado class=resultado>';
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
 }
 ?>
 </div>
</body>
</html>