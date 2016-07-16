<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

/**
 * @readme Admin控制器
 * Class IndexController
 * @package App\Http\Controllers\v1
 * @author LeslieWong
 * @email 99999r00t@gmail.com
 */
class IndexController extends Controller
{
    //视图目录
    private $viewDir = 'admin.index.';

    public function index()
    {
        return view($this->viewDir . 'index');
    }


    public function welcome()
    {
        return view($this->viewDir . 'welcome');

    }

}
