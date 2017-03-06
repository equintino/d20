<link rel="stylesheet" href="../web/css/layout.css" type="text/css" media='screen'/>  
<?php
  include_once '../dao/dao.php';
  include_once '../model/model.php';
  include_once '../config/Config.php';
  include_once '../mapping/modelMapper.php';
  include_once '../dao/ModelSearchCriteria.php';
  include_once '../validacao/ModelValidador.php';
  $act=$_GET['act'];
  $habilidade = null;
  $x=0;
  $dao = new Dao();
  $model = new Model();
  $search = new ModelSearchCriteria();
     $model->settabela('personagem');
     $search->settabela('personagem');
  //print_r($_POST);die;
  foreach($_POST as $key => $item){
	  if($item == 'on'){
		$habilidade .=$key.'/';
		$x++;
	  }else{
		$classe='set'.$key;
		$model->$classe($item);
	  }
  }
  if($act == 'cad'){
     $search->setpersonagem($model->getpersonagem());
     $busca=$dao->encontre($search);
	 //print_r($busca);die;
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
     }else{
		$dao->grava($model); 
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
	  if($x<3||$x>3){
		echo '<div class="add hab">';
		echo '<h3>VOCË SELECIONOU <span class=dest>'.$x.'</span> HABILIDADE(S),<br> SELECIONE <span class=dest>3</span> HABILIDADES!</h3>';
		echo '<button class=\'continua continua-verde\' onclick=history.go(-1);>Voltar</button>';
		echo '</div>';
		die;
	  }else{
		$model->sethabilidade($habilidade);
	  }
	$search->settabela('personagem');
        $search->setpersonagem($_GET['personagem']);
	
	$dados=$dao->encontrePorPersonagem($search);
	//print_r($dados);echo '<br><br>';
	$model->setid($dados->getid());
	$model->setjogador($dados->getjogador());
	$model->setpersonagem($dados->getpersonagem());
	$model->setraca($dados->getraca());
	$model->setclasse($dados->getclasse());
	$model->settendencia1($dados->gettendencia1());
	$model->settendencia2($dados->gettendencia2());
	$model->setsexo($dados->getsexo());
        
        $search->setraca($model->getraca());
        $search->settabela('tb_racas');
        $dadosRaca=$dao->encontrePorRaca($search);
   /*print_r($_POST);
   echo '<br><br>';
   print_r($model);
   echo '<br><br>';
   print_r($dadosRaca);
   die;*/
        //print_r($dadosRaca);die;
        $dao->grava($model);
        //print_r($model);die;
        $dadosRaca->settabela('atributos');
        $dadosRaca->setpersonagem($model->getpersonagem());
        $dadosRaca->setPV(60);
        $dadosRaca->setPM(60);
        $dadosRaca->setPE(0);
        if($model->getraca()=='humano'){
          echo '<div class=maisum>';
           echo 'Selecione + 1 a uma das 4 opções abaixo:<br>';
           echo '<lable>Força</lable><input type=radio name=maisum value=F>';
           echo '<lable>Agilidade</lable><input type=radio name=maisum value=A>';
           echo '<lable>Inteligência</lable><input type=radio name=maisum value=I>';
           echo '<lable>Vontade</lable><input type=radio name=maisum value=V>';
           echo '</div>';
           ;die;
        }
        //if()
        print_r($dadosRaca);die;
        $dao->grava2($dadosRaca);
	echo '<div class=\'add\'>'.
               '<h3>REGISTRO GRAVADO COM SUCESSO</h3>'.
               '<a href=\'../web/index.php?pagina=cadastro&act=cad3&classe='.$model->getclasse().'&personagem='. $model->getpersonagem().'\' ><button class=\'continua continua-verde\'>Continua...</button></a>'.
             '</div>';
	die;
  }
  if($act == 'cad3'){
	  $model->setpersonagem($_GET['personagem']);
	  $model->settabela('atributos');
	  print_r($_GET);echo '<br>';
	  print_r($_POST);echo '<br>';
	  print_r($model);die;
  }
?>
<div class='add'>
<h3>REGISTRO GRAVADO COM SUCESSO</h3>
<!--<button onclick="history.go(-2)" >VOLTAR</button>-->
<a href='../web/index.php?pagina=cadastro&act=cad2&classe=<?php echo $model->getclasse() ?>&personagem=<?= $model->getpersonagem(); ?>' ><button class='continua continua-verde'>Continua...</button></a>
</div>