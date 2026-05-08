<?php

class Conexao {

    private $usuario1;
    private $usuario2;
    private $ativo;
    private $data;

    // GETTERS

    public function getUsuario1(){
        return $this->usuario1;
    }

    public function getUsuario2(){
        return $this->usuario2;
    }

    public function getAtivo(){
        return $this->ativo;
    }

    public function getData(){
        return $this->data;
    }

    // SETTERS

    public function setUsuario1($usuario1){
        $this->usuario1 = $usuario1;
    }

    public function setUsuario2($usuario2){
        $this->usuario2 = $usuario2;
    }

    public function setAtivo($ativo){
        $this->ativo = $ativo;
    }

    public function setData($data){
        $this->data = $data;
    }
}

?>