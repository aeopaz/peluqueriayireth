<?php

namespace App\Http\Controllers;

use App\Models\Local;
use Illuminate\Http\Request;

class LocalController extends Controller
{
    public function estado_local($tipo_estado){
        $local=new Local();
        $local->estado=$tipo_estado;
        $local->save();

        return back()->with('success','OK');

    }
}
