<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

/**
 * @readme Home控制器
 * Class IndexController
 * @package App\Http\Controllers\v1
 * @author LeslieWong
 * @email 99999r00t@gmail.com
 */
class IndexController extends Controller
{
    public function index(){
        return view(env('APP_VERSION','v1').'.Home.index');
    }

}
