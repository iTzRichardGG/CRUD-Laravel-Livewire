<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class usuarios_controller extends Controller
{
    public function usuarios()
    {
        return view ('crud-usuarios');
    }
}
