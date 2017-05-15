<?php
   include '../dao/dao.php';
   include '../dao/ModelSearchCriteria.php';
   include '../config/Config.php';
   include '../model/model.php';
   include '../mapping/modelMapper.php';
   
   $personagem = $_GET['personagem'];
   
   $dao = new dao();
   $search = new ModelSearchCriteria();
   $model = new model();
   
   $search->settabela('missao');
   $search->setpersonagem($personagem);
   $emMissao=$dao->encontreEmMissao($search);
   
   if($emMissao){
        $model->settabela('missao');
        $model->setid($emMissao->getid());
        $model->setpersonagem($personagem);
        $model->setemMissao(0);
        $dao->setaMissao($model);
   }
   
   header("Location:../index.html");
   //print_r($emMissao);die;
?>

