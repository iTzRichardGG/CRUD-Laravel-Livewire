<?php

namespace App\Livewire;

use Livewire\Component;

class Home extends Component
{
    public $ajustes = false;

    public function render()
    {
        return view('livewire.home');
    }

    public function MostrarAjustes()
    {
        $this->ajustes = true;
        
    }
}
