<?php 
 class modelMapper{
  public static function map(Model $model, array $properties){
	if (array_key_exists('id', $properties)){
	  $model->setid($properties['id']);
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
	if (array_key_exists('criado', $properties)){
	  $model->setcriado($properties['criado']);
	}
	if (array_key_exists('modificado', $properties)){
	  $model->setmodificado($properties['modificado']);
	}
	if (array_key_exists('excluido', $properties)){
	  $model->setexcluido($properties['excluido']);
	}
  } 
 }