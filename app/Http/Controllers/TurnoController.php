<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TurnoController extends Controller
{
    public function index(){

        return view('turnos.index-historial');

    }
}
