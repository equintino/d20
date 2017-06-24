<link rel="stylesheet" href="../web/css/layout.css" type="text/css" media='screen'/>
<?php
  include_once '../dao/dao.php';
  include_once '../model/model.php';
  include_once '../config/Config.php';
  include_once '../mapping/modelMapper.php';
  include_once '../dao/ModelSearchCriteria.php';
  include_once '../validacao/ModelValidador.php';
  @$avatar=$_COOKIE['avatar'];
  $act=$_GET['act'];
  @$login=strtoupper($_COOKIE['login']);
  @$personagem = $_GET['personagem'];
    if(!isset($personagem)){
	@$personagem=$_POST['personagem'];
    }
  @$classe = $_GET['classe'];
  @$raca = $_GET['raca'];
  @$comecando = $_GET['comecando'];
  @$missao = $_POST['missao'];
  if($raca){
     $raca=$_POST;
  }
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
        foreach($busca as $dados);
        if($dados->getpersonagem()){
          echo '<div class=add>';
          echo '<h3>PERSONAGEM <font color=red size=15px>'.$dados->getpersonagem().'</font> J�? EXISTE!</h3>';
          echo '<button class=\'continua continua-verde\' onclick=history.go(-1);>Voltar</button>';
          echo '</div>';
          die;
        }else{
            $dao->grava($model);
        }
      }else{
      if($login=='MESTRE'){
	////// enviando arquivo /////////
	$target_dir = "../web/imagens/personagens/mestre/";
	$target_file = $target_dir . basename($_FILES["avatarMestre"]["name"]);
	$uploadOk = 1;

	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES["avatarMestre"]["tmp_name"]);
	    if($check !== false) {
		echo "O arquivo � uma imagem - " . $check["mime"] . ".";
		$uploadOk = 1;
	    } else {
		echo "O arquivo n�o � uma imagem.";
		$uploadOk = 0;
	    }
	}
	// Check if file already exists
	if (file_exists($target_file)) {
	    echo "Sorry, file already exists.";
	    $uploadOk = 0;
	}
	// Check file size
	if ($_FILES["avatarMestre"]["size"] > 500000) {
	    echo "Sorry, your file is too large.";
	    $uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	    $uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
	    if (move_uploaded_file($_FILES["avatarMestre"]["tmp_name"], $target_file)) {
		echo "The file ". basename( $_FILES["avatarMestre"]["name"]). " has been uploaded.";
	    } else {
		echo "Sorry, there was an error uploading your file.";
	    }
	}

	///// /////// //////// //////
	$avatar = str_replace('../web/','',$target_file);
    }
//print_r($_FILES["avatarMestre"]["tmp_name"]);die;
        $model->setavatar($avatar);
        $dao->grava($model); 
     }
	echo '<div class=\'add\'>'.
               '<h3>REGISTRO GRAVADO COM SUCESSO</h3>'.
               '<a href=\'../web/index.php?pagina=cadastro&act=cad2&raca='.$model->getraca().'&classe='.$model->getclasse().'&personagem='. $model->getpersonagem().' \' ></a>'.
             '</div>';  //<button class=\'continua continua-verde\'>Continua...</button>     
                echo '<meta http-equiv="refresh" content="1;URL=../web/index.php?pagina=cadastro&act=cad2&raca='.$model->getraca().'&classe='.$model->getclasse().'&personagem='. $model->getpersonagem().'">';
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
	  }

	$search->settabela('personagem');
        $search->setpersonagem($_GET['personagem']);
	$modelNew=$model;
	$model=$dao->encontrePorPersonagem($search);
	$model->sethabilidade($habilidade);
	$model->setidade($modelNew->getidade());
	$model->setaltura($modelNew->getaltura());
	$model->setpeso($modelNew->getpeso());
	$model->setcidade($modelNew->getcidade());
	$model->setmotivacao($modelNew->getmotivacao());
	$model->setbreveHistoria($modelNew->getbreveHistoria());
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
          echo '<div class=humanoAtrib>';
          echo '<div class=maisum>';
           echo 'Selecione + 1 a uma das 4 opções abaixo:<br>';
           echo '<lable>Força</lable><input type=radio name=maisum value=F>';
           echo '<lable>Agilidade</lable><input type=radio name=maisum value=A>';
           echo '<lable>Inteligência</lable><input type=radio name=maisum value=I>';
           echo '<lable>Vontade</lable><input type=radio name=maisum value=V>';
           echo '</div>';
           echo '<span class=maisumbnt>';
           echo '<button class=\'continua continua-verde\' >Continua...</button>';
           echo '</span>';
           echo '</div>';
           echo '</form>';
           //echo '<meta http-equiv="refresh" content="2;URL=../paginas/add.php?act=cad2&maisum=1&raca='.$model->getraca().'&classe='.$model->getclasse().'&personagem='. $model->getpersonagem().'">';
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
               '<a href=\'../web/index.php?pagina=cadastro&act=cad3&raca='.$model->getraca().'&classe='.$model->getclasse().'&personagem='. $model->getpersonagem().'\' ></a>'.
             '</div>';//<button class=\'continua continua-verde\'>Continua...</button>
        echo '<meta http-equiv="refresh" content="1;URL=../web/index.php?pagina=cadastro&act=cad3&raca='.$model->getraca().'&classe='.$model->getclasse().'&personagem='. $model->getpersonagem().'">';
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
          $model->setraca($_GET['raca']);
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
          $model->setouro($recurso-$custo);
        $dao->grava4($model);
	echo '<div class=\'add\'>'.
               '<h3>REGISTRO GRAVADO COM SUCESSO</h3>'.
               '<a href=\'../web/index.php?pagina=cadastro&act=cad4&raca='.$model->getraca().'&classe='.$model->getclasse().'&personagem='. $model->getpersonagem().'\' ></a>'.
             '</div>';//<button class=\'continua continua-verde\'>Continua...</button>
        echo '<meta http-equiv="refresh" content="1;URL=../web/index.php?pagina=cadastro&act=cad4&raca='.$model->getraca().'&classe='.$model->getclasse().'&personagem='. $model->getpersonagem().'">';
	die;
  } 
  if($act == 'cad4' || $act == 'cad5' || $act == 'cad6' || $act=='cad7'){
    if(!$_POST){
      if($act != 'cad7'){
	echo '<div class=\'add\'>'.
               '<h3>Nenhum item selecionado.</h3>'.
               '<button onclick=history.go(-1); class=\'continua continua-verde\'>Voltar</button>'.
             '</div>';
        die;
      }
    }
     $search->setpersonagem($personagem);
     $search->settabela('atributos');
     $atrib=$dao->encontre($search);
     foreach($atrib as $atributo){
         if($atributo->getFORCA() > $atributo->getAGILIDADE()){
            $maisAtrib=$atributo->getFORCA();
         }else{
            $maisAtrib=$atributo->getAGILIDADE();
         }
     }
     $search->settabela('armamentos');
     $model->setclasse($_GET['classe']);
     if($_GET['raca']){
        $model->setraca($_GET['raca']);
     }
     $armas=$custo=$defesa=null;
     $armamento=$dao->encontrePorPersonagem($search);
          foreach($_POST as $key => $item){
            if($act=='cad5'){
                $itemArma=(explode('/',$key));
                $defesa = $defesa+$itemArma[1];
                if($defesa > 4){
                    $defesa = 4;
                }
                if($_GET['raca']=='halfling'){
                    $defesa = $defesa+1;
                }
                $key = $itemArma[0];
            }
            $armas .= $key.'/';
            $custo = $custo+$item;
          }
     switch($act){
         case 'cad4':
             $cad='cad5';
             break;
         case 'cad5':
             $cad='cad6';
             break;
         case 'cad6':
             $cad='cad7';
             break;
         case 'cad7':
             $cad='cad8';
             break;
     }
     if($armamento){
        $saldo=$armamento->getouro()-$custo;
        if($act=='cad4'){
           $armamento->setARMA($armamento->getARMA().$armas);
        }elseif($act=='cad5'){
           $armamento->setarmadura($armamento->getarmadura().$armas);
           $armamento->setdefesa($defesa+5+$maisAtrib);
        }elseif($act=='cad6'){
           $armamento->setARMA($armamento->getARMA().$armas);
        }elseif($act=='cad7'){
           $armamento->setequipamento($armamento->getequipamento().$armas);
        }
        $armamento->setouro($saldo);
        $armamento->settabela('armamentos');
        if(!$armamento->getdefesa()){
            $armamento->setdefesa(5+$maisAtrib);
        }
        $dao->grava4($armamento);
     }else{
        $saldo=400-$custo;
        if($act=='cad4'){
           $model->setARMA($armas);
        }elseif($act=='cad5'){
           $model->setarmadura($armas);
           $model->setdefesa($defesa+5+$maisAtrib);
        }elseif($act=='cad6'){
           $model->setARMA($armas);
        }
        $model->setouro($saldo);
        $model->settabela('armamentos');
        $model->setpersonagem($personagem);
        $model->setid(null);
        $dao->grava4($model);
     }
	echo '<div class=\'add\'>'.
               '<h3>REGISTRO GRAVADO COM SUCESSO</h3>'.
               '<a href=\'../web/index.php?pagina=cadastro&act='.$cad.'&raca='.$model->getraca().'&classe='.$model->getclasse().'&personagem='. $personagem.'\' ></a>'.
             '</div>';//<button class=\'continua continua-verde\'>Continua...</button>
        echo '<meta http-equiv="refresh" content="1;URL=../web/index.php?pagina=cadastro&act='.$cad.'&raca='.$model->getraca().'&classe='.$model->getclasse().'&personagem='. $personagem.'">';
	die;
  }
  if($act=='missao'){
     if($login=='MESTRE' && !$personagem){
         goto missaoMestre;
     }
     echo '<font color=white>'; 
     $search->settabela('missao');
     $search->setMISSAO($missao);
     $search->setpersonagem($personagem);
     $dadoPersonagem=$dao->encontrePorMissao($search);
     if($comecando==1){        
         $model->setemMissao(1);
         $model->setpersonagem($personagem);
         $model->settabela('missao');
         $model->setMISSAO($missao);
         //$search->settabela($model->gettabela());
         $model->setjogador($login);
         if($dadoPersonagem){
            $model->setexcluido(0);
            $model->setid($dadoPersonagem->getid());
         }
         $model->setDATA('1850-10-02 18:10:00'); 
         $dao->grava5($model); 
         echo '<meta http-equiv="refresh" content="1;URL=../web/index.php?pagina=missao&personagem='.$personagem.'">';
         die;
     }else{ 
         $model->setemMissao(1);
         $model->setpersonagem($personagem);
         $model->settabela('missao');
         $dao->setaMissao($model);
         echo '<meta http-equiv="refresh" content="1;URL=../web/index.php?pagina=missao&personagem='. $personagem.'">';
         die;
     }
  }
  if($act=='cadVilao'){
     $model->setvilao($_POST['vilao']);
     $model->setidade($_POST['idade']);
     $model->setsexo($_POST['sexo']);
     $model->setDESCRICAO($_POST['descricao']);
     $model->setraca($_POST['raca']);
     $model->setclasse($_POST['classe']);
     $model->setavatar($avatar);
     $model->settabela('viloes');
     
     $dao->grava6($model);
     header('Location:../web/index.php?pagina=viloes&act=cad2Vilao&vilao='.$model->getvilao().'');
  }
  if($act=='cad2Vilao'){
     @$vilao=$_GET['vilao'];
     $search->settabela('viloes');
     $search->setvilao($vilao);
     $model=$dao->encontrePorVilao($search);
     
     $model->setvilao($vilao);
     $model->setFORCA($_POST['F']);
     $model->setAGILIDADE($_POST['A']);
     $model->setINTELIGENCIA($_POST['I']);
     $model->setVONTADE($_POST['V']);
     $model->setPV($_POST['PV']);
     $model->setPM($_POST['PM']);
     $model->settabela('viloes');
     
     $dao->grava6($model);
     header('Location:../web/index.php?pagina=viloes&act=cad3Vilao&vilao='.$model->getvilao().'');
  }
  if($act == 'cadMissao'){
     $avatar=($_COOKIE['avatar']);
     $data=$_POST['ano'].'-'.$_POST['mes'].'-'.$_POST['dia'].' '.$_POST['hora'].':'.$_POST['min'].':'.'00';
     $missao=$_POST['missao'];
     $descricao=$_POST['descricao'];
     $objetivo=$_POST['objetivo'];
     $local=$_POST['local'];
     $vilao=$_COOKIE['vilao'];
     $recompensa=$_POST['recompensa'];
     $falha=$_POST['falha'];
     $como=$_POST['como'];
     
     $search->setMISSAO($missao);
     $search->settabela('tb_missao');
     $verificar=$dao->encontrePorMissao($search);
        if($verificar){
          echo '<div class=add>';
          echo '<h3>MISSÃO <font color=red size=15px>'.$search->getMISSAO().'<br></font> J�? EXISTE!</h3>';
          echo '<button class=\'continua continua-verde\' onclick=history.go(-1);>Voltar</button>';
          echo '</div>';
          die;
        }else{
     
     $model->setMISSAO($missao);
     $model->settabela('tb_missao');
     $model->setDESCRICAO($descricao);
     $model->setDATA($data);
     $model->setobjetivo($objetivo);
     $model->setlocal($local);
     $model->setvilao($vilao);
     $model->setrecompensa($recompensa);
     $model->setfalha($falha);
     $model->setcomo($como);
     $model->setavatar($avatar);
     $dao->grava7($model);
     
     header('Location:../web/index.php');
     die;
     }
  }
  missaoMestre:
     $model->settabela('tb_missao');
     $model->setMISSAO($missao);
     $model->setemMissao(1);
     
     $dao->setaMissao($model);
   header('Location:../web/index.php?pagina=missao&missao='.$missao.'');
?>