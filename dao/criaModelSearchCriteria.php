<?php
    $filename='ModelSearchCriteria.php';
    $mode='w+';
    $handle=fopen($filename, $mode);
    $variaveis=array('id','personagem','raca','classe','tendencia1','tendencia2','idade','tabela','criado','modificado','excluido');
    
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
    $texto .= '}';
    fwrite($handle, $texto); 
    fclose($handle);
?>

