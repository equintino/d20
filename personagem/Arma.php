<?php
require_once 'Personagem.php';
class Arma extends Personagem{
    private $tipo;
    private $qtd;
    private $descricao;
    private $fn;
    private $armadura;
    private $defesa;
    
    public function __construct(){
        
    }
    public function getTipo() {
        return $this->tipo;
    }
    public function getQtd() {
        return $this->qtd;
    }
    public function getDescricao() {
        return $this->descricao;
    }
    public function getFn() {
        return $this->fn;
    }
    public function getArmadura() {
        return $this->armadura;
    }
    public function getDefesa() {
        return $this->defesa;
    }
    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }
    public function setQtd($qtd) {
        $this->qtd = $qtd;
    }
    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }
    public function setFn($fn) {
        $this->fn = $fn;
    }
    public function setArmadura($armadura) {
        $this->armadura = $armadura;
    }
    public function setDefesa($defesa) {
        $this->defesa = $defesa;
    }
}