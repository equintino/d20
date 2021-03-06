<html>
<head>
<!-- Definindo o tamanho da tela --> 
    <meta name="viewport" content="width=device-width">  
    <link rel="stylesheet" href="css/tempo.css" type="text/css" media='screen'/>   
    <!--<link rel="stylesheet" href="css/mobile.css" media="(max-width: 320px)">-->
<title>Tempo</title>
<?php
            include '../dao/dao.php';
            include '../dao/ModelSearchCriteria.php';
            include '../config/Config.php';
            include '../model/model.php';
            include '../mapping/modelMapper.php';

         date_default_timezone_set('America/Sao_Paulo');

         @$personagem = $_GET['personagem'];
         @$missao = $_GET['missao'];
                        
            $dao = new dao();
            $search = new ModelSearchCriteria();
            
            $search->settabela('tb_missao');
            $search->setMISSAO($missao);
            $tempo=$dao->encontrePorMissao($search);
               
               if($tempo){ 
                  $ano=(substr($tempo->getDATA(),0,4));
                  $mes=(substr($tempo->getDATA(),5,2));
                  $dia=(substr($tempo->getDATA(),8,2));
                  $hora=(substr($tempo->getDATA(),11,2));
                  $min=(substr($tempo->getDATA(),14,2));
                  $seg=(substr($tempo->getDATA(),17,2));
                  $cookies= array('ano'=>$ano,'mes'=>$mes,'dia'=>$dia,'hora'=>$hora,'min'=>$min,'seg'=>$seg);
                    
                  foreach($cookies as $key => $z){
                     setcookie($key, $z);
                  }
               }else{
                  die;
               }
?>
<SCRIPT language=JavaScript>
//var relogio = 3000;
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

<!-- begin -->

var sHors=getCookie("hora");
var sMins=getCookie("min");
var sSecs=getCookie("seg");
var dia=getCookie("dia");
var mes=getCookie("mes");
var ano=getCookie("ano");

function getSemana(semana){
    if(semana==1) {semana = "Domingo";}
    if(semana==2) {semana = "Segunda-feira";}
    if(semana==3) {semana = "Terça-feira";}
    if(semana==4) {semana = "Quarta-feira";}
    if(semana==5) {semana = "Quinta-feira";}
    if(semana==6) {semana = "Sexta-feira";}
    if(semana==7) {semana = "Sábado";}
    return semana;
}
function getMes(mes){
    if(mes==1){mes = "Janeiro";}
    if(mes==2){mes = "Fevereiro";}
    if(mes==3){mes = "Mar&ccedil;o";}
    if(mes==4){mes = "Abril";}
    if(mes==5){mes = "Maio";}
    if(mes==6){mes = "Junho";}
    if(mes==7){mes = "Julho";}
    if(mes==8){mes = "Agosto";}
    if(mes==9){mes = "Setembro";}
    if(mes==10){mes = "Outubro";}
    if(mes==11){mes = "Novembro";}
    if(mes==12){mes = "Dezembro";}
    return mes;
}

if(!sHors || sHors == null)var sHors = "00"; 
if(!sMins || sMins == null)var sMins = "00";
if(!sSecs || sSecs == null)var sSecs = "00";
if(!dia || dia == null)var dia = "01";
if(!mes || mes == null)var mes = "01";
if(!ano || ano == null)var ano = "1800";
pausa=0;
var relogio;
function getSecs(){
    inicio=setTimeout(getSecs,relogio);
    if(pausa == 0){
        var pausado='';
        sSecs++;
    }
                if(sHors >= 06 && sHors < 10){
                    document.body.style.background = "#f3f3f3 url('imagens/tempo/dia.jpg') no-repeat right top";
                    document.body.style.backgroundSize = "100%";
                    document.querySelector('.tempo').style.color = 'red';
                    document.querySelector('.tempo').style.textShadow = '2px 2px 2px black';
                }else if(sHors >= 10 && sHors < 13){
                    document.body.style.background = "#f3f3f3 url('imagens/tempo/10.jpg') no-repeat right top";
                    document.body.style.backgroundSize = "100%";
                    document.querySelector('.tempo').style.color = 'blue';
                    document.querySelector('.tempo').style.textShadow = '2px 2px 2px white';
                }else if(sHors >= 13 && sHors < 15){
                    document.body.style.background = "#f3f3f3 url('imagens/tempo/15.jpg') no-repeat right top";
                    document.body.style.backgroundSize = "100%";
                    document.querySelector('.tempo').style.color = 'white';
                    document.querySelector('.tempo').style.textShadow = '2px 2px 2px black';
                }else if(sHors >= 15 && sHors < 18){
                    document.body.style.background = "#f3f3f3 url('imagens/tempo/18.jpg') no-repeat right top";
                    document.body.style.backgroundSize = "100%";
                    document.querySelector('.tempo').style.color = 'white';
                    document.querySelector('.tempo').style.textShadow = '2px 2px 2px black';
                }else if(sHors >= 18 && sHors < 20){
                    document.body.style.background = "#f3f3f3 url('imagens/tempo/noite.jpg') no-repeat right top";
                    document.body.style.backgroundSize = "100%";
                    document.querySelector('.tempo').style.color = 'white';
                    document.querySelector('.tempo').style.textShadow = '2px 2px 2px red';
                }else if(sHors >= 20 && sHors < 23){
                    document.body.style.background = "#f3f3f3 url('imagens/tempo/20.jpg') no-repeat right top";
                    document.body.style.backgroundSize = "100%";
                    document.querySelector('.tempo').style.color = 'white';
                    document.querySelector('.tempo').style.textShadow = '2px 2px 2px red';
                }else if(sHors < 06){
                    document.body.style.background = "#f3f3f3 url('imagens/tempo/00.jpg') no-repeat right top";
                    document.body.style.backgroundSize = "100%";
                    document.querySelector('.tempo').style.color = 'white';
                    document.querySelector('.tempo').style.textShadow = '2px 2px 2px red';
                }
	if(sSecs<=9)sSecs="0"+sSecs;
	if(sSecs>59)
            {sSecs='00';sMins++;if(sMins<=09)sMins="0"+sMins;}
	if(sMins>59)
            {sMins='00';sHors++;if(sHors<=09)sHors="0"+sHors;}
	if(dia>30)
            {dia='01';mes++;if(dia<=09)dia="0"+dia;}
	if(mes>12)
            {mes='01';ano++;if(mes<=09)mes="0"+mes;}
	if(sHors>23){
		dia++;sHors="00";sMins="00";sSecs="00";
		clock1.innerHTML=dia+" de "+getMes(mes)+" de "+ano+"<br>"+sHors+"<font color=#000000>:</font>"+sMins+"<font color=#000000>:</font>"+sSecs+pausado;inicio;
                setTimeout(clock1.innerHTML,3000);
		document.cookie = "hora="+sHors;
		document.cookie = "min="+sMins;
		document.cookie = "seg="+sSecs;
		document.cookie = "dia="+dia;
		document.cookie = "mes="+mes;
		document.cookie = "ano="+ano;
	}else{
		clock1.innerHTML=dia+" de "+getMes(mes)+" de "+ano+"<br>"+sHors+":"+sMins+":"+sSecs+pausado;	
		document.cookie = "hora="+sHors;
		document.cookie = "min="+sMins;
		document.cookie = "seg="+sSecs;
		document.cookie = "dia="+dia;
		document.cookie = "mes="+mes;
		document.cookie = "ano="+ano;
	}
}
function relVelMenos(){
    if(relogio==null){
        relogio=1;
    }
    relogio=relogio+20;    
}
function relVelMais(){
    if(relogio==null){
        relogio=1;
    }
        relogio=relogio-20;
    if(relogio < 0){
        relogio=0;
    }
}
cont=0;
function relPausa(){
    cont=cont+1;
    pause = cont % 2;
    
    if(pause==1){
        clearTimeout(inicio);
        var botoes = ' <img height=14px; src=imagens/segue.png /> ';
    }else{
        inicio=setTimeout(getSecs);
        var botoes = ' <img height=14px; src=imagens/pausa.png /> ';
    }
    document.getElementById('segue').innerHTML=botoes;
}
</SCRIPT>
</head>
<body id=seletor>
    <div class=tempo align="center"> 
        <b><span id="clock1"></span></b>
        <span class="bntTempo recua" onclick=relVelMenos()><img height=14px; src=imagens/recuar.png /></span>
        <span class="bntTempo segue" id="segue" onclick=relPausa()> <img height=14px; src=imagens/pausa.png /> </span>
        <span class="bntTempo avanca" onclick=relVelMais()><img height=14px; src=imagens/avanca.png /></span>
        <div>
        <?php       
                    $dia = date('d');
                    $search->settabela('tb_tempo');
                    $search->setid($dia);
                    $tempo=$dao->encontrePorId($search);


                    echo '<div class=fases>';
                        echo '<span><img title=\'Estação do '.$tempo->getESTACAO().'\' height=20px src=gera.php?id='.$dia.'&tabela=tb_tempo&numero=2 /></span>';
                        echo '<img title=\''.$tempo->getDESCRICAO().'\' height=20px src=gera.php?id='.$dia.'&tabela=tb_tempo&numero=3 />';
                        echo '<img title=\'Fase da Lua ('.$tempo->getLUAS().')\' height=20px src=gera.php?id='.$dia.'&tabela=tb_tempo />';
                    echo '</div>';
                    echo '<span class=temperatura>';
                        echo '<span class=seta>↑</span>';
                        echo $tempo->getTEMPMAX();
                        echo '<span class=graus>C</span>';
                        echo '<span class=seta>  ↓</span>';
                        echo $tempo->getTEMPMIN();
                        echo '<span class=graus>C</span>';
                    echo '</span>';
                    echo '<script>getSecs(1);</script>';
                    die;
        ?>
        </div>
    </div>
</body>
</html>