<?php 
 class ModelSearchCriteria{
   private $id;
       public function getid(){
        return $this->id;
      }
      public function setid($id){
          $this->id = $id;
          return $this;
      }
   private $jogador;
       public function getjogador(){
        return $this->jogador;
      }
      public function setjogador($jogador){
          $this->jogador = $jogador;
          return $this;
      }
   private $personagem;
       public function getpersonagem(){
        return $this->personagem;
      }
      public function setpersonagem($personagem){
          $this->personagem = $personagem;
          return $this;
      }
   private $raca;
       public function getraca(){
        return $this->raca;
      }
      public function setraca($raca){
          $this->raca = $raca;
          return $this;
      }
   private $classe;
       public function getclasse(){
        return $this->classe;
      }
      public function setclasse($classe){
          $this->classe = $classe;
          return $this;
      }
   private $tendencia1;
       public function gettendencia1(){
        return $this->tendencia1;
      }
      public function settendencia1($tendencia1){
          $this->tendencia1 = $tendencia1;
          return $this;
      }
   private $tendencia2;
       public function gettendencia2(){
        return $this->tendencia2;
      }
      public function settendencia2($tendencia2){
          $this->tendencia2 = $tendencia2;
          return $this;
      }
   private $idade;
       public function getidade(){
        return $this->idade;
      }
      public function setidade($idade){
          $this->idade = $idade;
          return $this;
      }
   private $tabela;
       public function gettabela(){
        return $this->tabela;
      }
      public function settabela($tabela){
          $this->tabela = $tabela;
          return $this;
      }
   private $sexo;
       public function getsexo(){
        return $this->sexo;
      }
      public function setsexo($sexo){
          $this->sexo = $sexo;
          return $this;
      }
   private $criado;
       public function getcriado(){
        return $this->criado;
      }
      public function setcriado($criado){
          $this->criado = $criado;
          return $this;
      }
   private $modificado;
       public function getmodificado(){
        return $this->modificado;
      }
      public function setmodificado($modificado){
          $this->modificado = $modificado;
          return $this;
      }
   private $excluido;
       public function getexcluido(){
        return $this->excluido;
      }
      public function setexcluido($excluido){
          $this->excluido = $excluido;
          return $this;
      }
   private $habilidade;
       public function gethabilidade(){
        return $this->habilidade;
      }
      public function sethabilidade($habilidade){
          $this->habilidade = $habilidade;
          return $this;
      }
   private $altura;
       public function getaltura(){
        return $this->altura;
      }
      public function setaltura($altura){
          $this->altura = $altura;
          return $this;
      }
   private $peso;
       public function getpeso(){
        return $this->peso;
      }
      public function setpeso($peso){
          $this->peso = $peso;
          return $this;
      }
   private $cidade;
       public function getcidade(){
        return $this->cidade;
      }
      public function setcidade($cidade){
          $this->cidade = $cidade;
          return $this;
      }
   private $motivacao;
       public function getmotivacao(){
        return $this->motivacao;
      }
      public function setmotivacao($motivacao){
          $this->motivacao = $motivacao;
          return $this;
      }
   private $breveHistoria;
       public function getbreveHistoria(){
        return $this->breveHistoria;
      }
      public function setbreveHistoria($breveHistoria){
          $this->breveHistoria = $breveHistoria;
          return $this;
      }
   private $id_atrib;
       public function getid_atrib(){
        return $this->id_atrib;
      }
      public function setid_atrib($id_atrib){
          $this->id_atrib = $id_atrib;
          return $this;
      }
   private $FORCA;
       public function getFORCA(){
        return $this->FORCA;
      }
      public function setFORCA($FORCA){
          $this->FORCA = $FORCA;
          return $this;
      }
   private $AGILIDADE;
       public function getAGILIDADE(){
        return $this->AGILIDADE;
      }
      public function setAGILIDADE($AGILIDADE){
          $this->AGILIDADE = $AGILIDADE;
          return $this;
      }
   private $INTELIGENCIA;
       public function getINTELIGENCIA(){
        return $this->INTELIGENCIA;
      }
      public function setINTELIGENCIA($INTELIGENCIA){
          $this->INTELIGENCIA = $INTELIGENCIA;
          return $this;
      }
   private $VONTADE;
       public function getVONTADE(){
        return $this->VONTADE;
      }
      public function setVONTADE($VONTADE){
          $this->VONTADE = $VONTADE;
          return $this;
      }
   private $PV;
       public function getPV(){
        return $this->PV;
      }
      public function setPV($PV){
          $this->PV = $PV;
          return $this;
      }
   private $PM;
       public function getPM(){
        return $this->PM;
      }
      public function setPM($PM){
          $this->PM = $PM;
          return $this;
      }
   private $PE;
       public function getPE(){
        return $this->PE;
      }
      public function setPE($PE){
          $this->PE = $PE;
          return $this;
      }
   private $CLASSE_COMUM;
       public function getCLASSE_COMUM(){
        return $this->CLASSE_COMUM;
      }
      public function setCLASSE_COMUM($CLASSE_COMUM){
          $this->CLASSE_COMUM = $CLASSE_COMUM;
          return $this;
      }
   private $HABILIDADE_AUTOMATICA;
       public function getHABILIDADE_AUTOMATICA(){
        return $this->HABILIDADE_AUTOMATICA;
      }
      public function setHABILIDADE_AUTOMATICA($HABILIDADE_AUTOMATICA){
          $this->HABILIDADE_AUTOMATICA = $HABILIDADE_AUTOMATICA;
          return $this;
      }
   private $ARMA;
       public function getARMA(){
        return $this->ARMA;
      }
      public function setARMA($ARMA){
          $this->ARMA = $ARMA;
          return $this;
      }
   private $CUSTO;
       public function getCUSTO(){
        return $this->CUSTO;
      }
      public function setCUSTO($CUSTO){
          $this->CUSTO = $CUSTO;
          return $this;
      }
   private $DANO;
       public function getDANO(){
        return $this->DANO;
      }
      public function setDANO($DANO){
          $this->DANO = $DANO;
          return $this;
      }
   private $TIPO;
       public function getTIPO(){
        return $this->TIPO;
      }
      public function setTIPO($TIPO){
          $this->TIPO = $TIPO;
          return $this;
      }
   private $FN;
       public function getFN(){
        return $this->FN;
      }
      public function setFN($FN){
          $this->FN = $FN;
          return $this;
      }
   private $GRUPO;
       public function getGRUPO(){
        return $this->GRUPO;
      }
      public function setGRUPO($GRUPO){
          $this->GRUPO = $GRUPO;
          return $this;
      }
   private $OBS;
       public function getOBS(){
        return $this->OBS;
      }
      public function setOBS($OBS){
          $this->OBS = $OBS;
          return $this;
      }
   private $figura;
       public function getfigura(){
        return $this->figura;
      }
      public function setfigura($figura){
          $this->figura = $figura;
          return $this;
      }
   private $BONUS_ATRIBUTO;
       public function getBONUS_ATRIBUTO(){
        return $this->BONUS_ATRIBUTO;
      }
      public function setBONUS_ATRIBUTO($BONUS_ATRIBUTO){
          $this->BONUS_ATRIBUTO = $BONUS_ATRIBUTO;
          return $this;
      }
   private $PROFICIENCIA;
       public function getPROFICIENCIA(){
        return $this->PROFICIENCIA;
      }
      public function setPROFICIENCIA($PROFICIENCIA){
          $this->PROFICIENCIA = $PROFICIENCIA;
          return $this;
      }
}