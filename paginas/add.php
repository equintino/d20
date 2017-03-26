<link rel="stylesheet" href="../web/css/layout.css" type="text/css" media='screen'/>
<?php
  include_once '../dao/dao.php';
  include_once '../model/model.php';
  include_once '../config/Config.php';
  include_once '../mapping/modelMapper.php';
  include_once '../dao/ModelSearchCriteria.php';
  include_once '../validacao/ModelValidador.php';
  $act=$_GET['act'];
  $personagem = $_GET['personagem'];
  @$classe = $_GET['classe'];
  @$atribamais=$_POST['maisum'];
  $humanoF=$humanoA=$humanoI=$humanoV=0;
  $habilidade = null;
  $x=0;
  $dao = new Dao();
  $model = new Model();
  $search = new ModelSearchCriteria();
     $model->settabela('personagem');
     $search->settabela('personagem');
  if(!@$_GET['maisum']){
     foreach($_POST as $key => $item){
                if(in_array('get'.$key,get_class_methods($model))){
                   $classe='set'.$key;
                   $model->$classe($item);
                }else{
                   $habilidade .=$key.'/';
                   $x++;
                }
     }
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
     }else{
		$dao->grava($model); 
    }
	echo '<div class=\'add\'>'.
               '<h3>REGISTRO GRAVADO COM SUCESSO</h3>'.
               '<a href=\'../web/index.php?pagina=cadastro&act=cad2&classe='.$model->getclasse().'&personagem='. $model->getpersonagem().'\' ><button class=\'continua continua-verde\'>Continua...</button></a>'.
             '</div>';
	die;
  }
  if($act == 'rel'){ 
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

        if(!@$_GET['maisum']){
           $dao->grava($model);
        }
        
        if($model->getraca()=='humano'){
         if(!@$_GET['maisum']){
          echo '<form action="../paginas/add.php?act=cad2&maisum=1&personagem='.$model->getpersonagem().'" method=post>';
          echo '<div class=maisum>';
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
         }
        }
        $dadosRaca->settabela('atributos');
        $dadosRaca->setpersonagem($model->getpersonagem());
        $dadosRaca->setPV(60);
        $dadosRaca->setPM(60);
        $dadosRaca->setPE(0);
        $bonus=explode(';',$dadosClasse->getBONUS_ATRIBUTO());
        switch($bonus[0][0]){
           case 'F':
             $dadosRaca->setFORCA($dadosRaca->getForca()+1+$humanoF);
             break;
           case 'A':
             $dadosRaca->setAGILIDADE($dadosRaca->getAGILIDADE()+1+$humanoA);
             break;
           case 'I':
             $dadosRaca->setINTELIGENCIA($dadosRaca->getINTELIGENCIA()+1+$humanoI);
             break;
           case 'V':
             $dadosRaca->setVONTADE($dadosRaca->getVONTADE()+1+$humanoV);
             break;
        }
        echo '<br><br>';
        switch($bonus[1][0]){
           case 'F':
             $dadosRaca->setFORCA($dadosRaca->getForca()+1);
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
        $dadosRaca->setDESCRICAO($dadosRaca->getOBS());
        $dao->grava2($dadosRaca);
	echo '<div class=\'add\'>'.
               '<h3>REGISTRO GRAVADO COM SUCESSO</h3>'.
               '<a href=\'../web/index.php?pagina=cadastro&act=cad3&classe='.$model->getclasse().'&personagem='. $model->getpersonagem().'\' ><button class=\'continua continua-verde\'>Continua...</button></a>'.
             '</div>';
	die;
  }
  if($act == 'cad3'){
    if(!$_POST){
	echo '<div class=\'add\'>'.
               '<h3>Nenhum item selecionado.</h3>'.
               '<button onclick=history.go(-1); class=\'continua continua-verde\'>Voltar</button>'.
             '</div>';
        die;
    }
	  $model->setpersonagem($_GET['personagem']);
          $model->setclasse($_GET['classe']);
	  $model->settabela('armamentos');
          $model->setpersonagem($_GET['personagem']);
          $armas = null;
          $recurso=400;
          $custo = 0;
          foreach($_POST as $key => $item){
            $armas .= $key.'/';
            $custo = $custo+$item;
          }
          if(($recurso - $custo)<0){
	echo '<div class=\'add\'>'.
               '<h3>Você não possui recursos suficientes.</h3>'.
               '<button onclick=history.go(-1); class=\'continua continua-verde\'>Voltar</button>'.
             '</div>';
        die;
          }
          $model->setARMA($armas);
          $model->setCUSTO($recurso-$custo);
        $dao->grava4($model);
	echo '<div class=\'add\'>'.
               '<h3>REGISTRO GRAVADO COM SUCESSO</h3>'.
               '<a href=\'../web/index.php?pagina=cadastro&act=cad4&classe='.$model->getclasse().'&personagem='. $model->getpersonagem().'\' ><button class=\'continua continua-verde\'>Continua...</button></a>'.
             '</div>';
	die;
  } 
  if($act == 'cad4' || $act == 'cad5' || $act == 'cad6'){
    if(!$_POST){
	echo '<div class=\'add\'>'.
               '<h3>Nenhum item selecionado.</h3>'.
               '<button onclick=history.go(-1); class=\'continua continua-verde\'>Voltar</button>'.
             '</div>';
        die;
    }
     //$personagem=$_GET['personagem'];
     $search->settabela('armamentos');
     $search->setpersonagem($personagem);
     $model->setclasse($_GET['classe']);
     $armas=$custo=null;
     $armamento=$dao->encontrePorPersonagem($search);
     //print_r($armamento);die;
          foreach($_POST as $key => $item){
            $armas .= $key.'/';
            $custo = $custo+$item;
          }
     if($armamento){
        $saldo=$armamento->getCUSTO()-$custo;
        if($act=='cad4'){
           $armamento->setARMA($armamento->getARMA().$armas);
           $cad='cad5';
        }elseif($act=='cad5'){
           $armamento->setarmadura($armamento->getarmadura().$armas);
           $cad='cad6';
        }elseif($act=='cad6'){
           $armamento->setARMA($armamento->getARMA().$armas);
           $cad='cad7';
        }
        $armamento->setCUSTO($saldo);
        $armamento->settabela('armamentos');
        $dao->grava4($armamento);
     }else{
        $saldo=400-$custo;
        if($act=='cad4'){
           $model->setARMA($armas);
           $cad='cad5';
        }elseif($act=='cad5'){
           $model->setarmadura($armas);
           $cad='cad6';
        }elseif($act=='cad6'){
           $model->setARMA($armas);
           $cad='cad7';
        }
        $model->setCUSTO($saldo);
        $model->settabela('armamentos');
        $model->setpersonagem($personagem);
        $model->setid(null);
        //print_r($model);die;
        $dao->grava4($model);
     }
	echo '<div class=\'add\'>'.
               '<h3>REGISTRO GRAVADO COM SUCESSO</h3>'.
               '<a href=\'../web/index.php?pagina=cadastro&act='.$cad.'&classe='.$model->getclasse().'&personagem='. $personagem.'\' ><button class=\'continua continua-verde\'>Continua...</button></a>'.
             '</div>';
	die;
  }
  /*if($act == 'cad5'){
    if(!$_POST){
	echo '<div class=\'add\'>'.
               '<h3>Nenhum item selecionado.</h3>'.
               '<button onclick=history.go(-1); class=\'continua continua-verde\'>Voltar</button>'.
             '</div>';
        die;
    }
     $search->settabela('armamentos');
     $search->setpersonagem($personagem);
     $armamento=$dao->encontrePorPersonagem($search);
     $armas=$custo=null;
     $armamento=$dao->encontrePorPersonagem($search);
          foreach($_POST as $key => $item){
            $armas .= $key.'/';
            $custo = $custo+$item;
          }
     print_r($custo);
     die;
  }*/
?>
<!--<div class='add'>
<h3>REGISTRO GRAVADO COM SUCESSO</h3>
<!--<button onclick="history.go(-2)" >VOLTAR</button>-->
<!--<a href='../web/index.php?pagina=cadastro&act=cad2&classe=<?php echo $model->getclasse() ?>&personagem=<?= $model->getpersonagem(); ?>' ><button class='continua continua-verde'>Continua...</button></a>
</div>-->