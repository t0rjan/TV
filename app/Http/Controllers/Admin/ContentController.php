<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

//过程类
use App\Services\Admin\Content\Process;

class ContentController extends Controller
{
    //视图目录
    private $viewDir = 'admin.content.';

//    public function index()
//    {
//        $process=new Process();
//        $data=$process->getIndex();


//        return view('Admin.Channel.index',compact('data'));
//    }


    public function add()
    {
        $process = new Process();

        $channel = $process->getChannel();

        $label = $process->getLabel();

        return view($this->viewDir . 'add', compact('channel', 'label'));

    }

}
