<?php

namespace App\Http\Controllers\Admin;

//主控制器
use App\Http\Controllers\Controller;
//request类
use \Illuminate\Http\Request;
//过程类
use App\Services\Admin\Label\Process;


/**
 * @readme 标签控制器
 * Class LabelController
 * @package App\Http\Controllers\Admin
 * @author LeslieWong
 * @email 99999r00t@gmail.com
 */
class LabelController extends Controller
{
    //视图目录
    private $viewDir = 'admin.label.';


    public function index(Request $request)
    {
        if ($request->method() == 'POST') {
            $process = new Process();

            $data = $process->postLabel($request->all());

            return response()->json($data);
        }
        return view($this->viewDir . 'index');

    }

    public function oper(Request $request)
    {
        $process = new Process();
        if (!$process->postHandel($request->all())) {
            return response()->json([
                'code' => 0,
                'data' => '',
                'msg' => $process->getErrorMessage()
            ]);
        }
        return response()->json([
            'code' => 1,
            'data' => '',
            'msg' => $process->getSuccessMsg()
        ]);

    }

}
