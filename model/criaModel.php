<?php
    $filename='model.php';
    $mode='w+';
    $handle=fopen($filename, $mode);
    $variaveis=array('id','jogador','personagem','raca','classe','tendencia1','tendencia2','idade','tabela','sexo','criado','modificado','excluido','habilidade','altura','peso','cidade','motivacao','breveHistoria');
    $variaveis2=array('id_atrib','F','A','I','V','PV','PM','PE');
    $variaveis3=array('ARMA','CUSTO','DANO','TIPO','FN','GRUPO','OBS','figura');
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
    $texto .=' }';    
    fwrite($handle, $texto); 
    fclose($handle);
?>

