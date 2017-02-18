<link rel="stylesheet" href="../web/css/layout.css" type="text/css" media='screen'/>  
<?php
  include_once '../dao/dao.php';
  include_once '../model/model.php';
  include_once '../config/Config.php';
  include_once '../mapping/modelMapper.php';
  include_once '../dao/ModelSearchCriteria.php';
  include_once '../validacao/ModelValidador.php';
  $dao = new Dao();
  $model = new Model();
  //print_r($_POST);die;
  foreach($_POST as $key => $item){
    $classe='set'.$key;
    $model->$classe($item);
  }
  //$model->settabela(strtolower(ModelValidacao::nomeMes($_POST['mes'])));
  /*echo '<pre>';
  PRINT_R($_POST);
  PRINT_R($_GET);DIE;*/
  $act=$_GET['act'];
  if($act == 'cad'){
     $model->settabela('personagem');
     $dao->grava($model);
  }
  if($act == 'rel'){ 
     //print_r($model);die;
     $dao->grava2($model);
  }
?>
<div class='add'>
<h3>REGISTRO GRAVADO COM SUCESSO</h3>
<!--<button onclick="history.go(-2)" >VOLTAR</button>-->
<a href='../web/index.php?pagina=cadastro&act=cad2&classe=<?php echo $model->getclasse() ?>&personagem=<?= $model->getpersonagem(); ?>' ><button class='continua continua-verde'>Continua...</button></a>
</div>