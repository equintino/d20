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
	if (array_key_exists('avatar', $properties)){
	  $model->setavatar($properties['avatar']);
	}
	if (array_key_exists('nivel', $properties)){
	  $model->setnivel($properties['nivel']);
	}
	if (array_key_exists('emMissao', $properties)){
	  $model->setemMissao($properties['emMissao']);
	}
	if (array_key_exists('vilao', $properties)){
	  $model->setvilao($properties['vilao']);
	}
	if (array_key_exists('foto', $properties)){
	  $model->setfoto($properties['foto']);
	}
	if (array_key_exists('id_atrib', $properties)){
	  $model->setid_atrib($properties['id_atrib']);
	}
	if (array_key_exists('FORCA', $properties)){
	  $model->setFORCA($properties['FORCA']);
	}
	if (array_key_exists('AGILIDADE', $properties)){
	  $model->setAGILIDADE($properties['AGILIDADE']);
	}
	if (array_key_exists('INTELIGENCIA', $properties)){
	  $model->setINTELIGENCIA($properties['INTELIGENCIA']);
	}
	if (array_key_exists('VONTADE', $properties)){
	  $model->setVONTADE($properties['VONTADE']);
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
	if (array_key_exists('CLASSE_COMUM', $properties)){
	  $model->setCLASSE_COMUM($properties['CLASSE_COMUM']);
	}
	if (array_key_exists('HABILIDADE_AUTOMATICA', $properties)){
	  $model->setHABILIDADE_AUTOMATICA($properties['HABILIDADE_AUTOMATICA']);
	}
	if (array_key_exists('ARMA', $properties)){
	  $model->setARMA($properties['ARMA']);
	}
	if (array_key_exists('ouro', $properties)){
	  $model->setouro($properties['ouro']);
	}
	if (array_key_exists('DANO', $properties)){
	  $model->setDANO($properties['DANO']);
	}
	if (array_key_exists('TIPO', $properties)){
	  $model->setTIPO($properties['TIPO']);
	}
	if (array_key_exists('FN', $properties)){
	  $model->setFN($properties['FN']);
	}
	if (array_key_exists('GRUPO', $properties)){
	  $model->setGRUPO($properties['GRUPO']);
	}
	if (array_key_exists('OBS', $properties)){
	  $model->setOBS($properties['OBS']);
	}
	if (array_key_exists('figura', $properties)){
	  $model->setfigura($properties['figura']);
	}
	if (array_key_exists('BONUS_ATRIBUTO', $properties)){
	  $model->setBONUS_ATRIBUTO($properties['BONUS_ATRIBUTO']);
	}
	if (array_key_exists('PROFICIENCIA', $properties)){
	  $model->setPROFICIENCIA($properties['PROFICIENCIA']);
	}
	if (array_key_exists('REQUISITOS', $properties)){
	  $model->setREQUISITOS($properties['REQUISITOS']);
	}
	if (array_key_exists('MANA', $properties)){
	  $model->setMANA($properties['MANA']);
	}
	if (array_key_exists('DESCRICAO', $properties)){
	  $model->setDESCRICAO($properties['DESCRICAO']);
	}
	if (array_key_exists('armadura', $properties)){
	  $model->setarmadura($properties['armadura']);
	}
	if (array_key_exists('defesa', $properties)){
	  $model->setdefesa($properties['defesa']);
	}
	if (array_key_exists('item', $properties)){
	  $model->setitem($properties['item']);
	}
	if (array_key_exists('equipamento', $properties)){
	  $model->setequipamento($properties['equipamento']);
	}
	if (array_key_exists('DIA', $properties)){
	  $model->setDIA($properties['DIA']);
	}
	if (array_key_exists('TEMPMAX', $properties)){
	  $model->setTEMPMAX($properties['TEMPMAX']);
	}
	if (array_key_exists('TEMPMIN', $properties)){
	  $model->setTEMPMIN($properties['TEMPMIN']);
	}
	if (array_key_exists('ESTACAO', $properties)){
	  $model->setESTACAO($properties['ESTACAO']);
	}
	if (array_key_exists('LUAS', $properties)){
	  $model->setLUAS($properties['LUAS']);
	}
	if (array_key_exists('figura2', $properties)){
	  $model->setfigura2($properties['figura2']);
	}
	if (array_key_exists('figura3', $properties)){
	  $model->setfigura3($properties['figura3']);
	}
	if (array_key_exists('DATA', $properties)){
	  $model->setDATA($properties['DATA']);
	}
	if (array_key_exists('MISSAO', $properties)){
	  $model->setMISSAO($properties['MISSAO']);
	}
	if (array_key_exists('anotacoes', $properties)){
	  $model->setanotacoes($properties['anotacoes']);
	}
	if (array_key_exists('objetivo', $properties)){
	  $model->setobjetivo($properties['objetivo']);
	}
	if (array_key_exists('local', $properties)){
	  $model->setlocal($properties['local']);
	}
	if (array_key_exists('recompensa', $properties)){
	  $model->setrecompensa($properties['recompensa']);
	}
	if (array_key_exists('falha', $properties)){
	  $model->setfalha($properties['falha']);
	}
	if (array_key_exists('como', $properties)){
	  $model->setcomo($properties['como']);
	}
  } 
 }