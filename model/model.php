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
 }