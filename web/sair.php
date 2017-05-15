<?php
   include '../dao/dao.php';
   include '../dao/ModelSearchCriteria.php';
   include '../config/Config.php';
   include '../model/model.php';
   include '../mapping/modelMapper.php';
   
   $personagem = $_GET['personagem'];
   @$login = strtoupper($_COOKIE['login']);
   //print_r($login);die;
   
   $dao = new dao();
   $search = new ModelSearchCriteria();
   $model = new model();
   
   /*$search->settabela('missao');
   $search->setpersonagem($personagem);
   $search->setjogador($login);
   $emMissao=$dao->encontreEmMissao($search);
   print_r($search);die;
   
   if($emMissao){*/
        $model->settabela('missao');
        //$model->setid($emMissao->getid());
        $model->setpersonagem($personagem);
        $model->setjogador($login);
        $model->setemMissao(0);
        $dao->setaMissao($model);
   //}
   
   header("Location:../index.html");
   //print_r($emMissao);die;
?>

