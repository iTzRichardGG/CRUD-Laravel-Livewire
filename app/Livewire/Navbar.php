<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class Navbar extends Component
{

    public $usuarios;

    public $ajustes = false;
    public $cuenta = false;
    public $Aspecto = false;

    public function mount()
    {
        $this->usuarios = User::find(1);
    }

    public function render()
    {
        return view('livewire.navbar',
        ['usuarios'=> $this->usuarios,]
        );
    }

    public function MostrarAjustes()
    {

        if ($this->ajustes) {
            $this->ajustes = false;
            return;
        }

        $this->ajustes = true;
    }

    public function cerrarAjustes()
    {
        $this->ajustes = false;
    }

    public function Aspecto()
    {
        $this->Aspecto = true;
    }
}


