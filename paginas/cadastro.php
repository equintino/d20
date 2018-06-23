<?php
    require_once '../personagem/Personagem.php';
    require_once '../personagem/Habilidade.php';
    require_once '../personagem/Personalidade.php';
    require_once '../personagem/Atividade.php';
    $variaveis=array('JOGADOR'=>'jogador','PERSONAGEM'=>'personagem','RAÇA'=>'raca','CLASSE'=>'classe','TENDÊNCIA1'=>'tendencia1','TENDÊNCIA2'=>'tendencia2','SEXO'=>'sexo');
    array_key_exists('act',$_GET)?$act=$_GET['act']:$act=null;
    array_key_exists('pag',$_GET)?$x=$_GET['pag']:$x=null;
    array_key_exists('classe',$_GET)?$classe=$_GET['classe']:$classe=null;
    array_key_exists('personagem',$_GET)?$personagem=$_GET['personagem']:$personagem=null;
    array_key_exists('raca',$_GET)?$raca=$_GET['raca']:$raca=null;
    array_key_exists('jogador',$_GET)?$jogador_=$_GET['jogador']:$jogador_=null;
    array_key_exists('z',$_GET)?$z=$_GET['z']:$z=0;
    array_key_exists('level',$_GET)?$level=$_GET['level']:$level=1;
    
    array_key_exists('raca',$_POST)?$raca=$_POST['raca']:$raca=null;
    $login=strtoupper($_SESSION['login']);
    
    $y=$x+2;
    ($x==0)?$class='class="disabled"':$class='title=RECUAR';
    
    if($act=='lista'):
        $titulos=array('PERSONAGEM','RAÇA','CLASSE','TENDÊNCIA1','TENDÊNCIA2');
    endif;