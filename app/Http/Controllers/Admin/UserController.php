<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use \Illuminate\Http\Request;
//过程类
use App\Services\Admin\User\Process;

/**
 * @readme User控制器
 * Class UserController
 * @package App\Http\Controllers\Admin
 * @author LeslieWong
 * @email 99999r00t@gmail.com
 */
class UserController extends Controller
{

    //视图目录
    private $viewDir = 'admin.user.';

    public function index(Request $request)
    {
        if ($request->method() == 'POST') {
            $process = new Process();

            $data = $process->postUser($request->all());

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
            'data' =>$process->getSuccessData(),
            'msg' => $process->getSuccessMsg()
        ]);
    }


}
