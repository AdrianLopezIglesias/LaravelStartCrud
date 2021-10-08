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
        

        return view('home');
    }
}
