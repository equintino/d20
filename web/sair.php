<?php
   include '../dao/dao.php';
   include '../dao/ModelSearchCriteria.php';
   include '../config/Config.php';
   include '../model/model.php';
   include '../mapping/modelMapper.php';
   
   @$personagem = $_GET['personagem'];
   @$login = strtoupper($_COOKIE['login']);
   @$act = $_GET['act'];
   //print_r($login);die;
   
   $dao = new dao();
   $search = new ModelSearchCriteria();
   $model = new model();
   
   //print_r($model);die;
   $data = $_COOKIE['ano'].'-'.$_COOKIE['mes'].'-'.$_COOKIE['dia'].' '.$_COOKIE['hora'].':'.$_COOKIE['min'].':'.$_COOKIE['seg'];
   
   if(key_exists('PVResta',$_GET)){
       $model->setPV($_GET['PVResta']);
   }
   if(key_exists('PMResta',$_GET)){
       $model->setPM($_GET['PMResta']);
   }
   if(key_exists('ouro',$_GET)){
       $model->setouro($_GET['ouro']);
   }
   if(key_exists('anotacoes',$_GET)){
       $model->setanotacoes($_GET['anotacoes']);
   }
   if($data){
       $model->setDATA($data);
   }
   if(key_exists('missao', $_GET)){
       $model->setMISSAO($_GET['missao']);
   }
   
   /*$search->settabela('missao');
   $search->setpersonagem($personagem);
   $search->setjogador($login);
   $emMissao=$dao->encontreEmMissao($search);
   print_r($search);die;
   
   if($emMissao){*/
   
   /*
        $search->settabela('atributos');
        $search->setpersonagem($personagem);
        $atributo = $dao->encontrePorPersonagem($search);
        $model->setPV($model->getPV()-$atributo->getPV());
        $model->setPM($model->getPM()-$atributo->getPM());
        $model->setid_atrib($atributo->getid_atrib());
        $model->setFORCA($atributo->getFORCA());
        $model->setAGILIDADE($atributo->getAGILIDADE());
        $model->setINTELIGENCIA($atributo->getINTELIGENCIA());
        $model->setVONTADE($atributo->getVONTADE());
        $model->setCLASSE_COMUM($atributo->getCLASSE_COMUM());
        $model->setHABILIDADE_AUTOMATICA($atributo->getHABILIDADE_AUTOMATICA());
        $model->setDESCRICAO($atributo->getDESCRICAO());
        $dao->grava2($model);
        
        
        print_r($model);die;
        
   */
   
   
        $model->settabela('missao');
        $model->setpersonagem($personagem);
        $model->setjogador($login);
        //$model->setid($emMissao->getid());
        $model->setemMissao(0);
        $model->setexcluido(0);
        if(key_exists('id', $_GET)){
            $model->setid($_GET['id']);
        }
        $dao->setaMissao($model);
        $dao->grava5($model);
        //print_r($model);die;
   //}
   if(@$act=='missao'){
      header("Location:index.php");
      die;
   }
   header("Location:../index.html");
   //print_r($emMissao);die;
?>

