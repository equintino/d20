<?php
   include '../dao/dao.php';
   include '../dao/ModelSearchCriteria.php';
   include '../validacao/valida_cookies.php';
   //include '../config/Config.php';
   include '../model/model.php';
   include '../mapping/modelMapper.php';
   
   @$personagem = $_GET['personagem'];
   @$login = strtoupper($_COOKIE['login']);
   @$act = $_GET['act'];
   @$missaoMestre = $_GET['missaoMestre'];
   $dao = new dao();
   $search = new ModelSearchCriteria();
   $model = new model();
   
   @$data = $_COOKIE['ano'].'-'.$_COOKIE['mes'].'-'.$_COOKIE['dia'].' '.$_COOKIE['hora'].':'.$_COOKIE['min'].':'.$_COOKIE['seg'];
   
   if(key_exists('PVResta',$_GET)){
       $model->setPV($_GET['PVResta']);
   }
   if(key_exists('PMResta',$_GET)){
       $model->setPM($_GET['PMResta']);
   }
   if(key_exists('ouro1',$_GET)){
       $ouro1=$_GET['ouro1'];
   }
   if(key_exists('ouro2',$_GET)){
       $ouro2=$_GET['ouro2'];
   }
   if(key_exists('anotacoes',$_GET)){
       $anotacoes=$_GET['anotacoes'];
   }
   if($data){
       $model->setDATA($data);
   }
   if(key_exists('missao', $_GET)){
      $missao = $_GET['missao'];
      $model->setMISSAO($missao);
   }
   if(@$missaoMestre==1){
      goto sair;
   }
   
   $model->setjogador($login);
   $model->setpersonagem($personagem);
   $search->setpersonagem($personagem);
   
   
   $search->settabela('armamentos');
   $recurso=$dao->encontrePorPersonagem($search);
   $model->settabela($search->gettabela());
    if($recurso){
	@$model->setouro($recurso->getouro()+$ouro1-$ouro2);
	$dao->setaOuro($model);
    }
      
   $search->settabela('atributos');
   $jogador=$model->getjogador();
   $PV=$model->getPV();
   $PM=$model->getPM();
   $model=$dao->encontrePorPersonagem($search);
   
    if($model){
	$model->settabela($search->gettabela());
	$model->setPV($model->getPV()-$PV);
	$model->setPM($model->getPM()-$PM);

	$dao->grava2($model);
    }
   
      $search->settabela('missao');
      $model=$dao->encontrePorPersonagem($search);
      if($model){
         $model->setemMissao(0);
         $model->settabela('missao');
         $model->setanotacoes($anotacoes);
         $dao->grava5($model);
      }
   sair:
   if(@$act=='missao'){
      $search->setMISSAO($missao);
      $search->settabela('tb_missao');
      $search->setpersonagem(null);
      $model=$dao->encontrePorMissao($search);
      $model->setDATA($data);
      $model->setemMissao(0);
      $model->settabela('tb_missao');
      $model->setanotacoes($anotacoes);
      $dao->grava7($model);
      header("Location:index.php");
      die;
   }
      $cookies=new valida_cookies();
      $cookies->limpaCookies();
   header("Location:../index.html");
?>

