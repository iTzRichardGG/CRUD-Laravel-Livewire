<?php

namespace App\Livewire;

use Livewire\Component;

class Autenticador extends Component
{
    public $activeDiv = 'iniciar_sesion';

    public function render()
    {
        return view('livewire.autenticador') ;
    }

    public function switchDiv($divName)
    {
        $this->activeDiv = $divName;
    }
}
