<?php 
 class modelMapper{
  public static function map(Model $model, array $properties){
	if (array_key_exists('id', $properties)){
	  $model->setid($properties['id']);
	}
	if (array_key_exists('jogador', $properties)){
	  $model->setjogador($properties['jogador']);
	}
	if (array_key_exists('personagem', $properties)){
	  $model->setpersonagem($properties['personagem']);
	}
	if (array_key_exists('raca', $properties)){
	  $model->setraca($properties['raca']);
	}
	if (array_key_exists('classe', $properties)){
	  $model->setclasse($properties['classe']);
	}
	if (array_key_exists('tendencia1', $properties)){
	  $model->settendencia1($properties['tendencia1']);
	}
	if (array_key_exists('tendencia2', $properties)){
	  $model->settendencia2($properties['tendencia2']);
	}
	if (array_key_exists('idade', $properties)){
	  $model->setidade($properties['idade']);
	}
	if (array_key_exists('tabela', $properties)){
	  $model->settabela($properties['tabela']);
	}
	if (array_key_exists('sexo', $properties)){
	  $model->setsexo($properties['sexo']);
	}
	if (array_key_exists('criado', $properties)){
	  $model->setcriado($properties['criado']);
	}
	if (array_key_exists('modificado', $properties)){
	  $model->setmodificado($properties['modificado']);
	}
	if (array_key_exists('excluido', $properties)){
	  $model->setexcluido($properties['excluido']);
	}
	if (array_key_exists('habilidade', $properties)){
	  $model->sethabilidade($properties['habilidade']);
	}
	if (array_key_exists('altura', $properties)){
	  $model->setaltura($properties['altura']);
	}
	if (array_key_exists('peso', $properties)){
	  $model->setpeso($properties['peso']);
	}
	if (array_key_exists('cidade', $properties)){
	  $model->setcidade($properties['cidade']);
	}
	if (array_key_exists('motivacao', $properties)){
	  $model->setmotivacao($properties['motivacao']);
	}
	if (array_key_exists('breveHistoria', $properties)){
	  $model->setbreveHistoria($properties['breveHistoria']);
	}
	if (array_key_exists('id_atrib', $properties)){
	  $model->setid_atrib($properties['id_atrib']);
	}
	if (array_key_exists('F', $properties)){
	  $model->setF($properties['F']);
	}
	if (array_key_exists('A', $properties)){
	  $model->setA($properties['A']);
	}
	if (array_key_exists('I', $properties)){
	  $model->setI($properties['I']);
	}
	if (array_key_exists('V', $properties)){
	  $model->setV($properties['V']);
	}
	if (array_key_exists('PV', $properties)){
	  $model->setPV($properties['PV']);
	}
	if (array_key_exists('PM', $properties)){
	  $model->setPM($properties['PM']);
	}
	if (array_key_exists('PE', $properties)){
	  $model->setPE($properties['PE']);
	}
  } 
 }