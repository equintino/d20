<link rel="stylesheet" href="../web/css/layout.css" type="text/css" media='screen'/>
<?php
  include_once '../dao/dao.php';
  include_once '../model/model.php';
  include_once '../config/Config.php';
  include_once '../mapping/modelMapper.php';
  include_once '../dao/ModelSearchCriteria.php';
  include_once '../validacao/ModelValidador.php';
  $act=$_GET['act'];
  @$atribamais=$_POST['maisum'];
  $humanoF=$humanoA=$humanoI=$humanoV=0;
  $habilidade = null;
  $x=0;
  $dao = new Dao();
  $model = new Model();
  $search = new ModelSearchCriteria();
     $model->settabela('personagem');
     $search->settabela('personagem');
  //print_r(strstr($_POST,'_'));die;
  if(!@$_GET['maisum']){
     foreach($_POST as $key => $item){
      //print_r(strstr($key,'_'));die;
             if(strstr($key,'_')){
                   $habilidade .=$key.'/';
                   //echo $habilidade;
                   $x++;
             }else{
                   $classe='set'.$key;
                   $model->$classe($item);
             }
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
	  if(($x<3||$x>3) && !@$_GET['maisum']){
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
        $search->setclasse($model->getclasse());
        $search->settabela('tb_classes');
        $dadosClasse=$dao->encontrePorClasse($search);
   /*print_r($_POST);
   echo '<br><br>';
   print_r($model);
   echo '<br><br>';
   print_r($dadosRaca);
   die;*/
        //print_r($search);die;
   //print_r($_GET);echo '<br><br>';
   //print_r($_POST);echo '<br><br>';
   //print_r($model);die;
        if(!@$_GET['maisum']){
           $dao->grava($model);
        }
        
        //print_r($model);die;
        if($model->getraca()=='humano'){
         if(!@$_GET['maisum']){
          echo '<form action="../paginas/add.php?act=cad2&maisum=1&personagem='.$model->getpersonagem().'" method=post>';
          echo '<div class=maisum>';
           //$valor='<script>prompt("escrava alguma coisa")</script>';
           //echo $valor;die;
            //$opcao=readline("opção: ");
           echo 'Selecione + 1 a uma das 4 opções abaixo:<br>';
           echo '<lable>Força</lable><input type=radio name=maisum value=F>';
           echo '<lable>Agilidade</lable><input type=radio name=maisum value=A>';
           echo '<lable>Inteligência</lable><input type=radio name=maisum value=I>';
           echo '<lable>Vontade</lable><input type=radio name=maisum value=V>';
           echo '</div>';
           echo '<div class=maisumbnt>';
           echo '<button class=\'continua continua-verde\' >Continua...</button>';
           echo '</div>';
           echo '</form>';
           die;
         }else{
           //echo $humanoF;die;
           //print_r($_GET);echo '<br><br>';
           //print_r($_POST);echo '<br><br>';
           //echo "humanoF -> $humanoF - humanoA -> $humanoA - humanoI -> $humanoI - humanoV -> $humanoV";echo '<br><br>';
           //print_r($model);
           //die;
         }
        }
        $dadosRaca->settabela('atributos');
        $dadosRaca->setpersonagem($model->getpersonagem());
        $dadosRaca->setPV(60);
        $dadosRaca->setPM(60);
        $dadosRaca->setPE(0);
        //if()
        //print_r($model);echo '<br><br>';
        //print_r($dadosClasse);die;
        $bonus=explode(';',$dadosClasse->getBONUS_ATRIBUTO());
        switch($bonus[0][0]){
           case 'F':
             //echo 'é um F - '.$dadosRaca->getForca(). '-> ';
             //echo $dadosRaca->getForca()+1;
             //echo $dadosRaca->getForca();echo ' - ';
             $dadosRaca->setFORCA($dadosRaca->getForca()+1+$humanoF);
             //echo $dadosRaca->getForca();die;
             break;
           case 'A':
             //echo 'é um A - '.$dadosRaca->getAGILIDADE().'-> ';
             //echo $dadosRaca->getAGILIDADE();echo ' - ';die;
             $dadosRaca->setAGILIDADE($dadosRaca->getAGILIDADE()+1+$humanoA);
             //echo $dadosRaca->getAGILIDADE();
             break;
           case 'I':
             ////echo 'é um I - '.$dadosRaca->getINTELIGENCIA().'-> ';
             //echo $dadosRaca->getINTELIGENCIA()+1;
             $dadosRaca->setINTELIGENCIA($dadosRaca->getINTELIGENCIA()+1+$humanoI);
             break;
           case 'V':
             //echo 'é um V - '.$dadosRaca->getVONTADE().'-> ';
             //echo $dadosRaca->getVONTADE()+1;
             $dadosRaca->setVONTADE($dadosRaca->getVONTADE()+1+$humanoV);
             break;
        }
        echo '<br><br>';
        switch($bonus[1][0]){
           case 'F':
             //echo 'é um F - '.$dadosRaca->getForca(). '-> ';
             //echo $dadosRaca->getForca()+1;
             $dadosRaca->setFORCA($dadosRaca->getForca()+1);
             break;
           case 'A':
             //echo 'é um A - '.$dadosRaca->getAGILIDADE().'-> ';
             //echo $dadosRaca->getAGILIDADE()+1;
             $dadosRaca->setAGILIDADE($dadosRaca->getAGILIDADE()+1);
             break;
           case 'I':
             //echo 'é um I - '.$dadosRaca->getINTELIGENCIA().'-> ';
             //echo $dadosRaca->getINTELIGENCIA()+1;
             $dadosRaca->setINTELIGENCIA($dadosRaca->getINTELIGENCIA()+1);
             break;
           case 'V':
             //echo 'é um V - '.$dadosRaca->getVONTADE().'-> ';
             //echo $dadosRaca->getVONTADE()+1;
             $dadosRaca->setVONTADE($dadosRaca->getVONTADE()+1);
             break;
        }
        if($model->getraca()=='humano'){
           switch ($atribamais){
              case 'F':
                $dadosRaca->setFORCA($dadosRaca->getFORCA()+1);
                break;
              case 'A':
                $dadosRaca->setAGILIDADE($dadosRaca->getAGILIDADE()+1);
                break;
              case 'I':
                $dadosRaca->setINTELIGENCIA($dadosRaca->getINTELIGENCIA()+1);
                break;
              case 'V':
                $dadosRaca->setVONTADE($dadosRaca->getVONTADE()+1);
                break;
           }
        }
        //echo $bonus[0][0];
        //echo '<br><br>';
        //echo $bonus[1][0];echo '<br><br>';
        //print_r($dadosRaca);die;
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