<?php
    $filename='ModelSearchCriteria.php';
    $mode='w+';
    $handle=fopen($filename, $mode);
    $variaveis=array('id','jogador','personagem','raca','classe','tendencia1','tendencia2','idade','tabela','sexo','criado','modificado','excluido','habilidade','altura','peso','cidade','motivacao','breveHistoria','avatar','nivel','emMissao','vilao','foto');
    $variaveis2=array('id_atrib','FORCA','AGILIDADE','INTELIGENCIA','VONTADE','PV','PM','PE','CLASSE_COMUM','HABILIDADE_AUTOMATICA');
    $variaveis3=array('ARMA','ouro','DANO','TIPO','FN','GRUPO','OBS','figura');
    $variaveis4=array('BONUS_ATRIBUTO','PROFICIENCIA');
    $variaveis5=array('armadura','defesa','item','equipamento');
    $variaveis6=array('DATA','MISSAO','anotacoes','objetivo','local','recompensa','falha','como');
    
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
      foreach($variaveis3 as $item){
      $texto .= '   private $'.$item.';
       public function get'.$item.'(){
        return $this->'.$item.';
      }
      public function set'.$item.'($'.$item.'){
          $this->'.$item.' = $'.$item.';
          return $this;
      }'."\r\n";
    }
      foreach($variaveis4 as $item){
      $texto .= '   private $'.$item.';
       public function get'.$item.'(){
        return $this->'.$item.';
      }
      public function set'.$item.'($'.$item.'){
          $this->'.$item.' = $'.$item.';
          return $this;
      }'."\r\n";
    }
      foreach($variaveis5 as $item){
      $texto .= '   private $'.$item.';
       public function get'.$item.'(){
        return $this->'.$item.';
      }
      public function set'.$item.'($'.$item.'){
          $this->'.$item.' = $'.$item.';
          return $this;
      }'."\r\n";
    }
      foreach($variaveis6 as $item){
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
