<?php

class Mensagem {

    private $codigo;
    private $titulo;
    private $mensagem;
    private $data;

    // GETTERS
    public function getCodigo(){
        return $this->codigo;
    }

    public function getTitulo(){
        return $this->titulo;
    }

    public function getMensagem(){
        return $this->mensagem;
    }

    public function getData(){
        return $this->data;
    }

    // SETTERS
    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }

    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }

    public function setMensagem($mensagem){
        $this->mensagem = $mensagem;
    }

    public function setData($data){
        $this->data = $data;
    }
}

?>