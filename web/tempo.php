<html>
<head>
<!-- Definindo o tamanho da tela --> 
    <meta name="viewport" content="width=device-width">  
    <link rel="stylesheet" href="css/tempo.css" type="text/css" media='screen'/>   
    <!--<link rel="stylesheet" href="css/mobile.css" media="(max-width: 320px)">-->
<title>Tempo</title>
<SCRIPT language=JavaScript>
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
function getSecs(){
	sSecs++;
                    //alert(sHors);
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
            {sSecs=00;sMins++;if(sMins<=9)sMins="0"+sMins;}
	if(sMins>59)
            {sMins=00;sHors++;if(sHors<=9)sHors="0"+sHors;}
	if(dia>30)
            {dia=01;mes++;if(dia<=9)dia="0"+dia;}
	if(mes>12)
            {mes=01;ano++;if(mes<=9)mes="0"+mes;}
	if(sHors>23){
		dia++;sHors="00";sMins="00";sSecs="00";
		clock1.innerHTML=dia+" de "+getMes(mes)+" de "+ano+"<br>"+sHors+"<font color=#000000>:</font>"+sMins+"<font color=#000000>:</font>"+sSecs;setTimeout('getSecs()',1);	
		document.cookie = "hora="+sHors;
		document.cookie = "min="+sMins;
		document.cookie = "seg="+sSecs;
		document.cookie = "dia="+dia;
		document.cookie = "mes="+mes;
		document.cookie = "ano="+ano;
	}else{
		clock1.innerHTML=dia+" de "+getMes(mes)+" de "+ano+"<br>"+sHors+":"+sMins+":"+sSecs;setTimeout('getSecs()',1);		
		document.cookie = "hora="+sHors;
		document.cookie = "min="+sMins;
		document.cookie = "seg="+sSecs;
		document.cookie = "dia="+dia;
		document.cookie = "mes="+mes;
		document.cookie = "ano="+ano;
	}
}
//-->
</SCRIPT>

</head>
<!-- Aqui come�a o corpo da p�gina -->
<body>

<!--<h2 align="center"><font color="#065ca5" face="tahoma">Contagem Progressiva</font></h2>-->
<!--<hr color="#065ca5" width="100">-->
    <div class=tempo align="center"> 
        <b><span id="clock1"></span><script>setTimeout('getSecs()',1);</script></b>
        <div>
        <?php
            include '../dao/dao.php';
            include '../dao/ModelSearchCriteria.php';
            include '../config/Config.php';
            include '../model/model.php';
            include '../mapping/modelMapper.php';
            
            $dao = new dao();
            $search = new ModelSearchCriteria();
            
            $search->settabela('tb_tempo');
            $search->setid(1);
            //print_r(get_class_methods($dao));
            //foreach($dao->encontre($search) as $item){
                echo '<img height=40px src=gera.php?id=1&tabela=tb_tempo />';
                echo '<img height=40px src=gera.php?id=1&tabela=tb_tempo&numero=2 />';
                echo '<img height=40px src=gera.php?id=1&tabela=tb_tempo&numero=3 />';
            //}
            
        ?>
        </div>
    </div>
</body>
</html>