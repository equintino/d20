<?php
require_once 'Personagem.php';
class Habilidade extends Personagem{
    private $descricao;
    private $qtd;
    private $nivel;
    private $forca;
    private $agilidade;
    private $inteligencia;
    private $vontade;
    private $pv;
    private $pm;
    private $pe;
    private $mana;
    
    public function __construct(){
        //print_r($dados);
        //parent::__construct($dados);
        //print_r($this->getid);die;
        //$this->nivel=$dados->getlevel();
    }
    public function getDescricao() {
        return $this->descricao;
    }

    public function getQtd() {
        return $this->qtd;
    }

    public function getNivel() {
        return $this->nivel;
    }

    public function getForca() {
        return $this->forca;
    }

    public function getAgilidade() {
        return $this->agilidade;
    }

    public function getInteligencia() {
        return $this->inteligencia;
    }

    public function getVontade() {
        return $this->vontade;
    }

    public function getPv() {
        return $this->pv;
    }

    public function getPm() {
        return $this->pm;
    }

    public function getPe() {
        return $this->pe;
    }

    public function getMana() {
        return $this->mana;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function setQtd($qtd) {
        $this->qtd = $qtd;
    }

    public function setNivel($nivel) {
        $this->nivel = $nivel;
    }

    public function setForca($forca) {
        $this->forca = $forca;
    }

    public function setAgilidade($agilidade) {
        $this->agilidade = $agilidade;
    }

    public function setInteligencia($inteligencia) {
        $this->inteligencia = $inteligencia;
    }

    public function setVontade($vontade) {
        $this->vontade = $vontade;
    }

    public function setPv($pv) {
        $this->pv = $pv;
    }

    public function setPm($pm) {
        $this->pm = $pm;
    }

    public function setPe($pe) {
        $this->pe = $pe;
    }

    public function setMana($mana) {
        $this->mana = $mana;
    }


}
