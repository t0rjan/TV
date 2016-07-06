<?php

namespace App\Services\Admin\Content;

use Auth, Cache, Validator;

use App\Services\Admin\BaseProcess;

use App\Model\Channel;
use App\Model\Label;

use App\Services\Admin\Channel\Validate\Channel as ChannelValidate;

class Process extends BaseProcess
{

    public function getChannel(){

        return Channel::get();
    }

    public function getLabel(){
        return Label::get();

    }


}

