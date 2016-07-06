<?php namespace App\Services\Admin\Channel\Validate;

use Validator;
use App\Services\Admin\BaseValidate;

/**
 * @readme 表单验证
 * Class Category
 * @package App\Services\Admin\Category\Validate
 * @author LeslieWong
 * @email 99999r00t@gmail.com
 */
class Channel extends BaseValidate
{
    public function add($data = [])
    {
        // 创建验证规则
        $rules = [
            'channel_name' => 'required|max:255',
        ];

        // 自定义验证消息
        $messages = [
            'channel_name.required' => trans('Channel.name_empty'),
        ];

        //开始验证
        $validator = Validator::make($data, $rules, $messages);
        if ($validator->fails()) {
            $this->errorMsg=$validator->messages()->first();
            return false;
        }
        return true;
    }

    public function edit($data = [])
    {
        return $this->add($data);
    }

}
