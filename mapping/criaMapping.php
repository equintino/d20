<?php
    $filename='modelMapper.php';
    $mode='w+';
    $handle=fopen($filename, $mode);
    $variaveis=array('id','jogador','personagem','raca','classe','tendencia1','tendencia2','idade','tabela','sexo','criado','modificado','excluido','habilidade','altura','peso','cidade','motivacao','breveHistoria','avatar','nivel');	
    $variaveis2=array('id_atrib','FORCA','AGILIDADE','INTELIGENCIA','VONTADE','PV','PM','PE','CLASSE_COMUM','HABILIDADE_AUTOMATICA');
    $variaveis3=array('ARMA','CUSTO','DANO','TIPO','FN','GRUPO','OBS','figura');
    $variaveis4=array('BONUS_ATRIBUTO','PROFICIENCIA');
    $variaveis5=array('REQUISITOS','MANA','DESCRICAO');
    $variaveis6=array('armadura','defesa','item','equipamento');
    $variaveis7=array('DIA','TEMPMAX','TEMPMIN','ESTACAO','LUAS','figura2','figura3');
    $texto="<?php \r\n class modelMapper{\r\n";
    $texto .= '  public static function map(Model $model, array $properties){'."\r\n";
    foreach($variaveis as $item){
      $texto .="\t".'if (array_key_exists(\''.$item.'\', $properties)){'."\r\n".
              "\t".'  $model->set'.$item.'($properties[\''.$item.'\']);'."\r\n".
              "\t".'}'."\r\n";
    }
    foreach($variaveis2 as $item){
      $texto .="\t".'if (array_key_exists(\''.$item.'\', $properties)){'."\r\n".
              "\t".'  $model->set'.$item.'($properties[\''.$item.'\']);'."\r\n".
              "\t".'}'."\r\n";
    }
    foreach($variaveis3 as $item){
      $texto .="\t".'if (array_key_exists(\''.$item.'\', $properties)){'."\r\n".
              "\t".'  $model->set'.$item.'($properties[\''.$item.'\']);'."\r\n".
              "\t".'}'."\r\n";
    }
    foreach($variaveis4 as $item){
      $texto .="\t".'if (array_key_exists(\''.$item.'\', $properties)){'."\r\n".
              "\t".'  $model->set'.$item.'($properties[\''.$item.'\']);'."\r\n".
              "\t".'}'."\r\n";
    }
    foreach($variaveis5 as $item){
      $texto .="\t".'if (array_key_exists(\''.$item.'\', $properties)){'."\r\n".
              "\t".'  $model->set'.$item.'($properties[\''.$item.'\']);'."\r\n".
              "\t".'}'."\r\n";
    }
    foreach($variaveis6 as $item){
      $texto .="\t".'if (array_key_exists(\''.$item.'\', $properties)){'."\r\n".
              "\t".'  $model->set'.$item.'($properties[\''.$item.'\']);'."\r\n".
              "\t".'}'."\r\n";
    }
    foreach($variaveis7 as $item){
      $texto .="\t".'if (array_key_exists(\''.$item.'\', $properties)){'."\r\n".
              "\t".'  $model->set'.$item.'($properties[\''.$item.'\']);'."\r\n".
              "\t".'}'."\r\n";
    }
    $texto .= '  }'." \r\n }";    
    fwrite($handle, $texto); 
    fclose($handle);
?>

