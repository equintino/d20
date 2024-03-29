<?php
 class dao{
   private $db = null;
   public function __destruct(){
      $this->db = null;
   }
   public function encontre(ModelSearchCriteria $search = null){
            set_time_limit(3600);
            ini_set('memory_limit', '-1');
        $result = array();
        foreach ($this->query($this->getEncontreSql($search)) as $row){
            $model = new Model();
            modelMapper::map($model, $row);
            $result[$model->getid()] = $model;
        }
        return $result;
   }
   public function encontre2(ModelSearchCriteria $search = null){
            set_time_limit(3600);
        $result = array();
        foreach ($this->query($this->getEncontreSql2($search)) as $row){
            $model = new Model();
            modelMapper::map($model, $row);
            $result[$model->getid()] = $model;
        }
        return $result;
   }
   public function encontrePorId(ModelSearchCriteria $search=null){
        if($search->getid() != null){
           $row = $this->query('SELECT * FROM `'.$search->gettabela().'` WHERE excluido = "0" and id = ' . (int) $search->getid())->fetch();
        }else{
           $row = $this->query('SELECT * FROM `'.$search->gettabela().'` WHERE excluido = "0"')->fetchAll();
        }
        if (!$row) {
            return null;
        }
        $model = new Model();
        modelMapper::map($model, $row);
        return $model;
   }
   public function encontrePorPersonagem(ModelSearchCriteria $search=null){
           $row = $this->query("SELECT * FROM `".$search->gettabela()."` WHERE excluido = '0' and personagem = '".$search->getpersonagem()."'")->fetch();
        if (!$row) {
            return null;
        }
        $model = new Model();
        modelMapper::map($model, $row);
        return $model;
   }
   public function encontrePorArma(ModelSearchCriteria $search=null){
           $row = $this->query("SELECT * FROM `".$search->gettabela()."` WHERE `excluido` =  '0' and `ARMA` = '".$search->getARMA()."'")->fetch();
        if (!$row) {
            return null;
        }
        $model = new Model();
        modelMapper::map($model, $row);
        return $model;
   }
   public function encontrePorRaca(ModelSearchCriteria $search=null){
           $row = $this->query("SELECT * FROM `".$search->gettabela()."` WHERE `excluido` =  '0' and `RACA` = '".$search->getraca()."'")->fetch();
        if (!$row) {
            return null;
        }
        $model = new Model();
        modelMapper::map($model, $row);
        return $model;
   }
   public function encontrePorClasse(ModelSearchCriteria $search=null){
           $row = $this->query("SELECT * FROM `".$search->gettabela()."` WHERE `excluido` =  '0' and `CLASSE` = '".$search->getclasse()."'")->fetch();
        if (!$row) {
            return null;
        }
        $model = new Model();
        modelMapper::map($model, $row);
        return $model;
   }
   public function encontrePorHabilidade(ModelSearchCriteria $search=null){
           $row = $this->query("SELECT * FROM `".$search->gettabela()."` WHERE `excluido` =  '0' and `habilidade` = '".$search->gethabilidade()."'")->fetch();
        if (!$row) {
            return null;
        }
        $model = new Model();
        modelMapper::map($model, $row);
        return $model;
   }
   public function encontrePorArmadura(ModelSearchCriteria $search=null){
           $row = $this->query("SELECT * FROM `".$search->gettabela()."` WHERE `excluido` =  '0' and `armadura` = '".$search->getarmadura()."'")->fetch();
        if (!$row) {
            return null;
        }
        $model = new Model();
        modelMapper::map($model, $row);
        return $model;
   }
   public function encontrePorItem(ModelSearchCriteria $search=null){
           $row = $this->query("SELECT * FROM `".$search->gettabela()."` WHERE `excluido` =  '0' and `item` = '".$search->getitem()."'")->fetch();
        if (!$row) {
            return null;
        }
        $model = new Model();
        modelMapper::map($model, $row);
        return $model;
   }
   public function encontreEmMissao(ModelSearchCriteria $search=null){
           $row = $this->query("SELECT * FROM `".$search->gettabela()."` WHERE `excluido` = '0' and `emMissao` = '1' and personagem = '".$search->getpersonagem()."'")->fetch();
        if (!$row) {
            return null;
        }
        $model = new Model();
        modelMapper::map($model, $row);
        return $model;
   }
   public function encontrePorVilao(ModelSearchCriteria $search=null){
         $result = array();
         if($search->getvilao()){
            $row = $this->query("SELECT * FROM `".$search->gettabela()."` WHERE `excluido` = '0' and `vilao` = '".$search->getvilao()."'")->fetch();
            if (!$row) {
                return null;
            }
            $model = new Model();
            modelMapper::map($model, $row);
            return $model;
         }else{
            $row = $this->query("SELECT * FROM `".$search->gettabela()."` WHERE `excluido` = '0' ")->fetchAll();
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
   }
  public function encontrePorMissao(ModelSearchCriteria $search=null){
           if($search->getpersonagem()){
           $row = $this->query("SELECT * FROM `".$search->gettabela()."` WHERE `excluido` = '0' and `MISSAO` = '".$search->getMISSAO()."' and personagem = '".$search->getpersonagem()."'")->fetch();
         }else{
           $row = $this->query("SELECT * FROM `".$search->gettabela()."` WHERE `excluido` = '0' and `MISSAO` = '".$search->getMISSAO()."'")->fetch();
         }
        if (!$row) {
            return null;
        }
        $model = new Model();
        modelMapper::map($model, $row);
        return $model;
   }
   public function totalLinhas(ModelSearchCriteria $search=null){
           $row = $this->query("SELECT id FROM `".$search->gettabela()."` WHERE `excluido` =  '0' ORDER BY id DESC ")->fetch();
        if (!$row) {
            return null;
        }
        return $row;
   }
   public function grava(Model $model){
        if ($model->getid() === null) {
            return $this->insert($model);
        }
        return $this->update($model);
   }
   public function grava2(Model $model){
        if ($model->getid_atrib() === null) {
            return $this->insert2($model);
        }
        return $this->update2($model);
   }
   public function grava3(Model $model){
        if ($model->getid() === null) {
            return $this->insert3($model);
        }
        return $this->update3($model);
   }
   public function grava4(Model $model){
        if ($model->getid() === null) {
            return $this->insert4($model);
        }
        return $this->update4($model);
   }
   public function grava5(Model $model){
        if ($model->getid() === null) {
            return $this->insert5($model);
        }
        return $this->update5($model);
   }
   public function grava6(Model $model){
        if ($model->getid() === null) {
            return $this->insert6($model);
        }
        return $this->update6($model);
   }
   public function grava7(Model $model){
        if ($model->getid() === null) {
            return $this->insert7($model);
        }
        return $this->update7($model);
   }
   public function exclui($id) {
        $sql = 'delete from `'.$model->gettabela().'` WHERE id = :id';
        $statement = $this->getDb()->prepare($sql);
        $this->executeStatement($statement, array(':id' => $id
        ));
        return $statement->rowCount() == 1;
   }
   private function getDb() {
        if ($this->db !== null) {
            return $this->db;
        }
        $config = Config::getConfig("db");
        try {
            $this->db = new PDO($config['dsn'], $config['username'], $config['password']);
        } catch (Exception $ex) {
            throw new Exception('DB connection error: ' . $ex->getMessage());
        }
        return $this->db;
   }
     private function insert(Model $model){
          date_default_timezone_set("Brazil/East");
          $now = mktime (date('H'), date('i'), date('s'), date("m")  , date("d"), date("Y"));
          $model->setid(null);
          $model->setexcluido(0);
          if(!$model->getemMissao()){
               $model->setemMissao(0);
          }
          $model->setcriado($now);
          $model->setmodificado($now);
          $sql = 'INSERT INTO `'.$model->gettabela().'` (`id`,`jogador`,`personagem`,`raca`,`classe`,`tendencia1`,`tendencia2`,`idade`,`tabela`,`sexo`,`criado`,`modificado`,`excluido`,`habilidade`,`altura`,`peso`,`cidade`,`motivacao`,`breveHistoria`,`avatar`,`nivel`,`emMissao`,`foto`) VALUES (:id,:jogador,:personagem,:raca,:classe,:tendencia1,:tendencia2,:idade,:tabela,:sexo,:criado,:modificado,:excluido,:habilidade,:altura,:peso,:cidade,:motivacao,:breveHistoria,:avatar,:nivel,:emMissao,:foto)';
	     $search = new ModelSearchCriteria();
          $search->settabela($model->gettabela());
          return $this->execute($sql, $model);
     }
   private function update(Model $model){
        date_default_timezone_set("Brazil/East");
        $now = mktime (date("H"), date("i"), date("s"), date("m")  , date("d"), date("Y"));
        $model->setmodificado($now);
        $sql = 'UPDATE `'.$model->gettabela().'` SET id = :id, jogador = :jogador, personagem = :personagem, raca = :raca, classe = :classe, tendencia1 = :tendencia1, tendencia2 = :tendencia2, idade = :idade, tabela = :tabela, sexo = :sexo, modificado = :modificado, excluido = :excluido, habilidade = :habilidade, altura = :altura, peso = :peso, cidade = :cidade, motivacao = :motivacao, breveHistoria = :breveHistoria, avatar = :avatar, nivel = :nivel, emMissao = :emMissao, foto = :foto WHERE personagem = :personagem ';
        return $this->execute($sql, $model);
   }
   private function insert2(Model $model){
        date_default_timezone_set("Brazil/East");
        $now = mktime (date('H'), date('i'), date('s'), date("m")  , date("d"), date("Y"));
        $model->setid_atrib(null);
        $model->setexcluido(0);
        $model->setemMissao(0);
        $model->setcriado($now);
        $model->setmodificado($now);
        $this->execute2($this->criaTabela($model->gettabela()), $model);
        $sql = 'INSERT INTO `'.$model->gettabela().'` (`id_atrib`,`FORCA`,`AGILIDADE`,`INTELIGENCIA`,`VONTADE`,`PV`,`PM`,`PE`,`CLASSE_COMUM`,`HABILIDADE_AUTOMATICA`,`personagem`,`DESCRICAO`) VALUES (:id_atrib,:FORCA,:AGILIDADE,:INTELIGENCIA,:VONTADE,:PV,:PM,:PE,:CLASSE_COMUM,:HABILIDADE_AUTOMATICA,:personagem,:DESCRICAO)';
	return $this->execute2($sql, $model);
   }
   private function update2(Model $model){
        $model->setmodificado(new DateTime(), new DateTimeZone('America/Sao_Paulo'));
        $sql = 'UPDATE `'.$model->gettabela().'` SET id_atrib = :id_atrib, FORCA = :FORCA, AGILIDADE = :AGILIDADE, INTELIGENCIA = :INTELIGENCIA, VONTADE = :VONTADE, PV = :PV, PM = :PM, PE = :PE, CLASSE_COMUM = :CLASSE_COMUM, HABILIDADE_AUTOMATICA = :HABILIDADE_AUTOMATICA, personagem = :personagem, DESCRICAO = :DESCRICAO WHERE id_atrib = :id_atrib ';
        return $this->execute2($sql, $model);
   }
   private function insert3(Model $model){
        date_default_timezone_set("Brazil/East");
        $now = mktime (date('H'), date('i'), date('s'), date("m")  , date("d"), date("Y"));
        $model->setid(null);
        $model->setexcluido(0);
        $model->setemMissao(0);
        $model->setcriado($now);
        $model->setmodificado($now);
        $this->execute3($this->criaTabela($model->gettabela()), $model);
        $sql = 'INSERT INTO `'.$model->gettabela().'` (`id`,`ARMA`,`ouro`,`DANO`,`TIPO`,`FN`,`GRUPO`,`OBS`,`figura`) VALUES (:id,:ARMA,:ouro,:DANO,:TIPO,:FN,:GRUPO,:OBS,:figura)';
	return $this->execute3($sql, $model);
   }
   private function update3(Model $model,$tabela){
        $model->setmodificado(new DateTime(), new DateTimeZone('America/Sao_Paulo'));
        $sql = 'UPDATE `'.$tabela.'` SET id = :id, ARMA = :ARMA, ouro = :ouro, DANO = :DANO, TIPO = :TIPO, FN = :FN, GRUPO = :GRUPO, OBS = :OBS, figura = :figura WHERE id = :id ';
        return $this->execute3($sql, $model);
   }
   private function insert4(Model $model){
        date_default_timezone_set("Brazil/East");
        $now = mktime (date('H'), date('i'), date('s'), date("m")  , date("d"), date("Y"));
        $model->setid(null);
        $model->setexcluido(0);
        $model->setemMissao(0);
        $model->setcriado($now);
        $model->setmodificado($now);
        $this->execute4($this->criaTabela($model->gettabela()), $model);
        $sql = 'INSERT INTO `'.$model->gettabela().'` (`id`,`ARMA`,`ouro`,`personagem`,`armadura`,`equipamento`,`defesa`) VALUES (:id,:ARMA,:ouro,:personagem,:armadura,:equipamento,:defesa)';
	return $this->execute4($sql, $model);
   }
   private function update4(Model $model){
        $model->setmodificado(new DateTime(), new DateTimeZone('America/Sao_Paulo'));
        $sql = 'UPDATE `'.$model->gettabela().'` SET id = :id, ARMA = :ARMA, ouro = :ouro, personagem = :personagem, armadura = :armadura, equipamento = :equipamento, defesa = :defesa WHERE id = :id ';
        return $this->execute4($sql, $model);
   }
   private function insert5(Model $model){
        date_default_timezone_set("Brazil/East");
        $now = mktime (date('H'), date('i'), date('s'), date("m")  , date("d"), date("Y"));
        $model->setid(null);
        $model->setexcluido(0);
        $model->setemMissao(1);
        $model->setcriado($now);
        $model->setmodificado($now);
        $this->execute5($this->criaTabela($model->gettabela()), $model);
        $sql = 'INSERT INTO `'.$model->gettabela().'` (`id`,`DATA`,`MISSAO`,`personagem`,`emMissao`,`excluido`,`jogador`,`ouro`,`anotacoes`,`PV`,`PM`) VALUES (:id,:DATA,:MISSAO,:personagem,:emMissao,:excluido,:jogador,:ouro,:anotacoes,:PV,:PM)';
	$model->settabela('personagem');
        $this->setaMissao($model);
        return $this->execute5($sql, $model);
   }
   private function update5(Model $model){
        date_default_timezone_set("Brazil/East");
        $now = mktime (date('H'), date('i'), date('s'), date("m")  , date("d"), date("Y"));
        $sql = 'UPDATE `'.$model->gettabela().'` SET id = :id, DATA = :DATA, MISSAO = :MISSAO, personagem = :personagem, emMissao = :emMissao, excluido = :excluido, jogador = :jogador, ouro = :ouro, anotacoes = :anotacoes, PV = :PV, PM = :PM WHERE id = :id ';
        return $this->execute5($sql, $model);
   }
   private function insert6(Model $model){
        date_default_timezone_set("Brazil/East");
        $now = mktime (date('H'), date('i'), date('s'), date("m")  , date("d"), date("Y"));
        $model->setid(null);
        $model->setexcluido(0);
        /*$model->setemMissao(1);
        $model->setcriado($now);
        $model->setmodificado($now);
        $this->execute6($this->criaTabela($model->gettabela()), $model); */
        $sql = 'INSERT INTO `'.$model->gettabela().'` (`id`,`vilao`,`raca`,`classe`,`idade`,`excluido`,`sexo`,`avatar`,`DESCRICAO`,`FORCA`,`AGILIDADE`,`INTELIGENCIA`,`VONTADE`,`PV`,`PM`) VALUES (:id,:vilao,:raca,:classe,:idade,:excluido,:sexo,:avatar,:DESCRICAO,:FORCA,:AGILIDADE,:INTELIGENCIA,:VONTADE,:PV,:PM)';
	$model->settabela('personagem');
        $this->setaMissao($model);
        return $this->execute6($sql, $model);
   }
   private function update6(Model $model){
        date_default_timezone_set("Brazil/East");
        $now = mktime (date('H'), date('i'), date('s'), date("m")  , date("d"), date("Y"));
        $sql = 'UPDATE `'.$model->gettabela().'` SET id = :id, vilao = :vilao, raca = :raca, classe = :classe, idade = :idade, excluido = :excluido, sexo = :sexo, avatar = :avatar, DESCRICAO = :DESCRICAO, FORCA = :FORCA, AGILIDADE = :AGILIDADE, INTELIGENCIA = :INTELIGENCIA, VONTADE = :VONTADE, PV = :PV, PM = :PM WHERE id = :id ';
        return $this->execute6($sql, $model);
   }
   private function insert7(Model $model){
        date_default_timezone_set("Brazil/East");
        $now = mktime (date('H'), date('i'), date('s'), date("m")  , date("d"), date("Y"));
        $model->setid(null);
        $model->setexcluido(0);
        $model->setemMissao(0);
        /*$model->setcriado($now);
        $model->setmodificado($now);
        $this->execute6($this->criaTabela($model->gettabela()), $model); */
        $sql = 'INSERT INTO `'.$model->gettabela().'` (`id`,`MISSAO`,`DESCRICAO`,`excluido`,`DATA`,`emMissao`,`objetivo`,`local`,`vilao`,`recompensa`,`falha`,`como`,`avatar`,`anotacoes`) VALUES (:id,:MISSAO,:DESCRICAO,:excluido,:DATA,:emMissao,:objetivo,:local,:vilao,:recompensa,:falha,:como,:avatar,:anotacoes)';
	$model->settabela('personagem');
        //$this->setaMissao($model);
        return $this->execute7($sql, $model);
   }
   private function update7(Model $model){
        date_default_timezone_set("Brazil/East");
        $now = mktime (date('H'), date('i'), date('s'), date("m")  , date("d"), date("Y"));
        $sql = 'UPDATE `'.$model->gettabela().'` SET id = :id, MISSAO = :MISSAO, DESCRICAO = :DESCRICAO, excluido = :excluido, DATA = :DATA, emMissao = :emMissao, objetivo = :objetivo, local = :local, vilao = :vilao, recompensa = :recompensa, falha = :falha, como = :como, avatar = :avatar, anotacoes = :anotacoes WHERE id = :id ';
        return $this->execute7($sql, $model);
   }
   public function setaMissao(Model $model){
        if($model->getpersonagem()){
          $sql = "UPDATE `".$model->gettabela()."` SET emMissao = '".$model->getemMissao()."' WHERE personagem = '".$model->getpersonagem()."'";
       }elseif($model->getjogador()){
         $sql = "UPDATE `".$model->gettabela()."` SET emMissao = '".$model->getemMissao()."' WHERE jogador = '".$model->getjogador()."'";
       }elseif($model->getMISSAO()){
          $sql = "UPDATE `".$model->gettabela()."` SET emMissao = '".$model->getemMissao()."' WHERE MISSAO = '".$model->getMISSAO()."'";
       }
        return $this->execute($sql, $model);
   }
   public function setaOuro(Model $model){
      $sql = "UPDATE `".$model->gettabela()."` SET ouro = '".$model->getouro()."' WHERE personagem = '".$model->getpersonagem()."'";
      return $this->execute($sql, $model);
   }
   public function execute($sql,$model){
        $statement = $this->getDb()->prepare($sql);
        $this->executeStatement($statement, $this->getParams($model));
        $search=new ModelSearchCriteria();
        $search->settabela($model->gettabela());
        if (!$model->getid()) {
            return $this->encontrePorId($search->setid($this->getDb()->lastInsertId()));
        }
        return $model;
   }
   public function execute2($sql,$model){
        $statement = $this->getDb()->prepare($sql);
        $this->executeStatement($statement, $this->getParams2($model));
        $search=new ModelSearchCriteria();
        if (!$model->getpersonagem()) {
             return $this->encontrePorId($search->setid($this->getDb()->lastInsertId()));
        }
        return $model;
   }
   public function execute3($sql,$model){
        $statement = $this->getDb()->prepare($sql);
        $this->executeStatement($statement, $this->getParams3($model));
        $search=new ModelSearchCriteria();
        if (!$model->getpersonagem()) {
             return $this->encontrePorId($search->setid($this->getDb()->lastInsertId()));
        }
        return $model;
   }
   public function execute4($sql,$model){
        $statement = $this->getDb()->prepare($sql);
        $this->executeStatement($statement, $this->getParams4($model));
        $search=new ModelSearchCriteria();
        if (!$model->getpersonagem()) {
             return $this->encontrePorId($search->setid($this->getDb()->lastInsertId()));
        }
        return $model;
   }
   public function execute5($sql,$model){
        $statement = $this->getDb()->prepare($sql);
        $this->executeStatement($statement, $this->getParams5($model));
        $search=new ModelSearchCriteria();
        if (!$model->getpersonagem()) {
             return $this->encontrePorId($search->setid($this->getDb()->lastInsertId()));
        }
        return $model;
   }
   public function execute6($sql,$model){
        $statement = $this->getDb()->prepare($sql);
        $this->executeStatement($statement, $this->getParams6($model));
        return $model;
   }
   public function execute7($sql,$model){
        $statement = $this->getDb()->prepare($sql);
        $this->executeStatement($statement, $this->getParams7($model));
        return $model;
   }
   private function getParams(Model $model){
        $params = array(':id'=> $model->getid(),':jogador'=> $model->getjogador(),':personagem'=> $model->getpersonagem(),':raca'=> $model->getraca(),':classe'=> $model->getclasse(),':tendencia1'=> $model->gettendencia1(),':tendencia2'=> $model->gettendencia2(),':idade'=> $model->getidade(),':tabela'=> $model->gettabela(),':sexo'=> $model->getsexo(),':criado'=> $model->getcriado(),':modificado'=> $model->getmodificado(),':excluido'=> $model->getexcluido(),':habilidade'=> $model->gethabilidade(),':altura'=> $model->getaltura(),':peso'=> $model->getpeso(),':cidade'=> $model->getcidade(),':motivacao'=> $model->getmotivacao(),':breveHistoria'=> $model->getbreveHistoria(),':avatar'=> $model->getavatar(),':nivel'=> $model->getnivel(),':emMissao'=> $model->getemMissao(),':foto'=> $model->getfoto(),);
	 return $params;
   }
   private function getParams2(Model $model){
        $params = array(':id_atrib'=> $model->getid_atrib(),':FORCA'=> $model->getFORCA(),':AGILIDADE'=> $model->getAGILIDADE(),':INTELIGENCIA'=> $model->getINTELIGENCIA(),':VONTADE'=> $model->getVONTADE(),':PV'=> $model->getPV(),':PM'=> $model->getPM(),':PE'=> $model->getPE(),':CLASSE_COMUM'=> $model->getCLASSE_COMUM(),':HABILIDADE_AUTOMATICA'=> $model->getHABILIDADE_AUTOMATICA(),':personagem'=> $model->getpersonagem(),':DESCRICAO'=> $model->getDESCRICAO(),);
	 return $params;
   }
   private function getParams3(Model $model){
        $params = array(':id'=> $model->getid(),':ARMA'=> $model->getARMA(),':ouro'=> $model->getouro(),':DANO'=> $model->getDANO(),':TIPO'=> $model->getTIPO(),':FN'=> $model->getFN(),':GRUPO'=> $model->getGRUPO(),':OBS'=> $model->getOBS(),':figura'=> $model->getfigura(),);
	 return $params;
   }
   private function getParams4(Model $model){
        $params = array(':id'=> $model->getid(),':ARMA'=> $model->getARMA(),':ouro'=> $model->getouro(),':personagem'=> $model->getpersonagem(),':armadura'=> $model->getarmadura(),':equipamento'=> $model->getequipamento(),':defesa'=> $model->getdefesa(),);
	 return $params;
   }
   private function getParams5(Model $model){
        $params = array(':id'=> $model->getid(),':DATA'=> $model->getDATA(),':MISSAO'=> $model->getMISSAO(),':personagem'=> $model->getpersonagem(),':emMissao'=> $model->getemMissao(),':excluido'=> $model->getexcluido(),':jogador'=> $model->getjogador(),':ouro'=> $model->getouro(),':anotacoes'=> $model->getanotacoes(),':PV'=> $model->getPV(),':PM'=> $model->getPM(),);
	 return $params;
   }
   private function getParams6(Model $model){
        $params = array(':id'=> $model->getid(),':vilao'=> $model->getvilao(),':raca'=> $model->getraca(),':classe'=> $model->getclasse(),':idade'=> $model->getidade(),':excluido'=> $model->getexcluido(),':sexo'=> $model->getsexo(),':avatar'=> $model->getavatar(),':DESCRICAO'=> $model->getDESCRICAO(),':FORCA'=> $model->getFORCA(),':AGILIDADE'=> $model->getAGILIDADE(),':INTELIGENCIA'=> $model->getINTELIGENCIA(),':VONTADE'=> $model->getVONTADE(),':PV'=> $model->getPV(),':PM'=> $model->getPM(),);
	 return $params;
   }
   private function getParams7(Model $model){
        $params = array(':id'=> $model->getid(),':MISSAO'=> $model->getMISSAO(),':DESCRICAO'=> $model->getDESCRICAO(),':excluido'=> $model->getexcluido(),':DATA'=> $model->getDATA(),':emMissao'=> $model->getemMissao(),':objetivo'=> $model->getobjetivo(),':local'=> $model->getlocal(),':vilao'=> $model->getvilao(),':recompensa'=> $model->getrecompensa(),':falha'=> $model->getfalha(),':como'=> $model->getcomo(),':avatar'=> $model->getavatar(),':anotacoes'=> $model->getanotacoes(),);
	 return $params;
   }
   private function executeStatement(PDOStatement $statement, array $params){
        if (!$statement->execute($params)){
            self::throwDbError($this->getDb()->errorInfo());
        }
   }
   public function query($sql){
        set_time_limit(3600);
        $statement = $this->getDb()->query($sql, PDO::FETCH_ASSOC);
        if ($statement === false) {
            self::throwDbError($this->getDb()->errorInfo());
        }
        return $statement;
   }
   private static function throwDbError(array $errorInfo){
        // TODO log error, send email, etc.
        throw new Exception('DB error [' . $errorInfo[0] . ', ' . $errorInfo[1] . ']: ' . $errorInfo[2]);
   }
   private function getEncontreSql(ModelSearchCriteria $search = null) {
          if ($search->getpersonagem() !== null) {
                 $sql="SELECT * FROM ".$search->gettabela()." WHERE personagem='".$search->getpersonagem()."' AND excluido = '0' ";
          }elseif($search->getjogador() !== null){
                $sql="SELECT * FROM ".$search->gettabela()." WHERE jogador='".$search->getjogador()."' AND excluido = '0' ";
          }else{
              if($search->gettabela()=='personagem'){
                $sql = 'SELECT * FROM `'.$search->gettabela().'` WHERE jogador != "MESTRE" AND excluido = "0" ';
              }else{
                $sql = 'SELECT * FROM `'.$search->gettabela().'` WHERE excluido = "0" ';
              }
          }
        return $sql;
  }
   private function getEncontreSql2(ModelSearchCriteria $search = null) {
          if ($search->getpersonagem() !== null) {
                 $sql="SELECT * FROM ".$search->gettabela()." WHERE personagem='".$search->getpersonagem()."' AND excluido = '0' ";
          }elseif($search->getjogador() !== null){
                $sql = "SELECT * FROM `".$search->gettabela()."` LEFT JOIN `personagem` on ".$search->gettabela().".personagem = personagem.personagem WHERE ".$search->gettabela().".MISSAO = '".$search->getMISSAO()."' AND missao.excluido = '0'";
          }else{
              if($search->gettabela()=='personagem'){
                $sql = 'SELECT * FROM `'.$search->gettabela().'` WHERE jogador != "MESTRE" AND excluido = "0" ';
              }else{
                $sql = 'SELECT * FROM `'.$search->gettabela().'` WHERE excluido = "0" ';
              }
          }
        return $sql;
  }
    private function criaTabela($tabela){
        $sql="CREATE TABLE IF NOT EXISTS `$tabela` ( `id` INT(5) NOT NULL AUTO_INCREMENT , `mes` INT(2) NULL , `dt` DATE NULL , `descricao` TEXT NULL , `entrada` DECIMAL(12,2) NULL , `saida` DECIMAL(12,2) NULL , `diz_ofe` ENUM('diz','ofe') NULL , `criado` varchar(50) NULL , `modificado` varchar(50) NULL , `excluido` INT(1) NOT NULL DEFAULT '0', PRIMARY KEY (`id`)) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;";
        return $sql;
   }
}