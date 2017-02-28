<?php
    $filename='ModelSearchCriteria.php';
    $mode='w+';
    $handle=fopen($filename, $mode);
    $variaveis=array('id','jogador','personagem','raca','classe','tendencia1','tendencia2','idade','tabela','sexo','criado','modificado','excluido','habilidade','altura','peso','cidade','motivacao','breveHistoria');
	$variaveis2=array('id_atrib','F','A','I','V','PV','PM','PE');
    
    $texto="<?php \r\n class ModelSearchCriteria{\r\n";
    foreach($variaveis as $item){
      $texto .= '   private $'.$item.';
       public function get'.$item.'(){
        return $this->'.$item.';
      }
      public function set'.$item.'($'.$item.'){
          $this->'.$item.' = $'.$item.';
          return $this;
      }'."\r\n";
    }
    foreach($variaveis2 as $item){
      $texto .= '   private $'.$item.';
       public function get'.$item.'(){
        return $this->'.$item.';
      }
      public function set'.$item.'($'.$item.'){
          $this->'.$item.' = $'.$item.';
          return $this;
      }'."\r\n";
    }
    $texto .= '}';
    fwrite($handle, $texto); 
    fclose($handle);
?>

