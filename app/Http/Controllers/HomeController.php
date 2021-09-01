<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adm\Texto;
use App\Models\Adm\Tecnologia;
use App\Models\Adm\Project;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $textos = Texto::all();
        $es = [];
        foreach ($textos as $t) {
            $es[$t->value] = $t->es;
        }
        $en = [];
        foreach ($textos as $t) {
            $en[$t->value] = $t->en;
        }
        $f = ['es' => $es, 'en' => $en];

        $tecnologias = Tecnologia::all();
        $tec = [];
        foreach ($tecnologias as $t) {
            $tec[$t->id] = ['id' => $t->id, 'experiencia' => $t->experiencia, 'name' => $t->nombre, 'tipo' => $t->area];
        }

        $pro = Project::with('images')->orderBy('id', 'desc')->get();

        return view('home', ['f' => $f, 'tec' => $tec, 'pro' => $pro]);
    }
}
