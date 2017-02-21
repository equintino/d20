<link rel="stylesheet" href="../web/css/layout.css" type="text/css" media='screen'/>  
<?php
  include_once '../dao/dao.php';
  include_once '../model/model.php';
  include_once '../config/Config.php';
  include_once '../mapping/modelMapper.php';
  include_once '../dao/ModelSearchCriteria.php';
  include_once '../validacao/ModelValidador.php';
  $act=$_GET['act'];
  $dao = new Dao();
  $model = new Model();
  $search = new ModelSearchCriteria();
     $model->settabela('personagem');
     $search->settabela('personagem');
  //print_r($_POST);die;
  foreach($_POST as $key => $item){
    $classe='set'.$key;
    $model->$classe($item);
  }
  if($act == 'cad'){
     $search->setpersonagem($model->getpersonagem());
     $busca=$dao->encontre($search);
     if($busca){
        foreach($dao->encontre($search) as $dados);
        if($dados->getpersonagem()){
          echo '<div class=add>';
          echo '<h3>PERSONAGEM JÁ EXISTE!</h3>';
          echo '<button class=\'continua continua-verde\' onclick=history.go(-1);>Voltar</button>';
          echo '</div>';
          die;
        }else{       
          $dao->grava($model);
        }
     }
  }
  //$model->settabela(strtolower(ModelValidacao::nomeMes($_POST['mes'])));
  /*echo '<pre>';
  PRINT_R($_POST);
  PRINT_R($_GET);DIE;*/
  if($act == 'rel'){ 
     //print_r($model);die;
     $dao->grava2($model);
  }
  if($act == 'cad2'){
    $model->setpersonagem($_GET['personagem']);
    //print_r($model);die;
    $dao->grava($model);
  }
?>
<div class='add'>
<h3>REGISTRO GRAVADO COM SUCESSO</h3>
<!--<button onclick="history.go(-2)" >VOLTAR</button>-->
<a href='../web/index.php?pagina=cadastro&act=cad2&classe=<?php echo $model->getclasse() ?>&personagem=<?= $model->getpersonagem(); ?>' ><button class='continua continua-verde'>Continua...</button></a>
</div>