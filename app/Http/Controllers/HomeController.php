<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /**
         * Esto lo validamos despues :V me redirecciona al login :v
         */
   //      $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            "title" => "BLOG",
            "description" => "Un espacio para expresar tus ideas",
            "img" => "img/home-bg.jpg"];
        return View::make('main', $data);
    }

    /**
     * Show the application about.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function about()
    {
        $title = "¿Quién soy yo?";
        $description = "!Vamos, Conoce un poco de mí";
        $text = "Mi nombre es Guadalupe Valerio y soy ingeniero en Tecnologías de la Información y Comunicación (¿Qué nombre tan largo, no?)
                Este portal surgió de la necesidad de aprender Laravel e implementar otras tenologás actuales.
                Te invito a crear una cuenta para que conoczcas todo lo que puedes hacer en esta paltaforma.
                Mucho éxito. lml ";
        $img = "img/about-bg.jpg";
        return view('about')->with('title', $title)->with("description", $description)->with("text",$text)->with("img",$img);
    }

    public function login(){
        return "vista de login";
    }


}
