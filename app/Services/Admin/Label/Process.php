<?php

namespace App\Services\Admin\Label;

use Auth;
use App\Model\Label;
use App\Services\Admin\BaseProcess;
use App\Services\Admin\Label\Validate\Label as LabelValidate;

class Process extends BaseProcess
{

    public function postLabel($data = [])
    {
        //将Model保存成变量
        $label = new Label();
        //如果存在where条件
        if (isset($data['filters']) && strlen($data['filters']) > 0) {
            $filters = json_decode($data['filters']);
            $where_content = config('constants.WHERE_CONTENT');
            if ($filters->groupOp == 'AND') {
                foreach ($filters->rules as $v) {
                    $label = $label->where('label.'.$v->field, $where_content[$v->op], $v->data);
                }
            }
            if ($filters->groupOp == 'OR') {
                foreach ($filters->rules as $v) {
                    $label = $label->orWhere('label.'.$v->field, $where_content[$v->op], $v->data);
                }
            }
        }

        return $label->orderby($data['sidx'], $data['sord'])
            ->select('label.id as id', 'users.nickname as create_user', 'label.create_user as label_user', 'label.label_name', 'label.created_at as created_at', 'label.updated_at as updated_at', 'label.is_status as is_status')
            ->leftJoin('users', 'users.id', '=', 'label.create_user')
            ->take($data['page'])
            ->Paginate($data['rows']);
    }


    public function postHandel($data = [])
    {
        //数据验证
        $labellValidate = new LabelValidate();
        if (!$labellValidate->oper($data)) {
            $this->setErrorMsg(trans($labellValidate->errorMsg));
            return false;
        }

        $label = new Label();
        //添加
        if ($data['oper'] == 'add') {
            $label->label_name = $data['label_name'];
            $label->is_status = $data['is_status'];
            $label->create_user = AUth::user()['id'];
            $result = $label->save();
            $this->setSuccessMsg('添加数据成功！');
            return $result;
        }
        //更新
        if ($data['oper'] == 'edit') {
            unset($data['_token'], $data['oper']);
            $result = $label->where('id', $data['id'])->update($data);
            $this->setSuccessMsg('更新数据成功！');
            return $result;
        }
        //删除
        if ($data['oper'] == 'del') {
            $result = $label->whereIn('id', explode(',', $data['id']))->update(
                [
                    'is_status' => 0
                ]
            );
            $this->setSuccessMsg('删除数据成功！');
            return $result;
        }


        return false;
    }
}

