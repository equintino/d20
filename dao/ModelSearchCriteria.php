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
}