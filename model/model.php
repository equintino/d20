<?php 
 class Model{
 private $id;
 private $jogador;
 private $personagem;
 private $raca;
 private $classe;
 private $tendencia1;
 private $tendencia2;
 private $idade;
 private $tabela;
 private $sexo;
 private $criado;
 private $modificado;
 private $excluido;
 private $habilidade;
 private $altura;
 private $peso;
 private $cidade;
 private $motivacao;
 private $breveHistoria;
 private $avatar;
 private $nivel;
 private $emMissao;
 private $id_atrib;
 private $FORCA;
 private $AGILIDADE;
 private $INTELIGENCIA;
 private $VONTADE;
 private $PV;
 private $PM;
 private $PE;
 private $CLASSE_COMUM;
 private $HABILIDADE_AUTOMATICA;
 private $ARMA;
 private $ouro;
 private $DANO;
 private $TIPO;
 private $FN;
 private $GRUPO;
 private $OBS;
 private $figura;
 private $BONUS_ATRIBUTO;
 private $PROFICIENCIA;
 private $REQUISITOS;
 private $MANA;
 private $DESCRICAO;
 private $armadura;
 private $defesa;
 private $item;
 private $equipamento;
 private $DIA;
 private $TEMPMAX;
 private $TEMPMIN;
 private $ESTACAO;
 private $LUAS;
 private $figura2;
 private $figura3;
 private $DATA;
 private $MISSAO;
 private $anotacoes;
 public function getid(){
	return $this->id;
 }
 public function setid($id ){
	$this->id=$id;
 }
 public function getjogador(){
	return $this->jogador;
 }
 public function setjogador($jogador ){
	$this->jogador=$jogador;
 }
 public function getpersonagem(){
	return $this->personagem;
 }
 public function setpersonagem($personagem ){
	$this->personagem=$personagem;
 }
 public function getraca(){
	return $this->raca;
 }
 public function setraca($raca ){
	$this->raca=$raca;
 }
 public function getclasse(){
	return $this->classe;
 }
 public function setclasse($classe ){
	$this->classe=$classe;
 }
 public function gettendencia1(){
	return $this->tendencia1;
 }
 public function settendencia1($tendencia1 ){
	$this->tendencia1=$tendencia1;
 }
 public function gettendencia2(){
	return $this->tendencia2;
 }
 public function settendencia2($tendencia2 ){
	$this->tendencia2=$tendencia2;
 }
 public function getidade(){
	return $this->idade;
 }
 public function setidade($idade ){
	$this->idade=$idade;
 }
 public function gettabela(){
	return $this->tabela;
 }
 public function settabela($tabela ){
	$this->tabela=$tabela;
 }
 public function getsexo(){
	return $this->sexo;
 }
 public function setsexo($sexo ){
	$this->sexo=$sexo;
 }
 public function getcriado(){
	return $this->criado;
 }
 public function setcriado($criado ){
	$this->criado=$criado;
 }
 public function getmodificado(){
	return $this->modificado;
 }
 public function setmodificado($modificado ){
	$this->modificado=$modificado;
 }
 public function getexcluido(){
	return $this->excluido;
 }
 public function setexcluido($excluido ){
	$this->excluido=$excluido;
 }
 public function gethabilidade(){
	return $this->habilidade;
 }
 public function sethabilidade($habilidade ){
	$this->habilidade=$habilidade;
 }
 public function getaltura(){
	return $this->altura;
 }
 public function setaltura($altura ){
	$this->altura=$altura;
 }
 public function getpeso(){
	return $this->peso;
 }
 public function setpeso($peso ){
	$this->peso=$peso;
 }
 public function getcidade(){
	return $this->cidade;
 }
 public function setcidade($cidade ){
	$this->cidade=$cidade;
 }
 public function getmotivacao(){
	return $this->motivacao;
 }
 public function setmotivacao($motivacao ){
	$this->motivacao=$motivacao;
 }
 public function getbreveHistoria(){
	return $this->breveHistoria;
 }
 public function setbreveHistoria($breveHistoria ){
	$this->breveHistoria=$breveHistoria;
 }
 public function getavatar(){
	return $this->avatar;
 }
 public function setavatar($avatar ){
	$this->avatar=$avatar;
 }
 public function getnivel(){
	return $this->nivel;
 }
 public function setnivel($nivel ){
	$this->nivel=$nivel;
 }
 public function getemMissao(){
	return $this->emMissao;
 }
 public function setemMissao($emMissao ){
	$this->emMissao=$emMissao;
 }
 public function getid_atrib(){
	return $this->id_atrib;
 }
 public function setid_atrib($id_atrib ){
	$this->id_atrib=$id_atrib;
 }
 public function getFORCA(){
	return $this->FORCA;
 }
 public function setFORCA($FORCA ){
	$this->FORCA=$FORCA;
 }
 public function getAGILIDADE(){
	return $this->AGILIDADE;
 }
 public function setAGILIDADE($AGILIDADE ){
	$this->AGILIDADE=$AGILIDADE;
 }
 public function getINTELIGENCIA(){
	return $this->INTELIGENCIA;
 }
 public function setINTELIGENCIA($INTELIGENCIA ){
	$this->INTELIGENCIA=$INTELIGENCIA;
 }
 public function getVONTADE(){
	return $this->VONTADE;
 }
 public function setVONTADE($VONTADE ){
	$this->VONTADE=$VONTADE;
 }
 public function getPV(){
	return $this->PV;
 }
 public function setPV($PV ){
	$this->PV=$PV;
 }
 public function getPM(){
	return $this->PM;
 }
 public function setPM($PM ){
	$this->PM=$PM;
 }
 public function getPE(){
	return $this->PE;
 }
 public function setPE($PE ){
	$this->PE=$PE;
 }
 public function getCLASSE_COMUM(){
	return $this->CLASSE_COMUM;
 }
 public function setCLASSE_COMUM($CLASSE_COMUM ){
	$this->CLASSE_COMUM=$CLASSE_COMUM;
 }
 public function getHABILIDADE_AUTOMATICA(){
	return $this->HABILIDADE_AUTOMATICA;
 }
 public function setHABILIDADE_AUTOMATICA($HABILIDADE_AUTOMATICA ){
	$this->HABILIDADE_AUTOMATICA=$HABILIDADE_AUTOMATICA;
 }
 public function getARMA(){
	return $this->ARMA;
 }
 public function setARMA($ARMA ){
	$this->ARMA=$ARMA;
 }
 public function getouro(){
	return $this->ouro;
 }
 public function setouro($ouro ){
	$this->ouro=$ouro;
 }
 public function getDANO(){
	return $this->DANO;
 }
 public function setDANO($DANO ){
	$this->DANO=$DANO;
 }
 public function getTIPO(){
	return $this->TIPO;
 }
 public function setTIPO($TIPO ){
	$this->TIPO=$TIPO;
 }
 public function getFN(){
	return $this->FN;
 }
 public function setFN($FN ){
	$this->FN=$FN;
 }
 public function getGRUPO(){
	return $this->GRUPO;
 }
 public function setGRUPO($GRUPO ){
	$this->GRUPO=$GRUPO;
 }
 public function getOBS(){
	return $this->OBS;
 }
 public function setOBS($OBS ){
	$this->OBS=$OBS;
 }
 public function getfigura(){
	return $this->figura;
 }
 public function setfigura($figura ){
	$this->figura=$figura;
 }
 public function getBONUS_ATRIBUTO(){
	return $this->BONUS_ATRIBUTO;
 }
 public function setBONUS_ATRIBUTO($BONUS_ATRIBUTO ){
	$this->BONUS_ATRIBUTO=$BONUS_ATRIBUTO;
 }
 public function getPROFICIENCIA(){
	return $this->PROFICIENCIA;
 }
 public function setPROFICIENCIA($PROFICIENCIA ){
	$this->PROFICIENCIA=$PROFICIENCIA;
 }
 public function getREQUISITOS(){
	return $this->REQUISITOS;
 }
 public function setREQUISITOS($REQUISITOS ){
	$this->REQUISITOS=$REQUISITOS;
 }
 public function getMANA(){
	return $this->MANA;
 }
 public function setMANA($MANA ){
	$this->MANA=$MANA;
 }
 public function getDESCRICAO(){
	return $this->DESCRICAO;
 }
 public function setDESCRICAO($DESCRICAO ){
	$this->DESCRICAO=$DESCRICAO;
 }
 public function getarmadura(){
	return $this->armadura;
 }
 public function setarmadura($armadura ){
	$this->armadura=$armadura;
 }
 public function getdefesa(){
	return $this->defesa;
 }
 public function setdefesa($defesa ){
	$this->defesa=$defesa;
 }
 public function getitem(){
	return $this->item;
 }
 public function setitem($item ){
	$this->item=$item;
 }
 public function getequipamento(){
	return $this->equipamento;
 }
 public function setequipamento($equipamento ){
	$this->equipamento=$equipamento;
 }
 public function getDIA(){
	return $this->DIA;
 }
 public function setDIA($DIA ){
	$this->DIA=$DIA;
 }
 public function getTEMPMAX(){
	return $this->TEMPMAX;
 }
 public function setTEMPMAX($TEMPMAX ){
	$this->TEMPMAX=$TEMPMAX;
 }
 public function getTEMPMIN(){
	return $this->TEMPMIN;
 }
 public function setTEMPMIN($TEMPMIN ){
	$this->TEMPMIN=$TEMPMIN;
 }
 public function getESTACAO(){
	return $this->ESTACAO;
 }
 public function setESTACAO($ESTACAO ){
	$this->ESTACAO=$ESTACAO;
 }
 public function getLUAS(){
	return $this->LUAS;
 }
 public function setLUAS($LUAS ){
	$this->LUAS=$LUAS;
 }
 public function getfigura2(){
	return $this->figura2;
 }
 public function setfigura2($figura2 ){
	$this->figura2=$figura2;
 }
 public function getfigura3(){
	return $this->figura3;
 }
 public function setfigura3($figura3 ){
	$this->figura3=$figura3;
 }
 public function getDATA(){
	return $this->DATA;
 }
 public function setDATA($DATA ){
	$this->DATA=$DATA;
 }
 public function getMISSAO(){
	return $this->MISSAO;
 }
 public function setMISSAO($MISSAO ){
	$this->MISSAO=$MISSAO;
 }
 public function getanotacoes(){
	return $this->anotacoes;
 }
 public function setanotacoes($anotacoes ){
	$this->anotacoes=$anotacoes;
 }
 }