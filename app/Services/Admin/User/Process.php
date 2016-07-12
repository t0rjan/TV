<?php

namespace App\Services\Admin\User;

use Auth;
use App\Model\User;
use App\Services\Admin\BaseProcess;
use App\Services\Admin\User\Validate\User as UserValidate;

class Process extends BaseProcess
{
    public function postUser($data = [])
    {
        //将Model保存成变量
        $user = new User();
        //如果存在where条件
        if (isset($data['filters']) && strlen($data['filters']) > 0) {
            $filters = json_decode($data['filters']);
            $where_content = config('constants.WHERE_CONTENT');
            if ($filters->groupOp == 'AND') {

                foreach ($filters->rules as $v) {
                    $user = $user->where('users.' . $v->field, $where_content[$v->op], $v->data);
                }
            }

            if ($filters->groupOp == 'OR') {
                foreach ($filters->rules as $v) {
                    $user = $user->orWhere('users.' . $v->field, $where_content[$v->op], $v->data);
                }
            }
        }

        return $user->orderby($data['sidx'], $data['sord'])
            ->select(
                'user_type.type_name',
                'users.id',
                'users.name',
                'users.nickname',
                'users.phone',
                'users.user_type',
                'users.created_at',
                'users.updated_at',
                'users.is_status'
            )
            ->leftJoin('user_type', 'user_type.type_id', '=', 'users.user_type')
            ->take($data['page'])
            ->Paginate($data['rows']);
    }


    public function postHandel($data = [])
    {
        if ($data['oper'] == 'getUserType') {
            return $this->successData=$this->getUserType();
        }

        //数据验证
        $userlValidate = new UserValidate();
        if (!$userlValidate->oper($data)) {
            $this->setErrorMsg(trans($userlValidate->errorMsg));
            return false;
        }

        $user = new User();
        //添加
        if ($data['oper'] == 'add') {
            $user->user_name = $data['user_name'];
            $user->is_status = $data['is_status'];
            $user->create_user = AUth::user()['id'];
            $result = $user->save();
            $this->setSuccessMsg('添加数据成功！');
            return $result;
        }


        //更新
        if ($data['oper'] == 'edit') {
            unset($data['_token'], $data['oper']);
            $result = $user->where('id', $data['id'])->update($data);
            $this->setSuccessMsg('更新数据成功！');
            return $result;
        }
        //删除
        if ($data['oper'] == 'del') {
            $result = $user->whereIn('id', explode(',', $data['id']))->update(
                [
                    'is_status' => 0
                ]
            );
            $this->setSuccessMsg('删除数据成功！');
            return $result;
        }


        return false;
    }


    private function getUserType()
    {
        return User::getAllType();


    }
}

