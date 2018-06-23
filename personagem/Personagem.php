<?php
class Personagem {
    protected $id;
    protected $jogador;
    protected $nome;
    protected $raca;
    protected $classe;
    protected $idade;
    protected $sexo;
    protected $altura;
    protected $peso;
    
    public function __construct($dados){
        $this->id=$dados->getid();
        $this->nome=$dados->getpersonagem();
        $this->jogador=$dados->getjogador();
        $this->raca=$dados->getraca();
        $this->classe=$dados->getclasse();
        $this->idade=$dados->getidade();
        $this->sexo=$dados->getsexo();
        $this->altura=$dados->getaltura();
        $this->peso=$dados->getpeso();
    }
    public function getId() {
        return $this->id;
    }
    public function getJogador() {
        return $this->jogador;
    }
    public function getNome() {
        return $this->nome;
    }
    public function getRaca() {
        return $this->raca;
    }
    public function getClasse() {
        return $this->classe;
    }
    public function getIdade() {
        return $this->idade;
    }
    public function getSexo() {
        return $this->sexo;
    }
    public function getAltura() {
        return $this->altura;
    }
    public function getPeso() {
        return $this->peso;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function setJogador($jogador) {
        $this->jogador = $jogador;
    }
    public function setNome($nome) {
        $this->nome = $nome;
    }
    public function setRaca($raca) {
        $this->raca = $raca;
    }
    public function setClasse($classe) {
        $this->classe = $classe;
    }
    public function setIdade($idade) {
        $this->idade = $idade;
    }
    public function setSexo($sexo) {
        $this->sexo = $sexo;
    }
    public function setAltura($altura) {
        $this->altura = $altura;
    }
    public function setPeso($peso) {
        $this->peso = $peso;
    }
}