<?php
    $filename='model.php';
    $mode='w+';
    $handle=fopen($filename, $mode);
    $variaveis=array('id','jogador','personagem','raca','classe','tendencia1','tendencia2','idade','tabela','sexo','criado','modificado','excluido','habilidade','altura','peso','cidade','motivacao','breveHistoria','avatar','nivel','emMissao','vilao','foto');
    $variaveis2=array('id_atrib','FORCA','AGILIDADE','INTELIGENCIA','VONTADE','PV','PM','PE','CLASSE_COMUM','HABILIDADE_AUTOMATICA');
    $variaveis3=array('ARMA','ouro','DANO','TIPO','FN','GRUPO','OBS','figura');
    $variaveis4=array('BONUS_ATRIBUTO','PROFICIENCIA');
    $variaveis5=array('REQUISITOS','MANA','DESCRICAO');
    $variaveis6=array('armadura','defesa','item','equipamento');
    $variaveis7=array('DIA','TEMPMAX','TEMPMIN','ESTACAO','LUAS','figura2','figura3');
    $variaveis8=array('DATA','MISSAO','anotacoes','objetivo','local','recompensa','falha','como');
    
    $texto="<?php \r\n class Model{\r\n";
    foreach($variaveis as $item){
      $texto .=' private $'.$item.';'."\r\n";
    }
    foreach($variaveis2 as $item){
      $texto .=' private $'.$item.';'."\r\n";
    }
    foreach($variaveis3 as $item){
      $texto .=' private $'.$item.';'."\r\n";
    }
    foreach($variaveis4 as $item){
      $texto .=' private $'.$item.';'."\r\n";
    }
    foreach($variaveis5 as $item){
      $texto .=' private $'.$item.';'."\r\n";
    }
    foreach($variaveis6 as $item){
      $texto .=' private $'.$item.';'."\r\n";
    }
    foreach($variaveis7 as $item){
      $texto .=' private $'.$item.';'."\r\n";
    }
    foreach($variaveis8 as $item){
      $texto .=' private $'.$item.';'."\r\n";
    }
          //fwrite($handle, $texto);  
        foreach($variaveis as $item){
          $texto .=  ' public function get'.$item."(){\r\n".
               "\t".'return $this->'.$item.";\r\n"." }\r\n".
               ' public function set'.$item.'($'.$item." ){\r\n".
               "\t".'$this->'.$item.'=$'.$item.";\r\n }\r\n";     
        }
        foreach($variaveis2 as $item){
          $texto .=  ' public function get'.$item."(){\r\n".
               "\t".'return $this->'.$item.";\r\n"." }\r\n".
               ' public function set'.$item.'($'.$item." ){\r\n".
               "\t".'$this->'.$item.'=$'.$item.";\r\n }\r\n";     
        }
        foreach($variaveis3 as $item){
          $texto .=  ' public function get'.$item."(){\r\n".
               "\t".'return $this->'.$item.";\r\n"." }\r\n".
               ' public function set'.$item.'($'.$item." ){\r\n".
               "\t".'$this->'.$item.'=$'.$item.";\r\n }\r\n";     
        }
        foreach($variaveis4 as $item){
          $texto .=  ' public function get'.$item."(){\r\n".
               "\t".'return $this->'.$item.";\r\n"." }\r\n".
               ' public function set'.$item.'($'.$item." ){\r\n".
               "\t".'$this->'.$item.'=$'.$item.";\r\n }\r\n";     
        }
        foreach($variaveis5 as $item){
          $texto .=  ' public function get'.$item."(){\r\n".
               "\t".'return $this->'.$item.";\r\n"." }\r\n".
               ' public function set'.$item.'($'.$item." ){\r\n".
               "\t".'$this->'.$item.'=$'.$item.";\r\n }\r\n";     
        }
        foreach($variaveis6 as $item){
          $texto .=  ' public function get'.$item."(){\r\n".
               "\t".'return $this->'.$item.";\r\n"." }\r\n".
               ' public function set'.$item.'($'.$item." ){\r\n".
               "\t".'$this->'.$item.'=$'.$item.";\r\n }\r\n";     
        }
        foreach($variaveis7 as $item){
          $texto .=  ' public function get'.$item."(){\r\n".
               "\t".'return $this->'.$item.";\r\n"." }\r\n".
               ' public function set'.$item.'($'.$item." ){\r\n".
               "\t".'$this->'.$item.'=$'.$item.";\r\n }\r\n";     
        }
        foreach($variaveis8 as $item){
          $texto .=  ' public function get'.$item."(){\r\n".
               "\t".'return $this->'.$item.";\r\n"." }\r\n".
               ' public function set'.$item.'($'.$item." ){\r\n".
               "\t".'$this->'.$item.'=$'.$item.";\r\n }\r\n";     
        }
    $texto .=' }';    
    fwrite($handle, $texto); 
    fclose($handle);
?>