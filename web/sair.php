<?php
   include '../dao/dao.php';
   include '../dao/ModelSearchCriteria.php';
   include '../config/Config.php';
   include '../model/model.php';
   include '../mapping/modelMapper.php';
   
   @$personagem = $_GET['personagem'];
   @$login = strtoupper($_COOKIE['login']);
   @$act = $_GET['act'];
   $dao = new dao();
   $search = new ModelSearchCriteria();
   $model = new model();
   
   $data = $_COOKIE['ano'].'-'.$_COOKIE['mes'].'-'.$_COOKIE['dia'].' '.$_COOKIE['hora'].':'.$_COOKIE['min'].':'.$_COOKIE['seg'];
   
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
   if(@$login=='MESTRE'){
      goto sair;
   }
   
   $model->setjogador($login);
   $model->setpersonagem($personagem);
   $search->setpersonagem($personagem);
   
   
   $search->settabela('armamentos');
   $recurso=$dao->encontrePorPersonagem($search);
   $model->settabela($search->gettabela());
   @$model->setouro($recurso->getouro()+$ouro1-$ouro2);
   $dao->setaOuro($model);
      
   $search->settabela('atributos');
   $atributo=$dao->encontrePorPersonagem($search);
   
   $model->settabela($search->gettabela());
   $model->setid_atrib($atributo->getid_atrib());
   $model->setFORCA($atributo->getFORCA());
   $model->setAGILIDADE($atributo->getAGILIDADE());
   $model->setINTELIGENCIA($atributo->getINTELIGENCIA());
   $model->setVONTADE($atributo->getVONTADE());
   $model->setPV($atributo->getPV()-$model->getPV());
   $model->setPM($atributo->getPM()-$model->getPM());
   $model->setPE($atributo->getPE());
   $model->setCLASSE_COMUM($atributo->getCLASSE_COMUM());
   $model->setHABILIDADE_AUTOMATICA($atributo->getHABILIDADE_AUTOMATICA());
   $model->setDESCRICAO($atributo->getDESCRICAO());
   
   $dao->grava2($model);
   
   
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
      $model=$dao->encontrePorMissao($search);
      $model->setDATA($data);
      $model->setemMissao(0);
      $model->settabela('tb_missao');
      $dao->grava7($model);
      header("Location:index.php");
      die;
   }
   header("Location:../index.html");
   //print_r($emMissao);die;
?>

