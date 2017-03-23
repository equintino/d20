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
        //print_r($model);die;
        return $model;
   }
   public function encontrePorPersonagem(ModelSearchCriteria $search=null){
           $row = $this->query("SELECT * FROM `".$search->gettabela()."` WHERE excluido = '0' and `personagem` = '".$search->getpersonagem()."'");
        if (!$row) {
            return null;
        }
        $model = new Model();
        modelMapper::map($model, $row);
        return $model;
   }
   public function encontrePorPersonagemRaca(ModelSearchCriteria $search=null){
           $row = $this->query("SELECT * FROM `personagem` left join `tb_racas` on personagem.raca=tb_racas.RACA WHERE personagem.excluido = 0 and personagem.personagem = '".$search->getpersonagem()."'")->fetch();
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
   public function totalLinhas(ModelSearchCriteria $search=null){
           $row = $this->query("SELECT id FROM `".$search->gettabela()."` WHERE `excluido` =  '0' ORDER BY id DESC ")->fetch();
        if (!$row) {
            return null;
        }
        return $row;
   }
   public function grava(Model $model){
    //print_r($model);die;
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
        $model->setcriado($now);
        $model->setmodificado($now);        
        $sql = 'INSERT INTO `'.$model->gettabela().'` (`id`,`jogador`,`personagem`,`raca`,`classe`,`tendencia1`,`tendencia2`,`idade`,`tabela`,`sexo`,`criado`,`modificado`,`excluido`,`habilidade`,`altura`,`peso`,`cidade`,`motivacao`,`breveHistoria`) VALUES (:id,:jogador,:personagem,:raca,:classe,:tendencia1,:tendencia2,:idade,:tabela,:sexo,:criado,:modificado,:excluido,:habilidade,:altura,:peso,:cidade,:motivacao,:breveHistoria)';
	$search = new ModelSearchCriteria();
        $search->settabela($model->gettabela());
        return $this->execute($sql, $model);
   }
   private function update(Model $model){
        date_default_timezone_set("Brazil/East");
        $now = mktime (date("H"), date("i"), date("s"), date("m")  , date("d"), date("Y"));
        $model->setmodificado($now);
        $sql = 'UPDATE `'.$model->gettabela().'` SET id = :id, jogador = :jogador, personagem = :personagem, raca = :raca, classe = :classe, tendencia1 = :tendencia1, tendencia2 = :tendencia2, idade = :idade, tabela = :tabela, sexo = :sexo, modificado = :modificado, excluido = :excluido, habilidade = :habilidade, altura = :altura, peso = :peso, cidade = :cidade, motivacao = :motivacao, breveHistoria = :breveHistoria WHERE personagem = :personagem ';
        //print_r($this->execute($sql, $model));die;
        return $this->execute($sql, $model);
   }
   private function insert2(Model $model){
        date_default_timezone_set("Brazil/East");
        $now = mktime (date('H'), date('i'), date('s'), date("m")  , date("d"), date("Y"));
        $model->setid_atrib(null);
        $model->setexcluido(0);
        $model->setcriado($now);
        $model->setmodificado($now); 
        $this->execute2($this->criaTabela($model->gettabela()), $model);       
        $sql = 'INSERT INTO `'.$model->gettabela().'` (`id_atrib`,`FORCA`,`AGILIDADE`,`INTELIGENCIA`,`VONTADE`,`PV`,`PM`,`PE`,`CLASSE_COMUM`,`HABILIDADE_AUTOMATICA`,`personagem`) VALUES (:id_atrib,:FORCA,:AGILIDADE,:INTELIGENCIA,:VONTADE,:PV,:PM,:PE,:CLASSE_COMUM,:HABILIDADE_AUTOMATICA,:personagem)';
	return $this->execute2($sql, $model);
   }
   private function update2(Model $model,$tabela){
        $model->setmodificado(new DateTime(), new DateTimeZone('America/Sao_Paulo'));
        $sql = 'UPDATE `'.$tabela.'` SET id_atrib = :id_atrib, FORCA = :FORCA, AGILIDADE = :AGILIDADE, INTELIGENCIA = :INTELIGENCIA, VONTADE = :VONTADE, PV = :PV, PM = :PM, PE = :PE, CLASSE_COMUM = :CLASSE_COMUM, HABILIDADE_AUTOMATICA = :HABILIDADE_AUTOMATICA, personagem = :personagem WHERE id = :id ';
        return $this->execute2($sql, $model);
   }
   private function insert3(Model $model){
        date_default_timezone_set("Brazil/East");
        $now = mktime (date('H'), date('i'), date('s'), date("m")  , date("d"), date("Y"));
        $model->setid(null);
        $model->setexcluido(0);
        $model->setcriado($now);
        $model->setmodificado($now); 
        $this->execute3($this->criaTabela($model->gettabela()), $model);       
        $sql = 'INSERT INTO `'.$model->gettabela().'` (`id`,`ARMA`,`CUSTO`,`DANO`,`TIPO`,`FN`,`GRUPO`,`OBS`,`figura`) VALUES (:id,:ARMA,:CUSTO,:DANO,:TIPO,:FN,:GRUPO,:OBS,:figura)';
	return $this->execute3($sql, $model);
   }
   private function update3(Model $model,$tabela){
        $model->setmodificado(new DateTime(), new DateTimeZone('America/Sao_Paulo'));
        $sql = 'UPDATE `'.$tabela.'` SET id = :id, ARMA = :ARMA, CUSTO = :CUSTO, DANO = :DANO, TIPO = :TIPO, FN = :FN, GRUPO = :GRUPO, OBS = :OBS, figura = :figura WHERE id = :id ';
        return $this->execute3($sql, $model);
   }
   public function execute($sql,$model){
        $statement = $this->getDb()->prepare($sql);
        $this->executeStatement($statement, $this->getParams($model));
        $search=new ModelSearchCriteria();        
        $search->settabela($model->gettabela());
        if (!$model->getid()) {
            return $this->encontrePorId($search->setid($this->getDb()->lastInsertId()));
        }
        //print_r(($model));die;
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
   private function getParams(Model $model){
        $params = array(':id'=> $model->getid(),':jogador'=> $model->getjogador(),':personagem'=> $model->getpersonagem(),':raca'=> $model->getraca(),':classe'=> $model->getclasse(),':tendencia1'=> $model->gettendencia1(),':tendencia2'=> $model->gettendencia2(),':idade'=> $model->getidade(),':tabela'=> $model->gettabela(),':sexo'=> $model->getsexo(),':criado'=> $model->getcriado(),':modificado'=> $model->getmodificado(),':excluido'=> $model->getexcluido(),':habilidade'=> $model->gethabilidade(),':altura'=> $model->getaltura(),':peso'=> $model->getpeso(),':cidade'=> $model->getcidade(),':motivacao'=> $model->getmotivacao(),':breveHistoria'=> $model->getbreveHistoria(),);
	 return $params;
   }
   private function getParams2(Model $model){
        $params = array(':id_atrib'=> $model->getid_atrib(),':FORCA'=> $model->getFORCA(),':AGILIDADE'=> $model->getAGILIDADE(),':INTELIGENCIA'=> $model->getINTELIGENCIA(),':VONTADE'=> $model->getVONTADE(),':PV'=> $model->getPV(),':PM'=> $model->getPM(),':PE'=> $model->getPE(),':CLASSE_COMUM'=> $model->getCLASSE_COMUM(),':HABILIDADE_AUTOMATICA'=> $model->getHABILIDADE_AUTOMATICA(),':personagem'=> $model->getpersonagem(),);
	 return $params;
   }
   private function getParams3(Model $model){
        $params = array(':id'=> $model->getid(),':ARMA'=> $model->getARMA(),':CUSTO'=> $model->getCUSTO(),':DANO'=> $model->getDANO(),':TIPO'=> $model->getTIPO(),':FN'=> $model->getFN(),':GRUPO'=> $model->getGRUPO(),':OBS'=> $model->getOBS(),':figura'=> $model->getfigura(),);
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
          }else{
             $sql = 'SELECT * FROM `'.$search->gettabela().'` WHERE excluido = "0" ';
          }
        return $sql;
  }
    private function criaTabela($tabela){
        $sql="CREATE TABLE IF NOT EXISTS `$tabela` ( `id` INT(5) NOT NULL AUTO_INCREMENT , `mes` INT(2) NULL , `dt` DATE NULL , `descricao` TEXT NULL , `entrada` DECIMAL(12,2) NULL , `saida` DECIMAL(12,2) NULL , `diz_ofe` ENUM('diz','ofe') NULL , `criado` varchar(50) NULL , `modificado` varchar(50) NULL , `excluido` INT(1) NOT NULL DEFAULT '0', PRIMARY KEY (`id`)) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;";
        return $sql;
   }
}