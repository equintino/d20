<?php
require_once 'Personagem.php';
class Personalidade extends Personagem{
    private $ten1;
    private $ten2;
    private $motivacao;
    private $avatar;
    
    public function __construct(){
        
    }
    public function getTen1() {
        return $this->ten1;
    }
    public function getTen2() {
        return $this->ten2;
    }
    public function getMotivacao() {
        return $this->motivacao;
    }
    public function getAvatar() {
        return $this->avatar;
    }
    public function setTen1($ten1) {
        $this->ten1 = $ten1;
    }
    public function setTen2($ten2) {
        $this->ten2 = $ten2;
    }
    public function setMotivacao($motivacao) {
        $this->motivacao = $motivacao;
    }
    public function setAvatar($avatar) {
        $this->avatar = $avatar;
    }
}