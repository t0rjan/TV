<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    /**
     * 每页多少
     *
     * @var int
     */
    const PAGE_NUMS = 10;
}
