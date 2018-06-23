<?php
require_once 'Personagem.php';
class Origem extends Personagem{
    private $cidade;
    private $breveH;
    private $cComum;
    private $habAuto;
    private $proficiencia;
    private $requisito;
    
    public function __construct(){
        
    }
    public function getCidade() {
        return $this->cidade;
    }
    public function getBreveH() {
        return $this->breveH;
    }
    public function getCComum() {
        return $this->cComum;
    }
    public function getHabAuto() {
        return $this->habAuto;
    }
    public function getProficiencia() {
        return $this->proficiencia;
    }
    public function getRequisito() {
        return $this->requisito;
    }
    public function setCidade($cidade) {
        $this->cidade = $cidade;
    }
    public function setBreveH($breveH) {
        $this->breveH = $breveH;
    }
    public function setCComum($cComum) {
        $this->cComum = $cComum;
    }
    public function setHabAuto($habAuto) {
        $this->habAuto = $habAuto;
    }
    public function setProficiencia($proficiencia) {
        $this->proficiencia = $proficiencia;
    }
    public function setRequisito($requisito) {
        $this->requisito = $requisito;
    }
}