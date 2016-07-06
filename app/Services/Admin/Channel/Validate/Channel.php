<?php namespace App\Services\Admin\Channel\Validate;

use Validator;
use App\Services\Admin\BaseValidate;

/**
 * @readme 表单验证
 * Class Channel
 * @package App\Services\Admin\Channel\Validate
 * @author LeslieWong
 * @email 99999r00t@gmail.com
 */
class Channel extends BaseValidate
{
    public function oper($data = [])
    {

        if ($data['oper'] == 'del') {
            // 创建验证规则
            $rules = [
                'id' => 'required',
            ];
            // 自定义验证消息
            $messages = [
                'id.required' => trans('Common.id_empty'),
            ];
        }


        if ($data['oper'] == 'edit') {
            // 创建验证规则
            $rules = [
                'channel_name' => 'required|max:255',
                'is_status' => 'max:1',
                'id' => 'required|numeric'
            ];

            // 自定义验证消息
            $messages = [
                'channel_name.required' => trans('Channel.name_empty'),
                'is_status.max' => trans('Channel.status_length'),
                'id.required' => trans('Common.id_empty'),
                'id.numeric' => trans('Common.id_number'),
            ];
        }


        if ($data['oper'] == 'add') {
            // 创建验证规则
            $rules = [
                'channel_name' => 'required|max:255',
                'is_status' => 'max:1'
            ];

            // 自定义验证消息
            $messages = [
                'channel_name.required' => trans('Channel.name_empty'),
                'is_status.max' => trans('Channel.status_length'),
            ];
        }

        //开始验证
        $validator = Validator::make($data, $rules, $messages);
        if ($validator->fails()) {
            $this->errorMsg = $validator->messages()->first();
            return false;
        }
        return true;
    }

}
