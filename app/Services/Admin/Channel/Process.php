<?php

namespace App\Services\Admin\Channel;

use Auth;
use App\Model\Channel;
use App\Services\Admin\BaseProcess;
use App\Services\Admin\Channel\Validate\Channel as ChannelValidate;

class Process extends BaseProcess
{
    public function postChannel($data = [])
    {
        //将Model保存成变量
        $channel = new Channel();
        //如果存在where条件
        if (isset($data['filters']) && strlen($data['filters']) > 0) {
            $filters = json_decode($data['filters']);
            $where_content = config('constants.WHERE_CONTENT');
            if ($filters->groupOp == 'AND') {

                foreach ($filters->rules as $v) {
                    $channel = $channel->where('channel.'.$v->field, $where_content[$v->op], $v->data);
                }
            }
            if ($filters->groupOp == 'OR') {
                foreach ($filters->rules as $v) {
                    $channel = $channel->orWhere('channel.'.$v->field, $where_content[$v->op], $v->data);
                }
            }
        }
        return $channel->orderby($data['sidx'], $data['sord'])
            ->select('channel.id as id', 'users.nickname as create_user', 'channel.create_user as channel_user', 'channel.channel_name', 'channel.created_at as created_at', 'channel.updated_at as updated_at', 'channel.is_status as is_status')
            ->leftJoin('users', 'users.id', '=', 'channel.create_user')
            ->take($data['page'])
            ->Paginate($data['rows']);
    }


    public function postHandel($data = [])
    {
        //数据验证
        $channellValidate = new ChannelValidate();
        if (!$channellValidate->oper($data)) {
            $this->setErrorMsg(trans($channellValidate->errorMsg));
            return false;
        }

        $channel = new Channel();
        //添加
        if ($data['oper'] == 'add') {
            $channel->channel_name = $data['channel_name'];
            $channel->is_status = $data['is_status'];
            $channel->create_user = AUth::user()['id'];
            $result = $channel->save();
            $this->setSuccessMsg('添加数据成功！');
            return $result;
        }
        //更新
        if ($data['oper'] == 'edit') {
            unset($data['_token'], $data['oper']);
            $result = $channel->where('id', $data['id'])->update($data);
            $this->setSuccessMsg('更新数据成功！');
            return $result;
        }
        //删除
        if ($data['oper'] == 'del') {
            $result = $channel->whereIn('id', explode(',', $data['id']))->update(
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

