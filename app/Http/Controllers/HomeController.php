<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Contracts\Container\Container;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Container $container)
    {

        $class = $container->tagged('sms')[0];


        //如果传递的是::class，我们需要make,如果传递的是直接的实例，我们就不需要
//        $fuck = $container->make($class);

//        dd($container->call([$fuck, 'send']));

        dd($container->call([$class, 'send']));


        return view('home');
    }
}
