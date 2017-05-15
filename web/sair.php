<?php
   include '../dao/dao.php';
   include '../dao/ModelSearchCriteria.php';
   include '../config/Config.php';
   include '../model/Model.php';
   include '../mapping/modelMapper.php';
   
   $personagem = $_GET['personagem'];
   
   $dao = new dao();
   $search = new ModelSearchCriteria();
   $model = new model();
   
   $search->settabela('missao');
   $search->setpersonagem($personagem);
   $emMissao=$dao->encontreEmMissao($search);
   
   $model->setid($emMissao->getid());
   $model->setpersonagem($personagem);
   $model->setemMissao(0);
   $dao->grava5($model);
   print_r($emMissao);die;
?>

