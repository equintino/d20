<?php
require_once 'Personagem.php';
class Atividade extends Personagem{
    private $emMissao;
    private $dia;
    private $tempMax;
    private $tempMin;
    private $estacao;
    private $lua;
    private $data;
    private $missao;
    private $anotacao;
    private $objetivo;
    private $local;
    private $recompensa;
    private $falha;
    private $como;
    
    public function __construct(){
        
    }
    public function getEmMissao() {
        return $this->emMissao;
    }
    public function getDia() {
        return $this->dia;
    }
    public function getTempMax() {
        return $this->tempMax;
    }
    public function getTempMin() {
        return $this->tempMin;
    }
    public function getEstacao() {
        return $this->estacao;
    }
    public function getLua() {
        return $this->lua;
    }
    public function getData() {
        return $this->data;
    }
    public function getMissao() {
        return $this->missao;
    }
    public function getAnotacao() {
        return $this->anotacao;
    }
    public function getObjetivo() {
        return $this->objetivo;
    }
    public function getLocal() {
        return $this->local;
    }
    public function getRecompensa() {
        return $this->recompensa;
    }
    public function getFalha() {
        return $this->falha;
    }
    public function getComo() {
        return $this->como;
    }
    public function setEmMissao($emMissao) {
        $this->emMissao = $emMissao;
    }
    public function setDia($dia) {
        $this->dia = $dia;
    }
    public function setTempMax($tempMax) {
        $this->tempMax = $tempMax;
    }
    public function setTempMin($tempMin) {
        $this->tempMin = $tempMin;
    }
    public function setEstacao($estacao) {
        $this->estacao = $estacao;
    }
    public function setLua($lua) {
        $this->lua = $lua;
    }
    public function setData($data) {
        $this->data = $data;
    }
    public function setMissao($missao) {
        $this->missao = $missao;
    }
    public function setAnotacao($anotacao) {
        $this->anotacao = $anotacao;
    }
    public function setObjetivo($objetivo) {
        $this->objetivo = $objetivo;
    }
    public function setLocal($local) {
        $this->local = $local;
    }
    public function setRecompensa($recompensa) {
        $this->recompensa = $recompensa;
    }
    public function setFalha($falha) {
        $this->falha = $falha;
    }
    public function setComo($como) {
        $this->como = $como;
    }
}