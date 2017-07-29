<?php
    $filename='dao.php';
    $mode='w+';
    $handle=fopen($filename, $mode);
    $banco='d20';
    $variaveis=array('id','jogador','personagem','raca','classe','tendencia1','tendencia2','idade','tabela','sexo','criado','modificado','excluido','habilidade','altura','peso','cidade','motivacao','breveHistoria','avatar','nivel','emMissao','foto');
    $tabela='`\'.$model->gettabela().\'`';
    $variaveis2=array('id_atrib','FORCA','AGILIDADE','INTELIGENCIA','VONTADE','PV','PM','PE','CLASSE_COMUM','HABILIDADE_AUTOMATICA','personagem','DESCRICAO');
    $variaveis3=array('id','ARMA','ouro','DANO','TIPO','FN','GRUPO','OBS','figura');
    $variaveis4=array('id','ARMA','ouro','personagem','armadura','equipamento','defesa');
    $variaveis5=array('id','DATA','MISSAO','personagem','emMissao','excluido','jogador','ouro','anotacoes','PV','PM');
    $variaveis6=array('id','vilao','raca','classe','idade','excluido','sexo','avatar','DESCRICAO','FORCA','AGILIDADE','INTELIGENCIA','VONTADE','PV','PM');
    $variaveis7=array('id','MISSAO','DESCRICAO','excluido','DATA','emMissao','objetivo','local','vilao','recompensa','falha','como','avatar','anotacoes');
    $texto="<?php \r\n class dao{\r\n";
    $texto .= '   '."private ".'$db'." = null;\r\n".
              '   public function __destruct(){'."\r\n".
              '      $this'."->db = null;\r\n".
              '   '."}\r\n"; 
    $texto .= '   public function encontre(ModelSearchCriteria $search = null){
            set_time_limit(3600);
            ini_set(\'memory_limit\', \'-1\');
        $result = array();
        foreach ($this->query($this->getEncontreSql($search)) as $row){
            $model = new Model();
            modelMapper::map($model, $row);
            $result[$model->getid()] = $model;
        }
        return $result;
   }'."\r\n";
   $texto .= '   public function encontre2(ModelSearchCriteria $search = null){
            set_time_limit(3600);
        $result = array();
        foreach ($this->query($this->getEncontreSql2($search)) as $row){
            $model = new Model();
            modelMapper::map($model, $row);
            $result[$model->getid()] = $model;
        }
        return $result;
   }'."\r\n";
    $texto .= '   public function encontrePorId(ModelSearchCriteria $search=null){
        if($search->getid() != null){
           $row = $this->query(\'SELECT * FROM `\'.$search->gettabela().\'` WHERE excluido = "0" and id = \' . (int) $search->getid())->fetch();
        }else{ 
           $row = $this->query(\'SELECT * FROM `\'.$search->gettabela().\'` WHERE excluido = "0"\')->fetchAll();
        }
        if (!$row) {
            return null;
        }
        $model = new Model();
        modelMapper::map($model, $row);
        return $model;
   }'."\r\n";
     $texto .= '   public function encontrePorPersonagem(ModelSearchCriteria $search=null){
           $row = $this->query("SELECT * FROM `".$search->gettabela()."` WHERE excluido = \'0\' and personagem = \'".$search->getpersonagem()."\'")->fetch();
        if (!$row) {
            return null;
        }
        $model = new Model();
        modelMapper::map($model, $row);
        return $model;
   }'."\r\n";
     $texto .= '   public function encontrePorArma(ModelSearchCriteria $search=null){
           $row = $this->query("SELECT * FROM `".$search->gettabela()."` WHERE `excluido` =  \'0\' and `ARMA` = \'".$search->getARMA()."\'")->fetch();
        if (!$row) {
            return null;
        }
        $model = new Model();
        modelMapper::map($model, $row);
        return $model;
   }'."\r\n";    
     $texto .= '   public function encontrePorRaca(ModelSearchCriteria $search=null){
           $row = $this->query("SELECT * FROM `".$search->gettabela()."` WHERE `excluido` =  \'0\' and `RACA` = \'".$search->getraca()."\'")->fetch();
        if (!$row) {
            return null;
        }
        $model = new Model();
        modelMapper::map($model, $row);
        return $model;
   }'."\r\n";
     $texto .= '   public function encontrePorClasse(ModelSearchCriteria $search=null){
           $row = $this->query("SELECT * FROM `".$search->gettabela()."` WHERE `excluido` =  \'0\' and `CLASSE` = \'".$search->getclasse()."\'")->fetch();
        if (!$row) {
            return null;
        }
        $model = new Model();
        modelMapper::map($model, $row);
        return $model;
   }'."\r\n";
     $texto .= '   public function encontrePorHabilidade(ModelSearchCriteria $search=null){
           $row = $this->query("SELECT * FROM `".$search->gettabela()."` WHERE `excluido` =  \'0\' and `habilidade` = \'".$search->gethabilidade()."\'")->fetch();
        if (!$row) {
            return null;
        }
        $model = new Model();
        modelMapper::map($model, $row);
        return $model;
   }'."\r\n";  
     $texto .= '   public function encontrePorArmadura(ModelSearchCriteria $search=null){
           $row = $this->query("SELECT * FROM `".$search->gettabela()."` WHERE `excluido` =  \'0\' and `armadura` = \'".$search->getarmadura()."\'")->fetch();
        if (!$row) {
            return null;
        }
        $model = new Model();
        modelMapper::map($model, $row);
        return $model;
   }'."\r\n";   
     $texto .= '   public function encontrePorItem(ModelSearchCriteria $search=null){
           $row = $this->query("SELECT * FROM `".$search->gettabela()."` WHERE `excluido` =  \'0\' and `item` = \'".$search->getitem()."\'")->fetch();
        if (!$row) {
            return null;
        }
        $model = new Model();
        modelMapper::map($model, $row);
        return $model;
   }'."\r\n";  
     $texto .= '   public function encontreEmMissao(ModelSearchCriteria $search=null){
           $row = $this->query("SELECT * FROM `".$search->gettabela()."` WHERE `excluido` = \'0\' and `emMissao` = \'1\' and personagem = \'".$search->getpersonagem()."\'")->fetch();
        if (!$row) {
            return null;
        }
        $model = new Model();
        modelMapper::map($model, $row);
        return $model;
   }'."\r\n"; 
     $texto .= '   public function encontrePorVilao(ModelSearchCriteria $search=null){
         $result = array();
         if($search->getvilao()){
            $row = $this->query("SELECT * FROM `".$search->gettabela()."` WHERE `excluido` = \'0\' and `vilao` = \'".$search->getvilao()."\'")->fetch();
            if (!$row) {
                return null;
            }
            $model = new Model();
            modelMapper::map($model, $row);
            return $model;
         }else{
            $row = $this->query("SELECT * FROM `".$search->gettabela()."` WHERE `excluido` = \'0\' ")->fetchAll();
            if (!$row) {
                return null;
            }
            foreach($row as $row_){
                $model = new Model();
                modelMapper::map($model, $row_);
                $result[$model->getid()] = $model;
            }
         }
         return $result;
   }'."\r\n"; 
     $texto .= '  public function encontrePorMissao(ModelSearchCriteria $search=null){
           if($search->getpersonagem()){
           $row = $this->query("SELECT * FROM `".$search->gettabela()."` WHERE `excluido` = \'0\' and `MISSAO` = \'".$search->getMISSAO()."\' and personagem = \'".$search->getpersonagem()."\'")->fetch();
         }else{
           $row = $this->query("SELECT * FROM `".$search->gettabela()."` WHERE `excluido` = \'0\' and `MISSAO` = \'".$search->getMISSAO()."\'")->fetch();
         }
        if (!$row) {
            return null;
        }
        $model = new Model();
        modelMapper::map($model, $row);
        return $model;
   }'."\r\n"; 
     $texto .= '   public function totalLinhas(ModelSearchCriteria $search=null){
           $row = $this->query("SELECT id FROM `".$search->gettabela()."` WHERE `excluido` =  \'0\' ORDER BY id DESC ")->fetch();
        if (!$row) {
            return null;
        }
        return $row;
   }'."\r\n";
    $texto .= '   public function grava(Model $model){
        if ($model->getid() === null) {
            return $this->insert($model);
        }
        return $this->update($model);
   }'."\r\n";
    $texto .= '   public function grava2(Model $model){
        if ($model->getid_atrib() === null) {
            return $this->insert2($model);
        }
        return $this->update2($model);
   }'."\r\n";
    $texto .= '   public function grava3(Model $model){
        if ($model->getid() === null) {
            return $this->insert3($model);
        }
        return $this->update3($model);
   }'."\r\n";
    $texto .= '   public function grava4(Model $model){
        if ($model->getid() === null) {
            return $this->insert4($model);
        }
        return $this->update4($model);
   }'."\r\n";
    $texto .= '   public function grava5(Model $model){
        if ($model->getid() === null) {
            return $this->insert5($model);
        }
        return $this->update5($model);
   }'."\r\n";
    $texto .= '   public function grava6(Model $model){
        if ($model->getid() === null) {
            return $this->insert6($model);
        }
        return $this->update6($model);
   }'."\r\n";
    $texto .= '   public function grava7(Model $model){
        if ($model->getid() === null) {
            return $this->insert7($model);
        }
        return $this->update7($model);
   }'."\r\n";
    $texto .= '   public function exclui($id) {
        $sql = \'delete from '.$tabela.' WHERE id = :id\';
        $statement = $this->getDb()->prepare($sql);
        $this->executeStatement($statement, array(\':id\' => $id
        ));
        return $statement->rowCount() == 1;
   }'."\r\n";
    $texto .= '   private function getDb() {
        if ($this->db !== null) {
            return $this->db;
        }
        $config = Config::getConfig("db");
        try {
            $this->db = new PDO($config[\'dsn\'], $config[\'username\'], $config[\'password\']);
        } catch (Exception $ex) {
            throw new Exception(\'DB connection error: \' . $ex->getMessage());
        }
        return $this->db;
   }'."\r\n";
    $texto .= '   private function insert(Model $model){
        date_default_timezone_set("Brazil/East");
        $now = mktime (date(\'H\'), date(\'i\'), date(\'s\'), date("m")  , date("d"), date("Y"));
        $model->setid(null);
        $model->setexcluido(0);
        if(!$model->getemMissao()){
            $model->setemMissao(0);
        }
        $model->setcriado($now);
        $model->setmodificado($now);        
        $sql = \'INSERT INTO '.$tabela.' (';
          $x = 1;
          foreach($variaveis as $item){
            $texto .= '`'.$item.'`';
            if(count($variaveis)>$x){
             $texto .= ',';
            }else{
             $texto .=  ') ';
            }
            $x++;
          }
        $texto .= 'VALUES (';
          $x = 1;
          foreach($variaveis as $item){
            $texto .= ':'.$item;
            if(count($variaveis)>$x){
             $texto .= ',';
            }else{
             $texto .=  ')\';'."\r\n";
            }
            $x++;
          }
        $texto .= "\t".'$search = new ModelSearchCriteria();
        $search->settabela($model->gettabela());
        return $this->execute($sql, $model);
   }'."\r\n";
    $texto .= '   private function update(Model $model){
        date_default_timezone_set("Brazil/East");
        $now = mktime (date("H"), date("i"), date("s"), date("m")  , date("d"), date("Y"));
        $model->setmodificado($now);
        $sql = \'UPDATE '.$tabela.' SET';
           $x=1;
           foreach($variaveis as $item){
				if($item != 'criado'){
					$texto .= " $item = :$item";
				  if(count($variaveis)>$x){
					$texto .= ',';
				  }
				}
              $x++;
          }
             $texto .= ' WHERE personagem = :personagem \';
        return $this->execute($sql, $model);
   }'."\r\n";
    $texto .= '   private function insert2(Model $model){
        date_default_timezone_set("Brazil/East");
        $now = mktime (date(\'H\'), date(\'i\'), date(\'s\'), date("m")  , date("d"), date("Y"));
        $model->setid_atrib(null);
        $model->setexcluido(0);
        $model->setemMissao(0);
        $model->setcriado($now);
        $model->setmodificado($now); 
        $this->execute2($this->criaTabela($model->gettabela()), $model);       
        $sql = \'INSERT INTO `\'.$model->gettabela().\'` (';
          $x = 1;
          foreach($variaveis2 as $item){
            $texto .= '`'.$item.'`';
            if(count($variaveis2)>$x){
             $texto .= ',';
            }else{
             $texto .=  ') ';
            }
            $x++;
          }
        $texto .= 'VALUES (';
          $x = 1;
          foreach($variaveis2 as $item){
            $texto .= ':'.$item;
            if(count($variaveis2)>$x){
             $texto .= ',';
            }else{
             $texto .=  ')\';'."\r\n";
            }
            $x++;
          }
        $texto .= "\t".'return $this->execute2($sql, $model);
   }'."\r\n";
    $texto .= '   private function update2(Model $model){
        $model->setmodificado(new DateTime(), new DateTimeZone(\'America/Sao_Paulo\'));
        $sql = \'UPDATE `\'.$model->gettabela().\'` SET';
           $x=1;
           foreach($variaveis2 as $item){
              $texto .= " $item = :$item";
              if(count($variaveis2)>$x){
                $texto .= ',';
              }
              $x++;
          }
             $texto .= ' WHERE id_atrib = :id_atrib \';
        return $this->execute2($sql, $model);
   }'."\r\n";
    $texto .= '   private function insert3(Model $model){
        date_default_timezone_set("Brazil/East");
        $now = mktime (date(\'H\'), date(\'i\'), date(\'s\'), date("m")  , date("d"), date("Y"));
        $model->setid(null);
        $model->setexcluido(0);
        $model->setemMissao(0);
        $model->setcriado($now);
        $model->setmodificado($now); 
        $this->execute3($this->criaTabela($model->gettabela()), $model);       
        $sql = \'INSERT INTO `\'.$model->gettabela().\'` (';
          $x = 1;
          foreach($variaveis3 as $item){
            $texto .= '`'.$item.'`';
            if(count($variaveis3)>$x){
             $texto .= ',';
            }else{
             $texto .=  ') ';
            }
            $x++;
          }
        $texto .= 'VALUES (';
          $x = 1;
          foreach($variaveis3 as $item){
            $texto .= ':'.$item;
            if(count($variaveis3)>$x){
             $texto .= ',';
            }else{
             $texto .=  ')\';'."\r\n";
            }
            $x++;
          }
        $texto .= "\t".'return $this->execute3($sql, $model);
   }'."\r\n";
    $texto .= '   private function update3(Model $model,$tabela){
        $model->setmodificado(new DateTime(), new DateTimeZone(\'America/Sao_Paulo\'));
        $sql = \'UPDATE `\'.$tabela.\'` SET';
           $x=1;
           foreach($variaveis3 as $item){
              $texto .= " $item = :$item";
              if(count($variaveis3)>$x){
                $texto .= ',';
              }
              $x++;
          }
             $texto .= ' WHERE id = :id \';
        return $this->execute3($sql, $model);
   }'."\r\n";
    $texto .= '   private function insert4(Model $model){
        date_default_timezone_set("Brazil/East");
        $now = mktime (date(\'H\'), date(\'i\'), date(\'s\'), date("m")  , date("d"), date("Y"));
        $model->setid(null);
        $model->setexcluido(0);
        $model->setemMissao(0);
        $model->setcriado($now);
        $model->setmodificado($now); 
        $this->execute4($this->criaTabela($model->gettabela()), $model);       
        $sql = \'INSERT INTO `\'.$model->gettabela().\'` (';
          $x = 1;
          foreach($variaveis4 as $item){
            $texto .= '`'.$item.'`';
            if(count($variaveis4)>$x){
             $texto .= ',';
            }else{
             $texto .=  ') ';
            }
            $x++;
          }
        $texto .= 'VALUES (';
          $x = 1;
          foreach($variaveis4 as $item){
            $texto .= ':'.$item;
            if(count($variaveis4)>$x){
             $texto .= ',';
            }else{
             $texto .=  ')\';'."\r\n";
            }
            $x++;
          }
        $texto .= "\t".'return $this->execute4($sql, $model);
   }'."\r\n";
    $texto .= '   private function update4(Model $model){
        $model->setmodificado(new DateTime(), new DateTimeZone(\'America/Sao_Paulo\'));
        $sql = \'UPDATE `\'.$model->gettabela().\'` SET';
           $x=1;
           foreach($variaveis4 as $item){
              $texto .= " $item = :$item";
              if(count($variaveis4)>$x){
                $texto .= ',';
              }
              $x++;
          }
             $texto .= ' WHERE id = :id \';
        return $this->execute4($sql, $model);
   }'."\r\n";
    $texto .= '   private function insert5(Model $model){
        date_default_timezone_set("Brazil/East");
        $now = mktime (date(\'H\'), date(\'i\'), date(\'s\'), date("m")  , date("d"), date("Y"));
        $model->setid(null);
        $model->setexcluido(0);
        $model->setemMissao(1);
        $model->setcriado($now);
        $model->setmodificado($now); 
        $this->execute5($this->criaTabela($model->gettabela()), $model);       
        $sql = \'INSERT INTO `\'.$model->gettabela().\'` (';
          $x = 1;
          foreach($variaveis5 as $item){
            $texto .= '`'.$item.'`';
            if(count($variaveis5)>$x){
             $texto .= ',';
            }else{
             $texto .=  ') ';
            }
            $x++;
          }
        $texto .= 'VALUES (';
          $x = 1;
          foreach($variaveis5 as $item){
            $texto .= ':'.$item;
            if(count($variaveis5)>$x){
             $texto .= ',';
            }else{
             $texto .=  ')\';'."\r\n";
            }
            $x++;
          }
        $texto .= "\t".'$model->settabela(\'personagem\');
        $this->setaMissao($model);
        return $this->execute5($sql, $model);
   }'."\r\n";
    $texto .= '   private function update5(Model $model){
        date_default_timezone_set("Brazil/East");
        $now = mktime (date(\'H\'), date(\'i\'), date(\'s\'), date("m")  , date("d"), date("Y"));
        $sql = \'UPDATE `\'.$model->gettabela().\'` SET';
           $x=1;
           foreach($variaveis5 as $item){
              $texto .= " $item = :$item";
              if(count($variaveis5)>$x){
                $texto .= ',';
              }
              $x++;
          }
             $texto .= ' WHERE id = :id \';
        return $this->execute5($sql, $model);
   }'."\r\n";
    $texto .= '   private function insert6(Model $model){
        date_default_timezone_set("Brazil/East");
        $now = mktime (date(\'H\'), date(\'i\'), date(\'s\'), date("m")  , date("d"), date("Y"));
        $model->setid(null);
        $model->setexcluido(0);
        /*$model->setemMissao(1);
        $model->setcriado($now);
        $model->setmodificado($now); 
        $this->execute6($this->criaTabela($model->gettabela()), $model); */      
        $sql = \'INSERT INTO `\'.$model->gettabela().\'` (';
          $x = 1;
          foreach($variaveis6 as $item){
            $texto .= '`'.$item.'`';
            if(count($variaveis6)>$x){
             $texto .= ',';
            }else{
             $texto .=  ') ';
            }
            $x++;
          }
        $texto .= 'VALUES (';
          $x = 1;
          foreach($variaveis6 as $item){
            $texto .= ':'.$item;
            if(count($variaveis6)>$x){
             $texto .= ',';
            }else{
             $texto .=  ')\';'."\r\n";
            }
            $x++;
          }
        $texto .= "\t".'$model->settabela(\'personagem\');
        $this->setaMissao($model);
        return $this->execute6($sql, $model);
   }'."\r\n";
    $texto .= '   private function update6(Model $model){
        date_default_timezone_set("Brazil/East");
        $now = mktime (date(\'H\'), date(\'i\'), date(\'s\'), date("m")  , date("d"), date("Y"));
        $sql = \'UPDATE `\'.$model->gettabela().\'` SET';
           $x=1;
           foreach($variaveis6 as $item){
              $texto .= " $item = :$item";
              if(count($variaveis6)>$x){
                $texto .= ',';
              }
              $x++;
          }
             $texto .= ' WHERE id = :id \';
        return $this->execute6($sql, $model);
   }'."\r\n";
    $texto .= '   private function insert7(Model $model){
        date_default_timezone_set("Brazil/East");
        $now = mktime (date(\'H\'), date(\'i\'), date(\'s\'), date("m")  , date("d"), date("Y"));
        $model->setid(null);
        $model->setexcluido(0);
        $model->setemMissao(0);
        /*$model->setcriado($now);
        $model->setmodificado($now); 
        $this->execute6($this->criaTabela($model->gettabela()), $model); */      
        $sql = \'INSERT INTO `\'.$model->gettabela().\'` (';
          $x = 1;
          foreach($variaveis7 as $item){
            $texto .= '`'.$item.'`';
            if(count($variaveis7)>$x){
             $texto .= ',';
            }else{
             $texto .=  ') ';
            }
            $x++;
          }
        $texto .= 'VALUES (';
          $x = 1;
          foreach($variaveis7 as $item){
            $texto .= ':'.$item;
            if(count($variaveis7)>$x){
             $texto .= ',';
            }else{
             $texto .=  ')\';'."\r\n";
            }
            $x++;
          }
        $texto .= "\t".'$model->settabela(\'personagem\');
        //$this->setaMissao($model);
        return $this->execute7($sql, $model);
   }'."\r\n";
    $texto .= '   private function update7(Model $model){
        date_default_timezone_set("Brazil/East");
        $now = mktime (date(\'H\'), date(\'i\'), date(\'s\'), date("m")  , date("d"), date("Y"));
        $sql = \'UPDATE `\'.$model->gettabela().\'` SET';
           $x=1;
           foreach($variaveis7 as $item){
              $texto .= " $item = :$item";
              if(count($variaveis7)>$x){
                $texto .= ',';
              }
              $x++;
          }
             $texto .= ' WHERE id = :id \';
        return $this->execute7($sql, $model);
   }'."\r\n";
    $texto .= '   public function setaMissao(Model $model){ 
        if($model->getpersonagem()){
          $sql = "UPDATE `".$model->gettabela()."` SET emMissao = \'".$model->getemMissao()."\' WHERE personagem = \'".$model->getpersonagem()."\'"; 
       }elseif($model->getjogador()){
         $sql = "UPDATE `".$model->gettabela()."` SET emMissao = \'".$model->getemMissao()."\' WHERE jogador = \'".$model->getjogador()."\'";
       }elseif($model->getMISSAO()){
          $sql = "UPDATE `".$model->gettabela()."` SET emMissao = \'".$model->getemMissao()."\' WHERE MISSAO = \'".$model->getMISSAO()."\'"; 
       }
        return $this->execute($sql, $model);
   }'."\r\n";
    $texto .= '   public function setaOuro(Model $model){
      $sql = "UPDATE `".$model->gettabela()."` SET ouro = \'".$model->getouro()."\' WHERE personagem = \'".$model->getpersonagem()."\'";
      return $this->execute($sql, $model);
   }'."\r\n";
    $texto .= '   public function execute($sql,$model){
        $statement = $this->getDb()->prepare($sql);
        $this->executeStatement($statement, $this->getParams($model));
        $search=new ModelSearchCriteria();        
        $search->settabela($model->gettabela());
        if (!$model->getid()) {
            return $this->encontrePorId($search->setid($this->getDb()->lastInsertId()));
        }
        return $model;
   }'."\r\n";
    $texto .= '   public function execute2($sql,$model){
        $statement = $this->getDb()->prepare($sql);
        $this->executeStatement($statement, $this->getParams2($model));
        $search=new ModelSearchCriteria();
        if (!$model->getpersonagem()) {
             return $this->encontrePorId($search->setid($this->getDb()->lastInsertId()));
        }
        return $model;
   }'."\r\n";
    $texto .= '   public function execute3($sql,$model){
        $statement = $this->getDb()->prepare($sql);
        $this->executeStatement($statement, $this->getParams3($model));
        $search=new ModelSearchCriteria();
        if (!$model->getpersonagem()) {
             return $this->encontrePorId($search->setid($this->getDb()->lastInsertId()));
        }
        return $model;
   }'."\r\n";
    $texto .= '   public function execute4($sql,$model){
        $statement = $this->getDb()->prepare($sql);
        $this->executeStatement($statement, $this->getParams4($model));
        $search=new ModelSearchCriteria();
        if (!$model->getpersonagem()) {
             return $this->encontrePorId($search->setid($this->getDb()->lastInsertId()));
        }
        return $model;
   }'."\r\n";
    $texto .= '   public function execute5($sql,$model){
        $statement = $this->getDb()->prepare($sql);
        $this->executeStatement($statement, $this->getParams5($model));
        $search=new ModelSearchCriteria();
        if (!$model->getpersonagem()) {
             return $this->encontrePorId($search->setid($this->getDb()->lastInsertId()));
        }
        return $model;
   }'."\r\n";
    $texto .= '   public function execute6($sql,$model){
        $statement = $this->getDb()->prepare($sql);
        $this->executeStatement($statement, $this->getParams6($model));
        return $model;
   }'."\r\n";
    $texto .= '   public function execute7($sql,$model){
        $statement = $this->getDb()->prepare($sql);
        $this->executeStatement($statement, $this->getParams7($model));
        return $model;
   }'."\r\n";
    $texto .= '   private function getParams(Model $model){
        $params = array(';
        foreach($variaveis as $item){
            $texto .= "':".$item."'".'=> $model->get'.$item.'(),';
        }
    $texto .= ");\r\n\t return".' $params;
   }'."\r\n";
    $texto .= '   private function getParams2(Model $model){
        $params = array(';
        foreach($variaveis2 as $item){
            $texto .= "':".$item."'".'=> $model->get'.$item.'(),';
        }
    $texto .= ");\r\n\t return".' $params;
   }'."\r\n";
    $texto .= '   private function getParams3(Model $model){
        $params = array(';
        foreach($variaveis3 as $item){
            $texto .= "':".$item."'".'=> $model->get'.$item.'(),';
        }
    $texto .= ");\r\n\t return".' $params;
   }'."\r\n";
    $texto .= '   private function getParams4(Model $model){
        $params = array(';
        foreach($variaveis4 as $item){
            $texto .= "':".$item."'".'=> $model->get'.$item.'(),';
        }
    $texto .= ");\r\n\t return".' $params;
   }'."\r\n";
    $texto .= '   private function getParams5(Model $model){
        $params = array(';
        foreach($variaveis5 as $item){
            $texto .= "':".$item."'".'=> $model->get'.$item.'(),';
        }
    $texto .= ");\r\n\t return".' $params;
   }'."\r\n";
    $texto .= '   private function getParams6(Model $model){
        $params = array(';
        foreach($variaveis6 as $item){
            $texto .= "':".$item."'".'=> $model->get'.$item.'(),';
        }
    $texto .= ");\r\n\t return".' $params;
   }'."\r\n";
    $texto .= '   private function getParams7(Model $model){
        $params = array(';
        foreach($variaveis7 as $item){
            $texto .= "':".$item."'".'=> $model->get'.$item.'(),';
        }
    $texto .= ");\r\n\t return".' $params;
   }'."\r\n";
    $texto .= '   private function executeStatement(PDOStatement $statement, array $params){
        if (!$statement->execute($params)){
            self::throwDbError($this->getDb()->errorInfo());
        }
   }'."\r\n";
    $texto .= '   public function query($sql){
        set_time_limit(3600);
        $statement = $this->getDb()->query($sql, PDO::FETCH_ASSOC);
        if ($statement === false) {
            self::throwDbError($this->getDb()->errorInfo());
        }
        return $statement;
   }'."\r\n";
    $texto .= '   private static function throwDbError(array $errorInfo){
        // TODO log error, send email, etc.
        throw new Exception(\'DB error [\' . $errorInfo[0] . \', \' . $errorInfo[1] . \']: \' . $errorInfo[2]);
   }'."\r\n";
    $texto .= '   private function getEncontreSql(ModelSearchCriteria $search = null) {               
          if ($search->getpersonagem() !== null) {
                 $sql="SELECT * FROM ".$search->gettabela()." WHERE personagem=\'".$search->getpersonagem()."\' AND excluido = \'0\' ";
          }elseif($search->getjogador() !== null){
                $sql="SELECT * FROM ".$search->gettabela()." WHERE jogador=\'".$search->getjogador()."\' AND excluido = \'0\' ";
          }else{
              if($search->gettabela()==\'personagem\'){
                $sql = \'SELECT * FROM `\'.$search->gettabela().\'` WHERE jogador != "MESTRE" AND excluido = "0" \';
              }else{
                $sql = \'SELECT * FROM `\'.$search->gettabela().\'` WHERE excluido = "0" \';
              }    
          }
        return $sql;
  }'."\r\n";
   $texto .= '   private function getEncontreSql2(ModelSearchCriteria $search = null) {               
          if ($search->getpersonagem() !== null) {
                 $sql="SELECT * FROM ".$search->gettabela()." WHERE personagem=\'".$search->getpersonagem()."\' AND excluido = \'0\' ";
          }elseif($search->getjogador() !== null){
                $sql = "SELECT * FROM `".$search->gettabela()."` LEFT JOIN `personagem` on ".$search->gettabela().".personagem = personagem.personagem WHERE ".$search->gettabela().".MISSAO = \'".$search->getMISSAO()."\' AND missao.excluido = \'0\'";
          }else{
              if($search->gettabela()==\'personagem\'){
                $sql = \'SELECT * FROM `\'.$search->gettabela().\'` WHERE jogador != "MESTRE" AND excluido = "0" \';
              }else{
                $sql = \'SELECT * FROM `\'.$search->gettabela().\'` WHERE excluido = "0" \';
              }    
          }
        return $sql;
  }'."\r\n";
    $texto .= '    private function criaTabela($tabela){
        $sql="CREATE TABLE IF NOT EXISTS `$tabela` ( `id` INT(5) NOT NULL AUTO_INCREMENT , `mes` INT(2) NULL , `dt` DATE NULL , `descricao` TEXT NULL , `entrada` DECIMAL(12,2) NULL , `saida` DECIMAL(12,2) NULL , `diz_ofe` ENUM(\'diz\',\'ofe\') NULL , `criado` varchar(50) NULL , `modificado` varchar(50) NULL , `excluido` INT(1) NOT NULL DEFAULT \'0\', PRIMARY KEY (`id`)) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;";
        return $sql;
   }'."\r\n";
    $texto .= '}';
    fwrite($handle, $texto); 
    fclose($handle);
?>