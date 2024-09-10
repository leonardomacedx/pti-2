<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Requerimento extends Component
{
    public $usuario;
    public $sexo;
    public $edital;
    public $cidades;

    public $titulo;

    public $rota;

    public $requerimento;

    public function __construct($usuario, $sexo, $edital, $cidades, $titulo, $rota, $requerimento)
    {
        $this->usuario = $usuario;
        $this->sexo = $sexo;
        $this->edital = $edital;
        $this->cidades = $cidades;
        $this->titulo = $titulo;
        $this->rota = $rota;
        $this->requerimento =$requerimento;
    }

    public function render()
    {
        return view('components.requerimento', ['usuario']);
    }
}
